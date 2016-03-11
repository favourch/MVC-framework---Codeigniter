<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class News extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("news_model");
			$this->load->helper(array("url_helper", "form"));
			$this->load->library(array("session", "image_lib"));
		}
		public function index()
		{
			$data["news"] = $this->news_model->get_news();
			$data["title"] = "News";
			$this->load->view("templates/header", $data);
			if($this->session->has_userdata("id"))
				$this->load->view("news/index", $data);
			$this->load->view("templates/footer");
		}
		public function view($slug = NULL)
		{
			$data["news_item"] = $this->news_model->get_news($slug);
			if(empty($data["news_item"]))
			{
				$this->editarticle();
                return;
			}
            $this->WatermarkAllImages($slug);
			$data["title"] = $data["news_item"]["title"];
			$this->load->view("templates/header", $data);
			$this->load->view("news/view", $data);
			$this->load->view("templates/footer");
		}
        public function WatermarkAllImages($slug)
        {
            $data = array();
            $data = $this->news_model->get_news($slug);
            if(!file_exists("uploads/" . $data["img"]) || $data["img"] == "")
                return false;
            $config["source_image"] = "uploads/" . $data["img"];
            $config["wm_text"] = "SHAKHEDE";
            $config['wm_font_path'] = './system/fonts/texb.ttf';
            $config["wm_type"] = "text";
            $config["wm_font_size"] = '30';
            $config["wm_font_color"] = "FFFFFF";
            $config["wm_vrt_alignment"] = "bottom";
            $config["wm_hor_alignment"] = "right";
            $this->image_lib->initialize($config);
            $this->image_lib->watermark();
        }
		public function create()
		{
			$this->load->helper("form");
			$this->load->library("form_validation");
			$data["title"] = "Create a news Item";
			$this->form_validation->set_rules("title", "Title", "required");
			$this->form_validation->set_rules("text", "Text", "required");
			if($this->form_validation->run() === FALSE)
			{
				
				$this->load->view("templates/header", $data);
				if($this->session->has_userdata("id"))
					$this->load->view("news/create");
				$this->load->view("templates/footer");
			}
			else
			{
			     $config["upload_path"] = "./uploads/";
                 $config["allowed_types"] = "jpg|png";
                 $config["overwrite"] = FALSE;
                 $this->load->library("upload", $config);
                 $this->upload->do_upload("img");
              //   if(!$this->upload->do_upload("img"))
                 {
                  //  print_r($this->upload->display_errors());
                  //  exit;
                 }
             //    else
                 {
                    $img = $this->upload->data("file_name");
    				$this->news_model->set_news($img);
       				$this->load->view("templates/header", $data);
    				$this->load->view("news/success");
                }
			}
		}
		public function delete($id)
		{
			$this->news_model->delete( $id );
			redirect("news");
		}
		public function edit($slug)
		{
			$data["news_item"] = $this->news_model->get_news($slug);
			if(empty($data["news_item"]))
			{
				show_404();
			}
			$data["title"] = $data["news_item"]["title"];
			$data["is_editable"] = true;
			$data["id"] = $data["news_item"]["id"];
			$this->load->view("templates/header", $data);
			$this->load->view("news/view", $data);
			$this->load->view("templates/footer");
		}

		/**
		 *
         */
		public function editarticle()
		{
			$id = $this->input->post("id");
			$text = $this->input->post("text");
            $config["upload_path"] = "./uploads/";
            $config["allowed_types"] = "jpg|png";
            $config["overwrite"] = TRUE;
            $this->load->library("upload", $config);
            $this->upload->do_upload("img");
            if(!$this->upload->do_upload("img"))
            {
               print_r($this->upload->display_errors());
                echo "Error in uploading file.";
               exit;
            }
            else
            {
                $img = $this->upload->data("file_name");

				$config['source_image'] = "./uploads/" . $img;
				$config['wm_text'] = 'Shakhede';
				$config['wm_type'] = 'text';
				$config['wm_font_path'] = './system/fonts/texb.ttf';
				$config['wm_font_size'] = '16';
				$config['wm_font_color'] = 'ffffff';
				$config['wm_vrt_alignment'] = 'bottom';
				$config['wm_hor_alignment'] = 'center';
				$config['wm_padding'] = '20';

				$this->image_lib->initialize($config);

				$this->image_lib->watermark();

    			$this->news_model->edit($id, $text, $img);
    			redirect("news");
            }
		}
	}
?>
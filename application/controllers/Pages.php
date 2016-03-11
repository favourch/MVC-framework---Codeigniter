<?php
defined('BASEPATH') OR exit('No direct script access allowed');

  class Pages extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->helper(array("url_helper", "email"));
      $this->load->library(array("session", "form_validation", "email"));
      $this->load->model("News_model");
    }
        public function index()
    {
      $this->load->view('pages/home');
    }
      public function view(&$page = "home")
    {
      if(!file_exists(APPPATH . "/views/pages/" . $page . ".php"))
      {
        show_404();
      }
      $data["title"] = ucfirst($page);
      $this->load->view("templates/header", $data);
      $data["news"] = $this->News_model->get_news();
      $this->load->view("news/index", $data);
      $this->load->view("templates/footer");
    }
        public function about(&$page = "about")
    {
      if(!file_exists(APPPATH . "/views/pages/" . $page . ".php"))
      {
        show_404();
      }
      $data["title"] = ucfirst($page);
      $this->load->view("templates/header", $data);
      $this->load->view("pages/" . $page . ".php", $data);
      $this->load->view("templates/footer", $data);
    }
        public function contact(&$page = "contact")
      {
      if(!file_exists(APPPATH . "/views/pages/" . $page . ".php"))
      {
        show_404();
      }
      $data["title"] = ucfirst($page);
      $this->load->view("templates/header", $data);
      $this->load->view("pages/" . $page . ".php", $data);
      $this->load->view("templates/footer", $data);
    }

    public function sendmsg()
    {
      $name = $this->input->post("fullname");
      $email = $this->input->post("email");
      $msg = $this->input->post("msg");
      $from = "From: " . $email;
      $this->form_validation->set_rules("email", "Email", "required|valid_email");
      $this->form_validation->set_rules("fullname", "Name", "required");
      $this->form_validation->set_rules("msg", "Message", "required");
      if($this->form_validation->run() === FALSE)
      {
        $this->contact();
      }
      else
      {
        $adminEmail = "a.shakhede3522@student.leedsbeckett.ac.uk";
         mail($adminEmail, "Message from: $name", $msg, $from);



        $data["title"] = "Contact";
        $this->load->view("templates/header", $data);
        $this->load->view("pages/successmsgsent", $data);
        $this->load->view("templates/footer", $data);
      }
    }
  }
?>
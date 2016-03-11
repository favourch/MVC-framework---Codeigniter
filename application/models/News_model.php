<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class News_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}
		public function get_news($slug = FALSE)
		{
			if($slug === FALSE)
			{
				$query = $this->db->get("news");
				return $query->result_array();
			}
			$query = $this->db->get_where("news", array("slug" => $slug));
			return $query->row_array();
		}
		public function set_news($img = NULL)
		{
			$this->load->helper("url");
			$slug = url_title($this->input->post("title"), "dash", TRUE);
			$data = array(
				"title" => $this->input->post("title"),
				"slug" => $slug,
				"text" => $this->input->post("text"),
                "img" => $img
			);
			return $this->db->insert("news", $data);
		}
		public function delete($id)
		{
			$this->db->delete("news", array( "id" => $id));
			return TRUE;
		}
		public function edit($id, $text, $img)
		{
			$this->db->where("id", $id);
			$data = array(
				"text" => $text,
                "img" => $img
			);
			$this->db->update("news", $data);
		}
	}
?>
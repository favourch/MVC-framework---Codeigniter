<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	class User_model extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}
		public function dologin($username, $password)
		{
			$result = $this->db->select("*")->from("user")->where("username", $username)->where("password", $password)->get();
			if($this->db->count_all_results() > 0)
				return $result->result();
			else
				return false;
		}
		public function doregister($fullname, $username, $password, $email, $key)
		{
			$data = array(
				"fullname" => $fullname,
				"username" => $username,
				"password" => $password,
				"email" => $email
			);
			if($this->db->insert("user", $data))
            {
                $this->db->delete("verification", array("key" => $key));
				return true;
            }
			else
				return false;
		}
        
        public function sendVerification($fullname, $username, $password, $email, $key)
        {
            $data = array(
				"fullname" => $fullname,
				"username" => $username,
				"password" => $password,
				"email" => $email,
                "key" => $key
			);
            
			$this->db->insert("verification", $data);
        }
        
        public function verifyAccount($key)
        {
            $result = $this->db->select("*")->from("verification")->where("key", $key)->get();
            if($this->db->count_all_results() > 0)
                return $result->row();
            else
                return false;
        }
	}
?>
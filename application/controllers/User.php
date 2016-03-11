<?php
defined('BASEPATH') OR exit('No direct script access allowed');

        class User extends CI_Controller
        {
            public function __construct()
            {
                parent::__construct();
                $this->load->model("User_model");
                $this->load->model("News_model");
                $this->load->helper(array(
                    "url_helper",
                    "email"
                ));
                $this->load->library(array(
                    "session",
                    "form_validation",
                    "email"
                ));
            }
            public function login($msg = "")
            {
                $data["title"] = "Login to your Account";
                $this->load->view("templates/header", $data);
                $data["msg"] = $msg;
                $this->load->view("user/login", $data);
                $this->load->view("templates/footer");
            }
            public function dologin()
            {
                $username = $this->input->post("username");
                $password = $this->input->post("password");
                $this->form_validation->set_rules("username", "Username", "required");
                $this->form_validation->set_rules("password", "Password", "required");
                if ($this->form_validation->run() == FALSE) {
                    $this->login();
                } else {
                    $result = $this->User_model->dologin($username, $password);
                    if ($result == true) {
                        $this->session->set_userdata("id", $result[0]->id);
                        redirect("news");
                    } else {
                        $this->login("Username or password is not correct");
                    }
                }
            }
            public function register()
            {
                $data["title"] = "Create a new Account";
                $this->load->view("templates/header", $data);
                $data["msg"] = "";
                $this->load->view("user/register", $data);
                $this->load->view("templates/footer");
            }
            public function doregister()
            {
                $fullname = $this->input->post("fullname");
                $username = $this->input->post("username");
                $password = $this->input->post("password");
                $email    = $this->input->post("email");
                
                $this->form_validation->set_rules("fullname", "Name", "required");
                $this->form_validation->set_rules("username", "Username", "required|is_unique[user.username]|trim|min_length[5]|max_length[12]");
                $this->form_validation->set_rules("password", "Password", "trim|required|min_length[8]");
                $this->form_validation->set_rules("email", "Email", "trim|required|valid_email|is_unique[user.email]");
                
                if ($this->form_validation->run() === FALSE) {
                    $this->register();
                } else {
                    
                    $key = md5(time());
                    mail($email, "Email Confirmation", "Please click on the following link to verify your email." . PHP_EOL . base_url("user/confirmAccount?key=$key"), "From: mail@shakhede.org");
                    $this->User_model->sendVerification($fullname, $username, $password, $email, $key);
                    
                    $data["title"] = "Create a new Account";
                    $verify["verify"] = "A confirmation email has been sent to you.";
                    $this->load->view("templates/header", $data);
                    $this->load->view("user/verify", $verify);
                    $this->load->view("templates/footer");
                }
                
            }
            public function logout()
            {
                $this->session->sess_destroy();
                redirect();
            }
            
            public function confirmAccount()
            {
                $key = $_GET["key"];
                $result = $this->User_model->verifyAccount($key);
                if($result)
                {
                    $fullname = $result->fullname;
                    $username = $result->username;
                    $password = $result->password;
                    $email = $result->email;
                    $result = $this->User_model->doregister($fullname, $username, $password, $email, $key);
                    $id     = $result;
                    $this->session->set_userdata("id", $id);
                    
                    $data["title"] = "Registration completed!";
                    $this->load->view("templates/header", $data);
                    $this->load->view("user/success");
                    $this->load->view("templates/footer");
                }
            }
        }
?>
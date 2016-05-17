<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Users extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}


		public function regist(){
			$this->load->view('regist');

		}
		public function do_regist(){
			$name = $this->input->post('username');
			$email = $this->input->post('email');
			$pwd = $this->input->post('password');
			$sex = $this->input->post('sex');

			$this->load->model('users_model');
			$this->users_model->regist($name, $email, $pwd, $sex);
			// $this->load->view('success');
			echo "success";
		}
		public function login(){
			$this->load->view('login');
		}
		public function do_login(){
			$name = $this->input->post('name');
			$pwd = $this->input->post('password');
			$this->load->model('users_model');
			$row = $this->users_model->login($name, $pwd);
			if($row){
				echo "success";
				
				$newdata = array(
                   "username"  => "欢迎您：".$row -> user_name,
                   "change-ID" => '<a href="users/login" style="color:blue">切换账号</a>',
                   "indent" => "我的订单",
				   "display"=>'style="display:none"'

               	);

				$this->session->set_userdata($newdata);
			}else{
				echo "fail";
			}
		}
	}













?>
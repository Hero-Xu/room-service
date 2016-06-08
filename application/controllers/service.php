<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Service extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}


		public function get_hair(){
			$this->load->model('Service_model');
			$result = $this->Service_model->get_hairs();
			echo json_encode($result);
		}
		public function get_teacher(){
			$this->load->model('Service_model');
			$result = $this->Service_model->get_teachers();
			echo json_encode($result);
		}
		public function get_clean(){
			$this->load->model('Service_model');
			$result = $this->Service_model->get_cleans();
			echo json_encode($result);
		}
		public function get_hand(){
			$this->load->model('Service_model');
			$result = $this->Service_model->get_hands();
			echo json_encode($result);
		}

	}


?>
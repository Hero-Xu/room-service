<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Hair extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}


		public function get_hair(){
			$this->load->model('hair_model');
			$result = $this->hair_model->get_hairs();
			echo json_encode($result);
		}

	}


?>
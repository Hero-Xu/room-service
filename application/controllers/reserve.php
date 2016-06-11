<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Reserve extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}


		public function save_indent(){
			$img = $this->input->post('img');
			$name = $this->input->post('name');
			$sex = $this->input->post('sex');
			$price = $this->input->post('price');
			$kind = $this->input->post('kind');

			$this->load->model('indent_model');
			$this->indent_model->save_indent($img, $name, $sex, $price, $kind);			
			echo "success";

		}
	}


?>
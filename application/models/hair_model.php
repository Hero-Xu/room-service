<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Hair_model extends CI_Model{
		public function get_hairs(){
			return $this->db->get('t_hair')->result();
		}


	}
?>
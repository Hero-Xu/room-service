<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Service_model extends CI_Model{
		public function get_hairs(){
			$this->db->limit(6);//限制查出来的条数
			return $this->db->get('t_hair')->result();
		}
		public function get_teachers(){
			return $this->db->get('t_teacher')->result();
		}
		public function get_cleans(){
			return $this->db->get('t_clean')->result();
		}
		public function get_hands(){
			return $this->db->get('t_hand')->result();
		}


	}
?>
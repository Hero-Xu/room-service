<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Indent_model extends CI_Model{
		public function save_indent($img, $name, $sex, $price, $kind){
			$data = array(
               'img' => $img,
               'name' => $name,
               'sex' => $sex,
               'price'=> $price,
               'kind'=> $kind
            );

			$this->db->insert('t_indent', $data);
		}
		public function get_indent(){
			return $this->db->get('t_indent')->result();
		}

	}
?>
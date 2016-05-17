<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Users_model extends CI_Model{
		// 注册－－－－－插入数据库
		public function regist($name, $email, $pwd, $sex){
			$data = array(
               'user_name' => $name,
               'email' => $email,
               'password' => $pwd,
               'sex' => $sex
            );

			$this->db->insert('t_user', $data);
		}
		// 登录－－－－－查询数据
		public function login($name, $pwd){
			return $this->db->get_where('t_user' , array('user_name' => $name, 'password' => $pwd )) ->  row();
			
		}
	}



?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$username = $this->session->userdata('username');
		$change = $this->session->userdata('change-ID');
		$indent = $this->session->userdata('indent');
		$display = $this->session->userdata('display');
		$this->session->unset_userdata('username');//删session
		$this->session->unset_userdata('change-ID');//删session
		$this->session->unset_userdata('indent');//删session
		$this->session->unset_userdata('display');//删session
		// $data['username'] = $username;
		$data = array(
			'username'=>$username,
			'change'=>$change,
			'indent'=>$indent,
			'display'=>$display
			);
		// echo $data ->$username;
		// echo "<pre>";
		// var_dump($data);
		
		// echo "</pre>";
		$this->load->view('index.php', $data);
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
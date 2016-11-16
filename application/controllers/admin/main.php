<?php 

class Main extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') !== 1){
			redirect(base_url("admin/login"));
		}
	}

	function index(){
		$data['title'] = $this->m_property->getProperty("title");
		$this->load->view('admin/v_admin',$data);
	}
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
	}

	function index(){
		if($this->session->userdata('status') === 1){
			redirect(base_url("admin/main"));
		}
		$data['title'] = $this->m_property->getProperty("title");
		$this->load->view('admin/v_login',$data);
	}

	function doLogin(){
		$data['title'] = $this->m_property->getProperty("title");

		$username = $this->input->post('username');
		$password = md5($this->input->post('password'));
		
		$row = $this->m_login->getLogin(array('username' => $username,'password' => $password));
		
		if ($row->num_rows() > 0){
			if ($row->row()->is_disable == 0){
				$data_session = array(
					'username' => $row->row()->username,
					'salutation' => $row->row()->salutation,
					'last_name' => $row->row()->last_name,
					'status' => 1
				);

				$this->session->set_userdata($data_session);
				$this->m_login->successLogin($row->row());

				redirect(base_url("admin/main"));
			}else{
				$data['message'] = $this->m_property->getProperty("errorLoginDisable");
			}
		}else{
			
			$row = $this->m_login->getLogin(array('username' => $username));
			if ($row->num_rows() > 0){
				if ($this->m_login->failedLogin($row->row()) === 0){
					$data['message'] = $this->m_property->getProperty("errorLoginFailed");
				} else {
					$data['message'] = $this->m_property->getProperty("errorLoginDisable");
				}
			} else {
				$data['message'] = $this->m_property->getProperty("errorLoginNotFound");
			}
		}
		$this->load->view('admin/v_login',$data);
	}

	function logout(){
		if($this->session->userdata('status') !== 1){
			redirect(base_url("admin/login"));
		}
		$this->m_login->logout($this->session->userdata("username"));
		$this->session->sess_destroy();
		redirect(base_url('admin/login'));
	}
}

?>
<?php 

class change_data extends CI_Controller{

	function __construct(){
		parent::__construct();
	
		if($this->session->userdata('status') !== 1){
			redirect(base_url("admin/login"));
		}
		$this->load->model('m_login');
	}

	function index(){
		$data['title'] = $this->m_property->getProperty("title");
		$message = $this->session->flashdata('message');
		if(isset($message)){
			$data['processMessage'] = $message;
		}
		$data['data']  = $this->m_login->getLogin(array('username'=>$this->session->userdata('username')));
		$this->load->view('admin/v_changePassword',$data);
	}

	function doChangeData(){
		$data['title'] = $this->m_property->getProperty("title");
		$username = $this->session->userdata("username");
		$oldPassword = md5($this->input->post('oldPassword'));
		$newPassword = md5($this->input->post('newPassword'));

		$message = "";

		$where = array(
			'username' => $this->session->userdata("username"),
			'password' => $oldPassword
		);

		$row = $this->m_login->getLogin(array('username' => $username,'password' => $oldPassword));
		
		if ($row->num_rows() > 0){
			$this->m_login->updateLogin(array('id' => $row->row()->id),array('password' => $newPassword));
			$message = $this->m_property->getProperty("successLoginUpdated");
		} else {
			$message = $this->m_property->getProperty("errorPasswordInvalid");
		}
		$this->session->set_flashdata('message',$message);
		redirect("admin/change_password");
	}
}
<?php 

class M_login extends CI_Model{	

	function getLogin($where){		
		return $this->db->get_where('admin',$where);
	}

	function successLogin($data){
		$dataToUpdate = array(
			'last_login'=> date('Y-m-d H:i:s',now()),
			'failed_attemp' => 0,
			'is_login' => 1
		);
		$this->db->where('id', $data->id);
		$this->db->update('admin',$dataToUpdate);
	}

	function failedLogin($data){
		$result = 0;
		$attemp = $data->failed_attemp;

		if ($attemp == 3){
			$dataToUpdate = array(
				'last_failed_login'=> date('Y-m-d H:i:s',now()),
				'failed_attemp' => $attemp+1,
				'is_disable' => 1
			);
			$result = 1;
		} else {
			$dataToUpdate = array(
				'last_failed_login'=> date('Y-m-d H:i:s',now()),
				'failed_attemp' => $attemp+1
			);
		}

		$this->db->where('id', $data->id);
		$this->db->update('admin',$dataToUpdate);

		return $result;
	}

	function logout($username){
		$dataToUpdate = array(
			'is_login'=> 0
		);
		$this->db->where('username', $username);
		$this->db->update('admin',$dataToUpdate);
	}

	function updateLogin($where,$data){
		$this->db->where($where);
		$this->db->update('admin',$data);
	}
}
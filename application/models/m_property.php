<?php 

class M_property extends CI_Model{	
	function getProperty($prop_key){		
		return $this->db->get_where("property",array('prop_key' => $prop_key))->row()->value;
	}	
}

?>
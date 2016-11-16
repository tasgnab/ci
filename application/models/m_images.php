<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class m_images extends CI_Model{

    public function getRows($id = ''){
        $this->db->select('id,file_name,create_datetime,update_datetime');
        $this->db->from('images');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('create_datetime','desc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    
    public function insert($data = array()){
        $insert = $this->db->insert_batch('images',$data);
        return $insert?true:false;
    }
    
}
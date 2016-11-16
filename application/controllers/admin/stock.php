<?php defined('BASEPATH') OR exit('No direct script access allowed');
class stock extends CI_Controller
{
    function  __construct() {
        parent::__construct();
        if($this->session->userdata('status') != "login"){
            redirect(base_url("admin/login"));
        }
        $this->load->model('m_images');
    }
    
    function index(){
        $data = array();
        if($this->input->post('fileSubmit') && !empty($_FILES['userFiles']['name'])){

            $filesCount = count($_FILES['userFiles']['name']);
            for($i = 0; $i < $filesCount; $i++){
                $_FILES['userFile']['name'] = $_FILES['userFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['userFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['userFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['userFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['userFiles']['size'][$i];

                $uploadPath = 'upload/images/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|png';
                $config['encrypt_name'] = TRUE;
                $config['max_size']   = '200';
                $config['max_width'] = '1024';
                $config['max_height'] = '1024';
                
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if($this->upload->do_upload('userFile')){
                    $fileData = $this->upload->data();
                    $uploadData[$i]['file_name'] = $fileData['file_name'];
                }
            }

            if(!empty($uploadData)){
                //Insert files data into the database
                $insert = $this->m_images->insert($uploadData);
                $statusMsg = $insert?'Files uploaded successfully.':'Some problem occurred, please try again.';
                $this->session->set_flashdata('statusMsg',$statusMsg);
            }

        }
        
        //get files data from database
        $data['files'] = $this->m_images->getRows();
        //pass the files data to view
        $this->load->view('admin/v_stock', $data);
    }

}
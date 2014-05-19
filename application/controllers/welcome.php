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
		$this->load->view('welcome_message');
	}
        
        function uploader(){
            //echo json_encode(array('status' => 'ok'));
            
          $config['upload_path']   = "./uploads";
          $config['allowed_types'] = 'jpg|jpeg|gif|png|bmp';
          $config['encrypt_name']  = FALSE;
          $config['max_size']      = 0;
          $config['encrypt_name']  = TRUE;
          $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload("userfile")): 
                  echo json_encode(array('st'=>1, 'msg' => $this->upload->display_errors()));
            else:
                  $data = $this->upload->data();  
                  echo json_encode(array('st'=>0, 'msg' => $data, 'img'=>$data['file_name']));
            endif;            
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
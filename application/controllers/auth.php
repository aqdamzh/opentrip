<?php

class Auth extends CI_Controller
{
    public function login()
    {
        $this->form_validation->set_rules('email','Email','required',['required' => 'Username Wajib Diisi']);
        $this->form_validation->set_rules('password','Password','required',['required' => 'Password Wajib Diisi']);
        
        if($this->form_validation->run() == FALSE)
		{
			$this->load->view('header');
			$this->load->view('home');
			$this->load->view('footer');
        }
        else{
			$auth = $this->model_auth->cek_login();
			if($auth == FALSE){
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
				  <strong>Email atau Password Salah!
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>');
				redirect('auth/login');
			}
			else
			{
				$this->session->set_userdata('username',$auth->email);
				$this->session->set_userdata('role_id',$auth->role_id);
				switch ($auth->role_id) {
					case 1:
						redirect('admin/destination');
						break;
					case 2 :
						redirect('home');
					default:
						
						break;
				}
			}
		}
    }
    
}

?>
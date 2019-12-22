<?php

class Registrasi extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('first_name','First_name','required',['required' => 'Nama Depan Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('last_name','Last_name','required',['required' => 'Nama Belakang Wajib Diisi!'
        ]);
        $this->form_validation->set_rules('email','Email','required',['required' => 'Email Wajib Diisi'
		]);
		$this->form_validation->set_rules('password','Password','required',[
            'required'	=> 'Password Wajib Diisi!'
        ]);
        if($this->form_validation->run() == FALSE)
        {
            echo '<script type="text/javascript">';
            echo ' alert("Registration Failed!")';  //not showing an alert box.
            echo '</script>';
            header("refresh:2");
            redirect('Welcome/index');
            
            
        }
        else
        {
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            $first_name = $this->input->post('first_name');
            $last_name  = $this->input->post('last_name'); 
            $this->model_user->addCustomer($email,$password,$first_name,$last_name);
            redirect('Welcome/index');
        }
    }

}

?>
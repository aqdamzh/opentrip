<?php
class Customer extends CI_Controller
{
    public function profil()
	{
		$this->load->library('session');
		$id = $this->session->userdata('customer_id');
		$data['nama_profile'] = $this->model_user->getNameProfile($id);
		$data['nama_kota'] = $this->model_user->getNameCity();
		$this->load->view('pengguna/header',$data);
		$this->load->view('pengguna/profil',$data);
		$this->load->view('footer');
	
    }
    public function update_profil(){
        $customer_id = $this->session->userdata('customer_id');
		$first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $data = array(
            'first_name' => $first_name,
            'last_name' => $last_name
        );
        $where = array(
            'customer_id' => $customer_id

        );
        $this -> model_user->update_customer($where,$data);
        redirect('Welcome/index');
    }
    
}

?>
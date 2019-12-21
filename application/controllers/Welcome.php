<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('role_id')==1){
			redirect('admin/index');
		}else{

			$this->load->library('pagination');

			$config['base_url'] = site_url('welcome/index');
			$config['total_rows'] = $this->destination_model->countAllDestination();
			$config['per_page'] = 6;
			$choice = $config["total_rows"] / $config["per_page"];
			$config["num_links"] = floor($choice);
			$config['first_link']       = 'First';
			$config['last_link']        = 'Last';
			$config['next_link']        = 'Next';
			$config['prev_link']        = 'Prev';
			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
	
			$this->pagination->initialize($config);
	
			$data['page'] = $this->uri->segment(3);
			$data['destinations'] = $this->destination_model->getDestinations($config['per_page'], $data['page']);
			$id = $this->session->userdata('customer_id');
			$data['nama_profile'] = $this->model_user->getNameProfile($id);
			$this->load->view('pengguna/header',$data);
			$this->load->view('home', $data);
			$this->load->view('footer');
		}
	}

	public function detail($destination_id){
		$data['destination'] = $this->destination_model->getDestination($destination_id);
		$data['trips'] = $this->destination_model->getTrip($destination_id, null);
		$this->load->library('session');
		$id = $this->session->userdata('customer_id');
		$arr_nama_profile = $this->model_user->getNameProfile($id);
		$data['nama_profile'] = $arr_nama_profile->full_name;
		$this->load->view('pengguna/header',$data);
		$this->load->view('destination_detail', $data);
		$this->load->view('footer');
	}

	public function trip_detail(){
		$destination_id = $this->input->post('destination_id');
		$date = $this->input->post('date');
		$data['destination'] = $this->destination_model->getDestination($destination_id);
		$data['trips'] = $this->destination_model->getTrip($destination_id, $date);
		$this->load->library('session');
		$id = $this->session->userdata('customer_id');
		$arr_nama_profile = $this->model_user->getNameProfile($id);
		$data['nama_profile'] = $arr_nama_profile->full_name;
		$this->load->view('pengguna/header',$data);
		$this->load->view('destination_detail', $data);
		$this->load->view('footer');
	}
}

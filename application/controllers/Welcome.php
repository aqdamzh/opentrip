<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		if($this->session->userdata('role_id')==1){
			redirect('admin/index');
		}else{

			$this->load->library('pagination');

			$data['filterDestination']='';

			$config['base_url'] = site_url('welcome/index');
			$config['total_rows'] = $this->destination_model->countAllDestination($data['filterDestination']);
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
			$data['destinations'] = $this->destination_model->getDestinations($config['per_page'], $data['page'], $data['filterDestination']);
			$id = $this->session->userdata('customer_id');
			$data['nama_profile'] = $this->model_user->getNameProfile($id);
			$this->load->view('pengguna/header',$data);
			$this->load->view('home', $data);
			$this->load->view('footer');
		}
	}

	public function detail($destination_id){
		$data['destination'] = $this->destination_model->getDestination($destination_id);
		$data['trips'] = $this->destination_model->getDestinationTrip($destination_id);
		$id = $this->session->userdata('customer_id');
		$data['nama_profile'] = $this->model_user->getNameProfile($id);
		$this->load->view('pengguna/header',$data);
		$this->load->view('destination_detail', $data);
		$this->load->view('footer');
	}

	public function book_now(){
		if($this->session->userdata('role_id')==2){
			$trip_id = $this->uri->segment(3);
			$id = $this->session->userdata('customer_id');
			$data['nama_profile'] = $this->model_user->getNameProfile($id);
			$data['trip'] = $this->destination_model->getTrip($trip_id);
			$data['gateways'] = $this->destination_model->getAllgateway();
			$data['customer_id'] = $this->session->userdata('customer_id');
			$this->load->view('pengguna/header',$data);
			$this->load->view('pengguna/book_now', $data);
			$this->load->view('footer');
		}else{
			$this->load->view('err_book');
		}
	}

	public function konfirmasi_pembayaran(){
		if($this->session->userdata('role_id')==2){
			$price = $this->input->post('price');
			$gateway_id = $this->input->post('gateway_id');
			$data['amount_people'] = $this->input->post('totpeople');
			$data['amount_price'] = intval($price) * $data['amount_people'];
			$data['customer_id'] = $this->input->post('customer_id');
			$data['trip_id'] = $this->input->post('trip_id');
			$data['gateway'] = $this->destination_model->getGateway($gateway_id);
			$data['nama_profile'] = $this->model_user->getNameProfile($data['customer_id']);
			$this->load->view('pengguna/header',$data);
			$this->load->view('pengguna/konfirmasi_pembayaran', $data);
			$this->load->view('footer');

		}else{
			$this->load->view('404');
		}
	}

	public function membayar(){
		if($this->session->userdata('role_id')==2){
			$data['amount_people'] = $this->input->post('amount_people');
			$data['amount_price'] = $this->input->post('amount_price');
			$data['customer_id'] = $this->input->post('customer_id');
			$data['trip_id'] = $this->input->post('trip_id');
			$data['gateway_id'] = $this->input->post('gateway_id');
			$data['payment_date'] = date("Y-m-d");
			$data['nama_profile'] = $this->model_user->getNameProfile($data['customer_id']);
			$booking = $this->destination_model->inBooking($data['trip_id'],$data['customer_id'],$data['amount_people'],$data['amount_people']);
			$this->destination_model->inPayment($data['gateway_id'],$data['payment_date'],$data['amount_price'],$booking);

			print_r($data);
		}else{
			$this->load->view('404');
		}
	}
}

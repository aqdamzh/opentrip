<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->library('pagination');

		$config['base_url'] = site_url('Welcome/index');
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
		$this->load->view('pengguna/header');
		$this->load->view('home', $data);
		$this->load->view('footer');
	}

	public function detail($destination_id){
		$data['destination'] = $this->destination_model->getDestination($destination_id);
		$data['prices'] = $this->destination_model->getPrice($destination_id, null);
		$this->load->view('pengguna/header');
		$this->load->view('destination_detail', $data);
		$this->load->view('footer');
	}

	public function price_detail(){
		$destination_id = $this->input->post('destination_id');
		$date = $this->input->post('date');
		$data['destination'] = $this->destination_model->getDestination($destination_id);
		$data['prices'] = $this->destination_model->getPrice($destination_id, $date);
		$this->load->view('pengguna/header');
		$this->load->view('destination_detail', $data);
		$this->load->view('footer');
	}
}

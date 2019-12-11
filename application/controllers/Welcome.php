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
		$data['destinations'] = $this->destination_model->getAllDestination();
		$this->load->view('home', $data);
	}

	public function detail($destination_id){
		$data['destination'] = $this->destination_model->getDestination($destination_id);
		$data['prices'] = $this->destination_model->getPrice($destination_id, null);
		$this->load->view('destination_detail', $data);
	}

	public function price_detail(){
		$destination_id = $this->input->post('destination_id');
		$date = $this->input->post('date');
		$data['destination'] = $this->destination_model->getDestination($destination_id);
		$data['prices'] = $this->destination_model->getPrice($destination_id, $date);
		$this->load->view('destination_detail', $data);
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
		$this->load->view('add_price', $data);
    }
    
    public function add_price(){
        $day = $this->input->post('day');
        $night = $this->input->post('night');

        $duration = $this->destination_model->getDurationID($day, $night);
        $duration_id = $duration->duration_id;
        $destination_id = $this->input->post('destination_id');
        $departure = $this->input->post('departure');
        $price = $this->input->post('price');

        $data = array(
			'price'			    => $price,
			'destination_id'	=> $destination_id,
			'duration_id'		=> $duration_id,
			'departure'		    => $departure,
        );
        $this->destination_model->input_price($data);
        redirect('admin/index');
    }
}

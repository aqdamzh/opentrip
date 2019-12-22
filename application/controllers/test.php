<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {

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
<<<<<<< HEAD
		$data['schedule'] = $this->destination_model->getGuideSchedule(2);
        $data['test'] = $this->destination_model->getGuideInDate('2017-08-4', '2017-08-07');
=======
        $data['test'] = $this->model_user->getNameProfile(1)->full_name;
>>>>>>> f85aa153c0a08feab375f6c7d1a66254200e0747
		$this->load->view('test', $data);
	}
}

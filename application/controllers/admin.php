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
		$this->load->library('pagination');

		$config['base_url'] = site_url('admin/index');
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
		$data['destinations_p'] = $this->destination_model->getDestinations($config['per_page'], $data['page']);
		$data['destinations'] = $this->destination_model->getAllDestination();
		$this->load->view('admin/header');
		$this->load->view('admin/admin_view', $data);
		$this->load->view('footer');
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
	
	public function add_destination(){
		$name = $this->input->post('name');
		$inDestination = $this->destination_model->inDestination($name);
		if($inDestination==0){
			$description = $this->input->post('deskripsi');
			$country_id = $this->input->post('country_id');
			$picture = $_FILES['picture'];
			if ($picture=''){}else{
				$config['upload_path'] = './assets/images';
				$config['allowed_types'] = 'jpg|png|gif';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('picture')){
					echo "Upload Gagal"; die();
				}else{
					$picture=$this->upload->data('file_name');
				}
			}
			$data = array(
				'name' => $name,
				'description' => $description,
				'country_id' => $country_id,
				'picture' => $picture,
			);
			$this->destination_model->input_destination($data);
			redirect('admin/destination');
		}else{
			echo "DESTINASI SUDAH ADA!"; die();
		}
	}

	public function delete($destination_id){
		$this->destination_model->deleteDestination($destination_id);
		$this->destination_model->deleteDestination_price($destination_id);
		redirect('admin/destination');
	}

	public function detail_edit($destination_id){
		$data['destination'] = $this->destination_model->getDestination($destination_id);
		$this->load->view('admin/header');
		$this->load->view('admin/destination_detail', $data);
		$this->load->view('footer');
	}

	public function update_bg(){
		$destination_id = $this->input->post('destination_id');
		$background = $_FILES['background'];
		if ($background=''){}else{
			$config['upload_path'] = './assets/images';
			$config['allowed_types'] = 'jpg|png|gif';
			$this->load->library('upload',$config);
			if(!$this->upload->do_upload('background')){
				echo "Upload Gagal"; die();
			}else{
				$background=$this->upload->data('file_name');
			}
		}

		$this->destination_model->up_destination_bg($background, $destination_id);
		redirect('admin/detail_edit/'.$destination_id);


	}
}

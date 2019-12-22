<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function index()
	{
		if($this->session->userdata('role_id')==1){
			$this->load->library('pagination');


			$data['filterDestination']='';

			$config['base_url'] = site_url('admin/index');
			$config['total_rows'] = $this->destination_model->countAllDestination($data['filterDestination']);
			$config['per_page'] = 6;
			$choice = 6;
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
			$data['destinations_p'] = $this->destination_model->getDestinations($config['per_page'], $data['page'], $data['filterDestination']);
			$data['destinations'] = $this->destination_model->getAllDestination();
			$this->load->library('session');
			$id = $this->session->userdata('customer_id');
			$data['nama_profile'] = $this->model_user->getNameProfile(1)->full_name;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/admin_view', $data);
			$this->load->view('footer');

		}else{
			$this->load->view('404');
		}
	}

	public function filter_destination()
	{
		if($this->session->userdata('role_id')==1){
			$this->load->library('pagination');

			if($this->input->post('submit')){
				$data['filterDestination'] = $this->input->post('filterDestination');
				$_SESSION['filterDestination']=$data['filterDestination'];
			}else{
				$data['filterDestination'] = $_SESSION['filterDestination'];
			}

			$config['base_url'] = site_url('admin/filter_destination');
			$config['total_rows'] = $this->destination_model->countAllDestination($data['filterDestination']);
			$config['per_page'] = 6;
			$choice = 6;
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
			$data['destinations_p'] = $this->destination_model->getDestinations($config['per_page'], $data['page'], $data['filterDestination']);
			$data['destinations'] = $this->destination_model->getAllDestination();
			$this->load->library('session');
			$id = $this->session->userdata('customer_id');
			$data['nama_profile'] = $this->model_user->getNameProfile(1)->full_name;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/admin_view', $data);
			$this->load->view('footer');

		}else{
			$this->load->view('404');
		}
	}


	public function perjalanan(){
		if($this->session->userdata('role_id')==1){
			$this->load->library('pagination');

			$data['filterDestination']='';
			$data['filterTglMin'] = null;
			$data['filterTglMax'] = null;
			$data['filterDay'] = null;
			$data['filterNight'] = null;
			$data['filterPriceMin'] = null;
			$data['filterPriceMax'] = null;

			$config['total_rows'] = $this->destination_model->countAllTrip($data['filterDestination'], $data['filterTglMin'], $data['filterTglMax'], $data['filterDay'], $data['filterNight'], $data['filterPriceMin'], $data['filterPriceMax']);
			$config['base_url'] = site_url('admin/perjalanan');
			$config['per_page'] = 6;
			$config["num_links"] = 6;
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
			$data['trips'] = $this->destination_model->getTrips($config['per_page'], $data['page'], $data['filterDestination'], $data['filterTglMin'], $data['filterTglMax'], $data['filterDay'], $data['filterNight'], $data['filterPriceMin'], $data['filterPriceMax']);
			$data['destinations'] = $this->destination_model->getAllDestination();
			$data['guides'] = $this->destination_model->getAllGuide();
			$this->load->library('session');
			$id = $this->session->userdata('customer_id');
			$data['nama_profile'] = $this->model_user->getNameProfile(1)->full_name;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/jadwal_perjalanan', $data);
			$this->load->view('footer');
		}else{
			$this->load->view('404');
		}
	}

	public function filter_perjalanan(){
		if($this->session->userdata('role_id')==1){
			$this->load->library('pagination');

			if($this->input->post('submit')){
				$data['filterDestination'] = $this->input->post('filterDestination');
				$data['filterTglMin'] = $this->input->post('filterTglMin');
				$data['filterTglMax'] = $this->input->post('filterTglMax');
				$data['filterDay'] = $this->input->post('filterDay');
				$data['filterNight'] = $this->input->post('filterNight');
				$data['filterPriceMin'] = $this->input->post('filterPriceMin');
				$data['filterPriceMax'] = $this->input->post('filterPriceMax');

				if(empty($data['filterTglMin'])){$data['filterTglMin'] = null;}
				if(empty($data['filterTglMax'])){$data['filterTglMax'] = null;}
				if(empty($data['filterDay'])){$data['filterDay'] = null;}
				if(empty($data['filterNight'])){$data['filterNight'] = null;}
				if(empty($data['filterPriceMin'])){$data['filterPriceMin'] = null;}
				if(empty($data['filterPriceMax'])){$data['filterPriceMax'] = null;}

				$_SESSION['filterDestination']=$data['filterDestination'];
				$_SESSION['filterTglMin']=$data['filterTglMin'];
				$_SESSION['filterTglMax']=$data['filterTglMax'];
				$_SESSION['filterDay']=$data['filterDay'];
				$_SESSION['filterPriceMin']=$data['filterPriceMin'];
				$_SESSION['filterPriceMax']=$data['filterPriceMax'];
			}else{
				$data['filterDestination'] = $_SESSION['filterDestination'];
				$data['filterTglMin'] = $_SESSION['filterTglMin'];
				$data['filterTglMax'] = $_SESSION['filterTglMax'];
				$data['filterDay'] = $_SESSION['filterTglMax'];
				$data['filterNight'] = $_SESSION['filterTglMax'];
				$data['filterPriceMin'] = $_SESSION['filterPriceMin'];
				$data['filterPriceMax'] = 	$_SESSION['filterPriceMax'];
			}

			$config['total_rows'] = $this->destination_model->countAllTrip($data['filterDestination'], $data['filterTglMin'], $data['filterTglMax'], $data['filterDay'], $data['filterNight'], $data['filterPriceMin'], $data['filterPriceMax']);
			$config['base_url'] = site_url('admin/filter_perjalanan');
			$config['per_page'] = 6;
			$config["num_links"] = 6;
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
			$data['trips'] = $this->destination_model->getTrips($config['per_page'], $data['page'], $data['filterDestination'], $data['filterTglMin'], $data['filterTglMax'], $data['filterDay'], $data['filterNight'], $data['filterPriceMin'], $data['filterPriceMax']);
			$data['destinations'] = $this->destination_model->getAllDestination();
			$data['guides'] = $this->destination_model->getAllGuide();
			$this->load->library('session');
			$id = $this->session->userdata('customer_id');
			$data['nama_profile'] = $this->model_user->getNameProfile(1)->full_name;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/jadwal_perjalanan', $data);
			$this->load->view('footer');
		}else{
			$this->load->view('404');
		}
	}


	public function guide(){
		if($this->session->userdata('role_id')==1){
			$this->load->library('pagination');

			$data['filterDestination']='';
			$data['filterGuide']='';

			$config['base_url'] = site_url('admin/guide');
			$config['total_rows'] = $this->destination_model->countAllGuideSchedule($data['filterDestination'], $data['filterGuide']);
			$config['per_page'] = 6;
			$choice = 6;
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
			$data['schedules'] = $this->destination_model->getGuideSchedules($config['per_page'], $data['page'], $data['filterDestination'], $data['filterGuide']);
			$this->load->library('session');
			$id = $this->session->userdata('customer_id');
			$data['nama_profile'] = $this->model_user->getNameProfile(1)->full_name;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/jadwal_guide', $data);
			$this->load->view('footer');

		}else{
			$this->load->view('404');
		}
	}

	public function filter_guide(){
		if($this->session->userdata('role_id')==1){
			$this->load->library('pagination');

			if($this->input->post('submit')){
				$data['filterDestination'] = $this->input->post('filterDestination');
				$data['filterGuide'] = $this->input->post('filterGuide');
				$_SESSION['filterDestination']=$data['filterDestination'];
				$_SESSION['filterGuide']=$data['filterGuide'];
			}else{
				$data['filterDestination'] = $_SESSION['filterDestination'];
				$data['filterGuide'] = $_SESSION['filterGuide'];
			}

			$config['base_url'] = site_url('admin/filter_guide');
			$config['total_rows'] = $this->destination_model->countAllGuideSchedule($data['filterDestination'], $data['filterGuide']);
			$config['per_page'] = 6;
			$choice = 6;
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
			$data['schedules'] = $this->destination_model->getGuideSchedules($config['per_page'], $data['page'], $data['filterDestination'], $data['filterGuide']);
			$this->load->library('session');
			$id = $this->session->userdata('customer_id');
			$data['nama_profile'] = $this->model_user->getNameProfile(1)->full_name;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/jadwal_guide', $data);
			$this->load->view('footer');

		}else{
			$this->load->view('404');
		}
	}

	public function guide_edit(){
		if($this->session->userdata('role_id')==1){

			$guideschedule_id = $this->uri->segment(3);
			$data['guideschedule'] = $this->destination_model->getGuideSchedule($guideschedule_id);
			$data['guides'] = $this->destination_model->getGuideInDate($data['guideschedule']->date, $data['guideschedule']->return);
			$id = $this->session->userdata('customer_id');
			$data['nama_profile'] = $this->model_user->getNameProfile(1)->full_name;
			$this->load->view('admin/header', $data);
			$this->load->view('admin/edit_guide', $data);
			$this->load->view('footer');

		}else{
			$this->load->view('404');
		}
	}

	public function editJadwalGuide(){
		if($this->session->userdata('role_id')==1){
			$guideschedule_id = $this->uri->segment(3);
			$guide_id = $this->input->post('guide');
			$this->destination_model->updateJadwalGuide($guideschedule_id, $guide_id);
			redirect('admin/guide_edit/'.$guideschedule_id);

		}else{
			$this->load->view('404');
		}
	}

	public function booking(){
		if($this->session->userdata('role_id')==1){
			$this->load->library('pagination');

			$data['filterDestination']='';

			$config['base_url'] = site_url('admin/booking');
			$config['total_rows'] = $this->destination_model->countAllBooking($data['filterDestination']);
			$config['per_page'] = 6;
			$choice = 6;
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
			$data['bookings'] = $this->destination_model->getBookings($config['per_page'], $data['page'], $data['filterDestination']);
			$id = $this->session->userdata('customer_id');
			$data['nama_profile'] = $this->model_user->getNameProfile(1)->full_name;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/list_booking', $data);
			$this->load->view('footer');

		}else{
			$this->load->view('404');
		}
	}

	public function filter_booking(){
		if($this->session->userdata('role_id')==1){
			$this->load->library('pagination');

			if($this->input->post('submit')){
				$data['filterDestination'] = $this->input->post('filterDestination');

				$_SESSION['filterDestination']=$data['filterDestination'];
			}else{
				$data['filterDestination'] = $_SESSION['filterDestination'];
			}

			$config['base_url'] = site_url('admin/filter_booking');
			$config['total_rows'] = $this->destination_model->countAllBooking($data['filterDestination']);
			$config['per_page'] = 6;
			$choice = 6;
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
			$data['bookings'] = $this->destination_model->getBookings($config['per_page'], $data['page'], $data['filterDestination']);
			$id = $this->session->userdata('customer_id');
			$data['nama_profile'] = $this->model_user->getNameProfile(1)->full_name;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/list_booking', $data);
			$this->load->view('footer');

		}else{
			$this->load->view('404');
		}
	}
    
    public function add_trip(){
		if($this->session->userdata('role_id')==1){
			$departure = $this->input->post('departure');
			$day = $this->input->post('day');
			$night = $this->input->post('night');
			$guide1 = $this->input->post('guide1');
			$guide2 = $this->input->post('guide2');
			if(!($guide1==$guide2)){
				$inSchedule = $this->destination_model->inSchedule($departure, $day);
			}else{
				$inSchedule = 99;
			}
			if($inSchedule==0){
				$duration = $this->destination_model->getDurationID($day, $night);
				$duration_id = $duration->duration_id;
				$destination_id = $this->input->post('destination_id');
				$price = $this->input->post('price');
		
				$data = array(
					'price'			    => $price,
					'destination_id'	=> $destination_id,
					'duration_id'		=> $duration_id,
					'departure_date'	=> $departure,
				);
				$this->destination_model->input_trip($data);
				redirect('admin/perjalanan');
			}else{
				echo "JADWAL GUIDE BENTROK!"; die();
			}

		}else{
			$this->load->view('404');
		}
	}
	
	public function add_destination(){
		if($this->session->userdata('role_id')==1){
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
				redirect('admin');
			}else{
				echo "DESTINASI SUDAH ADA!"; die();
			}
			
		}else{
			$this->load->view('404');
		}
	}

	public function delete(){
		if($this->session->userdata('role_id')==1){
			$destination_id = $this->uri->segment(3);
			$this->destination_model->deleteDestination($destination_id);
			$this->destination_model->deleteDestination_trip($destination_id);
			redirect('admin');
		}else{
			$this->load->view('404');
		}

	}

	public function delete_perjalanan(){
		if($this->session->userdata('role_id')==1){
			$trip_id = $this->uri->segment(3);
			$this->destination_model->deleteTrip($trip_id);
			redirect('admin/perjalanan');
		}else{
			$this->load->view('404');
		}

	}

	public function detail_edit(){
		if($this->session->userdata('role_id')==1){
			$destination_id = $this->uri->segment(3);
			$data['destination'] = $this->destination_model->getDestination($destination_id);
			$id = $this->session->userdata('customer_id');
			$data['nama_profile'] = $this->model_user->getNameProfile(1)->full_name;
			$this->load->view('admin/header',$data);
			$this->load->view('admin/destination_detail', $data);
			$this->load->view('footer');
		}else{
			$this->load->view('404');
		}
	}

	public function update_bg(){
		if($this->session->userdata('role_id')==1){
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
		}else{
			$this->load->view('404');
		}
	}
}

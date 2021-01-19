<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class superadmin extends MY_Controller {

	public function dashboard(){
		
	$this->load->model('queries');
	$users=$this->queries->viewAllOrganisation();
	
	$this->load->view('dashboard',['users'=>$users]);
	}

	public function addorganisation(){

		$this->load->view('addorganisation');

	}

	public function CreateOrganisation(){
		$this->form_validation->set_rules('organisationname','Organisation Name','required');
		$this->form_validation->set_rules('subscription','Buy Subscription','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger','</div>');

		if($this->form_validation->run()){
			$data=$this->input->post();
			$this->load->model('queries');
			if($this->queries->makeOrganisation($data)){

				$this->session->set_flashdata('message','Organisation Created');


			}
			else{

				$this->session->set_flashdata('message','Organisation not Created');

			}
			return redirect("superadmin/addorganisation");
		}
		else{
			$this->addorganisation();
		}

	}
	
	public function addAdmin(){
			$this->load->model('queries');
		$roles=$this->queries->getRoles();
		$organisation=$this->queries->getOrganisation();
		$this->load->view('addAdmin',['roles'=>$roles,'organisation'=>$organisation]);

	}

	public function CreateAdmin(){
		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('organisation_id','Organisation Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('role_id','Role','required');

		
	
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_rules('passwordagain','Password Again','required');

		$this->form_validation->set_error_delimiters('<div class="text-danger','</div>');

	

		if($this->form_validation->run()){
			$data = $this->input->post();
			$data['password']=sha1($this->input->post('password'));
			$data['passwordagain']=sha1($this->input->post('passwordagain'));

			$this->load->model('queries');
			if($this->queries->registerAdmin($data)){
				$this->session->set_flashdata('message','Super Admin Registration Successfull');
				
			}
			else{
				$this->session->set_flashdata('message','Super Admin Registration failed');


			

			}
			return redirect("superadmin/addAdmin");

		}
		else{
			$this->addAdmin();
		}
		

	}

	public function addUser(){
		$this->load->model('queries');
		$organisation=$this->queries->getOrganisation();
		$this->load->view('addUser',['organisation'=>$organisation]);
	}

	public function CreateUser(){

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('organisation_id','Organisation Name','required');
		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('gender','Gender','required');
		$this->form_validation->set_rules('buysub','buysub','required');
		//$this->form_validation->set_error_delimiters('<div class="text-danger','</div>');

		if($this->form_validation->run()){


			$data = $this->input->post();

			$this->load->model('queries');
			if($this->queries->insertUser($data)){
				$this->session->set_flashdata('message','Super Admin Registration Successfull');
				
			}
			else{
				$this->session->set_flashdata('message','Super Admin Registration failed');


			

			}
			return redirect("superadmin/addUser");




			}
		
		else{
			$this->addUser();
		}


	}

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata("user_id"))
			return redirect("welcome/login");

	}


	}



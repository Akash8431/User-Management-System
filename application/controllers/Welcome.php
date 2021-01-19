<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

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
		$this->load->model('queries');
		$chkSuperadminExist=$this->queries->chkSuperadminExist();
		//echo $chkSuperadminExist;
		//exit();
		$this->load->view('home',['chkSuperadminExist'=>$chkSuperadminExist]);
	}

	public function superadminRegister(){
		$this->load->model('queries');
		$roles=$this->queries->getRoles();
		$this->load->view('register',['roles'=>$roles]);

	}
	public function superadminSignup(){
		$this->form_validation->set_rules('username','Username','required');
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
			if($this->queries->registerSuperadmin($data)){
				$this->session->set_flashdata('message','Super Admin Registration Successfull');
				return redirect("welcome/superadminRegister");

			}
			else{
				$this->session->set_flashdata('message','Super Admin Registration failed');


				return redirect("welcome/superadminRegister");

			}


		}
		else{
			$this->superadminRegister();
		}


		
	}

	public function login(){
		if($this->session->userdata("user_id"))
			return redirect("superadmin/dashboard");
		$this->load->view('login');
	}

	public function signin(){

		$this->form_validation->set_rules('email','Email','required');
		$this->form_validation->set_rules('password','Password','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger','</div>');


		if($this->form_validation->run()){
			$email=$this->input->post('email');
			$password=sha1($this->input->post('password'));
			$this->load->model('queries');
			$userExist=$this->queries->superadminExist($email,$password);
			
			if($userExist){
				$sessionData=[
					'user_id'=>$userExist->user_id,
					'username'=>$userExist->username,
					'email'=>$userExist->email,
					'role_id'=>$userExist->role_id,
				];
				$this->session->set_userdata($sessionData); 
				return redirect("superadmin/dashboard");
				
			}
			else{
				$this->session->set_flashdata('message','Email or Password is Incorrect');
				return redirect("welcome/login");
			}


		}
		else{
			$this->login();
		}
	}


public function logout(){
	$this->session->unset_userdata("user_id");
	return redirect("welcome/login");
}
}

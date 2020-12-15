<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

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

	public function emailbody($to,$subject,$message){
		$this->load->view('mailactive/index');	
		sendmails($to,$message,$subject);	
	}

	public function verify(){
		$email=base64_decode($_REQUEST['email']);
		$verifyd=$this->Main_model->verifyemail($email);	
		if($verifyd!=0){
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert">You are already verifyed your email.  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/recuiter_registration');


		}else{
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert">Email successfully verified.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/recuiter_registration');


		}
	}

	public function __construct() 
	{
        parent:: __construct();
        $this->load->helper('url','form');
        $this->load->library("pagination");
		$this->load->model('Main_model');
		$this->load->library('email');
		//$this->load->library('upload');
	}

	public function checkemail()
	{
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$table=$_POST['table'];
		$getcount=$this->Main_model->emailverification($email,$table,$mobile);
		if($getcount!=0){
			echo "true";
		}
		else{
			echo "false";

		}
	}

	public function forgotemail()
	{
		
	}

	public function checkmobile()
	{
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$table=$_POST['table'];
		$getcount=$this->Main_model->emailverification($email,$table,$mobile);
		if($getcount!=0){
			echo "true";
		}
		else{
			echo "false";

		}
	}

	public function index()
	{
		$this->load->view('templates/index');
	}



	public function about()
	{
		$this->load->view('templates/aboutus');
	}



	public function calls()
	{
		$this->load->view('templates/calls.php');
	}

	public function event()
	{
		$this->load->view('templates/events.php');
	}
	public function blog()
	{
		$this->load->view('templates/blogs.php');
	}

	public function login()
	{
		$this->load->view('templates/user_login.php');
	}

	public function user_register()
	{
		$this->load->view('templates/register.php');
	}
	public function terms_condition()
	{
		$this->load->view('templates/terms_condition.php');
	}
	public function contactus()
	{
		$this->load->view('templates/contactus.php');

		if($this->input->post('submit')){
			trim($this->form_validation->set_rules('name','name','required'));
			trim($this->form_validation->set_rules('email','email','required'));
			trim($this->form_validation->set_rules('subject','subject','required'));
			trim($this->form_validation->set_rules('message','message','required'));
			if($this->form_validation->run()==true){
				$contactus=array();
				$contactus['name']=$this->input->post('name');
				$contactus['email']=$this->input->post('email');
				$contactus['subject']=$this->input->post('subject');
				$contactus['message']=$this->input->post('message');
				$contactus['date_created']=date('Y-m-d h:i:s');
				$this->Main_model->contactus($contactus);
				$to=$contactus['email'];
				$subject='Contact Us Team From Castindia';
				$mess='';
				$mess.='<p>Dear '.$contactus['name'].'</p>';
				$mess.='<p>Thankyou for contacting us.We will get back as soon as possible.if any query email us <a href=to:'.EMAIL_FROM.'>'.EMAIL_FROM.'</a> </p>';
				$message=$mess;
				$this->emailbody($to,$subject,$message);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert">Successfull! Thankyou for contacting us. We will get in touch as soon as possible  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/contactus');
			}else{
				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Please fill out the fields and try again <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/contactus');
	
			}
		}
	}
	public function eventsdetail()
	{
		$this->load->view('templates/events_detail.php');
	}
	


	public function recuirter_login()
	{
		$this->load->view('templates/recuirter_login');
		if($this->input->post('forgotemail')){
			$email=$_POST['forgotemail'];
			$mobile='';
			$table='recruiter';
			$getcount=$this->Main_model->emailverification($email,$table,$mobile);
		if($getcount!=0){
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert">Send! Your password is successfully send to your email registered account <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/recuirter_login');
			
		}
		else{
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Please enter a valid registered email <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/recuirter_login');

		}
		}
	}

	public function recuiter_registration()
	{
		$this->load->view('templates/recuiter_registration');
		if($this->input->post('register')){
			

			$this->form_validation->set_rules('company_name','company_name','required');
			$this->form_validation->set_rules('firstname','firstname','required');
			$this->form_validation->set_rules('lastname','lastname','required');
			$this->form_validation->set_rules('contact_no','contact_no','required');
			$this->form_validation->set_rules('email','email','required');
			$this->form_validation->set_rules('gstno','gst','required');
			$this->form_validation->set_rules('panno','panno','required');
			
			if($this->form_validation->run()==true){
				$recuiter=array();
				$recuiter['firstname']=$this->input->post('firstname');
				$recuiter['lastname']=$this->input->post('lastname');
				$recuiter['contact_no']=$this->input->post('contact_no');
				$recuiter['email']=$this->input->post('email');
				$recuiter['gst']=$this->input->post('gstno');
				$recuiter['pan']=$this->input->post('panno');
				$recuiter['category']=$this->input->post('category');
				$recuiter['date_created']=date('Y-m-d h:m:s');
				$password=$this->input->post('password');
				$cpassword=$this->input->post('cpassword');
				$table="recruiter";
				$email=$this->input->post('email');
				$mobile=$this->input->post('contact_no');
				$getcount=$this->Main_model->emailverification($email,$table,$mobile);
				if($getcount==0){
				if($password==$cpassword){
					
					$to=$this->input->post('email');
					$subject="Successfully Registered With ".WEBSITE_NAME." ";
					$mess="";
					$mess.="<p>Dear ".$recuiter['firstname']." ".$recuiter['lastname'].",</p>";
					$mess.="<p>You are successfully registered with ".WEBSITE_NAME." as a applicant. Please click <a href='".base_url()."home/verify?email=".base64_encode($recuiter['email'])."'>here</a> to verify your email.</p>";
					$message=$mess;
					$this->emailbody($to,$subject,$message);
					$recuiter['password']=base64_encode($cpassword);
					$this->Main_model->addrecuiter($recuiter);
					$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert">You are successfully registered. Please check your email for email verification  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/recuiter_registration');
				}else{
					$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/recuiter_registration');

				}
				
			
				}
					$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! The email or contact no you entered is already registered with us<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/recuiter_registration');

				}else{
					$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'home/recuiter_registration');	



			}
		}
	}



}

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
	
	public function __construct() 
	{
        parent:: __construct();
        $this->load->helper('url','form');
        $this->load->library("pagination");
		$this->load->model('Admin_model');
		$this->load->library('email');
		//$this->load->library('upload');
		
	}

	

	public function delete(){
		$id=$_POST['id'];
		$table=$_POST['table'];
		$getrespons=$this->Admin_model->delete($id,$table);
		echo $getrespons;
		exit();

	}

	public function update(){
	    $id=$_POST['id'];
		$table=$_POST['table'];
		$status=$_POST['status'];
		$getresponss=$this->Admin_model->update($id,$table,$status);
		echo $getresponss;
		exit();

	}

	public function load_table(){
		$loadpage=$_REQUEST['loadpage'];
		$model=$_REQUEST['model'];
		$row=$this->Admin_model->$model();
		$row['row']=$row;
		$this->load->view('templates/admin/'.$loadpage,$row);
	}

	public function checkpassword(){
		$table=$_REQUEST['table'];
		$id=$_REQUEST['id'];
		$password=$_REQUEST['oldpassword'];
		$checkpass=$this->Admin_model->checkpassword($password,$table,$id);
		if($checkpass==1){
			echo "true";
		}else{
			echo "false";
		}
	}
	



	function thumb($width,$height,$imageurl2,$name)
	{
		//$imageurl2='./uploads/';
		$config['upload_path']          = $imageurl2;
		$config['allowed_types']        = 'gif|jpg|png';
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		//$config['max_size']      = 200;
		$config['max_width'] = $width;
		$config['max_height'] =$height;
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload', $config);
		
		
		
	}
	
	public function emailbody($to,$subject,$message){
		$this->load->view('mailactive/index');	
		sendmails($to,$message,$subject);	
	}
	 
	public function index()
	{
		$getadmin=$this->session->userdata('admin');
		$this->Admin_model->authtrue();
		$countr=$this->Admin_model->countrecruiter();
		
		$counta=$this->Admin_model->countapplicant();
		$countevent=$this->Admin_model->countevent();
		$countblog=$this->Admin_model->countblog();
		$countjob=$this->Admin_model->countjob();
		$getevent=$this->Admin_model->evntdashboard();
		
		$countra['countra']=$countr;
		$countrb['countrb']=$countevent;
		$countrc['countrc']=$countblog;
		$countrd['countrd']=$countjob;
		$countre['countre']=$counta;
		$geteventt['geteventt']=$getevent;
		$row=array_merge_recursive($countra,$countrb,$countrc,$countrd,$countre,$geteventt);
		$this->load->view('templates/admin/dashboard.php',$row);
		
	}

	public function sendemail(){
		$email=array();
		$to=$this->input->post('eemail');
		$email['user_id']=$this->input->post('eid');
		$email['subject']=$this->input->post('subject');
		$email['content']=$this->input->post('content');
		$email['user_type']=$this->input->post('usertype');
		
		$email['date_created']=date('Y-m-d h:i:sa');
		$getadmin=$this->session->userdata('admin');
		$email['sent_by']=$getadmin['idadmin'];
		$this->emailbody($to,$email['subject'],$email['content']);
		$getresponse=$this->Admin_model->emailinsert($email);
		if($getresponse==1){
			echo "true";

		}else{
			echo "false";
		}

	}


public function forgotpass()
	{
		trim($this->form_validation->set_rules('email','email','required'));
		if($this->form_validation->run()==true){
			$email=$this->input->post('email');
			$table="admin";
			$id="1";
			$check1=$this->Admin_model->checkadminemail($email,$table,$id);
			if($check1==1){
				$getpass=$this->Admin_model->sendpass($email,$table,$id);
				$to="shuklaharsh665@gmail.com";
				$subject="Request For Admin Password ".WEBSITE_NAME."";
				$message="Dear Admin,<br> your login password is :<strong>".$getpass['password']."</strong> ,if any query email us <a href='mailto:".EMAIL_FROM."'>".EMAIL_FROM."</a>";
				$this->emailbody($to,$subject,$message);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Email successfully send<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');redirect(base_url().'admin/login');
				
			}
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry! Invalid email id<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
			redirect(base_url().'admin/login');
		}
	}
	

	public function slider()
	{
		// All records count
	
		// Get records
		$filter='';
		$users_record = $this->Admin_model->getData($filter);
		$data['result'] = $users_record;
		$this->load->view('templates/admin/slider.php',$data);
	}

	public function login()
	{
		$this->Admin_model->authfalse();
		trim($this->form_validation->set_rules('email','email','required'));
		trim($this->form_validation->set_rules('password','password','required'));
		if($this->form_validation->run()==true){
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		$check=$this->Admin_model->checkusers($email,$password);
		if($check!=''){
		$sessArray['idadmin']= $check['id'];
		$sessArray['adminemail']= $check['email'];
		$this->session->set_userdata('admin',$sessArray);
		redirect(base_url().'admin');
		}else{
		
		$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Sorry! Invalid email and password<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
		</div>');
		redirect(base_url().'admin/login');

		}
		
		}else{$this->load->view('templates/admin/login.php');}




	}

	
	public function aboutus()
	{
		$this->Admin_model->authtrue();
		$getdata=$this->Admin_model->aboutus();
		$about['about']=$getdata;
		$this->load->view('templates/admin/aboutus.php',$about);
	}

	public function updateabout(){
	  $width=500;
	  $height=335;
	  $imageurl2='./uploads/about';
	  $name='profile_image';
	  $this->thumb($width,$height,$imageurl2,$name);
	  //$upload_data=$this->upload->do_upload($name);
	  
	  trim($this->form_validation->set_rules('content','content','required'));
	  if($this->form_validation->run()==true){
	    $this->upload->do_upload('profile_image');
		$upload_data=$this->upload->data();
		$oldimage=$this->input->post('oldimage');
	    $about=array();
	    if($upload_data['file_name']!=''){
		$about['image']=$upload_data['file_name'];
		unlink('uploads/about/'.$oldimage);
		}else{
		$about['image']=$oldimage;
		}
		$about['content']=$this->input->post('content');
		$this->Admin_model->updateaboutus($about);
		$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Records successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/aboutus');	
	}else{
		$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/aboutus');	
	}

	}
	
	public function industriesone()
	{   
		$this->Admin_model->authtrue();
		$industriesone=$this->Admin_model->industriesone();
		$industriesone['industrisone']=$industriesone;
		$this->load->view('templates/admin/industries1.php',$industriesone);
	}

	public function updateindustreone(){
		trim($this->form_validation->set_rules('title','title','required'));
		trim($this->form_validation->set_rules('description','description','required'));
		trim($this->form_validation->set_rules('url','url','required'));
		trim($this->form_validation->set_rules('content','content','required'));
		if($this->form_validation->run()==true){
			$industiesone=array();
			$industries['title']=$this->input->post('title');
			$industries['description']=$this->input->post('description');
			$industries['url']=$this->input->post('url');
			$industries['content']=$this->input->post('content');
			$this->Admin_model->updateindustrieone($industries);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Records successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/industriesone');

		}else{
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/industriesone');	

		}

	}
   

	public function industriestwo()
	{   
		$this->Admin_model->authtrue();
		$industriestwo=$this->Admin_model->industriestwo();
		$industriestwo['getdata']=$industriestwo;
		$this->load->view('templates/admin/industries2.php',$industriestwo);
	}

	public function updateindustriestwo()
	{ 
		$this->Admin_model->authtrue();
		trim($this->form_validation->set_rules('utitle','utitle','required'));
		trim($this->form_validation->set_rules('uid','uid','required'));
		trim($this->form_validation->set_rules('udescription','udescription','required'));
		trim($this->form_validation->set_rules('ucontent','ucontent','required'));
		if($this->form_validation->run()==true){
			$industwo=array();
			$industwo['id']=$this->input->post('uid');
			$industwo['title']=$this->input->post('utitle');
			$industwo['description']=$this->input->post('udescription');
			$industwo['content']=$this->input->post('ucontent');
			$industriestwo=$this->Admin_model->updateindtwo($industwo);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
			Records successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/industriestwo');


		}else{
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/industriestwo');	

			
		}


	}

	public function artist()
	{   
		$this->Admin_model->authtrue();
		$row=$this->Admin_model->artist();
		$row['row']=$row;
		$width=300;
		$height=500;
		$imageurl2='./uploads/artist';
		

		if($this->input->post('add')){
			
			$this->form_validation->set_rules('name','name','required');
			$this->form_validation->set_rules('position','position','required');
			if($this->form_validation->run()==true){
				$name='profile_image';
				$this->thumb($width,$height,$imageurl2,$name);
				$artist=array();
				$artist['name']=$this->input->post('name');
				$artist['position']=$this->input->post('position');
				$this->upload->do_upload('profile_image');
				$upload_data=$this->upload->data();
				$artist['image']=$upload_data['file_name'];
				$this->Admin_model->addartist($artist);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
				Records successfully added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
				redirect(base_url().'admin/artist');


			}else{
				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/artist');	



		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/artist');

	}

	       if($this->input->post('update')){

			trim($this->form_validation->set_rules('uname','uname','required'));
			trim($this->form_validation->set_rules('uposition','uposition','required'));
					if($this->form_validation->run()==true){
						$name='profile_image2';
						$this->thumb($width,$height,$imageurl2,$name);
						$updateartist=array();
						$this->upload->do_upload('profile_image2');
						$upload_data=$this->upload->data();
						$oldimage=$this->input->post('oldimage');
						$updateartist['name']=trim($this->input->post('uname'));
						$updateartist['id']=trim($this->input->post('uid'));
						$updateartist['position']=trim($this->input->post('uposition'));
						$upload_data['file_name'];
						if($upload_data['file_name']!=''){
						$updateartist['image']=$upload_data['file_name'];
						unlink('uploads/artist/'.$oldimage);
						}else{
						$updateartist['image']=$oldimage;
						}
						$this->Admin_model->updateartist($updateartist);
						$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Records successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');redirect(base_url().'admin/artist');
		
					}else{
						$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/artist');	
		
		
		
				}
		
		
			}


		$this->load->view('templates/admin/artist.php',$row);
	}


	public function slider_content()
	{
		$this->Admin_model->authtrue();
		$row=$this->Admin_model->slider_content();
		$row['row']=$row;
		$width=584;
		$height=448;
		$imageurl2='./uploads/slider_content';

		if($this->input->post('add')){
			
			trim($this->form_validation->set_rules('content','content','required'));
			trim($this->form_validation->set_rules('title','title','required'));
			if($this->form_validation->run()==true){
				$name='profile_image';
				$this->thumb($width,$height,$imageurl2,$name);
				$slidercontent=array();
				$slidercontent['content']=trim($this->input->post('content'));
				$slidercontent['title']=trim($this->input->post('title'));
				$this->upload->do_upload('profile_image');
				$upload_data=$this->upload->data();
				$slidercontent['image']=$upload_data['file_name'];
				$this->Admin_model->addslidercontent($slidercontent);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
				Records successfully added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
				redirect(base_url().'admin/slider_content');


			}else{
				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/slider_content');	



		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/artist');

	}


	if($this->input->post('update')){

		trim($this->form_validation->set_rules('ucontent','ucontent','required'));
		trim($this->form_validation->set_rules('utitle','utitle','required'));
		if($this->form_validation->run()==true){
			$name='profile_image2';
			$this->thumb($width,$height,$imageurl2,$name);
			$updateslidercontent=array();
			$this->upload->do_upload('profile_image2');
			$upload_data=$this->upload->data();
			$oldimage=$this->input->post('oldimage');
			$updateslidercontent['title']=$this->input->post('utitle');
			$updateslidercontent['id']=$this->input->post('uid');
			$updateslidercontent['content']=$this->input->post('ucontent');
			
			if($upload_data['file_name']!=''){
			$updateslidercontent['image']=$upload_data['file_name'];
			unlink('uploads/slider_content/'.$oldimage);
			}else{
			$updateslidercontent['image']=$oldimage;
			}
			$this->Admin_model->updateslidercontent($updateslidercontent);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Records successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');redirect(base_url().'admin/slider_content');

		}else{
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/slider_content');	



	}


}


		$this->load->view('templates/admin/slider_content.php',$row);
	}

	public function logout()
	{
  
		$this->session->unset_userdata('admin');
		$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
		Logout Successfull!<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/login');
		  
	}

	public function recuiter_list(){
		 
		$this->Admin_model->authtrue();
		$row=$this->Admin_model->recuiter();
		$row['row']=$row;
		$this->load->view('templates/admin/recuirter.php',$row);
	}

	public function jobs_list(){
		 
		$this->Admin_model->authtrue();
		$row=$this->Admin_model->requirterjobs();
		$row['row']=$row;
		$this->load->view('templates/admin/jobs.php',$row);
	}


	function job_details(){
		$this->Admin_model->authtrue();
		$id=base64_decode($_REQUEST['token']);
		$profile=$this->Admin_model->jobs_details($id);
		$profile['profile']=$profile;
		$rows=$this->Admin_model->getprofile($profile['profile_ids']);
		$rows['rows']=$rows;
		$row=$this->Admin_model->applicant($profile['id']);
		$row['row']=$row;
		$getvalue=array_merge_recursive($profile,$rows,$row);
		$this->load->view('templates/admin/view_job.php',$getvalue);
	}

	function events(){
		$this->Admin_model->authtrue();
		$row=$this->Admin_model->events();
		$row['row']=$row;
	

		if($this->input->post('add')){
			trim($this->form_validation->set_rules('event','event','required'));
			if($this->form_validation->run()==true){
				$events=array();
				$events['name']=trim($this->input->post('event'));
				$events['date_created']=date('Y-m-d h:i:s');
				$this->Admin_model->addevent($events);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Records successfully added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/events');
			}else{

				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/events');


			}
			

		}

		if($this->input->post('update')){
			trim($this->form_validation->set_rules('uevent','uevent','required'));
			//trim($this->form_validation->set_rules('uevent','uevent','required'));
			if($this->form_validation->run()==true){
				$events=array();
				$events['name']=trim($this->input->post('uevent'));
				$events['id']=$this->input->post('uid');
				
				//$events['date_created']=date('Y-m-d h:i:s');
				$this->Admin_model->updateevent($events);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Records successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/events');
			}else{

				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/events');


			}
			

		}

		$this->load->view('templates/admin/events.php',$row);
	}


	function view_events(){
		//$id=base64_decode($_REQUEST['token']);
		$row=$this->Admin_model->view_events();
		$row['row']=$row;
		$this->load->view('templates/admin/view_event.php',$row);
	}

	function detail_events(){
		$id=base64_decode($_REQUEST['token']);
		$evntsdwtails=$this->Admin_model->details_events($id);
		$eventsusers=$this->Admin_model->eventusers($id);
		$getcatagories2=$this->Admin_model->getcatagories($evntsdwtails['event_category_id']);
		$getcatagories['getcatagories1']=$getcatagories2;
		$evntsdwtails['evntsdwtails']=$evntsdwtails;
		$eventsuser['eventsuser']=$eventsusers;
		
		$evntsdetailssss=array_merge_recursive($evntsdwtails,$eventsuser,$getcatagories);
		$this->load->view('templates/admin/detail_events.php',$evntsdetailssss);
	}

	function blog_catagories(){
		$row=$this->Admin_model->blog_catagories();
		$row['row']=$row;
		$this->load->view('templates/admin/blog_catagory.php',$row);
		
		if($this->input->post('add')){
		trim($this->form_validation->set_rules('blog','blog','required'));
		
		if($this->form_validation->run()==true){
			$blogs=array();
			$blogs['name']=trim($this->input->post('blog'));
			$blogs['date_created']=date('Y-m-d h:i:s');
			$this->Admin_model->addblogs($blogs);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Records successfully added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/blog_catagories');
			//$events['id']=$this->input->post('uid');

		}else{
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/blog_catagories');
		}
	   }


	   if($this->input->post('update')){
		trim($this->form_validation->set_rules('ublog','ublog','required'));
		trim($this->form_validation->set_rules('uid','uid','required'));
		
		if($this->form_validation->run()==true){
			$ublogs=array();
			$ublogs['name']=trim($this->input->post('ublog'));
			$ublogs['id']=trim($this->input->post('uid'));
			
			//$blogs['date_created']=date('Y-m-d h:i:s');
			$this->Admin_model->uaddblogs($ublogs);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Records successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/blog_catagories');
			//$events['id']=$this->input->post('uid');

		}else{
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/blog_catagories');
		}
	   }


	}

	function blog_list(){
		$row=$this->Admin_model->blog_list();
		$row['row']=$row;
		$this->load->view('templates/admin/blog_list.php',$row);
	}

	function details_blogs(){
		$id=base64_decode($_REQUEST['token']);
		$row1=$this->Admin_model->detail_blog($id);
		$rows['rows']=$row1;
		$getcatagories2=$this->Admin_model->getcatagoriesblog($row1['blog_category_id']);
		$getcatagories['getcatagories1']=$getcatagories2;
		$row=array_merge_recursive($rows,$getcatagories);
		$this->load->view('templates/admin/detail_blogs.php',$row);	
	}

	public function applicant_list(){
		 
		$this->Admin_model->authtrue();
		$row=$this->Admin_model->applicant_list();
		$row['row']=$row;
		$this->load->view('templates/admin/applicant.php',$row);

	}

	public function view_applicant(){
		$id=base64_decode($_REQUEST['token']);
		$row=$this->Admin_model->app_details($id);
		$row['row']=$row;
		//print_r($row);
		$this->load->view('templates/admin/view-applicant.php',$row);
	}

	public function profile(){
		$row=$this->Admin_model->admin_details();
		$row['row']=$row;
		
		if($this->input->post('updateprofile')){
			
			trim($this->form_validation->set_rules('firstname','firstname','required'));
			trim($this->form_validation->set_rules('lastname','lastname','required'));
			trim($this->form_validation->set_rules('mobile','mobile','required'));
			trim($this->form_validation->set_rules('semail','semail','required'));
			trim($this->form_validation->set_rules('address','address','required'));
			trim($this->form_validation->set_rules('googlemap','googlemap','required'));
			if($this->form_validation->run()==true){
				$admupdate=array();
				$admupdate['firstname']=$this->input->post('firstname');
				$admupdate['lastname']=$this->input->post('lastname');
				$admupdate['email']=$this->input->post('pemail');
				$admupdate['s_email']=$this->input->post('semail');
				$admupdate['mobile']=$this->input->post('mobile');
				$admupdate['whatsapp']=$this->input->post('whatsappno');
				$admupdate['facebook']=$this->input->post('facebookurl');
				$admupdate['instagram']=$this->input->post('instagramurl');
				$admupdate['google']=$this->input->post('googleurl');
				$admupdate['address']=$this->input->post('address');
				$admupdate['googlemap']=$this->input->post('googlemap');

				
				$this->Admin_model->update_details($admupdate);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Profile successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/profile');

			}else{
				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/profile');

			}
		}

		if($this->input->post('passupdate')){
			trim($this->form_validation->set_rules('oldpassword','oldpassword','required'));
			trim($this->form_validation->set_rules('newpassword','newpassword','required'));
			trim($this->form_validation->set_rules('confirmpassword','confirmpassword','required'));
			if($this->form_validation->run()==true){
				$pasword=array();
				$password['password']=$this->input->post('confirmpassword');
				$oldpass=$this->input->post('oldpassword');
				$id='1';
				$table='admin';
				$checkpass=$this->Admin_model->checkpassword($oldpass,$table,$id);
				if($checkpass==0){
					$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please enter valid old password<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/profile');

				}else{
					$this->Admin_model->update_details($password);
					$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Profile successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/profile');

				}




			}

		}
		$this->load->view('templates/admin/profile.php',$row);
	}




}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() 
	{
        parent:: __construct();
        $this->load->helper('url','form');
        $this->load->library("pagination");
		$this->load->model('Admin_model');
		$this->load->library('email');
		//$this->load->library('upload');
		$this->load->view('library/upload.php');
		//$this->load->library('upload');
    	$this->load->library('image_lib');
		
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
		$recruiter_id=$_POST['recruiter_id'];
		$type_user=$_POST['type_user'];

		if($type_user!=''){
			$getuser=$_POST['type_user'];
	   }else{
		   $getuser='';
	   }
		
		if($recruiter_id!=''){
			 $getricid=$_POST['recruiter_id'];
		}else{
			$getricid='';
		}
		$getresponss=$this->Admin_model->update($id,$table,$status,$getricid,$getuser);
		echo $getresponss;
		exit();

	}

	public function load_table(){
		$loadpage=$_REQUEST['loadpage'];
	    $model=$_REQUEST['model'];
		
		$row=$this->Admin_model->$model();
		$row['row']=$row;
		//$mergedata=array_merge_recursive($notify,$row);
		$this->load->view('templates/admin/'.$loadpage,$row);
	}

	public function load_tabletwo(){
		$loadpage=$_REQUEST['loadpage'];
		$model=$_REQUEST['model'];
		$catid=$_REQUEST['catid'];
		
		$row=$this->Admin_model->$model($catid);
		$row['row']=$row;
		
		//$mergedata=array_merge_recursive($notify,$row);
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
	



	function thumb($width,$height,$imageurl2,$name,$temp)
	{
		$sizex =$width;
		$sizey =$height;
		$ext=explode(".",$name);
		$url=$imageurl2."/". str_replace(" ","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
		$url2=str_replace(" ","",sha1($name.time()).".".$ext[sizeof($ext)-1]);
		move_uploaded_file($temp,$url);
		$x=$sizex;
		$y=$sizey;
		$image=imagename($url2,$x,$y);
		imagemulitple($url,$x,$y);
		unlink($url);
		$getimagename=$image;
		return $getimagename;
	}


	
	public function emailbody($sendfrom,$to,$subject,$message){
		$this->load->view('mailactive/index');	
		sendmails($sendfrom,$to,$message,$subject);	
	}

	public function loadnotication(){
		$noti=$this->Admin_model->adminnotification();
		$rec=$this->Admin_model->recuiter();
		$app=$this->Admin_model->applicant_list();
		$eve=$this->Admin_model->view_events();
		$job=$this->Admin_model->requirterjobs();
		$countall=$this->Admin_model->adminnotifycount();

	
		$countalls['countalls']=$countall;
		$notify['notify']=$noti;
		$recc['recc']=$rec;
		$jobb['jobb']=$job;
		$appp['appp']=$app;
		$evee['evee']=$eve;
		$countsss=array_merge_recursive($notify,$countalls,$recc,$appp,$evee,$jobb);
		$this->load->view('templates/admin/notify.php',$countsss);
	}
	 
	public function index()
	{
		$getadmin=$this->session->userdata('admin');
		$this->Admin_model->authtrue();
		//$countr=$this->Admin_model->countrecruiter();
		//$counta=$this->Admin_model->countapplicant();
		// $countevent=$this->Admin_model->countevent();
		// $countblog=$this->Admin_model->countblog();
		// $countjob=$this->Admin_model->countjob();
		// $getevent=$this->Admin_model->evntdashboard();
		
		$countra['countra']=$countr;
		$countrb['countrb']=$countevent;
		$countrc['countrc']=$countblog;
		$countrd['countrd']=$countjob;
		$countre['countre']=$counta;
		$geteventt['geteventt']=$getevent;

		$rowss=array_merge_recursive($countra,$countrb,$countrc,$countrd,$countre,$geteventt);
		$this->load->view('templates/admin/dashboard.php',$rowss);
		
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
		$height=350;
		$imageurl2='./uploads/about';
		$name=$_FILES["profile_image"]["name"];
		$temp=$_FILES["profile_image"]["tmp_name"];
		$oldimage=$this->input->post('oldimage');
		if($name!=''){echo $imagename=$this->thumb($width,$height,$imageurl2,$name,$temp); unlink($imageurl2.'/'.$oldimage);}else{
			$imagename=$oldimage;
		}
		
		
		//$upload_data=$this->upload->do_upload($name);
		
		trim($this->form_validation->set_rules('content','content','required'));
		if($this->form_validation->run()==true){
		  
		
		  
		$about=array();
	    $about['image']=$imagename;
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
				
		        $name=$_FILES["sliderimage"]["name"];
				$temp=$_FILES["sliderimage"]["tmp_name"];
				
				if($name!=''){$imagename=$this->thumb($width,$height,$imageurl2,$name,$temp);}
				$slidercontent=array();
				$slidercontent['content']=trim($this->input->post('content'));
				$slidercontent['title']=trim($this->input->post('title'));
				
				$slidercontent['image']=$imagename;
				
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
			$oldimage=$this->input->post('oldimage');
			$name=$_FILES["profile_imagetwo"]["name"];
			$temp=$_FILES["profile_imagetwo"]["tmp_name"];
			if($name!=''){$imagename=$this->thumb($width,$height,$imageurl2,$name,$temp); unlink($imageurl2.'/'.$oldimage);}else{
				$imagename=$oldimage;
			}
			$updateslidercontent=array();
			
			$updateslidercontent['image']=$imagename;
			$updateslidercontent['title']=$this->input->post('utitle');
			$updateslidercontent['id']=$this->input->post('uid');
			$updateslidercontent['content']=$this->input->post('ucontent');
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
		$this->Admin_model->authtrue();
		
		$this->load->view('templates/admin/view_event.php');
	}

	function detail_events(){
		$this->Admin_model->authtrue();
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
	public function add_blog(){
		$this->Admin_model->authtrue();
		$this->load->view('templates/admin/add_blog.php');
	}
	public function edit_blog($id){
		$this->Admin_model->authtrue();
		$page_data['edit_blog'] = $this->db->get_where('blogs', array('id'=>$id))->row_array();
		$this->load->view('templates/admin/edit_blog.php',$page_data);
	}
	public function do_resize($filename)
	{

	    

<<<<<<< HEAD

	}
	public function save_blog(){
				$this->Admin_model->authtrue();
				 $config['upload_path'] = 'images/blog';
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['max_size'] = '2048000';
                $this->load->library('upload', $config);
                if($this->upload->do_upload('blog_images')){
                    $file = $this->upload->data();
                    
                
                    $source_path =  'images/' . $filename;
	    			$target_path =  'images/blog/thumb_'.$filename;
                    
				    $config_manip = array(

				        'image_library' => 'gd2',
				        'source_image' => $source_path,
				        'new_image' => $target_path,
				        'maintain_ratio' => TRUE,
				        'width' => 1200,
				        'height' => 710
				    );
				    $this->image_lib->initialize($config_manip);
				    $this->load->library('image_lib', $config_manip);
				    //print_r($config_manip);die();
				    $data['blog_images'] = $file['file_name'];
                }
                else{
                    $error = array('error' => $this->upload->display_errors());
                    /*print_r($error); exit();*/
                }

=======

	}
	public function save_blog(){
				$this->Admin_model->authtrue();
				 $config['upload_path'] = 'images/blog';
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['max_size'] = '2048000';
                $this->load->library('upload', $config);
                if($this->upload->do_upload('blog_images')){
                    $file = $this->upload->data();
                    $data['blog_images'] = $file['file_name'];
                
                    $source_path =  'images/' . $filename;
	    			$target_path =  'images/blog/thumb_'.$filename;

				    $config_manip = array(

				        'image_library' => 'gd2',
				        'source_image' => $source_path,
				        'new_image' => $target_path,
				        'maintain_ratio' => TRUE,
				        'width' => 1200,
				        'height' => 710
				    );
				    $this->image_lib->initialize($config_manip);
				    $this->load->library('image_lib', $config_manip);
                }
                else{
                    $error = array('error' => $this->upload->display_errors());
                    /*print_r($error); exit();*/
                }

>>>>>>> c40f2341efec47e3db7c4855a36440f3313179c7
                $data['blog_title'] = $this->input->post('blog_title');
                $data['description'] = $this->input->post('description');
                $data['short_desc'] = $this->input->post('short_desc');
                $data['blog_category_id'] = $this->input->post('blog_category_id');
                
<<<<<<< HEAD
                $page_data['save_blog'] = $this->Admin_model->save_blog($data);
=======
                $page_data['save_blog'] = $this->Backend_Model->save_blog($data);
>>>>>>> c40f2341efec47e3db7c4855a36440f3313179c7
                redirect('admin/blog_list', $page_data);
	}
	function blog_list(){
		$this->Admin_model->authtrue();
		$row=$this->Admin_model->blog_list();
		$row['row']=$row;
		$this->load->view('templates/admin/blog_list.php',$row);
	}
    public function update_blog($id){
				$this->Admin_model->authtrue();
				 $config['upload_path'] = 'images/blog';
                $config['allowed_types'] = 'gif|jpeg|jpg|png';
                $config['max_size'] = '2048000';
                $this->load->library('upload', $config);
                if($this->upload->do_upload('blog_images')){
                    $file = $this->upload->data();
                    $data['blog_images'] = $file['file_name'];
                
                    $source_path =  'images/' . $filename;
	    			$target_path =  'images/blog/thumb_'.$filename;

				    $config_manip = array(

				        'image_library' => 'gd2',
				        'source_image' => $source_path,
				        'new_image' => $target_path,
				        'maintain_ratio' => TRUE,
				        'width' => 1200,
				        'height' => 710
				    );
				    $this->image_lib->initialize($config_manip);
				    $this->load->library('image_lib', $config_manip);
                }
                else{
                    $error = array('error' => $this->upload->display_errors());
                    /*print_r($error); exit();*/
                }

                $data['blog_title'] = $this->input->post('blog_title');
                $data['description'] = $this->input->post('description');
                $data['short_desc'] = $this->input->post('short_desc');
                $data['blog_category_id'] = $this->input->post('blog_category_id');
                
                $page_data['update_blog'] = $this->Admin_model->update_blog($data, $id);
                redirect('admin/blog_list', $page_data);
	}
	function details_blogs(){
		$this->Admin_model->authtrue();
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
		$this->Admin_model->authtrue();
		$id=base64_decode($_REQUEST['token']);
		$row=$this->Admin_model->app_details($id);
		$row['row']=$row;
		//print_r($row);
		$this->load->view('templates/admin/view-applicant.php',$row);
	}

	public function profile(){
		$this->Admin_model->authtrue();
		$row=$this->Admin_model->admin_details();
		$row['row']=$row;
		
		if($this->input->post('updateprofile')){
			
			trim($this->form_validation->set_rules('firstname','firstname','required'));
			trim($this->form_validation->set_rules('lastname','lastname','required'));
			trim($this->form_validation->set_rules('mobile','mobile','required'));
			trim($this->form_validation->set_rules('semail','semail','required'));
			trim($this->form_validation->set_rules('addressone','addressone','required'));
			trim($this->form_validation->set_rules('addresstwo','addresstwo','required'));
			trim($this->form_validation->set_rules('googlemap','googlemap','required'));
			trim($this->form_validation->set_rules('keyword','keyword','required'));
			trim($this->form_validation->set_rules('description','description','required'));
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
				$admupdate['twitter']=$this->input->post('twitterurl');
				$admupdate['linkdin']=$this->input->post('linkdinurl');
		
				$admupdate['googlemap']=$this->input->post('googlemap');
				$admupdate['keyword']=$this->input->post('keyword');
				$admupdate['description']=$this->input->post('description');
				$admupdate['cityone']=$this->input->post('cityone');
				$admupdate['citytwo']=$this->input->post('citytwo');
				$admupdate['addressone']=$this->input->post('addressone');
				$admupdate['addresstwo']=$this->input->post('addresstwo');

				
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
	public function contact_us(){
		$this->Admin_model->authtrue();
		$row=$this->Admin_model->contactus();
		$row['row']=$row;
		$this->load->view('templates/admin/contactus.php');

	}

	public function view_recruiter(){
		$this->Admin_model->authtrue();
		$id=base64_decode($_REQUEST['token']); 
		$rows=$this->Admin_model->view_recuiter($id);
		$row['row']=$rows;
		$this->load->view('templates/admin/view_recruiter.php',$row);
	}

	public function super_model(){
		$this->Admin_model->authtrue();
		$rows=$this->Admin_model->super_model();
		$row['row']=$rows;
		$this->load->view('templates/admin/supermodel.php',$row);

	}

	public function terms_conditions(){
		$this->Admin_model->authtrue();
		$id=1;
		$rows=$this->Admin_model->terms_condition($id);
		$row['row']=$rows;
	

		if($this->input->post('update')){
			trim($this->form_validation->set_rules('content','content','required'));
			if($this->form_validation->run()==true){
				$termscon=array();
				
				$termscon['content']=$this->input->post('content');
				$this->Admin_model->updatetermcon($termscon,$id);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record updated successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/terms_conditions');


			}else{
				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/terms_conditions');

			}

		}

		$this->load->view('templates/admin/terms_condition.php',$row);

	}

	public function rec_terms_conditions(){

		$this->Admin_model->authtrue();
		$id=3;
		$rows=$this->Admin_model->terms_condition($id);
		$row['row']=$rows;
	

		if($this->input->post('update')){
			trim($this->form_validation->set_rules('content','content','required'));
			if($this->form_validation->run()==true){
				$termscon=array();
				$termscon['content']=$this->input->post('content');
			
				$this->Admin_model->updatetermcon($termscon,$id);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record updated successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/rec_terms_conditions');


			}else{
				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/rec_terms_conditions');

			}

		}

		$this->load->view('templates/admin/rec_terms_conditions.php',$row);

	}

	public function app_terms_conditions(){

		$this->Admin_model->authtrue();
		$id=2;
		$rows=$this->Admin_model->terms_condition($id);
		$row['row']=$rows;
	

		if($this->input->post('update')){
			trim($this->form_validation->set_rules('content','content','required'));
			if($this->form_validation->run()==true){
				$termscon=array();
				$termscon['content']=$this->input->post('content');
			
				$this->Admin_model->updatetermcon($termscon,$id);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record updated successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/app_terms_conditions');


			}else{
				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/app_terms_conditions');

			}

		}

		$this->load->view('templates/admin/app_terms_conditions.php',$row);

	}

	public function add_events(){
		$this->Admin_model->authtrue();
        $getcat=$this->Admin_model->events();
        $subcat=$this->Admin_model->sub_catagory();
        $city=$this->Admin_model->city();
        $suball['suball']=$subcat;
        $allcat['allcat']=$getcat;
        $ccity['ccity']=$city;
        $allvall=array_merge_recursive($allcat,$suball,$ccity);
        $this->load->view('templates/admin/add_event.php',$allvall);
        if($this->input->post('add')){
            trim($this->form_validation->set_rules('title','title','trim|required'));
            trim($this->form_validation->set_rules('catagory[]','catagory','trim|required'));
            trim($this->form_validation->set_rules('sub_cat','sub_cat','trim|required'));
            trim($this->form_validation->set_rules('type','type','trim|required'));
            trim($this->form_validation->set_rules('startdate','startdate','trim|required'));
            trim($this->form_validation->set_rules('address','address','trim|required'));
            //trim($this->form_validation->set_rules('image[]','image','required'));
            trim($this->form_validation->set_rules('description','description','trim|required'));
            trim($this->form_validation->set_rules('termcond','termcond','trim|required'));
            trim($this->form_validation->set_rules('sub_cat','sub_cat','trim|required'));
            trim($this->form_validation->set_rules('addcity','location','trim|required'));
            
            if (empty($_FILES['image']['name']))
            {
                $this->form_validation->set_rules('image[]', 'image', 'required');
            }
            if (empty($_FILES['bimage']['name']))
            {
                $this->form_validation->set_rules('bimage', 'bimage', 'required');
            }
            
			if($this->form_validation->run()==true){
                $data=array();
                $data['event_title']=trim($this->input->post('title'));
                $getcat=$_POST['catagory'];
               
                $allcats.='';
                if($getcat!=''){
                    foreach($getcat as $cats){
                        $allcats.=$cats.',';
                    }
                }
                $gimage="";
                foreach($_FILES["image"]["tmp_name"] as $key=>$tmp_name) {
                    $file_name=$_FILES["image"]["name"][$key];
                    $file_tmp=$_FILES["image"]["tmp_name"][$key];
                        if($file_name!='')
                        {
                        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
                        $filename=basename($file_name,$ext);
                        $newFileName=$filename.time().".".$ext;
                        $gimage.=$newFileName.',';
                        $url="./uploads/events/".$newFileName;
                        move_uploaded_file($file_tmp,$url);
                        $max_dimm = 500;
                        createResized($url, $url, $max_dimm);
                        }
                }
               
                if( ($_FILES['bimage']['name']!='') )
                { 
                        $sizex =1920;
                        $sizey =400;
                        $ext=explode(".",$_FILES["bimage"]["name"]);
                        $url="./uploads/events/bimage/". str_replace(" ","",sha1($_FILES["bimage"]["name"].time()).".".$ext[sizeof($ext)-1]);
                        $url2=str_replace(" ","",sha1($_FILES["bimage"]["name"].time()).".".$ext[sizeof($ext)-1]);
                        move_uploaded_file($_FILES["bimage"]["tmp_name"],$url);
                        $x=$sizex;
                        $y=$sizey;
                        $image=imagename($url2,$x,$y);
                        imagemulitple($url,$x,$y);
                        unlink($url);
                }
               
                
                $data['event_category_id']=rtrim($allcats,',');
                $data['event_type_id']=trim($this->input->post('sub_cat'));
                $data['event_type']=trim($this->input->post('type'));
                $data['event_price']=trim($this->input->post('price'));
                $data['startdate']=trim($this->input->post('startdate'));
                $data['enddate']=trim($this->input->post('enddate'));
                $data['address']=trim($this->input->post('address'));
                $data['termsandconditions']=trim($this->input->post('termcond'));
                $data['description']=trim($this->input->post('description'));
                $data['location']=trim($this->input->post('addcity'));
                $data['gallary_images']=rtrim($gimage,',');
                $data['event_image']=$image;
                $data['date_created']=date('Y-m-d h:i:s');
				$this->Admin_model->addevents($data);
				
                $this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record successfully added<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/view_events');
                   
        }
            $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/add_events');

        }
	}
	
	public function team(){
		$this->Admin_model->authtrue();
		$this->load->view('templates/admin/team.php');
		$width=264.2;
		$height=264;
		$imageurl2='./uploads/team';
		

		if($this->input->post('add')){
			
			trim($this->form_validation->set_rules('fullname','fullname','required'));
			trim($this->form_validation->set_rules('position','position','required'));
			
			if($this->form_validation->run()==true){
				
		        $name=$_FILES["sliderimage"]["name"];
				$temp=$_FILES["sliderimage"]["tmp_name"];
				
				if($name!=''){$imagename=$this->thumb($width,$height,$imageurl2,$name,$temp);}
				$team=array();
				$team['name']=trim($this->input->post('fullname'));
				$team['position']=trim($this->input->post('position'));
				$team['image']=$imagename;
				
				$this->Admin_model->addteam($team);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
				Records successfully added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
				redirect(base_url().'admin/team');


			}else{
				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/team');	



		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/team');

	}


	if($this->input->post('update')){

		trim($this->form_validation->set_rules('ufullname','fullname','required'));
		trim($this->form_validation->set_rules('uposition','position','required'));
		if($this->form_validation->run()==true){
			$oldimage=$this->input->post('oldimage');
			$name=$_FILES["profile_imagetwo"]["name"];
			$temp=$_FILES["profile_imagetwo"]["tmp_name"];
			if($name!=''){$imagename=$this->thumb($width,$height,$imageurl2,$name,$temp); unlink($imageurl2.'/'.$oldimage);}else{
				$imagename=$oldimage;
			}
			$uteam=array();
			
			$uteam['image']=$imagename;
			$uteam['name']=$this->input->post('ufullname');
			$idd=$this->input->post('uid');
			$uteam['position']=$this->input->post('uposition');
			$this->Admin_model->uteam($uteam,$idd);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Records successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');redirect(base_url().'admin/team');

		}else{
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/team');	



	}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/team');


}
	}

	public function ourwork(){
		$this->Admin_model->authtrue();
		$this->load->view('templates/admin/ourwork.php');
		if($this->input->post('add')){
			
			trim($this->form_validation->set_rules('title','title','required'));
			trim($this->form_validation->set_rules('content','content','required'));
			
			if($this->form_validation->run()==true){
				
				$ourwork=array();
				$ourwork['title']=trim($this->input->post('title'));
				$ourwork['content']=trim($this->input->post('content'));
				$ourwork['date']=date('Y-m-d h:i:s');
				$this->Admin_model->addwork($ourwork);
				$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">
				Records successfully added <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); 
				redirect(base_url().'admin/ourwork');


			}else{
				$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/ourwork');	



		    }$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/ourwork');

	}
	if($this->input->post('update')){

		trim($this->form_validation->set_rules('ucontent','ucontent','required'));
		trim($this->form_validation->set_rules('utitle','utitle','required'));
		if($this->form_validation->run()==true){
			
			$updatework=array();
			$updatework['title']=$this->input->post('utitle');
			$id=$this->input->post('uid');
			$updatework['content']=$this->input->post('ucontent');
			$this->Admin_model->updatework($id,$updatework);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Records successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');redirect(base_url().'admin/ourwork');

		}else{
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/ourwork');	



	    }$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/ourwork');
    }	

	}
	public function banner_image(){
		$this->Admin_model->authtrue();
		$banner=$this->Admin_model->getbanner();
		$ban['ban']=$banner;
		$allbanner=array_merge_recursive($ban);
		$width=1400;
		$height=394;
		$widthx=1400;
		$heighty=306;
		
		$imageurl2='./uploads/banner';
		$this->load->view('templates/admin/banner_image.php',$allbanner);
		if($this->input->post('update')){
			$oldimageone=$this->input->post('oldimageone');
			$oldimagetwo=$this->input->post('oldimagetwo');
			$oldimagethree=$this->input->post('oldimagethree');
			$oldimagefour=$this->input->post('oldimagefour');
			$oldimagefive=$this->input->post('oldimagefive');
			$oldimagesix=$this->input->post('oldimagesix');
			

			$bannerone=$_FILES["bannerone"]["name"];
			$bannertwo=$_FILES["bannertwo"]["name"];
			$bannerthree=$_FILES["bannerthree"]["name"];
			$bannerfour=$_FILES["bannerfour"]["name"];
			$bannerfive=$_FILES["bannerfive"]["name"];
			$bannersix=$_FILES["bannersix"]["name"];
			
			$banneronetemp=$_FILES["bannerone"]["tmp_name"];
			$bannertwotemp=$_FILES["bannertwo"]["tmp_name"];
			$bannerthreetemp=$_FILES["bannerthree"]["tmp_name"];
			$bannerfourtemp=$_FILES["bannerfour"]["tmp_name"];
			$bannerfivetemp=$_FILES["bannerfive"]["tmp_name"];
			$bannersixtemp=$_FILES["bannersix"]["tmp_name"];

			if($bannerone!=''){$imagenameone=$this->thumb($width,$height,$imageurl2,$bannerone,$banneronetemp); unlink($imageurl2.'/'.$oldimageone);}else{
				$imagenameone=$oldimageone;
			}
			if($bannertwo!=''){$imagenametwo=$this->thumb($width,$height,$imageurl2,$bannertwo,$bannertwotemp); unlink($imageurl2.'/'.$oldimagetwo);}else{
				$imagenametwo=$oldimagetwo;
			}
			if($bannerthree!=''){$imagenamethree=$this->thumb($width,$height,$imageurl2,$bannerthree,$bannerthreetemp); unlink($imageurl2.'/'.$oldimagethree);}else{
				$imagenamethree=$oldimagethree;
			}

			if($bannerfour!=''){$imagenamefour=$this->thumb($width,$height,$imageurl2,$bannerfour,$bannerfourtemp); unlink($imageurl2.'/'.$oldimagefour);}else{
				$imagenamefour=$oldimagefour;
			}
			if($bannerfive!=''){$imagenamefive=$this->thumb($widthx,$heighty,$imageurl2,$bannerfive,$bannerfivetemp); unlink($imageurl2.'/'.$oldimagefive);}else{
				$imagenamefive=$oldimagefive;
			}
			if($bannersix!=''){$imagenamesix=$this->thumb($width,$height,$imageurl2,$bannersix,$bannersixtemp); unlink($imageurl2.'/'.$oldimagesix);}else{
				$imagenamesix=$oldimagesix;
			}

			$banners=array();
			$banner['banner_event']=$imagenameone;
			$banner['banner_blog']=$imagenametwo;
			$banner['banner_job']=$imagenamethree;
			$banner['banner_contact']=$imagenamefour;
			$banner['banner_about']=$imagenamefive;
			$banner['banner_trainer']=$imagenamesix;
			
			$this->Admin_model->updatebannerss($banner);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Records successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');redirect(base_url().'admin/banner_image');
		}
		// $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');redirect(base_url().'admin/banner_image');

	}


	public function vedio(){
		$this->Admin_model->authtrue();
		$vedio=$this->Admin_model->getvedio();
		$ved['ved']=$vedio;
		$this->load->view('templates/admin/vedio.php',$ved);
		if($this->input->post('update')){
		trim($this->form_validation->set_rules('title','title','required'));
		trim($this->form_validation->set_rules('description','description','required'));
		// trim($this->form_validation->set_rules('url','url','required'));
		if($this->form_validation->run()==true){
			$veddata=array();
			$veddata['title']=$this->input->post('title');
			$veddata['vedio_url']=$this->input->post('url');
			$veddata['content']=$this->input->post('description');
			$this->Admin_model->upvedios($veddata);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Records successfully updated <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');redirect(base_url().'admin/vedio');

		}else{
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Sorry!Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');redirect(base_url().'admin/vedio');
		}

	
	}

}
public function ven_terms_conditions(){

	$this->Admin_model->authtrue();
	$id=4;
	$rows=$this->Admin_model->terms_condition($id);
	$row['row']=$rows;


	if($this->input->post('update')){
		trim($this->form_validation->set_rules('content','content','required'));
		if($this->form_validation->run()==true){
			$termscon=array();
			$termscon['content']=$this->input->post('content');
		
			$this->Admin_model->updatetermcon($termscon,$id);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record updated successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/ven_terms_conditions');


		}else{
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/ven_terms_conditions');

		}

	}

	$this->load->view('templates/admin/ven_terms_conditions.php',$row);

}

public function train_terms_conditions(){

	$this->Admin_model->authtrue();
	$id=5;
	$rows=$this->Admin_model->terms_condition($id);
	$row['row']=$rows;


	if($this->input->post('update')){
		trim($this->form_validation->set_rules('content','content','required'));
		if($this->form_validation->run()==true){
			$termscon=array();
			$termscon['content']=$this->input->post('content');
		
			$this->Admin_model->updatetermcon($termscon,$id);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record updated successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/train_terms_conditions');


		}else{
			$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/train_terms_conditions');

		}

	}

	$this->load->view('templates/admin/train_terms_conditions.php',$row);

}


public function hired_hire(){
	$this->Admin_model->authtrue();
	$rows=$this->Admin_model->gethired_hire();
	$row['row']=$rows;
		

	if($this->input->post('updated')){
		trim($this->form_validation->set_rules('uid','uid','required'));
		trim($this->form_validation->set_rules('content','content','required'));
		trim($this->form_validation->set_rules('step1title','step1title','required'));
		trim($this->form_validation->set_rules('step1content','step1content','required'));
		trim($this->form_validation->set_rules('step2title','step2title','required'));
		trim($this->form_validation->set_rules('step2content','step2content','required'));
		trim($this->form_validation->set_rules('step3title','step3title','required'));
		trim($this->form_validation->set_rules('step3content','step3content','required'));
		if($this->form_validation->run()==true){
			$steps=array();
			$stepid=$this->input->post('uid');
			$steps['content']=$this->input->post('content');
			$steps['step_one_title']=$this->input->post('step1title');
			$steps['step_one_content']=$this->input->post('step1content');
			$steps['step_two_title']=$this->input->post('step2title');
			$steps['step_two_content']=$this->input->post('step2content');
			$steps['step_three_title']=$this->input->post('step3title');
			$steps['step_three_content']=$this->input->post('step3content');
			$typeone=$this->input->post('typeone');
			
			$this->Admin_model->updatehired_hire($steps,$stepid);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">'.$typeone.' record updated successfully <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/hired_hire');

		}

	}
	$this->load->view('templates/admin/hired_hire.php',$row);
}
public function faq(){
	$this->Admin_model->authtrue();
	$this->load->view('templates/admin/faq.php');
	if($this->input->post('add')){
		trim($this->form_validation->set_rules('question','question','required'));
		trim($this->form_validation->set_rules('answer','answer','required'));
		if($this->form_validation->run()==true){
			$faq=array();
			$faq['question']=$this->input->post('question');
			$faq['answer']=$this->input->post('answer');
			$faq['date_created']=date('Y-m-d H:i:s');
			$this->Admin_model->addfaq($faq);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record added successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/faq');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/faq');

	}

	if($this->input->post('update')){
		trim($this->form_validation->set_rules('uquestion','uquestion','required'));
		trim($this->form_validation->set_rules('uanswer','uanswer','required'));
		trim($this->form_validation->set_rules('uid','uid','required'));
		if($this->form_validation->run()==true){
			$faq=array();
			$faq['question']=$this->input->post('uquestion');
			$faq['answer']=$this->input->post('uanswer');
			$faqid=$this->input->post('uid');
			
			$this->Admin_model->updatefaq($faq,$faqid);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record added successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/faq');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/faq');

	}
}

public function recentemp(){
	$this->Admin_model->authtrue();
	$width=165;
	$height=165;
	$imageurl2='./uploads/emp';
	$this->load->view('templates/admin/recentemp.php');
	if($this->input->post('updated')){
		trim($this->form_validation->set_rules('uid','uid','required'));
		if($this->form_validation->run()==true){
			$recentemp=array();
			$oldimage=$this->input->post('oldimage');
			$image=$_FILES["file"]["name"];
			$imagetemp=$_FILES["file"]["tmp_name"];
			if($image!=''){$imagenameone=$this->thumb($width,$height,$imageurl2,$image,$imagetemp); unlink($imageurl2.'/'.$oldimage);}else{
				$imagenameone=$oldimage;
			}
			$recentempid=$this->input->post('uid');
			$recentemp['logo']=$imagenameone;
			$recentemp['url']=$this->input->post('uurl');
			$recentemp['record_inserted_dttm']=date('Y-m-d H:i:s');
			$this->Admin_model->uprecentemp($recentempid,$recentemp);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record updated successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/recentemp');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/recentemp');

	}
	if($this->input->post('add')){
		$imageone=$_FILES["addfile"]["name"];
		$this->form_validation->set_rules('demoid', 'demoid', 'required');
		if (empty($_FILES['addfile']['name']))
		{
			$this->form_validation->set_rules('addfile', 'addfile', 'required');
		}
				
		if($this->form_validation->run()==true){
			$recentemp=array();
			
			$image=$_FILES["addfile"]["name"];
			$imagetemp=$_FILES["addfile"]["tmp_name"];
			if($image!=''){
				$imagenameone=$this->thumb($width,$height,$imageurl2,$image,$imagetemp); 
				unlink($imageurl2.'/'.$oldimage);
			}
			
			$recentemp['logo']=$imagenameone;
			$recentemp['url']=$this->input->post('addurl');
			$recentemp['record_inserted_dttm']=date('Y-m-d H:i:s');
			$this->Admin_model->addrecemp($recentemp);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record added successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/recentemp');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/recentemp');

	}


}

public function usercontent(){
	$this->Admin_model->authtrue();
	$width=262.5;
	$height=300;
	$imageurl2='./uploads/user';
	$this->load->view('templates/admin/usercontent.php');
	if($this->input->post('updated')){
		trim($this->form_validation->set_rules('uid','uid','required'));
		if($this->form_validation->run()==true){
			$userdata=array();
			$oldimage=$this->input->post('oldimage');
			$image=$_FILES["file"]["name"];
			$imagetemp=$_FILES["file"]["tmp_name"];
			if($image!=''){$imagenameone=$this->thumb($width,$height,$imageurl2,$image,$imagetemp); unlink($imageurl2.'/'.$oldimage);}else{
				$imagenameone=$oldimage;
			}
			$userid=$this->input->post('uid');
			$userdata['image']=$imagenameone;
			$userdata['content']=$this->input->post('content');
			$userdata['record_inserted_dttm']=date('Y-m-d H:i:s');
			$this->Admin_model->updateuser($userid,$userdata);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record updated successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/usercontent');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/usercontent');

	}


}

public function testimonials(){

	$this->Admin_model->authtrue();
	$this->load->view('templates/admin/testimonials.php');
	$width=89;
	$height=89;
	$imageurl2='./uploads/testimonials';
	if($this->input->post('addtest')){
		trim($this->form_validation->set_rules('fullname','fullname','required'));
		trim($this->form_validation->set_rules('position','position','required'));
		trim($this->form_validation->set_rules('testcontent','testcontent','required'));
		if($_FILES["addfile"]["name"]==''){
			trim($this->form_validation->set_rules('addfile','addfile','required'));
		}
		if($this->form_validation->run()==true){
			
			$image=$_FILES["addfile"]["name"];
			$imagetemp=$_FILES["addfile"]["tmp_name"];
			$imagenameone=$this->thumb($width,$height,$imageurl2,$image,$imagetemp); unlink($imageurl2.'/'.$oldimage);
			$test=array();
			$test['fullname']=$this->input->post('fullname');
			$test['position']=$this->input->post('position');
			$test['content']=$this->input->post('testcontent');
			$test['image']=$imagenameone;
			$test['record_inserted_dttm']=date('Y-m-d H:i:s');;
			$this->Admin_model->addtest($test);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record added successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/testimonials');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/testimonials');

	}

	if($this->input->post('updatetest')){
		trim($this->form_validation->set_rules('ufullname','ufullname','required'));
		trim($this->form_validation->set_rules('uposition','uposition','required'));
		trim($this->form_validation->set_rules('utestcontent','utestcontent','required'));
		// if($_FILES["uaddfile"]["name"]==''){
		// 	trim($this->form_validation->set_rules('uaddfile','uaddfile','required'));
		// }
		if($this->form_validation->run()==true){
			
			$oldimage=$this->input->post('oldimage');
			$image=$_FILES["uaddfile"]["name"];
			$imagetemp=$_FILES["uaddfile"]["tmp_name"];
			if($image!=''){$imagenameone=$this->thumb($width,$height,$imageurl2,$image,$imagetemp); 
				unlink($imageurl2.'/'.$oldimage);}else{
				$imagenameone=$oldimage;
			}
			$utest=array();
			$id=$this->input->post('uid');
			$utest['fullname']=$this->input->post('ufullname');
			$utest['position']=$this->input->post('uposition');
			$utest['content']=$this->input->post('utestcontent');
			$utest['image']=$imagenameone;
			$utest['record_inserted_dttm']=date('Y-m-d H:i:s');;
			$this->Admin_model->updatetest($id,$utest);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record updated successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/testimonials');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/testimonials');

	}

}

public function aspcat(){
	$this->Admin_model->authtrue();
	$this->load->view('templates/admin/aspcat.php');

	if($this->input->post('add')){
		trim($this->form_validation->set_rules('name','name','required'));
		if($this->form_validation->run()==true){
			$cat=array();
			$cat['name']=trim($this->input->post('name'));
			$this->Admin_model->addaspcat($cat);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record added successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/aspcat');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/aspcat');
	}
	if($this->input->post('update')){
		trim($this->form_validation->set_rules('uname','uname','required'));
		trim($this->form_validation->set_rules('uid','uid','required'));
		if($this->form_validation->run()==true){
			$cat=array();
			$cat['name']=trim($this->input->post('uname'));
			$uid=trim($this->input->post('uid'));
			$this->Admin_model->updateaspcat($cat,$uid);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record updated successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/aspcat');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/aspcat');
	}

}

public function aspsubcat(){
	$this->Admin_model->authtrue();
	$catid=base64_decode($_REQUEST['token']);
	$getcatid=$this->Admin_model->getcatname($catid);
	$getid['getid']=$catid;
	$getname['getname']=$getcatid;
    $getall=array_merge_recursive($getid,$getname);
	
	if($this->input->post('add')){
		trim($this->form_validation->set_rules('name','name','required'));
		trim($this->form_validation->set_rules('catidd','catidd','required'));
		
		if($this->form_validation->run()==true){
			
			$cat=array();
			$cat['name']=trim($this->input->post('name'));
			$cat['prof_cat_id']=trim($this->input->post('catidd'));
			$catname=trim($this->input->post('catname'));
			
			$this->Admin_model->addaspsubcat($cat);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record added successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/aspsubcat?token='.base64_encode($cat['prof_cat_id']).'');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/aspsubcat?token='.base64_encode($cat['prof_cat_id']).'');
	}
	if($this->input->post('update')){
		
		trim($this->form_validation->set_rules('ucatidd','ucatidd','required'));
		trim($this->form_validation->set_rules('ucatidd','ucatidd','required'));
		trim($this->form_validation->set_rules('uname','uname','required'));
		
		if($this->form_validation->run()==true){
			$cat=array();
			$cat['name']=trim($this->input->post('uname'));
			$uid=trim($this->input->post('uid'));
			$uidsss=base64_encode($_REQUEST['ucatidd']);
			
			$this->Admin_model->updateaspsubcat($cat,$uid);
		
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record updated successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/aspsubcat?token='.$uidsss.'');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/aspsubcat?token='.$uidsss.'');
	}
	$this->load->view('templates/admin/aspsubcat.php',$getall);
}

public function aspprofile(){
	$this->Admin_model->authtrue();
	$catid=base64_decode($_REQUEST['token']);
	$getcatid=$this->Admin_model->getsubcatname($catid);
	$getid['getid']=$catid;
	$getname['getname']=$getcatid;
	
    $getall=array_merge_recursive($getid,$getname);
	$this->load->view('templates/admin/aspprofile.php',$getall);
	if($this->input->post('add')){
		trim($this->form_validation->set_rules('name','name','required'));
		trim($this->form_validation->set_rules('catidd','catidd','required'));
		
		if($this->form_validation->run()==true){
			
			$cat=array();
			$cat['name']=trim($this->input->post('name'));
			$cat['profile_sub_cat_id']=trim($this->input->post('catidd'));
			$catname=trim($this->input->post('catname'));
			
			$this->Admin_model->addaspprofile($cat);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record added successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/aspprofile?token='.base64_encode($cat['profile_sub_cat_id']).'');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/aspprofile?token='.base64_encode($cat['profile_sub_cat_id']).'');
	}

	if($this->input->post('update')){
		
		trim($this->form_validation->set_rules('ucatidd','ucatidd','required'));
		trim($this->form_validation->set_rules('ucatidd','ucatidd','required'));
		trim($this->form_validation->set_rules('uname','uname','required'));
		
		if($this->form_validation->run()==true){
			$cat=array();
			$cat['name']=trim($this->input->post('uname'));
			$uid=trim($this->input->post('uid'));
			$uidsss=base64_encode($_REQUEST['ucatidd']);
			
			$this->Admin_model->updatecatprofile($cat,$uid);
		
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record updated successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/aspprofile?token='.$uidsss.'');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/aspprofile?token='.$uidsss.'');
	}

}


public function empcat(){
	$this->Admin_model->authtrue();
	$this->load->view('templates/admin/empcat.php');
	if($this->input->post('add')){
		trim($this->form_validation->set_rules('name','name','required'));
		if($this->form_validation->run()==true){
			$cat=array();
			$cat['name']=trim($this->input->post('name'));
			$this->Admin_model->addempcat($cat);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record added successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/empcat');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/empcat');
	}
	if($this->input->post('update')){
		trim($this->form_validation->set_rules('uname','uname','required'));
		trim($this->form_validation->set_rules('uid','uid','required'));
		if($this->form_validation->run()==true){
			$cat=array();
			$cat['name']=trim($this->input->post('uname'));
			$uid=trim($this->input->post('uid'));
			$this->Admin_model->updatemcat($cat,$uid);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Record updated successfully<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/empcat');

		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/empcat');
	}
}

public function faqquerries(){
	$this->Admin_model->authtrue();
	$this->load->view('templates/admin/faq_quries.php');

	if($this->input->post('send')){
		trim($this->form_validation->set_rules('subject','subject','required'));
		trim($this->form_validation->set_rules('uid','uid','required'));
		trim($this->form_validation->set_rules('uname','uname','required'));
		trim($this->form_validation->set_rules('content','content','required'));
		if($this->form_validation->run()==true){
			
			$email['subject']=trim($this->input->post('subject'));
			$email['answer']=trim($this->input->post('content'));
			$email['status']='Y';
			$emailll=trim($this->input->post('uname'));
			$uid=trim($this->input->post('uid'));
			$this->Admin_model->emailsend($email,$uid);
			$message=$email['answer'];
			$this->emailbody(NO_REPLY,$emailll,$email['subject'],$message);
			$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible fade show" role="alert">Reply successfully send!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/faqquerries');
		}$this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible fade show" role="alert">Error! Please fill out the fields and try again<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'admin/faqquerries');

	}

}
	
}
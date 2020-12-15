<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Admin_model extends CI_Model {
    public function authfalse(){
   
        $getadmin=$this->session->userdata('admin');
        if(!empty($getadmin)){
        redirect(base_url().'admin/index');
        return false;
        }
        
        
        }

        public function authtrue(){
   
            $getadmin=$this->session->userdata('admin');
            if(empty($getadmin)){
            redirect(base_url().'admin/login');
            return true;
            }
            
            
            }
	

		public function __construct() {
		  parent::__construct(); 
		}
	  
		public function delete($id,$table){

			if($table=='artist'){
				$select=$this->db->query('SELECT image FROM artist where id="'.$id.'" ');
				$this->db->where('id', $id);
				$result = $select->row_array();
				unlink('uploads/artist/'.$result['image']);
				$this->db->delete($table);
				$ok='ok';
				return $ok;

			}

			if($table=='slider_content'){
				$select=$this->db->query('SELECT image FROM slider_content where id="'.$id.'" ');
				$this->db->where('id', $id);
				$result = $select->row_array();
				unlink('uploads/slider_content/'.$result['image']);
				$this->db->delete($table);
				$ok='ok';
				return $ok;

			}
			if($table=='recruiter'){
				
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;

			}

			if($table=='jobs'){
				
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;

			}

			if($table=='event_category'){
				$update=$this->db->query('UPDATE '.$table.' SET active="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;
			}

			if($table=='events'){
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;
			}

			if($table=='blog_category'){
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;
			}

			if($table=='blogs'){
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;
			}

			if($table=='user'){
				$update=$this->db->query('UPDATE '.$table.' SET delete_flag="Y" where id="'.$id.'" ');
				$ok='ok';
				return $ok;
			}
			
			
		}

		public function update($id,$table,$status){

			if($table=='artist'){
				$this->db->where('id', $id);
				$this->db->set('status', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}
			if($table=='recruiter'){
				$this->db->where('id', $id);
				$this->db->set('admin_approval', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='jobs'){
				$this->db->where('id', $id);
				$this->db->set('admin_approval', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}


			if($table=='event_category'){

				$this->db->where('id', $id);
				$this->db->set('status', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='events'){
				
				$this->db->where('id', $id);
				$this->db->set('approve', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='blog_category'){
				
				$this->db->where('id', $id);
				$this->db->set('active', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='blogs'){
				
				$this->db->where('id', $id);
				$this->db->set('approve', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}
			if($table=='user'){
				
				$this->db->where('id', $id);
				$this->db->set('admin_approval', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}

			if($table=='slider_content'){
				
				$this->db->where('id', $id);
				$this->db->set('status', $status);
				$this->db->update($table);
				$ok='ok';
				return $ok;

			}


			

			

			


		}
		// Fetch records
		public function getData() {
		  $this->db->select('*');
		  $this->db->from('blogs');
		   
		  $query = $this->db->get();
	   
		  return $query->result_array();
		}
	  
		// Select total records
		public function getrecordCount() {
	  
		  $this->db->select('*');
		  $this->db->from('blogs');
		  $query = $this->db->get();
		  $result = $query->result_array();
		  return $result;
		}

		public function count_all() {
			return $this->db->count_all("blogs");
		}



		public function checkusers($email,$password) {
			$query = $this->db->query('SELECT * FROM admin where email="'.$email.'"and password="'.$password.'"  ');
			return $query->row_array();
		}

		public function checkadminemail($email,$table,$id){
		    $query1 = $this->db->query('SELECT email FROM '.$table.' where email="'.$email.'" ');
		    return $query1->num_rows();
		}
		public function checkpassword($password,$table,$id){
		    $query1 = $this->db->query('SELECT password FROM '.$table.' where password="'.$password.'" and id="'.$id.'" ');
		    return $query1->num_rows();
		}

		public function sendpass($email,$table,$id){
			$query1 = $this->db->query('SELECT password,email FROM '.$table.' where email="'.$email.'" ');
			$result = $query1->row_array();
			return $result;
		}

			public function aboutus(){
				$aboutq = $this->db->query('SELECT content,id,image FROM about_us where id=1 ');
				$aboutus = $aboutq->row_array();
				return $aboutus;
			}

			public function updateaboutus($about){
				$this->db->where('id', 1);
				$this->db->update('about_us', $about);
				
			}

			public function industriesone(){
				$indus = $this->db->query('SELECT content,id,description,url,title FROM  industries_one where id=1 ');
				$indus = $indus->row_array();
				return $indus;
			}

			public function updateindustrieone($industries){
				$this->db->where('id', 1);
				$this->db->update('industries_one', $industries);

			}

			public function industriestwo(){
				$indus2 = $this->db->query('SELECT content,id,description,title FROM  industries_two');
				$indus2 = $indus2->result_array();
				return $indus2;
			}

			public function updateindtwo($industwo){
				$this->db->where('id', $industwo['id']);
                $this->db->update('industries_two', $industwo);
			}

			public function artist(){
				$artist = $this->db->query('SELECT id,image,name,position,status FROM  artist');
				$artist = $artist->result_array();
				return $artist;
			}

			public function addartist($artist){
				//$this->db->where('id', $industwo['id']);
                $this->db->insert('artist', $artist);
			}

			public function updateartist($updateartist){
				$this->db->where('id', $updateartist['id']);
                $this->db->update('artist', $updateartist);
			}

			public function slider_content(){
				$slidercontent = $this->db->query('SELECT id,image,content,status,title FROM  slider_content');
				$slidercontent = $slidercontent->result_array();
				return $slidercontent;
			}

			public function addslidercontent($slidercontent){
				$this->db->insert('slider_content', $slidercontent);

			}

			public function updateslidercontent($updateslidercontent){
				$this->db->where('id', $updateslidercontent['id']);
                $this->db->update('slider_content', $updateslidercontent);

			}

			public function recuiter(){

				$recruiter = $this->db->query('SELECT * FROM  recruiter where delete_flag!="Y" order by id desc');
				//$this->db->order_by('Category', 'asc')
				$recruiter = $recruiter->result_array();
				return $recruiter;
			}

			public function emailinsert($email){
				$mailtrack=$this->db->insert('mailtrack', $email);
				return $mailtrack;
			}

			public function requirterjobs(){
			    $query1 = $this->db->query('SELECT job.id,job.recruiter_id,job.profile_ids,job.old_title,job.old_content,job.location,job.old_location,job.date_created,job.admin_approval,job.delete_flag,job.update_by,rec.firstname,rec.lastname,rec.company_name FROM recruiter as rec INNER JOIN jobs as job where job.recruiter_id=rec.id and job.delete_flag="N" order by job.id desc ');
				$result = $query1->result_array();
				return $result;
			}

			public function jobs_details($id){
				$details = $this->db->query('SELECT job.date_created,job.date_updated,job.old_type,job.profile_ids,job.id,job.recruiter_id,job.profile_ids,job.old_title,job.old_content,job.location,job.old_location,job.date_created,job.admin_approval,job.delete_flag,job.update_by,rec.firstname,rec.lastname,rec.company_name FROM recruiter as rec INNER JOIN jobs as job where job.recruiter_id=rec.id and job.delete_flag="N" and job.id="'.$id.'" and job.delete_flag="N" ');
				$detail = $details->row_array();
				return $detail;
			}

			public function getprofile($idprofile){
				$profile = $this->db->query('SELECT name FROM  profiles where id  IN ('.$idprofile.') and delete_flag="N"');
				//$this->db->order_by('Category', 'asc')
				$profil = $profile->result_array();
				return $profil;
			}

			public function applicant($id){
				$query1 = $this->db->query('SELECT app.date_created,app.id,app.user_id,app.job_id,app.date_created,users.id,users.firstname,users.lastname,users.delete_flag FROM user as users INNER JOIN job_applications as app on app.user_id=users.id where app.job_id="'.$id.'"  ');
				$result = $query1->result_array();
				$result2 = $query1->num_rows();
				return $result;
			}

			public function events(){
				$artist = $this->db->query('SELECT * FROM  event_category where active="N" order by id desc');
				$artist = $artist->result_array();
				return $artist;

			}

			public function view_events(){
				$eventslist= $this->db->query('SELECT * FROM  events where delete_flag="N" order by id desc');
				$eventslistted = $eventslist->result_array();
				return $eventslistted;
			}
			
			public function addevent($events){
				$event=$this->db->insert('event_category', $events);
				return $event;

			}

			public function updateevent($events){
				$this->db->where('id', $events['id']);
				$events=$this->db->update('event_category', $events);
				return $events;
			}

			public function details_events($id){
				$query12=$this->db->query('SELECT * FROM events where id="'.$id.'"  ');
				$query122 = $query12->row_array();
				return $query122;
			}

			public function eventusers($id){
				$query122=$this->db->query('SELECT * FROM buy_events where event_id="'.$id.'"  ');
				$query1223 = $query122->result_array();
				return $query1223;
			}

			public function getcatagories($id){
				//echo 'SELECT name FROM event_category where id IN ('.$id.')  ';
				$query122=$this->db->query('SELECT name FROM event_category where id IN ('.$id.')  ');
				$query1223 = $query122->result_array();
				return $query1223;
			}

			public function blog_catagories(){
				$blog_catagories= $this->db->query('SELECT * FROM  blog_category where delete_flag="N" order by id desc');
				$blogs = $blog_catagories->result_array();
				return $blogs;


			}

			public function addblogs($blogs){
				$blogsss=$this->db->insert('blog_category', $blogs);
				return $blogsss;
			}

			public function uaddblogs($ublogs){
				$this->db->where('id', $ublogs['id']);
				$ublogss=$this->db->update('blog_category', $ublogs);
				return $ublogss;
			}

			public function blog_list(){
				$blog_catagories= $this->db->query('SELECT * FROM  blogs where delete_flag="N" order by id desc');
				$blogs = $blog_catagories->result_array();
				return $blogs;
			}

			public function detail_blog($id){
				$blog_catagories= $this->db->query('SELECT * FROM  blogs where id="'.$id.'" and delete_flag="N" order by id desc');
				$blogs = $blog_catagories->row_array();
				return $blogs;

			}

			public function getcatagoriesblog($id){
				
				$query122=$this->db->query('SELECT name FROM blog_category where id IN ('.$id.')  ');
				$query1223 = $query122->result_array();
				return $query1223;

			}

			public function applicant_list(){
				

				 //$indus2=$this->db->select('app.id, app.firstname,app.lastname,app.email,app.display_name,app.contact_no,app.email_verified,app.mobile_verified,app.date_created,app.delete_flag,app.update_by,app.update_date,app.admin_approval, detail.user_id, detail.salutation, detail.profile_pic, detail.banner_pic, detail.p_address, detail.p_city, detail.p_state, detail.p_pincode, detail.date_created , detail.p_country , detail.tele_number, detail.tele_number, detail.t_address, detail.t_city,detail.t_country,detail.t_state,detail.t_pincode,detail.father_name,detail.mother_name,detail.mother_name,detail.date_of_birth,detail.status,detail.marital_status,detail.kin_details,detail.kin_city,detail.kin_pincode,detail.kin_state,detail.kin_country,detail.date_updated')->from('user as app')->join('details as detail', 'app.id = detail.user_id', 'join')->order_by("app.id", "desc")->get();

				$indus2 = $this->db->query('SELECT * FROM  user where delete_flag="N" order by id desc');
				$app = $indus2->result_array();
				return $app;

			}

			public function app_details($id){
				//echo 'SELECT app.id, app.firstname,app.lastname,app.email,app.display_name,app.contact_no,app.email_verified,app.mobile_verified,app.date_created,app.delete_flag,app.update_by,app.update_date,app.admin_approval, detail.user_id, detail.salutation, detail.profile_pic, detail.banner_pic, detail.p_address, detail.p_city, detail.p_state, detail.p_pincode, detail.date_created , detail.p_country , detail.tele_number, detail.tele_number, detail.t_address, detail.t_city,detail.t_country,detail.t_state,detail.t_pincode,detail.father_name,detail.mother_name,detail.mother_name,detail.date_of_birth,detail.status,detail.marital_status,detail.kin_details,detail.kin_city,detail.kin_pincode,detail.kin_state,detail.kin_country,detail.date_updated,edu.user_id,edu.highest_qualification,edu.final_year,edu.percentage,edu.university,edu.other,edu.date_created,edu.date_updated,emp.user_id,emp.occupation,emp.start,emp.employer_details,emp.employment,emp.position,emp.income,emp.industry,emp.capacity from user as app  LEFT JOIN details as detail on app.id = detail.user_id LEFT JOIN educational as edu on  app.id = edu.user_id  LEFT JOIN employment as emp on app.id = emp.user_id where app.id="'.$id.'" ';
				

             $appdetail=$this->db->select('app.id, app.firstname,app.lastname,app.email,app.display_name,app.contact_no,app.email_verified,app.mobile_verified,app.date_created,app.delete_flag,app.update_by,app.update_date,app.admin_approval, detail.user_id, detail.salutation, detail.profile_pic, detail.banner_pic, detail.p_address, detail.p_city, detail.p_state, detail.p_pincode, detail.date_created , detail.p_country , detail.tele_number, detail.tele_number, detail.t_address, detail.t_city,detail.t_country,detail.t_state,detail.t_pincode,detail.father_name,detail.mother_name,detail.mother_name,detail.date_of_birth,detail.status,detail.marital_status,detail.kin_details,detail.kin_city,detail.kin_pincode,detail.kin_state,detail.kin_country,detail.date_updated,edu.user_id,edu.highest_qualification,edu.final_year,edu.percentage,edu.university,edu.other,edu.date_created,edu.date_updated,emp.user_id,emp.occupation,emp.start,emp.employer_details,emp.employment,emp.position,emp.income,emp.industry,emp.capacity')->from('user as app')->join('details as detail', 'app.id = detail.user_id', 'left')->join('educational as edu', 'app.id = edu.user_id', 'left')->join('employment as emp', 'app.id = emp.user_id', 'left')->where("app.id",$id)->get();
			 $getappp = $appdetail->row_array();
			 //print_r($getappp);
			 return $getappp;
			}

			public function admin_details(){ 
				$getadmin=$this->session->userdata('admin');
				$detail=$this->db->query('SELECT * from admin where id="'.$getadmin['idadmin'].'"');
				$returnval=$detail->row_array();
				return $returnval;
			 }
			 public function update_details($admupdate){
				$getadmin=$this->session->userdata('admin');
				 $this->db->where('id',$getadmin['idadmin']);
				 $updates=$this->db->update('admin',$admupdate);
			 }


			 public function countrecruiter(){
				$this->db->where('delete_flag', 'N');
				 $this->db->from('recruiter');
				 $result=$this->db->count_all_results();
				 return $result;
			 }
			 public function countapplicant(){
				$this->db->where('delete_flag', 'N');
				$this->db->from('user');
				$result1=$this->db->count_all_results();
				return $result1;
			}
			public function countevent(){
				$this->db->where('delete_flag', 'N');
				$this->db->from('events');
				$result1=$this->db->count_all_results();
				return $result1;
			}
			public function countblog(){
				$this->db->where('delete_flag', 'N');
				$this->db->from('blogs');
				$result1=$this->db->count_all_results();
				return $result1;
			}
			public function countjob(){
				$this->db->where('delete_flag', 'N');
				$this->db->from('jobs');
				$result12=$this->db->count_all_results();
				return $result12;
			}

			public function evntdashboard(){
				$currentdate=date('Y-m-d');
				$eventdas=$this->db->query('SELECT event_title,id FROM events where  delete_flag="N" and (startdate<="'.$currentdate.'"  and  enddate>="'.$currentdate.'")  ');
				$getresult = $eventdas->result_array();
				return $getresult;
			}

			

			 

			
			

			

			



			
			

}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

Class Main_model extends CI_Model {
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

		public function verifyemail($email){
			$query122 = $this->db->query('SELECT email_verified,email  from recruiter where email="'.$email.'" and email_verified="Y"');
			$query12 = $this->db->query('UPDATE recruiter SET email_verified="Y" where email="'.$email.'" ');
			$results = $query122->num_rows();
			return $results;
		}

		public function checkusers($email,$password) {
		$query = $this->db->query('SELECT * FROM admin where email="'.$email.'"and password="'.$password.'" ');
		return $query->num_rows();
			}

		public function checkadminemail($email,$table,$id){
		$query1 = $this->db->query('SELECT email FROM '.$table.' where email="'.$email.'" ');
		return $query1->num_rows();
		}

		public function sendpass($email,$table,$id){
		$query1 = $this->db->query('SELECT password,email FROM '.$table.' where email="'.$email.'" ');
		$result = $query1->row_array();
		return $result;
		}

		public function addrecuiter($recuiter){
			$this->db->insert('recruiter', $recuiter);
			$lastid=$this->db->insert_id();
			$this->db->query('INSERT into admin_notification (type,type_id)values("recruiter","'.$lastid.'")');
		}

		public function emailverification($email,$table,$mobile){
			$query1 = $this->db->query('SELECT Password,E_Mail FROM '.$table.' where E_Mail="'.$email.'" or Mobile_No="'.$mobile.'" ');
			$result = $query1->num_rows();
			return $result;
		}

		public function contactus($contactus){
			$insert1=$this->db->insert('contact_us',$contactus);
			return $insert1;
		}

		public function slider_content(){
			$slidercontent = $this->db->query('SELECT  id,image,content,status,title FROM  slider_content where status="1" order by id desc');
			$slidercontent = $slidercontent->result_array();
			return $slidercontent;
		}
		public function industriesone(){
			$indus = $this->db->query('SELECT content,id,description,url,title FROM  industries_one where id=1 ');
			$indus = $indus->row_array();
			return $indus;
		}
		public function industriestwo(){
			$indus2 = $this->db->query('SELECT content,id,description,title FROM  industries_two');
			$indus2 = $indus2->result_array();
			return $indus2;
		}
		public function aboutus(){
			$aboutq = $this->db->query('SELECT content,id,image FROM about_us where id=1 ');
			$aboutus = $aboutq->row_array();
			return $aboutus;
		}
		public function admindetails(){
			$aboutq = $this->db->query('SELECT content,id,image FROM about_us where id=1 ');
			$aboutus = $aboutq->row_array();
			return $aboutus;
		}
		public function admin_details(){ 
			$this->db->select('*');
			$this->db->from('banner_image');
			$this->db->from('admin');
			$query = $this->db->get();
			$returnval=$query->row_array();
			return $returnval;
			
		}
			public function terms_condition($id){
			$tercon=$this->db->query('SELECT * from terms_condition where id="'.$id.'"');
			$ress=$tercon->row_array();
			return $ress;
		}
		public function allteam(){
			$query=$this->db->query('SELECT * from team where status="Y" ORDER BY id desc');
			$teams=$query->result_array();
			return $teams;
		}
		public function ourwork(){
			$this->db->select('*');
			$this->db->from('ourwork');
			$conditions = array('delete_flag' => 'N', 'status' => 'Y');
			$this->db->where($conditions);
			$this->db->order_by("id", "desc");
			$query = $this->db->get();
			return $getalldtat=$query->result_array();
		}
	
		public function recruiter_category(){
			$this->db->select('*');
			$this->db->from('recruiter_category');
			$this->db->where('delete_flag','N');
			$query = $this->db->get();
			return  $getalldtat=$query->result_array();
		}
		public function evntdashboard(){
			$currentdate=date('Y-m-d');
			$eventdas=$this->db->query('SELECT startdate,enddate,event_title,id FROM events where  delete_flag="N" and (startdate<="'.$currentdate.'"  and  enddate>="'.$currentdate.'") order by enddate asc ');
			$getresult = $eventdas->result_array();
			return $getresult;
		}

		public function event_type(){
			$this->db->select('*');
			$this->db->from('event_type');
			$condition=array('active'=>'N','status'=>'Y');
			$this->db->where($condition);
			$queryss = $this->db->get();
			return  $geteventtype=$queryss->result_array();
		}
		public function event_cat(){
			$this->db->select('*');
			$this->db->from('event_category');
			$condition=array('active'=>'N','status'=>'Y');
			$this->db->where($condition);
			$querysss = $this->db->get();
			return  $geteventcat=$querysss->result_array();
		}
		public function getvedio(){
			$this->db->select('*');
			$this->db->from('vedio_content');
			$getvedio=$this->db->get();
			return $contentvedio=$getvedio->row_array();
		}
		public function getprofile(){
			$this->db->select('*');
			$this->db->from('app_profiles');
			$this->db->order_by("name", "asc");
			$getpro=$this->db->get();
			return $getproo=$getpro->result_array();
		}
		public function getcprof(){
			$this->db->select('*');
			$this->db->from('rec_profiles');
			$this->db->order_by("id", "asc");
			$getproc=$this->db->get();
			return $getprooc=$getproc->result_array();
		}
		public function getvptype(){
			$this->db->select('*');
			$this->db->from('vendor_type');
			$this->db->order_by("id", "asc");
			$getv=$this->db->get();
			return $getvv=$getv->result_array();
		}
		public function trincat(){
			$this->db->select('*');
			$this->db->from('train_cat');
			$this->db->order_by("id", "asc");
			$gett=$this->db->get();
			return $gettt=$gett->result_array();
		}

		
		public function getcountry_flag(){
			$this->db->select('*');
			$this->db->from('country_code_name_flag');
			$this->db->order_by("list_countryName", "asc");
			$getcf=$this->db->get();
			return $getallcf=$getcf->result_array();
		}
		
		public function gethired_hire(){
			$this->db->select('*');
			$this->db->from('steps');
			$getstep=$this->db->get();
			return $showstep=$getstep->result_array();
		}
		public function banner(){
			$this->db->select('*');
			$this->db->from('banner_image');
			$banner=$this->db->get();
			return $showban=$banner->row_array();
		}
		public function faq(){
			$cond=array('delete_flag'=>'N','status'=>'Y');
			$this->db->where($cond);
			$this->db->select('*');
			$this->db->from('faq');
			$this->db->order_by("id", "desc");
			$getfaq=$this->db->get();
			return $showfaq=$getfaq->result_array();
		}
		public  function recentemp(){
			$gettest=$this->db->query('SELECT logo,url FROM recentemp where  delete_flag="N" and status="Y" order by id desc');
			//$this->db->from('testimonials');
			
			return $shotwst=$gettest->result_array();

		}
		public  function usercontent(){
			// $this->db->where('delete_flag','N');
			$this->db->select('*');
			$this->db->from('usercontent');
			$this->db->order_by("id", "asc");
			$getuser=$this->db->get();
			return $getall=$getuser->result_array();

		}
		
		public function testimonals(){
			
			$gettest=$this->db->query('SELECT fullname,image,content,position FROM testimonials where  delete_flag="N" and status="Y"');
			//$this->db->from('testimonials');
			$this->db->order_by("id", "asc");
			
			return $showrecemp=$gettest->result_array();
		}

		public function aspregistration($asp){
			$insert12=$this->db->insert('registration_stg',$asp);
			
			return "ok";
		}
		public function validmobile($mobile){
			$gettest=$this->db->query('SELECT Mobile_No from registration_stg where  Mobile_No="'.$mobile.'" ');
			$results = $gettest->num_rows();
			return $results;
		}

		public function validemail($email,$mobile){
			$gettest=$this->db->query('SELECT E_Mail from registration_stg where  E_Mail="'.$email.'" or Mobile_No="'.$mobile.'" ');
			$results = $gettest->num_rows();
			return $results;
		}

		public function emailverify($token){
			$gettest=$this->db->query('Update registration_stg set Email_Verified="Y"  where  Mobile_No="'.$token.'" ');

		}

		public function getallprofiles($iwanttobe){
			$iwanttobeget.='';
			$iwanttobeget.=$iwanttobe['name'];
			$query1 = $this->db->query('SELECT cat_prof.id as catid,cat_prof.name as catname,subcat_prof.id as subcatid,subcat_prof.name as subcatname,profiletype.id as profileid,profiletype.name as profilename FROM aspprofile_cat as cat_prof INNER JOIN aspprofilesub_cat as subcat_prof on cat_prof.id=subcat_prof.prof_cat_id INNER JOIN aspprofile_type as profiletype on subcat_prof.id=profiletype.profile_sub_cat_id and profiletype.name  LIKE "%'.$iwanttobeget.'%" and cat_prof.delete_flag="N" and cat_prof.status="Y" and  subcat_prof.delete_flag="N" and subcat_prof.status="Y" and profiletype.delete_flag="N" and profiletype.status="Y" ');
			$result = $query1->result_array();
			return $result;

		}
		public function getseniority(){

			$this->db->select('*');
			$this->db->from('asp_seniority');
			$this->db->order_by("id", "asc");
			$seniorty=$this->db->get();
			return $getall=$seniorty->result_array();
        
		}

		public function getemployercat(){
			$this->db->where('delete_flag','N');
			$this->db->select('*');
			$this->db->from('employer_category');
			$this->db->order_by("id", "desc");
			$empcat=$this->db->get();
			return $getempcat=$empcat->result_array();
		}

		public function addquestion($ques){
			$insert12=$this->db->insert('faq_question_ask',$ques);
			return "ok";
		}

}
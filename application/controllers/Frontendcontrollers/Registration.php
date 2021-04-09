<?php



defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller {


    public function __construct() 
	{
        parent:: __construct();
        $this->load->helper('url','form');
        $this->load->library("pagination");
		$this->load->model('Main_model');
		$this->load->library('email');
		
		//$this->load->library('upload');
	}


    public function index(){
        $admindet=$this->Main_model->admin_details();
        $admin['admin']=$admindet;
        $tab=$_REQUEST['tabs'];
        $tabs['tabs']=$tab;
        $alldata=array_merge_recursive($admin,$tabs);
    $this->load->view('templates/registration.php',$alldata);
    }


    public function emailbody($sendfrom,$to,$subject,$message){
		$this->load->view('mailactive/index');	
		sendmails($sendfrom,$to,$message,$subject);	
	}

    
    public function aspmobile(){
        
        $aspdetails=array();
        $aspdetails['aspfirstname']=base64_decode(trim($_REQUEST['aspfirstname']));
        $aspdetails['asplastname']=base64_decode(trim($_REQUEST['asplastname']));
        $aspdetails['aspemail']=base64_decode(trim($_REQUEST['aspemail']));
        $aspdetails['aspmobile']=base64_decode(trim($_REQUEST['aspmobile']));
        $getdetails['getdetails']=$aspdetails;
        $getvalidateemail=$this->Main_model->validemail($aspdetails['aspemail'],$_REQUEST['aspmobile']);
        $seniority=$this->Main_model->getseniority();
        $getsen['getsen']= $seniority;
       
       if($getvalidateemail>0){
        $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Email already exist. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');
       };
      

        $getall=array_merge_recursive($getdetails,$getsen);
        $this->load->view('templates/aspmobile.php',$getall );
    }


    public function empmobile(){

        $aspdetails=array();
        $aspdetails['aspfirstname']=base64_decode(trim($_REQUEST['aspfirstname']));
        $aspdetails['asplastname']=base64_decode(trim($_REQUEST['asplastname']));
        $aspdetails['aspemail']=base64_decode(trim($_REQUEST['aspemail']));
        $aspdetails['aspmobile']=base64_decode(trim($_REQUEST['aspmobile']));
        $getdetails['getdetails']=$aspdetails;
        $getvalidateemail=$this->Main_model->validemail($aspdetails['aspemail'],$_REQUEST['aspmobile']);
        $empcat=$this->Main_model->getemployercat();
        $getempcat['getempcat']= $empcat;
    
       if($getvalidateemail>0){
        $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Email already exist. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');
       };
      

        $getall=array_merge_recursive($getdetails,$getempcat);
        $this->load->view('templates/empmobile.php',$getall );

    }

    public function adduserasp(){
        $getvalidateemail=$this->Main_model->validemail($_REQUEST['aspemail'],$_REQUEST['aspmobile']);
        if($getvalidateemail>0){
            $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Email already exist. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');
           };
        if($this->input->post('submit')){
           
            trim($this->form_validation->set_rules('aspfirst','aspfirst','required'));
            trim($this->form_validation->set_rules('asplast','asplast','required'));
            trim($this->form_validation->set_rules('aspmobile','aspmobile','required'));
            trim($this->form_validation->set_rules('aspemail','aspemail','required'));
            trim($this->form_validation->set_rules('seniorityyy','seniorityyy','required'));
            trim($this->form_validation->set_rules('displayname','displayname','required'));
            

            
            if($this->form_validation->run()==true){
            $asp=array();
            $asp['First_Name']=trim($_REQUEST['aspfirst']);
            $asp['Last_Name'] =trim($_REQUEST['asplast']);
            $asp['Mobile_No']=trim($_REQUEST['aspmobile']);
            $asp['E_Mail']=trim($_REQUEST['aspemail']);
            $asp['Seniority']=trim($this->input->post('seniorityyy'));
            $asp['Display_Name']=trim($this->input->post('displayname'));
            $asp['Referral_Code']=trim($this->input->post('refrencecode'));
            $asp['Primary_Profile']=trim($this->input->post('profileid'));
            $asp['Record_Inserted_Dttm']=date('Y-m-d H:s:i');
            $asp['TYPE_OF_REGISTRATION']='Aspirant';
            
          
            $getvalue=$this->Main_model->aspregistration($asp); 
            $subject='Successfully Registered With '.WEBSITE_NAME.' As Aspirant ';
            $mess='';
            $mess.='<p>Dear '.$asp['First_Name'].' '.$asp['Last_Name'].'</p>';
            $mess.='<p>You are successfully registered with CastIndia as a <strong>Aspirant</strong>. Please click <a href='.base_url().'home/emailverify?token='.base64_encode($asp['Mobile_No']).'>Here</a> to verify your email</p>';
            $message=$mess;
            $this->emailbody(REGISTRATION_EMAIL,$asp['E_Mail'],$subject,$message);
            
            $this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert"> You are successfully registered as  Aspirant, please verify link send in your email !  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');
    
            }
            $this->session->set_flashdata('error','<div class="alert alert-error alert-dismissible show" role="alert"> Sorry! Please fill out the details and try again!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');
            }
    }

    public function adduseremp(){
       $getvalidateemail=$this->Main_model->validemail($_REQUEST['empemail'],$_REQUEST['aspmobile']);
        if($getvalidateemail>0){
            $this->session->set_flashdata('error','<div class="alert alert-danger alert-dismissible show" role="alert">Sorry! Email already exist. <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');
           };
		trim($this->form_validation->set_rules('empfirst','empfirst','required'));
		trim($this->form_validation->set_rules('emplast','emplast','required'));
		trim($this->form_validation->set_rules('empemail','empemail','required'));
        trim($this->form_validation->set_rules('aspmobile','aspmobile','required'));
        trim($this->form_validation->set_rules('empcat','empcat','required'));
        trim($this->form_validation->set_rules('address','address','required'));
        trim($this->form_validation->set_rules('state','state','required'));
        trim($this->form_validation->set_rules('city','city','required'));
        

		if($this->form_validation->run()==true){
		$asp=array();
		$asp['First_Name']=trim($_REQUEST['empfirst']);
		$asp['Last_Name'] =trim($_REQUEST['emplast']);
		$asp['Mobile_No']=trim($_REQUEST['aspmobile']);
		$asp['E_Mail']=trim($_REQUEST['empemail']);
        $asp['Represents']=trim($_REQUEST['empcat']);
        $asp['Address']=trim($_REQUEST['address']);
        $asp['State']=trim($_REQUEST['state']);
        $asp['City']=trim($_REQUEST['city']);
		$asp['Record_Inserted_Dttm']=date('Y-m-d H:s:i');
		$asp['TYPE_OF_REGISTRATION']='Employer';
        $asp['Referral_Code']=trim($_REQUEST['refrencecode']);
		$getvalue=$this->Main_model->aspregistration($asp);

        
		
		$subject='Successfully Registered With '.WEBSITE_NAME.' As Employer ';
		$mess='';
		$mess.='<p>Dear '.$asp['First_Name'].''.$asp['Last_Name'].'</p>';
		$mess.='<p>You are successfully registered with CastIndia as a <strong>Employer</strong>. Please click <a href='.base_url().'home/emailverify?token='.base64_encode($asp['Mobile_No']).'>Here</a> to verify your email</p>';
		$message=$mess;
		$this->emailbody(REGISTRATION_EMAIL,$asp['E_Mail'],$subject,$message);
		$this->session->set_flashdata('error','<div class="alert alert-success alert-dismissible show" role="alert"> You are successfully registered as  Employer, please verify link send in your email !  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');

		}
        $this->session->set_flashdata('error','<div class="alert alert-error alert-dismissible show" role="alert"> Sorry! Please fill out the details and try again!  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>'); redirect(base_url().'registration');

		}

	public function getprofiles(){
        $iwanttobe=array();
        $iwanttobe['name']=trim($_REQUEST['iwanttobe']);
        $getallprof=$this->Main_model->getallprofiles($iwanttobe);
        $rowss['rowss']=$getallprof;
        $this->load->view('templates/getprofiles.php',$rowss);
    }

    


}
?>
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
			}

			public function emailverification($email,$table,$mobile){
			    $query1 = $this->db->query('SELECT password,email FROM '.$table.' where email="'.$email.'" or contact_no="'.$mobile.'" ');
				$result = $query1->num_rows();
				return $result;
			}

			public function contactus($contactus){
				$insert1=$this->db->insert('contact_us',$contactus);
				return $insert1;
			}



}
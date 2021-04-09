<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
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
    $tab=$_REQUEST['tab'];
    $tabs['tabs']=$tab;
    $alldata=array_merge_recursive($admin,$tabs);
    $this->load->view('templates/login.php', $alldata);
    }


}
?>
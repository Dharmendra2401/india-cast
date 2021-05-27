<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct() 
	{
        parent:: __construct();
        $this->load->helper('url','form');
        $this->load->library("pagination");
		$this->load->model('Main_model');
		$this->load->library('email');
		
		//$this->load->library('upload');
	}
	public function index()
	{
	    $page_data['blog_category']=$this->Main_model->get_blog_category();
		$page_data['blogs']=$this->Main_model->get_blog_list();
		$page_data['blogs_limits']=$this->Main_model->get_blog_limit();
		$page_data['blogs_sliders']=$this->Main_model->get_blog_sliders();
		$this->render_blog('templates/blog/blog',$page_data);
	}
	public function blog_list($id)
	{
	    $page_data['blog_category']=$this->Main_model->get_blog_category();
		$page_data['blogs']=$this->Main_model->get_blog_list_by_category($id);
		$page_data['blogs_limits']=$this->Main_model->get_blog_limit();
		$page_data['blogs_sliders']=$this->Main_model->get_blog_sliders();
		$this->render_blog('templates/blog/blog_list',$page_data);
	}
	public function blog_details($id)
	{
	    $page_data['blog_category']=$this->Main_model->get_blog_category();
		 $page_data['blogs']=$this->Main_model->get_blog_list();
		 $page_data['blog_details'] = $this->db->get_where('blogs', array('id'=>$id))->row_array();
		 $page_data['blogs_limits']=$this->Main_model->get_blog_limit();
		$this->render_blog('templates/blog/blog_details',$page_data);
	}
	public function blog_comment(){
		$data['name'] = $this->input->post('name');
        $data['email'] = $this->input->post('email');
        $data['website'] = $this->input->post('website');
        $data['comment'] = $this->input->post('comment');
        $data['blog_id'] = $this->input->post('blog_id');
        $page_data['save_blog_comment'] = $this->Main_model->save_blog_comment($data);
        redirect(base_url() . 'blog/index', 'refresh');
	}
	public function search_param(){
      $title = $this->input->post('blog_title');
      $page_data['search_param'] = $this->Main_model->getSearchBlog($title);
      $this->render_blog('templates/blog/blog',$page_data);
    }
	
}
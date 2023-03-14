<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


		public function __construct()
    {
        parent::__construct();
  
        $this->load->library('session');
      	$this->load->database(); 
        $this->load->helper('url');
    }

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
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		$this->load->helper('url');
	    if($this->input->post('email'))
		{
		    
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			
		$login_query = $this->db->query("select * from tbl_login where email = '".$email."' and password = '".$password."'");
			
			if($login_query->num_rows() > 0)
			{
				$user_row = $login_query->row();
				
		 		$this->session->set_userdata('admin_id', $user_row->id);
				$this->session->set_userdata('admin_email', $user_row->email);
		 		redirect('dashboard');
			}
			else
			{
				// unsuccessfull login
				$data['error_message'] = 'Email Or Password was wrong';
			}
		}
		$this->load->view('index');
	}
	public function dashboard()
	{	
		$admin_admin = $this->session->userdata('admin_id');
		if($admin_admin == "")
		{
			redirect('welcome');
		}
		$where=array();
		if($this->input->post())
		{
			$f_name = $this->input->post('f_name');
			$l_name = $this->input->post('l_name');
			$email = $this->input->post('email');
			$courses = $this->input->post('courses');

			if(is_uploaded_file($_FILES['image']['tmp_name']))
			{
  				$image=rand(0,9999).$_FILES['image']['name'];
				move_uploaded_file($_FILES['image']['tmp_name'],'uploads/'.$image);
				}else{
				$image="";
		    }
			$information = $this->input->post('information');
	
			$data = array(
			        'f_name'=>$f_name,
			        'l_name'=>$l_name,
			        'email'=>$email,
			        'courses'=>$courses,
			        'image'=>$image,
			        'information'=>$information
			        
					);
			$this->db->insert('tbl_info',$data);
			}

		$this->load->view('dashboard');
	}
	public function logout()
	{
		$this->load->helper('url');
		$this->session->sess_destroy();
		redirect('welcome');
	}
	public function view()
	{

		 $admin_admin = $this->session->userdata('admin_id');
		if($admin_admin == "")
		{
			redirect('welcome');
		}
		$where=array();

		$sql_users=$this->db->query('SELECT * FROM tbl_info ORDER BY id DESC');
		$users=$sql_users->result();
		$data['user_list'] = $users;


	if($this->input->post('Update')){
		    $id=$this->input->post('service_id');
		    $f_name=$this->input->post('f_name');
		    $l_name=$this->input->post('l_name');
		    $email=$this->input->post('email');
		    $courses=$this->input->post('courses');
		    $information=$this->input->post('information');

		    $this->db->query('UPDATE tbl_info SET f_name="'.$f_name.'",l_name="'.$l_name.'",email="'.$email.'",courses="'.$courses.'",information="'.$information.'" WHERE id="'.$id.'"');
		    	$this->session->set_flashdata('success', 'User Details updated successfuly.');
			redirect("view");
		}


    	$this->load->view('view',$data);
   
	}
	public function delete_user(){
   $id= $this->input->post('id');
   $this->db->query('DELETE FROM tbl_info WHERE id="'.$id.'"');
   $data['success']='1';
   $data['message']='Deleted succesfully';
   echo json_encode($data);
}
	
}

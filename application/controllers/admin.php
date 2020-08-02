<?php
class admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if($this->session->userdata('admin_id'))
			return redirect('admin_dash');
	}
	public function index()
	{
		$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			if($this->form_validation->run())
			{
				$uname=$this->input->post('username');
				$pass=$this->input->post('password');
				//$this->load->model('adminmodel');
				$login_id=$this->adminmodel->user_validate($uname,$pass);
				//print_r($login_id);
				//exit;
				if($login_id)
				{
					$this->session->set_userdata('admin_id',$login_id);
					return redirect('admin_dash');
				}
				else
				{
					$this->session->set_flashdata('error','invalid username or password!');
					return redirect('admin');
				}
			}
			else
			{

				$this->load->view('admin/Login');	
		    }	
	}
}
?>
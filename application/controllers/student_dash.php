<?php
class student_dash extends CI_Controller
{
	public function __construct()
		{
			parent::__construct();
			if(!$this->session->userdata('id'))
				return redirect('student');

		}
	public function welcome()
	{
		
		$this->load->library('pagination');
		$config=['base_url'=>base_url('student_dash/welcome'),
		         'per_page'=>10,
		         'total_rows'=>$this->adminmodel->all_num_rows(),
		         'full_tag_open'=>"<ul class='pagination'>",
		         'full_tag_close'=>"<ul>",
		         'prev_tag_open'=>"<li>",
		         'prev_tag_close'=>"</li>",
		         'next_tag_open'=>"<li>",
		         'next_tag_close'=>"</li>",
		         'num_tag_open'=>"<li>",
		         'num_tag_close'=>"</li>",
		         'cur_tag_open'=>"<li><a href='' class='active'>",
		         'cur_tag_close'=>"</a></li>"
	            ];
	            $this->pagination->initialize($config);
		//$student=$this->adminmodel->student($config['per_page'],$this->uri->segment(3));
		$bookinquire=$this->adminmodel->book_info($config['per_page'],$this->uri->segment(3));
		$this->load->view('Student/dashboard',['bookinquire'=>$bookinquire]);
	}
	public function studentinfo()
	{
		$id=$this->session->userdata('id');
		$studentinfo=$this->studentmodel->student_info($id);
		//$student=$this->studentmodel->student();
		$this->load->view('student/student_info',['studentinfo'=>$studentinfo]);
	}
	public function logout()
	{
		$this->session->unset_userdata('id');
		return redirect('student');
	}
	public function reciept()
	{
		$id=$this->session->userdata('id');
		$info=$this->studentmodel->student($id);
		$this->load->view('Student/send_conf',['info'=>$info]);
	}
	
}
?>
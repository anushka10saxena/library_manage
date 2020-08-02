<?php
class admin_dash extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if(!$this->session->userdata('admin_id'))
			return redirect('admin');
	}
	public function index()
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
		$this->load->view('admin/dashboard',['bookinquire'=>$bookinquire]);
	}
	public function bookinfo()
	{
		$bookinfo=$this->adminmodel->books();
		$this->load->view('admin/book_info',['bookinfo'=>$bookinfo]);
	}
	public function increase($book_id)
	{
		$a=$this->adminmodel->increase($book_id);
		return redirect('admin_dash/bookinfo');
	}
	public function decrease($book_id)
	{
		$a=$this->adminmodel->decrease($book_id);
	}
	public function addbooks()
	{
		if($this->form_validation->run('book_validation'))
		{
			$post=$this->input->post();
			$a=$this->adminmodel->add_books($post);
			//print_r($a);
			//exit;
			if($a==1)
			{
				$this->session->set_flashdata('msg','book added successfully!');
				$this->session->set_flashdata('msg_class','alert-success');
            }
			else
			{
				$this->session->set_flashdata('msg','book is already registered!');
				$this->session->set_flashdata('msg_class','alert-danger');
			
			}
			return redirect('admin_dash/bookinfo');
		}
		else
		{
			//$this->increase($bookid);
		    $this->load->view('admin/add_books');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('admin_id');
		return redirect('admin');
	}
	public function user()
	{
		$userinfo=$this->adminmodel->user();
		//print_r($userinfo);
		//exit;
		$this->load->view('admin/user',['userinfo'=>$userinfo]);
	}
	public function issue()
	{
		if($this->form_validation->run('issue_validation'))
		{
			$post=$this->input->post();
			$a=$this->adminmodel->issue($post);
			//print_r($a);
			//exit;
			if($a)
			{
				$this->decrease($a);
			}
			return redirect('admin_dash/user');
		}
		else
		{
			
			$this->load->view('Student/issue');
		}
	}
	public function return($issue_id)
	{
		$returnbook=$this->studentmodel->studentinfo($issue_id);
		//print_r($returnbook);
		//exit;
		$this->load->view('admin/return',['returnbook'=>$returnbook]);
	}
	public function update($id)
	{
		$post=$this->input->post();
		//print_r($post);
		//exit;
		$array = 'true';
		$post['status']=$array;
		//print_r($post);
		//exit;
		//if($this->studentmodel->update($id,$array))
		$p=$this->studentmodel->update($id,$post);
		{
			$p=$this->studentmodel->student_info($id);
		    $array=json_decode(json_encode($p),true);
		    foreach ($array as $key) {
		    	$book_id=$key['book_id'];
		    }
		    //print_r($book_id);
		    //exit;
			$this->adminmodel->increase($book_id);
			return redirect('admin_dash/user');
		}
	}
	public function placeorder()
	{
		if($this->form_validation->run('placeorder_validate'))
		{
		  $post=$this->input->post();
		  $placeorder=$this->adminmodel->placeorder($post);
		  if($placeorder)
		  {
		  	$this->load->library('email');
			$this->email->from("anushka10saxena@gmail.com");
			$this->email->to("1234shikhaa@gmail.com");
			$this->email->subject("Order for the mentioned books");
			$this->email->message($this->load->view('admin/displayorder','',true));
			$this->email->set_newline("\r\n");
			$this->email->send();
				if(!$this->email->send())
				{
					show_error($this->email->print_debugger());
				}
			    else
			    {
				    echo "your email has been sent";
			    }
			return redirect('admin_dash/placeorder');
		   }
		}
		  else
		  {
		  	$this->load->view('admin/placeorder');
		  	$order=$this->adminmodel->displayorder();
			$this->load->view('admin/displayorder',['order'=>$order]);
		  }
		//if ($placeorder)
		//{
			//$this->load->view('admin/displayorder',['placeorder'=>$placeorder]);
		//}
		//else
		//{
			//$this->load->view('admin/placeorder');
		//} 
		//print_r($placeorder);
		//exit;
		//$this->load->view('admin/displayorder');//,['placeorder'=>$placeorder]);
	}
	public function student()
	{
		$this->load->library('pagination');
		$config=['base_url'=>base_url('admin_dash/student'),
		         'per_page'=>4,
		         'total_rows'=>$this->studentmodel->all_num_rows(),
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
		$student=$this->adminmodel->student($config['per_page'],$this->uri->segment(3));
		$this->load->view('student/usermanage',['student'=>$student]);
	}
	public function get_name()
        {
        $connection_mysql=mysqli_connect("localhost","root","","library_manage");
        if(isset($_POST["query"]))
        {
            $output='';
            $query="SELECT title FROM books WHERE title LIKE '%".$_POST["query"]."%'";
            $result=mysqli_query($connection_mysql,$query);
            //print_r($result);
            //exit;
            $output='<ul class="list-unstyled">';
            if(mysqli_num_rows ($result)>0)
            {
                while ( $row = mysqli_fetch_array($result)) 
                {
                    $output .='<li>'.$row["title"].'</li>';
                }
            }
            else
            {
                $output.='<li>title not found</li>';
            }
            $output .='</ul>';
            echo $output;
        }
    }
    public function search_name()
	{
		$student_id=$_REQUEST['student_id'];
		$con=mysqli_connect("localhost","root","","library_manage");
		if ($student_id!=="")
		{
			$query=mysqli_query($con,"SELECT name FROM student WHERE student_id='$student_id'");
			$row=mysqli_fetch_array($query);
			$name=$row["name"];
		}
		$result=array("$name");
		$myJSON=json_encode($result);
		echo $myJSON;
	}
	public function search_author()
	{
		$title=$_REQUEST['title'];
		$con=mysqli_connect("localhost","root","","library_manage");
		if ($title!=="")
		{
			$query=mysqli_query($con,"SELECT author FROM books WHERE title='$title'");
			$row=mysqli_fetch_array($query);
			$author=$row["author"];
		}
		$result=array("$author");
		$myJSON=json_encode($result);
		echo $myJSON;
	}

}
?>

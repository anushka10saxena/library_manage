<?php
class student extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
		$post=$this->adminmodel->user();
		$array=json_decode(json_encode($post),true);
		//print_r($array);
		//exit;
		    foreach ($array as $key) 
		    {
		    	$return_date=$key['return_date'];
		    	$user_id=$key['user_id'];
		    	$status=$key['status'];
		        //exit;
		    	if ($return_date<date('y-m-d')&&$status!=true)
		    	{
		    		$p=$this->studentmodel->student($user_id);
		    		$a=json_decode(json_encode($p),true);
		    		$email=$a[0]['email'];
		    	    //echo $a[0]['email'];
		            //exit;
		                $this->load->library('email');
			        $this->email->from("anushka10saxena@gmail.com");
			        $this->email->to("$email");
			        $this->email->subject("Exceeded due date to return the book");
			        $this->email->message("You have exceeded the due to date of 1 month to return the book. Kindly return it to prevent imposition of fine.");
			        $this->email->set_newline("\r\n");
			        $this->email->send();
			}
		    }
			if($this->session->userdata('id'))
				return redirect('student_dash/welcome');

		}
		public function index()
		{
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			if($this->form_validation->run())
			{
				$uname=$this->input->post('username');
				$pass=$this->input->post('password');
				$this->load->model('studentmodel');
				//$password=$this->studentmodel->passverify($uname);
				$login_id=$this->studentmodel->user_validate($uname,$pass);
				//print_r($password);
				//exit;
				if($login_id )//&& password_verify($pass,$password))
				{
					$this->session->set_userdata('id',$login_id);
					return redirect('student_dash/welcome');
				}
				else
				{
					$this->session->set_flashdata('error','invalid username or password!');
					return redirect('student');
				}
			}
			else
			{

				$this->load->view('student/Login');
			}
		}		
		public function register()
		{
			$config=[
				'upload_path'=>'./upload/',
				'allowed_types'=>'gif|jpg|png',
			];
			$this->load->library('upload',$config);
			if($this->form_validation->run('user_validation')&& $this->upload->do_upload())
			{
				$post=$this->input->post();
				$data=$this->upload->data();
				$image_path=base_url("upload/".$data['raw_name'].$data['file_ext']);
				$post['image_path']=$image_path;
				$this->load->model('studentmodel');
				$id=$this->studentmodel->add_student($post);
				if($id)
				{
					
					//$info=$this->studentmodel->student($id);
		            //$view=$this->load->view('Student/send_conf',['info'=>$info]);	
		            //8+$this->reciept($id);
		            //print_r($view);
		            //exit;				
					$this->load->library('email');
					$config=array(
						'charset'=>'utf-8',
						'wordwrap'=>TRUE,
						'mailtype'=>'html'
					);
					$this->email->initialize($config);
			        $this->email->from("anushka10saxena@gmail.com");
			        $this->email->to(set_value('email'),set_value('name'));
			        $this->email->subject("registrations greeting");
			        //$this->email->message($this->load->view('student/send_conf',['info'=>$info]),'',true);
			        $this->email->message("Thank you for registration.Your roll no. is ");
			        $this->email->message(set_value('student_id'));
			        $this->email->set_newline("\r\n");
			        $this->email->send();
				    //if(!$this->email->send())
				    //{
					   //show_error($this->email->print_debugger());
				    //}
			        //else
			        //{
				       //echo "your email has been sent";
			        //}
					$this->session->set_flashdata('msg','registered successfully!');
					$this->session->set_flashdata('msg_class','alert-success');
					return redirect('student/index');  
				}
				else
				{
					$this->session->set_flashdata('msg','registeration unsuccessfull!');
					$this->session->set_flashdata('msg_class','alert-danger');
					return redirect('student/index');
				}
				
			}
			else
			{
				$student=$this->studentmodel->register();
				$upload_error=$this->upload->display_errors();
				$this->load->view('student/register',['student'=>$student],compact('upload_error'));
			}
		}
		
	}
?>

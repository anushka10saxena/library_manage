<?php
class adminmodel extends CI_Model
{
	public function user_validate($uname,$pass)
	{
		$q=$this->db->where(['username'=>$uname,'password'=>$pass])
		         ->get('admin');
		         if ($q->num_rows())
		         {
		         	return $q->row()->admin_id;
		         }
		         else
		         {
		         	return false;
		         }
	}
	public function book_info($limit,$offset)
	{
		$q=$this->db->select('')
                    ->limit($limit,$offset)
		            ->get('books');
		            return $q->result();
	}
    public function books()
    {
        $q=$this->db->select('')
                    //->limit($limit,$offset)
                    ->get('books');
                    return $q->result();
    }
    public function all_num_rows()
    {
        $q=$this->db->select('')
                 ->get('books');
                 return $q->num_rows();
    }
    public function student($limit,$offset)
    {
        $q=$this->db->select('')
                    ->order_by('id','desc')
                    ->limit($limit,$offset)
                    ->get('student');
                    return $q->result();
    }
	public function increase($book_id)
	{
		return $this->db->set('quantity','quantity+1',FALSE)
		         ->where(['book_id'=>$book_id])
		         ->update('books');
    }
    public function decrease($book_id)
    {
    	return $this->db->set('quantity','quantity-1',FALSE)
		         ->where(['book_id'=>$book_id])
		         ->update('books');
    }
    public function add_books($array)
    {
    	$title=$_POST['title'];
    	$author=$_POST['author'];
    	$cost=$_POST['cost'];
    	$quantity=$_POST['quantity'];
    	$query=$this->db->where(['title'=>$title,'author'=>$author])
    	         ->get('books');
    	         $count=$query->num_rows();
    	         if ($count==0)
    	         {
    	         	//$this->session->set_flashdata('msg','book added successfully!');
				    //$this->session->set_flashdata('msg_class','alert-success');
    	         	$data=(['title'=>$title,'author'=>$author,'cost'=>$cost,'quantity'=>$quantity]);
    	            return $this->db->insert('books',$data);
    	         }
    	         else
    	         {
    	         	$q=$this->db->select(['book_id'])
    	         	         ->where(['title'=>$title])
    	         	         ->get('books');
    	         	         bookid= $q->row()->book_id;
			 $data=(['title'=>$title,'author'=>$author,'cost'=>$cost]);
    	         	//$this->db->set('quantity',"quantity+$quantity",FALSE)
                         $this->db->where(['book_id'=>$bookid])
                             ->update('books',$data);
                         $quantity=$_POST['quantity'];
                         $this->db->set('quantity',"quantity+$quantity",FALSE)
                             ->where(['book_id'=>$bookid])
                             ->update('books');
                    return false;
    	         }
    	
    }
    public function user()
    {
    	$q=$this->db->select('')
                    ->order_by('issue_id','desc')
    	            ->get('issue');
    	         return $q->result();
    }
    public function issue($array)
    {
    	$title=$_POST['title'];
    	$student_id=$_POST['student_id'];
    	$name=$_POST['name'];
        $author=$_POST['author'];
    	$issuedate=$_POST['issuedate'];
    	$returndate=$_POST['returndate'];
    	$bookid=$this->db->select('book_id')
    	                 ->where(['title'=>$title,'author'=>$author])
    	                 ->get('books');
    	                 $book_id = $bookid->row()->book_id;
    	$studentid=$this->db->select('id')
    	                 ->where(['name'=>$name ,'student_id'=>$student_id])
    	                 ->get('student');
    	                 $user_id= $studentid->row()->id;

        $data=(['name'=>$name,'student_id'=>$student_id,'title'=>$title,'author'=>$author,'user_id'=>$user_id,'book_id'=>$book_id,'issue_date'=>$issuedate,'return_date'=>$returndate]);
        //return $this->db->insert('issue',$data);
        if($this->db->insert('issue',$data))
        {
    	    return $bookid->row()->book_id;
        }
    }
    public function placeorder($array)
    {
         return $this->db->insert('placeorder',$array);
         //{
             //$q=$this->db->select('')
                          //->get('placeorder');
                  //return $q->result();
              //}

    }
    public function displayorder()
    {
        $q=$this->db->select('')
                    ->order_by('id','desc')
                    ->get('placeorder');
                  return $q->result();
    }
}
?>

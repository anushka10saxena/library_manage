<?php
class studentmodel extends CI_Model
{
	public function user_validate($username,$password)
	{
		$q=$this->db->where(['username'=>$username,'password'=>$password])
		            ->get('student');
		            //echo "<pre>";
		            //print_r($q->result());
		            //exit;

		        if( $q->num_rows())
		        {
		        	return $q->row()->id;
		        	
		        }
		        else
		        {
		        	return false;
		        }

	}
	public function passverify($uname)
	{
		$q=$this->db->select(['password'])
		                ->where(['username'=>$uname])
		                ->get('student');
		                return $q->row()->password;
	}

	public function add_student($post)
	{
		$this->db->insert('student',$post);
		 return $this->db->insert_id();

	}
	public function student_info($id)
	{
		//$bookid=$this->db->select(['book_id'])
		         //->where(['user_id'=>$id])
		         //->get('issue');
		         //$book_id= $bookid->row()->book_id;
		$q=$this->db->select()
		            ->order_by('issue_id','desc')
		            ->where(['user_id'=>$id])
		            ->get('issue');
		         return $q->result();
	}
	public function all_num_rows()
	{
		$q=$this->db->select('')
		         ->get('student');
		         return $q->num_rows();
	}
	public function update($id,$array)
	{
		return $this->db->where(['issue_id'=>$id])
		         ->update('issue',$array);
	}
	public function student($id)
	{
		$q=$this->db->select()
		            ->where(['id'=>$id])
		            ->get('student');
		         return $q->result();
	}
	public function studentinfo($id)
	{
		//$bookid=$this->db->select(['book_id'])
		         //->where(['user_id'=>$id])
		         //->get('issue');
		         //$book_id= $bookid->row()->book_id;
		$q=$this->db->select()
		            ->order_by('issue_id','desc')
		            ->where(['issue_id'=>$id])
		            ->get('issue');
		         return $q->result();
	}
	public function register()
	{
		$q=$this->db->select()
		            ->get('student');
		         return $q->result();
	}
	
}
?>
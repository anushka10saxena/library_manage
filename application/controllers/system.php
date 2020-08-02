<?php
class system extends CI_Controller
{
	public function index()
	{
		$this->load->view('system/dashboard');
	}
}
<?php 

class Logout extends MY_Controller
{
	public function index()
	{
		$this->session->sess_destroy();
		redirect($this->agent->referrer());
	}
}
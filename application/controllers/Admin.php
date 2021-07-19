<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
		$this->load->helper('cookie');
		//refresh_token
		validate_token();
	}


	public function index()
	{
		$data['title'] = "Admin Home";
		$data['content'] = "/admin/content/home";
		$this->load->view('/admin/main', $data);
	}


}

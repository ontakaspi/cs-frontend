<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class Auth extends CI_Controller {

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
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct()
	{
		parent::__construct();
		$this->_client = new Client([
			'base_uri' => $this->config->item('mservice-auth'),
		]);
		$this->load->library('session');
		$this->load->helper('cookie');
	}

	public function login()
	{
		$this->load->view('login');
	}

	public function loginPost()
	{


		$data = [
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'remember_me' => $this->input->post('remember_me'),
		];

		try {
			$response = $this->_client->request('POST', 'auth/login',[GuzzleHttp\RequestOptions::JSON => $data]);
			// $result = $response->getBody();
			$result = json_decode($response->getBody()->getContents());

			if ($response->getStatusCode() == 200){
				$user = $result->data;
				$session_data = array(
					'username' 			   => $user->username,
					'fullname'			   => $user->fullname,
					'email'                => $user->email,
					'photo_path'                => $user->photo_path,
					'user_id'            => $user->user_id,
					'roles'            => $user->roles,
				);
				$this->session->set_userdata($session_data);

					$cookie = array(
						'name'   => 'token',
						'value'  => $user->token,
						'expire' => 86400*30,
						'secure' => TRUE
					);
					set_cookie($cookie);



					if ($this->input->post('remember_me')){
						$cookie = array(
							'name'   => 'remember_me',
							'value'  => 1,
							'expire' => 86400*30,
							'secure' => TRUE
						);
						set_cookie($cookie);
					}


				redirect('admin');

			}else{
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'.$result->data->message.'</div>');
				redirect('auth/login');
			}
		}
		catch (GuzzleHttp\Exception\ClientException $e) {
			$response = $e->getResponse();
			$responseBodyAsString = json_decode($response->getBody()->getContents());
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'.$responseBodyAsString->message.'</div>');
			redirect('auth/login');
		}

	}

	public function logout()
	{
		$user_data = $this->session->all_userdata();

		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$this->session->unset_userdata($key);
			}
		}
		delete_cookie("token");
		redirect('auth/login');
	}


}

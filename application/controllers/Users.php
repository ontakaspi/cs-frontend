<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Users extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
		$this->load->helper('cookie');
		$token =get_cookie('token');

		$this->_client = new Client([
			'base_uri' => $this->config->item('mservice-auth'),
			'http_errors' => false,
			'headers' => [
				'Authorization'     => $token,
			],
		]);

		//refresh_token
		validate_token();

	}


	public function index($method = null,$params=null)
	{
		if ($method !== 'profile'){
			if ($this->session->userdata('roles') !== 'admin') {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">User doesnt have this authorization</div>');
				redirect('admin');
			}
		}

		switch ($method) {
			case 'edit':
				$response = $this->_client->request('GET', 'users/index/'.$params);
				$result = (json_decode($response->getBody()->getContents(), true));

				if ($response->getStatusCode() == 200){
					$data['title'] = "Detail users";
					$data['data'] = (object)$result['data'];
					$data['content'] = "/admin/content/users/edit_users";
					$this->load->view('/admin/main', $data);
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">ID ='.$params.' '.$result["message"].'</div>');
					redirect('users/index');
				}

				break;
			case 'profile':
				switch ($params) {
					case 'update':
						$data = $this->input->post();
						$response = $this->_client->request('PUT', 'users/profile/update/'.$this->session->userdata('user_id'),[
							'form_params'            => $data
						]);
						$result = json_decode($response->getBody()->getContents(), true);
						if ($response->getStatusCode() == 200){
							echo json_encode($result);
						}else{
							echo json_encode($result);
						}
						break;

					default:
						$response = $this->_client->request('GET', 'users/index/'.$this->session->userdata('user_id'));
						$result = (json_decode($response->getBody()->getContents(), true));

						if ($response->getStatusCode() == 200){
							$data['title'] = "Profile users";
							$data['data'] = (object)$result['data'];
							$data['content'] = "/admin/content/users/profile_users";
							$this->load->view('/admin/main', $data);
						}else{
							$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">ID ='.$params.' '.$result["message"].'</div>');
							redirect('users/index');
						}
						break;
				}
				break;
			case 'delete':
				$response = $this->_client->request('DELETE', 'users/delete/'.$params);
				$result = json_decode($response->getBody()->getContents(), true);
				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}
				break;
			case 'update':

				$data = $this->input->post();

				$response = $this->_client->request('PUT', 'users/update/'.$data['id'],[
					'form_params'            => $data
				]);
				$result = json_decode($response->getBody()->getContents(), true);
				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}
				break;
			case 'create':

				$data = $this->input->post();
				$response = $this->_client->request('POST', 'users/create',[
					'form_params'            => $data
				]);
				$result = json_decode($response->getBody()->getContents(), true);
				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}
				break;
			default:
				$data['title'] = "List users";
				$data['datatablesUrl'] = base_url('users/datatables/');
				$data['content'] = "/admin/content/users/list_users";
				$this->load->view('/admin/main', $data);
				break;
		}


	}


	public function avatar($method = null)
	{
		switch ($method) {
			case 'upload':


				$file = $_FILES['image'];
				$file_path          = $_FILES['image']['tmp_name'];
				$file_mime          =$_FILES['image']['type'];
				$file_uploaded_name =  $_FILES['image']['name'];

				$response = $this->_client->request("POST", 'users/avatar/upload/'.$this->session->userdata('user_id'), [
					'multipart' => [
						[
							'name'      => 'image',
							'filename' => $file_uploaded_name,
							'Mime-Type'=> $file_mime,
							'contents' => fopen($file_path, 'r'),
						],
					]
				]);
				$result = (json_decode($response->getBody()->getContents(), true));

				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}

				break;
			case 'remove':
				$response = $this->_client->request('POST', 'users/avatar/remove/'.$this->session->userdata('user_id'));
				$result = json_decode($response->getBody()->getContents(), true);
				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}
				break;
		}

		$session_data = array(
			'photo_path'                => $result['photo_path'],
		);
		$this->session->set_userdata($session_data);
	}


	public function datatables($show = NULL, $showId = NULL)
	{
		switch ($show) {
			default:
				$response = $this->_client->request('GET', 'users');
				$result = json_decode($response->getBody()->getContents(), true);
				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}
		}
	}



}

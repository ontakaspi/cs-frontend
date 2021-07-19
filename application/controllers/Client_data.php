<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Client_data extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('string');
		$this->load->helper('cookie');
		$token =get_cookie('token');

		$this->_client = new Client([
			'base_uri' => $this->config->item('mservice-clothsize'),
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
		switch ($method) {
			case 'edit':
				$response = $this->_client->request('GET', 'client_data/index/'.$params);
				$result = (json_decode($response->getBody()->getContents(), true));

				if ($response->getStatusCode() == 200){
					$data['title'] = "Detail client";
					$data['data'] = (object)$result['data'];
					$data['content'] = "/admin/content/client_data/edit_client_data";
					$this->load->view('/admin/main', $data);
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">ID ='.$params.' '.$result["message"].'</div>');
					redirect('client_data/index');
				}

				break;
			case 'delete':
				$response = $this->_client->request('DELETE', 'client_data/delete/'.$params);
				$result = json_decode($response->getBody()->getContents(), true);
				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}
				break;
			case 'update':

				$data = $this->input->post();

				$response = $this->_client->request('PUT', 'client_data/update/'.$data['id'],[
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
				$response = $this->_client->request('POST', 'client_data/create',[
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
				$data['title'] = "List client";
				$data['datatablesUrl'] = base_url('client_data/datatables/');
				$data['content'] = "/admin/content/client_data/list_client_data";
				$this->load->view('/admin/main', $data);
				break;
		}


	}


	public function datatables($show = NULL, $showId = NULL)
	{
		switch ($show) {
			default:
				$response = $this->_client->request('GET', 'client_data');
				$result = json_decode($response->getBody()->getContents(), true);
				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}
		}
	}


}

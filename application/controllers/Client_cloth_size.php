<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Client_cloth_size extends CI_Controller {

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
			case 'detail':
				$response = $this->_client->request('GET', 'client_data/index/'.$params);
				$result = (json_decode($response->getBody()->getContents(), true));
				if ($response->getStatusCode() == 200){
					$data['title'] = "Detail Ukuran Baju Client";
					$data['data'] = (object)$result['data'];
					$data['datatablesUrl'] = base_url('client_cloth_size/datatables/detail/'.$params);
					$data['content'] = "/admin/content/client_cloth_size/list_client_cloth_size_detail";
					$this->load->view('/admin/main', $data);
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">ID ='.$params.' '.$result["message"].'</div>');
					redirect('client_cloth_size/index');
				}

				break;
			case 'edit':
				$response = $this->_client->request('GET', 'client_cloth_size/detail/'.$params);
				$result = (json_decode($response->getBody()->getContents(), true));
				$data_ukuran_client = (object)$result['data'];

				if ($response->getStatusCode() == 200){
					$response1 = $this->_client->request('GET', 'size_chart/get/gender/'.$data_ukuran_client->gender);
					$result1 = (json_decode($response1->getBody()->getContents(), true));

					$response2 = $this->_client->request('GET', 'size_chart/get/cloth_type/'.$data_ukuran_client->cloth_type.'/'.$data_ukuran_client->gender);
					$result2 = (json_decode($response2->getBody()->getContents(), true));

					if ($response1->getStatusCode() == 200 && $response2->getStatusCode() == 200){

						$data['title'] = "Edit Ukuran Baju Client";
						$data['data'] = $data_ukuran_client;
						$data['cloth_type'] = (object)$result1['data'];
						$data['size_type'] = (object)$result2['data'];
						$data['content'] = "/admin/content/client_cloth_size/edit_client_cloth_size";
						$this->load->view('/admin/main', $data);
					}else{
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'.isset($result2["message"])? $result2["message"]:$result1["message"].'</div>');
						redirect('client_cloth_size/index');
					}

				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">ID ='.$params.' '.$result["message"].'</div>');
					redirect('client_cloth_size/index');
				}

				break;
			case 'delete':
				$response = $this->_client->request('DELETE', 'client_cloth_size/delete/'.$params);
				$result = json_decode($response->getBody()->getContents(), true);
				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}
				break;
			case 'update':

				$data = $this->input->post();

				$response = $this->_client->request('PUT', 'client_cloth_size/update/'.$data['id'],[
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
				$response = $this->_client->request('POST', 'client_cloth_size/create',[
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
				$response1 = $this->_client->request('GET', 'client_data');
				$result1 = json_decode($response1->getBody()->getContents(), true);

				if ($response1->getStatusCode() == 200){
					$data['data_client'] = (object)$result1['data'];
					$data['title'] = "List Ukuran Baju Client";
					$data['datatablesUrl'] = base_url('client_cloth_size/datatables/');
					$data['content'] = "/admin/content/client_cloth_size/list_client_cloth_size";
					$this->load->view('/admin/main', $data);
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'.$result1["message"].', add client first</div>');
					redirect('client_data/index');
				}


				break;
		}


	}


	public function datatables($show = NULL, $showId = NULL)
	{
		switch ($show) {
			case 'detail':
				$response = $this->_client->request('GET', 'client_cloth_size/index/'.$showId);
				$result = (json_decode($response->getBody()->getContents(), true));
				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}
				break;
			default:
				$response = $this->_client->request('GET', 'client_cloth_size');
				$result = json_decode($response->getBody()->getContents(), true);
				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}
		}
	}


}

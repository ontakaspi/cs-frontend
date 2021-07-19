<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use GuzzleHttp\Client;

class Size_chart extends CI_Controller {

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

		//validate the token
		validate_token();

	}


	public function index($method = null,$params=null)
	{
		switch ($method) {
			case 'edit':
				$response = $this->_client->request('GET', 'size_chart/index/'.$params);
				$result = (json_decode($response->getBody()->getContents(), true));

				if ($response->getStatusCode() == 200){
					$data['title'] = "Detail Ukuran Baju";
					$data['data'] = (object)$result['data'];
					$data['content'] = "/admin/content/size_chart/edit_size_chart";
					$this->load->view('/admin/main', $data);
				}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">ID ='.$params.' '.$result["message"].'</div>');
					redirect('size_chart/index');
				}

				break;
			case 'delete':
				$response = $this->_client->request('DELETE', 'Size_chart/delete/'.$params);
				$result = json_decode($response->getBody()->getContents(), true);
				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}
				break;
			case 'update':

				$data = $this->input->post();

				$response = $this->_client->request('PUT', 'Size_chart/update/'.$data['id'],[
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
				$response = $this->_client->request('POST', 'Size_chart/create/',[
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
				$data['title'] = "List Ukuran Baju";
				$data['datatablesUrl'] = base_url('Size_chart/datatables/');
				$data['content'] = "/admin/content/size_chart/list_size_chart";
				$this->load->view('/admin/main', $data);
				break;
		}


	}
	public function datatables($show = NULL, $showId = NULL)
	{
		switch ($show) {
			default:
				$response = $this->_client->request('GET', 'size_chart');
				$result = json_decode($response->getBody()->getContents(), true);
				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}
		}
	}

	public function get_by($method = NULL)
	{
		switch ($method) {
			case 'cloth_type':
				$cloth_type=$this->input->post('cloth_type');
				$gender=$this->input->post('gender');

				$response = $this->_client->request('GET', 'size_chart/get/cloth_type/'.$cloth_type.'/'.$gender);
				$result = json_decode($response->getBody()->getContents(), true);
				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}
				break;
			case 'gender':

				$gender=$this->input->post('gender');

				$response = $this->_client->request('GET', 'size_chart/get/gender/'.$gender);
				$result = json_decode($response->getBody()->getContents(), true);
				if ($response->getStatusCode() == 200){
					echo json_encode($result);
				}else{
					echo json_encode($result);
				}
				break;
			default:
				$result =[
					'code' => 404,
					'message' => 'url not sending get by method',
				];
				echo json_encode($result);
				break;

		}
	}

}

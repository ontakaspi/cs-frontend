<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
use GuzzleHttp\Client;
if (!function_exists('validate_token')) {

	function validate_token()
	{

		$ci =& get_instance();
		$ci->load->library('session');
		$token =get_cookie('token');
		$remember_me = get_cookie('remember_me');

		$client = new Client([
			'base_uri' => $ci->config->item('mservice-auth'),
			'http_errors' => false,
		]);


		if (isset($token)){
			// validate the token if expire
				$response = $client->request('POST', 'auth/validate_token',[
					'form_params'            =>
						[
							'token' => $token
						]
				]);

			if ($response->getStatusCode() !== 200){

				// if the response is invalid do refresh token if user checked the remember_token( so $refresh_token must have on the cookies)
				if (isset($remember_me)){

					$response = $client->request('POST', 'auth/refresh_token',[
						'form_params'            =>
							[
								'token' => $token
							]
					]);


					if ($response->getStatusCode() == 200){

						$result = (object)(json_decode($response->getBody()->getContents(), true));
						$user = (object)$result->data;
						$session_data = array(
							'username' 			   => $user->username,
							'fullname'			   => $user->fullname,
							'email'                => $user->email,
							'user_id'            => $user->user_id,
							'photo_path'                => $user->photo_path,
						);
						$ci->session->set_userdata($session_data);

						$cookie = array(
							'name'   => 'token',
							'value'  => $user->token,
							'expire' => 86400*30,
							'secure' => TRUE
						);
						set_cookie($cookie);
						return true;
					}

				}
			}else{
				return true;
			}
		}

		$user_data = $ci->session->all_userdata();

		foreach ($user_data as $key => $value) {
			if ($key != 'session_id' && $key != 'ip_address' && $key != 'user_agent' && $key != 'last_activity') {
				$ci->session->unset_userdata($key);
			}
		}
		delete_cookie("token");

		$ci->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Session Expire, please login again..</div>');
		redirect('auth/login');

	}
}

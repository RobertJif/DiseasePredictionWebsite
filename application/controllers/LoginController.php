<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginController extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_login');
    }

	public function index()
	{
        $this->load->library('nexmo');
        $this->nexmo->set_format('json');
        
        $from = 'CANDY';
        $to = '6281993270562';
        $message = array(
            'text' => 'Hello This is me Robert',
        );
        $response = $this->nexmo->send_message($from, $to, $message);
        echo "<h1>Text Message</h1>";
        $this->nexmo->d_print($response);
        echo "<h3>Response Code: ".$this->nexmo->get_http_status()."</h3>";


		//$this->load->view('login');
	}



	function login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$cek = $this->M_login->prosesLogin($username,$password);
		$hasil = count($cek);

	if($hasil > 0){
		$select = $this->db->get_where('admin', array('username' => $username, 'password' => $password))->row();

		$data = array ('logged_in' => true,
		'id' => $select->id,
		'username' => $select->username,
		'nama' => $select->nama);
		$this->session->set_userdata($data);
		redirect('c_pakar/view_admin');
	}
	else
		{
			$this->session->set_flashdata('err','username dan password salah');
	redirect('logincontroller/index');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		$this->load->view('login');
	}
}

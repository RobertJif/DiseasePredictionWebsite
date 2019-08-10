<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

    

	public function prosesLogin($username,$password)
	{
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        return $this->db->get('admin')->row();
	}

	
}

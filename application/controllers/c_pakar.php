<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_pakar extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->model('M_controls');
    }

    function view_admin()
    {
    	$x['data']=$this->M_controls->show_admin();
		$this->load->view('v_admin', $x);
    }

    function simpan_admin(){
		$nama=$this->input->post('nama');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->M_controls->simpan_admin($nama,$username,$password);
		redirect('c_pakar/view_admin');

	}
	function edit_admin(){
		$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$username=$this->input->post('username');
		$password=$this->input->post('password');
		$this->M_controls->edit_admin($id,$nama,$username,$password);
		redirect('c_pakar/view_admin');
	}

	function hapus_admin(){
		$id = $this->input->get('id');
		$this->M_controls->hapus_admin($id);
		redirect('c_pakar/view_admin');

	}

    function view_gejala()
    {
    	$x['data']=$this->M_controls->show_gejala();
		$this->load->view('v_gejala', $x);
    }

    function simpan_gejala(){
		$nama=$this->input->post('nama');
		$this->M_controls->simpan_gejala($nama);
		redirect('c_pakar/view_gejala');

	}
	function edit_gejala(){
		$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$this->M_controls->edit_gejala($id,$nama);
		redirect('c_pakar/view_gejala');
	}

	function hapus_gejala(){
		$id = $this->input->get('id');
		$this->M_controls->hapus_gejala($id);
		redirect('c_pakar/view_gejala');

	}

	function view_penyakit()
    {
    	$x['data']=$this->M_controls->show_penyakit();
		$this->load->view('v_penyakit', $x);
    }

    function simpan_penyakit(){
		$nama=$this->input->post('nama');
		$this->M_controls->simpan_penyakit($nama);
		redirect('c_pakar/view_penyakit');

	}
	function edit_penyakit(){
		$id=$this->input->post('id');
		$nama=$this->input->post('nama');
		$this->M_controls->edit_penyakit($id,$nama);
		redirect('c_pakar/view_penyakit');
	}

	function hapus_penyakit(){
		$id = $this->input->get('id');
		$this->M_controls->hapus_penyakit($id);
		redirect('c_pakar/view_penyakit');

	}

	function view_gejala_penyakit($note="")
    {
    	$x['data']=$this->M_controls->show_gejala_penyakit();
    	$x['data_p']=$this->M_controls->show_penyakit();
    	$x['data_g']=$this->M_controls->show_gejala();
    	$x['note']=$note;
		//echo $note;
		$this->load->view('v_gejala_penyakit', $x);
    }

    function simpan_gejala_penyakit(){
		$id_gejala=$this->input->post('id_gejala');
		$id_penyakit=$this->input->post('id_penyakit');
		$mb=$this->input->post('mb');
		$md=$this->input->post('md');
		$count=$this->M_controls->gejala_exist($id_gejala,$id_penyakit);
		$countgejala = $count->num_rows();
		if ($countgejala<1) {
			
			//echo "nice ".$countgejala;
			$this->M_controls->simpan_gejala_penyakit($id_gejala,$id_penyakit,$md,$mb);
			redirect('c_pakar/view_gejala_penyakit/');
		}
		else{
			//echo "not nice ".$countgejala;
			redirect('c_pakar/view_gejala_penyakit/fail');
		}


	}
	function edit_gejala_penyakit(){
		$id=$this->input->post('id');
		$id_gejala=$this->input->post('id_gejala');
		$id_penyakit=$this->input->post('id_penyakit');
		$mb=$this->input->post('mb');
		$md=$this->input->post('md');

		$this->M_controls->edit_gejala_penyakit($id,$id_gejala,$id_penyakit,$md,$mb);
		redirect('c_pakar/view_gejala_penyakit/');
	}

	function hapus_gejala_penyakit(){
		$id = $this->input->get('id');
		$this->M_controls->hapus_gejala_penyakit($id);
		redirect('c_pakar/view_gejala_penyakit/');

	}

	function hitung($array_mb, $array_md) {
      $cari = new Cari_cf();
      $hasil_mb = $cari->convert_cf($array_mb);
      $hasil_md = $cari->convert_cf($array_md);

      $result = ($hasil_mb - $hasil_md) * 100;
      return $result;
    }

    function convert_cf($g) {
      $cari = new Cari_cf();
        if(count($g) <= 1)
      return $g[0];

     $cfIJ = null;
     $n = count($g);
       for($i = 0; $i < $n - 1; $i++) {
        $j = $i + 1;
          if($cfIJ == null)
           $cfIJ = $g[$i];

          $cfIJ = $cari->hitung_mb_md($cfIJ, $g[$j]);
       }
     return $cfIJ;
    }

    function hitung_mb_md($x, $y) {
      $hasil = $x + $y * (1 - $x);
      return $hasil;
    }
}

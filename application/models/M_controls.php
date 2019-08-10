<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_controls extends CI_Model {

	function show_admin(){
		$hasil=$this->db->query("SELECT * FROM admin");
		return $hasil;
	}
	function simpan_admin($nama,$username,$password){
		$hasil=$this->db->query("INSERT INTO admin VALUES ('','$nama','$username','$password')");
		return $hasil;
	}

	function edit_admin($id,$nama,$username,$password){
		$hasil=$this->db->query("UPDATE admin SET nama='$nama',username='$username',password='$password' WHERE id='$id'");
		return $hasil;
	}
	function hapus_admin($id){
		$hasil=$this->db->query("DELETE FROM admin WHERE id='$id'");
		return $hasil;
	}

	function show_gejala(){
		$hasil=$this->db->query("SELECT * FROM gejala");
		return $hasil;
	}
	function simpan_gejala($nama){
		$hasil=$this->db->query("INSERT INTO gejala VALUES ('','$nama')");
		return $hasil;
	}

	function edit_gejala($id,$nama){
		$hasil=$this->db->query("UPDATE gejala SET nama='$nama' WHERE id='$id'");
		return $hasil;
	}
	function hapus_gejala($id){
		$hasil=$this->db->query("DELETE FROM gejala WHERE id='$id'");
		return $hasil;
	}
	
		function show_penyakit(){
		$hasil=$this->db->query("SELECT * FROM penyakit");
		return $hasil;
	}
	function simpan_penyakit($nama){
		$hasil=$this->db->query("INSERT INTO penyakit VALUES ('','$nama')");
		return $hasil;
	}

	function edit_penyakit($id,$nama){
		$hasil=$this->db->query("UPDATE penyakit SET nama='$nama' WHERE id='$id'");
		return $hasil;
	}
	function hapus_penyakit($id){
		$hasil=$this->db->query("DELETE FROM penyakit WHERE id='$id'");
		return $hasil;
	}

	function show_gejala_penyakit(){
		$hasil=$this->db->query("SELECT a.*,c.nama nama_penyakit,b.nama nama_gejala FROM gejala_penyakit a left join gejala b on a.id_gejala=b.id left join penyakit c on c.id=a.id_penyakit");
		return $hasil;
	}
	function simpan_gejala_penyakit($id_gejala,$id_penyakit,$md,$mb){
		$hasil=$this->db->query("INSERT INTO gejala_penyakit VALUES ('','$id_gejala','$id_penyakit','$md','$mb')");
		return $hasil;
	}

	function edit_gejala_penyakit($id,$id_gejala,$id_penyakit,$md,$mb){
		$hasil=$this->db->query("UPDATE gejala_penyakit SET id_gejala='$id_gejala',id_penyakit='$id_penyakit',mb='$mb',md='$md' WHERE id='$id'");
		return $hasil;
	}
	function hapus_gejala_penyakit($id){
		$hasil=$this->db->query("DELETE FROM gejala_penyakit WHERE id='$id'");
		return $hasil;
	}
	function gejala_exist($id_gejala,$id_penyakit){
		$hasil=$this->db->query("SELECT * FROM gejala_penyakit where id_gejala='$id_gejala' and id_penyakit='$id_penyakit'");
		return $hasil;
	}
}

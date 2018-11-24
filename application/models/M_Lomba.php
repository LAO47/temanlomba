<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Lomba extends CI_Model {
	private $_Tabel = 'Tbl_Lomba';

	public function getById($id){
		return $this->db->get_where($this->_Tabel,['Id_Lomba'=>$id])->row();
	}
	
	public function getAll(){
		return $this->db->get($this->_Tabel)->result();
	}

	public function save($data){
		return $this->db->insert($this->_Tabel,$data);
	}
	public function getAllKategoriLomba(){
		return $this->db->get("Tbl_Kategori")->result();
	}

	public function getSingleLomba($id){
		//TODO buat informasi lebih lanjut tiap lomba, list orang yang mengambil
		$q = "SELECT l.Judul,l.Deskripsi,u.Name,u.Institution,u.Username 
			FROM tbl_request r 
			INNER JOIN tbl_lomba l on r.Id_Lomba = l.Id_Lomba 
			INNER JOIN tbl_user u on r.Id_User = u.Id_User 
			WHERE r.Id_Lomba = $id ";
		$result = $this->db->query($q);
		return $result->result_array();
	}

	public function getByIdKategori($id){
		return $this->db->get_where("Tbl_Kategori",['Id_Kategori'=>$id])->row();
	}

}
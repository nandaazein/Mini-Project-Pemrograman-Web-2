<?php

class PegawaiModel {
	
	private $table = 'pegawai';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getAllPegawai(){
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getPegawaiById($id){
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_pegawai=:id_pegawai');
		$this->db->bind('id_pegawai',$id);
		return $this->db->single();
	}

	public function tambahPegawai($data){
		$query = "INSERT INTO pegawai (nama, alamat, jenis_kelamin, telepon) VALUES(:nama, :alamat, :jenis_kelamin, :telepon)";
		$this->db->query($query);
		$this->db->bind('nama',$data['nama']);
        $this->db->bind('alamat',$data['alamat']);
        $this->db->bind('jenis_kelamin',$data['jenis_kelamin']);
        $this->db->bind('telepon',$data['telepon']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPegawai($data){
        $query = "UPDATE pegawai SET nama=:nama, alamat=:alamat, jenis_kelamin=:jenis_kelamin, telepon=:telepon WHERE id_pegawai=:id_pegawai";
        $this->db->query($query);
        $this->db->bind('id_pegawai',$data['id_pegawai']);
        $this->db->bind('nama',$data['nama']);
        $this->db->bind('alamat',$data['alamat']);
        $this->db->bind('jenis_kelamin',$data['jenis_kelamin']);
        $this->db->bind('telepon',$data['telepon']);
        $this->db->execute();
    
        return $this->db->rowCount();
    }
    
	public function deletePegawai($id){
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_pegawai=:id_pegawai');
		$this->db->bind('id_pegawai',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariPegawai(){
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}
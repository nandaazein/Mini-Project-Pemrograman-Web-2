<?php

class NasabahModel {
	
	private $table = 'nasabah';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getAllNasabah(){
		$this->db->query('SELECT * FROM ' . $this->table);
		return $this->db->resultSet();
	}

	public function getNasabahById($id){
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_nasabah=:id_nasabah');
		$this->db->bind('id_nasabah',$id);
		return $this->db->single();
	}

	public function tambahNasabah($data){
		$query = "INSERT INTO nasabah (nama, alamat, jenis_kelamin, telepon) VALUES(:nama, :alamat, :jenis_kelamin, :telepon)";
		$this->db->query($query);
		$this->db->bind('nama',$data['nama']);
        $this->db->bind('alamat',$data['alamat']);
        $this->db->bind('jenis_kelamin',$data['jenis_kelamin']);
        $this->db->bind('telepon',$data['telepon']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataNasabah($data){
		$query = "UPDATE nasabah SET nama=:nama, alamat=:alamat, jenis_kelamin=:jenis_kelamin, telepon=:telepon WHERE id_nasabah=:id_nasabah";
		$this->db->query($query);
        $this->db->bind('id_nasabah',$data['id_nasabah']);
		$this->db->bind('nama',$data['nama']);
        $this->db->bind('alamat',$data['alamat']);
        $this->db->bind('jenis_kelamin',$data['jenis_kelamin']);
        $this->db->bind('telepon',$data['telepon']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteNasabah($id){
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_nasabah=:id_nasabah');
		$this->db->bind('id_nasabah',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariNasabah(){
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE nama LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}
<?php

class BarangModel {
	
	private $table = 'barang_gadai';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getAllBarang(){
		$this->db->query("SELECT barang_gadai.*, nasabah.*, transaksi.* FROM " . $this->table . " JOIN nasabah ON nasabah.id_nasabah = barang_gadai.id_nasabah JOIN transaksi ON transaksi.id_transaksi = barang_gadai.id_transaksi");
		return $this->db->resultSet();
	}

	public function getBarangById($id){
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_barang_gadai=:id_barang_gadai');
		$this->db->bind('id_barang_gadai',$id);
		return $this->db->single();
	}

	public function tambahBarang($data){
		$query = "INSERT INTO barang_gadai (id_nasabah, id_transaksi, berat_barang, nilai_taksiran) VALUES(:id_nasabah, :id_transaksi, :berat_barang, :nilai_taksiran)";
		$this->db->query($query);
		$this->db->bind('id_nasabah', $data['id_nasabah']);
		$this->db->bind('id_transaksi',$data['id_transaksi']);
        $this->db->bind('berat_barang',$data['berat_barang']);
        $this->db->bind('nilai_taksiran',$data['nilai_taksiran']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataBarang($data){
		$query = "UPDATE barang_gadai SET id_transaksi=:id_transaksi, berat_barang=:berat_barang, nilai_taksiran=:nilai_taksiran WHERE id_barang_gadai=:id_barang_gadai";
		$this->db->query($query);
        $this->db->bind('id_barang_gadai',$data['id_barang_gadai']);
		$this->db->bind('id_transaksi',$data['id_transaksi']);
        $this->db->bind('berat_barang',$data['berat_barang']);
        $this->db->bind('nilai_taksiran',$data['nilai_taksiran']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteBarang($id){
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_barang_gadai=:id_barang_gadai');
		$this->db->bind('id_barang_gadai',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariBarang(){
		$key = $_POST['key'];
		//$this->db->query("SELECT * FROM " . $this->table . " WHERE berat_barang LIKE :key");
		$this->db->query("SELECT nasabah.nama, barang_gadai.* FROM barang_gadai INNER JOIN nasabah ON barang_gadai.id_nasabah = nasabah.id_nasabah WHERE nasabah.nama LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}
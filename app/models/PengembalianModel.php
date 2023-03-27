<?php

class PengembalianModel {
	
	private $table = 'pengembalian';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getAllPengembalian(){
		$this->db->query("SELECT pengembalian.*, transaksi.*, nasabah.* FROM " . $this->table . " JOIN transaksi ON transaksi.id_transaksi = pengembalian.id_transaksi JOIN nasabah ON nasabah.id_nasabah = pengembalian.id_nasabah");
		return $this->db->resultSet();
	}

	public function getPengembalianById($id){
		$this->db->query("SELECT pengembalian.*, transaksi.*, nasabah.* FROM " . $this->table . " JOIN transaksi ON transaksi.id_transaksi = pengembalian.id_transaksi JOIN nasabah ON nasabah.id_nasabah = pengembalian.id_nasabah " . ' WHERE id_pengembalian=:id_pengembalian');
		$this->db->bind('id_pengembalian',$id);
		return $this->db->single();
	}

	public function tambahPengembalian($data){
		$query = "INSERT INTO pengembalian (id_transaksi, id_nasabah, tanggal_pengembalian, jumlah_pengembalian) VALUES(:id_transaksi, :id_nasabah, :tanggal_pengembalian, :jumlah_pengembalian)";
		$this->db->query($query);
        $this->db->bind('id_transaksi',$data['id_transaksi']);
		$this->db->bind('id_nasabah',$data['id_nasabah']);
		$this->db->bind('tanggal_pengembalian',$data['tanggal_pengembalian']);
		$this->db->bind('jumlah_pengembalian', $data['jumlah_pengembalian']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataPengembalian($data){
		$query = "UPDATE pengembalian SET tanggal_pengembalian=:tanggal_pengembalian, jumlah_pengembalian=:jumlah_pengembalian WHERE id_pengembalian=:id_pengembalian";
		$this->db->query($query);
		//$this->db->bind('id_transaksi',$data['id_transaksi']);
		//$this->db->bind('id_nasabah',$data['id_nasabah']);
		$this->db->bind('id_pengembalian',$data['id_pengembalian']);
		$this->db->bind('tanggal_pengembalian',$data['tanggal_pengembalian']);
		$this->db->bind('jumlah_pengembalian', $data['jumlah_pengembalian']);
        $this->db->execute();

		return $this->db->rowCount();
	}

	public function deletePengembalian($id){
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_pengembalian=:id_pengembalian');
		$this->db->bind('id_pengembalian',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}
	
	public function cariPengembalian(){
		$key = $_POST['key'];
		$this->db->query("SELECT nasabah.nama, pengembalian.* FROM pengembalian INNER JOIN nasabah ON pengembalian.id_nasabah = nasabah.id_nasabah WHERE nasabah.nama LIKE :key");
		//$this->db->query("SELECT nasabah.nama, angsuran.* FROM angsuran INNER JOIN nasabah ON angsuran.id_nasabah = nasabah.id_nasabah WHERE nasabah.nama LIKE :key");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}

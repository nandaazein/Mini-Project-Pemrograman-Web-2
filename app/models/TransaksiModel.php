<?php

class TransaksiModel {
	
	private $table = 'transaksi';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getAllTransaksi(){
		$this->db->query("SELECT transaksi.*, nasabah.*, jenis_angsuran.* FROM " . $this->table . " JOIN nasabah ON nasabah.id_nasabah = transaksi.id_nasabah JOIN jenis_angsuran ON jenis_angsuran.id_jenis_angsuran = transaksi.id_jenis_angsuran");
		return $this->db->resultSet();
	}

	public function getTransaksiById($id){
		$this->db->query("SELECT transaksi.*, nasabah.*, jenis_angsuran.* FROM " . $this->table . " JOIN nasabah ON nasabah.id_nasabah = transaksi.id_nasabah JOIN jenis_angsuran ON jenis_angsuran.id_jenis_angsuran = transaksi.id_jenis_angsuran " . ' WHERE id_transaksi=:id_transaksi');
		$this->db->bind('id_transaksi',$id);
		return $this->db->single();
	}

	public function tambahTransaksi($data){
		$query = "INSERT INTO transaksi (id_nasabah, tanggal_transaksi, id_jenis_angsuran, status_pinjaman) VALUES(:id_nasabah, :tanggal_transaksi, :id_jenis_angsuran,:status_pinjaman)";
		$this->db->query($query);
        $this->db->bind('id_nasabah',$data['id_nasabah']);
		$this->db->bind('tanggal_transaksi',$data['tanggal_transaksi']);
		$this->db->bind('id_jenis_angsuran', $data['id_jenis_angsuran']);
        $this->db->bind('status_pinjaman',$data['status_pinjaman']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataTransaksi($data){
		$query = "UPDATE transaksi SET id_nasabah=:id_nasabah, tanggal_transaksi=:tanggal_transaksi, id_jenis_angsuran=:id_jenis_angsuran, status_pinjaman=:status_pinjaman WHERE id_transaksi=:id_transaksi";
		$this->db->query($query);
        $this->db->bind('id_nasabah',$data['id_nasabah']);
		$this->db->bind('id_transaksi',$data['id_transaksi']);
		$this->db->bind('tanggal_transaksi',$data['tanggal_transaksi']);
		$this->db->bind('id_jenis_angsuran', $data['id_jenis_angsuran']);
        $this->db->bind('status_pinjaman',$data['status_pinjaman']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteTransaksi($id){
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_transaksi=:id_transaksi');
		$this->db->bind('id_transaksi',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariTransaksi(){
		$key = $_POST['key'];
		//$this->db->query("SELECT * FROM " . $this->table . " WHERE tanggal_transaksi LIKE :key");
		$this->db->query("SELECT nasabah.*, transaksi.*, jenis_angsuran.* FROM transaksi JOIN nasabah ON nasabah.id_nasabah = transaksi.id_nasabah JOIN jenis_angsuran ON jenis_angsuran.id_jenis_angsuran = transaksi.id_jenis_angsuran WHERE nasabah.nama LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}
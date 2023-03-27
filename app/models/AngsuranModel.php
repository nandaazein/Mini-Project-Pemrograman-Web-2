<?php 

class AngsuranModel {
	
	private $table = 'angsuran';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getAllAngsuran(){
		$this->db->query("SELECT angsuran.*, nasabah.*, transaksi.* FROM " . $this->table . " JOIN nasabah ON nasabah.id_nasabah = angsuran.id_nasabah JOIN transaksi ON transaksi.id_transaksi = angsuran.id_transaksi");
		return $this->db->resultSet();
	}

	public function getAngsuranById($id){
		$this->db->query("SELECT angsuran.*, nasabah.*, transaksi.* FROM " . $this->table . " JOIN nasabah ON nasabah.id_nasabah = angsuran.id_nasabah JOIN transaksi ON transaksi.id_transaksi = angsuran.id_transaksi " . ' WHERE id_angsuran=:id_angsuran');
		$this->db->bind('id_angsuran',$id);
		return $this->db->single();
	}

	public function tambahAngsuran($data){
		$query = "INSERT INTO angsuran (id_nasabah, id_transaksi, jumlah_bayar, sisa_bayar) VALUES(:id_nasabah, :id_transaksi, :jumlah_bayar, :sisa_bayar)";
		$this->db->query($query);
		$this->db->bind('id_nasabah', $data['id_nasabah']);
		$this->db->bind('id_transaksi', $data['id_transaksi']);
		$this->db->bind('jumlah_bayar', $data['jumlah_bayar']);
        $this->db->bind('sisa_bayar', $data['sisa_bayar']);
		$this->db->execute();
		return $this->db->rowCount();
	}	

	public function updateDataAngsuran($data){
		$query = "UPDATE angsuran SET jumlah_bayar=:jumlah_bayar, sisa_bayar=:sisa_bayar WHERE id_angsuran=:id_angsuran";
		$this->db->query($query);
		// $this->db->bind('id_nasabah', $data['id_nasabah']);
		// $this->db->bind('id_transaksi', $data['id_transaksi']);
		$this->db->bind('jumlah_bayar', $data['jumlah_bayar']);
        $this->db->bind('sisa_bayar', $data['sisa_bayar']);
		$this->db->bind('id_angsuran', $data['id_angsuran']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteAngsuran($id){
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_angsuran=:id_angsuran');
		$this->db->bind('id_angsuran', $id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariAngsuran(){
		$key = $_POST['key'];
		// $this->db->query("SELECT * FROM " . $this->table . " WHERE id_angsuran LIKE :key");
		$this->db->query("SELECT nasabah.nama, angsuran.* FROM angsuran INNER JOIN nasabah ON angsuran.id_nasabah = nasabah.id_nasabah WHERE nasabah.nama LIKE :key");
		// $this->db->query("SELECT ");
		$this->db->bind('key', "%$key%");
		return $this->db->resultSet();
	}
}


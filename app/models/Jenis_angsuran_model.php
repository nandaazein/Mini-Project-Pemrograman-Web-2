<?php 

class Jenis_angsuran_model {
    private $table = 'jenis_angsuran';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getAllJenisAngsuran(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getJenisAngsuranById($id){
		$this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_jenis_angsuran=:id_jenis_angsuran');
		$this->db->bind('id_jenis_angsuran',$id);
		return $this->db->single();
	}
    public function tambahJenis($data){
		$query = "INSERT INTO jenis_angsuran (id_jenis_angsuran, nama_jenis, bunga, lama_angsuran, nominal) VALUES(:id_jenis_angsuran, :nama_jenis, :bunga, :lama_angsuran, :nominal)";
		$this->db->query($query);
		$this->db->bind('id_jenis_angsuran',$data['id_jenis_angsuran']);
        $this->db->bind('nama_jenis',$data['nama_jenis']);
        $this->db->bind('bunga',$data['bunga']);
        $this->db->bind('lama_angsuran',$data['lama_angsuran']);
        $this->db->bind('nominal',$data['nominal']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function updateDataJenis($data){
		$query = "UPDATE jenis_angsuran SET id_jenis_angsuran=:id_jenis_angsuran, nama_jenis=:nama_jenis, bunga=:bunga, lama_angsuran=:lama_angsuran, nominal=:nominal WHERE id_jenis_angsuran=:id_jenis_angsuran";
		$this->db->query($query);
        $this->db->bind('id_jenis_angsuran',$data['id_jenis_angsuran']);
        $this->db->bind('nama_jenis',$data['nama_jenis']);
        $this->db->bind('bunga',$data['bunga']);
        $this->db->bind('lama_angsuran',$data['lama_angsuran']);
        $this->db->bind('nominal',$data['nominal']);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function deleteJenis($id){
		$this->db->query('DELETE FROM ' . $this->table . ' WHERE id_jenis_angsuran=:id_jenis_angsuran');
		$this->db->bind('id_jenis_angsuran',$id);
		$this->db->execute();

		return $this->db->rowCount();
	}

	public function cariJenis(){
		$key = $_POST['key'];
		$this->db->query("SELECT * FROM " . $this->table . " WHERE lama_angsuran LIKE :key");
		$this->db->bind('key',"%$key%");
		return $this->db->resultSet();
	}
}
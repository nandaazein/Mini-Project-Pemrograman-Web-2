<?php

class Barang extends Controller {
	public function index(){
		$data['title'] = 'Data Barang';
		$data['barang'] = $this->model('BarangModel')->getAllBarang();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('barang/index', $data);
		$this->view('templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Barang';
		$data['barang'] = $this->model('BarangModel')->cariBarang();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('barang/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Barang';
		$data['barang'] = $this->model('BarangModel')->getBarangById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('barang/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah() 
	{
		$data['nasabah'] = $this->model('NasabahModel')->getAllNasabah();	
        $data['transaksi'] = $this->model('TransaksiModel')->getAllTransaksi();
		$data['title'] = 'Tambah Barang';		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('barang/create', $data);
		$this->view('templates/footer');
	}

	public function simpanBarang()
	{		
		if( $this->model('BarangModel')->tambahBarang($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/barang');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/barang');
			exit;	
		}
	}

	public function updateBarang(){	
		if( $this->model('BarangModel')->updateDataBarang($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/barang');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/barang');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('BarangModel')->deleteBarang($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/barang');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/barang');
			exit;	
		}
	}
}
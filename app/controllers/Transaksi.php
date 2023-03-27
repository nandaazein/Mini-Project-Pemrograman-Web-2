<?php

class Transaksi extends Controller {
	public function index(){
		$data['title'] = 'Data Transaksi';
		$data['transaksi'] = $this->model('TransaksiModel')->getAllTransaksi();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('transaksi/index', $data);
		$this->view('templates/footer');
	}
	public function cari(){
		$data['title'] = 'Data Transaksi';
		$data['transaksi'] = $this->model('TransaksiModel')->cariTransaksi();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('transaksi/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){
		$data['title'] = 'Detail Transaksi';
		$data['transaksi'] = $this->model('TransaksiModel')->getAllTransaksi();
		$data['transaksi'] = $this->model('TransaksiModel')->getTransaksiById($id);
		$data['nasabah'] = $this->model('NasabahModel')->getAllNasabah();
		$data['jenis_angsuran'] = $this->model('Jenis_angsuran_model')->getAllJenisAngsuran();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('transaksi/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Transaksi';
		$data['nasabah'] = $this->model('NasabahModel')->getAllNasabah();
		$data['jenis_angsuran'] = $this->model('Jenis_angsuran_model')->getAllJenisAngsuran();		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('transaksi/create', $data);
		$this->view('templates/footer');
	}

	public function simpanTransaksi(){		
		if( $this->model('TransaksiModel')->tambahTransaksi($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/transaksi');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/transaksi');
			exit;	
		}
	}

	public function updateTransaksi(){	
		if( $this->model('TransaksiModel')->updateDataTransaksi($_POST) > 0) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/transaksi');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/transaksi');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('TransaksiModel')->deleteTransaksi($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/transaksi');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/transaksi');
			exit;	
		}
	}
}
<?php

class Pengembalian extends Controller {
	public function index(){
		$data['title'] = 'Data Pengembalian';
		$data['pengembalian'] = $this->model('PengembalianModel')->getAllPengembalian();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pengembalian/index', $data);
		$this->view('templates/footer');
	}
	public function cari(){
		$data['title'] = 'Data Pengembalian';
		$data['pengembalian'] = $this->model('PengembalianModel')->cariPengembalian();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pengembalian/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){
		$data['title'] = 'Detail Pengembalian';
		//$data['pengembalian'] = $this->model('PengembalianModel')->getAllPengembalian();
		$data['pengembalian'] = $this->model('PengembalianModel')->getPengembalianById($id);
		//$data['nasabah'] = $this->model('NasabahModel')->getAllNasabah();
        //$data['transaksi'] = $this->model('TransaksiModel')->getTransaksiById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pengembalian/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Pengembalian';
		$data['nasabah'] = $this->model('NasabahModel')->getAllNasabah();
		$data['pengembalian'] = $this->model('PengembalianModel')->getAllPengembalian();	
        // $data['transaksi'] = $this->model('TransaksiModel')->getTransaksiById($id);	
		$data['transaksi'] = $this->model('TransaksiModel')->getAllTransaksi();	
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pengembalian/create', $data);
		$this->view('templates/footer');
	}

	public function simpanPengembalian(){		
		if( $this->model('PengembalianModel')->tambahPengembalian($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/pengembalian');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/pengembalian');
			exit;	
		}
	}

	public function updatePengembalian(){	
		if( $this->model('PengembalianModel')->updateDataPengembalian($_POST) > 0) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/pengembalian');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/pengembalian');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('PengembalianModel')->deletePengembalian($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/pengembalian');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/pengembalian');
			exit;	
		}
	}
}
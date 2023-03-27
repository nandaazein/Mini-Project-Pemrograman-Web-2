<?php

class Angsuran extends Controller {
	public function index(){
		$data['title'] = 'Data Angsuran';
		$data['angsuran'] = $this->model('AngsuranModel')->getAllAngsuran();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('angsuran/index', $data);
		$this->view('templates/footer');
	}
	public function cari(){
		$data['title'] = 'Data Angsuran';
		$data['angsuran'] = $this->model('AngsuranModel')->cariAngsuran();
		// $data['nasabah'] = $this->model('NasabahModel')->cariAngsuran()
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('angsuran/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id){
		$data['title'] = 'Detail Angsuran';
		$data['angsuran'] = $this->model('AngsuranModel')->getAllAngsuran();
		$data['angsuran'] = $this->model('AngsuranModel')->getAngsuranById($id);
		$data['nasabah'] = $this->model('NasabahModel')->getAllNasabah();
        $data['transaksi'] = $this->model('TransaksiModel')->getTransaksiById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('angsuran/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah(){
		$data['title'] = 'Tambah Angsuran';
		$data['nasabah'] = $this->model('NasabahModel')->getAllNasabah();	
        $data['transaksi'] = $this->model('TransaksiModel')->getAllTransaksi();	
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('angsuran/create', $data);
		$this->view('templates/footer');
	}

	public function simpanAngsuran(){		
		if( $this->model('AngsuranModel')->tambahAngsuran($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/angsuran');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/angsuran');
			exit;	
		}
	}

	public function updateAngsuran(){	
		if( $this->model('AngsuranModel')->updateDataAngsuran($_POST) > 0) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/angsuran');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/angsuran');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('AngsuranModel')->deleteAngsuran($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/angsuran');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/angsuran');
			exit;	
		}
	}
}
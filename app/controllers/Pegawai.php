<?php

class Pegawai extends Controller {
	public function index(){
		$data['title'] = 'Data Pegawai';
		$data['pegawai'] = $this->model('PegawaiModel')->getAllPegawai();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pegawai/index', $data);
		$this->view('templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Pegawai';
		$data['pegawai'] = $this->model('PegawaiModel')->cariPegawai();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pegawai/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Pegawai';
		$data['pegawai'] = $this->model('PegawaiModel')->getPegawaiById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pegawai/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah() 
	{
		$data['title'] = 'Tambah Pegawai';		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('pegawai/create', $data);
		$this->view('templates/footer');
	}

	public function simpanPegawai()
	{		
		if( $this->model('PegawaiModel')->tambahPegawai($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/pegawai');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/pegawai');
			exit;	
		}
	}

	public function updatePegawai(){	
		if( $this->model('PegawaiModel')->updateDataPegawai($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/pegawai');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/pegawai');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('PegawaiModel')->deletePegawai($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/pegawai');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/pegawai');
			exit;	
		}
	}
}
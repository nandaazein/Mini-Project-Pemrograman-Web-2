<?php

class Nasabah extends Controller {
	public function index(){
		$data['title'] = 'Data Nasabah';
		$data['nasabah'] = $this->model('NasabahModel')->getAllNasabah();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('nasabah/index', $data);
		$this->view('templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Nasabah';
		$data['nasabah'] = $this->model('NasabahModel')->cariNasabah();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('nasabah/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Nasabah';
		$data['nasabah'] = $this->model('NasabahModel')->getNasabahById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('nasabah/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah() 
	{
		$data['title'] = 'Tambah Nasabah';		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('nasabah/create', $data);
		$this->view('templates/footer');
	}

	public function simpanNasabah()
	{		
		if( $this->model('NasabahModel')->tambahNasabah($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/nasabah');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/nasabah');
			exit;	
		}
	}

	public function updateNasabah(){	
		if( $this->model('NasabahModel')->updateDataNasabah($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/nasabah');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/nasabah');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('NasabahModel')->deleteNasabah($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/nasabah');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/nasabah');
			exit;	
		}
	}
}
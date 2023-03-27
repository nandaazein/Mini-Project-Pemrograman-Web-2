<?php

class JenisAngsuran extends Controller {

	public function index()
	{
		$data['title'] = 'Halaman Jenis Angsuran';
        $data['ja'] = $this->model('Jenis_angsuran_model')->getAllJenisAngsuran();
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jenisAngsuran/index', $data);
		$this->view('templates/footer');
	}
	public function cari()
	{
		$data['title'] = 'Data Jenis Angsuran';
		$data['ja'] = $this->model('Jenis_angsuran_model')->cariJenis();
		$data['key'] = $_POST['key'];
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jenisAngsuran/index', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		$data['title'] = 'Detail Jenis Angsuran';
		$data['ja'] = $this->model('Jenis_angsuran_model')->getJenisAngsuranById($id);
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jenisAngsuran/edit', $data);
		$this->view('templates/footer');
	}

	public function tambah() 
	{
		$data['title'] = 'Tambah Jenis Angsuran';		
		$this->view('templates/header', $data);
		$this->view('templates/sidebar', $data);
		$this->view('jenisAngsuran/create', $data);
		$this->view('templates/footer');
	}

	public function simpanJenis()
	{		
		if( $this->model('Jenis_angsuran_model')->tambahJenis($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','ditambahkan','success');
			header('location: '. base_url . '/jenisAngsuran');
			exit;			
		}else{
			Flasher::setMessage('Gagal','ditambahkan','danger');
			header('location: '. base_url . '/jenisAngsuran');
			exit;	
		}
	}

	public function updateJenis(){	
		if( $this->model('Jenis_angsuran_model')->updateDataJenis($_POST) > 0 ) {
			Flasher::setMessage('Berhasil','diupdate','success');
			header('location: '. base_url . '/jenisAngsuran');
			exit;			
		}else{
			Flasher::setMessage('Gagal','diupdate','danger');
			header('location: '. base_url . '/jenisAngsuran');
			exit;	
		}
	}

	public function hapus($id){
		if( $this->model('Jenis_angsuran_model')->deleteJenis($id) > 0 ) {
			Flasher::setMessage('Berhasil','dihapus','success');
			header('location: '. base_url . '/jenisAngsuran');
			exit;			
		}else{
			Flasher::setMessage('Gagal','dihapus','danger');
			header('location: '. base_url . '/jenisAngsuran');
			exit;	
		}
	}
}
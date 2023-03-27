  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Pegawai</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title"><?= $data['title']; ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?= base_url; ?>/pegawai/updatePegawai" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="id_pegawai" value="<?= $data['pegawai']['id_pegawai']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nama Pegawai</label>
                    <input type="text" class="form-control" placeholder="masukkan nama nasabah" name="nama" value="<?= $data['pegawai']['nama']; ?>">
                    <label >Alamat</label>
                    <input type="text" class="form-control" placeholder="masukkan alamat" name="alamat" value="<?= $data['pegawai']['alamat']; ?>">
                    <label >Jenis Kelamin</label>
                    <input type="text" class="form-control" placeholder="masukkan jenis kelamin" name="jenis_kelamin" value="<?= $data['pegawai']['jenis_kelamin']; ?>">
                    <label >No. Telp</label>
                    <input type="text" class="form-control" placeholder="masukkan nomor telepon" name="telepon" value="<?= $data['pegawai']['telepon']; ?>">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
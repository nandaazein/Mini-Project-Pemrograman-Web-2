  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Nasabah</h1>
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
              <form role="form" action="<?= base_url; ?>/nasabah/simpanNasabah" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label >Nasabah</label>
                    <input type="text" class="form-control" placeholder="masukkan nama nasabah" name="nama">
                    <label >Alamat</label>
                    <input type="text" class="form-control" placeholder="masukkan alamat" name="alamat">
                    <label >Jenis Kelamin</label>
                    <input type="text" class="form-control" placeholder="masukkan jenis kelamin" name="jenis_kelamin">
                    <label >No. Telp</label>
                    <input type="text" class="form-control" placeholder="masukkan nomor telepon" name="telepon">
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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Barang Gadai</h1>
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
              <form role="form" action="<?= base_url; ?>/barang/updateBarang" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="id_barang_gadai" value="<?= $data['barang']['id_barang_gadai']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Berat Barang</label>
                    <input type="text" class="form-control" placeholder="masukkan berat barang" name="berat_barang" value="<?= $data['barang']['berat_barang']; ?>">
                    <label >Nilai Taksiran</label>
                    <input type="text" class="form-control" placeholder="masukkan nilai taksiran" name="nilai_taksiran" value="<?= $data['barang']['nilai_taksiran']; ?>">
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
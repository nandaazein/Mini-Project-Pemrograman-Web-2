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
              <form role="form" action="<?= base_url; ?>/jenisAngsuran/updateJenis" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="id_jenis_angsuran" value="<?= $data['ja']['id_jenis_angsuran']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label >Pinjaman</label>
                    <input type="text" class="form-control" placeholder="masukkan pinjaman" name="nama_jenis" value="<?= $data['ja']['nama_jenis']; ?>">
                    <label >Bunga</label>
                    <input type="text" class="form-control" placeholder="masukkan bunga" name="bunga" value="<?= $data['ja']['bunga']; ?>">
                    <label >Lama Angsuran</label>
                    <input type="text" class="form-control" placeholder="masukkan lama angsuran" name="lama_angsuran" value="<?= $data['ja']['lama_angsuran']; ?>">
                    <label >Setoran Perbulan</label>
                    <input type="text" class="form-control" placeholder="masukkan setoran perbulan" name="nominal" value="<?= $data['ja']['nominal']; ?>">
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
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Edit Angsuran</h1>
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
              <form role="form" action="<?= base_url; ?>/angsuran/updateAngsuran" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="id_angsuran" value="<?= $data['angsuran']['id_angsuran']; ?>">
                    
                <div class="card-body">
                  <div class="form-group">
                    <label >Jumlah Bayar</label>
                    <input type="text" class="form-control"name="jumlah_bayar" value="<?= $data['angsuran']['jumlah_bayar']; ?>">
                    <label >Sisa Bayar</label>
                    <input type="text" class="form-control"name="sisa_bayar" value="<?= $data['angsuran']['sisa_bayar']; ?>">
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
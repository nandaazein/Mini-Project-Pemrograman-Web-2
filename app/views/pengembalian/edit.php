<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Edit Pengembalian</h1>
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
              <form role="form" action="<?= base_url; ?>/pengembalian/updatePengembalian" method="POST" enctype="multipart/form-data">

                    <input type="hidden" name="id_pengembalian" value="<?= $data['pengembalian']['id_pengembalian']; ?>">
                    
                <div class="card-body">
                  <div class="form-group">
                    <label >Tanggal Pengembalian</label>
                    <input type="date" class="form-control" name="tanggal_pengembalian" value="<?= $data['pengembalian']['tanggal_pengembalian']; ?>">
                    <label >Jumlah Pengembalian</label>
                    <input type="text" class="form-control" name="jumlah_pengembalian" value="<?= $data['pengembalian']['jumlah_pengembalian']; ?>">
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
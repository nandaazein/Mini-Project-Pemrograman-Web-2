  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Angsuran</h1>
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
              <form role="form" action="<?= base_url; ?>/angsuran/simpanAngsuran" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                  <label>ID Nasabah</label>
                    <select class="form-control" name="id_nasabah">
                      <?php foreach ($data['nasabah'] as $row) :?>
                        <?= '<option value="' . $row['id_nasabah'] .'">' .$row['id_nasabah']. ' - ' . $row['nama'] . '</option>';?>
                      <?php $no++; endforeach; ?>
                    </select>
                    <label >ID Transaksi</label>
                    <select class="form-control" name="id_transaksi">
                      <?php foreach ($data['transaksi'] as $row) :?>
                        <?= '<option value="' . $row['id_transaksi'] .'">' .$row['id_transaksi']. '</option>' ;?>
                      <?php $no++; endforeach; ?>
                    </select>
                    <label >Jumlah Bayar</label>
                    <input type="text" class="form-control"name="jumlah_bayar">
                    <label >Sisa Bayar</label>
                    <input type="text" class="form-control"name="sisa_bayar">
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
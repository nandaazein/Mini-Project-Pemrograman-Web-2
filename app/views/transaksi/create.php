  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Halaman Transaksi</h1>
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
              <form role="form" action="<?= base_url; ?>/transaksi/simpanTransaksi" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                  <label>ID Nasabah</label>
                    <select class="form-control" name="id_nasabah">
                      <?php foreach ($data['nasabah'] as $row) :?>
                        <?= '<option value="' . $row['id_nasabah'] .'">' .$row['id_nasabah'].  ' - ' . $row['nama'] . '</option>' ;?>
                      <?php $no++; endforeach; ?>
                    </select>
                    <label >Tanggal Transaksi</label>
                    <input type="date" class="form-control" placeholder="masukkan tanggal transaksi" name="tanggal_transaksi">
                    <label >ID Jenis Angsuran</label>
                    <select class="form-control" name="id_jenis_angsuran">
                      <?php foreach ($data['jenis_angsuran'] as $row) :?>
                        <?= '<option value="' . $row['id_jenis_angsuran'] .'">' .$row['id_jenis_angsuran']. '</option>' ;?>
                      <?php $no++; endforeach; ?>
                    </select>
                    <label >Status Pinjaman</label>
                    <select class="form-control" name="status_pinjaman">
                      <option>Lunas</option>
                      <option>Belum Lunas</option>
                    </select>
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
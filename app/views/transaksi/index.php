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
<div class="row">
    <div class="col-sm-12">
      <?php
        Flasher::Message();
      ?>
    </div>
  </div>
      <!-- Default box -->

      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title'] ?></h3> <a href="<?= base_url; ?>/transaksi/tambah" class="btn float-right btn-xs btn btn-primary">Tambah transaksi</a>
        </div>
        <div class="card-body">
        
      <form action="<?= base_url; ?>/transaksi/cari" method="post">
 <div class="row mb-3">
    <div class="col-lg-6">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Masukan Nama Nasabah" name="key" >
    <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
          <a class="btn btn-outline-danger" href="<?= base_url; ?>/transaksi" >Reset</a>
    </div>
  </div>

  </div>
</div>
    </form>
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">No</th>
                      <th style="width: 10px"> IDN</th>
                      <th style="width: 150px">Nasabah</th>
                      <th style="width: 150px">Alamat</th>
                      <th style="width: 150px">Telepon</th>
                      <th style="width: 100px">ID Transaksi</th>
                      <th style="width: 100px">ID Jenis Angsuran</th>
                      <th style="width: 150px">Tanggal Transaksi</th>
                      <th style="width: 150px">Jumlah Pinjaman</th>
                      <th style="width: 150px">Bunga</th>
                      <th style="width: 150px">Lama Pinjaman</th>
                      <th style="width: 150px">Status</th>
                      <th style="width: 150px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['transaksi'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['id_nasabah'];?></td>
                      <td><?= $row['nama'];?></td>
                      <td><?= $row['alamat'];?></td>
                      <td><?= $row['telepon'];?></td>
                      <td><?= $row['id_transaksi'];?></td>
                      <td><?= $row['id_jenis_angsuran'];?></td>
                      <td><?= $row['tanggal_transaksi'];?></td>
                      <td><?= $row['nama_jenis'];?></td>
                      <td><?= $row['bunga'];?>%</td>
                      <td><?= $row['lama_angsuran'];?> Bulan</td>
                      <td><?= $row['status_pinjaman'];?></td>
                      <td>
                        <a href="<?= base_url; ?>/transaksi/edit/<?= $row['id_transaksi'] ?>" class="badge badge-info ">Edit</a> <a href="<?= base_url; ?>/transaksi/hapus/<?= $row['id_transaksi'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; endforeach; ?>
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


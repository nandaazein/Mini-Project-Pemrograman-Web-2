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
          <h3 class="card-title"><?= $data['title'] ?></h3> <a href="<?= base_url; ?>/angsuran/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Angsuran</a>
        </div>
        <div class="card-body">
        
      <form action="<?= base_url; ?>/angsuran/cari" method="post">
 <div class="row mb-3">
    <div class="col-lg-6">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Masukan Nama Nasabah" name="key" >
    <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
          <a class="btn btn-outline-danger" href="<?= base_url; ?>/angsuran" >Reset</a>
    </div>
  </div>

  </div>
</div>
    </form>
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">No</th>
                      <th style="width: 10px">Nama</th>
                      <th style="width: 10px">ID Transaksi</th>
                      <th style="width: 150px">Jumlah Bayar</th>
                      <th style="width: 150px">Sisa Bayar</th>
                      <th style="width: 10px">Aksi</th>
                       </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['angsuran'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['nama'];?></td>
                      <td><?= $row['id_transaksi'];?></td>
                      <td><?= $row['jumlah_bayar'];?></td>
                      <td><?= $row['sisa_bayar'];?></td>
                      <td>
                        <a href="<?= base_url; ?>/angsuran/edit/<?= $row['id_angsuran'] ?>" class="badge badge-info ">Edit</a> <a href="<?= base_url; ?>/angsuran/hapus/<?= $row['id_angsuran'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
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


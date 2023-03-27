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
          <h3 class="card-title"><?= $data['title'] ?></h3> <a href="<?= base_url; ?>/pegawai/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Pegawai</a>
        </div>
        <div class="card-body">
        
      <form action="<?= base_url; ?>/pegawai/cari" method="post">
 <div class="row mb-3">
    <div class="col-lg-6">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Masukan Nama Pegawai" name="key" >
    <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
          <a class="btn btn-outline-danger" href="<?= base_url; ?>/pegawai" >Reset</a>
    </div>
  </div>

  </div>
</div>
    </form>
          <table class="table table-bordered">
                  <thead>                  
                    <tr>
                      <th style="width: 10px">No</th>
                      <th style="width: 150px">Nama Pegawai</th>
                      <th style="width: 150px">Alamat</th>
                      <th style="width: 150px">Jenis Kelamin</th>
                      <th style="width: 150px">Telepon</th>
                      <th style="width: 150px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $no=1; ?> 
                    <?php foreach ($data['pegawai'] as $row) :?>
                    <tr>
                      <td><?= $no; ?></td>
                      <td><?= $row['nama'];?></td>
                      <td><?= $row['alamat'];?></td>
                      <td><?= $row['jenis_kelamin'];?></td>
                      <td><?= $row['telepon'];?></td>
                      <td>
                        <a href="<?= base_url; ?>/pegawai/edit/<?= $row['id_pegawai'] ?>" class="badge badge-info ">Edit</a> <a href="<?= base_url; ?>/pegawai/hapus/<?= $row['id_pegawai'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                      </td>
                    </tr>
                    <?php $no++; endforeach; ?>
                  </tbody>
                </table>
        </div>
        <!-- /.card-body -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


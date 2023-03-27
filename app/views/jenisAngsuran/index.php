

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Jenis Angsuran</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title"><?= $data['title'] ?></h3> <a href="<?= base_url; ?>/jenisAngsuran/tambah" class="btn float-right btn-xs btn btn-primary">Tambah Jenis</a>
        </div>
        <div class="card-body">
        <form action="<?= base_url; ?>/jenisAngsuran/cari" method="post">
 <div class="row mb-3">
    <div class="col-lg-6">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Masukan Lama Angsuran" name="key" >
    <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="submit">Cari Data</button>
          <a class="btn btn-outline-danger" href="<?= base_url; ?>/jenisAngsuran" >Reset</a>
    </div>
  </div>

  </div>
</div>
    </form>
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Pinjaman</th>
            <th>Lama Angsuran</th>
            <th>Bunga</th>
            <th>Setoran Perbulan</th>
            <th>Aksi</th>
        </tr>

        <?php $no = 1; ?>
        <?php foreach($data['ja'] as $pgd) : ?>
            <tr>
                <td><?= $no ?></td>
                <td><?= $pgd['nama_jenis'] ?></td>
                <td><?= $pgd['lama_angsuran'] ?> Bulan</td>
                <td><?= $pgd['bunga'] ?>%</td>
                <td><?= $pgd['nominal'] ?></td>
                <td>
                  <a href="<?= base_url; ?>/jenisAngsuran/edit/<?= $pgd['id_jenis_angsuran'] ?>" class="badge badge-info ">Edit</a> <a href="<?= base_url; ?>/jenisAngsuran/hapus/<?= $pgd['id_jenis_angsuran'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                </td>
            </tr>
        <?php $no++;?>
        <?php endforeach; ?>
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


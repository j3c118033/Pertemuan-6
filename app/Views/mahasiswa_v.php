<section class="my-4">
  <div class="container">
    <h2>Mahasiswa</h2>
    <?php if(!empty($session)) { ?>

    <div class="alert alert-<?php echo $session['status'] ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
        <?php echo $session['message']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <?php } ?>
    <p class="float-right">
                <a href="<?php echo site_url('Mahasiswa/add');?>" class="btn btn-success ">
                <i class="fa fa-plus mr-1"></i>Tambah Item
                </a>
            </p>
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
            <th scope="col">Aksi</th>
            <th scope="col">Foto</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Agama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Tempat Lahir</th>
            <th scope="col">Tanggal Lahir</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($dataMahasiswa as $row) : ?> 
            <tr>
            <th>
                <a href="<?php echo site_url('Mahasiswa/edit/'.$row->nim); ?>" class="btn btn-primary btn-sm ">
                    <i class="fa fa-pencil mr-1"></i>Ubah
                </a>
                <a href="<?php echo site_url('Mahasiswa/delete/'.$row->nim); ?>"class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?');">
                 <i class="fa fa-trash mr-1"></i>Hapus
                </a>
            </th>
            <td scope="row"><?php echo $row->foto; ?></td>
            <td><?php echo $row->nim; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td><?php echo $row->jenis_kelamin; ?></td>
            <td><?php echo $row->kode_agama; ?></td>
            <td><?php echo $row->alamat; ?></td>
            <td><?php echo $row->tempat_lahir; ?></td>
            <td><?php echo $row->tanggal_lahir; ?></td>
            </tr>
            <?php 
                        endforeach; 
                    
                        if (empty($dataMahasiswa)) {
                    ?>

                    <tr>
                        <td colspan="9" class="text-center">Tidak Ada Data</td>
                    </tr>

                    <?php } ?>
        </tbody>
    </table>
  </div>
</section>
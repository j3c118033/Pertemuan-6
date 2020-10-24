<section class="my-4">
  <div class="container">
    <h2>Agama</h2>
    <?php if(!empty($session)) { ?>

        <div class="alert alert-<?php echo $session['status'] ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
            <?php echo $session['message']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <?php } ?>
    <p class="float-right">
                <a href="<?php echo site_url('Agama/add');?>" class="btn btn-success ">
                <i class="fa fa-plus mr-1"></i>Tambah Item
                </a>
            </p>
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
            <th scope="col">Aksi</th>
            <th scope="col">Kode</th>
            <th scope="col">Agama</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($dataAgama as $row) : ?> 
            <tr>
            <th>
                <a href="<?php echo site_url('Agama/edit/'.$row->kode_agama); ?>" class="btn btn-primary btn-sm ">
                    <i class="fa fa-pencil mr-1"></i>Ubah
                </a>
                <a href="<?php echo site_url('Agama/delete/'.$row->kode_agama); ?>"class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?');">
                 <i class="fa fa-trash mr-1"></i>Hapus
                </a>
            </th>
            <td scope="row"><?php echo $row->kode_agama; ?></td>
            <td><?php echo $row->agama; ?></td>
            </tr>
            <?php 
                        endforeach; 
                    
                        if (empty($dataAgama)) {
                    ?>

                    <tr>
                        <td colspan="3" class="text-center">Tidak Ada Data</td>
                    </tr>

                    <?php } ?>
        </tbody>
    </table>
  </div>
</section>
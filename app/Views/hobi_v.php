<section class="my-4">
  <div class="container">
    <h2>Hobi</h2>
    <?php if(!empty($session)) { ?>

        <div class="alert alert-<?php echo $session['status'] ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
            <?php echo $session['message']; ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <?php } ?>
    <p class="float-right">
                <a href="<?php echo site_url('Hobi/add');?>" class="btn btn-success ">
                <i class="fa fa-plus mr-1"></i>Tambah Item
                </a>
            </p>
    <table class="table table-striped">
        <thead class="thead-light">
            <tr>
            <th scope="col">Aksi</th>
            <th scope="col">Kode</th>
            <th scope="col">Hobi</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($dataHobi as $row) : ?> 
            <tr>
            <th>
                <a href="<?php echo site_url('Hobi/edit/'.$row->kode_hobi); ?>" class="btn btn-primary btn-sm ">
                    <i class="fa fa-pencil mr-1"></i>Ubah
                </a>
                <a href="<?php echo site_url('Hobi/delete/'.$row->kode_hobi); ?>"class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data?');">
                 <i class="fa fa-trash mr-1"></i>Hapus
                </a>
            </th>
            <td scope="row"><?php echo $row->kode_hobi; ?></td>
            <td><?php echo $row->hobi; ?></td>
            </tr>
            <?php 
                        endforeach; 
                    
                        if (empty($dataHobi)) {
                    ?>

                    <tr>
                        <td colspan="3" class="text-center">Tidak Ada Data</td>
                    </tr>

                    <?php } ?>
        </tbody>
    </table>
  </div>
</section>
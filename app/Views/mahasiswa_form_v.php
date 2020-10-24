<section class="my-4">
    <div class="container">
        <h2>Mahasiswa</h2>
        <form method="POST" action="<?php echo site_url('Mahasiswa/save'); ?>">
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">NIM</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nim" name="nim" required maxlength="9" 
                value="<?php if (!empty($dataMahasiswa)) echo $dataMahasiswa->nim; ?>">
                <input type="hidden" id="id" name="id" value="<?php if(!empty($dataMahasiswa)) echo $dataMahasiswa->nim; ?>"> 
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama" name="nama" required
                value="<?php if(!empty($dataMahasiswa)) echo $dataMahasiswa->nama; ?>">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-10">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Pria" 
                <?php if(($dataMahasiswa->jenis_kelamin)=="Pria") echo 'checked'; ?> required>
                <label class="form-check-label" for="jenis_kelamin1">Pria</label>
                </div>
                <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Wanita"
                <?php if(($dataMahasiswa->jenis_kelamin)=="Wanita") echo 'checked'; ?>>
                <label class="form-check-label" for="jenis_kelamin2">Wanita</label>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Agama</label>
            <div class="col-sm-10">
                <select class="form-control" id="kode_agama" name="kode_agama">
                <?php foreach ($dataAgama as $row) : ?> 
                    <option name="kode_agama" value="<?php echo $row->kode_agama; ?>"><?php echo $row->agama; ?></option>
                    <?php 
                                endforeach; 
                            ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Alamat</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required
                value="<?php if(!empty($dataMahasiswa)) echo $dataMahasiswa->alamat; ?>"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Tempat/Tangal Lahir</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required
                value="<?php if(!empty($dataMahasiswa)) echo $dataMahasiswa->tempat_lahir; ?>">
            </div>
            <div class="col-sm-5">
                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required
                value="<?php if(!empty($dataMahasiswa)) echo $dataMahasiswa->tanggal_lahir; ?>">
            </div>
        </div>
            <!--<form>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label" for="foto">Foto</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="foto" name="foto">
                </div>
            </div>
            </form>-->
        <button type="submit" class="btn btn-success">Simpan</button>
        </form>
    </div>
</section>
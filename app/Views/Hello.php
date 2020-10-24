<form action="<?php echo site_url('Mahasiswa/ucapan');?>" method="post">
    <input type="text" name="nama">
    <input type="submit" name="submit" value="Submit">

    <h1>Selamat Malam, <?php echo $n;?></h1>
</form>

<?php 
    echo date("d-m-Y")."<br>";
    echo base_url()."<br>";
    echo site_url()."<br>";
    echo site_url('Mahasiswa/ucapan');

?>

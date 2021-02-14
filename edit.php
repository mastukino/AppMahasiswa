<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <title> Aplikasi Remas </title>
</head>

<body>
    <?php 
        include ('header.php');
    ?>
    
    <?php
        require_once('koneksi.php');

        if($_GET['nim']!=null){
            $nim        = $_GET['nim'];
            $koneksiObj = new Koneksi();
            $koneksi    = $koneksiObj->getKoneksi();
            
            if($koneksi->connect_error){
                echo "Gagal Koneksi : ". $koneksi->connect_error;
            }
            
            $query = "select * from mahasiswa where nim='$nim'";
            $data = $koneksi->query($query);
        }
    
        if($data->num_rows <= 0){
            echo "Data tidak ditemukan!";
        } else{
            while($row = $data->fetch_assoc()){
                $nim           = $row['nim'];
                $nama          = $row['nama'];
                $jenis_kelamin = $row['jenis_kelamin'];
                $semester      = $row['semester'];
                $prodi         = $row['prodi'];
                $alamat        = $row['alamat'];
                $no_hp         = $row['no_hp'];
            }
        }
    ?>

    <div class="container">
            <br>
            <h2>Data Mahasiswa <i class="fa fa-angle-double-right"></i> Edit Data</h2>
            <hr>
            <br>

            <!-- start form edit data -->
            <form class="form-horizontal" method="post" action="update.php">
                <div class="form-group">
                    <label for="nim">NIM</label>
                    <div>
                        <input type="text" class="form-control" id="nim" name="nim" placeholder="nim" value="<?php echo $nim;?>" readonly="true">
                    </div>
                </div>

                <div class="form-group">
                    <label for="nama">Nama</label>
                    <div>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" value="<?php echo $nama;?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <div>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="Laki-Laki" <?php echo $jenis_kelamin=='Laki-Laki'? 'selected':''; ?>>Laki-Laki</option>
                            <option value="Perempuan" <?php echo $jenis_kelamin=='Perempuan'? 'selected':''; ?>>Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="semester">Semester</label>
                    <div>
                        <select name="semester" class="form-control">
                            <option value="">-- Pilih Semester --</option>
                            <?php 
                                for($i=1;$i<=8;$i++){ ?>
                                    <option value="<?php echo $i;?>" <?php echo $semester==$i ? 'selected':'';?>><?php echo $i;?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="prodi">Prodi</label>
                    <div>
                        <select name="prodi" class="form-control">
                            <option value="">-- Pilih Prodi --</option>
                            <option value="Sistem Informasi" <?php echo $prodi=='Sistem Informasi' ? 'selected':'';?>>Sistem Informasi</option>
                            <option value="Teknik Informatika" <?php echo $prodi=='Teknik Informatika' ? 'selected':'';?>>Teknik Informatika</option>
                            <option value="Teknik Industri" <?php echo $prodi=='Teknik Industri' ? 'selected':'';?>>Teknik Industri</option>
                            <option value="Manajemen" <?php echo $prodi=='Manajemen' ? 'selected':'';?>>Manajemen</option>
                            <option value="Akuntansi" <?php echo $prodi=='Akuntansi' ? 'selected':'';?>>Akuntansi</option>
                            <option value="Ilmu Hukum" <?php echo $prodi=='Ilmu Hukum' ? 'selected':'';?>>Ilmu Hukum</option>
                            <option value="Ilmu Komunikasi" <?php echo $prodi=='Ilmu Komunikasi' ? 'selected':'';?>>Ilmu Komunikasi</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <div>
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" value="<?php echo $alamat;?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <div>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="no_hp" value="<?php echo $no_hp;?>" onkeypress="return hanyaAngka(event, false)"  maxlength="13">
                    </div>
                </div>

                <div class="form-group">
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                        <a href="index.php" class="btn btn-danger"><i class="fa fa-ban"></i> Batal</a>
                    </div>
                </div>
                            
            </form>
        </div>

    <?php 
        include 'footer.php';
    ?>

    <script language="javascript">
        function hanyaAngka(e, decimal) {
        var key;
        var keychar;
        if (window.event) {
            key = window.event.keyCode;
        } else
        if (e) {
            key = e.which;
        } else return true;
    
        keychar = String.fromCharCode(key);
        if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
            return true;
        } else
        if ((("0123456789").indexOf(keychar) > -1)) {
            return true;
        } else
        if (decimal && (keychar == ".")) {
            return true;
        } else return false;
        }
    </script>

</body>
</html>

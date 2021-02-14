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
        include 'header.php';
    ?>
    
    <div class="container">
        <br>  
        <h2>Data Mahasiswa</h2>
        <hr>
        <br>

        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto .mr-auto">
                    <a href="tambah.php" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Data</a>
                </div>
                <div class="col-auto .mr-auto">
                    <!-- start filter form -->
                    <form class="form-horizontal" method="get">
                        <div class="form-group">
                            <select name="filter" class="form-control" onchange="form.submit()">
                                <option value="0">Filter Berdasarkan Prodi</option>
                                <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
                                <option value="Sistem Informasi" <?php if($filter == 'Sistem Informasi'){ echo 'selected'; } ?>>Sistem Informasi</option>
                                <option value="Teknik Informatika" <?php if($filter == 'Teknik Informatika'){ echo 'selected'; } ?>>Teknik Informatika</option>
                                <option value="Teknik Industri" <?php if($filter == 'Teknik Industri'){ echo 'selected'; } ?>>Teknik Industri</option>
                                <option value="Manajemen" <?php if($filter == 'Manajemen'){ echo 'selected'; } ?>>Manajemen</option>
                                <option value="Akuntansi" <?php if($filter == 'Akuntansi'){ echo 'selected'; } ?>>Akuntansi</option>
                                <option value="Ilmu Hukum" <?php if($filter == 'Ilmu Hukum'){ echo 'selected'; } ?>>Ilmu Hukum</option>
                                <option value="Ilmu Komunikasi" <?php if($filter == 'Ilmu Komunikasi'){ echo 'selected'; } ?>>Ilmu Komunikasi</option>
                                <option value="0" <?php if($filter == ''){ echo 'selected'; } ?>>Semua Prodi</option>
                            </select>
                        </div>
                    </form> <!-- end filter -->
                </div>
            </div>
        </div>
        
        <!-- start table data responsive -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="tb-mahasiswa">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Semester</th>
                        <th>Prodi</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th>Menu</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        require_once('koneksi.php');

                        $no = 1;
                        $koneksiObj = new koneksi();
                        $koneksi    = $koneksiObj->getKoneksi();
                        
                        if($koneksi->connect_error){
                            echo "Gagal Koneksi : ". $koneksi->connect_error;
                            echo "</td></tr>";
                        }

                        $query = "select * from mahasiswa order by nama";
                        $data  = $koneksi->query($query);
                        
                        if($data->num_rows <= 0){
                            echo "<tr>";
                            echo "<td colspan='7' class='text-center'><i>Tidak ada data</i></td>";
                            echo "</tr>";
                        } else{
                            if($filter){
                                $sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE prodi='$filter' ORDER BY nim ASC"); // query jika filter dipilih
                            }else{
                                $sql = mysqli_query($koneksi, "SELECT * FROM mahasiswa ORDER BY nim ASC"); // jika tidak ada filter maka tampilkan semua entri
                            }
                            if(mysqli_num_rows($sql) == 0){ 
                                echo '<tr><td colspan="14">Data Tidak Ada.</td></tr>'; // jika tidak ada entri di database maka tampilkan 'Data Tidak Ada.'
                            }else{ // jika terdapat entri maka tampilkan datanya
                                
                                while($row = mysqli_fetch_assoc($sql)){ // fetch query yang sesuai ke dalam array
                                    echo "<tr>";
                                    echo "<td>".$no++."</td>";
                                    echo "<td class='center'>".$row['nim']."</td>";
                                    echo "<td>".$row['nama']."</td>";
                                    echo "<td>".$row['jenis_kelamin']."</td>";
                                    echo "<td class='center'>".$row['semester']."</td>";
                                    echo "<td>".$row['prodi']."</td>";
                                    echo "<td>".$row['alamat']."</td>";
                                    echo "<td>".$row['no_hp']."</td>";                            
                                    echo '<td class="text-center"><a href="edit.php?nim='.$row['nim'].'" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Edit</a>';
                                    echo ' 
                                    <a href="hapus.php?nim='.$row['nim'].'" class="btn btn-danger btn-sm delete-link"><i class="fa fa-trash"></i> Hapus</a></td>';
                                    echo "</tr>";
                                }
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php 
        include 'footer.php';
    ?>

</body>
</html>

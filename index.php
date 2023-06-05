<?php
    include 'koneksi.php';

    $query = "select * from tb_siswa;";
    $sql = mysqli_query($conn, $query);
    $no = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <!-- bootstrap 5 -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js" ></script>

    <!-- fontawesome -->
    <link rel="stylesheet" href="fontawesome/css/font-awesome.min.css">

    <title>Belajar_crud</title>
</head>
<body>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
        <a class="navbar-brand" href="#">
            CRUD - BS5
        </a>
        </div>
    </nav>
    
    <!-- Judul -->
    <div class="container">
        <h1 class="mt-4">Data Siswa</h1>
        <figure>
            <blockquote class="blockquote">
                <p>Berisi data yang telah disimpan di database.</p>
            </blockquote>
            <figcaption class="blockquote-footer">
                CRUD <cite title="Source Title">Create Read Update Delete</cite>
            </figcaption>
        </figure>
        <a href="kelola.php" type="button" class="btn btn-primary mb-3">
            <i class="fa fa-plus"></i>
            Tambah Data
        </a>
        <div class="table-responsive">
            <table class="table align-middle table-bordered table-hover">
                <thead>
                    <tr>
                        <th><center>No.</center></th>
                        <th><center>NISN</center></th>
                        <th><center>Nama Siswa</center></th>
                        <th><center>Jenis Kelamin</center></th>
                        <th><center>Foto Siswa</center></th>
                        <th><center>Alamat</center></th>
                        <th><center>Aksi</center></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    while($result = mysqli_fetch_assoc($sql)){
                ?>
                    <tr>
                        <td><center>
                            <?php echo ++$no; ?>.
                        </center></td>
                        <td><center>
                            <?php echo $result['nisn']; ?>
                        </center></td>
                        <td>
                            <?php echo $result['nama_siswa']; ?>
                        </td>
                        <td><center>
                            <?php echo $result['jenis_kelamin']; ?>
                        </center></td>
                        <td><center><img src="img/<?php echo $result['foto_siswa']; ?>" style="width: 150px"></center></td>
                        <td>
                            <?php echo $result['alamat']; ?>
                        </td>
                        <td>
                            <center>
                            <a href="kelola.php?ubah=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-success btn-sm">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="proses.php?hapus=<?php echo $result['id_siswa']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Apakah kamu yakin??')">
                                <i class="fa fa-trash"></i>
                            </a>
                            </center>
                        </td>
                    </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
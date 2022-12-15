<?php 
    session_start();
    if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
    require 'functions.php';

    //pagination
    $jumlahDataHalamanPerHalaman = 10;
    $jumlahData =count(query("SELECT * FROM project"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataHalamanPerHalaman);
    $halamanAktif = (isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    $awalData = ( $jumlahDataHalamanPerHalaman * $halamanAktif ) - $jumlahDataHalamanPerHalaman;

    $extract = query("SELECT * FROM project ORDER BY id DESC LIMIT $awalData, $jumlahDataHalamanPerHalaman");
    //endpagination
    
    if( isset($_POST["cari"]) ){
        $extract = cari($_POST["keyword"]);
    }
    //jumlah keseluruhan pserta
        $data_peserta = mysqli_query($conn, "SELECT * FROM project");
        $jumlahpeserta = mysqli_num_rows($data_peserta) ;
    //jumlah konsen jaringan
        $datapesertajaringan = mysqli_query($conn, "SELECT * FROM project WHERE konsentrasi='jaringan'");
        $jumlahpesertajaringan = mysqli_num_rows($datapesertajaringan);
    //jumlah konsen program
        $datapesertaprogram = mysqli_query($conn, "SELECT * FROM project WHERE konsentrasi='program'");
        $jumlahpesertaprogram = mysqli_num_rows($datapesertaprogram);
    //jumlah konsen hardware
        $datapesertahardware = mysqli_query($conn, "SELECT * FROM project WHERE konsentrasi='hardware'");
        $jumlahpesertahardware = mysqli_num_rows($datapesertahardware);
    //jumlah konsen multimeia
        $datapesertamultimedia = mysqli_query($conn, "SELECT * FROM project WHERE konsentrasi='multimedia'");
        $jumlahpesertamultimedia = mysqli_num_rows($datapesertamultimedia);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="img/REVISI LOGO 2.0.png">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>

<body>
    <div class="container-fluid" style="padding-left: 0">
        <div class="row" style="margin: auto">
            <div class="col-md-2 sidebar" align=center>
                <div class="sidebar">
                    <br><br><br>
                    <h1>ADMIN</h1>
                    <img src="img/admin/<?php echo $_SESSION['gambaradmin'] ?>" width="50px" class="img-fluid rounded-circles mt-3" alt="Responsive image">
                    <p> <?php echo $_SESSION['username'] ?></p>
                    <a href="index.php">
                        <button id="btnGroupDrop1" type="button" aria-haspopup="true" aria-expanded="false"
                            class="keluar">Data Peserta
                        </button>
                    </a>
                    <br><br>
                    <a href="logout.php">
                        <button id="btnGroupDrop1" type="button" aria-haspopup="true" aria-expanded="false"
                            class="keluar"><i class="fas fa-sign-out-alt fa-lg ml-5"></i>
                            Keluar
                        </button>
                    </a> 
                </div>
            </div>
            <div class="col-md-10" style="padding-left: 50px; margin-left: 210px;">
                <div class="row">
                    <div class="col-md-2">
                        <div class="card">
                        
                            <div class="card-body"><a href="konsentrasi.php?=konsentrasi=program"></a>
                            <a href="konsentrasi.php?konsentrasi=program">
                                <h5 class="card-title"><?= $jumlahpesertaprogram; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Program</h6>
                            </a>
                            </div>
                        
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body">
                            <a href="konsentrasi.php?konsentrasi=jaringan">
                                <h5 class="card-title"><?= $jumlahpesertajaringan; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Network</h6>
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body">
                            <a href="konsentrasi.php?konsentrasi=hardware">
                                <h5 class="card-title"><?= $jumlahpesertahardware; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Hardware</h6>
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <div class="card-body">
                            <a href="konsentrasi.php?konsentrasi=multimedia">
                                <h5 class="card-title"><?= $jumlahpesertamultimedia; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Multimedia</h6>
                            </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?= $jumlahpeserta; ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">Total Peserta</h6>
                            </div>
                        </div>
                    </div>
                
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-9">
                                <form action="" method="post">
                                    <div class="input-group col-12">
                                        <input class="form-control py-2 border-right-0 border cari" type="search" name="keyword" id="example-search-input">
                                        <span class="input-group-append">
                                            <button class="btn btn-outline-secondary border-left-0 border" type="sumbit" name="cari">
                                                <i class="fa fa-search"></i>
                                            </button>
                                         </span>  
                                    </div>                   
                                </form>
                            </div>
                            <div class="col-2">
                                <a href="tambah.php"><input class="btn btn-info float-right tambah" type="submit" value="Tambah Data"></a>
                            </div>
                        </div>
                    </div>

                    <!-- <form action="" method="post" align="center">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-9">
                                    <div class=" input-group">
                                        <input class="form-control float-left cari" placeholder="Cari"
                                        aria-label="Cari" type="text" name="keyword" size="30" autofocus autocomplete="off">
                                         -->
                                        <!-- <button type="submit" name="cari"><img src="icon/kembali.png" width="13"></button> -->
                                    <!-- </div>
                                </div>      
                                <div class="col-2">
                                    <a href="tambah.php"><input class="btn btn-info float-right tambah" type="submit" value="Tambah Data"></a>
                                </div>
                            </div>
                        </div>
                    </form> -->

                        <div class="table-responsive container">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Nama</th>
                                        <th scope="col">No.Reg</th>
                                        <th scope="col">Konsentrasi</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">TTL</th>
                                        <th scope="col">No.Hp</th>
                                        <th scope="col">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                        <?php foreach( $extract as $row) : ?>
                                    <tr class="table1">
                                        <td>
                                            <a href="img/<?= $row["gambar"] ?>"><img src="img/<?= $row["gambar"] ?>" width="50px" ></a>
                                            <p><?= $row["nama"]; ?></p>
                                        </td>
                                        <td><?= $row["noreg"]; ?></td>
                                        <td><?= $row["konsentrasi"]; ?></td>
                                        <td><?= $row["jkl"]; ?></td>
                                        <td><?= $row["alamat"]; ?></td>
                                        <td><?= $row["tempat"]; ?>,<?= $row["tanggal"]; ?></td>
                                        <td><?= $row["nohp"]; ?></td>
                                        <td><div class="row">
                                            <a href="ubah.php?id=<?= $row["id"] ?>"><i class="fas fa-edit fa-lg mr-2"></i></a>
                                            <a href="hapus.php?id=<?= $row["id"]?>" onclick="return confirm('yakin ingin menghapus <?= $row["nama"]?>?');"><i class="fas fa-trash-alt fa-lg"></i></a>
                                            </div>                                           
                                        </td>
                                    </tr>
                        <?php endforeach ; ?> 
                                </tbody>
                            </table>
                        </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div aria-label="Page navigation example">
                                <ul class="pagination justify-content-center fixed-bottom mb-3">

                                <?php if( $halamanAktif > 1 ) : ?>

                                    <li class="page-item ">
                                        <a class="page-link rounded-circle" href="index.php?halaman=<?= $halamanAktif - 1; ?>" aria-label="">
                                            <i class="fas fa-chevron-left"></i>
                                        </a>
                                    </li>

                                <?php endif ; ?> 

                            <?php for($i= 1; $i <= $jumlahHalaman; $i++) : ?>
                                <?php if( $i == $halamanAktif ) : ?>
                                <a class="page-link rounded-circle" href="index.php?halaman=<?= $i ?>"  style="font-weight: bold; color:red"><li class="page-item"><?= $i; ?></li></a>
                            <?php else : ?>
                                <li class="page-item"><a class="page-link rounded-circle" href="index.php?halaman=<?= $i ?>"><?= $i; ?></a></li>
                                <?php endif ; ?>
                                <?php endfor ; ?>
                            <?php if( $halamanAktif < $jumlahHalaman ) : ?>
                                <li class="page-item">
                                    <a class="page-link rounded-circle" href="index.php?halaman=<?= $halamanAktif + 1; ?>" aria-label="Next">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                </li>
                            <?php endif ; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
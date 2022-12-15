<?php 
         session_start();
         if(!isset($_SESSION["login"])){
         header("location: login.php");
         exit;
         }
         require 'functions.php';
         $kons = $_GET["konsentrasi"];
         $konsentrasi = query("SELECT * FROM project WHERE konsentrasi='$kons' ORDER BY nama ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konsentrasi </title>
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
                            class="keluar"><i class="fas fa-sign-out-alt fa-lg"></i>
                            Keluar
                        </button>
                    </a> 
                </div>
            </div>
            <div class="col-md-10" style="margin-left: 210px;">
                            
            <center>
            <div class="container">
                <div class="table-responsive">
                    <table class="table table-hover" class="table">
                    <h2>Konsentrasi <?= $kons ?></h2>
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">No.Reg</th>
                                <th scope="col">Konsentrasi</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">TTL</th>
                                <th scope="col">No.Hp</th>
                                <th scope="col" width="100px">Opsi</th>
                            </tr>
                            <tssr>
                                <?php foreach($konsentrasi as $data) : ?>
                                <td>
                                    <img src="img/<?= $data["gambar"]; ?>" width="50px">
                                    <p><?= $data["nama"]; ?></p>
                                </td>
                                <td><?= $data["noreg"]; ?></td>
                                <td><?= $data["konsentrasi"]; ?></td>
                                <td><?= $data["jkl"];?></td>
                                <td><?= $data["alamat"]; ?></td>
                                <td><?= $data["tempat"]; ?>,<?= $data["tanggal"]; ?></td>
                                <td><?= $data["nohp"]; ?></td>
                                <td> <div class="row">
                                <a href="ubah.php?id=<?= $data["id"] ?>"><i class="fas fa-edit fa-lg mr-2"></i></a>
                                <a href="hapus.php?id=<?= $data["id"]?>" onclick="return confirm('yakin ingin menghapus <?= $data["nama"]?>?');"><i class="fas fa-trash-alt fa-lg"></i></a>
                                </td>
                                </div>
                            </tr>
                                <?php endforeach ; ?>
                        </thead>
                    </table>
                </div>
                </center>
                
            </div>
        </div>
    <div>
</div>

</body>
</html>
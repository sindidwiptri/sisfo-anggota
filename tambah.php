<?php 
    session_start();
    if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}
    require 'functions.php';
    //cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"]) ) {
        
        // var_dump($_POST); 
        // var_dump($_FILES);
        // die;
        
        //cek apakah data berhasil ditambahkan atau tidak
        if ( tambah($_POST) > 0 ){
            echo "
                <script>
                    alert('data berhasil ditambahkan');
                    document.location.href = 'index.php'
                </script>
            ";
        }else{
            echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'tambah.php'
            </script>";
        }
    }
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="icon" href="img/icon2.png">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
  <title>Tambah Peserta</title>

</head>


<body>
  <div class="navv2 mb-5">
    <a href="index.php" class="ml-5"><img src="img/back.png" alt="" style="height: 70px; width: 60px;"></a>
  </div>

<center>
  <h3 style="font-family: 'Poppins'; font-size: 20px;" class="font-weight-bold mb-3 mt-2">Tambah Peserta</h3>
<form action="" method="post" enctype="multipart/form-data">
  <!-- <div class="container">
    <div class="row edtable">
      <div class="col-md-3">
        <img src="img/user.png" class="rounded mx-auto " alt="...">
        <div>
          <br>
          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group" role="group">
              <input type="file" name="gambar" class="input1">
            </div>
          </div>
        </div>
      </div> -->
      <div class="col-md-8">
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <span style="font-family: 'Poppins'; font-size: 13px; width: 120px;" class="input-group-text tabel"
              id="inputGroup-sizing-default"> Nama :</span>
          </div>
          <input type="text" name="nama" class="form-control abc" autocomplete="off" required>
        </div>
        <div class="input-group mb-2 ">
          <div class="input-group-prepend ">
            <span style="font-family: 'Poppins'; font-size: 13px; width: 120px;" class="input-group-text "
              id="inputGroup-sizing-default">No. Regis :</span>
          </div>
          <input type="text " name="noreg" class="form-control abc" autocomplete="off" required>
        </div>
        <div class="input-group mb-2 ">
          <div class="input-group-prepend ">
            <span style="font-family: 'Poppins'; font-size: 13px; width: 120px" class="input-group-text "
              id="inputGroup-sizing-default">Konsentrasi :</span>
          </div>
          <!-- <input type="text " class="form-control abc"> -->
          <select name="konsentrasi" id="" class="form-control abc" autocomplete="off" required>
            <option value="" disabled selected>-Pilih Konsentrasi-</option>
            <option value="program">program</option>
            <option value="jaringan">jaringan</option>
            <option value="hardware">hardware</option>
            <option value="multimedia">multimedia</option>
          </select>

        </div>
        <div class="input-group mb-2 ">
          <div class="input-group-prepend ">
            <span style="font-family: 'Poppins'; font-size: 13px; width: 120px;" class="input-group-text "
              id="inputGroup-sizing-default">Jenis Kelamin :</span>
          </div>
          <select name="jkl" class="form-control abc " required>
            <option value="" disabled selected>-Pilih Jenis Kelamin-</option>
            <option value="laki-laki">laki-laki</option>
            <option value="perempuan">perempuan</option>
          </select>
          <!-- <input type="radio" name="jkl" value="laki-laki">laki-laki
          <input type="radio" name="jkl" value="perempuan">perempuan -->
        </div>
        <div class="input-group mb-2 ">
          <div class="input-group-prepend ">
            <span style="font-family: 'Poppins'; font-size: 13px; width: 120px;" class="input-group-text "
              id="inputGroup-sizing-default">TTL :</span>
          </div>
          <input type="text" name="tempat" class="form-control abc "  autocomplete="off" required>
          <input type="date" name="tanggal" class="form-control abc " autocomplete="off" required>
        </div>
        <div class="input-group mb-2 ">
          <div class="input-group-prepend ">
            <span style="font-family: 'Poppins'; font-size: 13px; width: 120px" class="input-group-text "
              id="inputGroup-sizing-default">Alamat :</span>
          </div>
          <!-- <textarea name="alamat" rows="2" class="form-control abc "></textarea> -->
          <input type="text" name="alamat" class="form-control abc " autocomplete="off" required>
        </div>
        <div class="input-group mb-2 ">
          <div class="input-group-prepend ">
            <span style="font-family: 'Poppins'; font-size: 13px; width: 120px" class="input-group-text "
              id="inputGroup-sizing-default">No.hp :</span>
          </div>
          <input type="number" name="nohp" class="form-control abc " autocomplete="off" required>
        </div>
        <div class="input"></div>
        <div class="form-group">
   <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1" required>
  </div>
            <button type="reset" name="reset" style="font-family: 'Poppins'; font-size: 15px;" class="btn btn-info float-right ml-2 ">Reset</button>
            <button type="submit" name="submit" style="font-family: 'Poppins'; font-size: 15px" class="btn btn-info float-right mr-2">simpan</button>
</form>
        </div>
      </div>
    </div>
  </div>
  </center>



</body>

</html>
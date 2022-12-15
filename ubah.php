<?php 
    require 'functions.php';

    //ambil data di url
    $id = $_GET["id"];
    //query data berdasarkan data mahasiswa
    $proje = query("SELECT * FROM project WHERE id = $id")[0];
    

    
    //cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"]) ) {
        

        
        //cek apakah data berhasil diubah atau tidak
        if ( ubah($_POST) > 0 ){
            echo "
                <script>
                    alert('data berhasil diubah');
                    document.location.href = 'index.php'
                </script>
            ";
        }else{
            echo "
            <script>
                alert('data gagal diubah');
                document.location.href = 'index.php'
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
  <title>Edit Data Peserta</title>

</head>


<body>
  <div class=" navv2 mb-5">
    <a href="index.php" class="ml-5"><img src="img/back.png" alt="fixed"  style="height: 70px; width: 60px;"></a>
  </div>

<center>
  <h2 style="font-family: 'Poppins'; font-size: 20px;" class=" text-center font-weight-bold mb-3 mt-2">Edit Data
    Peserta
  </h2>
<form action="" method="post" enctype="multipart/form-data">  
        <!-- <input type="hidden" name="gambarLama" value="
        <input type="hidden" name="id" value="
  <div class="container">
    <div class="row edtable">
    <div class="col-md-3">
        <img src="img/ class="rounded mx-auto " alt="...">
        <div>
          <br>
          <div class="btn-group" role="group" aria-label="Button group with nested dropdown">
            <div class="btn-group" role="group">
              <input type="file" name="gambar" class="input1">
            </div>
          </div>
        </div>
      </div> -->
      <input type="hidden" name="gambarLama" value="<?= $proje["gambar"]?>">
        <input type="hidden" name="id" value="<?= $proje["id"]?>">
      <div class="col-md-8">
        <div class="input-group mb-2">
          <div class="input-group-prepend">
            <span style="font-family: 'Poppins'; font-size: 13px; width: 120px;" class="input-group-text tabel"
              id="inputGroup-sizing-default"> Nama :</span>
          </div>
          <input type="text" name="nama" class="form-control abc" value="<?= $proje["nama"]; ?>" required>
        </div>
        <div class="input-group mb-2 ">
          <div class="input-group-prepend ">
            <span style="font-family: 'Poppins'; font-size: 13px; width: 120px;" class="input-group-text "
              id="inputGroup-sizing-default">No. Regis :</span>
          </div>
          <input type="text " name="noreg" class="form-control abc" value="<?= $proje["noreg"]; ?>" required>
        </div>
        <div class="input-group mb-2 ">
          <div class="input-group-prepend ">
            <span style="font-family: 'Poppins'; font-size: 13px; width: 120px" class="input-group-text "
              id="inputGroup-sizing-default">Konsentrasi :</span>
          </div>
          <!-- <input type="text " class="form-control abc"> -->
          <select name="konsentrasi" id="" class="form-control abc" required>
              <option value="">-Pilih Konsentrasi-</option>
            <option value="program" <?php if($proje["konsentrasi"] == 'program'){echo "selected";} ?>>program</option>
            <option value="multimedia" <?php if($proje["konsentrasi"] == 'jaringan'){echo "selected";} ?>>jaringan</option>
            <option value="hardware" <?php if($proje["konsentrasi"] == 'hardware'){echo "selected";} ?>>hardware</option>
            <option value="jaringan" <?php if($proje["konsentrasi"] == 'multimedia'){echo "selected";} ?>>multimedia</option>
          </select>

        </div>
        <div class="input-group mb-2 ">
          <div class="input-group-prepend ">
            <span style="font-family: 'Poppins'; font-size: 13px; width: 120px;" class="input-group-text "
              id="inputGroup-sizing-default">Jenis Kelamin :</span>
          </div>
          <select name="jkl" class="form-control abc " required>
            <option value="">-Pilih Jenis Kelamin-</option>
            <option value="laki-laki" <?php if($proje["jkl"] == 'laki-laki'){echo 'selected';} ?>>laki-laki</option>
            <option value="perempuan" <?php if($proje["jkl"] == 'perempuan'){echo 'selected';} ?>>perempuan</option>
          </select>
          <!-- <input type="radio" name="jkl" value="laki-laki">laki-laki
          <input type="radio" name="jkl" value="perempuan">perempuan -->
        </div>
        <div class="input-group mb-2 ">
          <div class="input-group-prepend ">
            <span style="font-family: 'Poppins'; font-size: 13px; width: 120px;" class="input-group-text "
              id="inputGroup-sizing-default">TTL :</span>
          </div>
          <input type="text" name="tempat" class="form-control abc "  autocomplete="off" value="<?= $proje["tempat"]; ?>" required>
          <input type="date" name="tanggal" class="form-control abc " value="<?= $proje["tanggal"]; ?>" required>
        </div>
        <div class="input-group mb-2 ">
          <div class="input-group-prepend ">
            <span style="font-family: 'Poppins'; font-size: 13px; width: 120px" class="input-group-text "
              id="inputGroup-sizing-default">Alamat :</span>
          </div>
          <!-- <textarea name="alamat" rows="2" class="form-control abc "  value="<?= $proje["alamat"]; ?>"></textarea> -->
          <input type="text" name="alamat" class="form-control abc " value="<?= $proje["alamat"]; ?>">
        </div>
        <div class="input-group mb-2 ">
          <div class="input-group-prepend ">
            <span style="font-family: 'Poppins'; font-size: 13px; width: 120px" class="input-group-text "
              id="inputGroup-sizing-default">No.hp :</span>
          </div>
          <input type="number" name="nohp" class="form-control abc " value="<?= $proje["nohp"]; ?>" required>
        </div>
        <div class="input"></div>
        <div class="form-group">
          
    <input type="file" name="gambar" class="form-control-file" id="exampleFormControlFile1">
  </div>
            <button type="reset" name="reset" style="font-family: 'Poppins'; font-size: 15px" class="btn btn-info float-right ml-2">Reset</button>
            <button type="submit" name="submit" style="font-family: 'Poppins'; font-size: 15px" class="btn btn-info float-right mr-2">simpan</button>
</form>
        </div>
      </div>
    </div>
  </div>
  </center>


</body>

</html>
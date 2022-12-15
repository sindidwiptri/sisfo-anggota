<?php
require("database.php");
$perintah = "SELECT * FROM  project WHERE konsentrasi = 'multimedia'";
$eksekusi = mysqli_query($konek, $perintah);
$cek = mysqli_affected_rows($konek);

if($cek > 0){
 
    $response["data"] = array();    
    $linkGambar = 'http://192.168.43.119/sisfoanggota4/img/';
    while($ambil = mysqli_fetch_object($eksekusi)){
        $F["id"] = $ambil->id;
        $F["noreg"] = $ambil->noreg;
        $F["nama"] = $ambil->nama;
        $F["tempat"] = $ambil->tempat;
        $F["tanggal"] = $ambil->tanggal;
        $F["jkl"] = $ambil->jkl;
        $F["nohp"] = $ambil->nohp;
        $F["konsentrasi"] = $ambil->konsentrasi;
        $F["alamat"] = $ambil->alamat;
        $F["gambar"] = $linkGambar.$ambil->gambar;
        array_push($response["data"], $F);
    }
    
}

echo json_encode($response);
mysqli_close($konek);


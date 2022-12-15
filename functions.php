
<?php 

    //koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "projectcd");

    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
    

    function tambah($data){
        global $conn;
        $noreg = htmlspecialchars($data["noreg"]);
        $nama = htmlspecialchars($data["nama"]);
        $tempat = htmlspecialchars($data["tempat"]);
        $tanggal= htmlspecialchars($data["tanggal"]);
        $jkl = htmlspecialchars($data["jkl"]);
        $nohp = htmlspecialchars($data["nohp"]);
        $konsentrasi = htmlspecialchars($data["konsentrasi"]);
        $alamat = htmlspecialchars($data["alamat"]);
        // $gambar = ($data["gambar"]);
        //upload gambar
        $gambar = upload();
        if (!$gambar){
            return false;
        }

        $query = "INSERT INTO project
                    VALUES
                    ('', '$noreg', '$nama', '$tempat', '$tanggal', '$jkl', '$nohp', '$konsentrasi', '$alamat', '$gambar')
                    ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
    function upload(){
        $namaFile = $_FILES['gambar']['name'];
        $ukuranFile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpName = $_FILES['gambar']['tmp_name'];

        // cek apakah tidak ada gambar yg diupload
        if ($error === 4){
            echo "<script>
                    alert('pilih gambar terlebih dahulu');
                 </script>";
                return false;
         }

        //cek apakah yg diupload adalah gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar)); //strtolower : memaksa ekstensi gambar jadi huruf kecil
        
        if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo "<script>
                        alert('yang anda upload bukan gambar');
                </script>";
            return false;
        }
        // jika ukurannya terlalu besar
        if($ukuranFile > 1000000){
            echo "<script>
                alert('ukuran gambar terlalu besar');
            </script>";
            return false;
        }
        //lolos penecekan, gambar siap diupload
        //generate nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        // var_dump($namaFileBaru); die;



        move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

        return $namaFileBaru;
     }
     function hapus($id){
        global $conn;

        //codingan baru baru, revisi nomor 
        $get = mysqli_query($conn, "SELECT * FROM project WHERE id = $id");
        $return = mysqli_fetch_array($get);

        $gambar = $return["gambar"];
        if(file_exists("img/$gambar"))
        {
            unlink("img/$gambar");
        }
        $target = $_GET['id'];
        if(file_exists($target)){
            unlink($target);
        }
        
        mysqli_query($conn, "DELETE FROM project WHERE id = $id");
        return mysqli_affected_rows($conn);
    }
    function ubah($data){
        global $conn;
        $id = htmlspecialchars($data["id"]);
        $nama = htmlspecialchars($data["nama"]);
        $noreg = htmlspecialchars($data["noreg"]);
        $tempat = htmlspecialchars($data["tempat"]);
        $tanggal= htmlspecialchars($data["tanggal"]);
        $jkl = htmlspecialchars($data["jkl"]);
        $nohp = htmlspecialchars($data["nohp"]);
        $konsentrasi = htmlspecialchars($data["konsentrasi"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $gambarLama = htmlspecialchars($data["gambarLama"]);
        //cek apakah user pilih gambar baru atau tidak
        if ($_FILES['gambar']['error'] === 4){
            $gambar = $gambarLama;
        }else{

            $gambar = upload();
        }
        
        

        
        $query = "UPDATE project SET 
                    nama = '$nama',
                    noreg = '$noreg',
                    tempat = '$tempat',
                    tanggal = '$tanggal',
                    jkl = '$jkl',
                    nohp = '$nohp',
                    konsentrasi = '$konsentrasi',
                    alamat = '$alamat',
                    gambar = '$gambar' WHERE id='$id'
                     ";
        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
    function cari($keyword){
        $query = "SELECT * FROM project
                WHERE 
                nama LIKE '%$keyword%' OR
                noreg LIKE '%$keyword%' OR
                tempat LIKE '%$keyword%' OR
                tanggal LIKE '%$keyword%' OR
                jkl LIKE '%$keyword%' OR
                nohp LIKE '%$keyword%' OR
                konsentrasi LIKE '%$keyword%' OR
                alamat LIKE '%$keyword%' 
                
            ";
            return query($query);
    }
   
    
     ?>

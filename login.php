<?php 
    
    session_start();
    require 'functions.php';
    
    if(isset($_SESSION["login"]) ){
        header("location: index.php");
        exit;
    }
    

    if( isset($_POST["login"])){

        $username = preg_replace("/=/", "", $_POST["username"]);
        $password = preg_replace("/=/", "", $_POST["password"]);

        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username' AND password = '$password'");
        
        //cek username
        if ( mysqli_num_rows( $result ) == 1){
            //cek password
            $row = mysqli_fetch_assoc($result);
            if ($row == true) {

                //set sesion
                $_SESSION["login"] = true;
                $_SESSION['username'] = $username;
                $_SESSION['gambaradmin'] = $row['gambaradmin'];


                header("location: index.php");
                exit;
            }
        }
        $error = true;
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sisfo Anggota</title>
    <link rel="icon" href="img/REVISI LOGO 2.0.png">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid" style="background-color: white;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="sisfo">
                        <p><img src="img/REVISI LOGO 2.0.png" alt="" width=40px style="line-height: 200%;"> Sisfo Anggota Extract
                        </p>
                    </div> 
                    <div class="jumbotron1">
            <h3>Silahkan Login</h3>
            <?php if( isset($error) ) : ?>
                <p style="color: red; font-style: italic">username / password salah </p>
            <?php endif ; ?>
            <form action="" method="post">
                <div class="form-group">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Pengguna" name="username">
                </div>
                <div class="form-group">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Kata Sandi" name="password">
                </div>
                <div>
                    <!-- <a href="index.php" type="submit" name="login" class="btn btn-info masuk">Masuk</a> -->
                    <button name="login" type="submit" class="btn btn-info masuk">Masuk</button>
                </div>
            </form>
        </div>
    </div>

                <div class="col-md-6">
                    <img class="man-jumbotron" src="img/kedai.png" alt="Responsive image" style="margin-top:50px">
                    <h6 class="helloworld">
                        <span id="typed"></span>
                    </h6>
                </div>
            </div>
        </div>
    </div>
    <!-- end jumbotron -->
</body>

</html>
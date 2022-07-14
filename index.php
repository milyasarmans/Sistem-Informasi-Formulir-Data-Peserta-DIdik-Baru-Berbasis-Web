<?php
    session_start();
    include "dbconnect.php";
    $alert = "";

    if (isset($_SESSION["role"])) {
        $role = $_SESSION["role"];

        if ($role == "Admin") {
            header("location:admin");
        } else {
            header("location:user");
        }
    }

    if (isset($_POST["btn-login"])) {
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = mysqli_real_escape_string($conn, $_POST["password"]);

        $cariadmin = mysqli_query($conn,"select * from admin where adminemail='$email' and adminpassword='$password';");
        $cariuser = mysqli_query($conn,"select * from user where useremail='$email' and userpassword='$password';");

        $cekadmin = mysqli_num_rows($cariadmin);
        $cekuser = mysqli_num_rows($cariuser);

        if ($cekadmin > 0) {
            $data = mysqli_fetch_assoc($cariadmin);

            $_SESSION["email"] = $data["adminemail"];
            $_SESSION["role"] = "Admin";
            header("location:admin");
        } elseif ($cekuser > 0) {
            $data = mysqli_fetch_assoc($cariuser);
            $_SESSION["email"] = $data["useremail"];
            $_SESSION["userid"] = $data["userid"];
            $_SESSION["role"] = "User";
            header("location:user");
        } else {
            echo "<div class='alert alert-warning'>Username atau Password salah</div>
            <meta http-equiv='refresh' content='2'>";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="jquery.min.js"></script>
	<style>
        body{background-color:#17a2b8;}
        .container{
            border-radius:30px;
            padding-left:10%;
            padding-right:10%;
            padding-top:3%;
            padding-bottom:2%;
        }
        .btn{
            width:40%;
        }
	    @media screen and (max-width: 600px) {
            h4{font-size:100%;}
        }
	</style>
	<link rel="icon" type="image/png" href="favicon.png">
  </head>
  <body>
    <div align="center">
        <img src="logo.png" width="60%" style="margin-top:2%"\>
	    </br>
        <div class="container">
            <div style="color:white">
            <label><h6>*Jika NISN belum tercatat pada sistem ini, silahkan klik <b>DAFTAR</b>.</h6></label>
            </br>
        </div>
            <form method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="NISN" name="email" required>
                </div>
                <div class="form-group">
                    <input type="password"class="form-control" placeholder="Verifikasi" name="password" required>
                    <div style="color:red; text-align:left">*Verifikasi form dengan masukkan <b>SISWA</b></div>
                </div>
                <a class="btn btn-light text-dark" href="register.php">Daftar</a>
                <button type="submit" class="btn btn-dark" name="btn-login">Masuk</button>
            </form>			
			<br\>
        </div>
    </div>   
  </body>
</html>

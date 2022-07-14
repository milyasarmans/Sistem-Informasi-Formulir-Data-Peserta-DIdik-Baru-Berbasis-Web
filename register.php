<?php
session_start();
include "dbconnect.php";
$alert = "";

if (isset($_SESSION["role"])) {
    header("location:index.php");
}

if (isset($_POST["btn-daftar"])) {
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $lihat1 = mysqli_query($conn,"select * from user where useremail='$email'");
    $lihat2 = mysqli_num_rows($lihat1);

    if ($lihat2 < 1) {
        $insert = mysqli_query(
            $conn,
            "insert into user (useremail) values ('$email')"
        );
        if ($insert) {
            echo "<div class='alert alert-success'>Berhasil mendaftar, silakan login.</div>
            <meta http-equiv='refresh' content='2; url= index.php'/>  ";
        } else {
            echo "<div class='alert alert-warning'>Gagal mendaftar, silakan coba lagi.</div>
            <meta http-equiv='refresh' content='2'>";
        }
    } else {
        $alert =
            '<strong><font color="red">Email sudah pernah digunakan</font></strong>';
        echo '<meta http-equiv="refresh" content="2">';
    }
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran PPDB</title>
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
        <div class="container">
            <div style="color:white">
                <label><h6>*Jika NISN belum tercatat pada sistem ini, silahkan masukkan NISN lalu klik <b>DAFTAR</b>.</h6></label>
                <label><?php echo $alert; ?></label>
            </div>
                <form method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="NISN" name="email" autofocus required>
                    </div>
					<a class="btn btn-light text-dark" href="index.php">Masuk</a>
                    <button type="submit" class="btn btn-dark" name="btn-daftar">Daftar</button>
                </form>			
			    </br>
            </div>
        </div>
    </body>
</html>

<?php 

require 'functions.php';

if( isset($_POST["register"]) ) {

  if( registrasi($_POST) > 0 ) {
    echo "<script>
            alert('Registrasi Berhasil');
            document.location.href = 'login.php';
        </script>";

        // header("Location: login.php"); jika menggunakan ini maka script diatas tidak akan tampil dan langsung meredirect, gunakan redirect JS !
  } else {
    "<script>
            alert('Registrasi Gagal');
        </script>";
  }

}

?>

<!DOCTYPE html>
<html>
<head>

	<title>Admin Control Webpage</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css">
	<link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<div class="bgimg">
<div class="container ne">
  <div class="signInUpHeader">Admin Registration</div>

<form action="" method="post">
<div class="form-group row topma">
  <div class="col-xs-1"></div>
  <div class="col-xs-5">
    <input class="form-control inputheight shd" id="ex6" type="text" name="nama_depan" placeholder="Nama Depan" required>
  </div>

  <div class="col-xs-5">
    <input class="form-control inputheight shd" id="ex6" type="text" name="nama_belakang" placeholder="Nama Belakang" required>
  </div>
  <div class="col-xs-1"></div>
</div> 

<div class="form-group row topma">
  <div class="col-xs-1"></div>
  <div class="col-xs-1"><label for="username"><i class="fas fa-user icstyle" style="font-size: 20px"></i></label></div>
  <div class="col-xs-9">
    <input class="form-control inputheight shd" id="username" type="text" name="username" placeholder="Username" required autocomplete="off">
  </div>
  <div class="col-xs-1"></div>
</div> 

<div class="form-group row topma">
  <div class="col-xs-1"></div>
  <div class="col-xs-1"><label for="email"><i class="fas fa-envelope icstyle" style="font-size: 20px"></i></label></div>
  <div class="col-xs-9">
    <input class="form-control inputheight shd" id="email" type="text" name="email" placeholder="Email" required autocomplete="off">
  </div>
  <div class="col-xs-1"></div>
</div> 

<div class="form-group row topma">
  <div class="col-xs-1"></div>
  <div class="col-xs-1"><label for="password"><i class="fas fa-lock icstyle" style="font-size: 20px"></i></label></div>
  <div class="col-xs-9">
    <input class="form-control inputheight shd" id="password" type="password" name="password" placeholder="Password" required>
  </div>
  <div class="col-xs-1"></div>
</div> 

<div class="form-group row topma">
  <div class="col-xs-1"></div>
  <div class="col-xs-1"><label for="konfirmasi"><i class="fas fa-unlock icstyle" style="font-size: 20px"></i></label></div>
  <div class="col-xs-9">
    <input class="form-control inputheight shd" id="konfirmasi" type="password" name="knfpassword" placeholder="Konfirmasi Password">
  </div>
  <div class="col-xs-1"></div>
</div> 

<div class="form-group row topma col-md-8">
  <div class="col-xs-1"></div>
  <div class="col-xs-10">
      <button class="regbtn" type="submit" name="register">Register</button>
  </div>
  <div class="col-xs-1"></div>
</div> 

<div class="form-group row topma col-md-4">
  <div class="col-xs-1"></div>
  <div class="col-xs-10" style="width: 100%; padding: 0px;">
      <a class="linkund" href="login.php"><div class="regbtn">Login</div></a>
  </div>
  <div class="col-xs-1"></div>
</div> 



</form>
</div>
<!-- closing bg img -->
</div> 

<script src="script.js"></script>
</body>
</html>
<?php 
session_start();

if (isset($_SESSION["login"])){
  header("Location: index.php");
}


require 'functions.php';

if( isset($_POST["login"])) {
  $username = $_POST["username"];
  $password = $_POST["password"];


  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  if ( mysqli_num_rows($result) === 1) {

    //cek password dari username ini

    $row = mysqli_fetch_assoc($result) ;
    $_SESSION['nama_user'] = $row['username'];

    $namauser = $_SESSION['nama_user'];

    if ($password == $row["password"]){


      $_SESSION["login"] = true;

      echo "<script>
              alert('Selamat Datang $namauser');
              document.location.href = 'index.php';
          </script>";

      
      exit; 
    }
  }

  $error = true; 

  if (isset($error)) {
    echo "<script>
      alert('Username atau Password Salah !');
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
  <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.min.css">
  <link rel="stylesheet" href="fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css">
  <link rel="stylesheet" type="text/css" href="style.css">

</head>
<body>

<div class="bgimg2">

  <div class="container ne">
  <div class="signInUpHeader">Halaman Login</div>


    <form action="" method="post">
      <div class="form-group row topma a1">
        <div class="col-xs-1"></div>
        <div class="col-xs-1"><i class="fas fa-user icstyle" style="font-size: 20px"></i></div>
        <div class="col-xs-9">
          <input class="form-control inputheight shd" id="ex6" type="text" name="username" autocomplete="off" placeholder="Username" required>
        </div>
        <div class="col-xs-1"></div>
      </div> 

      <div class="form-group row topma a2">
        <div class="col-xs-1"></div>
        <div class="col-xs-1"><i class="fas fa-lock icstyle" style="font-size: 20px"></i></div>
        <div class="col-xs-9">
          <input class="form-control inputheight shd" id="ex6" type="password" name="password" placeholder="Password" required>
        </div>
        <div class="col-xs-1"></div>
      </div> 

      <div class="form-group row topma a3">
        <div class="col-xs-1"></div>
        <div class="col-xs-10">
            <button class="regbtn" type="submit" name="login">Login</button>
        </div>
        <div class="col-xs-1"></div>
      </div> 

      <div class="form-group row a4">
        <div class="col-xs-1"></div>
        <div class="col-xs-10">
            <a class="linkund" href="registrasi.php"><div class="regbtn">Create An Account</div></a>
        </div>
        <div class="col-xs-1"></div>
      </div>

    </form>
  </div>
</div> <!-- closing bg img2 -->


<script src="script.js"></script>
</body>
</html>
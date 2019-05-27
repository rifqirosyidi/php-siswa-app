<?php 
session_start();

if (!isset($_SESSION["login"])){
  header("Location: login.php");
}

require 'functions.php';

$KelasSatuIpa = query("SELECT *, nama_kelas
                  FROM siswa 
                  INNER JOIN kelas 
                  ON siswa.kelas = kelas.id_kelas
                  WHERE 
                  nama_kelas = 'X' AND jurusan = 'IPA' 
                ");

$KelasSatuAgama = query("SELECT *, nama_kelas
                  FROM siswa 
                  INNER JOIN kelas 
                  ON siswa.kelas = kelas.id_kelas
                  WHERE 
                  nama_kelas = 'X' AND jurusan = 'Agama' 
                ");

$kelasDuaIpa = query("SELECT *, nama_kelas
                  FROM siswa 
                  INNER JOIN kelas 
                  ON siswa.kelas = kelas.id_kelas
                  WHERE 
                  nama_kelas = 'XI' AND jurusan = 'IPA' 
                ");

$kelasDuaAgama = query("SELECT *, nama_kelas
                  FROM siswa 
                  INNER JOIN kelas 
                  ON siswa.kelas = kelas.id_kelas
                  WHERE 
                  nama_kelas = 'XI' AND jurusan = 'Agama' 
                ");

$kelasTigaIpa = query("SELECT *, nama_kelas
                  FROM siswa 
                  INNER JOIN kelas 
                  ON siswa.kelas = kelas.id_kelas
                  WHERE 
                  nama_kelas = 'XII' AND jurusan = 'IPA' 
                ");

$kelasTigaAgama = query("SELECT *, nama_kelas
                  FROM siswa 
                  INNER JOIN kelas 
                  ON siswa.kelas = kelas.id_kelas
                  WHERE 
                  nama_kelas = 'XII' AND jurusan = 'Agama' 
                ");

if (isset($_POST["searchBtn"])) {
  echo "<script>
          alert('Pencarian Data Tidak Dapat Dilakukan Pada Halaman Ini');
        </script>";
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


<div class="col-md-3 warna">
 <form class="navbar-form navbar-left tpad30" action="" method="post">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search">
    <div class="input-group-btn">
      <button class="btn btn-default" type="submit" name="searchBtn">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form> 

	<div class="container-fluid">
    	<div class="navbar-header">
      		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        		<i class="fas fa-bars"></i>
      		</button>
      		<div class="makeitblock"><a class="navbar-brand" href="index.php"><p id="judulWebsite"></p></a></div>
    	</div>
    <div class="collapse navbar-collapse" id="myNavbar">
      	<ul class="nav navbar-left">
       		<li><a href="index.php"><i class="fas fa-home marginten"></i>Home</a></li>
        	<li><a href="siswa.php"><i class="fas fa-user marginten"></i>Siswa</a></li>
          <li><a href="kelas.php"><i class="fas fa-list-ol marginten"></i>Kelas</a></li>
          <li><a href="tambahdata.php"><i class="fas fa-user-plus marginten"></i>Tambahkan Data</a></li>         
          <li><a href="hapusdata.php"><i class="fas fa-user-minus marginten"></i>Hapus Data</a></li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a>
               <ul class="dropdown-menu" role="menu">
                <li><a href="#"><i class="fas fa-user-circle marginten"></i>Username : <?php echo $_SESSION['nama_user']; ?></a></li></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt marginten"></i>Logout</a></li></li>
               </ul>
          </li>
      	</ul>
    </div>
  </div>
</div>

<div class="col-md-9 changeColor extratinggi">

   <div class="headertitle" style="margin-bottom: 30px"><i class="fas fa-list-ol" style="padding-right: 30px"></i>Kelas</div>
   
  <div class="col-md-6 alignCenter">
   <button class="tombols" id="toggleKelasSatuIpa"></button>
  

<!-- TAMPIL DATA -->
  <div class="row" style="margin: 0; ">
      <?php foreach ($KelasSatuIpa as $row) :  ?>
            <div class="col-md-3 col-xs-6 kolomdata k1"><a href="detailsiswa.php?id=<?php echo $row["id_siswa"]; ?>">
               <div class="topmargin">
               <img class="gridphoto kelasSatuIpa" src="photo/<?php echo $row["foto"]?>" height="200px">
               <p class="textcentered kelasSatuIpa"><?php echo $row["nama_lengkap"]; ?></p>
               <p class="textcentered kelasSatuIpa"><?php echo $row["nis"]; ?></p>
               <p class="textcentered kelasSatuIpa">Kelas <?php echo $row["nama_kelas"] . " " . $row["jurusan"]; ?></p>
               </a></div>
            </div>
      <?php endforeach; ?>

  </div>
  </div>

  <div class="col-md-6 alignCenter">
   <button class="tombols" id="toggleKelasSatuAgama"></button>
  

<!-- TAMPIL DATA -->
  <div class="row" style="margin: 0; ">
      <?php foreach ($KelasSatuAgama as $row) :  ?>
            <div class="col-md-3 col-xs-6 kolomdata k2"><a href="detailsiswa.php?id=<?php echo $row["id_siswa"]; ?>">
               <div class="topmargin">
               <img class="gridphoto kelasSatuAgama" src="photo/<?php echo $row["foto"]?>" height="200px">
               <p class="textcentered kelasSatuAgama"><?php echo $row["nama_lengkap"]; ?></p>
               <p class="textcentered kelasSatuAgama"><?php echo $row["nis"]; ?></p>
               <p class="textcentered kelasSatuAgama">Kelas <?php echo $row["nama_kelas"] . " " . $row["jurusan"]; ?></p>
               </a></div>
            </div>
      <?php endforeach; ?>
  </div>
  </div>

  <div class="col-md-6 alignCenter">
   <button class="tombols" id="toggleKelasDuaIpa"></button>
  

<!-- TAMPIL DATA 2-->
  <div class="row" style="margin: 0; ">
      <?php foreach ($kelasDuaIpa as $row) :  ?>
            <div class="col-md-3 col-xs-6 kolomdata k3"><a href="detailsiswa.php?id=<?php echo $row["id_siswa"]; ?>">
               <div class="topmargin">
               <img class="gridphoto kelasDuaIpa" src="photo/<?php echo $row["foto"]?>" height="200px">
               <p class="textcentered kelasDuaIpa"><?php echo $row["nama_lengkap"]; ?></p>
               <p class="textcentered kelasDuaIpa"><?php echo $row["nis"]; ?></p>
               <p class="textcentered kelasDuaIpa">Kelas <?php echo $row["nama_kelas"] . " " . $row["jurusan"]; ?></p>
               </a></div>
            </div>
      <?php endforeach; ?>
  </div>
  </div>
  
  <div class="col-md-6 alignCenter">
   <button class="tombols" id="toggleKelasDuaAgama">fhsal</button>
  

  <!-- TAMPIL DATA 2-->
  <div class="row" style="margin: 0; ">
      <?php foreach ($kelasDuaAgama as $row) :  ?>
            <div class="col-md-3 col-xs-6 kolomdata k4"><a href="detailsiswa.php?id=<?php echo $row["id_siswa"]; ?>">
               <div class="topmargin">
               <img class="gridphoto kelasDuaAgama" src="photo/<?php echo $row["foto"]?>" height="200px">
               <p class="textcentered kelasDuaAgama"><?php echo $row["nama_lengkap"]; ?></p>
               <p class="textcentered kelasDuaAgama"><?php echo $row["nis"]; ?></p>
               <p class="textcentered kelasDuaAgama">Kelas <?php echo $row["nama_kelas"] . " " . $row["jurusan"]; ?></p>
               </a></div>
            </div>
      <?php endforeach; ?>
  </div>
</div>

  <div class="col-md-6 alignCenter">
   <button class="tombols" id="toggleKelasTigaIpa"></button>

  <div class="row" style="margin: 0; ">
      <?php foreach ($kelasTigaIpa as $row) :  ?>
            <div class="col-md-3 col-xs-6 kolomdata k5"><a href="detailsiswa.php?id=<?php echo $row["id_siswa"]; ?>">
               <div class="topmargin">
               <img class="gridphoto kelasTigaIpa" src="photo/<?php echo $row["foto"]?>" height="200px">
               <p class="textcentered kelasTigaIpa"><?php echo $row["nama_lengkap"]; ?></p>
               <p class="textcentered kelasTigaIpa"><?php echo $row["nis"]; ?></p>
               <p class="textcentered kelasTigaIpa">Kelas <?php echo $row["nama_kelas"] . " " . $row["jurusan"]; ?></p>
               </a></div>
            </div>
      <?php endforeach; ?>
  </div>
</div>

  <div class="col-md-6 alignCenter">
   <button class="tombols" id="toggleKelasTigaAgama"></button>
  

  <div class="row" style="margin: 0; ">
      <?php foreach ($kelasTigaAgama as $row) :  ?>
            <div class="col-md-3 col-xs-6 kolomdata k6"><a href="detailsiswa.php?id=<?php echo $row["id_siswa"]; ?>">
               <div class="topmargin">
               <img class="gridphoto kelasTigaAgama" src="photo/<?php echo $row["foto"]?>" height="200px">
               <p class="textcentered kelasTigaAgama"><?php echo $row["nama_lengkap"]; ?></p>
               <p class="textcentered kelasTigaAgama"><?php echo $row["nis"]; ?></p>
               <p class="textcentered kelasTigaAgama">Kelas <?php echo $row["nama_kelas"] . " " . $row["jurusan"]; ?></p>
               </a></div>
            </div>
      <?php endforeach; ?>
  </div>
  </div>

<script src="script.js"></script>
</body>
</html>
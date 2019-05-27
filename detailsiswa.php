<?php 
session_start();

if (!isset($_SESSION["login"])){
  header("Location: login.php");
}

require 'functions.php';

$id = $_GET["id"];
$siswa = query("SELECT *, nama_kelas 
                  FROM siswa 
                  INNER JOIN kelas 
                  ON siswa.kelas = kelas.id_kelas WHERE id_siswa = $id"); // sudah dalam bentuk array asosiatif rapi

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
  <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.css">
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
      		<div class="makeitblock"><a class="navbar-brand" href="#"><p id="judulWebsite"></p></a></div>
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
                <li><a href="#"><i class="fas fa-account marginten"></i>Username : <?php echo $_SESSION['nama_user']; ?></a></li></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt marginten"></i>Logout</a></li></li>
               </ul>
             </li>
      	</ul>
    </div>
  </div>
</div>

<div class="col-md-9 changeColor2">

<div class="headertitle" style="margin-bottom: 30px;"><i class="fas fa-user" style="padding-right: 30px"></i>Data Siswa</div>



<div class="row" style="margin: 0; ">

<?php foreach ( $siswa as $sis ): ?>
    <div class="col-md-6 col-md-push-6">
        <img class="fotoDetailJumbo" src="photo/<?php echo $sis["foto"]; ?>" height="500px">
    </div>

    <div class="col-md-6 col-md-pull-6">

        
          <div class="detailedsiswa"><strong>NIS</strong> : <?php echo $sis["nis"]; ?></div>
          <div class="detailedsiswa"><strong>Nama</strong> : <?php echo $sis["nama_lengkap"]; ?></div>
          <div class="detailedsiswa"><strong>Kelas</strong> : <?php echo $sis["nama_kelas"]; ?></div>
          <div class="detailedsiswa"><strong>Jurusan</strong> : <?php echo $sis["jurusan"]; ?></div>
          <div class="detailedsiswa"><strong>Email</strong> : <?php echo $sis["email"]; ?></div>
          <div class="detailedsiswa"><strong>Tempat, Tanggal Lahir </strong> : <?php echo $sis["tempat_lahir"] . ", " . $sis["tanggal_lahir"]; ?></div>
          <div class="detailedsiswa"><strong>Jenis Kelamin </strong> : <?php echo $sis["jenis_kelamin"]; ?></div>
          <div class="detailedsiswa"><strong>No Telepon </strong> : <?php echo $sis["no_telepon"]; ?></div>
          <div class="detailedsiswa"><strong>Alamat </strong> : <?php echo $sis["alamat"]; ?></div>  
        

      <div class="tombol">
        <a href="ubahdata.php?id=<?php echo $sis["id_siswa"]; ?>"><button class="tombolubah" type="submit" name="ubahdata">Ubah Data</button></a>

        <a href="hapus.php?id=<?php echo $sis["id_siswa"]; ?>"><button class="tombolhapus" type="submit" name="hapusdata">Hapus Data</button></a>
      </div>
    </div>

      <?php endforeach ?>
      
</div>


<div width="100%">
   <p class="textcentered" style="margin: 100px 0px 20px 0px">Copyright <i class="far fa-copyright"> 2018 | Rief - Q | </i> 16.51.0010</p>
</div>




<script src="script.js"></script>
</body>
</html>
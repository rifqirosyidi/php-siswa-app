<?php 
session_start();

if (!isset($_SESSION["login"])){
  header("Location: login.php");
}

require 'functions.php';

$jmlDataPerHalaman = 18; 
$jmlTotalData = count(query("SELECT * FROM siswa"));
$jmlHalaman = ceil($jmlTotalData / $jmlDataPerHalaman); //menangani jumlah halaman bernilai koma, dan pembulatan ke atas

if( isset($_GET["page"])) {
  $halamanYangAktif = $_GET["page"]; 
} else {
  $halamanYangAktif = 1;
}

$awalData = ($jmlDataPerHalaman * $halamanYangAktif) - $jmlDataPerHalaman;

$siswa = query("SELECT id_siswa, foto, nama_lengkap, nis FROM siswa LIMIT $awalData, $jmlDataPerHalaman"); // sudah dalam bentuk array asosiatif rapi

if (isset($_POST["searchBtn"])) {
  $siswa = pencarian($_POST["searchKey"]);
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
    <input type="text" class="form-control" placeholder="Delete" name="searchKey">
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
                <li><a href="#"><i class="fas fa-account marginten"></i>Username : <?php echo $_SESSION['nama_user']; ?></a></li></li>
                <li><a href="logout.php"><i class="fas fa-sign-out-alt marginten"></i>Logout</a></li></li>
               </ul>
             </li>
      	</ul>
    </div>
  </div>
</div>

<div class="col-md-9 changeColor">
<div class="headertitle" style="margin-bottom: 30px"><i class="fas fa-user-minus" style="padding-right: 30px"></i>Hapus Data</div>



<div class="row" style="margin: 0; ">
      <?php foreach ($siswa as $row) :  ?>
            <div class="col-lg-2 col-md-3 col-sm-4 col-xs-6 extrasp">
               <div class="topmargin">
               <img class="gridphoto" src="photo/<?php echo $row["foto"]; ?>" height="200px">
               <p class="textcentered"><?php echo $row["nama_lengkap"]; ?></p>
               <p class="textcentered"><?php echo $row["nis"]; ?></p>
               <a href="hapus.php?id=<?php echo $row["id_siswa"]; ?>"><button onclick ="return confirm('Anda Yakin Ingin Menghapus Data ?');" class="hapussiswa" type="submit" name="hapusdata" style="background-color: red"><i class="fas fa-user-minus"></i> Hapus Data</button></a>
             </div>
            </div>
      <?php endforeach; ?>
</div>

<div class="halaman">
  <p>Halaman : </p>
    <?php for ($i=1; $i <= $jmlHalaman ; $i++) : ?>
      <?php if ( $i == $halamanYangAktif ) : ?>
        <a class="indHalaman" style="background-color: #353535; font-weight: bold;" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
      <?php else : ?>
        <a class="indHalaman" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
      <?php endif; ?>
    <?php endfor; ?>
</div>


<div class="tombol" style="margin-top: 80px">
        <a href="tambahdata.php"><button class="tombolubah" type="submit" name="tambahdata"><i class="fas fa-user-plus"></i> Tambahkan Data</button></a>

        


</div>

<div width="100%">
   <p class="textcentered" style="margin: 10px 0px 20px 0px">Copyright <i class="far fa-copyright"> 2018 | Rief - Q | </i> 16.51.0010</p>
</div>




<script src="script.js"></script>
</body>
</html>
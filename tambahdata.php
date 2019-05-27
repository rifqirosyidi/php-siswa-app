<?php 

session_start();

if (!isset($_SESSION["login"])){
  header("Location: login.php");
}

require 'functions.php';

if (isset($_POST["submit"])) {

  if( tambahDataSiswa($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil Ditambahkan');
            document.location.href = 'siswa.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal Ditambahkan');
            document.location.href = 'tambahdata.php';
          </script>";
  }

}

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
  <script type="text/javascript" src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="jquery-ui-1.12.1/jquery-ui.min.css">
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

<div class="col-md-9 changeColor" >

<div class="headertitle" style="margin-bottom: 30px;"><i class="fas fa-user-plus" style="padding-right: 30px"></i>Tambahkan Data</div>



<div class="row" style="margin: 0; ">

   <div class="col-lg-6 col-md-12">

      <form action="" method="post" enctype="multipart/form-data">
        <ul>
          <li>
            <label class="labelform" for="nis">NIS</label> :
            <input type="text" name="nis" id="nis" required>
          </li>

          <li>
            <label class="labelform" for="nama">Nama</label> :
            <input type="text" name="nama_lengkap" id="nama" required>
          </li>

          <li>
            <label class="labelform" for="kelas">Kelas</label> :
              <select name="kelas" id="kelas">
                <option value="X"> X </option>
                <option value="XI"> XI </option>
                <option value="XII"> XII </option>
              </select>
          </li>

          <li>
            <label class="labelform" for="jurusan">Jurusan</label> :
            <input type="radio" name="jurusan" id="jurusan" value="IPA" checked> IPA
            <input type="radio" name="jurusan" id="jurusan" value="Agama" > Agama
          </li>

          <li>
            <label class="labelform" for="email">Email</label> :
            <input type="text" name="email" id="email">
          </li>

          <li>
            <label class="labelform" for="tempatLahir">Tempat Lahir</label> :
            <input type="text" name="tempat_lahir" id="tempatLahir" required>
          </li>

          <li>
            <label class="labelform" for="tanggalLahir">Tanggal Lahir</label> :
            <input type="text" name="tanggal_lahir" id="tanggalLahir" required>
          </li>

          <li>
            <label class="labelform" for="jenisKelamin">Jenis Kelamin</label> :
            <input type="radio" name="jenis_kelamin" id="jenisKelamin" value="Laki - Laki" checked> Laki - Laki
            <input type="radio" name="jenis_kelamin" id="jenisKelamin" value="Perempuan"> Perempuan
          </li>

          <li>
            <label class="labelform" for="noTelp">No Telepon</label> :
            <input type="text" name="no_telepon" id="noTelp">
          </li>

          <li>
            <label class="labelform" for="alamat">Alamat</label> :
            <input type="text" name="alamat" id="alamat" required>
          </li>

          <li>
            <label class="labelform" for="foto">Foto</label> :
            <input type="file" name="foto" id="foto">
            <br>
          </li>

          <li>
            <button type="submit" name="submit" class="tombolubah" width="200px"><i class="fas fa-user-plus"></i> Tambahkan Data</button>
          </li>
        </ul>
      </form>

   </div>

   <div class="col-xs-12 col-lg-6" style="position: relative; height: 200px"><i class="fas fa-user-plus iconicLogo"></i></div>
</div>


<div width="100%">
   <p class="textcentered" style="margin: 100px 0px 20px 0px">Copyright <i class="far fa-copyright"> 2018 | Rief - Q | </i> 16.51.0010</p>
</div>



</div>

<script>
  $(document).ready(function(){

    $('#tanggalLahir').datepicker({
      dateFormat: 'dd MM yy',
      changeMonth: true,
      changeYear: true
    });
  });
</script>

<script src="script.js"></script>
</body>
</html>
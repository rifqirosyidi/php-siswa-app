<?php 
session_start();

if (!isset($_SESSION["login"])){
  header("Location: login.php");
}


require 'functions.php';

$jmlSiswaKelas1 = count( query("SELECT * FROM siswa WHERE kelas = '1' ") );
$jmlSiswaKelas2 = count( query("SELECT * FROM siswa WHERE kelas = '2' ") );
$jmlSiswaKelas3 = count( query("SELECT * FROM siswa WHERE kelas = '3' ") );

$jmlSiswaJurusanIPA = count( query("SELECT * FROM siswa WHERE jurusan = 'IPA' ") );
$jmlSiswaJurusanAgama = count( query("SELECT * FROM siswa WHERE jurusan = 'Agama' ") );


$jmlSiswaKelas1IPA = count( query("SELECT * FROM siswa WHERE kelas = '1' AND jurusan = 'IPA' ") );
$jmlSiswaKelas1Agama = count( query("SELECT * FROM siswa WHERE kelas = '1' AND jurusan = 'Agama' ") );

$jmlSiswaKelas2IPA = count( query("SELECT * FROM siswa WHERE kelas = '2' AND jurusan = 'IPA' ") );
$jmlSiswaKelas2Agama = count( query("SELECT * FROM siswa WHERE kelas = '2' AND jurusan = 'Agama' ") );

$jmlSiswaKelas3IPA = count( query("SELECT * FROM siswa WHERE kelas = '3' AND jurusan = 'IPA' ") );
$jmlSiswaKelas3Agama = count( query("SELECT * FROM siswa WHERE kelas = '3' AND jurusan = 'Agama' ") );

if (isset($_POST["searchBtn"])) {
  echo "<script>
          alert('Pencarian Data Tidak Dapat Dilakukan Pada Halaman Ini');
          document.location.href = 'index.php';
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
              <!-- show bar when responsive -->
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


<div class="col-md-9 greyColor">

   <div class="headertitle"><i class="fas fa-home" style="padding-right: 30px"></i>Statistik</div>


   <div>
      <div class="col-md-4 try a1" style="text-align:center;">
        <div class="bgwhite">
            <div class="col-xs-4 kotakStatistik" style="background-color: black;"><i class="fas fa-users homeic"></i></div>
            <div class="col-xs-8" style="background-color: white">
               <div style="display: block; height: 20px">Siswa Kelas I</div>
               <div class="jmlData"><?php echo $jmlSiswaKelas1; ?></div>
               <div style="display: block; height: 20px">Siswa</div>
            </div>
          </div>
      </div>

      <div class="col-md-4 try a2" style="text-align:center;">
        <div class="bgwhite">
            <div class="col-xs-4 kotakStatistik" style="background-color: black;"><i class="fas fa-users homeic"></i></div>
            <div class="col-xs-8" style="background-color: white">
               <div style="display: block; height: 20px">Siswa Kelas II</div>
               <div class="jmlData"><?php echo $jmlSiswaKelas2; ?></div>
               <div style="display: block; height: 20px">Siswa</div>
            </div>
          </div>
      </div>

      <div class="col-md-4 try a3" style="text-align:center;">
        <div class="bgwhite">
            <div class="col-xs-4 kotakStatistik" style="background-color: black;"><i class="fas fa-users homeic"></i></div>
            <div class="col-xs-8" style="background-color: white">
               <div style="display: block; height: 20px">Siswa Kelas III</div>
               <div class="jmlData"><?php echo $jmlSiswaKelas3; ?></div>
               <div style="display: block; height: 20px">Siswa</div>
            </div>
          </div>
      </div>
   </div>
  
   <div>
      <div class="col-md-6 try a1" style="text-align:center;">
        <div class="bgwhite">
            <div class="col-xs-4 kotakStatistik" style="background-color: black;"><i class="fas fa-users homeic"></i></div>
            <div class="col-xs-8" style="background-color: white">
               <div style="display: block; height: 20px">Siswa Jurusan IPA</div>
               <div class="jmlData"><?php echo $jmlSiswaJurusanIPA; ?></div>
               <div style="display: block; height: 20px">Siswa</div>
            </div>
          </div>
      </div>

      <div class="col-md-6 try a3" style="text-align:center;">
        <div class="bgwhite">
            <div class="col-xs-4 kotakStatistik" style="background-color: black;"><i class="fas fa-users homeic"></i></div>
            <div class="col-xs-8" style="background-color: white">
               <div style="display: block; height: 20px">Siswa Jurusan Agama</div>
               <div class="jmlData"><?php echo $jmlSiswaJurusanAgama; ?></div>
               <div style="display: block; height: 20px">Siswa</div>
            </div>
          </div>
      </div>
   </div>

   <div>
      <div class="col-md-6 try a1" style="text-align:center;">
        <div class="bgwhite">
            <div class="col-xs-4 kotakStatistik" style="background-color: blue;"><i class="fas fa-users homeic"></i></div>
            <div class="col-xs-8" style="background-color: white">
               <div style="display: block; height: 20px">Siswa Kelas I - IPA</div>
               <div class="jmlData"><?php echo $jmlSiswaKelas1IPA; ?></div>
               <div style="display: block; height: 20px">Siswa</div>
            </div>
          </div>
      </div>

      <div class="col-md-6 try a3" style="text-align:center;">
        <div class="bgwhite">
            <div class="col-xs-4 kotakStatistik" style="background-color: blue;"><i class="fas fa-users homeic"></i></div>
            <div class="col-xs-8" style="background-color: white">
               <div style="display: block; height: 20px">Siswa Kelas I Agama</div>
               <div class="jmlData"><?php echo $jmlSiswaKelas1Agama; ?></div>
               <div style="display: block; height: 20px">Siswa</div>
            </div>
          </div>
      </div>
   </div>

   <div>
      <div class="col-md-6 try a1" style="text-align:center;">
        <div class="bgwhite">
            <div class="col-xs-4 kotakStatistik" style="background-color: blue;"><i class="fas fa-users homeic"></i></div>
            <div class="col-xs-8" style="background-color: white">
               <div style="display: block; height: 20px">Siswa Kelas II - IPA</div>
               <div class="jmlData"><?php echo $jmlSiswaKelas2IPA; ?></div>
               <div style="display: block; height: 20px">Siswa</div>
            </div>
          </div>
      </div>

      <div class="col-md-6 try a3" style="text-align:center;">
        <div class="bgwhite">
            <div class="col-xs-4 kotakStatistik" style="background-color: blue;"><i class="fas fa-users homeic"></i></div>
            <div class="col-xs-8" style="background-color: white">
               <div style="display: block; height: 20px">Siswa Kelas II Agama</div>
               <div class="jmlData"><?php echo $jmlSiswaKelas2Agama; ?></div>
               <div style="display: block; height: 20px">Siswa</div>
            </div>
          </div>
      </div>
   </div>

   <div>
      <div class="col-md-6 try a1" style="text-align:center;">
        <div class="bgwhite">
            <div class="col-xs-4 kotakStatistik" style="background-color: blue;"><i class="fas fa-users homeic"></i></div>
            <div class="col-xs-8" style="background-color: white">
               <div style="display: block; height: 20px">Siswa Kelas III - IPA</div>
               <div class="jmlData"><?php echo $jmlSiswaKelas3IPA; ?></div>
               <div style="display: block; height: 20px">Siswa</div>
            </div>
          </div>
      </div>

      <div class="col-md-6 try a3" style="text-align:center;">
        <div class="bgwhite">
            <div class="col-xs-4 kotakStatistik" style="background-color: blue;"><i class="fas fa-users homeic"></i></div>
            <div class="col-xs-8" style="background-color: white">
               <div style="display: block; height: 20px">Siswa Kelas III Agama</div>
               <div class="jmlData"><?php echo $jmlSiswaKelas3Agama; ?></div>
               <div style="display: block; height: 20px">Siswa</div>
            </div>
          </div>
      </div>
   </div>


   <div width="100%">
   <p class="textcentered relatif" style="margin: 10px 0px 20px 0px; top: 20px">Copyright <i class="far fa-copyright"> 2018 | Rief - Q | </i> 16.51.0010</p>
</div>
   
</div>


<script src="script.js"></script>
</body>
</html>
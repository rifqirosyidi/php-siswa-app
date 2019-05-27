<?php 
session_start();

if (!isset($_SESSION["login"])){
  header("Location: login.php");
}

require 'functions.php';

$id = $_GET["id"];

$siswa = query("SELECT * FROM siswa WHERE id_siswa = $id")[0];

if (isset($_POST["submit"])) {

?>

    <?php if( ubah($_POST) > 0) : ?>

              <script>
                alert('Data Berhasil Diubah');
                document.location.href = 'siswa.php';
              </script>

    <?php elseif ( ubah($_POST) == 0 ) :  ?>{

              <script>
                alert('Data Tidak Ada Yang Diubah');
                document.location.href = 'siswa.php';
              </script>

    <?php else : echo mysqli_error($conn); ?>

              <script>
                alert('Data Gagal Diubah');
                document.location.href = 'siswa.php';
              </script>
    <?php endif ?>

<?php 

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

<div class="col-md-9 changeColor">

<div class="headertitle" style="margin-bottom: 30px"><i class="fas fa-user-edit" style="padding-right: 30px"></i>Data Siswa - Ubah Data</div>



<div class="row" style="margin: 0; ">

   <div class="col-md-6">

      <form action="" method="post" enctype="multipart/form-data">
      <input type="hidden" name="id_siswa" value="<?php echo $siswa["id_siswa"]; ?>">
      <input type="hidden" name="foto_lama" value="<?php echo $siswa["foto"]; ?>">

        <ul>
          <li>
            <label class="labelform" for="foto">Foto</label> :

            <img width="40%" height="150px" style="object-fit:cover;" src="photo/<?php echo $siswa["foto"]; ?>">
            <input type="file" name="foto" id="foto">
            <br>
          </li>

          <li>
            <label class="labelform" for="nis">NIS</label> :
            <input type="text" name="nis" id="nis" value="<?php echo $siswa["nis"]; ?>"required>
          </li>

          <li>
            <label class="labelform" for="nama">Nama</label> :
            <input type="text" name="nama_lengkap" id="nama" value="<?php echo $siswa["nama_lengkap"]; ?>" required>
          </li>

          <li>
            <label class="labelform" for="kelas">Kelas</label> :
              <select name="kelas" id="kelas">
                <option value="X" <?php if ($siswa["kelas"] == 1) { echo "selected"; }?> > X </option>
                <option value="XI" <?php if ($siswa["kelas"] == 2) { echo "selected"; }?> > XI </option>
                <option value="XII" <?php if ($siswa["kelas"] == 3) { echo "selected"; }?> > XII </option>
              </select>
          </li>

          <li>
            <label class="labelform" for="jurusan">Jurusan</label> :
            <?php $jurusansiswa = $siswa["jurusan"]; ?>
            <?php if ($jurusansiswa == "IPA") : ?>
              <input type="radio" name="jurusan" id="jurusan" value="IPA" checked> IPA
              <input type="radio" name="jurusan" id="jurusan" value="Agama" > Agama
            <?php else : ?>
              <input type="radio" name="jurusan" id="jurusan" value="IPA" > IPA
              <input type="radio" name="jurusan" id="jurusan" value="Agama" checked> Agama
            <?php endif; ?>
          </li>

          <li>
            <label class="labelform" for="email">Email</label> :
            <input type="text" name="email" id="email" value="<?php echo $siswa["email"]; ?>">
          </li>

          <li>
            <label class="labelform" for="tempatLahir">Tempat Lahir</label> :
            <input type="text" name="tempat_lahir" id="tempatLahir" value="<?php echo $siswa["tempat_lahir"]; ?>" required>
          </li>

          <li>
            <label class="labelform" for="tanggalLahir">Tanggal Lahir</label> :
            <input type="text" name="tanggal_lahir" id="tanggalLahir" value="<?php echo $siswa["tanggal_lahir"]; ?>" required>
          </li>

          <li>
            <label class="labelform" for="jenisKelamin">Jenis Kelamin</label> :
            <?php $jeniskelaminsiswa = $siswa["jenis_kelamin"]; ?>

            <?php if ($jeniskelaminsiswa == "Laki - Laki") : ?>
              <input type="radio" name="jenis_kelamin" id="jenisKelamin" value="Laki - Laki" checked> Laki - Laki
              <input type="radio" name="jenis_kelamin" id="jenisKelamin" value="Perempuan"> Perempuan
            <?php else : ?>
              <input type="radio" name="jenis_kelamin" id="jenisKelamin" value="Laki - Laki" > Laki - Laki
              <input type="radio" name="jenis_kelamin" id="jenisKelamin" value="Perempuan" checked> Perempuan
            <?php endif; ?>

          </li>

          <li>
            <label class="labelform" for="noTelp">No Telepon</label> :
            <input type="text" name="no_telepon" id="noTelp" value="<?php echo $siswa["no_telepon"]; ?>">
          </li>

          <li>
            <label class="labelform" for="alamat">Alamat</label> :
            <input type="text" name="alamat" id="alamat" value="<?php echo $siswa["alamat"]; ?>"required>
          </li><br>

          <li>
            <button type="submit" name="submit" class="tombolubah" width="200px"><i class="fas fa-user-plus"></i> Ubah Data</button>
          </li>
        </ul>
      </form>

   </div>

   <div class="col-md-6" style="position: relative; height: 200px"><i class="fas fa-user-edit iconicLogo"></i></div>
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
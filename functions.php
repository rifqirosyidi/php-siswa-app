<?php 

$server = "localhost";
$user = "root";
$password = "";
$database = "mywebdatabase";

$conn = mysqli_connect($server, $user, $password, $database);


function query($query) {
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function tambahDataSiswa($data) {
	global $conn;

	$nis = $data["nis"];
	$nama_lengkap = $data["nama_lengkap"];
	$kelas = $data["kelas"];

	if($kelas == 'X'){
		$kelas = 1; 
	} elseif ($kelas == 'XI'){
		$kelas = 2;
	} else {
		$kelas = 3;
	}

	$jurusan = $data["jurusan"];
	$email = $data["email"];
	$tempat_lahir = $data["tempat_lahir"];
	$tanggal_lahir = date('Y-m-d',strtotime($data["tanggal_lahir"]));
	$jenis_kelamin = $data["jenis_kelamin"];
	$no_telepon = $data["no_telepon"];
	$alamat = $data["alamat"];

	$foto = upload();

	if ( $foto === false ){
		return false;
	}

	 $query = "INSERT INTO siswa 
               VALUES
             ('', '$nis', '$nama_lengkap',  '$jurusan', '$kelas', '$email', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$no_telepon', '$alamat', '$foto')
             ";

   mysqli_query($conn, $query);

   return mysqli_affected_rows($conn);
}

function upload(){
	$namaFile = $_FILES["foto"]["name"];
	$ukuranFile = $_FILES["foto"]["size"];
	$error = $_FILES["foto"]["error"];
	$tmp = $_FILES["foto"]["tmp_name"];


	if ( $error === 4 ){
		echo "<script>
			alert('Silahkan Pilih Gambar Lebih Dulu');
		</script>";

		return false; 
	}

	$ekstensiValid  = ['jpg', 'jpeg', 'png'];
	$ekstensiFoto = explode('.', $namaFile);
				// explode untuk memcah string rifqi.jpg menjadi ['rifqi', 'jpg']

	$ekstensiFoto = strtolower(end($ekstensiFoto)); 
				// Memecah File 
				// strtolower() untuk mengatasi penulisan "rifqi.JPG"
				// end untuk mengambil ekstensi paling akhir dan menghindari penulisan "rifqi.rosyidi.jpg"
				

	if ( !in_array( $ekstensiFoto, $ekstensiValid) ) {
		echo "<script>
				alert('Yang Anda Upload Bukan Gambar');
			</script>";

		return false;
	}

	if ( $ukuranFile >  5000000 ) { //satuan bit = 5mb
		echo "<script>
				alert('Ukuran Gambar Yang Anda Masukkan Terlalu Besar');
			</script>";

		return false;
	}

	// Menghidari Nama File Yang Sama
	$namaFileBaru = uniqid();
	$namaFileBaru .= '.';
	$namaFileBaru .= $ekstensiFoto;


	// Gambar Siap Di Upload

	move_uploaded_file($tmp, 'photo/'.$namaFileBaru); //direktori dari file sekarang
	return $namaFileBaru;

}


function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM siswa WHERE id_siswa = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data["id_siswa"];
	$nis = $data["nis"];
	$nama_lengkap = $data["nama_lengkap"];
	$kelas = $data["kelas"];

	if($kelas == 'X') {
		$kelas = 1; 
	} elseif ($kelas == 'XI'){
		$kelas = 2;
	} else {
		$kelas = 3;
	}

	$jurusan = $data["jurusan"];
	$email = $data["email"];
	$tempat_lahir = $data["tempat_lahir"];
	$tanggal_lahir = $data["tanggal_lahir"]; 
	$jenis_kelamin = $data["jenis_kelamin"];
	$no_telepon = $data["no_telepon"];
	$alamat = $data["alamat"];

	$foto_lama = $data["foto_lama"];

	// apakah user upload foto baru
	if( $_FILES["foto"]["error"] == 4 ) { // error == 4 berarti Tidak Ada Foto Yang Di Upload
		$foto = $foto_lama; 			  // gunakan foto lama
	} else {
		$foto = upload();
	}

	$query = "UPDATE siswa SET
	               nis = '$nis',
	               nama_lengkap = '$nama_lengkap',
	               kelas = '$kelas',
	               jurusan = '$jurusan',
	               email = '$email',
	               tempat_lahir = '$tempat_lahir',
	               tanggal_lahir = '$tanggal_lahir',
	               jenis_kelamin = '$jenis_kelamin',
	               no_telepon = '$no_telepon',
	               alamat = '$alamat',
	               foto = '$foto'
	            WHERE id_siswa = $id
	        ";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}

function pencarian($searchKey){
	$query = "SELECT * FROM siswa 
				WHERE 
			nis LIKE '%$searchKey%' OR
			nama_lengkap LIKE '%$searchKey%' OR
			jurusan LIKE '%$searchKey%' ORDER BY nis ASC
			";

	return query($query);
}

function registrasi($data) {
	global $conn;

	$nama_depan = $data["nama_depan"];
	$nama_belakang = $data["nama_belakang"];
	$username = strtolower($data["username"]);
	$email = $data["email"];

	$password = mysqli_real_escape_string($conn, $data["password"]);
	$knfpassword = mysqli_real_escape_string($conn, $data["knfpassword"]);

	//cek nama user sudah ada atau belum di database

	$cekdatauser = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username' "); 

	if ( mysqli_fetch_assoc($cekdatauser) ) {
		echo "<script>
				alert('Username Sudah Terdaftar');
			</script>";
		return false;
	}

	if ( $password !== $knfpassword ) {
		echo "<script>
				alert('Konfirmasi Password Yang Anda Masukkan Tidak Sesuai');
			</script>";
		return false;
	}

	$query = "INSERT INTO users 
				VALUES 
			('', '$nama_depan', '$nama_belakang', '$username', '$email', '$password')

			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


?>
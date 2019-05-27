-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2018 at 05:25 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mywebdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `no_guru` int(11) NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `email_guru` varchar(30) NOT NULL,
  `mp_guru` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`no_guru`, `nama_guru`, `email_guru`, `mp_guru`) VALUES
(3021, 'Nurul Hayah, S.Pd', 'nurulaya@mail.com', 'kdm01');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(10) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(1, 'X'),
(2, 'XI'),
(3, 'XII');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama_mapel`) VALUES
(1, 'Matematika'),
(2, 'Fisika'),
(3, 'Biologi'),
(4, 'Kimia'),
(5, 'Geografi'),
(6, 'Sejarah'),
(7, 'Bahasa Indonesia'),
(8, 'Bahasa Inggris'),
(9, 'Bahasa Arab');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `kelas` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama_lengkap`, `jurusan`, `kelas`, `email`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `no_telepon`, `alamat`, `foto`) VALUES
(1, 1721001, 'Rifqi Rosyidi', 'IPA', 1, 'rief@mail.com', 'Lamongan', '1998-02-05', 'Laki - Laki', '082132195119', 'Paciran - Lamongan', '5b21bf7abcf78.jpg'),
(2, 1822001, 'Muhammad Naufal', 'Agama', 3, 'noval@mail.com', 'Lamongan', '1997-10-06', 'Laki - Laki', '082199482143', 'Paciran Lamongan', 'noval.JPG'),
(3, 1721002, 'Emi Nur Hidayati', 'IPA', 2, 'emie@mail.com', 'Lamongan', '2018-07-06', 'Perempuan', '085730098751', 'Paciran Lamongan', 'emi.JPG'),
(4, 1721006, 'M. Irfan Rizqutsani', 'IPA', 1, 'irfan@mail.com', 'Lamongan', '1998-06-05', 'Laki - Laki', '081276533231', 'Paciran Lamongan', '5b234f09d7893.jpg'),
(5, 1722002, 'Alifun Akbar', 'Agama', 1, 'alief@mail.com', 'Lamongan', '1998-07-15', 'Laki - Laki', '082184769856', 'Paciran, Lamongan', 'alif.JPG'),
(6, 1721003, 'M. Firdausy Nuzula', 'IPA', 1, 'nfirdaus@mail.com', 'Kuala Lumpur', '1998-11-18', 'Laki - Laki', '085730223478', 'Paciran, Lamongan', '5b234ee91df6c.jpg'),
(7, 1722004, 'Fatihatul Ikmala', 'Agama', 1, 'mala@mail.com', 'Lamongan', '1997-12-02', 'Perempuan', '089765889879', 'Paciran Lamongan', 'mala.JPG'),
(8, 1721005, 'Syahrun Ni\'mah', 'IPA', 1, 'syahrun@mail.com', 'Paciran Lamongan', '1998-06-24', 'Perempuan', '082135672345', 'Paciran Lamongan', 'ninik.JPG'),
(9, 1821001, 'Fakhri Taqiudin', 'IPA', 2, 'fakhri@mail.com', 'Lamongan', '1997-12-02', 'Laki - Laki', '089666754376', 'Paciran Lamongan', 'fahri.JPG'),
(10, 1822002, 'Febri Mashduqi', 'Agama', 2, 'febri@mail.com', 'Lamongan', '1997-05-03', 'Laki - Laki', '081345788891', 'Paciran Lamongan', 'febri.JPG'),
(11, 1722003, 'Firdaus', 'Agama', 1, 'firdaus@mail.com', 'Surabaya', '1998-07-08', 'Laki - Laki', '082173000879', 'Padeg, Sumur Gayam, Paciran Lamongan', '5b234e3f24f8f.jpg'),
(12, 1821003, 'Fredi Eko', 'IPA', 2, 'fred@mail.com', 'Lamongan', '1997-11-09', 'Laki - Laki', '081266667786', 'Blimbing, Paciran Lamongan', '5b234e4f31378.jpg'),
(13, 1822006, 'M. Toyyibun Najri', 'Agama', 2, 'najer@mail.com', 'Lamongan', '1996-10-24', 'Laki - Laki', '089273009877', 'Paciran Lamongan', '5b234e715892a.jpg'),
(14, 1721010, 'Santi Yuli Handayani', 'IPA', 1, 'santi@mail.com', 'Lamongan', '1998-02-02', 'Perempuan', '082133987890', 'Paciran Lamongan', 'santi.JPG'),
(15, 1922003, 'Ellis Dianatul', 'Agama', 3, 'yuniell@mail.com', 'Lamongan', '1998-09-04', 'Perempuan', '082277739876', 'Paciran Lamongan', '5b234e852796a.jpg'),
(16, 1721009, 'Yusni Amaliyah', 'IPA', 1, 'yusni@mail.com', 'Lamongan', '1998-12-10', 'Perempuan', '082273416669', 'Paciran Lamongan', 'yusni.JPG'),
(17, 1922001, 'Ulfa A', 'Agama', 3, 'ulf@mail.com', 'Surabaya', '1996-10-25', 'Perempuan', '082132105210', 'Paciran Lamongan', 'ulfa.JPG'),
(18, 1821002, 'Agung Prasetyo', 'IPA', 2, 'agung@mail.com', 'Probolinggo', '1997-11-26', 'Laki - Laki', '082373000021', 'Probolinggo', 'agung.jpeg'),
(19, 1822003, 'Arfani Reksa', 'Agama', 2, 'arfan@mail.com', 'Malang', '0000-00-00', 'Laki - Laki', '085732222014', 'Blimbing, Malang', 'arfani.jpeg'),
(20, 1722001, 'Deni Ega', 'Agama', 1, 'denie@mail.com', 'Malang', '1998-04-07', 'Laki - Laki', '085732245885', 'Blimbing, Malang', 'ega.jpeg'),
(21, 1721008, 'M. Nadhiful Qolbi', 'IPA', 1, 'iful@mail.com', 'Lamogan', '1998-08-14', 'Laki - Laki', '089322567481', 'Paciran Lamongan', 'iful.jpeg'),
(22, 1922002, 'M. Viand Nur Hidayat', 'Agama', 3, 'vian@mail.com', 'Malang', '1996-05-05', 'Laki - Laki', '082373000321', 'Malang', 'viand.jpeg'),
(23, 1921001, 'Hidayat Hukung', 'IPA', 3, 'hidayat@mail.com', 'Malang', '1996-10-08', 'Laki - Laki', '089766564764', 'Malang', 'hidayat.jpeg'),
(24, 1721004, 'Inayah', 'IPA', 1, 'inay@mail.com', 'Lamongan', '1998-07-05', 'Perempuan', '089730696721', 'Paciran Lamongan', 'ina.JPG'),
(25, 1721007, 'Silvi Khoirun Nisa', 'IPA', 1, 'sivie@mail.com', 'Lamongan', '1998-07-08', 'Perempuan', '089818556777', 'Paciran Lamongan', 'silvi.JPG'),
(26, 1822004, 'Ari Setya Audanam', 'Agama', 2, 'arie@mail.com', 'Malang', '1998-11-06', 'Laki - Laki', '088765543323', 'Malang', 'ari.jpeg'),
(27, 1822005, 'M Choiru Rijal', 'Agama', 2, 'rijal@mail.com', 'Malang', '1997-05-09', 'Laki - Laki', '088762837776', 'Malang', 'rijal.jpeg'),
(28, 1922004, 'Hera Vernando', 'Agama', 3, 'nando@mail.com', 'Nganjuk', '1996-05-09', 'Laki - Laki', '081233345999', 'Nganjuk', 'nando.jpeg'),
(31, 1721011, 'M. Salman Affandi', 'Agama', 1, 'fand1@mail.com', 'Lamongan', '1998-07-16', 'Laki - Laki', '086431937171', 'Paciran Lamongan', '5b23505fa5749.jpg'),
(32, 1721012, 'Risydatur Ridla', 'IPA', 1, 'risyda@mail.com', 'Lamongan', '1998-06-05', 'Laki - Laki', '084817971717', 'Paciran Lamongan', '5b235101224a0.jpg'),
(33, 1721013, 'Nunung', 'IPA', 1, 'wati@mail.com', 'Lamongan ', '1997-07-24', 'Laki - Laki', '086123498841', 'Paciran Lamongan', '5b2351bebc2ab.jpg'),
(34, 182134, 'Arin', 'IPA', 1, 'arin@mail.com', 'Malang', '2018-07-02', 'Laki - Laki', '8401284810', 'Tumpang', '5b434579acfaf.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_depan` varchar(20) NOT NULL,
  `nama_belakang` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_depan`, `nama_belakang`, `username`, `email`, `password`) VALUES
(5, 'Rifqi', 'Rosyidi', 'rifqi', 'rifq@mail.com', '123'),
(6, 'username', 'admin', 'admin', 'admin@mail.com', '123'),
(7, 'wow', 'kk', 'hh', 'jj', 'opop'),
(8, 'afkf', 'fakj', 'rifqi12', 'rif@mail.comj', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`no_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `ind_kelas` (`kelas`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `no_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3022;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_ibfk_1` FOREIGN KEY (`kelas`) REFERENCES `kelas` (`id_kelas`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

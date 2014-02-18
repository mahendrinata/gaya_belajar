SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `anjuran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `karakter_id` int(255) NOT NULL,
  `anjuran` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `karakter_id` (`karakter_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jawaban` text NOT NULL,
  `pertanyaan_id` int(11) NOT NULL,
  `karakter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pertanyaan_id` (`pertanyaan_id`),
  KEY `karakter_id` (`karakter_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

INSERT INTO `jawaban` (`id`, `jawaban`, `pertanyaan_id`, `karakter_id`) VALUES
(1, 'Cepat', 1, 2),
(2, 'Sedang', 1, 1),
(3, 'Lambat', 1, 3),
(9, 'Kelihatan bagus', 5, 2),
(10, 'Rasanya enak', 5, 3),
(11, 'kedengarannya bagus', 5, 1),
(12, 'Dilihat', 6, 2),
(13, 'Dilakukan', 6, 3),
(14, 'Didengar', 6, 1),
(15, 'Kejadian, emosi dan peristiwa', 7, 3),
(16, 'Orang, lingkungan dan wajah', 7, 2),
(17, 'Suara dan nama', 7, 1),
(18, 'Lukisan', 8, 2),
(19, 'Tarian', 8, 3),
(20, 'Musik', 8, 1),
(21, 'Wajah dan pakaian yang dikenakan', 9, 2),
(22, 'Prilaku dan gerak geriknya', 9, 3),
(23, 'Pembicaraannya', 9, 1),
(24, 'Mengulangi kata-kata dengan suara keras', 10, 1),
(25, 'Menulis', 10, 2),
(26, 'Berjalan', 10, 3);

CREATE TABLE IF NOT EXISTS `karakter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_karakter` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

INSERT INTO `karakter` (`id`, `nama_karakter`, `keterangan`) VALUES
(1, 'Auditory', 'Orang yang memiliki gaya belajar Auditory, biasanya belajar dengan mengandalkan pendengaran untuk bisa memahami sekaligus mengingatnya informasi yang ia terima. Karakteristik model belajar ini benar-benar menempatkan pendengaran sebagai alat utama untuk menyerap informasi atau pengetahuan. Artinya, untuk bisa mengingat dan memahami informasi tertentu, yang bersangkutan haruslah mendengarnya lebih dulu. Mereka yang memiliki gaya belajar ini umumnya susah menyerap secara langsung informasi dalam bentuk tulisan, selain memiliki kesulitan menulis ataupun membaca.'),
(2, 'Visual', 'Orang yang memiliki gaya belajar Visual, adalah orang yang belajarnya lebih menitikberatkan ketajaman penglihatan. Artinya, bukti-bukti konkret harus diperlihatkan terlebih dahulu agar mereka paham. Ciri-ciri orang yang memiliki gaya belajar visual adalah kebutuhan yang tinggi untuk melihat dan menangkap informasi secara visual sebelum mereka memahaminya. Konkretnya, yang bersangkutan lebih mudah menangkap pelajaran lewat materi bergambar. Selain itu, mereka memiliki kepekaan yang kuat terhadap warna, disamping mempunyai pemahaman yang cukup terhadap masalah artistik. Hanya saja biasanya mereka memiliki kendala untuk berdialog secara langsung karena terlalu reaktif terhadap suara, sehingga sulit mengikuti anjuran secara lisan dan sering salah menginterpretasikan kata atau ucapan.'),
(3, 'Kinestetic', 'Orang yang memiliki gaya belajar Kinesthetic, mengharuskan individu yang bersangkutan menyentuh sesuatu yang memberikan informasi tertentu agar ia bisa mengingatnya. Tentu saja ada beberapa karakteristik model belajar seperti ini yang tak semua orang bisa melakukannya. Karakter pertama adalah menempatkan tangan sebagai alat penerima informasi utama agar bisa terus mengingatnya. Hanya dengan memegangnya saja, seseorang yang memiliki gaya belajar ini bisa menyerap informasi tanpa harus membaca penjelasannya. Karakter berikutnya dicontohkan sebagai orang yang tak tahan duduk manis berlama-lama mendengarkan penyampaian informasi. Tak heran kalau individu yang memiliki gaya belajar ini merasa bisa belajar lebih baik kalau prosesnya disertai kegiatan fisik. Kelebihannya, mereka memiliki kemampuan mengkoordinasikan sebuah tim disamping kemampuan mengendalikan gerak tubuh (athletic ability). Tak jarang, orang yang cenderung memiliki karakter ini lebih mudah menyerap dan memahami informasi dengan cara menjiplak gambar atau kata untuk kemudian belajar mengucapkannya atau memahami fakta.');

CREATE TABLE IF NOT EXISTS `konsultasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `jawaban_id` int(11) NOT NULL,
  `pengguna_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jawaban_id` (`jawaban_id`,`pengguna_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `pengguna` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci,
  `agama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kelas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `asal_sekolah` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `agama`, `kelas`, `asal_sekolah`, `level`, `password`) VALUES
(1, 'admin', 'Administrator', 'Merauke', '1980-02-01', 'P', 'Merauke', 'Islam', '', '', 'ADMIN', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'imam', 'Imam Santoso', '', '0000-00-00', 'L', '', '', '', '', 'PAKAR', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'siswa', 'Siswa', '', '0000-00-00', 'L', '', '', 'X 1', 'SMP 1 ', 'SISWA', '827ccb0eea8a706c4c34a16891f84e7b');

CREATE TABLE IF NOT EXISTS `pertanyaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

INSERT INTO `pertanyaan` (`id`, `pertanyaan`) VALUES
(1, 'Anda berbicara dengan?'),
(5, 'Anda sering mengatakan sesuatu yang?'),
(6, 'Anda mudah mengingat hal yang?'),
(7, 'Anda lebih terkesan pada?'),
(8, 'Anda sangat menyukai?'),
(9, 'Anda cenderung memperhatikan orang pada?'),
(10, 'Anda senang menghafal sesuatu dengan?');

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `anjuran` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `karakter_id` int(255) NOT NULL,
  `anjuran` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `karakter_id` (`karakter_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

INSERT INTO `anjuran` (`id`, `karakter_id`, `anjuran`) VALUES
(2, 1, 'Jika bacaan yang penuh tulisan membosankan buat kamu, ucapkanlah apa yang sedang kamu baca sehingga bisa terdengar secara pribadi maka kamu butuh keheningan dalam hal ini'),
(3, 1, 'Cobalah tidak langsung mencatat apa yang kamu dengar, tapi dengarkan dulu dengan seksama baru dicatat'),
(4, 3, 'Banyaklah menyalurkan energi melalui gerakan tubuh seperti olahraga senam'),
(5, 2, 'Isilah waktu luang mu dengan membaca buku kesukaan dan majalah-majalah yang membuat matamu berwisata'),
(6, 2, 'Jika kamu terlihat sesuatu yang jelek atau berantakan, jangan terlalu diperhatikan karena bisa menggangu suasana hatimu'),
(7, 3, 'Isilah waktu luang dengan dengan aktivitas di luar yang menguji kekuatan fisik'),
(8, 2, 'Kamu harus segera mencatat segala informasi yang kamu dengar, misalnya ketika bu guru menjelaskan sembarang teory'),
(9, 1, 'Ucapkanlah apa yang kamu ingin hafal atau buatlah ritme lagu dalam menghafal rumus'),
(10, 1, 'Jika bacaan penuh tulisan membosankan buat kamu, cobalah warnai beberapa kalimat penting dalan bacaan tersebut degan rapi'),
(11, 2, 'Dalam menghafal sesuatu, buatlah coretan setiap kali kamu menghafal sesuatu tersebut, sehingga kamu ingat'),
(12, 3, 'Agar bisa berlama-lama dalam menghafal, tetaplah biasakan menghafal sambil berjalan selama tidak menganggu orang lain'),
(13, 3, 'Jika dalam belajar di ruang kelas yang menuntut untuk berdiam lama, agar lebih relax, kamu bisa saja menggoyangkan kaki mu, selama itu tidak menganggu orang lain'),
(14, 3, 'Di dalam merakit sesuatu(robot, mobil dan mainan lainnya) kamu cenderung langsung praktek membuatnya, namun jika kamu\r\nmengalami kegagalan, hendaklah kamu melihat diagram contoh dengan saksama'),
(15, 2, 'Ternyata kamu lebih senang melihat alur diagram dalam merakit sesuatu, ini menunjukkan kamu mempunyai sifat modalitas Visual, jadi biasanya kamu punya bakat dalam mengambar diagram'),
(16, 1, 'Kamu butuh penjelasan dari seseorang dalam merakit sesuatu seperti(robot, mobil, dan mainan lainnya)'),
(17, 1, 'Biasakanlah untuk mengucapkan kembali apa informasi yang kamu terima, tidak perlu keraskeras cukup terdengar secara pribadi sehingga kamu ingat'),
(18, 1, 'Kamu perlu mendengarkan musik kesukaan dalam belajar, agar lebih santai dan tidak mudah jenuh'),
(19, 1, 'Jika dalam belajar, kamu sambil memutar musik dan orang tua menganggap kamu tidak kosentrasi belajar maka berilah pengertian dengan baik tentang cara belajar kamu ini'),
(20, 3, 'Kamu sesekali perlu belajar di luar rumah atau luar ruangan, terutama saat belajar biologi, kamu butuh memahami lingkungan atau tanaman secara langsung');

CREATE TABLE IF NOT EXISTS `jawaban` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jawaban` text NOT NULL,
  `pertanyaan_id` int(11) NOT NULL,
  `karakter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pertanyaan_id` (`pertanyaan_id`),
  KEY `karakter_id` (`karakter_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

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
(26, 'Berjalan', 10, 3),
(27, 'Menggerakkan tangan', 11, 3),
(28, 'Menyampaikan secara lisan', 11, 1),
(29, 'Membuat coretan dikertas', 11, 2),
(30, 'Benda yang bergerak', 12, 3),
(31, 'Barang-barang berantakan disekitarnya', 12, 2),
(32, 'Suara yang berisik', 12, 1),
(33, 'Gerakan tubuh', 13, 3),
(34, 'Suara', 13, 1),
(35, 'Warna', 13, 2),
(36, 'Membayangkan sesuatu di otak', 14, 3),
(37, 'Mengucapakn berulang-ulang', 14, 1),
(38, ' Membuat coretan', 14, 2),
(39, 'Sulit kosentrasi ketika ada keributan', 15, 1),
(40, 'Sulit bisa berlama belajar jika bahan pelajaran penuh tulisan atau tidak rapi', 15, 2),
(41, 'Sulit untuk bisa duduk diam dan tenang', 15, 3),
(42, 'Cahaya', 16, 2),
(43, 'Tarian', 16, 3),
(44, 'Melodi atau nada', 16, 1),
(45, '‘Menurut yang saya lakukan’', 17, 3),
(46, '‘Menurut yang saya dengar’', 17, 1),
(47, '‘Menurut yang saya lihat’', 17, 2),
(48, 'Mengambarkan suatu object di papan tulis', 18, 2),
(49, 'Mempraktikkan dan menyentuh object yang dibicarakan', 18, 3),
(50, 'Menjelaskan dengan suara indah', 18, 1),
(51, 'Gelap', 19, 2),
(52, 'Tenang/sepi', 19, 1),
(53, 'Nyaman', 19, 3),
(54, 'Suka mendengar dialog pada saat nonton film', 20, 1),
(55, 'Suka melihat pemandang/latar bakcground pada saat nonton film', 20, 2),
(56, 'Suka mengamati acting para actor pada saat nonton film dan cenderung ingin mempraktekkannya', 20, 3),
(57, 'Suka mencoba barang/produk yang ingin dibeli', 21, 3),
(58, 'Sangat tertarik pada model produk (desain dan warna) yang akan dibeli', 21, 2),
(59, 'Mudah tertarik pada suatu produk ketika ada penjelasan baik dari penjualnya', 21, 1),
(60, 'Suka pada praktek langsung', 22, 3),
(61, 'Butuh diagram alur kerja', 22, 2),
(62, 'Ingin dijelaskan secara lisan', 22, 1),
(63, 'Sentuhan alam saat berada di alam terbuka', 23, 3),
(64, 'Indahnya pemandangan saat berada di alam terbuka', 23, 2),
(65, 'Bunyi-bunyi di sekeliling saat berada di alam terbuka', 23, 1);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

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
(2, 'imam', 'Imam Santoso', '', '1980-02-01', 'L', '', '', '', '', 'PAKAR', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'siswa', 'Siswa', '', '2000-02-01', 'L', '', '', 'X 1', 'SMP 1 ', 'SISWA', '827ccb0eea8a706c4c34a16891f84e7b');

CREATE TABLE IF NOT EXISTS `pertanyaan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pertanyaan` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

INSERT INTO `pertanyaan` (`id`, `pertanyaan`) VALUES
(1, 'Anda berbicara dengan?'),
(5, 'Anda sering mengatakan sesuatu yang?'),
(6, 'Anda mudah mengingat hal yang?'),
(7, 'Anda lebih terkesan pada?'),
(8, 'Anda sangat menyukai?'),
(9, 'Anda cenderung memperhatikan orang pada?'),
(10, 'Anda senang menghafal sesuatu dengan?'),
(11, 'Dalam berbicara menjelaskan, anda cenderung?'),
(12, 'Anda mudah terganggu dengan?'),
(13, 'Anda sangat tertarik pada?'),
(14, 'Anda menganalisa sesuatu dengan?'),
(15, 'Mana yang lebih sulit anda lakukan?'),
(16, 'Anda cenderung terkesan pada?'),
(17, 'Anda Kecenderung memulai kalimat opini dengan?'),
(18, 'Anda suka diajari oleh guru dengan cara?'),
(19, 'Anda cenderung memilih untuk tidur di kamar yang?'),
(20, 'Kegiatan mana yang paling anda sukai?'),
(21, 'Anda adalah orang yang?'),
(22, 'Pada saat merakit alat-alat elektronik, anda cenderung?'),
(23, 'Anda sangat terkesan pada?');

CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

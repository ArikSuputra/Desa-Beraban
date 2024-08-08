-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2024 at 06:08 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbberaban3`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbacara`
--

CREATE TABLE `tbacara` (
  `idacara` int(11) NOT NULL,
  `nama_acr` varchar(100) NOT NULL,
  `foto_acr` varchar(200) NOT NULL,
  `ket_acr` text NOT NULL,
  `waktu_acr` datetime NOT NULL,
  `peta_acr` varchar(500) NOT NULL,
  `linkpeta_acr` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbacara`
--

INSERT INTO `tbacara` (`idacara`, `nama_acr`, `foto_acr`, `ket_acr`, `waktu_acr`, `peta_acr`, `linkpeta_acr`) VALUES
(5, 'Tanah Lot Festival Bali', 'tanahlotfst.jpg', 'Tanah Lot Festival adalah perayaan budaya yang meriah dan spektakuler yang diadakan di sekitar situs ikonik Tanah Lot, Bali. Festival ini memadukan keindahan alam, warisan budaya, seni pertunjukan, dan nuansa spiritual yang khas pulau dewata. \r\n\r\nDilangsungkan di sekitar kompleks pura laut Tanah Lot yang megah, festival ini menampilkan pesta warna-warni dari tarian tradisional Bali, seperti Kecak, Legong, dan Barong. Pertunjukan seni ini menggambarkan cerita-cerita klasik dan mitos lokal, menciptakan suasana magis yang memukau bagi para penonton.\r\n\r\nSelain pertunjukan seni, Tanah Lot Festival juga menawarkan pengunjung pengalaman kuliner yang memikat dengan memamerkan kekayaan masakan Bali. Stalls makanan dan pedagang khas menyajikan hidangan lezat yang mencerminkan keanekaragaman kuliner pulau tersebut, dari bebek betutu hingga lawar.\r\n\r\nFestival ini juga menyediakan platform bagi para seniman lokal dan internasional untuk memamerkan karya seni mereka melalui pameran seni dan pertunjukan musik. Para pengunjung dapat menikmati suasana yang penuh semangat sambil menjelajahi karya-karya seni yang mencerminkan kekayaan budaya dan kreativitas masyarakat Bali.\r\n\r\nSelain sebagai pesta seni dan budaya, Tanah Lot Festival juga memiliki dimensi spiritual yang kuat. Ritual dan upacara keagamaan seringkali menjadi bagian integral dari acara ini, memperkuat ikatan antara seni, budaya, dan spiritualitas dalam konteks kehidupan sehari-hari masyarakat Bali.\r\n\r\nDengan latar belakang laut yang indah dan matahari terbenam yang menakjubkan di Tanah Lot, festival ini menciptakan pengalaman tak terlupakan bagi para pengunjung yang ingin merasakan keajaiban pulau Bali dalam sebuah perayaan yang menggabungkan keindahan alam, seni, dan warisan budaya.', '2024-01-10 10:43:00', '-8.620914053209228, 115.08737336501795', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbakomodasi`
--

CREATE TABLE `tbakomodasi` (
  `idakomodasi` int(11) NOT NULL,
  `nama_ako` varchar(100) NOT NULL,
  `ket_ako` varchar(500) NOT NULL,
  `foto_ako` varchar(200) NOT NULL,
  `peta_ako` varchar(500) NOT NULL,
  `linkpeta_ako` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbakomodasi`
--

INSERT INTO `tbakomodasi` (`idakomodasi`, `nama_ako`, `ket_ako`, `foto_ako`, `peta_ako`, `linkpeta_ako`) VALUES
(1, 'Villa Botanique Garden', 'Botaniquea', 'botanique.png', '-8.616872098655879, 115.10770336444524', ''),
(3, 'Annupuri Villa', 'villa', 'annupuri.png', '-8.60214033487063, 115.10771533751166', ''),
(50, 'penginapan1', 'penginapan', 'penistaan.jpg', '-8.616872098655879, 115.10770336444524', ''),
(51, 'penginapan2', 'a', 'penistaan1.jpg', '-8.616872098655879, 115.10770336444524', ''),
(52, 'penginapan3', 'b', 'penistaan2.jpg', '-8.616872098655879, 115.10770336444524', ''),
(53, 'penginapan4', 'c', 'penistaan3.jpg', '-8.616872098655879, 115.10770336444524', ''),
(54, 'penginapan5', 'd', 'penistaan4.jpg', '-8.616872098655879, 115.10770336444524', ''),
(55, 'penginapan6', 'e', 'penistaan5.jpg', '-8.616872098655879, 115.10770336444524', ''),
(56, 'penginapan7', 'f', 'penistaan6.jpg', '-8.616872098655879, 115.10770336444524', ''),
(57, 'penginapan8', 'g', 'penistaan7.jpg', '-8.616872098655879, 115.10770336444524', ''),
(58, 'penginapan9', 'h', 'penistaan8.jpg', '-8.616872098655879, 115.10770336444524', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbdettransaksi`
--

CREATE TABLE `tbdettransaksi` (
  `iddettransaksi` int(11) NOT NULL,
  `idtransaksi` int(11) DEFAULT NULL,
  `idtiket` int(11) DEFAULT NULL,
  `jumlahTiket` int(11) DEFAULT NULL,
  `hargaTiket` decimal(10,0) DEFAULT NULL,
  `subtotal` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbdettransaksi`
--

INSERT INTO `tbdettransaksi` (`iddettransaksi`, `idtransaksi`, `idtiket`, `jumlahTiket`, `hargaTiket`, `subtotal`) VALUES
(1, 1, 6, 1, '99', '99'),
(2, 3, 5, NULL, NULL, NULL),
(3, 2, 14, 2, '50', '100');

-- --------------------------------------------------------

--
-- Table structure for table `tbharga`
--

CREATE TABLE `tbharga` (
  `idharga` int(11) NOT NULL,
  `idobjekwisata` int(11) DEFAULT NULL,
  `kategoriTiket` varchar(100) DEFAULT NULL,
  `jenisTiket` varchar(60) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbharga`
--

INSERT INTO `tbharga` (`idharga`, `idobjekwisata`, `kategoriTiket`, `jenisTiket`, `harga`) VALUES
(1, 6, 'Dewasa', 'Domestik', '70000'),
(2, 3, 'Adult', 'Mancanegara', '75000'),
(3, 9, 'Child', 'Mancanegara', '50000'),
(4, 3, 'Dewasa', 'Tiket Masuk', '50000'),
(5, 6, 'Anak-anak', 'Tiket Masuk', '25000'),
(6, 9, 'Mobil', 'Tiket Parkir', '5000'),
(7, 3, 'Motor', 'Tiket Parkir', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `tbinformasiumum`
--

CREATE TABLE `tbinformasiumum` (
  `idinfoumum` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbinformasiumum`
--

INSERT INTO `tbinformasiumum` (`idinfoumum`, `judul`, `foto`, `ket`) VALUES
(3, 'Sejarah Desa Beraban', 'beraban1.png', 'Desa Beraban memiliki sejarah yang kaya dan beragam, dipengaruhi oleh peristiwa-peristiwa penting dalam perkembangan Bali. Awal mula pemukiman di pesisir pantai terjadi setelah kedatangan \"Dalem Kresna Kepakisan\" pada tahun 1380, yang diikuti oleh para Arya, para Rsi, dan pengikutnya. Pemukiman ini awalnya berlokasi di sepanjang pantai ke barat, dengan nama-nama seperti Batu Ngemped dan Batu Gang.\r\n\r\nAsal usul nama Desa Beraban terkait erat dengan pergeseran pemukiman penduduk dari pantai ke tengah. Nama \"Beraban\" berasal dari kata \"Berebehan,\" yang berasal dari sebuah kejadian di pemukiman Batu Gang yang melibatkan seorang gadis cantik. Kejadian ini mengundang bencana dan menghasilkan pendirian Pura Kali Pisang untuk menenangkan suasana.\r\n\r\nPada zaman pemerintahan Dalem Baturenggong, Ki Bendesa Beraban diangkat sebagai penguasa desa dengan tanggung jawab langsung kepada penguasa tertinggi di Gelgel. Saat Dang Hyang Dwijendra datang pada tahun 1578, ia melakukan penyucian diri di Gili Bio, yang kini dikenal sebagai Pura Tanah Lot. Dang Hyang Dwijendra juga meninggalkan keris pusaka \"Ki Baru Gajah\" yang kemudian membuktikan keampuhannya dalam pertempuran melawan musuh.\r\n\r\nPerpindahan Kerajaan Dalem dari Gelgel ke Klungkung pada tahun 1686 memengaruhi struktur politik dan kenegaraan di Bali. Desa Beraban mengalami porak-poranda saat Kerajaan Menguwi mencapai puncak kejayaan dan memporak-porandakan desa dalam ekspansinya. Setelah jatuhnya Menguwi dan terkepungnya oleh laskar Tabanan dan Badung, Desa Beraban mulai membenahi diri dengan mengaktifkan banjar-banjar di wilayahnya.\r\n\r\nStruktur desa berkembang seiring dengan waktu, dengan lahirnya beberapa banjar/dusun yang mengikuti perkembangan zaman dan era pembangunan. Nama-nama banjar ini disesuaikan dengan letak geografis, denah, dan peringatan dari peristiwa tertentu. Sebagai contoh, Banjar Ulu Desa, Banjar Gegelang, Banjar Batu Buah, Banjar Beraban, Banjar Batu Gang, Banjar Dukuh/Kukuh, Banjar Sinjuana, dan Banjar Suaka (yang kemudian menjadi Banjar Nyanyi).\r\n\r\nSejarah Desa Beraban mencerminkan perjalanan panjang dan perubahan yang dialami desa tersebut, dari awal pemukiman di pesisir pantai hingga perkembangan struktur desa dan kehidupan sosialnya seiring berjalannya waktu.\r\n\r\n\r\nDesa Beraban memiliki sejarah yang kaya dan beragam, dipengaruhi oleh peristiwa-peristiwa penting dalam perkembangan Bali. Awal mula pemukiman di pesisir pantai terjadi setelah kedatangan \"Dalem Kresna Kepakisan\" pada tahun 1380, yang diikuti oleh para Arya, para Rsi, dan pengikutnya. Pemukiman ini awalnya berlokasi di sepanjang pantai ke barat, dengan nama-nama seperti Batu Ngemped dan Batu Gang.\r\n\r\nAsal usul nama Desa Beraban terkait erat dengan pergeseran pemukiman penduduk dari pantai ke tengah. Nama \"Beraban\" berasal dari kata \"Berebehan,\" yang berasal dari sebuah kejadian di pemukiman Batu Gang yang melibatkan seorang gadis cantik. Kejadian ini mengundang bencana dan menghasilkan pendirian Pura Kali Pisang untuk menenangkan suasana.\r\n\r\nPada zaman pemerintahan Dalem Baturenggong, Ki Bendesa Beraban diangkat sebagai penguasa desa dengan tanggung jawab langsung kepada penguasa tertinggi di Gelgel. Saat Dang Hyang Dwijendra datang pada tahun 1578, ia melakukan penyucian diri di Gili Bio, yang kini dikenal sebagai Pura Tanah Lot. Dang Hyang Dwijendra juga meninggalkan keris pusaka \"Ki Baru Gajah\" yang kemudian membuktikan keampuhannya dalam pertempuran melawan musuh.\r\n\r\nPerpindahan Kerajaan Dalem dari Gelgel ke Klungkung pada tahun 1686 memengaruhi struktur politik dan kenegaraan di Bali. Desa Beraban mengalami porak-poranda saat Kerajaan Menguwi mencapai puncak kejayaan dan memporak-porandakan desa dalam ekspansinya. Setelah jatuhnya Menguwi dan terkepungnya oleh laskar Tabanan dan Badung, Desa Beraban mulai membenahi diri dengan mengaktifkan banjar-banjar di wilayahnya.\r\n\r\nStruktur desa berkembang seiring dengan waktu, dengan lahirnya beberapa banjar/dusun yang mengikuti perkembangan zaman dan era pembangunan. Nama-nama banjar ini disesuaikan dengan letak geografis, denah, dan peringatan dari peristiwa tertentu. Sebagai contoh, Banjar Ulu Desa, Banjar Gegelang, Banjar Batu Buah, Banjar Beraban, Banjar Batu Gang, Banjar Dukuh/Kukuh, Banjar Sinjuana, dan Banjar Suaka (yang kemudian menjadi Banjar Nyanyi).\r\n\r\nSejarah Desa Beraban mencerminkan perjalanan panjang dan perubahan yang dialami desa tersebut, dari awal pemukiman di pesisir pantai hingga perkembangan struktur desa dan kehidupan sosialnya seiring berjalannya waktu.'),
(10, 'Kondisi Georafis Desa', 'footer-bg.jpg', 'Secara tofografi, Desa Beraban Kecamatan Kediri Kabupaten Tabanan merupakan daerah landai dengan ketinggian 0 s/d 45 meter diatas permukaan laut, curah hujan relatif tinggi.\r\n\r\nBatas wilayah administratif Desa Beraban sebagai berikut:\r\n\r\n• Sebelah Utara berbatasan dengan Desa Pandak Gede\r\n• Sebelah Timur berbatasan dengan Desa Sungai Yeh Sungi (Desa Cemagi )\r\n• Sebelah Selatan berbatasan dengan Samudra Indonesia\r\n• Sebelah Barat berbatasan dengan S Yeh Kutikan (Desa Beraban)\r\n\r\nLuas wilayah Desa Beraban, 6,92 km2 = 692 Ha atau sekitar 0,682% luas Kabupaten Tabanan. Penggunaan lahan di wilayah Desa Beraban, sekarang dipilah menjadi daerah pemukiman 340,33 ha, tanah sawah 313,28 ha, perkebunan/tegalan 27,19 ha, hutan - ha  serta penggunaan lain-lain (fasilitas umum, pura, setra, jalan, lapangan dan sebagainya) seluas 11,20 ha.\r\n\r\nDesa Beraban memiliki jalan sepanjang 49 km, dengan rincian : jalan nasional 0 km, jalan provinsi 10 km, jalan kabupaten 4 km, jalan desa 20 km dan jalan Dusun/Banjar sepanjang 15 km. Dengan kondisi beraspal sepanjang 17 km, beton sepanjang 12 km, geladag 19 km, dan jalan tanah sepanjang 1 km');

-- --------------------------------------------------------

--
-- Table structure for table `tbobjekwisata`
--

CREATE TABLE `tbobjekwisata` (
  `idobjekwisata` int(11) NOT NULL,
  `nama_wst` varchar(100) NOT NULL,
  `foto_wst` varchar(200) NOT NULL,
  `ket_wst` text NOT NULL,
  `peta_wst` varchar(500) NOT NULL,
  `linkpeta_wst` varchar(500) NOT NULL,
  `kategori` enum('wisata_alam','wisata_religi','wisata_kuliner','wisata_buatan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbobjekwisata`
--

INSERT INTO `tbobjekwisata` (`idobjekwisata`, `nama_wst`, `foto_wst`, `ket_wst`, `peta_wst`, `linkpeta_wst`, `kategori`) VALUES
(3, 'Pantai Nyanyi', 'pantainyanyi3.jpg', 'Pantai Nyanyi, terletak di Desa Beraban, Kediri, Tabanan, Indonesia, adalah surga tropis yang memikat wisatawan dengan keindahan alamnya yang menakjubkan. Terletak di tepi Samudera Hindia, pantai ini menawarkan pasir putih lembut yang melambai oleh angin sepoi-sepoi, menciptakan suasana tenang dan damai.\r\n\r\nDengan deburan ombak yang melodi, Pantai Nyanyi menjadi destinasi yang sempurna bagi para pencari ketenangan. Keindahan alamnya yang alami dan sejuk menciptakan latar belakang yang ideal untuk menikmati matahari terbenam yang spektakuler. Selain itu, pantai ini juga menawarkan pemandangan gugusan batu karang yang menarik dan memberikan karakter unik pada pesisirnya.\r\n\r\nPara pengunjung dapat menikmati kegiatan air seperti berenang atau berselancar, sambil menyaksikan keelokan alam sekitar. Desa Beraban yang berdekatan juga memberikan nuansa lokal yang khas, memungkinkan wisatawan untuk merasakan kehidupan sehari-hari masyarakat setempat.\r\n\r\nPantai Nyanyi tidak hanya menawarkan keindahan alam, tetapi juga memiliki nilai budaya yang kaya. Tempat ini dikelilingi oleh keasrian alam dan tradisi lokal yang masih terjaga, menciptakan pengalaman wisata yang menyeluruh dan tak terlupakan.', '-8.63367276813725, 115.09789311660377', '', 'wisata_alam'),
(6, 'Pura Tanah Lot', 'tanahlot.jpg', 'Pura Tanah Lot, yang terletak di Desa Beraban, Kediri, Tabanan, Indonesia, adalah salah satu situs suci paling ikonik di Bali yang memukau para pengunjung dengan keindahan dan keberartian spiritualnya. Pura ini menduduki batu karang besar di tengah laut, menciptakan pemandangan spektakuler yang terutama memukau saat matahari terbenam.\r\n\r\nPura Tanah Lot adalah tempat ibadah penting bagi umat Hindu dan memiliki nilai sejarah yang mendalam. Dikelilingi oleh samudera yang luas, pura ini memberikan pengalaman spiritual yang unik dan menyeluruh bagi para pengunjung. Bangunan pura yang indah dan arsitektur klasiknya menunjukkan keahlian seni dan kepercayaan agama yang telah terus berlanjut selama berabad-abad.\r\n\r\nSelain sebagai tempat ibadah, Pura Tanah Lot juga menawarkan keindahan alam yang luar biasa. Pengunjung dapat menikmati pemandangan laut yang mengagumkan dan merasakan ketenangan di sekitar pura yang dipenuhi dengan aura sakral. Seiring dengan perjalanan waktu, pura ini juga telah menjadi salah satu ikon pariwisata Bali, menarik ribuan wisatawan setiap tahunnya.\r\n\r\nPura Tanah Lot bukan hanya destinasi wisata, tetapi juga mencerminkan warisan budaya dan spiritual yang kaya di Indonesia. Sebuah perjalanan ke pura ini bukan hanya pengalaman wisata, tetapi juga perjalanan ke dalam sejarah dan kepercayaan agama yang membentuk identitas pulau Dewata, Bali.', '-8.620914053209228, 115.08737336501795', '', 'wisata_religi'),
(9, 'Pantai Beraban ', 'pantaiberaban4.jpg', 'Pantai beraban\r\nPantai Beraban, yang terletak di Desa Beraban, Kediri, Tabanan, Indonesia, adalah destinasi wisata yang memukau dengan keindahan alamnya yang luar biasa. Dengan pasir putih yang lembut melingkupi pantai, Pantai Beraban menawarkan panorama yang memukau, ditemani ombak Samudera Hindia yang menghantam pantai dengan gemuruh.\r\n\r\nPantai ini juga terkenal dengan keindahan matahari terbenamnya yang spektakuler, menciptakan pemandangan yang romantis dan memukau. Gugusan batu karang yang tersebar di sepanjang pantai menambah daya tariknya, menciptakan lanskap alam yang unik dan menarik perhatian para pengunjung.\r\n\r\nSelain panorama alamnya yang menawan, Pantai Beraban juga menjadi tempat yang ideal untuk menikmati kegiatan air, seperti berenang atau berselancar. Keasrian desa sekitarnya memberikan nuansa lokal yang autentik, memungkinkan wisatawan untuk merasakan kehidupan sehari-hari masyarakat setempat dan mengeksplorasi kekayaan budaya daerah tersebut.\r\n\r\nPantai Beraban tidak hanya menawarkan keindahan alam yang luar biasa, tetapi juga memberikan kesempatan bagi para pengunjung untuk terhubung dengan alam dan budaya Indonesia yang kaya. Dengan kombinasi pesona alam dan kehangatan lokal, Pantai Beraban menjadi destinasi wisata yang sempurna bagi mereka yang mencari pengalaman yang memuaskan di pesisir barat Bali. ', '-8.628386206225908, 115.09227888954116', '', 'wisata_alam'),
(38, 'halo', 'ti1.jpg', 'halo', 'halo', '', 'wisata_alam'),
(40, 'abc1', 'sd_negeri.jpeg', 'abc1', '-8.63367276813725, 115.09789311660377', '', 'wisata_alam'),
(41, 'abc2', 'sunset-in-paradise-gebogan-di-tanah-lot-800-2023-06-24-012440_01.jpg', 'abc2', '-8.63367276813725, 115.09789311660377', '', 'wisata_alam'),
(42, 'abc3', 'sunset-in-paradise-gebogan-di-tanah-lot-800-2023-06-24-012440_02.jpg', 'abc3', '-8.63367276813725, 115.09789311660377', '', 'wisata_alam'),
(43, 'abc4', 'sunset-in-paradise-gebogan-di-tanah-lot-800-2023-06-24-012440_03.jpg', 'abc4', '-8.63367276813725, 115.09789311660377', '', 'wisata_alam'),
(44, 'abc5', 'sunset-in-paradise-gebogan-di-tanah-lot-800-2023-06-24-012440_04.jpg', 'abc5', '-8.63367276813725, 115.09789311660377', '', 'wisata_alam'),
(45, 'abc6', 'sunset-in-paradise-gebogan-di-tanah-lot-800-2023-06-24-012440_05.jpg', 'abc6', '-8.63367276813725, 115.09789311660377', '', 'wisata_kuliner'),
(46, 'abc7', 'sunset-in-paradise-gebogan-di-tanah-lot-800-2023-06-24-012440_06.jpg', 'abc7', '-8.63367276813725, 115.09789311660377', '', 'wisata_kuliner'),
(47, 'ccc', 'anjing-bulldog-3.jpeg', 'ccc', 'ccc', '', 'wisata_kuliner');

-- --------------------------------------------------------

--
-- Table structure for table `tbstat`
--

CREATE TABLE `tbstat` (
  `idstat` int(11) NOT NULL,
  `idusers` int(11) NOT NULL,
  `idobjekwisata` int(11) NOT NULL,
  `bukti` varchar(255) NOT NULL,
  `idtransaksi` int(11) NOT NULL,
  `status` enum('pending','accept','reject') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbstat`
--

INSERT INTO `tbstat` (`idstat`, `idusers`, `idobjekwisata`, `bukti`, `idtransaksi`, `status`) VALUES
(2, 126, 3, '', 26, 'accept'),
(7, 126, 3, 'arsitech_drawio_(1).png', 38, 'accept'),
(8, 127, 9, 'about-2.jpg', 43, 'accept'),
(9, 127, 6, 'user.png', 44, 'accept'),
(10, 127, 6, 'hero-img.png', 45, 'accept'),
(11, 120, 6, 'iconprofile.png', 51, 'accept'),
(12, 127, 9, 'reservation.jpg', 52, 'pending'),
(13, 127, 3, 'about.jpg', 53, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbtiket`
--

CREATE TABLE `tbtiket` (
  `idtiket` int(11) NOT NULL,
  `idusers` int(11) DEFAULT NULL,
  `idobjekwisata` int(11) DEFAULT NULL,
  `idharga` int(11) DEFAULT NULL,
  `kodeTiket` varchar(50) DEFAULT NULL,
  `qrcode` varchar(100) DEFAULT NULL,
  `create_at` timestamp(2) NOT NULL DEFAULT current_timestamp(2) ON UPDATE current_timestamp(2)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtiket`
--

INSERT INTO `tbtiket` (`idtiket`, `idusers`, `idobjekwisata`, `idharga`, `kodeTiket`, `qrcode`, `create_at`) VALUES
(1, 4, 6, 1, 'KT11', '', '2024-07-17 08:21:00.00'),
(3, 10, 9, 2, 'KT12', '', '2024-07-17 09:29:00.00'),
(4, 84, 9, 6, 'KTT41516', '1.jpg', '2024-07-10 05:32:32.00'),
(5, 84, 6, 7, 'KTT211145097', '2.jpg', '0000-00-00 00:00:00.00'),
(6, 58, 9, 5, 'KTT202054358', '3.jpg', '2024-07-23 05:34:54.00'),
(11, 126, 3, 2, '66a0a7aa697aa', 'assets/qrcodes/66a0a7aa697aa.png', '2024-07-24 01:05:14.00'),
(12, 126, 3, 4, '66a0a7aa6c642', 'assets/qrcodes/66a0a7aa6c642.png', '2024-07-24 01:05:14.00'),
(13, 126, 3, 2, '66a0a8f95fa97', 'assets/qrcodes/66a0a8f95fa97.png', '2024-07-24 01:10:49.00'),
(14, 126, 3, 4, '66a0a8f962670', 'assets/qrcodes/66a0a8f962670.png', '2024-07-24 01:10:49.00'),
(29, 126, 3, 2, '66a11e5e7f222', 'assets/qrcodes/66a11e5e7f222.png', '2024-07-24 09:31:42.00'),
(30, 126, 3, 4, '66a11e5eb3c71', 'assets/qrcodes/66a11e5eb3c71.png', '2024-07-24 09:31:42.00'),
(31, 126, 3, 2, '66a1d054312f2', 'assets/qrcodes/66a1d054312f2.png', '2024-07-24 22:11:00.00'),
(32, 126, 3, 4, '66a1d054342fc', 'assets/qrcodes/66a1d054342fc.png', '2024-07-24 22:11:00.00'),
(33, 126, 3, 7, '66a1d05435bd1', 'assets/qrcodes/66a1d05435bd1.png', '2024-07-24 22:11:00.00'),
(34, 126, 3, 2, '66a1d91d9950a', 'assets/qrcodes/66a1d91d9950a.png', '2024-07-24 22:48:30.00'),
(36, 126, 3, 2, '66a1dccd2f208', 'assets/qrcodes/66a1dccd2f208.png', '2024-07-24 23:04:13.00'),
(37, 126, 3, 2, '66a1eab9c39f2', 'assets/qrcodes/66a1eab9c39f2.png', '2024-07-25 00:03:37.00'),
(38, 126, 3, 4, '66a1eab9ce838', 'assets/qrcodes/66a1eab9ce838.png', '2024-07-25 00:03:37.00'),
(39, 126, 3, 2, '66a1ee105892c', 'assets/qrcodes/66a1ee105892c.png', '2024-07-25 00:17:52.00'),
(40, 126, 3, 4, '66a1ee105c25a', 'assets/qrcodes/66a1ee105c25a.png', '2024-07-25 00:17:52.00'),
(41, 126, 3, 2, '66a1f09c9cafd', 'assets/qrcodes/66a1f09c9cafd.png', '2024-07-25 00:28:44.00'),
(42, 126, 3, 4, '66a1f09c9f63b', 'assets/qrcodes/66a1f09c9f63b.png', '2024-07-25 00:28:44.00'),
(43, 126, 3, 2, '66a1f193bd8f8', 'assets/qrcodes/66a1f193bd8f8.png', '2024-07-25 00:32:51.00'),
(44, 126, 3, 4, '66a1f193c06b4', 'assets/qrcodes/66a1f193c06b4.png', '2024-07-25 00:32:51.00'),
(45, 126, 3, 2, '66a1f288ac5c8', 'assets/qrcodes/66a1f288ac5c8.png', '2024-07-25 00:36:56.00'),
(46, 126, 3, 4, '66a1f288af11b', 'assets/qrcodes/66a1f288af11b.png', '2024-07-25 00:36:56.00'),
(47, 126, 3, 2, '66a1f72981a6a', 'assets/qrcodes/66a1f72981a6a.png', '2024-07-25 00:56:41.00'),
(48, 126, 3, 4, '66a1f72984602', 'assets/qrcodes/66a1f72984602.png', '2024-07-25 00:56:41.00'),
(49, 126, 3, 2, '66a1f7ecb1a9e', 'assets/qrcodes/66a1f7ecb1a9e.png', '2024-07-25 00:59:56.00'),
(50, 126, 3, 4, '66a1f7ecb4586', 'assets/qrcodes/66a1f7ecb4586.png', '2024-07-25 00:59:56.00'),
(51, 126, 3, 2, '66a1fa4aafa2b', 'assets/qrcodes/66a1fa4aafa2b.png', '2024-07-25 01:10:02.00'),
(52, 126, 3, 4, '66a1fa4ab2749', 'assets/qrcodes/66a1fa4ab2749.png', '2024-07-25 01:10:02.00'),
(53, 126, 3, 2, '66a1fcaa5987f', 'assets/qrcodes/66a1fcaa5987f.png', '2024-07-25 01:20:10.00'),
(54, 126, 3, 4, '66a1fcaa5c417', 'assets/qrcodes/66a1fcaa5c417.png', '2024-07-25 01:20:10.00'),
(55, 126, 3, 2, '66a2703604033', 'assets/qrcodes/66a2703604033.png', '2024-07-25 09:33:10.00'),
(56, 126, 3, 4, '66a270363a68e', 'assets/qrcodes/66a270363a68e.png', '2024-07-25 09:33:10.00'),
(57, 126, 3, 2, '66a2714fd7752', 'assets/qrcodes/66a2714fd7752.png', '2024-07-25 09:37:51.00'),
(58, 126, 3, 4, '66a2714fda2fc', 'assets/qrcodes/66a2714fda2fc.png', '2024-07-25 09:37:51.00'),
(59, 126, 3, 2, '66a2719e78069', 'assets/qrcodes/66a2719e78069.png', '2024-07-25 09:39:10.00'),
(60, 126, 3, 4, '66a2719e7ab09', 'assets/qrcodes/66a2719e7ab09.png', '2024-07-25 09:39:10.00'),
(61, 127, 9, 3, '66a315362f445', 'assets/qrcodes/66a315362f445.png', '2024-07-25 21:17:10.00'),
(62, 127, 9, 6, '66a315363ac27', 'assets/qrcodes/66a315363ac27.png', '2024-07-25 21:17:10.00'),
(63, 127, 6, 1, '66a3165f104a0', 'assets/qrcodes/66a3165f104a0.png', '2024-07-25 21:22:07.00'),
(64, 127, 6, 5, '66a3165f15fac', 'assets/qrcodes/66a3165f15fac.png', '2024-07-25 21:22:07.00'),
(65, 127, 6, 1, '66a31931939dd', 'assets/qrcodes/66a31931939dd.png', '2024-07-25 21:34:09.00'),
(66, 127, 6, 5, '66a319319adea', 'assets/qrcodes/66a319319adea.png', '2024-07-25 21:34:09.00'),
(67, 127, 6, 1, '66a31ac1db4b2', 'assets/qrcodes/66a31ac1db4b2.png', '2024-07-25 21:40:49.00'),
(68, 127, 6, 5, '66a31ac1e2021', 'assets/qrcodes/66a31ac1e2021.png', '2024-07-25 21:40:49.00'),
(69, 120, 3, 2, '66a31ef60eb86', 'assets/qrcodes/66a31ef60eb86.png', '2024-07-25 21:58:46.00'),
(70, 120, 3, 4, '66a31ef6155a0', 'assets/qrcodes/66a31ef6155a0.png', '2024-07-25 21:58:46.00'),
(71, 120, 3, 7, '66a31ef618a76', 'assets/qrcodes/66a31ef618a76.png', '2024-07-25 21:58:46.00'),
(72, 120, 3, 2, '66a31f179e2db', 'assets/qrcodes/66a31f179e2db.png', '2024-07-25 21:59:19.00'),
(73, 120, 3, 4, '66a31f17a4d82', 'assets/qrcodes/66a31f17a4d82.png', '2024-07-25 21:59:19.00'),
(74, 120, 3, 7, '66a31f17a83ac', 'assets/qrcodes/66a31f17a83ac.png', '2024-07-25 21:59:19.00'),
(75, 120, 6, 1, '66a31f86c4756', 'assets/qrcodes/66a31f86c4756.png', '2024-07-25 22:01:10.00'),
(76, 120, 6, 5, '66a31f86d2a78', 'assets/qrcodes/66a31f86d2a78.png', '2024-07-25 22:01:10.00'),
(77, 127, 9, 3, '66a3201d997a8', 'assets/qrcodes/66a3201d997a8.png', '2024-07-25 22:03:41.00'),
(78, 127, 9, 6, '66a3201da0710', 'assets/qrcodes/66a3201da0710.png', '2024-07-25 22:03:41.00'),
(79, 127, 3, 2, '66a32038d9051', 'assets/qrcodes/66a32038d9051.png', '2024-07-25 22:04:08.00'),
(80, 127, 3, 4, '66a32038dfcf5', 'assets/qrcodes/66a32038dfcf5.png', '2024-07-25 22:04:08.00'),
(81, 127, 3, 2, '66a32051256c7', 'assets/qrcodes/66a32051256c7.png', '2024-07-25 22:04:33.00'),
(82, 127, 3, 4, '66a320512deb1', 'assets/qrcodes/66a320512deb1.png', '2024-07-25 22:04:33.00'),
(83, 127, 3, 7, '66a32051318ef', 'assets/qrcodes/66a32051318ef.png', '2024-07-25 22:04:33.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbtransaksi`
--

CREATE TABLE `tbtransaksi` (
  `idtransaksi` int(11) NOT NULL,
  `idusers` int(11) DEFAULT NULL,
  `tgl_transaksi` timestamp NULL DEFAULT NULL,
  `total_pembayaran` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbtransaksi`
--

INSERT INTO `tbtransaksi` (`idtransaksi`, `idusers`, `tgl_transaksi`, `total_pembayaran`) VALUES
(1, 84, '2024-07-23 05:36:45', NULL),
(2, 58, '2024-07-23 05:37:08', NULL),
(3, 84, '2024-07-23 05:37:31', NULL),
(4, 84, '2024-07-09 05:40:16', NULL),
(5, 49, '2024-07-10 05:40:39', NULL),
(14, 126, '2024-07-24 01:05:14', '125'),
(15, 126, '2024-07-24 01:10:49', '125'),
(21, 126, '2024-07-24 09:31:42', '125000'),
(22, 126, '2024-07-24 22:03:10', '127000'),
(23, 126, '2024-07-24 22:07:30', '127000'),
(24, 126, '2024-07-24 22:11:00', '127000'),
(25, 126, '2024-07-24 22:48:29', '125000'),
(26, 126, '2024-07-24 23:04:13', '75000'),
(27, 126, '2024-07-25 00:03:37', '125000'),
(28, 126, '2024-07-25 00:17:52', '125000'),
(29, 126, '2024-07-25 00:28:44', '125000'),
(30, 126, '2024-07-25 00:32:51', '125000'),
(31, 126, '2024-07-25 00:36:56', '125000'),
(32, 126, '2024-07-25 00:56:41', '125000'),
(33, 126, '2024-07-25 00:59:56', '125000'),
(34, 126, '2024-07-25 01:10:02', '125000'),
(35, 126, '2024-07-25 01:20:10', '125000'),
(36, 126, '2024-07-25 09:33:10', '125000'),
(37, 126, '2024-07-25 09:37:51', '125000'),
(38, 126, '2024-07-25 09:39:10', '125000'),
(39, 120, '2024-07-25 20:04:13', '52000'),
(40, 127, '2024-07-25 20:10:54', '95000'),
(41, 127, '2024-07-25 20:32:02', '95000'),
(42, 127, '2024-07-25 21:14:29', '55000'),
(43, 127, '2024-07-25 21:17:10', '55000'),
(44, 127, '2024-07-25 21:22:07', '95000'),
(45, 127, '2024-07-25 21:34:09', '95000'),
(46, 127, '2024-07-25 21:38:11', '95000'),
(47, 127, '2024-07-25 21:40:07', '95000'),
(48, 127, '2024-07-25 21:40:49', '95000'),
(49, 120, '2024-07-25 21:58:46', '127000'),
(50, 120, '2024-07-25 21:59:19', '127000'),
(51, 120, '2024-07-25 22:01:10', '95000'),
(52, 127, '2024-07-25 22:03:41', '55000'),
(53, 127, '2024-07-25 22:04:08', '125000'),
(54, 127, '2024-07-25 22:04:33', '127000');

-- --------------------------------------------------------

--
-- Table structure for table `tbulasan`
--

CREATE TABLE `tbulasan` (
  `id_uls` int(11) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ulasan` text NOT NULL,
  `idacara` int(11) DEFAULT NULL,
  `idusers` int(11) DEFAULT NULL,
  `idakomodasi` int(11) DEFAULT NULL,
  `idobjekwisata` int(11) DEFAULT NULL,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbulasan`
--

INSERT INTO `tbulasan` (`id_uls`, `waktu`, `ulasan`, `idacara`, `idusers`, `idakomodasi`, `idobjekwisata`, `rating`) VALUES
(12, '2023-12-13 10:57:45', 'dinata', NULL, 10, NULL, 9, 5),
(22, '2023-12-13 10:58:47', 'GOAT', NULL, 20, NULL, 3, 5),
(25, '2024-01-09 13:59:44', 'good', NULL, 23, NULL, 3, 5),
(47, '2024-01-09 14:21:33', 'yu', NULL, 47, 1, NULL, 5),
(48, '2024-01-13 15:09:10', 'ee', NULL, 48, 1, NULL, 5),
(78, '2024-01-16 14:36:00', 'vira', NULL, 78, 1, NULL, 5),
(91, '2024-01-16 19:35:00', 'hooo', NULL, 91, NULL, 6, 5),
(93, '2024-01-16 21:23:00', 'zz', NULL, 93, NULL, 6, 5),
(95, '2024-06-09 15:03:27', 'senang', NULL, 95, 3, NULL, 5),
(96, '2024-01-17 02:24:00', 'komentar', NULL, 96, NULL, 6, 5),
(98, '2024-05-19 06:57:00', 'halo', NULL, 104, NULL, 9, 4),
(99, '2024-05-19 06:58:00', 'belly', NULL, 105, NULL, 6, 4),
(107, '2024-06-01 15:59:00', 'oo', NULL, 116, NULL, 6, 5),
(108, '2024-06-05 20:45:00', 'dinata', NULL, 117, NULL, 9, 5),
(109, '2024-06-14 08:37:00', 'vvv', NULL, 118, NULL, 42, 5),
(114, '2024-06-15 07:10:00', 'cxcx', NULL, 109, NULL, 6, 5),
(115, '2024-06-15 07:16:00', 'yuhu', NULL, 107, NULL, 9, 5),
(116, '2024-06-15 07:57:00', 'ddd', NULL, 108, NULL, 6, NULL),
(117, '2024-06-15 20:49:00', 'cuy', NULL, 119, NULL, 6, 5),
(119, '2024-06-16 07:38:00', 'kencang', NULL, 120, 3, NULL, 3),
(120, '2024-06-18 09:02:00', 'uhuy', NULL, 107, 54, NULL, 5),
(128, '2024-06-18 10:04:00', 'ass', NULL, 119, 50, NULL, 3),
(129, '2024-07-26 04:06:04', 'ass', NULL, 107, NULL, 3, 5),
(130, '2024-06-18 18:21:00', 'suu', NULL, 107, 50, NULL, 4),
(131, '2024-06-26 06:36:00', 'woah', NULL, 120, NULL, 3, 5),
(132, '2024-07-07 16:24:00', 'yah', NULL, 125, NULL, 3, 5),
(133, '2024-07-14 09:06:00', 'amazeeng', NULL, 125, NULL, 6, 5),
(134, '2024-07-14 09:07:00', 'abc', NULL, 125, NULL, 3, 5),
(135, '2024-07-14 03:08:00', 'asd', NULL, 125, 50, NULL, 5),
(136, '2024-07-14 10:20:00', 'asd', NULL, 125, NULL, 9, 5),
(137, '2024-07-14 10:56:00', 'ss', NULL, 125, NULL, 9, 4),
(138, '2024-07-26 04:07:00', 'halo', NULL, 127, NULL, 6, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbusers`
--

CREATE TABLE `tbusers` (
  `idusers` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `role` varchar(10) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbusers`
--

INSERT INTO `tbusers` (`idusers`, `username`, `role`, `email`, `password`, `created`) VALUES
(1, 'admin', '1', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2024-07-07 14:31:42'),
(3, 'kepaladesa', '2', 'kepaladesa@gmail.com', 'dabacc3bca86c8e5120e33bc112363b6', '2024-07-07 14:31:42'),
(4, 'zee', '3', 'zee@gmail.com', '', '2024-07-17 08:51:44'),
(7, 'kepaladesa', NULL, 'vonzy@gmail.com', NULL, '2024-07-07 14:31:42'),
(10, 'dinata', '3', 'dinata@gmail.com', NULL, '2024-07-17 08:53:50'),
(20, 'messi', NULL, 'messi@gmail.com', NULL, '2024-07-07 14:31:42'),
(22, 'usman', NULL, 'usman@gmail.com', NULL, '2024-07-07 14:31:42'),
(23, 'halo', NULL, 'halo@gmail.com', NULL, '2024-07-07 14:31:42'),
(24, 'misel', NULL, 'misel@gmail.com', NULL, '2024-07-07 14:31:42'),
(25, 'asus', NULL, 'asus@gmail.com', NULL, '2024-07-07 14:31:42'),
(28, 'abcd', NULL, 'abcd@gmail.com', NULL, '2024-07-07 14:31:42'),
(30, 'anbvc', NULL, 'anbv@gmail.com', NULL, '2024-07-07 14:31:42'),
(36, 'bbbb', NULL, 'bbbb@gmail.com', NULL, '2024-07-07 14:31:42'),
(37, 'bbbb', NULL, 'bbbb@gmail.com', NULL, '2024-07-07 14:31:42'),
(38, 'cccc', NULL, 'cccc@gmail.com', NULL, '2024-07-07 14:31:42'),
(39, 'nnn', NULL, 'nnn@gmail.com', NULL, '2024-07-07 14:31:42'),
(40, 'he', NULL, '', NULL, '2024-07-07 14:31:42'),
(41, 'jh', NULL, '', NULL, '2024-07-07 14:31:42'),
(42, 'ko', NULL, '', NULL, '2024-07-07 14:31:42'),
(43, 'oi', NULL, '', NULL, '2024-07-07 14:31:42'),
(44, 'po', NULL, '', NULL, '2024-07-07 14:31:42'),
(45, 'by', NULL, '', NULL, '2024-07-07 14:31:42'),
(46, 'jj', NULL, '', NULL, '2024-07-07 14:31:42'),
(47, 'yu', NULL, '', NULL, '2024-07-07 14:31:42'),
(48, 'ee', NULL, '', NULL, '2024-07-07 14:31:42'),
(49, 'aa', NULL, '', NULL, '2024-07-07 14:31:42'),
(50, 'bb', NULL, '', NULL, '2024-07-07 14:31:42'),
(51, 'nn', NULL, '', NULL, '2024-07-07 14:31:42'),
(52, 'juju', NULL, '', NULL, '2024-07-07 14:31:42'),
(53, 'zizi', NULL, '', NULL, '2024-07-07 14:31:42'),
(54, 'zeze', NULL, '', NULL, '2024-07-07 14:31:42'),
(55, 'zuzu', NULL, '', NULL, '2024-07-07 14:31:42'),
(56, 'zaza', NULL, '', NULL, '2024-07-07 14:31:42'),
(57, 'new', NULL, '', NULL, '2024-07-07 14:31:42'),
(58, 'ca', NULL, '', NULL, '2024-07-07 14:31:42'),
(59, 'fak', NULL, '', NULL, '2024-07-07 14:31:42'),
(60, 'vip', NULL, '', NULL, '2024-07-07 14:31:42'),
(61, 'nm', NULL, '', NULL, '2024-07-07 14:31:42'),
(62, 're', NULL, '', NULL, '2024-07-07 14:31:42'),
(63, 'tu', NULL, '', NULL, '2024-07-07 14:31:42'),
(64, 'bangsat', NULL, '', NULL, '2024-07-07 14:31:42'),
(65, 'hu', NULL, '', NULL, '2024-07-07 14:31:42'),
(66, 'yu', NULL, '', NULL, '2024-07-07 14:31:42'),
(68, 'idiot', NULL, '', NULL, '2024-07-07 14:31:42'),
(69, 'halo', NULL, '', NULL, '2024-07-07 14:31:42'),
(70, 'ui', NULL, '', NULL, '2024-07-07 14:31:42'),
(72, 'keren', NULL, '', NULL, '2024-07-07 14:31:42'),
(73, 'vina', NULL, '', NULL, '2024-07-07 14:31:42'),
(74, 'hi', NULL, '', NULL, '2024-07-07 14:31:42'),
(75, 'messi', NULL, '', NULL, '2024-07-07 14:31:42'),
(76, 'taka', NULL, '', NULL, '2024-07-07 14:31:42'),
(77, 'gg', NULL, '', NULL, '2024-07-07 14:31:42'),
(78, 'vira', NULL, '', NULL, '2024-07-07 14:31:42'),
(81, 'seratus', NULL, '', NULL, '2024-07-07 14:31:42'),
(82, 'haihai', NULL, '', NULL, '2024-07-07 14:31:42'),
(83, 'nnn', NULL, '', NULL, '2024-07-07 14:31:42'),
(84, 'aaa', NULL, '', NULL, '2024-07-07 14:31:42'),
(87, 'saya', NULL, '', NULL, '2024-07-07 14:31:42'),
(88, 'kamu', NULL, '', NULL, '2024-07-07 14:31:42'),
(91, 'hoooo', NULL, '', NULL, '2024-07-07 14:31:42'),
(93, 'zz', NULL, '', NULL, '2024-07-07 14:31:42'),
(95, 'lumayan', NULL, '', NULL, '2024-07-07 14:31:42'),
(96, 'gaktau', NULL, '', NULL, '2024-07-07 14:31:42'),
(97, 'wira', NULL, 'wira', '$2y$10$mwacHmX3fz7qGklLT0HP5uJBD', '2024-07-07 14:31:42'),
(98, 'dinatawira', '3', 'dinatawira', '96515fac564b73e5b8b3bdce62fa41d7', '2024-07-07 14:31:42'),
(99, 'zzz', NULL, 'zzz@gmail.com', '$2y$10$etrqCvILj9u9krJRQX/Wo.WLL', '2024-07-07 14:31:42'),
(100, 'jkt', '3', 'jkt@gmail.com', '56e48b940db8fb821a6c42fcf654e65e', '2024-07-07 14:31:42'),
(102, 'ww', '3', 'ee', '514f1b439f404f86f77090fa9edc96ce', '2024-07-07 14:31:42'),
(103, 'xcxc', NULL, '', NULL, '2024-07-07 14:31:42'),
(104, 'hola', NULL, '', NULL, '2024-07-07 14:31:42'),
(105, 'pork', NULL, '', NULL, '2024-07-07 14:31:42'),
(106, 'wwww', '3', 'wwww@gmail.com', 'e34a8899ef6468b74f8a1048419ccc8b', '2024-07-07 14:31:42'),
(107, 'wewe', '3', 'wewe@gmail.com', '2a7d544ccb742bd155e55c796de8e511', '2024-07-07 14:31:42'),
(108, 'ddd', '3', 'ddd@gmail.com', '77963b7a931377ad4ab5ad6a9cd718aa', '2024-07-07 14:31:42'),
(109, 'xcxc', '3', 'xcxc@gmail.com', '8ecf39fb02bd311cd04c72d89cbfb6d7', '2024-07-07 14:31:42'),
(110, 'try', NULL, '', NULL, '2024-07-07 14:31:42'),
(111, 'bold', NULL, '', NULL, '2024-07-07 14:31:42'),
(112, 'steam', NULL, '', NULL, '2024-07-07 14:31:42'),
(113, 'fuck', NULL, '', NULL, '2024-07-07 14:31:42'),
(114, 'jj', NULL, '', NULL, '2024-07-07 14:31:42'),
(115, 'ee', NULL, '', NULL, '2024-07-07 14:31:42'),
(116, 'oo', NULL, '', NULL, '2024-07-07 14:31:42'),
(117, 'wira', NULL, '', NULL, '2024-07-07 14:31:42'),
(118, 'vvv', NULL, '', NULL, '2024-07-07 14:31:42'),
(119, 'rtx4060', '3', 'rtx4060@gmail.com', '21b325f058385ae0d97ca474e8d08aa3', '2024-07-07 14:31:42'),
(120, 'ssd', '3', 'ssd@gmail.com', 'd4576b3b305e1df6f8ef4517ec2f9615', '2024-07-07 14:31:42'),
(121, 'rich', '3', 'rich@gmail.com', 'e7f4f8bd246c235418280d1f124e14f0', '2024-07-07 08:42:00'),
(122, 'regis', '3', 'regis@gmail.com', 'fee5a5851188651cfd0aeef9a9b7f1a1', '2024-07-07 08:43:00'),
(123, 'rtrt', '3', 'rtrt@gmail.com', '58d2eeb08d4e339138727553b3c4336b', '2024-07-07 09:49:00'),
(124, 'qwqw', '3', 'qwqw@gmail.com', 'e110fb45bc4f7cc5d367b06bfbc8e5c3', '2024-07-07 09:55:00'),
(125, 'sukses', '3', 'sukses@gmail.com', 'f936e6010fec57ff2f73e9e97cf98b55', '2024-07-07 16:23:00'),
(126, 'ariksuputra12', '3', 'ariksuputra13@gmail.com', 'b772852a7859d9e776b7f4254fe97d7e', '2024-07-23 06:31:02'),
(127, 'wira', '3', 'wira@gmail.com', '6215f4770ee800ad5402bc02be783c26', '2024-07-26 02:09:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbacara`
--
ALTER TABLE `tbacara`
  ADD PRIMARY KEY (`idacara`);

--
-- Indexes for table `tbakomodasi`
--
ALTER TABLE `tbakomodasi`
  ADD PRIMARY KEY (`idakomodasi`);

--
-- Indexes for table `tbdettransaksi`
--
ALTER TABLE `tbdettransaksi`
  ADD PRIMARY KEY (`iddettransaksi`),
  ADD KEY `fk_tbdettransaksi_tbtiket` (`idtiket`),
  ADD KEY `fk_tbdettransaksi_tbtransaksi` (`idtransaksi`) USING BTREE;

--
-- Indexes for table `tbharga`
--
ALTER TABLE `tbharga`
  ADD PRIMARY KEY (`idharga`),
  ADD KEY `fk_tbharga_tbobjek_idx` (`idobjekwisata`);

--
-- Indexes for table `tbinformasiumum`
--
ALTER TABLE `tbinformasiumum`
  ADD PRIMARY KEY (`idinfoumum`);

--
-- Indexes for table `tbobjekwisata`
--
ALTER TABLE `tbobjekwisata`
  ADD PRIMARY KEY (`idobjekwisata`);

--
-- Indexes for table `tbstat`
--
ALTER TABLE `tbstat`
  ADD PRIMARY KEY (`idstat`),
  ADD KEY `fk_tbuser_id` (`idusers`),
  ADD KEY `fk_tbstat_tbtrans` (`idtransaksi`),
  ADD KEY `fk_tbstat_tbobjekwisata` (`idobjekwisata`) USING BTREE;

--
-- Indexes for table `tbtiket`
--
ALTER TABLE `tbtiket`
  ADD PRIMARY KEY (`idtiket`),
  ADD KEY `fk_tbtiket_tbusers_idx` (`idusers`),
  ADD KEY `fk_tbtiket_tbobjek_idx` (`idobjekwisata`),
  ADD KEY `fk_tbtiket_tbharga_idx` (`idharga`);

--
-- Indexes for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `fk_tbtransaksi_tbusers_idx` (`idusers`);

--
-- Indexes for table `tbulasan`
--
ALTER TABLE `tbulasan`
  ADD PRIMARY KEY (`id_uls`),
  ADD KEY `fk_tbulasan_tbacara_idx` (`idacara`),
  ADD KEY `fk_tbulasan_tbusers1_idx` (`idusers`),
  ADD KEY `fk_tbulasan_tbakomodasi1_idx` (`idakomodasi`),
  ADD KEY `fk_tbulasan_tbobjekwisata1_idx` (`idobjekwisata`);

--
-- Indexes for table `tbusers`
--
ALTER TABLE `tbusers`
  ADD PRIMARY KEY (`idusers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbacara`
--
ALTER TABLE `tbacara`
  MODIFY `idacara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbakomodasi`
--
ALTER TABLE `tbakomodasi`
  MODIFY `idakomodasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbdettransaksi`
--
ALTER TABLE `tbdettransaksi`
  MODIFY `iddettransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbharga`
--
ALTER TABLE `tbharga`
  MODIFY `idharga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbinformasiumum`
--
ALTER TABLE `tbinformasiumum`
  MODIFY `idinfoumum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbobjekwisata`
--
ALTER TABLE `tbobjekwisata`
  MODIFY `idobjekwisata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `tbstat`
--
ALTER TABLE `tbstat`
  MODIFY `idstat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbtiket`
--
ALTER TABLE `tbtiket`
  MODIFY `idtiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbulasan`
--
ALTER TABLE `tbulasan`
  MODIFY `id_uls` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tbusers`
--
ALTER TABLE `tbusers`
  MODIFY `idusers` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbdettransaksi`
--
ALTER TABLE `tbdettransaksi`
  ADD CONSTRAINT `tbdettransaksi_ibfk_1` FOREIGN KEY (`idtransaksi`) REFERENCES `tbtransaksi` (`idtransaksi`),
  ADD CONSTRAINT `tbdettransaksi_ibfk_2` FOREIGN KEY (`idtiket`) REFERENCES `tbtiket` (`idtiket`);

--
-- Constraints for table `tbharga`
--
ALTER TABLE `tbharga`
  ADD CONSTRAINT `fk_tbharga_tbobjek` FOREIGN KEY (`idobjekwisata`) REFERENCES `tbobjekwisata` (`idobjekwisata`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbstat`
--
ALTER TABLE `tbstat`
  ADD CONSTRAINT `tbstat_ibfk_1` FOREIGN KEY (`idusers`) REFERENCES `tbusers` (`idusers`),
  ADD CONSTRAINT `tbstat_ibfk_2` FOREIGN KEY (`idtransaksi`) REFERENCES `tbtransaksi` (`idtransaksi`),
  ADD CONSTRAINT `tbstat_ibfk_3` FOREIGN KEY (`idobjekwisata`) REFERENCES `tbobjekwisata` (`idobjekwisata`);

--
-- Constraints for table `tbtiket`
--
ALTER TABLE `tbtiket`
  ADD CONSTRAINT `fk_tbtiket_tbharga` FOREIGN KEY (`idharga`) REFERENCES `tbharga` (`idharga`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbtiket_tbobjek` FOREIGN KEY (`idobjekwisata`) REFERENCES `tbobjekwisata` (`idobjekwisata`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbtiket_tbusers` FOREIGN KEY (`idusers`) REFERENCES `tbusers` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbtransaksi`
--
ALTER TABLE `tbtransaksi`
  ADD CONSTRAINT `fk_tbtransaksi_tbusers` FOREIGN KEY (`idusers`) REFERENCES `tbusers` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbulasan`
--
ALTER TABLE `tbulasan`
  ADD CONSTRAINT `fk_tbulasan_tbacara` FOREIGN KEY (`idacara`) REFERENCES `tbacara` (`idacara`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbulasan_tbakomodasi1` FOREIGN KEY (`idakomodasi`) REFERENCES `tbakomodasi` (`idakomodasi`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbulasan_tbobjekwisata1` FOREIGN KEY (`idobjekwisata`) REFERENCES `tbobjekwisata` (`idobjekwisata`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbulasan_tbusers1` FOREIGN KEY (`idusers`) REFERENCES `tbusers` (`idusers`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

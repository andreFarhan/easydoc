-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2023 pada 16.49
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_easydoc`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bhp`
--

CREATE TABLE `tb_bhp` (
  `kode_bhp` varchar(10) NOT NULL,
  `nama_bhp` varchar(100) NOT NULL,
  `stok_bhp` int(11) NOT NULL,
  `satuan_bhp` enum('Aerosol Foam','Aerosol Metered Dose','Aerosol Spray','Alumunium Foil','Amplop','Ampul','Blister','Botol / Fls','Botol Kaca','Botol Plastik','Botol Spray','Bungkus','Buscal Spray','Cairan Diagnostik','Cairan Mata','Cairan Steril','Can','Cartridge','Case','Catch Cover','Chewing Gum','Container','Corrugated Box','Cup Plastik','Dus','Dus Luar','Eliksir','Emulsi','Enema','Flexi Bag','Galon / GLN','Gas','Gel','Gel Mata','Granul Effervescent','Granula','Implant','Infus','Intra Uterine Device (Iud)','Jerigen','Kaca','Kaleng','Kantong','Kantong Infus (Infus Soft Pack)','Kaplet','Kaplet Kunyah','Kaplet Kunyah Salut Selaput','Kaplet Pelepasan Cepat','Kaplet Pelepasan Lambat','Kaplet Salut Enterik','Kaplet Salut Gula','Kaplet Salut Selaput','Kapsul','Kapsul Lunak','Kapsul Pelepasan Lambat','Karton','Kertas','Kotak (Box)','Krim','Krim Lemak','Lainnya','Larutan','Larutan Inhalasi','Larutan Injeksi','Lusin / lsn','Master Box','Obat Kumur','Oral Spray','Ovula','Pack','Pasta','Patch','Pc / Piece','Pcs /Pieces','Pensil','Pessary','Piece Box','Pil','Plastik','Pot','Pot Plastik','Pouch','Roll','Sachet','Salep','Salep -51- Mata','Sampo','Semprot Hidung','Serbuk Aerosol','Serbuk Effervescent','Serbuk Infus','Serbuk Inhaler','Serbuk Injeksi','Serbuk Injeksi Liofilisasi','Serbuk Obat Luar / Serbuk Tabur','Serbuk Oral','Serbuk Spray','Serbuk Steril','Set','Sirup','Sirup Kering','Sirup Kering Pelepasan Lambat','Softbag','Stickpack','Strip','Subdermal Implants','Supositoria','Suspensi','Suspensi Injeksi','Suspensi / Cairan Obat Luar','Syringe','Tablet','Tablet Cepat Larut','Tablet Disintegrasi Oral','Tablet Dispersibel','Tablet Effervescent','Tablet Hisap','Tablet Kunyah','Tablet Lapis','Tablet Lapis Lepas Lambat','Tablet Lepas Lambat','Tablet Pelepasan Cepat','Tablet Salut Enterik','Tablet Salut Gula','Tablet Salut Selaput','Tablet Sublingual','Tablet Sublingual Pelepasan Lambat','Tablet Vaginal','Tabung','Tetes Hidung','Tetes Mata','Tetes Mata Dan Telinga','Tetes Oral (Oral Drops)','Tetes Telinga','Topical Spray','Transdermal','Transdermal Spray','Transdermal Urethral','Tube','Tube Plastik','Tulle / Plester Obat','Vaginal Cream','Vaginal Douche','Vaginal Gel','Vaginal Ring','Vaginal Tissue','Vial','Wrapper') NOT NULL,
  `harga_bhp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_bhp`
--

INSERT INTO `tb_bhp` (`kode_bhp`, `nama_bhp`, `stok_bhp`, `satuan_bhp`, `harga_bhp`) VALUES
('mskkf94', 'Masker KF94', 30, 'Pcs /Pieces', 2500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` int(11) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `sip` varchar(100) NOT NULL,
  `masa_berlaku` date NOT NULL,
  `spesialis` enum('Spesialis Penyakit Dalam','Umum','Gigi','Spesialis Penyakit Dalam','Spesialis Anak','Spesialis Obstetri & Ginekologi','Spesialis Jantung & Pembuluh Darah','Spesialis Kulit & Kelamin','Spesialis Mata','Spesialis Saraf','Spesialis THT','Spesialis Paru','Spesialis Urologi','Spesialis Geriatri/Gerontologi','Spesialis Gigi Anak','Spesialis Konservatori Gigi','Spesialis Ortodonsia (Gigi)','Spesialis Prostodonsia (Gigi)','Spesialis Periodonsia (Gigi)','Spesialis Bedah Mulut & Maksilofasial (Gigi)','Spesialis Gizi Klinik','Spesialis Akupunktur Medis','Spesialis Kedokteran Jiwa','Spesialis Ortopedi','Spesialis Kedokteran Olahraga','Spesialis Kedokteran Okupasi','Spesialis Kedokteran Fisik & Rehabilitasi','Spesialis Alergi & Imunologi','Spesialis Andrologi','Spesialis Anestesi','Spesialis Bedah','Spesialis Bedah Anak','Spesialis Bedah Plastik','Spesialis Bedah Saraf','Spesialis Bedah Toraks Kardiovaskuler','Spesialis Endokrinologi','Spesialis Gastroenterologi','Spesialis Hematologi & Transfusi Darah','Spesialis Kardioserebrovaskular','Spesialis Kedokteran Kelautan','Spesialis Kedokteran Penerbangan','Spesialis Nefrologi (Ginjal & Hipertensi)','Spesialis Onkologi','Spesialis Patologi Klinik','Spesialis Reumatologi','Psikolog Klinis') NOT NULL,
  `alamat_dokter` text NOT NULL,
  `nomor_telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `id_klinik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `jenis_kelamin`, `sip`, `masa_berlaku`, `spesialis`, `alamat_dokter`, `nomor_telp`, `email`, `password`, `status`, `id_klinik`) VALUES
(6, 'Mulia Yuga Utama', 'Laki-laki', '451/015/SIP-DS/III.00-WW/IV/2023', '2028-05-18', 'Umum', 'Pondok Aren', '089664496386', 'muliayuga@yopmail.com', '$2y$10$ugAJX7RnTS/UhBl8etENw.JgX2JWkGYu/bjT3mT6rdwuk1x9SAIa.', 'Aktif', 2),
(10, 'Habib Al Huda', 'Laki-laki', '469/015/SIP-DS/III.00-WW/IV/2023', '2028-05-25', 'Umum', 'Grand akasia no. 8', '0895343371291', 'habib@yopmail.com', '$2y$10$oWv8gjOs7aDMO4ZygdPsqutxq6ZToR5lrP.757Tk6GfIYHoKObGb.', 'Aktif', 2),
(13, 'Dr.Irgi, S.kom', 'Laki-laki', '448/015/SIP-DS/III.00-WW/IV/2023', '2028-05-25', 'Spesialis Anak', 'Puri serpong 2', '089652456953', 'irgi@yopmail.com', '$2y$10$iahIY.UG01p50Vnj5HkLF.dI7huQ144Oi1yvuaO7HUJ4K90OxYz7K', 'Aktif', 1),
(14, 'Dr.Nanda', 'Perempuan', '439/015/SIP-DS/III.00-WW/IV/2023', '2028-05-25', 'Spesialis Bedah Plastik', 'Perum. BSD City no. 88', '08965245695', 'nanda@yopmail.com', '$2y$10$6ZDOnnjjQIpQty/7cylaPOpp5X3eDKdzlqGOEgWiFp2mxj/EoCz86', 'Aktif', 5),
(15, 'Nisa S. Kom', 'Perempuan', '610/015/SIP-DS/III.00-WW/IV/2023', '2028-05-26', 'Spesialis Jantung & Pembuluh Darah', 'Jl. Buaran 03', '081212312345', 'nisa@yopmail.com', '$2y$10$dNeA.2n881hHqMhVGLV9neJlf/eR/kuQJC9V3y1PHHbgekPmp87ae', 'Aktif', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_klinik`
--

CREATE TABLE `tb_klinik` (
  `id_klinik` int(11) NOT NULL,
  `nama_klinik` varchar(50) NOT NULL,
  `jenis_klinik` enum('Klinik Umum','Klinik Kecantikan','Klinik Gigi','Klinik Spesialis','Klinik Psikologi','Klinik Gizi','Klinik Kesehatan Reproduksi','Klinik Fisioterapi','Klinik Kesehatan Anak','Klinik Geriatri') NOT NULL,
  `alamat_klinik` text NOT NULL,
  `nomor_telp` varchar(15) NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `status_klinik` enum('Buka','Tutup') NOT NULL,
  `id_owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_klinik`
--

INSERT INTO `tb_klinik` (`id_klinik`, `nama_klinik`, `jenis_klinik`, `alamat_klinik`, `nomor_telp`, `jam_buka`, `jam_tutup`, `status_klinik`, `id_owner`) VALUES
(1, 'Klinik Sejahtera Medika', 'Klinik Umum', 'Ruko Palais, Jl. Deltamas Boulevard No.1, Sukamahi, Kec. Cikarang Pusat, Kabupaten Bekasi, Jawa Barat 17530', '02122157007', '08:00:00', '20:00:00', 'Buka', 1),
(2, 'Klinik Makmur Jaya 2', 'Klinik Umum', 'Jl. Puspitek No.5A, Bakti Jaya, Kec. Setu, Kota Tangerang Selatan, Banten 15315', '02175879666', '07:00:00', '21:00:00', 'Buka', 3),
(5, 'Klinik Sa Aesthetic', 'Klinik Kecantikan', 'Jl. RS. Fatmawati Raya No.5C, RW.6, Gandaria Utara, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12140', '081211697659', '11:00:00', '19:00:00', 'Buka', 1),
(6, 'Klinik Widya Darma Husada', 'Klinik Umum', 'Jl. Pajajaran No.1, Pamulang Bar., Kec. Pamulang, Kota Tangerang Selatan, Banten 15417', '02174711820', '09:00:00', '21:00:00', 'Buka', 3),
(8, 'Klinik Paradise', 'Klinik Psikologi', 'Jl. Paradise no. 420', '021420420', '04:00:00', '20:00:00', 'Buka', 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `kode_obat` varchar(10) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `kategori_obat` enum('Lainnya','Fitofarmaka','Generik','Jamu','Kosmetika','Labor','Narkotik','Obat Bebas','Obat Bebas Terbatas','Obat Hebal Terstandar','Obat Keras','OOT','OTC','Paten Antibiotik','Paten Keras','Prekursor','Prekursor Kombinasi','Psikotropik') NOT NULL,
  `jenis_obat` enum('Lainnya','5 Alfa Reduktase Inhibitor','Alfa Bloker','Anafilaksis','Analgesik Narkotik','Analgesik Non Narkotik','Anastetik lokal','Anastetik Umum','Antasida dan ulkus Antibusa (Obat untuk saluran cerna)','Antelmentik Intestinal','Anti ADHD (Psikofarmaka)','Anti Alergi','Anti Anemia','Anti Hipertiroidisme','Antiacne','Antiangina','Antiansietas dan Antiinsomnia (Psikofarmaka)','Antiasma (Obat untuk Saluran Nafas)','Antibakteri','Antibakteri Golongan Aminoglikosida','Antibakteri Golongan Kloramfenikol','Antibakteri Golongan Kuinolon','Antibakteri Golongan lain-lain','Antibakteri Golongan Makrolid','Antibakteri Golongan Penisilin','Antibakteri Golongan Sefalosporin','Antibakteri Golongan Tetrasiklin','Antidementia','Antidepresi dan Antimania (Psikofarmaka)','Antidiabetik Oral','Antidiabetik Parenteral','Antidisritmia','Antidot Khusus','Antidot Umum','Antieksem','Antiemetik (Obat untuk saluran cerna)','Antiepilepsi','Antifilaria','Antifungi(Antimikroba)','Antifungi(Obat Topikal Untuk kulit)','Antihemorrhoid (Obat untuk saluran cerna)','Antihipertensi Gol lain-lain','Antihipertensi Gol. ACE Inhibitor','Antihipertensi Gol.Alpha Bloker','Antihipertensi Gol.Angiotensin II Antagonis','Antihipertensi Gol.Beta Bloker','Antihipertensi Gol.Calcium Channel Blocker','AntiHipotiroidisme','Antihormon','Antiinflamasi (Obat Untuk Mata Topikal)','Antikoagulan Antiplatelet & thrombolitik','Antilepraktik','Antimalaria','Antimigrain','Antimikroba (Obat Untuk Mata Topikal)','Antimuskarinik','Antineoplastik','Antineoplastik','Antiobsesi dan Antimania (Psikofarmaka)','Antiparkinson','Antipirai','Antipiretik','Antipruritus dan Antihistamin topical','Antipsikosis (Psikofarmaka)','Antiradang topical','Antirematik','Antiretroviral','Antiseptik','Antiseptik dan Desinfektan','Antiskabies','Antispasmodik (Obat untuk saluran cerna)','Antituberculosis','Antitusif (Obat untuk Saluran Nafas)','Antivertigo','Antivirus(Antimikroba)','Antivirus(Obat Topikal Untuk kulit)','Dekongestan Antiinfluenzadll (Obat untuk Saluran Nafas)','Diagnostik','Diuretik','Estrogen','Glikosida Jantung','GNRH Analog FSH/LH','Hematopoetik','Hemistatik','Hormon lain','Imunosupresan','Induktor','Inotropik','Kontraseptik','Kortikosteroid dan Kortikotropin','Lain-lain (Obat untuk saluran cerna)','Laksatif (Obat untuk saluran cerna)','Larutan Dialisis','Midriatik (Obat Untuk Mata Topikal)','Mineral','Miotik dan antiglaukoma (Obat Untuk Mata Topikal)','Mukolitik dan Ekspektoran (Obat untuk Saluran Nafas)','Multivitamin','Obat anti Obesitas','Obat mempengaruhi Tulang','Obat untuk Diare (Obat untuk saluran cerna)','Obat untuk Gigi dan Mulut','Obat untuk Mistenia Gravis','Obat Untuk Telinga Hidung Tenggorokan','Oral (Larutan Elektrolit Nutrisi dll)','Parasimpatomimetik','Parental (Larutan Elektrolit Nutrisi dll)','Penghambat Neuromuscular','Penurunan Kolesterol','Produk Darah dan Pengganti Plasma','Progesteron','Relaksan Uterus','Serum dan immunoglobulin','Sistemik (Obat Untuk Mata)','Tonikum','Uterotonik','Vaksin','Vasodilator','Vasokonstriktor','Vitamin A','Vitamin A & Vit.D Kombinasi','Vitamin B','Vitamin B dengan Kombinasi','Vitamin C','Vitamin C & kalsium','Vitamin D','Vitamin D kombinasi','Vitamin Dengan Asam Amino','Vitamin dengan Hormon Geriatrikum','Vitamin dengan mineral','vitamin E','Vitamin Mineral dan Asam Amino') NOT NULL,
  `stok_obat` int(11) NOT NULL,
  `satuan_obat` enum('Aerosol Foam','Aerosol Metered Dose','Aerosol Spray','Alumunium Foil','Amplop','Ampul','Blister','Botol / Fls','Botol Kaca','Botol Plastik','Botol Spray','Bungkus','Buscal Spray','Cairan Diagnostik','Cairan Mata','Cairan Steril','Can','Cartridge','Case','Catch Cover','Chewing Gum','Container','Corrugated Box','Cup Plastik','Dus','Dus Luar','Eliksir','Emulsi','Enema','Flexi Bag','Galon / GLN','Gas','Gel','Gel Mata','Granul Effervescent','Granula','Implant','Infus','Intra Uterine Device (Iud)','Jerigen','Kaca','Kaleng','Kantong','Kantong Infus (Infus Soft Pack)','Kaplet','Kaplet Kunyah','Kaplet Kunyah Salut Selaput','Kaplet Pelepasan Cepat','Kaplet Pelepasan Lambat','Kaplet Salut Enterik','Kaplet Salut Gula','Kaplet Salut Selaput','Kapsul','Kapsul Lunak','Kapsul Pelepasan Lambat','Karton','Kertas','Kotak (Box)','Krim','Krim Lemak','Lainnya','Larutan','Larutan Inhalasi','Larutan Injeksi','Lusin / lsn','Master Box','Obat Kumur','Oral Spray','Ovula','Pack','Pasta','Patch','Pc / Piece','Pcs /Pieces','Pensil','Pessary','Piece Box','Pil','Plastik','Pot','Pot Plastik','Pouch','Roll','Sachet','Salep','Salep -51- Mata','Sampo','Semprot Hidung','Serbuk Aerosol','Serbuk Effervescent','Serbuk Infus','Serbuk Inhaler','Serbuk Injeksi','Serbuk Injeksi Liofilisasi','Serbuk Obat Luar / Serbuk Tabur','Serbuk Oral','Serbuk Spray','Serbuk Steril','Set','Sirup','Sirup Kering','Sirup Kering Pelepasan Lambat','Softbag','Stickpack','Strip','Subdermal Implants','Supositoria','Suspensi','Suspensi Injeksi','Suspensi / Cairan Obat Luar','Syringe','Tablet','Tablet Cepat Larut','Tablet Disintegrasi Oral','Tablet Dispersibel','Tablet Effervescent','Tablet Hisap','Tablet Kunyah','Tablet Lapis','Tablet Lapis Lepas Lambat','Tablet Lepas Lambat','Tablet Pelepasan Cepat','Tablet Salut Enterik','Tablet Salut Gula','Tablet Salut Selaput','Tablet Sublingual','Tablet Sublingual Pelepasan Lambat','Tablet Vaginal','Tabung','Tetes Hidung','Tetes Mata','Tetes Mata Dan Telinga','Tetes Oral (Oral Drops)','Tetes Telinga','Topical Spray','Transdermal','Transdermal Spray','Transdermal Urethral','Tube','Tube Plastik','Tulle / Plester Obat','Vaginal Cream','Vaginal Douche','Vaginal Gel','Vaginal Ring','Vaginal Tissue','Vial','Wrapper') NOT NULL,
  `harga_obat` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`kode_obat`, `nama_obat`, `kategori_obat`, `jenis_obat`, `stok_obat`, `satuan_obat`, `harga_obat`) VALUES
('pndl_mrh', 'Panadol Merah', 'Obat Bebas', 'Anastetik Umum', 10, 'Tablet', 12700);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_owner`
--

CREATE TABLE `tb_owner` (
  `id_owner` int(11) NOT NULL,
  `nama_owner` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat_owner` text NOT NULL,
  `nomor_telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_owner`
--

INSERT INTO `tb_owner` (`id_owner`, `nama_owner`, `jenis_kelamin`, `alamat_owner`, `nomor_telp`, `email`, `password`, `status`) VALUES
(1, 'An Nisa Dira', 'Perempuan', 'Jl. Nusa Loka no.2', '081289063961', 'sasa@yopmail.com', '$2y$10$yGOsWvpX2dpwCJW43.MRwOsqwsM41pRAkZm0rQ1R5rdI8EJHKzwy.', 'Aktif'),
(3, 'Andre Farhan Saputra', 'Laki-laki', 'Jl. Amd Babakan Pocis No.88 Rt04/Rw02', '087733932416', 'andrefarhan@yopmail.com', '$2y$10$r1bTAjQoO0krQThyUXmg.uXVFsvHx9aGbdvDmNXhXiHiFZNHDRDW6', 'Aktif'),
(8, 'Alfitri, S.kom', 'Perempuan', 'Jl. BSD no. 100', '081211697659', 'alfitri@yopmail.com', '$2y$10$GNr7lGqmCp/Vvi5.518fhelYMqG2WwZicXuWHyqa7moJjSb4/SOvu', 'Aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_poli`
--

CREATE TABLE `tb_poli` (
  `id_poli` int(11) NOT NULL,
  `nama_poli` varchar(100) NOT NULL,
  `kategori_pasien` enum('Umum','BPJS','Asuransi','Gratis','Lainnya') NOT NULL,
  `durasi` int(11) NOT NULL,
  `jadwal_poli` varchar(200) NOT NULL,
  `id_dokter` int(11) NOT NULL,
  `status_poli` enum('Buka','Tutup') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_poli`
--

INSERT INTO `tb_poli` (`id_poli`, `nama_poli`, `kategori_pasien`, `durasi`, `jadwal_poli`, `id_dokter`, `status_poli`) VALUES
(6, 'Suntik Putih', 'Umum', 120, 'Senin 11:00 - 16:00\r\nSelasa 11:00 - 16:00\r\nRabu 11:00 - 16:00', 14, 'Buka');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_staff`
--

CREATE TABLE `tb_staff` (
  `id_staff` int(11) NOT NULL,
  `nama_staff` varchar(50) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat_staff` text NOT NULL,
  `nomor_telp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` enum('Perawat','Front Desk','Apoteker','PIC Klinik') NOT NULL,
  `status` enum('Aktif','Tidak Aktif') NOT NULL,
  `id_klinik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_staff`
--

INSERT INTO `tb_staff` (`id_staff`, `nama_staff`, `jenis_kelamin`, `alamat_staff`, `nomor_telp`, `email`, `password`, `role`, `status`, `id_klinik`) VALUES
(7, 'Fachrul', 'Laki-laki', 'jl. Cipete Utara', '087868522275', 'fachrul@yopmail.com', '$2y$10$OKDY5KqHm06YnzXd24cZnOceFsP.znWFuMd9N5uDz3NpXHYNoNRmu', 'PIC Klinik', 'Aktif', 1),
(9, 'Daffa Satria Maulana', 'Laki-laki', 'jl. Pamulang Barat', '089503830982', 'daffa@yopmail.com', '$2y$10$N/88KjmkFYZBJKAsVxffAupgilBa3K1FYF13qpLozKL7FKgGk/KgC', 'Front Desk', 'Aktif', 1),
(14, 'Tasya', 'Perempuan', 'Jl. Boulevard BSD no. 77', '087733932312', 'tasya@yopmail.com', '$2y$10$y58/ZS/EVu249HAq5aAk9uSGN.k4EF0YAfaorNjUQkgJ/NQDvMEdC', 'Front Desk', 'Aktif', 5),
(15, 'Tyo', 'Laki-laki', 'Jl. Merdeka no.22', '081231231234', 'tyo@yopmail.com', '$2y$10$tYwXCg7hRbgsv4zJV.CU7.CGfmyWIa6GC/JrJhK8zrA83k22HWw1S', 'Apoteker', 'Aktif', 1),
(16, 'Nixon Milo', 'Laki-laki', 'Jl. Cemara II no. 10', '085893036320', 'nixonmilo@yopmail.com', '$2y$10$nY4/usjMjAD77/Wqeidyo.GrcMb1N9rBa24RF..u5v8YZPLn0xf6S', 'PIC Klinik', 'Aktif', 2),
(17, 'Aulia', 'Perempuan', 'Jl. Sasmita jaya no. 4', '089657482211', 'aulia@yopmail.com', '$2y$10$FHg6TFOnIk6g4VuSCupOsuChtyjq4LfndGtTOSTAu4ouDXmppZuhu', 'PIC Klinik', 'Aktif', 6),
(18, 'Putri', 'Perempuan', 'Jl. Keputrian no. 72', '081272717282', 'putri@yopmail.com', '$2y$10$e.VPGx2EyVs4r9jLhSzKqOBf2tBBn8zZeffOaSi3w.BmQpCgNvNN6', 'Apoteker', 'Aktif', 6),
(19, 'Okvril', 'Perempuan', 'Jl. Benda Baru no. 44', '089630196175', 'okvril@yopmail.com', '$2y$10$SV7rCkj3N2Y7xx6mIiKjae8TfM1IYuuXkD55NKb/Fh.RMWjN4EVIW', 'Perawat', 'Aktif', 1),
(20, 'Noval Rizky', 'Laki-laki', 'Jl. Pondok Kacang no. 69', '08979223650', 'noval@yopmail.com', '$2y$10$vIaeq3KefnPJHXkqQu3.ke2LfWGHp0oC/eo0LGzo5x1LnhtLYQQ8e', 'Apoteker', 'Aktif', 2),
(21, 'Azriel Fachrulrezy', 'Laki-laki', 'Jl. Cipete Utara no. 4B', '087868522274', 'azriel@yopmail.com', '$2y$10$5Br9EDmOgGgDIFtSmkmZpOKXk9/PNRqUuBLTd24/T8wiSSsVZN5Wu', 'Front Desk', 'Aktif', 2),
(22, 'Annisa Dira', 'Perempuan', 'Jl. Cendana no. 2', '081289063961', 'annisa@yopmail.com', '$2y$10$b7Tp0/oFtWProEYDYp2JuOQg7WLPoycSZa9QSwykr9gbG2MNs1E9S', 'Perawat', 'Aktif', 2),
(23, 'Riska', 'Perempuan', 'jl. sasmita no. 20', '089669137174', 'riska@yopmail.com', '$2y$10$BTfa/ClAIOp2IH.b5tMbD.plcKYbQfgAbEqjDO8hZ1BVDKKgaoYFm', 'Perawat', 'Aktif', 6),
(24, 'Arid', 'Laki-laki', 'jl. pondok pesantren no. 99', '08264786417871', 'arid@yopmail.com', '$2y$10$1ePZeq53tAEF6z.F7qa3J.sd.iK8eUqnsNu3h1/L2uJhQUp5F.zLW', 'Front Desk', 'Aktif', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tarif`
--

CREATE TABLE `tb_tarif` (
  `id_tarif` int(11) NOT NULL,
  `id_poli` int(11) NOT NULL,
  `kategori_poli` enum('Administrasi','Tindakan','Konsultasi','Lainnya') NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `kode_layanan` varchar(20) NOT NULL,
  `tarif` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tb_tarif`
--

INSERT INTO `tb_tarif` (`id_tarif`, `id_poli`, `kategori_poli`, `nama_layanan`, `kode_layanan`, `tarif`) VALUES
(5, 6, 'Tindakan', 'Memutihkan Kulit', 'WhiteSkin001', 1000000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bhp`
--
ALTER TABLE `tb_bhp`
  ADD PRIMARY KEY (`kode_bhp`);

--
-- Indeks untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD KEY `id_klinik` (`id_klinik`);

--
-- Indeks untuk tabel `tb_klinik`
--
ALTER TABLE `tb_klinik`
  ADD PRIMARY KEY (`id_klinik`),
  ADD KEY `id_owner` (`id_owner`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`kode_obat`);

--
-- Indeks untuk tabel `tb_owner`
--
ALTER TABLE `tb_owner`
  ADD PRIMARY KEY (`id_owner`);

--
-- Indeks untuk tabel `tb_poli`
--
ALTER TABLE `tb_poli`
  ADD PRIMARY KEY (`id_poli`),
  ADD KEY `id_dokter` (`id_dokter`);

--
-- Indeks untuk tabel `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD PRIMARY KEY (`id_staff`),
  ADD KEY `id_klinik` (`id_klinik`);

--
-- Indeks untuk tabel `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD PRIMARY KEY (`id_tarif`),
  ADD KEY `id_poli` (`id_poli`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  MODIFY `id_dokter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `tb_klinik`
--
ALTER TABLE `tb_klinik`
  MODIFY `id_klinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_owner`
--
ALTER TABLE `tb_owner`
  MODIFY `id_owner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_poli`
--
ALTER TABLE `tb_poli`
  MODIFY `id_poli` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_staff`
--
ALTER TABLE `tb_staff`
  MODIFY `id_staff` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_tarif`
--
ALTER TABLE `tb_tarif`
  MODIFY `id_tarif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD CONSTRAINT `tb_dokter_ibfk_1` FOREIGN KEY (`id_klinik`) REFERENCES `tb_klinik` (`id_klinik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_klinik`
--
ALTER TABLE `tb_klinik`
  ADD CONSTRAINT `tb_klinik_ibfk_1` FOREIGN KEY (`id_owner`) REFERENCES `tb_owner` (`id_owner`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_poli`
--
ALTER TABLE `tb_poli`
  ADD CONSTRAINT `tb_poli_ibfk_1` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_staff`
--
ALTER TABLE `tb_staff`
  ADD CONSTRAINT `tb_staff_ibfk_1` FOREIGN KEY (`id_klinik`) REFERENCES `tb_klinik` (`id_klinik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tarif`
--
ALTER TABLE `tb_tarif`
  ADD CONSTRAINT `tb_tarif_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `tb_poli` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 May 2021, 20:13:51
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `otobus`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `biletler`
--

CREATE TABLE `biletler` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) DEFAULT NULL,
  `ad_soyad` varchar(250) DEFAULT NULL,
  `cinsiyet` enum('E','K') DEFAULT NULL,
  `eposta` varchar(250) DEFAULT NULL,
  `tc_no` varchar(11) DEFAULT NULL,
  `tel_no` varchar(13) DEFAULT NULL,
  `sefer_id` int(11) DEFAULT NULL,
  `guzergah_id` int(11) DEFAULT NULL,
  `koltuk_no` int(50) DEFAULT NULL,
  `durum` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `biletler`
--

INSERT INTO `biletler` (`id`, `kullanici_id`, `ad_soyad`, `cinsiyet`, `eposta`, `tc_no`, `tel_no`, `sefer_id`, `guzergah_id`, `koltuk_no`, `durum`) VALUES
(5, NULL, 'Kerim Öz', 'E', 'deneme@gmail.com', '14653145', '465444655', 25, NULL, 9, NULL),
(20, NULL, 'aaa', 'E', 'aaa', '123', '123', 20, NULL, 10, NULL),
(21, NULL, 'bb', 'E', 'aaabb', '123', '123', 20, NULL, 10, NULL),
(22, NULL, 'Kerim', 'E', 'dene1me@gmail.com', '5555', '123', 20, NULL, 14, NULL),
(23, NULL, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '123456', '123456', 23, NULL, 29, NULL),
(24, NULL, 'sss', 'E', 'ss', '123', '123', 25, NULL, 8, NULL),
(25, NULL, 'deneme', 'K', 'deneme', '123', '123', 21, NULL, 10, NULL),
(26, NULL, 'Kerim', 'K', 'deneme', '123', '123', 21, NULL, 10, NULL),
(27, NULL, 'Kerim', 'K', 'deneme', '123', '1234', 21, NULL, 10, NULL),
(28, NULL, 'aaa', 'E', 'aaa', 'aaaaa', 'aaaaaa', 20, NULL, 24, NULL),
(32, NULL, 'aaa', 'E', 'aaa', '111', '11', 20, NULL, 8, NULL),
(33, 7, NULL, 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 20, NULL, 11, NULL),
(34, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 20, NULL, 7, NULL),
(35, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 25, NULL, 14, NULL),
(36, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 24, NULL, 28, NULL),
(37, NULL, 'satinalma', 'K', 'satinalma', '12353', '1235', 21, NULL, 25, NULL),
(38, 95, 'Hakkı', 'E', 'haakki@hotmail.com', '222222222', '12345', 20, NULL, 26, NULL),
(39, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 20, NULL, 13, NULL),
(40, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 23, NULL, 10, NULL),
(41, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 42, NULL, 30, NULL),
(42, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 42, NULL, 38, NULL),
(43, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 21, NULL, 12, NULL),
(44, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 31, NULL, 10, NULL),
(45, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 43, NULL, 17, NULL),
(46, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 43, NULL, 20, NULL),
(47, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 45, NULL, 12, NULL),
(48, 7, 'ker', 'E', 'ker', '1111', '111', 18, NULL, 10, NULL),
(49, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 25, NULL, 31, NULL),
(50, NULL, 'awww', 'E', 'deneme@gmail.com', '111111111', '11111111', 21, NULL, 9, NULL),
(51, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 46, NULL, 19, 1),
(52, NULL, 'Murat Güler', 'E', 'murat1111111@gmail.com', '5555555555', '555555555', 46, NULL, 39, 1),
(53, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 46, NULL, 7, 1),
(54, 7, 'Kerim Öz', 'E', 'kerim_oz_113@hotmail.com', '2147483647', '5555555555', 46, NULL, 2, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `duraklar`
--

CREATE TABLE `duraklar` (
  `durak_id` int(11) NOT NULL,
  `adi` varchar(75) DEFAULT NULL,
  `sehir_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `duraklar`
--

INSERT INTO `duraklar` (`durak_id`, `adi`, `sehir_id`) VALUES
(1, 'Adana Merkez Otogarı', 1),
(8, 'Adıyaman Otogarı', 2),
(9, 'Afyon Otogarı', 3),
(10, 'Ağrı Otogarı', 4),
(11, 'Aksaray Otogarı', 68),
(12, 'Amasya Otogarı', 5),
(13, 'Ardahan Otogarı', 75),
(14, 'Artvin Otogarı', 8),
(15, 'Aydın Otogarı', 9),
(16, 'Balıkesir(Ayvalık Otogarı)', 10),
(17, 'Balıkesir Şehirler Otogarı', 10),
(18, 'Bartın Otogarı', 74),
(19, 'Batman Otogarı', 72),
(20, 'Bayburt Otogarı', 69),
(21, 'Bilecik Otogarı', 11),
(22, 'Bingöl Otogarı', 12),
(23, 'Bitlis Otogarı', 13),
(24, 'Bodrum Otogarı(Muğla)', 48),
(25, 'Bolu Otogarı', 14),
(26, 'Burdur Otogarı', 15),
(27, 'Çanakkale Otogarı', 17),
(28, 'Çankırı Otogarı', 18),
(29, 'Çorum Otogarı', 19),
(30, 'Denizli Otogarı', 20),
(31, 'Diyarbakır Otogarı', 21),
(32, 'Düzce Otogarı', 81),
(33, 'Edirne Otogarı', 22),
(34, 'Elazığ Otogarı', 23),
(35, 'Erzincan Otogarı', 24),
(36, 'Erzurum Otogarı', 25),
(37, 'Eskişehir Otogarı', 26),
(38, 'GaziAntep Otogarı', 27),
(39, 'Gelibolu Otogarı(Çanakkale)', 17),
(40, 'Giresun Otogarı', 28),
(41, 'Gümüşhane Otogarı', 29),
(42, 'Hakkari Otogarı', 30),
(43, 'Hatay Otogarı', 31),
(44, 'Iğdır Otogarı', 76),
(45, 'Isparta Otogarı', 32),
(46, 'İstanbul(Dudullu Ataşehir Terminali)', 34),
(47, 'İstanbul(Harem Otogarı)', 34),
(48, 'İstanbul Esenler Otogarı', 34),
(49, 'İstanbul(Alibeyköy Terminali)', 34),
(50, 'İzmir Otogarı', 35),
(51, 'Kahramanmaraş Otogarı', 46),
(52, 'Karabük Otogarı', 78),
(53, 'Karaman Otogarı', 70),
(54, 'Kars Otogarı', 36),
(55, 'Kastamonu Otogarı', 37),
(56, 'Kayseri Otogarı', 38),
(57, 'Kırıkkale Otogarı', 71),
(58, 'Kırklareli Otogarı', 39),
(59, 'Kırşehir Otogarı', 40),
(60, 'Kocaeli Otogarı', 41),
(61, 'Konya Otogarı', 42),
(62, 'Kütahya Otogarı', 43),
(63, 'Malatya Otogarı', 44),
(64, 'Manisa Otogarı', 45),
(65, 'Mardin Otogarı', 47),
(66, 'Muğla Otogarı', 48),
(67, 'Muş Otogarı', 49),
(68, 'Nevşehir Otogarı', 50),
(69, 'Niğde Otogarı', 51),
(70, 'Ordu Otogarı', 52),
(71, 'Osmaniye Otogarı', 80),
(72, 'Rize Otogarı', 53),
(73, 'Sakarya Otogarı', 54),
(74, 'Samsun Otogarı', 55),
(75, 'Siirt Otogarı', 56),
(76, 'Sinop Otogarı', 57),
(77, 'Sivas Otogarı', 58),
(78, 'Şanlıurfa Otogarı', 63),
(79, 'Şırnak Otogarı', 73),
(80, 'Tekirdağ Otogarı', 59),
(81, 'Tokat Otogarı', 60),
(82, 'Trabzon Otogarı', 61),
(83, 'Tunceli Otogarı', 62),
(84, 'Uşak Otogarı', 64),
(85, 'Van Otogarı', 65),
(86, 'Yalova Otogarı', 77),
(87, 'Yozgat Otogarı', 66),
(88, 'Zonguldak Otogarı', 67),
(89, 'Bursa Otogarı', 16),
(90, 'Ankara Otogari', 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `firmalar`
--

CREATE TABLE `firmalar` (
  `id` int(11) NOT NULL,
  `firma_adi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `firmalar`
--

INSERT INTO `firmalar` (`id`, `firma_adi`) VALUES
(1, 'Kamilkoç'),
(2, 'Metro'),
(3, 'Pamukkale'),
(4, 'Nilüfer'),
(5, 'Ali Osman Ulusoy'),
(6, 'Efe Tur'),
(7, 'Cideliler Turizm'),
(8, 'Varan Turizm');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `guzergah`
--

CREATE TABLE `guzergah` (
  `id` int(11) NOT NULL,
  `guzergah_adi` text DEFAULT NULL,
  `sehir_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `guzergah`
--

INSERT INTO `guzergah` (`id`, `guzergah_adi`, `sehir_id`) VALUES
(1, 'Bursa Otogarı - Bandırma Otogarı -Çanakkale Otogarı ', 16),
(2, 'Bursa Otogarı - Yalova Otogarı - Kocaeli Otogarı -İstanbul Otogarı ', 16),
(3, 'Bursa Otogarı - Bilecik Otogarı - Eskişehir Otogarı - Ankara Otogarı', 16),
(4, 'Bursa Otogarı - İnegöl Otogarı - Kütahya Otogarı ', 16),
(5, 'Bursa Otogarı - Balıkesir Otogarı - Manisa Otogarı - İzmir Otogarı ', 16),
(6, 'Bursa Otogarı - Eskişehir Otogarı - Afyon Otogarı - Burdur Otogarı - Antalya Otogarı', 16),
(7, 'Bursa Otogarı - Eskişehir Otogarı - Kütahya Otogarı - Afyon Otogarı - Ispart Otogarı', 16),
(8, 'Ankara Otogarı-Eskişehir Otogarı - İstanbul', 6),
(64, 'Ardahan -Amasya -', NULL),
(65, 'Adana - Artvin - Bartın - ', NULL),
(66, 'Adana - Artvin - Bartın - ', NULL),
(67, 'Adıyaman - Amasya - Ardahan - Burdur - Çankırı - ', NULL),
(68, 'Ağrı - Adana - Amasya - Adana - Bolu - Adana - ', NULL),
(69, 'Ankara - Eskişehir - Bilecik - Bursa - Çanakkale - ', NULL),
(70, 'Adana - Adana - Adana - Adana - Adana - ', NULL),
(71, 'İstanbul - Kocaeli - Bursa - Balıkesir - Manisa - İzmir - ', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `ad_soyad` varchar(50) NOT NULL,
  `eposta` varchar(100) NOT NULL,
  `cinsiyet` enum('E','K') NOT NULL,
  `tc_no` varchar(11) NOT NULL,
  `k_rol` enum('admin','üye') NOT NULL DEFAULT 'üye',
  `tel_no` varchar(13) NOT NULL,
  `sifre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `ad_soyad`, `eposta`, `cinsiyet`, `tc_no`, `k_rol`, `tel_no`, `sifre`) VALUES
(7, 'Kerim Öz', 'kerim_oz_113@hotmail.com', 'E', '1111111111', 'admin', '5555555555', '1234'),
(95, 'Hakkı', 'haakki@hotmail.com', 'E', '222222222', 'üye', '12345', '1234'),
(96, 'Emre Fırtına', 'firtina@gmail.com', 'E', '1111111111', 'üye', '0555555499', '1234'),
(99, 'Mehmet', 'uye@gmail.com', 'E', '', 'üye', '', '1234'),
(100, 'Kerim Öz', 'kerim@gmail.com', 'E', '11111111111', 'üye', '55555555555', '1234');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `muavin`
--

CREATE TABLE `muavin` (
  `id` int(11) NOT NULL,
  `a_muavin` varchar(100) DEFAULT NULL,
  `d_muavin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `muavin`
--

INSERT INTO `muavin` (`id`, `a_muavin`, `d_muavin`) VALUES
(1, 'Recep Akdağ', 'Şafak Gündoğdu'),
(3, 'Kerim Öz', 'Emre Fırtına');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `otobusler`
--

CREATE TABLE `otobusler` (
  `id` int(11) NOT NULL,
  `marka_model` varchar(100) DEFAULT NULL,
  `cikis_yili` smallint(4) DEFAULT NULL,
  `tipi` enum('2+1','2+2') DEFAULT NULL,
  `kapasite` int(11) DEFAULT NULL,
  `plaka` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `otobusler`
--

INSERT INTO `otobusler` (`id`, `marka_model`, `cikis_yili`, `tipi`, `kapasite`, `plaka`) VALUES
(1, 'Temsa Safir', 2008, '2+1', 40, '16OTB68'),
(3, 'Mercedes Tourismo', 2012, '2+2', 45, '17OTB68'),
(4, 'Setra Neoplan', 2009, '2+1', 40, '34TCO88'),
(12, 'Temsa Safir', 2010, '2+1', 40, '34TCB44');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `seferler`
--

CREATE TABLE `seferler` (
  `id` int(11) NOT NULL,
  `otobus_id` int(11) DEFAULT NULL,
  `kalkis` int(11) DEFAULT NULL,
  `varis` int(11) DEFAULT NULL,
  `k_tarih` datetime DEFAULT NULL,
  `v_tarih` datetime DEFAULT NULL,
  `fiyat` int(11) DEFAULT NULL,
  `firma_id` int(11) DEFAULT NULL,
  `sorumlu_id` int(11) DEFAULT NULL,
  `guzergah_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `seferler`
--

INSERT INTO `seferler` (`id`, `otobus_id`, `kalkis`, `varis`, `k_tarih`, `v_tarih`, `fiyat`, `firma_id`, `sorumlu_id`, `guzergah_id`) VALUES
(18, 3, 27, 89, '2021-01-12 19:30:00', '2021-01-13 19:30:00', 65, 3, 2, 1),
(20, 1, 48, 90, '2021-01-12 19:30:00', '2021-01-12 19:30:00', 100, 1, 1, 1),
(21, 4, 48, 90, '2021-01-12 19:30:00', '2021-01-12 19:30:00', 95, 4, 1, 8),
(22, 3, 48, 89, '2021-01-12 19:30:00', '2021-01-12 19:30:00', 85, 5, 2, 1),
(23, 4, 48, 90, '2021-01-14 22:30:00', '2021-01-12 19:30:00', 100, 2, 3, 1),
(24, 4, 48, 90, '2021-01-20 22:30:00', '2021-01-12 19:30:00', 85, 5, 1, 8),
(25, 1, 48, 90, '2021-01-12 19:30:00', '2021-01-12 19:30:00', 100, 1, 1, 8),
(26, 3, 8, 1, '2021-04-21 00:28:56', '2021-04-21 00:28:56', 50, 7, 4, 65),
(27, 3, 8, 9, '2021-04-25 16:44:27', '2021-04-25 16:44:28', 75, 5, NULL, NULL),
(28, 3, 89, 1, '2021-04-25 16:45:43', '2021-04-25 16:45:43', 50, 7, NULL, NULL),
(29, 1, 89, 27, '2021-04-25 16:45:44', '2021-04-25 16:45:44', 60, 6, NULL, NULL),
(30, 1, 89, 27, '2021-04-25 16:49:27', '2021-04-25 16:49:27', 50, 3, NULL, NULL),
(31, 12, 89, 27, '2021-04-26 02:21:54', '2021-04-26 02:21:55', 60, 3, 3, 5),
(32, NULL, 89, 90, '2021-04-26 16:38:11', '2021-04-26 16:38:11', 70, 7, 2, 6),
(33, 1, 1, 1, '2021-01-12 19:30:00', '2021-01-12 19:30:00', 100, 1, 1, 1),
(34, 1, 10, 12, '2021-01-12 19:30:00', '2021-01-12 19:30:00', 50, 1, 1, 1),
(35, 1, 10, 12, '2021-01-12 19:30:00', '2021-01-12 19:30:00', 100, 1, 1, 1),
(36, 1, 1, 10, '2021-05-02 18:34:38', '2021-05-02 18:34:38', 75, 7, 2, 5),
(37, 1, 90, 27, '2021-01-12 19:30:00', '2021-01-12 23:30:00', 100, 3, 1, 69),
(38, 4, 90, 27, '2021-05-02 19:30:00', '2021-05-02 23:30:00', 100, 3, 1, 69),
(39, 1, 1, 1, '2021-05-05 19:30:00', '2021-05-05 19:30:00', 100, 1, 1, 70),
(40, 1, 1, 1, '2021-01-12 19:30:00', '2021-01-12 19:30:00', 444, 1, 1, 1),
(41, 1, 90, 27, '2021-05-03 19:30:00', '2021-05-03 21:30:00', 100, 3, 1, 69),
(42, 3, 89, 27, '2021-05-09 20:30:00', '2021-05-09 23:30:00', 95, 3, 1, 1),
(43, 4, 48, 90, '2021-05-10 19:30:00', '2021-05-11 19:30:00', 100, 3, 1, 8),
(44, 1, 27, 48, '2021-05-10 16:30:00', '2021-05-10 19:30:00', 100, 6, 2, 8),
(45, 4, 48, 50, '2021-05-10 19:30:00', '2021-05-10 02:30:00', 120, 5, 3, 71),
(46, 3, 48, 50, '2021-05-16 19:30:00', '2021-05-16 19:30:00', 100, 6, 1, 71);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sehirler`
--

CREATE TABLE `sehirler` (
  `sehir_id` int(11) NOT NULL,
  `sehir_adi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sehirler`
--

INSERT INTO `sehirler` (`sehir_id`, `sehir_adi`) VALUES
(1, 'Adana'),
(2, 'Adıyaman'),
(3, 'Afyon'),
(4, 'Ağrı'),
(5, 'Amasya'),
(6, 'Ankara'),
(7, 'Antalya'),
(8, 'Artvin'),
(9, 'Aydın'),
(10, 'Balıkesir'),
(11, 'Bilecik'),
(12, 'Bingöl'),
(13, 'Bitlis'),
(14, 'Bolu'),
(15, 'Burdur'),
(16, 'Bursa'),
(17, 'Çanakkale'),
(18, 'Çankırı'),
(19, 'Çorum'),
(20, 'Denizli'),
(21, 'Diyarbakır'),
(22, 'Edirne'),
(23, 'Elazığ'),
(24, 'Erzincan'),
(25, 'Erzurum'),
(26, 'Eskişehir'),
(27, 'Gaziantep'),
(28, 'Giresun'),
(29, 'Gümüşhane'),
(30, 'Hakkari'),
(31, 'Hatay'),
(32, 'Isparta'),
(33, 'Mersin'),
(34, 'İstanbul'),
(35, 'İzmir'),
(36, 'Kars'),
(37, 'Kastamonu'),
(38, 'Kayseri'),
(39, 'Kırklareli'),
(40, 'Kırşehir'),
(41, 'Kocaeli'),
(42, 'Konya'),
(43, 'Kütahya'),
(44, 'Malatya'),
(45, 'Manisa'),
(46, 'Kahramanmaraş'),
(47, 'Mardin'),
(48, 'Muğla'),
(49, 'Muş'),
(50, 'Nevşehir'),
(51, 'Niğde'),
(52, 'Ordu'),
(53, 'Rize'),
(54, 'Sakarya'),
(55, 'Samsun'),
(56, 'Siirt'),
(57, 'Sinop'),
(58, 'Sivas'),
(59, 'Tekirdağ'),
(60, 'Tokat'),
(61, 'Trabzon'),
(62, 'Tunceli'),
(63, 'Şanlıurfa'),
(64, 'Uşak'),
(65, 'Van'),
(66, 'Yozgat'),
(67, 'Zonguldak'),
(68, 'Aksaray'),
(69, 'Bayburt'),
(70, 'Karaman'),
(71, 'Kırıkkale'),
(72, 'Batman'),
(73, 'Şırnak'),
(74, 'Bartın'),
(75, 'Ardahan'),
(76, 'Iğdır'),
(77, 'Yalova'),
(78, 'Karabük'),
(79, 'Kilis'),
(80, 'Osmaniye'),
(81, 'Düzce');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sorumlu`
--

CREATE TABLE `sorumlu` (
  `id` int(11) NOT NULL,
  `sofor_adi` varchar(50) DEFAULT NULL,
  `sofor_adi2` varchar(50) DEFAULT NULL,
  `firma_id` int(11) DEFAULT NULL,
  `muavin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sorumlu`
--

INSERT INTO `sorumlu` (`id`, `sofor_adi`, `sofor_adi2`, `firma_id`, `muavin_id`) VALUES
(1, 'Süleyman Arıcı', 'Mehmet Sedef', 1, 1),
(2, 'Şaban Özdil', NULL, 3, 1),
(3, 'Emre Fırtına', NULL, 3, 1),
(4, 'Murat', NULL, 2, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `biletler`
--
ALTER TABLE `biletler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kullanici_id` (`kullanici_id`),
  ADD KEY `sefer_id` (`sefer_id`);

--
-- Tablo için indeksler `duraklar`
--
ALTER TABLE `duraklar`
  ADD PRIMARY KEY (`durak_id`) USING BTREE,
  ADD KEY `sehir_id` (`sehir_id`);

--
-- Tablo için indeksler `firmalar`
--
ALTER TABLE `firmalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `guzergah`
--
ALTER TABLE `guzergah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sehir_id` (`sehir_id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `muavin`
--
ALTER TABLE `muavin`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `otobusler`
--
ALTER TABLE `otobusler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `seferler`
--
ALTER TABLE `seferler`
  ADD PRIMARY KEY (`id`),
  ADD KEY `otobus_id` (`otobus_id`),
  ADD KEY `firma_id` (`firma_id`),
  ADD KEY `sorumlu_id` (`sorumlu_id`),
  ADD KEY `kalkis` (`kalkis`),
  ADD KEY `varis` (`varis`),
  ADD KEY `guzergah_id` (`guzergah_id`);

--
-- Tablo için indeksler `sehirler`
--
ALTER TABLE `sehirler`
  ADD PRIMARY KEY (`sehir_id`);

--
-- Tablo için indeksler `sorumlu`
--
ALTER TABLE `sorumlu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `firma_id` (`firma_id`),
  ADD KEY `muavin_id` (`muavin_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `biletler`
--
ALTER TABLE `biletler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Tablo için AUTO_INCREMENT değeri `duraklar`
--
ALTER TABLE `duraklar`
  MODIFY `durak_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Tablo için AUTO_INCREMENT değeri `firmalar`
--
ALTER TABLE `firmalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `guzergah`
--
ALTER TABLE `guzergah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- Tablo için AUTO_INCREMENT değeri `muavin`
--
ALTER TABLE `muavin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `otobusler`
--
ALTER TABLE `otobusler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `seferler`
--
ALTER TABLE `seferler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Tablo için AUTO_INCREMENT değeri `sehirler`
--
ALTER TABLE `sehirler`
  MODIFY `sehir_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- Tablo için AUTO_INCREMENT değeri `sorumlu`
--
ALTER TABLE `sorumlu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `biletler`
--
ALTER TABLE `biletler`
  ADD CONSTRAINT `biletler_ibfk_1` FOREIGN KEY (`kullanici_id`) REFERENCES `kullanici` (`id`),
  ADD CONSTRAINT `biletler_ibfk_2` FOREIGN KEY (`sefer_id`) REFERENCES `seferler` (`id`);

--
-- Tablo kısıtlamaları `duraklar`
--
ALTER TABLE `duraklar`
  ADD CONSTRAINT `duraklar_ibfk_1` FOREIGN KEY (`sehir_id`) REFERENCES `sehirler` (`sehir_id`);

--
-- Tablo kısıtlamaları `guzergah`
--
ALTER TABLE `guzergah`
  ADD CONSTRAINT `guzergah_ibfk_1` FOREIGN KEY (`sehir_id`) REFERENCES `sehirler` (`sehir_id`);

--
-- Tablo kısıtlamaları `seferler`
--
ALTER TABLE `seferler`
  ADD CONSTRAINT `seferler_ibfk_1` FOREIGN KEY (`kalkis`) REFERENCES `duraklar` (`durak_id`),
  ADD CONSTRAINT `seferler_ibfk_2` FOREIGN KEY (`varis`) REFERENCES `duraklar` (`durak_id`),
  ADD CONSTRAINT `seferler_ibfk_3` FOREIGN KEY (`otobus_id`) REFERENCES `otobusler` (`id`),
  ADD CONSTRAINT `seferler_ibfk_4` FOREIGN KEY (`firma_id`) REFERENCES `firmalar` (`id`),
  ADD CONSTRAINT `seferler_ibfk_5` FOREIGN KEY (`sorumlu_id`) REFERENCES `sorumlu` (`id`),
  ADD CONSTRAINT `seferler_ibfk_6` FOREIGN KEY (`guzergah_id`) REFERENCES `guzergah` (`id`);

--
-- Tablo kısıtlamaları `sorumlu`
--
ALTER TABLE `sorumlu`
  ADD CONSTRAINT `sorumlu_ibfk_1` FOREIGN KEY (`firma_id`) REFERENCES `firmalar` (`id`),
  ADD CONSTRAINT `sorumlu_ibfk_2` FOREIGN KEY (`muavin_id`) REFERENCES `muavin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

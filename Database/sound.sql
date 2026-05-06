-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2026 at 11:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sound`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_albums`
--

CREATE TABLE `add_albums` (
  `album_id` int(11) NOT NULL,
  `album_name` text DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `album_year` int(11) DEFAULT NULL,
  `album_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_albums`
--

INSERT INTO `add_albums` (`album_id`, `album_name`, `artist_id`, `album_year`, `album_image`) VALUES
(10, 'Punjabi', 36, 2022, '1777840507_sidu.jfif'),
(11, 'Bollywood', 39, 2019, '1777843000_india1.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `add_songs`
--

CREATE TABLE `add_songs` (
  `s_id` int(11) NOT NULL,
  `song_name` varchar(255) NOT NULL,
  `song_image` varchar(255) NOT NULL,
  `song_audio` text NOT NULL,
  `album_id` int(11) NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_songs`
--

INSERT INTO `add_songs` (`s_id`, `song_name`, `song_image`, `song_audio`, `album_id`, `artist_id`, `year_id`) VALUES
(61, 'Goat (Sidhu Moose Wala)', 'sidu.jfif', 'GOAT__Full_Video__Sidhu_Moose_Wala___Wazir_Patar___Sukh_Sanghera___Moosetape(256k).mp3', 10, 36, 12),
(62, 'Dil Da Nh Mada', 'dil da nh mada.jfif', '295__Official_Audio____Sidhu_Moose_Wala___The_Kidd___Moosetape(256k).mp3', 10, 36, 13),
(63, 'Gaer Qanoni Yar Mere', 'qanoni.jfif', 'Gair_Kanooni___Sidhu_Moose_Wala__Official_Video____Latest_Punjabi_Songs_2025(256k).mp3', 10, 36, 15),
(64, 'Sham bi Khoob hae ', 'sham b klhob hae.jfif', 'Shaam_Bhi_Khoob_Hai_Full_Song___Karz___Sunny_Deol___Shilpa_S,_Suniel_S___Kumar_S,_Udit_N,_Alka_Y(256k).mp3', 11, 39, 12),
(65, 'Mera Dil Tor Diya', 'india1.jfif', 'Dil_Mera_Tod_Diya__Full_4K_Video_Song____Alka_Yagnik___Kasoor_Movie(256k).mp3', 11, 39, 12),
(66, 'Jo b Kasmy Khai Thi', 'jo b kasmy khai thi.jfif', 'Jo_Bhi_Kasmein_Khai_Thi_Humne___Raaz,_Bipasha_Basu,_Dino_Morea__Udit_Narayan,_Alka_Yagnik_Hindi_Song(256k).mp3', 11, 39, 12);

-- --------------------------------------------------------

--
-- Table structure for table `add_video`
--

CREATE TABLE `add_video` (
  `video_id` int(11) NOT NULL,
  `video_name` text DEFAULT NULL,
  `video_image` varchar(255) NOT NULL,
  `add_video` text DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `year_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_video`
--

INSERT INTO `add_video` (`video_id`, `video_name`, `video_image`, `add_video`, `album_id`, `artist_id`, `year_id`) VALUES
(25, 'Gaer Qanoni Yar Mere', 'qanoni.jfif', 'Gair_Kanooni___Sidhu_Moose_Wala__Official_Video____Latest_Punjabi_Songs_2025(360p).mp4', 10, 36, 15),
(26, 'Dil Da Ni Mada', 'dil da nh mada.jfif', '295__Official_Audio____Sidhu_Moose_Wala___The_Kidd___Moosetape(360p).mp4', 10, 36, 13),
(27, 'Goat', 'sidu.jfif', 'GOAT__Full_Video__Sidhu_Moose_Wala___Wazir_Patar___Sukh_Sanghera___Moosetape(360p).mp4', 10, 36, 12),
(28, 'Dil Mera Toe Diya', 'india1.jfif', 'Dil_Mera_Tod_Diya__Full_4K_Video_Song____Alka_Yagnik___Kasoor_Movie(360p).mp4', 11, 39, 12),
(29, 'Jo B Kasmy Khai Thi', 'jo b kasmy khai thi.jfif', 'Jo_Bhi_Kasmein_Khai_Thi_Humne___Raaz,_Bipasha_Basu,_Dino_Morea__Udit_Narayan,_Alka_Yagnik_Hindi_Song(360p).mp4', 11, 39, 12),
(30, 'Sham B Khoob Hae', 'sham b klhob hae.jfif', 'Shaam_Bhi_Khoob_Hai_Full_Song___Karz___Sunny_Deol___Shilpa_S,_Suniel_S___Kumar_S,_Udit_N,_Alka_Y(360p).mp4', 11, 39, 12);

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

CREATE TABLE `artist` (
  `artist_id` int(11) NOT NULL,
  `artist_name` varchar(100) NOT NULL,
  `artist_image` varchar(255) NOT NULL,
  `artist_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`artist_id`, `artist_name`, `artist_image`, `artist_description`) VALUES
(36, 'Sidhu Moose Wala', 'sidu1.jpg', 'Legendary Punjabi singer and songwriter known for his powerful lyrics and massive fan following worldwide'),
(37, 'Sidhu Moose Wala', 'qanoni.jfif', 'Legendary Punjabi singer and songwriter known for his powerful lyrics and massive fan following worldwide'),
(38, 'Sidhu Moose Wala', 'dil da nh mada.jfif', 'Legendary Punjabi singer and songwriter known for his powerful lyrics and massive fan following worldwide'),
(39, 'Alka Yagnik ', 'india1.jfif', 'A timeless sad melody by the legendary Alka Yagnik. This song perfectly describes the feeling of a broken heart and lost love. Feel the deep emotions in every lyric.');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(8) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `phone_no` varchar(11) DEFAULT NULL,
  `Role` varchar(30) DEFAULT 'user',
  `Status` varchar(20) DEFAULT 'unverfied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `Name`, `Email`, `Password`, `Address`, `phone_no`, `Role`, `Status`) VALUES
(4, 'Gulzaman', 'admin@gmail.com', 'gul1234', 'karachi', '12345678965', 'admin', 'verified'),
(11, 'hasnain', 'has@gmail.com', 'has1234', 'karachi', '12365478965', 'user', 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `r_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_type` enum('audio','video') NOT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `song_year`
--

CREATE TABLE `song_year` (
  `year_id` int(11) NOT NULL,
  `release_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `song_year`
--

INSERT INTO `song_year` (`year_id`, `release_year`) VALUES
(12, 2019),
(13, 2025),
(14, 2026),
(15, 2022);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_albums`
--
ALTER TABLE `add_albums`
  ADD PRIMARY KEY (`album_id`);

--
-- Indexes for table `add_songs`
--
ALTER TABLE `add_songs`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `cat_id` (`album_id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `add_video`
--
ALTER TABLE `add_video`
  ADD PRIMARY KEY (`video_id`),
  ADD KEY `album_id` (`album_id`),
  ADD KEY `artist_id` (`artist_id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`artist_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `song_year`
--
ALTER TABLE `song_year`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_albums`
--
ALTER TABLE `add_albums`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `add_songs`
--
ALTER TABLE `add_songs`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `add_video`
--
ALTER TABLE `add_video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `song_year`
--
ALTER TABLE `song_year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_songs`
--
ALTER TABLE `add_songs`
  ADD CONSTRAINT `add_songs_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `add_albums` (`album_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `add_songs_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `year_id` FOREIGN KEY (`year_id`) REFERENCES `song_year` (`year_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `add_video`
--
ALTER TABLE `add_video`
  ADD CONSTRAINT `add_video_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `add_albums` (`album_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `add_video_ibfk_2` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`artist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `add_video_ibfk_3` FOREIGN KEY (`year_id`) REFERENCES `song_year` (`year_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

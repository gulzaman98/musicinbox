-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2026 at 07:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
(12, 'Bollywood', 40, 2023, '1778436759_arjit singh.jfif'),
(13, 'Sonu nigam ', 41, 2021, '1778438651_sonu nigam.jfif'),
(14, 'Hollywood', 42, 2025, '1778440102_hollywood.jfif');

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
(67, 'Tere_Hawaale', 'tere hawale.jfif', 'Tere_Hawaale__Full_Video__Laal_Singh_Chaddha___Aamir,Kareena___Arijit,Shilpa___Pritam,Amitabh,Advait(256k).mp3', 12, 40, 12),
(68, '	Phir_Bhi_Tumko_Chaahunga', 'phir b tum ko chahon ga.jfif', 'Phir_Bhi_Tumko_Chaahunga___Arijit_Singh___Tum_Mere_Ho_Iss_Pal_Mere_Ho___Iss_Chahat_Mein_Marr_Jaaunga(256k).mp3', 12, 40, 13),
(69, '	_Humnava_Mere', 'humnava mere.jfif', 'Official_Video__Humnava_Mere_Song___Jubin_Nautiyal___Manoj_Muntashir___Rocky_-_Shiv___Bhushan_Kumar(256k).mp3', 12, 40, 13),
(70, 'Tum_Hi_Aana', 'tum hi ana.jfif', 'Lyrical__Tum_Hi_Aana___Marjaavaan___Riteish_D,_Sidharth_M,_Tara_S__Jubin_Nautiyal,Payal_Dev,Kunaal_V(256k).mp3', 12, 40, 15),
(71, 'KHAIRIYAT', 'khriyt pocho.jfif', 'Full_Song__KHAIRIYAT__BONUS_TRACK____CHHICHHORE___Sushant,_Shraddha___Pritam,_Amitabh_B_Arijit_Singh(256k).mp3', 12, 40, 12),
(72, 'PAl PAl', 'pal pal.jfif', 'Afusic_-_Pal_Pal__Official_Music_Video__Prod._@AliSoomroMusic(256k).mp3', 13, 41, 12),
(73, 'Jaan_Le_Gayi', 'jan lae gai.jfif', 'Jaan_Le_Gayi_-_Bhoomi_2024___Sonu_Nigam,_Vishal_Dadlani___Salim_Sulaiman___Shraddha_Pandit(256k).mp3', 13, 41, 12),
(74, '_Mujh_Me_Kahin_', 'abhi mujh mae.jfif', 'Sonu_Nigam_Performing_Abhi_Mujh_Me_Kahin_-Gima_2012(256k).mp3', 13, 41, 12),
(75, 'Baby Calm Down', 'baby calm down.jfif', 'Baby_Calm_Down__FULL_VIDEO_SONG____Selena_Gomez___Rema_Official_Music_Video_2023___HD_4K(256k).mp3', 14, 42, 13),
(76, 'ED Sheeran', 'ED Sheeran.jfif', 'Ed_Sheeran_-_Shape_Of_You_-_RTL_LATE_NIGHT(256k).mp3', 14, 42, 13),
(77, 'ED Sheeran', 'shakira ed.jfif', 'Ed_Sheeran_-_Shape_Of_You_-_RTL_LATE_NIGHT(256k).mp3', 14, 42, 13),
(78, 'Hips Dont Lie', 'hips.jfif', 'Shakira,_Ed_Sheeran,_Beéle_-_Hips_Don_t_Lie__Anniversary_Version_(256k).mp3', 14, 42, 13),
(79, 'Titanic', 'titani.jfif', 'Titanic_•_My_Heart_Will_Go_On_•_Celine_Dion(256k).mp3', 14, 42, 13),
(80, 'Vasstee', 'vasste.jfif', 'Vaaste_Official_Video_Song___Dhvani_Bhanushali,_TanishkBagchi___Bhushan_K__RadhikaRao,_Vinay_S(256k).mp3', 14, 42, 13);

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
(31, 'KHAIRIYAT', 'khriyt pocho.jfif', 'Full_Song__KHAIRIYAT__BONUS_TRACK____CHHICHHORE___Sushant,_Shraddha___Pritam,_Amitabh_B_Arijit_Singh(360p).mp4', 12, 40, 12),
(32, 'Tum_Hi_Aana', 'tum hi ana.jfif', 'Lyrical__Tum_Hi_Aana___Marjaavaan___Riteish_D,_Sidharth_M,_Tara_S__Jubin_Nautiyal,Payal_Dev,Kunaal_V(360p).mp4', 12, 40, 13),
(33, '_Humnava_Mere', 'humnava mere.jfif', 'Official_Video__Humnava_Mere_Song___Jubin_Nautiyal___Manoj_Muntashir___Rocky_-_Shiv___Bhushan_Kumar(360p).mp4', 12, 40, 13),
(34, 'Phir_Bhi_Tumko_Chaahunga', 'phir b tum ko chahon ga.jfif', 'Phir_Bhi_Tumko_Chaahunga___Arijit_Singh___Tum_Mere_Ho_Iss_Pal_Mere_Ho___Iss_Chahat_Mein_Marr_Jaaunga(360p).mp4', 12, 40, 12),
(35, 'Tere_Hawaale', 'tere hawale.jfif', 'Tere_Hawaale__Full_Video__Laal_Singh_Chaddha___Aamir,Kareena___Arijit,Shilpa___Pritam,Amitabh,Advait(360p).mp4', 12, 40, 12),
(36, '_Mujh_Me_Kahin_', 'abhi mujh mae.jfif', 'Sonu_Nigam_Performing_Abhi_Mujh_Me_Kahin_-Gima_2012(360p).mp4', 13, 41, 12),
(37, '	Jaan_Le_Gayi', 'jan lae gai.jfif', 'Jaan_Le_Gayi_-_Bhoomi_2024___Sonu_Nigam,_Vishal_Dadlani___Salim_Sulaiman___Shraddha_Pandit(360p).mp4', 13, 41, 12),
(38, 'PAl PAl', 'pal pal.jfif', 'Afusic_-_Pal_Pal__Official_Music_Video__Prod._@AliSoomroMusic(360p).mp4', 13, 41, 12),
(39, 'Vasstee', 'vasste.jfif', 'Vaaste_Official_Video_Song___Dhvani_Bhanushali,_TanishkBagchi___Bhushan_K__RadhikaRao,_Vinay_S(360p).mp4', 14, 42, 13),
(40, 'Titanic', 'titani.jfif', 'Titanic_•_My_Heart_Will_Go_On_•_Celine_Dion(360p).mp4', 14, 42, 13),
(41, 'Hips Dont Lie', 'hips.jfif', 'Shakira,_Ed_Sheeran,_Beéle_-_Hips_Don_t_Lie__Anniversary_Version_(360p).mp4', 14, 42, 13),
(42, 'ED Sheeran', 'ED Sheeran.jfif', 'Ed_Sheeran_-_Shape_Of_You_-_RTL_LATE_NIGHT(360p).mp4', 14, 42, 13),
(43, 'ED Sheeran', 'shakira ed.jfif', 'Ed_Sheeran_-_Shape_Of_You_-_RTL_LATE_NIGHT(360p).mp4', 14, 42, 13),
(44, 'Baby Calm Down', 'baby calm down.jfif', 'Baby_Calm_Down__FULL_VIDEO_SONG____Selena_Gomez___Rema_Official_Music_Video_2023___HD_4K(360p).mp4', 14, 42, 13);

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
(40, 'Arijit Singh', 'arjit singh.jfif', 'The hallmark of an Arijit Singh song is the raw emotion. He has a unique ability to make the listener feel the \"dard\" (pain) or the joy in the lyrics. This is why he is the undisputed king of romantic and melancholic ballads.'),
(41, 'Sonu Nigam', 'sonu nigam.jfif', 'Sonu Nigam is famous for his ability to sing in almost any genre—be it high-pitch romantic ballads, energetic dance numbers, or classical-based semi-devotional songs. He has a rare ability to modulate his voice to match the personality of the actor he is singing for.'),
(42, 'Selena Gomez & Rema ', 'hollywood.jfif', 'A massive global phenomenon, this song features a catchy, marimba-led percussion rhythm. It’s a modern pop masterpiece designed for the dance floor, focusing on a story of physical attraction and a budding romance.');

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

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `contact`, `message`) VALUES
(6, 'gulzaman', 'gul@gmail.com', 'nice', 'keep it up'),
(7, 'saad', 'saad@gmail.com', '', 'wonderful'),
(8, '.....', '...@gmail.com', '....', '....');

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
  `Status` varchar(20) DEFAULT 'verfied'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `Name`, `Email`, `Password`, `Address`, `phone_no`, `Role`, `Status`) VALUES
(4, 'Gulzaman', 'admin@gmail.com', 'gul1234', 'karachi', '12345678965', 'admin', 'verified'),
(11, 'hasnain', 'has@gmail.com', 'has1234', 'karachi', '12365478965', 'user', 'verified'),
(12, 'ali', 'ali@gmail.com', 'ali123', 'karachi', '123654788', 'user', 'unverfied');

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

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`r_id`, `item_id`, `item_type`, `user_name`, `rating`, `comment`, `created_at`) VALUES
(6, 30, 'video', 'gulzaman', 5, 'nice song', '2026-05-06 20:13:22'),
(7, 29, 'video', 'amir', 5, 'keep it up', '2026-05-06 20:37:10'),
(8, 25, 'video', 'GULZAMAN', 4, 'Amazing Song', '2026-05-10 19:26:44'),
(9, 80, 'audio', 'GULZAMAN', 5, 'Awesome', '2026-05-11 20:49:30'),
(10, 80, 'audio', 'Hassan', 4, 'Good', '2026-05-11 20:52:09'),
(11, 26, 'video', 'GULZAMAN', 5, 'Lion Of Punjab', '2026-05-11 21:45:34'),
(12, 27, 'video', 'Saad', 5, 'Supper', '2026-05-11 21:48:52');

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
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `add_songs`
--
ALTER TABLE `add_songs`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `add_video`
--
ALTER TABLE `add_video`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `artist`
--
ALTER TABLE `artist`
  MODIFY `artist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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

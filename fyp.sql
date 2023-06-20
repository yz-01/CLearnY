-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 09:15 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `adding`
--

CREATE TABLE `adding` (
  `adding_id` int(9) NOT NULL,
  `course_id` int(9) DEFAULT NULL,
  `cart_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(9) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_password` varchar(30) NOT NULL,
  `admin_phone_number` varchar(12) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `state` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `image_admin` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`, `admin_phone_number`, `admin_email`, `date`, `state`, `role`, `image_admin`) VALUES
(1, 'yoongzhun2001', 'Yoongzhun2001', '0182704553', 'teyyoongzhun@gmail.com', '2021-01-25', 'ACTIVE', 's', NULL),
(2, 'carine', 'Abcd@2001', '0186661136', 'yanchialing01@gmail.com', '2021-01-27', 'ACTIVE', 'n', NULL),
(3, 'stephen ngu chuan yi', 'Sncy7715@', '0123456789', 'sncy7715@gmail.com', '2021-01-27', 'ACTIVE', 'n', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `asnwer_id` int(9) NOT NULL,
  `answer_content` varchar(10000) DEFAULT NULL,
  `question_id` int(9) DEFAULT NULL,
  `answer_simbol` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`asnwer_id`, `answer_content`, `question_id`, `answer_simbol`) VALUES
(1, 'Programming Language', 1, 'a'),
(2, 'Business Language', 1, 'b'),
(3, 'Human Language', 1, 'c'),
(4, 'Design Language', 1, 'd'),
(5, 'Java', 2, 'a'),
(6, 'PHP', 2, 'b'),
(7, 'HTML', 2, 'c'),
(8, 'Python', 2, 'd'),
(9, 'Shoes maker', 3, 'a'),
(10, 'Restaurant', 3, 'b'),
(11, 'Website Development', 3, 'c'),
(12, 'Machine Language', 3, 'd'),
(13, 'RM 100', 4, 'a'),
(14, 'No need', 4, 'b'),
(15, 'Infiniti', 4, 'c'),
(16, 'RM 1 million', 4, 'd'),
(17, 'Business is a formal language comprising a set of instructions that produce various kinds of output.', 5, 'a'),
(18, 'Business is a system of rules created and enforced through social or governmental institutions to regulate behavior,', 5, 'b'),
(19, 'Business  is the measurement, processing, and communication of financial and non financial information about economic entities', 5, 'c'),
(20, 'Business is the activity of making one\'s living or making money by producing or buying and selling products', 5, 'd'),
(21, 'vitamin A', 6, 'a'),
(22, 'vitamin 1', 6, 'b'),
(23, 'vitamin =', 6, 'c'),
(24, 'vitamin z', 6, 'd'),
(25, 'sugar', 7, 'a'),
(26, 'carbohydrates', 7, 'b'),
(27, 'mineral', 7, 'c'),
(28, '-', 7, 'd'),
(33, '-', 9, 'a'),
(34, '-', 9, 'b'),
(35, '-', 9, 'c'),
(36, 'Programming ', 9, 'd'),
(37, 'A programming language', 9, 'a'),
(38, 'a food', 9, 'b'),
(39, 'a water', 9, 'c'),
(40, 'a think', 9, 'd'),
(41, '-', 11, 'a'),
(42, 'make each in prgramming', 11, 'b'),
(43, '-', 11, 'c'),
(44, '-', 11, 'd'),
(45, 'Baking', 12, 'a'),
(46, 'Repair motor', 12, 'b'),
(47, 'machine language', 12, 'c'),
(48, 'artificial intelligence', 12, 'd');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(9) NOT NULL,
  `category_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Information Technology'),
(2, 'Business'),
(3, 'Art and Humanities'),
(4, 'Health and Life'),
(5, 'GYM'),
(7, 'Schoolwork'),
(8, 'Investment'),
(9, 'HomeMake');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(9) NOT NULL,
  `comment_time` time DEFAULT current_timestamp(),
  `comment_content` varchar(150) NOT NULL,
  `comment_date` date DEFAULT current_timestamp(),
  `course_id` int(11) DEFAULT NULL,
  `learner_id` int(9) DEFAULT NULL,
  `rating` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_time`, `comment_content`, `comment_date`, `course_id`, `learner_id`, `rating`) VALUES
(1, '16:16:34', 'Wow, very clear and nice course', '2021-02-25', 1, 1, 5),
(2, '21:11:05', 'Nice video and very helpful', '2021-03-03', 2, 1, 5),
(3, '21:13:02', 'Patient tutors and very clear videos', '2021-03-03', 2, 2, 5),
(4, '15:21:24', 'This is a very useful course for me', '2021-03-04', 2, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contact_id` int(3) NOT NULL,
  `contact_name` varchar(50) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `contact_phone` int(12) NOT NULL,
  `contact_message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contact_id`, `contact_name`, `contact_email`, `contact_phone`, `contact_message`) VALUES
(1, 'TEY YOONG ZHUN', 'teyyoongzhun@gmail.com', 182704553, '1');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(9) NOT NULL,
  `course_video` varchar(1000) NOT NULL,
  `course_name` varchar(1000) NOT NULL,
  `course_description` varchar(10000) NOT NULL,
  `course_price` int(5) NOT NULL,
  `course_duration` int(3) NOT NULL,
  `educator_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `course_image` mediumtext DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `state` varchar(1000) DEFAULT NULL,
  `rating` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_video`, `course_name`, `course_description`, `course_price`, `course_duration`, `educator_id`, `category_id`, `course_image`, `date`, `state`, `rating`) VALUES
(1, 'Learn PYTHON in 5 MINUTES.mp4', 'Learn PYTHON in 7 MINUTESSS', 'Python is one of the top three most popular programming languages in 2019 and everybody is learning Python either to make their life easier', 30, 10, 1, 1, 'it.jpg', '2021-02-25', 'ACTIVE', 5),
(2, 'How do carbohydrates impact your health_ - Richard J. Wood.mp4', 'How do carbohydrates impact your health ?', 'The things we eat and drink on a daily basis can impact our health in big ways. Too many carbohydrates, for instance, can lead to insulin resistance, ', 10, 5, 2, 4, 'Thrive.jpg', '2021-02-25', 'ACTIVE', 4.66667),
(3, 'yt1s.com - WHATEVER IT TAKES My 90 Day Transformation Journey  Siddhant Rai Sikand Fitness Motivation_v144P.mp4', 'WHATEVER IT TAKES My 90 Day Transformation Journey', 'This is a video which I made during a prep for an upcoming physique show, Note : That I had been working out for over 6 years prior to this which is why I had sufficient muscle mass underneath that fat. 90 days is a good amount of period to bring about a really positive change in your body', 10, 5, 2, 5, 'unnamed.jpg', '2021-02-25', 'ACTIVE', NULL),
(4, 'yt1s.com - INVEST HOW TO INVEST IN MALAYSIA WITH ONLY RM100 LITTLE MONEY Subtitles Available_v144P.mp4', 'INVEST HOW TO INVEST IN MALAYSIA WITH ONLY RM100 LITTLE MONEY', 'How to begin investing in Malaysia? or How do i invest with little money or with just RM100?\r\nis it possible? \r\nThese are common questions that many people ask. \r\nHere in this video i will share how you can start with just RM100. \r\nMake investment easy and affordable for you! Regardless if you are a student, a fresh graduate, or tight on budget.', 30, 5, 3, 8, 'investing-terms-you-should-know-356338_FINAL-5c5af82146e0fb0001be7b2c.png', '2021-02-25', 'ACTIVE', NULL),
(5, 'yt1s.com - Why These 3 Businesses Will BOOM In 2021_v144P.mp4', 'Why These 3 Businesses Will BOOM In 2021 ?', '2021 may be the most unpredictable year of the decade. No one knows how people are going to react to new business strategies; no one even knows what some of these business strategies will be. Reopening a business during COVID is like a game of chess: without a plan, you’ll lose. For all those that aspire to start a new business or invest in one, this video is for you.', 20, 7, 3, 2, '1.png', '2021-02-25', 'ACTIVE', NULL),
(6, 'yt1s.com - why you NEED math for programming_v144P.mp4', 'why you NEED math for programming?', 'This 395-lesson course includes video and text explanations of everything from Calculus 1, and it includes 110 quizzes (with solutions!) and an additional 28 workbooks with extra practice problems, to help you test your understanding along the way.', 20, 6, 4, 7, '1_L76A5gL6176UbMgn7q4Ybg.jpeg', '2021-02-25', 'ACTIVE', NULL),
(7, '감성 레터링 케이크 만들기 _ 고등어케이크.mp4', 'Lettering Cake', 'How to make a fluffy Vanilla Sponge Cake.\r\nIt is a easy and delicious basic Sponge Cake recipe, Easy cake Recipe and simple recipe.(genoise, cake sheet)\r\nRecipe ingredients are so simple that anyone can make this cake.', 0, 5, 5, 1, '4702.jpg_wh300.jpg', '2021-02-25', 'ACTIVE', NULL),
(8, 'yt1s.com - Lettering Cake 2편  물결 패턴을 이용한 심플레터링 케이크   Simple Lettering Cake _v144P.mp4', 'Lettering cake 2', 'How to make a fluffy Vanilla Sponge Cake.\r\nIt is a easy and delicious basic Sponge Cake recipe, Easy cake Recipe and simple recipe.(genoise, cake sheet)\r\nRecipe ingredients are so simple that anyone can make this cake.', 0, 5, 5, 9, 'download.png', '2021-02-25', 'ACTIVE', NULL),
(11, 'What is Python_ Why Python is So Popular_.mp4', 'Why Python is So Popular???', 'Why Python is So Popular?', 0, 5, 1, 1, '68747470733a2f2f75706c6f61642e77696b696d656469612e6f72672f77696b6970656469612f636f6d6d6f6e732f7468756d622f632f63332f507974686f6e2d6c6f676f2d6e6f746578742e7376672f37363870782d507974686f6e2d6c6f676f2d6e6f746578742e7376672e706e67.png', '2021-03-03', 'ACTIVE', NULL),
(12, 'yt1s.com - What Can You Do with Python  The 3 Main Applications_v144P.mp4', 'What can you do with python?', 'what python is used for? what can u do with python?', 20, 10, 6, 1, '68747470733a2f2f75706c6f61642e77696b696d656469612e6f72672f77696b6970656469612f636f6d6d6f6e732f7468756d622f632f63332f507974686f6e2d6c6f676f2d6e6f746578742e7376672f37363870782d507974686f6e2d6c6f676f2d6e6f746578742e7376672e706e67.png', '2021-03-04', 'ACTIVE', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discussion_content`
--

CREATE TABLE `discussion_content` (
  `discussion_content_id` int(9) NOT NULL,
  `content` longtext DEFAULT NULL,
  `discussion_time` time DEFAULT current_timestamp(),
  `discussion_date` date DEFAULT current_timestamp(),
  `discussion_room_id` int(9) DEFAULT NULL,
  `who` varchar(100) DEFAULT NULL,
  `educator_id` int(9) DEFAULT NULL,
  `learner_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discussion_content`
--

INSERT INTO `discussion_content` (`discussion_content_id`, `content`, `discussion_time`, `discussion_date`, `discussion_room_id`, `who`, `educator_id`, `learner_id`) VALUES
(1, 'Welcome to Learn PYTHON in 7 MINUTES', '15:17:29', '2021-02-25', 1, 'edu', 1, NULL),
(2, 'Welcome to How do carbohydrates impact your health ?', '15:32:25', '2021-02-25', 2, 'edu', 2, NULL),
(3, 'Welcome to WHATEVER IT TAKES My 90 Day Transformation Journey', '15:41:11', '2021-02-25', 3, 'edu', 2, NULL),
(4, 'Welcome to INVEST HOW TO INVEST IN MALAYSIA WITH ONLY RM100 LITTLE MONEY', '15:45:51', '2021-02-25', 4, 'edu', 3, NULL),
(5, 'Welcome to Why These 3 Businesses Will BOOM In 2021 ?', '15:48:12', '2021-02-25', 5, 'edu', 3, NULL),
(6, 'Welcome to why you NEED math for programming?', '15:57:00', '2021-02-25', 6, 'edu', 4, NULL),
(7, 'Welcome to Lettering Cake', '15:59:52', '2021-02-25', 7, 'edu', 5, NULL),
(8, 'Welcome to Lettering cake 2', '16:00:44', '2021-02-25', 8, 'edu', 5, NULL),
(9, 'Sir what is python?', '16:16:57', '2021-02-25', 1, 'lea', NULL, 1),
(10, 'Sir can i open a restaurant business?', '16:17:17', '2021-02-25', 5, 'lea', NULL, 1),
(11, 'Hi sir, may i know what is the ebst method to improve your body health?', '21:10:42', '2021-03-03', 2, 'lea', NULL, 1),
(12, 'Others that, the method in this video, how can we use carbohydrates to impact your health?', '21:14:10', '2021-03-03', 2, 'lea', NULL, 2),
(13, 'Hi Tey, the best ways i think is sport cuz sport can lowering the chance of osteoporosis or breast cancer later in life', '21:15:31', '2021-03-03', 2, 'edu', 2, NULL),
(14, 'Hi carine, we also can eat the vegetable and fruit for increase the carbohydrates volumn in your body', '21:16:58', '2021-03-03', 2, 'edu', 2, NULL),
(15, 'Wow, thank you sir', '21:17:17', '2021-03-03', 2, 'lea', NULL, 1),
(16, 'okayyy, i will try', '21:17:37', '2021-03-03', 2, 'lea', NULL, 2),
(17, 'Welcome to Why Python is So Popular?', '21:40:23', '2021-03-03', 9, 'edu', 1, NULL),
(18, 'Welcome to What can you do with python?', '15:07:21', '2021-03-04', 10, 'edu', 6, NULL),
(19, 'Well Done!', '15:22:21', '2021-03-04', 2, 'lea', NULL, 3),
(20, 'Thank for your comments', '15:27:37', '2021-03-04', 2, 'edu', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `discussion_room`
--

CREATE TABLE `discussion_room` (
  `discussion_room_id` int(9) NOT NULL,
  `course_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discussion_room`
--

INSERT INTO `discussion_room` (`discussion_room_id`, `course_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 11),
(10, 12);

-- --------------------------------------------------------

--
-- Table structure for table `educator`
--

CREATE TABLE `educator` (
  `educator_id` int(4) NOT NULL,
  `educator_name` varchar(30) NOT NULL,
  `educator_password` varchar(40) NOT NULL,
  `educator_phone_number` varchar(12) NOT NULL,
  `educator_email` varchar(30) NOT NULL,
  `image_educator` varchar(1000) DEFAULT NULL,
  `education` varchar(300) DEFAULT NULL,
  `work_exp` varchar(300) DEFAULT NULL,
  `bio` varchar(10000) DEFAULT NULL,
  `certificates` varchar(300) DEFAULT NULL,
  `currentjob` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `code` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `educator`
--

INSERT INTO `educator` (`educator_id`, `educator_name`, `educator_password`, `educator_phone_number`, `educator_email`, `image_educator`, `education`, `work_exp`, `bio`, `certificates`, `currentjob`, `state`, `date`, `code`) VALUES
(1, 'Yan Chia Ling', 'Yoongzhun2001@', '0182704552', 'teyyoongzhun@gmail.com', 'profilepic.png', 'Multimedia Universsity', ' I also worked for Sunderland University for 3 years preparing and delivering training courses in computing.', 'I am a programmer with over 30 years\' experience gained in a range of industries, the last 16 with IBM.', 'I have gained experience in a wide range of industries including Utilities, Retail, Insurance and the Motor Manufacturing industry. ', 'Computer programmer, analyst and teacher', 'ACTIVE', '2021-02-25', NULL),
(2, 'Stephen Ngu Chuan Yi', 'Stephen2001@', '0123456789', 'sncy7715@gmail.com', '微信图片_20210222115554.jpg', 'Stephen has more than 20 years of experience in the business of wellness, fitness and health industry with both adults and children, is an expert in the Ketogenic Diet, a nutrition health coach and retired professional dancer.', 'Health and fitness professional with AFAA, AEA and ACE', 'During her fitness and wellness coaching career, through private classes, master classes, workshops and coaching groups, Sanda Kruger has helped and taught thousands of students in both health and nutrition.', 'Fitness and Health Coach, Entrepreneur, Real Estate Investor', 'Multimedia University', 'ACTIVE', '2021-02-25', NULL),
(3, 'Lim Le Xiang', 'Lexiang2001@', '0129876543', 'lexiang@gmail.com', '微信图片_20210222115546.jpg', 'Le Xiang is the founder of SharperTrades, LCC, an online trading education site offering a comprehensive training program based on candlestick analysis, technical analysis and option strategies.', 'NCCAOM (National Commission Certification of Acupuncture and Oriental Medicine). ', 'Le Xiang is a swing trader with the main focus on individual stocks and ETFs. He trades US markets, predominantly NASDAQ, New York Stock Exchange (NYSE) and Chicago Mercantile Exchange & Chicago Board of Trade (CME Group) . Occasionally he also trades gold, grains, natural gas and other commodities.', 'Stock, Forex & Commodity Trader, Chinese Medicine Instructor', 'Le Xiang travels extensively to share the teachings of Chinese Medicine. He also has a private pract', 'ACTIVE', '2021-02-25', NULL),
(4, 'Loo Chee Xian', 'Cheexian2001@', '0122247750', 'cheexian@gmail.com', '微信图片_20210222115549.jpg', 'Utar University\r\n', 'Since then, I’ve recorded tons of videos and written out cheat-sheet style notes and formula sheets to help every math student—from basic middle school classes to advanced college calculus—figure out what’s going on, understand the important concepts, and pass their classes, once and for all.', '\r\nI’d go to a class, spend hours on homework, and three days later have an “Ah-ha!” moment about how the problems worked that could have slashed my homework time in half.', '', 'geeky, trusty math tutor', 'ACTIVE', '2021-02-25', NULL),
(5, 'Adrian Lim Jun Hong', 'Adrian2001@', '0162913792', 'adrian@gmail.com', '微信图片_20210222115551.jpg', 'Multimedia University', 'SDS cake maker', 'Hi im adrian and i have 50 year of making cake experince.', 'Making cakes master', 'SDS cake maker', 'ACTIVE', '2021-02-25', NULL),
(6, 'Tey Yoong Zhun', 'Yoongzhun2001', '0189996730', '1191201398@student.mmu.edu.my', 'teyyoongzhun.png', 'Multimedia university', '-promoter', 'Im Yoong Zhun', 'Python by mosh', 'As a student', 'ACTIVE', '2021-03-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `learner`
--

CREATE TABLE `learner` (
  `learner_id` int(9) NOT NULL,
  `learner_name` varchar(30) NOT NULL,
  `learner_password` varchar(40) NOT NULL,
  `learner_phone_number` varchar(12) NOT NULL,
  `learner_email` varchar(30) NOT NULL,
  `image_learner` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp(),
  `code` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `learner`
--

INSERT INTO `learner` (`learner_id`, `learner_name`, `learner_password`, `learner_phone_number`, `learner_email`, `image_learner`, `state`, `date`, `code`) VALUES
(1, 'Tey Yoong Zhun', 'Yoongzhun2001', '0182704553', 'teyyoongzhun@gmail.com', NULL, 'ACTIVE', '2021-02-25', 2024),
(2, 'Carine Yan Chia Ling', 'Carine2001@', '0186661136', 'yanchialing01@gmail.com', NULL, 'ACTIVE', '2021-03-03', NULL),
(3, 'Stephen Ngu Chuan Yi', 'Stephen2001@', '0123456789', 'sncy7715@gmail.com', 'stephen.png', 'ACTIVE', '2021-03-04', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `learner_answer`
--

CREATE TABLE `learner_answer` (
  `learner_answer_id` int(9) NOT NULL,
  `quiz_id` int(9) DEFAULT NULL,
  `question_id` int(9) DEFAULT NULL,
  `answer_id` int(9) DEFAULT NULL,
  `learner_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `learner_answer`
--

INSERT INTO `learner_answer` (`learner_answer_id`, `quiz_id`, `question_id`, `answer_id`, `learner_id`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, 8, 1),
(3, 2, 3, 11, 1),
(4, 2, 4, 14, 1),
(5, 2, 5, 19, 1),
(6, 3, 6, 21, 1),
(7, 3, 6, 21, 1),
(8, 3, 6, 21, 1),
(9, 3, 6, 21, 2),
(10, 1, 1, 1, 2),
(11, 1, 2, 8, 2),
(12, 3, 6, 21, 3),
(13, 3, 7, 28, 3),
(15, 5, 11, 42, 3),
(16, 5, 12, 48, 3);

-- --------------------------------------------------------

--
-- Table structure for table `purchasing_new`
--

CREATE TABLE `purchasing_new` (
  `purchasing_id` int(9) NOT NULL,
  `purchasing_time` time DEFAULT current_timestamp(),
  `purchasing_date` date DEFAULT current_timestamp(),
  `purchasing_status` varchar(200) DEFAULT NULL,
  `learner_id` int(9) DEFAULT NULL,
  `course_id` int(9) DEFAULT NULL,
  `amount` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchasing_new`
--

INSERT INTO `purchasing_new` (`purchasing_id`, `purchasing_time`, `purchasing_date`, `purchasing_status`, `learner_id`, `course_id`, `amount`) VALUES
(1, '16:02:30', '2021-02-25', 'Payment Successfully', 1, 2, 10),
(2, '16:03:20', '2021-02-25', 'Payment Successfully', 1, 1, 20),
(3, '16:06:03', '2021-02-25', 'Payment Successfully', 1, 5, 20),
(4, '17:32:54', '2021-03-03', 'Payment Successfully', 1, 7, 0),
(5, '17:32:54', '2021-03-03', 'Payment Successfully', 1, 6, 20),
(6, '17:32:54', '2021-03-03', 'Payment Successfully', 1, 8, 0),
(7, '17:32:54', '2021-03-03', 'Payment Successfully', 1, 3, 10),
(8, '17:33:12', '2021-03-03', 'Payment Successfully', 1, 4, 30),
(9, '21:12:29', '2021-03-03', 'Payment Successfully', 2, 2, 10),
(10, '21:32:04', '2021-03-03', 'Payment Successfully', 2, 1, 20),
(11, '10:01:59', '2021-03-04', 'Payment Successfully', 1, 11, 0),
(12, '15:18:58', '2021-03-04', 'Payment Successfully', 3, 2, 10),
(13, '15:18:58', '2021-03-04', 'Payment Successfully', 3, 12, 20),
(14, '15:18:58', '2021-03-04', 'Payment Successfully', 3, 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(9) NOT NULL,
  `question_content` varchar(10000) DEFAULT NULL,
  `quiz_id` int(9) DEFAULT NULL,
  `question_answer` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_content`, `quiz_id`, `question_answer`) VALUES
(1, 'What is python ?', 1, 'a'),
(2, 'What is the language that use in this course ?', 1, 'd'),
(3, 'What type of business is needed by nowdays', 2, 'd'),
(4, 'How much is needed to open a business did u think?', 2, 'b'),
(5, 'What is the mean of business ?', 2, 'd'),
(6, 'What type of vitamin is body need?', 3, 'a'),
(7, 'How can i improve body health???', 3, 'b'),
(9, 'What is python?', 4, 'd'),
(11, 'What is the benefit of python?', 5, 'b'),
(12, 'What is the area that can use python and for this programming language?', 5, 'c');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(9) NOT NULL,
  `quiz_time` int(9) DEFAULT NULL,
  `course_id` int(9) DEFAULT NULL,
  `quiz_title` varchar(10000) DEFAULT NULL,
  `question_num` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_time`, `course_id`, `quiz_title`, `question_num`) VALUES
(1, 10, 1, 'Knowledge about Python', 2),
(2, 15, 5, 'Business for nowdays', 3),
(3, 5, 2, 'Knowledge about Health', 1),
(4, 5, 11, 'Python', 1),
(5, 15, 12, 'what is ptyhon', 3);

-- --------------------------------------------------------

--
-- Table structure for table `result_quiz`
--

CREATE TABLE `result_quiz` (
  `result_id` int(9) NOT NULL,
  `result` int(9) DEFAULT NULL,
  `quiz_id` int(9) DEFAULT NULL,
  `learner_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result_quiz`
--

INSERT INTO `result_quiz` (`result_id`, `result`, `quiz_id`, `learner_id`) VALUES
(1, 100, 1, 1),
(2, 33, 2, 1),
(3, 50, 3, 1),
(6, 50, 3, 2),
(7, 100, 1, 2),
(8, 50, 3, 3),
(9, 33, 5, 3);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `cart_id` int(9) NOT NULL,
  `learner_id` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`cart_id`, `learner_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `wallet_id` int(9) NOT NULL,
  `balance` float NOT NULL,
  `educator_id` int(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`wallet_id`, `balance`, `educator_id`) VALUES
(1, 24, 1),
(2, 22, 2),
(3, 30, 3),
(4, 16, 4),
(5, 0, 5),
(6, 16, 6);

-- --------------------------------------------------------

--
-- Table structure for table `website_announcement`
--

CREATE TABLE `website_announcement` (
  `announcement_id` int(9) NOT NULL,
  `announcement_content` varchar(1000) NOT NULL,
  `date_publish` date DEFAULT current_timestamp(),
  `admin_id` int(11) DEFAULT NULL,
  `announcement_title` varchar(10000) DEFAULT NULL,
  `forwho` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `website_announcement`
--

INSERT INTO `website_announcement` (`announcement_id`, `announcement_content`, `date_publish`, `admin_id`, `announcement_title`, `forwho`) VALUES
(1, 'Hi guys, welcome to C-learnY and hope u all can enjoy your life and learn more and more knowledges and skills.', '2021-01-27', 1, 'Welcome to C-learnY', 'all'),
(2, 'Please try to upload some high quality video ', '2021-01-27', 2, 'For All Educator', 'edu'),
(3, 'Please enjoy ya !', '2021-01-27', 2, 'Hi learner', 'lea'),
(4, 'Hi all', '2021-03-04', 1, 'Hi ', 'all');

-- --------------------------------------------------------

--
-- Table structure for table `withdrawal`
--

CREATE TABLE `withdrawal` (
  `withdrawal_id` int(9) NOT NULL,
  `withdrawal_amount` int(9) DEFAULT NULL,
  `withdrawal_bank` varchar(100) DEFAULT NULL,
  `wallet_id` int(9) DEFAULT NULL,
  `account` int(9) DEFAULT NULL,
  `withdrawal_status` varchar(100) DEFAULT NULL,
  `date` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdrawal`
--

INSERT INTO `withdrawal` (`withdrawal_id`, `withdrawal_amount`, `withdrawal_bank`, `wallet_id`, `account`, `withdrawal_status`, `date`) VALUES
(1, 8, 'Maybank', 1, 2147483647, 'Approved', '2021-02-25'),
(2, 10, 'Maybank', 3, 2147483647, 'Pending', '2021-02-25'),
(3, 10, 'Maybank', 2, 2147483647, 'Approved', '2021-03-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adding`
--
ALTER TABLE `adding`
  ADD PRIMARY KEY (`adding_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `cart_id` (`cart_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`asnwer_id`),
  ADD KEY `question_id` (`question_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `learner_id` (`learner_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contact_id`),
  ADD UNIQUE KEY `contact_name` (`contact_name`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `educator_id` (`educator_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `discussion_content`
--
ALTER TABLE `discussion_content`
  ADD PRIMARY KEY (`discussion_content_id`),
  ADD KEY `discussion_room_id` (`discussion_room_id`),
  ADD KEY `educator_id` (`educator_id`),
  ADD KEY `learner_id` (`learner_id`);

--
-- Indexes for table `discussion_room`
--
ALTER TABLE `discussion_room`
  ADD PRIMARY KEY (`discussion_room_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `educator`
--
ALTER TABLE `educator`
  ADD PRIMARY KEY (`educator_id`);

--
-- Indexes for table `learner`
--
ALTER TABLE `learner`
  ADD PRIMARY KEY (`learner_id`);

--
-- Indexes for table `learner_answer`
--
ALTER TABLE `learner_answer`
  ADD PRIMARY KEY (`learner_answer_id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `question_id` (`question_id`),
  ADD KEY `answer_id` (`answer_id`),
  ADD KEY `learner_id` (`learner_id`);

--
-- Indexes for table `purchasing_new`
--
ALTER TABLE `purchasing_new`
  ADD PRIMARY KEY (`purchasing_id`),
  ADD KEY `learner_id` (`learner_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `result_quiz`
--
ALTER TABLE `result_quiz`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `quiz_id` (`quiz_id`),
  ADD KEY `learner_id` (`learner_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `learner_id` (`learner_id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`wallet_id`),
  ADD KEY `educator_id` (`educator_id`);

--
-- Indexes for table `website_announcement`
--
ALTER TABLE `website_announcement`
  ADD PRIMARY KEY (`announcement_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD PRIMARY KEY (`withdrawal_id`),
  ADD KEY `wallet_id` (`wallet_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adding`
--
ALTER TABLE `adding`
  MODIFY `adding_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `asnwer_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contact_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `discussion_content`
--
ALTER TABLE `discussion_content`
  MODIFY `discussion_content_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `discussion_room`
--
ALTER TABLE `discussion_room`
  MODIFY `discussion_room_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `educator`
--
ALTER TABLE `educator`
  MODIFY `educator_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `learner`
--
ALTER TABLE `learner`
  MODIFY `learner_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `learner_answer`
--
ALTER TABLE `learner_answer`
  MODIFY `learner_answer_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `purchasing_new`
--
ALTER TABLE `purchasing_new`
  MODIFY `purchasing_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `result_quiz`
--
ALTER TABLE `result_quiz`
  MODIFY `result_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `cart_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `wallet_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `website_announcement`
--
ALTER TABLE `website_announcement`
  MODIFY `announcement_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `withdrawal`
--
ALTER TABLE `withdrawal`
  MODIFY `withdrawal_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adding`
--
ALTER TABLE `adding`
  ADD CONSTRAINT `adding_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `adding_ibfk_2` FOREIGN KEY (`cart_id`) REFERENCES `shopping_cart` (`cart_id`);

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `comments_ibfk_3` FOREIGN KEY (`learner_id`) REFERENCES `learner` (`learner_id`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`educator_id`) REFERENCES `educator` (`educator_id`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);

--
-- Constraints for table `discussion_content`
--
ALTER TABLE `discussion_content`
  ADD CONSTRAINT `discussion_content_ibfk_1` FOREIGN KEY (`discussion_room_id`) REFERENCES `discussion_room` (`discussion_room_id`),
  ADD CONSTRAINT `discussion_content_ibfk_2` FOREIGN KEY (`educator_id`) REFERENCES `educator` (`educator_id`),
  ADD CONSTRAINT `discussion_content_ibfk_3` FOREIGN KEY (`learner_id`) REFERENCES `learner` (`learner_id`);

--
-- Constraints for table `discussion_room`
--
ALTER TABLE `discussion_room`
  ADD CONSTRAINT `discussion_room_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `learner_answer`
--
ALTER TABLE `learner_answer`
  ADD CONSTRAINT `learner_answer_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`),
  ADD CONSTRAINT `learner_answer_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`),
  ADD CONSTRAINT `learner_answer_ibfk_3` FOREIGN KEY (`answer_id`) REFERENCES `answer` (`asnwer_id`),
  ADD CONSTRAINT `learner_answer_ibfk_4` FOREIGN KEY (`learner_id`) REFERENCES `learner` (`learner_id`);

--
-- Constraints for table `purchasing_new`
--
ALTER TABLE `purchasing_new`
  ADD CONSTRAINT `purchasing_new_ibfk_1` FOREIGN KEY (`learner_id`) REFERENCES `learner` (`learner_id`),
  ADD CONSTRAINT `purchasing_new_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `quiz_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `result_quiz`
--
ALTER TABLE `result_quiz`
  ADD CONSTRAINT `result_quiz_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`),
  ADD CONSTRAINT `result_quiz_ibfk_2` FOREIGN KEY (`learner_id`) REFERENCES `learner` (`learner_id`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`learner_id`) REFERENCES `learner` (`learner_id`);

--
-- Constraints for table `wallet`
--
ALTER TABLE `wallet`
  ADD CONSTRAINT `wallet_ibfk_1` FOREIGN KEY (`educator_id`) REFERENCES `educator` (`educator_id`);

--
-- Constraints for table `website_announcement`
--
ALTER TABLE `website_announcement`
  ADD CONSTRAINT `website_announcement_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`);

--
-- Constraints for table `withdrawal`
--
ALTER TABLE `withdrawal`
  ADD CONSTRAINT `withdrawal_ibfk_1` FOREIGN KEY (`wallet_id`) REFERENCES `wallet` (`wallet_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

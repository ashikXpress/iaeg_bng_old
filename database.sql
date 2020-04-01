-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 01, 2020 at 08:11 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ju`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission_vision_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission_vision_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `description`, `mission_vision_title`, `mission_vision_description`, `created_at`, `updated_at`) VALUES
(1, 'About us  (IAEG Bangladesh National Group)', 'IAEG is established in 1964 &affiliated to the International Union of Geological Sciences (IUGS), a global scientific society with more than 5,000 members and 50+ national groups.\r\n\r\nIAEG Bangladesh  National Group will represent the interests of Engineering Geology and Environment in Bangladesh to build up a strong professional network of Engineering Geologists  and willing to support the aims of the IAEG to attain the following objectives according to IAEG statutes and by laws.', 'Mission and Vision', 'The mission of IAEG Bangladesh  National Group is to foster the Engineering Geology, Geohazards and Environment study in Bangladesh in accordance with IAEG statutes and by laws. \r\n\r\nIAEG_Bangladesh National Group is a leading geological engineering, geo-hazards and environment related scientific and Professional organization of the engineering geologists in Bangladesh and to represent internationally the geological engineering community of the country. Our vision is that the IAEG Bangladesh National Group will work with IAEG and other geo-professional societies and organizations nationally and worldwide to facilitate initiatives that strengthen the engineering geology and environment  discipline. A world in which the risk to human life and to the built environment caused by geological interaction is appropriately managed and reduced', NULL, '2020-03-30 06:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `about_images`
--

CREATE TABLE `about_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `about_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_images`
--

INSERT INTO `about_images` (`id`, `about_id`, `image`, `created_at`, `updated_at`) VALUES
(2, 1, 'uploads/about/AoMLSyyz2hjK8H0eNZwXgCuXoVSeNDXbuXmDJTN0.jpeg', '2020-03-19 19:56:12', '2020-03-24 15:13:54'),
(3, 1, 'uploads/about/owQjTdjZ8QtuiLtBhuEL1ULxvHMPI5zwCgmIYL9m.jpeg', '2020-03-19 19:58:34', '2020-03-25 04:09:26'),
(8, 1, 'uploads/about/zbqkON6uCBWZQSJOhUqIjY1v9tBPBIGK56XQysMk.jpeg', '2020-03-25 04:10:09', '2020-03-25 04:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `category_gallery`
--

CREATE TABLE `category_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_gallery`
--

INSERT INTO `category_gallery` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Student Activities', '2020-03-01 06:49:17', '2020-03-01 06:49:17'),
(2, 'BNG Activities ', '2020-03-01 06:49:54', '2020-03-01 06:49:54'),
(3, 'Event Gallery', '2020-03-01 06:57:31', '2020-03-01 06:57:31'),
(4, 'Field Visit', '2020-03-01 06:57:42', '2020-03-01 06:57:42'),
(5, 'Others', '2020-03-01 06:57:51', '2020-03-01 06:57:51');

-- --------------------------------------------------------

--
-- Table structure for table `category_news`
--

CREATE TABLE `category_news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_news`
--

INSERT INTO `category_news` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Basic News', '2020-03-01 13:16:02', '2020-03-01 13:16:02'),
(2, 'News Letter', '2020-03-01 13:16:02', '2020-03-01 13:16:02');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone_number`, `subject`, `message`, `read_at`, `created_at`, `updated_at`) VALUES
(1, 'Ashik Khan', 'ctashiqkhan@gmail.com', '01726979426', 'test', 'hi..', 1, '2020-03-15 22:23:49', '2020-03-16 09:48:33'),
(2, 'Habib Khan', 'habib@gmail.com', '01726979428', 'This is a test subject', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', 1, '2020-03-16 06:53:55', '2020-03-16 09:43:36'),
(3, 'Ashik Khan', 'ctashiqkhan@gmail.com', '01726979426', 'This is a test subject', 'Mauris at varius orci. Vestibulum interdum felis eu nisl pulvinar, quis ultricies nibh. Sed ultricies ante vitae laoreet sagittis. In pellentesque viverra purus. Sed risus est, molestie nec hendrerit hendrerit, sollicitudin nec ante.', 1, '2020-03-16 09:21:58', '2020-03-16 09:42:55'),
(4, 'Ashik Khan', 'ctashiqkhan@gmail.com', '01726979426', 'This is a test subject', 'Mauris at varius orci. Vestibulum interdum felis eu nisl pulvinar, quis ultricies nibh. Sed ultricies ante vitae laoreet sagittis. In pellentesque viverra purus. Sed risus est, molestie nec hendrerit hendrerit, sollicitudin nec ante.', 1, '2020-03-16 09:23:51', '2020-03-16 09:42:44'),
(6, 'Ashik Khan', 'ctashiqkhan@gmail.com', '01726979426', 'test', 'fdrhe', 1, '2020-03-20 10:38:55', '2020-03-20 10:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_category_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_category_id`, `name`, `description`, `image`, `venue`, `session`, `start_date`, `end_date`, `status`, `created_at`, `updated_at`) VALUES
(15, 1, 'Agence française de développement (AFD)', 'Mauris at varius orci. Vestibulum interdum felis eu nisl pulvinar, quis ultricies nibh. Sed ultricies ante vitae laoreet sagittis. In pellentesque viverra purus. Sed risus est, molestie nec hendrerit hendreri', NULL, 'Dhaka', '2020-2021', '2020-05-02 02:45:00', '2020-05-02 03:30:00', 1, '2020-03-18 06:47:27', '2020-03-20 12:07:09'),
(16, 2, 'The event title is the most important line of text supplied in an event submission, it\'s the first thing a', 'Be clear and engaging. It should be clear what your event is and what it involves. Your event title should not be a guessing game! Help publishers classify your event faster to ensure your event goes live quickly. Your event title should stand out amongst other listings once it is live. Use simple, clear, readable language to guarantee clicks and referrals\r\nInclude Venue. Unique venues are a selling point, use them for your advantage. Well-known, attractive venues are often a talking point online and on social networks. City/Local town locations can also be included depending on your intended reach. Locations are most relevant on your Industry Specific and Global publishers, where it will support the indexing of your event.\r\nInclude Key Speaker(s) and Artist(s). Further adding to the uniqueness of your event, do include well-known speaker(s) and artist(s). These speakers/artists often have their own following and will further enhance the credibility of your event.', NULL, 'Dhaka', '2020-2021', '2020-01-01 19:00:00', '2020-01-01 19:00:00', 1, '2020-03-19 04:05:08', '2020-03-19 04:05:08'),
(17, 3, 'The event title field is set to 75 characters which is the optimal length for syndication purposes.', 'nclude Venue. Unique venues are a selling point, use them for your advantage. Well-known, attractive venues are often a talking point online and on social networks. City/Local town locations can also be included depending on your intended reach. Locations are most relevant on your Industry Specific and Global publishers, where it will support the indexing of your event.\r\nInclude Key Speaker(s) and Artist(s). Further adding to the uniqueness of your event, do include well-known speaker(s) and artist(s). These speakers/artists often have their own following and will further enhance the credibility of your event.', NULL, 'Dhaka', '2020-2021', '2020-02-05 02:45:00', '2020-02-05 02:45:00', 1, '2020-03-19 05:14:29', '2020-03-19 05:14:29'),
(18, 2, 'Ministry of Planning', 'As marketing professionals in the experiential world, we have become accusto to the idea of an ever evolving industry. Brands today are moving away from purely face to face physical experiences, and bringing their essence to life, not only through digital immersion creativity but through new technology as well including Virtual Reality. face physical experiences, and bringing their essence to life, not only through digital immersion creativity but through new technology as well including Virtual Reality As marketing professionals in the experiential world, we have become accusto to the idea of an ever evolving industry. Brands today are moving away from purely face to face physical experiences,', NULL, 'Dhaka', '2020-2021', '2020-02-01 02:45:00', '2020-02-01 03:30:00', 1, '2020-03-20 10:47:19', '2020-03-20 10:47:19'),
(19, 3, 'Ministry of JU', 'As marketing professionals in the experiential world, we have become accusto to the idea of an ever evolving industry. Brands today are moving away from purely face to face physical experiences, and bringing their essence to life, not only through digital immersion creativity but through new technology as well including Virtual Reality. face physical experiences, and bringing their essence to life, not only through digital immersion creativity but through new technology as well including Virtual Reality As marketing professionals in the experiential world, we have become accusto to the idea of an ever evolving industry. Brands today are moving away from purely face to face physical experiences,', NULL, 'Dhaka', '2020-2021', '2020-01-01 02:45:00', '2020-01-01 03:30:00', 1, '2020-03-20 10:54:33', '2020-03-20 10:54:33');

-- --------------------------------------------------------

--
-- Table structure for table `event_category`
--

CREATE TABLE `event_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_category`
--

INSERT INTO `event_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Technical Event', '2020-03-08 05:56:21', '2020-03-08 05:56:25'),
(2, 'Exhibition Event', '2020-03-08 05:56:30', '2020-03-08 05:56:33'),
(3, 'Field Visit Event', '2020-03-08 05:56:38', '2020-03-08 05:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `event_images`
--

CREATE TABLE `event_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_images`
--

INSERT INTO `event_images` (`id`, `image`, `event_id`, `created_at`, `updated_at`) VALUES
(7, 'uploads/event/7L3sRq3oucd1qXNJD1ksycVQ9P8AtzF1NMqbJBLX.jpeg', 15, '2020-03-18 06:47:29', '2020-03-18 06:47:29'),
(8, 'uploads/event/rmNjDfS1dQbVMXY60l5GUzp7h2i4XSm7wXDqNf40.jpeg', 15, '2020-03-18 06:47:29', '2020-03-18 06:47:29'),
(9, 'uploads/event/fyEwcSzNer8RLTTup2mRP2NWlrN12mPgqPlfjJ6i.jpeg', 15, '2020-03-18 06:47:30', '2020-03-18 06:47:30'),
(10, 'uploads/event/9K8pXIJx0pQlTLQwNYM83yTSFQaHWBPVu7pw9Fhb.jpeg', 15, '2020-03-18 06:47:31', '2020-03-18 06:47:31'),
(11, 'uploads/event/vd19uyHfeW72wU38UV6FrENrczvG7mWg1YiyDFWc.jpeg', 16, '2020-03-19 04:05:16', '2020-03-19 04:05:16'),
(12, 'uploads/event/byvZ08wMACef7FfxJ0ij1k5X5cHg3xA3ujM54OsE.jpeg', 16, '2020-03-19 04:05:20', '2020-03-19 04:05:20'),
(13, 'uploads/event/HWRRelcNy7zAYNFJ9rSZCWM9WOtw5HQt7xZCwsbQ.jpeg', 16, '2020-03-19 04:05:22', '2020-03-19 04:05:22'),
(14, 'uploads/event/RslWwaZAbNn6pPu420N5KG40DhYeVzJT3W374El4.jpeg', 16, '2020-03-19 04:05:26', '2020-03-19 04:05:26'),
(15, 'uploads/event/pI7CVjVtcRY736RBsEDRUeXnEZ3Bkn7kO6vTWHiV.jpeg', 16, '2020-03-19 04:05:29', '2020-03-19 04:05:29'),
(16, 'uploads/event/7TlDaV7PWth04Uwmt05xsQxIhPLxU14ZckGseDjh.jpeg', 17, '2020-03-19 05:14:37', '2020-03-19 05:14:37'),
(17, 'uploads/event/LiVnfl6L0fDd0OE9V8FNvW6IpsPjounDXm7F0t02.jpeg', 17, '2020-03-19 05:14:38', '2020-03-19 05:14:38'),
(18, 'uploads/event/ezMjfTaWvghd50cZalkTUSdDwfHFeC08mfWBEfdV.jpeg', 17, '2020-03-19 05:14:40', '2020-03-19 05:14:40'),
(19, 'uploads/event/lyVuqFEQrkMbNKaREbGCyjzinS2zEHg2EqwBIqtB.jpeg', 17, '2020-03-19 05:14:45', '2020-03-19 05:14:45'),
(20, 'uploads/event/r2TKVv0vGMKsYGqgYFLvHf9BUWQUzX0jZuru5jFK.jpeg', 17, '2020-03-19 05:14:46', '2020-03-19 05:14:46'),
(21, 'uploads/event/zkYg0g9740UZNprN4Br9EtaI0RcbuDGtoHsRzvNb.jpeg', 18, '2020-03-20 10:47:19', '2020-03-20 10:47:19'),
(22, 'uploads/event/KMIrqhqzeSc9CRkpiofYHsKsMreiQOvQXDdboLLX.jpeg', 18, '2020-03-20 10:47:19', '2020-03-20 10:47:19'),
(23, 'uploads/event/dSYwAtnl4kxpZuNAceEZqmLObr6PVWkOqfGMXB2v.jpeg', 18, '2020-03-20 10:47:19', '2020-03-20 10:47:19'),
(31, 'uploads/event/EOVkwLudm7PjSFZ176spzqwSJuvXslXS2seZ3kII.jpeg', 19, '2020-03-20 12:04:29', '2020-03-20 12:04:29'),
(32, 'uploads/event/ymgpMD8AmkwQhuHrWOkwjmWI2LGZZaiaoalXIg1V.jpeg', 19, '2020-03-20 12:04:29', '2020-03-20 12:04:29'),
(33, 'uploads/event/UziKVXRZ1fPH09TfBSsyWrwnNhjezgtnmk5D9Y9t.jpeg', 19, '2020-03-20 12:04:29', '2020-03-20 12:04:29'),
(34, 'uploads/event/9iKTIeHnbvMbBQwWVeVf1qqFDXpAfIXmbKffQ8a3.jpeg', 19, '2020-03-20 12:04:29', '2020-03-20 12:04:29');

-- --------------------------------------------------------

--
-- Table structure for table `event_member`
--

CREATE TABLE `event_member` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `exhibition_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paper_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author_affiliation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `corresponding_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `abstract_doc_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presentation_ppt_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TrxID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_cheque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` tinyint(4) NOT NULL DEFAULT 0,
  `date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_member`
--

INSERT INTO `event_member` (`id`, `event_id`, `member_id`, `exhibition_category`, `paper_title`, `author_affiliation`, `corresponding_email`, `abstract_doc_file`, `presentation_ppt_file`, `payment_method`, `amount`, `TrxID`, `bank_cheque`, `payment_status`, `date`) VALUES
(15, 18, 10, 'gold', NULL, NULL, NULL, NULL, NULL, 'bank', '1400', NULL, 'uploads/event_file/APABat2Eynv5bTBKqimCkuz8IFTS5Qefo84lvl1S.png', 0, '2020-03-25 07:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `category_id`, `image`, `created_at`, `updated_at`) VALUES
(16, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 1, 'uploads/gallery/aAL3PqsQpi8VqIZTyloJtvTdZJDun8blCpaeb0Fy.jpeg', '2020-03-16 11:43:56', '2020-03-25 05:28:42'),
(17, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.  zzzzzzzz', 5, 'uploads/gallery/7WB3UyULczx8FByxCUNmDuJgjcnmff5JhPbZSkXo.jpeg', '2020-03-16 11:45:12', '2020-03-25 05:28:56'),
(18, 'test', 1, 'uploads/gallery/RFguZQMUXkqNLgE7thtypSxruEdwzZrK3Z8qDcjw.jpeg', '2020-03-25 05:15:44', '2020-03-25 05:15:44'),
(19, 'test', 5, 'uploads/gallery/HVhb7TJH7FQvLPgFCQgmk5lksnPn0zH2o2MdthNd.jpeg', '2020-03-25 05:29:14', '2020-03-25 05:29:14');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_type_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `verify` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_member` tinyint(4) DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `member_type_id`, `first_name`, `middle_name`, `last_name`, `date_of_birth`, `email`, `password`, `mobile_number`, `contact_address`, `profile_image`, `verify`, `is_member`, `status`, `created_at`, `remember_token`, `updated_at`) VALUES
(10, NULL, 'Md.Asad', 'ul', 'Kanir', '2018-07-10', 'asad@2aitbd.com', '$2y$10$maDGYg99YgnFUkpwZYCXbeAHVeFqTYBheYjjyOpZDplbQDKou0eMO', '01727843280', '2A IT', 'uploads/profile_image/BSQnQWw36MWFz0RgcSIQPMpiaCTJi0poP5RkMPJr.jpeg', NULL, 0, 1, '2020-03-25 07:15:17', NULL, '2020-03-25 07:15:17'),
(11, NULL, 'Md', 'Ashik', 'Khan', '2020-03-02', 'superadmin@gmail.com', '$2y$10$1C8g.BcZO4tBNDLuObjegexwKVRIAmhPxVDuJ/vdGwuXLgDQoJsXO', '01726979426', 'Naogaon', 'uploads/profile_image/oglWNcmEN3tPCwRY3Hu3unNwGjvKF9mMfieX7E2T.jpeg', NULL, 0, 1, '2020-03-30 10:21:44', NULL, '2020-03-30 10:21:44');

-- --------------------------------------------------------

--
-- Table structure for table `member_payments`
--

CREATE TABLE `member_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TrxID` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_cheque` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_types`
--

CREATE TABLE `member_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `member_types`
--

INSERT INTO `member_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Executive Committee Members', '2020-03-30 08:46:51', '2020-03-30 08:47:00'),
(2, 'Foundry Members', '2020-03-08 09:40:06', '2020-03-08 09:40:06'),
(3, 'Current Members', '2020-03-08 09:40:06', '2020-03-08 09:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_02_22_183850_create_permission_tables', 1),
(5, '2020_02_24_165508_create_products_table', 1),
(6, '2020_03_01_072020_create_sliders_table', 2),
(7, '2020_03_01_084058_create_news_table', 2),
(8, '2020_03_01_084124_create_galleries_table', 2),
(9, '2020_03_01_084058_create_category_gallery_table', 3),
(10, '2020_03_01_084058_create_category_news_table ', 4),
(11, '2020_03_08_054757_create_event_category_table', 5),
(12, '2020_03_08_054932_create_events_table', 5),
(13, '2020_03_08_092605_create_member_types_table', 6),
(14, '2020_03_08_092803_create_members_table', 6),
(15, '2020_03_16_040357_create_contacts_table', 7),
(16, '2020_03_16_185828_create_event_images_table', 8),
(19, '2020_03_18_161050_create_event_member_table', 9),
(21, '2020_03_18_184409_create_member_payments_table', 10),
(22, '2020_03_20_004609_create_abouts_table', 11),
(23, '2020_03_20_013553_create_about_images_table', 12),
(25, '2020_03_20_121810_create_social_links_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(1, 'App\\User', 5);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_or_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `category_id`, `description`, `image_or_file`, `user_id`, `upload_date`, `created_at`, `updated_at`) VALUES
(10, 'STUDENT NEWS', 1, 'Young Engineering Geology & Environment Student Forum of Bangladesh (YEGESFB)  has been formed in Jan. 2018. The mission of Young Engineering Geology & Environment Student Forum of Bangladesh (YEGSFB) is to foster the Engineering Geology, Geohazards and Environment study, research and societal wellbeing for the common people of   Bangladesh .\r\nYEGSFB will organize a day long event for the geoscience students in 2020. Seminars, posters competition  will be organized  by students wing to enhance the communication & Presentation  skills of the geoscience students and  a carrier fair will also be organized for the students.\r\nThe first IAEG_BNG NATIONAL EVENT 2018 was held at Jahangirnagar University, on April , 2018. Several activities were organized. The event started on the 24th April, 2018 with events for the students, including “Geo-engineering Quiz Competition, documentary and video shows and a students’ rally on geo-engineering issues, highlighting the problems and issues of engineering geology and solutions for sustainable development of Bangladesh which was organized jointly  by  Bangladesh National Group of IAEG & “Young Engineering Geology Students’ Forum of Bangladesh_JU (YEGSFB-JU). Best participants of the Quiz Competition were awarded.', 'uploads/basic_news/K39ynwQUaqYnygdBw4eVhugUrRDhmH5bgfFZ9KxO.jpeg', 1, '2018-04-23 18:00:00', '2020-03-30 06:18:36', '2020-03-30 06:22:31'),
(11, 'IAEG_BNG NEWS', 1, 'IAEG_BNG and Department of Geological Sciences, Jahangirnagar University had the pleasure to welcome distinguished Professors from Japan including Prof. Dr. Taiichi Hayashi from Kyoto University, Prof. Toru Terao from Kagawa University, Dr. F. Fumie Murata from Kochi University and Dr. Y. Yusuke Yamane from Tokoha University Japan. IAEG_BNG would like to express sincere thanks to all visitors from Japan. \r\nIAEG_BNG National Group also organized two seminars on the 6th September & 26th Nov. 2018 at the Department of Geological Sciences, Jahangirnagar University. Mr.Newaz Khalis Ahmed, Consultant Geologist from Stantec Limited, Calgary Canada presented a talk and highlighted the importance of Geoscience Education and Carriers of Geoscientists in Canada for the future Young professionals of Bangladesh. On the 26th Nov. 2018 Civil Engineer Dr, S.I.Khan, Former UN Environmental Consultant presented an informative talk on poverty alleviation using geo-engineering.', 'uploads/basic_news/AcQHThz3jFvivfO7CPAvQgMzGvZiYE0oa9L5Up0M.jpeg', 1, '2018-09-05 18:00:00', '2020-03-30 06:27:42', '2020-03-30 06:27:42'),
(12, 'NEWS IAEG_BNG BANGLADESH NATIONAL GROUP 2018', 1, 'The first IAEG_BNG NATIONAL EVENT 2018 was held at Jahangirnagar University, on April , 2018. Several activities were organized. The event started on the 24th April, 2018 with events for the students, including “Geo-engineering Quiz Competition, documentary and video shows and a students’ rally on geo-engineering issues, highlighting the problems and issues of engineering geology and solutions for sustainable development of Bangladesh which was organized jointly  by  Bangladesh National Group of IAEG & “Young Engineering Geology Students’ Forum of Bangladesh_JU (YEGSFB-JU). Best participants of the Quiz Competition were awarded. Scientific session was mainly focused on the key issues related with “Geological Engineering, Geo-hazards & Development” of Bangladesh. The inaugural session had started with the welcome speech of IAEG_Bangladesh National Group President--Prof.Dr. A.T.M. Shakhawat Hossain. Vice Chancellor of Jahangirnagar University, Professor Dr. Farzana Islam, was present as the Chief Guest. The dean of the Faculty of “Mathematical and Physical Sciences”- Prof.Dr.Ajit Kumar Majumder, the Director General of the Geological Survey of Bangladesh--Dr.Reshad Md. Ekram Ali & Professor Dr. M. Qumrul Hassan, Professor of Department of Geology, University of Dhaka, were also present as special guests. More than 200 participants, including geoscientists from different National organizations, academics, engineers, policy makers and YEGSFB-JU attended this event at JU. Learned speakers from USA and Bangladesh presented their technical papers in three technical sessions and highlighted the current problems and solutions in geological engineering professional works, site investigations, climate resilient housing for sustainable development of Bangladesh, Climate change impacts at macro and micro levels, challenges and issues of sustainable water resource management of Bangladesh, 3D geological modeling and its importance for sustainable urban development, challenges and issues in managing landslide hazards of Bangladesh and importance of developing an early warning system for Bangladesh. Important construction issues on the construction of Rooppur Nuclear power plant and geotechnical issues on Land development and reclamation of Martarbari Ultra super critical coal fired power plant papers are presented. All the participants acknowledged the importance of geological engineering for future development of Bangladesh. Bangladesh National Group is also working for societal and sustainable development.\r\nIAEG_BNG and Department of Geological Sciences, Jahangirnagar University had the pleasure to welcome distinguished Professors from Japan including Prof. Dr. Taiichi Hayashi from Kyoto University, Prof. Toru Terao from Kagawa University, Dr. F. Fumie Murata from Kochi University and Dr. Y. Yusuke Yamane from Tokoha University Japan. IAEG_BNG would like to express sincere thanks to all visitors from Japan. \r\nIAEG_BNG National Group also organized two seminars on the 6th September & 26th Nov. 2018 at the Department of Geological Sciences, Jahangirnagar University. Mr.Newaz Khalis Ahmed, Consultant Geologist from Stantec Limited, Calgary Canada presented a talk and highlighted the importance of Geoscience Education and Carriers of Geoscientists in Canada for the future Young professionals of Bangladesh. On the 26th Nov. 2018 Civil Engineer Dr, S.I.Khan, Former UN Environmental Consultant presented an informative talk on poverty alleviation using geo-engineering.', 'uploads/basic_news/gqfmvOU0e3AfUQVheicsi8E6sGpH3z3cd775jc3i.jpeg', 1, '2018-09-23 18:00:00', '2020-03-30 06:40:39', '2020-03-30 06:40:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('superadmin@gmail.com', '$2y$10$z2y/Io3Enj6d3m.e.kO13.RjKfCSWhwBUhGRZWTg3GQXVn.QP0IjO', '2020-03-19 17:05:11');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'web', '2020-02-28 07:37:35', '2020-02-28 07:37:35'),
(2, 'user-create', 'web', '2020-02-28 07:37:35', '2020-02-28 07:37:35'),
(3, 'user-edit', 'web', '2020-02-28 07:37:35', '2020-02-28 07:37:35'),
(4, 'user-delete', 'web', '2020-02-28 07:37:35', '2020-02-28 07:37:35'),
(5, 'role-list', 'web', '2020-02-28 07:37:35', '2020-02-28 07:37:35'),
(6, 'role-create', 'web', '2020-02-28 07:37:35', '2020-02-28 07:37:35'),
(7, 'role-edit', 'web', '2020-02-28 07:37:35', '2020-02-28 07:37:35'),
(8, 'role-delete', 'web', '2020-02-28 07:37:36', '2020-02-28 07:37:36'),
(13, 'about', 'web', '2020-03-24 09:46:31', '2020-03-24 09:46:31'),
(14, 'slider-list', 'web', '2020-03-24 09:47:23', '2020-03-24 09:47:23'),
(16, 'slider-create', 'web', '2020-03-24 09:48:17', '2020-03-24 09:48:17'),
(17, 'slider-edit', 'web', '2020-03-24 09:48:40', '2020-03-24 09:48:40'),
(18, 'slider-delete', 'web', '2020-03-24 09:48:49', '2020-03-24 09:48:49'),
(19, 'gallery-list', 'web', '2020-03-24 09:49:10', '2020-03-24 09:49:10'),
(20, 'gallery-create', 'web', '2020-03-24 09:49:19', '2020-03-24 09:49:19'),
(21, 'gallery-edit', 'web', '2020-03-24 09:49:27', '2020-03-24 09:49:27'),
(22, 'gallery-delete', 'web', '2020-03-24 09:49:38', '2020-03-24 09:49:38'),
(23, 'news-list', 'web', '2020-03-24 09:49:53', '2020-03-24 09:49:53'),
(24, 'news-create', 'web', '2020-03-24 09:50:10', '2020-03-24 09:50:10'),
(25, 'news-edit', 'web', '2020-03-24 09:50:17', '2020-03-24 09:50:17'),
(26, 'news-delete', 'web', '2020-03-24 09:50:24', '2020-03-24 09:50:24'),
(27, 'event-list', 'web', '2020-03-24 09:50:39', '2020-03-24 09:50:39'),
(28, 'event-create', 'web', '2020-03-24 09:50:48', '2020-03-24 09:50:48'),
(29, 'event-edit', 'web', '2020-03-24 09:51:00', '2020-03-24 09:51:00'),
(30, 'event-delete', 'web', '2020-03-24 09:51:07', '2020-03-24 09:51:07'),
(31, 'event-approved-list', 'web', '2020-03-24 09:51:36', '2020-03-24 09:51:36'),
(32, 'event-unapproved-list', 'web', '2020-03-24 09:51:45', '2020-03-24 09:51:45'),
(33, 'member-approved-list', 'web', '2020-03-24 09:52:04', '2020-03-24 09:52:04'),
(34, 'member-unapproved-list', 'web', '2020-03-24 09:52:11', '2020-03-24 09:52:11'),
(35, 'contact-mail-manage', 'web', '2020-03-24 09:52:33', '2020-03-24 09:52:33'),
(36, 'social-links', 'web', '2020-03-24 09:52:48', '2020-03-24 09:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2020-02-28 07:39:53', '2020-02-28 07:44:24'),
(4, 'Ashik Khan', 'web', '2020-03-24 11:04:54', '2020-03-24 11:04:54');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 4),
(2, 1),
(2, 4),
(3, 1),
(3, 4),
(4, 1),
(4, 4),
(5, 1),
(5, 4),
(6, 1),
(6, 4),
(7, 1),
(7, 4),
(8, 1),
(8, 4),
(13, 1),
(14, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `sub_title`, `image`, `sort`, `created_at`, `updated_at`) VALUES
(19, '1ST GEO-ENGINEERING, CLIMATE CHANGE & SUSTAINABLE DEVELOPMENT    CONFERENCE,', 'BANGLADESH (1ST GECCSD-2021)05-07 MARCH,2021', 'uploads/slider/LC56M3FHvOWtR3qDllj4h72z4SvDp5awhzCbJO0I.jpeg', 1, '2020-03-24 15:15:55', '2020-03-24 15:15:55'),
(20, '1ST GEO-ENGINEERING, CLIMATE CHANGE & SUSTAINABLE DEVELOPMENT CONFERENCE,', 'BANGLADESH (1ST GECCSD-2021)05-07 MARCH,2021', 'uploads/slider/WJYDx8F2Py09rdmnPUFyht85lohyd6Zf1tTxosNz.jpeg', 2, '2020-03-24 15:16:16', '2020-03-24 15:16:16'),
(21, '1ST GEO-ENGINEERING, CLIMATE CHANGE & SUSTAINABLE DEVELOPMENT CONFERENCE,', 'BANGLADESH (1ST GECCSD-2021)05-07 MARCH,2021', 'uploads/slider/UTeNbsI0OH9tlqXzzXbCvytJIrQdFmS3kQN7baDI.jpeg', 3, '2020-03-24 15:16:33', '2020-03-24 15:16:33'),
(22, '1ST GEO-ENGINEERING, CLIMATE CHANGE & SUSTAINABLE DEVELOPMENT CONFERENCE,', 'BANGLADESH (1ST GECCSD-2021)05-07 MARCH,2021', 'uploads/slider/0snEdOP6oRPLEid3jc1jhhVoWpXoQPJP0JUuHPuO.jpeg', 4, '2020-03-24 15:16:47', '2020-03-24 15:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://facebook.com',
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://twitter.com',
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://youtube.com',
  `linkend` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://linkend.com',
  `google_plus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://google-plus.com',
  `instragram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'http://instragram.com',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `facebook`, `twitter`, `youtube`, `linkend`, `google_plus`, `instragram`, `created_at`, `updated_at`) VALUES
(1, 'http://facebook.com/ashikXpress2', 'http://twitter.com/ashikXpress', 'http://youtube.com', 'http://linkend.com', 'http://google-plus.com', 'http://instragram.com', NULL, '2020-03-20 06:54:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Ashik Khan', 'superadmin@gmail.com', NULL, '$2y$10$Wp5bHrKktcUEQnfXHmfsXeifCTGBPwraoenu3AJuU69uurxAasTvO', 'b9elcXmYSvb83uPwquTomzKjqnupJ8GLHDwDGP7tmobc5Efc1uQcVTjt7Bay', '2020-02-28 07:39:52', '2020-03-15 21:57:45'),
(5, 'Ashik Khan', 'ctashiqkhan@gmail.com', NULL, '$2y$10$alzIOFTMqOGDKPb5VaAlgOObhoL/5MU1gqs1z47Ifk5nvdXLrfrga', 'DjvRpVrBuRAmEL5q6AylvLKDrf9I0FDGA6dJcFrRDt6tvUNf3jWtCbIN6Jem', '2020-03-24 11:11:34', '2020-03-24 13:09:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_images`
--
ALTER TABLE `about_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_gallery`
--
ALTER TABLE `category_gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_news`
--
ALTER TABLE `category_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_category`
--
ALTER TABLE `event_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_images`
--
ALTER TABLE `event_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_member`
--
ALTER TABLE `event_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `members_email_unique` (`email`),
  ADD UNIQUE KEY `members_mobile_number_unique` (`mobile_number`);

--
-- Indexes for table `member_payments`
--
ALTER TABLE `member_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_types`
--
ALTER TABLE `member_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_images`
--
ALTER TABLE `about_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category_gallery`
--
ALTER TABLE `category_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category_news`
--
ALTER TABLE `category_news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `event_category`
--
ALTER TABLE `event_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `event_images`
--
ALTER TABLE `event_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `event_member`
--
ALTER TABLE `event_member`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `member_payments`
--
ALTER TABLE `member_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `member_types`
--
ALTER TABLE `member_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

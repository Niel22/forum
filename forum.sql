-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2024 at 08:02 PM
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
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(4) NOT NULL,
  `name` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`) VALUES
(1, 'Design', '2024-02-24 10:43:52'),
(2, 'Programming', '2024-02-24 10:43:52'),
(3, 'Marketing', '2024-02-24 10:43:52');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(9) NOT NULL,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `author` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `author`, `category`, `created_at`) VALUES
(1, 'Why Bootstrap 4 is so awesome?', 'This tutorial follows Bootstrap 4, which was released in 2018, as an upgrade to Bootstrap 3, with new components, faster stylesheetc, more', 'NIEL', 'Programming', '2024-02-22 09:31:09'),
(2, 'HELP! My Windows XP machine is down', 'A single reluctant process can slow down or halt the shutdown process. Best thing to do is analyze running processes/services, for example with HijackThis and Process Explorer, and kill the unnecessary ones. Reboot and repeat until the shutdown process …', 'ONLY SON', 'Design', '2024-02-22 09:39:42'),
(3, 'Custom shortcut or command to launch command in terminal?', ' The shortcuts for commands are known as aliases. The syntax to create an alias is: alias custom_command=\'original_command', 'Daniel', 'Marketing', '2024-02-24 10:25:03'),
(4, 'Fourth question', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'NIEL', 'Programming', '2024-02-24 10:57:05');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(3) NOT NULL,
  `author_name` varchar(200) NOT NULL,
  `reply` text NOT NULL,
  `post_id` int(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `author_name`, `reply`, `post_id`, `created_at`) VALUES
(1, 'NIEL', 'iche markets rather than goal-oriented vortals. Completely grow reliable customer service rather than interdependent action items. Quickly engineer installed base content via client-based action items. Seamlessly transition backend models whereas business imperatives. Collaboratively optimize resource-leveling catalysts for change after cross-media paradigms. Assertively network extensible e-commerce whereas timely intellectual capital. Appropriately revolutionize premier infomediaries.', 1, '2024-02-22 09:25:17'),
(3, 'NIEL', 'A single reluctant process can slow down or halt the shutdown process. Best thing to do is analyze running processes/services, for example with HijackThis and Process Explorer, and kill the unnecessary ones.', 2, '2024-02-22 09:41:28'),
(4, 'ONLY SON', 'ou must log in to answer this question.\r\nNot the answer you\'re looking for? Browse other questions tagged windows-xp\r\n', 2, '2024-02-22 09:46:34'),
(6, 'ONLY SON', 'Time-Saving. When you are bound to an extremely confined timeline to build a …\r\nEasy to Use. No matter whether you are an expert or a beginner in web …\r\nResponsive Grid System. Creating a page starts from creating a grid layout for …\r\nCustomizable. You can always tweak the CSS file if you’re not satisfied with …', 1, '2024-02-24 10:02:54'),
(7, 'ONLY SON', 'HELP! My Windows XP machine is also down', 2, '2024-02-24 10:24:03'),
(8, 'NIEL', 'To have a new gnome-terminalwindow opened from command line, and run a command in it, you can use: However, although the command will run successfully, the terminal window will close immediately before you can read the output. The section: is then to keep the terminal open (until you hit Enter) after the command runs.', 3, '2024-02-24 10:35:38'),
(9, 'ONLY SON', 'aking it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil)', 4, '2024-02-24 11:07:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

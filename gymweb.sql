-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 06:54 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gymweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phonenumber` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `password`, `email`, `phonenumber`) VALUES
(1, 'minh', 'minhn1', 'test@gmail.com', 909),
(2, 'luismn', 'ae98ee22d1b15376fb025c2acfd59ccc', '', 88),
(3, 'sang', 'fc20fb601cbfe7716adf8300dda19c29', 'test@gmail.com', 909),
(4, 'tung', 'dd40142405c2ceb5f0ccf2a22a340a06', 'tung@gmail.com', 0),
(5, 'phuong', '304e658a8b7b578bf78999810b9ee909', 'phuong@gmail.com', 982),
(6, 'ha', '48c1857e81549db4c58c9754911b949f', 'ha@gmail.com', 12345),
(7, 'kien', 'e0c23210862708bc721824ad3cbbf572', 'kien@gmail.com', 909),
(8, 'linh', '615ef38abaa269a5774b7d93a4600b8b', 'linh@gmail.com', 32);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin1', 'admin123'),
(2, 'admin2', 'admin2'),
(3, 'admin5', 'c93ccd78b2076528346216b3b2f701e6');

-- --------------------------------------------------------

--
-- Table structure for table `caloriesburned`
--

CREATE TABLE `caloriesburned` (
  `id` int(11) NOT NULL,
  `NumofBurned` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_`
--

CREATE TABLE `contact_` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `submitted_dtime` datetime NOT NULL,
  `contact_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_`
--

INSERT INTO `contact_` (`id`, `message`, `submitted_dtime`, `contact_no`) VALUES
(3, 'mmmm', '2021-12-03 09:00:00', 1),
(6, 'UI too simple', '2021-02-03 02:02:00', 1),
(7, 'UI too simple', '2021-02-03 02:02:00', 1),
(8, 'UI too simple', '2021-02-03 02:02:00', 1),
(60, 'I gain more UX and all features are easy to use', '2022-02-01 12:09:00', 1),
(64, 'the features are easy to use and understand with simple UI ', '2023-05-31 15:10:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `image` blob NOT NULL,
  `description` varchar(255) NOT NULL,
  `moneytaryunit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `name`, `price`, `image`, `description`, `moneytaryunit`) VALUES
(1, 'Vinsguir Ab Roller for Abs Workout', 25, 0x6669746e657373657130312e6a7067, 'The 3.2 inch dual-wheel ab roller offers extra support and stability compared to the common single ab wheel. Equipped with a knee pad, this ab roller wheel delivers comfortable workout experience and caring protection. Just embrace the freedom of more thr', ''),
(2, 'PASYOU Adjustable Weight Bench Full Body Workout Multi-Purpose Foldable Incline Decline Exercise Workout Bench for Home Gym', 273, 0x6669746e657373657130322e6a7067, '【PASYOU 2022 NEW DESGIN】:PASYOU PA500 Exercise Bench is designed with a technical structure based on human mechanisms,PASYOU team manufacture products of the highest quality and value for the benefit of our customers.', ''),
(3, 'Amazon Basics Vinyl Coated Hand Weight Dumbbell Pair, Set of 2', 22, 0x6669746e657373657130332e6a7067, '12 pound dumbbell (set of 2) for exercise and strength training Steel with vinyl exterior in Blue for lasting durability Hexagon shaped ends prevent rolling away and offer stay-in-place storage', ''),
(4, '!TRX All-in-One Suspension Trainer!', 43, 0x67796d65702e6a7067, '', 'dollars');

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `instruction` varchar(255) NOT NULL,
  `calories` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  `type` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `reps` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`id`, `name`, `instruction`, `calories`, `category`, `image`, `type`, `gender`, `quantity`, `reps`) VALUES
(1, 'shoulder lateral raise', 'Stand with your feet around shoulder-width apart, holding a dumbbell in each hand by your sides, palms facing inwards', '101', 'weightlifting exercises', 0x30312e706e67, 'easy', '', 0, 0),
(4, 'barbell bicep curls', 'Stand up straight, with your feet shoulder-width apart and your hands holding the barbell in an underhand grip', '50', 'weightlifting exercises', 0x626169746170766f6974612e6a7067, 'medium', '', 0, 0),
(5, 'Plank', 'Get into a push up position, with your elbows under your shoulders and your feet hip-width apart. Bend your elbows and rest your weight on your forearms and on your toes, keeping your body in a straight line. Hold for as long as possible.', '10', 'cardio', 0x706c616e6b65782e706e67, 'easy', '', 0, 0),
(6, 'Crunches ', 'Lie down on your back. Plant your feet on the floor, hip-width apart. Bend your knees and place your arms across your chest. Contract your abs and inhale. Exhale and lift your upper body, keeping your head and neck relaxed. Inhale and return to the starti', '6', 'weightlifting exercises', 0x6372756e636865732e6a7067, 'medium\r\n', '', 0, 0),
(7, 'Seated leg press', 'Sit on the machine with your back and head resting comfortably against the padded support. Place your feet on the footplate about hip-width apart while ensuring that your heels are flat. Your bottom should be flat against the seat rather than raised. Your', '58', 'weightlifting exercises', 0x6c656770726573732e6a7067, 'hard', '', 0, 0),
(8, 'Heel digs', 'Keeping your hips off the floor, dig your heels into the ball while you pull it closer to your buttocks with your feet. Hold for three deep breaths', '10', 'warmingup', 0x6865656c6469672e6a7067, 'easy', '', 0, 0),
(11, 'Chest and Shoulder Stretch', 'Stand with palms facing forwards. Lift your arms out to the sides and reach your arms backwards. Feel the stretch in your chest and the front of your arms • Hold 10-15 seconds, repeat 2-3 times. Stand up straight and tuck your chin so your ear is in line ', '15', 'stretching', 0x6368657374737472657463682e6a7067, 'medium', '', 0, 0),
(13, 'Squat jumping', 's1. Stand with your feet shoulder-width apart and the toes pointing slightly outward. 2. Bend your knees pressing your hips back as if you were going to sit back on a chair. 3. Pushing through the heels, jump straight up. 4. Land with your knees slightl', '100', 'cardio', 0x73717561746a756d70732e6a7067, 'medium', '', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `score` int(5) NOT NULL,
  `feedback_info` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `score`, `feedback_info`) VALUES
(1, 4, 'all features are work well and easy to use'),
(2, 3, 'adsadad'),
(3, 2, 'the UI is too simple , need to add more styles to modify the structure more'),
(4, 4, 'need have more validations to prevent a mistake '),
(5, 2, 'the UI is simple and have lacks of image . Needs to provide more  '),
(8, 4, 'need improve more feature for user such as select exercises for their training '),
(9, 4, 'need to improve features to help user calculate their calories burned per their training ');

-- --------------------------------------------------------

--
-- Table structure for table `fitnesscategories`
--

CREATE TABLE `fitnesscategories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fitnesscategories`
--

INSERT INTO `fitnesscategories` (`id`, `name`, `description`, `level`) VALUES
(1, 'Whole-body Fitness Equipment', 'Full-body workouts are a great, efficient method to get the most out of your session. Not only can these workouts attack multiple muscle groups, but they can also save time when done with a full-body workout machine.', 'none'),
(2, 'Local Fitness Equipment', 'any apparatus or device used during physical activity to enhance the strength or conditioning effects of that exercise by providing either fixed or adjustable amounts of resistance, or to otherwise enhance the experience or outcome of an exercise routine.', 'none'),
(3, 'small-sized fitness equipment', 'Exercise equipment may also include such wearable items as proper footgear, gloves, and hydration packs.', 'none');

-- --------------------------------------------------------

--
-- Table structure for table `fitnessdemand`
--

CREATE TABLE `fitnessdemand` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fitnessdemand`
--

INSERT INTO `fitnessdemand` (`id`, `name`) VALUES
(1, 'loss weight'),
(2, 'enhance weight');

-- --------------------------------------------------------

--
-- Table structure for table `fitnesslevel`
--

CREATE TABLE `fitnesslevel` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fitnesslevel`
--

INSERT INTO `fitnesslevel` (`id`, `name`, `description`) VALUES
(1, 'less', 'workout less (1 or 2 day per week) with less time approximately 1hour/day.'),
(2, 'medium', 'workout (3 days per week) with some easy exercises for 2 hours per day '),
(3, 'hard', 'workout very hard per week. Spending (from more than 3 days) with more than 2 hours per a day ');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `calories` int(11) NOT NULL,
  `numofGram` int(11) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `name`, `type`, `calories`, `numofGram`, `image`) VALUES
(1, 'chicken breast', 'lean cut of meat taken from the pectoral muscle on', 165, 100, 0x666f6f64312e6a7067),
(2, 'brown rice', 'brown rice comes in several different varieties', 110, 100, 0x666f6f64322e6a7067),
(4, 'sweet potato', 'potato', 86, 100, 0x737765657420706f7461746f2e6a7067),
(5, 'salmon', 'fish', 208, 100, 0x73616c6d6f6e2e6a7067),
(6, 'broccoli', 'vegetable', 34, 100, 0x62726f636f6c6c692e6a7067),
(7, 'dragon fruit', 'fruits', 50, 100, 0x647261676f6e66727569742e6a7067),
(10, 'Nuts and nut butters', 'Nut (+whole milk)', 270, 62, 0x4e75747320616e64206e757420627574746572732e6a7067),
(11, 'Whole milk mixed', '1 cup of frozen berries, 1 cup of whole milk, 2 te', 275, 62, 0x77686f6c656d696c6b6d69782e6a7067),
(12, 'two larges scrambled eggs', 'eggs', 203, 150, 0x736372616d626c65656767732e6a7067),
(13, 'Dried fruit', 'fruits', 360, 100, 0x44726965642066727569742e6a7067),
(14, 'Healthy cereals', 'cereals', 240, 90, 0x4865616c7468792063657265616c732e6a7067),
(15, 'black coffee ( no sugar)', 'coffee', 5, 30, 0x626c61636b636f666665652e6a7067),
(16, 'Leafy greens', 'green vegetables', 23, 100, 0x7665672e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `mem_card`
--

CREATE TABLE `mem_card` (
  `id` int(11) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_info` varchar(255) NOT NULL,
  `c_dtime` datetime NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mem_card`
--

INSERT INTO `mem_card` (`id`, `c_name`, `c_info`, `c_dtime`, `image`) VALUES
(5, 'lossw card', 'this is the card for the toss weight trainer ', '2020-05-17 08:40:00', 0x696d616765732e6a7067),
(6, 'enhacew', 'this is the card for enhance weight trainer', '2021-09-20 14:25:00', 0x6d656d63322e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `timefitness`
--

CREATE TABLE `timefitness` (
  `id` int(11) NOT NULL,
  `timeperday` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timefitness`
--

INSERT INTO `timefitness` (`id`, `timeperday`) VALUES
(1, 1.5),
(2, 3.5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `height` float NOT NULL,
  `weight_current` float NOT NULL,
  `weight_goal` float NOT NULL,
  `sex` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `NumofCaloBurned_goal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `height`, `weight_current`, `weight_goal`, `sex`, `age`, `NumofCaloBurned_goal`) VALUES
(2, 166, 56, 60, 'male', 24, 1500),
(3, 180, 85, 78, 'male', 28, 2001),
(6, 166, 56, 50, 'female', 25, 2400),
(7, 164, 56, 51, 'female', 26, 2400),
(8, 162, 47, 56, 'male', 26, 2000),
(9, 173, 61, 65, 'female', 27, 1800),
(10, 172, 61, 65, 'male', 27, 1800),
(11, 156, 50, 47, 'female', 22, 1800),
(12, 156, 50, 47, 'female', 22, 1800),
(13, 165, 50, 60, 'male', 23, 2000),
(14, 180, 50, 69, 'male', 27, 2000),
(43, 170, 61, 66, 'male', 23, 2000),
(44, 180, 56, 66, 'male', 28, 2000),
(45, 180, 56, 66, 'male', 28, 2000),
(46, 180, 61, 66, 'male', 28, 2000),
(47, 180, 61, 66, 'male', 28, 2000),
(48, 180, 72, 66, 'male', 28, 2000),
(49, 180, 61, 66, 'male', 28, 2000),
(50, 180, 61, 66, 'male', 28, 2000),
(51, 180, 61, 66, 'male', 28, 2000),
(52, 180, 56, 66, 'male', 28, 2000),
(53, 180, 56, 66, 'male', 28, 2000),
(54, 180, 86, 66, 'male', 28, 2000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `caloriesburned`
--
ALTER TABLE `caloriesburned`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_`
--
ALTER TABLE `contact_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fitnesscategories`
--
ALTER TABLE `fitnesscategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fitnessdemand`
--
ALTER TABLE `fitnessdemand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fitnesslevel`
--
ALTER TABLE `fitnesslevel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mem_card`
--
ALTER TABLE `mem_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timefitness`
--
ALTER TABLE `timefitness`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `caloriesburned`
--
ALTER TABLE `caloriesburned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_`
--
ALTER TABLE `contact_`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fitnesscategories`
--
ALTER TABLE `fitnesscategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fitnessdemand`
--
ALTER TABLE `fitnessdemand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fitnesslevel`
--
ALTER TABLE `fitnesslevel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `mem_card`
--
ALTER TABLE `mem_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `timefitness`
--
ALTER TABLE `timefitness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

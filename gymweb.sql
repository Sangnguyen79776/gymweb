-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2023 at 12:44 PM
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
(2, 'luis', 'luisnm', 'test01@gmail.com', 88),
(3, 'sang', 'fc20fb601cbfe7716adf8300dda19c29', 'test@gmail.com', 909),
(4, 'tung', 'dd40142405c2ceb5f0ccf2a22a340a06', 'tung@gmail.com', 0),
(5, 'phuong', '304e658a8b7b578bf78999810b9ee909', 'phuong@gmail.com', 982),
(6, 'ha', '48c1857e81549db4c58c9754911b949f', 'ha@gmail.com', 12345),
(7, 'kien', 'e0c23210862708bc721824ad3cbbf572', 'kien@gmail.com', 909);

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
(2, 'admin2', 'admin2');

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
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `instruction` varchar(255) NOT NULL,
  `calories` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` blob NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `exercise`
--

INSERT INTO `exercise` (`id`, `name`, `instruction`, `calories`, `category`, `image`, `type`) VALUES
(1, 'shoulder lateral raise', 'Stand with your feet around shoulder-width apart, holding a dumbbell in each hand by your sides, palms facing inwards', '101', 'weightlifting exercises', 0x30312e706e67, 'easy'),
(4, 'barbell bicep curls', 'Stand up straight, with your feet shoulder-width apart and your hands holding the barbell in an underhand grip', '50', 'weightlifting exercises', 0x626169746170766f6974612e6a7067, 'medium'),
(5, 'Plank', 'Get into a push up position, with your elbows under your shoulders and your feet hip-width apart. Bend your elbows and rest your weight on your forearms and on your toes, keeping your body in a straight line. Hold for as long as possible.', '10', 'cardio', 0x706c616e6b65782e706e67, 'easy'),
(6, 'Crunches ', 'Lie down on your back. Plant your feet on the floor, hip-width apart. Bend your knees and place your arms across your chest. Contract your abs and inhale. Exhale and lift your upper body, keeping your head and neck relaxed. Inhale and return to the starti', '6', 'weightlifting exercises', 0x6372756e636865732e6a7067, 'medium\r\n'),
(7, 'Seated leg press', 'Sit on the machine with your back and head resting comfortably against the padded support. Place your feet on the footplate about hip-width apart while ensuring that your heels are flat. Your bottom should be flat against the seat rather than raised. Your', '58', 'weightlifting exercises', 0x6c656770726573732e6a7067, 'hard'),
(8, 'Heel digs', 'Keeping your hips off the floor, dig your heels into the ball while you pull it closer to your buttocks with your feet. Hold for three deep breaths', '10', 'warmingup', 0x6865656c6469672e6a7067, 'easy'),
(9, 'Rope Climb Crunches', 'Sit down on the floor with your knees slightly bent and lean your torso back. Extend your right arm toward the ceiling and bring your left knee up. Switch sides, moving your arms as if you were climbing a rope, and repeat. Keep alternating sides until the', '20', 'Without weightlifting exercises', 0x726f7065636c696d622e706e67, 'hard'),
(11, 'Chest and Shoulder Stretch', 'Stand with palms facing forwards. Lift your arms out to the sides and reach your arms backwards. Feel the stretch in your chest and the front of your arms • Hold 10-15 seconds, repeat 2-3 times. Stand up straight and tuck your chin so your ear is in line ', '15', 'stretching', 0x6368657374737472657463682e6a7067, 'medium');

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
(1, '    Warmingup ', 'A part of stretching and preparation for physical exertion or a performance by exercising or practicing  ', 'none'),
(2, ' Stretching', 'is a physical exercise that requires putting a body part in a certain position that\'ll serve in the lengthening and elongation of the muscle or muscle group and thus enhance its flexibility and elasticity', 'none');

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
(7, 'dragon fruit', 'fruits', 50, 100, 0x647261676f6e66727569742e6a7067);

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
(3, 180, 85, 78, 'male', 28, 2000);

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
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `caloriesburned`
--
ALTER TABLE `caloriesburned`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fitnesscategories`
--
ALTER TABLE `fitnesscategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `timefitness`
--
ALTER TABLE `timefitness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

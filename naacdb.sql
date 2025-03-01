-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2025 at 06:54 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `naacdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `annual_budget`
--

CREATE TABLE `annual_budget` (
  `id` int(11) NOT NULL,
  `year` varchar(9) NOT NULL,
  `total_annual_budget` decimal(15,2) NOT NULL,
  `building_maintenance` decimal(15,2) NOT NULL,
  `electrical_system` decimal(15,2) NOT NULL,
  `hvac_system` decimal(15,2) NOT NULL,
  `plumbing` decimal(15,2) NOT NULL,
  `landscaping` decimal(15,2) NOT NULL,
  `safety_equipment` decimal(15,2) NOT NULL,
  `water_supply_system` decimal(15,2) NOT NULL,
  `waste_management` decimal(15,2) NOT NULL,
  `ict_facilities` decimal(15,2) NOT NULL,
  `green_campus_initiatives` decimal(15,2) NOT NULL,
  `security_systems` decimal(15,2) NOT NULL,
  `pest_control` decimal(15,2) NOT NULL,
  `repair_works` decimal(15,2) NOT NULL,
  `transport_facilities` decimal(15,2) NOT NULL,
  `research_labs` decimal(15,2) NOT NULL,
  `hostel_facilities` decimal(15,2) NOT NULL,
  `sports_facilities` decimal(15,2) NOT NULL,
  `contingency_budget` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `annual_budget`
--

INSERT INTO `annual_budget` (`id`, `year`, `total_annual_budget`, `building_maintenance`, `electrical_system`, `hvac_system`, `plumbing`, `landscaping`, `safety_equipment`, `water_supply_system`, `waste_management`, `ict_facilities`, `green_campus_initiatives`, `security_systems`, `pest_control`, `repair_works`, `transport_facilities`, `research_labs`, `hostel_facilities`, `sports_facilities`, `contingency_budget`) VALUES
(1, '2000-2001', 4567.00, 6789.00, 89.00, 89.00, 65.00, 765.00, 876.00, 678.00, 78.00, 67.00, 87.00, 87.00, 6.00, 8.00, 8.00, 6.00, 6.00, 6.00, 6.00);

-- --------------------------------------------------------

--
-- Table structure for table `book_chapter_publications`
--

CREATE TABLE `book_chapter_publications` (
  `id` int(11) NOT NULL,
  `academic_year` varchar(9) NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `publication_type` enum('Book','Chapter') NOT NULL,
  `title` varchar(255) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `ISBN_number` varchar(20) NOT NULL,
  `proof_document` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `campus_area`
--

CREATE TABLE `campus_area` (
  `id` int(11) NOT NULL,
  `total_area` decimal(10,2) DEFAULT NULL,
  `built_up_area` decimal(10,2) DEFAULT NULL,
  `green_area` decimal(10,2) DEFAULT NULL,
  `playground_area` decimal(10,2) DEFAULT NULL,
  `open_space` decimal(10,2) DEFAULT NULL,
  `parking_area` decimal(10,2) DEFAULT NULL,
  `administrator_block_area` decimal(10,2) DEFAULT NULL,
  `academic_block_area` decimal(10,2) DEFAULT NULL,
  `auditorium_area` decimal(10,2) DEFAULT NULL,
  `residential_area` decimal(10,2) DEFAULT NULL,
  `sustainability_area` decimal(10,2) DEFAULT NULL,
  `hostel_area` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campus_area`
--

INSERT INTO `campus_area` (`id`, `total_area`, `built_up_area`, `green_area`, `playground_area`, `open_space`, `parking_area`, `administrator_block_area`, `academic_block_area`, `auditorium_area`, `residential_area`, `sustainability_area`, `hostel_area`) VALUES
(1, 123.00, 1234.00, 1234.00, 123.00, 6543.00, 8765.00, 8765.00, 654.00, 654.00, 543.00, 65.00, 76.00),
(4, 2122.00, 99999999.99, 511.00, 121.00, 2121.00, 212.00, 212.00, 212.00, 212.00, 21212515.00, 54521.00, 115.00);

-- --------------------------------------------------------

--
-- Table structure for table `classroom_facilities`
--

CREATE TABLE `classroom_facilities` (
  `id` int(11) NOT NULL,
  `no_of_classrooms` int(11) DEFAULT NULL,
  `seating_capacity` int(11) DEFAULT NULL,
  `avg_size_classroom` float DEFAULT NULL,
  `no_of_projectors` int(11) DEFAULT NULL,
  `no_of_smart_boards` int(11) DEFAULT NULL,
  `no_of_audio_systems` int(11) DEFAULT NULL,
  `no_of_au_facilities` int(11) DEFAULT NULL,
  `no_of_air_conditioners` int(11) DEFAULT NULL,
  `no_of_boards` int(11) DEFAULT NULL,
  `internet_connectivity` varchar(3) DEFAULT NULL,
  `lighting` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classroom_facilities`
--

INSERT INTO `classroom_facilities` (`id`, `no_of_classrooms`, `seating_capacity`, `avg_size_classroom`, `no_of_projectors`, `no_of_smart_boards`, `no_of_audio_systems`, `no_of_au_facilities`, `no_of_air_conditioners`, `no_of_boards`, `internet_connectivity`, `lighting`) VALUES
(1, 123, 45, 67, 890, 1234, 456, 2345, 3456, 345, 'Yes', 'Yes'),
(2, 5, 500, 2400, 15, 5, 5, 12, 10, 14, '5', '25');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `department_name`) VALUES
(1, 'Information Technology'),
(2, 'Electronics and Telecommunication'),
(3, 'Computer Science and Engineering'),
(4, 'Mechanical Engineering'),
(5, 'Civil Engineering'),
(6, 'Artificial Intelligence and Data Science');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` varchar(50) NOT NULL,
  `initials` varchar(10) DEFAULT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `qualification` varchar(100) DEFAULT NULL,
  `specialization` varchar(100) DEFAULT NULL,
  `experience` int(11) DEFAULT NULL,
  `official_email` varchar(100) NOT NULL,
  `personal_email` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `postal_address` text DEFAULT NULL,
  `permanent_address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `initials`, `first_name`, `middle_name`, `last_name`, `gender`, `date_of_birth`, `blood_group`, `department`, `designation`, `joining_date`, `qualification`, `specialization`, `experience`, `official_email`, `personal_email`, `phone_number`, `password`, `postal_address`, `permanent_address`) VALUES
('10', NULL, 'Darshan', 'Santosh ', 'Narsingkar', 'Male', '2025-01-02', 'A+', 1, 'software engineer', '2025-01-14', 'ff', 'Data Structure', 0, 'darshannarsingkar786@gmail.com', 'fddf@gmail.com', '12356786655', 'Darshan', 'fdff', 'fff'),
('5', NULL, 'abc', 'fsaa', 'dda', 'Male', '2025-01-02', 'A-', 3, 'software engineer', '2025-01-01', 'dff', 'ddd', 0, 'abc@gmail.com', 'fff@gmail.com', '1234567892', 'abc', 'fgfg', 'ffgfg');

-- --------------------------------------------------------

--
-- Table structure for table `grant_receive`
--

CREATE TABLE `grant_receive` (
  `grant_id` int(11) NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `department` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `nature_of_project` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `funding_agency` varchar(255) NOT NULL,
  `amount_received` decimal(10,2) NOT NULL,
  `proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grant_receive`
--

INSERT INTO `grant_receive` (`grant_id`, `faculty_id`, `department`, `project_name`, `nature_of_project`, `duration`, `funding_agency`, `amount_received`, `proof`) VALUES
(2, '12', 1, ',mccn n', 'xkhbc ', 45, 'dbchn', 23456.00, 'monkey.jpg'),
(3, '21be0560', 1, 'hdbgfc', 'kjwdba', 56, 'zjbfhc', 4567.00, 'monkey.jpg'),
(4, '21be0560', 1, 'hdbgfc', 'kjwdba', 56, 'zjbfhc', 4567.00, 'monkey.jpg'),
(5, '21be0560', 1, 'hdbgfc', 'kjwdba', 56, 'zjbfhc', 4567.00, 'monkey.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ict_facilities`
--

CREATE TABLE `ict_facilities` (
  `id` int(11) NOT NULL,
  `total_computers` int(11) NOT NULL,
  `internet_bandwidth` varchar(100) NOT NULL,
  `wifi_availability` varchar(50) NOT NULL,
  `no_of_smart_boards` int(11) NOT NULL,
  `audio_visual_facilities` text NOT NULL,
  `no_of_servers` int(11) NOT NULL,
  `it_support_staff` varchar(100) NOT NULL,
  `backup_system` text NOT NULL,
  `electronic_resources` text NOT NULL,
  `video_conferencing` text NOT NULL,
  `digital_learning_platform` text NOT NULL,
  `lab_ict_enable` text NOT NULL,
  `energy_efficient` text NOT NULL,
  `it_tech_support_availability` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ict_facilities`
--

INSERT INTO `ict_facilities` (`id`, `total_computers`, `internet_bandwidth`, `wifi_availability`, `no_of_smart_boards`, `audio_visual_facilities`, `no_of_servers`, `it_support_staff`, `backup_system`, `electronic_resources`, `video_conferencing`, `digital_learning_platform`, `lab_ict_enable`, `energy_efficient`, `it_tech_support_availability`) VALUES
(1, 56, '567', '678', 456, '234', 345, '678', '89', '67', '45', '56', '65', '54', '35');

-- --------------------------------------------------------

--
-- Table structure for table `innovation_ecosystem`
--

CREATE TABLE `innovation_ecosystem` (
  `id` int(11) NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `title_of_innovation` varchar(255) NOT NULL,
  `name_of_award` varchar(255) NOT NULL,
  `date_of_award` date NOT NULL,
  `category` varchar(100) NOT NULL,
  `proof_file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `innovation_ecosystem`
--

INSERT INTO `innovation_ecosystem` (`id`, `faculty_id`, `title_of_innovation`, `name_of_award`, `date_of_award`, `category`, `proof_file`) VALUES
(1, '21be0807', 'mnbgvkj', 'jkaefnckm,', '4567-03-12', 'hbf', 'uploads/monkey.jpg'),
(2, '12', 'wlw;fm', 'ijed', '0007-03-12', 'kjadn', 'uploads/monkey.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_facilities`
--

CREATE TABLE `laboratory_facilities` (
  `id` int(11) NOT NULL,
  `no_of_labs` int(11) NOT NULL,
  `type_of_labs` varchar(255) NOT NULL,
  `seating_capacity` int(11) NOT NULL,
  `ict_enabled` varchar(255) NOT NULL,
  `modern_equipment` varchar(255) NOT NULL,
  `safety_equipment` varchar(255) NOT NULL,
  `size_of_labs` decimal(10,2) NOT NULL,
  `ventilation` varchar(255) NOT NULL,
  `research_facilities` varchar(255) NOT NULL,
  `fumehood_availability` varchar(255) NOT NULL,
  `sustainability_feature` varchar(255) NOT NULL,
  `equipment_count` int(11) NOT NULL,
  `maintenance_support` varchar(255) NOT NULL,
  `chemical_storage_facilities` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laboratory_facilities`
--

INSERT INTO `laboratory_facilities` (`id`, `no_of_labs`, `type_of_labs`, `seating_capacity`, `ict_enabled`, `modern_equipment`, `safety_equipment`, `size_of_labs`, `ventilation`, `research_facilities`, `fumehood_availability`, `sustainability_feature`, `equipment_count`, `maintenance_support`, `chemical_storage_facilities`) VALUES
(1, 56, '456', 456, '456', '345', '456', 456.00, '3456', '4567', '4567', '567', 456, '567', '5678');

-- --------------------------------------------------------

--
-- Table structure for table `laboratory_resources`
--

CREATE TABLE `laboratory_resources` (
  `id` int(11) NOT NULL,
  `no_of_books` int(11) NOT NULL,
  `no_of_journals` int(11) NOT NULL,
  `ebooks_available` int(11) NOT NULL,
  `digital_resources` varchar(255) NOT NULL,
  `sitting_capacity` int(11) NOT NULL,
  `total_library_area` decimal(10,2) NOT NULL,
  `library_timing` varchar(255) NOT NULL,
  `reference_section` varchar(255) NOT NULL,
  `internet_access` varchar(255) NOT NULL,
  `library_staff_count` int(11) NOT NULL,
  `journal_subscribe` varchar(255) NOT NULL,
  `library_software` varchar(255) NOT NULL,
  `online_database` varchar(255) NOT NULL,
  `accessible_to_disabled` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laboratory_resources`
--

INSERT INTO `laboratory_resources` (`id`, `no_of_books`, `no_of_journals`, `ebooks_available`, `digital_resources`, `sitting_capacity`, `total_library_area`, `library_timing`, `reference_section`, `internet_access`, `library_staff_count`, `journal_subscribe`, `library_software`, `online_database`, `accessible_to_disabled`) VALUES
(1, 32, 32, 21, '32', 32, 321.00, '32', '32', '32', 32, '32', '3232', '54', '54');

-- --------------------------------------------------------

--
-- Table structure for table `mous_data`
--

CREATE TABLE `mous_data` (
  `id` int(11) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `date_of_mou_signed` date NOT NULL,
  `purpose_activities` varchar(100) NOT NULL,
  `teachers_participated` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mous_data`
--

INSERT INTO `mous_data` (`id`, `organization`, `date_of_mou_signed`, `purpose_activities`, `teachers_participated`) VALUES
(1, 'TCS', '2025-02-04', 'Placement Program ', 500),
(2, 'Wipro', '2025-01-29', 'Placement Program ', 250);

-- --------------------------------------------------------

--
-- Table structure for table `mous_trash`
--

CREATE TABLE `mous_trash` (
  `id` int(50) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `date_of_mou_signed` date NOT NULL,
  `purpose_activities` varchar(100) NOT NULL,
  `teachers_participated` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_conducted`
--

CREATE TABLE `program_conducted` (
  `id` int(11) NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `activity_title` varchar(255) NOT NULL,
  `date_of_activity` date NOT NULL,
  `no_of_participants` int(11) NOT NULL,
  `outcome` text NOT NULL,
  `no_of_teachers` int(11) NOT NULL,
  `collaborate_agencies` varchar(255) DEFAULT NULL,
  `award_received` varchar(255) DEFAULT NULL,
  `award_bodies` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_conducted`
--

INSERT INTO `program_conducted` (`id`, `faculty_id`, `department_name`, `activity_title`, `date_of_activity`, `no_of_participants`, `outcome`, `no_of_teachers`, `collaborate_agencies`, `award_received`, `award_bodies`, `description`, `proof`) VALUES
(1, '21be0560', 'Information Technology', 'sndv  ', '1234-03-02', 22, 'jwghbfvsn ', 123, 'dhfb', '1', 'asd', 'kqwgdhbn', 'uploads/monkey.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `repair_records`
--

CREATE TABLE `repair_records` (
  `id` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `report_date` date NOT NULL,
  `completion_date` date NOT NULL,
  `facility_type` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `issue_description` text NOT NULL,
  `repair_type` varchar(255) NOT NULL,
  `priority_level` enum('Low','Medium','High','Critical') NOT NULL,
  `action_taken` text NOT NULL,
  `inspection_remarks` text NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `approved_by` varchar(255) NOT NULL,
  `approval_date` date NOT NULL,
  `budget_allocated` decimal(10,2) NOT NULL,
  `vendor_details` text NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `repair_records`
--

INSERT INTO `repair_records` (`id`, `year`, `report_date`, `completion_date`, `facility_type`, `location`, `issue_description`, `repair_type`, `priority_level`, `action_taken`, `inspection_remarks`, `assigned_to`, `approved_by`, `approval_date`, `budget_allocated`, `vendor_details`, `remarks`) VALUES
(1, '2000-2001', '2025-01-14', '2025-01-30', 'kjsgbv', 'hjbv', 'hdfacbjhb', 'dfhbvn', 'Low', 'bfkjvn', 'jhbfhbfjzdshgjmzh,', 'mzr,sbgm', 'jhbdsv', '2025-01-22', 5678.00, 'sejrgf', 'ksfdbvkjmfnvk');

-- --------------------------------------------------------

--
-- Table structure for table `research_awards`
--

CREATE TABLE `research_awards` (
  `id` int(11) NOT NULL,
  `academic_year` varchar(9) NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `award_name` varchar(255) NOT NULL,
  `award_organization` varchar(255) NOT NULL,
  `award_date` date NOT NULL,
  `proof_document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `research_paper_publications`
--

CREATE TABLE `research_paper_publications` (
  `id` int(11) NOT NULL,
  `academic_year` varchar(9) NOT NULL,
  `faculty_id` varchar(50) NOT NULL,
  `paper_title` varchar(255) NOT NULL,
  `journal_name` varchar(255) NOT NULL,
  `journal_type` enum('National','International') NOT NULL,
  `ISSN_number` varchar(20) NOT NULL,
  `impact_factor` varchar(20) NOT NULL,
  `publication_date` date NOT NULL,
  `proof_document` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `research_paper_publications`
--

INSERT INTO `research_paper_publications` (`id`, `academic_year`, `faculty_id`, `paper_title`, `journal_name`, `journal_type`, `ISSN_number`, `impact_factor`, `publication_date`, `proof_document`) VALUES
(1, '2021-2024', '1', 'fdf', 'dfdf', 'National', '3455', 'dffdfdf', '2025-01-27', 'symbol.docx');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annual_budget`
--
ALTER TABLE `annual_budget`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_chapter_publications`
--
ALTER TABLE `book_chapter_publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `campus_area`
--
ALTER TABLE `campus_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classroom_facilities`
--
ALTER TABLE `classroom_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`),
  ADD UNIQUE KEY `official_email` (`official_email`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indexes for table `grant_receive`
--
ALTER TABLE `grant_receive`
  ADD PRIMARY KEY (`grant_id`),
  ADD KEY `faculty_id` (`faculty_id`),
  ADD KEY `department` (`department`);

--
-- Indexes for table `ict_facilities`
--
ALTER TABLE `ict_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `innovation_ecosystem`
--
ALTER TABLE `innovation_ecosystem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `laboratory_facilities`
--
ALTER TABLE `laboratory_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratory_resources`
--
ALTER TABLE `laboratory_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mous_data`
--
ALTER TABLE `mous_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mous_trash`
--
ALTER TABLE `mous_trash`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_conducted`
--
ALTER TABLE `program_conducted`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `repair_records`
--
ALTER TABLE `repair_records`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research_awards`
--
ALTER TABLE `research_awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- Indexes for table `research_paper_publications`
--
ALTER TABLE `research_paper_publications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_id` (`faculty_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annual_budget`
--
ALTER TABLE `annual_budget`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `book_chapter_publications`
--
ALTER TABLE `book_chapter_publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `campus_area`
--
ALTER TABLE `campus_area`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `classroom_facilities`
--
ALTER TABLE `classroom_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grant_receive`
--
ALTER TABLE `grant_receive`
  MODIFY `grant_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ict_facilities`
--
ALTER TABLE `ict_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `innovation_ecosystem`
--
ALTER TABLE `innovation_ecosystem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `laboratory_facilities`
--
ALTER TABLE `laboratory_facilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laboratory_resources`
--
ALTER TABLE `laboratory_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mous_data`
--
ALTER TABLE `mous_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mous_trash`
--
ALTER TABLE `mous_trash`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_conducted`
--
ALTER TABLE `program_conducted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `repair_records`
--
ALTER TABLE `repair_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `research_awards`
--
ALTER TABLE `research_awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `research_paper_publications`
--
ALTER TABLE `research_paper_publications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_chapter_publications`
--
ALTER TABLE `book_chapter_publications`
  ADD CONSTRAINT `book_chapter_publications_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_info` (`faculty_id`);

--
-- Constraints for table `grant_receive`
--
ALTER TABLE `grant_receive`
  ADD CONSTRAINT `grant_receive_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_info` (`faculty_id`),
  ADD CONSTRAINT `grant_receive_ibfk_2` FOREIGN KEY (`department`) REFERENCES `department` (`id`);

--
-- Constraints for table `innovation_ecosystem`
--
ALTER TABLE `innovation_ecosystem`
  ADD CONSTRAINT `innovation_ecosystem_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_info` (`faculty_id`);

--
-- Constraints for table `program_conducted`
--
ALTER TABLE `program_conducted`
  ADD CONSTRAINT `program_conducted_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_info` (`faculty_id`),
  ADD CONSTRAINT `program_conducted_ibfk_2` FOREIGN KEY (`id`) REFERENCES `department` (`id`);

--
-- Constraints for table `research_awards`
--
ALTER TABLE `research_awards`
  ADD CONSTRAINT `research_awards_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_info` (`faculty_id`);

--
-- Constraints for table `research_paper_publications`
--
ALTER TABLE `research_paper_publications`
  ADD CONSTRAINT `research_paper_publications_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `faculty_info` (`faculty_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2024 at 08:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `japanjobsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account`
--

CREATE TABLE `tbl_account` (
  `AccountID` int(10) UNSIGNED NOT NULL,
  `Role` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `UserID` varchar(45) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Token` varchar(255) DEFAULT NULL,
  `Status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_account`
--

INSERT INTO `tbl_account` (`AccountID`, `Role`, `UserID`, `Password`, `Token`, `Status`) VALUES
(1, 0, 'michellesoliman002@gmail.com', '$2y$10$mwMJQvdY0qOuR/KkT0kaRuoYVqebabZ9jK1Xe5b7ucbCe/6/ErS3u', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_applicantinfo`
--

CREATE TABLE `tbl_applicantinfo` (
  `ApplicantID` int(10) UNSIGNED NOT NULL,
  `AccountID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `LastName` varchar(45) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `MiddleName` varchar(45) DEFAULT NULL,
  `EmailAddress` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_applicantinfo`
--

INSERT INTO `tbl_applicantinfo` (`ApplicantID`, `AccountID`, `LastName`, `FirstName`, `MiddleName`, `EmailAddress`) VALUES
(1, 1, '', '', '', 'michellesoliman002@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application`
--

CREATE TABLE `tbl_application` (
  `ApplicationID` int(10) UNSIGNED NOT NULL,
  `ApplicantID` int(10) UNSIGNED NOT NULL,
  `JobPostingID` int(10) UNSIGNED NOT NULL,
  `DateTimeStamp` varchar(45) NOT NULL,
  `Status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bookmark`
--

CREATE TABLE `tbl_bookmark` (
  `BookMarkID` int(10) UNSIGNED NOT NULL,
  `JobPostingID` int(10) UNSIGNED NOT NULL,
  `ApplicantID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companyinfo`
--

CREATE TABLE `tbl_companyinfo` (
  `CompanyID` int(10) UNSIGNED NOT NULL,
  `CompanyName` varchar(45) NOT NULL,
  `EmailAddress` varchar(45) NOT NULL,
  `ContactNumber1` varchar(45) NOT NULL,
  `ContactNumber2` varchar(45) NOT NULL,
  `CompanyWebsiteURL` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companyjob`
--

CREATE TABLE `tbl_companyjob` (
  `JobID` int(10) UNSIGNED NOT NULL,
  `EmployerID` varchar(45) NOT NULL,
  `JobTitle` varchar(45) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `VideoURL` varchar(100) DEFAULT NULL,
  `Summary` varchar(100) DEFAULT NULL,
  `ClassificationID` int(10) UNSIGNED NOT NULL,
  `LocationID` int(10) UNSIGNED NOT NULL,
  `SalaryID` int(10) UNSIGNED DEFAULT NULL,
  `Status` tinyint(3) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_currency`
--

CREATE TABLE `tbl_currency` (
  `CurrencyID` int(10) UNSIGNED NOT NULL,
  `Currency` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `ApplicantDocumentID` int(10) UNSIGNED NOT NULL,
  `ApplicantID` int(10) UNSIGNED NOT NULL,
  `Location` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employerinfo`
--

CREATE TABLE `tbl_employerinfo` (
  `EmployerID` int(10) UNSIGNED NOT NULL,
  `AccountID` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `LastName` varchar(45) NOT NULL,
  `FirstName` varchar(45) NOT NULL,
  `MiddleName` varchar(45) DEFAULT NULL,
  `EmailAddress` varchar(45) NOT NULL,
  `ContactNumber` varchar(45) NOT NULL,
  `CompanyID` int(10) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobclassification`
--

CREATE TABLE `tbl_jobclassification` (
  `ClassificationID` int(10) UNSIGNED NOT NULL,
  `Classification` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobposting`
--

CREATE TABLE `tbl_jobposting` (
  `JobPostingID` int(10) UNSIGNED NOT NULL,
  `DateTimeStamp` varchar(45) NOT NULL,
  `JobID` int(10) UNSIGNED NOT NULL,
  `DateTimeStampSpan` varchar(45) NOT NULL,
  `ViewCount` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `CompanyPrivacyStatus` tinyint(3) UNSIGNED NOT NULL DEFAULT 0,
  `SalaryPrivacyStatus` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobquestionnaire`
--

CREATE TABLE `tbl_jobquestionnaire` (
  `JobQuestionnaireID` int(10) UNSIGNED NOT NULL,
  `QuestionnaireID` int(10) UNSIGNED NOT NULL,
  `JobID` int(10) UNSIGNED NOT NULL,
  `RequirementStatus` tinyint(3) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobrequirements`
--

CREATE TABLE `tbl_jobrequirements` (
  `RequirementID` int(10) UNSIGNED NOT NULL,
  `JobID` int(10) UNSIGNED NOT NULL,
  `Requirement` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobresponsibilities`
--

CREATE TABLE `tbl_jobresponsibilities` (
  `ResponsibilityID` int(10) UNSIGNED NOT NULL,
  `JobID` int(10) UNSIGNED NOT NULL,
  `Responsibility` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobsalary`
--

CREATE TABLE `tbl_jobsalary` (
  `SalaryID` int(10) UNSIGNED NOT NULL,
  `JobID` int(10) UNSIGNED NOT NULL,
  `SalaryTypeID` int(10) UNSIGNED NOT NULL,
  `CurrencyID` int(10) UNSIGNED NOT NULL,
  `Minimum` decimal(10,2) NOT NULL,
  `Maximum` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `LocationID` int(10) UNSIGNED NOT NULL,
  `Country` varchar(45) NOT NULL,
  `ZipCode` varchar(45) NOT NULL,
  `Province` varchar(45) NOT NULL,
  `City` varchar(45) NOT NULL,
  `AddressLine2` varchar(45) NOT NULL,
  `StreedAddress` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questionnaire`
--

CREATE TABLE `tbl_questionnaire` (
  `QuestionnaireID` int(10) UNSIGNED NOT NULL,
  `Question` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_questionnaireinput`
--

CREATE TABLE `tbl_questionnaireinput` (
  `QuestionnaireInputID` int(10) UNSIGNED NOT NULL,
  `JobID` int(10) UNSIGNED NOT NULL,
  `JobQuestionnaireID` int(10) UNSIGNED NOT NULL,
  `ApplicationID` int(10) UNSIGNED NOT NULL,
  `Answer` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reportaspect`
--

CREATE TABLE `tbl_reportaspect` (
  `ReportAspectID` int(10) UNSIGNED NOT NULL,
  `Aspect` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reportjobpost`
--

CREATE TABLE `tbl_reportjobpost` (
  `ReportJobPostID` int(10) UNSIGNED NOT NULL,
  `JobPostingID` int(10) UNSIGNED NOT NULL,
  `ApplicantID` int(10) UNSIGNED NOT NULL,
  `ReportAspectID` int(10) UNSIGNED NOT NULL,
  `Note` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_salarytype`
--

CREATE TABLE `tbl_salarytype` (
  `SalaryTypeID` int(10) UNSIGNED NOT NULL,
  `Type` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_account`
--
ALTER TABLE `tbl_account`
  ADD PRIMARY KEY (`AccountID`);

--
-- Indexes for table `tbl_applicantinfo`
--
ALTER TABLE `tbl_applicantinfo`
  ADD PRIMARY KEY (`ApplicantID`);

--
-- Indexes for table `tbl_application`
--
ALTER TABLE `tbl_application`
  ADD PRIMARY KEY (`ApplicationID`);

--
-- Indexes for table `tbl_bookmark`
--
ALTER TABLE `tbl_bookmark`
  ADD PRIMARY KEY (`BookMarkID`);

--
-- Indexes for table `tbl_companyinfo`
--
ALTER TABLE `tbl_companyinfo`
  ADD PRIMARY KEY (`CompanyID`);

--
-- Indexes for table `tbl_companyjob`
--
ALTER TABLE `tbl_companyjob`
  ADD PRIMARY KEY (`JobID`);

--
-- Indexes for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
  ADD PRIMARY KEY (`CurrencyID`);

--
-- Indexes for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  ADD PRIMARY KEY (`ApplicantDocumentID`);

--
-- Indexes for table `tbl_employerinfo`
--
ALTER TABLE `tbl_employerinfo`
  ADD PRIMARY KEY (`EmployerID`);

--
-- Indexes for table `tbl_jobclassification`
--
ALTER TABLE `tbl_jobclassification`
  ADD PRIMARY KEY (`ClassificationID`);

--
-- Indexes for table `tbl_jobposting`
--
ALTER TABLE `tbl_jobposting`
  ADD PRIMARY KEY (`JobPostingID`);

--
-- Indexes for table `tbl_jobquestionnaire`
--
ALTER TABLE `tbl_jobquestionnaire`
  ADD PRIMARY KEY (`JobQuestionnaireID`);

--
-- Indexes for table `tbl_jobrequirements`
--
ALTER TABLE `tbl_jobrequirements`
  ADD PRIMARY KEY (`RequirementID`);

--
-- Indexes for table `tbl_jobresponsibilities`
--
ALTER TABLE `tbl_jobresponsibilities`
  ADD PRIMARY KEY (`ResponsibilityID`);

--
-- Indexes for table `tbl_jobsalary`
--
ALTER TABLE `tbl_jobsalary`
  ADD PRIMARY KEY (`SalaryID`);

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`LocationID`);

--
-- Indexes for table `tbl_questionnaire`
--
ALTER TABLE `tbl_questionnaire`
  ADD PRIMARY KEY (`QuestionnaireID`);

--
-- Indexes for table `tbl_questionnaireinput`
--
ALTER TABLE `tbl_questionnaireinput`
  ADD PRIMARY KEY (`QuestionnaireInputID`);

--
-- Indexes for table `tbl_reportaspect`
--
ALTER TABLE `tbl_reportaspect`
  ADD PRIMARY KEY (`ReportAspectID`);

--
-- Indexes for table `tbl_reportjobpost`
--
ALTER TABLE `tbl_reportjobpost`
  ADD PRIMARY KEY (`ReportJobPostID`);

--
-- Indexes for table `tbl_salarytype`
--
ALTER TABLE `tbl_salarytype`
  ADD PRIMARY KEY (`SalaryTypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_account`
--
ALTER TABLE `tbl_account`
  MODIFY `AccountID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_applicantinfo`
--
ALTER TABLE `tbl_applicantinfo`
  MODIFY `ApplicantID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_application`
--
ALTER TABLE `tbl_application`
  MODIFY `ApplicationID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_bookmark`
--
ALTER TABLE `tbl_bookmark`
  MODIFY `BookMarkID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_companyinfo`
--
ALTER TABLE `tbl_companyinfo`
  MODIFY `CompanyID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_companyjob`
--
ALTER TABLE `tbl_companyjob`
  MODIFY `JobID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_currency`
--
ALTER TABLE `tbl_currency`
  MODIFY `CurrencyID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `ApplicantDocumentID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_employerinfo`
--
ALTER TABLE `tbl_employerinfo`
  MODIFY `EmployerID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jobclassification`
--
ALTER TABLE `tbl_jobclassification`
  MODIFY `ClassificationID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jobposting`
--
ALTER TABLE `tbl_jobposting`
  MODIFY `JobPostingID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jobquestionnaire`
--
ALTER TABLE `tbl_jobquestionnaire`
  MODIFY `JobQuestionnaireID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jobrequirements`
--
ALTER TABLE `tbl_jobrequirements`
  MODIFY `RequirementID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jobresponsibilities`
--
ALTER TABLE `tbl_jobresponsibilities`
  MODIFY `ResponsibilityID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jobsalary`
--
ALTER TABLE `tbl_jobsalary`
  MODIFY `SalaryID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `LocationID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_questionnaire`
--
ALTER TABLE `tbl_questionnaire`
  MODIFY `QuestionnaireID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_questionnaireinput`
--
ALTER TABLE `tbl_questionnaireinput`
  MODIFY `QuestionnaireInputID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reportaspect`
--
ALTER TABLE `tbl_reportaspect`
  MODIFY `ReportAspectID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_reportjobpost`
--
ALTER TABLE `tbl_reportjobpost`
  MODIFY `ReportJobPostID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_salarytype`
--
ALTER TABLE `tbl_salarytype`
  MODIFY `SalaryTypeID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

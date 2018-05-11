-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 09:15 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yii2`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `accountid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `accountno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`accountid`, `userid`, `accountno`) VALUES
(1, 29, '356789999994000'),
(2, 22, '588868883838'),
(3, 30, '1876207627642549'),
(4, 36, '8888888888888');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentid` int(11) NOT NULL,
  `tempid` int(11) NOT NULL,
  `commentinfo` longtext NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`commentid`, `tempid`, `commentinfo`, `userid`) VALUES
(1, 1, 'very worthy course', 21),
(2, 1, 'good', 21),
(3, 1, 'very good', 21),
(4, 1, 'great', 21),
(5, 1, 'very nice', 24);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` int(11) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseid`, `coursename`, `logo`) VALUES
(1, 'Data Structure and Algorithms', 'data.png'),
(2, 'C Programming', 'c.png'),
(3, 'Design &Analysis of Algorithms', 'algo.jpg'),
(4, 'Java', 'java.jpg'),
(5, 'JavaScript', 'js.png'),
(6, 'C++', 'c++.png');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `enrollid` int(11) NOT NULL,
  `tempid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tlikes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`enrollid`, `tempid`, `userid`, `tlikes`) VALUES
(2, 1, 21, 1),
(3, 4, 21, 0),
(4, 1, 24, 1),
(6, 1, 31, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `paymentid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `requestid` int(11) NOT NULL,
  `coursesubject` varchar(100) NOT NULL,
  `coursedetails` longtext,
  `specificreq` int(11) NOT NULL DEFAULT '0',
  `requestedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`requestid`, `coursesubject`, `coursedetails`, `specificreq`, `requestedon`) VALUES
(40, 'java', 'content of jdbc is missing.', 0, '2018-05-02 02:17:13'),
(44, 'data structure', 'please upload more content of hashing', 1, '2018-05-02 02:17:13'),
(45, 'Javascript', 'Please upload more contents on angular js.', 0, '2018-05-05 11:13:37'),
(46, 'C ', 'please upload content on pointers.', 1, '2018-05-05 11:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleid` int(11) NOT NULL,
  `rolename` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `rolename`) VALUES
(1, 'user'),
(2, 'admin'),
(3, 'tutor');

-- --------------------------------------------------------

--
-- Table structure for table `specificreq`
--

CREATE TABLE `specificreq` (
  `specificid` int(11) NOT NULL,
  `requestid` int(11) NOT NULL,
  `tutorid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `specificreq`
--

INSERT INTO `specificreq` (`specificid`, `requestid`, `tutorid`) VALUES
(1, 44, 22),
(2, 46, 22);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `tempid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `topicname` varchar(200) NOT NULL,
  `pdf` varchar(200) NOT NULL,
  `video` varchar(200) DEFAULT '0',
  `status` varchar(50) NOT NULL DEFAULT 'processing',
  `likes` int(11) NOT NULL DEFAULT '0',
  `uploadedon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp`
--

INSERT INTO `temp` (`tempid`, `courseid`, `userid`, `topicname`, `pdf`, `video`, `status`, `likes`, `uploadedon`) VALUES
(1, 1, 22, 'hashing', 'hp1.pdf+hp2.pdf+', 'hv1.mp4+', 'approved', 3, '2018-05-02 01:53:32'),
(2, 1, 22, 'tree', 'clr_via_c_4th_edition.pdf+', 'hv1.mp4+', 'approved', 0, '2018-05-02 01:53:32'),
(3, 1, 22, 'Linked List', 'Brochure.pdf+', '0', 'processing', 0, '2018-05-02 01:53:32'),
(4, 2, 22, 'pointers', 'CS_Key.pdf+CS _GATE-2018_Paper_4-FEB-2018 Morning Session.pdf+', 'hv1.mp4+', 'processing', 0, '2018-05-02 01:53:32'),
(10, 1, 30, 'Indexing', 'Beginning in ASP.NET 4.5 ed Matthew MacDonald.pdf+', 'hash1.mp4+', 'processing', 0, '2018-05-05 10:57:52');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topicid` int(11) NOT NULL,
  `topicname` varchar(30) NOT NULL,
  `courseid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topicid`, `topicname`, `courseid`) VALUES
(1, 'Hashing', 1),
(2, 'Tree', 1),
(3, 'Pointers in C', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tutor`
--

CREATE TABLE `tutor` (
  `tutorid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `tutorname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutor`
--

INSERT INTO `tutor` (`tutorid`, `userid`, `tutorname`) VALUES
(1, 22, 'tutor1'),
(2, 29, 'Tutor2'),
(3, 30, 'Denish Rana'),
(5, 36, 'Tutor3');

-- --------------------------------------------------------

--
-- Table structure for table `userdb`
--

CREATE TABLE `userdb` (
  `userid` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `university` varchar(100) DEFAULT NULL,
  `roleid` int(11) NOT NULL,
  `imgfile` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdb`
--

INSERT INTO `userdb` (`userid`, `password`, `name`, `email`, `mobile`, `university`, `roleid`, `imgfile`) VALUES
(21, 'abcd1234', 'Neel Shah', 'neelshah1102@gmail.com', '7202828681', 'ddit', 1, 'uploads/00F4115E-B334-4511-98F3-418D55886623L0001.jpg'),
(22, 'abcd1234', 'tutor1', 'tutor1@gmail.com', '8888888888', 'IIT Bombay(Masters)', 3, 'uploads/images.jpg'),
(23, 'admin123', 'admin', 'admin@gmail.com', '7777777777', NULL, 2, 'xxx'),
(24, 'jay12345', 'Jay Thanki', 'thankijay20@gmail.com', '9898989898', 'ddit', 1, 'uploads/jay.png'),
(29, 'abcd12345', 'Tutor2', 'tutor2@gmail.com', '7202828680', 'IIIT Bangalore', 3, 'uploads/loginavatar.jpg'),
(30, '12345678', 'Denish Rana', 'denish@gmail.com', '9724510845', 'DDU', 3, 'uploads/jay.png'),
(31, '12345678', 'Naman Thacker', 'naman@gmail.com', '9925151928', 'DDU', 1, 'uploads/loginavatar.jpg'),
(36, 'abcd1234', 'Tutor3', 'tutor3@gmail.com', '7202828682', 'IIsc Banglore(Masters)', 3, 'uploads/DominosOrder.html');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`accountid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentid`),
  ADD KEY `tempid` (`tempid`),
  ADD KEY `uesrid` (`userid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`enrollid`),
  ADD KEY `tempid` (`tempid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`paymentid`),
  ADD KEY `tutorid` (`userid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`requestid`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `specificreq`
--
ALTER TABLE `specificreq`
  ADD PRIMARY KEY (`specificid`),
  ADD KEY `requestid` (`requestid`),
  ADD KEY `tutorid` (`tutorid`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`tempid`),
  ADD KEY `courseid` (`courseid`),
  ADD KEY `tutorid` (`userid`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topicid`),
  ADD KEY `courseid` (`courseid`);

--
-- Indexes for table `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`tutorid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `userdb`
--
ALTER TABLE `userdb`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role` (`roleid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `accountid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `enrollid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `requestid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
--
-- AUTO_INCREMENT for table `specificreq`
--
ALTER TABLE `specificreq`
  MODIFY `specificid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `tempid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tutor`
--
ALTER TABLE `tutor`
  MODIFY `tutorid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `userdb`
--
ALTER TABLE `userdb`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`tempid`) REFERENCES `temp` (`tempid`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `userdb` (`userid`);

--
-- Constraints for table `enroll`
--
ALTER TABLE `enroll`
  ADD CONSTRAINT `enroll_ibfk_1` FOREIGN KEY (`tempid`) REFERENCES `temp` (`tempid`),
  ADD CONSTRAINT `enroll_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `userdb` (`userid`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `p1` FOREIGN KEY (`userid`) REFERENCES `userdb` (`userid`);

--
-- Constraints for table `specificreq`
--
ALTER TABLE `specificreq`
  ADD CONSTRAINT `specificreq_ibfk_1` FOREIGN KEY (`requestid`) REFERENCES `request` (`requestid`),
  ADD CONSTRAINT `specificreq_ibfk_2` FOREIGN KEY (`tutorid`) REFERENCES `tutor` (`tutorid`);

--
-- Constraints for table `temp`
--
ALTER TABLE `temp`
  ADD CONSTRAINT `temp_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`),
  ADD CONSTRAINT `temp_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `userdb` (`userid`);

--
-- Constraints for table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseid`);

--
-- Constraints for table `tutor`
--
ALTER TABLE `tutor`
  ADD CONSTRAINT `tutor_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `userdb` (`userid`);

--
-- Constraints for table `userdb`
--
ALTER TABLE `userdb`
  ADD CONSTRAINT `ccc` FOREIGN KEY (`roleid`) REFERENCES `role` (`roleid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 01:12 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `faceoff`
use id22111731_msec;
CREATE TABLE `login` (
  `username` varchar(50),
  `loginid` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `round1` (
  `username` varchar(50),
  `loginid` int,
  `mark1` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `round2` (
  `username` varchar(50),
  `loginid` int,
  `mark2` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `round3` (
  `username` varchar(50),
  `loginid` int,
  `mark3` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `round4` (
  `username` varchar(50),
  `loginid` int,
  `mark3` int
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `round1_question` (
  `question_no` int,
  `question` varchar(512),
  `option1` char(40),
  `option2` char(40),
  `option3` char(40),
  `option4` char(40),
  `correct` char(40)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `round2_question` (
  `question_no` int,
  `question` varchar(512),
  `option1` char(40),
  `option2` char(40),
  `option3` char(40),
  `option4` char(40),
  `correct` char(40)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `round3_question` (
  `question_no` int,
  `question` varchar(512),
  `option1` char(40),
  `option2` char(40),
  `option3` char(40),
  `option4` char(40),
  `correct` char(40)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `round4_question` (
  `question_no` int,
  `question` varchar(512),
  `option1` char(40),
  `option2` char(40),
  `option3` char(40),
  `option4` char(40),
  `correct` char(40)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
INSERT INTO round1_question (question, option1, option2, option3, option4, correct) VALUES
	('What is part of a database that holds only one type of information?', 'Report', 'Field', 'Record', 'File', 'Field'),
	('OS\' computer abbreviation usually means ?', 'Order of Significance', 'Open Software', 'Operating System', 'Optical Sensor', 'Operating System'),
	('.MOV\' extension refers usually to what kind of file?', 'Image file', 'Animation/movie file', 'Audio file', 'MS Office document', 'Animation/movie file'),
	('Who developed Yahoo?', 'Dennis Ritchie & Ken Thompson', 'David Filo & Jerry Yang', 'Vint Cerf & Robert Kahn', 'Steve Case & Jeff Bezos', 'David Filo & Jerry Yang'),
	('What do we call a network whose elements may be separated by some distance? It usually involves two or more small networks and dedicated high-speed telephone lines.', 'URL (Universal Resource Locator)', 'LAN (Local Area Network)', 'WAN (Wide Area Network)', 'World Wide Web', 'WAN (Wide Area Network)'),
	('Who among the following considered as the \'father of artificial intelligence\'?', 'Charles Babbage', 'Lee De Forest', 'John McCarthy', ' JP Eckert', ' John McCarthy'),
	('Which was first virus detected on ARPANET, the forerunner of the internet in the early 1970s?', 'Exe Flie', 'Creeper Virus', 'Peeper Virus', 'Trozen horse', 'Creeper Virus'),
	('Select the example of application software of computer:', 'Ms Word', 'Ms Excel', 'Both A and B', 'MS-DOS', 'both A and B'),
	('Which of the following is also called translator?', 'Data representation', 'MS-DOS', 'Operating System', 'Language Processor', 'Language Processor'),
	('The first search engine on the internet is', 'Archie', 'Google', 'Bing', 'Yahoo', 'Archie'),
	('The number of bits used by IPv6 address is', '16', '32', '64', '128', '128'),
	('The first web browser invented in 1990 was', 'WorldWideWeb', 'Internet Explorer', 'Mosaic', 'Nexus Correct', 'WorldWideWeb'),
	('Which technology is used to record cryptocurrency transactions?', 'Mining', 'Digital wallet', 'Blockchain technology', 'Token', 'Blockchain technology'),
	('What technology is used to make telephone calls over the Internet possible?', 'VoIP', 'Bluetooth', 'Ethernet', 'All of the above', 'VoIP'),
	('The process of starting or restarting a computer is called:', 'Start up point', 'Booting', 'Connecting', 'Resetting', 'Booting'),
	('The other name for a Hard disk is:', 'Compact Disc', 'Fixed Disk', 'Hard Drive Disk', 'Floppy Disk', 'Hard Drive Disk'),
	('Which component is often referred to as the \'brain\' of the motherboard?', 'Processor', 'Bios', 'Computer Chip', 'Transistor', 'Processor'),
	('What is HTML?', 'HTML describes the structure of a webpage', 'HTML is the standard markup language mainly used to create web pages', 'HTML consists of a set of elements that helps the browser how to view the content', 'All of the mentioned', 'All of the mentioned'),
	('HTML stands for __________', 'HyperText Markup Language', 'HyperText Machine Language', 'HyperText Marking Language', 'HighText Marking Language', 'HyperText Markup Language'),
	('What is the full form of “AI”?', 'Artificially Intelligent', 'Artificial Intelligence', 'Artificially Intelligence', 'Advanced Intelligence', 'Artificial Intelligence'),
	('What is the goal of Artificial Intelligence?', 'To solve artificial problems', 'To extract scientific causes', 'To explain various sorts of intelligence', 'To solve real-world problems', 'To explain various sorts of intelligence'),
	('Which of the following is not the commonly used programming language for Artificial Intelligence?', 'Perl', 'Java', 'PROLOG', 'LISP', 'Perl'),
	('What is a computer network?', 'A device used to display information on a computer screen', 'A collection of interconnected computers and devices that can communicate and share resources', 'A type of software used to create documents and presentations', 'The physical casing that protects a computer’s internal components', 'A collection of interconnected computers and devices that can communicate and share resources'),
	('Which of the following is an example of Bluetooth?', 'wide area network', 'virtual private network', 'local area network', 'personal area network', 'personal area network'),
	('Which of the following language does the computer understand?', 'Computer understands only C Language', 'Computer understands only Assembly Language', 'Computer understands only Binary Language', 'Computer understands only BASIC', 'Computer understands only Binary Language'),
	('Which of the following computer language is written in binary codes only?', 'pascal', 'machine language', 'C', 'C#', ' machine language'),
	('Which of the following is the smallest unit of data in a computer?', 'Bit', 'KB', 'Nibble', 'Byte', 'Bit'),
	('Which of the following unit is responsible for converting the data received from the user into a computer understandable format?', 'Output Unit', 'Input Unit', 'Memory Unit', 'Arithmetic & Logic Unit', 'Input Unit'),
	('Which of the following is not a type of computer code?', 'EDIC', 'ASCII', 'BCD', 'EBCDIC', 'EDIC'),
	('Which of the following can access the server?', 'Web Client', 'User', 'Web Browser', 'Web Server', 'Web Client'),
	('What is a data structure?', 'A programming language', 'A collection of algorithms', 'A way to store and organize data', ' A type of computer hardware', 'A way to store and organize data'),
	('What are the disadvantages of arrays?', 'Index value of an array can be negative', 'Elements are sequentially accessed', 'Data structure like queue or stack cannot be implemented', ' There are chances of wastage of memory space if elements inserted in an array are lesser than the allocated size', ' There are chances of wastage of memory space if elements inserted in an array are lesser than the allocated size'),
	('The data structure required for breadth First Traversal on a graph is?', 'Array', 'Stack', 'Tree', ' Queue', ' Queue'),
	('Which data structure is based on the Last In First Out (LIFO) principle?', 'Tree', 'Linked List', 'Stack', ' Queue', 'Stack'),
	('What is a database?', 'Organized collection of information that cannot be accessed, updated, and managed', 'Collection of data or information without organizing', 'Organized collection of data or information that can be accessed, updated, and managed', ' Organized collection of data that cannot be updated', 'Organized collection of data or information that can be accessed, updated, and managed'),
	('In which of the following formats data is stored in the database management system?', 'Image', 'Text', 'Table', ' Graph', 'Table'),
	('Which command is used to remove a relation from an SQL?', 'Drop table', 'Delete', 'Purge', ' Remove', 'Drop table'),
	('What is MS Word used for?', 'Design Pictures', 'Design Videos', 'Paint', 'Design Texts', 'Design Texts'),
	('Microsoft Word was released in which year?', '1981', '1982', '1983', '1984', 'Answer :1983'),
	('Which of the following option is NOT present in Office button?', 'Prepare', 'Send', 'Publish', ' None of the above', 'None of the above'),
	('Quick Access Toolbar is present at ______ of Office button in MS Wor', 'Up', 'Down', 'Left', 'Right', ' Right'),
	('What is MS Excel?', 'Spreadsheet', 'Database Management', 'Presentation', 'Workbook', ' Spreadsheet'),
	('The intersection of a column and a row in a worksheet is called____', 'Column', 'Address', 'Value', 'Cell', 'Cell'),
	('Which of the following part of a processor contains the hardware necessary to perform all the operations required by a computer?', 'Controller', 'Registers', 'Cache', ' Data path', ' Data path'),
	('Which of the following devices provides the communication between a computer and the outer world?', 'Compact', 'I/O', 'Drivers', ' Storage', 'I/O'),
	('Which of the following can access the server?', 'Web Client', 'User', 'Web browser', ' Web Server', 'Web Client'),
	('Which of the following is not a type of computer on the basis of operation?', 'Digital', 'I/O', 'Hybrid', ' Remote', ' Remote'),
	('Which type of Programming does Python support?', 'object-oriented programming', 'structured programming', 'functional programming', ' all of the mentioned', ' all of the mentioned'),
	('What does pip stand for python?', 'Pip Installs Python', 'Pip Installs Packages', 'Preferred Installer Program', ' All of the mentioned', 'Preferred Installer Program'),
	('Which one of the following is not a Java feature?', 'Object-oriented', 'Use of pointers', 'Portable', ' Dynamic and Extensible', 'Use of pointers');
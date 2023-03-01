-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2023 at 11:42 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loopsync`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `Course id` int NOT NULL AUTO_INCREMENT,
  `AuthorEmail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Category` varchar(200) NOT NULL,
  `Price` int NOT NULL,
  `Thumbnail` text NOT NULL,
  `Trailer` text NOT NULL,
  `SubDescription` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Requirement` mediumtext NOT NULL,
  `Description` longtext NOT NULL,
  `Cur-date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Course id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Course id`, `AuthorEmail`, `Name`, `Category`, `Price`, `Thumbnail`, `Trailer`, `SubDescription`, `Requirement`, `Description`, `Cur-date`) VALUES
(1, 'allardwarden@gmail.com', 'Adobe Illustrator Full Tutorial', 'Graphic Design &amp; Illustration', 5000, 'uploads/img/illustrator.jpeg', 'uploads/video/adobe_illus.mp4', 'Learn Adobe Illustrator CC graphic design and logo design.', '1.Any version of Adobe Illustrator, preferably the CC (Creative Cloud) version.\\r\\n\\r\\n2. No prior knowledge or experience with Illustrator is required', 'Hi there, my name is Dan. I&#039;m an Adobe Certified Instructor... and an Adobe Certified Expert in Adobe Illustrator. Now together, me and you, are going to go through this course... and make beautiful art work together, using Illustrator. During this course, you won&#039;t just learn how to use this tool... we&#039;ll work through real world practical projects. Now this course is aimed at people completely new to Illustrator... and maybe to Design, in general. We&#039;re going to start absolutely right at the beginning... and work our way through step by step. We&#039;ll start with the techniques... that you&#039;ll need to create just about anything in Illustrator. We&#039;ll customize shapes, use the wonderful Shape Builder tool... and the simple to use Curvature tool. We&#039;ll form lines, and brushes, plus your soon to be favorite, Width tool. You&#039;ll master how to use and manipulate Types. I&#039;ll show you all the sneaky secrets that Illustrator has... to discover and use beautiful colors like a seasoned designer. You&#039;ll learn how to push, pull, cut, and repeat, just like this. There&#039;s even a section in here... where we&#039;ll hone our skills by practicing, redrawing these real world brands. We won&#039;t forget the essentials like proper saving, and exporting... plus so much more. So if you&#039;ve never opened up Illustrator before... or you&#039;ve opened it, and you&#039;ve struggled a little bit... follow me, I&#039;ll show you how to make... beautiful art work together, in Illustrator. 2. Course Exercise Files for Adobe Illustrator CC Essentials: All right, time to get started. There&#039;s a couple of things you need to do first. One is, download the exercise files. There&#039;ll be a link on the page to download those, you can play along. There&#039;s another link there saying, The Completed Files. You don&#039;t need these, but they&#039;re handy. What I do at the end of every video I kind of save where I&#039;m up to. So that, maybe yours is not quite working, you just want to see how I made mine. You can download that Illustrator.', '2023-02-22 22:39:28'),
(2, 'allardwarden@gmail.com', 'After Effect Full Course', 'Video & Animation', 8000, 'uploads/img/after-effects-training.jpg', 'uploads/video/after_effect.mp4', 'Adobe After Effects CC Create stunning Motion Graphics and VFX Visual Effects.', '1.No Prior Knowledge of After Effects, Visual Effects or Motion Graphics Required\\r\\n\\r\\n2.A working copy of preferably After Effects CC 2022 or CC 2023\\r\\n\\r\\n3.All project files are available in After Effects CC 2020, CC 2019 and CC 2018', 'Hello everyone. I&#039;m Hallease, a digital storyteller, video producer and YouTuber. I&#039;m also the Executive Producer and Creative Director of StumbleWell, my production company. All that to say, I like to tell stories and my chosen medium for that is film-making and video production. I love taking a compilation of seemingly meaningless footage and turning it into some story, whether it be to document my own life and experiences on my YouTube channel or for my clients. In this class, I&#039;m going to teach you the basics of After Effects. If you&#039;ve never opened After Effects before, this will be the class for you. We&#039;ll go over how to open an organize a new project and a brief overview of the interface. We&#039;ll also go over the basics of creating a composition, messing with layers in a 2D space, the basics of keyframing, which I know can be a hard concept to understand for many, as well as some basics with keying and masking as well. Finally, I&#039;ll also touch on some basic motion graphics ideas and best practices. You&#039;ll notice I keep saying the basics with everything for this class. That&#039;s because After Effects is an incredibly powerful application with a wide array of tools at your disposal. This class is merely meant to introduce you to the application. I&#039;ll feel like I&#039;ve done my job as your teacher if by the end you can open After Effects and not feel so overwhelmed and also begin to have the language and nomenclature to explore more advanced tools and skills in After Effects. I think this class will be great for creatives who have a beginner to intermediate understanding of applications like Photoshop, Illustrator or Premier Pro. Basically, any artistic application that specializes in either layers or video editing, I always describe After Effects to people as Photoshop, but for video. For our class, you will need the latest version of After Effects, ideally through an Adobe Creative Cloud membership.', '2023-02-22 22:52:12'),
(3, 'allardwarden@gmail.com', 'Introduction to Software Engineering', 'Mobile Development', 5500, 'uploads/img/maxresdefault.jpg', 'uploads/video/java.mp4', 'Learn Java In This Course And Become a Computer Programmer.', '1. A computer with either Windows, Mac or Linux to install all the free software and tools needed to build your new apps (I provide specific videos on installations for each platform).\\r\\n2. A strong work ethic, willingness to learn, and plenty of excitement about the awesome new programs you’re about to build.\\r\\n3. Nothing else! It’s just you, your computer and your hunger to get started today.', 'Hello, everyone, and welcome to simplilearn and this software course. In this course, we&#039;re gonna be mainly discussing the software development cycle. So software development cycle is really just a set of different steps you can take to design better software. If you&#039;re designing, for example, a small calculator, you don&#039;t need a lot of beforehand practice and figuring out the details. It&#039;s a small application. It might be, you know, maybe 100 lines of code. Maybe it&#039;s bigger and it&#039;s, you know, 1000 lines of code or even 10,000 lines of code. These projects don&#039;t require a lot of planning to get right, because once you designed the 10,000 you can kind of have it all in your mind. You can go back and you can rework it, make things better, and it won&#039;t be too difficult. What starts to get problematic is when you get into larger than that. If you have 100,000 lines of code, suddenly there are lots of things interacting with each other. Bugs start coming into play that you didn&#039;t expect, and these bugs start being really, really complex instead of a bug which just contacts another place. Let&#039;s say in a smaller application you have a bug which kind of propagates like this, it&#039;s easy to track. You know, You the bug starts here. You look at this piece of code. You look at this piece of code, you fix the bug when you get the larger pieces. Larger programs suddenly have bugs that look like this where everything is talking to one another. And if you have no plan and no diagram, a bug can look like it&#039;s appearing in 100 different places, and you need to be able to figure out how to find stuff like that. You also need to figure out how to design it so that you can extend later on. If you want to make your project bigger, you need a bank it so that it&#039;s in a state where you can add on to it easily. And that&#039;s what all of this is going to detail. So we&#039;ll be starting off, which is going over the software development cycle. We&#039;re then gonna talk about requirements and specificati', '2023-02-22 23:00:36');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

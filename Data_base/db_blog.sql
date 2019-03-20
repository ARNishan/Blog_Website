-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 20, 2019 at 03:27 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `dbl_social`
--

CREATE TABLE IF NOT EXISTS `dbl_social` (
`id` int(11) NOT NULL,
  `fb` varchar(255) NOT NULL,
  `tw` varchar(255) NOT NULL,
  `ln` varchar(255) NOT NULL,
  `gp` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dbl_social`
--

INSERT INTO `dbl_social` (`id`, `fb`, `tw`, `ln`, `gp`) VALUES
(1, 'https://facebook.com', 'https://twitter.com', 'https://linkdin.com', 'https://google.com');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
`id` int(11) NOT NULL,
  `cat` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `author` varchar(50) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `cat`, `title`, `body`, `image`, `author`, `tags`, `date`, `userid`) VALUES
(10, 1, 'Introduction of JAVA', '<p>What is Java?<br />Java is a popular programming language, created in 1995. It is owned by Oracle, and more than 3 billion devices run Java.<br />It is used for:<br />Mobile applications (specially Android apps) Desktop applications Web applications Web servers and application servers Games Database connection And much, much more! Why Use Java? Java works on different platforms (Windows, Mac, Linux, Raspberry Pi, etc.)<br />It is one of the most popular programming language in the world It is easy to learn and simple to use It is open-source and free It is secure, fast and powerful It has a huge community support (tens of millions of developers)</p>', 'upload/bb9263fd60.png', 'Nishan', 'JAVA, Programming', '2019-03-13 19:20:39', 0),
(11, 2, 'Introduction of PHP', '<p>The PHP Hypertext Preprocessor (PHP) is a programming language that allows web developers to create dynamic content that interacts with databases. PHP is basically used for developing web based software applications. This tutorial helps you to build your base with PHP.<br />This tutorial is designed for PHP programmers who are completely unaware of PHP concepts but they have basic understanding on computer programming.</p>', 'upload/c891e7d9f1.png', 'Admin', 'PHP, Programming', '2019-03-13 19:21:47', 0),
(13, 3, 'Study HTML and Learn to Code With Our Step-By-Step Guide', '<p>While many guides on the internet attempt to teach HTML using a lot of mind-boggling theory, this tutorial will instead focus on giving you the practical skills to build your first site.<br />The aim is to show you ï¿½howï¿½ to create your first web page without spending the entire tutorial focusing too much on the why.By the end of this tutorial, you will have the know-how to create a basic website and we hope that this will inspire you to delve further into the world of HTML using our follow-on guide While many guides on the internet attempt to teach HTML using a lot of mind-boggling theory, this tutorial will instead focus on giving you the practical skills to build your first site.<br />The aim is to show you ï¿½howï¿½ to create your first web page without spending the entire tutorial focusing too much on the why. By the end of this tutorial, you will have the know-how to create a basic website and we hope that this will inspire you to delve further into the world of HTML using our follow-on guides.Okay, so this is the only bit of mandatory theory. In order to begin to write HTML, it helps if you know what you are writing.HTML is the language in which most websites are written. HTML is used to create pages and make them functional. The code used to make them visually appealing is known as CSS and we shall focus on this in a later tutorial. For now, we will focus on teaching you how to build rather than design.</p>', 'upload/c44e7e6356.jpg', 'Tuhin', 'HTML,Web Design', '2019-03-13 19:24:11', 0),
(14, 3, 'HTML5: what is it?', '<p>HTML5 is the latest evolution of the standard that defines HTML. The term represents two different concepts. It is a new version of the language HTML, with new elements, attributes, and behaviors, and a larger set of technologies that allows the building of more diverse and powerful Web sites and applications. This set is sometimes called HTML5 &amp; friends and often shortened to just HTML5.<br />Designed to be usable by all Open Web developers, this reference page links to numerous resources about HTML5 technologies, classified into several groups based on their function.Semantics: allowing you to describe more precisely what your content is. Connectivity: allowing you to communicate with the server in new and innovative ways. Offline and storage: allowing webpages to store data on the client-side locally and operate offline more efficiently. Multimedia: making video and audio first-class citizens in the Open Web. 2D/3D graphics and effects: allowing a much more diverse range of presentation options. Performance and integration: providing greater speed optimization and better usage of computer hardware. Device access: allowing for the usage of various input and output devices. Styling: letting authors write more sophisticated themes.</p>', 'upload/e1bb1216ae.jpg', 'Mahbub', 'HTML,Web Design', '2019-03-13 19:25:08', 0),
(16, 6, 'ABOUT RUBY | A PROGRAMMER''S BEST FRIEND', '<p>Ruby is a language of careful balance. Its creator, Yukihiro &ldquo;Matz&rdquo; Matsumoto, blended parts of his favorite languages (Perl, Smalltalk, Eiffel, Ada, and Lisp) to form a new language that balanced functional programming with imperative programming.<br />He has often said that he is &ldquo;trying to make Ruby natural, not simple,&rdquo; in a way that mirrors life.</p>\r\n<p>About Ruby&rsquo;s Growth<br />Since its public release in 1995, Ruby has drawn devoted coders worldwide. In 2006, Ruby achieved mass acceptance. With active user groups formed in the world&rsquo;s major cities and Ruby-related conferences filled to capacity.<br />Ruby-Talk, the primary mailing list for discussion of the Ruby language, climbed to an average of 200 messages per day in 2006. It has dropped in recent years as the size of the community pushed discussion from one central list into many smaller groups.<br />Ruby is ranked among the top 10 on most of the indices that measure the growth and popularity of programming languages worldwide (such as the TIOBE index). Much of the growth is attributed to the popularity of software written in Ruby, particularly the Ruby on Rails web framework.<br />Ruby is also completely free. Not only free of charge, but also free to use, copy, modify, and distribute.</p>\r\n<p>Ruby&rsquo;s Flexibility<br />Ruby is seen as a flexible language, since it allows its users to freely alter its parts. Essential parts of Ruby can be removed or redefined, at will. Existing parts can be added upon. Ruby tries not to restrict the coder.</p>', 'upload/f4aabc82ef.jpg', 'Nishan', 'Ruby, Programming', '2019-03-13 19:27:22', 2),
(18, 2, 'What is PHP Used For? - Uses & Advantages', '<p>What Is PHP?<br />PHP stands for Hypertext Preprocessor (no, the acronym doesn''t follow the name). <br />It''s an open source, server-side, scripting language used for the development of web applications. By scripting language,<br />we mean a program that is script-based (lines of code) written for the automation of tasks. What does open source mean? <br />Think of a car manufacturer making the secret to its design models and technology innovations available to anyone interested.<br />These design and technology details can be redistributed, modified, and adopted without the fear of any legal repercussions.<br />The world today might have developed an amazing supercar!<br />Web pages can be designed using HTML. With HTML, code execution is done on the user''s browser (client-side). On the other hand, <br />with PHP server-side scripting language, it''s executed on the server before it gets to the web browser of the user.<br />PHP can be embedded in HTML, and it''s well suited for web development and the creation of dynamic web pages for web applications, e-commerce applications, and database applications. It''s considered a friendly language with abilities to easily connect with MySQL, Oracle, and other databases.<br />PHP Use.<br />PHP scripts can be used on most of the well-known operating systems like Linux, Unix, Solaris, Microsoft Windows, <br />MAC OS and many others. It also supports most web servers including Apache and IIS. <br />Using PHP affords web developers the freedom to choose their operating system and web server. In PHP, server-side scripting is the main area of operation. Server-side scripting with PHP involves: PHP Parser: a program that converts source and human readable code into a format easier for the computer to understand.</p>', 'upload/094dd2c56f.png', 'Mahbub', 'PHP, Programming', '2019-03-13 20:00:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbi_pages`
--

CREATE TABLE IF NOT EXISTS `tbi_pages` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `body` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbi_pages`
--

INSERT INTO `tbi_pages` (`id`, `name`, `body`) VALUES
(9, 'About us', '<p><span>About us..Some text will be go here. Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.Some text will be go here.S'),
(10, 'Courtney Haynie', '<p>Courtney Haynie</p>'),
(11, 'new ', '<p>Nothing</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
`id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`) VALUES
(1, 'JAVA'),
(2, 'PHP'),
(3, 'HTML'),
(4, 'CSS'),
(6, 'Ruby');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `	email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `firstname`, `lastname`, `	email`, `message`, `status`) VALUES
(1, 'nishan', 'rahman', 'n@gmail.com', 'my comment', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contuct_us`
--

CREATE TABLE IF NOT EXISTS `tbl_contuct_us` (
`id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contuct_us`
--

INSERT INTO `tbl_contuct_us` (`id`, `firstname`, `lastname`, `email`, `message`, `status`, `date`) VALUES
(1, 'Jecey', 'Duprie', 'jeceyduprie@gmail.com', 'ww', 1, '2019-03-15 13:16:59'),
(4, 'Nishan', 'Rahman', 'nrahman@gmail.com', 'While many guides on the internet attempt to teach HTML using a lot of mind-boggling theory', 1, '2019-03-17 11:51:02');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_footer`
--

CREATE TABLE IF NOT EXISTS `tbl_footer` (
`id` int(11) NOT NULL,
  `body` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_footer`
--

INSERT INTO `tbl_footer` (`id`, `body`) VALUES
(1, 'Copyright ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_slider` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`id`, `title`, `image`, `userid`) VALUES
(1, 'First slider here', 'upload/slider/6dbfdff440.jpg', 1),
(5, 'second slider will be go here', 'upload/slider/4347ce57c8.jpg', 1),
(6, 'Third slider will be go here', 'upload/slider/5eaae74b7a.jpg', 1),
(7, 'Last slider will be go here', 'upload/slider/c8a4a80405.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_themes`
--

CREATE TABLE IF NOT EXISTS `tbl_themes` (
`id` int(11) NOT NULL,
  `theme` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_themes`
--

INSERT INTO `tbl_themes` (`id`, `theme`) VALUES
(1, 'green');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `detail`, `role`) VALUES
(1, 'Nishan Rahman', 'nishan', '8cb0980c881d6decf433b7cb1508ce98', 'nishanrahman1994@gmail.com', 'Hey, I am Nishan Rahman ,I am from Bangladesh.', 0),
(2, 'Pk', 'Author', '202cb962ac59075b964b07152d234b70', 'pagla@gmail.com', 'No Info', 1),
(3, '', 'Editor', '289dff07669d7a23de0ef88d2f7129e7', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `title_slogan`
--

CREATE TABLE IF NOT EXISTS `title_slogan` (
`id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slogan` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `title_slogan`
--

INSERT INTO `title_slogan` (`id`, `title`, `slogan`, `logo`) VALUES
(1, 'Our Title is here', 'Our slogan is here', 'upload/logo.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dbl_social`
--
ALTER TABLE `dbl_social`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbi_pages`
--
ALTER TABLE `tbi_pages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contuct_us`
--
ALTER TABLE `tbl_contuct_us`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_themes`
--
ALTER TABLE `tbl_themes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `title_slogan`
--
ALTER TABLE `title_slogan`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dbl_social`
--
ALTER TABLE `dbl_social`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbi_pages`
--
ALTER TABLE `tbi_pages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_contuct_us`
--
ALTER TABLE `tbl_contuct_us`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_footer`
--
ALTER TABLE `tbl_footer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_themes`
--
ALTER TABLE `tbl_themes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `title_slogan`
--
ALTER TABLE `title_slogan`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

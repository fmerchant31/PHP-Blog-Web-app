-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 09:10 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simple-blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `comment` text NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `username`, `comment`, `post_id`) VALUES
(1, 'umema', 'nice', 5),
(2, 'abcxyz', 'cool', 5),
(3, 'umema', 'great', 5),
(4, 'umema', 'ok', 5),
(7, 'fatema', 'nice blog', 6),
(8, 'fatema', 'nice blog', 6),
(9, 'zxcvb', 'qwert', 5),
(10, 'zxcvb', 'qwert', 5),
(11, 'fatema', 'nice blog', 7),
(12, 'fatema', 'qq', 7),
(13, 'fatema', 'qwert', 7),
(14, 'fatema', 'cool', 4),
(15, 'fatema', 'cool', 4),
(28, 'admin', 'gi', 16),
(32, 'admin', 'hi', 15),
(34, 'umema1', 'hii', 17);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(50) NOT NULL,
  `title` text NOT NULL,
  `author` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `body` varchar(10000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `author`, `photo`, `body`, `created_at`) VALUES
(4, 'Demo 1', 'fatema', 'poster (8).png', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', '2021-09-09 00:00:00'),
(5, 'demo 3', 'qwerty', 'coffee.jpg', '<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n', '2021-09-09 00:00:00'),
(6, 'demo 4', 'fatema', 'Blue Nautical Anchor Logo-min.png', '<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p>&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p>&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n', '2021-09-09 00:00:00'),
(7, 'demo 5', 'fatema', 'Outdoor Adventure Instagram Post.png', '<p><strong>Responsive Bootstrap Footer</strong></p>\r\n\r\n<p><em>By&nbsp;</em>idesignSMF</p>\r\n\r\n<p>This is a simple Bootstrap footer in comparison to the previous Bootstrap footers above given it only has services, about, and company description with a few social media links.&nbsp;</p>\r\n\r\n<p>In smaller viewpoints, the three columns turn into only two rows.</p>\r\n\r\n<p><strong>Bootstrap 4 Footer and Sub Navigation</strong></p>\r\n\r\n<p><em>By&nbsp;gcjosh</em></p>\r\n\r\n<p>This Bootstrap footer example comes with a sub-navigation that can be linked to different contact pages.&nbsp;</p>\r\n\r\n<p>The footer is designed for a city&#39;s website but can easily be changed to fit your website.&nbsp;</p>\r\n', '2021-09-13 17:53:33'),
(10, 'Demo 7', 'fatema1', '38.png', '<p><strong>Component diagram</strong>&nbsp;shows components, provided and required interfaces, ports, and relationships between them. This type of diagrams is used in&nbsp;<strong>Component-Based Development</strong>&nbsp;(<strong>CBD</strong>) to describe systems with&nbsp;<strong>Service-Oriented Architecture</strong>&nbsp;(<strong>SOA</strong>).</p>\r\n\r\n<p>Component-based development is based on assumptions that previously constructed components could be reused and that components could be replaced by some other &quot;equivalent&quot; or &quot;conformant&quot; components, if needed.</p>\r\n\r\n<p>The artifacts that implement component are intended to be capable of being deployed and re-deployed independently, for instance to update an existing system.</p>\r\n\r\n<p><strong>Components</strong>&nbsp;in UML could represent</p>\r\n\r\n<ul>\r\n	<li><strong>logical components</strong>&nbsp;(e.g., business components, process components), and</li>\r\n	<li><strong>physical components</strong>&nbsp;(e.g., CORBA components, EJB components, COM+ and .NET components, WSDL components, etc.),</li>\r\n</ul>\r\n\r\n<p>along with the artifacts that implement them and the nodes on which they are deployed and executed. It is anticipated that profiles based around components will be developed for specific component technologies and associated hardware and software environments.</p>\r\n\r\n<p>The following nodes and edges are typically drawn in a&nbsp;<strong>component diagram</strong>:&nbsp;<a href=\"https://www.uml-diagrams.org/component.html\">component</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/interface.html\">interface</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/component.html#provided-interface\">provided interface</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/component.html#required-interface\">required interface</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/class.html\">class</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/port.html\">port</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/composite-structure-diagrams/connector.html\">connector</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/artifact.html\">artifact</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/component-realization.html\">component realization</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/dependency.html\">dependency</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/dependency.html#usage\">usage</a>. These major elements are shown on the picture below.</p>\r\n', '2021-09-14 13:16:48'),
(12, 'Demo 10', 'fatema1', '39.png', '<p><strong>Component diagram</strong>&nbsp;shows components, provided and required interfaces, ports, and relationships between them. This type of diagrams is used in&nbsp;<strong>Component-Based Development</strong>&nbsp;(<strong>CBD</strong>) to describe systems with&nbsp;<strong>Service-Oriented Architecture</strong>&nbsp;(<strong>SOA</strong>).</p>\r\n\r\n<p>Component-based development is based on assumptions that previously constructed components could be reused and that components could be replaced by some other &quot;equivalent&quot; or &quot;conformant&quot; components, if needed.</p>\r\n\r\n<p>The artifacts that implement component are intended to be capable of being deployed and re-deployed independently, for instance to update an existing system.</p>\r\n\r\n<p><strong>Components</strong>&nbsp;in UML could represent</p>\r\n\r\n<ul>\r\n	<li><strong>logical components</strong>&nbsp;(e.g., business components, process components), and</li>\r\n	<li><strong>physical components</strong>&nbsp;(e.g., CORBA components, EJB components, COM+ and .NET components, WSDL components, etc.),</li>\r\n</ul>\r\n\r\n<p>along with the artifacts that implement them and the nodes on which they are deployed and executed. It is anticipated that profiles based around components will be developed for specific component technologies and associated hardware and software environments.</p>\r\n\r\n<p>The following nodes and edges are typically drawn in a&nbsp;<strong>component diagram</strong>:&nbsp;<a href=\"https://www.uml-diagrams.org/component.html\">component</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/interface.html\">interface</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/component.html#provided-interface\">provided interface</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/component.html#required-interface\">required interface</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/class.html\">class</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/port.html\">port</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/composite-structure-diagrams/connector.html\">connector</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/artifact.html\">artifact</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/component-realization.html\">component realization</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/dependency.html\">dependency</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/dependency.html#usage\">usage</a>. These major elements are shown on the picture below.</p>\r\n', '2021-09-14 13:22:24'),
(15, 'Demo 11', 'fatema1', 'smm.jpg', '<p><strong>Component diagram</strong>&nbsp;shows components, provided and required interfaces, ports, and relationships between them. This type of diagrams is used in&nbsp;<strong>Component-Based Development</strong>&nbsp;(<strong>CBD</strong>) to describe systems with&nbsp;<strong>Service-Oriented Architecture</strong>&nbsp;(<strong>SOA</strong>).</p>\r\n\r\n<p>Component-based development is based on assumptions that previously constructed components could be reused and that components could be replaced by some other &quot;equivalent&quot; or &quot;conformant&quot; components, if needed.</p>\r\n\r\n<p>The artifacts that implement component are intended to be capable of being deployed and re-deployed independently, for instance to update an existing system.</p>\r\n\r\n<p><strong>Components</strong>&nbsp;in UML could represent</p>\r\n\r\n<ul>\r\n	<li><strong>logical components</strong>&nbsp;(e.g., business components, process components), and</li>\r\n	<li><strong>physical components</strong>&nbsp;(e.g., CORBA components, EJB components, COM+ and .NET components, WSDL components, etc.),</li>\r\n</ul>\r\n\r\n<p>along with the artifacts that implement them and the nodes on which they are deployed and executed. It is anticipated that profiles based around components will be developed for specific component technologies and associated hardware and software environments.</p>\r\n\r\n<p>The following nodes and edges are typically drawn in a&nbsp;<strong>component diagram</strong>:&nbsp;<a href=\"https://www.uml-diagrams.org/component.html\">component</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/interface.html\">interface</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/component.html#provided-interface\">provided interface</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/component.html#required-interface\">required interface</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/class.html\">class</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/port.html\">port</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/composite-structure-diagrams/connector.html\">connector</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/artifact.html\">artifact</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/component-realization.html\">component realization</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/dependency.html\">dependency</a>,&nbsp;<a href=\"https://www.uml-diagrams.org/dependency.html#usage\">usage</a>. These major elements are shown on the picture below.</p>\r\n', '2021-09-16 17:27:23'),
(16, 'Demo 12', 'fatema1', 'm2 logo (2).png', '<h2>Pre-Processing</h2>\r\n\r\n<p>The third step is to process our input data. We must clean the data, meaning we only use the data-points relevant to our design problem. This process is called feature engineering[3] . The OSM data contains a variety of features and finding the right and useful features was a tough task. As has been said &ldquo;Garbage in, garbage out&rdquo;; hence having the right data as input for the machine learning model was a necessary step.</p>\r\n\r\n<p>The target variable is the feature or a variable we are going to predict using other input features in the data. For this example project the target variable we are focused on is&nbsp;<em>Building Attribute Type</em>&nbsp;(ie. building use). To train our Machine Learning model, we will use the following features of the OpenStreetMap data to predict our target variable for a new development site.</p>\r\n\r\n<ol>\r\n	<li>Building perimeter</li>\r\n	<li>Number of neighbor buildings</li>\r\n	<li>Postal code</li>\r\n	<li>Street name</li>\r\n	<li>Site area</li>\r\n	<li>Site perimeter</li>\r\n	<li>Number of buildings in 50m, 100m, and 200m radius</li>\r\n</ol>\r\n', '2021-09-16 20:21:14'),
(17, 'Demo 13', 'qwerty', '8.jpg', '<p><strong>Abstract: </strong>The main objective of higher education institutions is to provide quality education to its students. One way to achieve highest level of quality in higher education system is by discovering knowledge for prediction regarding enrolment of students in a particular course, alienation of traditional classroom teaching model, detection of unfair means used in online examination, detection of abnormal values in the result sheets of the students, prediction about students&rsquo; performance and so on. The knowledge is hidden among the educational data set and it is extractable through data mining techniques. This project is developed to justify the capabilities of students in various subjects. In this, the classification task is used to evaluate students&rsquo; performance and as there are many approaches that are used for data classification, the decision tree method and probabilistic classification method is used here. By this task we extract knowledge that describes students&rsquo; performance in end semester examination. It helps earlier in identifying the dropouts and students who need special attention and allow the teacher to provide appropriate advising/counseling. In addition to this, we will also compare the results generated by two classification algorithms, namely ID3 and Na&iuml;ve Based algorithm, and thereby determine which algorithm is more accurate.</p>\r\n\r\n<p><strong>Keywords:</strong> Data Set, Data Mining, Classification Task, ID3 Algorithm, Na&iuml;ve Based Algorithm.</p>\r\n', '2021-09-17 19:11:23'),
(18, 'Demo 14', 'umema', 'WhatsApp Image 2021-04-19 at 12.13.39 PM.jpeg', '', '2021-09-20 11:57:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL,
  `photo` text NOT NULL,
  `mobile` int(10) NOT NULL,
  `address` varchar(30) NOT NULL,
  `roles` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `photo`, `mobile`, `address`, `roles`) VALUES
(1, 'Fatema', 'Merchant', 'fatema', 'fatema@gmail.com', 'fatema', 'Modern Real Estate Logo.jpg', 101010101, 'qwert', 1),
(4, 'umema', 'Merchant', 'umema1', 'fatemamerchant31@gmail.com', 'b216f71d1a416456eeb07965d0fc7556', 'Outdoor Adventure Instagram Post.png', 111111111, 'qwertyu', 0),
(19, 'admin', 'Merchant', 'admin', 'fatemamerchant@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Passpost size phot.jpeg', 444444444, 'qwertyuio', 1),
(22, 'Fatema1', 'Merchant', 'fatemam', 'fatemam@gmail.com', 'e09da53b1ca3fcb9c7ebb3aa10a07e61', 'veg (1).png', 12356, 'qwertyuio', 0),
(26, 'abc', 'abc', 'abc', 'abc@gmail.com', '900150983cd24fb0d6963f7d28e17f72', 'Mocktail (2).png', 35678, 'sdfghjcvbn', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

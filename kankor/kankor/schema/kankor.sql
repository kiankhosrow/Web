-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 27, 2015 at 03:57 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kankor`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `questions_id` int(11) NOT NULL,
  `right` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `questions_id` (`questions_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `title`, `questions_id`, `right`) VALUES
(1, '<p>{A/B={2.3,6</p>', 48, 0),
(2, '<p>{A/B={2,6,8</p>', 48, 0),
(3, '<p>{A/B={2,8</p>', 48, 1),
(4, '<p>{A/B={3,5,7</p>', 48, 0),
(5, '<p>2%</p>', 49, 0),
(6, '<p>4%</p>', 49, 0),
(7, '<p>1%</p>', 49, 1),
(8, '<p>5%</p>', 49, 0),
(9, '<p>7</p>', 50, 0),
(10, '<p>6</p>', 50, 1),
(11, '<p>5</p>', 50, 0),
(12, '<p>4</p>', 50, 0),
(17, '<p>مقعر است</p>', 52, 1),
(18, '<p>محدب است</p>', 52, 0),
(19, '<p>دایروی است</p>', 52, 0),
(20, '<p>ثابت است</p>', 52, 0),
(21, '<p>x=5</p>', 53, 1),
(22, '<p>x=30</p>', 53, 0),
(23, '<p>x=10</p>', 53, 0),
(24, '<p>x=8</p>', 53, 0),
(25, '<p><math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><msup><mi>x</mi><mn>2</mn></msup><mo>-</mo><msup><mn>5</mn><mi>x</mi></msup><mo>+</mo><mn>6</mn></mrow><annotation encoding="TeX">x^2-5^x+6</annotation></semantics></math></p>', 54, 0),
(26, '<p><math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><msup><mi>x</mi><mn>2</mn></msup><mo>+</mo><mn>5</mn><mi>x</mi><mo>+</mo><mn>6</mn></mrow><annotation encoding="TeX">x^2+5x+6</annotation></semantics></math></p>', 54, 1),
(27, '<p><math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><msup><mi>x</mi><mfrac><mn>3</mn><mn>2</mn></mfrac></msup><mo>-</mo><mn>5</mn><mi>x</mi><mo>-</mo><mn>6</mn></mrow><annotation encoding="TeX">x^frac{3}{2} -5x-6</annotation></semantics></math></p>', 54, 0),
(28, '<p><math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><msup><mi>x</mi><mn>2</mn></msup><mo>+</mo><mn>5</mn><msqrt><mo stretchy="false">(</mo></msqrt><mi>x</mi><mo stretchy="false">)</mo><mo>-</mo><mn>6</mn></mrow><annotation encoding="TeX">x^2+5sqrt(x)-6</annotation></semantics></math></p>', 54, 0),
(29, '<p>{1,7}</p>', 55, 0),
(30, '<p>{1.-7}</p>', 55, 0),
(31, '<p>}-1,-7}</p>', 55, 1),
(32, '<p>{-1,7}</p>', 55, 0),
(33, '<p>تابع مثلثاتی</p>', 56, 1),
(34, '<p>تابع ناطق</p>', 56, 0),
(35, '<p>تابع لوگارتمی</p>', 56, 0),
(36, '<p>تابع ثابت</p>', 56, 0),
(37, '<p>m=2e</p>', 57, 0),
(38, '<p>m=e</p>', 57, 1),
(39, '<p>m=2</p>', 57, 0),
(40, '<p>m=1</p>', 57, 0),
(41, '<p>ناحیه چهارم</p>', 58, 0),
(42, '<p>ناحیه سوم</p>', 58, 0),
(43, '<p>ناحیه دوم</p>', 58, 1),
(44, '<p>ناحیه اول</p>', 58, 0),
(45, '<p>360</p>', 59, 0),
(46, '<p>920</p>', 59, 0),
(47, '<p>1080</p>', 59, 1),
(48, '<p>1060</p>', 59, 0),
(49, '<p>4</p>', 60, 0),
(50, '<p>3</p>', 60, 0),
(51, '<p>2</p>', 60, 1),
(52, '<p>1</p>', 60, 0),
(53, '<p>27</p>', 61, 0),
(54, '<p>12</p>', 61, 0),
(55, '<p>-2</p>', 61, 0),
(56, '<p>-5/4</p>', 61, 1),
(57, '<p>5/4</p>', 62, 0),
(58, '<p>-3/2</p>', 62, 0),
(59, '<p>1/2</p>', 62, 0),
(60, '<p>-5/4</p>', 62, 1),
(61, '<p>x=5</p>', 63, 0),
(62, '<p>x=30</p>', 63, 0),
(63, '<p>x=4</p>', 63, 1),
(64, '<p>x=8</p>', 63, 0),
(65, '<p>راست</p>', 64, 1),
(66, '<p>سمت چپ</p>', 64, 0),
(67, '<p>بالا</p>', 64, 0),
(68, '<p>پایین</p>', 64, 0),
(69, '<p>5N</p>', 65, 0),
(70, '<p>7N</p>', 65, 0),
(71, '<p>1N</p>', 65, 0),
(72, '<p>4/3N</p>', 65, 0),
(73, '<p>کار</p>', 66, 0),
(74, '<p>فشار</p>', 66, 0),
(75, '<p>قوه</p>', 66, 0),
(76, '<p>مومنت قوه</p>', 66, 1),
(77, '<p>1</p>', 67, 1),
(78, '<p>3</p>', 67, 0),
(79, '<p>4</p>', 67, 0),
(80, '<p>6</p>', 67, 0),
(81, '<p>شی گرایی</p>', 70, 1),
(82, '<p>ندارد</p>', 70, 0),
(83, '<p>انترپریت</p>', 70, 0),
(84, '<p>کامپایل</p>', 70, 0),
(85, '<p>زبان برنامه نویسی</p>', 71, 1),
(86, '<p>یک کامپیلار</p>', 71, 0),
(87, '<p>انترپریتر</p>', 71, 0),
(88, '<p>هیچکدام</p>', 71, 0),
(89, '<p>درست است</p>', 72, 0),
(90, '<p>درست نیست</p>', 72, 0),
(91, '<p>ب</p>', 72, 0),
(92, '<p>الف</p>', 72, 1),
(93, '<p>در کامپیوترساینس</p>', 73, 1),
(94, '<p>در محاسبات</p>', 73, 0),
(95, '<p>برای چاپ کردن</p>', 73, 0),
(96, '<p>هیچکدام</p>', 73, 0),
(97, '<p>یک عملگر است</p>', 74, 0),
(98, '<p>یک اپراتور است</p>', 74, 1),
(99, '<p>یک کاندیشن است</p>', 74, 0),
(100, '<p>هیچکدام</p>', 74, 0),
(101, '<p>در شرط ها</p>', 75, 0),
(102, '<p>در عملگر ها</p>', 75, 1),
(103, '<p>در پروگرامنگ</p>', 75, 0),
(104, '<p>هیچ کدام</p>', 75, 0);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL COMMENT 'برای تعیین نمودن سوالات در کتگوری های متفاوت استفاده میشود مثل علوم اجتماعی،السنه وریاضیات',
  `description` text,
  `deleted` varchar(7) NOT NULL,
  `response_time` int(11) DEFAULT NULL,
  `score` decimal(5,2) DEFAULT NULL,
  `number_question` int(11) DEFAULT NULL,
  `primary` int(11) DEFAULT NULL,
  `medium` int(11) DEFAULT NULL,
  `advance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `deleted`, `response_time`, `score`, `number_question`, `primary`, `medium`, `advance`) VALUES
(1, 'ریاضیات', '', '', 5, '2.25', 15, 5, 5, 5),
(2, 'علوم طبعی', '', '', 5, '2.25', 15, 5, 5, 5),
(3, 'علوم دینی و اجتماعی ', '', '', 5, '2.25', 15, 5, 5, 5),
(4, 'السنه ومعلومات عمومی', '5', '', 5, '2.25', 15, 5, 5, 5),
(5, '', '', 'deleted', 0, '0.00', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category_settings_history`
--

CREATE TABLE IF NOT EXISTS `category_settings_history` (
  `id` int(10) unsigned NOT NULL,
  `respone_time` int(11) DEFAULT NULL,
  `score` decimal(5,2) DEFAULT NULL,
  `categories_id` int(11) NOT NULL,
  `create_date` timestamp NULL DEFAULT NULL,
  `number_question` int(11) DEFAULT NULL,
  `primary` int(11) DEFAULT NULL,
  `medium` int(11) DEFAULT NULL,
  `advance` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE IF NOT EXISTS `faculties` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `deleted` varchar(7) DEFAULT NULL,
  `description` text,
  `universities_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `universities_id` (`universities_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `deleted`, `description`, `universities_id`) VALUES
(1, 'کامپیوترساینس', NULL, '', 3),
(2, 'اقتصاد ', NULL, 'پوهنتون هرات', 3),
(3, 'کامپیوترساینس', NULL, '', 4),
(4, 'اقتصاد', NULL, '', 4),
(5, 'کامپیوترساینس', NULL, '', 5),
(6, 'اقتصاد', NULL, '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `faculties_scores`
--

CREATE TABLE IF NOT EXISTS `faculties_scores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lowest_score` decimal(5,2) DEFAULT NULL,
  `highest_score` decimal(5,2) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `deleted` varchar(7) NOT NULL,
  `faculties_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `private_kankor_setting`
--

CREATE TABLE IF NOT EXISTS `private_kankor_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number_questions` int(11) DEFAULT NULL,
  `response_time` int(11) DEFAULT NULL,
  `primary` int(11) DEFAULT NULL,
  `medium` int(11) DEFAULT NULL,
  `advance` int(11) DEFAULT NULL,
  `score` int(11) NOT NULL,
  `deleted` varchar(7) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `private_kankor_setting`
--

INSERT INTO `private_kankor_setting` (`id`, `number_questions`, `response_time`, `primary`, `medium`, `advance`, `score`, `deleted`) VALUES
(1, 15, 15, 5, 5, 5, 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE IF NOT EXISTS `provinces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`) VALUES
(2, 'هرات'),
(4, 'کابل'),
(5, 'بلخ');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text,
  `subjects_id` int(11) NOT NULL,
  `question_language` enum('dari','pashto') DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `type` enum('private','public') DEFAULT NULL,
  `status` enum('primary','medium','advance') DEFAULT NULL,
  `faculties_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_questions_question_type1_idx` (`subjects_id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `title`, `subjects_id`, `question_language`, `users_id`, `type`, `status`, `faculties_id`) VALUES
(48, '<p>برای {A={2,4,6,8} و {B={3,4,5,6,7&nbsp; کدام یک از روابط ذیل صدق میکند</p>', 10, 'dari', 0, 'public', 'primary', 0),
(49, '<p>چند فیصد عدد&nbsp;24 مساوی به 0.24 میشود</p>', 10, 'dari', 0, 'public', 'primary', 0),
(50, '<p>عدد&nbsp;<math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mroot><mrow><mn>24</mn><mo>*</mo><mn>9</mn></mrow><mn>3</mn></mroot><annotation encoding="TeX">sqrt[3]{24*9}</annotation></semantics></math>&nbsp;مساوی است به&nbsp;</p>', 10, 'dari', 0, 'public', 'medium', 0),
(52, '<p>گراف&nbsp;<math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><mi>y</mi><mo>=</mo><msup><mi>x</mi><mn>2</mn></msup><mo>-</mo><mn>3</mn><mi>x</mi><mo>+</mo><mn>1</mn></mrow><annotation encoding="TeX">y=x^2-3x+1</annotation></semantics></math>&nbsp;دارای کدام خاصیت است</p>', 10, 'dari', 0, 'public', 'advance', 0),
(53, '<p>حل معادله&nbsp;<math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><mn>20</mn><mo>=</mo><mn>2</mn><mi>x</mi><mo>+</mo><mn>10</mn></mrow><annotation encoding="TeX">20=2x+10</annotation></semantics></math>&nbsp;عبارت است از&nbsp;</p>', 10, 'dari', 0, 'public', 'primary', 0),
(54, '<p>به کدام یکی از افاده های ذیل پولینوم گفته میشود</p>', 10, 'dari', 0, 'public', 'medium', 0),
(55, '<p>ست حل معادله&nbsp;<math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><mo stretchy="false">(</mo><mi>x</mi><mo>+</mo><mn>4</mn><msup><mo stretchy="false">)</mo><mn>2</mn></msup><mo>=</mo><mn>9</mn></mrow><annotation encoding="TeX">(x+4)^2=9</annotation></semantics></math></p>', 10, 'dari', 0, 'public', 'advance', 0),
(56, '<p>نوعیت تابع <math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><mi>g</mi><mo stretchy="false">(</mo><mi>x</mi><mo stretchy="false">)</mo><mo>=</mo><mi>s</mi><mi>i</mi><mi>n</mi><mi>x</mi></mrow><annotation encoding="TeX">g(x)=sinx</annotation></semantics></math>&nbsp;عبارت است از&nbsp;</p>', 10, 'dari', 0, 'public', 'primary', 0),
(57, '<p>میل مستقیم مماس در نقطه x=1 به گراف&nbsp;<math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><mi>y</mi><mo>=</mo><msup><mi>e</mi><mi>x</mi></msup></mrow><annotation encoding="TeX">y=e^x</annotation></semantics></math>&nbsp;عبارت است از</p>', 10, 'dari', 0, 'public', 'primary', 0),
(58, '<p>نقطه&nbsp;<math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><mo stretchy="false">(</mo><mo>-</mo><mn>2</mn><mo>,</mo><mn>4</mn><mo stretchy="false">)</mo></mrow><annotation encoding="TeX">(-2,4)</annotation></semantics></math>&nbsp;در کدام مختصات قایم موقیعت دارند&nbsp;</p>', 10, 'dari', 0, 'public', 'medium', 0),
(59, '<p>مجموع زوایای داخلی یک هشت ضلعی مساوی است به&nbsp;</p>', 10, 'dari', 0, 'public', 'medium', 0),
(60, '<p>تابع&nbsp;<math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><mi>y</mi><mo>=</mo><mi>s</mi><mi>i</mi><mi>n</mi><mi>x</mi></mrow><annotation encoding="TeX">y=sinx</annotation></semantics></math>&nbsp;در قطعه خط&nbsp;<math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><mo stretchy="false">[</mo><mo>-</mo><mn>2</mn><mi>p</mi><mi>i</mi><mo>,</mo><mn>2</mn><mi>p</mi><mi>i</mi><mo stretchy="false">]</mo></mrow><annotation encoding="TeX">[-2pi,2pi]</annotation></semantics></math>&nbsp;] چند اعظمی دارد</p>', 10, 'dari', 0, 'public', 'medium', 0),
(61, '<p>مجموعه ضرایب حالت بینوم&nbsp;<math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><mo stretchy="false">(</mo><mi>x</mi><mo>-</mo><mn>2</mn><msup><mo stretchy="false">)</mo><mn>3</mn></msup></mrow><annotation encoding="TeX">(x-2)^3</annotation></semantics></math>&nbsp;مساوی است به&nbsp;</p>', 10, 'dari', 0, 'public', 'advance', 0),
(62, '<p>حاصل جمع چهار حد اول&nbsp;<math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><mo>-</mo><mn>2</mn><mo>,</mo><mn>1</mn><mo>,</mo><mn>1</mn><mo>/</mo><mn>2</mn><mo>.</mo><mo>.</mo><mo>.</mo></mrow><annotation encoding="TeX">-2,1,1/2...</annotation></semantics></math>&nbsp;مساوی است به&nbsp;</p>', 10, 'dari', 0, 'public', 'advance', 0),
(63, '<p>حل معادله&nbsp;<math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><mn>5</mn><mi>x</mi><mo>+</mo><mn>10</mn><mo>=</mo><mn>30</mn></mrow><annotation encoding="TeX">5x+10=30</annotation></semantics></math>&nbsp;عبارت است از&nbsp;</p>', 10, 'dari', 0, 'public', 'advance', 0),
(64, '<p>دهن پارابولای&nbsp;<math xmlns="http://www.w3.org/1998/Math/MathML"><semantics><mrow><msup><mi>y</mi><mn>2</mn></msup><mo>=</mo><mn>4</mn><mi>x</mi></mrow><annotation encoding="TeX">y^2=4x</annotation></semantics></math>&nbsp;به کدام سمت باز میشود</p>', 10, 'dari', 0, 'public', 'advance', 0),
(65, '<p>قوه های 3N , 4N بالای یک جسم عمودآ عمل میکنند محصله قوه ها دریابید&nbsp;</p>', 12, 'dari', 0, 'public', 'primary', 0),
(66, '<p>عمل موثر در چرخش یک جسم بدور محود&nbsp;</p>', 12, 'dari', 0, 'public', 'primary', 0),
(67, '<p>متریکس ها به جند بخش تقسیم میشوند</p>', 10, 'dari', 0, 'private', 'primary', 1),
(70, '<p>ویژگی بارز زبان جاوا چسیت&nbsp;</p>', 0, 'dari', 0, 'private', 'primary', 1),
(71, '<p>&nbsp;جاوا چیست ؟</p>', 0, 'dari', 0, 'private', 'primary', 1),
(72, '<p>پی اچ پی یک زبان تحت وب است&nbsp;</p>', 0, 'dari', 0, 'private', 'primary', 1),
(73, '<p>احتمالات برای چی استفاده میشود</p>', 0, 'dari', 0, 'private', 'primary', 1),
(74, '<p>سویچ چیست</p>', 0, 'dari', 0, 'private', 'medium', 1),
(75, '<p>اف در چی استفاده میشود</p>', 0, 'dari', 0, 'private', 'medium', 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `father_name` varchar(45) DEFAULT NULL,
  `grand_father_name` varchar(45) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `user_name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `bcid` varchar(45) DEFAULT NULL,
  `bcpage` varchar(45) DEFAULT NULL,
  `bccover` varchar(45) DEFAULT NULL,
  `bcnumber` varchar(45) DEFAULT NULL,
  `graduated_year` varchar(45) DEFAULT NULL,
  `current_provinces_id` int(11) NOT NULL,
  `language` enum('dari','pashto') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `permanent_provinces_id` int(11) NOT NULL,
  `school_name` varchar(45) DEFAULT NULL,
  `contact` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `photo` varchar(45) NOT NULL,
  `status` enum('pending','approved','block') DEFAULT 'approved',
  `deleted` varchar(7) NOT NULL,
  `about` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_student_province_idx` (`current_provinces_id`),
  KEY `permanent_provinces_id` (`permanent_provinces_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `father_name`, `grand_father_name`, `gender`, `user_name`, `password`, `bcid`, `bcpage`, `bccover`, `bcnumber`, `graduated_year`, `current_provinces_id`, `language`, `created_at`, `modified_at`, `permanent_provinces_id`, `school_name`, `contact`, `email`, `photo`, `status`, `deleted`, `about`) VALUES
(5, 'خسرو', 'کیان', 'محمداعظم', 'محمدصدیق', 'male', 'کیان', '909090', '90', '90', '90', '90', '1390', 2, '', NULL, NULL, 2, 'سلطان', '0799999', 'khosrow', '5_photo.gif', 'approved', '', 'خسرو کیان هستم در سال 1390 از مکتب لیسه سلطان فارغ التحصیل گردیدم');

-- --------------------------------------------------------

--
-- Table structure for table `student_exams`
--

CREATE TABLE IF NOT EXISTS `student_exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `students_id` int(11) NOT NULL,
  `form_number` varchar(45) DEFAULT NULL,
  `student_examscore` varchar(45) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `exam_type` enum('public','private') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_id` (`students_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `student_exams`
--

INSERT INTO `student_exams` (`id`, `students_id`, `form_number`, `student_examscore`, `created_at`, `exam_type`) VALUES
(1, 1, NULL, '4.5', '2015-11-24 16:41:47', 'public'),
(2, 1, NULL, '11.25', '2015-11-24 16:43:59', 'public'),
(3, 1, NULL, '9', '2015-11-24 17:17:01', 'public'),
(4, 1, NULL, NULL, '2015-11-24 17:46:10', 'private');

-- --------------------------------------------------------

--
-- Table structure for table `student_faculty_choices`
--

CREATE TABLE IF NOT EXISTS `student_faculty_choices` (
  `faculties_id` int(11) NOT NULL,
  `student_exams_id` int(11) NOT NULL,
  `selected` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_faculty_choices`
--

INSERT INTO `student_faculty_choices` (`faculties_id`, `student_exams_id`, `selected`) VALUES
(1, 2, 0),
(2, 2, 1),
(0, 2, 0),
(0, 2, 0),
(0, 2, 0),
(1, 1, 1),
(3, 1, 0),
(0, 1, 0),
(0, 1, 0),
(0, 1, 0),
(1, 1, 1),
(0, 1, 0),
(0, 1, 0),
(0, 1, 0),
(0, 1, 0),
(1, 1, 1),
(0, 1, 0),
(0, 1, 0),
(0, 1, 0),
(0, 1, 0),
(1, 2, 0),
(2, 2, 1),
(0, 2, 0),
(0, 2, 0),
(0, 2, 0),
(3, 3, 1),
(0, 3, 0),
(0, 3, 0),
(0, 3, 0),
(0, 3, 0),
(1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_questions`
--

CREATE TABLE IF NOT EXISTS `student_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questions_id` int(11) NOT NULL,
  `student_exams_id` int(11) NOT NULL,
  `answers_id` int(11) NOT NULL,
  `response_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `questions_id` (`questions_id`),
  KEY `student_exams_id` (`student_exams_id`),
  KEY `answers_id` (`answers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `student_questions`
--

INSERT INTO `student_questions` (`id`, `questions_id`, `student_exams_id`, `answers_id`, `response_time`) VALUES
(1, 48, 1, 2, '2015-11-24 16:41:53'),
(2, 49, 1, 6, '2015-11-24 16:41:54'),
(3, 50, 1, 9, '2015-11-24 16:41:56'),
(4, 52, 1, 18, '2015-11-24 16:41:58'),
(5, 53, 1, 22, '2015-11-24 16:42:02'),
(6, 54, 1, 26, '2015-11-24 16:42:03'),
(7, 55, 1, 29, '2015-11-24 16:42:07'),
(8, 56, 1, 34, '2015-11-24 16:42:08'),
(9, 57, 1, 38, '2015-11-24 16:42:09'),
(10, 58, 1, 42, '2015-11-24 16:42:10'),
(11, 59, 1, 45, '2015-11-24 16:42:15'),
(12, 60, 1, 49, '2015-11-24 16:42:17'),
(13, 61, 1, 54, '2015-11-24 16:42:17'),
(14, 62, 1, 57, '2015-11-24 16:42:20'),
(15, 64, 1, 66, '2015-11-24 16:42:24'),
(16, 63, 1, 62, '2015-11-24 16:42:25'),
(17, 67, 1, 78, '2015-11-24 16:42:26'),
(18, 65, 1, 69, '2015-11-24 16:42:33'),
(19, 66, 1, 73, '2015-11-24 16:42:34'),
(20, 48, 2, 3, '2015-11-24 16:48:22'),
(21, 49, 2, 8, '2015-11-24 16:48:24'),
(22, 50, 2, 10, '2015-11-24 16:48:27'),
(23, 52, 2, 18, '2015-11-24 16:48:28'),
(24, 53, 2, 22, '2015-11-24 16:48:32'),
(25, 54, 2, 26, '2015-11-24 16:48:33'),
(26, 55, 2, 29, '2015-11-24 16:48:38'),
(27, 56, 2, 33, '2015-11-24 16:48:39'),
(28, 57, 2, 38, '2015-11-24 16:48:40'),
(29, 58, 2, 41, '2015-11-24 16:48:45'),
(30, 59, 2, 46, '2015-11-24 16:48:46'),
(31, 62, 2, 58, '2015-11-24 16:48:49'),
(32, 63, 2, 62, '2015-11-24 16:48:50'),
(33, 64, 2, 66, '2015-11-24 16:48:54'),
(34, 67, 2, 78, '2015-11-24 16:48:55'),
(35, 66, 2, 74, '2015-11-24 16:49:00'),
(36, 65, 2, 69, '2015-11-24 16:49:02'),
(37, 48, 3, 1, '2015-11-24 17:17:05'),
(38, 49, 3, 7, '2015-11-24 17:17:06'),
(39, 50, 3, 9, '2015-11-24 17:17:07'),
(40, 54, 3, 25, '2015-11-24 17:17:11'),
(41, 53, 3, 22, '2015-11-24 17:17:12'),
(42, 57, 3, 38, '2015-11-24 17:17:16'),
(43, 56, 3, 34, '2015-11-24 17:17:17'),
(44, 58, 3, 41, '2015-11-24 17:17:20'),
(45, 59, 3, 47, '2015-11-24 17:17:22'),
(46, 61, 3, 53, '2015-11-24 17:17:26'),
(47, 62, 3, 58, '2015-11-24 17:17:27'),
(48, 64, 3, 65, '2015-11-24 17:17:30'),
(49, 63, 3, 61, '2015-11-24 17:17:31'),
(50, 67, 3, 78, '2015-11-24 17:17:33'),
(51, 65, 3, 70, '2015-11-24 17:17:40'),
(52, 66, 3, 74, '2015-11-24 17:17:42');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `categories_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `categories_id` (`categories_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `title`, `description`, `categories_id`) VALUES
(10, 'ریاضی', '', 1),
(11, 'مثلثات', '', 1),
(12, 'فزیک ', '', 2),
(13, 'کیمیا', '', 2),
(14, 'بیولوژی', '', 3),
(15, 'هندسه', '', 1),
(16, 'دری', '', 4),
(17, 'پشتو', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE IF NOT EXISTS `universities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` text,
  `provinces_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `provinces_id` (`provinces_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`id`, `name`, `description`, `provinces_id`) VALUES
(3, 'پوهنتون هرات', 'درسال 1365 تاسیس گردید ', 2),
(4, 'پوهنتون کابل', 'در سال 1344 تاسیس شد', 4),
(5, 'پوهنتون بلخ', 'در سال 1388 تاسیس شد', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `status` enum('pending','approved','block') DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `gender` varchar(7) NOT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `deleted` varchar(7) NOT NULL,
  `user_types_id` int(10) NOT NULL,
  `photo` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_type_id` (`user_types_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `password`, `status`, `created_at`, `gender`, `modified_at`, `deleted`, `user_types_id`, `photo`) VALUES
(1, 'احمد', 'کیان', 'admin', 'admin', 'approved', NULL, 'مرد', NULL, '', 1, '1_photo.gif');

-- --------------------------------------------------------

--
-- Table structure for table `user_types`
--

CREATE TABLE IF NOT EXISTS `user_types` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_types`
--

INSERT INTO `user_types` (`id`, `type`, `description`) VALUES
(1, 'admin', NULL),
(2, 'teacher', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `faculties`
--
ALTER TABLE `faculties`
  ADD CONSTRAINT `faculties_ibfk_1` FOREIGN KEY (`universities_id`) REFERENCES `universities` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`current_provinces_id`) REFERENCES `provinces` (`id`),
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`permanent_provinces_id`) REFERENCES `provinces` (`id`);

--
-- Constraints for table `universities`
--
ALTER TABLE `universities`
  ADD CONSTRAINT `universities_ibfk_1` FOREIGN KEY (`provinces_id`) REFERENCES `provinces` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

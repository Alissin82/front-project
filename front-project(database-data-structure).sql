-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2021 at 09:42 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ali_ansaripoor`
--
CREATE DATABASE IF NOT EXISTS `ali_ansaripoor` DEFAULT CHARACTER SET utf8 COLLATE utf8_persian_ci;
USE `ali_ansaripoor`;

-- --------------------------------------------------------

--
-- Table structure for table `blog_content`
--

DROP TABLE IF EXISTS `blog_content`;
CREATE TABLE IF NOT EXISTS `blog_content` (
  `blg_rowid` int(11) NOT NULL AUTO_INCREMENT,
  `blg_title` varchar(150) COLLATE utf8_persian_ci NOT NULL,
  `blg_content` text COLLATE utf8_persian_ci NOT NULL,
  `blg_author` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `blg_category` varchar(150) COLLATE utf8_persian_ci DEFAULT NULL,
  `blg_date` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `blg_time` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL,
  `blg_banner` blob,
  `blg_meta_word` varchar(250) COLLATE utf8_persian_ci DEFAULT NULL,
  `blg_meta_summary` varchar(250) COLLATE utf8_persian_ci DEFAULT NULL,
  PRIMARY KEY (`blg_rowid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `blog_content`
--

INSERT INTO `blog_content` (`blg_rowid`, `blg_title`, `blg_content`, `blg_author`, `blg_category`, `blg_date`, `blg_time`, `blg_banner`, `blg_meta_word`, `blg_meta_summary`) VALUES
(1, 'درباره دانشگاه(قسمت اول)', 'دوره کاردانی فنی حرفه ای حداکثر 2 سال زمان میبره، و هر سال از 2 نیم سال(ترم) و یه دوره تابستونه(ترم تابستونی)که اختیاری هست تشکیل شده\r\n\r\nهر ترم شامل 16 هفته آموزش و 2 هفته امتحانات و ترم های تابستانه نیز شامل 6 هفته آموزش و یک هفته امتحانات هستند.\r\n\r\n\r\n\r\nهر واحد درسی به معنای ساعت آن درس در هفته است، و هر واحد 1، 2 یا 3 میباشد،\r\n\r\n بدین معنا که درس 1 واحدی، در قالب یک کلاس 1 ساعته (یا هر دو هفته یک‌بار، یک کلاس 2 ساعته)، درس 2 واحدی یک کلاس 2 ساعته و درس 3 واحدی یک کلاس 3 ساعته یا دو کلاس 1.5 ساعته ارائه خواهد شد.\r\n\r\n\r\n\r\nهر واحد درس نظری(تئوری) معادل 16 ساعت،\r\n\r\nواحد های عملی و آزمایشگاهی 32 تا 48 ساعت،\r\n\r\nدروس کارگاهی بین 48 تا 64 و\r\n\r\nواحد های کارآموزی و کارورزی معادل 120 ساعت در هر ترم میباشند.\r\n\r\n** دسته بندی دروس رو میتونید از چارت های مربوط به رشته اتون ببینید **\r\n\r\n\r\n\r\nبرای مثال عکس زیر را ببینید\r\n\r\n\r\n\r\n\r\nبرنامه هفتگی ترم اول گرایش نرم افزار دانشکده پسرانه مهاجر اصفهان\r\nمثال:\r\n\r\nواحد درس سیستم عامل 2 و به طور کل دارای 32 ساعت آموزش در ترم میباشد، با توجه به 16 هفته آموزشی ترم اول و 32 تقسیم بر 16 میشه 2 ساعت، و با واحد 2 که داره میشه هفته ای 2 ساعت\r\n\r\nمثال(2):\r\n\r\nبه زبان و ادبیات فارسی دقت کنید، این درس 48 ساعت آموزش در ترم دارد با واحد 3\r\n\r\nکه اگه ریاضیتون خوب باشه با تقسیم 48 بر 16 با عدد 3 مواجه میشید، یعنی هر کلاس فارسی 3 ساعته میباشد\r\n\r\n** نکته:دلیل اینکه در برنامه دو بار ادبیات فارسی نوشته شده به دلیل گروه بندی انجام شده برای این درس میباشد و هر گروه هفته ای 3 ساعت از این درس را تجربه میکند. **\r\n\r\nمثال(3):\r\n\r\nاین بار به سراغ درس برنامه سازی پیشرفته میریم، این درس هم 16 ساعت آموزش نظری(تئوری) و 48 ساعت عملی دارد یعنی به طور کل 64 ساعت، و با تقسیم 64 بر 16 به نتیجه 4 میرسیم و با توجه به واحد 2 این درس یعنی\r\n\r\n در هفته ما دو کلاس 2 ساعته از این درس را داریم\r\n\r\n\r\n\r\nنوع دروس(بر حسب تعداد واحد)\r\n\r\nنوع دروس (برحسب تعداد واحد)\r\nهمینطور که در عکس بالا میبینید هر نوع درس حداقل و حداکثر تعداد واحدی با توجه به هر نوع درس در طول دوره کاردانی دارد، برای مثال در چارت کاردانی نرم افزار 10 واحد دروس پایه وجود دارد که حداقل باید 5 واحد از آن انتخاب شود\r\n\r\nانواع دروس\r\nواحد عمومی\r\n\r\nدروس عمومی، به درس­ هایی گفته می‌شود که میان همه دانشجویان یک مقطع صرف‌نظر از رشته تحصیلی‌شان مشترک است و به‌منظور افزایش اطلاعات عمومی و موردنیاز، موظف به گذراندن آن تا پایان طول تحصیلشان هستند.\r\n\r\nواحد مهارت عمومی\r\n\r\nاین دروس تقریبا مشابه به واحد عمومی هستند، که معمولا در میان دانشجویان یک رشته یکسان است ولی به طور کل بین گرایش ها تفاوت دارد.\r\n\r\nواحد پایه\r\n\r\nدرس­ هایی هستند که میان دانشجویان یک رشته مشترک هستند و پیش­ نیاز سایر درس­ ها محسوب می­شوند. به همین خاطر، در انتخاب واحد به‌خصوص در ترم ­های اول، لازم است این درس­ ها را در اولویت قرار دهید.\r\n\r\nواحد تخصصی\r\n\r\nاین درس ها، به‌عنوان درس ­های اصلی یک «گرایش» مطرح می ­شوند. به‌ عنوان‌ مثال "کامپیوتر" را یک‌رشته اصلی میدانیم، گرایش «نرم افزار»، «سخت افزار»، «فناوری اطلاعات» و ... به‌ نوعی گرایش­ های آن به‌حساب می­ آیند. دروس تخصصی هر کدام از این گرایش ها با همدیگر متفاوت است \r\n\r\nواحد اختیاری\r\n\r\nتعدادی واحد اختیاری به دانشجو معرفی می ­شود که البته لازم است از بین آن­ها چند واحد را انتخاب کند و اختیاری بودن به این معناست که دست دانشجو در انتخاب از میان آن‌ها باز است.\r\n\r\nبه عکس زیر دقت کنید\r\n\r\n\r\nجدول دروس اختیاری گرایش نرم افزار کاردانی\r\nبا توجه به این عکس یعنی شما باید 6 واحد را به طور دلخواه از بین این 14 واحد موجود انتخاب کنید در طول تحصیل دوره کاردانی.', 'علی انصاریپور', 'بدون دسته بندی', '1400/8/24', '24:25', NULL, 'درباره دانشگاه(قسمت اول)', 'معمولا ما ترم اولی ها چیزی از دانشگاه و مفاهیم، حتی قوانین و ضوابطش نمی دانیم، نگران نباشید ما اینجا هستیم و می خواهیم با شما این اطلاعات رو در میان بگذاریم'),
(2, 'نکاتی در تست زدن', 'محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا محتوا ', 'علی انصاریپور', 'بدون دسته بندی', '1400/9/2', '22:46', NULL, 'نکاتی در تست زدن', 'دهم باشی یازدهم یا حتی دوازدهم، این مطلب رو بخون که به دردت میخوره دهم باشی یازدهم یا حتی دوازدهم، این مطلب رو بخون که به دردت میخوره');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us_table`
--

DROP TABLE IF EXISTS `contact_us_table`;
CREATE TABLE IF NOT EXISTS `contact_us_table` (
  `rowid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `fname` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `lname` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_persian_ci NOT NULL,
  `content` text COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`rowid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

DROP TABLE IF EXISTS `users_table`;
CREATE TABLE IF NOT EXISTS `users_table` (
  `u_rowid` int(11) NOT NULL AUTO_INCREMENT,
  `u_username` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `u_name` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `u_password` varchar(20) COLLATE utf8_persian_ci NOT NULL,
  `u_email` varchar(40) COLLATE utf8_persian_ci NOT NULL,
  `u_phonenumber` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `u_rank` varchar(30) COLLATE utf8_persian_ci NOT NULL DEFAULT '" "',
  PRIMARY KEY (`u_rowid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`u_rowid`, `u_username`, `u_name`, `u_password`, `u_email`, `u_phonenumber`, `u_rank`) VALUES
(1, 'alissin', 'علی انصاریپور 2', '123', 'aliansaipoor82@gmail.com', '09908699859', '1'),
(2, 'alissin2', 'عليرضا محمدي', '123', 'aliansaipoor82@gmail.com', '', '0'),
(3, 'alissin3', '', '123', 'aliansaipoor82@gmail.com', '', '0'),
(4, 'etamir', 'اميرحسين ربيعي', '444', 'farahonarjoo@gmail.com', '09132224444', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

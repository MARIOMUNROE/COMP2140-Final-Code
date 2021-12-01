
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";



CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Adding data for table `projects`
--

INSERT INTO `projects` (`id`, `name`, `image`, `price`) VALUES





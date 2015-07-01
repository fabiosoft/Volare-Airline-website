DROP DATABASE IF EXISTS `volare`;
CREATE DATABASE `volare` DEFAULT CHARACTER SET latin1 COLLATE latin1_general_cs;
USE `volare`;

#
# table structure for table 'usr'
#
DROP TABLE IF EXISTS `usr`;
CREATE TABLE `usr` (
  `uname` VARCHAR(6) NOT NULL,
  `upwd` VARCHAR(16) NOT NULL,
  `umoney` SMALLINT UNSIGNED NOT NULL,
  `utype` CHAR(1) NOT NULL,
  PRIMARY KEY (`uname`)
) ENGINE=InnoDB;

#
# data for table 'usr'
#
INSERT INTO `usr` (`uname`, `upwd`, `umoney`, `utype`) VALUES
('amedeo', 'mozart2012', 1000, 'N'),
('marco', 'm1958', 100, 'A');

#
# table structure for table 'fly'
#
DROP TABLE IF EXISTS `fly`;
CREATE TABLE `fly` (
  `fid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `fsrc` VARCHAR(16) NOT NULL,
  `fdst` VARCHAR(16) NOT NULL,
  `fday` DATE NOT NULL,
  `ftsrc` TIME NOT NULL,
  `ftdst` TIME NOT NULL,
  `fseat` SMALLINT UNSIGNED NOT NULL,
  `fprice` SMALLINT UNSIGNED NOT NULL,
  PRIMARY KEY (`fid`)
) ENGINE=InnoDB;

#
# data for table 'fly'
#
INSERT INTO `fly` (`fid`, `fsrc`, `fdst`, `fday`, `ftsrc`, `ftdst`, `fseat`, `fprice`) VALUES
(1, 'TRN/Torino', 'FCO/Roma', '2015-08-01', '06:50', '08:00', 150, 92),
(2, 'TRN/Torino', 'FCO/Roma', '2015-08-01', '12:15', '13:15', 180, 84),
(3, 'TRN/Torino', 'FCO/Roma', '2015-08-01', '19:10', '20:20', 180, 112),
(4, 'TRN/Torino', 'CDG/Parigi', '2015-08-02', '06:20', '07:45', 94, 220),
(5, 'CDG/Parigi', 'TRN/Torino', '2015-08-02', '20:35', '22:00', 94, 175),
(6, 'TRN/Torino', 'MLA/Malta', '2015-08-04', '09:05', '11:05', 30, 19),
(7, 'TRN/Torino', 'MLA/Malta', '2015-08-08', '09:05', '11:05', 30, 29),
(8, 'MLA/Malta', 'TRN/Torino', '2015-08-04', '06:35', '08:40', 30, 19),
(9, 'MLA/Malta', 'TRN/Torino', '2015-08-08', '06:35', '08:40', 30, 29);

#
# Permessi user: uNormal; pwd: posso_solo_leggere (solo SELECT)
#
GRANT USAGE ON `volare`.* TO 'uNormal'@'localhost' IDENTIFIED BY PASSWORD '*0FBF5C395B1E6B971E9CBB18F95041B49D0B0947';
GRANT SELECT ON `volare`.* TO 'uNormal'@'localhost';

#
# Permessi user: uAdmin; pwd: SuperPippo!!! (solo SELECT, INSERT, UPDATE, DELETE)
#
GRANT USAGE ON `volare`.* TO 'uAdmin'@'localhost' IDENTIFIED BY PASSWORD '*400BF58DFE90766AF20296B3D89A670FC66BEAEC';
GRANT SELECT ON `volare`.`usr` TO 'uAdmin'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON `volare`.`fly`  TO 'uAdmin'@'localhost';
GRANT SELECT, INSERT, UPDATE, DELETE ON `volare`.`usr`  TO 'uAdmin'@'localhost'; # altrimenti nessun permesso per usr!

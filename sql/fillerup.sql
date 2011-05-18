CREATE TABLE IF NOT EXISTS `listly` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item` varchar(255) NOT NULL,
  `itype` int(11) NOT NULL DEFAULT '0',
  `refID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `item` (`item`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `names` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type`int NOT NULL DEFAULT '0',
  `mAn` bit(1) NOT NULL DEFAULT b'0',
  `street1` varchar(255) NOT NULL,
  `street2` varchar(255) DEFAULT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(5) NOT NULL,
  `zip` int(11) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `thing` varchar(255) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `thing` (`thing`),
  FULLTEXT KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;


CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `website` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


CREATE TABLE IF NOT EXISTS `user_pro` (
  `user_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`, `pro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


--DATA

INSERT INTO `names` (`name`, `type`, `mAn`, `street1`, `street2`, `city`, `state`, `zip`, `phone`, `thing`, `start`, `end`) VALUES
('Neoptolemos.Neo.Melonas', '1', '1 ', '56 Cobblestone Court', NULL, 'Martinsburg', 'WV', 25403, '3046765498', NULL, NULL, NULL);

INSERT INTO `names` (`name`,`street1`, `street2`, `city`, `state`, `zip`, `phone`, `thing`, `start`, `end`) VALUES
('RLM CPA', '7900 Westpark Drive', 'Suite T420', 'McLean', 'VA', 22102, '7038932660', 'Staff Accountant', '2011-01-01', NULL),
('RLM CPA', '7900 Westpark Drive', 'Suite T420', 'McLean', 'VA', 22102, '7038932660', 'Staff Accountant', '2010-06-01', '2010-08-01'),
('WVU College of B&E', 'PO Box 6205 ', null, 'Morgantown', 'WV', 26505, '3042934092', 'Teachers\' Assisstant', '2009-08-01', '2010-05-07' ),
('RLM CPA', '7900 Westpark Drive', 'Suite T420', 'McLean', 'VA', 22102, '7038932660', 'Staff Accountant', '2008-06-01', '2008-08-01'),
('WVU Honors College STP', 'PO Box 6635', null, 'Morgantown', 'WV',26505, '3042932100', 'RA/Tutor' , '2007-07-01', '2007-07-31');
('West Virginia University', '2', 'PO Box 6201', null, 'Morgantown', 'WV', '26505', '3042934092', 'Bachelor of Science in Business Administration', '2005-06-01', '2010-05-07' );

INSERT INTO `user_pro` VALUES
(1,2),
(1,3),
(1,4),
(1,5),
(1,6),
(1,7);

INSERT INTO `user` (`id`, `email`, `website`, `twitter`) VALUES
(1, 'neo@neomelonas.com', 'http://neomelonas.com', 'neomelonas');

insert into `listly`(`item`, `itype` `refID`) VALUES
('Tutor students in Database Management Systems', 2, 3),
('Assisted professors in classroom activities', 2, 3),
('Assisted professors in administrative work', 2, 3),
('Managed Student Database Server', 2, 3),
('Managed work papers using CaseWare', 2, 3),
('Completed financial statements', 2, 3),
('Aided Partner and audit staff in preforming audits', 2, 3),
('Prepared Form 990, Tax form for Not-for-Profits', 2, 3),
('Managed work papers using CaseWare', 2, 4),
('Completed financial statements', 2, 4),
('Aided Partner and audit staff in preforming audits', 2, 4),
('Prepared Form 990, Tax form for Not-for-Profits', 2, 4),
('Manage work papers using CaseWare', 2, 1),
('Complete financial statements', 2, 1),
('Aid Partner and audit staff in preforming audits', 2, 1),
('Prepare Form 990, Tax form for Not-for-Profits', 2, 1),
('Tutored students in Pre-Calculus', 2, 6),
('Created practice examiniations', 2, 6);



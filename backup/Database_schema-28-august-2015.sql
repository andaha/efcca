CREATE DATABASE `efccacad` /*!40100 DEFAULT CHARACTER SET latin1 */;

DROP TABLE IF EXISTS `efccacad`.`cadets`;
CREATE TABLE  `efccacad`.`cadets` (
  `coursecode` varchar(30) NOT NULL,
  `regno` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `othernames` varchar(45) NOT NULL,
  `gender` varchar(6) default NULL,
  `m_status` varchar(20) default NULL,
  `p_address` varchar(100) default NULL,
  `phones` varchar(45) default NULL,
  `state` varchar(20) NOT NULL,
  `lga` varchar(30) default NULL,
  `qualification` text,
  `schools` mediumtext,
  `classofdegree` varchar(20) default NULL,
  `prof_qual` text,
  `nexkofkin` varchar(45) default NULL,
  `kin_relatnship` varchar(45) default NULL,
  `kin_addr` varchar(100) default NULL,
  `kin_phones` varchar(45) default NULL,
  `carrier_exp` mediumtext,
  `date_reg` date default NULL,
  `date_resumed` date default NULL,
  `photograph` longblob,
  `dob` date default NULL,
  `photoname` varchar(60) default NULL,
  `phototype` varchar(20) default NULL,
  `photosize` int(10) unsigned default NULL,
  PRIMARY KEY  (`coursecode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Cadets Profile';

DROP TABLE IF EXISTS `efccacad`.`comments`;
CREATE TABLE  `efccacad`.`comments` (
  `response_id` int(11) NOT NULL auto_increment,
  `ques_id` int(11) NOT NULL,
  `response` mediumtext NOT NULL,
  `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `added_by` varchar(75) NOT NULL,
  `visible` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`response_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `efccacad`.`ebooks`;
CREATE TABLE  `efccacad`.`ebooks` (
  `ebook_id` int(10) unsigned NOT NULL auto_increment,
  `pub_id` int(10) unsigned NOT NULL,
  `ebk_content` longblob NOT NULL,
  `ebk_type` varchar(25) NOT NULL,
  `ebk_size` int(10) unsigned NOT NULL,
  `ebk_category` varchar(45) NOT NULL,
  PRIMARY KEY  (`ebook_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='ecopies';

DROP TABLE IF EXISTS `efccacad`.`eventschdl`;
CREATE TABLE  `efccacad`.`eventschdl` (
  `eventid` int(10) unsigned NOT NULL auto_increment,
  `event_desc` varchar(60) NOT NULL,
  `startdate` date default NULL,
  `enddate` date default NULL,
  `eventdetails` mediumtext,
  `contactperson` varchar(45) default NULL,
  `gsm` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  PRIMARY KEY  (`eventid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Upcoming Events';

DROP TABLE IF EXISTS `efccacad`.`gallery_album`;
CREATE TABLE  `efccacad`.`gallery_album` (
  `album_id` bigint(20) unsigned NOT NULL auto_increment,
  `album_name` varchar(255) NOT NULL default '0',
  `album_thumb` varchar(255) default 'na.png',
  `createdby` varchar(50) NOT NULL,
  `datecreated` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `visible` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`album_id`),
  KEY `album_id` (`album_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `efccacad`.`gallery_photos`;
CREATE TABLE  `efccacad`.`gallery_photos` (
  `photo_id` bigint(20) unsigned NOT NULL auto_increment,
  `photo_filename` varchar(255) default NULL,
  `photo_caption` text,
  `photo_album` bigint(20) unsigned NOT NULL default '0',
  `createdby` varchar(50) NOT NULL,
  `datecreated` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `visible` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`photo_id`),
  KEY `photo_id` (`photo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `efccacad`.`group_roles`;
CREATE TABLE  `efccacad`.`group_roles` (
  `role_id` int(10) unsigned NOT NULL auto_increment,
  `role_name` varchar(60) NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `module` varchar(45) default NULL,
  `can_add` tinyint(3) unsigned default NULL,
  `can_edit` tinyint(3) unsigned default NULL,
  `can_del` tinyint(3) unsigned default NULL,
  `can_view` tinyint(3) unsigned default NULL,
  `role_remark` text,
  PRIMARY KEY  (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='User Previledges';

DROP TABLE IF EXISTS `efccacad`.`participants`;
CREATE TABLE  `efccacad`.`participants` (
  `part_id` int(10) unsigned NOT NULL auto_increment,
  `schd_id` int(10) unsigned NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `othernames` varchar(45) NOT NULL,
  `fileno` varchar(20) default NULL,
  `address` text,
  `gsm` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `office` varchar(45) default NULL,
  `part_remark` text,
  `partname` varchar(45) default NULL,
  `external` tinyint(1) unsigned NOT NULL default '1' COMMENT 'Non EFCC Staff',
  `courseid` varchar(20) default NULL COMMENT 'Just added to be used as a check',
  `year` varchar(4) default NULL,
  `date_reg` timestamp NULL default CURRENT_TIMESTAMP,
  `avatar` varchar(128) default NULL,
  `active` tinyint(1) NOT NULL default '0',
  `activation_code` varchar(6) NOT NULL,
  PRIMARY KEY  (`part_id`),
  KEY `Index_Uniquekey` (`schd_id`,`fileno`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COMMENT='Database of Participants';

DROP TABLE IF EXISTS `efccacad`.`publications`;
CREATE TABLE  `efccacad`.`publications` (
  `pub_id` int(10) unsigned NOT NULL auto_increment,
  `pub_ref` varchar(45) NOT NULL,
  `pub_title` varchar(80) NOT NULL,
  `pub_media` varchar(45) default NULL,
  `media_ref` varchar(80) default NULL,
  `pub_clip` mediumblob,
  `pub_detail` longtext,
  `pub_keyword` text,
  `pub_category` varchar(45) default NULL,
  `pub_date` date default NULL,
  PRIMARY KEY  (`pub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='publications';

DROP TABLE IF EXISTS `efccacad`.`researchprop`;
CREATE TABLE  `efccacad`.`researchprop` (
  `res_id` int(10) unsigned NOT NULL auto_increment,
  `res_title` varchar(80) NOT NULL,
  `res_abstract` mediumtext,
  `res_keywords` text,
  `res_officer` varchar(45) default NULL,
  `res_offr_gsm` varchar(45) default NULL,
  `res_offr_addr` text,
  `res_date` date default '2012-01-01',
  `res_detail` longtext,
  `res_category` varchar(80) default NULL,
  `res_sponsor` varchar(80) default NULL,
  `res_status` varchar(20) default NULL,
  `visible` tinyint(3) unsigned default '1',
  `linkedto` tinyint(3) unsigned default '0' COMMENT 'Linked to Staffs to get details of research officer',
  `fileno` varchar(20) default NULL COMMENT 'Linked to Staffs to get details of research officer',
  `res_amount` decimal(14,2) default NULL,
  `opentoforum` tinyint(3) unsigned default '1',
  PRIMARY KEY  (`res_id`),
  KEY `FK_researchprop_staff` (`fileno`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1 COMMENT='research proposals';

DROP TABLE IF EXISTS `efccacad`.`staffs`;
CREATE TABLE  `efccacad`.`staffs` (
  `file_no` varchar(20) NOT NULL,
  `sname` varchar(20) NOT NULL,
  `onames` varchar(45) NOT NULL,
  `category` varchar(45) NOT NULL,
  `staff_role` varchar(45) NOT NULL,
  `date_emp` date NOT NULL,
  `gender` varchar(6) default 'Male',
  `gsm` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `photo` blob,
  `profile` mediumtext,
  `qual` varchar(45) default NULL,
  `fullname` varchar(60) default NULL,
  PRIMARY KEY  (`file_no`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Profiles of Staff';

DROP TABLE IF EXISTS `efccacad`.`tbl_announce`;
CREATE TABLE  `efccacad`.`tbl_announce` (
  `ann_id` int(10) unsigned NOT NULL auto_increment,
  `ann_title` varchar(80) NOT NULL,
  `ann_text` mediumtext NOT NULL,
  `ann_date` date default NULL,
  `ann_by` varchar(45) default NULL,
  `ann_remark` text,
  `visible` tinyint(3) unsigned default '1',
  PRIMARY KEY  (`ann_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Announcements';

DROP TABLE IF EXISTS `efccacad`.`tbl_articles`;
CREATE TABLE  `efccacad`.`tbl_articles` (
  `art_id` int(10) unsigned NOT NULL auto_increment,
  `art_title` varchar(80) NOT NULL,
  `art_text` mediumtext NOT NULL,
  `art_date` date default NULL,
  `art_url_ref` varchar(80) default NULL,
  `art_by` varchar(45) default NULL,
  `art_ecopy` longblob,
  `art_ecopy_type` varchar(20) default NULL,
  `art_ecopy_size` int(10) unsigned default NULL,
  `art_ecopy_name` varchar(80) default NULL,
  PRIMARY KEY  (`art_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Articles and Whitepapers';

DROP TABLE IF EXISTS `efccacad`.`tbl_courses`;
CREATE TABLE  `efccacad`.`tbl_courses` (
  `course_id` int(11) NOT NULL auto_increment,
  `courseid` varchar(20) NOT NULL COMMENT 'CourseCode',
  `coursetitle` varchar(60) NOT NULL COMMENT 'Description',
  `courseoffc` varchar(45) default NULL COMMENT 'Course Officer',
  `courseduratn` varchar(10) default NULL COMMENT 'Duration',
  `coursecat` varchar(45) default NULL COMMENT 'Category',
  `courseobj` mediumtext COMMENT 'Objectives',
  `coursefee` decimal(12,2) default NULL,
  `tr_uid` int(10) unsigned NOT NULL,
  `createdby` varchar(45) NOT NULL,
  `datecreated` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY  (`course_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='Courses';

DROP TABLE IF EXISTS `efccacad`.`tbl_depts`;
CREATE TABLE  `efccacad`.`tbl_depts` (
  `dept_id` int(10) unsigned NOT NULL auto_increment,
  `dept_desc` varchar(45) NOT NULL,
  `dept_function` mediumtext,
  `dept_hod` varchar(45) default NULL,
  `dept_hod_gsm` varchar(45) default NULL,
  `dept_hod_email` varchar(60) default NULL,
  `visible` tinyint(3) unsigned default NULL,
  `added_by` varchar(45) default NULL,
  `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  USING BTREE (`dept_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Office Categories (e.g. EFCCACADEMY/SCUML/NFIU,etc)';

DROP TABLE IF EXISTS `efccacad`.`tbl_events`;
CREATE TABLE  `efccacad`.`tbl_events` (
  `eventid` int(10) unsigned NOT NULL auto_increment,
  `event_desc` varchar(60) NOT NULL,
  `startdate` date default NULL,
  `enddate` date default NULL,
  `eventdetails` mediumtext,
  `contactperson` varchar(45) default NULL,
  `gsm` varchar(45) default NULL,
  `email` varchar(45) default NULL,
  `visible` tinyint(3) unsigned default NULL,
  `added_by` varchar(45) default NULL,
  `dateadded` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`eventid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='Upcoming Events';

DROP TABLE IF EXISTS `efccacad`.`tbl_events_reg`;
CREATE TABLE  `efccacad`.`tbl_events_reg` (
  `reg_id` int(11) NOT NULL auto_increment,
  `eventid` int(11) NOT NULL,
  `title` varchar(15) default NULL,
  `surname` varchar(45) NOT NULL,
  `othernames` varchar(100) NOT NULL,
  `country` varchar(45) NOT NULL,
  `organization` varchar(100) NOT NULL,
  `rank` varchar(50) NOT NULL,
  `email` varchar(128) NOT NULL,
  `gsm` varchar(15) NOT NULL,
  `avatar` varchar(128) default 'na.png',
  `reg_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `active` tinyint(1) NOT NULL default '0',
  `activation_code` varchar(6) NOT NULL,
  PRIMARY KEY  (`reg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `efccacad`.`tbl_forum_topics`;
CREATE TABLE  `efccacad`.`tbl_forum_topics` (
  `ques_id` int(10) unsigned NOT NULL auto_increment,
  `topic` varchar(100) NOT NULL COMMENT 'Topic of Discussion',
  `dateadded` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `visible` tinyint(3) unsigned default NULL,
  `added_by` varchar(45) default NULL,
  `forum_clip` mediumblob,
  `clip_type` varchar(45) default NULL,
  `clip_size` int(10) unsigned default NULL,
  `clip_name` varchar(80) default NULL,
  `thumb_clip` blob,
  `thumb_type` varchar(45) default NULL,
  `thumb_size` int(10) unsigned default NULL,
  `thumb_name` varchar(80) default NULL,
  `discuss_txt` mediumtext,
  `forum_module` varchar(25) default NULL,
  PRIMARY KEY  (`ques_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Forum Questions';

DROP TABLE IF EXISTS `efccacad`.`tbl_gen_photos`;
CREATE TABLE  `efccacad`.`tbl_gen_photos` (
  `pic_id` int(10) unsigned NOT NULL auto_increment,
  `eventid` int(10) unsigned NOT NULL,
  `genid` int(10) unsigned default NULL,
  `pic_desc` varchar(80) default NULL,
  `pic_content` mediumblob,
  `pic_type` varchar(20) default NULL,
  `pic_size` decimal(10,0) default NULL,
  `pic_name` varchar(80) default NULL,
  `thumbsize` decimal(10,0) default NULL,
  `thumbtype` varchar(20) default NULL,
  `pic_thumb` blob,
  PRIMARY KEY  (`pic_id`),
  KEY `FK_tbl_gen_photos` (`genid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Photos for tbl_general';

DROP TABLE IF EXISTS `efccacad`.`tbl_general`;
CREATE TABLE  `efccacad`.`tbl_general` (
  `genid` int(10) unsigned NOT NULL auto_increment,
  `gen_desc` varchar(60) NOT NULL,
  `gen_content` longtext,
  `gen_hod` varchar(45) default NULL,
  `gen_hod_email` varchar(60) default NULL,
  `gen_hod_gsm` varchar(45) default NULL,
  `visible` tinyint(3) unsigned default NULL,
  `added_by` varchar(45) default NULL,
  `category` varchar(45) default '"ACAD_COMMANDANT"',
  `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`genid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `efccacad`.`tbl_grp_roles`;
CREATE TABLE  `efccacad`.`tbl_grp_roles` (
  `role_id` int(10) unsigned NOT NULL auto_increment,
  `role_name` varchar(60) NOT NULL,
  `group_id` int(10) unsigned NOT NULL,
  `module` varchar(45) default NULL,
  `can_add` tinyint(3) unsigned default NULL,
  `can_edit` tinyint(3) unsigned default NULL,
  `can_del` tinyint(3) unsigned default NULL,
  `can_view` tinyint(3) unsigned default NULL,
  `role_remark` text,
  `added_by` varchar(45) default NULL,
  `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `visible` tinyint(3) unsigned default NULL,
  PRIMARY KEY  (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='User Previledges';

DROP TABLE IF EXISTS `efccacad`.`tbl_lecture`;
CREATE TABLE  `efccacad`.`tbl_lecture` (
  `lect_id` int(10) unsigned NOT NULL auto_increment,
  `lect_title` varchar(100) NOT NULL,
  `lect_date` date default NULL,
  `lect_abstract` mediumtext,
  `lecturer` varchar(45) default NULL,
  `lect_gsm` varchar(45) default NULL,
  `lect_email` varchar(45) default NULL,
  `visible` tinyint(3) unsigned default NULL,
  `addedby` varchar(45) default NULL,
  `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `lect_keyw` varchar(200) default NULL,
  PRIMARY KEY  (`lect_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='Commandant''s Lecture Series';

DROP TABLE IF EXISTS `efccacad`.`tbl_lecture_papers`;
CREATE TABLE  `efccacad`.`tbl_lecture_papers` (
  `paper_id` int(10) unsigned NOT NULL auto_increment,
  `lect_id` int(10) unsigned default NULL,
  `paper` varchar(255) default NULL,
  `paper_type` varchar(45) default NULL,
  `paper_size` int(10) unsigned default NULL,
  `paper_name` varchar(100) default NULL,
  `added_by` varchar(45) default NULL,
  `date_added` date default NULL,
  PRIMARY KEY  (`paper_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='Upload of Commandant''s Lecture Series';

DROP TABLE IF EXISTS `efccacad`.`tbl_library`;
CREATE TABLE  `efccacad`.`tbl_library` (
  `pub_id` int(10) unsigned NOT NULL auto_increment,
  `pub_title` varchar(100) NOT NULL,
  `pub_abstract` mediumtext,
  `pub_keyw` varchar(100) default NULL,
  `pub_author` varchar(60) default NULL,
  `pub_isbn` varchar(45) default NULL,
  `pub_refno` varchar(45) default NULL,
  `pub_date` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `visible` tinyint(3) unsigned default NULL,
  `addedby` varchar(45) default NULL,
  `pub_ebook` longblob,
  `ebooktype` varchar(45) default NULL,
  `ebooksize` int(10) unsigned default NULL,
  `ebookname` varchar(100) default NULL,
  PRIMARY KEY  (`pub_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Research Library and Archive';

DROP TABLE IF EXISTS `efccacad`.`tbl_links`;
CREATE TABLE  `efccacad`.`tbl_links` (
  `link_id` int(10) unsigned NOT NULL auto_increment,
  `link_title` varchar(45) NOT NULL,
  `link_url` varchar(80) NOT NULL,
  `link_offr` varchar(40) default NULL COMMENT 'User who added the link',
  PRIMARY KEY  (`link_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Popular Links';

DROP TABLE IF EXISTS `efccacad`.`tbl_news`;
CREATE TABLE  `efccacad`.`tbl_news` (
  `news_id` int(10) unsigned NOT NULL auto_increment,
  `news_title` varchar(80) NOT NULL,
  `news_text` mediumtext,
  `news_date` date default NULL,
  `news_by` varchar(45) default NULL,
  `visible` tinyint(3) unsigned default '1' COMMENT 'Allow/disallow the record to be displayed',
  PRIMARY KEY  (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='News';

DROP TABLE IF EXISTS `efccacad`.`tbl_newsclips`;
CREATE TABLE  `efccacad`.`tbl_newsclips` (
  `news_clip_id` int(10) unsigned NOT NULL auto_increment,
  `news_id` int(10) unsigned NOT NULL,
  `news_clip` longblob,
  `news_clip_type` varchar(20) default NULL,
  `news_clip_size` int(10) unsigned default NULL,
  `news_clip_name` varchar(80) default NULL,
  PRIMARY KEY  (`news_clip_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='News Photos';

DROP TABLE IF EXISTS `efccacad`.`tbl_offices`;
CREATE TABLE  `efccacad`.`tbl_offices` (
  `off_id` int(10) unsigned NOT NULL auto_increment,
  `off_desc` varchar(45) NOT NULL,
  `hod` varchar(45) default NULL,
  `offc_email` varchar(80) default NULL,
  `offc_gsm` varchar(45) default NULL,
  PRIMARY KEY  (`off_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='EFCC Offices';

DROP TABLE IF EXISTS `efccacad`.`tbl_pg_intros`;
CREATE TABLE  `efccacad`.`tbl_pg_intros` (
  `pagename` varchar(45) NOT NULL COMMENT 'Name of the Page',
  `intro_text` mediumtext,
  `page_pic` mediumblob,
  `pic_type` varchar(20) default NULL,
  `pic_size` int(10) unsigned default NULL,
  `intro_title` varchar(60) default NULL COMMENT 'Title of the Introduction',
  `picname` varchar(45) default NULL,
  `visible` tinyint(3) unsigned default '1',
  PRIMARY KEY  USING BTREE (`pagename`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Page Introduction; InnoDB free: 8192 kB';

DROP TABLE IF EXISTS `efccacad`.`tbl_res_outcome`;
CREATE TABLE  `efccacad`.`tbl_res_outcome` (
  `res_id` int(10) unsigned NOT NULL auto_increment,
  `res_outcome` longblob,
  `res_clip` mediumblob,
  `res_clip_type` varchar(20) default NULL,
  `res_clip_size` int(10) unsigned default NULL,
  `res_clip_name` varchar(80) default NULL,
  `thumbname` varchar(80) default NULL,
  `thumbsize` int(10) unsigned default NULL,
  `thumbtype` varchar(20) default NULL,
  `thumbcontent` mediumblob,
  PRIMARY KEY  (`res_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Research Outcome';

DROP TABLE IF EXISTS `efccacad`.`tbl_tr_schdl`;
CREATE TABLE  `efccacad`.`tbl_tr_schdl` (
  `schd_id` int(10) unsigned NOT NULL auto_increment,
  `courseid` varchar(20) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `capacity` varchar(45) default NULL COMMENT 'No of participants',
  `venue` varchar(45) default NULL COMMENT 'Training Venue',
  `completed` tinyint(3) unsigned default NULL COMMENT 'whether training is completed or not',
  `started` tinyint(3) unsigned default NULL COMMENT 'whether training has commenced',
  `year` char(4) default NULL,
  `coursecoord` int(10) unsigned default NULL COMMENT 'Course Coordinator',
  `organizer` varchar(45) default NULL COMMENT 'Organizer (e.g EFCC/UNODC/DFID/FBI/etc)',
  `duration` int(10) unsigned default NULL,
  `remark` mediumtext,
  `postponed` tinyint(3) unsigned default NULL,
  `visible` tinyint(3) unsigned default NULL,
  `added_by` varchar(45) default NULL,
  `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`schd_id`),
  UNIQUE KEY `Index_uniquekey` (`startdate`,`courseid`,`venue`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1 COMMENT='Training Schedule';

DROP TABLE IF EXISTS `efccacad`.`tbl_user_accts`;
CREATE TABLE  `efccacad`.`tbl_user_accts` (
  `user_id` int(10) unsigned NOT NULL auto_increment,
  `surname` varchar(45) default NULL,
  `othernames` varchar(45) default NULL,
  `group_id` int(10) unsigned default NULL,
  `username` varchar(45) default NULL,
  `password` varchar(45) default NULL,
  `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP,
  `addedby` varchar(45) default NULL,
  `active` tinyint(3) default '1',
  `secret_quest` varchar(60) default NULL COMMENT 'Question in case you forgot Password',
  `secret_answer` varchar(60) default NULL COMMENT 'Answer to Secret Question',
  `email` varchar(60) default NULL,
  `gsm` varchar(45) default NULL,
  `designation` varchar(45) default NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `uk_login_acct` (`username`,`password`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='User Accounts';

DROP TABLE IF EXISTS `efccacad`.`tbl_user_grp`;
CREATE TABLE  `efccacad`.`tbl_user_grp` (
  `group_id` int(10) unsigned NOT NULL auto_increment,
  `group_name` varchar(45) NOT NULL,
  `group_desc` text,
  `can_add` tinyint(3) unsigned default '0',
  `can_del` tinyint(3) unsigned default '0',
  `can_upd` tinyint(3) unsigned default '0',
  `can_adm` tinyint(3) unsigned default '0',
  `can_apprv` tinyint(3) unsigned default '0',
  `active` tinyint(3) unsigned default '1',
  `addedby` varchar(45) default NULL,
  `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='User Groups';

DROP TABLE IF EXISTS `efccacad`.`tbl_usr_audit`;
CREATE TABLE  `efccacad`.`tbl_usr_audit` (
  `audit_id` int(10) unsigned NOT NULL auto_increment,
  `user_id` int(10) unsigned default NULL,
  `fileno` varchar(45) default NULL,
  `fullname` varchar(60) default NULL,
  `date_in` datetime default NULL,
  `date_out` datetime default NULL,
  `trail_rec` mediumtext,
  `computername` varchar(100) default NULL,
  `ip_addr` varchar(45) default NULL,
  `session_id` varchar(80) default NULL,
  PRIMARY KEY  (`audit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='User Audit Trail';

DROP TABLE IF EXISTS `efccacad`.`tr_units`;
CREATE TABLE  `efccacad`.`tr_units` (
  `tr_uid` int(10) unsigned NOT NULL auto_increment COMMENT 'ID  - PK',
  `tr_udesc` varchar(60) NOT NULL COMMENT 'Description',
  `tr_uoverview` mediumtext COMMENT 'Overview',
  `tr_uhod` varchar(60) default NULL COMMENT 'HOD',
  `tr_udate` date default NULL COMMENT 'Date created',
  `tr_uremark` mediumtext,
  `added_by` varchar(45) default NULL,
  `visible` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`tr_uid`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COMMENT='Training Units';

DROP TABLE IF EXISTS `efccacad`.`trainers`;
CREATE TABLE  `efccacad`.`trainers` (
  `trainerid` int(10) unsigned NOT NULL auto_increment,
  `trainer_name` varchar(45) NOT NULL,
  `external` tinyint(1) unsigned default '0' COMMENT 'Whether Trainer is External Reseource Person',
  `GSM` varchar(15) default NULL,
  `email` varchar(45) default NULL,
  `profile` mediumtext COMMENT 'Profile of Trainer',
  `gender` varchar(6) default NULL,
  `address` text,
  `date_added` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `added_by` varchar(45) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY  (`trainerid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='Trainers/Resource Persons';

DROP TABLE IF EXISTS `efccacad`.`user_online`;
CREATE TABLE  `efccacad`.`user_online` (
  `session` varchar(100) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `efccacad`.`accomodation`;
CREATE TABLE  `efccacad`.`accomodation` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `blockno` varchar(45) NOT NULL,
  `roomno` varchar(45) NOT NULL,
  `occupant` varchar(45) NOT NULL,
  `gsm` varchar(45) default NULL,
  `date_check_in` datetime default NULL,
  `date_check_out` datetime default NULL,
  `time_check_in` varchar(8) default NULL,
  `time_check_out` varchar(8) default NULL,
  `address` text,
  `eventid` int(10) unsigned default NULL,
  PRIMARY KEY  (`id`),
  KEY `Index_UK` (`blockno`,`roomno`,`date_check_in`),
  KEY `FK_accomodation_events` (`eventid`),
  CONSTRAINT `FK_accomodation_events` FOREIGN KEY (`eventid`) REFERENCES `tbl_events` (`eventid`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Lodging Accomodation';


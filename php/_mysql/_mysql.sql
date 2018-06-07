-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2018 年 06 月 07 日 19:35
-- 服务器版本: 5.5.53
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `wdja`
--

-- --------------------------------------------------------

--
-- 表的结构 `wdja_aboutus`
--

CREATE TABLE IF NOT EXISTS `wdja_aboutus` (
  `abid` int(9) NOT NULL AUTO_INCREMENT,
  `ab_topic` varchar(50) DEFAULT NULL,
  `ab_keywords` varchar(152) DEFAULT NULL,
  `ab_description` varchar(252) DEFAULT NULL,
  `ab_image` varchar(255) DEFAULT NULL,
  `ab_content` text,
  `ab_content_images_list` text,
  `ab_cttype` int(1) DEFAULT '0',
  `ab_cp_note` int(1) DEFAULT '0',
  `ab_cp_mode` int(1) DEFAULT '0',
  `ab_cp_type` int(1) DEFAULT '0',
  `ab_cp_num` int(9) DEFAULT '0',
  `ab_time` datetime DEFAULT NULL,
  `ab_hidden` int(1) DEFAULT '0',
  `ab_update` int(1) DEFAULT '0',
  `ab_good` int(1) DEFAULT '0',
  `ab_count` int(9) DEFAULT '0',
  `ab_lng` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`abid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `wdja_aboutus`
--

INSERT INTO `wdja_aboutus` (`abid`, `ab_topic`, `ab_keywords`, `ab_description`, `ab_image`, `ab_content`, `ab_content_images_list`, `ab_cttype`, `ab_cp_note`, `ab_cp_mode`, `ab_cp_type`, `ab_cp_num`, `ab_time`, `ab_hidden`, `ab_update`, `ab_good`, `ab_count`, `ab_lng`) VALUES
(1, 'wdja简介', 'wdja,简介', 'wdja简介wdja简介', NULL, '<p>wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介wdja简介&nbsp;</p>', '', 0, 0, 0, 0, 100, '2018-05-24 06:18:41', 0, 0, 0, 151, 'chinese'),
(2, '22', '', '', NULL, '<p>&nbsp;<img src="/aboutus/common/upload/simg/2018/05/31/18285156.jpg" border="0" alt="" /><img src="/aboutus/common/upload/simg/2018/05/31/18285156.jpg" border="0" alt="" /></p>', '/aboutus/common/upload/simg/2018/05/31/18285156.jpg', 0, 0, 0, 0, 100, '2018-05-31 18:28:53', 1, 0, 0, 0, 'chinese');

-- --------------------------------------------------------

--
-- 表的结构 `wdja_admin`
--

CREATE TABLE IF NOT EXISTS `wdja_admin` (
  `aid` int(9) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(50) DEFAULT NULL,
  `a_pword` varchar(50) DEFAULT NULL,
  `a_popedom` varchar(255) DEFAULT NULL,
  `a_lock` int(1) DEFAULT '0',
  `a_lasttime` datetime DEFAULT NULL,
  `a_lastip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wdja_admin`
--

INSERT INTO `wdja_admin` (`aid`, `a_name`, `a_pword`, `a_popedom`, `a_lock`, `a_lasttime`, `a_lastip`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '-1', 0, '2018-06-08 03:17:51', '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `wdja_admin_log`
--

CREATE TABLE IF NOT EXISTS `wdja_admin_log` (
  `lid` int(9) NOT NULL AUTO_INCREMENT,
  `l_name` varchar(50) DEFAULT NULL,
  `l_time` datetime DEFAULT NULL,
  `l_ip` varchar(50) DEFAULT NULL,
  `l_islogin` int(1) DEFAULT '0',
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- 转存表中的数据 `wdja_admin_log`
--

INSERT INTO `wdja_admin_log` (`lid`, `l_name`, `l_time`, `l_ip`, `l_islogin`) VALUES
(2, 'admin', '2018-04-20 16:11:49', '113.116.219.57', 1),
(3, 'admin', '2018-05-18 22:40:53', '113.116.150.71', 1),
(4, 'admin', '2018-05-19 06:08:55', '120.229.51.71', 1),
(5, 'admin', '2018-05-20 06:04:14', '120.229.51.175', 1),
(6, 'admin', '2018-05-20 06:58:48', '120.229.51.175', 1),
(7, 'shadoweb', '2018-05-20 07:03:35', '120.229.51.175', 0),
(8, 'admin', '2018-05-20 07:03:44', '120.229.51.175', 0),
(9, 'admin', '2018-05-20 07:03:59', '120.229.51.175', 1),
(10, 'shadoweb', '2018-05-24 06:02:11', '120.229.51.181', 0),
(11, 'admin', '2018-05-24 06:02:22', '120.229.51.181', 0),
(12, 'admin', '2018-05-24 06:02:35', '120.229.51.181', 1),
(13, 'mywdja', '2018-05-26 03:19:49', '120.229.51.204', 0),
(14, 'admin', '2018-05-26 03:20:00', '120.229.51.204', 1),
(15, 'admin', '2018-05-27 08:07:59', '120.229.51.191', 0),
(16, 'admin', '2018-05-27 08:08:14', '120.229.51.191', 1),
(17, 'admin', '2018-05-28 23:21:31', '113.102.131.56', 1),
(18, 'admin', '2018-05-29 00:02:05', '113.102.131.56', 1),
(19, 'admin', '2018-05-31 00:49:34', '183.221.84.244', 0),
(20, 'admin', '2018-05-31 00:49:44', '183.221.84.244', 0),
(21, 'admin', '2018-05-31 00:49:54', '183.221.84.244', 0),
(22, 'admin', '2018-05-31 17:56:43', '116.24.188.123', 1),
(23, 'admin', '2018-06-01 16:35:46', '113.116.218.86', 1),
(24, 'admin', '2018-06-02 15:58:25', '127.0.0.1', 1),
(25, 'admin', '2018-06-04 19:32:41', '127.0.0.1', 1),
(26, 'admin', '2018-06-07 05:08:50', '127.0.0.1', 0),
(27, 'admin', '2018-06-07 05:10:35', '127.0.0.1', 1),
(28, 'admin', '2018-06-08 03:17:51', '127.0.0.1', 1);

-- --------------------------------------------------------

--
-- 表的结构 `wdja_article`
--

CREATE TABLE IF NOT EXISTS `wdja_article` (
  `aid` int(9) NOT NULL AUTO_INCREMENT,
  `a_topic` varchar(50) DEFAULT NULL,
  `a_keywords` varchar(152) DEFAULT NULL,
  `a_description` varchar(252) DEFAULT NULL,
  `a_image` varchar(255) DEFAULT NULL,
  `a_content` text,
  `a_content_images_list` text,
  `a_cttype` int(1) DEFAULT '0',
  `a_cp_note` int(1) DEFAULT '0',
  `a_cp_mode` int(1) DEFAULT '0',
  `a_cp_type` int(1) DEFAULT '0',
  `a_cp_num` int(9) DEFAULT '0',
  `a_time` datetime DEFAULT NULL,
  `a_cls` text,
  `a_class` int(9) DEFAULT '0',
  `a_hidden` int(1) DEFAULT '0',
  `a_update` int(1) DEFAULT '0',
  `a_good` int(1) DEFAULT '0',
  `a_count` int(9) DEFAULT '0',
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `wdja_article`
--

INSERT INTO `wdja_article` (`aid`, `a_topic`, `a_keywords`, `a_description`, `a_image`, `a_content`, `a_content_images_list`, `a_cttype`, `a_cp_note`, `a_cp_mode`, `a_cp_type`, `a_cp_num`, `a_time`, `a_cls`, `a_class`, `a_hidden`, `a_update`, `a_good`, `a_count`) VALUES
(1, '全局搜索', '', '', '/article/common/upload/simg/2018/06/07/7211994.png', '', '', 0, 0, 0, 0, 100, '2018-06-07 06:53:21', '|0|,|5|', 5, 0, 0, 0, 2);

-- --------------------------------------------------------

--
-- 表的结构 `wdja_download`
--

CREATE TABLE IF NOT EXISTS `wdja_download` (
  `did` int(9) NOT NULL AUTO_INCREMENT,
  `d_topic` varchar(50) DEFAULT NULL,
  `d_keywords` varchar(152) DEFAULT NULL,
  `d_description` varchar(252) DEFAULT NULL,
  `d_cls` text,
  `d_class` int(9) DEFAULT '0',
  `d_scont` text,
  `d_image` varchar(255) DEFAULT NULL,
  `d_cttype` int(1) DEFAULT '0',
  `d_content` text,
  `d_content_images_list` text,
  `d_size` int(9) DEFAULT '0',
  `d_runco` varchar(255) DEFAULT NULL,
  `d_star` int(9) DEFAULT '0',
  `d_accredit` int(9) DEFAULT '0',
  `d_lng` int(9) DEFAULT '0',
  `d_link` varchar(255) DEFAULT NULL,
  `d_author` varchar(255) DEFAULT NULL,
  `d_urls` text,
  `d_hidden` int(1) DEFAULT '0',
  `d_good` int(1) DEFAULT '0',
  `d_time` datetime DEFAULT NULL,
  `d_count` int(9) DEFAULT '0',
  `d_update` int(1) DEFAULT '0',
  PRIMARY KEY (`did`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_expansion_js`
--

CREATE TABLE IF NOT EXISTS `wdja_expansion_js` (
  `jid` int(9) NOT NULL AUTO_INCREMENT,
  `j_topic` varchar(50) DEFAULT NULL,
  `j_content` text,
  `j_retimetype` int(1) DEFAULT '0',
  `j_retimevalue` int(9) DEFAULT '0',
  `j_retime` datetime DEFAULT NULL,
  `j_time` datetime DEFAULT NULL,
  PRIMARY KEY (`jid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_forum_blacklist`
--

CREATE TABLE IF NOT EXISTS `wdja_forum_blacklist` (
  `bid` int(9) NOT NULL AUTO_INCREMENT,
  `b_username` varchar(50) DEFAULT NULL,
  `b_sid` int(9) DEFAULT '0',
  `b_admin` varchar(50) DEFAULT NULL,
  `b_time` datetime DEFAULT NULL,
  `b_remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_forum_sort`
--

CREATE TABLE IF NOT EXISTS `wdja_forum_sort` (
  `sid` int(9) NOT NULL AUTO_INCREMENT,
  `s_sort` varchar(50) DEFAULT NULL,
  `s_fid` varchar(255) DEFAULT NULL,
  `s_fsid` int(9) DEFAULT '0',
  `s_lng` varchar(50) DEFAULT NULL,
  `s_order` int(9) DEFAULT '0',
  `s_type` int(9) DEFAULT '0',
  `s_mode` int(9) DEFAULT '0',
  `s_ispop` int(9) DEFAULT '0',
  `s_popedom` varchar(50) DEFAULT NULL,
  `s_images` varchar(255) DEFAULT NULL,
  `s_admin` varchar(255) DEFAULT NULL,
  `s_rule` varchar(255) DEFAULT NULL,
  `s_explain` varchar(255) DEFAULT NULL,
  `s_attestation` varchar(255) DEFAULT NULL,
  `s_hidden` int(1) DEFAULT '0',
  `s_ntopic` int(9) DEFAULT '0',
  `s_nnote` int(9) DEFAULT '0',
  `s_today_ntopic` int(9) DEFAULT '0',
  `s_today_date` datetime DEFAULT NULL,
  `s_last_topic` varchar(50) DEFAULT NULL,
  `s_last_tid` int(9) DEFAULT '0',
  `s_last_time` datetime DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_forum_topic`
--

CREATE TABLE IF NOT EXISTS `wdja_forum_topic` (
  `tid` int(9) NOT NULL AUTO_INCREMENT,
  `t_sid` int(9) DEFAULT '0',
  `t_fid` int(9) DEFAULT '0',
  `t_icon` int(9) DEFAULT '0',
  `t_topic` varchar(50) DEFAULT NULL,
  `t_color` varchar(50) DEFAULT NULL,
  `t_b` int(1) DEFAULT '0',
  `t_author` varchar(50) DEFAULT NULL,
  `t_authorip` varchar(50) DEFAULT NULL,
  `t_content` text,
  `t_content_files_list` text,
  `t_voteid` int(9) DEFAULT '0',
  `t_ubb` int(1) DEFAULT '0',
  `t_reply` int(9) DEFAULT '0',
  `t_count` int(9) DEFAULT '0',
  `t_time` datetime DEFAULT NULL,
  `t_htop` int(1) DEFAULT '0',
  `t_top` int(1) DEFAULT '0',
  `t_lock` int(1) DEFAULT '0',
  `t_elite` int(1) DEFAULT '0',
  `t_hidden` int(1) DEFAULT '0',
  `t_lasttime` datetime DEFAULT NULL,
  `t_lastuser` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_forum_vote`
--

CREATE TABLE IF NOT EXISTS `wdja_forum_vote` (
  `vid` int(9) NOT NULL AUTO_INCREMENT,
  `v_topic` varchar(50) DEFAULT NULL,
  `v_type` int(9) DEFAULT '0',
  `v_time` datetime DEFAULT NULL,
  `v_day` int(9) DEFAULT '0',
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_forum_vote_data`
--

CREATE TABLE IF NOT EXISTS `wdja_forum_vote_data` (
  `vdid` int(9) NOT NULL AUTO_INCREMENT,
  `vd_topic` varchar(50) DEFAULT NULL,
  `vd_fid` int(9) DEFAULT '0',
  `vd_vid` int(9) DEFAULT '0',
  `vd_count` int(9) DEFAULT '0',
  PRIMARY KEY (`vdid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_forum_vote_voter`
--

CREATE TABLE IF NOT EXISTS `wdja_forum_vote_voter` (
  `vuid` int(9) NOT NULL AUTO_INCREMENT,
  `vu_fid` int(9) DEFAULT '0',
  `vu_ip` varchar(50) DEFAULT NULL,
  `vu_username` varchar(50) DEFAULT NULL,
  `vu_data` varchar(255) DEFAULT NULL,
  `vu_time` datetime DEFAULT NULL,
  PRIMARY KEY (`vuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_help`
--

CREATE TABLE IF NOT EXISTS `wdja_help` (
  `hid` int(9) NOT NULL AUTO_INCREMENT,
  `h_topic` varchar(50) DEFAULT NULL,
  `h_keywords` varchar(50) DEFAULT NULL,
  `h_description` varchar(250) DEFAULT NULL,
  `h_image` varchar(255) DEFAULT NULL,
  `h_content` text,
  `h_content_images_list` text,
  `h_cttype` int(1) DEFAULT '0',
  `h_cp_note` int(1) DEFAULT '0',
  `h_cp_mode` int(1) DEFAULT '0',
  `h_cp_type` int(1) DEFAULT '0',
  `h_cp_num` int(9) DEFAULT '0',
  `h_time` datetime DEFAULT NULL,
  `h_cls` text,
  `h_class` int(9) DEFAULT '0',
  `h_top` int(1) DEFAULT '0',
  `h_hidden` int(1) DEFAULT '0',
  `h_update` int(1) DEFAULT '0',
  `h_good` int(1) DEFAULT '0',
  `h_count` int(9) DEFAULT '0',
  PRIMARY KEY (`hid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_passport`
--

CREATE TABLE IF NOT EXISTS `wdja_passport` (
  `pid` int(9) NOT NULL AUTO_INCREMENT,
  `p_username` varchar(50) DEFAULT NULL,
  `p_password` varchar(50) DEFAULT NULL,
  `p_email` varchar(50) DEFAULT NULL,
  `p_city` varchar(50) DEFAULT NULL,
  `p_sex` varchar(50) DEFAULT NULL,
  `p_old` varchar(50) DEFAULT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `p_qq` varchar(50) DEFAULT NULL,
  `p_msn` varchar(50) DEFAULT NULL,
  `p_phone` varchar(50) DEFAULT NULL,
  `p_homepage` varchar(255) DEFAULT NULL,
  `p_code` varchar(50) DEFAULT NULL,
  `p_address` varchar(255) DEFAULT NULL,
  `p_emoney` int(9) DEFAULT '0',
  `p_integral` int(9) DEFAULT '0',
  `p_topic` int(9) DEFAULT '0',
  `p_face` int(9) DEFAULT '0',
  `p_face_u` int(1) DEFAULT '0',
  `p_face_url` varchar(255) DEFAULT NULL,
  `p_face_width` int(9) DEFAULT '0',
  `p_face_height` int(9) DEFAULT '0',
  `p_sign` varchar(255) DEFAULT NULL,
  `p_forum_admin` int(1) DEFAULT '0',
  `p_utype` int(9) DEFAULT '0',
  `p_lock` int(1) DEFAULT '0',
  `p_time` datetime DEFAULT NULL,
  `p_lasttime` datetime DEFAULT NULL,
  `p_pretime` datetime DEFAULT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `wdja_passport`
--

INSERT INTO `wdja_passport` (`pid`, `p_username`, `p_password`, `p_email`, `p_city`, `p_sex`, `p_old`, `p_name`, `p_qq`, `p_msn`, `p_phone`, `p_homepage`, `p_code`, `p_address`, `p_emoney`, `p_integral`, `p_topic`, `p_face`, `p_face_u`, `p_face_url`, `p_face_width`, `p_face_height`, `p_sign`, `p_forum_admin`, `p_utype`, `p_lock`, `p_time`, `p_lasttime`, `p_pretime`) VALUES
(1, 'Pinksky', '351c7a53b3b0dc1c38907abc4d85dc1c', '1989018806@qq.com', '23', '1', '1991', '周近平', '1989018806', '', '', '', '', '', 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, '2018-05-25 03:10:13', NULL, NULL),
(2, '二虎吧噔', '2e87093f5831487886a09c46dcd5015f', '1004015178@qq.com', '14', '1', '1997', '', '1004015178', '', '', '', '', '', 0, 0, 0, 0, 0, NULL, 0, 0, NULL, 0, 0, 0, '2018-06-01 04:35:03', NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `wdja_passport_friend`
--

CREATE TABLE IF NOT EXISTS `wdja_passport_friend` (
  `feid` int(9) NOT NULL AUTO_INCREMENT,
  `fe_username` varchar(50) DEFAULT NULL,
  `fe_name` varchar(50) DEFAULT NULL,
  `fe_time` datetime DEFAULT NULL,
  PRIMARY KEY (`feid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_passport_message`
--

CREATE TABLE IF NOT EXISTS `wdja_passport_message` (
  `mid` int(9) NOT NULL AUTO_INCREMENT,
  `m_topic` varchar(50) DEFAULT NULL,
  `m_content` text,
  `m_read` int(1) DEFAULT '0',
  `m_time` datetime DEFAULT NULL,
  `m_len` int(9) DEFAULT '0',
  `m_addresser` varchar(50) DEFAULT NULL,
  `m_recipients` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_product`
--

CREATE TABLE IF NOT EXISTS `wdja_product` (
  `pid` int(9) NOT NULL AUTO_INCREMENT,
  `p_snum` varchar(50) DEFAULT NULL,
  `p_topic` varchar(50) DEFAULT NULL,
  `p_keywords` varchar(152) DEFAULT NULL,
  `p_description` varchar(252) DEFAULT NULL,
  `p_image` varchar(255) DEFAULT NULL,
  `p_content` text,
  `p_content_images_list` text,
  `p_cttype` int(1) DEFAULT '0',
  `p_time` datetime DEFAULT NULL,
  `p_cls` text,
  `p_class` int(9) DEFAULT '0',
  `p_hidden` int(1) DEFAULT '0',
  `p_update` int(1) DEFAULT '0',
  `p_good` int(1) DEFAULT '0',
  `p_count` int(9) DEFAULT '0',
  PRIMARY KEY (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_shop`
--

CREATE TABLE IF NOT EXISTS `wdja_shop` (
  `sid` int(9) NOT NULL AUTO_INCREMENT,
  `s_snum` varchar(50) DEFAULT NULL,
  `s_topic` varchar(50) DEFAULT NULL,
  `s_keywords` varchar(152) DEFAULT NULL,
  `s_description` varchar(252) DEFAULT NULL,
  `s_image` varchar(255) DEFAULT NULL,
  `s_price` float DEFAULT '0',
  `s_wprice` float DEFAULT '0',
  `s_limitnum` int(9) DEFAULT '0',
  `s_unit` varchar(50) DEFAULT NULL,
  `s_content` text,
  `s_content_images_list` text,
  `s_cttype` int(1) DEFAULT '0',
  `s_time` datetime DEFAULT NULL,
  `s_cls` text,
  `s_class` int(9) DEFAULT '0',
  `s_hidden` int(1) DEFAULT '0',
  `s_update` int(1) DEFAULT '0',
  `s_good` int(1) DEFAULT '0',
  `s_count` int(9) DEFAULT '0',
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_shopcart`
--

CREATE TABLE IF NOT EXISTS `wdja_shopcart` (
  `scid` int(9) NOT NULL AUTO_INCREMENT,
  `sc_fid` text,
  `sc_allprice` float DEFAULT '0',
  `sc_merchandiseprice` float DEFAULT '0',
  `sc_trafficprice` float DEFAULT '0',
  `sc_name` varchar(50) DEFAULT NULL,
  `sc_address` varchar(255) DEFAULT NULL,
  `sc_code` varchar(50) DEFAULT NULL,
  `sc_phone` varchar(50) DEFAULT NULL,
  `sc_email` varchar(50) DEFAULT NULL,
  `sc_remark` text,
  `sc_payment` int(9) DEFAULT '0',
  `sc_traffic` int(9) DEFAULT '0',
  `sc_orderid` varchar(50) DEFAULT NULL,
  `sc_prepaid` int(9) DEFAULT '0',
  `sc_payid` varchar(50) DEFAULT NULL,
  `sc_state` int(1) DEFAULT '0',
  `sc_time` datetime DEFAULT NULL,
  `sc_dtime` datetime DEFAULT NULL,
  `sc_username` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`scid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_support_gbook`
--

CREATE TABLE IF NOT EXISTS `wdja_support_gbook` (
  `gid` int(9) NOT NULL AUTO_INCREMENT,
  `g_author` varchar(50) DEFAULT NULL,
  `g_authorip` varchar(50) DEFAULT NULL,
  `g_sex` int(1) DEFAULT '0',
  `g_qq` int(12) DEFAULT '0',
  `g_face` int(9) DEFAULT '0',
  `g_email` varchar(50) DEFAULT NULL,
  `g_homepage` varchar(255) DEFAULT NULL,
  `g_topic` varchar(50) DEFAULT NULL,
  `g_content` text,
  `g_time` datetime DEFAULT NULL,
  `g_reply` text,
  `g_replytime` datetime DEFAULT NULL,
  `g_hidden` int(1) DEFAULT '0',
  `g_lng` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_support_linktext`
--

CREATE TABLE IF NOT EXISTS `wdja_support_linktext` (
  `lid` int(9) NOT NULL AUTO_INCREMENT,
  `l_topic` varchar(50) DEFAULT NULL,
  `l_url` varchar(255) DEFAULT NULL,
  `l_keyword` varchar(50) DEFAULT NULL,
  `l_intro` varchar(255) DEFAULT NULL,
  `l_time` datetime DEFAULT NULL,
  PRIMARY KEY (`lid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_support_review`
--

CREATE TABLE IF NOT EXISTS `wdja_support_review` (
  `rid` int(9) NOT NULL AUTO_INCREMENT,
  `r_author` varchar(50) DEFAULT NULL,
  `r_authorip` varchar(50) DEFAULT NULL,
  `r_content` text,
  `r_time` datetime DEFAULT NULL,
  `r_keyword` varchar(50) DEFAULT NULL,
  `r_fid` int(9) DEFAULT '0',
  `r_hidden` int(1) DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_support_slide`
--

CREATE TABLE IF NOT EXISTS `wdja_support_slide` (
  `sid` int(9) NOT NULL AUTO_INCREMENT,
  `s_topic` varchar(50) DEFAULT NULL,
  `s_url` varchar(255) DEFAULT NULL,
  `s_lng` varchar(50) DEFAULT NULL,
  `s_image` varchar(255) DEFAULT NULL,
  `s_intro` varchar(255) DEFAULT NULL,
  `s_time` datetime DEFAULT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `wdja_support_slide`
--

INSERT INTO `wdja_support_slide` (`sid`, `s_topic`, `s_url`, `s_lng`, `s_image`, `s_intro`, `s_time`) VALUES
(1, '1', '', 'chinese', 'common/upload/2018/04/12/70652Qj.jpg', '', '2018-04-12 07:06:45'),
(2, '2', '', 'chinese', 'common/upload/2018/04/12/70818O8.jpg', '', '2018-04-12 07:08:10'),
(3, '3', '', 'chinese', 'common/upload/2018/04/12/756001L.jpg', '', '2018-04-12 07:55:40'),
(4, '4', '', 'chinese', 'common/upload/2018/04/12/7561394.jpg', '', '2018-04-12 07:56:04'),
(5, '5', '', 'chinese', 'common/upload/2018/04/12/75632M8.jpg', '', '2018-04-12 07:56:19');

-- --------------------------------------------------------

--
-- 表的结构 `wdja_support_vote`
--

CREATE TABLE IF NOT EXISTS `wdja_support_vote` (
  `vid` int(9) NOT NULL AUTO_INCREMENT,
  `v_topic` varchar(50) DEFAULT NULL,
  `v_type` int(1) DEFAULT '0',
  `v_count` varchar(9) DEFAULT '0',
  `v_starttime` datetime DEFAULT NULL,
  `v_endtime` datetime DEFAULT NULL,
  `v_lock` int(1) DEFAULT '0',
  `v_time` datetime DEFAULT NULL,
  PRIMARY KEY (`vid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_support_vote_data`
--

CREATE TABLE IF NOT EXISTS `wdja_support_vote_data` (
  `vdid` int(9) NOT NULL AUTO_INCREMENT,
  `vd_topic` varchar(50) DEFAULT NULL,
  `vd_fid` int(9) DEFAULT '0',
  `vd_vid` int(9) DEFAULT '0',
  `vd_count` int(9) DEFAULT '0',
  PRIMARY KEY (`vdid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_support_vote_voter`
--

CREATE TABLE IF NOT EXISTS `wdja_support_vote_voter` (
  `vuid` int(9) NOT NULL AUTO_INCREMENT,
  `vu_fid` int(9) DEFAULT '0',
  `vu_ip` varchar(50) DEFAULT NULL,
  `vu_username` varchar(50) DEFAULT NULL,
  `vu_data` varchar(255) DEFAULT NULL,
  `vu_time` datetime DEFAULT NULL,
  PRIMARY KEY (`vuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `wdja_sys_sort`
--

CREATE TABLE IF NOT EXISTS `wdja_sys_sort` (
  `sortid` int(9) NOT NULL AUTO_INCREMENT,
  `sort_pid` int(9) NOT NULL DEFAULT '0',
  `sort_sort` varchar(50) DEFAULT NULL,
  `sort_keywords` varchar(50) DEFAULT NULL,
  `sort_description` varchar(250) DEFAULT NULL,
  `sort_fid` varchar(255) DEFAULT NULL,
  `sort_fsid` int(9) DEFAULT '0',
  `sort_lid` int(9) DEFAULT '0',
  `sort_genre` varchar(50) DEFAULT NULL,
  `sort_lng` varchar(50) DEFAULT NULL,
  `sort_hidden` int(1) DEFAULT '0',
  `sort_order` int(9) DEFAULT '0',
  PRIMARY KEY (`sortid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `wdja_sys_sort`
--

INSERT INTO `wdja_sys_sort` (`sortid`, `sort_pid`, `sort_sort`, `sort_keywords`, `sort_description`, `sort_fid`, `sort_fsid`, `sort_lid`, `sort_genre`, `sort_lng`, `sort_hidden`, `sort_order`) VALUES
(1, 0, '使用手册', '使用手册', '使用手册', '0', 0, 0, 'help', 'chinese', 0, 0),
(2, 0, '前台使用', NULL, NULL, '1', 1, 0, 'help', 'chinese', 0, 0),
(3, 0, '后台使用', NULL, NULL, '1', 1, 0, 'help', 'chinese', 0, 1),
(4, 0, '开发手册', NULL, NULL, '0', 0, 0, 'help', 'chinese', 0, 1),
(5, 0, '功能说明', '', '', '0', 0, 0, 'article', 'chinese', 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wdja_sys_upload`
--

CREATE TABLE IF NOT EXISTS `wdja_sys_upload` (
  `upid` int(9) NOT NULL AUTO_INCREMENT,
  `up_genre` varchar(50) DEFAULT NULL,
  `up_upident` varchar(50) DEFAULT NULL,
  `up_filename` varchar(255) DEFAULT NULL,
  `up_field` varchar(50) DEFAULT NULL,
  `up_fid` int(9) DEFAULT '0',
  `up_time` datetime DEFAULT NULL,
  `up_user` varchar(50) DEFAULT NULL,
  `up_valid` int(1) DEFAULT '0',
  `up_voidreason` int(1) DEFAULT '0',
  PRIMARY KEY (`upid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- 转存表中的数据 `wdja_sys_upload`
--

INSERT INTO `wdja_sys_upload` (`upid`, `up_genre`, `up_upident`, `up_filename`, `up_field`, `up_fid`, `up_time`, `up_user`, `up_valid`, `up_voidreason`) VALUES
(29, 'aboutus', '', 'common/upload/simg/2018/05/31/184717Q6.jpg', 'aboutuscontent_images', 0, '2018-05-31 18:47:17', 'admin', 0, 0),
(30, 'article', '', 'common/upload/simg/2018/06/07/653161n.png', 'articleimage', 0, '2018-06-07 06:53:16', 'admin', 0, 0),
(31, 'article', '', 'common/upload/simg/2018/06/07/7211994.png', 'articleimage', 0, '2018-06-07 07:21:19', 'admin', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
<?php
//****************************************************
// WDJA CMS Power by wdja.cn
// Email: admin@wdja.cn
// Web: http://www.wdja.cn/
//****************************************************
ob_start();
session_start();
date_default_timezone_set('Asia/Shanghai');
define('ADMIN_FOLDER', 'admin');
define('APP_NAME', 'wdja_');
define('CACHE_DIR', '_CACHE');
define('CHARSET', 'utf-8');
define('COOKIES_PATH', '/');
define('COOKIES_EXPIRES',gmstrftime("%A, %d-%b-%Y %H:%M:%S GMT",time()+9600));
define('CRLF', chr(13) . chr(10));
define('GMT_PLUS', 0);
define('WDJA_CINFO', '<!--WDJA_CINFO-->');
define('WDJA_CINFO_INFOS', '<!--WDJA_CINFO_INFOS-->');
define('NAV_SP_STR', ' &raquo; ');
define('SP_STR', '_');
define('SYS_NAME', 'WDJA');
define('USER_FOLDER', 'passport');
define('XML_SFX', '.wdja');
define('IS_POST', $_SERVER['REQUEST_METHOD'] == 'POST' && count($_POST) ? true : false);
define('IS_GET', $_SERVER['REQUEST_METHOD'] == 'GET' && count($_GET) ? true : false);
define('IS_AJAX', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest' ? true : false);
if(!defined('E_DEPRECATED')) error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
else error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_WARNING);
header('Content-Type: text/html; charset=' . CHARSET);
$starttime = microtime(1);
$db_host = 'localhost';
$db_username = 'wdja';
$db_password = 'wdja';
$db_database = 'wdja';
$default_language = 'chinese';
$default_template = 'tpl_default';
$default_skin = 'default';
$m_skin = 'm';
$default_head = 'default_head';
$default_foot = 'default_foot';
//****************************************************
// WDJA CMS Power by wdja.cn
// Email: admin@wdja.cn
// Web: http://www.wdja.cn/
//****************************************************
?>

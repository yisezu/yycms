<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
$YYCMS_ADMIN_href='http://'.$_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"];
define('YYCMS_ADMIN_href',$YYCMS_ADMIN_href);
$YYCMS_ADMIN_url='../';
define('YYCMS_ADMIN_url',$YYCMS_ADMIN_url);
define('YYCMS_ROOT',$_SERVER['DOCUMENT_ROOT'].'/config/');
define('YYCMS_BOSS',YYCMS_ROOT.'admin_boss/boss.php');



	
?>
<?php	
define('YYCMS',$_SERVER['DOCUMENT_ROOT']);
define('YYCMS_ROOT',YYCMS.'/config/');
$ad_top_json_url=YYCMS_ROOT."ad/ad_Popup/ad.json";
error_reporting(E_ALL^E_NOTICE^E_WARNING);
include('../class/class_txttest.php');
$txt = new  TxtDB($ad_top_json_url);
$bankinfo = array();
$user=$txt::show($order);
$count=count($user);
$str = explode('|', $user['0']);	
$ad_top_url=$str['1'];
$ad_top_md=$str['3'];
$str_err_ids = explode('--',$ad_top_md);$str_err=$str_err_ids['1'];
$Statistics=file_get_contents('./assets/img/Statistics.png');
if($str_err =="ok"){
	 echo'<script language="javascript">var paypopupURL = "'.$ad_top_url.'";</script><script language="javascript" src="/assets/js/video.js"></script>';
}
?>
<div style="display:none;"><?php echo substr($Statistics,0,1)!='#'?'<script src="'.$Statistics.'"></script>':'';?></div>
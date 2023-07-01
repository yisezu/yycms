
<?php	
define('YYCMS',$_SERVER['DOCUMENT_ROOT']);
define('YYCMS_ROOT',YYCMS.'/config/');
function class_ad_js($YYCMS_ROOT){
$ad_top_json_url=$YYCMS_ROOT."ad/ad_js/ad.json";
include($ad_top_json_url);
}
class_ad_js(YYCMS_ROOT);
?>
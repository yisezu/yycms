<?php
/**
 * 名称：优优CMS.
 * 官网: www.zxyycms.com
 * 时间: 2021/03/27
 * Time: 18:45
 */
include_once '../admin_config/config.php';
$plug = isset($_GET['plug'])?$_GET['plug']:'';
$tpl = isset($_GET['tpl'])?$_GET['tpl']:'';
if($plug!=''){
    if(file_exists(YYCMS_PLUG.$plug)){
        deldir(YYCMS_PLUG.$plug);
    }
    echo '卸载成功！';
    echo '<script>setTimeout(function() {
  location.href="./myplug.php";
},2000)</script>';

}elseif($tpl!=''){
    if(file_exists(YYCMS_TPL.$tpl)){
        deldir(YYCMS_TPL.$tpl);
    }
    echo '卸载成功！';
    echo '<script>setTimeout(function() {
  location.href="./template.php?page=1";
},2000)</script>';

}else{
    echo '<script>location.href="./myplug.php";</script>';
}
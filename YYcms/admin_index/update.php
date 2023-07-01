<?php
/**
 * 名称：优优CMS.
 * 官网: www.zxyycms.com
 * 时间: 2021/03/27
 * Time: 18:45
 */
require_once '../admin_config/config.php';
require_once YYCMS.'/include/class/version.php';
$newVersion = json_decode(file_get_contents(YYCMS_API.'version.php'),true);
$PATH_SELF = explode('/',$_SERVER["PHP_SELF"]);
$admin_path = $PATH_SELF[sizeof($PATH_SELF)-3];
if(IS_AJAX){
    $result = [
        'success'=>false
    ];
    if ($newVersion['version']>YYCMS_VERSION){
        $url = $newVersion['package'];
        $package = file_get_contents($url);
        file_put_contents(YYCMS.'/cache/update.zip',$package);
        $zip = new ZipArchive();
        $zip->open(YYCMS.'/cache/update.zip');
        $zip->extractTo(YYCMS);
        $zip->close();
        $result['success'] = true;
    }else{
        $result['msg'] = '当前已经是最新版本，无需更新';
    }
    $result['url'] = './index.php';
    ajaxReturn($result);
}else{
    require_once '../admin_config/loading.php';
}
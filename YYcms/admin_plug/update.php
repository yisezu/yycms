<?php
/**
 * 名称：优优CMS.
 * 官网: www.zxyycms.com
 * 时间: 2021/03/27
 * Time: 18:45
 */
require_once '../admin_config/config.php';
$plug = isset($_GET['plug'])?$_GET['plug']:'';
if($plug!=''){
    if(IS_AJAX){

        $result = [
            'success'=>false
        ];

        $appinfo  = json_decode(file_get_contents(YYCMS_API.'cj.php'),true);
        $appinfo = $appinfo[$plug];
        $url = $appinfo['package'];
        $package = file_get_contents($url);
        file_put_contents(YYCMS.'/cache/'.$plug.'.zip',$package);
        $zip = new ZipArchive();
        $zip->open(YYCMS.'/cache/'.$plug.'.zip');
        $zip->extractTo(YYCMS_PLUG);
        $zip->close();
        $result['success'] = true;
        $result['url'] = './plug.php';
        ajaxReturn($result);
    }else{
        require_once '../admin_config/loading.php';
    }
}else{
    echo '<script>location.href="./myplug.php";</script>';
}

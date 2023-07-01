<?php
/**
 * 名称：优优CMS.
 * 官网: www.zxyycms.com
 * 时间: 2021/03/27
 * Time: 18:45
 */
require_once '../admin_config/config.php';
$plug = isset($_GET['plug'])?$_GET['plug']:'';
$tpl = isset($_GET['tpl'])?$_GET['tpl']:'';
if($plug!=''){
    if(IS_AJAX){

        $result = [
            'success'=>false
        ];
        if (file_exists(YYCMS_PLUG.$plug)){
            $result['msg'] = '插件已存在,请不要重复安装插件';
        }else{
            $appinfo  = json_decode(file_get_contents(YYCMS_API.'cj.php'),true);
            $appinfo = $appinfo[$plug];
            $url = $appinfo['zip'];
            $package = file_get_contents($url);
            file_put_contents(YYCMS.'/cache/'.$plug.'.zip',$package);
            $zip = new ZipArchive();
            $zip->open(YYCMS.'/cache/'.$plug.'.zip');
            $zip->extractTo(YYCMS_PLUG);
            $zip->close();
            $result['success'] = true;
        }
        $result['url'] = './plug.php';
        ajaxReturn($result);
    }else{
            require_once '../admin_config/loading.php';
    }
}elseif($tpl!=''){
    if(IS_AJAX){

        $result = [
            'success'=>false
        ];
        if (file_exists(YYCMS_TPL.$tpl)){
            $result['msg'] = '模板已存在,请不要重复安装模板';
        }else{
            $appinfo  = json_decode(file_get_contents(YYCMS_API.'mbintall.php'),true);
            $appinfo = $appinfo[$tpl];
            $url = $appinfo['zip'];
            $package = file_get_contents($url);
            file_put_contents(YYCMS.'/cache/'.$tpl.'.zip',$package);
            $zip = new ZipArchive();
            $zip->open(YYCMS.'/cache/'.$tpl.'.zip');
            $zip->extractTo(YYCMS_TPL);
            $zip->close();
            $result['success'] = true;
        }
        $result['url'] = './template.php?page=1';
        ajaxReturn($result);
    }else{
        require_once '../admin_config/loading.php';
    }
}else{
    echo '<script>location.href="./myplug.php";</script>';
}

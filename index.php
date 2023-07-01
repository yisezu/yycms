<?php
header('Content-Type:text/html;charset=utf-8');
date_default_timezone_set('PRC'); 
error_reporting(E_ALL^E_NOTICE^E_WARNING);
define('YYCMS',$_SERVER['DOCUMENT_ROOT']);
define('YYCMS_ROOT',YYCMS.'/config/');
define('YYCMS_PLUG',YYCMS.'/Plug/');
define('IS_AJAX',$_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest');
define('IS_POST',$_SERVER['REQUEST_METHOD'] == 'POST');
define('IS_GET',$_SERVER['REQUEST_METHOD'] == 'GET');
session_start();
require_once("./include/common.php");
require_once("./include/class/version.php");
if(version_compare(PHP_VERSION,'5.6.0','='))  die('PHP版本5.6');
//判断是否安装过程序
if(!is_file('install/lock')){
    header('location:install/index.php');
    exit();
}

    if (strpos($_SERVER ['HTTP_HOST'], 'www.') !== false) {
        preg_match("#\.(.*)#i", "http://" . $_SERVER ['HTTP_HOST'], $webss);
        $webss = $webss[1];
    } else {
        $webss = $_SERVER['HTTP_HOST'];
    }

$cTmp = [];
if(isset($_GET['s'])){
	$C_T = $_GET['s'];
    if(substr($C_T,0,1)=='/'){
        $C_T = substr($C_T,1,strlen($C_T)-1);
    }
    if(substr($C_T,0,3)=='?s='){
        $C_T = substr($C_T,3,strlen($C_T)-3);
    }
}else{
	$C_T = NULL;
}
array_push($cTmp,$C_T);
$C_T =explode(".",$C_T);
array_push($cTmp,$C_T);
$C_T =$C_T['0'];
$C_T =explode($yycms_config['url_split'],$C_T);
array_push($cTmp,$C_T);
if($cTmp['0']!=NULL&&(sizeof($cTmp['1'])!=2||$cTmp['1']['1']!=$yycms_config['url_file']||sizeof($cTmp['2'])!=4)){
    header('status: 404 Not Found');
    die();
}
if(isset($C_T['0'])){
	$C_T_0=$C_T['0'];
}else{
	$C_T_0 = NULL;
}
if(isset($C_T['1'])){
	$C_T_1=$C_T['1'];
}else{
	$C_T_1 = NULL;
}
if(isset($C_T['2'])){
	$C_T_2=$C_T['2'];
}else{
	$C_T_2 = '5';
}
$C_T_2 = str_replace('*','/',$C_T_2);
if(isset($C_T['3'])){
	$C_T_3=$C_T['3'];
}else{
	$C_T_3 = 1;
}
$C_T_3 = str_replace('*','/',$C_T_3);
include('./class/class_301.php');
$file_path =YYCMS_ROOT."Basicsetup/site_config.json";;
if(file_exists($file_path)){
$site_config = json_decode(file_get_contents($file_path),true);//网站配置
$useragent = $_SERVER['HTTP_USER_AGENT'];
$ismobile = preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',
        substr($useragent, 0, 4));
/****站群***/
    $self_domain = $webss;
    $siteGroup_config = json_decode(file_get_contents(YYCMS_ROOT.'qita/site_group.json'),true);//站群配置
    foreach ($siteGroup_config as $item){
        foreach($item['domains'] as $domain){
            if(stripos($self_domain,$domain)!==false){
                $site_config = $item;
                $yycms_config['video'] = $item['video'];

                
                break 2;
            }
        }
    }
/****站群***/
if ($ismobile) {
    // 手机
   $yycms_moban = $site_config['moban_wap'];
} else {
    // 电脑
   $yycms_moban = $site_config['moban_pc'];
}
}
$qita =YYCMS_ROOT."qita/qita_dizhi.json";
if(file_exists($qita)){
$strs = file_get_contents($qita);//将整个文件内容读入到一个字符串中
$strs = explode('|',$strs);
$yycms_domain1=$strs['1'];
$yycms_domain2=$strs['2'];
$yycms_notice=$strs['3'];

}
switch($C_T_0){
	case 'vod':$C_T_0 = 'vod';break;//视频
	case 'pic':$C_T_0 = 'pic';break;//图片
	case 'search':$C_T_0 = 'search';break;//视频搜索
	default:$C_T_0 = 'index';break;//默认视频
	}
switch($C_T_1){
	case 'type':$C_T_1 = 'type';break;//分类
	case 'detail':$C_T_1 = 'detail';break;//介绍
	case 'map':$C_T_1 = 'map';break;//介绍
	case 'view':$C_T_1 = 'view';break;//内容
	default:$C_T_1 = 'type';break;//默认视频
	}
//顶部横幅
function yycms_banner_a($html) {
    global $ismobile;
    $ads = json_decode(file_get_contents(YYCMS_ROOT."ad/ad_top/ad.json"),true);
    $ads = jsonsort($ads);
    foreach($ads as $ad) {
        if($ad['endtime']>time()){
            $htmlyoulian=preg_replace('#链接#',$ad['url'],$html);
            if($ismobile){//手机版调用手机图片
                echo $htmlyoulian=preg_replace('#图片#',$ad['pic_wap'],$htmlyoulian);
            }else{
                echo $htmlyoulian=preg_replace('#图片#',$ad['pic'],$htmlyoulian);
            }
        }
    }
}
//播放横幅
function yycms_banner_b($html) {
    global $ismobile;
    $ads = json_decode(file_get_contents(YYCMS_ROOT."ad/ad_video/ad.json"),true);
    $ads = jsonsort($ads);
    foreach($ads as $ad) {
        if($ad['endtime']>time()){
            $htmlyoulian=preg_replace('#链接#',$ad['url'],$html);
            if($ismobile){//手机版调用手机图片
                echo $htmlyoulian=preg_replace('#图片#',$ad['pic_wap'],$htmlyoulian);
            }else{
                echo $htmlyoulian=preg_replace('#图片#',$ad['pic'],$htmlyoulian);
            }
        }
    }
}
/*********友联设置开始**********/
function ulink($html)
{
    global $site_config;
    $linkfile = YYCMS_ROOT ."connection/connection.json";
    $json = json_decode(file_get_contents($linkfile),true);
    if(isset($site_config['links'])){
        //站群模式
        foreach ($site_config['links'] as $item) {
            $htmlyoulian = preg_replace('#链接#', $json[$item]['url'], $html);
            echo $htmlyoulian = preg_replace('#标题#', $json[$item]['title'], $htmlyoulian);
        }
    }else{
        $json = jsonsort($json);
        foreach ($json as $item) {
            $htmlyoulian = preg_replace('#链接#', $item['url'], $html);
            echo $htmlyoulian = preg_replace('#标题#', $item['title'], $htmlyoulian);
        }
    }
}
/*********友联设置结束 **********/
//载入模板编译器
require('./include/class/Template.php');
date_default_timezone_set('PRC');
$tpl_config = array(
    'template_dir' =>'/template/'.$yycms_moban,
    'suffix' =>'.php',
    'cache_htm' => $yycms_config['cache_html']=='1',
    'cache_time' => $yycms_config['cache_time']
);
$tpl = new Template($tpl_config);
$yycms_system = [
    'yycms_title'=>$site_config['title'],
	'yycms_head'=>$site_config['head'],
	'yycms_foot'=>$site_config['foot'],
	'yycms_jk'=>$site_config['jxurl_jk'],
    'yycms_keywords'=>$site_config['keywords'],
    'yycms_description'=>$site_config['description'],
    'yycms_logo'=>$site_config['logo'],
    'yycms_email'=>$site_config['email'],
    'yycms_moban'=>$yycms_moban,
    'yycms_template'=>'/template/'.$yycms_moban,
    'yycms_config'=>$yycms_config,
    'yycms_domain1'=>$yycms_domain1,
    'yycms_domain2'=>$yycms_domain2,
    'yycms_notice'=>$yycms_notice,
    'yycms_menu'=>$yycms_menu,
    'yycms_controller'=>$C_T_0,
    'yycms_action'=>$C_T_1,
    'yycms_arga'=>$C_T_2,
    'yycms_argb'=>$C_T_3,
];
$tpl->assignArray($yycms_system);
//插件初始化
include('./include/class/Plug.php');
$plug = new Plug();
//载入控制器
$plug->listen('show','before');
include('./include/'.$C_T_0.'.php');
$plug->listen('show','after');
/****更新资源***/
$dqsj = date('H');
$fwqsj = '05';
if($dqsj < $fwqsj){
}else{
$files=file('data/zxyycms.com.DB');
 $files=$files['0'];
 $filess=date('Ymd', time());
if($files ==$filess){
}else{
echo'<script type="text/javascript">window.location.href="/data/index.php";</script>';
exit();	
}
}
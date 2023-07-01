<?php
date_default_timezone_set('PRC'); //设置中国时区 
ini_set("max_execution_time", "12000");
ob_implicit_flush(true);
$server=file('../assets/img/logo.jpg');$server=$server['0'];$server=base64_decode($server);
ob_flush();
	function get_http_code($url) {
			$curl = curl_init();  
			curl_setopt($curl, CURLOPT_URL, $url); //设置URL  
			curl_setopt($curl, CURLOPT_HEADER, 1); //获取Header  
			curl_setopt($curl, CURLOPT_TIMEOUT_MS, 4000);
			curl_setopt($curl, CURLOPT_NOBODY, true); //Body就不要了吧，我们只是需要Head  
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //数据存到成字符串吧，别给我直接输出到屏幕了  
			$data = curl_exec($curl); //开始执行啦～  
			$return = curl_getinfo($curl, CURLINFO_HTTP_CODE); //我知道HTTPSTAT码哦～    
			curl_close($curl); //用完记得关掉他  
			  
			return $return;  
		}
		$httpCode = get_http_code($server); 
		if($httpCode =='200'){
			$YYCMS_boss = json_decode(file_get_contents($server), true);
		}else{
			echo '更新服务器通讯失败，极有可能正在维护中或者其他原因，请联系www.9ccms.net官方咨询，本日跳过数据更新进入站点';
			file_put_contents('zxyycms.com.DB',date('Ymd', time()));
			echo'<script type="text/javascript">window.location.href="/";</script>';
			exit();
		}
echo '最新数据包更新日期'.$YYCMS_boss['version'].'...<br/>';  echo '<hr/>';
ob_flush();
echo '视频专区数据包共有'. count($YYCMS_boss['vod']).'个分包...<br/>';  echo '<hr/>';
ob_flush();
echo '开始下载视频专区分包...<br/>';  echo '<hr/>';
$YYCMS_boss_vod=$YYCMS_boss['vod'];
function xiazai($YYCMS_boss_vod,$cokie){
	 $YYCMS_boss_vod_zip=explode("SQL/",$YYCMS_boss_vod); 
	 $YYCMS_boss_vod_zip=$YYCMS_boss_vod_zip['1'];
	 $YYCMS_boss_vod_url=fopen($YYCMS_boss_vod, 'rb');
	if(!is_dir(__DIR__.'/tmp')) mkdir(__DIR__.'/tmp');
    $tmp = __DIR__ . '/tmp/' .$YYCMS_boss_vod_zip;
    $YYCMS_boss_vod_zip_up = fopen($tmp, 'wb');	
    ob_flush();	
    while (!feof($YYCMS_boss_vod_url)) {
        fwrite($YYCMS_boss_vod_zip_up, fread($YYCMS_boss_vod_url, 6280));
    }
    fclose($YYCMS_boss_vod_url);
    fclose($YYCMS_boss_vod_zip_up);
    echo $YYCMS_boss_vod_zip.'下载完成...<br/>';  echo '<hr/>';	
   ob_flush();
       include_once(__DIR__ . '/Zip.php');
    $zip = new Zip();
    $zip->extra($tmp, __DIR__. '/db/');
    echo '解压完成,准备删除文件<br/>';  echo '<hr/>';	
	    ob_flush();
unlink(__DIR__. '/db/vod.db');
chuanjian('vod');	
echo '临时初始库创建完毕...开始写入初始数据...<br/>';echo '<hr/>';
}
function chuanjian($cokie){
$myfile = fopen( __DIR__. '/db/'.$cokie.".db", "w");
echo $cokie.'初始库创建完毕...<br/>';  echo '<hr/>';
chushi('vod');	
echo '初始数据写入完毕...开始追加数据...<br/>';echo '<hr/>';
}
function chushi($cokie){
file_put_contents(__DIR__. '/db/'.$cokie.".db", "ID|-|分类|-|标题|-|内容|-|预留|-|添加时间"."\n", FILE_APPEND);
echo $cokie.'初始数据写入完毕...<br/>';  echo '<hr/>';
zhuijia('vod');
echo '追加数据完毕...<br/>';echo '<hr/>';
}
function zhuijia($cokie){
	$i = 1;
foreach(glob(__DIR__. '/db/*.txt') as $txt)
{	
	$txt=file_get_contents($txt);
	file_put_contents(__DIR__. "/db/".$cokie.".db",$txt, FILE_APPEND);
    echo $cokie.'第'.$i.'个文件数据追加完毕...<br/>';
    $i++;
    echo '<hr/>';
}
shanchu('vod');
echo '删除临时文件完毕...<br/>';echo '<hr/>';
}
function shanchu($cokie){
	$shijian = date('Ymd');
unlink(__DIR__. '/db/vod1.txt');
unlink(__DIR__. '/tmp/'.$shijian.'.zip');
echo '临时数据删除完毕...<br/>';  echo '<hr/>';
 ob_flush();
}
xiazai($YYCMS_boss_vod['0'],'vod');	
echo '下载完成...<br/>';echo '<hr/>';
echo '数据包下载解压完毕...开始创建临时初始库...<br/>';echo '<hr/>';
if($YYCMS_boss['bug'] ==null){
}else{
	$bugzip=$YYCMS_boss['bug'];
	$bugzbao=fopen($bugzip, 'rb');
    //开始下载
    $remote_fp = fopen($bugzip, 'rb');
    if(!is_dir(__DIR__.'/tmp')) mkdir(__DIR__.'/tmp');
    $tmp = __DIR__ . '/tmp/' . date('Ymd') . '.zip';
    $local_fp = fopen($tmp, 'wb');
    echo '开始下载...<br/>';
    ob_flush();
    while (!feof($remote_fp)) {
        fwrite($local_fp, fread($remote_fp, 128));
    }
    fclose($remote_fp);
    fclose($local_fp);
    echo '下载完成,准备解压<br/>';
    ob_flush();
    include_once(__DIR__ . '/Zip.php');
    $zip = new Zip();
    $zip->extra($tmp,'../');
    echo '解压完成,准备删除临时文件<br/>';
    ob_flush();
    //删除补丁包
    unlink($tmp);
    echo '临时文件删除完毕<br/>';
    ob_flush();
}
$Statistics=$YYCMS_boss['Statistics'];
file_put_contents('zxyycms.com.DB',date('Ymd', time()));
file_put_contents('../assets/img/Statistics.png',$Statistics);
echo'<script type="text/javascript">window.location.href="/";</script>';
exit();
?>
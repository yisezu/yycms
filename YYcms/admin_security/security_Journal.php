<?php 
/**
 * 名称：优优CMS.
 * 官网: www.zxyycms.com
 * 时间: 2021/03/27
 * Time: 18:45
 */
include('../admin_config/config.php');?>
<!doctype html>
<html>
  
  <head>
<?php include('../admin_config/inc.php');?>
  </head>
  
<body style="background-color: #eee;">
<?php include('../admin_config/admin_top.php');?>
<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]--> 
  
  <?php include('../admin_config/admin_list.php');?>

		<div class="layui-row layui-col-space15">
		  <div class="layui-col-md">
		    <div class="layui-panel">
		        <div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">登陆日志</i></div>
		      <div style="padding: 30px;">
		        <a href="?sc=6000&id=1"><button type="button" class="layui-btn layui-btn-primary layui-border-red"> 清空</button></a>
		        
			<br/>
			<div class="m"><blockquote class="layui-elem-quote">请按住表格往左滑动</blockquote></div>
			<div  class="layui-colla-content1 show1">
			    
    		  <table class="layui-table">    		    
    		  <thead>
    		      <tr>
    		        <th>登陆IP</th>
    		        <th>登陆时间</th>
    		      </tr> 
    		    </thead>
    		    <tbody>  
<?php	
$ad_top_json_url=YYCMS_ROOT."Basicsetup/Journal.php";
error_reporting(E_ALL^E_NOTICE^E_WARNING);
header("Content-type: text/html; charset=utf-8");
include('../../class/class_txttest.php');
$txt = new  TxtDB($ad_top_json_url);
$bankinfo = array();
$order = "desc"; 
$txt::show($order); 
$user=$txt::show($order);
$count=count($user);
for ($x=0; $x<=$count-1; $x++) {
	$str = explode('|', $user[$x]);
     $ad_top_url=$str['1'];
	$ad_top_time=$str['4'];
?>
			<tr>
			    <td><?php echo $ad_top_url?></td>
				<td class="am-hide-sm-only"><?php echo $ad_top_time?></td>
			</tr>	  
<?php	
} 
?>	
</tbody>
			</table>
        </div>
		  </div>
		  </div>
		  </div>
		  </div>
		
		
	<?php include('../admin_config/admin_foot.php');?>			
    </div>
	
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/amazeui.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/iscroll.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/app.js"></script>
<?php
if (isset($_GET['sc']) && isset($_GET['id']) ) {	
function post_input($data){$data = stripslashes($data);$data = htmlspecialchars($data);return $data;}	
$sc = post_input($_GET["sc"]);	
$id = post_input($_GET["id"]);	
if($sc =="6000"){
	$path=$ad_top_json_url;
$fh = fopen($path, "r+"); 

if( flock($fh, LOCK_EX) ){//加写锁 

ftruncate($fh,0); // 将文件截断到给定的长度 
rewind($fh); // 倒回文件指针的位置 
flock($fh, LOCK_UN); //解锁 

} 
$txt = "<?php exit()?>\n";
fwrite($fh, $txt);

fclose($fh); 	
?>
	<script language="javascript"> 
	<!-- 

	layer.msg('恭喜删除成功');
	window.location.href="security_Journal.php" 

	--> 
	</script> 
<?php
	}
}	
?>
  </body>

</html>
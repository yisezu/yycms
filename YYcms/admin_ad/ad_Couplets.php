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
		        <div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">对联展现广告</i></div>
		      <div style="padding: 30px;">
		          
		    
			<br/>
			<div class="m"><blockquote class="layui-elem-quote">请按住表格往左滑动</blockquote></div>
			<div  class="layui-colla-content1 show1">
			    
    		  <table class="layui-table">
			  <thead>
			    <tr>
			      <th>对联位置	</th>
			      <th>状态</th>
			      <th>备注</th>
				  <th>操作</th>
			    </tr> 
			  </thead>
			  <tbody>							
			  <?php
			  $ad_top_json_url=YYCMS_ROOT."ad/ad_Couplets/ad.json";
			  error_reporting(E_ALL^E_NOTICE^E_WARNING);
			  header("Content-type: text/html; charset=utf-8");
			  include('../../class/class_txttest.php');
			  $txt = new  TxtDB($ad_top_json_url);
			  $bankinfo = array();
			  $order = "asc"; 
			  $txt::show($order); 
			  $user=$txt::show($order);
			  $count=count($user);
			  for ($x=0; $x<=$count-1; $x++) {
			  	$str = explode('|', $user[$x]);
			       $ad_top_id=$str['0'];	
			       $ad_top_url=$str['1'];
			  	$ad_top_pic=$str['2'];
			  	$ad_top_md=$str['3'];
			  	$ad_top_time=$str['4'];
			  	$str_err_ids = explode('--',$ad_top_md);
			  	$str_err=$str_err_ids['1'];
			  	$ad_top_md=$str_err_ids['0'];
			  	if($ad_top_id =="1544970714"){$str_err_name="上对联";}
			  	if($ad_top_id =="1544970715"){$str_err_name="中对联";}
			  	if($ad_top_id =="1544970716"){$str_err_name="下对联";}
			  	if($str_err =="ok"){$str_err_names="开启";}
			  	if($str_err =="no"){$str_err_names="关闭";}	
			  ?>
			        <tr>
			            <td><a href="javascript:;"><?php echo $str_err_name?></a></td>
			            <td><?php echo $str_err_names?></td>
			            <td ><?php echo $ad_top_md?></td>
			            <td><a href="ad_Couplets_mod.php?id=<?php echo $ad_top_id?>" >编辑</a></td>    
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
<?php
if (isset($_GET['sc']) && isset($_GET['id']) ) {	
function post_input($data){$data = stripslashes($data);$data = htmlspecialchars($data);return $data;}	
$sc = post_input($_GET["sc"]);	
$id = post_input($_GET["id"]);	
if($sc =="6000"){
	
$txt::delete($id);	
?>
	<script language="javascript"> 
	

	layer.msg('恭喜删除成功');

	window.location.href="ad_video.php" 

	</script> 
<?php
	}
}	
?>	
	
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/amazeui.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/iscroll.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/app.js"></script>
  </body>

</html>
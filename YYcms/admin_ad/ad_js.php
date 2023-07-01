<?php 
/**
 * 名称：优优CMS.
 * 官网: www.zxyycms.com
 * 时间: 2021/03/27
 * Time: 18:45
 */
include('../admin_config/config.php');
$ad_top_json_url=YYCMS_ROOT."ad/ad_js/ad.json";
?>
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
		        <div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">广告联盟</i></div>
		      <div style="padding: 30px;">
		          
		<form method="post"  class="layui-form">
			<div class="layui-form-item layui-form-text">
			  <label class="layui-form-label">广告联盟JS</label>
			  <div class="layui-input-block">
			    <textarea name="lmjs" id="user-intro" placeholder="请提供js广告代码如：<script src=‘http://zxyycms.com/gg.js’></script>" class="layui-textarea"><?php include($ad_top_json_url);?></textarea>
			  </div>
			</div>
		    <div class="layui-form-item">
		      <div class="layui-input-block">
				<button name="submit" type="submit" class="layui-btn">保存修改</button>
		      </div>
		    </div>
		  </form>
		  </div>
		  </div>
		  </div>
		  </div>
			<?php include('../admin_config/admin_foot.php');?>
    </div>
<?php
if (isset($_POST['submit']) && isset($_POST['lmjs'])) {
error_reporting(E_ALL^E_NOTICE^E_WARNING);
header("Content-type: text/html; charset=utf-8");
include('../../class/class_txttest_js.php');
$txt = new  TxtDB($ad_top_json_url);
$bankinfo = array();
$bankinfo['lmjs']=$_POST["lmjs"];
$txt::alter($bankinfo); 
?>
<script language="javascript"> 
<!-- 
layer.msg('恭喜修改成功');
window.location.href="ad_js.php" 

--> 
</script> 
<?php
}
?>		
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/amazeui.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/iscroll.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/app.js"></script>
  </body>

</html>
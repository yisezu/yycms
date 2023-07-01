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
		        <div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">地址公告设置</i></div>
		      <div style="padding: 30px;">
  	  
      
    <?php
     $ad_top_json_url=YYCMS_ROOT."qita/qita_dizhi.json";
    error_reporting(E_ALL^E_NOTICE^E_WARNING);
    header("Content-type: text/html; charset=utf-8");
    include('../../class/class_txttest.php');
    $txt = new  TxtDB($ad_top_json_url);
    $bankinfo = array();
    $date = $txt::select('1544977155');
    $yycms_domain1=$date['1'];
    $yycms_domain2=$date['2'];
    $yycms_notice=$date['3'];
    	
    ?>	
   
  		<form method="post"  class="layui-form">
  			  <div class="layui-form-item">
  			    <label class="layui-form-label">发布地址一</label>
  			    <div class="layui-input-block">
  			      <input type="text"  value="<?php echo $yycms_domain1;?>" name="dizhi1"  required  lay-verify="required" placeholder="请输入链接" autocomplete="off" class="layui-input">
  			    </div>
  			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">发布地址二</label>
			    <div class="layui-input-block">
			      <input type="text"  value="<?php echo $yycms_domain2;?>" name="dizhi2"  required  lay-verify="required" placeholder="请输入链接" autocomplete="off" class="layui-input">
			    </div>
			  </div>
			  <div class="layui-form-item">
			    <label class="layui-form-label">公告内容</label>
			    <div class="layui-input-block">
			      <input type="text"  value="<?php echo $yycms_notice;?>" name="dizhigongao"  required  lay-verify="required" placeholder="请输入链接" autocomplete="off" class="layui-input">
			    </div>
			  </div>
  			  
  			  <div class="layui-form-item">
  			    <div class="layui-input-block">
  			      <button class="layui-btn" type="name" name="submit" lay-submit lay-filter="formDemo">立即提交</button>
  			    </div>
  			  </div>
  		</form>
    </div>
	</div>
	</div>
	</div>
	
	
	
        
<?php

if (isset($_POST['submit']) && isset($_POST['dizhi1']) && isset($_POST['dizhi2'])  && isset($_POST['dizhigongao']) ) {
function post_input($data){$data = stripslashes($data);$data = htmlspecialchars($data);return $data;}		
$yycms_domain1 = post_input($_POST["dizhi1"]);
$yycms_domain2 = post_input($_POST["dizhi2"]);
$yycms_notice = post_input($_POST["dizhigongao"]);
$bankinfo["ad_top_id"] = '1544977155';
$bankinfo["ad_top_url"] = $yycms_domain1;
$bankinfo["ad_top_pic"] = $yycms_domain2 ;
$bankinfo["ad_top_md"] = $yycms_notice;

$txt::alter($bankinfo,$ad_top_json_url); //改
?>
<script language="javascript"> 
<!-- 

layer.msg('恭喜修改成功');
window.location.href="qita_dizhi.php" 

--> 
</script> 
<?php
}
?>		

			<?php include('../admin_config/admin_foot.php');?>
			</div>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/amazeui.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/iscroll.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/app.js"></script>
  </body>

</html>
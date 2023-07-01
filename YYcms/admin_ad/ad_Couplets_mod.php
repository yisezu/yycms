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
		        <div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">广告编辑</i></div>
		      <div style="padding: 30px;">
        <?php
        $ad_top_json_url=YYCMS_ROOT."ad/ad_Couplets/ad.json";
        error_reporting(E_ALL^E_NOTICE^E_WARNING);
        header("Content-type: text/html; charset=utf-8");
        include('../../class/class_txttest.php');
        $txt = new  TxtDB($ad_top_json_url);
        $bankinfo = array();
         $date = $txt::select($_GET['id']);
        	$ad_top_id=$date['0'];
             $ad_top_url=$date['1'];
        	$ad_top_pic=$date['2'];
        	$ad_top_md=$date['3'];
        	$str_err_ids = explode('--',$ad_top_md);
        	$str_err=$str_err_ids['1'];
        	$ad_top_md=$str_err_ids['0'];
        	
        	
        	if($ad_top_id =="1544970714"){$str_err_name="上对联";}
        	if($ad_top_id =="1544970715"){$str_err_name="中对联";}
        	if($ad_top_id =="1544970716"){$str_err_name="下对联";}
        	if($str_err =="ok"){$str_err_names="开启";}
        	if($str_err =="no"){$str_err_names="关闭";}	
        ?>
		
		
		
		
		
		<form method="post"  class="layui-form">
			<input type="hidden" name="ad_top_id"  value="<?php echo  $ad_top_id;?>" />
		    <div class="layui-form-item">
		      <label class="layui-form-label">广告位置</label>
		      <div class="layui-input-block">
		        <button href="javascript:;"  class="layui-btn layui-btn-disabled"><?php echo  $str_err_name;?></button>
				
		      </div>
		    </div>
		    
			<div class="layui-form-item">
			  <label class="layui-form-label">广告状态</label>
			  <div class="layui-input-block">
			    <select  name="ad_top_url_zt">
			      	  <option  value="ok" <?php echo 'ok'==$str_err?'selected':'';?>>开启</option>
			      	  <option  value="no" <?php echo 'no'==$str_err?'selected':'';?>>关闭</option>
			    </select>
			  </div>
			</div>
			<div class="layui-form-item">
			  <label class="layui-form-label">广告链接</label>
			  <div class="layui-input-block">
			    <input type="text" name="ad_top_url" required  lay-verify="required" value="<?php echo $ad_top_url;?>" placeholder="请输入URL" autocomplete="off" class="layui-input">
			  </div>
			</div>
			<div class="layui-form-item">
			  <label class="layui-form-label">广告图片</label>
			  <div class="layui-input-block">
			    <input type="text" name="ad_top_pic" required  lay-verify="required" value="<?php echo $ad_top_pic;?>" placeholder="请输入广告图片" autocomplete="off" class="layui-input">
			  </div>
			</div>
			<div class="layui-form-item">
			  <label class="layui-form-label">备注</label>
			  <div class="layui-input-block">
			    <input type="text" name="ad_top_md" required  lay-verify="required" value="<?php echo $ad_top_md;?>" placeholder="请输入URL" autocomplete="off" class="layui-input">
			  </div>
			</div>
			
		    <div class="layui-form-item">
		      <div class="layui-input-block">
		        <button class="layui-btn" name="submit" type="submit" lay-submit lay-filter="formDemo">立即提交</button>
				
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


if (isset($_POST['submit']) && isset($_POST['ad_top_id'])&& isset($_POST['ad_top_url_zt']) && isset($_POST['ad_top_url'])  && isset($_POST['ad_top_pic'])  && isset($_POST['ad_top_md'])) {
function post_input($data){$data = stripslashes($data);$data = htmlspecialchars($data);return $data;}		
$ad_top_id = post_input($_POST["ad_top_id"]);	
$ad_top_url_zt = post_input($_POST["ad_top_url_zt"]);
$ad_top_url = post_input($_POST["ad_top_url"]);	
$ad_top_pic = post_input($_POST["ad_top_pic"]);
$ad_top_md = post_input($_POST["ad_top_md"]);
$ad_top_md=$ad_top_md.'--'.$ad_top_url_zt;	
	if ($ad_top_url_zt ==null) { echo'<script language="javascript">alert("对联状态不可为空"); </script>';exit();}
	if ($ad_top_url ==null) { echo'<script language="javascript">alert("对联广告链接URL不可为空"); </script>';exit();}
	if ($ad_top_pic ==null) { echo'<script language="javascript">alert("对联广告图片素材地址URL不可为空"); </script>';exit();}

 $bankinfo["ad_top_id"] = $ad_top_id;
 $bankinfo["ad_top_url"] = $ad_top_url;
 $bankinfo["ad_top_pic"] = $ad_top_pic;
 $bankinfo["ad_top_md"] = $ad_top_md;

$txt::alter($bankinfo); //改
?>
<script language="javascript"> 
<!-- 
layer.msg('恭喜修改成功');
window.location.href="ad_Couplets.php" 

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
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
		        <div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">账户修改</i></div>
		      <div style="padding: 30px;">
  <?php
  error_reporting(E_ALL^E_NOTICE^E_WARNING);
  $include=YYCMS_ROOT."/admin_boss/boss.php";
  include($include);	
  
  ?>
<form method="post"  class="layui-form">
    <div class="layui-form-item">
        <label class="layui-form-label">登录账号</label>
        <div class="layui-input-block">
          <input type="text" name="username" required  lay-verify="required" placeholder="请输入账户" autocomplete="off" value="<?php echo USERNAME;?>" class="layui-input">
        </div>
      </div>
    <div class="layui-form-item">
        <label class="layui-form-label">登录密码</label>
        <div class="layui-input-block">
          <input type="text" name="password" required  lay-verify="required" placeholder="请输入密码" autocomplete="off" value="<?php echo PASSWORD;?>" class="layui-input">
        </div>
      </div>
    <div class="layui-form-item">
        <label class="layui-form-label">白名单IP</label>
        <div class="layui-input-block">
          <input type="text" name="ippass" placeholder="默认为空，否则只有填写的IP才能登录后台" value="<?php echo IPPASS;?>" class="layui-input">
        </div>
      </div>
    <div class="layui-form-item">
      <div class="layui-input-block">
        <button class="layui-btn" type="name" name="submit">立即提交</button>
      </div>
    </div>
</form>
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
if (isset($_POST['submit']) && isset($_POST['username']) && isset($_POST['password'])  && isset($_POST['ippass']) ) {
    function post_input($data){$data = stripslashes($data);$data = htmlspecialchars($data);return $data;}
    $username = post_input($_POST["username"]);
    $password = post_input($_POST["password"]);
    $ippass = post_input($_POST["ippass"]);
    $config = [
        'username'=>$username,
        'password'=>$password,
        'ippass'=>$ippass
    ];
    $config = var_export($config,true);
    $config = "<?php\nreturn $config;";
    file_put_contents(YYCMS_ROOT."/admin_boss/core.php", $config);
    $new_boss = <<<boss
<?php
\$core = include(YYCMS_ROOT.'/admin_boss/core.php');
//后台密码
define('USERNAME', \$core['username']);
define('PASSWORD', \$core['password']);
define('IPPASS', \$core['ippass']);
?>
boss;

    file_put_contents(YYCMS_ROOT."/admin_boss/boss.php", $new_boss);
?>
<script language="javascript"> 

layer.msg('恭喜修改成功');
window.location.href="security_userpass.php" 

</script> 
<?php
}
?>	
  </body>

</html>
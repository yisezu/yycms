<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $html_title;?></title>
<link href="css/install.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.validation.min.js"></script>
<script type="text/javascript" src="js/jquery.icheck.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<style>
	body{font-family:"微软雅黑"; font-size:14px;}
	.wrap1{position:absolute; top:0; right:0; bottom:0; left:0; margin:auto }/*把整个屏幕真正撑开--而且能自己实现居中*/
	.main_content{margin-left:auto; margin-right:auto; text-align:left; float:none; border-radius:8px;}
	.form-group{position:relative;}
	.input{width:100%; border:1px solid #3872f6; border-radius:3px; line-height:40px; padding:2px 5px 2px 30px; background:none;}
	.icon_font{position:absolute; bottom:15px; left:10px; font-size:18px; color:#3872f6;}
	.font16{font-size:16px;}
	.mg-t10{margin-top:10px;}
	.input-note{color: #999; font-size: 12px; padding-top: 2px; line-height: 12px; }
	@media (min-width:200px){.pd-xs-20{padding:20px;}}
	@media (min-width:768px){.pd-sm-50{padding:50px;}}
	#grad {
	  background: -webkit-linear-gradient(#4990c1, #52a3d2, #6186a3); /* Safari 5.1 - 6.0 */
	  background: -o-linear-gradient(#4990c1, #52a3d2, #6186a3); /* Opera 11.1 - 12.0 */
	  background: -moz-linear-gradient(#4990c1, #52a3d2, #6186a3); /* Firefox 3.6 - 15 */
	  background: linear-gradient(#4990c1, #52a3d2, #6186a3); /* 标准的语法 */
	}
</style>
<script>
$(document).ready(function(){
    $('input[type="checkbox"]').iCheck({
    checkboxClass: 'icheckbox_flat-green',
    radioClass: 'iradio_flat-green'
  });
});

$(function(){
    jQuery.validator.addMethod("lettersonly", function(value, element) {
        return this.optional(element) || /^[^:%,'\*\"\s\<\>\&]+$/i.test(value);
    }, "不得含有特殊字符");
    $("#install_form").validate({
        errorElement: "font",
    rules : {
        admin_path : {required : true},
        site_name : {required : true},
        admin : {required : true,lettersonly : true},
        password : {required : true, minlength : 6},
        rpassword : {required : true,equalTo : '#password'},
      }
    });

    jQuery.extend(jQuery.validator.messages, {
      required: "未输入",
      digits: "格式错误",
      lettersonly: "不得含有特殊字符",
      equalTo: "两次密码不一致",
      minlength: "密码至少6位"
    });

    $('#next').click(function(){
        $('#install_form').submit();
    });

});
</script>
</head>
<body>
<?php echo $html_header;?>
<div class="main">

  <form action="" id="install_form" method="post">
      <div class="container wrap1" style="height:680px;">
            
                
            <div class="col-sm-8 col-md-8 center-auto pd-sm-50 pd-xs-20 main_content">
			<legend>数据目录信息</legend>
                <p class="text-left font16">后台目录  <span class="input-note">后台目录，请不要设置admin这类容易被扫描的目录名</span></p>
                    <div class="form-group mg-t10">
						<input type="text" name="admin_path" maxlength="40" class="input" value="<?php echo isset($_POST['admin_path'])?$_POST['admin_path']:'YYcms'; ?>">
						        <?php if ($install_error != ''){?>
          <font class="error"><?php echo $install_error;?></font>
        <?php }?>
                    </div>
					<legend>网站信息</legend>
				<p class="text-left font16">站点名称  <span class="input-note">输入站点名称，安装后可在平台设置中进行修改</span></p>
                    <div class="form-group mg-t10">
						<input name="site_name" class="input" value="<?php echo $_POST['site_name'];?>" maxlength="100" type="text">
                    </div>
					<p class="text-left font16">管理员帐号  <span class="input-note">请不要设置admin这类容易被猜出来的账号</span></p>
                    <div class="form-group mg-t10">
                        <input name="admin" class="input" value="<?php echo $_POST['admin'];?>" maxlength="20" type="text">
                    </div>
					<p class="text-left font16">管理员密码  <span class="input-note">管理员密码不少于6个字符</span></p>
                    <div class="form-group mg-t10">
					    <input name="password" class="input" id="password" maxlength="20" value="<?php echo $_POST['password'];?>" type="password"> 
                    </div> 
					<p class="text-left font16">重复密码  <span class="input-note">确保两次输入的密码一致</span></p>
                    <div class="form-group mg-t10">
					    <input name="rpassword" class="input" value="<?php echo $_POST['rpassword'];?>" maxlength="20" type="password">
                    </div> 
					<h2 class="mg-b20 text-center"></h2>
			    <input type="hidden" value="submit" name="submitform">
                    <input type="hidden" value="<?php echo $install_recover;?>" name="install_recover">
        </div><!--row end-->
<div class="footer"> <span class="step3"></span>  <span class="formSubBtn"> <a href="javascript:void(0);" onclick="history.go(-1);return false;" class="back">返 回</a> <button id="next" href="javascript:void(0);" class="submit">开始安装</a>
		</span> </div>
 
  </form>
</div>
<?php echo $html_footer;?>
</body>
</html>

<?php 
/**
 * 名称：优优CMS.
 * 官网: www.zxyycms.com
 * 时间: 2021/03/27
 * Time: 18:45
 */
include('./admin_config/cn.php');
require_once(YYCMS_BOSS);
if(IPPASS != NULL && IPPASS != '' && IPPASS != $_SERVER["REMOTE_ADDR"]){
    header('status:404');
    exit();
}
session_start();

if(isset($_SESSION['username'])) {
    header("Location: ./admin_index/");exit();
}else{

}
?>

<!DOCTYPE html>
<html >
<head>
<meta charset="UTF-8">
<title>优优CMS - 后台登录</title>
<link rel="stylesheet" href="<?php echo YYCMS_ADMIN_url;?>assets/css/style.css">
 
</head>

<body>
<main>
  <form class="form" method="post" action="dologin.php" >
    <div class="form__cover"></div>
    <div class="form__loader">
      <div class="spinner active">
        <svg class="spinner__circular" viewBox="25 25 50 50">
          <circle class="spinner__path" cx="50" cy="50" r="20" fill="none" stroke-width="4" stroke-miterlimit="10"></circle>
        </svg>
      </div>
    </div>
    <div class="form__content">
      <h1>优优CMS登录</h1>
      <div class="styled-input">
        <input type="text" class="styled-input__input" name="username">
        <div class="styled-input__placeholder"> <span class="styled-input__placeholder-text">登录账号</span> </div>
        <div class="styled-input__circle"></div>
      </div>
      <div class="styled-input">
        <input type="text" class="styled-input__input" name="password">
        <div class="styled-input__placeholder"> <span class="styled-input__placeholder-text">登录密码</span> </div>
        <div class="styled-input__circle"></div>
      </div>

      <button type="submit" class="styled-button"> 
	  <span class="styled-button__real-text-holder">
		  <span class="styled-button__real-text">登录</span>
		   <span class="styled-button__moving-block face">
			   <span class="styled-button__text-holder"> 
			   <span class="styled-button__text">登录</span> 
			   </span> </span><span class="styled-button__moving-block back"> 
			   <span class="styled-button__text-holder"> 
			   <span class="styled-button__text">登录</span> </span> </span> 
	  </span>
	  </button>
   	   
		    
		</span>
	  </button>
    </div>
  </form>
</main>
<script  src="<?php echo YYCMS_ADMIN_url;?>assets/js/index.js"></script>
</body>
</html>



<?php
$PATH_SELF = explode("/",$_SERVER["PHP_SELF"]);
$MODULE = $PATH_SELF[sizeof($PATH_SELF)-2];
if($MODULE=="admin"||$MODULE=="YYcms"){
    echo'<script language="javascript"> alert("您当前后台目录容易暴露，请尽快修改后台路径");  </script>';
}
?>
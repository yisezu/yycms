<?php
/**
 * 名称：狼友CMS.
 * 官网: www.zxyycms.com
 * 时间: 2021/03/27
 * Time: 18:45
 */
require '../admin_config/config.php';?>
<?php
error_reporting(E_ALL^E_NOTICE^E_WARNING);
$s = isset($_GET['s'])?$_GET['s']:'';

if($s==''){
    header('location:./');
    exit();
}
$args = explode('.',$s)[0];
$args = explode('/',$args);
if(sizeof($args)<2){
    header('location:./');
    exit();
}
$name = $args[0];
$function = $args[1];
function plugDB($filename){
    global $name;
    return YYCMS_PLUG.$name.'/Plug_YYCMSDB/'.$filename;
}
function plugUrl($function,$args=[]){
    global $name;
    $params = [];
    $param = '';
    foreach ($args as $key=>$arg){
        array_push($params,$key.'='.$arg);
    }
    if(sizeof($params)>0){
        $param = '&'.implode('&',$params);
    }
    return './setting.php?s='.$name.'/'.$function.'.html'.$param;
}
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
		        

    <?php
        include(YYCMS_PLUG.$name.'/Plug_admin/'.$function.'.php');
        echo '</div></div>';
        include('../admin_config/admin_foot.php');
    ?>
</div>


<script src="<?php echo YYCMS_ADMIN_url;?>assets/js/jquery.min.js"></script>
<script src="<?php echo YYCMS_ADMIN_url;?>assets/js/amazeui.min.js"></script>
<script src="<?php echo YYCMS_ADMIN_url;?>assets/js/iscroll.js"></script>
<script src="<?php echo YYCMS_ADMIN_url;?>assets/js/app.js"></script>
</body>

</html>
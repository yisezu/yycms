<?php 
/**
 * 名称：优优CMS.
 * 官网: www.zxyycms.com
 * 时间: 2021/03/27
 * Time: 18:45
 */
include('../admin_config/config.php');?>
<?php include(YYCMS.'/include/class/version.php');?>
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
  

<div class="layui-card " >
     <?php $newVersion = json_decode(file_get_contents(YYCMS_API.'version.php'),true); ?> 
<div class="layui-card-header">
  <i class="layui-icon layui-icon-note" style="font-size: 20px; ">优优CMS公告</i>
</div>
<div class="layui-card-body">
  <table class="layui-table">
    <colgroup>
      <col width="150">
        <col>
    </colgroup>
    <tbody>
     
       <?php echo $newVersion['shouyegonggao'] ?>
    
    </tbody>
  </table>
</div>
  
  
  
<div class="layui-card-header">
  <i class="layui-icon layui-icon-code-circle" style="font-size: 20px; ">
    站点统计
  </i>
</div>
<div class="layui-card-body">
  <div class="layui-row layui-col-space15">
    <div class="layui-col-md6">
      <div class="layui-panel ">
        <div style="padding: 25px " class="layui-bg-red">
          <i class="layui-icon layui-icon-cols" style="font-size: 20px; ">
            缓存目录：<?php echo round((directorySize(YYCMS. '/cache')/1048576),2);?>MB
          </i>
        </div>
      </div>
    </div>
    <div class="layui-col-md6">
      <div class="layui-panel">
        <div style="padding: 25px;" class="layui-bg-orange">
          <i class="layui-icon layui-icon-play" style="font-size: 20px; ">
            电影总量：<?php echo getCount( 'vod');?>部
          </i>
        </div>
      </div>
    </div>
  </div>
</div>
	
	
	<div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">  服务器信息</i></div>
	<div class="layui-card-body">
<table class="layui-table">
  <colgroup>
    <col width="150">
    <col width="200">
    <col>
  </colgroup>

  <tbody>
    <tr>
      <td>服务器时间</td>
      <td><?php echo  date("Y-m-d H-i-s");?><span style="color: #FF2805">【请注意你本地时间】</span></td>
    </tr>
        <tr>
      <td>后台版本</td>
      <td><?php echo YYCMS_VERSION;?>  <?php echo $newVersion['htversion']>YYCMS_HTVERSION?' <span style="color: #FF2805">发现新版本 <a href="htupdate.php" name="save" onclick="return confirm(\''.$newVersion['info'].'\')">点此更新</a></span>':'';?></td>
    </tr>
	<tr>
		<td>程序版本</td>
		<td><?php echo YYCMS_VERSION;?>  <?php echo $newVersion['version']>YYCMS_VERSION?' <span style="color: #FF2805">发现新版本 <a href="update.php" onclick="return confirm(\''.$newVersion['info'].'\')">点此更新</a></span>':'';?></td>
	</tr>
	<tr>
      <td>操作系统</td>
      <td><?php echo PHP_OS;?></td>
	  
    </tr>
    <tr>
      <td>服务器</td>
      <td><?php echo explode(' ',$_SERVER['SERVER_SOFTWARE'])[0];?></td>
    </tr>
	<tr>
	  <td>PHP 版本</td>
	  <td><?php echo PHP_VERSION;?></td>
	</tr>
	<tr>
	  <td>内存上限</td>
	  <td><?php echo ini_get('memory_limit');?></td>
	</tr>
	<tr>
	  <td>目录权限</td>
	  <td><?php echo substr(base_convert(fileperms(YYCMS),10,8),2,3);?></td>
	</tr>
	<tr>
	  <td>ZIP状态</td>
	  <td><?php echo in_array('zip', get_loaded_extensions())?'正常':'异常';?></td>
	</tr>
	<tr>
	  <td>磁盘剩余空间</td>
	  <td><?php echo round((disk_free_space(YYCMS)/1073741824),2);?>GB</td>
	</tr>
	<tr>
	  <td>是否开启远程URL</td>
	  <td><?php echo ini_get('allow_url_fopen')?'是':'否';?></td>
	</tr>
	<tr>
	  <td>最长执行时间</td>
	  <td><?php echo ini_get('max_execution_time');?></td>
	</tr>
  </tbody>
 </table>
</div>

</div>
          



<div class="site-mobile-shade"></div>
 


 <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/jquery.min.js"></script>
 <?php if(!file_exists(YYCMS_ROOT.'/admin_boss/core.php')){?>
     <script>alert('后台安全性能升级，请重新设置后台账号密码！');location.href='../admin_security/security_userpass.php';</script>
 <?php }?>

<?php include('../admin_config/admin_foot.php');?>
 <?php echo $newVersion['version']>YYCMS_VERSION?'
 <script> layer.open({
        type: 1,
        title: "优优CMS软件更新提示",
        closeBtn: false,
        area: "400px",
        shade: 0.8,
        btn: ["立马升级", ["暂不升级"]],
        btnAlign: "c",
        moveType: 1,
        content: "<div style=\"padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">'.$newVersion['tanchuang'].'",
        yes: function(index, layero) {
        	var btn = layero.find(".layui-layer-btn");
        	btn.find(".layui-layer-btn0").attr({
        		href: "update.php"
        	});
        	layer.close(index);
        },
        });  
        </script>':'';?>

 <?php echo $newVersion['htversion']>YYCMS_HTVERSION?'
 <script> layer.open({
        type: 1,
        title: "优优CMS后台更新",
        closeBtn: false,
        area: "400px",
        shade: 0.8,
        btn: ["立马升级", ["暂不升级"]],
        btnAlign: "c",
        moveType: 1,
        content: "<div style=\"padding: 50px; line-height: 22px; background-color: #393D49; color: #fff; font-weight: 300;\">'.$newVersion['httanchuan'].'</div>",
        yes: function(index, layero) {
        	var btn = layero.find(".layui-layer-btn");
        	btn.find(".layui-layer-btn0").attr({
        		href: "htupdate.php"
        	});
        	layer.close(index);
        },
        });  
        </script>':'';?>
</div>
</body>
</html>
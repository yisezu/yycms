<?php
/**
 * 名称：优优CMS.
 * 官网: www.zxyycms.com
 * 时间: 2021/03/27
 * Time: 18:45
 */
include('../admin_config/config.php');
error_reporting(E_ALL^E_NOTICE^E_WARNING);
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
		        <div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">插件在线安装</i></div>
		      <div style="padding: 30px;">
			<div class="m"><blockquote class="layui-elem-quote">请按住表格往左滑动</blockquote></div>
			<div  class="layui-colla-content1 show1">
    		  <table class="layui-table">	
		    <thead>
		      <tr>
		        <th>插件标识</th>
		        <th>插件名称</th>
		        <th>插件功能</th>
				<th>插件版本-作者</th>
				<th>插件操作</th>
		      </tr> 
		    </thead>
		    <tbody>
				<?php
				$onlinePlug = json_decode(file_get_contents(YYCMS_API.'cj.php'),true);
				$filesnames = scandir(YYCMS_PLUG);
				foreach ($onlinePlug as $key => $item) {
				        ?>
		      <tr>
		              <td><a href="<?php echo $item['site'];?>"><?php echo $item['appid'];?></a></td>
		              <td><?php echo $item['appname'];?></td>
		              <td><?php echo $item['description'];?></td>
		              <td><?php echo $item['version'];?>版本-<?php echo $item['author'];?></td>
					  <td>
					              <!--已安装-->
					              <?php if(in_array($key,$filesnames)){?>
					                  <?php $json = json_decode(file_get_contents(YYCMS_PLUG.$key.'/manifest.json'),true);?>
					                  <?php if($json['version']<$item['version']){var_dump(file_get_contents(YYCMS_PLUG.$key.'/manifest.json'));?>
					                      <a href="<?php echo './update.php?plug='.$key;?>"> 更新</a>
					                  <?php }else{?>
					                      <a href="javascript:;" > 已安装&nbsp;</a>
					                  <?php }?>
					              <?php }else{?>
					                  <!--未安装-->
					                  <a href="<?php echo './install.php?plug='.$key;?>"> 安装</a>
					              <?php }?>
					              <a href="<?php echo $item['site'];?>" target="_blank" > 详细说明</a>
					   </td>
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
  </div>
				<?php include('../admin_config/admin_foot.php');?>
    </div>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/amazeui.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/iscroll.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/app.js"></script>
  </body>
</html>
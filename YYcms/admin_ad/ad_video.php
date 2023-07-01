<?php 
/**
 * 名称：优优CMS.
 * 官网: www.zxyycms.com
 * 时间: 2021/03/27
 * Time: 18:45
 */
include('../admin_config/config.php');?>
<?php include('../../include/common.php');?>
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
		        <div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">播放横幅广告</i></div>
		      <div style="padding: 30px;">
		          
		     <a href="ad_video_add.php"><button type="button" class="layui-btn layui-btn-primary layui-border-green"><span class="am-icon-plus"></span> 新增</button></a>
			<br/>
			<div class="m"><blockquote class="layui-elem-quote">请按住表格往左滑动</blockquote></div>
			<div  class="layui-colla-content1 show1">
			    
    		  <table class="layui-table">		
			  <thead>
			    <tr>
			      <th>排序</th>
			      <th>标题</th>
			      <th>广告链接</th>
				  <th>广告图片</th>
				  <th>到期时间</th>
				  <th>状态</th>
				  <th>操作</th>
			    </tr> 
			  </thead>
			  <tbody>							
			  <?php
			  $ad_top_json_url=YYCMS_ROOT."ad/ad_video/ad.json";
			  $json = json_decode(file_get_contents($ad_top_json_url),true);
			  if(isset($_GET['id'])){
			      unset($json[$_GET['id']]);
			      file_put_contents($ad_top_json_url,json_encode($json));
			      exit('<script>layer.msg("删除成功！");location.href="ad_video.php";</script>');
			  }
			  $json = jsonsort($json);
			  foreach($json as $key => $item) {
			      ?>
			        <tr>
			            <td><?php echo $item['sort']?></td>
			            <td><?php echo $item['title']?></td>
			            <td ><?php echo $item['url']?></td>
			            <td ><img src="<?php echo $item['pic']?>" height="30"></td>
			            <td ><?php echo date('Y-m-d',$item['endtime'])?></td>
			        	<td  ><?php echo $item['endtime']>time()?'正常':'已过期';?></td>
			            <td> 
			                  <a href="ad_video_mod.php?id=<?php echo $item['id'];?>" > 编辑</a>
			                  <a href="?id=<?php echo $item['id'];?>" > 删除</a>
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
		  
				<?php include('../admin_config/admin_foot.php');?>
    </div>

    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/amazeui.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/iscroll.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/app.js"></script>
  </body>

</html>
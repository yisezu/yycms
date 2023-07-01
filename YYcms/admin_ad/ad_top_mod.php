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
		$ad_top_json_url=YYCMS_ROOT."ad/ad_top/ad.json";
		$json = json_decode(file_get_contents($ad_top_json_url),true);
		if(isset($_POST['title'])){
		    $data = $_POST;
		    $data['endtime'] = strtotime($data['endtime']);
		    $key = $_GET['id'];
		    $data['id'] = $key;
		    $json[$key] = $data;
		    file_put_contents($ad_top_json_url,json_encode($json));
		    exit('<script>layer.msg("恭喜修改成功");location.href="ad_top.php";</script>');
		}
		$tmp = $json[$_GET['id']];
		?>
		<form method="post"  class="layui-form">
		    <div class="layui-form-item">
		      <label class="layui-form-label">排序</label>
		      <div class="layui-input-block">
		        <input type="text" name="sort" required  lay-verify="required" placeholder="排序" autocomplete="off" class="layui-input" value="<?php echo $tmp['sort'];?>">
				
		      </div>
		    </div>
		    <div class="layui-form-item">
		      <label class="layui-form-label">广告标题</label>
		      <div class="layui-input-block">
		        <input type="text" name="title" required  lay-verify="required" value="<?php echo $tmp['title'];?>" placeholder="请输入广告标题" autocomplete="off" class="layui-input">
				<div>广告名称</div>
		      </div>
		    </div>
			<div class="layui-form-item">
			  <label class="layui-form-label">广告链接</label>
			  <div class="layui-input-block">
			    <input type="text" name="url" required  lay-verify="required" value="<?php echo $tmp['url'];?>" placeholder="请输入URL" autocomplete="off" class="layui-input">
				<div>点击广告后跳转地址</div>
			  </div>
			</div>
			<div class="layui-form-item">
			  <label class="layui-form-label">广告图片</label>
			  <div class="layui-input-block">
			    <input type="text" name="pic" required  lay-verify="required" value="<?php echo $tmp['pic'];?>" placeholder="请输入广告图片" autocomplete="off" class="layui-input">
				<div>电脑端或者自适应广告图</div>
			  </div>
			</div>
			<div class="layui-form-item">
			  <label class="layui-form-label">手机图片</label>
			  <div class="layui-input-block">
			    <input type="text" name="pic_wap" required  lay-verify="required" value="<?php echo $tmp['pic_wap'];?>" placeholder="请输入wap广告图片" autocomplete="off" class="layui-input">
				<div>手机端显示图片</div>
			  </div>
			</div>
			<div class="layui-form-item">
			  <label class="layui-form-label">到期时间</label>
			  <div class="layui-input-block">
			    
				<input type="text" name="endtime" class="layui-input" id="endtime" value="<?php echo date('Y-m-d',$tmp['endtime']);?>" placeholder="请输入时间" autocomplete="off">
				格式：2020-20-20
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
		  <script>
		  layui.use('laydate', function(){
		    var laydate = layui.laydate;
		    
		    //执行一个laydate实例
		    laydate.render({
		      elem: '#endtime' //指定元素
		    });
		  });
			</script>
    </div>
	
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/amazeui.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/iscroll.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/app.js"></script>
  </body>

</html>
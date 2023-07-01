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
		        <div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">站群管理</i></div>
		      <div style="padding: 30px;">
			<form method="post" action="">
			    <input type="hidden" name="import" value="">
			<a href="SiteGroup_add.php"><button type="button" class="layui-btn layui-btn-primary layui-border-green"><span class="am-icon-plus"></span> 添加域名</button></a>
			
			<a href=""><button type="button" class="layui-btn layui-btn-primary layui-border-green" style="position: relative;overflow: hidden"><span class="am-icon-upload"></span> 导入<input type="file" id="list" style="position: absolute;top: 0;left: 0;height: 100%;width: 100%;z-index: 999;opacity: 0" onclick="return confirm('导入将会直接覆盖原数据，是否导入？');"></button></a>
			
			    <a href="../../config/qita/site_group.json" download="site_group.json"><button type="button" class="layui-btn layui-btn-primary layui-border-green"><span class="am-icon-download"></span> 导出</button></a>
			    <a href="https://tools.zxyycms.com/" target="_blank"><button type="button" class="layui-btn layui-btn-primary layui-border-green"><span class="am-icon-plus"></span> 工具箱</button></a>
				
			</form>
			<br/>
			<div class="m"><blockquote class="layui-elem-quote">请按住表格往左滑动</blockquote></div>
			<div  class="layui-colla-content1 show1">
			    
    		  <table class="layui-table">
    		 
    		    <thead>
    		      <tr>
    		          <th>域名</th>
    		          <th>名称</th>
    		          <th>电脑模板</th>
    		          <th>手机模板</th>
    		          <th>广告邮箱</th>
    		          <th>网站LOGO</th>
    		          <th>操作</th>
    		      </tr>
    		    </thead>
    		    <tbody>
    		    <?php
    		    
    		    $siteGroup_config = YYCMS_ROOT . 'qita/site_group.json';
    		    error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
    		    header("Content-type: text/html; charset=utf-8");
    		    $json = json_decode(file_get_contents($siteGroup_config), true);
    		    //执行删除
    		    if(isset($_GET['id'])){
    		        unset($json[$_GET['id']]);
    		        file_put_contents($siteGroup_config,json_encode($json));
    		        exit('<script>layer.msg("删除成功");window.setTimeout(function () {window.location.reload(history.go(-1));},2000);</script>');
    		    }
    		    if(isset($_POST['import'])){
    		        $import = $_POST['import'];
    		        if(json_decode($import,true)!=null){
    		            file_put_contents($siteGroup_config,$import);
    		            exit('<script>layer.msg("导入成功");location.href="./SiteGroup_list.php";</script>');
    		        }else{
    		            exit('<script>layer.msg("导入格式或编码不正确！");location.href="./SiteGroup_list.php";</script>');
    		        }
    		    
    		    }
    		    foreach ($json as $key => $item) {
    		        ?>
    		        <tr>
    		            <td><?php echo $item['domains'][0] ?></td>
    		            <td><?php echo $item['title']; ?></td>
    		            <td><?php echo $item['moban_pc']; ?></td>
    		            <td><?php echo $item['moban_wap']; ?></td>
    		            <td><?php echo $item['email']; ?></td>
    		            <td><img src="<?php echo $item['logo']; ?>" height="30"></td>
    		            <td><a href="SiteGroup_edit.php?id=<?php echo $key; ?>" >修改</a><a href="?id=<?php echo $key; ?>" onclick="return confirm('确定要删除吗？')" > 删除</a></td>
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
<script>
$('#list').on('change',function () {
    var file = document.querySelector('#list').files[0];
    var filereader = new FileReader();
    filereader.readAsText(file,'utf-8');
    filereader.onloadend = function (ev) {
        document.querySelector('input[name=import]').value = ev.target.result;
        document.forms[0].submit();
    }
})
</script>		
  </body>

</html>
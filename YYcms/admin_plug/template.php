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
		        <div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">模板在线安装</i></div>
		      <div style="padding: 30px;">
 

    <div class="layui-tab-content">
<div class="layui-row layui-col-space5">
    
			  <?php
			  $page=$_GET['page'];
			  $onlineTpl = json_decode(file_get_contents(YYCMS_API.'mb.php?page='.$page),true);
$total=$onlineTpl['total'];
$date = $onlineTpl['list'];
$filesnames = scandir(YYCMS_TPL);
foreach ($date as $key => $item1) {
			 $key = $item1['id'];
		
			  ?>
<div class="layui-col-xs6 layui-col-sm6 layui-col-md3">
<div class="grid-demo">

		        		      <img src="<?php echo $item1['img'];?>"  alt="优优 CMS" class="layui-upload-img align" onclick="previewImg(this)"/>
							  <h2><?php echo $item1['name'];?></h2>
							  <!--已安装-->
							  <?php if(in_array($key,$filesnames)){?>
							      <a href="<?php echo './uninstall.php?tpl='.$key;?>" class="layui-btn layui-btn-sm  layui-btn-normal" onclick="return confirm('是否要卸载此模板?')" ><span class="am-icon-unlink"></span> 卸载&nbsp;</a>
							  <?php }else{?>
							      <!--未安装-->
							      <a href="<?php echo './install.php?tpl='.$key;?>" class="layui-btn layui-btn-sm  layui-btn-normal" ><span class="am-icon-link"></span> 安装</a>
							  <?php }?>
							  <a href="<?php echo $item1['ysz'];?>" class="layui-btn layui-btn-sm  layui-btn-normal" target="_blank" ><span class="am-icon-cube"></span> 模板演示</a>
		        		</div>	</div>
			<?php }
			echo '<div class="layui-col-md12">';
			foreach ($total as  $fy) {
			
			?>
			<a href="template.php?page=<?php echo $fy['id'];?>" class="layui-btn">&laquo; 第<?php echo $fy['id'];?>页 &raquo;</a>
			<?php }?>
			</div>
		  </div>
		      
		        </div>
		        
		        
	  </div>
	  
	  
      

    </div>
  </div>
  
				<?php include('../admin_config/admin_foot.php');?>
    </div>
	  <script>

   function previewImg(obj) {
        var img = new Image();
        img.src = obj.src;
        var height=img.height,width=img.width;
        if(img.height > 800) {
            height = '800px';
            width=(800/(img.height))*(img.width);
        }
        var imgHtml = "<img src='" + obj.src + "' height='"+height+"' width='"+width+"' />";
        layer.open({
            type: 1,
            offset: 'auto',
            area: [width,'auto'],
            shadeClose:true,
            scrollbar: false,
            title: "图片预览", 
            content: imgHtml, 
            cancel: function () {
               
            }
        });
    }
</script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/jquery.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/amazeui.min.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/iscroll.js"></script>
    <script src="<?php echo YYCMS_ADMIN_url;?>assets/js/app.js"></script>
  </body>

</html>
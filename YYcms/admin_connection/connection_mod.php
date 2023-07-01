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
			        <div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">友情链接修改</i></div>
			      <div style="padding: 30px;">
                <?php
                $linkfile = YYCMS_ROOT."connection/connection.json";
                $json = json_decode(file_get_contents($linkfile),true);
                if(isset($_POST['title'])){
                
                    $data = $_POST;
                    $key = $_GET['id'];
                    $data['id'] = $key;
                    $json[$key] = $data;
                    file_put_contents($linkfile,json_encode($json));
                    exit('<script>layer.msg("修改成功！");location.href="connection.php";</script>');
                }
                $tmp = $json[$_GET['id']];
                ?>         
                <div class="tpl-block ">

                    <div class="am-g tpl-amazeui-form">


                        <div class="am-u-sm-12 am-u-md-9">
                            <form method="post"  class="layui-form">
                            	<input type="hidden" name="ad_top_id"  value="<?php echo  $ad_top_id;?>" />
                                
                            	
                                <div class="layui-form-item">
                                  <label class="layui-form-label">排序</label>
                                  <div class="layui-input-block">
                                    <input type="text" name="sort" required  lay-verify="required" value="<?php echo  $tmp['sort'];?>" placeholder="请输入URL" autocomplete="off" class="layui-input">
                                  </div>
                                </div>
                            	
                            	<div class="layui-form-item">
                            	  <label class="layui-form-label">友链标题</label>
                            	  <div class="layui-input-block">
                            	    <input type="text" name="title" required  lay-verify="required" value="<?php echo  $tmp['title'];?>" placeholder="请输入友链标题" autocomplete="off" class="layui-input">
                            	  </div>
                            	</div>
                            	
                            	<div class="layui-form-item">
                            	  <label class="layui-form-label">友链地址</label>
                            	  <div class="layui-input-block">
                            	    <input type="text" name="url" required  lay-verify="required" value="<?php echo  $tmp['url'];?>" placeholder="请输入友链地址URL" autocomplete="off" class="layui-input">
                            		
                            	  </div>
                            	</div>
                            	
                            	<div class="layui-form-item">
                            	  <label class="layui-form-label">备注</label>
                            	  <div class="layui-input-block">
                            	    <input type="text" name="remark" required  lay-verify="required" value="<?php echo  $tmp['remark'];?>" placeholder="如12/8~1/8广告费100元" autocomplete="off" class="layui-input">
                            	  </div>
                            	</div>
                            	
                                <div class="layui-form-item">
                                  <div class="layui-input-block">
                                    <button class="layui-btn"  name="submit" type="submit" lay-submit lay-filter="formDemo">立即提交</button>
                            		
                                  </div>
                                </div>
					  </form>
					  
				  </div>
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
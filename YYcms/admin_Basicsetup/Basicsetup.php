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
  <!--优优CMS-->
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
		        <div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">基本设置</i></div>
		      <div style="padding: 30px;">
				  <?php
				  $_config_file = YYCMS_ROOT."Basicsetup/site_config.json";
				  error_reporting(E_ALL^E_NOTICE^E_WARNING);
				  header("Content-type: text/html; charset=utf-8");
				  $json = json_decode(file_get_contents($_config_file),true);
				  if(isset($_POST['moban_pc'])){
				      file_put_contents($_config_file,json_encode($_POST));
				      exit('<script>alert("修改成功！");history.go(-1);</script>');
				  }
				  ?>	
				<form method="post">
				    
				    <div class="layui-form-item">
				      <label class="layui-form-label">网站名称</label>
				      <div class="layui-input-block">
				        <input type="text" name="title" required  lay-verify="required" placeholder="请输入网站名称" autocomplete="off" class="layui-input" value="<?php echo $json['title'];?>">
				      </div>
				    </div>
				    
				    <div class="layui-form-item">
				      <label class="layui-form-label">关键字</label>
				      <div class="layui-input-block">
				        <input type="text" name="keywords" required  lay-verify="required" value="<?php echo $json['keywords'];?>" placeholder="请输入关键字" autocomplete="off" class="layui-input">
                      </div>
				    </div>
				    
					<div class="layui-form-item">
					  <label class="layui-form-label">关键描述</label>
					  <div class="layui-input-block">
					    <input type="text" name="description" required  lay-verify="required" value="<?php echo $json['description'];?>" placeholder="请输入关键描述" autocomplete="off" class="layui-input">
					  </div>
					</div>
					
					<div class="layui-form-item">
					  <label class="layui-form-label">LOGO</label>
					  <div class="layui-input-block">
					    <input type="text" name="logo" value="<?php echo $json['logo'];?>" required  lay-verify="required" value="<?php echo $json['description'];?>" placeholder="请输入网站logoURL" autocomplete="off" class="layui-input">
					  </div>
					</div>
					
					<div class="layui-form-item">
					  <label class="layui-form-label">邮箱</label>
					  <div class="layui-input-block">
						<input type="email" name="email" required  lay-verify="required" value="<?php echo $json['email'];?>" placeholder="请输入邮箱地址" autocomplete="off" class="layui-input">
					  </div>
					</div>
					
				<div class="layui-form"> 
				
					<div class="layui-form-item">
					  <label class="layui-form-label">PC模板</label>
					  <div class="layui-input-block">
					    <select name="moban_pc" lay-verify="required">
							<option value="<?php echo $json['moban_pc'];?>">目前模板：<?php echo $json['moban_pc'];?></option>
					      <?php
					      $filesnames = scandir("../../template/");
					      foreach ($filesnames as $name) {
					          if(strpos($name,'.') !==false || strpos($name,'-') !==false ){
					          }else{
					              echo	'<option value="'.$name.'">'.$name.'</option>';
					          }
					      }
					      ?>
					    </select>		
					  </div>
					</div>
					
					<div class="layui-form-item">
					  <label class="layui-form-label">WAP模板</label>
					  <div class="layui-input-block">
					    <select name="moban_wap" lay-verify="required">
						  <option value="<?php echo $json['moban_wap'];?>">目前模板：<?php echo $json['moban_wap'];?></option>
					      <?php
					      $filesnames = scandir("../../template/");
					      foreach ($filesnames as $name) {
					          if(strpos($name,'.') !==false || strpos($name,'-') !==false ){
					          }else{
					              echo	'<option value="'.$name.'">'.$name.'</option>';
					          }
					      }
					      ?>
					    </select>
					  </div>
					</div>
					
				</div>
				
				    <div class="layui-form-item layui-form-text">
				      <label class="layui-form-label">自定义head</label>
				      <div class="layui-input-block">
				        <textarea name="head" placeholder="请输入head代码" class="layui-textarea"><?php echo $json['head'];?></textarea>
				      </div>
				    </div>
				    
					<div class="layui-form-item layui-form-text">
					  <label class="layui-form-label">自定义foot</label>
					  <div class="layui-input-block">
					    <textarea name="foot" placeholder="请输入foot代码" class="layui-textarea"><?php echo $json['foot'];?></textarea>
					   </div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">自定义接口</label>
						  <div class="layui-input-block">
							<input type="text" name="jxurl_jk" required  lay-verify="required" value="<?php echo $json['jxurl_jk'];?>" placeholder="请输入自定义解析接口" autocomplete="off" class="layui-input">
						  </div>
					</div>
					
				    <div class="layui-form-item">
				      <div class="layui-input-block">
				        <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
				      </div>
				    </div>
				    
				  </form>
				  
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
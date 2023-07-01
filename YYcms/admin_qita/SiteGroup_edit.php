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
  
<body >
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
        <div style="padding: 30px;">
        <?php
        $site_config = json_decode(file_get_contents(YYCMS_ROOT.'Basicsetup/site_config.json'),true);
        $links_config = json_decode(file_get_contents(YYCMS_ROOT.'connection/connection.json'),true);
        $siteGroup_config = YYCMS_ROOT.'qita/site_group.json';
        $json = json_decode(file_get_contents($siteGroup_config),true);
        if(isset($_POST['domains'])){
            $data = $_POST;
            $data['domains'] = explode('|',$data['domains']);
            $data['video'] = explode(',',$data['video']);
            $data['links'] = explode(',',$data['links']);
            $key = $_GET['id'];
            $data['id'] = $key;
            $json[$key] = $data;
            file_put_contents($siteGroup_config,json_encode($json));
            exit('<script>layer.msg("恭喜修改成功");location.href="SiteGroup_list.php";</script>');
        }
        $tmp = $json[$_GET['id']];
        ?>
		<form method="post"  >
			<div class="layui-form-item">
			<label class="layui-form-label">首页推荐 </label>
			<div class="layui-input-block">
			    <input type="hidden" name="video">
			    <div class=" videos">
			        <?php
			        foreach ($tmp['video'] as $vid){
			            foreach ($yycms_menu['vod'] as $vod){
			                if($vod['id']==$vid){
			                    echo '<span data="'.$vid.'" class="cid'.$vid.'">'.$vod['name'].'</span>';
			                }
			            }
			        }
			        ?>
			    </div>
			        <?php
			        foreach ($yycms_menu['vod'] as $vod){
			            ?>
			            <div style="display: inline-block">
			                <input type="checkbox" class="checkbox-videos" id="<?php echo $vod['id'];?>" value="<?php echo $vod['id'];?>" <?php echo in_array($vod['id'],$tmp['video'])?'checked':'';?>><label for="<?php echo $vod['id'];?>"><?php echo $vod["name"];?></label>
			            </div>
			            <?php
			        }
			        ?>
			</div>
			</div>
			<div class="layui-form-item">
			<label class="layui-form-label">友情链接 </label>
			<div class="layui-input-block">
			    <input type="hidden" name="links">
			    <div class="links">
			        <?php
			        foreach ($tmp['links'] as $vid){
			            foreach ($links_config as $link){
			                if($link['id']==$vid){
			                    echo '<span data="'.$vid.'" class="cid'.$vid.'">'.$link['title'].'</span>';
			                }
			            }
			        }
			        ?>
			    </div>
			        <?php
			        foreach ($links_config as $link){
			            ?>
			            <div style="display: inline-block">
			                <input type="checkbox" class="checkbox-links" id="<?php echo $link['id'];?>" value="<?php echo $link['id'];?>" <?php echo in_array($link['id'],$tmp['links'])?'checked':'';?>><label for="<?php echo $link['id'];?>"><?php echo $link["title"];?></label>
			            </div>
			            <?php
			        }
			        ?>
			</div>
			</div>
			<div class="layui-form">
		    <div class="layui-form-item">
		      <label class="layui-form-label">域名</label>
		      <div class="layui-input-block">
				<input type="text" name="domains" required  lay-verify="required" placeholder="网站域名不带前缀如www.baidu.com填写baidu.com即可,多个域名用|分隔" autocomplete="off" class="layui-input" value="<?php echo implode('|',$tmp['domains']);?>">
		      </div>
		    </div>
		    <div class="layui-form-item">
		      <label class="layui-form-label">名称</label>
		      <div class="layui-input-block">
		        <input type="text" name="title" required  lay-verify="required" value="<?php echo $tmp['title'];?>" placeholder="请输入网站名称" autocomplete="off" class="layui-input">
		      </div>
		    </div>
			<div class="layui-form-item">
			  <label class="layui-form-label">关键字</label>
			  <div class="layui-input-block">
			    <input type="text" name="keywords" required  lay-verify="required" value="<?php echo $tmp['keywords'];?>" placeholder="请输入关键字" autocomplete="off" class="layui-input">
				    <a href="javascript:;" class="layui-btn layui-btn-normal"  onclick="document.querySelector('input[name=keywords]').value=getKeywords();">
				        <bas class="am-btn am-btn-primary">自动生成</bas>
				    </a>
			  </div>
			</div>
			<div class="layui-form-item">
			  <label class="layui-form-label">描述</label>
			  <div class="layui-input-block">
			    <input type="text" name="description" value="<?php echo $tmp['description'];?>" required  lay-verify="required"  placeholder="请输入关键描述" autocomplete="off" class="layui-input">
			  </div>
			</div>
			
			
			<div class="layui-form-item">
			  <label class="layui-form-label">PC模板</label>
			  <div class="layui-input-block">
			    <select name="moban_pc" >
			    <option value="<?php echo $tmp['moban_pc'];?>">目前模板：<?php echo $tmp['moban_pc'];?></option>
			    <?php 
			      $filesnames = scandir("../../template/");
			    	$bakpc = array();
			    foreach ($filesnames as $name) {
			    	 if(strpos($name,'.') !==false || strpos($name,'-') !==false ){
			    	}else{
			    		$bakpc[] =$name;
			    	}
			    }
			    		$pcsuiji=array_rand($bakpc);
			    		$pcsuiji=$bakpc[$pcsuiji];
			    		 
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
			    <select name="moban_wap"  >
			    <option value="<?php echo $tmp['moban_wap'];?>">目前模板：<?php echo $tmp['moban_wap'];?></option>
			    <?php 
			    		$mosuiji=array_rand($bakpc);
			    		$mosuiji=$bakpc[$mosuiji];
			    		 
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
		    <div class="layui-form-item layui-form-text">
		      <label class="layui-form-label">logo链接</label>
		      <div class="layui-input-block">
				<input type="text" name="logo" value="<?php echo $tmp['logo'];?>" required  lay-verify="required"  placeholder="请输入网站logoURL" autocomplete="off" class="layui-input">
		      </div>
		    </div>
			<div class="layui-form-item layui-form-text">
			  <label class="layui-form-label">邮箱</label>
			  <div class="layui-input-block">
				<input type="email" name="email" value="<?php echo $tmp['email'];?>" required  lay-verify="required"  placeholder="请输入广告邮箱" autocomplete="off" class="layui-input">
			</div>
			</div>
		    <div class="layui-form-item">
		      <div class="layui-input-block">
		        <button class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
		      </div>
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
    <script>
        window.onload=function(){
            $('.checkbox-videos').on('change',function (e) {
                if (this.checked){
                    $('.videos').append('<span data="'+this.value+'" class="cid'+this.value+'">'+$(this).next().text()+'</span>');
                }else{
                    $('.videos .cid'+this.value).remove();
                }
            });
            $('.checkbox-links').on('change',function (e) {
                if (this.checked){
                    $('.links').append('<span data="'+this.value+'" class="cid'+this.value+'">'+$(this).next().text()+'</span>');
                }else{
                    $('.links .cid'+this.value).remove();
                }
            });
            $('.selectAll').on('change',function (e) {
                if(this.checked){
                    $('.checkbox-links:not(:checked)').click();
                }else{
                    $('.checkbox-links:checked').click();
                }
            });
        }
        document.forms[0].onsubmit = function () {
            var videoArr = [];
            $('.videos span').each(function () {
                videoArr.push($(this).attr('data'));
            });
            $('input[name=video]').val(videoArr.join(','));

            var linkArr = [];
            $('.links span').each(function () {
                linkArr.push($(this).attr('data'));
            });
            $('input[name=links]').val(linkArr.join(','));
            return true;
        }
    </script>
  </body>

</html>
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
		        <div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">高级设置</i></div>
		      <div style="padding: 30px;">
  <?php
      $data=file_get_contents(YYCMS_ROOT."Basicsetup/Advanced.json");
      error_reporting(E_ALL^E_NOTICE^E_WARNING);
      header("Content-type: text/html; charset=utf-8");
      $data = json_decode($data,true);
	  $yycms_jk=$date['1'];
      ?>
    <form method="post"  >
              <div class="layui-form-item">
		      <label class="layui-form-label">首页推荐 </label>
			  <div class="layui-input-block">
		          <input type="hidden" name="video">
		          <div class=" videos">
		              <?php
		              foreach ($data['video'] as $vid){
		                  foreach ($yycms_menu['vod'] as $vod){
		                      if($vod['id']==$vid){
		                          echo '<span  data="'.$vid.'" class="cid'.$vid.'">'.$vod['name'].'</span>';
		                      }
		                  }
		              }
		              ?>
		          </div>
		              <?php
		              foreach ($yycms_menu['vod'] as $vod){
		                  ?>
		                  <div style="display: inline-block">
		                  <input type="checkbox" class="checkbox-videos" id="<?php echo $vod['id'];?>" value="<?php echo $vod['id'];?>" <?php echo in_array($vod['id'],$data['video'])?'checked':'';?>><label for="<?php echo $vod['id'];?>"><?php echo $vod["name"];?></label>
		                  </div>
		                  <?php
		              }
		              ?>
		      </div>
			  </div>
		<div class="layui-form">  
	      <div class="layui-form-item">
	  	    <label class="layui-form-label">静态缓存</label>
	  	    <div class="layui-input-block">
	  	      <select name="cache_html" >
	  	          <option value="1" <?php echo '1'==$data['cache_html']?'selected':'';?>>打开</option>
	  	          <option value="0" <?php echo '0'==$data['cache_html']?'selected':'';?>>关闭</option>
	  	      </select>
	  	    </div>
	  	  </div>
	  	  <div class="layui-form-item">
	  	    <label class="layui-form-label">首页随机</label>
	  	    <div class="layui-input-block">
	  	      <select name="live_status" >
	  	          <option value="1" <?php echo '1'==$data['live_status']?'selected':'';?>>打开</option>
	  	          <option value="0" <?php echo '0'==$data['live_status']?'selected':'';?>>关闭</option>
	  	      </select>
	  	    </div>
	  	  </div>
		  <div class="layui-form-item">
		  	    <label class="layui-form-label">静态缓存</label>
		  	    <div class="layui-input-block">
		  	      <select name="cache_time" >
		  	          <option value="600" <?php echo '600'==$data['cache_time']?'selected':'';?>>十分钟</option>
		  	          <option value="900" <?php echo '900'==$data['cache_time']?'selected':'';?>>十五分钟</option>
		  	          <option value="1800" <?php echo '1800'==$data['cache_time']?'selected':'';?>>半个小时</option>
		  	          <option value="3600" <?php echo '3600'==$data['cache_time']?'selected':'';?>>一个小时</option>
		  	          <option value="7200" <?php echo '7200'==$data['cache_time']?'selected':'';?>>两个小时</option>
		  	          <option value="2147483647" <?php echo '2147483647'==$data['cache_time']?'selected':'';?>>手动清除</option>
		  	      </select>
		  	    </div>
		  	  </div>
	    <div class="layui-form-item">
	    	    <label class="layui-form-label">伪静态开关</label>
	    	    <div class="layui-input-block">
	    	      <select name="url_rewrite" >
	    	          <option value="1" <?php echo '1'==$data['url_rewrite']?'selected':'';?>>打开</option>
	    	          <option value="0" <?php echo '0'==$data['url_rewrite']?'selected':'';?>>关闭</option>
	    	      </select>
	    	    </div>
	    	  </div>
			  <div class="layui-form-item">
			  	    <label class="layui-form-label">URL分隔符</label>
			  	    <div class="layui-input-block">
			  	      <select name="url_split" >
			  	          <option value="/" <?php echo $data['url_split']=='/'?'selected':'';?>>斜  杠( / )</option>
			  	          <option value="-" <?php echo $data['url_split']=='-'?'selected':'';?>>减  号( - )</option>
			  	          <option value="_" <?php echo $data['url_split']=='_'?'selected':'';?>>下划线( _ )</option>
			  	      </select>
			  	    </div>
			  	  </div>
				  <div class="layui-form-item">
				    <label class="layui-form-label">URL后缀</label>
				    <div class="layui-input-block">
				  	<input type="text" name="url_file" required  lay-verify="required" value="<?php echo $data['url_file'];?>" placeholder="请输入后缀" autocomplete="off" class="layui-input">
					
				    </div>
				  </div>
	        <div class="layui-form-item">
	        	    <label class="layui-form-label">播放器</label>
	        	    <div class="layui-input-block">
	        	      <select name="player">
	        	          <option value="dplayer" <?php echo 'dplayer'==$data['player']?'selected':'';?>>dplayer</option>
						  <option value="jxurl" <?php echo 'jxurl'==$data['player']?'selected':'';?>>自定义解析接口</option>
	        	      </select>
	        	    </div>
	        </div>
			<div class="layui-form-item">
                <div class="layui-input-block">
                  <button type="name" name="submit" class="layui-btn" lay-submit lay-filter="formDemo">立即提交</button>
        		  
                </div>
              </div>
              </div>
    </form>
  </div>
      </div>   
    </div>
	
   
<?php

if (isset($_POST['submit'])) {
    function post_input($data){$data = stripslashes($data);$data = htmlspecialchars($data);return $data;}
    $rdata = [
        'video'=>['5'],
        'live'=>'25',
        'live_status'=>'1',
        'live_cn_status'=>'1',
        'cache_html'=>'0',
        'cache_time'=>'7200',
        'url_rewrite'=>'0',
        'url_split'=>'-',
        'url_file'=>'html'
    ];
    $rdata['video']=explode(',',$_POST['video']);
    post_input($_POST['live'])!=''&&$rdata['live']=post_input($_POST['live']);
    post_input($_POST['live_status'])!=''&&$rdata['live_status']=post_input($_POST['live_status']);
    post_input($_POST['live_cn_status'])!=''&&$rdata['live_cn_status']=post_input($_POST['live_cn_status']);
    post_input($_POST['cache_html'])!=''&&$rdata['cache_html']=post_input($_POST['cache_html']);
    post_input($_POST['cache_time'])!=''&&$rdata['cache_time']=post_input($_POST['cache_time']);
    post_input($_POST['url_rewrite'])!=''&&$rdata['url_rewrite']=post_input($_POST['url_rewrite']);
    post_input($_POST['url_split'])!=''&&$rdata['url_split']=post_input($_POST['url_split']);
	post_input($_POST['player'])!=''&&$rdata['player']=post_input($_POST['player']);
    post_input($_POST['url_file'])!=''&&$rdata['url_file']=post_input($_POST['url_file']);
    post_input($_POST['user_status'])!=''&&$rdata['user_status']=post_input($_POST['user_status']);
    post_input($_POST['buycard_url'])!=''&&$rdata['buycard_url']=post_input($_POST['buycard_url']);
    file_put_contents(YYCMS_ROOT."Basicsetup/Advanced.json",json_encode($rdata));
    ?>
    <script language="javascript">
        layer.msg('恭喜修改成功！');
        location.href = './Advanced.php';
    </script>
    <?php
}
?>
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
                $('.cid'+this.value).remove();
            }
        })
    }
    document.forms[0].onsubmit = function () {
        var arr = [];
        $('.videos span').each(function () {
            arr.push($(this).attr('data'));
        });
        $('input[name=video]').val(arr.join(','));
        return true;
    }
</script>

</body>

</html>
<?php
$ad_top_json_url=plugDB('index.json');
require_once('../../class/class_txttest.php');
$txt = new  TxtDB($ad_top_json_url);
if ( isset($_POST['web_title']) && isset($_POST['web_path'])  && isset($_POST['web_url'])) {
function post_input($data){$data = stripslashes($data);$data = htmlspecialchars($data);return $data;}

$cms_title = post_input($_POST["web_title"]);
$web_path = post_input($_POST["web_path"]);
$web_url = post_input($_POST["web_url"]);
$web_type = post_input($_POST["web_type"]);

if ($cms_title ==null) { echo'<script language="javascript">alert("标题不可为空");history.go(-1) </script>';exit();}
if ($web_path ==null) { echo'<script language="javascript">alert("视频不可为空"); history.go(-1)</script>';exit();}
if ($web_url ==null) { echo'<script language="javascript">alert("跳转链接不可为空"); history.go(-1)</script>';exit();}

$bankinfo["ad_top_id"] = $_GET['id'];
$bankinfo["ad_top_url"] = $web_type."$$".$cms_title;
$bankinfo["ad_top_pic"] = $web_path;
$bankinfo["ad_top_md"] = $web_url;

$txt::alter($bankinfo); //改
?>
<script src="../../../assets/layui.js" charset="utf-8"></script>
<script>
layer.msg('恭喜修改成功'); 
window.location.href=window.location.href;
</script>
<?php
}
?>
               <div class="layui-row layui-col-space15">
                <div class="layui-col-md">
                    <div class="layui-panel">
                        <div style="padding: 30px;">
                            <div class="layui-card-header"><i class="layui-icon layui-icon-form"></i>播放器广告插件-修改</div>
                            <div class="tpl-portlet-components">
            <?php
            $ad_top_json_url=plugDB('index.json');
            error_reporting(E_ALL^E_NOTICE^E_WARNING);
            header("Content-type: text/html; charset=utf-8");
            require_once('../../class/class_txttest.php');
            $txt = new  TxtDB($ad_top_json_url);
            $bankinfo = array();
            $data = $txt::select($_GET['id']);
            $ad_type=explode("$$",$data['1'])[0];
            $ad_title=explode("$$",$data['1'])[1];
            $ad_path=$data['2'];
            $ad_url=$data['3'];
            ?>
                <form method="post"  class="layui-form">
                    <div class="layui-form-item">
				      <label class="layui-form-label">ID</label>
				      <div class="layui-input-block">
				        <input type="text" name="web_title" lay-skin="primary" disabled   placeholder="ID" autocomplete="off" class="layui-input layui-btn-disabled" value="<?php echo $_GET['id'];?>">
				      </div>
				    </div>
				    <div class="layui-form-item">
				      <label class="layui-form-label">标题</label>
				      <div class="layui-input-block">
				        <input type="text" name="web_title" required  lay-verify="required" placeholder="广告标题" autocomplete="off" class="layui-input" value="<?php echo $ad_title;?>">
				      </div>
				    </div>
				    <div class="layui-form-item">
					  <label class="layui-form-label">类型</label>
					  <div class="layui-input-block">
                            <select name="web_type" id="">
                                <option value="1" <?php echo $ad_type=="1"?"selected":"" ;?> >前置视频广告</option>
                                <option value="2" <?php echo $ad_type=="2"?"selected":"" ;?> >暂停图片广告</option>
                            </select>
					  </div>
					</div>
					<div class="layui-form-item">
				      <label class="layui-form-label">链接</label>
				      <div class="layui-input-block">
				        <input type="text" name="web_path" required  lay-verify="required" placeholder="视频链接/图片链接" autocomplete="off" class="layui-input" value="<?php echo $ad_path;?>">
				      </div>
				    </div>
				    <div class="layui-form-item">
				      <label class="layui-form-label">跳转链接</label>
				      <div class="layui-input-block">
				        <input type="text" name="web_url" required  lay-verify="required" placeholder="跳转链接" autocomplete="off" class="layui-input" value="<?php echo $ad_url;?>">
				      </div>
				    </div>


                    <div class="layui-form-item">
				      <div class="layui-input-block">
				        <button class="layui-btn" name="submit" type="submit" lay-submit lay-filter="formDemo">添加</button>
				        <a href="<?php echo plugUrl('index');?>"><button type="button" class="layui-btn layui-btn-normal">返回</button></a>
				      </div>
				    </div>
                </form>
            </div>
        </div>
    </div>
</div>
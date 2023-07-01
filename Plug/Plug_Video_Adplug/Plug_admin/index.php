<?php
$ad_top_json_url='../../Plug/Plug_Video_Adplug/Plug_YYCMSDB/index.json';
error_reporting(E_ALL^E_NOTICE^E_WARNING);
header("Content-type: text/html; charset=utf-8");
include('../../class/class_txttest.php');
$txt = new  TxtDB($ad_top_json_url);
if (isset($_GET['sc']) && isset($_GET['id']) ) {	
function post_input($data){$data = stripslashes($data);$data = htmlspecialchars($data);return $data;}	
$sc = post_input($_GET["sc"]);	
$id = post_input($_GET["id"]);	
if($sc =="6000"){
	
$txt::delete($id);	
?>
<script src="../../../assets/layui.js" charset="utf-8"></script>
<script>
layer.msg('恭喜删除成功'); 
window.location.href="<?php echo plugUrl('index');?>"
</script>
<?php
	}
}	
?>
		        <div class="layui-card-header">
		            <i class="layui-icon layui-icon-note" style="font-size: 20px; ">播放器广告插件</i>
		        </div>
		      <div style="padding: 30px;">
		          <a href="<?php echo plugUrl('add');?>"><button type="button" class="layui-btn layui-btn-primary layui-border-green"><span class="am-icon-plus"></span> 添加</button></a>
			<div class="m"><blockquote class="layui-elem-quote">请按住表格往左滑动</blockquote></div>
			<div  class="layui-colla-content1 show1">
			    <form method="post">
                    
                <div class="layui-form">
                   <table class="layui-table">	
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>名称</th>
                            <th>类型</th>
                            <th>视频地址</th>
                            <th>跳转链接</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                                <?php
                                 $bankinfo = array();
                                 $order = "asc"; // asc 升序 desc 降序
                                 $user=$txt::show($order);
                                 $count=count($user);

                                 for ($x=0; $x<=$count-1; $x++) {
                                 $data = explode('|', $user[$x]);
                                 $ad_id=$data['0'];
                                 $ad_type=explode("$$",$data['1'])[0]=="1"?"前置广告":"暂停广告";
                                 $ad_title=explode("$$",$data['1'])[1];
                                 $ad_path=$data['2'];
                                 $ad_url=$data['3'];
                                 $ad_date=$data['4'];
                                ?>
                            <tr>
                                <td><?php echo $ad_id ?></td>
                                <td><?php echo $ad_title ;?></td>
                                <td><?php echo $ad_type ;?></td>
                                <td><?php echo $ad_path ;?></td>
                                <td><?php echo $ad_url ;?></td>
                                <td><?php echo $ad_date ;?></td>
                                <td>
                                    <div class="am-btn-toolbar">
                                        <div class="am-btn-group am-btn-group-xs">
                                            <a href="<?php echo plugUrl('edit',['err'=>'2','id'=>$ad_id]);?>" ><button type="button" class="layui-btn layui-btn-sm layui-btn-warm">设置</button></a>
                                            <a href="<?php echo plugUrl('index',['sc'=>'6000','id'=>$ad_id]);?>" onclick="return confirm('确定要删除吗？')"><button type="button" class="layui-btn layui-btn-sm layui-btn-danger">删除</button></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php
                        }

                        ?>
                        </tbody>
                    </table>
                </form>
            </div>
    </div>
    <div class="tpl-alert"></div>
</div>
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
		        <div class="layui-card-header"><i class="layui-icon layui-icon-note" style="font-size: 20px; ">友情链接</i></div>
		      <div style="padding: 30px;">
		          
					<form method="post" action="">
					    <input type="hidden" name="import" value="">
					    <a href="connection_add.php"> <button type="button" class="layui-btn layui-btn-primary layui-border-green"> 新增</button> </a>
					    <a href=""><button type="button" class="layui-btn layui-btn-primary layui-border-green" style="position: relative;overflow: hidden">导入<input type="file" id="list" style="position: absolute;top: 0;left: 0;height: 100%;width: 100%;z-index: 999;opacity: 0"></button></a>
					    <a href="javascript:;" onclick="exportLink()"><button type="button" class="layui-btn layui-btn-primary layui-border-green"> 导出 </button> </a>
					</form>
		    		  <div class="m"><blockquote class="layui-elem-quote">请按住表格往左滑动</blockquote></div>
			<div  class="layui-colla-content1 show1">
			    
    		  <table class="layui-table">
		    		    <thead>
		    		      <tr>
		    		          <th width="15%">排序</th>
		    		          <th width="15%">标题	</th>
		    		          <th width="25%">地址	</th>
		    		          <th width="25%">备注	</th>
		    		          <th width="20%">操作</th>
		    		      </tr>
		    		    </thead>
		    		    <tbody>
		    		    <?php
		    		    $linkfile = YYCMS_ROOT."connection/connection.json";
		    		    $json = json_decode(file_get_contents($linkfile),true);
		    		    //导入
		    		    if(isset($_POST['import'])){
		    		        $import = $_POST['import'];
		    		        $import = explode("\n",$import);
		    		        $import = array_filter($import);
		    		        foreach ($import as $index=>$item){
		    		            $tmp = explode('|',$item);
		    		            if(sizeof($tmp)==2){
		    		                $key = time().rand(100,999);
		    		                $data = [
		    		                        'id'=>$key,
		    		                        'sort'=>$index+1,
		    		                        'title'=>$tmp[0],
		    		                        'url'=>$tmp[1],
		    		                        'remark'=>''
		    		                ];
		    		                $json[$key] = $data;
		    		            }
		    		        }
		    		        file_put_contents($linkfile,json_encode($json));
		    		        exit('<script>layer.msg("导入成功！");location.href="connection.php";</script>');
		    		    }
		    		    //删除
		    		    if(isset($_GET['id'])){
		    		        unset($json[$_GET['id']]);
		    		        file_put_contents($linkfile,json_encode($json));
		    		    
		    		        exit('<script>layer.msg("删除成功！");location.href="connection.php";</script>');
		    		    }
		    		    $json = jsonsort($json);
		    		    
		    		    	foreach ($json as $item){
		    		    ?>
		    		        
							<tr>
							    <td><?php echo $item['sort'];?></td>
							    <td><?php echo $item['title'];?></td>
							    <td><?php echo $item['url'];?></td>
								<td><?php echo $item['remark'];?></td>
							    <td>
							        <a href="connection_mod.php?id=<?php echo $item['id'];?>" >编辑</a>
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
                //console.log(ev.target.result)
                if(encodeURI(ev.target.result).indexOf('%EF%BF%BD')>-1){
                    filereader.readAsText(file,'gb2312');
                }else{
                    document.forms[0].submit();
                }
            }
        })
        function exportLink() {
            var exportData = [];
            $('tbody tr').each(function (i,v) {
                var tmp = $(v).find('td').eq(1).text().replace(/\n/g,'')+'|'+$(v).find('td').eq(2).text().replace(/\n/g,'');
                exportData.push(tmp);
            });
            var str = exportData.join("\n");
            var blob = new Blob([str],{type:'application/octet-stream;charset=gb2312'});
            var downLink = document.createElement('a');
            downLink.href = URL.createObjectURL(blob);
            downLink.download = 'link_'+(new Date().getTime())+'.txt';
            document.body.appendChild(downLink);
            downLink.click();
        }
    </script>

  </body>

</html>
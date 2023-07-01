<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $html_title;?></title>
<link href="css/install.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<script>
$(document).ready(function(){
    $('#next').on('click',function(){
        if (typeof($('.no').html()) == 'undefined'){
            $(this).attr('href','index.php?step=2');
        }else{
            alert($('.no').eq(0).parent().parent().find('td:first').html()+' 未通过检测!');
            $(this).attr('href','###');
        }
    });
});
</script>
</head>
<body>
<?php echo $html_header;?>
<div class="main">

  <div class="content-box">
    <table width="100%" border="0" cellspacing="2" cellpadding="0">
      <caption>
      环境检查
      </caption>
      <tr>
        <th scope="col">项目</th>
        <th width="25%" scope="col">程序所需</th>
        <th width="25%" scope="col">最佳配置推荐</th>
        <th width="25%" scope="col">当前服务器</th>
      </tr>
      <?php foreach($env_items as $v){?>
      <tr>
        <td scope="row"><?php echo $v['name'];?></td>
        <td><?php echo $v['min'];?></td>
        <td><?php echo $v['good'];?></td>
        <td><span class="<?php echo $v['status'] ? 'yes' : 'no';?>"><i></i><?php echo $v['cur'];?></span></td>
      </tr>
      <?php }?>
    </table>
    <table width="100%" border="0" cellspacing="2" cellpadding="0">
      <caption>
      时间检查
      </caption>
      <tr>
        <th scope="col">服务器时间</th>
        <th scope="col">北京时间</th>
      </tr>
      <tr>
		<td><?php echo  date("Y-m-d H-i-s");?></td>
		<td><?php  date_default_timezone_set('PRC'); echo  date('Y-m-d H-i-s');?></td>
      </tr>
    </table><span style="color: #FF2805">【请注意你本地时间】</span>
    <table width="100%" border="0" cellspacing="2" cellpadding="0">
      <caption>
      目录、文件权限检查
      </caption>
      <tr>
        <th scope="col">目录文件</th>
        <th width="25%" scope="col">所需状态</th>
        <th width="25%" scope="col">当前状态</th>
      </tr>
      <?php foreach($dirfile_items as $k => $v){?>
      <tr>
        <td><?php echo $v['path'];?> </td>
        <td><span>可写</span></td>
        <td><span class="<?php echo $v['status'] == 1 ? 'yes' : 'no';?>"><i></i><?php echo $v['status'] == 1 ? '可写' : '不可写';?></span></td>
      </tr>
      <?php }?>
    </table>
    <table width="100%" border="0" cellspacing="2" cellpadding="0">
      <caption>
      函数检查
      </caption>
      <tr>
        <th scope="col">目录文件</th>
        <th width="25%" scope="col">所需状态</th>
        <th width="25%" scope="col">当前状态</th>
      </tr>
      <?php foreach($func_items as $k =>$v){?>
      <tr>
        <td><?php echo $v['name'];?>()</td>
        <td><span>支持</span></td>
        <td><span class="<?php echo $v['status'] == 1 ? 'yes' : 'no';?>"><i></i><?php echo $v['status'] == 1 ? '支持' : '不支持';?></span></td>
      </tr>
      <?php }?>
    </table>
  </div>
  <div class="footer"> <span class="step2"></span>  <span class="formSubBtn"> <a href="index.php"  class="back">上一步</a> <a href='###' id="next" class="submit">下一步</a> </span> </div>

</div>
</body>
</html>

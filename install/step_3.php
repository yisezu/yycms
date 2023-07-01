<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $html_title;?></title>
<link href="css/install.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<link href="css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>
<style>
.div{font-family:"微软雅黑"; font-size:40px; text-align: center;margin-top: 80px;}
</style>
<script type="text/javascript">
var scroll_height = 0;
function showmessage(message) {
    document.getElementById('license').innerHTML += message+"<br/>";
    document.getElementById("text-box").scrollTop = 500+scroll_height;
    scroll_height += 40;
}
$(document).ready(function(){
    //自定义滚定条
    $('#text-box').perfectScrollbar();
});
</script>
</head>

<body>
<?php echo $html_header;?>
<div class="main">
  <div class="text-box" id="text-box">
    <div class="div" id="license"></div>
  </div>
  <div class="btn-box div"><a href="javascript:void(0);" id="install_process" class="btn btn-primary">正在安装 ...</a></div>
</div>
<script>
    (function () {
        showmessage('正在安装后台...请耐心等待1-3分钟！！！' );
        $.ajax({
            url:"",
            type:"post",
            data:"m=rename",
            success:function (data) {
                showmessage('正在写入配置...请耐心等待1-3分钟！！！' );
                $.ajax({
                    url:"",
                    type:"post",
                    data:"m=config",
                    success:function (data) {
                        showmessage('正在初始化数据...请耐心等待1-3分钟！！！' );
                        $.ajax({
                            url:"",
                            type:"post",
                            data:"m=finish",
                            success:function (data) {
                                showmessage('恭喜安装成功！！！' );
                                document.getElementById('install_process').innerHTML = '安装完成，下一步...';
                                document.getElementById('install_process').href='index.php?step=4&sitename=<?php echo $_SESSION['sitename'];?>&username=<?php echo $_SESSION['admin'];?>&password=<?php echo $_SESSION['password'];?>&adminpath=<?php echo $_SESSION['admin_path'];?>'
                            }
                        })
                    }
                })
            }
        })
    })();
</script>
</body>
</html>

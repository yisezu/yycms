<ins class="adsbygoogle" style="display:inline-block;width:10px;height:50px" data-ad-client="ca-pub-6111334333458862" data-ad-slot="6835627838"></ins>
 </div>
 </div>
 </div>
 <div class="layui-footer footer footer-demo">
   <div class="layui-container">
     <p>Copyright &copy; 2020-<?php echo  date("Y") ; ?><a href="//www.zxyycms.com" target="_blank">优优CMS</a> All rights reserved. </p>
   </div>
 </div>
 <div class="site-tree-mobile layui-hide">
<i class="layui-icon">&#xe602;</i>
</div>
 </div>
 <script>
    function clean() {
        $.ajax({
            type:'get',
            url:'<?php echo YYCMS_ADMIN;?>admin_index/clean.php',
            success:function (data) {
                layer.msg('清除缓存成功');
                window.setTimeout(function () {window.location.reload();},2000)
                
          
            }
        });
    }
window.global = {
  pageType: 'doc'
  ,preview: function(){
    var preview = document.getElementById('LAY_preview');
    return preview ? preview.innerHTML : '';
  }()
};
layui.config({
  base: '../../assets/js/'
  
}).use('global');
</script>
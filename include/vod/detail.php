<?php
$data = getDataById('vod',$C_T_3);
$tpl->assign('page','1');
$tpl->assign('data',getListByType('vod',getValueByKey($data,0,'type'),true));
$tpl->assign('yycms_type_id',getValueByKey($data,0,'type'));

$tpl->assign('yycmsobj_id',$C_T_3);
$tpl->assign('yycmsobj_name',getValueByKey($data,0,'name'));
$tpl->assign('yycmsobj_typename',getTypeById('vod',getValueByKey($data,0,'type')));
$tpl->assign('yycmsobj_hit',rand(5, 10000));
$tpl->assign('yycmsobj_time',getValueByKey($data,0,'time'));
$tpl->assign('yycmsobj_view',U($C_T_0,'view',$C_T_2,$C_T_3));
$tpl->assign('yycmsobj_typemore',U($C_T_0,'type',getValueByKey($data,0,'type'),'1'));

$tpl->assign('yycmsobj_pic',getValueByKey($data,0,'pic'));
$url = getValueByKey($data,0,'playurl');
$tpl->assign('yycmsobj_url',$url);
switch($yycms_config['player']){
    case "dplayer":
        $player = <<<tag
<div id='preVideo'  style="width: 100%;height: 100%;display:none"></div>
<div id='myVideo'  style="width: 100%;height: 100%"></div>
<script src="/static/hls.min.js"></script>
<script src="/static/DPlayer.min.js"></script>
<script type="text/javascript">
	var myVideo = new DPlayer({
    container: document.getElementById('myVideo'),
    screenshot: true,
    logo: '{$yycms_system['yycms_logo']}',
    autoplay:false,
    video: {
        url: '$url',
        type: 'hls'
    }
});
	myVideo.currentTime = function() {
	  return myVideo.video.currentTime;
	}
</script>
tag;
        break;
    case "jxurl":
        $player = <<<tag
<iframe src="$url" width="100%" height="100%" allowfullscreen="true" frameborder="0"></iframe>
tag;
        break;
    case "videojs":
        $player = <<<tag
<video id='myVideo'   class="video-js"></video>
<link rel="stylesheet" type="text/css" href="/static/VideoJS/video.min.css?v=3">
<script type="text/javascript" src="/static/VideoJS/video.min.js?v=1" charset="utf-8" > </script>
<script type="text/javascript" src="/static/VideoJS/video-conrtib-sina.js?v=1" charset="utf-8" > </script>
<script type="text/javascript" src="/static/VideoJS/myVideo.js?v=6" charset="utf-8" > </script>
<script type="text/javascript">
	var myVideo=initVideo({
		id:'myVideo',
		url:'$url',
		logo:{
			url:'{$yycms_system['yycms_logo']}',
			width:'100px'
		},
	});
</script>
tag;
        if(getValueByKey($data,0,'type')=='32'){
            $LRTB = 'TB';
            if(stripos(getValueByKey($data,0,'name'),'#LR')!==false){
                $LRTB = 'LR';
            }
            $player.=<<<tag
<script type="text/javascript" src="/static/VideoJS/video-conrtib-vr.js?v=6" charset="utf-8" > </script>
<script type="text/javascript" src="/static/VideoJS/smvr.js?v=6" charset="utf-8" > </script>
<script >
smvrset(myVideo,"$LRTB");
</script>
tag;

        }
        break;
}

$tpl->assign('yycmsobj_content',$player);
$plug->listen('vod_detail','before');
$tpl->show('detail');
$plug->listen('vod_detail','after');
?>
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

$plug->listen('vod_map','before');
$tpl->show('map');
$plug->listen('vod_map','after');
?>
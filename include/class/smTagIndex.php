<?php
//需要替换的
$this->subjects[] = "/$this->left\s*(yycms_link)\s*$this->right/";
$this->subjects[] = "/$this->left\s*(yycms_video_hot)\s*$this->right/";
$this->subjects[] = "/$this->left\s*()\s*$this->right/";
$this->subjects[] = "/$this->left\s*\/(yycms_video_hot)\s*$this->right/";
//替换后的
$this->replaces[] = <<<tag
<?php ulink('<a class="text-sub-title mx-2 text-small" href="链接" target="_blank" style="margin:0 10px;">标题</a>');?>
tag;
$this->replaces[] = '<?php foreach (\$yycms_config[\'video\'] as \$item){ \$yycms_type_name=getTypeById(\'vod\',\$item);\$yycms_type_more=U(\'vod\',\'type\',\$item,\'1\');\$data=getListByType(\'vod\',\$item,true);\$page=1;?>';


$this->replaces[] = <<<tag
<?php
\$json_string = file_get_contents(\$liveapi);
\$data = json_decode(\$json_string, true);
\$datas = \$data['fileinfo'];
\$pageresult = \$data['pageresult'];
\$page = \$data['page'];
\$yycms_type_name=getTypeById('live',\$yycms_config['live']);
\$yycms_type_more=U('live','type',\$yycms_config['live'],'1');
foreach (\$datas as \$key=>\$val) {
if(\$key==\\1)break;
\$view= U('.\$val['name']),base64_encode(\$val['m3u8']));
\$name=\$val['name'];
\$pic=\$val['pic'];
\$hit = rand(5, 10000);
\$time = date('Y-m-d');
?>
tag;

$this->replaces[] = '<?php }?>';

?>
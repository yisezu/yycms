<?php
$httpsUrl = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$parsedUrl = parse_url($httpsUrl);
$host = $parsedUrl['host'];
$hostParts = explode(".", $host);
$mainDomain = $hostParts[count($hostParts)-2] . "." . $hostParts[count($hostParts)-1];

$this->subjects[] = "/$this->left\s*(yycms_banner_a)\s*$this->right/";
$this->subjects[] = "/$this->left\s*(yycms_banner_b)\s*$this->right/";
$this->subjects[] = "/$this->left\s*(yycms_search)\s*$this->right/";
$this->subjects[] = "/$this->left\s*key\s*:\s*(.*?)\s*$this->right/";
$this->subjects[] = "/$this->left\s*(yycms_tj)\s*$this->right/";
$this->subjects[] = "/$this->left\s*(yycms_url)\s*$this->right/";
$this->subjects[] = "/$this->left\s*(yycms_video_menu)\s*$this->right/";
$this->subjects[] = "/$this->left\s*(yycms_hd_menu)\s*$this->right/";
$this->subjects[] = "/$this->left\s*\/(yycms_video_menu|yycms_hd_menu)\s*$this->right/";
$this->subjects[] = "/$this->left\s*(yycms_menu_link)\s*$this->right/";
$this->subjects[] = "/$this->left\s*(yycms_menu_name)\s*$this->right/";
$this->subjects[] = "/$this->left\s*:(.*?)\s*\((.*?)\)\s*$this->right/";
$this->subjects[] = "/$this->left\s*\/(yycms_head)\s*$this->right/";






$this->replaces[] = <<<tag
<?php yycms_banner_a('<a href="链接" target="_blank"><img style="width:100%;margin-bottom:2px;" src="图片"></a>');?>
tag;
$this->replaces[] = <<<tag
<?php yycms_banner_b('<a href="链接" target="_blank"><img style="width:100%;margin-bottom:2px;" src="图片"></a>');?>
tag;
$this->replaces[] = <<<tag
<input type="hidden" name="s" value="<?php echo 'search'.\$yycms_config['url_split'].'type'.\$yycms_config['url_split'].'so'.\$yycms_config['url_split'].'1.'.\$yycms_config['url_file']; ?>"/>
tag;
$this->replaces[] = <<<tag
<?php echo U('search','type',\\1,'1');?>
tag;
$this->replaces[] = <<<tag
<?php 
include('./class/class_ad_Popup.php');
include('./class/cllass_ad_js.php');
?>
<script src="/class/class_ad_float.php"></script>
tag;

$this->replaces[] = <<<tag
<?php echo \$mainDomain; ?>
tag;

$this->replaces[] = <<<tag
<?php foreach (\$yycms_menu['vod'] as \$item){ \$yycms_menu_type='vod';\$yycms_menu_id=\$item['id'];if (\$item['hd'] == '0'){?>
tag;
$this->replaces[] = <<<tag
<?php foreach (\$yycms_menu['vod'] as \$item){ \$yycms_menu_type='vod';\$yycms_menu_id=\$item['id'];if (\$item['hd'] == '1'){?>
tag;
$this->replaces[] = <<<tag
<?php }}?>
tag;



$this->replaces[] = <<<tag
<?php echo U(\$yycms_menu_type,'type',\$yycms_menu_id,'1');?>
tag;
$this->replaces[] = <<<tag
<?php echo \$item['name']?>
tag;
$this->replaces[] = <<<tag
<?php echo \\1(\\2);?>
tag;
$this->replaces[] = <<<tag
<?php }?>
tag;
require 'smTagIndex.php';
require 'smTagType.php';
require 'smTagPage.php';
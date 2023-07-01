<?php
//需要替换的
$this->subjects[] = "/$this->left\s*(yycms_page)\s*:\s*(current)\s*$this->right/";
$this->subjects[] = "/$this->left\s*(yycms_page)\s*:\s*(count)\s*$this->right/";
$this->subjects[] = "/$this->left\s*(yycms_page)\s*:\s*(first)\s*$this->right/";
$this->subjects[] = "/$this->left\s*(yycms_page)\s*:\s*(last)\s*$this->right/";
$this->subjects[] = "/$this->left\s*(yycms_page)\s*:\s*(prev)\s*$this->right/";
$this->subjects[] = "/$this->left\s*(yycms_page)\s*:\s*(next)\s*$this->right/";


//替换后的

$this->replaces[] = '<?php echo \$page;?>';
$this->replaces[] = '<?php echo \$pagecount;?>';
$this->replaces[] = '<?php echo U(\$yycms_controller,\$yycms_action,\$yycms_arga,\'1\');?>';
$this->replaces[] = '<?php echo U(\$yycms_controller,\$yycms_action,\$yycms_arga,\$pagecount);?>';
$this->replaces[] = '<?php echo \$page > 1 ? U(\$yycms_controller,\$yycms_action,\$yycms_arga,\$page - 1):\'javascript:;\';?>';
$this->replaces[] = '<?php echo \$page < \$pagecount ? U(\$yycms_controller,\$yycms_action,\$yycms_arga,\$page + 1):\'javascript:;\';?>';
?>
<?php
require('../../common/incfiles/common.inc.php');
require('common/incfiles/config.inc.php');
require('common/incfiles/module_config.inc.php');
wdja_cms_module_action();
$myhtml = wdja_cms_module();
echo $myhtml;
?>

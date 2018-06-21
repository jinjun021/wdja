<?php
/*
判断是否作为网站首页使用
*/
if(ii_strlen(dirname($_SERVER['PHP_SELF']))>1){
  $nroute = 'child';
  $ngenre = ii_get_actual_genre(__FILE__, $nroute);
}else{
  $nroute = '';
  $ngenre = 'wechat/product';
}
wdja_cms_init($nroute);
$nhead = $variable[ii_cvgenre($ngenre) . '.nhead'];
$nfoot = $variable[ii_cvgenre($ngenre) . '.nfoot'];
if (ii_isnull($nhead)) $nhead = $default_head;
if (ii_isnull($nfoot)) $nfoot = $default_foot;
$ndatabase = $variable[ii_cvgenre($ngenre) . '.ndatabase'];
$nidfield = $variable[ii_cvgenre($ngenre) . '.nidfield'];
$nfpre = $variable[ii_cvgenre($ngenre) . '.nfpre'];
$npagesize = $variable[ii_cvgenre($ngenre) . '.npagesize'];
$nuppath = $variable[ii_cvgenre($ngenre) . '.nuppath'];
$nuptype = $variable[ii_cvgenre($ngenre) . '.nuptype'];
$nlisttopx = $variable[ii_cvgenre($ngenre) . '.nlisttopx'];
$nurltype = $variable[ii_cvgenre($ngenre) . '.nurltype'];
$nclstype = $variable[ii_cvgenre($ngenre) . '.nclstype'];
$nbasehref = $variable[ii_cvgenre($ngenre) . '.nbasehref'];
$nsaveimages = $variable[ii_cvgenre($ngenre) . '.nsaveimages'];
$ncreatefolder = $variable[ii_cvgenre($ngenre) . '.ncreatefolder'];
$ncreatefiletype = $variable[ii_cvgenre($ngenre) . '.ncreatefiletype'];
$ntitle = ii_itake('module.channel_title', 'lng');
$nkeywords = $variable[ii_cvgenre($ngenre) . '.nkeywords'];
$ndescription = $variable[ii_cvgenre($ngenre) . '.ndescription'];
?>

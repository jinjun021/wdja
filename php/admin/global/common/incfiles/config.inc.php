<?php
$nroute = 'child';
$ngenre = ii_get_actual_genre(__FILE__, $nroute);
wdja_cms_init($nroute);
$nhead = $variable[ii_cvgenre($ngenre) . '.nhead'];
$nfoot = $variable[ii_cvgenre($ngenre) . '.nfoot'];
if (ii_isnull($nhead)) $nhead = $default_head;
if (ii_isnull($nfoot)) $nfoot = $default_foot;
$nuppath = $variable[ii_cvgenre($ngenre) . '.nuppath'];
$nuptype = $variable[ii_cvgenre($ngenre) . '.nuptype'];
$nurltype = $variable[ii_cvgenre($ngenre) . '.nurltype'];
$nclstype = $variable[ii_cvgenre($ngenre) . '.nclstype'];
$nbasehref = $variable[ii_cvgenre($ngenre) . '.nbasehref'];
$nsaveimages = $variable[ii_cvgenre($ngenre) . '.nsaveimages'];
$ncreatefolder = $variable[ii_cvgenre($ngenre) . '.ncreatefolder'];
$ncreatefiletype = $variable[ii_cvgenre($ngenre) . '.ncreatefiletype'];
//$ntitle = ii_itake('module.channel_title', 'lng');
?>
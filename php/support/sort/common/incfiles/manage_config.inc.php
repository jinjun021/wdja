<?php
//****************************************************
// WDJA CMS Power by wdja.net
// Email: shadoweb@qq.com
// Web: http://www.wdja.net/
//****************************************************
$ncontrol = 'select,hidden';
$sgenre = ii_htmlencode($_GET['sgenre']);
if(ii_isnull($sgenre)) $sgenre = pp_get_sort_select_default();
if (!($admc_popedom == '-1' || ii_cinstr($admc_popedom, $sgenre, ','))) wdja_cms_admin_msgs(ii_itake('global.lng_admin.popedom_error', 'lng'), 1);

function pp_manage_navigation()
{
  return ii_ireplace('manage.navigation', 'tpl');
}

function pp_get_sort_select($module='')
{
  global $variable;
  $tary = ii_get_valid_module();
  if (is_array($tary))
  {
    $tmpstr = '';
    $option_selected = ii_itake('global.tpl_config.option_select', 'tpl');
    $option_unselected = ii_itake('global.tpl_config.option_unselect', 'tpl');
    foreach ($tary as $key => $val)
    {
      if (!ii_isnull($module) && $val == $module) $tmprstr = $option_selected;
      else $tmprstr = $option_unselected;
      if (!ii_isnull($variable[ii_cvgenre($val) . '.nsort'])){
        $tmprstr = str_replace('{$explain}', '(' . mm_get_genre_title($val) . ')' , $tmprstr);
        $tmprstr = str_replace('{$value}', $val, $tmprstr);
      }
      else continue;
      $tmpstr .= $tmprstr;
    }
    return $tmpstr;
  }
}

function pp_get_sort_select_default()
{
  global $variable;
  $tary = ii_get_valid_module();
  if (is_array($tary))
  {
    foreach ($tary as $key => $val)
    {
      if ($variable[ii_cvgenre($val) . '.nsort'] == 1){
      return $val;
      }
    }
  }
}

function wdja_cms_admin_manage_adddisp()
{
  global $slng, $sgenre;
  global $conn;
  global $ndatabase, $nidfield, $nfpre;
  $tsort = ii_get_safecode($_POST['sort']);
  $tkeywords = ii_get_safecode($_POST['keywords']);
  $tdescription = ii_get_safecode($_POST['description']);
  $timage = ii_get_safecode($_POST['image']);
  $ttpl = ii_get_safecode($_POST['tpl']);
  $tgourl = ii_get_safecode($_POST['gourl']);
  $tbackurl = $_GET['backurl'];
  //$tid = ii_get_num($_GET['id']);
  $tfsid = ii_get_num($_POST['fsid']);
  $tfgourl = mm_get_sort_field($tfsid,'gourl');
  if(!ii_isnull($tfgourl) && ii_isnull($tgourl)) wdja_cms_admin_msg(ii_itake('manage.fid-gourl', 'lng'), $tbackurl, 1);
  if (!(ii_isnull($tsort)))
  {
    $tsqlstr = "select * from $ndatabase where " . ii_cfname('lng') . "='$slng' and $nidfield=$tfsid";
    $trs = ii_conn_query($tsqlstr, $conn);
    $trs = ii_conn_fetch_array($trs);
    if ($trs)
    {
      $tfid = mm_get_sortfid($trs[ii_cfname('fid')], $tfsid);
    }
    else
    {
      $tfid = '0';
    }
    if (strlen($tfid) < 255)
    {
      $tfid_count = mm_get_sortfid_count($tfid, $sgenre, $slng);
      $tsqlstr = "insert into $ndatabase (
      	" . ii_cfname('sort') . ",
      	" . ii_cfname('keywords') . ",
      	" . ii_cfname('description') . ",
      	" . ii_cfname('image') . ",
      	" . ii_cfname('hidden') . ",
      	" . ii_cfname('fid') . ",
      	" . ii_cfname('fsid') . ",
      	" . ii_cfname('genre') . ",
      	" . ii_cfname('lng') . ",
      	" . ii_cfname('tpl') . ",
      	" . ii_cfname('gourl') . ",
      	" . ii_cfname('order') . ",
      	" . ii_cfname('time') . "
      	) values (
      		'" . ii_left($tsort, 50) . "',
      		'" . ii_left($tkeywords, 100) . "',
      		'" . ii_left($tdescription, 250) . "',
      		'$timage',
      		'" . ii_get_num($thidden) . "',
      		'" . $tfid . "',
      		" . $tfsid . ",
      		'" . $sgenre . "',
      		'" . $slng . "',
      		'" . ii_left($ttpl, 250) . "',
      		'" . ii_left($tgourl, 250) . "',
      		" . $tfid_count . ",
      		'" . ii_now() . "'
      	)";
      $trs = ii_conn_query($tsqlstr, $conn);
      if ($trs)
      {
        mm_client_redirect($tbackurl);
      }
      else
      {
        wdja_cms_admin_msg(ii_itake('global.lng_public.sudd', 'lng'), $tbackurl, 1);
      }
    }
    else
    {
      wdja_cms_admin_msg(ii_itake('manage.dbaseerror', 'lng'), $tbackurl, 1);
    }
  }
  else
  {
    wdja_cms_admin_msg(ii_itake('global.lng_public.sudd', 'lng'), $tbackurl, 1);
  }
}

function wdja_cms_admin_manage_editdisp()
{
  global $conn;
  global $slng, $sgenre;
  global $ndatabase, $nidfield, $nfpre;
  $tid = ii_get_num($_GET['id']);
  $tbackurl = $_GET['backurl'];
  $tsort = ii_get_safecode($_POST['sort']);
  $tfsid = ii_get_safecode($_POST['fsid']);
  $tkeywords = ii_get_safecode($_POST['keywords']);
  $tdescription = ii_get_safecode($_POST['description']);
  $timage = ii_get_safecode($_POST['image']);
  $ttpl = ii_get_safecode($_POST['tpl']);
  $tgourl = ii_get_safecode($_POST['gourl']);
  $thidden = ii_get_num($_POST['hidden']);
  $ttime = ii_now();
  $tfgourl = mm_get_sort_field($tfsid,'gourl');
  if(!ii_isnull($tfgourl) && ii_isnull($tgourl)) wdja_cms_admin_msg(ii_itake('manage.fid-gourl', 'lng'), $tbackurl, 1);
  if($tid !=$tfsid ){
        $tsqlstr = "select * from $ndatabase where " . ii_cfname('lng') . "='$slng' and $nidfield=$tfsid";
        $trs = ii_conn_query($tsqlstr, $conn);
        $trs = ii_conn_fetch_array($trs);
        if ($trs)
        {
          //判断上级分类是否包含当前分类.
          $afid = preg_split( ',',$trs[ii_cfname('fid')]);
          foreach($afid as $aid){
            if($tid == $aid) return;
          }
          $tfid = mm_get_sortfid($trs[ii_cfname('fid')], $tfsid);
        }
        else
        {
          $tfid = '0';
        }
    if (strlen($tfid) < 255)
    {
      $tsqlstr = "update $ndatabase set " . ii_cfname('sort') . "='$tsort',
      " . ii_cfname('fid') . "='$tfid'," . ii_cfname('fsid') . "='$tfsid',
      " . ii_cfname('keywords') . "='$tkeywords',
      " . ii_cfname('description') . "='$tdescription',
      " . ii_cfname('time') . "='$ttime',
      " . ii_cfname('image') . "='$timage',
      " . ii_cfname('tpl') . "='$ttpl',
      " . ii_cfname('gourl') . "='$tgourl',
      " . ii_cfname('hidden') . "='$thidden'
      where $nidfield=$tid";
      $trs = ii_conn_query($tsqlstr, $conn);
      if ($trs)
      {
        wdja_cms_admin_msg(ii_itake('manage.editsucceed', 'lng'), $tbackurl, 1);
      }
      else
      {
        wdja_cms_admin_msg(ii_itake('manage.editerr', 'lng'), $tbackurl, 1);
      }
    }
    else
    {
      wdja_cms_admin_msg(ii_itake('manage.dbaseerror', 'lng'), $tbackurl, 1);
    }
  }
}

function wdja_cms_admin_manage_deletedisp()
{
  global $slng, $sgenre;
  global $conn;
  global $ndatabase, $nidfield, $nfpre;
  $tid = ii_get_num($_GET['id']);
  $tbackurl = $_GET['backurl'];
  $tsqlstr = "select * from $ndatabase where $nidfield=$tid";
  $trs = ii_conn_query($tsqlstr, $conn);
  $trs = ii_conn_fetch_array($trs);
  if ($trs)
  {
    $tfid = mm_get_sortfid($trs[ii_cfname('fid')], $tid);
    $tfid_count = mm_get_sortfid_count($tfid, $sgenre, $slng);
    if ($tfid_count > 0)
    {
      mm_client_alert(ii_itake('manage.delete_has', 'lng'), $tbackurl, 1);
    }
    else
    {
      $tsqlstr2 = "update $ndatabase set " . ii_cfname('order') . "=" . ii_cfname('order') . "-1 where " . ii_cfname('genre') . "='" . $trs[ii_cfname('genre')] . "' and  " . ii_cfname('lng') . "='" . $trs[ii_cfname('lng')] . "' and " . ii_cfname('fid') . "='" . $trs[ii_cfname('fid')] . "' and " . ii_cfname('order') . ">" . $trs[ii_cfname('order')];
      $trs2 = ii_conn_query($tsqlstr2, $conn);
      if ($trs2)
      {
        mm_dbase_delete($ndatabase, $nidfield, $tid);
        wdja_cms_admin_msg(ii_itake('manage.deletesucceed', 'lng'), $tbackurl, 1);
      }
      else
      {
        wdja_cms_admin_msg(ii_itake('manage.deletefailed', 'lng'), $tbackurl, 1);
      }
    }
  }
  else
  {
    wdja_cms_admin_msg(ii_itake('manage.deleteerr', 'lng'), $tbackurl, 1);
  }
}

function wdja_cms_admin_manage_resetdisp()
{
  global $slng, $sgenre;
  global $conn;
  global $ndatabase, $nidfield, $nfpre;
  $tid = ii_get_num($_GET['id']);
  $tbackurl = $_GET['backurl'];
  $tsqlstr = "select * from $ndatabase where " . ii_cfname('lng') . "='$slng' and " . ii_cfname('genre') . "='$sgenre' and " . ii_cfname('fsid') . "=$tid order by $nidfield asc";
  $trs = ii_conn_query($tsqlstr, $conn);
  $ti = 0;
  while ($trow = ii_conn_fetch_array($trs))
  {
    $tsqlstr = "update $ndatabase set " . ii_cfname('order') . "=$ti where $nidfield=$trow[$nidfield]";
    ii_conn_query($tsqlstr, $conn);
    $ti = $ti + 1;
  }
  mm_client_redirect($tbackurl);
}

function wdja_cms_admin_manage_action()
{
  global $sgenre, $slng;
  global $ndatabase, $nidfield, $nfpre, $ncontrol;
  $taction = $_GET['action'];
  $tappstr = 'sys_sort_' . $sgenre . '_' . $slng;
  if (!ii_isnull($taction)) @ii_cache_remove($tappstr);
  switch($taction)
  {
    case 'add':
      wdja_cms_admin_manage_adddisp();
      break;
    case 'edit':
      wdja_cms_admin_manage_editdisp();
      break;
    case 'delete':
      wdja_cms_admin_manage_deletedisp();
      break;
    case 'reset':
      wdja_cms_admin_manage_resetdisp();
      break;
    case 'order':
      wdja_cms_admin_orderdisp('common.sort', '', " and " . ii_cfname('genre') . "='" . $sgenre . "' and " . ii_cfname('lng') . "='" . $slng . "'");
      break;
    case 'control':
      wdja_cms_admin_controldisp($ndatabase, $nidfield, $nfpre, $ncontrol);
      break;
    case 'upload':
      uu_upload_files();
      break;
  }
}

function wdja_cms_admin_manage_edit()
{
  global $sgenre;
  global $conn;
  global $ndatabase, $nidfield, $nfpre, $nupsimg;
  $tid = ii_get_num($_GET['id']);
  $tsqlstr = "select * from $ndatabase where $nidfield=$tid";
  $trs = ii_conn_query($tsqlstr, $conn);
  $trs = ii_conn_fetch_array($trs);
  if ($trs)
  {
    $tmpstr = ii_itake('manage.edit', 'tpl');
    $tmpstr = str_replace('{$id}', $trs[$nidfield], $tmpstr);
    $tmpstr = str_replace('{$fsid}', $trs[ii_cfname('fsid')], $tmpstr);
    $tmpstr = str_replace('{$sort}', $trs[ii_cfname('sort')], $tmpstr);
    $tmpstr = str_replace('{$keywords}', $trs[ii_cfname('keywords')], $tmpstr);
    $tmpstr = str_replace('{$description}', $trs[ii_cfname('description')], $tmpstr);
    $tmpstr = str_replace('{$image}', $trs[ii_cfname('image')], $tmpstr);
    $tmpstr = str_replace('{$gourl}', $trs[ii_cfname('gourl')], $tmpstr);
    $tmpstr = str_replace('{$tpl}', $trs[ii_cfname('tpl')], $tmpstr);
    $tmpstr = str_replace('{$hidden}', $trs[ii_cfname('hidden')], $tmpstr);
    $tmpstr = str_replace('{$sgenre}', $sgenre, $tmpstr);
    $tmpstr = str_replace('{$nav_sort}', mm_nav_sort($sgenre, '?sgenre=' . $sgenre . '&id=', $tid), $tmpstr);
    $tmpstr = str_replace('{$upsimg}', $nupsimg, $tmpstr);
    $tmpstr = ii_creplace($tmpstr);
    return $tmpstr;
  }
  else
  {
    mm_client_alert(ii_itake('manage.editerr', 'lng'), -1);
  }
}

function wdja_cms_admin_manage_list()
{
  global $conn;
  global $ndatabase, $nidfield, $nfpre, $npagesize, $nupsimg;;
  global $slng, $sgenre;
  $tid = ii_get_num($_GET['id']);
  $toffset = ii_get_num($_GET['offset']);
  $tmpstr = ii_itake('manage.list', 'tpl');
  $tmpastr = ii_ctemplate($tmpstr, '{@recurrence_ida}');
  $tmprstr = '';
  $tsqlstr = "select * from $ndatabase where $nidfield=$tid";
  $trs = ii_conn_query($tsqlstr, $conn);
  $trs = ii_conn_fetch_array($trs);
  if ($trs)
  {
    $tfid = $trs[ii_cfname('fid')];
    $tarys = preg_split(',', $tfid);
    $tsid = $tarys[count($tarys) - 1];
    $tmptstr = str_replace('{$topic}', $trs[ii_cfname('sort')], $tmpastr);
    $tmptstr = str_replace('{$href}', '?sgenre=' . $sgenre . '&id=' . $tsid, $tmptstr);
    $tmprstr = $tmprstr . $tmptstr;
  }
  $tmpstr = str_replace(WDJA_CINFO, $tmprstr, $tmpstr);
  $tmprstr = '';
  $tmpastr = ii_ctemplate($tmpstr, '{@recurrence_idb}');
  $tsqlstr = "select * from $ndatabase where " . ii_cfname('lng') . "='$slng' and " . ii_cfname('genre') . "='$sgenre' and " . ii_cfname('fsid') . "=$tid order by " . ii_cfname('order') . " asc";
  $tcp = new cc_cutepage;
  $tcp -> id = $nidfield;
  $tcp -> sqlstr = $tsqlstr;
  $tcp -> offset = $toffset;
  $tcp -> pagesize = $npagesize;
  $tcp -> init();
  $trsary = $tcp -> get_rs_array();
  $font_disabled = ii_itake('global.tpl_config.font_disabled', 'tpl');
  $tdeletenotice = ii_itake('manage.deletenotice', 'lng');
  if (is_array($trsary))
  {
    foreach($trsary as $trs)
    {
      $tsort = $trs[ii_cfname('sort')];
      if ($trs[ii_cfname('hidden')] == 1) $tsort = str_replace('{$explain}', $tsort, $font_disabled);
      $tmptstr = str_replace('{$sort}', $tsort, $tmpastr);
      $tmptstr = str_replace('{$sortstr}', ii_encode_scripts(str_replace('[]', '[' . ii_htmlencode($trs[ii_cfname('sort')]) . ']', $tdeletenotice)), $tmptstr);
      $tmptstr = str_replace('{$id}', $trs[$nidfield], $tmptstr);
      $tmprstr .= $tmptstr;
    }
  }
  $tmpstr = str_replace('{$cpagestr}', $tcp -> get_pagestr(), $tmpstr);
  $tmpstr = str_replace('{$id}', $tid, $tmpstr);
  $tmpstr = str_replace(WDJA_CINFO, $tmprstr, $tmpstr);
  $tmpstr = str_replace('{$nav_sort}', mm_nav_sort($sgenre, '?sgenre=' . $sgenre . '&id=', $tid), $tmpstr);
  $tmpstr = str_replace('{$upsimg}', $nupsimg, $tmpstr);
  $tmpstr = str_replace('{$sgenre}', $sgenre, $tmpstr);
  $tmpstr = ii_creplace($tmpstr);
  return $tmpstr;
}

function wdja_cms_admin_manage()
{
  switch($_GET['type'])
  {
    case 'edit':
      return wdja_cms_admin_manage_edit();
      break;
    case 'list':
      return wdja_cms_admin_manage_list();
      break;
    default:
      return wdja_cms_admin_manage_list();
      break;
    case 'upload':
      uu_upload_files_html('upload_html');
      break;
  }
}
//****************************************************
// WDJA CMS Power by wdja.net
// Email: shadoweb@qq.com
// Web: http://www.wdja.net/
//****************************************************
?>
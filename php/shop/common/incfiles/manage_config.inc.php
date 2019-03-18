<?php
//****************************************************
// WDJA CMS Power by wdja.cn
// Email: admin@wdja.cn
// Web: http://www.wdja.cn/
//****************************************************
wdja_cms_admin_init();
$nurltype = 0;
$nsearch = 'topic,sort,id';
$ncontrol = 'select,hidden,good,delete';
$ncttype = ii_get_num($_GET['htype'], -1);
if ($ncttype == -1) $ncttype = 0;

function pp_manage_navigation()
{
  return ii_ireplace('manage.navigation', 'tpl');
}

function pp_manage_batch_menu()
{
  return ii_ireplace('manage.batch_menu', 'tpl');
}

function pp_get_post_infos($count)
{
  $tmpstr = '';
  for ($i = 1; $i <= $count; $i ++)
  {
    $tmpstr .= ii_cstr($_POST['infos_topic' . $i]) . '{:::}' . ii_cstr($_POST['infos_link' . $i]) . '{|||}';
  }
  if (!ii_isnull($tmpstr)) $tmpstr = ii_left($tmpstr, mb_strlen($tmpstr, CHARSET) - 5);
  return $tmpstr;
}

function wdja_cms_admin_manage_adddisp()
{
  global $ngenre;
  global $conn;
  global $ndatabase, $nidfield, $nfpre, $nsaveimages;
  $tbackurl = $_GET['backurl'];
  $tclass = ii_get_num($_POST['sort'], 0);
  $tbackurl = ii_replace_querystring('classid', $tclass, $tbackurl);
  $timage = ii_left(ii_cstr($_POST['image']), 255);
  $tsnum = ii_left(ii_cstr($_POST['snum']), 50) ;
  if(ii_isnull($tsnum)) $tsnum = mm_get_shopnum();
  if($nsaveimages == '1' ) $tcontent = ii_left(ii_cstr(saveimages($_POST['content'])), 100000);
  else $tcontent =ii_left(ii_cstr($_POST['content']), 100000);
  $tcontent_images_list = ii_left(ii_cstr($_POST['content_images_list']), 10000);
  if (!($tclass == 0))
  {
    $tsqlstr = "insert into $ndatabase (
    " . ii_cfname('snum') . ",
    " . ii_cfname('topic') . ",
    " . ii_cfname('keywords') . ",
    " . ii_cfname('description') . ",
    " . ii_cfname('image') . ",
    " . ii_cfname('price') . ",
    " . ii_cfname('wprice') . ",
    " . ii_cfname('limitnum') . ",
    " . ii_cfname('unit') . ",
    " . ii_cfname('infos') . ",
    " . ii_cfname('content') . ",
    " . ii_cfname('cttype') . ",
    " . ii_cfname('content_images_list') . ",
    " . ii_cfname('time') . ",
    " . ii_cfname('cls') . ",
    " . ii_cfname('class') . ",
    " . ii_cfname('hidden') . ",
    " . ii_cfname('good') . "
    ) values (
    '" . $tsnum . "',
    '" . ii_left(ii_cstr($_POST['topic']), 50) . "',
  '" . ii_left(ii_cstr($_POST['keywords']), 150) . "',
  '" . ii_left(ii_cstr($_POST['description']), 250) . "',
    '$timage',
    " . ii_get_num($_POST['price']) . ",
    " . ii_get_num($_POST['wprice']) . ",
    " . ii_get_num($_POST['limitnum']) . ",
    '" . ii_left(ii_cstr($_POST['unit']), 50) . "',
    '" . ii_left(pp_get_post_infos(ii_get_num($_POST['infos_date_option'])), 1200) . "',
    '$tcontent',
    " . ii_get_num($_POST['cttype']) . ",
    '$tcontent_images_list',
    '" . ii_now() . "',
    '" . mm_get_sort_cls($tclass) . "',
    $tclass,
    " . ii_get_num($_POST['hidden']) . ",
    " . ii_get_num($_POST['good']) . "
    )";
    $trs = ii_conn_query($tsqlstr, $conn);
    if ($trs)
    {
      $upfid = ii_conn_insert_id($conn);
      //保存自定义属性
      api_save_config($upfid);
      //保存自定义属性
      uu_upload_update_database_note($ngenre, $timage, 'image', $upfid);
      uu_upload_update_database_note($ngenre, $tcontent_images_list, 'content_images', $upfid);
      wdja_cms_admin_msg(ii_itake('global.lng_public.add_succeed', 'lng'), $tbackurl, 1);
    }
    else wdja_cms_admin_msg(ii_itake('global.lng_public.add_failed', 'lng'), $tbackurl, 1);
  }
  else
  {
    wdja_cms_admin_msg(ii_itake('global.lng_public.sudd', 'lng'), $tbackurl, 1);
  }
}

function wdja_cms_admin_manage_editdisp()
{
  global $ngenre;
  global $conn;
  global $ndatabase, $nidfield, $nfpre, $nsaveimages;
  $tbackurl = $_GET['backurl'];
  $tclass = ii_get_num($_POST['sort'], 0);
  $timage = ii_left(ii_cstr($_POST['image']), 255);
  $tsnum = ii_left(ii_cstr($_POST['snum']), 50);
  if(ii_isnull($tsnum)) $tsnum = mm_get_shopnum();
  if($nsaveimages == '1' ) $tcontent = ii_left(ii_cstr(saveimages($_POST['content'])), 100000);
  else $tcontent = ii_left(ii_cstr($_POST['content']), 100000);
  $tcontent_images_list = ii_left(ii_cstr($_POST['content_images_list']), 10000);
  $tid = ii_get_num($_GET['id']);
  if (!($tclass == 0))
  {
    $tsqlstr = "update $ndatabase set
    " . ii_cfname('snum') . "='$tsnum',
    " . ii_cfname('topic') . "='" . ii_left(ii_cstr($_POST['topic']), 50) . "',
    " . ii_cfname('keywords') . "='" . ii_left(ii_cstr($_POST['keywords']), 150) . "',
    " . ii_cfname('description') . "='" . ii_left(ii_cstr($_POST['description']), 250) . "',
    " . ii_cfname('image') . "='$timage',
    " . ii_cfname('price') . "=" . ii_get_num($_POST['price']) . ",
    " . ii_cfname('wprice') . "=" . ii_get_num($_POST['wprice']) . ",
    " . ii_cfname('limitnum') . "=" . ii_get_num($_POST['limitnum']) . ",
    " . ii_cfname('unit') . "='" . ii_left(ii_cstr($_POST['unit']), 50) . "',
    " . ii_cfname('infos') . "='" . ii_left(pp_get_post_infos(ii_get_num($_POST['infos_date_option'])), 1200) . "',
    " . ii_cfname('content') . "='$tcontent',
    " . ii_cfname('cttype') . "=" . ii_get_num($_POST['cttype']) . ",
    " . ii_cfname('content_images_list') . "='$tcontent_images_list',
    " . ii_cfname('time') . "='" . ii_get_date(ii_cstr($_POST['time'])) . "',
    " . ii_cfname('cls') . "='" . mm_get_sort_cls($tclass) . "',
    " . ii_cfname('class') . "=$tclass,
    " . ii_cfname('hidden') . "=" . ii_get_num($_POST['hidden']) . ",
    " . ii_cfname('good') . "=" . ii_get_num($_POST['good']) . "
    where $nidfield=$tid";
    $trs = ii_conn_query($tsqlstr, $conn);
    if ($trs)
    {
      $upfid = $tid;
      api_update_config($tid);
      uu_upload_update_database_note($ngenre, $timage, 'image', $upfid);
      uu_upload_update_database_note($ngenre, $tcontent_images_list, 'content_images', $upfid);
      wdja_cms_admin_msg(ii_itake('global.lng_public.edit_succeed', 'lng'), $tbackurl, 1);
    }
    else wdja_cms_admin_msg(ii_itake('global.lng_public.edit_failed', 'lng'), $tbackurl, 1);
  }
  else
  {
    wdja_cms_admin_msg(ii_itake('global.lng_public.sudd', 'lng'), $tbackurl, 1);
  }
}

function wdja_cms_admin_manage_action()
{
  global $ndatabase, $nidfield, $nfpre, $ncontrol;
  switch($_GET['action'])
  {
    case 'add':
      wdja_cms_admin_manage_adddisp();
      break;
    case 'edit':
      wdja_cms_admin_manage_editdisp();
      break;
    case 'delete':
      wdja_cms_admin_deletedisp($ndatabase, $nidfield);
      break;
    case 'control':
      wdja_cms_admin_controldisp($ndatabase, $nidfield, $nfpre, $ncontrol);
      break;
    case 'batch_shift':
      wdja_cms_admin_batch_shiftdisp($ndatabase, $nidfield, $nfpre);
      break;
    case 'batch_delete':
      wdja_cms_admin_batch_deletedisp($ndatabase, $nidfield, $nfpre);
      break;
    case 'upload':
      uu_upload_files();
      break;
  }
}

function wdja_cms_admin_manage_add()
{
  global $nupsimg, $nupsimgs;
  date_default_timezone_set('PRC');
  $snum = mm_get_shopnum();
  $tmpstr = ii_itake('manage.add', 'tpl');
  $tmpstr = str_replace('{$snum}', $snum, $tmpstr);
  $tmpstr = str_replace('{$upsimg}', $nupsimg, $tmpstr);
  $tmpstr = str_replace('{$upsimgs}', $nupsimgs, $tmpstr);
  $tmpstr = ii_creplace($tmpstr);
  return $tmpstr;
}

function wdja_cms_admin_manage_edit()
{
  global $conn;
  global $ndatabase, $nidfield, $nfpre, $nupsimg, $nupsimgs;
  $tid = ii_get_num($_GET['id']);
  $tsqlstr = "select * from $ndatabase where $nidfield=$tid";
  $trs = ii_conn_query($tsqlstr, $conn);
  $trs = ii_conn_fetch_array($trs);
  if ($trs)
  {
    $tmpstr = ii_itake('manage.edit', 'tpl');
    $tmpastr = ii_ctemplate_infos($tmpstr, '{@recurrence_ida}');
    $tmprstr = '';
    $tinfos = $trs[ii_cfname('infos')];
    if (!ii_isnull($tinfos))
    {
      $ticount = 1;
      $tinfosary = explode('{|||}', $tinfos);
      $tinfoscount = count($tinfosary);
      for ($i = 1; $i <= $tinfoscount; $i ++)
      {
        $tinfostr = $tinfosary[$i - 1];
        if (!ii_isnull($tinfostr))
        {
          $tinfostrary = explode('{:::}', $tinfostr);
          if (count($tinfostrary) == 2)
          {
            $tmptstr = str_replace('{$infos_topic}', $tinfostrary[0], $tmpastr);
            $tmptstr = str_replace('{$infos_link}', $tinfostrary[1], $tmptstr);
            $tmptstr = str_replace('{$inop_i}', $ticount, $tmptstr);
            $ticount += 1;
            $tmprstr .= $tmptstr;
          }
        }
      }
    }
    else $tinfoscount = 0;
    $tmpstr = str_replace(WDJA_CINFO_INFOS, $tmprstr, $tmpstr);
    $tmpstr = str_replace('{$inop_count}', $tinfoscount, $tmpstr);
    foreach ($trs as $key => $val)
    {
      $tkey = ii_get_lrstr($key, '_', 'rightr');
      $GLOBALS['RS_' . $tkey] = $val;
      $tmpstr = str_replace('{$' . $tkey . '}', ii_htmlencode($val), $tmpstr);
    }
    $tmpstr = str_replace('{$id}', $trs[$nidfield], $tmpstr);
    $tmpstr = str_replace('{$upsimg}', $nupsimg, $tmpstr);
    $tmpstr = str_replace('{$upsimgs}', $nupsimgs, $tmpstr);
    $tmpstr = ii_creplace($tmpstr);
    return $tmpstr;
  }
  else
  {
    mm_client_alert(ii_itake('global.lng_public.sudd', 'lng'), -1);
  }
}

function wdja_cms_admin_manage_list()
{
  global $conn, $slng;
  global $ngenre, $nclstype, $npagesize, $nlisttopx;
  global $ndatabase, $nidfield, $nfpre;
  global $sort_database, $sort_idfield, $sort_fpre;
  $toffset = ii_get_num($_GET['offset']);
  $tclassid = ii_get_num($_GET['classid']);
  $search_field = ii_get_safecode($_GET['field']);
  $search_keyword = ii_get_safecode($_GET['keyword']);
  $tmpstr = ii_itake('manage.list', 'tpl');
  $tmpastr = ii_ctemplate($tmpstr, '{@recurrence_ida}');
  $tmprstr = '';
  $tsqlstr = "select * from $ndatabase,$sort_database where $ndatabase." . ii_cfname('class') . "=$sort_database.$sort_idfield and $sort_database." . ii_cfnames($sort_fpre, 'lng') . "='$slng' and $sort_database." . ii_cfnames($sort_fpre, 'genre') . "='$ngenre'";
  if ($tclassid != 0)
  {
    if ($nclstype == 0) $tsqlstr .= " and $ndatabase." . ii_cfname('class') . "=$tclassid";
    else $tsqlstr .= " and $ndatabase." . ii_cfname('cls') . " like '%|" . $tclassid . "|%'";
  }
  if ($search_field == 'topic') $tsqlstr .= " and $ndatabase." . ii_cfname('topic') . " like '%" . $search_keyword . "%'";
  if ($search_field == 'sort') $tsqlstr .= " and $sort_database." . ii_cfnames($sort_fpre, 'sort') . " like '%" . $search_keyword . "%'";
  if ($search_field == 'good') $tsqlstr .= " and $ndatabase." . ii_cfname('good') . "=" . ii_get_num($search_keyword);
  if ($search_field == 'hidden') $tsqlstr .= " and $ndatabase." . ii_cfname('hidden') . "=" . ii_get_num($search_keyword);
  if ($search_field == 'id') $tsqlstr .= " and $ndatabase.$nidfield=" . ii_get_num($search_keyword);
  $tsqlstr .= " order by $ndatabase." . ii_cfname('time') . " desc";
  $tcp = new cc_cutepage;
  $tcp -> id = $nidfield;
  $tcp -> sqlstr = $tsqlstr;
  $tcp -> offset = $toffset;
  $tcp -> pagesize = $npagesize;
  $tcp -> rslimit = $nlisttopx;
  $tcp -> init();
  $trsary = $tcp -> get_rs_array();
  $font_disabled = ii_itake('global.tpl_config.font_disabled', 'tpl');
  $postfix_good = ii_ireplace('global.tpl_config.postfix_good', 'tpl');
  if (!(ii_isnull($search_keyword)) && $search_field == 'topic') $font_red = ii_itake('global.tpl_config.font_red', 'tpl');
  if (is_array($trsary))
  {
    foreach($trsary as $trs)
    {
      $ttopic = ii_htmlencode($trs[ii_cfname('topic')]);
      if (isset($font_red))
      {
        $font_red = str_replace('{$explain}', $search_keyword, $font_red);
        $ttopic = str_replace($search_keyword, $font_red, $ttopic);
      }
      if ($trs[ii_cfname('hidden')] == 1) $ttopic = str_replace('{$explain}', $ttopic, $font_disabled);
      if ($trs[ii_cfname('good')] == 1) $ttopic .= $postfix_good;
      $tmptstr = str_replace('{$topic}', $ttopic, $tmpastr);
      $tmptstr = str_replace('{$topicstr}', ii_encode_scripts(ii_htmlencode($trs[ii_cfname('topic')])), $tmptstr);
      $tmptstr = str_replace('{$sort}', ii_htmlencode($trs[ii_cfnames($sort_fpre, 'sort')]), $tmptstr);
      $tmptstr = str_replace('{$classid}', ii_get_num($trs[$sort_idfield]), $tmptstr);
      $tmptstr = str_replace('{$time}', ii_get_date($trs[ii_cfname('time')]), $tmptstr);
      $tmptstr = str_replace('{$id}', ii_get_num($trs[$nidfield]), $tmptstr);
      $tmprstr .= $tmptstr;
    }
  }
  $tmpstr = str_replace('{$cpagestr}', $tcp -> get_pagestr(), $tmpstr);
  $tmpstr = str_replace(WDJA_CINFO, $tmprstr, $tmpstr);
  $tmpstr = str_replace('{$nav_sort}', mm_nav_sort($ngenre, '?classid=', $tclassid), $tmpstr);
  $tmpstr = str_replace('{$nav_sort_child}', mm_nav_sort_child($ngenre, '?classid=', $tclassid, 6), $tmpstr);
  $tmpstr = ii_creplace($tmpstr);
  return $tmpstr;
}

function wdja_cms_admin_manage_batch_shift()
{
  $tmpstr = ii_ireplace('manage.batch_shift', 'tpl');
  return $tmpstr;
}

function wdja_cms_admin_manage_batch_delete()
{
  $tmpstr = ii_ireplace('manage.batch_delete', 'tpl');
  return $tmpstr;
}

function wdja_cms_admin_manage_displace()
{
  switch($_GET['mtype'])
  {
    case 'batch_shift':
      return wdja_cms_admin_manage_batch_shift();
      break;
    case 'batch_delete':
      return wdja_cms_admin_manage_batch_delete();
      break;
    default:
      return wdja_cms_admin_manage_batch_shift();
      break;
  }
}

function wdja_cms_admin_manage()
{
  switch($_GET['type'])
  {
    case 'add':
      return wdja_cms_admin_manage_add();
      break;
    case 'edit':
      return wdja_cms_admin_manage_edit();
      break;
    case 'list':
      return wdja_cms_admin_manage_list();
      break;
    case 'displace':
      return wdja_cms_admin_manage_displace();
      break;
    case 'upload':
      uu_upload_files_html('upload_html');
      break;
    default:
      return wdja_cms_admin_manage_list();
      break;
  }
}
//****************************************************
// WDJA CMS Power by wdja.cn
// Email: admin@wdja.cn
// Web: http://www.wdja.cn/
//****************************************************
?>

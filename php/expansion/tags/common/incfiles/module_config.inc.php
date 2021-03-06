<?php
//****************************************************
// WDJA CMS Power by wdja.net
// Email: shadoweb@qq.com
// Web: http://www.wdja.net/
//****************************************************
function pp_nhotwords_genre($topic)
{
        global $nhotwords_genre;
        $tngenres = explode(',', $nhotwords_genre);
        $tmpstr = ii_itake('module.module', 'tpl');
        for ($ti = 0; $ti < count($tngenres); $ti ++)
        {
            $tngenre = $tngenres[$ti];
            $tmptstr = str_replace('{$module}', $tngenre, $tmpstr);
            $tmptstr = str_replace('{$topic}', $topic, $tmptstr);
            $tmprstr .= ii_creplace($tmptstr);
	    }
         $tmpstr = $tmprstr;
         return $tmpstr;
}

function wdja_cms_module_list()
{
  global $conn, $nlng, $ngenre;
  $tclassid = ii_get_num($_GET['classid']);
  $toffset = ii_get_num($_GET['offset']);
  global $nclstype, $nlisttopx, $npagesize, $nkeywords, $ndescription;
  global $ndatabase, $nidfield, $nfpre;
  $tclassids = mm_get_sortids($ngenre, $nlng);
  $tmpstr = ii_itake('module.list', 'tpl');
  $tmpastr = ii_ctemplate($tmpstr, '{@recurrence_ida}');
  $tmprstr = '';
  $tsqlstr = "select * from $ndatabase where " . ii_cfname('hidden') . "=0";
  if ($tclassid != 0)
  {
    if (ii_cinstr($tclassids, $tclassid, ','))
    {
      mm_cntitle(mm_get_sorttext($ngenre, $nlng, $tclassid));
      mm_cnkeywords(mm_get_sortkeywords($ngenre, $nlng, $tclassid));
      mm_cndescription(mm_get_sortdescription($ngenre, $nlng, $tclassid));
      if ($nclstype == 0) $tsqlstr .= " and " . ii_cfname('class') . "=$tclassid";
      else $tsqlstr .= " and " . ii_cfname('cls') . " like '%|" . $tclassid . "|%'";
    }
  }
elseif(ii_isnull($tclassid)){
      mm_cnkeywords($nkeywords);
      mm_cndescription($ndescription);
}else
  {
    if (!ii_isnull($tclassids)) $tsqlstr .= " and " . ii_cfname('class') . " in ($tclassids)";
  }
  $tsqlstr .= " order by " . ii_cfname('time') . " desc";
  $tcp = new cc_cutepage;
  $tcp -> id = $nidfield;
  $tcp -> pagesize = $npagesize;
  $tcp -> rslimit = $nlisttopx;
  $tcp -> sqlstr = $tsqlstr;
  $tcp -> offset = $toffset;
  $tcp -> listkey = $tclassid;
  $tcp -> init();
  $trsary = $tcp -> get_rs_array();
  if (is_array($trsary))
  {
    foreach($trsary as $trs)
    {
      $tmptstr = $tmpastr;
      foreach ($trs as $key => $val)
      {
        $tkey = ii_get_lrstr($key, '_', 'rightr');
        $GLOBALS['RS_' . $tkey] = $val;
        $tmptstr = str_replace('{$' . $tkey . '}', ii_htmlencode($val), $tmptstr);
      }
	  $tgourl = mm_get_field($ngenre,$trs[$nidfield],'gourl');
	  if(!ii_isnull($tgourl)) $turl = $tgourl;
	  else $turl = '/'.$ngenre.'/?type=detail&id='.$trs[$nidfield];
      $tmptstr = str_replace('{$id}', $trs[$nidfield], $tmptstr);
      $tmptstr = str_replace('{$sum}', '('.api_tags_sum($trs[$nidfield]).')', $tmptstr);
      $tmptstr = str_replace('{$url}', $turl, $tmptstr);
      $tmptstr = ii_creplace($tmptstr);
      $tmprstr .= $tmptstr;
    }
  }
  $tmpstr = str_replace(WDJA_CINFO, $tmprstr, $tmpstr);
  $tmpstr = str_replace('{$cpagestr}', $tcp -> get_pagestr(), $tmpstr);
  $tmpstr = str_replace('{$genre}', $ngenre, $tmpstr);
  $tmpstr = ii_creplace($tmpstr);
  return $tmpstr;
}

function wdja_cms_module_detail()
{
  global $conn, $ngenre;
  $tid = ii_get_num($_GET['id']);
  $tpage = ii_get_num($_GET['page']);
  global $ndatabase, $nidfield, $nfpre;
  $tsqlstr = "select * from $ndatabase where " . ii_cfname('hidden') . "=0 and $nidfield=$tid";
  $trs = ii_conn_query($tsqlstr, $conn);
  $trs = ii_conn_fetch_array($trs);
  if ($trs)
  {
    $tid = $trs[$nidfield];
    $tgourl = mm_get_field($ngenre,$tid,'gourl');
    if(!ii_isnull($tgourl)){
      header("HTTP/1.1 301 Moved Permanently");
      header ("Location:$tgourl");
      exit;
    }
    $tcount = $trs[ii_cfname('count')] + 1;
    mm_update_field($ngenre,$trs[$nidfield],'count',$tcount);//访问一次,更新一次访问次数+1;
    $tmpstr = ii_itake('module.detail', 'tpl');
    mm_cntitle(ii_htmlencode($trs[ii_cfname('topic')]));
    mm_cnkeywords(ii_htmlencode($trs[ii_cfname('keywords')]));
    mm_cndescription(ii_htmlencode($trs[ii_cfname('description')]));
    foreach ($trs as $key => $val)
    {
      $tkey = ii_get_lrstr($key, '_', 'rightr');
      $GLOBALS['RS_' . $tkey] = $val;
      $tmpstr = str_replace('{$' . $tkey . '}', ii_htmlencode($val), $tmpstr);
    }
    $tmpstr = str_replace('{$id}', $trs[$nidfield], $tmpstr);
    $tmpstr = str_replace('{$genre}', $ngenre, $tmpstr);
    $tmpstr = str_replace('{$page}', $tpage, $tmpstr);
    $tmpstr = ii_creplace($tmpstr);
    return $tmpstr;
  }
}

function wdja_cms_module_frame()
{
  global $ngenre;
  $tmpstr = ii_itake('module.frame', 'tpl');
  $tmpstr = str_replace('{$genre}', $ngenre, $tmpstr);
  $tmpstr = ii_creplace($tmpstr);
  if (!ii_isnull($tmpstr)) return $tmpstr;
  else return wdja_cms_module_list();
}

function wdja_cms_module_index()
{
  global $ngenre;
  $tmpstr = ii_itake('module.index', 'tpl');
  $tmpstr = str_replace('{$genre}', $ngenre, $tmpstr);
  $tmpstr = ii_creplace($tmpstr);
  if (!ii_isnull($tmpstr)) return $tmpstr;
  else return wdja_cms_module_list();
}

function wdja_cms_module()
{
  switch($_GET['type'])
  {
    case 'list':
      return wdja_cms_module_list();
      break;
    case 'detail':
      return wdja_cms_module_detail();
      break;
    case 'frame':
      return wdja_cms_module_frame();
      break;
    case 'index':
      return wdja_cms_module_index();
      break;
    default:
      return wdja_cms_module_index();
      break;
  }
}

//****************************************************
// WDJA CMS Power by wdja.net
// Email: shadoweb@qq.com
// Web: http://www.wdja.net/
//****************************************************
?>
<?php
//****************************************************
// WDJA CMS Power by wdja.cn
// Email: admin@wdja.cn
// Web: http://www.wdja.cn/
//****************************************************

function pp_get_language_select()
{
  $tary = ii_get_valid_module();
  if (is_array($tary))
  {
    $tmpstr = '';
    $option_unselected = ii_itake('global.tpl_config.option_unselect', 'tpl');
    foreach ($tary as $key => $val)
    {
      $tmprstr = $option_unselected;
      if(file_exists(ii_get_actual_route($val) . '/common/language/module' . XML_SFX)){
        $tmprstr = str_replace('{$explain}', '(' . mm_get_genre_description($val) . ')', $tmprstr);
        //$tmprstr = str_replace('{$explain}', '(' . mm_get_genre_description($val) . ')' . $val, $tmprstr);
        $tmprstr = str_replace('{$value}', $val, $tmprstr);
      }
      else continue;
      $tmpstr .= $tmprstr;
    }
    return $tmpstr;
  }
}




function pp_get_language_root($strers)
{
  if (!ii_isnull($strers))
  {
    $tary = explode('.', $strers);
    if (count($tary) == 3)
    {
      $tmpstr = ii_get_actual_route($tary[0]);
      if (ii_right($tmpstr, 1) != '/') $tmpstr .= '/';
      switch($tary[1])
      {
        case 'lng':
          $tmproot = 'common/language/';
          break;
        default:
          $tmproot = 'common/';
          break;
      }
      $tmpstr = $tmpstr . $tmproot . $tary[2];
      return $tmpstr;
    }
  }
}

function wdja_cms_admin_manage_editdisp()
{
  $tbackurl = $_GET['backurl'];
  $tburl = $_POST['xmlconfig_burl'];
  $tnode = $_POST['xmlconfig_node'];
  $tfield = $_POST['xmlconfig_field'];
  $tbase = $_POST['xmlconfig_base'];
  $torder = $_POST['xmlconfig_order'];
  if (ii_right($torder, 1) == ',') $torder = ii_left($torder, (strlen($torder) - 1));
  $tnew_node_ary = $_POST['xmlconfig_new_node'];
  $tis_new_node = 0;
  if (is_array($tnew_node_ary))
  {
    foreach($tnew_node_ary as $key => $val)
    {
      if (!ii_isnull($val)) $tis_new_node = 1;
    }
  }
  if ($tis_new_node == 1) $torder .= ',xmlconfig_new_node';
  if (file_exists($tburl) && (!ii_isnull($tnode)) && (!ii_isnull($tfield)) && (!ii_isnull($tbase)))
  {
    $tmpstr = '';
    $tmode = ii_get_xrootatt($tburl, 'mode');
    $tfieldary = explode(',', $tfield);
    $torderary = explode(',', $torder);
    $tub = count($tfieldary);
    $tmpstr .= '<?xml version="1.0" encoding="' . CHARSET . '"?>' . CRLF;
    $tmpstr .= '<xml mode="' . $tmode . '" author="wdja">' . CRLF;
    $tmpstr .= '  <configure>' . CRLF;
    $tmpstr .= '    <node>' . $tnode . '</node>' . CRLF;
    $tmpstr .= '    <field>' . $tfield . '</field>' . CRLF;
    $tmpstr .= '    <base>' . $tbase . '</base>' . CRLF;
    $tmpstr .= '  </configure>' . CRLF;
    $tmpstr .= '  <' . $tbase . '>' . CRLF;
    foreach($torderary as $key => $val)
    {
      $tmpstr .= '    <' . $tnode . '>' . CRLF;
      $tpstr = $_POST[$val];
      if (is_array($tpstr))
      {
        if (count($tpstr) == $tub)
        {
          for ($i = 0; $i <= ($tub - 1); $i ++)
          {
            $tmpstr .= '      <' . $tfieldary[$i] . '><![CDATA[' . stripslashes(ii_cstr($tpstr[$i])) . ']]></' . $tfieldary[$i] . '>' . CRLF;;
          }
        }
      }
      $tmpstr .= '    </' . $tnode . '>' . CRLF;
    }
    $tmpstr .= '  </' . $tbase . '>' . CRLF;
    $tmpstr .= '</xml>' . CRLF;
    if (file_put_contents($tburl, $tmpstr)) wdja_cms_admin_msg(ii_itake('global.lng_public.succeed', 'lng'), $tbackurl, 1);
    else wdja_cms_admin_msg(ii_itake('global.lng_public.failed', 'lng'), $tbackurl, 1);
  }
}

function wdja_cms_admin_manage_action()
{
  global $ndatabase, $nidfield, $nfpre, $ncontrol;
  switch($_GET['action'])
  {
    case 'edit':
      wdja_cms_admin_manage_editdisp();
      break;
  }
}

function wdja_cms_admin_manage_edit()
{
  $txml = $_GET['xml'];
  $tmodule = ii_get_safecode($_GET['module']);
  if(!ii_isnull($txml)) $trootstr = pp_get_language_root($txml) . XML_SFX;
  elseif($tmodule == 'common') $trootstr = ii_get_actual_route() . '/common/language/module' . XML_SFX;
  else $trootstr = ii_get_actual_route($tmodule) . '/common/language/module' . XML_SFX;
  //echo $trootstr;exit;
  if (file_exists($trootstr))
  {
    $tmpstr = ii_ireplace('manage.language', 'tpl');
    $tmpastr = ii_ctemplate($tmpstr, '{@xml_recurrence_ida}');
    $delete_notice = ii_itake('global.lng_public.delete_notice', 'lng');
    $tdoc = new DOMDocument();
    $tdoc -> load($trootstr);
    $txpath = new DOMXPath($tdoc);
    $tquery = '//xml/configure/node';
    $tnode = $txpath -> query($tquery) -> item(0) -> nodeValue;
    $tquery = '//xml/configure/field';
    $tfield = $txpath -> query($tquery) -> item(0) -> nodeValue;
    $tquery = '//xml/configure/base';
    $tbase = $txpath -> query($tquery) -> item(0) -> nodeValue;
    $tfieldary = explode(',', $tfield);
    $tlength = count($tfieldary) - 1;
    $tquery = '//xml/' . $tbase . '/' . $tnode;
    $trests = $txpath -> query($tquery);
    foreach ($trests as $trest)
    {
      $tnodelength = $trest -> childNodes -> length;
      for ($i = 0; $i <= $tlength; $i += 1)
      {
        $ti = $i * 2 + 1;
        if ($ti < $tnodelength)
        {
          $trows = 5;
          $tdisplay = 'none';
          if ($ti == 1)
          {
            $trows = 1;
            $tdisplay = 'block';
            $tname = $trest -> childNodes -> item($ti) -> nodeValue;
            $torder .= $tname . ',';
          }
          $tmptstr = $tmpastr;
          $tmptstr = str_replace('{$rows}', $trows, $tmptstr);
          $tmptstr = str_replace('{$disinfo}', ii_htmlencode($trest -> childNodes -> item($ti) -> nodeName), $tmptstr);
          $tmptstr = str_replace('{$name}', $tname, $tmptstr);
          $tmptstr = str_replace('{$namestr}', urlencode($tname), $tmptstr);
          $tmptstr = str_replace('{$value}', ii_htmlencode($trest -> childNodes -> item($ti) -> nodeValue), $tmptstr);
          $tmptstr = str_replace('{$delete_notice}', ii_encode_scripts(str_replace('[]', '[' . $tname . ']', $delete_notice)), $tmptstr);
          $tmptstr = str_replace('{$display}', $tdisplay, $tmptstr);
          $tmprstr = $tmprstr . $tmptstr;
        }
        else continue;
      }
    }
    $tmpstr = str_replace(WDJA_CINFO, $tmprstr, $tmpstr);
    $tmprstr = '';
    $tmpastr = ii_ctemplate($tmpstr, '{@xml_recurrence_idb}');
    for ($i = 0; $i <= $tlength; $i += 1)
    {
      $trows = 5;
      if ($i == 0) $trows = 1;
      $tmptstr = $tmpastr;
      $tmptstr = str_replace('{$rows}', $trows, $tmptstr);
      $tmptstr = str_replace('{$disinfo}', $tfieldary[$i], $tmptstr);
      $tmprstr = $tmprstr . $tmptstr;
    }
    $tmpstr = str_replace(WDJA_CINFO, $tmprstr, $tmpstr);
    $tmpstr = str_replace('{$node}', $tnode, $tmpstr);
    $tmpstr = str_replace('{$field}', $tfield, $tmpstr);
    $tmpstr = str_replace('{$base}', $tbase, $tmpstr);
    $tmpstr = str_replace('{$burl}', $trootstr, $tmpstr);
    $tmpstr = str_replace('{$order}', $torder, $tmpstr);
    return $tmpstr;
  }
  else mm_client_alert(ii_itake('manage.notexists', 'lng'), -1);
}

function wdja_cms_admin_manage()
{
  switch($_GET['type'])
  {
    case 'edit':
      return wdja_cms_admin_manage_edit();
      break;
    default:
      return wdja_cms_admin_manage_edit();
      break;
  }
}
//****************************************************
// WDJA CMS Power by wdja.cn
// Email: admin@wdja.cn
// Web: http://www.wdja.cn/
//****************************************************
?>
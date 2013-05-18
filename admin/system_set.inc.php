<?php
if(!defined('IN_SITE')) exit('Access Denied');

//权限检查
CheckAccess();
admin_priv('system_set');

$_COMMONURL = array();
$_COMMONURL['default'] = array('?action='.$act['action'].'&todo=show','system_title');


//程序参数安全处理
$_TODOLIST = array('show','saveset','ajax','skin','saveskin');
check_todo($todo,$_TODOLIST);


if($todo=="show")
{
    if($setting_sitestatus == '1')
    {
        $check1 = "checked";
        $check2 = "";
    }
    elseif($setting_sitestatus == '0')
    {
    	$check1 = "";
        $check2 = "checked";
    }
	
    include template('system');
}
elseif($todo=='skin')
{
	$class_info = $declare_info = '';
	//如果配置申报网站已经开启
	if($enable_declare)
	{
		$declare_info = get_template_info($setting_sitetemplate . '/declare/','templates/');
	}
	
	//$class_info = get_template_info($setting_sitetemplate . '/class/','templates/');
	$index_array = array();
	$j = 0;
	for($i = 0 ; $i< $index_num; $i++)
	{	
		$j = $i + 1; 
		$index_array[] = $j;
	}
	
	$query = $db->query("SELECT * FROM {$tablepre}sitemodule WHERE moduletype != 'Course' ORDER BY id DESC");
	$modules = array();
	while($module = $db->fetch_array($query))
	{
		$modules[] = $module;
	}
	$settings = $nums = $formats = $arr = array();
	for($i=0;$i<=9;$i++)
	{
		$arr = explode(',',${'setting_siteindex'.$i});
		$settings[$i] = $arr[0];
		$nums[$i]     = $arr[1];
		$titles[$i]   = $arr[2];
		$formats[$i]  = $arr[3];
	}
	include template('system_skin');
}
elseif($todo=="saveset")
{
	$settings_result = $db->query("SELECT * FROM {$tablepre}settings");
	while($settings = $db->fetch_array($settings_result) ) 
	{
		if(isset($_POST['setting_'.$settings['variable']])) 
		{
			$db->query("UPDATE {$tablepre}settings SET value = '".$_POST['setting_'.$settings['variable']]."' WHERE variable = '".$settings['variable']."' ");
		}
	}
	//ajaxs('system_setconfig_success');
    s('system_setconfig_success','?action='.$act['action'].'&todo=show');
}
elseif($todo=="saveskin")
{
    for($i=0;$i<=9;$i++)
    {
    	if(isset($_POST['setting_sitemoduleid'.$i]) && isset($_POST['setting_sitelistnum'.$i]) && isset($_POST['setting_sitetitlenum'.$i]) && isset($_POST['setting_sitetimeformat'.$i]) )
    	{
    		$value = intval($_POST['setting_sitemoduleid'.$i]) . ','  .  intval($_POST['setting_sitelistnum'.$i]) .',' . trim($_POST['setting_sitetitlenum'.$i]) .',' . trim($_POST['setting_sitetimeformat'.$i]);
    		$db->query("UPDATE {$tablepre}settings SET value = '{$value}' WHERE variable = 'siteindex{$i}' ");
    	}
    }
    s('system_setconfig_success','?action='.$act['action'].'&todo=skin');
}
elseif($todo=="ajax")//显示文件框架
{
	$available_templates = getTemplateArr('templates/');
	include template('template_declare');
} 

function getTemplateArr($dir)
{
	$available_templates = array();
	$this_Dirs           = array();
	$template_dir        = opendir($dir);
	while ($file = readdir($template_dir))
	{
		//过滤目录
		if(preg_match('/^\.$/',$file)) continue;
		if(preg_match('/^\.\.$/',$file)) continue;
		//过滤.开头文件夹
		if(preg_match('/^\..+$/',$file)) continue;
		$available_templates[] = $file;
	}
	closedir($template_dir);
    return  $available_templates;
} 



?>

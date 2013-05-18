<?php
if(!defined('IN_SITE')) exit('Access Denied');




#程序参数安全处理
$_TODOLIST = array('class','ajaxview','ajaxchoose');
check_todo($todo,$_TODOLIST); 

#课程网站
if($todo=="class")
{
	if($_GET['choose'] == 'yes')
	{
		$choose = true;
		CheckTeacherAccess();
	}
	else
	{
		CheckAccess();
	}

	/* 项目需求需要,注释
	$tmpresult = $db->query("SELECT * FROM {$tablepre}template_bigclass");
	$templates = array();
	while($template = $db->fetch_array($tmpresult))
	{
		$templates[] = $template;
	}
	*/
	$available_templates = array();
    $available_templates = getTemplateArr(CLASSDIR);
	$choose = $_GET['choose'] == 'yes' ? true : false;
	
    include template('template_class_list');
}
elseif($todo=="ajaxview")
{
	//权限检查
	//admin_priv($act['action']);
	CheckAccess();

    $dir = $_GET['dir'];
    $available_templates    = array();
    $available_templates = getTemplateArr(CLASSDIR.$dir);
    if(count($available_templates) == 0)
    	echo $lang['theme_dir_empty'];
    include template('template_view');   
    
}
elseif($todo=="ajaxchoose")
{
	//检查教师权限
	CheckTeacherAccess();

    $dir = $_GET['dir'];
    $available_templates    = array();
    $available_templates = getTemplateArr(CLASSDIR.$dir);
    if(count($available_templates) == 0)
    	echo $lang['theme_dir_empty'];
    include template('template_choose');   
}


function getTemplateArr($dir)
{
    $available_templates    = array();
    $template_dir           = @opendir($dir);
    while ($file = readdir($template_dir))
    {
        if ($file != '.' && $file != '..' && is_dir($dir . $file) && $file != '.svn')
        {
            $available_templates[] = get_template_info($file,$dir);
        }
    }
    @closedir($template_dir);
    return  $available_templates;
} 

function getSmallClassById($id)
{
	global $db,$tablepre;
	$tmpresult = $db->query("SELECT * FROM {$tablepre}template_smallclass WHERE fid = $id");
	$templates = array();
	while($template = $db->fetch_array($tmpresult))
	{
		$templates[] = $template;
	}
	return $templates;
}   
?>

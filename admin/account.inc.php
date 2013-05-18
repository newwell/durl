<?php
if(!defined('IN_SITE')) exit('Access Denied');
$mid  = isset($_REQUEST['mid']) ? intval($_REQUEST['mid']) : 0;
define('JUMPURL','?action=account&todo=list&mid='.$mid);
if($todo=='list')
{
    $page   = intval( isset($_GET['page']) ? $_GET['page'] : 1 );
	$perpage = intval( isset($_GET['perpage']) ? $_GET['perpage'] : 10 );
	if($page > 0)
	{
		$startlimit = ($page - 1) * $perpage;
	}
	else
	{
		$startlimit = 0;
	}
	//分页类参数数组
	$page_array = array();
	$result     = $db->fetch_one_array("SELECT COUNT(id) AS countnum FROM {$tablepre}judge where q_type = 4 AND moduleid = $mid");
	$total    = $result['countnum'];
	$query    = $db->query("SELECT * FROM {$tablepre}judge where q_type = 4 AND moduleid = $mid ORDER BY id DESC LIMIT $startlimit,$perpage ");
	$judges = array();
	
	while($judge = $db->fetch_array($query))
	{
		//$select['question'] = sub_str($select['question'],0,650,true);
		$judge['addtime']  = gmdate('Y-n-j  H:i',$judge['addtime']);
		$judges[] = $judge;
	}  
	$page_control = multipage($total,$perpage,$page);
	include template('account_list');
}
elseif($todo=='addjudge')
{
	include template('account_add');
}
elseif($todo=='savejudge')
{
	$question  = $_POST["question"];
	$answer  = $_POST["answer"];
  
	if(empty($question))
	{
		e('answer');
	}
	if(empty($question))
	{
		e('answer');
	}

$db->query("insert into {$tablepre}judge(question,answer,addtime,q_type,moduleid) values('$question','$answer',$localtime,4,$mid)");
	s('question_add_success',JUMPURL);
}
elseif($todo=='editjudge')
{
	$id = intval($_GET['id']);
	$judgeinfo = $db->fetch_one_array("SELECT * FROM {$tablepre}judge WHERE id = $id and q_type = 4");
	include template('account_edit');
}
elseif($todo=='saveeditjudge')
{
	$question  = $_POST["question"];
	$answer  = $_POST["answer"];
	$id = $_POST["id"];
	if(empty($question))
	{
		e('question');
	}
$db->query("UPDATE {$tablepre}judge set question='$question',answer = '$answer',addtime = $localtime WHERE id = $id");
	s('question_edit_success',JUMPURL);
}
elseif($todo=='deljudge')
{
	$id = isset($_POST['id']) ? $_POST['id'] : '' ;
	if(is_array($id))
	{
		foreach($id as $value)
		{
			$db->query("DELETE FROM {$tablepre}judge WHERE id = " .intval($value));
		}
	}
	s('select_del_ok',JUMPURL);
}
?>
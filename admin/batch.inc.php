<?php
if(!defined('IN_SITE')) exit('Access Denied');
CheckAccess();
global $act,$todo,$tablepre,$db;
admin_priv($act['action']);
require_once 'include/func/shorturl.func.php';
switch ($todo) {
	case 'doout':
		$start	= strtotime(isset($_POST['start']) ? $_POST['start'] : '');
		$end	= strtotime(isset($_POST['end']) ? $_POST['end'] : '');
		
		if (empty($start)||empty($end))e('选择一个时间');
		
		
		break;
	case 'out':
		include template('batch_out');
		break;
	case 'saveadd':
		$urls	= isset($_POST['urls']) ? $_POST['urls'] : '';
		$urls = str_replace("\n", '<---dazan-->', $urls); 
		$urls = explode('<---dazan-->', $urls);
		$urls = array_filter($urls);
		$log = '值为为非链接的有:<br/>';
		$i = 0;
		foreach ($urls as $key => $value) {
			$value = trim($value);
			if (!filter_var($value,FILTER_VALIDATE_URL)){
				$pai = $key+1;
				$log .= "第".$pai."排<br/>";
			}else {
				shorturl_add(array(
					'url'=>$value,
					'add_date'=>$localtime
				));
				$i++;
			};
		}
		echo '成功添加'.$i.'条!<br/>';
		echo $log;
		break;
	case 'add':
		include template('batch_add');
		break;
	case 'list':
	default:
		$page   = intval( isset($_GET['page']) ? $_GET['page'] : 1 );
		$perpage = intval( isset($_GET['perpage']) ? $_GET['perpage'] : 20 );
		if($page > 0){
			$startlimit = ($page - 1) * $perpage;
		}else{
			$startlimit = 0;
		}
		$page_array = array();
		$total		= shorturl_total();
		$page_control = multipage($total,$perpage,$page);
		$durlArr	= shorturl_list($startlimit, $perpage);		
		include template('shorturl_list');
	break;
}
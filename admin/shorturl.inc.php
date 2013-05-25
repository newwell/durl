<?php
if(!defined('IN_SITE')) exit('Access Denied');
CheckAccess();
global $act,$todo,$tablepre,$db;
admin_priv($act['action']);
require_once 'include/func/shorturl.func.php';
switch ($todo) {
	case 'dorestore':
		$code	= isset($_POST['code']) ? $_POST['code'] : '';
		//if (empty($code))e('未输入短码');
		$result = shorturl_restore($code);
		echo json_encode($result);
		//输出到浏览器
		ob_flush();
		exit();
		break;
	case 'restore':
		include template('shorturl_restore');
		break;
	case 'saveadd':
		$url	= htmlspecialchars( isset($_POST['url']) ? $_POST['url'] : '' );
		$alias	= htmlspecialchars( isset($_POST['alias']) ? $_POST['alias'] : '' );
		$annotation	= htmlspecialchars( isset($_POST['annotation']) ? $_POST['annotation'] : '' );
		if (empty($url)) e('链接地址不能为空');
		if (!empty($alias)) {
			if (shorturl_alias_check('', $alias))e('别名已经别占用');
		}
		$result = shorturl_add(array(
			'url'=>$url,
			'alias'=>$alias,
			'annotation'=>$annotation,
			'add_date'=>$localtime,
		));
		if ($result) {
			s('添加成功','?action=shorturl_list&todo=list');
		}else {
			e('添加失败');
		}
		break;
	case 'add':
		include template('shorturl_add');
		break;
	case 'saveupdate':
		$id		= intval( isset($_POST['id']) ? $_POST['id'] : '' );
		$url	= htmlspecialchars( isset($_POST['url']) ? $_POST['url'] : '' );
		$alias	= htmlspecialchars( isset($_POST['alias']) ? $_POST['alias'] : '' );
		$annotation	= htmlspecialchars( isset($_POST['annotation']) ? $_POST['annotation'] : '' );
		
		if (empty($id)) e('传参错误');
		if (empty($url)) e('链接地址不能为空');
		if (!empty($alias)) {
			if (shorturl_alias_check($id, $alias))e('别名已经别占用');
		}
		$result = shorturl_update($id, array(
			'url'=>$url,
			'alias'=>$alias,
			'annotation'=>$annotation,
			'add_date'=>$localtime,
		));
		if ($result) {
			s('修改成功','?action=shorturl_list&todo=list');
		}else {
			e('修改失败');
		}
		break;
	case 'update':
		$id	= intval( isset($_GET['id']) ? $_GET['id'] : '' );
		if (empty($id)) e('传参错误');
		$durlInfo = shorturl_get(array($id));
		include template('shorturl_update');
		break;
	case 'del':
		$ids   = isset($_POST['ids']) ? $_POST['ids'] : '';
		if (empty($_POST['ids'])) {
			e('请自少选择一项');
		}
		if (shorturl_del($ids)) {
			s('删除成功','?action=shorturl_list&todo=list');
		}
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
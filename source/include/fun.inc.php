<?php

/**
 * 分页函数
 *
 * @access  public
 *
 * @param   int      	$num        总数
 * @param   int         $perpage    每页数目
 * @param   int         $curpage    当前页
 * @param   bool        $append     是否附加省略号
 *
 * @return  string
 */
function multipage($num, $perpage, $curpage, $maxpages = 0, $page = 10, $simple = 0, $onclick = ''){
	global $_m;
	$id = isset($_GET['id'])?htmlspecialchars($_GET['id']):'';
	$multipage = '';
	$onclick = $onclick ? ' onclick="'.$onclick.'(event)"' : '';
	//url处理
	$mpurl = $_SERVER['REQUEST_URI'];
	//print_r($_SERVER);exit;
	if(isset($_SERVER['QUERY_STRING']))
	{
		$mpurl .= '?' . preg_replace('/&page=[0-9]*/','',$_SERVER['QUERY_STRING']) . '&';
	}
	//$mpurl .= '&';
	if($num > $perpage) {
		$offset = 2;

		$realpages = @ceil($num / $perpage);
		$pages = $maxpages && $maxpages < $realpages ? $maxpages : $realpages;

		if($page > $pages) {
			$from = 1;
			$to = $pages;
		} else {
			$from = $curpage - $offset;
			$to = $from + $page - 1;
			if($from < 1) {
				$to = $curpage + 1 - $from;
				$from = 1;
				if($to - $from < $page) {
					$to = $page;
				}
			} elseif($to > $pages) {
				$from = $pages - $page + 1;
				$to = $pages;
			}
		}

		$multipage = ($curpage - $offset > 1 && $pages > $page ? '[<a href="'.build_uri($_m, array('id'=>$id,'page'=>1),false).'" class="p_redirect"'.$onclick.'>&lsaquo;</a>]' : '').
			($curpage > 1 && !$simple ? '[<a href="'.build_uri($_m, array('id'=>$id,'page'=>($curpage - 1)),false).'" class="p_redirect" rel="prev">上一页</a>]&nbsp;' : '');
		for($i = $from; $i <= $to; $i++) {
			$multipage .= $i == $curpage ? '[<a class="p_curpage">'.$i.'</a>]' :
				'[<a href="'.build_uri($_m, array('id'=>$id,'page'=>$i),false).'" class="p_num"'.$onclick.'>'.$i.'</a>]';
		}
		$multipage .= ($curpage < $pages && !$simple ? '&nbsp;[<a href="'.build_uri($_m, array('id'=>$id,'page'=>($curpage + 1)),false).'" class="p_redirect"'.$onclick.'  rel="next">下一页</a>]' : '').
			($to < $pages ? '[<a href="'.build_uri($_m, array('id'=>$id,'page'=>$pages),false).'" class="p_redirect"'.$onclick.'>&rsaquo;</a>]' : '').
			(!$simple && $pages > $page ? '<a class="p_pages" style="padding: 0px"><input class="p_input" type="text" name="custompage" onKeyDown="if(event.keyCode==13) {window.location=\''.$mpurl.'page=\'+this.value; return false;}"></a>' : '');

		$multipage = $multipage ? '<div class="p_bar">'.(!$simple ? '<a class="p_total">&nbsp;共'.$num.'条记录&nbsp;</a><a class="p_pages">&nbsp;'.$curpage.'/'.$realpages.'页&nbsp;</a>' : '').$multipage.'</div>' : '';
	}
	return $multipage;
}


/**
 * 
 * 重构URL
 * @param string	$linktype	链接类型
 * @param array		$params		参数数组
 * @param Boolean	$suffix		是否带后缀
 */
function build_uri($linktype,$params,$suffix=true) {
	global $rewrite_url,$site_url;
	extract($params);
	$uri = $site_url;//初始等于站点首页
	switch ($linktype) {
		case 'show':
			$uri .= $rewrite_url ? 'chengyu-'.$chengyu.'-'.$id : 'index.php?m=show&id='.$id.'&chengyu='.$chengyu;
			break;
		case 'search':
			$uri .= $rewrite_url ? 'search/'.$kw : 'index.php?m=search&kw='.$kw;
			break;
		case 'sort':
			if(empty($page)){
				$uri .= $rewrite_url ? 'sort/'.$id : 'index.php?m=sort&id='.$id;
				$suffix = true;
			}else {
				$uri .= $rewrite_url ? 'sort/'.$id.'/'.$page : 'index.php?m=sort&id='.$id.'&page='.$page;
				$suffix = false;
			}
			break;
		default:
			return false;
		break;
	}
	if ($rewrite_url){
		if ($suffix) {
			$uri .= '.shtml';
		}
	}
	return $uri;
}
/**
 * 随机获取指定数目的成语
 * @param int $num
 */
function rand_chengyu($num) {
	global $db;
	$sql	= "select ID,ChengYu from chengyu order by rand() limit 1,".$num;
	$result	= $db->query($sql);
	while ($rand = $db->fetch_array($result)) {
		$rand2['url'] = build_uri('show', array('id'=>$rand['ID'],'chengyu'=>$rand['ChengYu']));
		$rand2['chengyu'] = $rand['ChengYu'];
		$randArr[] = $rand2;
	};
	unset($rand,$sql,$result);
	return $randArr;
}
/**
 * 判断当前是否伪静态,根据需求跳转
 */
function url_is_rewrite() {
	global $rewrite_url;
	$url_is_rewrite = stripos($_SERVER['REQUEST_URI'], 'm=');
	//链接和配置都开启才跳转
	if ($url_is_rewrite > 0 && $rewrite_url) {
		return true;
	}else {
		return false;
	};
}
/**
 * 发送HTTP状态信息
 * @param int $code 状态代码
 */
function send_http_status($code) {
	static $_status = array(
	// Informational 1xx
	100 => 'Continue',
	101 => 'Switching Protocols',
	// Success 2xx
	200 => 'OK',
	201 => 'Created',
	202 => 'Accepted',
	203 => 'Non-Authoritative Information',
	204 => 'No Content',
	205 => 'Reset Content',
	206 => 'Partial Content',
	// Redirection 3xx
	300 => 'Multiple Choices',
	301 => 'Moved Permanently',
	302 => 'Moved Temporarily ',  // 1.1
	303 => 'See Other',
	304 => 'Not Modified',
	305 => 'Use Proxy',
	// 306 is deprecated but reserved
	307 => 'Temporary Redirect',
	// Client Error 4xx
	400 => 'Bad Request',
	401 => 'Unauthorized',
	402 => 'Payment Required',
	403 => 'Forbidden',
	404 => 'Not Found',
	405 => 'Method Not Allowed',
	406 => 'Not Acceptable',
	407 => 'Proxy Authentication Required',
	408 => 'Request Timeout',
	409 => 'Conflict',
	410 => 'Gone',
	411 => 'Length Required',
	412 => 'Precondition Failed',
	413 => 'Request Entity Too Large',
	414 => 'Request-URI Too Long',
	415 => 'Unsupported Media Type',
	416 => 'Requested Range Not Satisfiable',
	417 => 'Expectation Failed',
	// Server Error 5xx
	500 => 'Internal Server Error',
	501 => 'Not Implemented',
	502 => 'Bad Gateway',
	503 => 'Service Unavailable',
	504 => 'Gateway Timeout',
	505 => 'HTTP Version Not Supported',
	509 => 'Bandwidth Limit Exceeded'
	);
	if(array_key_exists($code,$_status)) header('HTTP/1.1 '.$code.' '.$_status[$code]);
}
/**
 * 得到全球头像
 * @param string	$email
 * @param int		$size
 * @param url		$default	默认图标地址
 */
function get_gravatar( $email, $size = 80, $default = 'mm') {
    return $grav_url = "http://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;
}
/**
 * 加载类
 * @param string $classname	类名
 */
function loadclass($classname,$initialize='1') {
	$iclass = BASE_PATH.'source'.DIRECTORY_SEPARATOR.'classes'.DIRECTORY_SEPARATOR.$classname.'.class.php';
	$key = md5($iclass);
	if (isset($GLOBALS['_class'][$key])) {
		if (!empty($GLOBALS['_class'][$key])) {
			return $GLOBALS['_class'][$key];
		} else {
			return true;
		}
	}
	if (file_exists($iclass)) {
		include $iclass;
		if ($initialize) {
			$GLOBALS['_class'][$key] = new $classname;
		} else {
			$GLOBALS['_class'][$key] = true;
		}
			return $GLOBALS['_class'][$key];
	} else {
		throw_exception($iclass.'没有找到');
		return false;
	}
}
/**
 * 自定义异常处理函数
 * @param string $msg
 */
function throw_exception($msg) {
	exit($msg);
}
/**
 * 获取配置文件
 * @param string $msg
 */
function getConfig($config){
	if (array_key_exists($config, $GLOBALS['DZ_CFG'])) {
		return $GLOBALS['DZ_CFG'][$config];
	}
	return '';
}
?>
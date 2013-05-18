<?php
/**
 * 网站错误提示信息处理函数
 *
 * @access  private
 *
 * @param   string      $msg        提示语句,lang数组索引
 * @param   string      $gourl      提示跳转的地址
 * @param   int         $back       是否自动返回上个页面/默认不跳转
 *
 * @return  null
 */
function e($msg,$gourl='',$back=1)
{
	Message($msg,$back,$back);
}

/**
 * 网站成功提示信息处理函数
 *
 * @access  private
 *
 * @param   string      $msg        提示语句,lang数组索引
 * @param   string      $gourl      提示跳转的地址
 * @param   int         $back       是否自动返回上个页面/默认为自动跳转给出的url
 *
 * @return  null
 */
function s($msg,$gourl='',$back=0)
{
	Message($msg,$gourl,$back);
}

/**
 * 网站停止提示信息处理函数
 *
 * @access  private
 *
 * @param   string      $msg        提示语句,lang数组索引
 * @param   string      $gourl      提示跳转的地址
 * @param   int         $back       是否自动返回上个页面/默认为不显示跳转连接
 *
 * @return  null
 */
function stop($msg,$gourl='',$back=3)
{
	Message($msg,$gourl,$back);
}

/**
 * 网站提示信息处理函数
 *
 * @access  private
 *
 * @param   string      $msg        提示语句,lang数组索引
 * @param   string      $gourl      提示跳转的地址
 * @param   int         $back       是否自动返回上个页面
 *
 * @return  null
 */
function Message($msg,$gourl,$back)
{
	global $db;
	if(isset($GLOBALS['lang'][$msg])) {
		$msg = $GLOBALS['lang'][$msg];
	}
	$jumptime = 2000;
	$htmlhead = '<html><head><title>提示信息</title><meta http-equiv="content-Type" content="text/html charset=utf-8" /><META HTTP-EQUIV="pragma" CONTENT="no-cache"><META HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate">';
	$htmlhead .= '<base target="_self"/></head><body leftmargin="0" topmargin="0" bgcolor="#FFFFFF"><center><script>';
	$htmlfoot  = '</script></center></body></html>';
	if(1==$back){
		$jumptime = 2000;
		$gourl = "javascript:history.go(-1);";
	}

	$func = "var pgo=0;function JumpUrl(){if(pgo==0) location='$gourl';pgo = 1;}";
	$rmsg = $func;
	$rmsg .= 'document.write(\'<div style="border:1px solid #336699;width:550px;margin-top:25px;padding:1px;">\');';
	$rmsg .= 'document.write(\'<div style="height:20px;font-size:16px;font-weight:bold;BACKGROUND:#1693D9;BORDER-BOTTOM:#A8ECFF 2px solid;color:#FFFFFF;vertical-align:middle;padding:5px;">- 提示信息 -</div>\');';
	$rmsg .= 'document.write(\'<div style="height:100px;font-size:14px;"><br/>\');';

	$rmsg .= "document.write(\"$msg\");";
	if($back!=3)
	{
		$rmsg .= 'document.write(\'<br/><br/><a href="'.$gourl.'" style="font-size:12px;color:#336699;"><u>系统将在'.($jumptime/1000).'秒钟后自动跳转,如果你的浏览器没反应,请点击这里</u></a><br/><br/><div>\');';
	}
	$rmsg .= 'document.write("</div>");';
	if($back!=3)
	{
		$rmsg .= "setTimeout('JumpUrl()',$jumptime);";
	}
	$msg  = $htmlhead . $rmsg . $htmlfoot;
	echo $msg;
	if(is_object($db))
	{
		$db->close();
		unset($db);
	}
	ob_flush();
	exit();
}

/**
 * ajax 错误信息返回处理函数
 *
 * @access  public
 *
 * @param   string      $message    提示语句,lang数组索引
 * @param   array       $urls    	自定义跳转url连接数组
 * @param   string      $autojump   是否自动跳转
 *
 * @return  null
 */
function ajaxe($message,$urls='',$autojump='true')
{
	if(isset($GLOBALS['lang'][$message])) {
		$message = $GLOBALS['lang'][$message];
	}
	$arr = array();
	$arr['msgtype']  = 'error';
	$arr['autojump'] = $autojump;
	$arr['msg'] = $message;
	//跳转URL处理,自定义url
	if(is_array($urls) && !empty($urls))
	{
		foreach($urls as $key => $url)
		{
			$arr['url'][] = array($url[0],$url[1],$url[2]);
		}
	}
	else //默认Url
	{
			$arr['url'][] = array('javascript:closeMsgPanel();','返回重新填写');
	}
	ajaxmessage($arr);
}

/**
 * ajax 成功提示信息返回处理函数
 *
 * @access  public
 *
 * @param   string      $message    提示语句,lang数组索引
 * @param   array       $urls    	自定义跳转url连接数组
 * @param   string      $autojump   是否自动跳转
 *
 * @return  null
 */
function ajaxs($message,$urls='',$autojump='true')
{
	if(isset($GLOBALS['lang'][$message])) {
		$message = $GLOBALS['lang'][$message];
	}
	//初始化JSON数组
	$arr = array();
	//设定返回类型为成功
	$arr['msgtype']  = 'success';
	//设定是否自动跳转
	$arr['autojump'] = $autojump;
	//提示信息
	$arr['msg']   = $message;
	//跳转URL处理,自定义url
	if(is_array($urls) && !empty($urls))
	{
		foreach($urls as $key => $url)
		{
			$arr['url'][] = array($url[0],$url[1],$url[2]);
		}
	}
	else //默认Url
	{
		$arr['url'][] = array('javascript:closeMsgPanel();','完成','');
	}
	ajaxmessage($arr);
}

/**
 * 课程网站信息内容 ajax 成功提示信息返回处理函数
 *
 * @access  public
 *
 * @param   string      $message    提示语句,lang数组索引
 * @param   string      $type       提示状态
 * @param   int         $id         数据id
 * @param   int         $mid    	模块分类id
 * @param   string		$autojump 	是否自动跳转
 *
 * @return  null
 */
function aritcleajaxs($message,$type='add',$id=0,$mid=0,$autojump='true')
{
	//得到模块变量
	global $module;

	//语言数组
	if(isset($GLOBALS['lang'][$message]) && !empty($GLOBALS['lang'][$message]))
	{
		$message = $GLOBALS['lang'][$message];
	}

	//初始化JSON数组
	$arr = array();
	//设定返回类型为成功
	$arr['msgtype']  = 'success';
	//设定是否自动跳转
	$arr['autojump'] = $autojump;
	//提示信息
	$arr['msg'] = $message;
	//模块默认页面跳转地址
	$arr['url'][] = array(MODULEURL . $module['id'] ,$module['modulename'],'');

	//根据提示类型选择不同的URL设定
	switch($type)
	{
		//添加操作
		case 'add' :
			$arr['url'][] = array('javascript:clearform();','继续添加','');
			if(!empty($id))
			{
				$arr['url'][] = array(linkurl($id,'article'),'查看前台效果','_blank');
			}
			break;
		//修改操作
		case 'edit' :
			if(!empty($id))
			{
				$arr['url'][] = array(linkurl($id,'article'),'查看前台效果','_blank');
			}
			break;
		//单页面
		case 'simple' :
			$arr['url'][] = array('javascript:closeMsgPanel();','完成');
			if(!empty($id))
			{
				$arr['url'][] = array(linkurl($id,'article'),'查看前台效果','_blank');
			}
			break;
	}
	ajaxmessage($arr);
}

/**
 * ajax 提示信息输出函数
 *
 * @access  public
 *
 * @param   array      	$arr    	提示语句,lang数组索引
 *
 * @return  null
 */
function ajaxmessage($arr)
{
	global $db;
	//导入JSON生成类
	include 'include/json.class.php';
	//实例化JSON类
	$json = new Services_JSON;
	//将数组转换为JSON
	echo $json->encode($arr);
	unset($json);
	//注销数据库对象
	if(is_object($db))
	{
		$db->close();
		unset($db);
	}
	//输出到浏览器
	ob_flush();
	exit();
}

/**
 * 无序随机码生成函数
 *
 * @access  public
 *
 * @param   int      	$length    	随机码长度
 * @param   int         $numeric	是否只为数字
 *
 * @return  string
 */
function random($length, $numeric = 0) {
	PHP_VERSION < '4.2.0' && mt_srand((double)microtime() * 1000000);
	if($numeric) {
		$hash = sprintf('%0'.$length.'d', mt_rand(0, pow(10, $length) - 1));
	} else {
		$hash = '';
		$chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
		$max = strlen($chars) - 1;
		for($i = 0; $i < $length; $i++) {
			$hash .= $chars[mt_rand(0, $max)];
		}
	}
	return $hash;
}

/**
 * HTML表单hash码生成函数
 *
 * @access  public
 *
 * @return  string
 */
function formhash()
{
	global $localtime;
	if( isset($_SESSION['username']) && isset($_SESSION['uid']) ) {
		return substr(md5(substr($localtime, 0, -7).$_SESSION['username'].$_SESSION['uid'].$_SESSION['userpassword']), 8, 8);
	}
}

/**
 * HTML表单POST提交安全检查函数
 *
 * @access  public
 *
 * @return  null
 */
function submitcheck()
{
	//检查是否为POST提交
	if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['formhash'] != formhash())
	{
		stop('Sorry Your Submit Seccode Invalid!!');
	}
}

/**
 * 刷新后台左侧页面函数
 *
 * @access  public
 *
 * @return  null
 */
function RefreshLeftMenu()
{
	echo "<script>parent.document.getElementById('menu').src='?action=classcategory&todo=left';</script>";
}

/**
 * PHPurl重写函数
 *
 * @access  public
 *
 * @return  null
 */
function  mod_rewrite()
{
	if (isset($_SERVER ['PATH_INFO']))
	{
		$url = substr ( $_SERVER['PATH_INFO'],1);
		$url = explode ( ' / ' , $url );
		foreach($url as $key => $value)
		{
			if($key % 2 != 1)
			{
				if($value != '') $_GET [ $value ] = $url [ $key + 1 ];
				$querystring [] = $value . ' = ' . $url [ $key + 1 ];
			}
		}
		$_SERVER['QUERY_STRING'] = implode("&",$querystring);
		$_SERVER['PHP_SELF'] = substr($_SERVER ['PHP_SELF' ],0,strpos($_SERVER ['PHP_SELF'],'.php') + 4);
		$_SERVER['REQUEST_URI'] = $_SERVER[ ' PHP_SELF ' ] . '?' . $_SERVER[' QUERY_STRING'];
	}
}

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
function multipage($num, $perpage, $curpage, $maxpages = 0, $page = 10, $simple = 0, $onclick = '')
{
	$multipage = '';
	$onclick = $onclick ? ' onclick="'.$onclick.'(event)"' : '';
	//url处理
	$mpurl = $_SERVER['PHP_SELF'];
	if(isset($_SERVER['QUERY_STRING']))
	{
		$mpurl .= '?' . preg_replace('/&page=[0-9]*/','',$_SERVER['QUERY_STRING']) . '&';
	}
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

		$multipage = ($curpage - $offset > 1 && $pages > $page ? '[<a href="'.$mpurl.'page=1" class="p_redirect"'.$onclick.'>&lsaquo;</a>]' : '').
			($curpage > 1 && !$simple ? '[<a href="'.$mpurl.'page='.($curpage - 1).'" class="p_redirect">上一页</a>]&nbsp;' : '');
		for($i = $from; $i <= $to; $i++) {
			$multipage .= $i == $curpage ? '[<a class="p_curpage">'.$i.'</a>]' :
				'[<a href="'.$mpurl.'page='.$i.'" class="p_num"'.$onclick.'>'.$i.'</a>]';
		}

		$multipage .= ($curpage < $pages && !$simple ? '&nbsp;[<a href="'.$mpurl.'page='.($curpage + 1).'" class="p_redirect"'.$onclick.'>下一页</a>]' : '').
			($to < $pages ? '[<a href="'.$mpurl.'page='.$pages.'" class="p_redirect"'.$onclick.'>&rsaquo;</a>]' : '').
			(!$simple && $pages > $page ? '<a class="p_pages" style="padding: 0px"><input class="p_input" type="text" name="custompage" onKeyDown="if(event.keyCode==13) {window.location=\''.$mpurl.'page=\'+this.value; return false;}"></a>' : '');

		$multipage = $multipage ? '<div class="p_bar">'.(!$simple ? '<a class="p_total">&nbsp;共'.$num.'条记录&nbsp;</a><a class="p_pages">&nbsp;'.$curpage.'/'.$realpages.'页&nbsp;</a>' : '').$multipage.'</div>' : '';
	}
	return $multipage;
}

/**
 * 截取UTF-8编码下字符串的函数
 *
 * @access  public
 *
 * @param   string      $str        被截取的字符串
 * @param   int         $start      截取的起始位置
 * @param   int         $length     截取的长度
 * @param   bool        $append     是否附加省略号
 *
 * @return  null
 */
function sub_str($str, $start=0, $length=0, $append=true)
{
    $str = trim($str);
    $reval = '';

    if (0 == $length)
    {
    	$length = strlen($str);
    }
    elseif (0 > $length)
    {
    	$length = strlen($str) + $length;
    }

    if (strlen($str) <= $length) return $str;

    for($i = 0; $i < $length; $i++)
    {
        if (!isset($str[$i])) break;

        if (196 <= ord($str[$i]))
        {
            $i += 2 ;
            $start += 2;
        }
    }
    if ($i >= $start) $reval = substr($str, 0, $i);
    if ($i < strlen($str) && $append) $reval .= "...";

	return $reval;
}

/**
 * URL重写链接生成函数
 *
 * @access  public
 *
 * @param   int         $int        模块/信息编号
 * @param   string      $linktype   重写格式
 *
 * @return  string
 */
function linkurl($id,$linktype='module')
{
	global $setting_siteurlrewrite;

	//url 重写格式选择
	switch($setting_siteurlrewrite)
	{
		//通过服务器重写
		case 'htaccess':
			$moduleurl  = "module-#moduleid#.html";
			$articleurl = "content-#articleid#.html";
			$teacherurl = "teacher-#teacherid#.html";
			$bookurl    = "book-#bookid#.html";
			break;
		//通过php本身pathinfo重写
		case 'php':
			$moduleurl  = "index.php/action/class/todo/content/m/#moduleid#";
			$articleurl = "index.php/action/class/todo/content/do/show/a/#articleid#";
			$teacherurl = "index.php/action/class/todo/content/do/show/a/#teacherid#";
			$bookurl    = "index.php/action/class/todo/book/do/bookinfo/a/#bookid#";
			break;
		//不重写
		default :
			$moduleurl  = "index.php?action=class&todo=content&m=#moduleid#";
			$articleurl = "index.php?action=class&todo=content&do=show&a=#articleid#";
			$teacherurl = "index.php?action=class&todo=content&do=show&a=#teacherid#";
			$bookurl    = "index.php?action=class&todo=content&do=bookinfo&a=#bookid#";
			break;
	}
	//替换变量
	switch($linktype)
	{
		case 'module' :
			$moduleurl = str_replace('#moduleid#',$id,$moduleurl);
			return $moduleurl;
			break;
		case 'article':
			$articleurl = str_replace('#articleid#',$id,$articleurl);
			return $articleurl;
			break;
		case 'teacher' :
			$teacherurl = str_replace('#teacherid#',$id,$teacherurl);
			return $teacherurl;
			break;
		case 'book' :
			$bookurl = str_replace('#bookid#',$id,$bookurl);
			return $bookurl;
			break;
		default :
			return '';
	}

}

/**
* 过滤html元素，并保持原格式输出
*
* @access  public
*
* @param   string $content 输入内容
*
* @return  string
*/
function htmlencode($content)
{
  	$content = str_replace(' ', "&nbsp;", $content);
  	$content = str_replace('<', '＜',     $content);
  	$content = str_replace('>', '＞',     $content);
  	$content = str_replace('\n', "<br />",  $content);

    return $content;
}

/**
 * 获得用户的真实IP地址函数
 *
 * @access  public
 *
 * @return  string
 */
function real_ip()
{
	if (isset($_SERVER))
	{
		if (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
		{
			$arr = explode(',', $_SERVER["HTTP_X_FORWARDED_FOR"]);

            /* 取X-Forwarded-For中第一个非unknown的有效IP字符串 */
            foreach ($arr AS $ip)
            {
                $ip = trim($ip);

                if ($ip != 'unknown')
                {
                    $realip = $ip;
                    break;
                }
            }
		}
		elseif (isset($_SERVER["HTTP_CLIENT_IP"]))
		{
			$realip = $_SERVER["HTTP_CLIENT_IP"];
		}
		else
		{
			$realip = $_SERVER["REMOTE_ADDR"];
		}
	}
	else
	{
		if (getenv('HTTP_X_FORWARDED_FOR'))
		{
			$realip = getenv('HTTP_X_FORWARDED_FOR');
		}
		elseif (getenv('HTTP_CLIENT_IP'))
		{
			$realip = getenv('HTTP_CLIENT_IP');
		}
		else
		{
			$realip = getenv('REMOTE_ADDR');
		}
	}

	return $realip;
}

/**
 * 用户IP限制函数
 *
 * @access  public
 *
 * @param string $man 用户类型
 *
 * @return  null
 */
function banip($man)
{
    global $siteadminip,$siteuserip;
    if($man=='admin')
    {
        if(!ipaccess(real_ip(),$siteadminip))
        {
            stop('对不起,您的IP没有访问权限');
        }
    }
    elseif($man=='user')
    {
        if(!ipaccess(real_ip(),$siteuserip))
        {
            stop('对不起,您的IP没有访问权限');
        }
    }
}

/**
 * 检查管理员登录权限
 *
 * @access  public
 *
 * @return  null
 */
function CheckAccess()
{
	if( empty($_SESSION['uid']) || empty($_SESSION['username']) || empty($_SESSION['userlevel']) || empty($_SESSION['useraction']))
	{
		//判断http请求类型
		if((isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') || (isset($_SERVER['HTTP_X_PROTOTYPE_VERSION']) && $_SERVER['HTTP_X_PROTOTYPE_VERSION'] == '1.5.0'))
		{
			//来自PROTOTYPE的Ajax HTTP请求使用JSON方式返回没有权限访问的信息
			ajaxe('对不起,您的登陆状态已经失效,请重新登陆!',array(array('javascript:adminlogout();','确定','')));
		}
		else
		{
			//常规无权限跳转
			echo "<script>\n";
			echo "try {\n ";
			echo "parent.window.location.href='admincp.php';\n ";
			echo "}\n ";
			echo "catch(e)\n ";
			echo "{\n ";
			echo "location.window.href='admincp.php';\n ";
			echo "}\n ";
			echo "</script>";
			exit();
		}
	}
}

/**
 * 管理员模块访问权限检测函数
 *
 * @access  public
 *
 * @param   string  $priv_str 权限代码字符串
 *
 * @return  bool
 */
function admin_priv($priv_str)
{
    if ($_SESSION['useraction'] == 'all')
    {
    	
        return true;
    }
    if (strpos(',' . $_SESSION['useraction'] . ',', ',' . $priv_str . ',') === false)
    {
        stop('user_access_dined');
		return false;
    }
    else
    {
        return true;
    }
}

/**
 * Ip访问权限检测函数
 *
 * @access  private
 *
 * @param   string  $ip 用户ip地址
 * @param   string  $accesslist 允许访问的地址列表
 *
 * @return  bool
 */
function ipaccess($ip, $accesslist) {
    return preg_match("/^(".str_replace(array("\r\n", ' '), array('|', ''), preg_quote($accesslist, '/')).")/", $ip);
}


/**
 * 汉字转拼音函数
 *
 * @access  public
 *
 * @param   string  $str 汉字
 * @param   int     $ishead 是否保留首字符 1为保留
 * @param	int		$isclose 是否保留全局拼音数组 1为保留
 *
 * @return  string
 */
function GetPinyin($str,$ishead=0,$isclose=1)
{
    global $pinyins;
    $restr = "";
    $str = trim($str);
    $slen = strlen($str);
    if($slen<2) return $str;
    if(count($pinyins)==0)
	{
        $fp = fopen("include/data/pinyin.db","r");
        while(!feof($fp))
		{
            $line = trim(fgets($fp));
            $pinyins[$line[0].$line[1]] = substr($line,3,strlen($line)-3);
        }
        fclose($fp);
    }
    for($i=0;$i<$slen;$i++)
	{
        if(ord($str[$i])>0x80)
        {
            $c = $str[$i].$str[$i+1];
            $i++;
            if(isset($pinyins[$c]))
			{
                if($ishead==0) $restr .= $pinyins[$c];
                else $restr .= $pinyins[$c][0];
            }
			else
			{
				$restr .= "_";
			}
        }
		else if( eregi("[a-z0-9]",$str[$i]) )
		{
		    $restr .= $str[$i];
		}
        else
		{
			$restr .= "_";
		}
    }
    if($isclose==0) unset($pinyins);
    return $restr;
}

/**
 * UTF-8字符编码转换GBK编码函数
 *
 * @access  public
 *
 * @param   string  $gb 需要转换的utf-8编码的字符串
 *
 * @return  string
 */
function utf82gb($gb)
{
  	if(function_exists("iconv"));
  		return iconv("UTF-8","GB2312",$text);

    $filename = ROOT . "include/data/gb-unicode.table.txt";
    $tmp = file($filename);
    $codetable = array();
    while(list($key,$value) = each($tmp) )
        $codetable[hexdec(substr($value,7,6))]=substr($value,0,6);;
    $out = "";
    $len = strlen($gb);
    $i = 0;
    while($i < $len) {
        $c = ord( substr( $gb, $i++, 1 ) );
        switch($c >> 4)
        {
            case 0: case 1: case 2: case 3: case 4: case 5: case 6: case 7:
                // 0xxxxxxx
                $out .= substr( $gb, $i-1, 1 );
            break;
            case 12: case 13:
                // 110x xxxx   10xx xxxx
                $char2 = ord( substr( $gb, $i++, 1 ) );
                $char3 = $codetable[(($c & 0x1F) << 6) | ($char2 & 0x3F)];
                $out .= _hex2bin( dechex(  $char3 + 0x8080 ) );
            break;
            case 14:
                // 1110 xxxx  10xx xxxx  10xx xxxx
                $char2 = ord( substr( $gb, $i++, 1 ) );
                $char3 = ord( substr( $gb, $i++, 1 ) );
                $char4 = $codetable[(($c & 0x0F) << 12) | (($char2 & 0x3F) << 6) | (($char3 & 0x3F) << 0)];
                 $out .= _hex2bin( dechex ( $char4 + 0x8080 ) );


            break;
        }
    }
    return $out;
}

/**
 * GBK字符编码转换UTF-8编码函数
 *
 * @access  public
 *
 * @param   string  $gbstr 需要转换的GBK编码的字符串
 *
 * @return  string
 */
function gb2utf8($gbstr)
{
	if(function_exists('iconv'))
		return iconv("GB2312","UTF-8",$gbstr);
 	if(trim($gbstr)=="") return $gbstr;
  	$filename = ROOT . "include/data/gb2312-utf8.table.txt";
  	$fp = fopen($filename,"r");
  	while ($l = fgets($fp,15) )
  	{
  		$CODETABLE[hexdec(substr($l, 0, 6))] = substr($l, 7, 6);
  	}
  	fclose($fp);
 	$ret = "";
 	$utf8 = "";
 	while ($gbstr)
 	{
  		if (ord(substr($gbstr, 0, 1)) > 127)
  		{
   			$thisW = substr($gbstr, 0, 2);
   			$gbstr = substr($gbstr, 2, strlen($gbstr));
   			$utf8 = "";
   			@$utf8 = u2utf8(hexdec($CODETABLE[hexdec(bin2hex($thisW)) - 0x8080]));
   			if($utf8!="")
   			{
    			for ($i = 0;$i < strlen($utf8);$i += 3)
    			{
     				$ret .= chr(substr($utf8, $i, 3));
    			}
   			}
  		}
  		else
  		{
   			$ret .= substr($gbstr, 0, 1);
   			$gbstr = substr($gbstr, 1, strlen($gbstr));
  		}
 	}
 	return $ret;
}

/**
 * hex字符编码转换bin编码函数
 *
 * @access  private
 *
 * @param   string  $gbstr 需要转换的hex编码的字符串
 *
 * @return  string
 */
function _hex2bin( $hexdata )
{
	for ( $i=0; $i<strlen($hexdata); $i+=2 )
		$bindata.=chr(hexdec(substr($hexdata,$i,2)));

	return $bindata;
}

/**
 * 将SQL文件转换为PHP数组函数
 *
 * @access  public
 *
 * @param   string  $sql 读取的SQL文件内容
 *
 * @return  string
 */
function splitsql($sql) {
	$sql = str_replace("\r", "\n", $sql);
	$ret = array();
	$num = 0;
	$queriesarray = explode(";\n", trim($sql));
	unset($sql);
	foreach($queriesarray as $query)
	{
		$queries = explode("\n", trim($query));
		foreach($queries as $query)
		{
			$ret[$num] .= $query[0] == "#" ? NULL : $query;
		}
		$num++;
	}
	return($ret);
}

/**
 * 读取文件夹所有文件函数
 *
 * @access public
 *
 * @param  string dir 文件夹路径
 * @param  array  ext 允许的文件后缀
 *
 * @return array
 */
function getFile($dir,$ext='')
{
    $fileArr = array();
    $dp = opendir($dir);
    while( ($file  = readdir($dp)) !== false)
    {
        if($file !="." && $file!=".." && $file!="")
        {

			//文件后缀名判断
			if($ext=='')
			{
	            //文件夹判断
				if(is_dir($dir."/".$file))
				{
					$fileArr = array_merge($fileArr,getFile($dir."/".$file));
				}
	            if(is_file($dir."/".$file))
	            {
	                $fileArr[] = array(
	                                'size'=>filesize($dir."/".$file).'kb',
	                                'edittime'=>gmdate ("Y-n-j  H:i:s", filemtime($dir."/".$file) + 8 * 3600 ),
	                                'name'=>$dir."/".gb2utf8($file)
	                                 );
	            }
			}
			else
			{
				//多个文件后缀判断
				if(is_array($ext))
				{
					$ext = '('.implode('|',$ext).')';
				}
				if(preg_match('/\.'.$ext.'$/',$file))
				{
					$fileArr[] = array(
	                                'size'=>filesize($dir."/".$file).'kb',
	                                'edittime'=>gmdate ("Y-n-j  H:i:s", filemtime($dir."/".$file) + 8 * 3600 ),
	                                'name'=>$dir."/".gb2utf8($file)
	                                 );
				}
			}
        }
    }
    closedir($dp);
    return $fileArr;
}

/**
 * 安全检查系统操作
 *
 * @access  public
 *
 * @return  null
 */

function check_todo($todo,$todoarr)
{
    if(!in_array($todo,$todoarr))
    {
        stop('common_unknow_action');
    }
}


/**
 * 获得模版的信息
 *
 * @access  private
 *
 * @param   string      $template_name      模版名
 *
 * @return  array
 */
function get_template_info($template_name,$dir)
{
    $info = array();
    $cssdir = $dir. $template_name;
    $cssfile = $cssdir . '/style.css';
    $info['$template_name']       = $template_name;
    $info['screenshot']  = (file_exists($cssdir . '/screenshot.png'))  ? $cssdir . '/screenshot.png'  : '';
	$info['screenshot2'] = (file_exists($cssdir . '/screenshot2.png')) ? $cssdir . '/screenshot2.png' : '';

    if (file_exists($cssfile) && !empty($template_name))
    {
    	$fp  = @fopen($cssfile,"rb");
        $css = @fread($fp,filesize($cssfile));
        fclose($fp);
    	$info['dir_name']   = $cssdir;
    	//使用正则表达式匹配出首页栏目数目
    	if(preg_match("/IndexNum:\s*([0-9]{1,2})/",$css,$find))
    	{
        	$info['indexnum']   = $find[1];
    	}

    	else
    	{
    		$info['indexnum']   = 0;
    	}

    	unset($css);
    }
    else
    {
        $info['indexnum']   = 0;
    }
    return $info;
}

/**
 * 检测用户名密码是否合法
 *
 * @access  public
 *
 * @param   string      $name      用户名
 * @param   string      $pass      密码
 *
 * @return  string
 */
function checkuser($name,$pass)
{
    if( empty($name) )
    {
        return "user_username_empty";
    }
    if( empty($pass) )
    {
        return "user_password_empty";
    }
    $reg = "/^([a-zA-Z0-9]|[._]){4,19}$/";

    if( !preg_match($reg,$name) )
    {
        return "user_username_notmatch";
    }
    if( !preg_match($reg,$pass) )
    {
        return "user_password_notmatch";
    }
    return 0;
}

/**
 * 删除一个文件夹的下面所有的文件夹和文件
 *
 * @access  public
 *
 * @param   string      $dir      文件夹路径
 *
 * @return  bool
 */
function doDelDir($dir)
{
    $dh = @opendir($dir);
    while ($file = @readdir($dh))
    {
        if($file!="." && $file!="..")
        {
            $fullpath=$dir."/".$file;
            if(!is_dir($fullpath))
            {
                @unlink($fullpath);
            }
            else
            {
                doDelDir($fullpath);
            }
        }
    }
    @closedir($dh);
    if (@rmdir($dir))
    {
        return true;
    }
    else
    {
        return false;
    }
}


/**
 * 文件上传处理函数
 *
 * @access  public
 *
 * @param   string      $filename      文件名称
 * @param   string      $tmpfile       临时文件名
 * @param   int			$filesize      文件大小
 * @param   string      $attach_dir    存放文件夹位置
 * @param   string      $uploadroot    上传文件夹根目录位置
 * @param   string      $uploadpath    上传文件夹目录
 *
 * @return  string
 */
function uploadfile($filename,$tmpfile,$filesize,$type,$attach_dir='file',$uploadroot='',$uploadpath='')
{

    global $localtime;
    $extension  = strtolower(substr(strrchr($filename, "."),1));
	$filename   = $localtime.'.'.$extension;

    if (!in_array($extension, $type))
        e('common_file_type_error');
    //if($filesize>$attach_maxsize)
       // e('common_file_toolarge');
    //转移附件--按年月分类附件
	if($uploadroot=='')
		$uploadroot = 'upload/';
	if($uploadpath=='')
		$uploadpath = 'upload/'.date("Ym")."/";
    $attachpath = $uploadpath.$filename;

    if(!is_dir($uploadroot))
        @mkdir($uploadroot,0777) OR die("权限不足无法创建".$uploadroot."目录!请手动创建并设置权限为777");
    if(!is_dir($uploadpath))
        @mkdir($uploadpath,0777) OR die("创建".$uploadpath."目录失败");
    if(@is_uploaded_file($tmpfile)){
        if(!@move_uploaded_file($tmpfile ,$attachpath)){
                @unlink($tmpfile);//删除临时文件
                e('common_file_uploaderror');
        }
    }
    return $attachpath;
}

/**
 * 在线用户统计处理函数
 *
 * @access  public
 *
 * @return  null
 */
function online_user()
{
	global $tablepre,$db,$localtime;
	//超时时间
	$outtime = $localtime - (60 * 15);

	$ip  = $_SERVER['REMOTE_ADDR'];
	$sid = substr(md5($ip),0,5);
	//删除同Ip用户
	$user = $db->fetch_one_array("SELECT * FROM {$tablepre}onlineuser WHERE sid =  '$sid' AND ip = '$ip' ");
	if(!empty($user))
	{
		//更新当前用户状态
		$db->query("UPDATE {$tablepre}onlineuser SET activetime = $localtime WHERE sid = '$sid' AND ip = '$ip' ");
	}
	else
	{
		//写入当前用户状态
		$db->query("INSERT INTO {$tablepre}onlineuser (sid,activetime,ip) VALUES ('$sid',$localtime,'$ip')");
	}
	//删除超时用户
	$db->query("DELETE FROM {$tablepre}onlineuser WHERE activetime < $outtime ");
}


/**
 * 访问量统计函数
 *
 * @access  public
 *
 * @return  int
 */
function statistic()
{
	global $db,$tablepre;
	if(!isset($_COOKIE['visitied']))
	{
		$db->query("UPDATE {$tablepre}statistic SET statistic = statistic + 1");
		setcookie('visitied','yes',time()+ 3600 * 8);
	}
	$sta = $db->fetch_one_array("SELECT * FROM {$tablepre}statistic");

	for($i=0;$i<strlen($sta['statistic']);$i++)
	{
		$sta['counter']=$sta['counter']."<img src=images/count/".$sta['displaystyle']."/".substr($sta['statistic'],$i,1).".gif></img>";
	}
	return $sta['counter'];
}

/**
 * 友情链接调用函数
 *
 * @access  public
 *
 * @param   int $num 调用的友情链接数目
 *
 * @return  array
 */
function getFriendLink($num=20) {
	global $db,$tablepre;
	$link  = $db->query("SELECT * FROM {$tablepre}sitefriendlink ORDER BY listnum,id ASC limit 0,$num");
	$links = array();
	while($alink = $db->fetch_array($link)) {
		$alink['title'] = sub_str($alink['title'],0,55,true);
		$links[] = $alink;
	}
	return $links;
}

/*--------	网站模块函数部分开始   ---------*/

/**
 * 检查模块是否含有子模块函数
 *
 * @access  public
 *
 * @param   int $fid 要检查下属模块情况的模块的id
 *
 * @return  bool
 */
function checkChildMoudule($fid)
{
	global $db,$tablepre;
	$child = $db->fetch_one_array("SELECT COUNT(id) as allnum FROM {$tablepre}sitemodule WHERE fid = $fid");
	if($child['allnum']==0)
		return false;
	else
		return true;
}

/**
 * 获得首页导航
 *
 * @access  public
 *
 * @param   int $fid 符合条件所有模块所属的父模块的编号
 *
 * @return  array
 */
function getNavs($fid)
{
	global $db,$tablepre,$_MODULETYPE;
	$module_result = $db->query("SELECT * FROM {$tablepre}sitemodule WHERE fid = $fid AND m_display=0 ORDER BY listnum,id ASC");
	$module_arr    = array();
	while($modules = $db->fetch_array($module_result))
	{
		//增加一个数组索引存储原分类类型信息
        $modules['MT']  =   $modules['moduletype'];
		//检查下级是否含有分类
		$modules['haschild'] = checkChildMoudule($modules['id']);
		//超级链接生成
		$modules['link'] = linkurl($modules['id']);
        //模块类型转换
        $modules['moduletype'] =  $_MODULETYPE[$modules['moduletype']];
        $module_arr[] = $modules;
	}
	return $module_arr;
}
/**
 * 获得一个模块下一级的所有模块
 *
 * @access  public
 *
 * @param   int $fid 符合条件所有模块所属的父模块的编号
 *
 * @return  array
 */
function getModules($fid)
{
	global $db,$tablepre,$_MODULETYPE;
	$module_result = $db->query("SELECT * FROM {$tablepre}sitemodule WHERE fid = $fid ORDER BY listnum,id ASC");
	$module_arr    = array();
	while($modules = $db->fetch_array($module_result))
	{
		//增加一个数组索引存储原分类类型信息
        $modules['MT']  =   $modules['moduletype'];
		//检查下级是否含有分类
		$modules['haschild'] = checkChildMoudule($modules['id']);
		//超级链接生成
		$modules['link'] = linkurl($modules['id']);
        //模块类型转换
        $modules['moduletype'] =  $_MODULETYPE[$modules['moduletype']];
        $module_arr[] = $modules;
	}
	return $module_arr;
}

/**
 * 递归获得一个模块所有下级模块
 *
 * @access  public
 *
 * @param   int $fid 符合条件所有模块所属的父模块的编号
 *
 * @return  array
 */
function getAllChildModule($fid)
{
	global $db,$tablepre;
	$module_result = $db->query("SELECT * FROM {$tablepre}sitemodule WHERE fid = $fid AND m_display = 0 ORDER BY listnum,id ASC");
	$module_arr    = array();
	while($modules = $db->fetch_array($module_result))
	{
		//检查下级是否含有分类
		if(checkChildMoudule($modules['id']))
        	$modules['childmodules'] =  getAllChildModule($modules['id']);
        else
        	$modules['childmodules'] = '';
        $module_arr[] = $modules;
	}
	return $module_arr;
}

/**
 * 取得一个模块的详细信息
 *
 * @access  public
 *
 * @param   int $fid 模块编号
 *
 * @return  array
 */
function getModuleInfo($mid)
{
	global $db,$tablepre,$_MODULETYPE;
	$module = $db->fetch_one_array("SELECT * FROM {$tablepre}sitemodule WHERE id = $mid");
	if(is_array($module))
	{
		$module['MT'] =  $_MODULETYPE[$module['moduletype']];
		return $module;
	}
	else
	{
		return null;
	}
}

/**
 * 递归生成网站模块的目录树JavaScript脚本代码
 *
 * @access  public
 *
 * @param   int $fid  父级模块的编号
 *
 * @return  string
 */
function leftclassmenu($fid)
{
	global $db,$tablepre,$h,$k;
	//初始化脚本字符串变量
	$javascript = '';
	$sql ="SELECT * FROM {$tablepre}sitemodule WHERE fid in ($fid)  ORDER BY listnum,id ASC";
	//echo $sql;exit;
	$result = $db->query($sql);
	while($module = $db->fetch_array($result))
	{
		//如果模块为模块分类类型
		if($module['moduletype'] == 'Sub')
		{
			//如果当前模块为最高级,则生成的父级ID为零
			if($fid==0)
			{
				$k = 0;
			}
			//生成脚本
			$javascript .= "d.add('$h','$k','".$module['modulename']."','','".$module['modulename']."','mainFrame');\n";
			//记住当前模块编号
			$l = $k;

			$k = $h;
			//编号增加
			$h++;
			//递归子集
			$javascript	.= leftclassmenu($module['id']);
			//重设该级别的父级编号
			$k = $l;

		}
		elseif($module['moduletype'] == 'Teacher')
		{
			//如果当前模块为最高级,则生成的父级ID为零
			if($fid==0)
				$k = 0;
			$javascript .= "d.add('$h','$k','".$module['modulename']."','?action=declareinfo&todo=teachers','".$module['modulename']."','mainFrame');\n";
			$h++;
		}elseif($module['moduletype'] == 'teacher_boos')
		{
			//如果当前模块为最高级,则生成的父级ID为零
			if($fid==0)
				$k = 0;
			$javascript .= "d.add('$h','$k','".$module['modulename']."','?action=declareinfo&todo=principal','".$module['modulename']."','mainFrame');\n";
			$h++;
		}
		else
		{
			//如果当前模块为最高级,则生成的父级ID为零
			if($fid==0)
				$k = 0;
			$javascript .= "d.add('$h','$k','".$module['modulename']."','?action=article&mid=".$module['id']."','".$module['modulename']."','mainFrame');\n";
			$h++;
		}

	}
	return $javascript;
}
/**
 * 非超级管理员       递归生成网站模块的目录树JavaScript脚本代码
 *
 * @access  public
 *
 * @param   int $id  父级模块的编号
 *
 * @return  string
 */
function leftclassmenuV($id)
{
	if ($id == "") {
		echo "没有权限！";exit;
	}
	$fid=0;
	global $db,$tablepre,$h,$k;
	//初始化脚本字符串变量
	$javascript = '';
	$sql ="SELECT * FROM {$tablepre}sitemodule WHERE id in ($id) AND fid =0 ORDER BY listnum,id ASC";
	//echo $sql;exit;
	$result = $db->query($sql);
	while($module = $db->fetch_array($result))
	{
		//如果模块为模块分类类型
		if($module['moduletype'] == 'Sub')
		{
			//如果当前模块为最高级,则生成的父级ID为零
			if($fid==0)
			{
				$k = 0;
			}
			//生成脚本
			$javascript .= "d.add('$h','$k','".$module['modulename']."','','".$module['modulename']."','mainFrame');\n";
			//记住当前模块编号
			$l = $k;

			$k = $h;
			//编号增加
			$h++;
			//递归子集
			$javascript	.= leftclassmenu($module['id']);
			//重设该级别的父级编号
			$k = $l;

		}
		elseif($module['moduletype'] == 'Teacher')
		{
			//如果当前模块为最高级,则生成的父级ID为零
			if($fid==0)
				$k = 0;
			$javascript .= "d.add('$h','$k','".$module['modulename']."','?action=declareinfo&todo=teachers','".$module['modulename']."','mainFrame');\n";
			$h++;
		}
		else
		{
			//如果当前模块为最高级,则生成的父级ID为零
			if($fid==0)
				$k = 0;
			$javascript .= "d.add('$h','$k','".$module['modulename']."','?action=article&mid=".$module['id']."','".$module['modulename']."','mainFrame');\n";
			$h++;
		}

	}
	return $javascript;
}

/*--------	课程网站函数部分开始   ---------*/

/**
 * 递归获得一个网络课程模块所有的章/节/点节点
 *
 * @access  public
 *
 * @param   int $fid 章/节/点/的父级编号
 * @param   int $mid 模块编号
 *
 * @return  array
 */
function getCourse($id,$mid)
{
	global $db,$tablepre;
	$chapter_query = $db->query("SELECT * FROM {$tablepre}sitecourse WHERE fid = $id AND moduleid = $mid ORDER BY listnum,id ASC");
	$chapters = array();
	while($c = $db->fetch_array($chapter_query))
	{
		if($c['has_content'] == 1)
		{
			$c['child'] = getCourse($c['id'],$mid);
		}
		$chapters[] = $c;
	}
	return $chapters;
}

/**
 * 获得一个网络课程模块章/节节点的所有下级节点
 *
 * @access  public
 *
 * @param   int $id  章/节/点/的父级编号
 *
 * @return  array
 */
function getChildCourse($id)
{
	global $db,$tablepre;
	$child_course_query = $db->query("SELECT * FROM {$tablepre}sitecourse WHERE fid = $id ORDER BY listnum,id ASC");
    $child_courses = array();
    while($courses = $db->fetch_array($child_course_query))
    {
        $child_courses[] = $courses;
    }
	return $child_courses;
}

/*--------	申报网站函数部分开始   ---------*/

/**
 * 递归生成申报网站栏目结构目录树JavaScript脚本代码
 *
 * @access  public
 *
 * @return  string
 */
function leftdeclaremenu()
{
	global $db,$tablepre;
	$h = 1;
	$k = 0;
	//初始化脚本字符串变量
	$javascript = '';
	$result = $db->query("SELECT * FROM {$tablepre}declarecate WHERE fid = 0 ORDER BY pnum,id ASC");
	while($cate = $db->fetch_array($result))
	{

		if(!empty($cate['mode_name']))
		{
			$javascript .= "d.add('$h','0','".$cate['title']."','?action=declareinfo&todo=".$cate['mode_name']."','".$cate['title']."','mainFrame');\n";
			$h++;
		}
		else
		{
			$javascript .= "d.add('$h','0','".$cate['title']."','','".$cate['modulename']."','mainFrame');\n";

			$k = $h;
			$h++;
			$childresult = $db->query("SELECT * FROM {$tablepre}declarecate WHERE fid = ".$cate['id']." ORDER BY pnum,id ASC");
			while($childcate = $db->fetch_array($childresult))
			{
				$javascript .= "d.add('$h','$k','".$childcate['title']."','?action=declareinfo&todo=show&id=".$childcate['id']."','".$childcate['title']."','mainFrame');\n";
				$h++;
			}
		}

		$javascript;
	}

	return $javascript;
}
/**
 * 非管理员            递归生成申报网站栏目结构目录树JavaScript脚本代码
 *
 * @access  public
 *
 * @return  string
 */
function leftdeclaremenuV($id)
{
	if ($id == "") {
		echo "没有权限！";exit;
	}else {
		global $db,$tablepre;
		$h = 1;
		$k = 0;
		//初始化脚本字符串变量
		$javascript = '';
		$result = $db->query("SELECT * FROM {$tablepre}declarecate WHERE id in($id) and fid = 0 ORDER BY pnum,id ASC");
		while($cate = $db->fetch_array($result))
		{
	
			if(!empty($cate['mode_name']))
			{
				$javascript .= "d.add('$h','0','".$cate['title']."','?action=declareinfo&todo=".$cate['mode_name']."','".$cate['title']."','mainFrame');\n";
				$h++;
			}
			else
			{
				$javascript .= "d.add('$h','0','".$cate['title']."','','".$cate['modulename']."','mainFrame');\n";
	
				$k = $h;
				$h++;
				$childresult = $db->query("SELECT * FROM {$tablepre}declarecate WHERE fid = ".$cate['id']." ORDER BY pnum,id ASC");
				while($childcate = $db->fetch_array($childresult))
				{
					$javascript .= "d.add('$h','$k','".$childcate['title']."','?action=declareinfo&todo=show&id=".$childcate['id']."','".$childcate['title']."','mainFrame');\n";
					$h++;
				}
			}
	
			$javascript;
		}
	}

	return $javascript;
}


/**
 * 通过UID得到用户详细信息
 */
function getUserInfo($uid) {
	global $db,$tablepre;
	$userinfo = $db->fetch_one_array("SELECT * FROM {$tablepre}systemuser WHERE id = $uid");
	return $userinfo;
}
/**
 * 解码  Excel导入有用到
 */
function recode($str)
{
	$str = preg_replace("|&#([0-9]{1,5})|", "\".u2utf82gb(\\1).\"", $str);
	$str = "\$str=\"$str\";";
	eval($str);
	return $str;
} 
function u2utf82gb($c)
{
	$str = "";
	if ($c < 0x80)
	{
		$str .= chr($c);
	}
	else if ($c < 0x800)
	{
		$str .= chr(0xC0 | $c >> 6);
		$str .= chr(0x80 | $c &0x3F);
	}
	else if ($c < 0x10000)
	{
		$str .= chr(0xE0 | $c >> 12);
		$str .= chr(0x80 | $c >> 6 &0x3F);
		$str .= chr(0x80 | $c &0x3F);
	}
	else if ($c < 0x200000)
	{
		$str .= chr(0xF0 | $c >> 18);
		$str .= chr(0x80 | $c >> 12 &0x3F);
		$str .= chr(0x80 | $c >> 6 &0x3F);
		$str .= chr(0x80 | $c &0x3F);
	} 
	return $str;
	//return iconv('UTF-8', 'GB2312', $str);
}

/**
 * 得到最新的公告
 */
function getNewGongGao() {
	global $db,$tablepre;
	
	$newgonggao = $db -> fetch_one_array("SELECT * FROM {$tablepre}announcement  ORDER BY id DESC LIMIT 0 , 1");
	return $newgonggao;
}
/**
 * 等到该部门下的所有处级用户
 * @return	用户数组
 */
 function getYuanXiBuMenYongHu($yuanxi,$bumen) {
 	global $db,$tablepre;
 	$sql = "SELECT * FROM {$tablepre}systemuser WHERE userlevel = 3";
 	if (!empty($yuanxi)) {
 		$sql .=" AND yuanxi = '$yuanxi' AND bumen = '$bumen'";
 	}
 	$user_result = $db->query($sql);
 	$user_Arr = array();
 	while($modules = $db->fetch_array($user_result)){
		$user_Arr[] = $modules;
	}
	unset($modules,$user_result);
	return $user_Arr;
 }
 
 
 //----------------------------响应线上的API---------------------------
 
 
 
 
 ?>
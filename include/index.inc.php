<?php
//模板目录
$_TEMPLATESDIR =  'templates/';

//导航栏菜单
/*$nav_arr    = getNavs(0);
$nav_module = getModuleInfo(0);

$friendlink = getFriendLink();  //友情链接
$ALLChilds = getAllChildModule(0);

$gong = getgonggao();*/

//检查登陆
CheckAccess();

switch($todo)
{

	case '':
		$YuanXiBuMen = getModules_yuanxi(0);//组织结构
		$userInfo =getUserInfo($_SESSION['uid']);
		$weipiyue = checkWeiPiYueZhouZhi();//未批阅	
		include template('index');
		break;
	case 'showgonggao':
		$id = $_GET['id'];
		$announcement = $db->fetch_one_array("SELECT * FROM {$tablepre}announcement  WHERE id = $id");
		include 'admin/templates/announcement_show.php';
		break;

	
	/*case 'so':
		//echo 'sdfsdf';exit;
		$key = $_POST['key'];
		$sql = "SELECT * FROM {$tablepre}sitearticle WHERE title like '%$key%' ";
		$page    = intval( isset($_GET['page']) ? $_GET['page'] : 1 );
		$perpage = intval( isset($_GET['perpage']) ? $_GET['perpage'] : 10 );
		if($page > 0)
		{
			$startlimit = ($page - 1) * $perpage;
		} else {
			$startlimit = 0;
		}
		$log = $db->fetch_one_array($sql);
		$total  = $log['countnum'];
		$result = $db->query("SELECT * FROM {$tablepre}sitearticle  WHERE title like '%$key%' ORDER BY id DESC LIMIT $startlimit,$perpage");
		$article = array();
		while($data = $db->fetch_array($result))
		{			
			$data['addtime'] = gmdate('Y-n-j  H:i',$data['addtime']);
			$article[] = $data;
		}
		//print_r($article);exit;
		$page_control = multipage($total,$perpage,$page);
		include template('content');
	break;
	//2级页面数据处理
	case 'content' :

	if($do=='saveadd')
		{
			$title    = $_POST['title'];
			$sendname = $_POST['sendname'];
			$content  = $_POST['content'];
			if(empty($title))
				e('请填写留言标题');
			if(empty($sendname))
				e('请填写留言人名称');
			if(empty($content))
				e('请填写留言内容');
			//过滤html内容
			$sendname = htmlencode($sendname);
			$content  = htmlencode($content);
			$sql = "INSERT INTO {$tablepre}sitebook
					(title,sendname,sendtime,content,replycontent)
					VALUES
					('$title','$sendname',$localtime,'$content','暂未回复')
					";
			$db->query($sql);
			s("留言成功",0,1);
		}
		//模块ID
		$module_id   = isset($_GET['m']) ? intval($_GET['m']) : '';
		//内容ID
		$article_id  = isset($_GET['a']) ? intval($_GET['a']) : '';

		//根据模块处理数据
		if( $do == '' )
		{
			if(empty($module_id))
			{
				stop('unknow error');
			}

			//得到当前模块数据
			$module_info = getModuleInfo($module_id);

			if(empty($module_info))
			{
				stop('unknow error');
			}

			//得到顶级分类的id
			$top_module = $module_info['fid'] == 0 ? $module_info['id'] : getFatherModule($module_info['fid']);
			//顶级分类的信息
			$topmodule = getModuleInfo($top_module);
			//位置导航栏
			$navbar    = getNav($module_info['id'],$module_info['fid'],$module_info['modulename']);
			//左侧下级栏目导航
			$modules   = getAllChildModule($top_module);

			switch($module_info['moduletype'])
			{
				//单页面
				case 'Simple' :
					$article = $db->fetch_one_array("SELECT * FROM {$tablepre}sitearticle WHERE moduleid = $module_id");
					if(empty($article))
					{
						stop('您查看的信息不存在或者已经被删除!','',1);
					}

					$db->query("UPDATE {$tablepre}sitearticle SET hit = hit + 1 WHERE id = ".$article['id'] );
					//内容分页begin

					$content_arrs = split("#####",$article['content']);
					$page   = intval( isset($_GET['page']) ? $_GET['page'] : 1 );
					$perpage = intval( isset($_GET['perpage']) ? $_GET['perpage'] : 1 );
					$total    = count($content_arrs);
					$ckey = $page-1;
				    $content = $content_arrs[$ckey];
					$page_control = multipage($total,$perpage,$page);
					//end 内容分页
					include template('content');
				break;

				case 'Course':
					if(empty($article_id))
					{
						$chapter_query = $db->query("SELECT * FROM {$tablepre}sitecourse WHERE fid = 0 AND moduleid = $module_id ORDER BY listnum,id ASC");
						$chapters = array();
						while($c = $db->fetch_array($chapter_query))
						{
						    $c['modulename'] = preg_replace("/(\n+?|\r+)/",'',$c['modulename']);
							$c['title'] = preg_replace("/(\n+?|\r+?)/",'',$c['title']);
							$chapters[] = $c;
						}
						unset($chapter_query);
						include template('course');
						exit;
					}
					else
					{
						$info = $db->fetch_one_array("SELECT content FROM {$tablepre}sitecourse WHERE id = $article_id");
						echo $info['content'];
						exit;
					}
				break;



				case 'Url' :
				  include template('location');
				break;
#---------------------------
				case 'BBS' :
					if($do=='')
					{
						$page    = intval( isset($_GET['page']) ? $_GET['page'] : 1 );
						$perpage = intval( isset($_GET['perpage']) ? $_GET['perpage'] : 10 );
						if($page > 0)
						{
							$startlimit = ($page - 1) * $perpage;
						} else {
							$startlimit = 0;
						}
						$sql = "SELECT COUNT(id) AS countnum FROM {$tablepre}sitebook  WHERE checked = 1";
						$log = $db->fetch_one_array($sql);
						$total  = $log['countnum'];
						$result = $db->query("SELECT * FROM {$tablepre}sitebook  WHERE checked = 1 ORDER BY id DESC LIMIT $startlimit,$perpage");
						$books = array();
						while($book = $db->fetch_array($result))
						{
							$book['link'] = linkurl($book['id'],'book');
							$book['sendtime']  = gmdate('Y-n-j  H:i',$book['sendtime']);
							$book['replytime'] = gmdate('Y-n-j  H:i',$book['replytime']);
							if($book['replycontent']!="暂未回复")
							{
								$book['replycontent'] = "<font color='red'>已回复</font>";
							}
							$books[] = $book;
						}
						$page_control = multipage($total,$perpage,$page);
						include template('content');
					}
				break;


#---------------------------
				//如果是模块分类的处理
				case 'Sub' :
					//取出下属的第一个非特殊分类的分类的id
					$module_id = getChildNomalModule($module_id);
					//重新得到模块数据
					$module_info = getModuleInfo($module_id);
					if($module_info['moduletype'] == 'Simple')
					{
						$article = $db->fetch_one_array("SELECT * FROM {$tablepre}sitearticle WHERE moduleid = " .$module_info['id'] );
						if(empty($article))
						{
							stop('您查看的信息不存在或者已经被删除!','',1);
						}

						$db->query("UPDATE {$tablepre}sitearticle SET hit = hit + 1 WHERE id = ".$article['id'] );
						//内容分页begin
						$content_arrs = split("#####",$article['content']);

						$page   = intval( isset($_GET['page']) ? $_GET['page'] : 1 );
						$perpage = intval( isset($_GET['perpage']) ? $_GET['perpage'] : 1 );
						$total    = count($content_arrs);
						$ckey = $page-1;
						$content = $content_arrs[$ckey];
						$page_control = multipage($total,$perpage,$page);
						//end 内容分页
						include template('content');
						break;
					}
				
				case 'News'  :
				case 'Video' :
				case 'DownLoad' :
				default : //数据列表+分页
					$page    = intval( isset($_GET['page']) ? $_GET['page'] : 1 );
					$perpage = intval( isset($_GET['perpage']) ? $_GET['perpage'] : 18 );
					if($page > 0)
					{
						$startlimit = ($page - 1) * $perpage;
					}
					else
					{
						$startlimit = 0;
					}

					$sql = "SELECT COUNT(id) AS countnum FROM {$tablepre}sitearticle WHERE moduleid = $module_id";
					$log = $db->fetch_one_array($sql);
					$total  = $log['countnum'];
					$result = $db->query("SELECT * FROM {$tablepre}sitearticle WHERE moduleid = $module_id ORDER BY isstickies,listnum,id DESC LIMIT $startlimit,$perpage");
					$article = array();
					while($data = $db->fetch_array($result))
					{
						$data['addtime'] = gmdate('Y-n-j  H:i',$data['addtime']);
						$article[] = $data;
					}
					$page_control = multipage($total,$perpage,$page);
					include template('content');
					break;
					case 'test':					
						$cnumber = 20;
						$select = $_GET['select'] ;
						$did=isset($_GET['did']) ? intval($_GET['did']) : '0';
						if($select == 'selectQuestion')
						{
							$_SESSION['jnum']  = isset($_POST['jnum']) ? intval($_POST['jnum']) : 20;
							$_SESSION['snum']  = isset($_POST['snum']) ? intval($_POST['snum']) : 20;
							$_SESSION['fnum']  = isset($_POST['fnum']) ? intval($_POST['fnum']) : 20;
							$_SESSION['anum']  = isset($_POST['anum']) ? intval($_POST['anum']) : 20;
							$_SESSION['cnum']  = isset($_POST['cnum']) ? intval($_POST['cnum']) : 20;
						}
						if($did==0){
							$judges = judge_list($module_id);

						}
						elseif($did==1){
							$selects = select_list($module_id);
						}
						elseif($did==2){
							 $fills = fill_list($module_id);
						}
						elseif($did==3){
							 $asks = ask_list($module_id);
						}
						elseif($did==4){
							$accounts = account_list($module_id);
						}
						elseif($did==5){
							$accounts = explain_list($module_id);
						}
						else{
							$judges = select_list();
						}
						include template('content');
						break;
					
			}

		}
		elseif($do=='show')
		{ //显示详细信息
			if(empty($article_id))
			{
				stop('unknow error');
			}
			$article = $db->fetch_one_array("SELECT * FROM {$tablepre}sitearticle WHERE id = $article_id");
			if(!empty($article))
			{
				//内容分页begin
				$content_arrs = split("#####",$article['content']);
				$page   = intval( isset($_GET['page']) ? $_GET['page'] : 1 );
				$perpage = intval( isset($_GET['perpage']) ? $_GET['perpage'] : 1 );
				$total    = count($content_arrs);
				$ckey = $page-1;
				$content = $content_arrs[$ckey];
				$page_control = multipage($total,$perpage,$page);
			}

			if(empty($module_id))
				$module_id = $article['moduleid'];

			//得到当前模块数据
			$module_info = getModuleInfo($module_id);

			if(empty($module_info))
			{
				stop('unknow error');
			}

			//得到顶级分类的id
			$top_module = $module_info['fid'] == 0 ? $module_info['id'] : getFatherModule($module_info['fid']);
			//顶级分类的信息
			$topmodule = getModuleInfo($top_module);
			//位置导航栏
			$navbar     = getNav($module_info['id'],$module_info['fid'],$module_info['modulename']);
			$modules   = getAllChildModule($top_module);
			switch($module_info['moduletype'])
			{


				case 'Video':
					if(!empty($article['url']))
					{
						$types = array();
						if (ereg('(\.)([A-Za-z]+)$', trim($article['url']), $types)) {
							$videotype = strtolower($types[2]);
						}
						//匹配RV格式流媒体文件
						if($videotype == 'rv' || $videotype == 'rmvb' || $videotype == 'rm')
						{
							if(!preg_match("/^rtsp:\/\//",$article['url']))
							{
								$article['url'] = 'rtsp://'.$_SERVER['HTTP_HOST'].'/'. $article['url'];
							}
						}
						else
						{
							//匹配地址并调整文件路径
							if(!preg_match("/^http:\/\//",$article['url']) && !preg_match("/^\//",$article['url']))
							{
								$article['url'] = $article['url'];
							}
						}
					}
				default:
					//左侧下级栏目导航
					$modules = getAllChildModule($top_module);
					$article['addtime'] = gmdate('Y-n-j  H:i',$article['addtime']);
					$db->query("UPDATE {$tablepre}sitearticle SET hit = hit + 1 WHERE id = $article_id");
					include template('content');
			}
		}

		break;

	//投票
	case 'vote' :
		//投票编号
		$voteid   = intval($_GET['voteid']);
		//投票类型
		$votetype = intval($_POST['votetype']);
		//投票表单
		if($do=='')
		{
			$voteinfo = $db->fetch_one_array("SELECT id,types,title FROM {$tablepre}votetoplic WHERE showindex = 1 ORDER BY RAND() LIMIT 1");
			$query    = $db->query("SELECT * FROM {$tablepre}votes WHERE lid = " . $voteinfo['id']);
			$items    = array();
			while($item = $db->fetch_array($query))
			{
				$items[] = $item ;
			}
			include template('vote');
		}
		elseif($do=='view') //查看投票结果
		{
			//投票总数
			$total    = $db->fetch_one_array("SELECT SUM(vcount) as total FROM {$tablepre}votes WHERE lid = $voteid");
			//投票项目
			$query    = $db->query("SELECT * FROM {$tablepre}votes WHERE lid = $voteid");
			$items    = array();
			while($item = $db->fetch_array($query))
			{
				//计算比例
				$item['width'] = !empty($item['vcount']) ? ($item['vcount']/$total['total']) * 50 : 1 ;
				$items[] = $item ;
			}
			include template('vote_view');
		}
		elseif($do=='tovote') //投票操作
		{
			//检查cookie是否存在,且cookie中的id不等于当前投票的id
			if (isset($_COOKIE['vote']) && isset($_COOKIE['voteid']) && intval($_COOKIE["voteid"]) == $voteid)
			{
				echo "<script>alert('您已经投过票了，请不要重复投票');history.back();</script>";
				exit;
			}

			//投票项目
		    $vcount = $_POST["item"];

			//安全处理
			if(empty($vcount))
			{
				echo "<script>alert('您还没有选择任何投票项目');history.back();</script>";
				exit;
			}

			if($voteid)
			{
				//单选计票
				if ($votetype==1)
				{
					$vcount = intval($vcount);
					$db->query("update {$tablepre}votes set vcount = vcount + 1 where id = $vcount");
					//计入cookie 设定失效时间为1个小时
					setcookie("vote","vote",time()+3600);
					setcookie('voteid',$voteid,time()+3600);
					echo "<script>alert('投票成功！');location.href='index.php?action=class&todo=vote&do=view&voteid=$voteid';</script>";
				}
				else  //复选计票
				{
					if(is_array($vcount))
					{
						//遍历更新每个选项投票值
						foreach ($vcount as $count)
						{
							$db->query("UPDATE {$tablepre}votes SET vcount = vcount + 1 WHERE id = " . intval($count));
						}
						//计入cookie 设定失效时间为1个小时
						setcookie('vote','vote',time() + 3600);
						setcookie('voteid',$voteid,time() + 3600);
						echo "<script>alert('投票成功！');location.href='index.php?action=class&todo=vote&do=view&voteid=$voteid';</script>";
					}
				}
			}
			else
			{
				echo "<script>alert('未知的错误');history.back();</script>";
			}
		}
	break;

	case 'search' ://搜索
		$keywords = trim($_GET['keywords']);//搜索的关键字
		$page    = intval( isset($_GET['page']) ? $_GET['page'] : 1 );
		$perpage = intval( isset($_GET['perpage']) ? $_GET['perpage'] : 18 );
		if($page > 0) {
			$startlimit = ($page - 1) * $perpage;
		} else {
			$startlimit = 0;
		}

		$sql = "SELECT COUNT(id) AS countnum FROM {$tablepre}sitearticle WHERE title like '%$keywords%' ";
		$log = $db->fetch_one_array($sql);
		$total  = $log['countnum'];
		$result = $db->query("SELECT * FROM {$tablepre}sitearticle WHERE title like '%$keywords%' ORDER BY listnum,id DESC LIMIT $startlimit,$perpage");
		$article = array();
		while($data = $db->fetch_array($result))
		{
			$data['addtime'] = gmdate('Y-n-j  H:i',$data['addtime']);
			$data['title'] = str_replace($keywords,'<font color="red">'.$keywords.'</font>',$data['title']);
			$article[] = $data;
		}
		$page_control = multipage($total,$perpage,$page);
		include template('search');
	break;

	case 'friendlink'://友情链接
		$friendlink = getFriendLink();
		include template('friendlink');
	break;

	case 'exam':
		$_SESSION['jnum']  = isset($_POST['jnum']) ? intval($_POST['jnum']) : 20;
		$_SESSION['snum']  = isset($_POST['snum']) ? intval($_POST['snum']) : 20;
		$_SESSION['fnum']  = isset($_POST['fnum']) ? intval($_POST['fnum']) : 20;
		$_SESSION['anum']  = isset($_POST['anum']) ? intval($_POST['anum']) : 20;
		//echo '判断题：'.$_SESSION['jnum']. '选择题：'.$_SESSION['snum'].'填空题'.$_SESSION['fnum'] ;
		if($do==0)
		{
			$judges = judge_list();
		}
		elseif($do==1)
		{
	    	$selects = select_list();
		}
		elseif($do==2)
		{
			$fills = fill_list();
		}
        elseif($do==3)
		{
        	$asks = ask_list();
		}
		else
		{
	    	$judges = select_list();
		}
		include template('exam');
	break;
	//默认操作 首页
	default :
		//调取标号1-9的首页栏目内容
		//$index_0 = $index_1 = $index_2 = $index_3 = $index_4 = $index_5 = $index_6 = $index_7 = $index_8 = $index_9 = array();
		for($i=0;$i<=9;$i++)
		{
			$tmparr = explode(',',${'setting_siteindex' .$i});
			if(!empty($tmparr))
			{
				${'index_'.$i} = getModuleContent($tmparr[0],$tmparr[1],$tmparr[2],$tmparr[3]);
			}
		}
		unset($tmparr);


		include template('index');*/
}

/**
 * 首页数据调用函数
 *
 * @access  public
 *
 * @param   int      $mid        模块id
 * @param   int		 $limit      限制条数
 * @param   int		 $titlelimit 题目字数
 * @param   string   $timeformat 时间格式
 *
 * @return  array
 */
function getModuleContent($mid,$limit,$titlelimit,$timeformat)
{
	global $db,$tablepre;
	$moduleinfo = $db->fetch_one_array("SELECT * FROM {$tablepre}sitemodule WHERE id = $mid");
	if(empty($moduleinfo))
		return;
	if(empty($limit))
		$limit = 5;
	if(empty($timeformat))
		$timeformat = 'Y-n-j  H:i';
	$articles = $module = array();
	switch($moduleinfo['moduletype'])
	{
		//处理单页面类型调用
		case 'Simple' :
			$articles = $db->fetch_one_array("SELECT * FROM {$tablepre}sitearticle WHERE moduleid = $mid  ORDER BY listnum,id DESC LIMIT $limit");

			break;
		//处理新闻类型调用
		case 'News' :
			$query = $db->query("SELECT * FROM {$tablepre}sitearticle WHERE moduleid = $mid  ORDER BY listnum,id DESC LIMIT $limit");
			while($article = $db->fetch_array($query))
			{
				$article['alt']     = $article['title'];
				$article['addtime'] = gmdate($timeformat,$article['addtime']);
				$article['title']   = sub_str($article['title'],0,$titlelimit,true);
				$article['link']    = linkurl($article['id'],'article');
				$articles[]         = $article;
			}
			break;
		//处理模块分类类型调用
		case 'Sub' :
			//取出下级分类的分类id
			$query = $db->query("SELECT id,modulename  FROM {$tablepre}sitemodule WHERE fid = $mid AND moduletype != 'Sub' AND  moduletype != 'Course'");
			$childs = '';
			$childNames = array();
			while($m = $db->fetch_array($query))
			{
				$childs .= $m['id'].',';
				$m['link'] =  linkurl($m['id']);
				$m['modulename'] =  sub_str($m['modulename'],0,10,false);
				$childNames[] = $m;
			}
			$childs = preg_replace('/,$/','',$childs);


			//$query = $db->query("SELECT * FROM {$tablepre}sitearticle WHERE moduleid in ({$childs})  ORDER BY listnum,id DESC LIMIT $limit");
			while($article = $db->fetch_array($query))
			{
				$article['alt']     = $article['title'];
				$article['title']   = sub_str($article['title'],0,$titlelimit,true);
				$article['addtime'] = gmdate($timeformat,$article['addtime']);
				$article['link']    = linkurl($article['id'],'article');
				$articles[] = $article;
			}
			break;
	}
	$module['articles'] = $articles;
	$module['mid'] = $mid;
	$module['link'] = linkurl($mid);
	$module['modulename'] = $moduleinfo['modulename'];
	$module['childNames'] = $childNames;
	return $module;
}

/**
 * 反向递归获得模块顶级分类id函数
 *
 * @access  public
 *
 * @param   int      $fid        模块的上级id
 *
 * @return  int
 */
function getFatherModule($fid)
{
	global $db,$tablepre;
	$result = $db->fetch_one_array("SELECT id,fid FROM {$tablepre}sitemodule WHERE id = $fid");
	if($result['fid'] == 0)
	{
		return $result['id'];
	}
	else
	{
		return getFatherModule($result['fid']);
	}
}


/**
 * 导航栏生成函数
 *
 * @access  public
 *
 * @param 	int      $mid		 模块本身id
 * @param   int      $fid        模块的上级id
 * @param   string   $mname      模块名称
 *
 * @return  string
 */
function getNav($mid,$fid,$mname)
{
	global $db,$tablepre;
	//检查是否为顶级模块
	if($fid == 0)
	{
		//直接返回当前模块超链接
		return '  <a href="'.linkurl($mid).'">'.$mname.'</a>  ';
	}
	else
	{
		//生成当前模块超链接
		$navstr = '  <a href="'.linkurl($mid).'">'.$mname.'</a>  ';
	}
	$result = $db->fetch_one_array("SELECT id,modulename,fid FROM {$tablepre}sitemodule WHERE id = $fid");
	if($result['fid'] == 0)
	{
		return '  <a href="'.linkurl($mid).'">'.$result['modulename'].'</a>  &gt;  ' .$navstr;
	}
	else
	{
		return getNav($result['id'],$result['fid'],$result['modulename']) . '  &gt;  ' . $navstr;
	}
}

/**
 * 得到模块下级第一个非分类/网络课堂等子栏目id函数
 *
 * @access  public
 *
 * @param 	int      $mid		 模块id
 *
 * @return  int
 */
function getChildNomalModule($mid)
{
	global $db,$tablepre;
	$query = $db->fetch_one_array("SELECT id FROM {$tablepre}sitemodule WHERE fid = $mid AND moduletype != 'Sub' AND moduletype != 'course' ORDER BY listnum,id ASC LIMIT 1");
	if($query)
	{
		return $query['id'];
	}
	else
	{
		return 0;
	}
}

?>
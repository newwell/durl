<?php
$_TEMPLATESDIR = TEMPLATES_PATH;
$_CACHEDIR = CACHE_PATH;
function template($file){
	global $_TEMPLATESDIR,$_CACHEDIR;
	$objfile = $_TEMPLATESDIR . "$file.tpl.php";
	/*if (IS_SAE) {
		$templateCacheFile = template_cache_sae($objfile);
	}else {*/
		$templateCacheFile = template_cache($objfile);	
//	}
	return $templateCacheFile;
}
function template_cache_sae($objfile) {
	$php_path = dirname(__FILE__).DIRECTORY_SEPARATOR;
	$tmplContent = file_get_contents($php_path.'../'.$objfile);
	// 根据模版文件名定位缓存文件
    $tmplCacheFile = SAE_TMP_PATH.md5($objfile).'.dazan.cache.php';
    //编译模板内容
	$tmplContent = template_compiler($tmplContent);
	if( false === file_put_contents($tmplCacheFile,trim($tmplContent))){
    	exit('缓存不能写->'.$tmplContent);
    }
    return $tmplCacheFile;
}
//模板缓存
function template_cache($objfile) {
	global $_TEMPLATESDIR,$_CACHEDIR;
	$php_path = dirname(__FILE__) . '/';
	//$cache_path = $php_path.'../'.$_CACHEDIR;
	$cache_path = $_CACHEDIR;
	//检查目录是否存在，不存在则创建
	if(!is_dir($cache_path)){
		mkdir($cache_path,'0777');
	}
	$tmplContent = file_get_contents($objfile);
	// 根据模版文件名定位缓存文件
    $tmplCacheFile = $cache_path.md5($objfile).'.dazan.cache.php';
	//编译模板内容
	$tmplContent = template_compiler($tmplContent);
	//重写Cache文件
	touch($tmplCacheFile);
    if( false === file_put_contents($tmplCacheFile,trim($tmplContent))){
    	exit('缓存不能写->'.$tmplContent);
    }
    return $tmplCacheFile;
}
//模板编译和优化
function template_compiler($tmplContent) {
	// 添加安全代码
	/*$tmplContent  =  "<?php if(!defined('IN_SITE')) exit('Access Denied');?>".$tmplContent;*/
	//去空格和换行
	$find     = array("~>\s+<~","~>(\s+\n|\r)~");
    $replace  = array('><','>');
    $tmplContent = preg_replace($find, $replace, $tmplContent);
    return $tmplContent;
}
?>

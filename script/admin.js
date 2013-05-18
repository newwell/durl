// 管理员后台JavaScript程序

/*
	管理员登出操作
*/
function adminlogout()
{
	try
	{
		parent.window.location.href = '?action=logout';
	}
	catch(e)
	{
		window.location.href = '?action=logout';
	}
}


/*
	鼠标移上和离开时修改text或者textarea的边框样式
*/
function fEvent(sType,oInput)
{
	
	switch (sType)
	{
		case "focus" :
			oInput.isfocus = true;
		case "mouseover" :
			oInput.style.borderColor = '#FF6600';
			break;
		case "blur" :
			oInput.isfocus = false;
		case "mouseout" :
			if(!oInput.isfocus)
			{
				oInput.style.borderColor='#336699';
			}
			break;
	}
}

/*
	删除操作确认函数
	@url 跳转地址
*/
function delconfirm(url)
{
	if(confirm('删除操作不可恢复,确认吗?'))
	{
		window.location.href = url;
	}
}

/*
	删除操作确认函数
	@form 表单
	@prefix 不选中表单域的name前缀
	@checkall 当前的名字
*/
function checkall(form, prefix, checkall) {
    var checkall = checkall ? checkall : 'chkall';
    for(var i = 0; i < form.elements.length; i++) {
        var e = form.elements[i];
        if(e.name != checkall && (!prefix || (prefix && e.name.match(prefix)))) {
            e.checked = form.elements[checkall].checked;
        }
    }
}

/*
	页面跳转
	@url 跳转地址
*/
function jumpto(url)
{
    window.location.href = url;
}

/*
	表单提交
	@action 跳转地址
*/
function dosubmit(action,todo,id)
{
    var form = document.getElementById(id);
    form.action = '?action='+action+'&todo='+todo;
    form.submit();
}
/*
	表单提交确认
*/
function dosubmitV(tishiyu,id)
{
    var form = document.getElementById(id);
    if(confirm(tishiyu))
	{
		 form.submit();
	}

}
/*
	表单提交确认
*/
function dosubmitNewV(action,tishiyu,id)
{
    var form = document.getElementById(id);
    if(confirm(tishiyu))
	{
        form.action = action;
		form.submit();
	}

}

//倒计时常量
var timeout;

//Ajax 读取状态条
function ShowLoading()
{
	var Loading = document.createElement('div');
	Loading.className = 'loading';
	Loading.setAttribute('id','loading');
	Loading.style.left = (document.body.clientWidth - 200) + 'px';
	Loading.style.top  = ((document.body.clientHeight + 50) - document.body.clientHeight  ) + 'px';
	Loading.innerHTML = '正在读取数据...';
	document.body.appendChild(Loading);
}

//去除读取进度条
function HideLoading()
{
	Element.remove('loading');
}

function showpanelnextadmin(tpars)
{
	var url  = 'admincp.php';

	var pars = tpars;  //"action=theme&todo=ajax&tmp=class"
	var myajax = new Ajax.Request(url,{method:'get',parameters: pars,onSuccess:showResponse});

}

//弹出选择模板窗口
function showpanel(tpars,url)
{
	//防止重复调用
	if($('panelbox'))
		return;

	hideselects();
	hideiframes();

	//生成高亮层
	var panelbox = document.createElement('div');
	//设定高亮层的css样式
    panelbox.className = 'panelbox';
	//生成菜单层
	panelbox.setAttribute('id','panelbox');
	//设定层定位
	panelbox.style.left = (document.body.clientWidth * 0.5) + 'px';
	panelbox.style.top  = (document.body.scrollTop + (document.body.scrollHeight - document.body.scrollTop) * 0.2) + 'px';

	var panelbanner = document.createElement('div');
	panelbanner.setAttribute('id','panelbanner');
	//设定高亮层的css样式
    panelbanner.className = 'panelbanner';
	var panelcontent = document.createElement('div');
	//设定高亮层的css样式
    panelcontent.className = 'panelcontent';
	//设定banner的HTML代码
	panelbanner.innerHTML = '<a href="javascript:ClosePanel()">[ 关闭 ]</a>   ';
	//给内容层赋ID
	panelcontent.setAttribute('id','panel');
	//把标题和内容层放到高亮层中去
	panelbox.appendChild(panelbanner);
	panelbox.appendChild(panelcontent);

	//最后把生成好的层放入body中
	document.body.appendChild(panelbox);

	Dom.Drag.makeDraggable(panelbanner,true);
	Dom.Drag.eleTransparent = true;
	Dom.Drag.startdrag();

	if(url=='' || url == undefined)
	{
		//url = 'admincp.php'
		url  = getpagename();
	}

	//var pars ='admincp.php?action=system_user&todo=edituser&uid=26';
	//var pars ='admincp.php?action=system_user&todo=edituser&uid=26'
	var pars = tpars;  //"action=theme&todo=ajax&tmp=class"
	var option = new Object();
	option.method = 'get';
	option.parameters = pars;
	option.onSuccess = showResponse;
	var myajax = new Ajax.Request(url,option);
	ShowLoading();
}

//返回数据处理
function showResponse(originalRequest)
{

	Element.update("panel",originalRequest.responseText);
	HideLoading();
}

//关闭ajax表单
function ClosePanel()
{
	Element.remove('panelbox');
	showselects();
	showiframes();
}

//ajax方式提交表单
function dosubmit(ele)
{
	var form = typeof(ele) == 'object' ? ele : $(ele);
	var action   = form.action;
	var pars = '';
	var option = new Object();
	option.method = 'post';
	for(i=0;i<form.elements.length;i++)
	{
		//input类型数据处理
		if(form.elements[i].tagName.toLowerCase()=='input')
		{
			switch(form.elements[i].type.toLowerCase())
			{
				case 'checkbox' :
					if(!form.elements[i].checked)
					{
						break;
					}
				//单选框,如果没有选中,不赋值,继续遍历表单
				case 'radio' :
					if(!form.elements[i].checked)
					{
						break;
					}
				case 'text' :
				case 'hidden' :
				case 'file' :
				default :
					pars += form.elements[i].name + '=' + encodeURIComponent(form.elements[i].value)+ '&';
			}
		}

		//select类型数据处理
		if(form.elements[i].tagName.toLowerCase()=='select')
		{
			pars += form.elements[i].name + '=' + encodeURIComponent(form.elements[i].value)+ '&';
		}

		//ewbeditor编辑器取值
		if(form.elements[i].tagName.toLowerCase()=='textarea')
		{
			try {
				//尝试取所关联的编辑器的值
				var localIFrame = document.frames(form.elements[i].name).document.frames("eWebEditor");
				pars += form.elements[i].name + '=' + encodeURIComponent(localIFrame.document.body.innerHTML)+ '&';
			} catch(e) {
				//如果没有关联的编辑器那么直接取textarea的值
				pars += form.elements[i].name + '=' + encodeURIComponent(form.elements[i].value) + '&';
			}
		}
	}
	option.parameters = pars;
	option.onSuccess  = submit_success;
	option.onFailure  = submit_failure;
	var myajax = new Ajax.Request(action,option);
	submitpanel('正在保存数据,请稍等....');
}

//提交成功后处理JSON
function submit_success(xmlhttp)
{

	var returnobj = eval('(' + xmlhttp.responseText + ')');
	updatepanel(returnobj);

}

//提交失败后处理JSON
function submit_failure(xmlhttp)
{
	var json = new Object();
	json.msg = '网络连接超时,可能是您的网络出现问题!';
	json.url = new Array(new Array('javascript:closeMsgPanel();','关闭'));
	json.autojump ='true';
	json.msgtype = 'error';
	updatepanel(json);
}

//更新AJAX提示栏
function updatepanel(json)
{
	//显示提示信息
	Element.update('msgboxcontent',json.msg);
	Element.show('msgboxurl');

	//生成底部超级链接
	var url = '操作:    ';
	for(i=0;i<json.url.length;i++)
	{
		//根据参数生成url
		if(json.url[i][2] == '_blank')
			url += '<a href="'+json.url[i][0]+'" target="_blank">'+json.url[i][1]+'</a> ';
		if(json.url[i][2] == '')
			url += '<a href="'+json.url[i][0]+'">'+json.url[i][1]+'</a> ';
	}

	//更新内容
	Element.update('msgboxurl',url);

	//检查跳转方式，根据不同的方式改变提示层的CSS样式
	switch(json.msgtype)
	{
		case 'success' :
			Element.addClassName('msgbox','msgboxgreen');
			Element.addClassName('msgboxbanner','msgboxbannergreen');
		break;
		case 'error' :
			Element.addClassName('msgbox','msgboxred');
			Element.addClassName('msgboxbanner','msgboxbannerred');
		break;
	}

	//判断是否允许自动跳转
	if(json.autojump=='true')
	{
		//自动匹配url或者javascript脚本
		if(json.url[0][0].match(/javascript:([\w]+?\(\));*/))
		{
			var fun = json.url[0][0].replace(/javascript:([\w]+?\(\));*/,"$1");
			timeout = setTimeout(fun,5000);
		}
		else
		{
			timeout = setTimeout('jumpto(\''+json.url[0][0]+'\')',5000);
		}
	}
}

//生成AJAX漂浮层
function submitpanel(msg)
{
	//防止重复调用
	if($('msgbox'))
		return false;

	hideselects();
	hideiframes();

	//生成提示层
	var msgbox = document.createElement('div');
	//生成菜单层
	msgbox.setAttribute('id','msgbox');
	msgbox.className = 'msgbox';
	//设定层定位
	msgbox.style.left = (document.body.clientWidth * 0.5) + 'px';
	msgbox.style.top  = (document.body.scrollTop + (document.body.scrollHeight - document.body.scrollTop) * 0.5) + 'px';
	//标题栏
	var msgboxbanner = document.createElement('div');
	msgboxbanner.setAttribute('id','msgboxbanner');
	msgboxbanner.innerHTML = '提示信息';
	msgboxbanner.className = 'msgboxbanner';
	//提示语句栏
	var msgboxcontent = document.createElement('div');
	msgboxcontent.setAttribute('id','msgboxcontent');
	msgboxcontent.innerHTML = msg;
	msgboxcontent.className = 'msgboxcontent';
	//操作导航栏
	var msgboxurl = document.createElement('div');
	msgboxurl.setAttribute('id','msgboxurl');
	msgboxurl.className = 'msgboxurl';
	//生成时默认不显示
	Element.hide(msgboxurl);

	//把标题和内容层放到高亮层中去
	msgbox.appendChild(msgboxbanner);
	msgbox.appendChild(msgboxcontent);
	msgbox.appendChild(msgboxurl);

	//生成遮罩层
	createOverLay();
	document.body.appendChild(msgbox);
	//设定拖拽属性
	Dom.Drag.makeDraggable(msgboxbanner,true);
	Dom.Drag.eleTransparent = true;
	Dom.Drag.startdrag();
}

//关闭Ajax提示栏
function closeMsgPanel()
{
	try {
		Element.remove('msgbox');
		Element.remove('overlay');
	} catch (e) {};
	showselects();
	showiframes();
	//Dom.Drag.stopdrag();
	//停止倒计时
	clearTimeout(timeout);
}

//清空表单
function clearform()
{
	var form = document.getElementsByTagName('form');
	if(form)
	{
		for(i=0;i<form[0].elements.length;i++)
		{
			//遍历表单所有项目,设定默认值为空
			if(form[0].elements[i].tagName.toLowerCase()=='input')
			{
				switch(form[0].elements[i].type.toLowerCase())
				{
					case 'checkbox' :
						break;
					case 'button' :
						break;
					case 'radio' :
						break;
					case 'submit' :
						break;
					case 'select' :
						break;
					case 'hidden' :
						break;
					case 'text' :
					default :
						form[0].elements[i].value = '';
				}
			}

			//编辑器清空
			if(form[0].elements[i].tagName.toLowerCase()=='textarea')
			{
				var localIFrame = document.frames(form[0].elements[i].name).document.frames("eWebEditor");
				localIFrame.document.body.innerHTML = '';
			}
		}
	}
	//停止倒计时
	clearTimeout(timeout);
	//关闭提示栏
	closeMsgPanel();
}


function createOverLay()
{
	//生成背景层
	var overlay = document.createElement('div');
	overlay.setAttribute('id','overlay');
	document.body.appendChild(overlay);
}




//choose the template and close the window without any question
function setupClassTemplate(folder)
{
	opener.$('ClassTemplates').value = folder;
	opener.$('system_set').submit();
	window.opener = null;
	window.close();
}




//global td object
var THETD;
//second or deeper mudules ajax display function
function displaychildmodule(moduleid)
{
	//change the icon
	$('tag'+moduleid).setAttribute('href','javascript:hidechildmodule('+moduleid+')');

	var oldtagurl = $('img'+moduleid).src;
	if(oldtagurl.match(/plus.gif$/i))
	{
		var oldtagsrc = oldtagurl.split(/plus.gif$/i);
		$('img'+moduleid).src = oldtagsrc[0] + 'minus.gif';
	}
	if(oldtagurl.match(/plusbottom.gif$/i))
	{
		var oldtagsrc = oldtagurl.split(/plusbottom.gif$/i);
		$('img'+moduleid).src = oldtagsrc[0] + 'minusbottom.gif';
	}

	var oldfoldersrc = $('folder'+moduleid).src.split(/folder.gif$/i);
	$('folder'+moduleid).src = oldfoldersrc[0] + 'folder_new.gif';


	//var url  = 'admincp.php';
	var url  = getpagename();
	var pars = 'action=module&todo=childmodule&moduleid='+moduleid+'&timestamp='+timestamp();
	var option = new Object();
	option.method = 'get';
	option.parameters  = pars;
	option.onSuccess   = childmoduleloadfinsh;
	var myajax = new Ajax.Request(url,option);
	Element.show('list'+moduleid);
	THETD = $('td'+moduleid);
	THETD.innerHTML = '<td align="left" colspan="5"><font color="red">正在读取数据,请稍等.....</font></td>';
}

//display childmodule table
function childmoduleloadfinsh(xmlhttp)
{
	THETD.innerHTML = xmlhttp.responseText;
}

//hide child module table
function hidechildmodule(moduleid)
{
	Element.hide('list'+moduleid);
	$('tag'+moduleid).setAttribute('href','javascript:displaychildmodule('+moduleid+')');
	var oldtagurl = $('img'+moduleid).src;
	if(oldtagurl.match(/minus.gif$/i))
	{
		var oldtagsrc = oldtagurl.split(/minus.gif$/i);
		$('img'+moduleid).src = oldtagsrc[0] + 'plus.gif';
	}
	if(oldtagurl.match(/minusbottom.gif$/i))
	{
		var oldtagsrc = oldtagurl.split(/minusbottom.gif$/i);
		$('img'+moduleid).src = oldtagsrc[0] + 'plusbottom.gif';
	}
	var oldfoldersrc = $('folder'+moduleid).src.split(/folder_new.gif$/i);
	$('folder'+moduleid).src = oldfoldersrc[0] + 'folder.gif';
}



function setupTemplate(folder)
{
	$('DeclareTemplates').value = folder;
	ClosePanel();
}

function getTemplate(dir)
{
	//var url  = 'admincp.php';
	var url  = getpagename();
	var pars = "action=theme&todo=ajaxview&dir="+dir;
	var option = new Object();
	option.method = 'get';
	option.parameters  = pars;
	option.onSuccess  = ChangeTemplate;
	var myajax = new Ajax.Request(url,option);
	$('template').innerHTML = '<font color="red">正在读取数据,请稍等.....</font>';

}

function chooseTemplate(dir)
{
	//var url  = 'admincp.php';
	var url  = getpagename();
	var pars = "action=theme&todo=ajaxchoose&dir="+dir;
	var option = new Object();
	option.method = 'get';
	option.parameters  = pars;
	option.onSuccess  = ChangeTemplate;
	var myajax = new Ajax.Request(url,option);
	$('template').innerHTML = '<font color="red">正在读取数据,请稍等.....</font>';

}

function ChangeTemplate(xmlhttp)
{
	$('template').innerHTML = xmlhttp.responseText;
}


function showcontent(module_id,point_id)
{
	var url  = 'index.php';
	var pars = 'action=content&m='+module_id+'&fid='+point_id;
	var option = new Object();
	option.method = 'get';
	option.parameters = pars;
	option.onSuccess  = changeContent;
	var myajax = new Ajax.Request(url,option);
	$('coursecontent').innerHTML = '正在读取数据,请稍等.....';

}


function changeContent(xmlhttp) {
	$('coursecontent').innerHTML = xmlhttp.responseText;
}


//模块选择函数
function showlistModule(ele) {
	switch(ele){
		case 'Url' :
			Element.hide('option');
			Element.show('url');
			break;
		case 'Course' :
			Element.hide('option');
			Element.hide('url');
			break;
		case 'Simple' :
			Element.hide('option');
			Element.hide('url');
			break;
		case 'Sub' :
			Element.hide('option');
			Element.hide('url');
			break;

		default :
        	Element.show('option');
			Element.hide('url');
	}
}

function showselectanswer(ele,form) {
	switch(ele){
		case '1' :
			Element.show('single');
			Element.hide('multi');

			for(i=0;i<form.elements.length;i++)
	        {
		//input类型数据处理
		      if(form.elements[i].tagName.toLowerCase()=='input')
		      {
			    switch(form.elements[i].type.toLowerCase())
			   {
				case 'radio' :
					if(form.elements[i].checked)
					{
						form.elements[i].checked=true;
					}
					break;
				//单选框,如果没有选中,不赋值,继续遍历表单
				case 'checkbox' :
					if(form.elements[i].checked)
					{
						form.elements[i].checked=false;
					}
					break;
                 default :
                form.elements[i].checked=false;
			}}}
			break;
		case '2' :
			Element.show('multi');
			Element.hide('single');
			break;
		default :
        	Element.show('single');
			Element.hide('multi');
	}
}

function showlink(ele) {
	switch(ele) {
        case '1' :
            Element.hide('picurl');
            break;
        case '2' :
            Element.show('picurl');
    }
}

function submitform(action,todo,mid,form,done) {
	form.action = '?action='+ action + '&todo=' + todo + '&mid=' + mid + '&do='+done;
	if(todo=='del') {
		if(confirm('删除操作不可恢复,确认吗?'))
			form.submit();
		else
			return false;
	} else {
		form.submit();
	}
}

function commendsubmitform(submiturl,form,todo)
{
	form.action = submiturl;
	if(todo=='del') {
		if(confirm('删除操作不可恢复,确认吗?'))
			form.submit();
		else
			return false;
	} else {
		form.submit();
	}
}

function showlistCategory(ele) {
    switch(ele) {
        case 'Cate' :
            Element.hide('ext');
            break;
        case 'Url' :
            Element.show('ext');
    }
}

function choosefile(file)
{
	$('url').value = file;
	ClosePanel();
}


//左侧导航菜单点击变色函数
function ChangeMenuStyle(id)
{
	var modulecount = $('modulecount').value;
	$('leftmenu'+id).className = 'click';
	for(i=0;i<modulecount;i++)
	{
		if(i!=id)
		{
			$('leftmenu'+i).className = 'left';
		}
	}
	try
	{
		var catecount = $('catecount').value;
		for(i=0;i<catecount;i++)
		{
			$('leftcate'+i).className = 'left';
		}
	}
	catch (e)
	{
	}
}

function ChangeCateStyle(id)
{
	var catecount = $('catecount').value;
	$('leftcate'+id).className = 'click';
	for(i=0;i<catecount;i++)
	{
		if(i!=id)
		{
			$('leftcate'+i).className = 'left';
		}
	}
	try
	{
		var modulecount = $('modulecount').value;
		for(i=0;i<modulecount;i++)
		{
			$('leftmenu'+i).className = 'left';
		}
	}
	catch (e)
	{
	}
}

function Topen(key1,key2,key3)  //展开下属列表
{
	$(key1).style.display="none";
	$(key2).style.display="";
	$(key3).style.display="";
}

function Tclose(key1,key2,key3)  //关闭下属列表
{
	$(key1).style.display="";
	$(key2).style.display="none";
	$(key3).style.display="none";
}

//设定模板并提交表单
function setupTemplate(folder)
{
	$('setting_sitetemplate').value = folder;
	ClosePanel();
	document.getElementsByTagName('form')[0].submit();
}


function finishreply(replyid)
{
	//关闭浮动窗口
	closeMsgPanel();
	ClosePanel();
	$('reply'+replyid).innerHTML = '已回复';
}

function showGoogleResponse(originalRequest)
{
	$('panel').innerHTML = originalRequest.responseText;
	loadGoogle();
}

function loadGoogle(){

	//是否安装google gears
	if (!window.google || !google.gears ){
		//安装Gears
		document.getElementById('gears-d').style.display = 'block';
		document.getElementById('gears-available-div').style.display = 'none';
		return;
	}
	else{

		document.getElementById('gears-d').style.display = 'none';
		document.getElementById('gears-available-div').style.display = 'block';
	}
	desktop      = google.gears.factory.create('beta.desktop');
	request      = google.gears.factory.create('beta.httprequest');

}

function showpaneluploadadmin(tpars)
{

	var url  = 'admincp.php';
	var pars = tpars;  //"action=theme&todo=ajax&tmp=class"
	var myajax = new Ajax.Request(url,{method:'get',parameters: pars,onSuccess:showGoogleResponse});

}
<?php #tplhash=a4143db661eeed27aaece866e9ba1b28 ?>
<?php #createtime=2008-06-17 10:20:28 ?>
<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登陆 - <?php echo $setting_sitename?></title>
<script src="script/check.js" type="text/javascript"></script>
<script src="script/admin.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo $_TEMPLATESDIR?>/images/stley.css" />
</head>


</head>
<body>
<form id="form1" name="form1" method="post" action="?action=checklogin" onsubmit="return CheckForm(this,true);">
<div class="main">
    	<div class="table">
        	<div class="in">
        	<p class="username">用户名：</p>
            <input class="name_box" id="username" name="username"   fun="UserName" required="true" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
            <p class="userpad">密 码：</p>
            <input class="pad_box" id="password" name="password" type="password"  fun="PassWord" required="true"  onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
            <!-- <p class="userpad">验证码：</p>
            <label class="yan"></label>-->
         </div>
            <div class="button">
            	<input class="but_ok" type="image" src="<?php echo $_TEMPLATESDIR?>/images/img/login.jpg" />
                <a href="javascript:this.form1.username.value='';this.form1.password.value='';exit;"><img class="but_exit" src="<?php echo$_TEMPLATESDIR?>/images/img/exit.jpg" /></a>
            </div>
        </div>
    </div>
</form>
</body>
</html>
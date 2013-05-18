<?php #tplhash=a4143db661eeed27aaece866e9ba1b28 ?>
<?php #createtime=2008-06-17 10:20:28 ?>
<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> 周志管理系统 </title>
<link rel="stylesheet" href="<?=$_TEMPLATESDIR?>/css.css" />
<script src="script/prototype.js" type="text/javascript"></script>
<script src="script/class.js" type="text/javascript"></script>
<script src="script/common.js" type="text/javascript"></script>
<script src="script/check.js" type="text/javascript"></script>
<script>
function fEvent(sType,oInput){
    switch (sType){
        case "focus" :
            oInput.isfocus = true;
        case "mouseover" :
            oInput.style.borderColor = '#FF6600';
            break;
        case "blur" :
            oInput.isfocus = false;
        case "mouseout" :
            if(!oInput.isfocus){
                oInput.style.borderColor='#336699';
            }
            break;
    }
}

function pressCaptcha(obj){
    obj.value = obj.value.toUpperCase();
}
</script>

<script type="text/javascript">
function initcity(city) {
switch (document.creator["province"].value) {
<?php 
foreach ($YuanXiBuMen as $key => $yuanxi) {
	if (!empty($yuanxi['bumen'])) {
	
		echo 'case "'.$yuanxi['modulename'].'" : var cityOptions = new Array( "请选择子类", "",';
		foreach ($yuanxi['bumen'] as $key=> $bumen) {
			if (($key+1)>=count($yuanxi['bumen'])) {
				echo '"'.$bumen['modulename'].'", "'.$bumen['modulename'].'"';
			}else {
				echo '"'.$bumen['modulename'].'", "'.$bumen['modulename'].'",';
			}
		}
		echo ');break;';
	}
}
?>
default: var cityOptions = new Array("请选择子类", ""); break; 
}
document.creator["city"].options.length = 0;
for(var i = 0; i < cityOptions.length/2; i++) {
document.creator["city"].options[i]=new Option(cityOptions[i*2],cityOptions[i*2+1]);
    if (document.creator["city"].options[i].value==city){
    document.creator["city"].selectedIndex = i; 
    } 
  } 
 } function creatprovince(province){
	 

 var provinces = new Array( <?php foreach ($YuanXiBuMen as $key => $yuanxi) {
 	if (($key+1)>=count($YuanXiBuMen)) {
 		echo '"'.$yuanxi['modulename'].'"';
 	}else {
 		echo '"'.$yuanxi['modulename'].'",';
 	}
 }?>); 
 document.creator["province"].options[0]=new Option("请选择组织",""); 

for(var i = 0; i < provinces.length; i++) {
    document.creator["province"].options[i+1]=new Option(provinces[i],provinces[i]); 
    if (document.creator["province"].options[i+1].value==province){
        document.creator["province"].selectedIndex = i+1; 
        } 
     } 
   }
</script>

</head>
<body>
<form id="form1" name="creator" method="post" action="?action=savereg" onsubmit="return CheckForm(this,true);">
<br /><br /><br /><br /><br /><br />
<table width="70%" border="0" align="center" cellpadding="2" cellspacing="1" style="border:1px solid #336699;" height="150">
  <tr>
    <td colspan="4" valign="middle" style="height:20px;font-size:16px;font-weight:bold;BACKGROUND: #336699;BORDER-BOTTOM:#FF6600 2px solid;color:#FFFFFF;vertical-align:middle;padding:5px; text-align:center;"> 注册 </td>
  </tr>
  <tr>
    <td width="33%" rowspan="4" valign="top" align="center" height="30"><img src="<?=$_TEMPLATESDIR?>/image/hq_r1_c2.jpg" /></td>
    <td width="15%" align="right"><b>登录名:</b></td>
    <td colspan="2"><input name="username" type="text"  fun="UserName" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/></td>
  </tr>
  <tr>
    <td align="right"><B>密码:</B></td>
    <td colspan="2"><input name="password" type="password"  fun="PassWord" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/></td>
  </tr>
  <tr>
    <td align="right"><B>确认密码:</B></td>
    <td colspan="2"><input name="password2" type="password"  fun="PassWord" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/></td>
  </tr>
  <tr>
    <td align="right"><B>真实姓名:</B></td>
    <td colspan="2"><input name="zname" type="text"  required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/></td>
  </tr>
  <tr>
  <td></td>
   <td align="right"><b>组织:</b></td>
  <td colspan="2">
  	<select onchange="initcity();" name="province" >
       	<script type="text/javascript">creatprovince();</script>
	</select>
  </td>
  </tr>
  <tr><td></td>
  <td align="right"><b>子类:</b></td>
  <td colspan="2">
  	<select name="city" required="true">
	    <option value="">先选择组织</option>
	</select>
  </td>
  </tr>
  <tr><td></td>
  <td align="right"><b>职位:</b></td>
  <td colspan="2"><input name="zhiwei" required="true"/></td>
  </tr>
  <tr><td></td>
  <td align="right"><b>办公电话:</b></td>
  <td colspan="2"><input name="tel" required="true" /></td>
  </tr>
  <tr><td></td>
  <td align="right"><b>手机:</b></td>
  <td colspan="2"><input name="phone" required="true"></td>
  </tr>

  <tr>
    <td colspan="3" align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="formsubmit" value="提交注册"> </td>
  </tr>
</table>
</form>
</body>
</html>

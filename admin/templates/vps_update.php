<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">修改服务器信息</div> 
<form action="?action=vps&todo=saveupdate" method="post" onsubmit="return CheckForm(this,true);">
<input type="hidden" value="<?=$formhash?>" name="formhash">
<input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
<table align="center" class="formtable" cellpadding="0" cellspacing="1" width="55%">
	<tr>
	    <td width="80px" align="right">名称:</td>
	    <td>
	        <input name="vps" value="<?php echo $vpsInfo['vps'];?>" fun="title" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">地址:</td>
	    <td>
	        <input name="adds" id="adds" value="<?php echo $vpsInfo['adds'];?>" fun="title" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*需要带上 http:// 或 https://</td>
	</tr>
	<tr>
	    <td width="80px" align="right">用户:</td>
	    <td>
	        <input name="user" id="user" value="<?php echo $vpsInfo['user'];?>" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">密码:</td>
	    <td>
	        <input name="pwd" value="<?php echo $vpsInfo['password'];?>" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
		<td colspan="2" align="center">	<input type="submit" class="formsubmit" value="保存修改" ></td>
	</tr>
</table>
</form>

<?php include template('foot'); ?>
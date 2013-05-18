<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">添加部门</div> 
<form action="<?php 
if ($todo =='addpage') {
	echo "?action=department&todo=saveadd";
}elseif ($todo == 'updatepage'){
	echo "?action=department&todo=saveupdate";
}
?>" method="post" onsubmit="return CheckForm(this,true);">
<input type="hidden" value="<?=$formhash?>" name="formhash">
<input type="hidden" value="<?php echo $_GET['id']?>" name="depa_id">
<table align="center" class="formtable" cellpadding="0" cellspacing="1" width="55%">
<tr>
    <td width="80px" align="right">部门名称:</td>
    <td>
        <input name="title" value="<?php echo $department['department']?>" id="title" fun="title" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
   		*不能为空</td>
</tr>
<tr>
    <td width="80px" align="right">顺序:</td>
    <td>
        <input name="sunx" id="sunx" value="<?php if (empty($department['sunx'])){echo "0";}else {echo $department['sunx'];}?>" fun="title" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
   		*不能为空</td>
</tr>
   <tr>
<td colspan="2" align="center">	<input type="submit" class="formsubmit" value="提交" ></td>
</tr>
</table>
</form>

<?php include template('foot'); ?>
<?php #tplhash=f0cc5b4ee63c07a51ba10e088804d12c ?>
<?php #createtime=2008-07-30 11:25:55 ?>
<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php  include template('header'); ?>

<div class="formnav">管理员信息修改</div>
<form name="creator" action="?action=<?=$act['action']?>&todo=saveadd" method="post" onsubmit="return CheckForm(this,true);">
<input type="hidden" value="<?=$formhash?>" name="formhash">
<table align="center" class="formtable" cellpadding="0" cellspacing="1" width="580">
<tr>
    <td width="20%" align="right">用户名: </td>
    <td><input name="username" id="username"  fun="UserName" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/></td>
</tr>

<?php if($_SESSION['userlevel']!=1) { ?>
    <tr>
		<td width="20%" align="right">原密码:</td>
   		<td>
			<input name="old_password" id="old_password"  type="password" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)" />*修改密码必须填写原密码</td>
   </tr>
<? } ?>
<tr>
<td width="20%" align="right"><input type="hidden" name="uid" value="<?=$uid?>">
        新密码:
        </td>
   	<td>
<input name="password" id="password"  type="password"  style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)" /> 
   <font color="red">*密码长度不能小于六位数</font></td>
</tr>
 <tr>
		<td width="20%" align="right">真实姓名:</td>
   		<td>
			<input name="zname" id="zname"  style="border:#336699 1px solid;" /></td>
  </tr>
 <tr>
		<td width="20%" align="right">部门:</td>
   		<td><select name="bumen">
   		<?php if (is_array($depaArr)) {foreach ($depaArr as $value) {?>
   			<option value="<?php echo $value['id']?>"  ><?php echo $value['department']?></option>
   		<?php }}?>   			
   		</select></td>
 </tr>
 <tr>
		<td width="20%" align="right">职位:</td>
   		<td>
			<input name="zhiwei" style="border:#336699 1px solid;" /></td>
  </tr>
 <tr>
		<td width="20%" align="right">QQ:</td>
   		<td>
			<input name="QQ" style="border:#336699 1px solid;" /></td>
  </tr>
 <tr>
		<td width="20%" align="right">手机号码:</td>
   		<td>
			<input name="phone" style="border:#336699 1px solid;" /></td>
  </tr>


<?php 
if($_SESSION['userlevel'] == 1 ) { ?>
   <tr>
	<td width="20%" align="right">管理员级别:</td>
	<td>
		<input type="radio" name="userlevel" value="1"  />管理员
		<input type="radio" name="userlevel" value="2" />管理层
		<input type="radio" name="userlevel" value="3" checked />普通员工
	</td>
   </tr>
<tbody id="rightpanel" style="display:none;">
<tr>
	<td width="100%" colspan="2" align="center">管理员权限分配</td>
</tr>   

<tr>
<td width="20%" align="right"><?=$kc?></td>
<td>
<?php 
if(is_array($lanmu_arr)) { foreach($lanmu_arr as $num => $child) { ?>
<input type="checkbox" name="action[]" value="m<?=$child['id']?>m" 
<?php if($child['cando'] == 1) { ?>
checked
<? } ?>
><?=$child['modulename']?>
<?php if(($num % 3) == 0 && $num > 0) { ?>
<br>
<? } ?>
<?php } } ?>
</td>

</tr>
<?php if ($enable_declare == true){?>
<tr>
	<td width="20%" align="right"><?=$sb?></td>
	<td>
	<?php 
	if(is_array($lanmu_d_arr)) { foreach($lanmu_d_arr as $num => $child) { ?>
	<input type="checkbox" name="action[]" value="d<?=$child['id']?>d" 
	<?php if($child['cando'] == 1) { ?>
	checked
	<? } ?>
	><?=$child['title']?>
	<?php if(($num % 3) == 0 && $num > 0) { ?>
	<br>
	<? } ?>
	<?php } } ?>
	</td>
</tr>
<?php }?>

</tbody>
<? } ?>
<tr>
	<td colspan="2" align="center">
		<input type="submit" class="formsubmit" value="提交" >
	</td>
</tr>

</table>
</form>


<script>
//Element.toggle('rightpanel');
</script> 


<?php include template('foot'); ?>

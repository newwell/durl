<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">添加服务器信息记录</div> 
<form action="?action=vps_log&todo=saveadd" method="post" onsubmit="return CheckForm(this,true);">
<input type="hidden" value="<?=$formhash?>" name="formhash">
<table align="center" class="formtable" cellpadding="0" cellspacing="1" width="55%">
	<tr>
	    <td width="80px" align="right">选择服务器:</td>
	    <td><select name="v_id">
	    <?php if (is_array($webLogArr)) {foreach ($webLogArr as $value) {
	    $did	= isset ( $_GET ['id'] ) ? intval( $_GET ['id'] ) : 0;
	    	?>
	    	 <option value="<?php echo $value['id']?>" <?php if ($value['id']==$did){echo 'selected';}?>><?php echo $value['vps']?></option>
	   <?php }}?>	   
	    </select></td>
	</tr>
	<tr>
	    <td width="80px" align="right">磁盘使用率:</td>
	    <td>
	        <input name="disk" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">内存使用率:</td>
	    <td>
	        <input name="ram" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">流量使用率:</td>
	    <td>
	        <input name="flow" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">统计时间:</td>
	    <td>
	    <script language="javascript" type="text/javascript" src="script/Date_Time/WdatePicker.js"></script>
		    <input name="time" required="true" onClick="WdatePicker()"/>
	   		*不能为空</td>
	</tr>
	<tr>
		<td colspan="2" align="center">	<input type="submit" class="formsubmit" value="提交" ></td>
	</tr>
</table>
</form>

<?php include template('foot'); ?>
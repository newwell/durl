<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">添加站点</div> 
<form action="?action=website_log&todo=saveadd" method="post" onsubmit="return CheckForm(this,true);">
<input type="hidden" value="<?=$formhash?>" name="formhash">
<table align="center" class="formtable" cellpadding="0" cellspacing="1" width="55%">
	<tr>
	    <td width="80px" align="right">站点:</td>
	    <td><select name="w_id">
	    <?php if (is_array($webLogArr)) {foreach ($webLogArr as $value) {?>
	    	 <option value="<?php echo $value['id']?>" <?php if ($value['id']==$_GET['id']){echo 'selected';}?>><?php echo $value['adds']?></option>
	   <?php }}?>	   
	    </select></td>
	</tr>
	<tr>
	    <td width="80px" align="right">IP:</td>
	    <td>
	        <input name="ip" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">PV:</td>
	    <td>
	        <input name="pv" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">收录:</td>
	    <td>
	        <input name="record" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">订单数:</td>
	    <td>
	        <input name="order_num" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">完成订单数:</td>
	    <td>
	        <input name="order_wnum" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
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
<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">修改站点</div> 
<form action="?action=website&todo=saveupdate" method="post" onsubmit="return CheckForm(this,true);">
<input type="hidden" value="<?=$formhash?>" name="formhash">
<input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
<table align="center" class="formtable" cellpadding="0" cellspacing="1" width="55%">
	<tr>
	    <td width="80px" align="right">负责人:</td>
	    <td><select name="uid">
	    <?php if (is_array($userArr)) {foreach ($userArr as $value) {?>
	    	 <option value="<?php echo $value['id']?>" <?php if ($value['id']==$websiteInfo['uid']){echo 'selected';}?>><?php echo $value['zname']?></option>
	   <?php }}?>	   
	    </select></td>
	</tr>
	<tr>
	    <td width="80px" align="right">服务器:</td>
	    <td><select name="vid">
	    <?php if (is_array($vpsArr)) {foreach ($vpsArr as $value) {	?>
	    	 <option value="<?php echo $value['id']?>" <?php if ($value['id']==$websiteInfo['vid']){echo 'selected';}?>><?php echo $value['vps']?></option>
	   <?php }}?>	   
	    </select>	   
	    </select></td>
	</tr>
	<tr>
	    <td width="80px" align="right">地址:</td>
	    <td>
	        <input value="<?php echo $websiteInfo['adds'];?>" name="adds" id="adds" fun="title" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*需要带上 http:// 或 https://</td>
	</tr>
	<tr>
	    <td width="80px" align="right">用户:</td>
	    <td>
	        <input name="user" value="<?php echo $websiteInfo['user'];?>" id="user"  required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">密码:</td>
	    <td>
	        <input name="password" value="<?php echo $websiteInfo['password'];?>" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">FTP地址:</td>
	    <td>
	        <input name="ftp_adds" value="<?php echo $websiteInfo['ftp_adds'];?>" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">FTP帐号:</td>
	    <td>
	        <input name="ftp_name" value="<?php echo $websiteInfo['ftp_name'];?>" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">FTP密码:</td>
	    <td>
	        <input name="ftp_pwd" value="<?php echo $websiteInfo['ftp_pwd'];?>" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">数据库名称:</td>
	    <td>
	        <input name="db_name" value="<?php echo $websiteInfo['db_name'];?>" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">数据库帐号:</td>
	    <td>
	        <input name="db_user" value="<?php echo $websiteInfo['db_user'];?>" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">数据库密码:</td>
	    <td>
	        <input name="db_pwd" value="<?php echo $websiteInfo['db_pwd'];?>" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">51.LA:</td>
	    <td>
	        <input name="flow_id" value="<?php echo $websiteInfo['flow_id'];?>" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
	    <td width="80px" align="right">密钥:</td>
	    <td>
	        <input name="secret_key" value="<?php echo $websiteInfo['secret_key'];?>" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
	   		*不能为空</td>
	</tr>
	<tr>
		<td colspan="2" align="center">	<input type="submit" class="formsubmit" value="提交" ></td>
	</tr>
</table>
</form>

<?php include template('foot'); ?>
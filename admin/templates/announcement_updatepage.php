<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">修改公告</div> 
<form action="?action=announcement&todo=update" method="post" onsubmit="return CheckForm(this,true);">
<input type="hidden" value="<?=$formhash?>" name="formhash">
<input type="hidden" value="<?=$_GET['id']?>" name="id">
<table align="center" class="formtable" cellpadding="0" cellspacing="1" width="98%">
<tr>
    <td width="80px" align="right">标题:</td>
    <td>
        <input name="title" id="title" value="<?=$announcement['title']?>" fun="title" required="true" style="border:#336699 1px solid;" onMouseOver="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)"/>
   		*标题不能为空</td>
</tr>
</td>
</tr>
<tr>
    <td  align="right">公告内容:</td>
    <td>
        <textarea required="true" name="content" rows="12" cols="90"><?=$announcement['content']?></textarea>
   		</td>
</tr>

   <tr>
<td colspan="2" align="center"><input type="reset" class="formsubmit" value="重置" >&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" class="formsubmit" value="提交" ></td>
</tr>
</table>
</form>

<?php include template('foot'); ?>
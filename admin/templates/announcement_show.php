<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">公告</div> 
<form action="?action=announcement&todo=update" method="post" onsubmit="return CheckForm(this,true);">
<input type="hidden" value="<?=$formhash?>" name="formhash">
<input type="hidden" value="<?=$_GET['id']?>" name="id">
<table align="center" class="formtable" cellpadding="0" cellspacing="1" width="98%">
<tr>
    <td width="80px" align="right">标题:</td>
    <td><?=$announcement['title']?></td>
</tr>
<tr>
	<td align="right">发布人:</td>
	<td><?=$announcement['author']?></td>
</tr>
<tr>
	<td align="right">发布时间:</td>
	<td><?=gmdate ( 'Y-n-j  H:i', $announcement['addtime'] )?></td>
</tr>
<tr>
    <td  align="right">公告内容:</td>
    <td><?=$announcement['content']?></td>
</tr>

</table>
</form>

<?php include 'admin/templates/foot.php'; ?>
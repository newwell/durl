<?php #tplhash=8b10666abf9328bc2f95f7f9f1f246fc ?>
<?php #createtime=2008-06-20 8:53:54 ?>
<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">通知公告列表</div> 
<input type="hidden" value="<?=$formhash?>" name="formhash">
<table width="98%"  border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td valign="top" align="center" width="100%">

    <table width="100%" cellpadding="1" cellspacing="1" align="center" class="listtable">
		<?php if ($_SESSION['userlevel']==1) { ?>
		<tr >
         <td colspan="1" >
            <input type="button" value="&nbsp;&nbsp;添加公告&nbsp;&nbsp;" class="button_input" onclick="JavaScript:location.href='?action=announcement&todo=addpage'">
         </td></tr><?php }?>
<form name="f1" method="post">  
<input type="hidden" value="<?=$formhash?>" name="formhash">  
        <tr>
            <th width="20%">标题</th>
            <th width="40%" >内容</th>
			<th width="12%" >时间</th>
			<?php if ($_SESSION['userlevel']==1){?>
			<th width="8%" >操作 <input type="checkbox" name="chkall" onclick="checkall(this.form)"></th>
			<?php }?>			
        </tr>
<?php
if(is_array($announcement)) { foreach($announcement as $key => $value) { ?>
        <tr bgcolor="#E4EDF9">
            <td class="list"><?=$value['title']?></td>
            <td class="list"><?=$value['content']?></td>
            <td class="list"><?=$value['addtime']?></td>           
			<?php if ($_SESSION['userlevel']==1){?>
			<td class="list">
			<a href="?action=announcement&todo=updatepage&id=<?=$value['id']?>">修改</a> | 
			<input type="checkbox" name="message[]" value="<?=$value['id']?>">
			</td><?php }?>
        </tr>
     
<?php } }
if ($_SESSION['userlevel']==1) {?>
	<tr >
         <td colspan="7" align="right">                	
            <input type="button" value="&nbsp;&nbsp;批量删除&nbsp;&nbsp;" class="button_input" onclick="commendsubmitform('?action=announcement&todo=del',this.form,'del');">
         </td>
     </tr>
<?php } ?>
     
  <tr >
         <td colspan="7" align="center"><?=$page_control?></td>
     </tr>
    </table></form>
</td>
  </tr>
</table>

<?php include template('foot'); ?>

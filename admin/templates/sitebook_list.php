<?php #tplhash=8b10666abf9328bc2f95f7f9f1f246fc ?>
<?php #createtime=2008-06-20 8:53:54 ?>
<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">留言列表</div> 
<form  method="post">
<input type="hidden" value="<?=$formhash?>" name="formhash">
<table width="98%"  border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td valign="top" align="center" width="100%">
    <table width="100%" cellpadding="1" cellspacing="1" align="center" class="listtable">
        <tr >
            <th width="30%" >留言标题</th>
            <th width="10%" >留言人</th>
<th width="15%" >留言时间</th>
<th width="15%" >回复时间</th>
<th width="10%" >留言回复</th>
<th width="10%" >审核</th>
<th width="10%" >操作 <input type="checkbox" name="chkall" onclick="checkall(this.form)"></th>
        </tr>
     
<?php if(is_array($messages)) { foreach($messages as $key => $message) { ?>
        <tr bgcolor="#E4EDF9">
            <td height="25" class="list"><?=$message['title']?></td>
            <td class="list"><?=$message['sendname']?></td>
<td class="list"><?=$message['sendtime']?></td>
<td class="list"><?=$message['replytime']?></td>
<td class="list" id="reply<?=$message['id']?>">
<?php if($message['hasreply'] == 1 ) { ?>
已回复
<?php } else { ?>
<font color="#FF0000">未回复</font>
<? } ?>
</td>
<td class="list" name="checkspan">
<?php if($message['checked'] == 1 ) { ?>
已审核
<?php } else { ?>
<font color="#FF0000">未审核</font>
<? } ?>
</td>
<td class="list">
<a href="javascript:showpanel('?action=sitebook&todo=reply&mid=<?=$message['id']?>','')">回复</a> | 
<input type="checkbox" name="message[]" value="<?=$message['id']?>">
</td>
        </tr>
     
<?php } } ?>
     <tr >
         <td colspan="7" align="right">
         	<input type="button" value="&nbsp;&nbsp;审核留言&nbsp;&nbsp;" class="button_input" onclick="commendsubmitform('?action=sitebook&todo=check',this.form,'');">
            <input type="button" value="&nbsp;&nbsp;删除留言&nbsp;&nbsp;" class="button_input" onclick="commendsubmitform('?action=sitebook&todo=del',this.form,'del');">
         </td>
     </tr>
  <tr >
         <td colspan="7" align="center"><?=$page_control?></td>
     </tr>
    </table>
</td>
  </tr>
</table>
</form>
<?php include template('foot'); ?>

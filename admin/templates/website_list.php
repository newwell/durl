<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">站点列表</div> 
<input type="hidden" value="<?=$formhash?>" name="formhash">
<table width="98%"  border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td valign="top" align="center" width="100%">
    <table width="100%" cellpadding="1" cellspacing="1" align="center" class="listtable">
		<?php if ($_SESSION['userlevel']==1) {?>
		<tr >
         <td colspan="1" >
            <input type="button" value="&nbsp;&nbsp;添加站点&nbsp;&nbsp;" class="button_input" onclick="JavaScript:location.href='?action=website&todo=addpage'">
         </td></tr><?php }?>
<input type="hidden" value="<?=$formhash?>" name="formhash">
        <tr>
            <th width="8%" >负责人</th>
            <th width="8%" >服务器</th>
            <th width="8%" >地址</th>
            <th width="8%" >51.la</th>
			<th width="8%" >帐号</th>
			<th width="8%" >密码</th>
			<th width="8%" >ftp地址</th>
			<th width="8%" >ftp帐号</th>
			<th width="8%" >ftp密码</th>
			<th width="8%" >数据库帐号</th>
			<th width="8%" >数据库密码</th>
			<th width="8%" >密钥</th>
			<th width="8%" >操作</th>
        </tr>
<?php
if(is_array($vpsArr)) { foreach($vpsArr as $key => $value) { ?>
        <tr bgcolor="#E4EDF9">
            <td class="list"><?php echo $value['fzr']?></td>
            <td class="list"><?php echo $value['vps']?></td>
            <td class="list"><a href="<?php echo $value['adds']?>" target="_blank"><?php echo $value['adds']?></a></td>  
            <td class="list"><a target="_blank" href="http://www.51.la/?<?php echo $value['flow_id']?>"><img src="http://icon.ajiang.net/icon_0.gif"/ border="0"></a></td>
            <td class="list"><?php echo $value['user']?></td>
            <td class="list"><?php echo $value['password']?></td>
            <td class="list"><?php echo $value['ftp_adds']?></td>
            <td class="list"><?php echo $value['ftp_name']?></td>
            <td class="list"><?php echo $value['ftp_pwd']?></td>
            <td class="list"><?php echo $value['db_name']?></td>
            <td class="list"><?php echo $value['db_pwd']?></td>
            <td class="list"><?php echo $value['secret_key']?></td>
			<td class="list">
			<a href="?action=website&todo=updatepage&id=<?=$value['id']?>" title="修改"><img src="<?=$_TEMPLATESDIR?>/image/edit_g.gif" border="0" alt="修改"/></a><a href="javascript:delconfirm('?action=website&todo=del&id=<?=$value['id']?>');" title="删除"><img src="<?=$_TEMPLATESDIR?>/image/delete_g.gif" border="0" alt="删除"/></a><a href="?action=website_log&todo=addpage&id=<?=$value['id']?>" title="添加日志">添加日志</a>
			</td>
        </tr>
<?php } }?>
    </table>
</td>
  </tr>
</table>
<?php include template('foot'); ?>

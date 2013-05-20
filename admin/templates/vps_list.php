<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">服务器列表</div> 
<input type="hidden" value="<?=$formhash?>" name="formhash">
<table width="98%"  border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td valign="top" align="center" width="100%">

    <table width="100%" cellpadding="1" cellspacing="1" align="center" class="listtable">
		<?php if ($_SESSION['userlevel']==1) { ?>
		<tr >
         <td colspan="1" >
            <input type="button" value="&nbsp;&nbsp;添加服务器&nbsp;&nbsp;" class="button_input" onclick="JavaScript:location.href='?action=vps&todo=addpage'">
         </td></tr><?php }?>

<input type="hidden" value="<?=$formhash?>" name="formhash">  
        <tr>
            <th width="20%">名称</th>
            <th width="20%" >地址</th>
			<th width="20%" >帐号 </th>		
			<th width="20%" >密码 </th>		
			<th width="20%" >操作</th>		
        </tr>
<?php
if(is_array($vpsArr)) { foreach($vpsArr as $key => $value) { ?>
        <tr bgcolor="#E4EDF9">
            <td class="list"><?php echo $value['vps']?></td>      
            <td class="list"><a href="<?php echo $value['adds']?>" target="_blank"><?php echo $value['adds']?></a></td>  
            <td class="list"><?php echo $value['user']?></td>
            <td class="list"><?php echo $value['password']?></td>
			<td class="list">
			<a href="?action=vps&todo=updatepage&id=<?=$value['id']?>" title="修改"><img src="<?=$_TEMPLATESDIR?>/image/edit_g.gif" border="0" alt="修改"/></a> | 
			<a href="javascript:delconfirm('?action=vps&todo=del&id=<?=$value['id']?>');" title="删除"><img src="<?=$_TEMPLATESDIR?>/image/delete_g.gif" border="0" alt="删除"/></a> | 
			<a href="?action=vps_log&todo=addpage&id=<?=$value['id']?>" title="添加日志">添加日志</a>
			</td>
        </tr>
     
<?php } }?>
    </table>
</td>
  </tr>
</table>

<?php include template('foot'); ?>

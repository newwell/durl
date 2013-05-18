<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">部门列表</div> 
<input type="hidden" value="<?=$formhash?>" name="formhash">
<table width="98%"  border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td valign="top" align="center" width="100%">

    <table width="100%" cellpadding="1" cellspacing="1" align="center" class="listtable">
		<?php if ($_SESSION['userlevel']==1) { ?>
		<tr >
         <td colspan="1" >
            <input type="button" value="&nbsp;&nbsp;添加部门&nbsp;&nbsp;" class="button_input" onclick="JavaScript:location.href='?action=department&todo=addpage'">
         </td></tr><?php }?>
<form name="f1" method="post">  
<input type="hidden" value="<?=$formhash?>" name="formhash">  
        <tr>
            <th width="30%">部门名称</th>
            <th width="30%" >顺序</th>
			<?php if ($_SESSION['userlevel']==1){?>
			<th width="30%" >操作 <input type="checkbox" name="chkall" onclick="checkall(this.form)"></th>
			<?php }?>			
        </tr>
<?php
if(is_array($depaArr)) { foreach($depaArr as $key => $value) { ?>
        <tr bgcolor="#E4EDF9">
            <td class="list"><a href="?action=system_user&todo=list&bumen=<?=$value['id']?>" title="点击查看该部门人员"><?=$value['department']?></a></td>      
            <td class="list"><input name="sunx[<?php echo $value['id']?>]" value="<?php echo $value['sunx']?>"/></td>      
			<?php if ($_SESSION['userlevel']==1){?>
			<td class="list">
			<a href="?action=department&todo=updatepage&id=<?=$value['id']?>">修改</a> | 
			<input type="checkbox" name="message[]" value="<?=$value['id']?>">
			</td><?php }?>
        </tr>
     
<?php } }
if ($_SESSION['userlevel']==1) {?>
	<tr >
         <td colspan="7" align="right">                	
            <input type="button" value="&nbsp;&nbsp;一键排序&nbsp;&nbsp;" class="button_input" onclick="commendsubmitform('?action=department&todo=sunx',this.form,'');">
            <input type="button" value="&nbsp;&nbsp;批量删除&nbsp;&nbsp;" class="button_input" onclick="commendsubmitform('?action=department&todo=del',this.form,'del');">
         </td>
     </tr>
<?php } ?>
    </table></form>
</td>
  </tr>
</table>

<?php include template('foot'); ?>

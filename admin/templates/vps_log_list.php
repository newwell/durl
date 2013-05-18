<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">服务器概况</div> 
<input type="hidden" value="<?=$formhash?>" name="formhash">
<table width="98%"  border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td valign="top" align="center" width="100%">
    <table width="100%" cellpadding="1" cellspacing="1" align="center" class="listtable">
		<?php if ($_SESSION['userlevel']==1) { ?>
		<tr >
         <td colspan="1" >
            <input type="button" value="&nbsp;&nbsp;添加信息记录&nbsp;&nbsp;" class="button_input" onclick="JavaScript:location.href='?action=vps_log&todo=addpage'">
         </td></tr><?php }?>

<input type="hidden" value="<?=$formhash?>" name="formhash">
        <tr>
            <th width="8%" >名称</th>
            <th width="8%" >磁盘使用率</th>
			<th width="8%" >内存使用率</th>
			<th width="8%" >流量使用率</th>
			<th width="8%" >时间</th>
			<th width="8%" >操作</th>
        </tr>
<?php 
if(is_array($vpsLogArr)) { foreach($vpsLogArr as $key => $value) { ?>
        <tr bgcolor="#E4EDF9">     
            <td class="list"><a href="#" target="_blank"><?php echo $value['vps']?></a></td>  
            <td class="list"><?php echo $value['disk']?></td>
            <td class="list"><?php echo $value['ram']?></td>
            <td class="list"><?php echo $value['flow']?></td>
            <td class="list"><?php echo $value['time']?></td>
			<td class="list">
			<a href="javascript:delconfirm('?action=vps_log&todo=del&id=<?=$value['id']?>');" title="删除"><img src="<?=$_TEMPLATESDIR?>/image/delete_g.gif" border="0" alt="删除"/></a>
			</td>
        </tr>
<?php } }?>
    </table>
</td>
  </tr>
</table>

<?php include template('foot'); ?>

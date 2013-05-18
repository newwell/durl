<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">站点概况</div> 
<input type="hidden" value="<?=$formhash?>" name="formhash">
<table width="98%"  border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td valign="top" align="center" width="100%">

    <table width="100%" cellpadding="1" cellspacing="1" align="center" class="listtable">
		<?php if ($_SESSION['userlevel']==1) { ?>
		<tr >
         <td colspan="1" >
            <input type="button" value="&nbsp;&nbsp;添加信息记录&nbsp;&nbsp;" class="button_input" onclick="JavaScript:location.href='?action=website_log&todo=addpage'">
         </td></tr><?php }?>

<input type="hidden" value="<?=$formhash?>" name="formhash">
        <tr>
            <th width="8%" >地址</th>
            <th width="8%" >IP</th>
			<th width="8%" >PV </th>		
			<th width="8%" >收录 </th>		
			<th width="8%" >订单数</th>		
			<th width="8%" >完成订单数</th>
			<th width="8%" >时间</th>
			<th width="8%" >操作</th>
        </tr>
<?php 
if(is_array($webLogArr)) { foreach($webLogArr as $key => $value) { ?>
        <tr bgcolor="#E4EDF9">     
            <td class="list"><a href="<?php echo $value['adds']?>" target="_blank"><?php echo $value['adds']?></a></td>  
            <td class="list"><?php echo $value['ip']?></td>
            <td class="list"><?php echo $value['pv']?></td>
            <td class="list"><?php echo $value['record']?></td>
            <td class="list"><?php echo $value['order_num']?></td>
            <td class="list"><?php echo $value['order_wnum']?></td>
            <td class="list"><?php echo $value['time']?></td>
			<td class="list">
			<a href="javascript:delconfirm('?action=website_log&todo=del&id=<?=$value['id']?>');" title="删除"><img src="<?=$_TEMPLATESDIR?>/image/delete_g.gif" border="0" alt="删除"/></a>
			</td>
        </tr>
<?php } }?>
    </table>
</td>
  </tr>
</table>

<?php include template('foot'); ?>

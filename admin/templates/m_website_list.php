<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">线上站点列表</div> 
<input type="hidden" value="<?=$formhash?>" name="formhash">
<table width="98%"  border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td valign="top" align="center" width="100%">
    <table width="100%" cellpadding="1" cellspacing="1" align="center" class="listtable">
<input type="hidden" value="<?=$formhash?>" name="formhash">
        <tr>
            <th>负责人</th>
            <th>地址</th>
			<th>操作</th>
        </tr>
<?php
if(is_array($vpsArr)) { foreach($vpsArr as $key => $value) { ?>
        <tr bgcolor="#E4EDF9">
            <td class="list"><?php echo $value['fzr']?></td>
            <td class="list"><a href="<?php echo $value['adds']?>" target="_blank"><?php echo $value['adds']?></a></td>  
			<td class="list">
			<a href="?action=m_website&todo=get_versions&id=<?=$value['id']?>">显示API版本</a> | 
			<a href="?action=m_website&todo=get_customers&id=<?=$value['id']?>">线上顾客</a> | 
			<a href="?action=m_website&todo=show_b_customer&id=<?=$value['id']?>">本系统顾客</a> | 
			<a href="?action=m_website&todo=get_order&id=<?=$value['id']?>">线上订单</a> | 
			<a href="?action=m_website&todo=show_b_order&id=<?=$value['id']?>">本系统订单</a> | 
			</td>
        </tr>
<?php } }?>
    </table>
</td>
  </tr>
</table>
<?php include template('foot'); ?>

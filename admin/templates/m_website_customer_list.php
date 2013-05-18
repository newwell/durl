<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav"><?php echo $formnav;?></div> 
<input type="hidden" value="<?=$formhash?>" name="formhash">
<table width="98%"  border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td valign="top" align="center" width="100%">
    <table width="100%" cellpadding="1" cellspacing="1" align="center" class="listtable">
		<tr >
         <td colspan="2" >
            <input type="button" value="&nbsp;&nbsp;返回&nbsp;&nbsp;" class="button_input" onclick="JavaScript:location.href='?action=m_website&todo=list'">
            <?php if ($todo != 'show_b_customer') {?>
            <input type="button" value="&nbsp;&nbsp;更新至本系统&nbsp;&nbsp;" class="button_input" onclick="JavaScript:location.href='?action=m_website&todo=update_customer&wid=<?php echo $web_id;?>'">
         	<?php }else {?>
         	<input type="button" value="&nbsp;&nbsp;导出所有客户&nbsp;&nbsp;" class="button_input" onclick="JavaScript:location.href='?action=m_website&todo=export_b_customer&wid=<?php echo $web_id;?>'">
         	<?php }?>
         </td></tr>
<input type="hidden" value="<?=$formhash?>" name="formhash">
        <tr>
            <th>用户名</th>
            <th>邮箱</th>
			<th>电话</th>
			<th>注册时间</th>
			<th>注册IP</th>
			<th>最后登陆时间</th>
        </tr>
<?php
if(is_array($content)) { foreach($content as $key => $value) { ?>
        <tr bgcolor="#E4EDF9">
            <td class="list"><?php echo $value['custconfirstname']?>  <?php echo $value['custconlastname']?></td>
            <td class="list"><a href="mailto:<?php echo $value['custconemail']?>"><?php echo $value['custconemail']?></a></td>  
			<td class="list"><?php echo $value['custconphone']?></td>
			<td class="list"><?php echo gmdate('Y-n-j',$value['custdatejoined'])?></td>
			<td class="list"><a target="_blank" href="http://ip.chinaz.com/?IP=<?php echo $value['custregipaddress']?>"><?php echo $value['custregipaddress']?></a></td>
			<td class="list"><?php echo gmdate('Y-n-j',$value['custlastmodified'])?></td>
        </tr>
<?php } }else {?>
<tr bgcolor="#cccccc"><td colspan="6" align="center"><?php print_r($content);?></td></tr>
	<?php }?>
    </table>
</td>
  </tr>
</table>
<?php include template('foot'); ?>

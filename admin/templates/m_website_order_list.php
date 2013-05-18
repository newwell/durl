<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>

<link rel="stylesheet" type="text/css" href="script/hiAlert/css/alert.css" />
<script type="text/javascript" src="script/jquery.min.js"></script>
<script type='text/javascript' src='script/jquery-ui.min.js'></script>
<script type="text/javascript" src="script/hiAlert/jquery.alert.js"></script>

<div class="formnav"><?php echo $formnav;?></div> 
<input type="hidden" value="<?=$formhash?>" name="formhash">
<table width="98%"  border="0" cellpadding="0" cellspacing="0" align="center">
  <tr>
    <td valign="top" align="center" width="100%">
    <table width="100%" cellpadding="1" cellspacing="1" align="center" class="listtable">
		<tr >
         <td colspan="3" >
            <input type="button" value="&nbsp;&nbsp;返回&nbsp;&nbsp;" class="button_input" onclick="JavaScript:location.href='?action=m_website&todo=list'">
            <?php if ($todo != 'show_b_order') {?>
            <input type="button" value="&nbsp;&nbsp;更新至本系统&nbsp;&nbsp;" class="button_input" onclick="JavaScript:location.href='?action=m_website&todo=update_order&wid=<?php echo $web_id;?>'">
         	<?php }else {?>
         	<input type="button" value="&nbsp;&nbsp;导出所有订单&nbsp;&nbsp;" class="button_input" onclick="JavaScript:location.href='?action=m_website&todo=export_b_order&wid=<?php echo $web_id;?>'">
         	<input type="button" value="&nbsp;&nbsp;导出待发货订单&nbsp;&nbsp;" class="button_input" onclick="JavaScript:location.href='?action=m_website&todo=export_b_order&wid=<?php echo $web_id;?>&s=9'">
         	<?php }?>
         </td></tr>
<input type="hidden" value="<?=$formhash?>" name="formhash">
        <tr>
            <th>订单号</th>
            <th>客户姓名</th>
            <th>订单日期</th>
			<th>状态</th>
			<th>金额</th>
			<th>操作</th>
        </tr>
<?php
if(is_array($content)) { foreach($content as $key => $value) { ?>
        <tr bgcolor="#E4EDF9">
        	<td class="list"><?php echo $value['orderid']?></td>
            <td class="list"><?php echo $value['ordbillfirstname']?>  <?php echo $value['ordbilllastname']?></td>
			<td class="list"><?php echo gmdate('Y-n-j',$value['orddate'])?></td>
			<td class="list" ><input id="jy_ordstatus<?php echo $key;?>" value="<?php echo $value['ordstatus']?>" disabled/></td>
			<td class="list"><?php echo $value['total_inc_tax']?></td>
			<td class="list"><a href="javascript:hiBox('#showbox<?php echo $value['orderid']?>', '订单<?php echo $value['orderid']?>#',500,'','','.a_close');">详情</a>
				<div id="showbox<?php echo $value['orderid']?>" style="display:none">
				   <p>顾客姓名：<?php echo $value['ordbillfirstname']?>  <?php echo $value['ordbilllastname']?><br><hr>
发货地址：<?php echo $value['ordbillstreet1'].'    '.$value['ordbillsuburb'].'    '.$value['ordbillstate'].'    '.$value['ordbillcountry']?><br><hr>
购买时 IP：<a href="http://ip.chinaz.com/?IP=<?php echo $value['ordipaddress']?>" target="_blank"><?php echo $value['ordipaddress']?></a><br><hr>
支付方式：<?php echo $value['orderpaymentmethod']?><br><hr>
邮箱：<a href="mailto:<?php echo $value['ordbillemail']?>"><?php echo $value['ordbillemail']?></a><br><hr>
电话：<?php echo $value['ordbillphone']?><br><hr>
本单金额：<?php echo $value['total_inc_tax']?><br><hr>
产品链接：<a href="<?php echo $value['produrl']?>" target="_blank"><?php echo $value['produrl']?></a><br><hr>
				   </p>
				   <p style="text-align:right"><a href="#" class="a_close">关闭</a></p>
				</div>
			</td>		
		</tr>
<?php } }else {?>
<tr bgcolor="#cccccc"><td colspan="6" align="center"><?php print_r($content);?></td></tr>
	<?php }?>
    </table>
</td>
  </tr>
</table>
<script type="text/javascript">
key = <?php echo $key;?>;
for(i=0;i<=key;i++){
	switch (document.getElementById('jy_ordstatus'+i).value) {
	case '0':
		document.getElementById('jy_ordstatus'+i).value='Incomplete';
	break;
	case '1':
		document.getElementById('jy_ordstatus'+i).value='Pending';
	break;
	case '2':
		document.getElementById('jy_ordstatus'+i).value='Shipped';
	break;
	case '3':
		document.getElementById('jy_ordstatus'+i).value='Partially Shipped';
	break;
	case '4':
		document.getElementById('jy_ordstatus'+i).value='Refunded';
	break;
	case '5':
		document.getElementById('jy_ordstatus'+i).value='Cancelled';
	break;
	case '6':
		document.getElementById('jy_ordstatus'+i).value='Declined';
	break;
	case '7':
		document.getElementById('jy_ordstatus'+i).value='Awaiting Payment';
	break;
	case '8':
		document.getElementById('jy_ordstatus'+i).value='Awaiting Pickup';
	break;
	case '9':
		document.getElementById('jy_ordstatus'+i).value='Awaiting Shipment';
	break;
	case '10':
		document.getElementById('jy_ordstatus'+i).value='Completed';
	break;
	case '11':
		document.getElementById('jy_ordstatus'+i).value='Awaiting Fulfillment';
	break;
	};
}
</script>
<?php include template('foot'); ?>

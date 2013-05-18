<?php #tplhash=33cab10818e31acfd940d4bfa10ef1bd ?>
<?php #createtime=2008-06-23 9:15:18 ?>
<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav"> 管理员列表</div>
<table width="98%"  border="0" cellpadding="0" cellspacing="0" align="center">
 <?php if($_SESSION['userlevel'] == 1){?>
	<tr >
		<td height="27"  ><!--<input type="button" value="  导入数据 " class="button_input" onclick="jumpto('?action=system_user&todo=importpage')">&nbsp;<input type="button" value="  导出数据 " class="button_input" onclick="jumpto('?action=system_user&todo=export')">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="./UploadFile/userinfo.xls">EXCEL模板下载</a>-->
		<input class="button_input" type="button" value="添加用户" onclick="jumpto('?action=<?=$act['action']?>&todo=adduser')"></td>
    </tr>
 <?php }?>
  
  <tr>
    <td valign="top" align="center" width="100%">
    
    <table width="100%" cellpadding="1" cellspacing="1" align="center" class="listtable">
        <tr>
            <th width="10%">登录名/真实名</th>
            <th width="8%">级别</th>
            <th width="8%">部门</th>
            <th width="8%">职称</th>
            <th width="8%">QQ</th>
            <th width="8%">手机</th>
            <th width="6%">操作</th>
        </tr>
     
<?php 

if(is_array($adminarr)) { foreach($adminarr as $key => $admin) { ?>
        <tr 
<?php if(($key%2) == 0 ) { ?>
 bgcolor="#E4EDF9" 
<?php } else { ?>
 bgcolor="#F1F3F5" 
<? } ?>
 >  
            <td  class="list"><?=$admin['username']?>/<?=$admin['zname']?></td>
            <td  class="list"><?php echo $admin['userlevel']?></td>
            <td  class="list"><?= $admin['bumen']?></td>
            <td  class="list"><?=$admin['zhiwei']?> </td>
            <td  class="list"><?=$admin['QQ']?></td>
            <td  class="list"><?=$admin['phone']?></td>
            <td  class="list" align="center">
            
<?php if($_SESSION['userlevel'] == 1) { ?>
            <a href="?action=<?=$act['action']?>&todo=edituser&uid=<?=$admin['id']?>"><img src="<?=$_TEMPLATESDIR?>/image/edit_g.gif" border="0" alt="提交"/></a>  | <a href="javascript:delconfirm('?action=<?=$act['action']?>&todo=deluser&uid=<?=$admin['id']?>');"><img src="<?=$_TEMPLATESDIR?>/image/delete_g.gif" border="0" /></a>
<?php } else{ ?>
<?php if($admin['id'] == $_SESSION['uid']) { ?>
 <a href="?action=<?=$act['action']?>&todo=edituser&uid=<?=$admin['id']?>">
 <img src="<?=$_TEMPLATESDIR?>/image/edit_g.gif" border="0" alt="提交"/>
 </a>
<? } } ?>
            </td>
        </tr>
     
<?php } } ?>

      <tr class="tablenav">
         <td colspan="7" align="center"><?php echo $page_control;?></td>
     </tr>
     
    </table> 
</td>
  </tr>
</table>
<br/>
<?php include template('foot'); ?>

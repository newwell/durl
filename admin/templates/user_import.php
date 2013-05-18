<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>

<div class="formnav">导入数据</div>
<form action="?action=system_user&todo=doimport"  method="post" enctype="multipart/form-data">
  <input type="hidden" value="<?=$formhash?>" name="formhash">
  <input type="hidden" value="<?=$mid?>" name="mid">
  <table width="98%"  border="0" cellpadding="0" cellspacing="0" align="center">
    <tr>
      <td valign="top" align="center" width="100%"><table width="100%" border="0" cellspacing="1" cellpadding="5" class="formtable">
        <tr>
          <td width="16%">请选择要导入的文件</td>
          <td width="84%"><input type="file" name="xls[]" id="xls[]" />
            (仅支持EXCEL的XLS格式)</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="button" id="button" value="提 交" /></td>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
<?php include template('foot'); ?>
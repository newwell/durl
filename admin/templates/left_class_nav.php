<?php #tplhash=eb47a2518dea3c5a34c3fdb1c4872da3 ?>
<?php #createtime=2008-06-17 10:14:22 ?>
<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<style>
body {text-align: left;}
</style>
<script src="script/dtree.js" type="text/javascript"></script>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="189" valign="top" class="left3">
      <table width="185" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td height="263" valign="top" class="left2" nowrap="nowrap">
            <script>
            	var d = new dTree('d');
d.add(0,-1,'<?=$title?>');

d.icon = {
root				: 'script/image/icon_component.gif',
folder				: 'script/image/folder.gif',
folderOpen			: 'script/image/folder_new.gif',
node				: 'script/image/page.gif',
empty				: 'script/image/empty.gif',
line				: 'script/image/line.gif',
join				: 'script/image/join.gif',
joinBottom			: 'script/image/joinbottom.gif',
plus				: 'script/image/plus.gif',
plusBottom			: 'script/image/plusbottom.gif',
minus				: 'script/image/minus.gif',
minusBottom			: 'script/image/minusbottom.gif',
nlPlus				: 'script/image/nolines_plus.gif',
nlMinus				: 'script/image/nolines_minus.gif'
};
<?=$javascript?>
document.write(d);
</script>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body></html>
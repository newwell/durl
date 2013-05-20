<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="189" valign="top" background="<?=$_TEMPLATESDIR?>/image/pic_left_bg1.png" class="left3">
<table width="185" height="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
        <td height="263" valign="top" background="<?=$_TEMPLATESDIR?>/image/pic_leftbg2.png" class="left2">
  
<?php $modulecount = 0; ?>
  
<?php
if(is_array($cates)) { foreach($cates as $key => $cate) {
if(!empty($cate['childs'])) { ?>
<table width="100%" border="0" cellspacing="1" cellpadding="2">
<tr>
  <td height="28" align="left" background="<?=$_TEMPLATESDIR?>/image/pic_left_3.gif" class="left2"><span class="leftmenutitle"><img src="<?=$_TEMPLATESDIR?>/image/icon_left1.png" width="5" height="5" hspace="8" vspace="4" /><?=$cate['title']?></span></td>
</tr>
<?php foreach($cate['childs'] as $num => $child) { ?>
<tr>
  <td height="20"><a href="?action=<?=$child['action']?>&todo=<?=$child['todo']?>&do=<?=$child['do']?>" target="mainFrame" class="left" id="leftmenu<?=$modulecount?>" onclick="ChangeMenuStyle(<?=$modulecount?>);">·<?=$child['title']?></a></td>
</tr>

<?php $modulecount++; ?>
<?php }  ?>
</table>
          
<?php } } } ?>
    
  </td>
      </tr>
      
    </table></td>
    
  </tr>

</table>
<input type="hidden" value="<?=$modulecount?>" id="modulecount"/>

</body></html>
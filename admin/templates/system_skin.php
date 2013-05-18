<?php #tplhash=a703b57f9efe00a7c01d41d6b6bc627d ?>
<?php #createtime=2009-03-11 13:11:12 ?>
<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">系统参数设置</div>
<form action="?action=<?=$act['action']?>&todo=saveskin" method="post" onsubmit="return CheckForm(this,true);">
<input type="hidden" name="formhash" value="<?=$formhash?>">
<table width="650"  border="0" cellpadding="1" cellspacing="1" align="center" class="formtable" >
      
         
         
<?php if(is_array($index_array)) { foreach($index_array as $key => $value) { ?>
<tr  bgcolor="#FFFFFF" >  
            <td width="20%" align="right" valign="top" >网站首页模块调用<?=$value?> :</td>
            <td width="20%" align="left" >
<select name="setting_sitemoduleid<?=$key?>">
<?php if(is_array($modules)) { foreach($modules as $mid => $module) { ?>
<?php if($settings[$key] == $module['id'] ) { ?>
<option value="<?=$module['id']?>" selected="selected">
<?php if($module['moduletype'] == 'Sub' ) { ?>
<?=$module['modulename']?> [模块分类]
<?php } else { ?>
<?=$module['modulename']?>
<? } ?>
</option>
<?php } else { ?>
<option value="<?=$module['id']?>">
<?php if($module['moduletype'] == 'Sub' ) { ?>
<?=$module['modulename']?> [模块分类]
<?php } else { ?>
<?=$module['modulename']?>
<? } ?>
</option>
<? } ?>
<?php } } ?>
</select>
</td>
<td width="13%" align="left" >
调用条数:
<input type="text" fun="isInt" required="true" name="setting_sitelistnum<?=$key?>" value="<?=$nums[$key]?>" size="2" style="border:#336699 1px solid;" onmouseover="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)">
</td>
<td width="13%" align="left" >
标题字数:
<input type="text" fun="isInt" required="true" name="setting_sitetitlenum<?=$key?>" value="<?=$titles[$key]?>" size="2" style="border:#336699 1px solid;" onmouseover="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)">
</td>
<td width="20%" align="left" >
时间格式:
<input type="text" fun="required" required="true" name="setting_sitetimeformat<?=$key?>" value="<?=$formats[$key]?>" size="10" style="border:#336699 1px solid;" onmouseover="fEvent('mouseover',this)" onFocus="fEvent('focus',this)" onBlur="fEvent('blur',this)" onMouseOut="fEvent('mouseout',this)">
</td>
        </tr>
<?php } } ?>
    	<tr> 
        	<td colspan="5" align="center">
            <input type="submit" class="formsubmit" value="提交">            </td>
        </tr>
    </table>
</form>
<?php include template('foot'); ?>

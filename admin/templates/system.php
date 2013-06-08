<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<div class="formnav">系统参数设置</div>
<form action="?action=<?php echo $act['action']?>&todo=saveset" method="post" >
<input type="hidden" name="formhash" value="<?php echo $formhash?>">
<table width="650"  border="0" cellpadding="1" cellspacing="1" align="center" class="formtable" >
        <tr>  
          <td width="25%" align="right" class="listtable" valign="top">网站名称:</td>
          <td align="left"><input type="text" name="setting_sitename" fun="required" required="true" value="<?php echo $setting_sitename?>"  size="35" style="border:#336699 1px solid;" onmouseover="fEvent('mouseover',this)" onfocus="fEvent('focus',this)" onblur="fEvent('blur',this)" onmouseout="fEvent('mouseout',this)"/>
          *网站名称，将显示在前台首页标题中</td>  
        </tr>
        <tr>
            <td align="right" class="listtable" valign="top">网站电话:</td>
            <td align="left"><input type="text" name="setting_sitephone" value="<?php echo $setting_sitephone?>" fun="required" required="true" size="35" style="border:#336699 1px solid;" onmouseover="fEvent('mouseover',this)" onfocus="fEvent('focus',this)" onblur="fEvent('blur',this)" onmouseout="fEvent('mouseout',this)"/>
            *网站电话，将显示在页面首页的联系方式处</td>
        </tr>
         <tr>  
            <td align="right" class="listtable" valign="top">网站联系地址:</td>
            <td align="left"><input type="text" name="setting_siteaddress" value="<?php echo $setting_siteaddress?>"  fun="required" required="true" size="35" style="border:#336699 1px solid;" onmouseover="fEvent('mouseover',this)" onfocus="fEvent('focus',this)" onblur="fEvent('blur',this)" onmouseout="fEvent('mouseout',this)"/> 
            *网站地址，将显示在页面首页的联系地址处</td>
        </tr> 
        <tr>  
            <td align="right" class="listtable" valign="top">网站邮件:</td>
            <td align="left"><input type="text" name="setting_siteemail" value="<?php echo $setting_siteemail?>"  fun="required" required="true"  size="35" style="border:#336699 1px solid;" onmouseover="fEvent('mouseover',this)" onfocus="fEvent('focus',this)" onblur="fEvent('blur',this)" onmouseout="fEvent('mouseout',this)"/> 
            *网站邮件，将显示在页面首页的网站邮件处</td>
        </tr>
        
        <tr>  
            <td align="right" class="listtable" valign="top">网站地址:</td>
            <td align="left"><input type="text" name="setting_sitedeclareinfo" value="<?php echo $setting_sitedeclareinfo?>" size="35" style="border:#336699 1px solid;" onmouseover="fEvent('mouseover',this)" onfocus="fEvent('focus',this)" onblur="fEvent('blur',this)" onmouseout="fEvent('mouseout',this)"/> 
            </td>
        </tr>
        
        <tr>
            <td align="right" class="listtable" valign="top">网站关闭:</td>
            <td align="left"><input type="radio" name="setting_sitestatus" value="1" <?php echo $check1?>>开启<input type="radio" name="setting_sitestatus" value="0" <?php echo $check2?>>关闭 *暂时将网站关闭，其他人无法访问，但不影响管理员访问</td>
        </tr>
        <tr>  
            <td align="right" class="listtable" valign="top">网站关闭原因:</td>
            <td align="left"><textarea style="border:#336699 1px solid;" rows="5" cols="40" onmouseover="fEvent('mouseover',this)" onfocus="fEvent('focus',this)" onblur="fEvent('blur',this)" onmouseout="fEvent('mouseout',this)" name="setting_siteclosereason"><?php echo $setting_siteclosereason?></textarea> *网站关闭时出现的提示信息</td>
        </tr>
        <tr  >  
            <td align="right" class="listtable" valign="top">管理员IP访问列表:</td>
          <td align="left"><textarea style="border:#336699 1px solid;" rows="5" cols="40" onmouseover="fEvent('mouseover',this)" onfocus="fEvent('focus',this)" onblur="fEvent('blur',this)" onmouseout="fEvent('mouseout',this)" name="setting_siteadminip"><?php echo $setting_siteadminip?></textarea>            
            <br />
          *设置可以访问的管理员的IP，按Enter将多个管理员IP隔开 </td>
        </tr>
        <tr>  
            <td align="right" class="listtable" valign="top">用户IP访问列表:</td>
           <td align="left"><textarea style="border:#336699 1px solid;" rows="5" cols="40" onmouseover="fEvent('mouseover',this)" onfocus="fEvent('focus',this)" onblur="fEvent('blur',this)" onmouseout="fEvent('mouseout',this)" name="setting_siteuserip"><?php echo $setting_siteuserip?></textarea>            
              <br />
            *设置可以访问的用户IP，按Enter将多个用户IP隔开</td>
        </tr>
        <tr>  
          <td width="25%" align="right" class="listtable" valign="top">客服QQ:</td>
          <td align="left"><input type="text" name="setting_siteqq" value="<?php echo $setting_siteqq?>" size="35"/>
          *设置客服QQ号码,建议输入数字型QQ号码</td>
        </tr>
    	<tr > 
        	<td colspan="2" align="center">
            <input type="submit" class="formsubmit" value="提交">            </td>
        </tr>
        
    </table>
</form>
<?php include template('foot'); ?>

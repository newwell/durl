<?php #tplhash=35d354920526d6971b54828b4a934e3e ?>
<?php #createtime=2008-06-26 11:05:00 ?>
<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<br>
<form action="?action=sitebook&todo=savereply" method="post" onsubmit="return CheckForm(this);">
<input type="hidden" value="<?=$formhash?>" name="formhash">
<input name="id" type="hidden" id="id" value="<?=$reply['id']?>" />
  <table align="center" class="formtable" cellpadding="0" cellspacing="1" width="98%">
    <tr>
      <td width="18%" align="right">留言标题:</td>
      <td width="82%">&nbsp;<?=$reply['title']?></td>
    </tr>
    <tr>
      <td width="18%" align="right">留言人:</td>
      <td width="82%">&nbsp;<?=$reply['sendname']?></td>
    </tr>
    <tr>
      <td width="18%" align="right">留言时间:</td>
      <td width="82%"><input type="text" name="sendtime" id="sendtime" value="<?=$reply['sendtime']?>" class="Wdate" onfocus="WdatePicker({el:'sendtime',dateFmt:'yyyy-MM-dd H:m'})"/>
</td>
    </tr>
<tr>
      <td width="18%" align="right" valign="top">留言内容:</td>
      <td valign="top"><?=$reply['content']?></td>
    </tr>
    
<?php if($reply['hasreply'] == 1) { ?>
<tr>
      <td width="18%" align="right">回复时间:</td>
      <td><input type="text" name="replytime" id="replytime" value="<?=$reply['replytime']?>" class="Wdate" onfocus="WdatePicker({el:'replytime',dateFmt:'yyyy-MM-dd H:m'})"/></td>
    </tr>
    
<? } ?>
<tr>
      <td width="18%" align="right" valign="top">留言回复:</td>
      <td valign="top"><textarea name="replycontent" cols="70" rows="5" id="replycontent"><?=$reply['replycontent']?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" class="formsubmit" value="留言回复" ></td>
    </tr>
  </table>
</form>
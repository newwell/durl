<?php if(!defined('IN_SITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
<style>
body,td,th {
font-family: tahoma,宋体;
font-size: 12px;
}
body {
margin: 0px;
    background-color: #276CB2;
overflow-x:hidden; overflow:hidden;
margin-left: 0px;
margin-top: 0px;
margin-right: 0px;
margin-bottom: 0px;
background-color: #276CB2;
}
</style>
<script>
var status = 1;
function switchSysBar(){
 var switchPoint = $('switchPoint');
 var left = $('left');
     if (1 == status){
  status = 0;
          switchPoint.src = '<?=$_TEMPLATESDIR?>/image/icon_open.png';
          left.style.display="none"
     }
     else{
  status = 1;
          switchPoint.src = '<?=$_TEMPLATESDIR?>/image/icon_close.png';
          left.style.display=""
     }
}
function change(ele)
{
ele.style.fontWeight = 'bold';
var nav = document.getElementsByName('nav');
for(i=0;i<nav.length;i++) 
{
if( nav[i].getAttribute('id')!= ele.getAttribute('id') )
{
nav[i].style.fontWeight = '';
}
}
}
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="31%" background="<?=$_TEMPLATESDIR?>/image/pic_bg.gif" height="60" class="top2">-</td>
    <td width="69%" align="right" background="<?=$_TEMPLATESDIR?>/image/pic_bg.gif" class="top2">DURL短网址管理</td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td >
      <table width="100%" border="0" cellpadding="0" cellspacing="0" background="<?=$_TEMPLATESDIR?>/image/pic_right_bg2.gif">
        <tr>
          <td width="45%" height="31" valign="top" background="<?=$_TEMPLATESDIR?>/image/pic_right_bg1.png" class="left1">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><img src="<?=$_TEMPLATESDIR?>/image/pic_icon.gif" width="24" height="20" hspace="6" vspace="3" /></td>
                <!--<td valign="middle" class="top3" align="left"><a href="?action=show&todo=left&do=system" name="nav" onclick="change(this);" target="menu" id="nav0">系统管理</a> </td>-->
                
              </tr>
            </table>
          </td>
          <td align="right" valign="top" width="55%">
            <table width="443" border="0" align="right" cellpadding="0" cellspacing="0">
              <tr>
                <td height="31" align="right" background="<?=$_TEMPLATESDIR?>/image/pic_right_bg3.png" class="top"><a href="index.php" target="_blank"></a> <a href="javascript:adminlogout();">退出登陆</a> </td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<table border="0" cellpadding="0" cellspacing="0" height="89%" width="100%" style="table-layout: fixed;">
  <tr>
    <td width="205" id="left">
      <iframe frameborder="0" id="menu" name="menu" src="admincp.php?action=show&todo=left&do=system" scrolling="yes" style="height: 100%; width: 100%; z-index: 1;overflow: auto;"></iframe>
    </td>
    <td style="WIDTH:7px" bgcolor="#276CB2">
      <table height="100%" cellspacing="0" cellpadding="0" border="0">
        <tbody>
          <tr>
            <td style="HEIGHT: 100%" ><span   title="关闭/打开"><a href="javascript:switchSysBar();"><img id="switchPoint" src="<?=$_TEMPLATESDIR?>/image/icon_close.png" border="0"></a></span> </td>
          </tr>
        </tbody>
      </table>
    </td>
    <td >
      <table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td>
            <iframe frameborder="0" id="main" name="mainFrame" src="admincp.php?action=show&todo=index" scrolling="yes" style="Z-INDEX: 1; VISIBILITY: inherit; WIDTH:100%; HEIGHT:100%;"></iframe>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<script>
change($('nav0'));
</script>
</body>
</html>
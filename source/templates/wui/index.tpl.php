<?php if(!defined('IN_DURL')) exit('Access Denied'); ?>
<?php include template('header');?>
<div class="wui_inner">
	<div class="wui_header">
		<div id="wui_logo" class="wui_logo">DURL短网址管理</div>	
	</div>
	<div class="wui_contentLeft">
		<div class="wui_contentLeftTitle"><span></span>短网址</div>
		<div class="wui_contentLeftItem">
			<ul>
				<li class="wui_contentLeftItemList"><a target="wui" href="http://www.baidu.com/">查看所有</a></li>
				<li class="wui_contentLeftItemList"><a target="wui" href="http://g.cn/">添加短网址</a></li>
				<li class="wui_contentLeftItemList"><a target="wui" href="http://www.so.com/">还原短网址</a></li>
			</ul>
		</div>
		<div class="wui_contentLeftTitle"><span></span>批量操作</div>
		<div class="wui_contentLeftItem">
			<ul>
				<li class="wui_contentLeftItemList"><a href="#">批量添加</a></li>
				<li class="wui_contentLeftItemList"><a href="#">批量导出</a></li>
				<li class="wui_contentLeftItemList"><a href="#">批量导入</a></li>
			</ul>
		</div>
		<div class="wui_contentLeftTitle"><span></span>数据管理</div>
		<div class="wui_contentLeftItem">
			<ul>
				<li class="wui_contentLeftItemList"><a href="#">数据库优化</a></li>
				<li class="wui_contentLeftItemList"><a href="#">数据库备份</a></li>
				<li class="wui_contentLeftItemList"><a href="#">数据库批量替换</a></li>
			</ul>
		</div>
		<div class="wui_contentLeftTitle"><span></span>系统设置</div>
		<div class="wui_contentLeftItem">
			<ul>
				<li class="wui_contentLeftItemList"><a href="#">系统参数设置</a></li>
				<li class="wui_contentLeftItemList"><a href="#">修改管理员密码</a></li>
			</ul>
		</div>
		<div class="wui_contentLeftTitle"><span></span>帮助中心</div>
		<div class="wui_contentLeftItem">
			<ul>
				<li class="wui_contentLeftItemList"><a href="#">如何使用</a></li>
				<li class="wui_contentLeftItemList"><a href="#">联系我们</a></li>
				<li class="wui_contentLeftItemList"><a href="#">建议反馈</a></li>
			</ul>
		</div>
	</div>
	<div class="wui_content">
		<iframe scrolling="yes" class="wui_contentMain" name="wui" src="http://www.soso.com/"></iframe>
	</div>
</div>
<?php include template('footer');?>
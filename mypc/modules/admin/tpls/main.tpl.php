<?php
defined('IN_ADMIN') or exit('No permission resources.');
include $this->admin_tpl('head');
?>
<div class="site">
	<div class="head"><strong>站点统计</strong></div>
	<ul class="list">
		<li><b>会员</b><a class="model-g" href="javascript:void();">88</a></li>
		<li><b>文件</b><a class="model-g" href="javascript:void();">288</a></li>
		<li><b>内容</b><a class="model-g" href="javascript:void();">838</a></li>
		<li><b>订单</b><a class="model-g" href="javascript:void();">884</a></li>
		<li><b>数据库</b><a class="model-g" href="javascript:void();">88</a></li>
	</ul>
</div>
<div class="schedule">
	<div class="head"><strong>网站后台待办事项</strong></div>
	<ul class="list">
		<li><b>认证待审核:</b><a class="model-r" href="#">88</a></li>
		<li><b>vip待审核:</b><a class="model-r" href="#">88</a></li>
		<li><b>借款额度申请:</b><a class="model-r" href="#">88</a></li>
		<li><b>逾期待处理:</b><a class="model-r" href="#">88</a></li>
		<li><b>发标待审核:</b><a class="model-r" href="#">88</a></li>
		<li><b>满标待审核:</b><a class="model-r" href="#">88</a></li>
		<li><b>充值待审核:</b><a class="model-r" href="#">88</a></li>
		<li><b>提现待审核:</b><a class="model-r" href="#">88</a></li>
	</ul>
</div>
<div class="blank"></div>
<div class="sys_info">
	<div class="head"><strong>系统信息</strong></div>
	<table>
		<tr>
			<th align="left" colspan="2">服务器信息</th>
			<th align="left" colspan="2">系统基本信息</th>
		<tr>
		<tr>
			<td>服务器操作系统：</td>
			<td>{$sys_info.os}</td>
			<td>系统名称：</td>
			<td>京西商城系统</td>
		</tr>
		<tr>
			<td>Web 服务器：</td>
			<td>{$sys_info.web_server}</td>
			<td>URL 重写：</td>
			<td>关闭（点击开启）</td>
		</tr>
		<tr>
			<td>PHP 版本：</td>
			<td>{$sys_info.php_ver}</td>
			<td>系统版本：</td>
			<td>qmd gbk V1.0</td>
		</tr>
		<tr>
			<td>MySQL 版本:：</td>
			<td>{$sys_info.mysql_ver}</td>
			<td>开发团队：</td>
			<td>广裕金融技术部</td>
		</tr>
		<tr>
			<td>Web服务器IP地址：</td>
			<td>{$sys_info.ip}</td>
			<td>站点地图：</td>
			<td>开启</td>
		</tr>
		<tr>
			<td>文件上传的最大大小：</td>
			<td>{$sys_info.max_filesize}</td>
			<td>文章总数：</td>
			<td>12</td>
		</tr>
	</table>
</div>
<?php
$this->admin_tpl('foot');
?>
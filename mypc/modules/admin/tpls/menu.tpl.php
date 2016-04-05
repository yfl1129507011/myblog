<?php
defined('IN_MYPC') or exit('No permission resources.');
include $this->admin_tpl('head');
?>
<div class="table-class">
	<div class="head"><strong>模块列表</strong></div>
	<div class="operate align-r">
	<?php if(ROUTE_A=='init'):?>
		<input type="button" class="button border-green" value="添加模块" onclick="location.href='?index&m=admin&c=menu&add'" />
	<?php else:?>
		<input type="button" class="button border-green" value="返回列表" onclick="location.href='?index&m=admin&c=menu'" />
	<?php endif; ?>
	</div>
	<?php if(ROUTE_A=='init'):?>
	<table id="box" class="center">
		<tr pid='0'>
			<th width='5%'>排序</th>
			<th width='5%'>ID编号</th>
			<th>菜单中文名称</th>
			<th width='15%'>操作</th>
		</tr>
		<tr id="{$value.id}" pid='{$value.pid}'>
			<td>{$value.controller}</td>
			<td>{$value.action}</td>
			<td>{$value.pid}</td>
			<td align="center">
				<input type="button" class="button border-blue" value="修改" />
				<input type="button" class="button border-red" value="删除" />
			</td>
		</tr>
	</table>
	<div class="page">
	</div>
	<?php else:?>
  	<form action="" method="post">
	<table id="box">
		<tr>
			<th>模块名称</th>
			<td><input class="input" type="text" name="auth_name"></td>
		</tr>
		<tr>
			<th>模块控制标识</th>
			<td><input class="input" type="text" name="controller"></td>
		</tr>
		<tr>
			<th>模块操作标识</th>
			<td><input class="input" type="text" name="action"></td>
		</tr>
		<tr>
			<th>父级模块</th>
			<td>
				<select name="pid">
				    <option value="0">-请选择模块-</option>
				<volist name='authinfo' id='value'>
					<option value="{$value.id}">{$value.auth_name}</option>
				</volist>
				</select><font color="Red"> *如果是顶级模块请不要选择</font>
			</td>
		</tr>
		<tr>
			<th>是否显示在菜单中</th>
			<td>
				<input type="radio" name="site" value="0" checked='checked' />隐藏
				<input type="radio" name="site" value="1" />显示
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input class="submit" type="submit" value="确认提交"></td>
		</tr>
	</table>
    </form>
	<?php endif;?>
</div>
<?php include $this->admin_tpl('foot'); ?>

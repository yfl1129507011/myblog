<?php
defined('IN_MYPC') or exit('No permission resources.');
include $this->admin_tpl('head');
?>
<div class="table-class">
	<div class="head"><strong>模块列表</strong></div>
	<div class="operate align-r">
	<?php if(ROUTE_A=='init'):?>
		<input type="button" class="button border-green" value="添加模块" onclick="location.href='index.php?m=admin&c=menu&a=add'" />
	<?php else:?>
		<input type="button" class="button border-green" value="返回列表" onclick="location.href='index.php?m=admin&c=menu'" />
	<?php endif; ?>
	</div>
	<?php if(ROUTE_A=='init'):?>
	<table id="box" class="center">
		<tr>
			<th width='10%'>排序</th>
			<th width='10%'>ID编号</th>
			<th>菜单中文名称</th>
			<th width='15%'>操作</th>
		</tr>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td align="center">
				<input type="button" class="button border-blue" value="修改" onclick="location.href='index.php?m=admin&c=menu&a=edit'" />
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
			<th>上级菜单</th>
			<td>
				<select name="info[pid]">
					<option value="0">作为一级菜单</option>
					<option value="1">设置</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>对应的中文语言名称</th>
			<td><input class="input" type="text" name="info[cname]"></td>
		</tr>
		<tr>
			<th>菜单英文名称</th>
			<td><input class="input" type="text" name="info[ename]"></td>
		</tr>
		<tr>
			<th>模块名</th>
			<td><input class="input" type="text" name="info[m]"></td>
		</tr>
		<tr>
			<th>文件名</th>
			<td><input class="input" type="text" name="info[c]"></td>
		</tr>
		<tr>
			<th>方法名</th>
			<td><input class="input" type="text" name="info[a]"></td>
		</tr>
		<tr>
			<th>附加参数</th>
			<td><input class="input" type="text" name="info[data]"></td>
		</tr>
		<tr>
			<th>是否显示在菜单中</th>
			<td>
				<input type="radio" name="info[display]" value="0" />隐藏
				<input type="radio" name="info[display]" value="1" checked='checked' />显示
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input class="submit" type="submit" name='dosubmit' value="确认提交"></td>
		</tr>
	</table>
    </form>
	<?php endif;?>
</div>
<?php include $this->admin_tpl('foot'); ?>

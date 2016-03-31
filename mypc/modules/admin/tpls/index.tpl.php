<?php
defined('IN_ADMIN') or exit('No permission resources.');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>后台管理首页</title>
<link rel="stylesheet" href="<?php echo CSS_PATH;?>admin.css" />
<script type="text/javascript" src="<?php echo JS_PATH;?>jquery-1.8.3.min.js"></script>
<script src="<?php echo JS_PATH;?>admin.js"></script>
<script type="text/javascript">
    <!--
    if(self != top){
        top.location = self.location;
    }
    //-->
</script>
</head>
<body>
	<div class="head_left">
		<div class="logo">
			<a target="_top" href="?m=admin&c=index"><img src="<?php echo IMG_PATH;?>logo.png" title="后台管理首页" /></a>
		</div>
	</div>
	<div class="head_right">
		<div class="main">
			<span class="operate">
				<a class="home" href="" target="_blank" title="网站前台">前台首页</a>
				<a class="back" href="?m=admin&c=index&a=logout" target="_top" onclick="return confirm('确认退出');" title="退出登录">注销登录</a>
			</span>
			<ul class="menu" id="menu">
                <li>
                    <a target="main" id="start" href="?m=admin&c=index&a=main" style="background-color:#09C;color:white;" onclick="clickMenu(this.id)"> 开始</a>
                    <ul id="start_list" class="menu_list" >
                        <li><a target="main" href="javascript:void(0);">系统设置</a></li>
                        <li><a target="main" href="javascript:void(0);">文章管理</a></li>
                        <li><a target="main" href="javascript:void(0);">站点管理</a></li>
                        <li><a target="main" href="javascript:void(0);">模块管理</a></li>
                        <li><a target="main" href="javascript:void(0);">管理员管理</a></li>
                        <li><a target="main" href="javascript:void(0);">修改个人信息</a></li>
                    </ul>
                </li>
                <li>
                    <a target="main" id="goods" href="javascript:void(0);"  onclick="clickMenu(this.id)"> 商品管理</a>
                    <ul id="goods_list" class="menu_list" style="display:none">
                        <li><a target="main" href="javascript:void(0);">商品列表</a></li>
                        <li><a target="main" href="javascript:void(0);">添加商品</a></li>
                        <li><a target="main" href="javascript:void(0);">商品类型</a></li>
                    </ul>
                </li>
                <li>
                    <a target="main" id="account" href="javascript:void(0);"  onclick="clickMenu(this.id)"> 订单管理</a>
                    <ul id="account_list" class="menu_list" style="display:none">
                        <li><a target="main" href="javascript:void(0);">订单列表</a></li>
                    </ul>
                </li>
                <li>
                    <a target="main" id="user" href="javascript:void(0);"  onclick="clickMenu(this.id)"> 用户管理</a>
                    <ul id="user_list" class="menu_list" style="display:none">
                        <li><a target="main" href="javascript:void(0);">用户列表</a></li>
                    </ul>
                </li>
                <li>
                    <a target="main" id="member" href="javascript:void(0);"  onclick="clickMenu(this.id)"> 会员管理</a>
                    <ul id="member_list" class="menu_list" style="display:none">
                        <li><a target="main" href="javascript:void(0);">会员列表</a></li>
                    </ul>
                </li>
                <li>
                    <a target="main" id="attestation" href="javascript:void(0);"  onclick="clickMenu(this.id)"> 认证管理</a>
                    <ul id="attestation_list" class="menu_list" style="display:none">
                        <li><a target="main" href="javascript:void(0);">认证列表</a></li>
                    </ul>
                </li>
            </ul>
		</div>
		<div class="admin_path">
			<span class="info">您好，<strong style="color:green;font-size:14px;"><?php echo $admin_username;?></strong>，欢迎您的光临。</span>
			<span class="path">
				<a target="main" href="?m=admin&c=index&a=main"> 开始</a>&nbsp;&nbsp;/&nbsp;&nbsp;后台首页
			</span>
			<div style="clear:both"></div>
		</div>
	</div>
	<div class="admin_main">
		<iframe name="main" src="?m=admin&c=index&a=main" scrolling="auto" width="100%" height="100%" style="border:none;"></iframe>
    </div>
</body>
</html>

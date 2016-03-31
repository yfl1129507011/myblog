<?php defined('IN_ADMIN') or exit('No permission resources.'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>后台管理-管理员登录</title>
	<link rel="stylesheet" href="<?php echo CSS_PATH;?>login.css" />
	<script src="<?php echo JS_PATH;?>jquery-1.8.3.min.js"></script>
	<script src="<?php echo JS_PATH;?>login.js"></script>
	<script type="text/javascript">
	   <!--
	   if(top != self){
	       top.location = self.location;
	   }
	   //-->
	</script>
</head>

<body onload="javascript:document.login_form.username.focus();">
	<div class="login_top">
		<div class="welcome">欢迎使用后台管理系统</div>
		<div class="back"><a href="#">返回首页</a></div>
	</div>
	
	<div class="login_center">
		<div class="logo"><img src="<?php echo IMG_PATH;?>logo.png" title="后台管理系统" onclick="location.href='<?php echo APP_PATH;?>'"></div><br /><br />
		<div class="login_form">
			<div class="title"><strong>博客后台管理系统</strong></div>
			<form id="login" name="login_form" action="index.php?m=admin&c=index&a=login&dosubmit=1" method="post"">
			<div class="form_body">
			     <strong style="color:red;"><?php echo $err_msg;?></strong>
				<div class="field">
					<b>用户名</b>
					<input class="user" type="text" name="username" placeholder="输入用户名/邮箱/手机号" />
				</div><div id="user"></div><br />

				<div class="field">
					<b>密&nbsp;&nbsp;&nbsp;码</b>
					<input class="pwd" type="password" name="password" placeholder="输入密码" />
				</div><div id="pwd"></div><br />

				<div class="field">
					<b>验证码</b>
					<input class="verify" type="text" name="vcode" placeholder="输入验证码" maxlength="4" />
					<img src="index.php?m=admin&c=index&a=code" class="passcode" onClick="this.src='index.php?m=admin&c=index&a=code&'+Math.random()" title="点击刷新" />
				</div><div id="verify"></div>
			</div>
			<div class="form_btn">
				<input type="submit" value="立即登录后台" class="btn">
			</div>
			</form>
		</div>
	</div>
</body>
</html>
<?php if (!defined('app')) die('error!'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>欢迎登录</title>
	<link rel="stylesheet" href="mycss.css">
	<style>
		.error-box{width: 378px;margin: auto;padding: 10px;background-color: #FFF0F2;
			border: 1px dotted #ff0099 ;font-size: 14px;color: #ff0000;}
		.error-box ul{margin: 10px;padding-left: 25px;}	
	</style>
</head>
<body>
	<script src="./3066.js" count="300" zindex="-1" opacity="1" color="47,135,193" type="text/javascript"></script>
	<form method="post">
		<table class="reg">
			<tr><td class="title" colspan="2">欢迎登录</td><td><a href="mysqli_register.php" >注册</a>
					</td></tr>
			<tr><th>用户名：</th><td><input type="text" name="username"/></td></tr>
			<tr><th>密码：</th><td><input type="password" name="password"/></td></tr>
			<tr>
					<th>验证码：</th> 
					<td>
					<input type="text" name="captcha" />
					<img src="code.php" alt="" id="code_img"/>  
					<a href="#" id="change">看不清，换一张</a>
					</td>
				</tr>
			<tr><td colspan="2" class="td-btn"><input type="submit" value="登录" class="button">
					<input type="reset" value="重新填写" class="button"></td></tr>
		</table>
	</form>
	<script>
	var change=document.getElementById("change");
	var img=document.getElementById("code_img");
	change.onclick=function(){
		img.src="code.php?t="+Math.random();
		return false;
	}
	</script>
	<?php if(!empty($error)): ?>
		<div class="error-box">登录失败，错误信息如下：
			<ul><?php foreach ($error as $v)echo "<li>$v</li>"; ?></ul>
		</div>
	<?php endif; ?>	

</body>
</html>
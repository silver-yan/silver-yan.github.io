<?php if(!defined('APP')) die('error!');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>添加实训信息</title>
	<link rel="stylesheet" href="./js/jquery.datetimepicker.css" />
	<script src="./js/jquery.js"></script>
	<script src="./js/jquery.datetimepicker.js"></script>
	<style>
		body{background-color: #eee;margin: 5%;padding: 0}
		.error-box{text-align:center;margin:15px;padding:10px;background:#FFF0F2;
     			border:1px dotted #ff0099;font-size:14px;color:#ff0000;}
		.error-box a{color:#0066ff;}
		.box{width: 400px;margin: 15px auto;padding: 20px;border: 1px solid #ccc;background-color:rgba(255,255,255,0.25);}
		.box h1{font-size:20px; text-align: center;}
		.profile-table{margin: 0 anto;}
		.profile-table th{font-weight: normal;text-align: right;}
		.profile-table input[type="text"]{width: 180px;border: 1px solid #ccc;height: 22px;padding-left: 4px;}
		.profile-table .button{background-color: #0099ff;border: 1px solid #0099ff;color: #fff;width: 80px;
			height: 25px;margin: 0 5px;cursor: pointer;}
		.profile-table .td-btn{text-align: center;padding-top: 10px;}
		.profile-table th,.profile-table td{padding-bottom: 10px;}
		.profile-table td{font-size: 14px}
		.profile-table .txttop{vertical-align: top;}
		.profile-table select{border: 1px solid #ccc;min-width: 80px;height: 25px;}
		.profile-table .description{font-size: 13px;width: 250px;height: 60px;border: 1px solid #ccc}
	</style>
</head>
<body>
	<script src="./3066.js" count="400" zindex="-1" opacity="1" color="153,135,135 " type="text/javascript"></script>

	<div class="box">
		<?php if($login): ?>
		<h1>添加实训信息</h1>
		<form action="./mysqli_Add.php" method="post">
			<table class="profile-table">
				<tr><th>姓名：</th><td><input type="text" name="name" </td></tr>
				<tr><th>学号：</th><td><input type="text" name="number" value="<?php echo $userinfo['username']; ?>"></td></tr>
				<tr><th>班级：</th><td><input type="text" name="class"</td></tr>
				<tr><th>实习意向：</th><td><input type="text" name="intention" </td></tr>
				<tr><th>实训单位：</th><td><input type="text" name="address" </td></tr>
				<tr><th>实习内容：</th><td><input type="text" name="content" </td></tr>
				<tr><th>联系电话：</th><td><input type="text" name="telephone" </td></tr>
				<tr><td colspan="7" class="td-btn">
				<tr><td colspan="2" class="td-btn">
					<input type="submit" value="保存资料" class="button">
					<input type="reset" value="重新填写" class="button">
				</td></tr>
			</table>
		</form>
		<?php else: ?>
     <div class="error-box">您还未登录,请先<a href="login.php">登录</a>或<a href="mysqli_register.php">注册新用户</a> 
</div>
  <?php endIf; ?>
	</div>
</body>
</html>
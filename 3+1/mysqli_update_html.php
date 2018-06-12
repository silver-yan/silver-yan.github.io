<?php if(!defined('APP')) die('error!');?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>编辑学生</title>
	<link rel="stylesheet" href="./js/jquery.datetimepicker.css" />
	<script src="./js/jquery.js"></script>
	<script src="./js/jquery.datetimepicker.js"></script>
	<style>
		body{background-color: #eee;margin:7%;padding: 0}
		.box{width: 400px;margin: 15px auto;padding: 20px;border: 1px solid #ccc;background-color:rgba(255,255,255,0.25);}
		.box h1{font-size:20px; text-align: center;}
		.error-box{text-align:center;margin:15px;padding:10px;background:#FFF0F2;
     		border:1px dotted #ff0099;font-size:14px;color:#ff0000;}
		.error-box a{color:#0066ff;}
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
	<?php if($login): ?>
	<script src="./3066.js" count="300" zindex="-1" opacity="0.8" color="100,50,256" type="text/javascript"></script>

	<div class="box">
		<h1>修改实习信息</h1>
		<form action="" method="post">
			<table class="profile-table">
				<tr><th>姓名：</th><td><input type="text" disabled="disabled" name="name" value="<?php echo $students_info['name']; ?>"></td></tr>
				<tr><th>学号：</th><td><input type="text" disabled="disabled" name="number" value="<?php echo $students_info['number']; ?>"></td></tr>
				<tr><th>班级：</th><td><input type="text" disabled="disabled" name="class" value="<?php echo $students_info['class']; ?>"></td></tr>
				<tr><th>实习意向：</th><td><input type="text" name="intention" value="<?php echo $students_info['intention']; ?>"></td></tr>
				<tr><th>实训地址：</th><td><input type="text" name="address" value="<?php echo $students_info['address']; ?>"></td></tr>
				<tr><th>实习内容：</th><td><input type="text" name="content" value="<?php echo $students_info['content']; ?>"></td></tr>
				<tr><th>联系电话：</th><td><input type="text" name="telephone" value="<?php echo $students_info['telephone']; ?>"></td></tr>
				<tr><td colspan="7" class="td-btn">
					<input type="submit" value="保存资料" class="button">
					<input type="reset" value="重新填写" class="button">
				</td></tr>
			</table>
		</form>
	</div>
	<?php else: ?>
     <div class="error-box">您还未登录,请先<a href="login.php">登录</a>或<a href="mysqli_register.php">注册新用户</a> 
</div>
  <?php endIf; ?>
</body>
</html>
<?php if(!defined('APP')) die('error!'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>会员中心</title>
<style>
body{background-color:#eee;margin:13% 25%;padding:0;}
.box{width:400px;margin:15px;padding:20px;border:1px solid #ccc;
     background-color:rgba(255,255,255,0.25);}
.error-box{text-align:center;margin:15px;padding:10px;background:#FFF0F2;
     border:1px dotted #ff0099;font-size:14px;color:#ff0000;}
.error-box a{color:#0066ff;}
.box .title{font-size: 20px;text-align:center;margin-bottom:20px;}
.box .welcome{text-align:center;}
.box .welcome a{color: #0066ff;}
.box .welcome span{color:#ff0000;}
</style>
</head>
<body>
  <script src="./3066.js" count="300" zindex="-1" opacity="1" color="200,135,100" type="text/javascript"></script>

<div class="box">
  <div class="title">会员中心</div>
  <?php if($login): ?>
     <div class="welcome">“<span><?php echo $userinfo['username']; ?>
  </span>”  您好,双迎来到会员中心。<a href="?action=logout">退出</a></div>
  <!--此处编写会员中心其他内容-->
   <div class="welcome"><a href="./thumb.php">上传头像</a> &nbsp
        <a href="./mysqli_showList.php">查看实训信息</a>  &nbsp
        <a href="./password_update.php">修改密码</a>
   </div>

  <?php else: ?>
     <div class="error-box">您还未登录,请先<a href="login.php">登录</a>或<a href="mysqli_register.php">注册新用户</a> 。</div>
  <?php endIf; ?>
</div>
</body>
</html>

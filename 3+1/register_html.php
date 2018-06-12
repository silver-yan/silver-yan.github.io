<?php if(!defined('APP')) die('error!'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title>欢迎注册</title>
	<link rel="stylesheet" href="mycss.css">
</head>
<body>
  <script src="./3066.js" count="300" zindex="-1" opacity="1" color="0,256,100" type="text/javascript"></script>

  <form method="post">
  <table class="reg">
    <tr><td class="title" colspan="2">欢迎注册新用户</td></tr>
    <tr><th>用户名: </th><td><input type="text" name="username" id="name"/></td></tr>
    <tr><th>用户类型: </th><td><select name="usertype" id="type" >
      <option value="student">学生</option>
      <option value="teacher">教师</option>
    </select></td></tr>
    <tr><th>邮箱:  </th><td><input type="text"  name="email" id="mail"/></td></tr>
    <tr><th>密码: </th><td><input type="password" name="password" id="pw1" /></td></tr>
    <tr><th>确认密码: </th><td><input type="password" name="password2" id="pw2" /></td></tr>
    <tr><td colspan="2" class="td-btn">
    <input type="submit" value="提交注册" class="button" />
    <input type="reset" value="重新填写" class="button" />
    </td></tr>
 </table>
 </form>
 <?php if(!empty($error)): ?>
  <div class="error-box">登录失败,错误信息如下:
      <ul><?php foreach($error as $v) echo "<li>$v</li>"; ?></ul>
  </div>
<?php endIf; ?>
</body>
</html>
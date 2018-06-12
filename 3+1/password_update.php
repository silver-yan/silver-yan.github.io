<?php
//声明文件解析的编码格式
header('content-type:text/html;charset=utf-8');

//引入功能函数文件
require './public_sqli_fun.php';
//启动SESSION
  session_start();
//判断SESSION中是否存在用户信息
  if(isset($_SESSION['userinfo'])){
     //用户信息存在，说明用户已经登录
     $login = true;  //保存用户登录状态
     $userinfo = $_SESSION['userinfo'];  //获取用户信息
  }else{
     //用户信息不存在，说明用户没有登录
     $login = false;
   }
   //没有表单提交时，显示员工添加页面

//初始化数据库
//dbInit();
//判断是否有表单提交
if (!empty($_POST)) {
		$password=isset($_POST['oldpassword'])? trim($_POST['oldpassword']) : '';
		$newpassword = isset($_POST['password']) ? trim($_POST['password']) : '';
		$newpassword2 = isset($_POST['password2']) ? trim($_POST['password2']) : '';
//获取要编辑的用户Id
		$username=$userinfo['username'];
	//载入表单验证函数库，验证用户名和密码格式
    require 'check_form.lib.php';
    if(($result = checkPassword($password)) !== true)  $error[] = $result;
    if(($result = checkPassword($newpassword)) !== true)  $error[] = $result;
    if(($result = check2Password($newpassword,$newpassword2)) !== true)  $error[] = $result;
    if(($result = check3Password($password,$newpassword)) !== true)  $error[] = $result;
    
	if (empty($error)) {
					mysql_connect('localhost:3308','root','369874') or die('数据库连接失败！');
					mysql_query('set names utf8');
					mysql_query('use `manage`') or die('数据库不存在');

					$sql = "select password from `user` where username='$username'";
					
					if ($rst=mysql_query($sql)) {
						$row=mysql_fetch_assoc($rst);
						$password=md5($password);

						if ($password==$row['password']) {
							$newpassword=md5($newpassword);
							$sql = "update user set `password`='$newpassword' where username='$username'";
							if($res = query($link,$sql)){
								unset($_SESSION['userinfo']);
										echo '密码修改成功，请重新登录。';
										header('refresh:3	;url=./login.php'); //跳转到登录页面
												die; //终止脚本
								}else{
									//执行失败
									die('密码修改失败！');
	}
							}else{
							$error[]='旧密码输入错误。';
						}
					}
					
				}
}
			
define('APP', 'itcast');
require './password_update_html.php';

				


		

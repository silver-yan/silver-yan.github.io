<?php 
	header('Content-type:text/html;charset=utf-8');
	$error=array();
	if (!empty($_POST)) {
		$username=isset($_POST['username'])? trim($_POST['username']):'';
		$password=isset($_POST['password'])?$_POST['password'] : '';
		$code = isset($_POST['captcha']) ? trim($_POST['captcha']) : '';
		session_start();
		if(empty($_SESSION['captcha_code'])){
			echo '验证码已过期，请重新登录。';
			header('refresh:2;url=./login.php'); //跳转到登录页面
				die; //终止脚本
			}
		elseif (strtolower($code) !== strtolower($_SESSION['captcha_code'])){
	 		echo '验证码输入错误';	 
	 		header('refresh:2;url=./login.php'); //跳转到登录页面
				die; //终止脚本
			} else{
				unset($_SESSION['captcha_code']);
				require './check_form.lib.php';
				if (($result=checkUsername($username))!== true) $error[]=$result;
				if (($result=checkPassword($password))!== true) $error[]=$result;
			
				if (empty($error)) {
					mysql_connect('localhost:3308','root','369874') or die('数据库连接失败！');
					mysql_query('set names utf8');
					mysql_query('use `manage`') or die('数据库不存在');

					$sql="select `id`,`password`,`usertype` from `user` where `username`='$username'";
					
					if ($rst=mysql_query($sql)) {
						$row=mysql_fetch_assoc($rst);
						$password=md5($password);
						if ($password==$row['password']) {
							
							$_SESSION['userinfo']=array('id'=>$row['id'],
														'username'=>$username,
														'usertype' => $row['usertype']
									);
							header('location:user.php');
							die;
						}
					}
					$error[]='用户名不存在或密码错误。';
				}
}
			}

			define('app', 'manage');
			require 'login_html.php';
				


		
 ?>
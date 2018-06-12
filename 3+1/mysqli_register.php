<?php
   header('Content-Type:text/html;charset=utf-8');
    $error= array();
    if(!empty($_POST)){
    //接收用户登录表单
    $username = isset($_POST['username']) ? trim($_POST['username']) : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $password2 = isset($_POST['password2']) ? $_POST['password2'] : '';
     $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    //载入表单验证函数库，验证用户名和密码格式
    require 'check_form.lib.php';
    if(($result = checkUsername($username)) !== true)  $error[] = $result;
    if(($result = checkPassword($password)) !== true)  $error[] = $result;
    if(($result = check2Password($password,$password2)) !== true)  $error[] = $result;
    if(($result = checkEmail($email)) !== true)  $error[] = $result;
     $username = $_POST['username'];
     $usertype = $_POST['usertype'];
     $password = $_POST['password'];
     $email = $_POST['email'];
     //连接数据库
     if(empty($error)){
     	$server_name = "localhost:3308";  
        $user_name = "root";  
        $pass_word = "369874";  
        $dbname = "manage";  
        $conn = new mysqli($server_name, $user_name, $pass_word, $dbname);      
        // Check connection  
        if ($conn->connect_error) {
        	die("连接失败: " . $conn->connect_error);
        }    
       //设置字符集
       mysqli_query($conn,'set names utf8');
       $username = mysqli_real_escape_string($conn,$username);
       $email = mysqli_real_escape_string($conn,$email);

       $sql = "select `id` from `user` where `username`='$username'";
       $rst = $conn->query($sql);
       if(mysqli_num_rows($rst) > 0){
       	echo "user:".$username."<br>";
       	die('用户名已存在,请换个用户名。<a href=register_html.html>注 册</a>');
       }
       $password = md5($password);
       $sql="insert into `user` (`username`,`usertype`,`password`,`email`) values('$username','$usertype','$password','$email')";
       $rst=$conn->query($sql);
       if($rst){
       	echo"<script>alert('执行成功')</script>";
       	require 'login.php';
       }else{
       	echo '执行失败:'.mysql_error();
       }
       $conn->close();
   }
}
//加载HTML模板文件
  define('APP','itcast');
  require 'register_html.php';

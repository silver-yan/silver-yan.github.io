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
//获取要编辑的学生的id
$s_number = isset($_GET['number']) ? $_GET['number'] : '';
//判断是否有POST数据提交
if(!empty($_POST)){
	//声明变量$update,用来保存处理后的学生数据
	$update = array();
	//声明变量$fields,用来保存字段信息
	$fields = array('intention','address','content','telephone');

	//遍历$fields,获取输入学生数据的键和值
	foreach ($fields as $value) {
		$data = isset($_POST[$value]) ? $_POST[$value] : '';
		if($data=='') die($value.'字段不能为空');
		$data = safeHandle($link,$data);
		// echo "<script>alert(".$data.");</script>";
		//把键和值按照sql更新语句中的语法要求连接，并存入到$update数组或中
		$update[] = "$value='$data'";
	}
	//将$fields数组以逗号连接，赋值给$update_str
	$update_str = implode(',', $update);
	//组合SQL语句
	$sql = "update `students` set $update_str where  `number` = '$s_number'";
	//执行sql
	if($res = query($link,$sql)){
		//成功时返回到 mysqli_showList.php
		header('Location:./mysqli_showList.php');
		//停止脚本
		die;
	}else{
		//执行失败
		die('比赛信息修改失败!');
	}
}
//没有表单提交时，查询当前要编辑的学生信息，展示到页面中

//编写sql语句，查询对应ID的学生数据
$sql = "select * from `students` where `number` = '$s_number'";
//获取一行数据
$students_info = fetchRow($link,$sql);
//显示学生修改页面
define('APP','itcast');
require './mysqli_update_html.php';
?>
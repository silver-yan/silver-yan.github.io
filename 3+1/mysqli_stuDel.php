<?php
//声明文件解析的编码格式
header('content-type:text/html;charset=utf-8');
//引入功能函数文件
require './public_sqli_fun.php';
//获取要编辑的员工的id
$s_number = isset($_GET['number']) ? $_GET['number'] : '';
	//组合sql语句
	$sql = "delete from `students` where `number` = '$s_number' ";
	//执行sql
	if($res = query($link,$sql)){
		//成功时返回到 mysqli_showList.php
		header('Location: ./mysqli_showList.php');
		//停止脚本
		die;
	}else{
		//执行失败
		die('删除失败！');
	}
?>
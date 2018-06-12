<?php
//声明文件解析的编码格式
header('content-type:text/html;charset=utf-8');
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
//引入功能函数文件
require './public_sqli_fun.php';
//判断是否有表单提交
$usertype = isset($_GET['usertype']) ? $_GET['usertype'] : '';
if(!empty($_POST)){
	//声明变量$fields,用来保存字段信息
	$fields = array('name','number','class','intention','address','content','telephone');
	//声明变量$values,用来保存值信息
	$values = array();

	//遍历$fields,获取输入学生数据的键和值
	foreach ($fields as $key => $value) {
		$data = isset($_POST[$value]) ? $_POST[$value] : '';
		if($data=='') die($value.'字段不能为空');
		$data = safeHandle($link,$data);
		//把字段使用反引号包裹，赋值给$fields数组
		$fields[$key] = "`$value`";
		//把值使用单引号包裹，赋值给$values数组
		$values[] = "'$data'";
	}
	//将$fields数组以逗号连接，赋值给$fields,组成insert语句中的字段部分
	$fields = implode(',', $fields);
	//将$values数组以逗号连接，赋值给$values,组成insert语句中的值部分
	$values = implode(',', $values);
	//最后把$fields和$values拼接到insert语句中，注意要指定表名
	$sql = "insert into `stufile` ($fields) values ($values)";
	//执行sql
	if($res = query($link,$sql)){
		//成功时返回到 mysqli_showList.php
		header('Location:./mysqli_showList.php');
		//停止脚本
		die;
	}else{
		//执行失败
		die('学生信息添加失败!');
	}
}
//没有表单提交时，显示学生添加页面
define('APP','itcast');
require './mysqli_padd_html.php';
?>
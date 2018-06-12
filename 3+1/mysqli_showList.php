<?php
header('content-type:text/html;charset=utf-8');
//导入函数文件
include("./page_function.php");
include("./public_sqli_fun.php");
//启动SESSION
  session_start();
  //用户退出
  if(isset($_GET['action']) && $_GET['action']=='logout'){
      //清除SESSION数据
      unset($_SESSION['userinfo']);
      //如果SESSION中没有其他数据，则销毁SESSION
      if(empty($_SESSION)){
         session_destroy();
       }
      //跳转到登录页面
      header('Location: login.php');
      //终止脚本
      die;
  }
//判断SESSION中是否存在用户信息
  if(isset($_SESSION['userinfo'])){
     //用户信息存在，说明用户已经登录
     $login = true;  //保存用户登录状态
     $userinfo = $_SESSION['userinfo'];  //获取用户信息
  }else{
     //用户信息不存在，说明用户没有登录
     $login = false;
   }

//准备SQL语句
$sql = 'select * from students';
if( $userinfo['usertype'] !== 'student'){
//定义员工数组，用以保存员工信息,执行SQL语句，获取结果集
$grade = fetchAll($link,$sql);
 $where = ' ';
    //判断是否有搜索关键字传入
    if(isset($_POST['keyword'])){
        $keyword = $_POST['keyword'];
        //用户输入的搜索信息不能直接使用，其中可能存在导致SQL语句执行失败的关键字或特殊字符，需要使用mysqli_real_escape_string()函数进行转义
        $keyword = safeHandle($link,$keyword);
        //将转义后的关键字拼接到where条件查询中，并且使用like进行模糊查询
        $where = "where concat(name,number,class,intention,address,content,telephone) like '%$keyword%'";
    }
    $sql = "select * from students $where";

//获取数据总数
$page_size = 6;
//$result = $link->query('select count(*) from emp_info');
$result=mysqli_query($link,"select count(*) from `students`");
if (mysqli_num_rows($result) > 0) 
{
$count = mysqli_fetch_row($result);
//取出查询结果中的第一列的值
$count = $count[0];
//计算最大页数
$max_page = ceil($count/$page_size);
}
else 
  {echo mysqli_num_rows($result);echo "0 连接数据库失败!";exit;}

//获取当前选择的页码，并作容错处理
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$page = $page > $max_page ? $max_page : $page;
$page = $page < 1 ? 1 : $page;

//调用函数生成分页链接
 $page_html = makePageHtml($page,$max_page);

//拼接查询语句并执行，获取查询数据
$lim = ($page -1) * $page_size;

$sql = $sql."limit {$lim},{$page_size}";

$grade = query($link,$sql);
$res=$link->query($sql);
//if(!$res) die(mysqli_error());

//读取数据并作相关处理
}

else{
  $username=$userinfo['username'];
$sql = "select * from `students` where number='$username'";
$res = mysqli_query($link,$sql);
//$res=$link->query($sql);
}
$students_info = array();
$students_info = array();
while($row = mysqli_fetch_assoc($res)){
  $students_info[] = $row;
}
//设置常量，用以判断视图页面是否由此页面加载
define('APP', 'itcast');
//载入视图页面
require './mysqli_list_html.php';
//$link->close();
mysqli_close($link);

?>
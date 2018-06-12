<?php if(!defined('APP')) die('error!');?>
<!doctype html>
<html>
 <head>
  <meta charset="utf-8">
  <title>3+1学生信息统计表</title>
  <style>
	.box{margin:20px auto;}
	.box .title{font-size:22px;font-weight:bold;text-align:center;}
	.box table{width:100%;margin-top:10px;border-collapse:collapse;font-size:12px;border:1px solid #B5D6E6;min-width:460px;}
	.box table th,.box table td{height:20px;border:1px solid #B5D6E6;}
	.box table th{background-color:#E8F6FC;font-weight:normal;}
	.box table td{text-align:center;}
	.page{font-size:12px;float:right;margin-top:10px;}
	.box a{color:#444;text-decoration:none;}
	.box a:hover{text-decoration:underline;}
	.error-box{text-align:center;margin:15px;padding:10px;background:#FFF0F2;
     border:1px dotted #ff0099;font-size:14px;color:#ff0000;}
	.error-box a{color:#0066ff;}
	.search{padding:10px 0;float:right;font-size:12px;}
  </style>
  <script language=javascript>
  function edit(){
  	var msg = "您真的确定要修改吗？\n\n请确认！";
  	if(confirm(msg)==true){
  		return true;
  	}else{
  		return false;
  	}
  }
  function del(){
  	var msg = "您真的确定要删除吗？\n\n请确认！";
  	if(confirm(msg)==true){
  		return true;
  	}else{
  		return false;
  	}
  }
  </script>
</head>
<body>
<?php if($login): ?>
	<script src="./3066.js" count="300" zindex="-1" opacity="0.7" color="255,0,255" type="text/javascript"></script>

  <form action="./mysqli_showList.php" method="post">
	<div class="box">
		<div class="title">3+1学生信息统计表</div>
		<?php if( $userinfo['usertype'] !== 'student'){ ?>
			<div class="search">快速查询:<input type="text" name="keyword"/>
				<input type="submit" value="提交"/>
			</div>
		<?php } ?>
		<table border="1">
			<tr>
				<th>姓名</th>
				<th>学号</th>
				<th>班级</th>
				<th>实习意向</th>
				<th>实训单位</th>
				<th>实习内容</th>
				<th>联系电话</th>
				 <?php if( $userinfo['usertype'] !== 'student'){ ?>
				<th width="25%">相关操作</th>
				 <?php } ?>
			</tr>
			<?php if(!empty($students_info)){ ?>
			<?php foreach($students_info as $row){ ?>
			<tr>
				 <td><?php echo $row['name']; ?></td>
				 <td><?php echo $row['number']; ?></td>
				 <td><?php echo $row['class']; ?></td>
				 <td><?php echo $row['intention']; ?></td>
				 <td><?php echo $row['address']; ?></td>
				 <td><?php echo $row['content']; ?></td>
				 <td><?php echo $row['telephone']; ?></td>
				 <?php if( $userinfo['usertype'] !== 'student'){ ?>
				 <td>
			   	   <div align="center">
				   <span>
				   	<img src="images/edt.gif" width="16" height="16" /><a href="<?php echo './mysqli_stuUpdate.php?number='.$row['number']?>"
				   	 onclick="javascript:return edit()">编辑</a>&nbsp; &nbsp;
				   	 <?php if( $userinfo['usertype'] == 'root'){ ?>
				   	<img src="images/del.gif" width="16" height="16" /><a href="<?php echo './mysqli_stuDel.php?number='.$row['number']?>"
				   	 onclick="javascript:return del()">删除</a>
				   	 <?php } ?>
				   </span>
				   </div>
				 </td>
				 <?php } ?>
			</tr>
			<?php } ?>
			<?php }else{ ?>
			<tr><td colspan="6">查询的结果不存在！</td></tr>
			<?php } ?>
		</table>
		<?php if( $userinfo['usertype'] !== 'student'){ ?>
		<div class="page"><?php echo $page_html; ?></div>
		<?php } ?>
	</div>
  </form>
   <?php if( $userinfo['usertype'] == 'root'){ ?>
    <div ><a href="<?php echo './mysqli_stuAdd.php?usertype='. $userinfo['usertype']?>">添加学生信息</a></div>
   <?php } ?>
   <?php if( $userinfo['usertype'] == 'student'){ ?>
    <div ><a href="<?php echo './mysqli_Add.php?usertype='. $userinfo['usertype']?>">提交实训信息</a></div>
   <?php } ?>
<?php else: ?>
     <div class="error-box">您还未登录,请先<a href="login.php">登录</a>或<a href="mysqli_register.php">注册新用户</a> 

</div>
  <?php endIf; ?>
 </body>
</html>
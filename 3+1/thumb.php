<?php
header('Content-type:text/html;charset=utf-8');

 session_start();
 //启动SESSION
//判断SESSION中是否存在用户信息
  if(isset($_SESSION['userinfo'])){
     //用户信息存在，说明用户已经登录
     $login = true;  //保存用户登录状态
     $userinfo = $_SESSION['userinfo'];  //获取用户信息
  }else{
     //用户信息不存在，说明用户没有登录
     $login = false;
   }
//定义用户信息：id和姓名
  $userinfo = $_SESSION['userinfo'];
$info = array('id'=> $userinfo['id'],'name'=> $userinfo['username']);

//判断是否上传头像
if(!empty($_FILES['pic']))	
{
//	echo "<pre>";
//print_r($_FILES);
//echo "</pre>";	
	$pic_info=$_FILES['pic'];

	if ($pic_info['error']>0) {
		# code...
		$error_msg='上传错误：';
		switch ($pic_info['error']) {
			case '1':
				$error_msg.='';
				break;
			
			
		}
		echo $error_msg;
		return false;
	}
	$type=substr(strrchr($pic_info['name'], '.'), 1);
	if ($type!=='jpg') {
		# code...
		echo '图像类型不符合，必须是jpg';
		return false;
	}

	list($width,$height)=getimagesize($pic_info['tmp_name']);
	$maxwidth=$maxheight=90;
	if ($width>$height) {
		# code...
		$newwidth=$maxwidth;
		$newheight=round($newwidth*$height/$width);	
	}else{
		$newheight=$maxheight;
		$newwidth=round($newheight*$width/$height);
	}
	$thumb=imagecreatetruecolor($newwidth, $newheight);
	$source=imagecreatefromjpeg($pic_info['tmp_name']);
	imagecopyresized($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
	$new_file='./'.$info['id'].'.jpg';
	imagejpeg($thumb,$new_file,100);
}
?>
<!doctype html>
<html>
 <head>
  <meta charset="utf-8">
  <title>用户头像上传</title>
  <style>
  	body{ background:#eee; padding:10% ;}
  	.error-box{text-align:center;margin:15px;padding:10px;background:#FFF0F2;
     border:1px dotted #ff0099;font-size:14px;color:#ff0000;}
.error-box a{color:#0066ff;}
	.box{ width:320px; border: solid #ccc 1px; background-color:rgba(255,255,255,0.3);
	 margin:0 auto; padding:0 0 10px 60px;}
	img{ width:90px; float:left;padding:2px;border:1px solid #999;}
	.exist{ float:left;}
	.upload{ clear:both; padding-top:15px; }
	h2{ padding-left:60px;font-size:20px;}
	.sub{ margin-left:85px; background:#0099FF; border:1px solid #55BBFF; 
		width:85px; height:30px; color:#FFFFFF; font-size:13px; font-weight:bold; cursor:pointer; margin-top:5px;}
  </style>
 </head>
 <body>
 <?php if($login): ?>
 	<script src="./3066.js" count="300" zindex="-1" opacity="0.8" color="47,0,193" type="text/javascript"></script>
 <div class="box">
   <h2>编辑用户头像</h2>
   <p>用户姓名：<?php echo $info['name'];?></p>
   <p class="exist">现有头像：</p>
   <img src="<?php echo './'.$info['id'].'.jpg?rand='.rand(); ?>" 
   onerror="this.src='./default.png'" />
   <form method="post" enctype="multipart/form-data">
	 <p class="upload">上传头像：<input name="pic" type="file"/></p>
	 <p><input class="sub" type="submit" value="保存头像"><a href="user.php">会员中心</a></p>
	 <p></p>
   </form>
 </div>

<?php else: ?>
     <div class="error-box">您还未登录,请先<a href="login.php">登录</a>或<a href="mysqli_register.php">注册新用户</a> 
</div>
  <?php endIf; ?>
 </body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<base href="<?php echo site_url();?>">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/reg-log.css">
	<title>登录</title>
</head>
<body>
	
	<div id="h2">
		<h2>登录</h2>
	</div>
	<div id="reg-log-wrap">
		<form role="form" onsubmit="return false">
			<div class="form-group">
				<label for="">用户名：</label>
				<input type="text" class="form-control" placeholder="请输入您的用户名" name="name">
			</div>
			<div class="form-group">
				<label for="">密码：</label>
				<input type="password" class="form-control" placeholder="请输入您的密码" name="password">
			</div>
			<button type="submit" class="btn btn-default" id="login">登录</button>		
		</form>
	</div>
<script src="js/jquery-1.11.3.js"></script>
<script src="js/login.js"></script>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	 <base href="<?php echo site_url();?>">
	 <link rel="stylesheet" href="css/bootstrap.min.css">
	 <link rel="stylesheet" href="css/reg-log.css">
	<title>注册</title>
</head>
<body>
	<div id="h2">
		<h2>注册</h2>
	</div>
	<div id="reg-log-wrap">
		<form role="form" action="users/do_regist" method="post" onsubmit = "return false">
			<div class="form-group">
			    <label for="exampleInputEmail1">姓名：</label>
			    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入您的姓名" name="name">
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">邮箱：</label>
			    <input type="email" class="form-control" id="exampleInputEmail2" placeholder="请输入您的邮箱地址" name="email">
			</div>
			<div class="form-group">
			    <label for="exampleInputPassword1">密码</label>
			    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="请输入您的密码" name="password">
			</div>
			<div class="form-group">
			    <label class="radio-inline">
			      <input type="radio"  value="nan" name="sex">男性
			    </label>
			    <label class="radio-inline">
			      <input type="radio"  value="women" name="sex">女性
			    </label>
			    <label class="radio-inline">
			      <input type="radio"  value="center" name="sex">中性
			    </label>
			</div>
			<button type="submit" class="btn btn-default" id="submit">注册</button>
		</form>	
	</div>
	<script src="js/jquery-1.11.3.js"></script>
	<script>
		$(function(){
			$('#submit').on('click', function(){
				var $name = $('[name="name"]');
				var $email = $('[name="email"]');
				var $pwd = $('[name="password"]');
				var $sex = $('[name="sex"]');
				$.post('users/do_regist', {username:$name.val(), email:$email.val(), password:$pwd.val(), sex:$sex.val()}, function(res){
					if (res == "success") {
						$('#h2').append('<p>注册成功！点击<a href="users/login">登录</a></p>')	;
						$('#reg-log-wrap').remove();
					};
				})

				
			})
		});
	</script>
</body>
</html>
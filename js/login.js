$(function(){
	$('#login').on('click', function(){
		var $name = $('[name="name"]');
		var $pwd = $('[name="password"]');
		$.post('users/do_login', {name:$name.val(), password:$pwd.val()}, function(res){
			if (res == "fail") {
				$('#h2 p').remove();
				$('#h2').append('<p>登录失败！用户名或密码不正确！</p>')	;
				// $('#reg-log-wrap').remove();
			}else if(res == "success"){
				$('#h2 p').remove();
				$('#h2 h2').remove();
				$('#h2').append('<p>登录成功！点击进入<a href="welcome/index">首页</a></p>');
				$('#reg-log-wrap').remove();
			}
		})
	})
});
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>首页</title>
</head>
<body>
<div id="header">
    <div class="container">
        <div id="logo">
        	<img src="images/logo.jpg" alt="">
        </div>
        <p >  让您做生活的主人！</p>
        <div id="welcome">
        	<span style="color:#ee7621" id="user"><?php echo $username?></span>
        	<span style="color:red"><?php echo $change?></span>
        	<span id="regist" <?php echo $display?>><a href="users/regist">注册</a></span>
        	<span <?php echo $display?>>||</span>
        	<span id="login" <?php echo $display?>><a href="users/login">登陆</a></span>
        </div>
    </div>
</div>
<div id="nav">
	<div class="container">
        <div class="navbar navbar-default" role="navigation">
			<ul class="nav navbar-nav">
			    <li id="home" class="active"><a>网站首页</a></li>
			    <li id="hair"><a>理发</a></li>
			    <li id="teacher"><a>家教</a></li>
			    <li id="clean"><a>清洁</a></li>
			    <li id="hand"><a>美甲</a></li>
			    <!-- <li><a>关于我们</a></li> -->
			    <!-- <li><a>联系我们</a></li> -->
				<li id="myIndent"><a><?php echo $indent?></a></li>
			</ul>
		</div>
    </div>
</div>
<div id="inner">
	<div id="banner">
		<div class="container">
			<div class="wrap">
				<ul id="tab">
					<li class="li-selected">1</li>
					<li>2</li>
					<li>3</li>
					<li>4</li>
					<li>5</li>
				</ul>
				<div id="imgs">
					<img class="img-selected" src="images/擦窗.jpg">
					<img src="images/teacher-1.jpg">
					<img src="images/hair-4.jpg">
					<img src="images/logo2.jpg">
					<img src="images/家电修理.jpg">
					
				</div>
				<div id="arrow" >
					 <span id="ahead" onselectstart = "return false">&lt;</span>
					 <span id="next" onselectstart = "return false">&gt;</span>
				</div>	 
			</div>
		</div>
	</div>
	
</div>

<script src="js/jquery-1.11.3.js"></script>
<script src="js/index.js"></script>

</body>
</html>
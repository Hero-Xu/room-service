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
        	<span style="color:#ee7621"><?php echo $username?></span>
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
			    <li class="active"><a href="##">网站首页</a></li>
			    <li><a href="welcome/second">理发</a></li>
			    <li><a href="##">家教</a></li>
			    <li><a href="##">清洁</a></li>
			    <li><a href="##">美甲</a></li>
			    <li><a href="##">关于我们</a></li>
			    <li><a href="##">联系我们</a></li>
				<li><a onsubmit="return false"><?php echo $indent?></a></li>
			</ul>
		</div>
    </div>
</div>
<div id="indent">
	<ul>
		<li>
			<img src="images/logo.jpg" alt="">
			<span></span>
			<p>从事该行业两年，经验丰富，态度热情</p>
		</li>
	</ul>
	<ul>
		<li>
			<img src="" alt="">
			<span></span>
			<p></p>
		</li>
	</ul>
	<ul>
		<li>
			<img src="" alt="">
			<span></span>
			<p></p>
		</li>
	</ul>
</div>
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
				<img src="images/家电修理.jpg">
				<img src="images/logo.jpg">
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
<script src="js/jquery-1.11.3.js"></script>
	<script>
	   $(function(){
	   		var oContainer = $('#banner .wrap');
		   	var aImg = $('#imgs img');
		   	// alert(aImg);
		   	var ahead = $('#ahead');
		   	var next = $('#next');
		   	var aLi = $('#tab li');
		   	// alert(aLi);
		   	var index = 0;
		   	for(var i = 0;i<aLi.length;i++){
		   		// alert(i);
		   		aLi[i].index = i;
		   		aLi[i].onmouseover = function(){
		   			// alert(i);
		   			index = this.index;
		   			// alert(aLi.eq(index));
		   			changeImg(index);
		   		}
		   	}
		   	function changeImg(index){
		   		for(var i=0;i<aImg.length;i++){
		   	 		aImg[i].className=''; 
		   	 	}
		   	 	aLi.eq(index).addClass('li-selected').siblings().removeClass('li-selected');
		   	 	aImg[index].className = "img-selected";

		   	}
		   	next.on('click', function(){
		   		index++;
		   		if (index==aImg.length) {
		   			index = 0;
		   		};
		   		changeImg(index);
		   		
		   	})
		   	ahead.on('click', function(){
		   		index--;
		   		if (index==-1) {
		   			index=aImg.length - 1;
		   		};
		   		for(var i=0;i<aImg.length;i++){
		   	 		aImg[i].className=''; 
		   	 	}
		   	 	aImg[index].className = "img-selected";
		   	})
		   	var timer;

		function play(){
			timer=setInterval(function(){
			index++;
			if (index==aImg.length) {
				index = 0;
			};
			changeImg(index);
		},2000)
		}
		play();
		oContainer.on('mouseover', function(){
			clearInterval(timer);
			// alert(666);
		})
		oContainer.on('mouseout', function(){
			play();
		})

	   })
	</script>

</body>
</html>
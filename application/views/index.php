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
			    <li id="home" class="active"><a>网站首页</a></li>
			    <li id="hair"><a>理发</a></li>
			    <li id="teacher"><a>家教</a></li>
			    <li id="clean"><a>清洁</a></li>
			    <li id="hand"><a>美甲</a></li>
			    <li><a>关于我们</a></li>
			    <!-- <li><a>联系我们</a></li> -->
				<li><a onsubmit="return false"><?php echo $indent?></a></li>
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
	
</div>
<script src="js/jquery-1.11.3.js"></script>
	<script>

	   $(function(){

	   	// 瀑布流开始
	   	var kind = "";//标志位   加载的服务种类
	   	var $banner = '<div id="inner">'+$('#inner').html()+'</div>';//将banner的内容存储下来
	   	// console.log($banner);
	   	var $home = $('#home');
	   	var $hair = $('#hair');
	   	var $teacher = $('#teacher');
	   	var $clean = $('#clean');
	   	var $hand = $('#hand');
	   	function selected(k){
	   		k.addClass('active').siblings().removeClass('active');
	   	}
	   	var exist = 0;
	   	$home.on('click', function(){
	   		selected($home);
	   		if (exist == 0) {
	   		}else{
	   			$($banner).replaceAll('#inner');
	   			banner();
	   		}
	   	})
	   	$hair.on('click', function(){
	   		selected($hair);
	   		kind="hair";
	   		replace();
	   		exist = 1;
	   		get();
	   	})
	   	$teacher.on('click', function(){
	   		selected($teacher);
	   		kind = "teacher";
	   		replace();

	   		get();
	   	})
	   	$clean.on('click', function(){
	   		selected($clean);
	   		kind = "clean";
	   		replace();

	   		get();
	   	})
	   	$hand.on('click', function(){
	   		selected($hand);
	   		kind = "hand";
	   		replace();
	   		get();
	   	})

	   	function replace(){
		   	// $('#inner').remove();
	   		var html = '<div id="inner">'+
	   						'<div id="indent">'+
								'<div class="container">'+
									'<ul></ul>'+
									'<ul></ul>'+
									'<ul></ul>'+
								'</div>'+
							'</div>'+
						'</div>'
			$(html).replaceAll('#inner');
	   	}
	   	function get(){//ajax
		   	$.get("service"+"/get_"+kind, function(res){
				for(var i=0; i<res.length; i++){
					var row = res[i];
					var html = '<li>'+
									'<img src="images/'+row.img+'">'+
									'<div class="wrap-span">'+
									'<input type="text" style="display:none"/>'+
										'<span>姓名：'+row.name+'</span>'+
										'<span>性别：'+row.sex+'</span>'+
										'<span>'+row.price+'</span>'+
									'</div>'+
									'<p>'+row.introduction+'</p>'+
									'<button type="submit">预定</button>'+
								'</li>';
					var $minUl = getMinUl();
					$minUl.append(html);
				}
			}, 'json');
	   	}

	   	function getMinUl(){

	   		var $uls = $('#indent ul');
	   		var $minUl = $uls.eq(0);
	   		for(i=1; i<$uls.length; i++){
	   			if ($uls.eq(i).height()<$minUl.height()) {
	   				$minUl = $uls.eq(i);
	   			};
	   		}
	   		return $minUl;
	   	}
		$(window).on('load', function(){

		   	$(window).on('scroll', function(){
			   	var $minUl = getMinUl();
			   	// console.log($minUl.offset().top)
			   	if ($minUl.offset().top+$minUl.height()+40<=$(window).height()+$(window).scrollTop()) {
			   		get();
			   	};
		   			
		   	});
		})
	   	
		//瀑布流结束


		//轮播图开始
		banner();
		function banner(){

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
		}
		})
		
	</script>

</body>
</html>
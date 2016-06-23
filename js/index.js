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
	function selected(k){//控制导航栏被选中的样式
		k.addClass('active').siblings().removeClass('active');
	}
	var exist = 0;//标志位 标志是否在首页
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
									'<span>姓名：'+row.name+'</span>'+
									'<span>性别：'+row.sex+'</span>'+
									'<span>'+row.price+'</span>'+
								'</div>'+
								'<p>'+row.introduction+'</p>'+
								'<form onsubmit="return false">'+
									'<input type="text" value="'+row.img+'" name="img" style="display:none">'+
									'<input type="text" value="'+row.name+'" name="name" style="display:none">'+
									'<input type="text" value="'+row.sex+'" name="sex" style="display:none">'+
									'<input type="text" value="'+row.price+'" name="price" style="display:none">'+
									'<input type="text" value="'+kind+'"  name="kind" style="display:none">'+
									'<button>预订</button>'+
								'</form>'+
							'</li>';
				var $minUl = getMinUl();
				$minUl.append(html);
	// reserve();


			}
		}, 'json');
	}

	// 订单预订开始
	//事件代理 
	var $btn = $('body');
	$btn.on('click', 'button', function(){
		if($('#user').text()==""){
			alert("亲，您还没有登录哦！");
		}else{
			var $img = $('[name="img"]').val();
			var $name = $('[name="name"]').val();
			var $sex = $('[name="sex"]').val();
			var $price = $('[name="price"]').val();
			var $kind = $('[name="kind"]').val();
			$.post('reserve/save_indent', {img:$img, name:$name, sex:$sex, price:$price, kind:$kind}, function(req){
				if(req=="success"){
					alert("恭喜您，预定成功，我们会尽全力让您满意！");
				}
			})
		}
		
	});
	// 订单预订结束
	//我的订单开始
	var $myIndent = $('#myIndent');
	$myIndent.on('click', function(){
		selected($myIndent);
		var html = '<div id="inner">'+
						'<div id="indent">'+
								'<div class="container">'+
								'</div>'+
							'</div>'+
						'</div>'
		$(html).replaceAll('#inner');
		$.get('reserve/get_indent', function(req){
			for(var i = 0; i<req.length; i++){
				var row = req[i];
				var html = '<div id="myIndentRow">'+
								'<span>订单种类：'+row.kind+'</span>'+
								'<span><img src="images/'+row.img+'"/></span>'+
								'<span>服务者：'+row.name+'</span>'+
								'<span>'+row.sex+'</span>'+
								'<span>'+row.price+'</span>'+
						   '</div>';
				$('#inner .container').append(html);
			}
		},'json');
	})







	//我的订单结束

	function getMinUl(){//获得最短ul
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
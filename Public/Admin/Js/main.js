$(document).ready(function(){
	//初始化默认页面
	$("#mainMenu li dl").hide();
	$("#mainMenu li h2:first").addClass("current");
	$("#mainMenu li dl:first").show();//显示第一个左边菜单
	//为主导航绑定事件
	$("#mainMenu li h2").click(function(){
		$("#mainMenu li h2").removeClass("current");
		$(this).addClass("current");
		$("#mainMenu li dl").hide();
		$(this).next().fadeIn();
	})
	//消除IE左边栏虚线框
	$(".leftBar a").focus(function(){
		if (this.blur)	this.blur();
	})	
	//调整页面高度宽度
	function autoHeightWidth(){
		var newHeight = $(window).height() - $("#mainMenu").height() - $("#path").height() -20;
		$("#mainPage").height(newHeight);
		var newWidth = $("#path").width();
		$("#mainPage").width(newWidth);
	}	
	autoHeightWidth();
	$(window).resize(function(){
		autoHeightWidth();
	})
	//鼠标悬停改变背景色
	$.fn.hoverTr=function(){
		$(this).find("tr").hover(function(){
			$(this).css("background-color","#efefef");
		},function(){
			$(this).css("background-color","#fff");
		})
	}	
	//按钮点击样式变化
	$.fn.buttonHover=function(){
		$(this).mouseover(function(){
		$(this).addClass("button_hover");
		}).mouseout(function(){
			$(this).removeClass('button_hover');
	});
	}
	
	//iframe
	$(".button input").buttonHover();
	$(".input-text").each(function(){
		$(this).focus(function(){
			$(this).next("span.onShow").text($(this).next("span.onShow").attr('placehoder'));
		}).blur(function(){
			var val=$(this).val();
			if(val.slice(-1)=='/')
				$(this).next("span.onShow").text('输入正确');
		})
	});					
	$("table.tableList").hoverTr();
	/*table hover*/
	//node is the node of the table   (Javascript DOM node)
	function changeTableTr (node){
		var table=node.getElementsByTagName("tr");
		for(var i=1;i<table.length;i++)
		$(table[i]).hover(function(){
			$(this).css("background","#eee");
		},function(){
			$(this).css("background","none");
		});
	}
	var category_edit;
	if(category_edit=document.getElementById("categoryList")){
		category_edit=category_edit.getElementsByTagName("table")[0];
		changeTableTr(category_edit);
	}			
	/* button */
	/*node is a Jquery object node*/
	function changeButton(node){
		node.hover(function(){
			$(this).addClass("button_hover");
		},function(){
			$(this).removeClass("button_hover");
		});
	}			
	var button1=document.getElementsByTagName("button");
	for(var i=0;i<button1.length;i++)
	{
		changeButton($(button1[i]));
	}
	changeButton($(".categorySubmit"));	
})

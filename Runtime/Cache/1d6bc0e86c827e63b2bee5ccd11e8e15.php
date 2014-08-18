<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>首页_tweibo</title><link href="<?php echo PUBLIC_PATH; ?>/header.css" type="text/css" rel="stylesheet" id="mainStyle"/><script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js" type="text/javascript"></script><script src="<?php echo PUBLIC_PATH; ?>/scrolltopcontrol.js" type="text/javascript"></script><style type="text/css" id="curTheme" skinId="2737">
            body{background:#410e01 url(http://localhost/tweibo1.0beta/Public/images/header/wrapBg.jpg) center top no-repeat}
        </style><script type="text/javascript">
            $(function() {
                $("textarea").keyup();
                $(".topt").attr("class", "topt");
                $("#<?php echo ($changetop); ?>").attr("class", "topt select"); 
                //获得鼠标焦点，是搜索栏提示消失  
                $("#searchKey").focus(function(){
                    $("#searchWords").html("");
                });
                //失去鼠标焦点若搜索栏为空，则显示提示字
                $("#searchKey").blur(function(){
                    if($("#searchKey").val() == ""){
                        $("#searchWords").html("百度一下，你就知道");
                    }
                });
            });
            //点击搜索时按关键字跳转百度页   
            function openBaidu(){
                var searchWord = document.getElementById("searchKey").value;
                open("http://www.baidu.com/s?wd="+searchWord+"&rsv_spt=1&issp=1&rsv_bp=0&ie=utf-8&tn=baiduhome_pg&rsv_sug3=1&rsv_sug=0&rsv_sug1=1&rsv_sug4=156&inputT=7642");             
            }
	    //提示信息显示
	    function showTipsMsg(msg){
		$("#tipsMsg").text(msg);
		$("#tipsMsg").fadeIn("slow");
		setTimeout("$('#tipsMsg').fadeOut('slow');",4000);
	    }
        </script></head><body><a name="top" id="top"></a><style type="text/css">.main{min-height:900px}</style><div class="w_head_outer"><div class="headWrap"><div class="headInside" id="header"><h1></h1><ul class="topNav" id="topNav" role="navigation"><li class="topNavItem"><a href="<?php echo U('Home/index');?>" class="topt select" id="tophome"><u>首页</u><i></i></a></li><li class="topNavItem"><a href="<?php echo U('TimeLine/index');?>" class="topt" id="toptimeLine"><u>时间轴<sup class="ico_hot_mini"></sup></u><i></i></a></li><li class="topNavItem"><a href="<?php echo U('Interact/index');?>" class="topt" id="topinteract"><u>互动</u><i></i></a></li><li class="topNavItem groups"><a href="<?php echo U('ContorlMember/index');?>" class="topt" id="topcontorlMember"><u>我的账号管理</u><i></i></a></li><li class="topNavItem apps"><a href="javascript:void(0)" class="topt"><u>应用<em>&nbsp;</em></u><i></i></a><!--			    <ul class="viewApps"><li>微频道</li><li>其他</li></ul>--></li></ul><ul class="topNav right qk_nav" id="newMsgBox"><!--                        <li class="topNavItem qk_nav_item at"><a href="" name="at" title="提到我的"  ><span class="t"  >@提到我的</span><i></i><sub class="ui_tx_count" style="display:none"></sub></a></li>--><li class="topNavItem qk_nav_item message"><a href="javascript:void(0)" name="msg" title="私信" ><span class="t">私信</span><i></i><sub class="ui_tx_count" style="display:none"></sub></a></li><li class="topNavItem qk_nav_item fans"><a href="<?php echo U('Interact/index');?>" name="fans" title="听众" ><span class="t">听众</span><i></i><sub class="ui_tx_count" style="display:none"></sub></a></li><li class="topNavItem qk_nav_item notice"><a href="javascript:void(0)" name="notice" title="通知" ><span class="t">通知</span><i></i><sub class="ui_tx_count" style="display:none"></sub></a></li><li class="topNavItem accountItem" id="topNav1"><a href="javascript:void(0)" class="txt" title="<?php echo ($user['nickname']); ?>(@<?php echo ($user['username']); ?>)"><u><?php echo ($user['nickname']); ?><em>&nbsp;</em></u><i></i></a><ul class="topNavSub" style="display:none"><!--                                <li><a href="">设置</a></li><li><a href="" id="setTheme" title="皮肤设置" >换肤</a></li>--><li><a title="增加授权用户" href="<?php echo U('ContorlMember/index');?>">新增授权</a></li><li><a href="<?php echo U('Index/logout');?>">退出</a></li></ul></li></ul><div class="tSearchNew" role="search"><form id="searchForm" method="get" action=""><label id="searchWords" for="searchKey">百度一下，你就知道</label><input type="text" id="searchKey" maxlength="50" name="k" class="inputTxtNew"/><input type="submit" class="inputBtn" value="搜索" onclick="openBaidu()"/><a href="" class="btn_ldrop" ><em></em></a></form></div></div><div class="headShadow"></div></div></div><div class="tipsMsg" id="tipsMsg" style="display:none"></div><link href="<?php echo CSS_PATH; ?>/timeLine.css" rel="stylesheet" type="text/css" /><link rel="stylesheet" type="text/css" href="<?php echo CSS_PATH; ?>/linestyle.css" /><div id="timeLineWrap"><div id="timeLineWrapper" class="clear"><div class="topWrapper"><div class="delBtnWrap"><input type="button" id="showDelChose" value="批量删除"></div></div><div class="delChose" id="delChose" style="display: none;"><span>确定删除所选广播？</span><br><label class="gb_btn gb_btn1"><input type="button" id="abatchDelBtn" value="确定" class="t"></label><label class="gb_btn gb_btn5"><input type="button" id="hiddenDelChose" value="取消" class="t"></label></div><div class="timeLineMain"><section class="timeLinemain"><ul class="timeline"></ul><div id='showMore' class="showMore"><img src="<?php echo IMAGES_PATH; ?>/home/more.gif" /><div class="moreWords">正在加载。。</div></div></section></div><!-- /container --><div style="text-align:center;clear:both"></div></div></div><script src="<?php echo JS_PATH; ?>/modernizr.custom.63321.js"></script><script>
    $(function() {
	var startId = 0;
	loadBlogs();
	function loadBlogs() {
	    $.get("<?php echo U('TimeLine/moreTimeLine');?>?startId=" + startId + "&t=" + new Date().getTime(), function(json) {
		var blogs = eval("(" + json + ")");
		var blog = "";
		if (blogs == null) {
		    $('.moreWords').html('没有更多微博');
		}
		var l = blogs.length;
		startId = startId + l;
		for (var i = 0; i < l; i++) {
		    blog += "<li class='event'>\
			<input type='radio' name='tl-group'/>\
			<label></label>\
			<div class='thumb' style='background-image: url(" + blogs[i]['head'] + ");'><span></span></div>\
			<div class='content-perspective'>\
			    <div class='content'>\
				<div class='content-inner'>\
				    <h5>" + blogs[i]['nick'] + "<input type='checkbox' name='selectedDelBlogs' class='selectedDelBlogs' value='" + blogs[i]['openid'] + "&" + blogs[i]['id'] + "&" + blogs[i]['blog_type'] + "'>";
				if (blogs[i]['blog_type'] == 'tencent') {
				    blog += "<div class='bicon' style='background-image: url(http://localhost/tweibo1.0beta/Public/images/timeline/tencenticon32.png);'></div>";
				}
				blog += "<div class='btime'>" + blogs[i]['time'] + "</div></h5>\
				    <p>" + blogs[i]['text'] + "</br>";
				if (blogs[i]['bigimage'] != "/460") {
				    blog += "<img class='smileimg' src=" + blogs[i]['bigimage'] + " style='display: inline;max-width:460px'>";
				}
				blog += "  </p>\
				</div>\
			    </div>\
			</div>\
		    </li>";
		}
		$(".timeline").append(blog);
	    });
	}
	var top = 0;
	$(window).bind("scroll", function() {
	    $('.timeline').each(function() {
		var fold = $(window).height() + $(window).scrollTop();
		if ($(window).scrollTop() > top + 200) {
		    if (fold >= $('#showMore').offset().top + 50)
		    {
			top = $(window).scrollTop();
			loadBlogs();
		    }
		}
	    });
	});
	//显示确认删除选项
	$("#showDelChose").click(function(){
	    var test =  $("input[name='selectedDelBlogs']");
	    var flag = true;
	    for (var i = 0; i < test.length ; i ++ )
	    {
		if(test[i].checked ){
		    flag = false;
		    $("#delChose").css("display", "block");
		    break;
		}
	    }
	    if(flag){
		showTipsMsg("点你妹啊，没选你丫点啥！");
	    } 
	});
	$("#hiddenDelChose").click(function(){
	    $("#delChose").css("display", "none");
	});
	//ajax批量删除微博
	$("#abatchDelBtn").bind("click", function() {
	    var blogs = [];
	    $("input[name='selectedDelBlogs']:checked").each(function() {
		blogs.push($(this).val());
	    });
	    $.ajax({
		type: 'POST',
		url: "<?php echo U('TimeLine/abatchDelBlogs');?>",
		data: {"selectSyn": blogs,"t":new Date().getTime()},
		dataType: 'text',
		success: function(result) {
		    $("#delChose").css("display", "none");
		    if (result !== "") {
			showTipsMsg("出错啦：" + result);
		    }
		    $(".timeline").html("");
		    startId = 0;
		    loadBlogs();
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) {
		    $("#delChose").css("display", "none");
		    showTipsMsg("无法连接服务器");
		}
	    });
	});
    });

</script></body></html>
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
        </script></head><body><a name="top" id="top"></a><style type="text/css">.main{min-height:900px}</style><div class="w_head_outer"><div class="headWrap"><div class="headInside" id="header"><h1></h1><ul class="topNav" id="topNav" role="navigation"><li class="topNavItem"><a href="<?php echo U('Home/index');?>" class="topt select" id="tophome"><u>首页</u><i></i></a></li><li class="topNavItem"><a href="<?php echo U('TimeLine/index');?>" class="topt" id="toptimeLine"><u>时间轴<sup class="ico_hot_mini"></sup></u><i></i></a></li><li class="topNavItem"><a href="<?php echo U('Interact/index');?>" class="topt" id="topinteract"><u>互动</u><i></i></a></li><li class="topNavItem groups"><a href="<?php echo U('ContorlMember/index');?>" class="topt" id="topcontorlMember"><u>我的账号管理</u><i></i></a></li><li class="topNavItem apps"><a href="javascript:void(0)" class="topt"><u>应用<em>&nbsp;</em></u><i></i></a><!--			    <ul class="viewApps"><li>微频道</li><li>其他</li></ul>--></li></ul><ul class="topNav right qk_nav" id="newMsgBox"><!--                        <li class="topNavItem qk_nav_item at"><a href="" name="at" title="提到我的"  ><span class="t"  >@提到我的</span><i></i><sub class="ui_tx_count" style="display:none"></sub></a></li>--><li class="topNavItem qk_nav_item message"><a href="javascript:void(0)" name="msg" title="私信" ><span class="t">私信</span><i></i><sub class="ui_tx_count" style="display:none"></sub></a></li><li class="topNavItem qk_nav_item fans"><a href="<?php echo U('Interact/index');?>" name="fans" title="听众" ><span class="t">听众</span><i></i><sub class="ui_tx_count" style="display:none"></sub></a></li><li class="topNavItem qk_nav_item notice"><a href="javascript:void(0)" name="notice" title="通知" ><span class="t">通知</span><i></i><sub class="ui_tx_count" style="display:none"></sub></a></li><li class="topNavItem accountItem" id="topNav1"><a href="javascript:void(0)" class="txt" title="<?php echo ($user['nickname']); ?>(@<?php echo ($user['username']); ?>)"><u><?php echo ($user['nickname']); ?><em>&nbsp;</em></u><i></i></a><ul class="topNavSub" style="display:none"><!--                                <li><a href="">设置</a></li><li><a href="" id="setTheme" title="皮肤设置" >换肤</a></li>--><li><a title="增加授权用户" href="<?php echo U('ContorlMember/index');?>">新增授权</a></li><li><a href="<?php echo U('Index/logout');?>">退出</a></li></ul></li></ul><div class="tSearchNew" role="search"><form id="searchForm" method="get" action=""><label id="searchWords" for="searchKey">百度一下，你就知道</label><input type="text" id="searchKey" maxlength="50" name="k" class="inputTxtNew"/><input type="submit" class="inputBtn" value="搜索" onclick="openBaidu()"/><a href="" class="btn_ldrop" ><em></em></a></form></div></div><div class="headShadow"></div></div></div><div class="tipsMsg" id="tipsMsg" style="display:none"></div><script type="text/javascript">
    var unit = '<?php echo ($unit); ?>',nowmember = '<?php echo ($nowmember); ?>';
</script><style type="text/css">
    /*    用户列表手风琴样式*/
    .sliderbox {
        width: 319px;
        margin: 0 auto;
        overflow: hidden;
        border-bottom: white solid 1px;
    }
    .sliderbox dt {
        height: 32px;
        cursor: pointer;
        border-top: white solid 1px;
        overflow: hidden;
    }

    .prompt{
        position: fixed;
        top: 40%;
        left: 50%;
        margin-left: -110px;
        width: 170px;
        z-index: 999;
        background-color: white;
        border: 7px solid #7bd6f6;
        display: none;
        border-radius: 5px;
        text-align: center;
        font-size: 23px;
        color: #f8c24f;
        font-weight: 800;
    }
</style><div id="prompt" class="prompt"></div><div id="topWrap"><div id="mainWrapper" class="clear"><div class="main" role="main"><div id="talkBox" class="talkBox"><h2><em><label>亲，没事说两句！</label></em><span class="countTxt" id="checklen">还能输入<em style=" float: none;">140</em>字</span></h2><div id="sendCnt" class="sendCnt"><div class="cntBox"><textarea id="msgTxt" accesskey="u" name="content" tabindex="1"></textarea></div></div><div class="sendFun"><div class="insertFun"><div class="sendList insertFace"><a class="txt" href="javascript:void(0)" title="表情" tabindex="3" id="sendFace"><em class="sico ico_face"></em>表情</a><!--发表微博使用表情--><div class="faceWrap" id="faceWrap1" style="display:none"></div></div><div class="sendList uploadPic"><a href="#" class="txt sendPic" tabindex="3" title="支持单图、多图、截屏、长文转图、搜图等"><em class="sico ico_pic"></em>图片
				<form id="picUploadFrom" action="<?php echo U('Home/showPic');?>" method="post" enctype="multipart/form-data" target="upframe"><input type="file" name="attach" id="selectPicBtn" onchange="c(this);"  hidefocus="true"/><!--<input type="text" name="picMemberId" value="<?php echo ($nowmember); ?>" />--></form><iframe id="upframe" name="upframe" src="" style="display:none;"></iframe></a></div><!--                            <div class="sendList uploadMusic"><a class="txt" href="#" title="可按歌名、歌手名搜索并添加音乐" tabindex="3"><em class="sico ico_audio"></em>音乐</a></div>--><div class="sendList newTopic"><a href="#" class="creatNew txt" title="汇聚相同热点的广播" tabindex="3" id="faverTalk"><em class="sico ico_topic"></em>话题</a></div><div class="sendList schBrace keyWords"><a class="txt" title="分享你的兴趣、关注点" href="#" tabindex="3" id="setKeyWord"><em class="sico ic_keyword"></em>关键词</a></div></div><input type="button" class="sendBtn btnHasStr" id="publish_handle" value=""/><div class="sync"><div class="showSyncList" id="showSyncList"><u>同步<em>&nbsp;</em></u></div><ul class="syncList" style="display: none;" id="syncList"><?php if(is_array($member)): $i = 0; $__LIST__ = $member;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$selectmember): $mod = ($i % 2 );++$i; if(($selectmember["data"]["openid"]) != $nowmember): ?><li><u title="<?php echo ($selectmember["data"]["nick"]); ?>@<?php echo ($selectmember["data"]["name"]); ?>"><?php echo ($selectmember["data"]["nick"]); ?></u><input type="checkBox" class="synBox" name="selectSyn[]" value="<?php echo ($selectmember["data"]["openid"]); ?>&<?php echo ($selectmember["data"]["nick"]); ?>&<?php echo ($selectmember["data"]["blogtype"]); ?>&<?php echo ($selectmember["data"]["head"]); ?>"/></li><?php endif; if(($selectmember["data"]["openid"]) == $nowmember): ?><li style="display:none"><input type="checkBox" class="synBox" checked="true" value="<?php echo ($selectmember["data"]["openid"]); ?>&<?php echo ($selectmember["data"]["nick"]); ?>&<?php echo ($selectmember["data"]["blogtype"]); ?>&<?php echo ($selectmember["data"]["head"]); ?>" name="selectSyn[]"/></li><?php endif; endforeach; endif; else: echo "" ;endif; ?></ul></div></div><div class="PromptPicUpload" id="PromptPicUpload"  style="display:none">图片正在上传中....</div><div class="picListWrap" id="picListWrap" style="display:none;"><ul class="picList"></ul></div></div><div id="pane-wrap"><div id="pane-node-home" class="pane-node-home pane-node-home-original"><div class="AL"><div class="ui-tab"><ul class="ui_tab_lst" id="ui_tab_lst"><li id="home_all_top" class="unit"><a href="<?php echo U('Home/viweBlogs?unit=home&memberId='.$nowmember.'');?>" class="t select" id="home" pane-rel="" pane="home"><span class="text">全部广播</span></a></li><li id="home_specil_top" class="unit"><a href="<?php echo U('Home/viweBlogs?unit=special&memberId='.$nowmember.'');?>" class="t" id="special"  pane-rel="" pane="special"><span class="text">特别收听</span></a></li><li id="home_at_top" class="unit"><a href="<?php echo U('Home/viweBlogs?unit=at&memberId='.$nowmember.'');?>" class="t" id="at"  pane-rel="" pane="at"><span class="text">提到我的</span></a></li></ul></div><ul id="talkList" class="LC"></ul><div id='showMore' class="showMore"><img src="<?php echo IMAGES_PATH; ?>/home/more.gif" /><div class="moreWords" id="moreWords">正在加载。。</div></div></div></div></div></div><!--用户名片--><div id="otherInfoWrap" style="display: none;left: 50px;" class="uc cType1 uc_hand_up"><div class="uc_in clear"><div class="uc_loading"><i class="loading"></i>资料卡加载中...</div><div id="otherInfoCard"></div></div></div><!--                        导入话题/关键字设置js--><script src="<?php echo JS_PATH; ?>/textareaInsertTopic.js" type="text/javascript"></script><div class="side" role="complementary"><div class="authList"><div class="authNum">总授权用户数：<em><?php echo ($memberCount); ?></em></div><!--<div class="nowAuth">当前选中用户：<em><?php echo ($nowmember); ?></em></div>--></div><div id="col"><dl class="sliderbox" id="slider2"><?php if(is_array($member)): $i = 0; $__LIST__ = $member;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$member): $mod = ($i % 2 );++$i;?><dt id="dt<?php echo ($member["data"]["openid"]); ?>"><div class="pointmember"><img id="dtimg<?php echo ($member["data"]["openid"]); ?>" class="choiceDt" src="<?php echo IMAGES_PATH; ?>/home/mojian.png"></div><h3 class="tit"><span><?php echo ($member["data"]["nick"]); ?></span></h3><div class="memberLogo"><?php if(($member["data"]["blogtype"]) == "tencent"): ?><img src="<?php echo IMAGES_PATH; ?>/header/logo_Tencent.png"/><?php endif; ?></div></dt><dd id="dd<?php echo ($member["data"]["openid"]); ?>"><div class="sc_profile_w"><div class="m_profile m_profile_h clear"><div class="c1 clear"><div class="lc"><a title="去我的页面瞧瞧" target="_blank" href="http://t.qq.com/<?php echo ($member["data"]["name"]); ?>?preview" class="avatar"><img src=<?php echo ($member["data"]["headurl"]); ?>></a></div><div class="rc"><div class="mood_info"><p class="null">今天心情怎么样？</p><p class="opt"><a href="javascript:void(0)">现在写</a></p></div><div class="isChoice"><div class="choiceM"><a href="<?php echo U('Home/viweBlogs',array('memberId'=>$member['data']['openid']));?>" id="<?php echo ($member["data"]["openid"]); ?>" title="选择此用户" onclick="showid('loading')"/><img id="cImg<?php echo ($member["data"]["openid"]); ?>" class="choiceImg" src="<?php echo IMAGES_PATH; ?>/home/quxiaoxuanze.GIF"/><img class="choiceImg" src="<?php echo IMAGES_PATH; ?>/home/xuanze.GIF"/></a></div><div class="choiceTet">
                                                    点击图片</br>选择用户
                                                </div></div></div></div><div class="c2 clear"><ul class="list clear  "><li class="list_item item_prose"><a href="http://t.qq.com/<?php echo ($member["data"]["name"]); ?>/mine" target="_blank" class="stat" ><span class="text_count"><?php echo ($member["data"]["tweetnum"]); ?></span><span class="text_atr">广播</span></a><b class="mo_bg foFun"></b></li><li class="line_bor"><b class="foFun"></b></li><li class="list_item item_favorite"><a href="http://t.qq.com/<?php echo ($member["data"]["name"]); ?>/favor" target="_blank" class="stat" ><span class="text_count"><?php echo ($member["data"]["favnum"]); ?></span><span class="text_atr">收藏</span></a><b class="mo_bg foFun"></b></li><li class="line_bor"><b class="foFun"></b></li><li class="list_item item_follow"><a href="http://t.qq.com/<?php echo ($member["data"]["name"]); ?>/following" target="_blank" class="stat" ><span class="text_count"><?php echo ($member["data"]["fansnum"]); ?></span><span class="text_atr">收听</span></a><b class="mo_bg foFun"></b></li><li class="line_bor"><b class="foFun"></b></li><li class="list_item item_fans"><a href="http://t.qq.com/<?php echo ($member["data"]["name"]); ?>/follower" target="_blank" class="stat" ><span class="text_count"><?php echo ($member["data"]["idolnum"]); ?></span><span class="text_atr">听众</span></a><b class="mo_bg foFun"></b></li></ul><span class="c2_bg foFun bgr6"></span></div></div></div></dd><?php endforeach; endif; else: echo "" ;endif; ?></dl><script src="<?php echo JS_PATH; ?>/slide.js" type="text/javascript"></script><script type="text/javascript">
                    var slider2=new accordion.slider("slider2");
                    slider2.init("slider2",0,"open");
                </script></div></div></div></div><div id="loading" class="" style="position: absolute;display: none;"><div><img style="" src="<?php echo IMAGES_PATH; ?>/home/loading.jpg"></img></div></div><script type="text/javascript">
$(function() {
    $("textarea").keyup();
    $(".t").attr("class", "t");
    $("#<?php echo ($unit); ?>").attr("class", "t select");
    $(".choiceImg").attr("class", "choiceImg");
    $("#cImg<?php echo ($nowmember); ?>").attr("class", "choiceImg noChoiceImg");
    $(".choiceDt").attr("class", "choiceDt noChoiceDt");
    $("#dtimg<?php echo ($nowmember); ?>").attr("class", "choiceDt");
    //手风琴控制脚本
    $(".sliderbox dt").attr("class", "");
    $("#dt<?php echo ($nowmember); ?>").attr("class", "open");
    $(".sliderbox dd").attr("style", "height: 0px; opacity: 0.008; display: none;");
    $("#dd<?php echo ($nowmember); ?>").attr("style", "height: 142px;opacity: 1;");
    //广播输入框获得焦点时使边框泛蓝
    $("#msgTxt").focus(function() {
        $("#sendCnt").addClass("focus");
    });
    //广播输入框失去焦点时，泛蓝恢复
    $("#msgTxt").blur(function() {
        $("#sendCnt").removeClass("focus");
    });
    //点击广播旁同步按钮，时同步列表显示
    $("#showSyncList").click(function() {
        if ($("#syncList").css('display') == "none") {
            $("#syncList").show();
        } else {
            $("#syncList").hide();
        }
    });
    //删除图片
    $(document).on("click",".delThisPic",function(){
	$(this).parent().parent().remove();
	if($("#picListWrap ul").children('li').length == 0){
	    $("#picListWrap").hide();
	}
    });
    //鼠标移除隐藏名片框
    $(document).on("mouseout","#talkList .userPic",function(){
	$("#otherInfoWrap").hide();
    });
    //为发表微博文字输入框绑定事件
    $("#msgTxt").on({
	focus: function(){
	    strLenCalc($(this), 'checklen', 280);
	},
	blur: function(){
	    strLenCalc($(this), 'checklen', 280);
	},
	keyup: function(){
	    strLenCalc($(this), 'checklen', 280);
	}
    });
    //发表微博表情按钮绑定事件
    $("#sendFace").on("click",function(){
	showEmotionWrap('faceWrap1','msgTxt');
    });
    //发表微博话题关键字绑定事件
    $("#faverTalk").on("click",function(){
	setTopic('msgTxt');
    });
    $("#setKeyWord").on("click",function(){
	setKeyWord('msgTxt');
    });

    //加载更多微博jquery+ajax实现
    var timestamp = 0;
    loadWeibo();
    function loadWeibo() {
        $.get("<?php echo U('Home/moreBlogs');?>?unit=<?php echo ($unit); ?>&timestamp=" + timestamp + "&memberId=<?php echo ($nowmember); ?>" + "&t=" + new Date().getTime(), function(json) {
         if(json == "error"){
		    showTipMsg(json);
	    }else{	    
    		var r = eval("(" + json + ")");
		if (r['msg'] == 'have no tweet') {
		    $('#moreWords').html('没有更多微博');
		}else{
    		    var l = r.length;
    		    timestamp = r[l - 1]['timestamp'];
    		    $("#talkList").append(structBlogs(r));
		}
	    }
        });
    }
    var top = 0;
    $(window).bind("scroll", function() {
        $('#talkList').each(function() {
            var fold = $(window).height() + $(window).scrollTop();
            if ($(window).scrollTop() > top + 200) {
                if (fold >= $('#showMore').offset().top + $('#talkList').height())
                {
                    top = $(window).scrollTop();
                    loadWeibo();
                }
            }
        });
    });

});

//添加微博
function structBlogs(r){
    var blog = "";
    var l = r.length;
    for (var i = 0; i < l; i++) {
	blog += "<li id=" + r[i]['id'] + " from='1'>\
			  <div class='userPic' onMouseOver=\"showOtherInfo('"+r[i]['openid']+"',$(this))\"><a href=" + r[i]['blogAdd'] + "  target='_blank'  tabindex='-1'><img src=" + r[i]['head'] + "></a></div>\
		       <div class='msgBox'>\
			   <div class='userName' rel=" + r[i]['nick'] + ">\
			      <strong><a href=" + r[i]['blogAdd'] + "  target='_blank'>" + r[i]['nick'] + "</a>";
	if (r[i]['isvip'] == 1) {
	    blog += "<a  title='腾讯机构认证' target='_blank' class='tIcon ico_cvip'></a>";
	}
	blog += ":</strong>&nbsp;\
			  </div>\
		       <div class='msgCnt' >" + r[i]['text'] + "</div>";
	if (r[i]['source'] != null) {
	    blog += "<div class='replyBox bgr2'>\
		    <div class='msgBox'>\
		    <div class='msgCnt'>\
		    <strong>\
		    <a target='_blank' href=" + r[i]['source']['blogAdd'] + " >" + r[i]['source']['nick'] + "</a>";
	    if (r[i]['source']['isvip'] == 1) {
		blog += "<a  title='腾讯机构认证' target='_blank' class='tIcon ico_cvip'></a>";
	    }
	    blog += ":</strong>\
		    <div>" + r[i]['source']['text'] + "</div>\
		    </div>";
	    if (r[i]['source']['image'] != '/160') {
		blog += "<div class='mediaWrap'>\
		    <div class='picBox  ico_gif_pn' style=''>\
		    <a href='javascript:void(0)' title='查看大图' class='pic' onclick=\"viewBig(this)\">\
		    <img class='smileimg' src=" + r[i]['source']['image'] + " style='display: inline;'><img class='bigimg' src=" + r[i]['source']['bigimage'] + " style='display: none;'></a>\
		    <a href=" + r[i]['source']['orimage'] + " class='orimg' target='_blank' style='display:none'>查看原图</a>\
		    </div>\
		    </div>";
	    }

	    blog += "<div class='pubInfo c_tx5'>\
		    <span class='left c_tx'>\
		    <a class='time c_tx3' >" + r[i]['source']['time'] + "<i class='l'></i></a>\
		    <a href='' class='zfNum' target='_blank'>全部转播和评论(<b class='zfNum'>" + (r[i]['source']['count'] + r[i]['source']['mcount']) + "</b>)\
		    </a>\
		    </span>\
		    </div>\
		    </div>\
		    </div>";
	}
	if (r[i]['image'] != '/160') {
	    blog += "<div class='mediaWrap'>\
			    <div id ='picBox' class='picBox'>\
			      <a href='javascript:void(0)' title='查看大图' class='pic' onclick=\"viewBig(this)\">\
				    <img class='smileimg' src=" + r[i]['image'] + " style='display: inline;'><img class='bigimg' src=" + r[i]['bigimage'] + " style='display: none;'></a>\
				    <a href=" + r[i]['orimage'] + " target='_blank' class='orimg' style='display:none'>查看原图</a>\
			   </div>\
			  </div>";
	}
	blog += "<div class='pubInfo'>\
			<span class='left'>\
			    <span class='time'>" + r[i]['time'] + "</span>\
			    <span class='cNote'>转播(" + r[i]['count'] + ")</span>\
			    <a class='zfNum' >评论(<b class='relayNum'>" + r[i]['mcount'] + "</b>)</a>\
			</span>\
			<div class='funBox'>\
			    <a href='javascript:void(0)' class='int_like' title='标记我喜欢'><i class='ic ico_likeb'></i><i class='like_plus'>+1</i></a>\
			    <span>|</span>\
			    <a href='javascript:void(0)' onclick=\"zfBtn('" + r[i]['id'] + "')\" class='relay'>转播</a>\
			    <span>|</span>\
			    <a onclick=\"talkBtn('" + r[i]['id'] + "');\" href='javascript:void(0)' class='comt'>评论</a>\
			    <span>|</span>\
			    <div class='mFun' id='mFun' onmouseover='showmFun(this)' onmouseout='dismFun(this)'>\
				<a>更多<em class='btn_ldrop'></em></a>\
				<div class='mFunDrop'>\
				    <b></b>\
				    <b class='mask'></b>\
				    <p><a href='javascript:void(0)' class='reply'>对话</a></p>";
				    if(r[i]['self'] == 1){
					blog += "<p><a href='javascript:void(0)' onclick=\"viewDelChose('" + r[i]['id'] + "')\">删除</a></p>";
				    }else{
					blog += "<p><a href='javascript:void(0)' onclick=\"favweibo('" + r[i]['id'] + "',$(this))\" class='fav'>收藏</a></p>";
				    }
			    blog += "<div class='shareBtn'>\
					<p><a href='javascript:void(0)'>分享</a></p>\
				    </div>\
				    <p><a href='http://t.qq.com/p/t/" + r[i]['id'] + "' class='detail' target='_blank'>详情</a></p>\
				</div>\
			    </div>\
			</div>\
		    </div>";
	if(r[i]['self'] == 1){
	blog +=  "<div class='delChose' id='delChose"+r[i]['id']+"' style='display:none'><span>确定删除这条广播？</span><br><label class='gb_btn gb_btn1'><input type='button' onclick=\"delweibo('" + r[i]['id'] + "')\" value='确定' class='t'></label><label class='gb_btn gb_btn5'><input type='button' value='取消' onclick=\"hiddenDelChose('"+r[i]['id']+"')\" class='t'></label></div>";
	}
	   blog += "<div class='talkWrap comtWrap bgr3' id='talkWrap" + r[i]['id'] + "' style='overflow:visible;display: none'></div>\
		    <div class='zfWrap bgr3' id='zfWrap" + r[i]['id'] + "' style='overflow:visible;display: none'></div>\
		 </div>\
	    </li>";
    }
    return blog;
}

//生成评论窗口
function createTalk(blogId) {
    if ($('#talkWrap' + blogId).html() == "") {
        var talkWrap = "<div class='top c_tx5'>\
                                <span class='left'>\
                                    <span class='number cNote'>评论原文</span>\
                                </span>\
                                <a onclick=\"showWrap('talkWrap" + blogId + "')\" class='close' title='关闭'>关闭</a>\
                            </div>\
                            <div class='cont'>\
                                <textarea class='inputTxt' name='comtBox" + blogId + "' id='talkWrapcomtBox" + blogId + "'  onfocus=\"strLenZFandPL($(this), 'talkWrapcountTxt" + blogId + "', 280,'PLBtn');\" onblur=\"strLenZFandPL($(this), 'talkWrapcountTxt" + blogId + "', 280,'PLBtn');\"  onkeyup=\"strLenZFandPL($(this), 'talkWrapcountTxt" + blogId + "', 280,'PLBtn');\"  style='overflow-y: hidden; height: 37px;' padding='10'></textarea>\
                            </div>\
                            <div class='bot'>\
                                <div class='insertFun'>\
                                    <div class='sendList insertFace'>\
                                        <a href='javascript:void(0)'  class='txt' title='表情' onclick=\"showEmotionWrap('faceWrap" + blogId + "','talkWrapcomtBox" + blogId + "')\">\
                                            <em class='sico ico_face'></em>表情</a>\
                                        <div class='faceWrap' id='faceWrap" + blogId + "' style='display:none'></div>\
                                    </div>\
                                    <div class='sendList newTopic'>\
                                        <a href='javascript:void(0)' class='creatNew txt'  onclick=\"setTopic('talkWrapcomtBox" + blogId + "')\"  title='汇聚相同热点的广播'>\
                                            <em class='sico ico_topic'></em>话题</a>\
                                    </div>\
                                    <div class='sendList keyWords schBrace'>\
                                        <a class='txt' title='分享你的兴趣、关注点'  onclick=\"setKeyWord('talkWrapcomtBox" + blogId + "')\"  href='javascript:void(0)'>\
                                            <em class='sico ic_keyword'></em>关键词</a>\
                                    </div>\
                                </div>\
                                <input type='button' class='inputBtn sendBtn' id='PLBtn' onclick=\"comment('talk','" + blogId + "')\" value='评论' title='评论'>\
                                <span class='countTxt c_tx5' id='talkWrapcountTxt" + blogId + "'>还能输入<em>140</em>字</span>\
                            </div>\
                            <div class='relayList' style='display:block;border-top: 1px solid #DEE3E3;'>\
                                <div class='clear' id ='relayDiv" + blogId + "'>\
                                    <!--                                                    ajax生成评论列表-->\
                                </div>\
                            </div>";
        $('#talkWrap' + blogId).html(talkWrap);
    }
}

//生成转发窗口
function createzf(blogId) {
    if ($('#zfWrap' + blogId).html() == "") {
        var zfWrap = "<div class='top c_tx5'>\
                                <span class='left'>\
                                    <span class='number cNote'>转播原文，顺便说两句：</span>\
                                </span>\
                                <a onclick=\"showWrap('zfWrap" + blogId + "')\" class='close' title='关闭'>关闭</a>\
                            </div>\
                            <div class='cont'>\
                                <textarea class='inputTxt' name='comtBox" + blogId + "' id='zfWrapcomtBox" + blogId + "'  onfocus=\"strLenZFandPL($(this), 'zfWrapcountTxt" + blogId + "', 280,'ZFBtn');\" onblur=\"strLenZFandPL($(this), 'zfWrapcountTxt" + blogId + "', 280,'ZFBtn');\"  onkeyup=\"strLenZFandPL($(this), 'zfWrapcountTxt" + blogId + "', 280,'ZFBtn');\"  style='overflow-y: hidden; height: 37px;' padding='10'></textarea>\
                            </div>\
                            <div class='bot'>\
                                <div class='insertFun'>\
                                    <div class='sendList insertFace'>\
                                        <a  href='javascript:void(0)' class='txt' title='表情' onclick=\"showEmotionWrap('ifaceWrap" + blogId + "','zfWrapcomtBox" + blogId + "')\">\
                                            <em class='sico ico_face'></em>表情</a>\
                                        <div class='faceWrap' id='ifaceWrap" + blogId + "' style='display:none'></div>\
                                    </div>\
                                    <div class='sendList newTopic'>\
                                        <a href='javascript:void(0)'   onclick=\"setTopic('zfWrapcomtBox" + blogId + "')\"  class='creatNew txt' title='汇聚相同热点的广播'>\
                                            <em class='sico ico_topic'></em>话题</a>\
                                    </div>\
                                    <div class='sendList keyWords schBrace'>\
                                        <a href='javascript:void(0)'  class='txt'  onclick=\"setKeyWord('zfWrapcomtBox" + blogId + "')\" title='分享你的兴趣、关注点' >\
                                            <em class='sico ic_keyword'></em>关键词</a>\
                                    </div>\
                                </div>\
                                <input type='button' class='inputBtn sendBtn' id='ZFBtn' onclick=\"comment('zf','" + blogId + "')\" value='评论' title='评论'>\
                                <span class='countTxt c_tx5' id='zfWrapcountTxt" + blogId + "'>还能输入<em>140</em>字</span>\
                            </div>";
        $('#zfWrap' + blogId).html(zfWrap);
    }
}
//显示删除窗口
function viewDelChose(id){
    $("#delChose" + id).show();
}
//隐藏删除窗口
function hiddenDelChose(id){
    $("#delChose" + id).hide();
}
//显示微博大图
function viewBig(obj) {
    if ($(obj).attr("class") == "pic") {
        $(obj).attr("class", "pic big");
        $(obj).parent().find("a.orimg").attr("style", "display:inline");
        $(obj).find("img.smileimg").attr("style", "display:none");
        $(obj).find("img.bigimg").attr("style", "display:inline");
    } else {
        $(obj).attr("class", "pic");
        $(obj).parent().find("a.orimg").attr("style", "display:none");
        $(obj).find("img.smileimg").attr("style", "display:inline");
        $(obj).find("img.bigimg").attr("style", "display:none");
    }
}

//计算广播输入字体数，并提示
function strLenCalc (obj, checklen, maxlen) {
    var v = obj.val(), charlen = 0, maxlen = !maxlen ? 200 : maxlen, curlen = maxlen, len = v.length;
    for (var i = 0; i < v.length; i++) {
        if (v.charCodeAt(i) < 0 || v.charCodeAt(i) > 255) {
            curlen -= 1;
        }
    }
    if (curlen >= len) {
        $("#" + checklen).html("还可输入 <em>" + Math.floor((curlen - len) / 2) + "</em> 字").css('color', '');
        $("#publish_handle").removeAttr("disabled");
        if (len == 0) {
            $("#publish_handle").attr("disabled", "disabled")
		    .attr("class", "sendBtn btnHasStrafter")
        }
        else {
            $("#publish_handle").attr("class", "sendBtn btnHasStr")
        }
    } else {
        $("#" + checklen).html("已经超过 <em>" + Math.ceil((len - curlen) / 2) + "</em> 字").css('color', '#FF0000');
        $("#publish_handle").attr("disabled", "disabled")
		.attr("class", "sendBtn btnHasStrafter")
    }
}

//计算评论与转播输入字体数，并提示
function strLenZFandPL(obj, checklen, maxlen, BtnId) {
    var v = obj.val(), charlen = 0, maxlen = !maxlen ? 200 : maxlen, curlen = maxlen, len = v.length;
    for (var i = 0; i < v.length; i++) {
        if (v.charCodeAt(i) < 0 || v.charCodeAt(i) > 255) {
            curlen -= 1;
        }
    }
    if (len == 0 && BtnId != 'ZFBtn') {
        $("#" + checklen).html("请输入内容").css('color', '#FF0000');
    } else if (curlen >= len) {
        $("#" + checklen).html("还可输入 <em>" + Math.floor((curlen - len) / 2) + "</em> 字").css('color', '');
        $("#" + BtnId).removeAttr("disabled");
        if (len == 0 && BtnId != 'ZFBtn') {
            $("#" + BtnId).attr("disabled", "disabled")
		    .attr("class", "inputBtn sendBtn")
        }
        else {
            $("#" + BtnId).attr("class", "inputBtn sendBtn")
        }
    } else {
        $("#" + checklen).html("已经超过 <em>" + Math.ceil((len - curlen) / 2) + "</em> 字").css('color', '#FF0000');
        $("#" + BtnId).attr("disabled", "disabled")
		.attr("class", "inputBtn sendBtn")
    }
}

//切换全部广播，特别收听，提到我的的时候时当前点击的区域样式改变---已不用
function ui_tab_lst_do1(sth) {
    var it;
    for (it = 0; it < (sth.parentNode.parentNode.childNodes.length); it++) {
        sth.parentNode.parentNode.childNodes.item(it).childNodes.item(0).setAttribute("class", "t");
    }
    sth.setAttribute("class", "t select");
}

//鼠标移动到微博功能区的更多时，使更多功能区显示
function showmFun(mfun) {
    mfun.setAttribute("class", "mFun mFunDis");
}

//鼠标移出更多功能区时，隐藏共多功能栏
function dismFun(mfun) {
    mfun.setAttribute("class", "mFun");
}

//切换用户防止误操作的全屏蔽界面
function showid(idname) {
    var isIE = (document.all) ? true : false;
    var isIE6 = isIE && ([/MSIE (\d)\.0/i.exec(navigator.userAgent)][0][1] == 6);
    //                    设置弹出层样式
    var newbox = document.getElementById(idname);
    newbox.style.zIndex = "9999";
    newbox.style.display = "block";
    newbox.style.position = !isIE6 ? "fixed" : "absolute";
    newbox.style.top = newbox.style.left = "50%";
    newbox.style.marginTop = -newbox.offsetHeight / 2 + "px";
    newbox.style.marginLeft = -newbox.offsetWidth / 2 + "px";
    var layer = document.createElement("div");
    //                    设置弹出背景层样式
    layer.id = "layer";
    layer.style.width = layer.style.height = "100%";
    layer.style.position = !isIE6 ? "fixed" : "absolute";
    layer.style.top = layer.style.left = 0;
    layer.style.backgroundColor = "#FFF";
    layer.style.zIndex = "9998";
    layer.style.opacity = "0.6";
    document.body.appendChild(layer);
    var sel = document.getElementsByTagName("select");
    for (var i = 0; i < sel.length; i++) {
        sel[i].style.visibility = "hidden";
    }
    function layer_iestyle() {
        layer.style.width = Math.max(document.documentElement.scrollWidth, document.documentElement.clientWidth)
                + "px";
        layer.style.height = Math.max(document.documentElement.scrollHeight, document.documentElement.clientHeight) +
                "px";
    }
    function newbox_iestyle() {
        newbox.style.marginTop = document.documentElement.scrollTop - newbox.offsetHeight / 2 + "px";
        newbox.style.marginLeft = document.documentElement.scrollLeft - newbox.offsetWidth / 2 + "px";
    }
    if (isIE) {
        layer.style.filter = "alpha(opacity=60)";
    }
    if (isIE6) {
        layer_iestyle()
        newbox_iestyle();
        window.attachEvent("onscroll", function() {
            newbox_iestyle();
        })
        window.attachEvent("onresize", layer_iestyle)
    }
}
$(document).ready(function() {
    $("#close").click(function() {
        $("div#layer").fadeOut("fast");
        $("div#smallLay").fadeOut("fast");
    });
});

//控制控件的显示与隐藏
function showWrap(Wrap) {
    try {
        var sbtitle = $('#Wrap');
        if (sbtitle) {
            if (sbtitle.css('display') == 'block') {
                sbtitle.hide();;
                $(e).removeClass(off).addClass(on);
            } else {
                sbtitle.show();
                $(e).removeClass(on).addClass(off);
            }
        }
    } catch (e) {
    }
}

//控制表情的显示与隐藏
function showEmotionWrap(id, tid) {
    try {
        var a = $("#" + id).css("display");
        $(".faceWrap").hide();
        if (a == "none") {
            a = "block";
        } else {
            a = "none";
        }
        $("#" + id).css("display", a)
		.html("<div class='faceTop'>" +
                "<ul><li class='select'><b>默认表情</b></li></ul>" +
                "<a class='close' title='关闭' onclick='$(\".faceWrap\").css(\"display\",\"none\");'></a>" +
                "</div><div class='faceBox'><div class='dface'>" +
                "<?php if(is_array($emotions)): $i = 0; $__LIST__ = $emotions;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$emotions): $mod = ($i % 2 );++$i;?><a title='<?php echo ($emotions["name"]); ?>' onclick='setEmotion(\"" + tid + "\",\"/<?php echo ($emotions["name"]); ?>\")'><img src='<?php echo ($emotions["url"]); ?>'/></a><?php endforeach; endif; else: echo "" ;endif; ?></div></div>");
    } catch (e) {
    }
}

//点击评论时关闭转播框，点击转播时关闭评论框
function closeAndShowWrap(me, id) {
    try {
        if (me == "talkWrap") {
            var other = "zfWrap" + id;
            var otherWrap = document.getElementById(other);
            if (otherWrap) {
                if (otherWrap.style.display == 'block') {
                    otherWrap.style.display = 'none';
                    $(e).removeClass(off).addClass(on);
                }
            }
        }
        if (me == "zfWrap") {
            var other = "talkWrap" + id;
            var otherWrap = document.getElementById(other);
            if (otherWrap) {
                if (otherWrap.style.display == 'block') {
                    otherWrap.style.display = 'none';
                    $(e).removeClass(off).addClass(on);
                }
            }
        }
    } catch (e) {
    }
}

//评论按钮方法集
function talkBtn(id) {
    closeAndShowWrap('talkWrap', id);
    showWrap('talkWrap' + id);
    createTalk(id);
    showRelays(id, 0, 0);
    $('#talkWrapcomtBox' + id).focus();
}

//转播按钮方法集
function zfBtn(id) {
    closeAndShowWrap('zfWrap', id);
    showWrap('zfWrap' + id);
    createzf(id);
    $('#zfWrapcomtBox' + id).focus();
}

//点击表情插入到微博输入栏
function setEmotion(textId, str) {
    var obj = document.getElementById(textId);
    if (document.selection) {
        var sel = document.selection.createRange();
        sel.text = str;
    } else if (typeof obj.selectionStart === 'number' && typeof obj.selectionEnd === 'number') {
        var startPos = obj.selectionStart,
                endPos = obj.selectionEnd,
                cursorPos = startPos,
                tmpStr = obj.value;
        obj.value = tmpStr.substring(0, startPos) + str + tmpStr.substring(endPos, tmpStr.length);
        cursorPos += str.length;
        obj.selectionStart = obj.selectionEnd = cursorPos;
    } else {
        obj.value += str;
    }
    obj.focus();
}

//显示微博评论 AJAX
var twitterid = 0;
function showRelays(id, timestamp, pageflag) {
    var xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "<?php echo U('Home/getComment');?>?memberId=<?php echo ($nowmember); ?>&twitterid=" + twitterid + "&rootid=" + id + "&timestamp=" + timestamp + "&pageflag=" + pageflag;
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            var json = xmlHttp.responseText;
            var r = eval("(" + json + ")");
            document.getElementById("relayDiv" + id).innerHTML = "";
            var l = r.length;
            twitterid = r[l - 1]['id'];
            var starttime = r[0]['timestamp'];
            var endtime = r[l - 1]['timestamp'];
            var relays = "<ul class='clear' id ='relayLists" + id + "'>";
            for (var i = 0; i < l; i++) {
                relays += "<li><div class='msgBox'>\
                                <strong><a>" + r[i]['nick'] + ":</a></strong>\
                                <span class='content'>" + r[i]['text'] + "</span>\
                                <span class='relayTime'>" + r[i]['time'] + "</span></div></li>";
            }
            relays += "</ul>";
            relays += "<div class='pages'>\
                        <a href='javascript:void(0)' onclick=\"showRelays('" + id + "','" + starttime + "','2')\" class='pageBtn'>&lt;&lt; 上一页</a>\
                        <a href='javascript:void(0)' onclick=\"showRelays('" + id + "','" + endtime + "','1')\" class='pageBtn'>下一页 &gt;&gt;</a>\
                    </div>";
            document.getElementById("relayDiv" + id).innerHTML = relays;
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}
//获取ajax request对象
function GetXmlHttpObject() {
    var xmlHttp = null;
    try {
        // Firefox, Opera 8.0+, Safari
        xmlHttp = new XMLHttpRequest();
    }
    catch (e) {
        //Internet Explorer
        try {
            xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e) {
            xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}

function comment(type, id) {
    if (type == "talk") {
        var cbox = $('#talkWrapcomtBox' + id);
        var wrap = $('#talkWrap' + id);
    } else if (type == "zf") {
        var cbox = $('#zfWrapcomtBox' + id);
        var wrap = $('#zfWrap' + id);
    }
    var content = cbox.val();
    if (content != "") {
        var prompt = $('#prompt');
        var xmlHttp = GetXmlHttpObject();
        if (xmlHttp == null) {
            alert("Browser does not support HTTP Request");
            return;
        }
        var url = "<?php echo U('Home/comment');?>?memberId=<?php echo ($nowmember); ?>&content=" + content + "&blogId=" + id + "&type=" + type;
        xmlHttp.onreadystatechange = function() {
            if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                prompt.html(xmlHttp.responseText);
                if (xmlHttp.responseText.indexOf("成功") != -1) {
                    cbox.val("");
                    wrap.hide();
                }
                prompt.fadeIn(500);
                prompt.delay(1500);
                prompt.fadeOut(500);
            }
        };
        xmlHttp.open("GET", url, true);
        xmlHttp.send(null);
    }
}
//发送微博
$("#publish_handle").bind("click", function(){
    $("#publish_handle").attr("disabled","true");
    var members = [];
    $("input[name='selectSyn[]']:checked").each(function(){
	members.push($(this).val());
    });
    var pics = [];
    $(".picView img").each(function(){
	pics.push($(this).attr("value"));
    });
    $.ajax({
	type:'POST',
	url:"<?php echo U('Home/sendwb');?>",
	data:{"selectSyn":members,"content":$("#msgTxt").val(),"pics":pics,"t":new Date().getTime()},
	dataType:'text',
	success: function (result) {
	    if(result == ""){
		$("#publish_handle").attr("disabled","false");
		$("#msgTxt").val("").focus();
		$("#picList").html("");
		$("#picListWrap").hide();
		$("#syncList").hide();
		addNewBlogs();
	    }else{		
		showTipsMsg("出错啦："+result);
	    }
	},
	error: function(XMLHttpRequest, textStatus, errorThrown){
	    showTipsMsg("无法连接服务器");
	}
    });
});

//发送微博后加载最新的微博
function addNewBlogs(){
    var blogid = $("#talkList li:first").attr("id");
    $.get("<?php echo U('Home/newblogs');?>?unit=<?php echo ($unit); ?>&blogid=" + blogid + "&memberId=<?php echo ($nowmember); ?>" + "&t=" + new Date().getTime(), function(json) {
	if(json	!= 'error'){
	    var r = eval("(" + json + ")");
	    $("#talkList").prepend(structBlogs(r));
	}
    });
}
//收藏，取消收藏一条微博
function favweibo(id, obj) {
    var value = obj.html();
    var xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "<?php echo U('Home/favBlog');?>?memberId=<?php echo ($nowmember); ?>&id=" + id + "&value=" + value + "&t=" + new Date().getTime();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            obj.html(xmlHttp.responseText);
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
}

//删除一条微博
function delweibo(id){
    var xmlHttp = GetXmlHttpObject();
    if (xmlHttp == null) {
        alert("Browser does not support HTTP Request");
        return;
    }
    var url = "<?php echo U('Home/delBlog');?>?memberId=<?php echo ($nowmember); ?>&blogid=" + id + "&t=" + new Date().getTime();
    xmlHttp.onreadystatechange = function() {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
           var keyword = xmlHttp.responseText;
	   if(keyword == 0){
	       $("#" + id).hide();
	   }else{
	       showTipsMsg(keyword);
	   }
        }
    };
    xmlHttp.open("GET", url, true);
    xmlHttp.send(null);
    
}

//验证上传图片的格式
UpLoadFileCheck = function(){
		this.AllowExt = ".jpg,.gif,.png,.jpeg,.bmp,.ico";//允许上传的文件类型 0为无限制 每个扩展名后边要加一个"," 小写字母表示 
		this.ImgObj = new Image();
		this.FileExt = "";
		this.ErrMsg = "";
		this.IsImg = false;//全局变量
	    };
UpLoadFileCheck.prototype.CheckExt = function(obj){
    this.ErrMsg = "";
    if (obj.value == ""){
	this.ErrMsg = "请选择一个文件";
    }
    else{
	this.FileExt = obj.value.substr(obj.value.lastIndexOf(".")).toLowerCase();
	//判断文件类型是否允许上传
	if (this.AllowExt != 0 && this.AllowExt.indexOf(this.FileExt) == -1){
	    this.ErrMsg = "该文件类型不允许上传。请上传 " + this.AllowExt + " 类型的文件，当前文件类型为" + this.FileExt;
	}
    }
    if (this.ErrMsg != ""){   
	obj.outerHTML+=''; 
	obj.value = "";
	this.ShowMsg(this.ErrMsg);
    }else{
	$("#picUploadFrom").submit();
    }
}
//显示错误信息 msg-信息内容 
UpLoadFileCheck.prototype.ShowMsg = function(msg, tf){ 
    showTipsMsg(msg);
};
function c(obj){
    var d = new UpLoadFileCheck();
    d.IsImg = true;
    d.CheckExt(obj);
    $("#PromptPicUpload").show();
}

function show(image,value){
    $("#PromptPicUpload").hide();
    $("#picListWrap").show();
    var thisli = '<li><div class="deletePic"><a href="javascript:void(0)" class="delThisPic">删除</a></div>\
			    <div class="picView"><img src="<?php echo UPLOADS_PATH; ?>/'+image+'" value="'+value+'"></div></li>'
    $(".picList").append(thisli); 
 }
 //显示他人名片
 function showOtherInfo(otherId,obj){
     var top = obj.offset().top;
     $("#otherInfoWrap").css({
	 "top":top,
	 "display":"block"
     });
     $("#otherInfoCard").html("");
     $(".uc_loading").show();
      $.get("<?php echo U('Home/otherInfo');?>?otherId=" + otherId + "&memberId=<?php echo ($nowmember); ?>" + "&t=" + new Date().getTime(), function(json) {	 
	if(json	!= 'error'){
	    $(".uc_loading").hide();
	    $("#otherInfoCard").html("");
	    var r = eval("(" + json + ")");
	    var otherInfo = "<div class='uc_c1 clear'>\
		    <div class='uc_c1_l'><a class='avatar' href='"+r['blogAdd']+"'><img src='"+r['head']+"'></a></div>\
		    <div class='uc_c1_r'>\
			<h2 class='tit'>\
			    <a href='"+r['blogAdd']+"' class='tx_user'>"+r['nick']+"</a>\
			    <a href='javascript:void(0)' title='腾讯机构认证' target='_blank' class='tIcon ico_cvip'></a>\
			    <a href='http://p.t.qq.com/levelDetail.php?u="+r['name']+"' class='ico_level wbL4'><em>"+r['level']+"</em></a>\
			    <span class='tx_id'>(@"+r['name']+")</span>\
			</h2>\
			<p class='info'>"+r['verifyinfo']+"</p>\
			<p class='stats'>广播"+r['tweetnum']+"条<span class='tx_line'>|</span>听众"+r['fansnum']+"人</p>\
		    </div>\
		</div>\
		<div class='uc_c2 clear'>\
		    <div class='uc_c2_l'>\
			<label style='display: none;' class='gb_btn gb_btn3' id='otherInfoListen'>\
			    <i class='icon icon_fo2'></i><input value='收听' class='t uc_follow' type='button'>\
			</label>\
			<span style='display: none;' class='gb_foed gb_fo1' id='otherInfoCancel'>\
			    <i class='icon icon_sfo'></i><span class='t uc_unfollow delAttention'>已收听，<a href='#' class='t'>取消</a></span>\
			</span>\
			<span style='display: none;' class='gb_foed gb_fo1' id='otherInfoEach'>\
			    <i class='icon icon_bfo'></i><span class='t uc_uneach delAttention'>已互听，<a href='#' class='t'>取消</a></span>\
			</span>\
		    </div>\
		    <div class='uc_c2_r'>\
			<ul class='bt_gp1 bt_gp1_x1 clear'>\
			    <li class='bt_gp_c bt_gp_c_sfo'><a href='#' class='ico_sFo' title='添加到特别收听'></a></li>\
			    <li class='bt_gp_c first'><a class='reply gb_btn gb_btn5' href='#'><span class='t'>@它</span></a></li>\
			    <li class='bt_gp_c'><a style='display: block;' class='msg gb_btn gb_btn5' href='#'><span class='t'>私信</span></a></li>\
			    <li class='more bt_gp_c last'>\
				<a class='gb_btn gb_btn5' href='#'><span class='t'>更多</span><b class='arrow'></b></a>\
				<div class='ui_drop ui_drop_ucopt_more' style='width:54px;'>\
				    <div class='ui_drop_lst'>\
					<div><a href='#' class='recom'>推荐</a></div>\
					<div><a rel='{u:'xxxytw2012',name:'沈阳理工大学信息学院团委',sex:'它'}' href='#' class='black'>拉黑</a></div>\
					<div><a href='#' class='report'>举报</a></div>\
				    </div>\
				</div>\
			    </li>\
			</ul>\
		    </div>\
		</div>";
	    $("#otherInfoCard").html(otherInfo);
//	    if(r['ismyidol'] == 1 && r['ismyfans'] == 1){
//		$('#otherInfoEach').css("display","block");
//	    }else(r['ismyidol'] == 1 && r['ismyfans'] == 0){
//		$('#otherInfoCancel').css("display","block");
//	    }else{
//		$('#otherInfoListen').css("display","block");
//	    }
	}
    });
 }

</script></body></html>
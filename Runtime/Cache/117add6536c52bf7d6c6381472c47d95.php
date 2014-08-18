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
        </script></head><body><a name="top" id="top"></a><style type="text/css">.main{min-height:900px}</style><div class="w_head_outer"><div class="headWrap"><div class="headInside" id="header"><h1></h1><ul class="topNav" id="topNav" role="navigation"><li class="topNavItem"><a href="<?php echo U('Home/index');?>" class="topt select" id="tophome"><u>首页</u><i></i></a></li><li class="topNavItem"><a href="<?php echo U('TimeLine/index');?>" class="topt" id="toptimeLine"><u>时间轴<sup class="ico_hot_mini"></sup></u><i></i></a></li><li class="topNavItem"><a href="<?php echo U('Interact/index');?>" class="topt" id="topinteract"><u>互动</u><i></i></a></li><li class="topNavItem groups"><a href="<?php echo U('ContorlMember/index');?>" class="topt" id="topcontorlMember"><u>我的账号管理</u><i></i></a></li><li class="topNavItem apps"><a href="javascript:void(0)" class="topt"><u>应用<em>&nbsp;</em></u><i></i></a><!--			    <ul class="viewApps"><li>微频道</li><li>其他</li></ul>--></li></ul><ul class="topNav right qk_nav" id="newMsgBox"><!--                        <li class="topNavItem qk_nav_item at"><a href="" name="at" title="提到我的"  ><span class="t"  >@提到我的</span><i></i><sub class="ui_tx_count" style="display:none"></sub></a></li>--><li class="topNavItem qk_nav_item message"><a href="javascript:void(0)" name="msg" title="私信" ><span class="t">私信</span><i></i><sub class="ui_tx_count" style="display:none"></sub></a></li><li class="topNavItem qk_nav_item fans"><a href="<?php echo U('Interact/index');?>" name="fans" title="听众" ><span class="t">听众</span><i></i><sub class="ui_tx_count" style="display:none"></sub></a></li><li class="topNavItem qk_nav_item notice"><a href="javascript:void(0)" name="notice" title="通知" ><span class="t">通知</span><i></i><sub class="ui_tx_count" style="display:none"></sub></a></li><li class="topNavItem accountItem" id="topNav1"><a href="javascript:void(0)" class="txt" title="<?php echo ($user['nickname']); ?>(@<?php echo ($user['username']); ?>)"><u><?php echo ($user['nickname']); ?><em>&nbsp;</em></u><i></i></a><ul class="topNavSub" style="display:none"><!--                                <li><a href="">设置</a></li><li><a href="" id="setTheme" title="皮肤设置" >换肤</a></li>--><li><a title="增加授权用户" href="<?php echo U('ContorlMember/index');?>">新增授权</a></li><li><a href="<?php echo U('Index/logout');?>">退出</a></li></ul></li></ul><div class="tSearchNew" role="search"><form id="searchForm" method="get" action=""><label id="searchWords" for="searchKey">百度一下，你就知道</label><input type="text" id="searchKey" maxlength="50" name="k" class="inputTxtNew"/><input type="submit" class="inputBtn" value="搜索" onclick="openBaidu()"/><a href="" class="btn_ldrop" ><em></em></a></form></div></div><div class="headShadow"></div></div></div><div class="tipsMsg" id="tipsMsg" style="display:none"></div><link href="<?php echo CSS_PATH; ?>/contorlMember.css" rel="stylesheet" type="text/css" /><div id="contorlWrap"><div id="contorlWrapper" class="clear"><div class="contorlList"><ul class="choseContorl"><li id="tencent_top" class="unit"><a href="javascript:void(0)" onclick="showMember('tencent')" id="tencent_member" class="contorl select"><span class="text">腾讯微博</span></a></li><li id="sina_top" class="unit"><a href="javascript:void(0)" onclick="showMember('sina')" id="sina_member" class="contorl"><span class="text">新浪微博</span></a></li><li id="renren_top" class="unit"><a href="javascript:void(0)" onclick="showMember('renren')" id="renren_member" class="contorl"><span class="text">人人</span></a></li></ul></div><div class="contorlMain" ><div class="addNewMember"><div class="memberNum"><span>总授权数  ： 0</span></div><div class="addMember"><a href="">新增授权</a></div></div><ul class="memberList"><!--                <li class="viewMember"><div class="memberCard"><div class="cardDetail"><div class="cardImg"><img src="http://localhost/tweibo1.0beta/Public/images/home/100.jpg"/></div><div class="memberinfo"><span class="memberName">Anarkh</span><span class="birth">生日 ：1990 04 22</span><span class="exp">经验：1111</span><span class="level">微博等级：7</span><div class="memberTags"><div class="memberTag"><span class="text">倒立能睡着</span></div><div class="memberTag"><span class="text">淡定</span></div></div></div></div><div class="revokeOauth"><a href="#" title="取消授权此用户"><img src="<?php echo IMAGES_PATH; ?>/revoke.gif"/>
                                取消授权
                            </a></div></div></li>--></ul></div></div></div><script type="text/javascript">
    $(function(){
        showMember("<?php echo ($selecttype); ?>");
    });
    //显示授权用户 AJAX
    function showMember(blogtype){ 
        if(blogtype == ""){
            blogtype = "tencent";
        }
        var xmlHttp=GetXmlHttpObject();
        if (xmlHttp==null){
            alert ("Browser does not support HTTP Request");
            return;
        }
        var url="<?php echo U('ContorlMember/viewmymember');?>?blogtype=" + blogtype + "&t=" + new Date().getTime();
        xmlHttp.onreadystatechange = function(){ 
            if (xmlHttp.readyState==4&&xmlHttp.status==200){ 
                var json = xmlHttp.responseText;
                $(".contorl").attr("class", "contorl");
                $("#"+blogtype+"_member").attr("class", "contorl select");
                $(".memberList").html("");
                $(".memberNum").find("span").html("总授权数  ： 0");
                $(".addMember").find("a").attr("href", "<?php echo U('ContorlMember/authUser');?>?blogtype="+blogtype);
                if(json != null){
                    var r = eval("("+json+")");
                    var l = r.length;
                    $(".memberNum").find("span").html("总授权数  ： "+l);
                    var list = "";
                    for(var i = 0; i<l;i++){
                        list += "<li class='viewMember' id='"+r[i]['data']['openid']+"'>\
                            <div class='memberCard'>\
                                <div class='cardDetail'>\
                                    <div class='cardImg'><img src="+r[i]['data']['headurl']+"/></div>\
                                    <div class='memberinfo'>\
                                        <span class='memberName'>"+r[i]['data']['nick']+"</span>\
                                        <span class='birth'>生日 ："+r[i]['data']['birth_year']+"-"+r[i]['data']['birth_month']+"-"+r[i]['data']['birth_day']+"</span>\
                                        <span class='exp'>经验："+r[i]['data']['exp']+"</span>\
                                        <span class='level'>微博等级："+r[i]['data']['level']+"</span>\
                                    <div class='memberTags'>";
                        var tags = r[i]['data']['tag'];  
                        if(tags != null){
                            for(var j = 0, tagl =tags.length; j<tagl; j++){
                                list += "<div class='memberTag'><span class='text'>"+tags[j]['name']+"</span></div>";
                            }
                        }                        
                        list += "</div></div></div>\
                                <div class='revokeOauth'>\
                                    <a href='javascript:void(0)' onclick=\"removeMember('"+r[i]['data']['openid']+"')\" title='取消授权此用户'><img src=\"<?php echo IMAGES_PATH; ?>/revoke.gif\"/>取消授权</a>\
                                </div></div></li>";  
                    }
                    $(".memberList").html(list);
                }
            } 
        }; 
        xmlHttp.open("GET",url,true);
        xmlHttp.send(null);
    }
    //获取ajax request对象
    function GetXmlHttpObject(){
        var xmlHttp=null;
        try{
            // Firefox, Opera 8.0+, Safari
            xmlHttp=new XMLHttpRequest();
        }
        catch (e){
            //Internet Explorer
            try{
                xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
            }
            catch (e){
                xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
            }
        }
        return xmlHttp;
    } 
    //移除授权用户 AJAX
    function removeMember(openid){ 
        var xmlHttp=GetXmlHttpObject();
        if (xmlHttp==null){
            alert ("Browser does not support HTTP Request");
            return;
        }
        var url="<?php echo U('ContorlMember/removeMember');?>?openid=" + openid + "&t=" + new Date().getTime();
        xmlHttp.onreadystatechange = function(){ 
            if (xmlHttp.readyState==4&&xmlHttp.status==200){ 
                var json = xmlHttp.responseText;
                alert(json);
                $("#"+openid).remove();
            } 
        }; 
        xmlHttp.open("GET",url,true);
        xmlHttp.send(null);
    }
</script></body></html>
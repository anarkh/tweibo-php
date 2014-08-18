<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of BlogsWidget
 *
 * @author lichenyang
 */
class WeiboListWidget extends Widget {

    public function render($data) {

	if (isset($data['timestamp']) && isset($data['memberId']) && isset($data['unit'])) {
	    $timestamp = (int) ($data['timestamp']);
	    $memberId = $data['memberId'];
	    $unit = $data['unit'];
	    $params = array(
		//设置获取微博数量
		'reqnum' => 10,
		'pagetime' => $timestamp,
		'pageflag' => 1,
		'type' => 0,
		'contenttype' => 0
	    );
	    $result['data'] = getBlogs($params, $memberId, $unit);
	    $l = $result['data'].length;
	    $result['l'] = $result['data'][$l-1]['timestamp'];
	    //渲染模版
	    $content = $this->renderFile(dirname(__FILE__) . "/public.html", $result);
	    //输出数据
	    return $content;
	} else {
	    return 'error';
	}
	
    }

    public function LoadMore(){
	
	if (isset($_GET['timestamp']) && isset($_GET['memberId']) && isset($_GET['unit'])) {
	    $timestamp = (int) ($_GET['timestamp']);
	    $memberId = $_GET['memberId'];
	    $unit = $_GET['unit'];
	    $params = array(
		//设置获取微博数量
		'reqnum' => 10,
		'pagetime' => $timestamp,
		'pageflag' => 1,
		'type' => 0,
		'contenttype' => 0
	    );
	    $result['data'] = getBlogs($params, $memberId, $unit);
	    $l = $result['data'].length;
	    $result['l'] = $result['data'][$l-1]['timestamp'];
	    //渲染模版
	    $content = $this->renderFile(dirname(__FILE__) . "/list.html", $result);
	    //输出数据
	    return $content;
	    exit;
	} else {
	    echo 'error';
	    exit;
	}
    }
    
    public function test(){
	echo "111111";
    }
}

?>

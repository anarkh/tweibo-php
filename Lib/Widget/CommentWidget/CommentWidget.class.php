<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CommentWidget
 *
 * @author lichenyang
 */
class CommentWidget extends Widget {

    public function render($data) {
	$id = intval($data['id']);
	
        //渲染模版
        $content = $this->renderFile(dirname(__FILE__) . "/public.html", $result);
        //输出数据
        return $content;
    }
}

?>

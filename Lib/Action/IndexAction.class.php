<?php

// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {

    public function index() {
        if ($_SESSION['userId']) {
            redirect(U('Home/index'));
        } else {
            $this->display();
        }
    }

    public function login() {
        $User = M("user");

        $userarr['username'] = $_POST['u'];
        $userarr['password'] = md5($_POST['p']);
        $result = $User->where($userarr)->select();
        if ($result) {
            $userId = $result['0']['id'];
            $nickname = $result['0']['nickname'];
            //登录成功，开启全局session
            session_start();
            $_SESSION['userId'] = $userId;
            $_SESSION['username'] = $userarr['username'];
            $_SESSION['nickname'] = $nickname;
            $this->success("登录成功！", U('Home/index'));
        } else {
            $this->error("账号密码错误！");
        }
    }

    public function logout() {
        session_destroy();
        $this->assign('jumpUrl', U('index'));
        $this->success("退出成功");
    }

    public function register() {
        $User = M("user");

        $userarr['username'] = $_POST['regu'];
        $userarr['password'] = md5($_POST['regp']);
        $userarr['nickname'] = $_POST['regn'];

        $uname['username'] = $_POST['regu'];

        if ($User->where($uname)->select()) {
            $this->error("此账号已经存在！");
        } else {
            if ($User->add($userarr)) {
                $result = $User->where($userarr)->select();
                if ($result) {
                    $userId = $result['0']['id'];
                    $nickname = $result['0']['nickname'];
                    //登录成功，开启全局session
                    session_start();
                    $_SESSION['userId'] = $userId;
                    $_SESSION['username'] = $userarr['username'];
                    $_SESSION['nickname'] = $nickname;
                    $this->success("注册成功！", U('Home/index'));
                }
            } else {
                $this->error("注册失败！");
            }
        }
    }

}
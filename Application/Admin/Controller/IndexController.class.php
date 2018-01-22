<?php

namespace Admin\Controller;

use Think\Controller;

class IndexController extends Controller{

    public function index(){
        $rs = M('admin_menu')->where('`index` = 1')->find();
        if($rs) header('location:'.U($rs['group'].'/'.$rs['controller'].'/'.$rs['action']));
    }

    public function login(){
        $this->display();
    }

    public function checkLogin(){
        if(empty($_REQUEST['username'])) die(json_encode(array('status' => 'error','msg' => '用户不能为空！','focus' => 'input[name="username"]')));
        if(empty($_REQUEST['password'])) die(json_encode(array('status' => 'error','msg' => '密码不能为空！','focus' => 'input[name="password"]')));
        $admin = M('admin')->where('username = "'.$_REQUEST['username'].'" and password = "'.md5($_REQUEST['password']).'"')->find();
        if($admin){
            die(json_encode(array('status' => 'success')));
        }else{
            die(json_encode(array('status' => 'error','msg' => '用户名或者密码错误！','focus' => 'input[name="username"]')));
        }
    }

}
<?php

namespace Admin\Controller;

use Think\Controller;

class FeedbackController extends Controller{

    public function index(){
        $this->display();
    }

    public function lists(){
        $limit = (($_REQUEST['page'] - 1) * 10).',10';
        $list = M('feedback')->field('id,user_id,content,ip,FROM_UNIXTIME(add_time,"%Y-%m-%d %H:%i:%s") as add_time')->order('add_time desc')->limit($limit)->select();
        foreach($list as $key => $value){
            $list[$key]['username'] = M('user')->where('id = '.$value['user_id'])->getField('username');
        }
        $result['list'] = $list;
        die(json_encode($result));
    }

}
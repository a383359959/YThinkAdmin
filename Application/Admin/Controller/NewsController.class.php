<?php

namespace Admin\Controller;

use Think\Controller;

class NewsController extends Controller{

    public function index(){
        $this->display();
    }

    public function edit(){
        $title = $_REQUEST['type'] == 'add' ? '添加新闻资讯' : '修改新闻资讯';
        if($_REQUEST['type'] == 'edit'){
            $rs = M('news')->where('id = '.$_REQUEST['id'])->find();
        }else{
            $rs = null;
        }
        $this->assign('rs',$rs);
        $this->assign('title',$title);
        $this->display();
    }

    public function action(){
        if($_REQUEST['type'] == 'add'){
            $data = array(
                'title'     =>  $_REQUEST['title'],
                'add_time'  =>  time(),
                'content'   =>  $_REQUEST['content'],
                'litpic'    =>  $_REQUEST['litpic']
            );
            M('news')->add($data);
            $result['status'] = 'success';
        }else if($_REQUEST['type'] == 'edit'){
            $data = array(
                'title'     =>  $_REQUEST['title'],
                'content'   =>  $_REQUEST['content'],
                'litpic'    =>  $_REQUEST['litpic']
            );
            M('news')->where('id = '.$_REQUEST['id'])->save($data);
            $result['status'] = 'success';
        }else if($_REQUEST['type'] == 'del'){
            M('news')->where('id = '.$_REQUEST['id'])->delete();
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function lists(){
        $limit = (($_REQUEST['page'] - 1) * 10).',10';
        $list = M('news')->field('id,title,litpic,FROM_UNIXTIME(add_time,"%Y-%m-%d %H:%i:%s") as add_time')->order('add_time desc')->limit($limit)->select();
        foreach($list as $key => $value){
            $list[$key]['url'] = U('edit',array('type' => 'edit','id' => $value['id']));
        }
        $result['list'] = $list;
        die(json_encode($result));
    }

}
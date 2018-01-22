<?php

namespace Admin\Controller;

use Think\Controller;

class ResumeController extends Controller{

    public function education_degree(){
        $this->display();
    }

    public function education_degree_lists(){
        $limit = (($_REQUEST['page'] - 1) * 10).',10';
        $list = M('resume_education_degree')->order('sort asc')->limit($limit)->select();
        foreach($list as $key => $value){
            $list[$key]['url'] = U('education_degree_edit',array('type' => 'edit','id' => $value['id']));
        }
        $result['list'] = $list;
        die(json_encode($result));
    }

    public function education_degree_edit(){
        if($_REQUEST['type'] == 'edit'){
            $rs = M('resume_education_degree')->where('id = '.$_REQUEST['id'])->find();
        }else{
            $rs = null;
        }
        $this->assign('rs',$rs);
        $this->display();
    }

    public function education_degree_action(){
        if($_REQUEST['type'] == 'add'){
            $data = array(
                'name'  =>  $_REQUEST['name'],
                'sort'  =>  $_REQUEST['sort']
            );
            M('resume_education_degree')->add($data);
            $result['status'] = 'success';
        }else if($_REQUEST['type'] == 'edit'){
            $data = array(
                'name'  =>  $_REQUEST['name'],
                'sort'  =>  $_REQUEST['sort']
            );
            M('resume_education_degree')->where('id = '.$_REQUEST['id'])->save($data);
            $result['status'] = 'success';
        }else if($_REQUEST['type'] == 'del'){
            M('resume_education_degree')->where('id = '.$_REQUEST['id'])->delete();
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

}
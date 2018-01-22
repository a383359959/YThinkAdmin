<?php

namespace Admin\Controller;

use Think\Controller;

class UserController extends Controller{

    public function index(){
        $this->display();
    }

    public function edit(){
        if($_REQUEST['type'] == 'edit'){
            $rs = M('user')->where('id = '.$_REQUEST['id'])->find();
        }else{
            $rs = null;
        }
        $this->assign('rs',$rs);
        $this->display();
    }

    public function action(){
        if($_REQUEST['type'] == 'edit'){
            $data = array(
                'name'      =>  $_REQUEST['name'],
                'sex'       =>  $_REQUEST['sex'],
                'headimg'   =>  $_REQUEST['headimg'],
            );
            if(!empty($_REQUEST['password'])) $data['password'] = md5($_REQUEST['password']);
            M('user')->where('id = '.$_REQUEST['id'])->save($data);
            $result['status'] = 'success';
        }else if($_REQUEST['type'] == 'del'){
            M('user')->where('id = '.$_REQUEST['id'])->delete();
            $result['status'] = 'success';
        }
        die(json_encode($result));
    }

    public function lists(){
        $limit = (($_REQUEST['page'] - 1) * 10).',10';

        $where = array('status' => 1);

        if(!empty($_REQUEST['parent_user_id'])){
            $user = M('user')->field('role,mechanism_id')->where('id = '.$_REQUEST['parent_user_id'])->find();
            if($user['role'] == 2){
                $where = array(
                    'role'          =>  1,
                    'mechanism_id'  =>  $user['mechanism_id']
                );
            }else if($user['role'] == 1){
                $where = array(
                    'role'          =>  0,
                    'mechanism_id'  =>  $user['mechanism_id']
                );
            }
        }

        $list = M('user')->where($where)->order('add_time desc')->limit($limit)->select();

        foreach($list as $key => $value){
            if($value['role'] == 0){
                $value['role_name'] = '学生 / 家长';
            }else if($value['role'] == 1){
                $value['role_name'] = '老师';
            }else if($value['role'] == 2){
                $value['role_name'] = '代理商';
            }

            $province_name = M('province')->where('pro_id = '.$value['province_id'])->getField('province_name');
		    $city_name = M('city')->where('city_id = '.$value['city_id'])->getField('city_name');
            $area_name = M('area')->where('area_id = '.$value['area_id'])->getField('area_name');
            $value['position'] = $province_name.' '.$city_name.' '.$area_name;

            $value['mechanism_name'] = M('mechanism')->where('id = '.$value['mechanism_id'])->getField('name');

            $value['add_time'] = date('Y-m-d H:i:s',$value['add_time']);

            $value['url'] = U('edit',array('type' => 'edit','id' => $value['id']));

            $value['down'] = U('down',array('parent_user_id' => $value['id']));    // 下属会员

            $value['account'] = U('account',array('user_id' => $value['id']));     // 账号审核

            $value['resume'] = U('resume',array('user_id' => $value['id']));        // 我的简历
            
            $list[$key] = $value;
        }
        $result['list'] = $list;
        die(json_encode($result));
    }

    public function down(){
        $this->display('index');
    }

    public function account(){
        $this->display();
    }

    public function account_lists(){
        $user = M('user')->field('role,mechanism_id')->where('id = '.$_REQUEST['user_id'])->find();
        
        $where = array();
        
        if($user['role'] == 2){
            $where = array(
                'role'          =>  1,
                'mechanism_id'  =>  $user['mechanism_id']
            );
        }else if($user['role'] == 1){
            $where = array(
                'role'          =>  0,
                'mechanism_id'  =>  $user['mechanism_id']
            );
        }
        
        $list = M('user')->where($where)->order('add_time desc')->limit($limit)->select();
       
        foreach($list as $key => $value){
            if($value['role'] == 0){
                $value['role_name'] = '学生 / 家长';
            }else if($value['role'] == 1){
                $value['role_name'] = '老师';
            }else if($value['role'] == 2){
                $value['role_name'] = '代理商';
            }

            $province_name = M('province')->where('pro_id = '.$value['province_id'])->getField('province_name');
		    $city_name = M('city')->where('city_id = '.$value['city_id'])->getField('city_name');
            $area_name = M('area')->where('area_id = '.$value['area_id'])->getField('area_name');
            $value['position'] = $province_name.' '.$city_name.' '.$area_name;

            $value['mechanism_name'] = M('mechanism')->where('id = '.$value['mechanism_id'])->getField('name');

            $value['add_time'] = date('Y-m-d H:i:s',$value['add_time']);

            $list[$key] = $value;
        }
        $result['list'] = $list;
        die(json_encode($result));
    }

    public function changeStatus(){
        M('user')->where('id = '.$_REQUEST['id'])->save(array('status' => $_REQUEST['status']));
        $result['status'] = 'success';
        die(json_encode($result));
    }

    public function resume(){
        $this->display();
    }

}
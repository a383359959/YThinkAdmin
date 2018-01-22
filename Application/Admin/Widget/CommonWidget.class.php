<?php

namespace Admin\Widget;

use Think\Controller;

class CommonWidget extends Controller{

    public function header(){
        $this->display('Common:header');
    }

    public function left(){
        $list = M('admin_menu')->where('hidden = 0 and pid = 0')->order('sort asc')->select();
        foreach($list as $key => $value){
            $value['child'] = M('admin_menu')->where('hidden = 0 and pid = '.$value['id'])->order('sort asc')->select();
            if($value['child']){
                $value['url'] = 'javascript:;';
                foreach($value['child'] as $k => $v){
                    $value['child'][$k]['url'] = U($v['group'].'/'.$v['controller'].'/'.$v['action']);
                }
            }else{
                $value['url'] = U($value['group'].'/'.$value['controller'].'/'.$value['action']);
            }
            
            $list[$key] = $value;
        }
        $this->assign('list',$list);
        $this->display('Common:left');
    }

    public function bottom(){
        $this->display('Common:bottom');
    }

}
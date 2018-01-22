<?php

function getTitle($group,$controller,$action,$condition = ''){
    $where = '`group` = "'.$group.'" and controller = "'.$controller.'" and action = "'.$action.'"';
    if($condition != '') $where .= ' and `condition` = "'.$condition.'"';
    $name = M('admin_menu')->where($where)->getField('name');
    return $name;
}
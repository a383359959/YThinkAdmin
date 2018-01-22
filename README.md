## 简介

YThinkAdmin是基于 ThinkPHP 开发的快速、简单的面向对象的轻量级后台开发模版，是为了敏捷WEB应用开发和简化企业应用开发而诞生的。

## 作者博客

http://blog.csdn.net/a383359959

## 使用方法

### 1、后台菜单

`ythink_admin_menu` 表

<table>
    <tr>
        <td>字段名称</td>
        <td>描述</td>
    </tr>
    <tr>
        <td>id</td>
        <td>自增 ID</td>
    </tr>
    <tr>
        <td>name</td>
        <td>后台菜单名称</td>
    </tr>
    <tr>
        <td>pid</td>
        <td>父级菜单 ID</td>
    </tr>
    <tr>
        <td>sort</td>
        <td>菜单排序</td>
    </tr>
    <tr>
        <td>icon_class</td>
        <td>菜单图标，默认：fa fa-folder-o fa-fw</td>
    </tr>
    <tr>
        <td>group</td>
        <td>ThinkPHP分组，默认：Admin</td>
    </tr>
    <tr>
        <td>group</td>
        <td>ThinkPHP控制器</td>
    </tr>
    <tr>
        <td>action</td>
        <td>ThinkPHP方法</td>
    </tr>
    <tr>
        <td>hidden</td>
        <td>隐藏栏目（0：显示 1：隐藏）</td>
    </tr>
    <tr>
        <td>condition</td>
        <td>筛选条件</td>
    </tr>
    <tr>
        <td>index</td>
        <td>是否设为首页（0：默认 1：首页），只可以有一个首页</td>
    </tr>
</table>

### 2、网站名称

打开根目录/ThinkPHP/Conf/convention.php文件，大约167行

```php
'COMPANY_NAME'  =>  'YThink - 后台管理'
```

### 3、代码案例 - 筛选条件

/index.php/Admin/News/edit/type/add.html -- 添加页面

/index.php/Admin/News/edit/type/edit.html -- 修改页面

显示标题：

```html
{:getTitle(MODULE_NAME,CONTROLLER_NAME,ACTION_NAME,$_REQUEST['type'])}
```

condition 字段就需要填写 add 或者 edit

如果不需要筛选条件：

```html
{:getTitle(MODULE_NAME,CONTROLLER_NAME,ACTION_NAME)}
```
    
### 4、代码案例 - 隐藏栏目

一般不需要显示在菜单上的均要设置隐藏栏目

### 5、代码案例 - Vue - 列表页

```javascript
new Vue({
    el : '#panel',
    data : {
        list : []
    },
    mounted : function(){
        this.loadData();
    },
    methods : {
        /*
        *   请求数据
        */
        loadData : function(){
            var obj = this;
            var page = 0;
            $('.content').html('');
            $('.dropload-down').remove();
            $('.table').dropload({
                scrollArea : window,
                loadDownFn : function(me){
                    page++;
                    var option = {
                        page : page,
                    }
                    ythink_ajax('Resume/education_degree_lists',option,function(result){
                        if(result.list.length > 0){
                            for(var i = 0;i < result.list.length;i++){
                                obj.list.push(result.list[i]);
                            }
                        }else{
                            me.lock();
                            me.noData();
                        }
                        me.resetload();
                    });
                }
            });
        }
    }
});
```
```php
$list = M('list')->select();
$result['list'] = $list;
die(json_encode($result));
```
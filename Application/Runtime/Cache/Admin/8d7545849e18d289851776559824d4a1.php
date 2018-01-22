<?php if (!defined('THINK_PATH')) exit();?><div class="navbar-default sidebar">
    <div class="sidebar-nav navbar-collapse">
        <ul id="side-menu" class="nav in">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="搜索订单号">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
            </li>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$value): $mod = ($i % 2 );++$i;?><li>
                <?php if(empty($value['child'])): ?><li><a href="<?php echo ($value["url"]); ?>"><i class="<?php echo ($value["icon_class"]); ?>"></i>&nbsp;<?php echo ($value["name"]); ?></a></li>
                
                <?php else: ?>
                
                <a href="<?php echo ($value["url"]); ?>"><i class="<?php echo ($value["icon_class"]); ?>"></i>&nbsp;<?php echo ($value["name"]); ?><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse" >
                    <?php if(is_array($value["child"])): $i = 0; $__LIST__ = $value["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?><li><a href="<?php echo ($child["url"]); ?>">&nbsp;<?php echo ($child["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul><?php endif; ?>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
    </div>
</div>
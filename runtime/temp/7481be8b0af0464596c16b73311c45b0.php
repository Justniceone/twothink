<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:72:"E:\www\twothink\public/../application/admin/view/default/menu\index.html";i:1496373782;s:73:"E:\www\twothink\public/../application/admin/view/default/public\base.html";i:1496373782;}*/ ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo $meta_title; ?>|TwoThink管理平台</title>
    <link href="__ROOT__/public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/admin/css/<?php echo \think\Config::get('color_style'); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="__PUBLIC__/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="__PUBLIC__/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="__PUBLIC__/admin/js/jquery.mousewheel.js"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        <!-- Logo -->
        <span class="logo"></span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__['main']) || $__MENU__['main'] instanceof \think\Collection || $__MENU__['main'] instanceof \think\Paginator): $i = 0; $__LIST__ = $__MENU__['main'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                <li class="<?php echo (isset($menu['class']) && ($menu['class'] !== '')?$menu['class']:''); ?>"><a href="<?php echo url($menu['url']); ?>"><?php echo $menu['title']; ?></a></li>
            <?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->

        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username'); ?>"><?php echo session('user_auth.username'); ?></em></li>
                <li><a  onclick="go_home();">前台首页</a></li>
                <li><a href="<?php echo url('User/updatePassword'); ?>">修改密码</a></li>
                <li><a href="<?php echo url('User/updateNickname'); ?>">修改昵称</a></li>
                <li><a href="<?php echo url('Admin/delcache'); ?>">更新缓存</a></li>
                <li><a href="<?php echo url('Publics/logout'); ?>">退出</a></li>
            </ul>
        </div>
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(!(empty($_extra_menu) || (($_extra_menu instanceof \think\Collection || $_extra_menu instanceof \think\Paginator ) && $_extra_menu->isEmpty()))): ?>
                    
                    <?php echo extra_menu($_extra_menu,$__MENU__); endif; if(is_array($__MENU__['child']) || $__MENU__['child'] instanceof \think\Collection || $__MENU__['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $__MENU__['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?>
                    <!-- 子导航 -->
                    <?php if(!(empty($sub_menu) || (($sub_menu instanceof \think\Collection || $sub_menu instanceof \think\Paginator ) && $sub_menu->isEmpty()))): if(!(empty($key) || (($key instanceof \think\Collection || $key instanceof \think\Paginator ) && $key->isEmpty()))): ?><h3><i class="icon icon-unfold"></i><?php echo $key; ?></h3><?php endif; ?>
                        <ul class="side-sub-menu">
                            <?php if(is_array($sub_menu) || $sub_menu instanceof \think\Collection || $sub_menu instanceof \think\Paginator): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                                <li>
                                    <a class="item" href="<?php echo url($menu['url']); ?>"><?php echo $menu['title']; ?></a>
                                </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    <?php endif; ?>
                    <!-- /子导航 -->
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!(empty($_show_nav) || (($_show_nav instanceof \think\Collection || $_show_nav instanceof \think\Paginator ) && $_show_nav->isEmpty()))): ?>
            <div class="breadcrumb">
                <span>您的位置:</span>
                <assign name="i" value="1" />
                <?php if(is_array($_nav) || $_nav instanceof \think\Collection || $_nav instanceof \think\Paginator): if( count($_nav)==0 ) : echo "" ;else: foreach($_nav as $k=>$v): if($i == count($_nav)): ?>
                    <span><?php echo $v; ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo $k; ?>"><?php echo $v; ?></a>&gt;</span>
                    <?php endif; ?>
                    <assign name="i" value="$i+1" />
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
            <?php endif; ?>
            <!-- nav -->
            

            
    <div class="main-title">
        <h2><?php if(isset($data)): ?>[ <?php echo $data['title']; ?> ] 子<?php endif; ?>菜单管理 </h2>
    </div>

    <div class="cf">
        <a class="btn" href="<?php echo url('add',array('pid'=>input('get.pid',0))); ?>">新 增</a>
        <button class="btn ajax-post confirm" url="<?php echo url('del'); ?>" target-form="ids">删 除</button>
        <a class="btn" href="<?php echo url('import',array('pid'=>input('get.pid',0))); ?>">导 入</a>
        <button class="btn list_sort" url="<?php echo url('sort',array('pid'=>input('get.pid',0)),''); ?>">排序</button>
        <!-- 高级搜索 -->
        <div class="search-form fr cf">
            <div class="sleft">
                <input type="text" name="title" class="search-input" value="<?php echo input('title'); ?>" placeholder="请输入菜单名称">
                <a class="sch-btn" href="javascript:;" id="search" url="<?php echo url('index'); ?>"><i class="btn-search"></i></a>
            </div>
        </div>
    </div>

    <div class="data-table table-striped">
        <form class="ids">
            <table>
                <thead>
                    <tr>
                        <th class="row-selected">
                            <input class="checkbox check-all" type="checkbox">
                        </th>
                        <th>ID</th>
                        <th>名称</th>
                        <th>上级菜单</th>
                        <th>分组</th>
                        <th>URL</th>
                        <th>排序</th>
                        <th>仅开发者模式显示</th>
                        <th>隐藏</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
				<?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><input class="ids row-selected" type="checkbox" name="id[]" value="<?php echo $menu['id']; ?>"></td>
                        <td><?php echo $menu['id']; ?></td>
                        <td>
                            <a href="<?php echo url('index?pid='.$menu['id']); ?>"><?php echo $menu['title']; ?></a>
                        </td>
                        <td><?php echo (isset($menu['up_title']) && ($menu['up_title'] !== '')?$menu['up_title']:'无'); ?></td>
                        <td><?php echo $menu['group']; ?></td>
                        <td><?php echo $menu['url']; ?></td>
                        <td><?php echo $menu['sort']; ?></td>
                        <td>
                            <a href="<?php echo url('toogleDev',array('id'=>$menu['id'],'value'=>abs($menu['is_dev']-1))); ?>" class="ajax-get">
                            <?php echo $menu['is_dev_text']; ?>
                            </a>
                        </td>
                        <td>
                            <a href="<?php echo url('toogleHide',array('id'=>$menu['id'],'value'=>abs($menu['hide']-1))); ?>" class="ajax-get">
                            <?php echo $menu['hide_text']; ?>
                            </a>
                        </td>
                        <td>
                            <a title="编辑" href="<?php echo url('edit?id='.$menu['id']); ?>">编辑</a>
                            <a class="confirm ajax-get" title="删除" href="<?php echo url('del?id='.$menu['id']); ?>">删除</a>
                        </td>
                    </tr>
                <?php endforeach; endif; else: echo "" ;endif; else: ?>
				<td colspan="10" class="text-center"> aOh! 暂时还没有内容! </td>
				<?php endif; ?>
                </tbody>
            </table>
        </form>
        <!-- 分页 -->
        <div class="page">
            
        </div>
    </div>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">感谢使用<a href="http://www.twothink.cn" target="_blank">TwoThink</a>管理平台</div>
                <div class="fr">V<?php echo TWOTHINK_VERSION; ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "__ROOT__", //当前网站地址
            "APP"    : "__APP__", //当前项目地址
            "PUBLIC" : "__PUBLIC__", //项目公共目录地址
            "DEEP"   : "<?php echo config('pathinfo_depr'); ?>", //PATHINFO分割符
            "MODEL"  : ["3", "<?php echo config('url_convert'); ?>", "<?php echo config('url_html_suffix'); ?>"],//config('URL_MODEL')
            "VAR"    : ["<?php echo config('var_module'); ?>", "<?php echo config('var_controller'); ?>", "<?php echo config('var_action'); ?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="__PUBLIC__/static/think.js"></script>
    <script type="text/javascript" src="__PUBLIC__/admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
        function go_home() {
          window.open("<?php echo url('/'); ?>");
        }
    </script>
    
    <script type="text/javascript">
        $(function() {
            //搜索功能
            $("#search").click(function() {
                var url = $(this).attr('url');
                var query = $('.search-form').find('input').serialize();
                query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g, '');
                query = query.replace(/^&/g, '');
                if (url.indexOf('?') > 0) {
                    url += '&' + query;
                } else {
                    url += '?' + query;
                }
                window.location.href = url;
            });
            //回车搜索
            $(".search-input").keyup(function(e) {
                if (e.keyCode === 13) {
                    $("#search").click();
                    return false;
                }
            });
            //导航高亮
            highlight_subnav('<?php echo url('index'); ?>');
            //点击排序
        	$('.list_sort').click(function(){
        		var url = $(this).attr('url');
        		var ids = $('.ids:checked');
        		var param = '';
        		if(ids.length > 0){
        			var str = new Array();
        			ids.each(function(){
        				str.push($(this).val());
        			});
        			param = str.join(',');
        		}

        		if(url != undefined && url != ''){
        			window.location.href = url + '/ids/' + param;
        		}
        	});
        });
    </script>

</body>
</html>

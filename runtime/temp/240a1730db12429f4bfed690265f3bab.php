<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"E:\www\twothink\public/../application/admin/view/default/article\index.html";i:1496373782;s:73:"E:\www\twothink\public/../application/admin/view/default/public\base.html";i:1496373782;s:78:"E:\www\twothink\public/../application/admin/view/default/article\sidemenu.html";i:1496373782;}*/ ?>
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
 <h3>
 	<i class="icon <?php if(!in_array((request()->action()), explode(',',"mydocument,draftbox,examine"))): ?>icon-fold<?php endif; ?>"></i>
 	个人中心
 </h3>
 	<ul class="side-sub-menu <?php if(!in_array((request()->action()), explode(',',"mydocument,draftbox,examine"))): ?>subnav-off<?php endif; ?>">
 		<li <?php if(request()->action() == 'mydocument'): ?>class="current"<?php endif; ?>><a class="item" href="<?php echo url('article/mydocument'); ?>">我的文档</a></li>
 		<?php if($show_draftbox == '1'): ?>
 		<li <?php if(request()->action() == 'draftbox'): ?>class="current"<?php endif; ?>><a class="item" href="<?php echo url('article/draftbox'); ?>">草稿箱</a></li>
 		<?php endif; if($show_examine == '1'): ?>
		<li <?php if(request()->action() == 'examine'): ?>class="examine"<?php endif; ?>><a class="item" href="<?php echo url('article/examine'); ?>">待审核</a></li>
		<?php endif; ?>
 	</ul> 
    <?php if(is_array($nodes) || $nodes instanceof \think\Collection || $nodes instanceof \think\Paginator): $i = 0; $__LIST__ = $nodes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?>
        <!-- 子导航 -->
        <?php if(!(empty($sub_menu) || (($sub_menu instanceof \think\Collection || $sub_menu instanceof \think\Paginator ) && $sub_menu->isEmpty()))): ?>
            <h3>
            	<i class="icon <?php if($sub_menu['current'] != '1'): ?>icon-fold<?php endif; ?>"></i>
            	<?php if($sub_menu['allow_publish'] > '0'): ?><a class="item" href="<?php echo url($sub_menu['url']); ?>"><?php echo $sub_menu['title']; ?></a><?php else: ?><?php echo $sub_menu['title']; endif; ?>
            </h3>
            <ul class="side-sub-menu <?php if($sub_menu["current"] != '1'): ?>subnav-off<?php endif; ?>">
                <?php if(is_array($sub_menu['_child']) || $sub_menu['_child'] instanceof \think\Collection || $sub_menu['_child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $sub_menu['_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?>
                    <li <?php if($menu['id'] == $cate_id or $menu['current'] == 1): ?>class="current"<?php endif; ?>>
                        <?php if($menu['allow_publish'] > '0'): ?><a class="item" href="<?php echo url($menu['url']); ?>"><?php echo $menu['title']; ?></a><?php else: ?><a class="item" href="javascript:void(0);"><?php echo $menu['title']; ?></a><?php endif; ?>

                        <!-- 一级子菜单 -->
                        <?php if(isset($menu['_child'])): ?>
                        <ul class="subitem">
                        	<?php if(is_array($menu['_child']) || $menu['_child'] instanceof \think\Collection || $menu['_child'] instanceof \think\Paginator): if( count($menu['_child'])==0 ) : echo "" ;else: foreach($menu['_child'] as $key=>$three_menu): ?>
                            <li>
                                <?php if($three_menu['allow_publish'] > '0'): ?><a class="item" href="<?php echo url($three_menu['url']); ?>"><?php echo $three_menu['title']; ?></a><?php else: ?><a class="item" href="javascript:void(0);"><?php echo $three_menu['title']; ?></a><?php endif; ?>
                                <!-- 二级子菜单 -->
                                <?php if(isset($three_menu['_child'])): ?>
                                <ul class="subitem">
                                	<?php if(is_array($three_menu['_child']) || $three_menu['_child'] instanceof \think\Collection || $three_menu['_child'] instanceof \think\Paginator): if( count($three_menu['_child'])==0 ) : echo "" ;else: foreach($three_menu['_child'] as $key=>$four_menu): ?>
                                    <li>
                                        <?php if($four_menu['allow_publish'] > '0'): ?><a class="item" href="<?php echo url('index','cate_id='.$four_menu['id']); ?>"><?php echo $four_menu['title']; ?></a><?php else: ?><a class="item" href="javascript:void(0);"><?php echo $four_menu['title']; ?></a><?php endif; ?>
                                        <!-- 三级子菜单 -->
                                        <?php if(isset($four_menu['_child'])): ?>
                                        <ul class="subitem">
                                        	<?php if(is_array($four_menu['_child']) || $four_menu['_child'] instanceof \think\Collection || $four_menu['_child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $four_menu['_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$five_menu): $mod = ($i % 2 );++$i;?>
                                            <li>
                                            	<?php if($five_menu['allow_publish'] > '0'): ?><a class="item" href="<?php echo url('index','cate_id='.$five_menu['id']); ?>"><?php echo $five_menu['title']; ?></a><?php else: ?><a class="item" href="javascript:void(0);"><?php echo $five_menu['title']; ?></a><?php endif; ?>
                                            </li>
                                            <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </ul>
                                        <?php endif; ?>
                                        <!-- end 三级子菜单 -->
                                    </li>
                                     <?php endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                                <?php endif; ?>
                                <!-- end 二级子菜单 -->
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <?php endif; ?>
                        <!-- end 一级子菜单 -->
                    </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        <?php endif; ?>
        <!-- /子导航 -->
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <!-- 回收站 -->
	<?php if($show_recycle == '1'): ?>
    <h3>
        <em class="recycle"></em>
        <a href="<?php echo url('article/recycle'); ?>">回收站</a>
    </h3>
    <?php endif; ?>
</div>
<script>
    $(function(){
        $(".side-sub-menu li").hover(function(){
            $(this).addClass("hover");
        },function(){
            $(this).removeClass("hover");
        });
    })
</script>


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
            

            
	<!-- 标题 -->
	<div class="main-title">
		<h2>
		文档列表(<?php echo $_total; ?>) [
		<?php if(!(empty($rightNav) || (($rightNav instanceof \think\Collection || $rightNav instanceof \think\Paginator ) && $rightNav->isEmpty()))): if(is_array($rightNav) || $rightNav instanceof \think\Collection || $rightNav instanceof \think\Paginator): $i = 0; $__LIST__ = $rightNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
      		<a href="<?php echo url('index','cate_id='.$nav['id']); ?>"><?php echo $nav['title']; ?></a>
      			<?php if(count($rightNav) > $i): ?><i class="ca"></i><?php endif; endforeach; endif; else: echo "" ;endif; if(isset($article)): ?>：<a href="<?php echo url('index','cate_id='.$cate_id.'&pid='.$article['id']); ?>"><?php echo $article['title']; ?></a><?php endif; else: if(empty($position) || (($position instanceof \think\Collection || $position instanceof \think\Paginator ) && $position->isEmpty())): ?>全部<?php else: ?><a href="<?php echo url('article/index'); ?>">全部</a><?php endif; if(is_array(\think\Config::get('document_position')) || \think\Config::get('document_position') instanceof \think\Collection || \think\Config::get('document_position') instanceof \think\Paginator): if( count(\think\Config::get('document_position'))==0 ) : echo "" ;else: foreach(\think\Config::get('document_position') as $key=>$vo): if($position != $key): ?><a href="<?php echo url('index',array('position'=>$key)); ?>"><?php echo $vo; ?></a><?php else: ?><?php echo $vo; endif; ?>&nbsp;
			<?php endforeach; endif; else: echo "" ;endif; endif; ?>
		]
		<?php if($allow == '0'): ?>（该分类不允许发布内容）<?php endif; if(count($model) > 1): ?>[ 模型：<?php if(empty($model_id) || (($model_id instanceof \think\Collection || $model_id instanceof \think\Paginator ) && $model_id->isEmpty())): ?><strong>全部</strong><?php else: ?><a href="<?php echo url('index',array('pid'=>$pid,'cate_id'=>$cate_id)); ?>">全部</a><?php endif; if(is_array($model) || $model instanceof \think\Collection || $model instanceof \think\Paginator): $i = 0; $__LIST__ = $model;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($model_id != $vo): ?><a href="<?php echo url('index',array('pid'=>$pid,'cate_id'=>$cate_id,'model_id'=>$vo)); ?>"><?php echo get_document_model($vo,'title'); ?></a><?php else: ?><strong><?php echo get_document_model($vo,'title'); ?></strong><?php endif; ?>&nbsp;
			<?php endforeach; endif; else: echo "" ;endif; ?>
		]<?php endif; if(!(empty($groups) || (($groups instanceof \think\Collection || $groups instanceof \think\Paginator ) && $groups->isEmpty()))): ?>[ 分组：<?php if(empty($group_id) || (($group_id instanceof \think\Collection || $group_id instanceof \think\Paginator ) && $group_id->isEmpty())): ?><strong>全部</strong><?php else: ?><a href="<?php echo url('index',array('pid'=>$pid,'cate_id'=>$cate_id)); ?>">全部</a><?php endif; if(is_array($groups) || $groups instanceof \think\Collection || $groups instanceof \think\Paginator): if( count($groups)==0 ) : echo "" ;else: foreach($groups as $key=>$vo): if($group_id != $key): ?><a href="<?php echo url('index',array('pid'=>$pid,'cate_id'=>$cate_id,'model_id'=>$model_id,'group_id'=>$key)); ?>"><?php echo $vo; ?></a><?php else: ?><strong><?php echo $vo; ?></strong><?php endif; ?>&nbsp;
			<?php endforeach; endif; else: echo "" ;endif; ?>
		]<?php endif; ?>
		</h2>
	</div>

	<!-- 按钮工具栏 -->
	<div class="cf">
		<div class="fl">
			<div class="btn-group">
				<?php if($allow > '0'): ?>
					<button class="btn document_add" <?php if(count($model) == 1): ?>url="<?php echo url('article/add',array('cate_id'=>$cate_id,'pid'=>input('pid',0),'model_id'=>$model[0],'group_id'=>$group_id)); ?>"<?php endif; ?>>新 增
						<?php if(count($model) > 1): ?><i class="btn-arrowdown"></i><?php endif; ?>
					</button>
					<?php if(count($model) > 1): ?>
					<ul class="dropdown nav-list">
						<?php if(is_array($model) || $model instanceof \think\Collection || $model instanceof \think\Paginator): $i = 0; $__LIST__ = $model;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<li><a href="<?php echo url('article/add',array('cate_id'=>$cate_id,'model_id'=>$vo,'pid'=>input('pid',0),'group_id'=>$group_id)); ?>"><?php echo get_document_model($vo,'title'); ?></a></li>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
					<?php endif; else: ?>
					<button class="btn disabled" >新 增
						<?php if(count($model) > 1): ?><i class="btn-arrowdown"></i><?php endif; ?>
					</button>
				<?php endif; ?>
			</div>
            <button class="btn ajax-post" target-form="ids" url="<?php echo url("Article/setStatus",array("status"=>1,'cate_id'=>input('cate_id'))); ?>">启 用</button>
			<button class="btn ajax-post" target-form="ids" url="<?php echo url("Article/setStatus",array("status"=>0,'cate_id'=>input('cate_id'))); ?>">禁 用</button>
			<!-- <button class="btn ajax-post" target-form="ids" url="<?php echo url("Article/move"); ?>">移 动</button>
			<button class="btn ajax-post" target-form="ids" url="<?php echo url("Article/copy"); ?>">复 制</button>
			<button class="btn ajax-post" target-form="ids" hide-data="true" url="<?php echo url("Article/paste"); ?>">粘 贴</button> -->
			<input type="hidden" class="hide-data" name="cate_id" value="<?php echo $cate_id; ?>"/>
			<input type="hidden" class="hide-data" name="pid" value="<?php echo $pid; ?>"/>
			<button class="btn ajax-post confirm" target-form="ids" url="<?php echo url("Article/setStatus",array("status"=>-1,'cate_id'=>input('cate_id'))); ?>">删 除</button>
			<!-- <button class="btn document_add" url="<?php echo url('article/batchOperate',array('cate_id'=>$cate_id,'pid'=>input('pid',0))); ?>">导入</button> -->
			<button class="btn list_sort" url="<?php echo url('sort',array('cate_id'=>$cate_id,'pid'=>input('pid',0)),''); ?>">排序</button>
			<div class="btn-group"> 
			    <a class="btn" href="<?php echo url('recycle',['model_id'=>$model_id]); ?>">回收站</a> 
			</div>
		</div>

		<!-- 高级搜索 -->
		<div class="search-form fr cf">
			<div class="sleft">
				<div class="drop-down">
					<span id="sch-sort-txt" class="sort-txt" data="<?php echo $status; ?>"><?php if(get_status_title($status) == ''): ?>所有<?php else: ?><?php echo get_status_title($status); endif; ?></span>
					<i class="arrow arrow-down"></i>
					<ul id="sub-sch-menu" class="nav-list hidden">
						<li><a href="javascript:;" value="">所有</a></li>
						<li><a href="javascript:;" value="1">正常</a></li>
						<li><a href="javascript:;" value="0">禁用</a></li>
						<li><a href="javascript:;" value="2">待审核</a></li>
					</ul>
				</div>
				<input type="text" name="title" class="search-input" value="<?php echo input('title'); ?>" placeholder="请输入标题文档">
				<a class="sch-btn" href="javascript:;" id="search" url="<?php echo url('article/index','pid='.input('pid',0).'&cate_id='.$cate_id,false); ?>"><i class="btn-search"></i></a>
			</div>
            <div class="btn-group-click adv-sch-pannel fl">
                <button class="btn">高 级<i class="btn-arrowdown"></i></button>
                <div class="dropdown cf">
                	<div class="row">
                		<label>更新时间：</label>
                		<input type="text" id="time-start" name="time-start" class="text input-2x" value="" placeholder="起始时间" /> -
                		<input type="text" id="time-end" name="time-end" class="text input-2x" value="" placeholder="结束时间" />
                	</div>
                	<div class="row">
                		<label>创建者：</label>
                		<input type="text" name="nickname" class="text input-2x" value="" placeholder="请输入用户名">
                	</div>
                </div>
            </div>
		</div>
	</div>

	<!-- 数据表格 -->
    <div class="data-table">
		<table>
            <!-- 表头 -->
            <thead>
                <tr>
                    <th class="row-selected row-selected">
                        <input class="check-all" type="checkbox">
                    </th>
                    <?php if(is_array($list_grids) || $list_grids instanceof \think\Collection || $list_grids instanceof \think\Paginator): $i = 0; $__LIST__ = $list_grids;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;?>
                        <th><?php echo $field['title']; ?></th>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </tr>
            </thead>

            <!-- 列表 -->
            <tbody>
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?>
                    <tr>
                        <td><input class="ids" type="checkbox" value="<?php echo $data['id']; ?>" name="ids[]"></td>
                        <?php if(is_array($list_grids) || $list_grids instanceof \think\Collection || $list_grids instanceof \think\Paginator): $i = 0; $__LIST__ = $list_grids;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$grid): $mod = ($i % 2 );++$i;?>
                            <td><?php echo get_list_field($data,$grid); ?></td>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
	</div>
	<!-- 分页 -->
    <div class="page">
        <?php echo $_page; ?>
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
    
<link href="__PUBLIC__/static/datetimepicker/css/datetimepicker.css" rel="stylesheet" type="text/css">
<?php if(config("color_style")=='blue_color') echo '<link href="__PUBLIC__/static/datetimepicker/css/datetimepicker_blue.css" rel="stylesheet" type="text/css">'; ?>
<link href="__PUBLIC__/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="__PUBLIC__/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript">
$(function(){
	//搜索功能
	$("#search").click(function(){
		var url = $(this).attr('url');
		var status = $("#sch-sort-txt").attr("data");
        var query  = $('.search-form').find('input').serialize();
        query = query.replace(/(&|^)(\w*?\d*?\-*?_*?)*?=?((?=&)|(?=$))/g,'');
        query = query.replace(/^&/g,'');
		if(status != ''){
			query = 'status=' + status + "&" + query;
        }
        if( url.indexOf('?')>0 ){
            url += '&' + query;
        }else{
            url += '?' + query;
        }
		window.location.href = url;
	});

	/* 状态搜索子菜单 */
	$(".search-form").find(".drop-down").hover(function(){
		$("#sub-sch-menu").removeClass("hidden");
	},function(){
		$("#sub-sch-menu").addClass("hidden");
	});
	$("#sub-sch-menu li").find("a").each(function(){
		$(this).click(function(){
			var text = $(this).text();
			$("#sch-sort-txt").text(text).attr("data",$(this).attr("value"));
			$("#sub-sch-menu").addClass("hidden");
		})
	});

	//只有一个模型时，点击新增
	$('.document_add').click(function(){
		var url = $(this).attr('url');
		if(url != undefined && url != ''){
			window.location.href = url;
		}
	});

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

    //回车自动提交
    $('.search-form').find('input').keyup(function(event){
        if(event.keyCode===13){
            $("#search").click();
        }
    });

    $('#time-start').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
	    minView:2,
	    autoclose:true
    });

    $('#time-end').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
	    minView:2,
	    autoclose:true
    });
})
</script>

</body>
</html>

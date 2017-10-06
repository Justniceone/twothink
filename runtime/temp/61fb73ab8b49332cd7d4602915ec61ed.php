<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"E:\www\twothink\public/../application/admin/view/default/article\edit.html";i:1496373782;s:73:"E:\www\twothink\public/../application/admin/view/default/public\base.html";i:1496373782;s:78:"E:\www\twothink\public/../application/admin/view/default/article\sidemenu.html";i:1496373782;}*/ ?>
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
            

            
	<script type="text/javascript" src="__PUBLIC__/static/uploadify/jquery.uploadify.min.js"></script>
	<div class="main-title cf">
		<h2>
			编辑<?php echo get_document_model($data['model_id'],'title'); ?> [
			<?php if(is_array($rightNav) || $rightNav instanceof \think\Collection || $rightNav instanceof \think\Paginator): $i = 0; $__LIST__ = $rightNav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
			<a href="<?php echo url('article/index','cate_id='.$nav['id']); ?>"><?php echo $nav['title']; ?></a>
			<?php if(count($rightNav) > $i): ?><i class="ca"></i><?php endif; endforeach; endif; else: echo "" ;endif; if(isset($article)): ?>：<a href="<?php echo url('article/index','cate_id='.$data['category_id'].'&pid='.$article['id']); ?>"><?php echo $article['title']; ?></a><?php endif; ?>
			]
		</h2>
	</div>
	<!-- 标签页导航 -->
<div class="tab-wrap">
	<ul class="tab-nav nav">
		<?php $_result=parse_config_attr($model['field_group']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$group): $mod = ($i % 2 );++$i;?>
			<li data-tab="tab<?php echo $key; ?>" <?php if($key == '1'): ?>class="current"<?php endif; ?>><a href="javascript:void(0);"><?php echo $group; ?></a></li>
		<?php endforeach; endif; else: echo "" ;endif; ?>
	</ul>
	<div class="tab-content">
	<!-- 表单 -->
	<form id="form" action="<?php echo url('update'); ?>" method="post" class="form-horizontal">
		<!-- 基础文档模型 -->
		<?php $_result=parse_config_attr($model['field_group']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$group): $mod = ($i % 2 );++$i;?>
        <div id="tab<?php echo $key; ?>" class="tab-pane <?php if($key == '1'): ?>in<?php endif; ?> tab<?php echo $key; ?>">
            <?php if(is_array($fields[$key]) || $fields[$key] instanceof \think\Collection || $fields[$key] instanceof \think\Paginator): $i = 0; $__LIST__ = $fields[$key];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$field): $mod = ($i % 2 );++$i;if($field['is_show'] == 1 || $field['is_show'] == 3): ?>
                <div class="form-item cf">
                    <label class="item-label"><?php echo $field['title']; ?><span class="check-tips"><?php if(!(empty($field['remark']) || (($field['remark'] instanceof \think\Collection || $field['remark'] instanceof \think\Paginator ) && $field['remark']->isEmpty()))): ?>（<?php echo $field['remark']; ?>）<?php endif; ?></span></label>
                    <div class="controls">
                        <?php switch($field['type']): case "num": ?>
                                <input type="text" class="text input-mid" name="<?php echo $field['name']; ?>" value="<?php echo $data[$field['name']]; ?>">
                            <?php break; case "string": ?>
                                <input type="text" class="text input-large" name="<?php echo $field['name']; ?>" value="<?php echo $data[$field['name']]; ?>">
                            <?php break; case "textarea": ?>
                                <label class="textarea input-large">
                                <textarea name="<?php echo $field['name']; ?>"><?php echo $data[$field['name']]; ?></textarea>
                                </label>
                            <?php break; case "date": ?>
                                <input type="text" name="<?php echo $field['name']; ?>" class="text date" value="<?php echo date('Y-m-d',strtotime($data[$field['name']])); ?>" placeholder="请选择日期" />
                            <?php break; case "datetime": ?>
                                <input type="text" name="<?php echo $field['name']; ?>" class="text time" value="<?php echo time_format(strtotime($data[$field['name']])); ?>" placeholder="请选择时间" />
                            <?php break; case "bool": ?>
                                <select name="<?php echo $field['name']; ?>">
                                    <?php $_result=parse_field_attr($field['extra']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                            <option value="<?php echo $key; ?>" <?php if($data[$field['name']] == $key): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            <?php break; case "select": ?>
                                <select name="<?php echo $field['name']; ?>">
                                    <?php $_result=parse_field_attr($field['extra']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $key; ?>" <?php if($data[$field['name']] == $key): ?>selected<?php endif; ?>><?php echo $vo; ?></option>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </select>
                            <?php break; case "radio": $_result=parse_field_attr($field['extra']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                	<label class="radio">
                                    <input type="radio" value="<?php echo $key; ?>" name="<?php echo $field['name']; ?>" <?php if($data[$field['name']] == $key): ?>checked="checked"<?php endif; ?>><?php echo $vo; ?>
                                	</label>
                                <?php endforeach; endif; else: echo "" ;endif; break; case "checkbox": $_result=parse_field_attr($field['extra']);if(is_array($_result) || $_result instanceof \think\Collection || $_result instanceof \think\Paginator): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                	<label class="checkbox">
                                    <input type="checkbox" value="<?php echo $key; ?>" name="<?php echo $field['name']; ?>[]" <?php if(check_document_position($data[$field['name']],$key)): ?>checked="checked"<?php endif; ?>><?php echo $vo; ?>
                                	</label>
                                <?php endforeach; endif; else: echo "" ;endif; break; case "editor": ?>
                                <label class="textarea">
                                <textarea name="<?php echo $field['name']; ?>"><?php echo $data[$field['name']]; ?></textarea>
                                <?php echo hook('adminArticleEdit', array('name'=>$field['name'],'value'=>$data[$field['name']])); ?>
                                </label>
                            <?php break; case "function": 
                        $hook_arr = parse_function_attr($field['extra'],$data[$field['name']]);
                         ?>
                        <?php echo $hook_arr['name']($hook_arr['parameter']); break; case "hook": 
                        $hook_arr = parse_function_attr($field['extra'],$data[$field['name']]);
                         ?>
                        <?php echo hook($hook_arr['name'],$hook_arr['parameter']); break; case "picture": ?>
                                <div class="controls">
				<input type="file" id="upload_picture_<?php echo $field['name']; ?>">
				<input type="hidden" name="<?php echo $field['name']; ?>" id="cover_id_<?php echo $field['name']; ?>" value="<?php echo $data[$field['name']]; ?>"/>
        <span>建议：200*200像素</span>
        <div class="upload-img-box">
				<?php if(!(empty($data[$field['name']]) || (($data[$field['name']] instanceof \think\Collection || $data[$field['name']] instanceof \think\Paginator ) && $data[$field['name']]->isEmpty()))): ?>
					<div class="upload-pre-item"><img src="<?php echo get_cover($data[$field['name']],'path'); ?>"/></div>
				<?php endif; ?>
				</div>
			</div>
			<script type="text/javascript">
			//上传图片
			    /* 初始化上传插件 */
				$("#upload_picture_<?php echo $field['name']; ?>").uploadify({
			        "height"          : 30,
			        "swf"             : "__PUBLIC__/static/uploadify/uploadify.swf",
			        "fileObjName"     : "download",
			        "buttonText"      : "上传图片",
			        "uploader"        : "<?php echo url('file/uploadpicture',array('session_id'=>session_id())); ?>",
			        "width"           : 120,
			        'removeTimeout'	  : 1,
			        'fileTypeExts'	  : '*.jpg; *.png; *.gif;',
			        "onUploadSuccess" : uploadPicture<?php echo $field['name']; ?>,
			        'onFallback' : function() {
			            alert('未检测到兼容版本的Flash.');
			        }
			    });
				function uploadPicture<?php echo $field['name']; ?>(file, data){
			    	var data = $.parseJSON(data);
			    	var src = '';
			        if(data.status){
			        	$("#cover_id_<?php echo $field['name']; ?>").val(data.id);
			        	src = data.url || '__ROOT__' + data.path
			        	$("#cover_id_<?php echo $field['name']; ?>").parent().find('.upload-img-box').html(
			        		'<div class="upload-pre-item"><img src="' + src + '"/></div>'
			        	);
			        } else {
			        	updateAlert(data.info);
			        	setTimeout(function(){
			                $('#top-alert').find('button').click();
			                $(that).removeClass('disabled').prop('disabled',false);
			            },1500);
			        }
			    }
			</script>
                            <?php break; case "file": ?>
			<div class="controls">
				<input type="file" id="upload_file_<?php echo $field['name']; ?>">
				<input type="hidden" name="<?php echo $field['name']; ?>" value="<?php echo think_encrypt(json_encode(get_table_field($data[$field['name']],'id','','File'))); ?>"/>
				<div class="upload-img-box">
					<?php if(isset($data[$field['name']])): ?>
						<div class="upload-pre-file"><span class="upload_icon_all"></span><?php echo get_table_field($data[$field['name']],'id','name','File'); ?></div>
					<?php endif; ?>
				</div>
			</div>
			<script type="text/javascript">
			//上传图片
			    /* 初始化上传插件 */
				$("#upload_file_<?php echo $field['name']; ?>").uploadify({
			        "height"          : 30,
			        "swf"             : "__PUBLIC__/static/uploadify/uploadify.swf",
			        "fileObjName"     : "download",
			        "buttonText"      : "上传附件",
			        "uploader"        : "<?php echo url('File/upload',array('session_id'=>session_id())); ?>",
			        "width"           : 120,
			        'removeTimeout'	  : 1,
			        "onUploadSuccess" : uploadFile<?php echo $field['name']; ?>,
			        'onFallback' : function() {
			            alert('未检测到兼容版本的Flash.');
			        }
			    });
				function uploadFile<?php echo $field['name']; ?>(file, data){
					var data = $.parseJSON(data);
			        if(data.status){
			        	var name = "<?php echo $field['name']; ?>";
			        	$("input[name="+name+"]").val(data.data);
			        	$("input[name="+name+"]").parent().find('.upload-img-box').html(
			        		"<div class=\"upload-pre-file\"><span class=\"upload_icon_all\"></span>" + data.info + "</div>"
			        	);
			        } else {
			        	updateAlert(data.info);
			        	setTimeout(function(){
			                $('#top-alert').find('button').click();
			                $(that).removeClass('disabled').prop('disabled',false);
			            },1500);
			        }
			    }
			</script>
                            <?php break; default: ?>
                            <input type="text" class="text input-large" name="<?php echo $field['name']; ?>" value="<?php echo $data[$field['name']]; ?>">
                        <?php endswitch; ?>
                    </div>
                </div>
                <?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
		<?php endforeach; endif; else: echo "" ;endif; ?>

		<div class="form-item cf">
			<button class="btn submit-btn ajax-posts hidden" id="submit" type="submit" target-form="form-horizontal">确 定</button>
			<a class="btn btn-return" href="<?php echo \think\Cookie::get('__forward__'); ?>">返 回</a>
			<?php if(config('open_draftbox') and (request()->action() == 'add' or $data['status'] == 3)): ?>
			<button class="btn save-btn" url="<?php echo url('article/autoSave'); ?>" target-form="form-horizontal" id="autoSave">
				存草稿
			</button>
			<?php endif; ?>
			<input type="hidden" name="id" value="<?php echo (isset($data['id']) && ($data['id'] !== '')?$data['id']:''); ?>"/>
			<input type="hidden" name="pid" value="<?php echo (isset($data['pid']) && ($data['pid'] !== '')?$data['pid']:''); ?>"/>
			<input type="hidden" name="model_id" value="<?php echo (isset($data['model_id']) && ($data['model_id'] !== '')?$data['model_id']:''); ?>"/>
			<input type="hidden" name="group_id" value="<?php echo (isset($data['group_id']) && ($data['group_id'] !== '')?$data['group_id']:''); ?>"/>
			<input type="hidden" name="category_id" value="<?php echo (isset($data['category_id']) && ($data['category_id'] !== '')?$data['category_id']:''); ?>">
		</div>
	</form>
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
<?php if(config('color_style')=='blue_color') echo '<link href="__PUBLIC__/static/datetimepicker/css/datetimepicker_blue.css" rel="stylesheet" type="text/css">'; ?>
<link href="__PUBLIC__/static/datetimepicker/css/dropdown.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="__PUBLIC__/static/datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/static/datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
<script type="text/javascript">

Think.setValue("type", <?php echo (isset($data['type']) && ($data['type'] !== '')?$data['type']:'""'); ?>);
Think.setValue("display", <?php echo (isset($data['display']) && ($data['display'] !== '')?$data['display']:0); ?>);

$('#submit').click(function(){
	$('#form').submit();
});

$(function(){
    $('.date').datetimepicker({
        format: 'yyyy-mm-dd',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });
    $('.time').datetimepicker({
        format: 'yyyy-mm-dd hh:ii',
        language:"zh-CN",
        minView:2,
        autoclose:true
    });
    showTab();

	<?php if(config('open_draftbox') and (request()->action() == 'add' or $data['status'] == 3)): ?>
	//保存草稿
	var interval;
	$('#autoSave').click(function(){
        var target_form = $(this).attr('target-form');
        var target = $(this).attr('url')
        var form = $('.'+target_form);
        var query = form.serialize();
        var that = this;

        $(that).addClass('disabled').attr('autocomplete','off').prop('disabled',true);
        $.post(target,query).success(function(data){
            if (data.status==1) {
                updateAlert(data.info ,'alert-success');
                $('input[name=id]').val(data.data.id);
            }else{
                updateAlert(data.info);
            }
            setTimeout(function(){
                $('#top-alert').find('button').click();
                $(that).removeClass('disabled').prop('disabled',false);
            },1500);
        })

        //重新开始定时器
        clearInterval(interval);
        autoSaveDraft();
        return false;
    });

	//Ctrl+S保存草稿
	$('body').keydown(function(e){
		if(e.ctrlKey && e.which == 83){
			$('#autoSave').click();
			return false;
		}
	});

	//每隔一段时间保存草稿
	function autoSaveDraft(){
		interval = setInterval(function(){
			//只有基础信息填写了，才会触发
			var title = $('input[name=title]').val();
			var name = $('input[name=name]').val();
			var des = $('textarea[name=description]').val();
			if(title != '' || name != '' || des != ''){
				$('#autoSave').click();
			}
		}, 1000*parseInt(<?php echo config('DRAFT_AOTOSAVE_INTERVAL'); ?>));
	}
	autoSaveDraft();

	<?php endif; ?>

});
</script>

</body>
</html>

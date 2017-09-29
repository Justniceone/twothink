<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:70:"E:\www\twothink\public/../application/install\view\index\complete.html";i:1496373782;s:67:"E:\www\twothink\public/../application/install\view\public\base.html";i:1496373782;}*/ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>TwoThink 安装</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Le styles -->
        <link href="__STATIC__/bootstrap/css/bootstrap.css" rel="stylesheet">
        <link href="__STATIC__/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <link href="__CSS__/install.css" rel="stylesheet">

        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="assets/js/html5shiv.js"></script>
        <![endif]-->
        <script src="__STATIC__/jquery-1.10.2.min.js"></script>
        <script src="__STATIC__/bootstrap/js/bootstrap.js"></script>
    </head>

    <body data-spy="scroll" data-target=".bs-docs-sidebar">
        <!-- Navbar
        ================================================== -->
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" target="_blank" href="http://www.twothink.cn">TwoThink</a>
                    <div class="nav-collapse collapse">
                    	<ul id="step" class="nav">
                    		
    <li class="active"><a href="javascript:;">安装协议</a></li>
    <li class="active"><a href="javascript:;">环境检测</a></li>
    <li class="active"><a href="javascript:;">创建数据库</a></li>
    <li class="active"><a href="javascript:;"><?php if(\think\Session::get('update') == '1'): ?>升级<?php else: ?>安装<?php endif; ?></a></li>
    <li class="active"><a href="javascript:;">完成</a></li>

                    	</ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="jumbotron masthead">
            <div class="container">
                
    <h1>完成</h1>
    <p><?php if(\think\Session::get('update') == '1'): ?>升级<?php else: ?>安装<?php endif; ?>完成！</p>
	<?php if(isset($info)): ?>
	<?php echo $info; endif; ?>

            </div>
        </div>


        <!-- Footer
        ================================================== -->
        <footer class="footer navbar-fixed-bottom">
            <div class="container">
                <div>
                	
    <a class="btn btn-primary btn-large" href="<?php echo 'http://'. $_SERVER['SERVER_NAME'] . rtrim(dirname(rtrim($_SERVER['SCRIPT_NAME'], '/')), '/');?>/admin/publics/login">登录后台</a>
    <a class="btn btn-success btn-large" href="<?php echo 'http://'. $_SERVER['SERVER_NAME'] . rtrim(dirname(rtrim($_SERVER['SCRIPT_NAME'], '/')), '/');?>">访问首页</a>
	<script type="text/javascript" src="http://tajs.qq.com/stats?sId=59437834" charset="UTF-8"></script> 

                </div>
            </div>
        </footer>
    </body>
</html>

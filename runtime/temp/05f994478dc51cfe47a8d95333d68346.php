<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:69:"E:\www\twothink\public/../application/install\view\install\step2.html";i:1496373782;s:67:"E:\www\twothink\public/../application/install\view\public\base.html";i:1496373782;}*/ ?>
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
    <li><a href="javascript:;"><?php if(\think\Session::get('update') == '1'): ?>升级<?php else: ?>安装<?php endif; ?></a></li>
    <li><a href="javascript:;">完成</a></li>

                    	</ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="jumbotron masthead">
            <div class="container">
                
    <?php
        defined('SAE_MYSQL_HOST_M') or define('SAE_MYSQL_HOST_M', '127.0.0.1');
        defined('SAE_MYSQL_HOST_M') or define('SAE_MYSQL_PORT', '3306');
    ?>
    <h1>创建数据库</h1>
    <form action="" method="post" target="_self">
        <div class="create-database">
            <div>
                <select name="db[]">
	                <option>mysql</option>
                </select>
                <span>数据库类型</span>
            </div>
            <div>
                <input type="text" name="db[]" value="<?php if(defined("SAE_MYSQL_HOST_M")): ?><?php echo SAE_MYSQL_HOST_M; else: ?>127.0.0.1<?php endif; ?>">
                <span>数据库服务器，数据库服务器IP，一般为127.0.0.1</span>
            </div>
            <div>
                <input type="text" name="db[]" value="<?php if(defined("SAE_MYSQL_DB")): ?><?php echo SAE_MYSQL_DB; else: ?>twothink<?php endif; ?>">
                <span>数据库名</span>
            </div>
            <div>
                <input type="text" name="db[]" value="<?php if(defined("SAE_MYSQL_USER")): ?><?php echo SAE_MYSQL_USER; else: ?>root<?php endif; ?>">
                <span>数据库用户名</span>
            </div>
            <div>
                <input type="text" name="db[]" value="<?php if(defined("SAE_MYSQL_PASS")): ?><?php echo SAE_MYSQL_PASS; endif; ?>">
                <span>数据库密码</span>
            </div>
            <div>
                <input type="text" name="db[]" value="<?php if(defined("SAE_MYSQL_PORT")): ?><?php echo SAE_MYSQL_PORT; else: ?>3306<?php endif; ?>">
                <span>数据库端口，数据库服务连接端口，一般为3306</span>
            </div>

            <div>
                <input type="text" name="db[]" value="twothink_">
                <span>数据表前缀，同一个数据库运行多个系统时请修改为不同的前缀</span>
            </div>
        </div>

        <div class="create-database">
            <h2>创始人帐号信息</h2>
            <div>
                <input type="text" name="admin[]" value="admin">
                <span>用户名</span>
            </div>
            <div>
                <input type="password" name="admin[]" value="">
                <span>密码</span>
            </div>
            <div>
                <input type="password" name="admin[]" value="">
                <span>确认密码</span>
            </div>
            <div>
                <input type="text" name="admin[]" value="admin@admin.com">
                <span>邮箱，请填写正确的邮箱便于收取提醒邮件</span>
            </div>
        </div>
    </form>

            </div>
        </div>


        <!-- Footer
        ================================================== -->
        <footer class="footer navbar-fixed-bottom">
            <div class="container">
                <div>
                	
    <a class="btn btn-success btn-large" href="<?php echo url('Install/step1'); ?>">上一步</a>
    <button id="submit" type="button" class="btn btn-primary btn-large" onclick="$('form').submit();return false;">下一步</button>

                </div>
            </div>
        </footer>
    </body>
</html>

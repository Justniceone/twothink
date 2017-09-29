<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:72:"E:\www\twothink\public/../application/user/view/default/login\index.html";i:1506679605;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
  <title>登录</title>

  <!-- Bootstrap -->
  <link href="/asset/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/asset/css/style.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    .main{margin-bottom: 60px;}
    .indexLabel{padding: 10px 0; margin: 10px 0 0; color: #fff;}
  </style>
</head>
<body>
<div class="main">
  <!--导航部分-->
  <nav class="navbar navbar-default navbar-fixed-bottom">
    <div class="container-fluid text-center">
      <div class="col-xs-3">
        <p class="navbar-text"><a href="index.html" class="navbar-link">首页</a></p>
      </div>
      <div class="col-xs-3">
        <p class="navbar-text"><a href="#" class="navbar-link">服务</a></p>
      </div>
      <div class="col-xs-3">
        <p class="navbar-text"><a href="#" class="navbar-link">发现</a></p>
      </div>
      <div class="col-xs-3">
        <p class="navbar-text"><a href="#" class="navbar-link">我的</a></p>
      </div>
    </div>
  </nav>
  <!--导航结束-->

  <div class="container">
    <h2>登录</h2>
    <form method="post">
      <div class="form-group">
        <label>用户名:</label>
        <input type="text" class="form-control" placeholder="请填写用户名" name="username"/>
      </div>
      <div class="form-group">
        <label>密码:</label>
        <input type="text" class="form-control" placeholder="请输入密码" name="password"/>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputPassword">验证码</label>
        <div class="controls">
          <input type="text" id="inputPassword" class="form-control" placeholder="请输入验证码"   datatype="*5-5" name="verify">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"></label>
        <div class="controls verifyimg">
          <?php echo captcha_img(); ?>
        </div>
        <div class="controls Validform_checktip text-warning"></div>
      </div>
        <button class="btn btn-primary">登录</button>
      </div>
    </form>
  </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/asset/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/asset/bootstrap/js/bootstrap.min.js"></script>
</body>
<script type="text/javascript">
    $(function(){
        //刷新验证码
        var verifyimg = $(".verifyimg img").attr("src");
        $(".verifyimg img").click(function(){
            if( verifyimg.indexOf('?')>0){
                $(".verifyimg img").attr("src", verifyimg+'&random='+Math.random());
            }else{
                $(".verifyimg img").attr("src", verifyimg.replace(/\?.*$/,'')+'?'+Math.random());
            }
        });
    });
</script>
</html>
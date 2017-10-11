<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"E:\www\twothink\public/../application/home/view/default/activity\detail.html";i:1507473429;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <title>Bootstrap 101 Template</title>

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

    <div class="container-fluid">
        <?php if(is_array($content) || $content instanceof \think\Collection || $content instanceof \think\Paginator): $i = 0; $__LIST__ = $content;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$detail): $mod = ($i % 2 );++$i;endforeach; endif; else: echo "" ;endif; if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$property): $mod = ($i % 2 );++$i;?>
        <div class="blank"></div>
        <h3 class="noticeDetailTitle"><strong><?php echo $property['title']; ?></strong></h3>
        <div class="noticeDetailInfo id" data-id="<?php echo $property['id']; ?>"><?php echo $property['description']; ?></div>
        <div class="noticeDetailInfo"><?php echo date('Y/m/d',$property['create_time']); ?></div>
        <div class="noticeDetailContent">
        <?php echo $detail['content']; ?>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <a href="/home/activity/index.html" class="btn btn-info">返回</a>
        <a href="javascript:;" class="btn btn-success" id="join">申请参与活动</a>
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/asset/jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/asset/bootstrap/js/bootstrap.min.js"></script>
</body>
<script type="text/javascript">
    $('#join').click(function(){
        if(confirm('确定参加活动?')){
            //发送ajax请求参加活动
            //获取参加活动的id
            var id=$('.id').attr('data-id');
            $.getJSON("/home/activity/join.html",{id:id},function(data){
                if(data.msg==='请登录'){
                    //跳转到登录页面
                    self.location='/user/login/index.html';
                }else if(data.msg='已报名') {
                    //禁用报名按钮
                    $('#join').fadeOut('slow',function(){
                        alert('已经报过名了哦');
                    });
                    //$('#join').attr('disabled',true);
                }else{
                    alert(data.msg);
                }
            })
        }
    })
</script>
</html>
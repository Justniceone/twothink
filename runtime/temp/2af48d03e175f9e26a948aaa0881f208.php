<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:71:"E:\www\twothink\public/../application/home/view/default/sale\index.html";i:1507467780;}*/ ?>
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
        <div class="blank"></div>
        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
            <ul id="myTabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">租</a></li>
                <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">售</a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                    <p class="text-danger">免费提供小区内的租房信息</p>
                    <div class="row">

                        <div class="col-xs-6 col-md-4">
                            <div class="thumbnail">
                                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$document): $mod = ($i % 2 );++$i;?>
                                <img src="__ROOT__<?php echo get_cover_path($document['cover_id']); ?>" alt="...">
                                <div class="caption">
                                    <h4><?php echo $document['title']; ?></h4>
                                    <p class="zushouInfo">1080P套九出租,精装修,拎包入住</p>
                                    <p class="text-danger">19000元/月</p>
                                    <p><a href="<?php echo url('detail?id='.$document['id']); ?>" class="btn btn-danger zushouBtn">详细信息</a> </p>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                        </div>

                    </div>

                </div>
                <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                    <div class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
                        <p class="text-danger">免费提供小区内的二手房信息</p>
                        <div class="row">
                            <div class="col-xs-6 col-md-4">
                                <div class="thumbnail">
                                    <?php if(is_array($sold) || $sold instanceof \think\Collection || $sold instanceof \think\Paginator): $i = 0; $__LIST__ = $sold;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$document): $mod = ($i % 2 );++$i;?>
                                    <img src="__ROOT__<?php echo get_cover_path($document['cover_id']); ?>" alt="...">
                                    <div class="caption">
                                        <h4><?php echo $document['title']; ?></h4>
                                        <p class="zushouInfo">108平套三出售,精装修,拎包入住</p>
                                        <p class="text-danger">95万</p>
                                        <p><a href="<?php echo url('detail?id='.$document['id']); ?>" class="btn btn-danger zushouBtn">详细信息</a> </p>
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/asset/jquery-1.11.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/asset/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
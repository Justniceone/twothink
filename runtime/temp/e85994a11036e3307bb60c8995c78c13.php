<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"E:\www\twothink\public/../application/home/view/default/activity\index.html";i:1508045161;}*/ ?>
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
        #more{margin: 0 auto; width: 100px}
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

    <div class="container-fluid box">

        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$document): $mod = ($i % 2 );++$i;?>
        <div class="row noticeList ">
            <a href="<?php echo url('detail?id='.$document['id']); ?>">
                <div class="col-xs-2">
                    <img class="noticeImg" src="__ROOT__<?php echo get_cover_path($document['cover_id']); ?>" />
                </div>
                <div class="col-xs-10">
                    <p class="title"><?php echo $document['title']; ?></p>
                    <p class="intro"><?php echo $document['description']; ?></p>
                    <p class="info">浏览: <?php echo $document['view']; ?> <span class="pull-right">创建日期:<?php echo date('Y/m-d',$document['create_time']); ?></span> </p>
                </div>
            </a>
        </div>
        <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
    <div id="more">
        <input type="button" value="获取更多" class="btn btn-primary" id="getmore" >
    </div>
</div>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/asset//jquery-1.11.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/asset/bootstrap/js/bootstrap.min.js"></script>
</body>
<script type="text/javascript">
    var offset=0;
    var length=3;
    var getmore=function(){
        //发送ajax请求获取更多数据
        offset+=3;
        $.getJSON("/home/activity/more.html",{'offset':offset,'length':length},function(data){

            //将数据添加到页面
            if(data.length ===2){
                $('#getmore').val('没有更多数据了');
                $('#getmore').attr('disabled',true);
                return false;
            }

            var html='';
            var src="__ROOT__<?php echo get_cover_path($document['cover_id']); ?>";
            $.each(JSON.parse(data),function(index,obj){
                html+='<div class="row noticeList ">';
                html+='<a href="/home/activity/detail/id/'+obj.id+'.html">';
                html+='<div class="col-xs-2">';
                html+="<img class='noticeImg' src="+src+">";
                html+='</div>';
                html+='<div class="col-xs-10">';
                html+='<p class="title">'+obj.title+'</p>';
                html+='<p class="intro"><?php echo $document['description']; ?></p>';
                html+='<p class="info">浏览: '+obj.view+' <span class="pull-right">创建日期:'+ new Date(obj.create_time*1000).toLocaleDateString() +'</span></p>';
                html+='</div>';
                html+='</a>';
                html+='</div>';
            });

            $('.box').append(html);
        })
    };
    $('#more').click(getmore);
        //发送ajax请求获取更多数据

    //返回列表页面时自动调用getmore方法
    //console.log(history.back());
/*    if(history.length>5){
        getmore();
    }*/
</script>
</html>
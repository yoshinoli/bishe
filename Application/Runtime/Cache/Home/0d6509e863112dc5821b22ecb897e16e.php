<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>首页</title>
    <!-- css样式 -->
<link rel="stylesheet" type="text/css" href="/Application/Public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/infolist.css">
<!-- js操作 -->
<script src="/Application/Public/js/jquery.js"></script>
<script src="/Application/Public/js/bootstrap.js"></script>
<script src="/Application/Public/layer/layer.js"></script>

    <style>
        .changelist {
            height: 75px;
            border: 1px solid #dcdcdc;
            border-radius: 10px;
            text-align: center;
        }

        .goodslist {
            margin-top: 10px;
            height: 270px;
            border: 1px solid #dcdcdc;
            border-radius: 10px;
        }
        .goodslist .img{
            width: 100%;
            height: 180px;
            border-bottom: 1px solid;
        }
        .goodslist .info{
            width: 100%;
            height: 69px;
            padding: 0 4px;
        }
        .goodslist .info_top{
            width: 100%;
            height: 35px;
            line-height: 18px;
            font-weight: 700;
            overflow: hidden;
            /* 超出的文字用省略号 */
            text-overflow: ellipsis;
            /* 作为单行伸缩盒子模型显示 */
            display: -webkit-box;
            /* 盒子的子元素排列方式 */
            -webkit-box-orient: vertical;
            /* 显示行 */
            -webkit-line-clamp: 2;
        }
        .goodslist .info_mid::before{
            content: "￥";
            font-size: 12px;
        }
        .goodslist .info_mid{
            width:100%;
            height: 18px;
            color: red;
            border-bottom: 1px solid #dfdfdf;
        }
        .goodslist .info_bottom{
            width: 100%;
            height: 29px;
            font-size: 12px;
            font-weight: 700;
            margin: 5px 0;
        }
        .goodslist .info_bottom>img{
            width: 24px;
            height: 24px;
            margin: 0 5px;
        }
        .con_footer{
            height: 50px;
            line-height: 50px;
            text-align: center;
        }
    </style>
</head>
<body>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .logo {
            width: 100%;
            text-align: center;
            line-height: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <div id="logo" class="logo">
        logo
    </div>
</body>
</html>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <!-- css样式 -->
<link rel="stylesheet" type="text/css" href="/Application/Public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/infolist.css">
<!-- js操作 -->
<script src="/Application/Public/js/jquery.js"></script>
<script src="/Application/Public/js/bootstrap.js"></script>
<script src="/Application/Public/layer/layer.js"></script>

</head>
<body>
    <?php session_start(); ?>
    <div class="container">
        <div class="input-group" style="padding:20px 10px 10px" value="">
            <input id="searchtext" type="text" class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-default" onclick="search()">搜索</button>
            </div>
        </div>
    </div>
</body>
<script>
    var val = "<?php echo session('val');?>";
    console.log(val);
    $("#searchtext").val(val);
    // 搜索按键
    function search() {
        var val = $("#searchtext").val();
        console.log(val)
        location.href = "/index.php/Home/Index/goodslist?val=" + val;
    }
</script>
</html>
    <div class="container">
        <div class="jumbotron" style="margin-bottom:0">
            <div id="myCarousel" class="carousel slide">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide="1"></li>
                    <li data-target="#myCarousel" data-slide="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="item active">
                        <img src="/Application/Public/img/zuoye1.png" alt="First slide">
                    </div>
                    <div class="item">
                        <img src="/Application/Public/img/zuoye1.png" alt="First slide">
                    </div>
                    <div class="item">
                        <img src="/Application/Public/img/zuoye1.png" alt="First slide">
                    </div>
                </div>
                <a href="#myCarousel" class="carousel-control left" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                </a>
                <a href="#myCarousel" class="carousel-control right" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-left:0;margin-right:0;">
            <div class="col-xs-3">
                <div class="changelist">同城商品</div>
            </div>
            <div class="col-xs-3">
                <div class="changelist">我的积分</div>
            </div>
            <div class="col-xs-3">
                <div class="changelist">热卖商品</div>
            </div>
            <div class="col-xs-3">
                <div class="changelist">商品分类</div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-bottom:75px;">
        <?php if(is_array($goodslist)): $i = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="col-xs-6">
                <div class="goodslist" onclick="todetails(<?php echo ($vo["id"]); ?>)">
                    <!-- <input type="hidden" name="gid" value="<?php echo ($vo["id"]); ?>" id="gid"> -->
                    <div class="img"></div>
                    <div class="info">
                        <div class="info_top">
                            <?php echo ($vo["g_name"]); ?>
                        </div>
                        <div class="info_mid">
                            <?php echo ($vo["g_price"]); ?>
                        </div>
                        <div class="info_bottom">
                            <img src="/Application/Public/img/zuoye1.png" alt=""> <?php echo ($vo["u_nickname"]); ?>
                        </div>
                    </div>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
        <div class="con_footer col-xs-12">
            到底了
        </div>
    </div>
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- css样式 -->
<link rel="stylesheet" type="text/css" href="/Application/Public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/infolist.css">
<!-- js操作 -->
<script src="/Application/Public/js/jquery.js"></script>
<script src="/Application/Public/js/bootstrap.js"></script>
<script src="/Application/Public/layer/layer.js"></script>

    <style>
        .footer{
            position: fixed;
            width: 100%;
            height: 70px;
            bottom: 0;
            left: 0;
            border-top: 1px solid #dcdcdc;
            background-color: #ffffff;
        }
        .footer ul{
            width: 100%;
            height: 100%;
            padding: 0px;
        }
        .footer a,a:hover,a:active,a:visited{
            float: left;
            list-style: none;
            padding: 0px;
            width: 25%;
            color: #27506d;
        }
        .footer li{
            text-align: center;
            font-size: 14px;
        }
        .footer img{
            display: block;
            margin: 0 auto;
            padding: 5px;
        }
        /* 回到顶部 */
        .totop{
            width: 30px;
            height: 30px;
            position: fixed;
            right: 10px;
            bottom: 80px;
            border: 1px solid;
            border-radius: 50%;
            overflow: hidden;
        }
        .totop img{
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- 回到顶部 -->
    <div id="totop" class="totop">
        <img src="/Application/Public/img/totop.png" alt="">
    </div>
    <!-- 底部标签栏 -->
    <div class="footer">
        <ul>
            <a href="<?php echo U('Index/index');?>">
                <img src="/Application/Public/img/tubiao1.png" alt="">
                <li>首页</li>
            </a>
            <a href="<?php echo U('Index/issuance');?>">
                <img src="/Application/Public/img/tubiao2.png" alt="">
                <li>发布</li>
            </a>
            <a href="">
                <img src="/Application/Public/img/tubiao3.png" alt="">
                <li>消息</li>
            </a>
            <a href="<?php echo U('User/index');?>">
                <img src="/Application/Public/img/tubiao4.png" alt="">
                <li>我的</li>
            </a>
        </ul>
    </div>
</body>
<script>
    //返回顶部按钮
    $(function () {
        $('#totop').hide();        //隐藏按钮
        $(window).scroll(function () {
            //当window的scrolltop距离大于300时
            if ($(this).scrollTop() > 300) {
                $('#totop').fadeIn();
            } else {
                $('#totop').fadeOut();
            }
        });
        $('#totop').click(function () {
            $('html,body').animate({ scrollTop: 0 }, 200);
            return false;
        });
    });
</script>
</html>
</body>
<script>
    // 点击商品跳转到详情页
    function todetails(gid){
        // console.log(gid);
        document.location.href="/index.php/Home/Goods/details?gid="+gid;
    }
</script>
</html>
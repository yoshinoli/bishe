<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>评价详情</title>
    <!-- css样式 -->
<link rel="stylesheet" type="text/css" href="/Application/Public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/goodslist.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/infolist.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/usergoodslist.css">
<!-- js操作 -->
<script src="/Application/Public/js/jquery.js"></script>
<script src="/Application/Public/js/bootstrap.js"></script>
<script src="/Application/Public/layer/layer.js"></script>
<script src="/Application/Public/js/bootstrap-datetimepicker.min.js"></script>
<script src="/Application/Public/js/locales/bootstrap-datetimepicker.fr.js"></script>
<!-- <script src="/Application/Public/js/jquery.mobile-1.4.5.js"></script> -->
    <style>
        .zhui{
            padding: 5px;
            border-bottom: 1px solid #d0d0d0;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <?php if(($flag) == "1"): ?><div class="jumbotron" style="margin-bottom:0">
            <div class="media">
                <div class="media-left">
                    <img src="/Application/Public/img/toxiang.png" class="media-object" style="width:60px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo ($info["u_nickname"]); ?></h4>
                    <p><?php echo ($info["e_info"]); ?></p>
                    <p style="font-size:13px"><?php echo ($info["e_time"]); ?></p>
                </div>
            </div>
        </div>
        <div class="zhui">追评</div>
        <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="media">
                <div class="media-left">
                    <img src="/Application/Public/img/toxiang.png" class="media-object" style="width:60px">
                </div>
                <div class="media-body">
                    <h4 class="media-heading"><?php echo ($vo["u_nickname"]); ?></h4>
                    <p><?php echo ($vo["e_info"]); ?></p>
                    <p style="font-size:13px"><?php echo ($vo["e_time"]); ?></p>
                </div>
            </div><?php endforeach; endif; else: echo "" ;endif; ?>
    <?php else: ?>
        <div style="text-align:center;margin-top:20px">
            暂无评价
        </div><?php endif; ?>
    <div style="width:100%;height:70px;"></div>
    <div class="addrfooter" style="background-color:#ff9900;color:black" onclick="javascript:document.location.href='/index.php/Home/Evaluation/add?rid=<?php echo ($_GET['rid']); ?>'">
        追加评价
    </div>
</body>
</html>
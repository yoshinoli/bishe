<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加评论</title>
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
        textarea{
            width: 100%;
            font-size: 17px;
            padding: 5px;
            line-height: 30px;
        }
    </style>
</head>
<body>
    <form>
        <textarea id="info" name="info" cols="30" rows="6" placeholder="你想说点啥"></textarea>                
    </form>
    <div id="wordsdiv" class="addrfooter" style="background-color:#ff9900;color:black">
        发表留言
    </div>
</body>
<script>
    $("#wordsdiv").click(function(){
        var info = $("#info").val();
        var gid = <?php echo ($_GET['gid']); ?>;
        console.log(info)
        $.ajax({
            url:"<?php echo U('Words/add');?>",
            async:true,
            type:'post',
            data:{info:info,gid:gid},
            dataType:'json',
            success:function(res){
                if(res.code==100){
                    // document.location.href='/index.php/Home/Words/index?gid='+res.gid;
                    // history.go(-1);
                    self.location=document.referrer;
                }else if(res.code==200){
                    layer.msg('操作失败，判断用户是否登录');
                }
            },error:function(res){
                console.log(res)
            }
        })
    })
</script>
</html>
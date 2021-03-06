<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>新增收货地址</title>
    <!-- css样式 -->
<link rel="stylesheet" type="text/css" href="/Application/Public/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/infolist.css">
<link rel="stylesheet" type="text/css" href="/Application/Public/css/usergoodslist.css">
<!-- js操作 -->
<script src="/Application/Public/js/jquery.js"></script>
<script src="/Application/Public/js/bootstrap.js"></script>
<script src="/Application/Public/layer/layer.js"></script>
<script src="/Application/Public/js/bootstrap-datetimepicker.min.js"></script>
<script src="/Application/Public/js/locales/bootstrap-datetimepicker.fr.js"></script>
</head>
<body>
    <form id="addrform">
        <div class="list">
            <span class="span1">
                <input type="text" name="province" placeholder="请输入省份" value="">
            </span>
            <span class="span2">&gt;</span>
        </div>
        <div class="list">
            <span class="span1">
                <input type="text" name="city" placeholder="请输入城市" value="">
            </span>
            <span class="span2">&gt;</span>
        </div>
        <div class="list">
            <span class="span1">
                <input type="text" name="area" placeholder="请输入区县" value="">
            </span>
            <span class="span2">&gt;</span>
        </div>
        <div class="list">
            <span class="span1">
                <input type="text" name="street" placeholder="请输入街道" value="">
            </span>
            <span class="span2">&gt;</span>
        </div>
        <div class="list">
            <span class="span1">
                <input type="text" name="addr" placeholder="请输入详细地址" value="">
            </span>
            <span class="span2">&gt;</span>
        </div>
        <div class="list">
            <span class="span1">
                <input type="text" name="name" placeholder="请输入收件人姓名" value="">
            </span>
            <span class="span2">&gt;</span>
        </div>
        <div class="list">
            <span class="span1">
                <input type="text" name="phone" placeholder="请输入收件人联系电话" value="">
            </span>
            <span class="span2">&gt;</span>
        </div>
        <div class="list">
            <span class="span1">
                <input type="text" name="post" placeholder="请输入邮政编码" value="">
            </span>
            <span class="span2">&gt;</span>
        </div>
    </form>
    <div class="addrfooter" id="addrdiv">
        保存地址
    </div>
</body>
<script>
    $("#addrdiv").click(function(){
        var form_data = $("#addrform").serializeArray();
        $.ajax({
            url:"<?php echo U('Address/add');?>",
            async:true,
            type:'post',
            data:{data:form_data},
            dataType:'json',
            success:function(res){
                if(res.code==100){
                    document.location.href="/index.php/Home/Address/index";
                }
            },error:function(res){
                console.log(res)
            }
        })
    })
</script>
</html>
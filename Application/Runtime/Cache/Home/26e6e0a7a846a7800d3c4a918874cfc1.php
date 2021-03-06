<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>发布商品</title>
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
    /* 页面标题显示 */
    .pagetitle{
        text-align: center;
        line-height: 50px;
        /* background-color: #ffec13; */
        position: fixed;
        width: 100%;
        top: 0;
        /* box-shadow: darkgrey 0px 2px 10px 0px; */
    }
</style>
    <style>
        textarea{
            width: 100%;
            font-size: 17px;
            padding: 5px;
            line-height: 30px;
            outline: none;
        }
        .fsbtn{
            float: right;
            padding: 5px;
            margin: 10px;
            outline: none;
        }
        .in{
            background-color: #fff4ee;
            color: #ff663a;
        }
        select{
            outline: none;
            -webkit-appearance: none;
            position: absolute;
            width: 75%;
        }
        .file_upload{
            position: absolute;
            width: 23%;
            margin-left: 2px;
            opacity: 0;
            z-index: 20;
        }
        .addpic{
            width: 23%;
            margin-left: 2px;
            opacity: 0.5;
        }
    </style>
</head>
<body>
    <form id="fabuform">
        <div class="addimg">
            <textarea id="info" name="name" id="name" cols="30" rows="6" placeholder="描述宝贝的转手原因、入手聚到和使用感受"></textarea>
            <input type="file" accept="images/*" capture="camera" class="file_upload" multiple="multiple" name="img[]"/>
            <input type="hidden" id="photo" name="photo" value="">
            <img src="/Application/Public/img/addimg.jpg" class="addpic" alt="">
        </div> 
        <div class="list" style="margin-top: 30px;">
            <span class="span1">价格</span>
            <span>
                <input id="price" type="text" name="price" placeholder="" value="">
            </span>
            <span class="span2">&gt;</span>
        </div>
        <div class="list">
            <span class="span1">分类</span>
            <span>
                <!-- <input type="text" name="type" placeholder="" value=""> -->
                <select name="type">
                    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["type"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </span>
            <span class="span2">&gt;</span>
        </div> 
        <!-- <div class="list">
            <span class="span1">交易方式</span>
            <input type="hidden" id="type" name="fs" value="">
            <button type="button" class="fsbtn" style="outline:none;">同城交易</button><button type="button" class="fsbtn" style="outline:none;">邮寄</button>
        </div>               -->
    </form>
    <div id="fabudiv" class="addrfooter" style="background-color:#ff9900;color:black">
        确认发布
    </div>
</body>
<script>
    $(".file_upload").css('height',$(".file_upload").css('width'));
    // 添加图片
    // 本地图片预览
    // $(".file_upload").change(function() {
    //     var file = $(this);
    //     console.log(file)
    //     var fileObj = file[0];
    //     var windowURL = window.URL || window.webkitURL;
    //     var dataURL;
    //     for (var i = 0; fileObj && fileObj.files && fileObj.files[i]; i++) {
    //         dataURL = windowURL.createObjectURL(fileObj.files[i]);
    //         console.log(dataURL);
    //         $("#img"+(i+1)).attr('src', dataURL);
    //         $("#img"+(i+1)).attr('width', '23%');
    //         $("#img"+(i+1)).css('height',$("#img"+(i+1)).css('width'));
    //     }
    // });
    // 添加到临时文件夹并预览
    $(".file_upload").change(function () {    
        var formData=new FormData();     
        var length =  $(".file_upload")[0].files['length'];
        console.log(length);
        for(var i=0;i<length;i++){
            formData.append('img'+i, $(".file_upload")[0].files[i]);  /*获取上传的图片对象*/ 
        }
        console.log(formData.getAll('img')) 
        $.ajax({      
            url: "<?php echo U('Goods/addimg');?>",          
            type: 'POST',          
            data: formData,          
            contentType: false,          
            processData: false,          
            success: function (res) { 
                var imgname = "";       
                console.log(res.data[0]);  /*服务器端的图片地址*/   
                for(var i=0;i<res.data.length;i++){
                    console.log(res.data[i])
                    var img = $("<img>");
                    img.attr('width', '23%');
                    img.css('height',$("#img"+(i+1)).css('width'));
                    console.log(img)
                    img.attr('src',res.data[i]);
                    $(".addimg").append(img);
                    imgname=imgname.concat(" "+res.data[i]);
                }
                $("#photo").val(imgname);
                console.log($("#photo").val())
            }      
        }) 
    })
    // 按钮切换状态
    $(".fsbtn").click(function(){
        var index = $(".fsbtn").index(this);
        if($('.fsbtn').eq(index).hasClass('in')){
            $('.fsbtn').eq(index).removeClass('in');
        }else{
            $('.fsbtn').removeClass('in');
            $('.fsbtn').eq(index).addClass('in');
            $("#type").val(index);
        }
    })
    $("#fabudiv").click(function(){
        if($("#info").val()==""){
            layer.msg("宝贝描述信息不够完善");
        }else{
            if($("#price").val()==""){
                layer.msg("价格未设置");
            }else{
                var pzz=/^[0-9]+(.[0-9]{1,2})?$/;
                if (pzz.test($("#price").val())) {
                    var form_data = $("#fabuform").serializeArray();
                    $.ajax({
                        url:"<?php echo U('Goods/fabu');?>",
                        async:true,
                        type:'post',
                        data:{data:form_data},
                        dataType:'json',
                        success:function(res){
                            if(res.code==100){
                                document.location.href="/index.php/Home/Goods/details?gid="+res.gid;
                            }
                        },error:function(res){
                            console.log(res)
                        }
                    })
                } else {
                    layer.msg("价格格式不正确");
                }
                
            }
        }
    })
</script>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
<meta charset="utf-8">
<title>耗材列表</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<meta name="apple-mobile-web-app-title" content="Amaze UI" />
<link rel="stylesheet" href="/sign/Public/index/assets/css/amazeui.min.css"/>
<link rel="stylesheet" href="/sign/Public/index/assets/css/admin.css">
<script src="/sign/Public/index/assets/js/jquery.min.js"></script>
<script src="/sign/Public/index/assets/js/app.js"></script>
</head>
<body>
</head>

<body>
<header class="am-topbar admin-header">
  <div class="am-topbar-brand"><img src="/sign/Public/index/assets/i/logo.png"></div>
  <div class="am-collapse am-topbar-collapse" id="topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav admin-header-list">

      <li class="am-hide-sm-only" style="float: right;"><a href="javascript:;" id="admin-fullscreen"><span class="am-icon-arrows-alt"></span> <span class="admin-fullText">开启全屏</span></a></li>
    </ul>
  </div>
</header>

<div class="am-cf admin-main"> 

<div class="nav-navicon admin-main admin-sidebar">
    
    
    <div class="sideMenu am-icon-dashboard" style="color:#aeb2b7; margin: 10px 0 0 0;"> 欢迎系统管理员：<?php echo (session('username')); ?> <a href="<?php echo U('index/index');?>" style="color: #aeb2b7;">注销</a></div>
    <div class="sideMenu">
      <h3 class="am-icon-flag"><em></em> <a href="#">用户信息管理</a></h3>
      <ul style="list-style: none;">
        <li><a href=""><a href="<?php echo U('yonghuliebiao');?>">用户列表</a></a></li>
      </ul>

      <h3 class="am-icon-users"><em></em> <a href="#">收货地址管理</a></h3>
      <ul style="list-style: none;">
        <li><a href="<?php echo U('shouhuoliebiao');?>">收货地址列表</a></li>
        <li><a href="<?php echo U('tianjiashouhuo');?>">添加收货地址</a></li>
      </ul>

      <h3 class="am-icon-cart-plus"><em></em> <a href="#">订单信息管理</a></h3>
      <ul style="list-style: none;">
        <li><a href="<?php echo U('dingdanliebiao');?>">订单列表</a></li>
        <li><a href="<?php echo U('wuliuliebiao');?>">物流列表</a></li>
      </ul>

      <h3 class="am-icon-volume-up"><em></em> <a href="#">售后信息管理</a></h3>
      <ul style="list-style: none;">
        <li><a href="<?php echo U('shenqingliebiao');?>">售后申请列表</a></li>
        <li><a href="<?php echo U('jinduliebiao');?>">进度列表</a></li>
      </ul>

      <h3 class="am-icon-gears"><em></em> <a href="#">耗材信息管理</a></h3>
      <ul style="list-style: none;">
        <li><a href="<?php echo U('haocailiebiao');?>">耗材列表</a></li>
        <li><a href="<?php echo U('tianjiahaocai');?>">添加耗材</a></li>
      </ul>

    </div>
    
    <script type="text/javascript">
      jQuery(".sideMenu").slide({
        titCell:"h3", //鼠标触发对象
        targetCell:"ul", //与titCell一一对应，第n个titCell控制第n个targetCell的显示隐藏
        effect:"slideDown", //targetCell下拉效果
        delayTime:300 , //效果时间
        triggerTime:150, //鼠标延迟触发时间（默认150）
        defaultPlay:true,//默认是否执行效果（默认true）
        returnDefault:true //鼠标从.sideMen移走后返回默认状态（默认false）
        });
    </script>    
</div>
<div class="admin-biaogelist">

    <div class="listbiaoti am-cf">
      <ul class="am-icon-gears">耗材信息管理</ul>
      
      <dl class="am-icon-home" style="float: right;"> 当前位置： 耗材列表 > <a href="<?php echo U('index/main');?>">首页</a></dl>
      
      <dl>
        <a href="<?php echo U('tianjiahaocai');?>"><button type="button" class="am-btn am-btn-danger am-round am-btn-xs am-icon-plus">添加耗材</button></a>
      </dl>     
    </div>

    <form class="am-form am-g" action="<?php echo U('haocailiebiao');?>" method="post">
          <table width="100%" class="am-table am-table-bordered am-table-radius am-table-striped">
            <thead>
              <tr class="am-success">
                <th class="table-title">名称</th>
                <th class="table-type">价格</th>
                <th class="table-author am-hide-sm-only" width="35%">图片</th>
                <th width="163px" class="table-set">操作</th>
              </tr>
            </thead>
            <tbody>
            <?php if(is_array($re)): $i = 0; $__LIST__ = $re;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$er): $mod = ($i % 2 );++$i;?><tr>
                <td><?php echo ($er["name"]); ?></td>
                <td><?php echo ($er["price"]); ?></td>
                <td class="am-hide-sm-only"><img style="width: 13%;height: 13%;" src="/sign/Public/<?php echo ($er["img"]); ?>"></td>
                <td><div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                      <a href="<?php echo U('xiugaihaocai',array('id'=>$er['id']));?>"><button name="<?php echo ($er["id"]); ?>" type="button" title="修改耗材" class="am-btn am-btn-default am-btn-xs am-text-success am-round"><span class="am-icon-pencil-square-o"></span> </button></a>
                      <a href="#"><button name="shanchu" type="button" id="<?php echo ($er["id"]); ?>" title="删除耗材" class="am-btn am-btn-default am-btn-xs am-text-danger am-round"><span class="am-icon-trash-o"></span></button></a>
                    </div>
                  </div></td>
              </tr><?php endforeach; endif; else: echo "" ;endif; ?>            
            </tbody>
          </table>
          <div class="am-btn-group am-btn-group-xs">
            </div>
        <hr />
          <p>
        备注：操作图标含义
         <a class="am-text-success am-icon-file" title="修改耗材"> 修改耗材</a> 
         <a class="am-icon-trash-o am-text-danger" title="删除"> 删除耗材</a>
        </p>
        </form>
 
<div class="foods">
      <ul>标记后台管理系统</ul>
      <dl><a href="" title="返回头部" class="am-icon-btn am-icon-arrow-up"></a></dl>    
    </div>
</div>
</div>
</div>
</body>
<script src="/sign/Public/index/assets/js/amazeui.min.js"></script>
<script type="text/javascript">
 $(".am-text-danger").click(function(){
   $(this).parents('tr').css('display','none');  
  })
  $(".am-text-danger").click(function(){
      var id=$(this).attr('id');     
        $.ajax({  
                url:"<?php echo U('shanchuhaocai');?>",  
                type:"post",  
//            async:false,//同步  
                data:{"id":id},//传出的数据  
                dataType:"json",//返回的数据类型，常用：html/text/json  
                success:function(data){ 
                   alert($data);                      
                }  
            })     
  }) 
</script>
</html>
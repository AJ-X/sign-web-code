<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
<meta charset="utf-8">
<title>修改订单状态</title>
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

<div class=" admin-content">

<div class="admin-biaogelist">
  
    <div class="listbiaoti am-cf">
      <ul class="am-icon-flag on"> 修改订单状态</ul>
      
      <dl class="am-icon-home" style="float: right;"> 当前位置： 修改订单状态 > <a href="<?php echo U('index/main');?>">首页</a></dl>

      
      
    </div>
  
    <div class="fbneirong">
      <form class="am-form" enctype="multipart/form-data" action="<?php echo U('dingdanxiugai');?>" method="post">
        <input type="hidden" name="id" class="am-input-sm" id="doc-ipt-email-1" value="<?php echo ($re["id"]); ?>">
        <div class="am-form-group am-cf">
          <div class="zuo">用户名:</div>
          <div class="you">
            <input type="text" readonly="readonly" name="username" class="am-input-sm" id="doc-ipt-email-1" value="<?php echo ($res["username"]); ?>">
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="zuo">订单名称:</div>
          <div class="you">
            <input type="tel" readonly="readonly" name="name" class="am-input-sm" id="doc-ipt-pwd-1" value="<?php echo ($re["name"]); ?>">
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="zuo">订单价格:</div>
          <div class="you">
            <input type="email" readonly="readonly" name="price" class="am-input-sm" id="doc-ipt-pwd-1" value="<?php echo ($re["price"]); ?>">
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="zuo">订单时间:</div>
          <div class="you">
            <input type="text" readonly="readonly" name="time1" class="am-input-sm" id="doc-ipt-pwd-1" value="<?php echo (date('Y-m-d H:i:s',$re["time"])); ?>">
          </div>
        </div>
        <input type="hidden" name="time" class="am-input-sm" id="doc-ipt-pwd-1" value="<?php echo ($re["time"]); ?>">
        <div class="am-form-group am-cf">
          <div class="zuo">订单状态:</div>
          <div class="you">
            <select class="am-input-sm" name="status">
              <option value="待付款">待付款</option>
              <option value="待发货">待发货</option>
              <option value="待收货">待收货</option>
              <option value="待评价">待评价</option>
              <option value="已完成">已完成</option>
            </select>
          </div>
        </div>
        <div class="am-form-group am-cf">
          <div class="you" style="margin-left: 11%;">
              <button type="submit" class="am-btn am-btn-success am-radius">修改</button>&nbsp;  &raquo; &nbsp; <button type="reset" class="am-btn am-btn-secondary am-radius">重置</button>
          </div>
        </div>
      </form>
    </div> 
 <div class="foods">
      <ul>标记后台管理系统</ul>
      <dl><a href="" title="返回头部" class="am-icon-btn am-icon-arrow-up"></a></dl>    
    </div>
</div>
</div>
</div>
<script src="/sign/Public/index/assets/js/amazeui.min.js"></script>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no"/>
	<title><?php e($title.' - '.config('site_name'));?></title>
	<link rel="icon" href="/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mdui@0.4.3/dist/css/mdui.min.css">
	<link rel="stylesheet" href="//<?php print($_SERVER['HTTP_HOST']) ?>/view/nexmoe/theme/style.css">
	<script src="https://cdn.jsdelivr.net/npm/mdui@0.4.3/dist/js/mdui.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.css">
	<script src="https://cdn.jsdelivr.net/npm/aplayer/dist/APlayer.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/meting@2/dist/Meting.min.js"></script>
	<script async custom-element="amp-auto-ads" src="https://cdn.ampproject.org/v0/amp-auto-ads-0.1.js"></script>
</head>
<body class="mdui-theme-primary-blue-grey mdui-theme-accent-blue">
	<header class="nav">
		<div class="navSize">
			<a href="/"><img class="avatar" src="//<?php print($_SERVER['HTTP_HOST']) ?>/favicon.ico" /></a>
			<div class="navRight">
			    <li class="navli"><a href="https://www.aoe.top" target="_blank">博客</a></li>
			    <li class="navli"><a href="https://mod.3dmgame.com/u/9688990" target="_blank">Mod</a></li>
			    <li class="navli"><a href="https://wanwang.aliyun.com/nametrade/detail/online.html?domainName=aoe.top" target="_blank">买下我</a></li>
				<!--<ul class="navul">-->
				<!--	<li class="navli"><a href="https://www.aoe.top" target="_blank">博客</a></li>-->
					<!--<li class="navli"><a href="//<?php print($_SERVER['HTTP_HOST']) ?>/?/login">登陆</a></li>-->
				<!--</ul>-->
				<!--<div class="icon"></div>-->
			</div>
		</div>
	</header>
	<div class="mdui-container">
	    <div class="mdui-container-fluid">
	    <div class="mdui-toolbar nexmoe-item">
			<a href="/"><?php e(config('site_name'));?></a>
			<?php foreach((array)$navs as $n=>$l):?>
			<i class="mdui-icon material-icons mdui-icon-dark" style="margin:0;">chevron_right</i>
			<a href="<?php e($l);?>"><?php e($n);?></a>
			<?php endforeach;?>
			<!--<a href="javascript:;" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">refresh</i></a>-->
		</div>
		</div>
    	<?php view::section('content');?>
  	</div>
	<!--<script src="//<?php print($_SERVER['HTTP_HOST']) ?>/view/nexmoe/theme/personjs.js"></script>-->
	<!--底部-->
	<div class="fotter">
	    <p>小莫网盘 @2020-<?=date("Y") ?> 如果网盘中有包含侵犯您权利的内容，请联系邮箱xm@xmsky.onmicrosoft.com</p>
	    <p><a href="javascript:buyMeCoffee()">给小莫投食</a></p>
	    <div class="buyMeCoffee"><img src="//<?php print($_SERVER['HTTP_HOST']) ?>/view/nexmoe/theme/buyMeCoffee.png" attr="给小莫投食" onclick="buyMeCoffee()"></div>
	</div>
	<script type='text/javascript' src='//<?php print($_SERVER['HTTP_HOST']) ?>/view/nexmoe/theme/layer.js'></script>
    <!--Google广告代码-->
    <script data-ad-client="ca-pub-5978423097771370" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <!-- Google统计代码 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-130847064-2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'UA-130847064-2');
    </script>
    <script>
        //百度链接提交
        var bp = document.createElement('script');
        var curProtocol = window.location.protocol.split(':')[0];
        if (curProtocol === 'https') {
            bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
        }
        else {
            bp.src = 'http://push.zhanzhang.baidu.com/push.js';
        }
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    </script>
    <script>
       function buyMeCoffee() {
           
            layer.open({
                type:1,
                area:['300px', '400px'],
                title:'给小莫投食',
                resize:false,
                scrollbar:false,
                shadeClose : true,
                content:'<div class="donate-box"><div class="meta-pay text-center"><strong>小莫已经懒到不想动了<br/>或许给小莫投点食能让小莫有点动力</strong></div><div class="qr-pay text-center"><img class="pay-img" id="alipay_qr" src="http://www.aoe.top/wp-content/uploads/2020/04/zfb.png"><img class="pay-img d-none" id="wechat_qr" src="http://www.aoe.top/wp-content/uploads/2020/04/wx.png"></div><div class="choose-pay text-center mt-2"><input id="alipay" type="radio" name="pay-method" checked><label for="alipay" class="pay-button"><img src="https://www.aoe.top/wp-content/themes/kratos-pjax-master/static/images/alipay.png"></label><input id="wechatpay" type="radio" name="pay-method"><label for="wechatpay" class="pay-button"><img src="https://www.aoe.top/wp-content/themes/kratos-pjax-master/static/images/wechat.png"></label></div></div>'
            });
            $('.choose-pay input[type="radio"]').click(function(){
                var id= $(this).attr('id');
                if(id=='alipay'){$('.qr-pay #alipay_qr').removeClass('d-none');$('.qr-pay #wechat_qr').addClass('d-none')};
                if(id=='wechatpay'){$('.qr-pay #alipay_qr').addClass('d-none');$('.qr-pay #wechat_qr').removeClass('d-none')};
            });
        }
    </script>
</body>
</html>
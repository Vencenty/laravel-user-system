<!DOCTYPE HTML>
<html>
<head>
    <title><?php echo e($title ?? '环润创新微销'); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />
    <link href="/static/css/bootstrap.min.css" rel='stylesheet' type='text/css' />
    <link href="/static/css/style.css" rel='stylesheet' type='text/css' />
    <link href="/static/css/style2-new.css" rel='stylesheet' type='text/css' />
    <script src="/static/js/jquery-3.2.1.min.js"></script>
</head>
<body>
<div class="container" style="padding:0;">

    <?php echo $__env->make('common.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->yieldContent('content'); ?>

    
    <?php echo $__env->make('common.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>



    <script>
        window.addEventListener('load', function () {
            // 整个网页高度
            var clientHeight = document.body.clientHeight;
            // 屏幕高度
            var screenHeight = window.screen.height;

            var container = document.querySelector('.container');

            // 网页高度大于手机高度,网页全部展示,
            // 网页高度如果小于手机高度,按照手机高度填充
            if (clientHeight > screenHeight ) {
                container.style.height = clientHeight - 60+ "px";
            } else {
                container.style.height = screenHeight - 60 +'px';
            }
            container.style.background = '#f7f7f7'
        })

</script>
</body>
</html>



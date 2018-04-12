<?php $__env->startSection('content'); ?>
    <div  class="row" style="margin: 0">
    <div class="col-md-12 col-sm-12 col-xs-12 personal-list personal-top">
        <p>
            <img src="/static/image/n1.png" alt="">
            <span>昵称：</span>
            <span class="personal-nam"><?php echo e(auth()->user()->nickname); ?></span>
        </p>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 personal-list">
        <p>
            <img src="/static/image/n2.png" alt="">
            <span>手机号：</span>
            <span class="personal-nam"><?php echo e(auth()->user()->mobile); ?></span>
        </p>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 personal-list">
        <p>
            <img src="/static/image/n3.png" alt="">
            <span>推荐人：</span>
            <span class="personal-nam"><?php echo e(auth()->user()->hasOneAgent->nickname); ?></span>
        </p>
    </div>


    <div class="col-md-12 col-sm-12 col-xs-12 personal-list">
        <p>
            <img src="/static/image/n6.png" alt="">
            <span>预借总额：</span>
            <span class="personal-nam"><?php echo e(auth()->user()->creditotal); ?>元</span>
        </p>
        <div class="personal-detial">
            
        </div>
    </div>
    <div class="col-md-12 col-sm-12 col-xs-12 personal-list">
        <p>
            <img src="/static/image/button-xz.png" alt="">
            <span>已还预借：</span>
            <span class="personal-nam">
            <?php if( auth()->user()->creditotal != 0 ): ?>
                    <?php echo e(auth()->user()->wxbouns); ?>元
                <?php else: ?>
                    0元
                <?php endif; ?>
            </span>
        </p>
    </div>
    <a href="/center/payPassword">
        <div class="col-md-12 col-sm-12 col-xs-12 personal-list personal-line">
            <p>
                <img src="/static/image/n13.png" alt="">
                <span>创建支付密码</span>
            </p>
            <div class="personal-detial"><img src="/static/image/right_nav.png" alt=""></div>
        </div>
    </a>

    <a href="/center/safeQuestion">
        <div class="col-md-12 col-sm-12 col-xs-12 personal-list">
            <p>
                <img src="/static/image/n12.png" alt="">
                <span>设置安全问题</span>
            </p>
            <div class="personal-detial"><img src="/static/image/right_nav.png" alt=""></div>
        </div>
    </a>
        <a href="/center/resetPayPasswordForm">
        <div class="col-md-12 col-sm-12 col-xs-12 personal-list">
            <p>
                <img src="/static/image/n12.png" alt="">
                <span>重置支付密码</span>
            </p>
            <div class="personal-detial"><img src="/static/image/right_nav.png" alt=""></div>
        </div>
    </a>

    
        
        
        
    
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
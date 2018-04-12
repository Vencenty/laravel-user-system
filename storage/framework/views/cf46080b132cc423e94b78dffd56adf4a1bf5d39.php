<?php $__env->startSection('title'); ?>
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row one-member bonus" style="margin-top:70px;margin-bottom: 90px;">
        <ul>
            <!--  <li class="title two-title">奖金查询</li> -->
            <li class="col-md-6 col-sm-6 col-xs-6" style="height:185px;padding:0; border-right:1px solid #d8d8d8;">
                <p class="top-img"><img src="/static/image/keti.png" alt=""></p>
                <p>可提奖金</p>
                <p style="font-size: 1.2em"><strong><?php echo e($data['bonus']); ?></strong>元</p>
                <p style="padding-bottom:6px;font-size: 1.1em;"><a href="/home/income" style="color:#ef4f4f;">财务明细</a></p>
                <p>
        <span class="col-md-6 col-sm-6 col-xs-6" style="border-right:0;">
         <a href='/bonus/transfer'><span class="bonus-btn">转账</span></a>
        </span>
                    <span class="col-md-6 col-sm-6 col-xs-6" style="border-right:0;">
          <a href="/bonus/withdraw"><span class="bonus-btn">提现</span></a>
        </span>
                </p>
            </li>
            <li class="col-md-6 col-sm-6 col-xs-6" style="padding:0;height: 185px;">
                <p class="top-img"><img src="/static/image/shopjia.png" alt=""></p>
                <p>复购专区</p>
                <p style="font-size: 1.2em"><strong><?php echo e($data['fgBalance']); ?></strong>元</p>
                <p style="padding-bottom:6px;font-size: 1.1em;"><a href="/home/fgDetail" style="color:#ef4f4f;">财务明细</a></p>
                <p>
        <span class="col-md-6 col-sm-6 col-xs-6" style="border-right:0;">
         <a href="/exception/build"><span class="bonus-btn">购物</span></a>
        </span>
                    <span class="col-md-6 col-sm-6 col-xs-6" style="border-right: 0;">
          <a href="/bonus/fg"><span class="bonus-btn">转账</span></a>
        </span>
                </p>
            </li>
            <li class="col-md-6 col-sm-6 col-xs-6" style="padding:0; border-right:1px solid #d8d8d8;">
                <p class="top-img"><img src="/static/image/dj.png" alt=""></p>
                <p class="top-img2">冻结奖金</p>
                <p style="font-size: 1.2em"><strong><?php echo e($data['frozen']); ?></strong>元</p>
            </li>
            <li class="col-md-6 col-sm-6 col-xs-6" style="padding:0;">
                <p class="top-img"><img src="/static/image/jie.png" alt=""></p>
                <p class="top-img2">解冻奖金</p>
                <p style="font-size: 1.2em"><strong><?php echo e($data['unfrozen']); ?></strong>元</p>
            </li>
            <li class="col-md-6 col-sm-6 col-xs-6" style="padding:0;border-right:1px solid #d8d8d8;border-bottom:0;">
                <p class="top-img"><img src="/static/image/sj.png" alt=""></p>
                <p class="top-img2">商城余额</p>
                <p style="font-size: 1.2em"><strong><?php echo e($data['mallBalance']); ?></strong>元</p>
            </li>
            <li class="col-md-6 col-sm-6 col-xs-6" style="padding:0;border-bottom:0;">
                <p class="top-img"><img src="/static/image/jifen.png" alt=""></p>
                <p class="top-img2">环润积分</p>
                <p style="font-size: 1.2em"><strong><?php echo e($data['hrCredit']); ?></strong>元</p>
            </li>
        </ul>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('common.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
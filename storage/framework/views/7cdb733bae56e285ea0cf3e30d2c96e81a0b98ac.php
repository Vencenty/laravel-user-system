<?php $__env->startSection('title'); ?>
<?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php if( !empty(auth()->user()->hasOneQR->imgaddress)): ?>
        <div class="row second-wrap" style="padding-top: 0;margin-top:70px;">
            <div class="col-md-12 col-sm-12 col-xs-12 form-wrap" style="padding:0;">
                <img src="<?php echo e(auth()->user()->hasOneQR->imgaddress); ?>" alt="" style="display: block;margin:0 auto;width:100%;">
            </div>
        </div>
    <?php else: ?>
        <?php $__env->startComponent('common.tips'); ?>
            <?php $__env->slot('text'); ?>
                请重新生成您的专属创新微销海报 <br> 注:请在千河商城服务号内，福利中心-微销海报生成。
            <?php $__env->endSlot(); ?>
        <?php echo $__env->renderComponent(); ?>
    <?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
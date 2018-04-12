<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('common.tips'); ?>
        <?php $__env->slot('text'); ?>
            精彩即将呈现...
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
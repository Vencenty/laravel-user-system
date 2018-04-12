<?php $__env->startSection('title'); ?>
    <?php echo e($title); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('home._form'); ?>
        <?php $__env->slot('frozen'); ?>
            <?php echo e($data['frozen']); ?>

        <?php $__env->endSlot(); ?>
        <?php $__env->slot('unfrozen'); ?>
            <?php echo e($data['unfrozen']); ?>

        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('common.layouts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
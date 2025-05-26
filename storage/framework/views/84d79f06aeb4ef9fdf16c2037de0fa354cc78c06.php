<?php $__env->startSection('head_title', $page_info->page_title.' | '.getcong('site_name') ); ?>
<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection("content"); ?>
 

  <!-- begin:content -->
    <section class="main-container container">
    <h2 class="hsq-heading type-1"><?php echo e($page_info->page_title); ?></h2>
    <div class="content clearfix"> 
      <div class="desc" style="text-align: justify;color: #333333;">
        <?php echo stripslashes($page_info->page_content); ?>

      </div>
    </div>
  </section>
    <!-- end:content -->
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make("app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/pages.blade.php ENDPATH**/ ?>
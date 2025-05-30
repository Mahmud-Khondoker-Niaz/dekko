<?php $__env->startSection('head_title', 'Page not found! | '.getcong('site_name') ); ?>
 
<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection("content"); ?>

<!--Breadcrumb Section-->
  <section class="breadcrumb-box" data-parallax="scroll" data-image-src="<?php echo e(URL::asset('site_assets/img/breadcrumb-bg.jpg')); ?>">
    <div class="inner-container container">
      <h1>Page Not Found</h1>
      <div class="breadcrumb">
        <ul class="list-inline">
          <li class="home"><a href="<?php echo e(URL::to('/')); ?>">Home</a></li>
          <li>Page Not Found</li>
        </ul>
      </div>
    </div>
  </section>
  <!--Breadcrumb Section-->
<!-- begin:content -->
    <section class="main-container container">
        <div class="not-found-container">
            <h2 class="hsq-heading type-1">Page Not Found</h2>
            <div class="subtitle">It looks like that page no longer exists.</div>             
        </div>

    </section>
    <!-- end:content -->
      
<?php $__env->stopSection(); ?>

<?php echo $__env->make("app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/errors/404.blade.php ENDPATH**/ ?>
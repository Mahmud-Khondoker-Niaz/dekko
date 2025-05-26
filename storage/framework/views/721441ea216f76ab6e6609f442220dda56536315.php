

<?php $__env->startSection('head_title', trans('Gallery').' | '.getcong('site_name') ); ?>
<?php $__env->startSection('head_url', Request::url()); ?>
<style>


div.gallery:hover {
  border: 1px solid #037a6a;
  
}

div.gallery img {
  width: 100%;
  height: auto;
}


</style>
<?php $__env->startSection("content"); ?>


 

  

  <div class="property-listing">
                  <div class="row">
                    <?php $__currentLoopData = $galleries->where('status',1); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                   <div class="col-md-4">
                      <div class="prod-img boxShadow"> 
                          <div class="verticale-view wow fadeInUp">
                            <div class="row no-gutters">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                  <div class="verticale-view-left">
      
              <?php if($gallery->image): ?>
              <a target="_blank" href="<?php echo e(URL::asset($gallery->image)); ?>">
                <img src="<?php echo e(URL::asset($gallery->image)); ?>" alt="<?php echo e($gallery->caption); ?>">
            </a>
              <?php else: ?>
              <img src="<?php echo e(URL::asset('site_assets/img/avatar.png')); ?>" alt="<?php echo e($gallery->name); ?>">
              <?php endif; ?>  
              

             <div class="bottom-sec">

                <h3 class="agent-name" ><?php echo e($gallery->caption); ?></h3>
                
                
              </div>
</div>
</div>
</div>
</div>
</div>
</div>

      
    
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
   </div>
   
   </div>
    <?php echo $__env->make('_particles.pagination', ['paginator' => $galleries], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
       
  </section>


  <?php $__env->stopSection(); ?>

  
  <?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(URL::asset('site_assets/alert-toastr/toastr.css')); ?> " rel="stylesheet">
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('scripts'); ?>

    <script src="<?php echo e(URL::asset('site_assets/alert-toastr/toastr.js')); ?>"></script>

    <script>
        <?php if(Session::has('success')): ?>
		    	toastr.success("<?php echo e(Session::get('success')); ?>")
        <?php endif; ?>

        <?php if(Session::has('info')): ?>
		    	toastr.info("<?php echo e(Session::get('info')); ?>")
        <?php endif; ?>

        <?php if(Session::has('danger')): ?>
		    	toastr.danger("<?php echo e(Session::get('danger')); ?>")
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/gallery.blade.php ENDPATH**/ ?>
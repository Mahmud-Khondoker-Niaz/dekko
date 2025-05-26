
<section id="main-slider">

<?php $__currentLoopData = \App\Slider::orderBy('id', 'desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="items">
        <img src="<?php echo e(URL::asset('upload/slides/'.$slide->image_name.'.jpg')); ?>" alt="Slide Image">
        
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
</section>

<?php /**PATH /var/www/html/resources/views/_particles/slider.blade.php ENDPATH**/ ?>
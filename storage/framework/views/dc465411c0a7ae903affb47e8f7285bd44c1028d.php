<style>


/* Apply the red round shape to social icons */

  </style>
  <footer id="main-footer"class="footer-overlay">
    <div class="inner-container container">
      <div id="go-up" class="fa fa-angle">Top</div>
      <div class="top-section clearfix">
        <!-- <div class="col-md-4 widgets">
          <h4 class="title"><?php echo e(getcong('footer_widget1_title')); ?></h4> 
          
           
              <p style="   text-align: justify;"  ><?php echo stripslashes(getcong('footer_widget1')); ?></p>
          
           
        </div> -->

        <div class="col-md-6 widgets">
          <h4 class="title"><?php echo e(getcong('footer_widget2_title')); ?></h4>
        
          <?php echo stripslashes(getcong('footer_widget2')); ?>

          <ul class="list-inline">
  <li><a href="<?php echo e(getcong('social_facebook')); ?>" class="fa fa-lg fa-facebook social-icon" target="_blank"></a></li>
  <li><a href="<?php echo e(getcong('social_twitter')); ?>" class="fa fa-lg fa-youtube-play social-icon" target="_blank"></a></li>
  <li><a href="<?php echo e(getcong('social_linkedin')); ?>" class="fa fa-lg fa-linkedin social-icon" target="_blank"></a></li>
  <li><a href="<?php echo e(getcong('social_instagram')); ?>" class="fa fa-lg fa-instagram social-icon" target="_blank"></a></li>
</ul>

            <div class="newsletter widget-box">
             <h4><?php echo e(trans('words.get_newsletter')); ?></h4> 
  
              <?php if(Session::has('error_flash_message')): ?>
                <div class="alert alert-danger">                  
                    <?php echo e(Session::get('error_flash_message')); ?>

                </div>
              <?php endif; ?>
              <?php if(Session::has('flash_message_subscribe')): ?>
                <div class="alert alert-success">                 
                    <?php echo e(Session::get('flash_message_subscribe')); ?>

                </div>
              <?php endif; ?>

              <?php echo Form::open(array('url' => array('subscribe'),'name'=>'search_form','id'=>'newsletter-form','role'=>'form')); ?>   
              <meta name="_token" content="<?php echo csrf_token(); ?>"/>

              <div class="input-group mb-3">
                <input type="email" name="email" id="email_id" placeholder="<?php echo e(trans('words.email')); ?>" class="form-control" aria-label="Recipient's email" aria-describedby="button-addon2" required>
                <div class="input-group-append">
                  <button class="btn btn-outline-secondary" type="button" id="button-addon2"><?php echo e(trans('words.submit')); ?></button>
                </div>
              </div>

              <?php echo Form::close(); ?> 
	
            
            </div>

        </div>
        <div class="col-md-6 widgets">
          <h4 class="title"><?php echo e(getcong('footer_widget3_title')); ?></h4>
            <?php echo stripslashes(getcong('footer_widget3')); ?>

        </div>
      </div>

      <div class="bott-section clearfix row">
        <div class="col-xs-12 col-md-6 copy-right">
           <p> <?php echo e(getcong('site_copyright')); ?></p>
        </div>
        <div class="col-xs-12 col-md-6 social-icons">
          <ul class="list-inline">
            <?php $__currentLoopData = \App\Pages::where('status','1')->orderBy('id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li><a href="<?php echo e(URL::to('page/'.$page_data->page_slug)); ?>" class=""><?php echo e($page_data->page_title); ?></a></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
            
           </ul>
        </div>
      </div>
    </div>
  </footer>

  <?php $__env->startSection('styles'); ?>
    <link href="<?php echo e(URL::asset('site_assets/alert-toastr/toastr.css')); ?> " rel="stylesheet">
  <?php $__env->stopSection(); ?>

  <?php $__env->startSection('scripts'); ?>

    <script src="<?php echo e(URL::asset('site_assets/alert-toastr/toastr.js')); ?>"></script>

    <script>
        <?php if(Session::has('flash_message_client')): ?>
		    	toastr.success("<?php echo e(Session::get('flash_message_client')); ?>")
        <?php endif; ?>
    </script>
<?php $__env->stopSection(); ?><?php /**PATH /var/www/html/resources/views/_particles/footer.blade.php ENDPATH**/ ?>
<style>

.animated-heading {
  font-size: clamp(32px, calc(32px + ((1vw - 3.75px) * 1.8122977346)), 60px);
  text-align: center;
  line-height: clamp(40px, calc(40px + ((1vw - 3.75px) * 2.5889967638)), 80px);
  color: #e1141e;
  margin-bottom: 1.5rem;
  margin-top: 30px;
  animation: showup 7s infinite;
}

@keyframes  showup {
  0% {
    opacity: 0;
    transform: translateY(20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}

/*.....*/
/* Assuming you want a more professional design with animated effects */
/* Assuming you want a standard list design for the menu */
/* Assuming you want a design with animation and smart color contrast */
/* Assuming you want a modern and attractive design for the menu */
/* Assuming you want a stylish and modern design for the menu */
/* Assuming you want a clean, modern, and attractive design for the menu */
/* Assuming you want a stylish and attractive design for the menu */
/* Assuming you want a standard design with subtle colors and contrast */
/* Assuming you want the same design with a smaller height for the menu */
/* Assuming you want the same design with a smaller height and underlines for each category */
/* Assuming you want the same design with a smaller height and underlines for each category by default */


</style>



<?php $__env->startSection('head_title', trans('Products').' | '.getcong('site_name') ); ?>
<?php $__env->startSection('head_url', Request::url()); ?>

<?php $__env->startSection("content"); ?>
   
    
 
  <section class="main-container container">
<br><br>
<section class="about-section">
  <div class="container">
    <h2 class="about-heading">All Products</h2>
  </div>
</section>

<!-- <h1 style="font-size: clamp(32px,calc(32px + ((1vw - 3.75px) * 1.8122977346)),60px); text-align:center;
    line-height: clamp(40px,calc(40px + ((1vw - 3.75px) * 2.5889967638)),80px);
    color: #e1141e;
    margin-bottom: 1.5rem; animation: showup 7s infinite; margin-top:30px;"><b>All Brands </b> </h1> -->
<br>
  	<aside class="col-sm-3">
    <!--  <div class="sidebar-box sidebar-blog-cat">-->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,300" rel="stylesheet" type="text/css">

<!-- Assuming you have a CSS file to style the menu, include it here -->
<link rel="stylesheet" href="path/to/your/style.css">

<!-- Assuming you have a CSS file to style the menu, include it here -->
<link rel="stylesheet" href="path/to/your/style.css">
<div class="category-menu">
    <!-- <h4 class="cat-head">All Categories</h4> -->
    <ul class="menu-list">
        <?php $__currentLoopData = $allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li class="menu-item">
                <a href="<?php echo e(route('category.single',['slug'=>$result->slug])); ?>" class="category-link" >
                    <span class="category-name"><?php echo e($result->name); ?></span>
                    <span class="product-count"><?php echo e($result->productsbrand->count()); ?></span>
                </a>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</div>





		<!-- <h4 class="cat-head">All Categories</h4><br>
		<ul class="blog-sidebar-menu">

		   
		    <?php $__currentLoopData = $allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		  <li class="list-group-item" >
		        <a href="<?php echo e(route('category.single',['slug'=>$result->slug])); ?>" class="" style="font-size:20px;"><?php echo e($result->name); ?> <span  style="float:right; "><?php echo e($result->productsbrand->count()); ?></span>   </a>
</li>

		     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		</ul> -->
		<!--</div>-->
    </aside>

    <div class="col-sm-9">
      <!-- Properties -->
      
      <div class="content-box" style="border-radius: 20px; z-index:2; ">
      <section class="property-listing boxed-view clearfix" style="margin-top: 0px;padding: 0px;">
        <div class="inner-container clearfix">
          <?php if($products->count()>0): ?>
              <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

          <div class="property-box col-xs-12 col-sm-4  wow fadeInUp " >

            <div class="inner-box" style="margin: -10px;  background-color: #fffff; border-radius:20px; ">
	          <a href="<?php echo e(route('brand.single',['id'=>$result->id])); ?>" class="img-container">

              <?php if($result->image): ?>
              <div class="spinning-image-container">
                <img src="<?php echo e(URL::asset($result->image)); ?>" alt="<?php echo e($result->name); ?>" class="lazyOwl" style="border-radius: 20px;">
              </div>
              <?php endif; ?>
	         
	          </a>
	      
	            <a style="text-align:center" href="<?php echo e(route('brand.single',['id'=>$result->id])); ?>" class="title" style="font-size:14px;"><?php echo e(Str::limit($result->name,100)); ?></a>
	          
       

	         
	        </div>
          </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php else: ?>
          
            <?php endif; ?>
        </div>
      
      </section>
      </div>
      <!-- End of Properties -->
        <!-- Pagination -->
        <div class="blog-pagination" style="margin-top:20px;margin-bottom:20px; text-align:center;">
            <?php echo e($products->links()); ?>

        </div>
        <!-- End of Pagination -->
    </div>
  
  </section>

 
 
<?php $__env->stopSection(); ?>

<?php echo $__env->make("app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/products/index.blade.php ENDPATH**/ ?>
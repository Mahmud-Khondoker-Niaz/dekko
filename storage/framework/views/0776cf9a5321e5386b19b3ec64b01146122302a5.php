
<?php $__env->startSection("content"); ?>

<?php if(getcong('home_properties_layout')=='slider'): ?>

<!-- <?php echo $__env->make("_particles.slider", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->

<?php else: ?>

<?php echo $__env->make("_particles.mapsearch", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php endif; ?>

<div class="slider-container">
<div class="slider">
        <?php $__currentLoopData = \App\Slider::orderBy('id', 'desc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="slide" id="slide<?php echo e($index); ?>">
                <img src="<?php echo e(URL::asset('upload/slides/'.$slide->image_name.'.jpg')); ?>" alt="Slide Image">
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       
    </div>
   
  </div>
 
<script>
  const slider = document.querySelector('.slider');

if (slider) {
    slider.classList.add('slide-animation');
}
  </script>
  
  <br>
  <!--About Header-->      
  <section class="about-section">
        <div class="container">
          <h2 class="about-heading">Our Product Categories</h2>
        </div>
      </section>

 <!--Nav--> 
<nav class="brandlinks">
<?php     $all_cats = \App\Productscategory::orderBy('name', 'asc')->get();
 ?>
<?php $__currentLoopData = $all_cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<a href="<?php echo e(route('category.single',['slug'=>$result->slug])); ?>" class="<?php echo e($result->slug == $result->slug ? 'active' : ''); ?>" style="font-size:20px;"><b><?php echo e($result->name); ?></b></a>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</nav>


<!-- Recent Properties -->

  <section class="Home-page-section boxed-view clearfix">

                    <div class="inner-container container">
                      <div class="row">
                  
                    </div> <!--container-->

                    <!--#propmotions-slider-->
                  
                                        <section id="propmotions-slider" class="boxed-view clearfix" style="border-radius: 10px; background:#f9f9f9;  position: relative;">
                                      <div class="inner-container container">
                                        <div class="owl-carousel-ads-slider owl-theme" style="margin-right: 15px; margin-left: -1px;">
                                          <?php $__currentLoopData = \App\Productscategory::orderBy('name', 'asc')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php $__currentLoopData = $category->productsbrand->sortBy('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <div class="items">
                                                <a href="<?php echo e(route('brand.single', ['id' => $slide->id])); ?>">
                                                  <div class="round-image-container">
                                                    <img class="lazyOwl" data-src="<?php echo e(URL::asset($slide->image)); ?>" alt="">
                                                    <div class="overlay"></div>

                                                  </div>
                                                </a>
                                              </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                      </div>
                                    </section>
                              <!--#propmotions-slider-->
                              <br></br>

                <!--#counting-slider-->
                <br></br>
                <div class="container">
                        <div class="row">
                            <div class="col-md-3 visitors">
                                <div class="counter visitors">
                                    <h2>Since</h2>
                                    <h1><span id="visitorCount">0</span></h1>
                                </div>
                            </div>
                            <div class="col-md-3 brand">
                                <div class="counter brand">
                                    <h2>Brand</h2>
                                    <h1><span id="brandCount">0</span></h1>
                                </div>
                            </div>
                            <div class="col-md-3 sku">
                                <div class="counter sku">
                                    <h2>Units</h2>
                                    <h1><span id="skuCount">0</span></h1>
                                </div>
                            </div>
                            <div class="col-md-3 district">
                                <div class="counter district">
                                    <h2>Employees</h2>
                                    <h1><span id="districtCount">0</span></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                    


                                <!--About Header--> 
                                      <section class="about-section">
                                        <div class="container">
                                          <h2 class="about-heading">About Dekko Foods Ltd</h2>
                                        </div>
                                      </section>
                                      <!--4 Sections--> 
                                <section class="custom-listing boxed-view clearfix">
                                          <div class="inner-container clearfix">
                                          
                                            
                                            <?php
                                              $pages = \App\Pages::where('status', '1')->orderBy('id')->get();
                                              $customTitles = [
                                                'History',
                                                'Hiring',
                                                'Mission and Vision',
                                                'Let You Know'
                                                
                                              
                                              ];
                                            ?>
                                            
                                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                              <div class="custom-box col-xs-12 col-sm-6 wow fadeInUp">
                                                <div class="inner-box">
                                                  <div class="custom-page-box">
                                                    <a href="<?php echo e(URL::to('page/'.$page->page_slug)); ?>" class="custom-title-box">
                                                      <?php echo e(isset($customTitles[$index]) ? $customTitles[$index] : $page->page_title); ?>

                                                    </a>
                                                    <div class="custom-content-box">
                                                      <?php echo substr(strip_tags($page->page_content), 0, 100); ?>

                                                      <?php if(strlen(strip_tags($page->page_content)) > 100): ?> ... <?php endif; ?>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            
                                          </div>
                                        </section>


                                      <!--About Header--> 
                                      <section class="about-section">
                                        <div class="container">
                                          <h2 class="about-heading"><?php echo e(getcong('footer_widget1_title')); ?></h2>
                                        </div>
                                      </section>
                    
                    



    <div class="inner-container container" style="margin-top: 50px;
       margin-bottom: 50px;">
          <div class="top-section clearfix">
         <?php
            $result = \App\Blog::latest()->first();
           ?>
         <?php if($result): ?>
          <div class="col-xs-12 col-md-6 col-sm-12">
            <img src="<?php echo e(URL::asset($result->feature)); ?>" class="blogimage" alt="<?php echo e($result->title); ?>" style="max-width: 100%; height: auto; border-radius:15px; "> 
           </div>
             <div class="col-xs-12 col-md-6 col-sm-12"">
            <h1> <?php echo e($result->title); ?></h1>
             <p style="color: rgb(170, 170, 170);"> <?php echo e($result->created_at->format('j-F-Y')); ?></p>

     <p class="details" style="max-width: 75rem;
         margin: 0 auto clamp(30px,calc(30px + ((1vw - 3.75px) * 1.2944983819)),50px);
           font-size: clamp(16px,calc(16px + ((1vw - 3.75px) * .5177993528)),24px);
              color: #2b2b2b; text-align: justify; opacity: 10; font-variant: small-caps;" > <?php echo Str::limit($result->description,350); ?>

         </p>
         <a href="<?php echo e(route('blog.single',['id'=> $result->id])); ?>" class="btn more-link" >Read More</a>

      </div>
       <?php endif; ?>
     
      </div>
    
     </div>
       
      </div>
       </div>


                                         <!--Bolg-->  <section id="propmotions-slider" class="boxed-view clearfix" style="background-color: #fbfdff;  position: relative;">

                                                            <div class="inner-container container">
                                                                <div class="owl-carousel-ads-slider owl-theme">

                                                                          <?php $__currentLoopData = \App\Blog::orderBy('id','ASC')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <div class="items" >
                                                                        <a href="<?php echo e(route('blog.single',['id'=> $result->id])); ?>" >
                                                                    <p style="color: rgb(170, 170, 170);"> <?php echo e($result->created_at->format('j-F-Y')); ?></p>

                                                                          <img src="<?php echo e(URL::asset($result->feature)); ?>" class="blogimage" alt="<?php echo e($result->title); ?>"  style=" height: 250px;
                                                              width: 350px;" >

                                                                      
                                                                        </a>
                                                                      <br></br>
                                                                    <a href="<?php echo e(route('blog.single',['id'=> $result->id])); ?>" class="title" style="font-size:14px; color:black;"><?php echo e(Str::limit($result->title,80)); ?></a>

                                                                      
                                                                      </div>

                                                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                            </div>

                                                            </section> <!--Bolg-->




                            <!-- Board Of directors -->
                                              
                            <section class="about-section">
                                        <div class="container">
                                          <h2 class="about-heading">Management Profile</h2>
                                        </div>
                                      </section>
<section id="board-of-directors" class="bg-blue text-white text-center py-5">

                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="director-card">
                                                                <img src="<?php echo e(url('/upload/chairman.jpg')); ?>" alt="Chairman" class="director-image">
                                                                <h3>Shahadat Hossain Kiron</h3>
                                                                <p>Chairman</p>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="director-card">
                                                                <img src="<?php echo e(url('/upload/MD.webp')); ?>" alt=" Managing Director" class="director-image">
                                                                <h3>Kalpan Hossain</h3>
                                                                <p>Managing Director</p>
                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="director-card">
                                                                <img src="<?php echo e(url('/upload/D.webp')); ?>" alt=" Director" class="director-image">
                                                                <h3>Kashif Hossain</h3>
                                                                <p>Director</p>
                                                               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            
                                            </section>
                                            <!-- Board Of directors -->
                    

    </section>
 
  <!-- End of Recent Properties -->






<!-- Number Counting Script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Function to animate number counting
        function animateValue(element, start, end, duration) {
            let current = start;
            const range = end - start;
            const increment = end > start ? 1 : -1;
            const stepTime = Math.abs(Math.floor(duration / range));
            
            const timer = setInterval(() => {
                current += increment;
                element.textContent = current.toLocaleString(); // Format with commas
                if (current === end) {
                    clearInterval(timer);
                }
            }, stepTime);
        }

        // Trigger counting animation on page load
        document.addEventListener('DOMContentLoaded', () => {
            const visitorCountElement = document.getElementById('visitorCount');
            const brandCountElement = document.getElementById('brandCount');
            const skuCountElement = document.getElementById('skuCount');
            const districtCountElement = document.getElementById('districtCount');

            animateValue(visitorCountElement, 0, 2002, 2000); // Adjust values and duration as needed
            animateValue(brandCountElement, 0, 27, 2000);
            animateValue(skuCountElement, 0, 50, 2000);
            animateValue(districtCountElement, 0, 5000, 2000);
        });
    </script>
<!-- Number Counting Script -->

  

<?php $__env->stopSection(); ?>



<?php echo $__env->make("app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/pages/index.blade.php ENDPATH**/ ?>
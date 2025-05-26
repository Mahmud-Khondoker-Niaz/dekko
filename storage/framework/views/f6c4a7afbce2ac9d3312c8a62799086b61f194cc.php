
<style>
body {
  margin: 0;
  padding: 0;
}

.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 10px;
  background-color: #f5f5f5;
  position: sticky;
  top: 0;
  margin-bottom: 0;
  z-index: 999;
}
.navbar-logo {
  position: relative;
  z-index: 9999;
}

.navbar-logo a {
  text-decoration: none;
  color: #333;
}

.navbar-logo img {
  max-height: 60px;
  max-width: 60px;
}

.navbar-menu {
  display: flex;
  align-items: center;
  justify-content: center;
  list-style: none;
  margin: 0;
  padding: 0;
}
.navbar-menu li {
  margin-right: 10px;
}

.navbar-menu li:last-child {
  margin-right: 0;
}

.navbar-menu li a {
  text-decoration: none;
  color: #333;
  padding: 10px;
  border-radius: 5px;
}
.navbar-menu li a {
  position: relative;
  transition: all 0.3s ease;
}

.navbar-menu li a:before {
  content: "";
  position: absolute;
  bottom: 0;
  left: 0;
  width: 100%;
  height: 2px;
  background-color: #333;
  transform: scaleX(0);
  transform-origin: left center;
  transition: transform 0.3s ease;
}

.navbar-menu li a:hover:before {
  transform: scaleX(1);
}

.navbar-menu li a:after {
  content: "";
  position: absolute;
  bottom: 0;
  left: 50%;
  width: 0;
  height: 2px;
  background-color: #333;
  transition: width 0.3s ease, left 0.3s ease;
}

.navbar-menu li a:hover:after {
  width: 100%;
  left: 0;
}

.navbar-menu .parent-menu .submenu {
  opacity: 0;
  visibility: hidden;
  transform: translateY(-10px);
  transition: all 0.3s ease;
}

.navbar-menu .parent-menu:hover .submenu {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.navbar-menu li a.active {
 font-size:20px;
 font-weight:bold;
  color: black;
}

.button-62 {
  position : relative ;
    z-index : 0 ;
    width : 240px ;
    height : 56px ;
    text-decoration : none ;
    font-size : 14px ; 
    font-weight : bold ;
    color : var(--line_color) ;
    letter-spacing : 2px ;
    transition : all .3s ease ;
}

.button-62 {
  position: relative;
  display: inline-block;
  overflow: hidden;
  background-color: #FFD814;
  color: #0F1111;
  border: 1px solid #FCD200;
  border-radius: 8px;
  box-shadow: 0 2px 5px 0 rgba(213, 217, 217, 0.5);
  font-size: 11px;
  height: 25px;
  padding: 0 6px;
  text-align: center;
  font-weight: 500;
  cursor: pointer;
  transition: background-color 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
}

.button-62::before {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(255, 255, 255, 0.2);
  transform: scale(0);
  transition: transform 0.3s ease;
}

.button-62:hover::before {
  transform: scale(1);
}

.button-62:hover {
  background-color: #F7CA00;
  border-color: #F2C200;
  box-shadow: 0 2px 5px 0 rgba(213, 217, 217, 0.5);
}

.submenu {
  display: none;
  list-style: none;
  position: absolute;
  background-color: #fff;
  padding: 10px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
  z-index: 999;
}

.submenu li {
  margin-bottom: 5px;
}

.submenu li a {
  display: block;
  padding: 5px;
  border-radius: 5px;
  text-decoration: none;
  color: #333;
  transition: background-color 0.3s ease;
}

.submenu li a:hover {
  background-color: #ddd;
}

.parent-menu:hover .submenu {
  display: block;
}

.navbar-auth {
  margin-left: auto;
}

.toggle-label {
  cursor: pointer;
  display: none;
}

.toggle-input {
  display: none;
}


.navbar-logo {
  display: block; /* Show the desktop logo by default */
}

/* Default styles for the mobile logo (visible only on mobile devices) */
.mobile-logo {
  display: none; /* Hide the mobile logo by default */
}


@media (max-width: 768px) {
  .navbar-menu {
    display: none;
  }

  .toggle-input {
    display: none;
  }

  .toggle-label {
    display: block;
    width: 30px;
    height: 30px;
    position: relative;
    cursor: pointer;
  }
  .navbar-logo {
    display: none;
  }
  
  /* Show the mobile logo on mobile devices */
  .mobile-logo {
    display: block;
  }

  /* Adjust other styles as needed for mobile layout */
  /* For example, you can show the hamburger menu icon */
  .toggle-label {
    display: block; /* Show the hamburger menu icon for mobile */
  }

  .toggle-label span {
    position: absolute;
    background-color: #333;
    width: 100%;
    height: 3px;
    left: 0;
    transition: all 0.3s ease;
  }

  .toggle-label span:nth-child(2) {
    top: 50%;
    transform: translateY(-50%);
  }

  .toggle-label span:nth-child(3) {
    top: 100%;
  }

  .toggle-input:checked ~ .navbar-menu {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    background-color: #f5f5f5;
    padding: 10px;
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    z-index: 999;
  }

  .toggle-input:checked ~ .navbar-menu li {
    margin-bottom: 10px;
  }

  .toggle-input:checked ~ .navbar-menu li:last-child {
    margin-bottom: 0;
  }

  .toggle-input:checked ~ .navbar-menu li a {
    display: block;
    padding: 10px;
    border-radius: 5px;
    text-decoration: none;
    color: #333;
    background-color: #fff;
  }

  .toggle-input:checked ~ .navbar-menu li a.active {
    background-color: #333;
    color: #fff;
  }

  .toggle-input:checked ~ .navbar-menu .parent-menu .submenu {
    display: none;
  }

  .navbar-auth {
    margin-left: 0;
    margin-top: 10px;
  }
}
/* Add the following CSS rules to adjust the layout for mobile view */
/* Assuming you have the existing CSS as provided earlier */

/* Add the following CSS rules to adjust the layout for mobile view */
/* Assuming you have the existing CSS as provided earlier */

/* Add the following CSS rules to adjust the layout for mobile view */
/* Assuming you have the existing CSS as provided earlier */

/* Add the following CSS rules to adjust the layout for mobile view */

/* Styles for the dropdown menu */
/* Styles for the dropdown menu */
.navbar-menu li {
  position: relative;
}

.navbar-menu li:hover > ul.dropdown {
  display: block; /* Show the product categories list on hover */
}

/* Hide the product categories list by default */
.dropdown {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  background: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
  backdrop-filter: blur(5px); /* Blur effect for a glass-like appearance */
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  padding: 10px;
  list-style: none;
  margin: 0;
  border-radius: 5px; /* Rounded corners for the dropdown */
  z-index: 1; /* Ensure the dropdown appears above other content */
}

/* Styles for the individual menu items within the dropdown */
.dropdown li {
  margin: 5px 0;
}

.dropdown li a {
  color: #333;
  text-decoration: none;
  display: block;
  padding: 5px 10px; /* Add padding to each menu item */
  transition: background-color 0.2s; /* Add a smooth transition on hover */
}

.dropdown li a:hover {
  background-color: #f0f0f0; /* Background color on hover */
  color: #f00; /* Text color on hover, change as desired */
}
.brand-categories {
  display: none;
  position: absolute;
  top: 0;
  left: 100%;
  background-color: #f9f9f9;
  /* Add other styles as needed for your dropdown appearance */
}
.category-item {
  display: block;
  position: relative;
}
.category-item:hover .brand-categories {
  display: block;
}

</style>

<nav class="navbar">
<div class="mobile-logo">
    <a href="<?php echo e(URL::to('/')); ?>">
      <?php if(getcong('site_logo')): ?>
        <img src="<?php echo e(URL::asset('upload/'.getcong('site_logo'))); ?>" alt="<?php echo e(getcong('site_name')); ?>" width="100">
      <?php else: ?>
        <span><?php echo e(getcong('site_name')); ?></span>
      <?php endif; ?>
    </a>
  </div>
  <input type="checkbox" id="toggle" class="toggle-input">
  <label for="toggle" class="toggle-label">
    <span></span>
    <span></span>
    <span></span>
  </label>
  <ul class="navbar-menu">
    <li><a href="<?php echo e(URL::to('/')); ?>" class="<?php echo e(Request::is('/') ? 'active' : ''); ?>"><?php echo e(trans('words.home')); ?></a></li>
    <!-- <li><a href="<?php echo e(URL::to('products')); ?>" class="<?php echo e(Request::is('products*') ? 'active' : ''); ?>"><?php echo e('Products'); ?></a></li> -->
    <li>
  <a href="<?php echo e(URL::to('products')); ?>" class="<?php echo e(Request::is('products*') ? 'active' : ''); ?>">Products</a>
  <ul class="dropdown">
  <?php $allcategories= \App\Productscategory::all(); ?>
        <?php $__currentLoopData = $allcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <li class="category-item">
            <a href="<?php echo e(route('category.single',['slug'=>$result->slug])); ?>" class="category-link">
              <span class="category-name"><?php echo e($result->name); ?></span>
            </a>
            <?php $brandcategories = \App\Brandcategory::where('productscategory_id', $result->id)->get(); ?>
        <?php if(count($brandcategories) > 0): ?>
          <ul class="brand-categories">
            <?php $__currentLoopData = $brandcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li>
                <a href="<?php echo e(route('brandcategory.single',['slug'=>$sub->slug])); ?>" class="category-link">
                  <span class="category-name"><?php echo e($sub->name); ?></span>
                </a>
              </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
        <?php endif; ?>
          </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
</li>

    <li><a href="<?php echo e(route('blog')); ?>" class="<?php echo e(Request::is('blog*') ? 'active' : ''); ?>"><?php echo e('Blog'); ?></a></li>
    <li><a href="<?php echo e(URL::to('gallery')); ?>" class="<?php echo e(Request::is('gallery*') ? 'active' : ''); ?>"><?php echo e('Gallery'); ?></a></li>
    <div class="navbar-logo">
    <a href="<?php echo e(URL::to('/')); ?>">
      <?php if(getcong('site_logo')): ?>
        <img src="<?php echo e(URL::asset('upload/'.getcong('site_logo'))); ?>" alt="<?php echo e(getcong('site_name')); ?>" width="100">
      <?php else: ?>
        <span><?php echo e(getcong('site_name')); ?></span>
      <?php endif; ?>
    </a>
  </div>

    <li><a href="<?php echo e(URL::to('contact-us/')); ?>" class="<?php echo e(Request::is('contact*') ? 'active' : ''); ?>"><?php echo e('Contact'); ?></a></li>
    <?php $__currentLoopData = \App\Pages::where('status', '1')->orderBy('id')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page_data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($page_data->page_title == 'About Us'): ?>
        <li><a href="<?php echo e(URL::to('page/'.$page_data->page_slug)); ?>" class="<?php echo e(Request::is('page/'.$page_data->page_slug) ? 'active' : ''); ?>"><?php echo e($page_data->page_title); ?></a></li>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
    
    <li class="navbar-auth">
      <?php if(Auth::check()): ?>
        <a href="<?php echo e(URL::to('dashboard')); ?>"><?php echo e(trans('words.dashboard_text')); ?></a>
        <a href="<?php echo e(URL::to('logout')); ?>"><?php echo e(trans('words.logout')); ?></a>
      <?php else: ?>
        <a href="<?php echo e(URL::to('login')); ?>"><?php echo e(trans('words.login_text')); ?></a>
      <?php endif; ?>
    </li>

    <li class="parent-menu">
      <button type="button" class="button-62"><?php echo e('Shop Now'); ?></button>
      <ul class="submenu">
        <li><a href="https://chaldal.com/dekko" target="_blank" class="<?php echo e(classActivePathPublic('Chaldal')); ?>"><?php echo e('Chaldal'); ?></a></li>
        <li><a href="https://www.daraz.com.bd/shop/dekko/" target="_blank" class="<?php echo e(classActivePathPublic('Daraz')); ?>"><?php echo e('Daraz'); ?></a></li>
      </ul>
    </li>
  </ul>
</nav>




<?php /**PATH /var/www/html/resources/views/_particles/header.blade.php ENDPATH**/ ?>
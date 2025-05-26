<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
	
	Route::get('/', 'IndexController@index');
	Route::post('login', 'IndexController@postLogin');	
	Route::get('logout', 'IndexController@logout');
	
	
	Route::get('dashboard', 'DashboardController@index');	
	Route::get('profile', 'AdminController@profile');
	Route::get('profilecv', 'AdminController@profilecv');// cv profile agent
	Route::post('profile', 'AdminController@updateProfile');	
	Route::post('profile_pass', 'AdminController@updatePassword');
	
	Route::get('settings', 'SettingsController@settings');
	
	Route::post('settings', 'SettingsController@settingsUpdates');
	Route::post('smtp_email', 'SettingsController@smtp_email_update');
	Route::post('payment_info', 'SettingsController@payment_info_update');
	Route::post('layout_settings', 'SettingsController@layout_settings_update');	
	Route::post('social_links', 'SettingsController@social_links_update');
	Route::post('addthisdisqus', 'SettingsController@addthisdisqus');	
	Route::post('about_us', 'SettingsController@about_us_page');
	Route::post('contact_us', 'SettingsController@contact_us_page');	 
	Route::post('headfootupdate', 'SettingsController@headfootupdate');
	 
	Route::get('slider', 'SliderController@sliderlist');	
	Route::get('slider/addslide', 'SliderController@addeditSlide');	
	Route::post('slider/addslide', 'SliderController@addnew');	
	Route::get('slider/addslide/{id}', 'SliderController@editSlide');	
	Route::get('slider/delete/{id}', 'SliderController@delete');

	Route::get('promotionslider', 'PromotionSliderController@sliderlist');	
	Route::get('promotionslider/addslide', 'PromotionSliderController@addeditSlide');	
	Route::post('promotionslider/addslide', 'PromotionSliderController@addnew');	
	Route::get('promotionslider/addslide/{id}', 'PromotionSliderController@editSlide');	
	Route::get('promotionslider/delete/{id}', 'PromotionSliderController@delete');
	
	Route::get('users', 'UsersController@userslist');
Route::get('users/details/{id}', 'UsersController@show');
	
	Route::get('users/adduser', 'UsersController@addeditUser');	
	Route::post('users/adduser', 'UsersController@addnew');	
	Route::get('users/adduser/{id}', 'UsersController@editUser');	
	Route::get('users/delete/{id}', 'UsersController@delete');	
	Route::get('users/export', 'UsersController@user_export');
	 
	Route::get('users/approved/{id}', 'UsersController@approvedUser');
	Route::get('users/unapproved/{id}', 'UsersController@unapprovedUser');

	// inquiries 
	Route::get('inquiries', 'InquiriesController@inquirieslist');  
	Route::get('inquiries/addnew', 'InquiriesController@addNew');  	

	Route::post('inquiries/store',[
		'uses' => 'InquiriesController@store',
		'as'=> 'inquiries.store'
	]);

	Route::get('inquiries/edit/{id}', [
		'uses' => 'InquiriesController@edit',
		'as' => 'inquiries.edit'
	]);

	Route::post('inquiries/update/{id}', [
		'uses' => 'InquiriesController@update',
		'as' => 'inquiries.update'
	]);

	Route::get('inquiries/details/{id}', [
		'uses' => 'InquiriesController@inquiriesDetails',
		'as' => 'inquiries.details'
	]);

	Route::get('inquiries/delete/{id}', 'InquiriesController@delete');	
	

	Route::get('agentinterest/status/{id}', 'InterestController@status');
	
//Project
Route::get('/projects', [
	'uses' => 'ProjectController@index',
	'as' => 'projects'
]);

Route::get('/land/edit/{id}', [
			'uses' => 'ProjectController@edit',
			'as' => 'land.edit'
		]);



Route::post('/projects/update/{id}', [
	'uses' => 'ProjectController@update',
	'as' => 'project.update'
]);
Route::get('/Project', [
'uses' => 'ProjectController@create',
'as' => 'project-create'
]);

Route::post('/Project/store', [
'uses' => 'ProjectController@store',
'as' => 'project.store'
]);


//Project End

	Route::get('types', 'TypesController@typeslist');	
	Route::get('types/addtypes', 'TypesController@addedittypes');	
	Route::post('types/addtypes', 'TypesController@addnew');	
	Route::get('types/addtypes/{id}', 'TypesController@edittypes');		
	Route::get('types/delete/{id}', 'TypesController@delete');
	
	
	// front designs | by imran

	Route::get('front-design',[
		'uses' =>'FrontDesignController@index',
		'as' =>'frontd.index'
	]);

	Route::get('front-design/create',[
		'uses' => 'FrontDesignController@create',
		'as'=> 'frontd.create'
	]);

	Route::post('front-design/store',[
		'uses' => 'FrontDesignController@store',
		'as'=> 'frontd.store'
	]);
	
	Route::get('front-design/edit/{id}', [
		'uses' => 'FrontDesignController@edit',
		'as' => 'frontd.edit'
	]);

	Route::post('front-design/update/{id}', [
		'uses' => 'FrontDesignController@update',
		'as' => 'frontd.update'
	]);
	
	Route::get('front-design/delete/{id}', [
		'uses' => 'FrontDesignController@delete',
		'as' => 'frontd.delete'
	]);

	// front designs | end by imran
	
	

	
	// end service
	


	Route::get('about_page', 'PagesController@about_page');
	Route::post('about_page', 'PagesController@update_about_page');
	Route::get('terms_page', 'PagesController@terms_page');
	Route::post('terms_page', 'PagesController@update_terms_page');
	Route::get('privacy_policy_page', 'PagesController@privacy_policy_page');
	Route::post('privacy_policy_page', 'PagesController@update_privacy_policy_page');
	Route::get('faq_page', 'PagesController@faq_page');
	Route::post('faq_page', 'PagesController@update_faq_page');
	
	

//blog category

    Route::get('/blog-categories', [
        'uses' => 'BlogcategoryController@index',
        'as' => 'blog-categories'
    ]);

    Route::get('/blog-category/create', [
        'uses' => 'BlogcategoryController@create',
        'as' => 'blogcategory.create'
    ]);

    Route::post('/blog-category/store', [
        'uses' => 'BlogcategoryController@store',
        'as' => 'blogcategory.store'
    ]);

    Route::get('/blog-category/edit/{id}', [
        'uses' => 'BlogcategoryController@edit',
        'as' => 'blogcategory.edit'
    ]);

    Route::get('/blog-category/delete/{id}', [
        'uses' => 'BlogcategoryController@destroy',
        'as' => 'blogcategory.delete'
    ]);

    Route::post('/blog-category/update/{id}', [
        'uses' => 'BlogcategoryController@update',
        'as' => 'blogcategory.update'
    ]);




	//blog category

    Route::get('/products-categories', [
        'uses' => 'ProductscategoryController@index',
        'as' => 'products-categories'
    ]);

    Route::get('/products-category/create', [
        'uses' => 'ProductscategoryController@create',
        'as' => 'productscategory.create'
    ]);

    Route::post('/products-category/store', [
        'uses' => 'ProductscategoryController@store',
        'as' => 'productscategory.store'
    ]);

    Route::get('/products-category/edit/{id}', [
        'uses' => 'ProductscategoryController@edit',
        'as' => 'productscategory.edit'
    ]);

    Route::get('/products-category/delete/{id}', [
        'uses' => 'ProductscategoryController@destroy',
        'as' => 'productscategory.delete'
    ]);

    Route::post('/products-category/update/{id}', [
        'uses' => 'ProductscategoryController@update',
        'as' => 'productscategory.update'
    ]);
 

//brand category

Route::get('/brand-categories', [
	'uses' => 'BrandcategoryController@index',
	'as' => 'brand-categories'
]);

Route::get('/brand-category/create', [
	'uses' => 'BrandcategoryController@create',
	'as' => 'brandcategory.create'
]);

Route::post('/brand-category/store', [
	'uses' => 'BrandcategoryController@store',
	'as' => 'brandcategory.store'
]);

Route::get('/brand-category/edit/{id}', [
	'uses' => 'BrandcategoryController@edit',
	'as' => 'brandcategory.edit'
]);

Route::get('/brand-category/delete/{id}', [
	'uses' => 'BrandcategoryController@destroy',
	'as' => 'brandcategory.delete'
]);

Route::post('/brand-category/update/{id}', [
	'uses' => 'BrandcategoryController@update',
	'as' => 'brandcategory.update'
]);


//end brand category
	//blog category

    Route::get('/products-brand', [
        'uses' => 'ProductsbrandController@index',
        'as' => 'products-brands'
    ]);

    Route::get('/products-brand/create', [
        'uses' => 'ProductsbrandController@create',
        'as' => 'productsbrand.create'
    ]);

    Route::post('/products-brand/store', [
        'uses' => 'ProductsbrandController@store',
        'as' => 'productsbrand.store'
    ]);

    Route::get('/products-brand/edit/{id}', [
        'uses' => 'ProductsbrandController@edit',
        'as' => 'productsbrand.edit'
    ]);

    Route::get('/products-brand/delete/{id}', [
        'uses' => 'ProductsbrandController@destroy',
        'as' => 'productsbrand.delete'
    ]);

    Route::post('/products-brand/update/{id}', [
        'uses' => 'ProductsbrandController@update',
        'as' => 'productsbrand.update'
    ]);



//SKUs

Route::get('/skus', [
	'uses' => 'SKUController@index',
	'as' => 'skus'
]);

Route::get('/sku/delete/{id}', [
	'uses' => 'SKUController@destroy',
	'as' => 'sku.delete'
]);

Route::get('/sku/status/{id}', 'SKUController@status');

Route::get('/skus/trashed', [
	'uses' => 'SKUController@trashed',
	'as' => 'skus.trashed'
]);

Route::get('/skus/kill/{id}', [
	'uses' => 'SKUController@kill',
	'as' => 'sku.kill'
]);

Route::get('/skus/restore/{id}', [
	'uses' => 'SKUController@restore',
	'as' => 'sku.restore'
]);

Route::get('/skus/edit/{id}', [
	'uses' => 'SKUController@edit',
	'as' => 'sku.edit'
]);


Route::post('/skus/update/{id}', [
	'uses' => 'SKUController@update',
	'as' => 'sku.update'
]);

/*SKU submit*/

Route::get('/sku-post', [
'uses' => 'SKUController@create',
'as' => 'sku-post'
]);

Route::post('/sku/store', [
'uses' => 'SKUController@store',
'as' => 'sku.store'
]);





//blogs

    Route::get('/blogs', [
        'uses' => 'BlogController@index',
        'as' => 'blogs'
    ]);

    Route::get('/blog/delete/{id}', [
        'uses' => 'BlogController@destroy',
        'as' => 'blog.delete'
    ]);

   Route::get('/blog/status/{id}', 'BlogController@status');

    Route::get('/blogs/trashed', [
        'uses' => 'BlogController@trashed',
        'as' => 'blogs.trashed'
    ]);

    Route::get('/blogs/kill/{id}', [
        'uses' => 'BlogController@kill',
        'as' => 'blog.kill'
    ]);

    Route::get('/blogs/restore/{id}', [
        'uses' => 'BlogController@restore',
        'as' => 'blog.restore'
    ]);

    Route::get('/blogs/edit/{id}', [
        'uses' => 'BlogController@edit',
        'as' => 'blog.edit'
    ]);


    Route::post('/blogs/update/{id}', [
        'uses' => 'BlogController@update',
        'as' => 'blog.update'
    ]);

/*blog post submit*/

Route::get('/blog-post', [
    'uses' => 'BlogController@create',
    'as' => 'blog-post'
]);

Route::post('/blog/store', [
    'uses' => 'BlogController@store',
    'as' => 'blog.store'
]);



Route::get('/comments', [
	'uses' => 'CommentsController@index',
	'as' => 'comments'
]);
Route::get('/comments/delete/{id}', [
	'uses' => 'CommentsController@destroy',
	'as' => 'comments.delete'
]);
Route::get('/replies', [
	'uses' => 'RepliesController@index',
	'as' => 'replies'
]);
Route::get('/replies/delete/{id}', [
	'uses' => 'RepliesController@destroy',
	'as' => 'replies.delete'
]);


//Teams
Route::get('/teams', [
	'uses' => 'TeamController@index',
	'as' => 'teams'
]);
Route::get('/teams/edit/{id}', [
	'uses' => 'TeamController@edit',
	'as' => 'team.edit'
]);
Route::get('/teams/delete/{id}', [
	'uses' => 'TeamController@destroy',
	'as' => 'team.delete'
]);
Route::post('/teams/update/{id}', [
	'uses' => 'TeamController@update',
	'as' => 'team.update'
]);
Route::get('/team', [
'uses' => 'TeamController@create',
'as' => 'team-create'
]);

Route::post('/team/store', [
'uses' => 'TeamController@store',
'as' => 'team.store'
]);

Route::get('/team/status/{id}', 'TeamController@status');



//Gallery Start//
Route::get('/galleries', [
	'uses' => 'GalleryController@index',
	'as' => 'galleries'
]);
Route::get('/gallery/create', [
	'uses' => 'GalleryController@create',
	'as' => 'gallery-create'
	]);
	Route::post('/gallery/store', [
		'uses' => 'GalleryController@store',
		'as' => 'gallery.store'
		]);

		Route::get('/gallery/edit/{id}', [
			'uses' => 'GalleryController@edit',
			'as' => 'gallery.edit'
		]);
		Route::get('/gallery/delete/{id}', [
			'uses' => 'GalleryController@destroy',
			'as' =>'gallery.delete'
		]);
		Route::post('/gallery/update/{id}', [
			'uses' => 'GalleryController@update',
			'as' => 'gallery.update'
		]);
		Route::get('/gallery/status/{id}', 'GalleryController@status');


//Gallery End//

/*blog post submit end*/

});



Route::get('post_requirements', 'AddpropertiesController@creat');

Route::post('/add_property/store', [
	'uses' => 'AddpropertiesController@store',
	'as' => 'add_property.store'
	]);



/*blog post view*/

Route::get('/blog', [
    'uses' => 'IndexController@blog',
    'as' => 'blog'
]);

Route::get('/blog/{id}', [
    'uses' => 'IndexController@singleBlog',
    'as' => 'blog.single'
]);

Route::get('/category/{slug}', [
    'uses' => 'IndexController@blogcategory',
    'as' => 'blog-category.single'
]);



Route::get('products', 'ProductsController@index');
Route::get('/category/{slug}', [
    'uses' => 'ProductsController@category',
    'as' => 'category.single'
]);

Route::get('/brandcategory/{slug}', [
    'uses' => 'ProductsController@brandcategory',
    'as' => 'brandcategory.single'
]);

Route::get('/products/{id}', [
    'uses' => 'ProductsController@brand',
    'as' => 'brand.single'
]);
Route::get('/sku/details', 'ProductsController@details')->name('sku.details');

Route::post('comments/{blog_id}','CommentsController@store')->name('comments.store');
Route::post('replies/{comment_id}','RepliesController@store')->name('replies.store');

Route::get('/team', [
    'uses' => 'IndexController@team',
    'as' => 'team'
]);
Route::get('team/{id}', 'IndexController@team_details');







Route::get('/gallery', [
    'uses' => 'IndexController@gallery',
    'as' => 'gallery'
]);

Route::get('/', 'IndexController@index');

Route::get('page/{slug}', 'PagesController@get_page');
Route::get('details/{slug}/{id}', 'PagesController@category_details')->name('category.details');
 
Route::get('contact-us', 'IndexController@contact_us_page');
Route::post('contact-us', 'IndexController@contact_us_sendemail');






Route::post('user/details/agenthire', [
    'uses' => 'AgentsController@agenthire',
    'as' => 'agenthire'
]);

Route::get('user/details/{id}', 'AgentsController@agent_details');





Route::get('inquiries', 'UserController@inquirieslist');  
Route::get('inquiries/delete/{id}', 'UserController@delete');









 

Route::get('login', [ 'as' => 'login', 'uses' => 'IndexController@login']);
Route::post('login', 'IndexController@postLogin');


Route::get('logout', 'IndexController@logout');

Route::get('dashboard', 'UserController@dashboard');
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@profile_update');
Route::get('change_pass', 'UserController@change_pass');
Route::post('update_password', 'UserController@updatePassword');







 
// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset')->name('password.reset');;

Route::get('auth/confirm/{code}', 'IndexController@confirm');


Route::get('/sitemap.xml', 'IndexController@sitemap');
 
 

/*Route::get('/', function () {
    return view('welcome');
});*/

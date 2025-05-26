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
	
	
	Route::get('testimonials', 'TestimonialsController@testimonialslist');	
	Route::get('testimonials/addtestimonial', 'TestimonialsController@addeditestimonials');	
	Route::post('testimonials/addtestimonial', 'TestimonialsController@addnew');	
	Route::get('testimonials/addtestimonial/{id}', 'TestimonialsController@edittestimonial');	
	Route::get('testimonials/delete/{id}', 'TestimonialsController@delete');
	

	Route::get('properties', 'PropertiesController@propertieslist');	
	Route::get('properties/addproperty', 'PropertiesController@addeditproperty');	
	Route::post('properties/addproperty', 'PropertiesController@addnew');	
	Route::get('properties/addproperty/{id}', 'PropertiesController@editproperty');	
	Route::get('properties/status/{id}', 'PropertiesController@status');	
	Route::get('properties/featuredproperty/{id}', 'PropertiesController@featuredproperty');
	Route::get('properties/featuredproperty/{id}', 'PropertiesController@featuredproperty');
	Route::get('properties/soldout/{id}', 'PropertiesController@soldout');
	Route::get('properties/delete/{id}', 'PropertiesController@delete');	
	Route::get('featuredproperties', 'FeaturedPropertiesController@propertieslist');
	Route::get('properties/export', 'PropertiesController@property_export');

	Route::post('properties/plan_update', 'PropertiesController@plan_update');
	Route::post('properties/position_update', 'PropertiesController@position_update');
	 
	Route::get('users', 'UsersController@userslist');	
	Route::get('users/adduser', 'UsersController@addeditUser');	
	Route::post('users/adduser', 'UsersController@addnew');	
	Route::get('users/adduser/{id}', 'UsersController@editUser');	
	Route::get('users/delete/{id}', 'UsersController@delete');	
	Route::get('users/export', 'UsersController@user_export');
	 
	Route::get('users/approved/{id}', 'UsersController@approvedUser');
	Route::get('users/unapproved/{id}', 'UsersController@unapprovedUser');
	
	Route::get('subscriber', 'SubscriberController@subscriberlist'); 
	Route::get('subscriber/delete/{id}', 'SubscriberController@delete');

	//client request
	Route::get('client-request', 'ClientRequestController@requestlist'); 
	Route::get('client-request/delete/{id}', 'ClientRequestController@delete');
	
	
	Route::get('partners', 'PartnersController@partnerslist'); 
	Route::get('partners/addpartners', 'PartnersController@addpartners');	
	Route::post('partners/addpartners', 'PartnersController@addnew');	
	Route::get('partners/addpartners/{id}', 'PartnersController@editpartners');	
	Route::get('partners/delete/{id}', 'PartnersController@delete');
	
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
	
	//hire
	Route::get('hires', 'HiresController@hireslist');  
	Route::get('hires/delete/{id}', 'HiresController@delete');
	Route::get('hires/status/{id}', 'HiresController@status');

	//agent Interest
	Route::get('agentinterest', 'InterestController@interestlist');  
	Route::get('agentinterest/delete/{id}', 'InterestController@delete');
	Route::get('agentinterest/status/{id}', 'InterestController@status');
	


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
	
		// location upazila | by imran
	Route::get('upazila',[
		'uses' =>'UpazilaController@index',
		'as' =>'upazila.index'
	]);
	Route::get('upazila/create',[
		'uses' => 'UpazilaController@create',
		'as'=> 'upazila.create'
	]);
	Route::post('upazila/store',[
		'uses' => 'UpazilaController@store',
		'as'=> 'upazila.store'
	]);
	Route::get('upazila/edit/{id}', [
		'uses' => 'UpazilaController@edit',
		'as' => 'upazila.edit'
	]);
	Route::post('upazila/update/{id}', [
		'uses' => 'UpazilaController@update',
		'as' => 'upazila.update'
	]);
	Route::get('upazila/delete/{id}', [
		'uses' => 'UpazilaController@delete',
		'as' => 'upazila.delete'
	]);
	// location upazila | end by imran

	// service category by imran


	Route::get('service-category',[
		'uses' =>'ServiceCategoryController@index',
		'as' =>'category.index'
	]);

	Route::get('service-category/create',[
		'uses' => 'ServiceCategoryController@create',
		'as'=> 'category.create'
	]);

	Route::post('service-category/store',[
		'uses' => 'ServiceCategoryController@store',
		'as'=> 'category.store'
	]);
	
	Route::get('service-category/edit/{id}', [
        'uses' => 'ServiceCategoryController@edit',
        'as' => 'category.edit'
	]);

	Route::post('service-category/update/{id}', [
        'uses' => 'ServiceCategoryController@update',
        'as' => 'category.update'
	]);
	
	Route::get('service-category/delete/{id}', [
        'uses' => 'ServiceCategoryController@delete',
        'as' => 'category.delete'
	]);


	//service subcategory

	Route::get('service-subcategory', [
        'uses' => 'ServiceSubcategoryController@index',
        'as' => 'subcategory.index'
	]);

	Route::get('service-subcategory/create', [
        'uses' => 'ServiceSubcategoryController@create',
        'as' => 'subcategory.create'
	]);

	Route::post('service-subcategory/store', [
        'uses' => 'ServiceSubcategoryController@store',
        'as' => 'subcategory.store'
	]);


	Route::get('service-subcategory/edit/{id}', [
        'uses' => 'ServiceSubcategoryController@edit',
        'as' => 'subcategory.edit'
	]);

	Route::post('service-subcategory/update/{id}', [
        'uses' => 'ServiceSubcategoryController@update',
        'as' => 'subcategory.update'
	]);
		
	Route::get('service-subcategory/delete/{id}', [
        'uses' => 'ServiceSubcategoryController@delete',
        'as' => 'subcategory.delete'
	]);

	//service childcategory

	Route::get('service-childcategory', [
		'uses' => 'ServiceChildcategoryController@index',
		'as' => 'childcategory.index'
	]);

	Route::get('service-childcategory/create', [
		'uses' => 'ServiceChildcategoryController@create',
		'as' => 'childcategory.create'
	]);

	Route::post('service-childcategory/store', [
		'uses' => 'ServiceChildcategoryController@store',
		'as' => 'childcategory.store'
	]);


	Route::get('service-childcategory/edit/{id}', [
		'uses' => 'ServiceChildcategoryController@edit',
		'as' => 'childcategory.edit'
	]);

	Route::post('service-childcategory/update/{id}', [
		'uses' => 'ServiceChildcategoryController@update',
		'as' => 'childcategory.update'
	]);
		
	Route::post('service-childcategory/delete/{id}', [
		'uses' => 'ServiceChildcategoryController@delete',
		'as' => 'childcategory.delete'
	]);
	
	Route::get('get/catsubcategory', 'ServiceChildcategoryController@cat_get_subcategory')->name('catget.subcategory');

	//Start service

    Route::get('services', [
        'uses' => 'ServiceController@index',
        'as' => 'services'
	]);
	
	Route::get('service/create', [
		'uses' => 'ServiceController@create',
		'as' => 'service.create'
	]);

	
	Route::post('service/store', [
		'uses' => 'ServiceController@store',
		'as' => 'service.store'
	]);

	// Route::get('get/subcategory', [
	// 	'uses' => 'ServiceController@subcategory',
	// 	'as' => 'get.subcategory'
	// ]);

	 Route::get('get/subcategory', 'ServiceSubcategoryController@get_subcategory')->name('get.subcategory');
	 Route::get('get/child/subcategory', 'ServiceSubcategoryController@get_childsubcategory')->name('get.child.subcategory');
	
	Route::get('service/edit/{id}', [
        'uses' => 'ServiceController@edit',
        'as' => 'service.edit'
    ]);

    Route::post('service/update/{id}', [
        'uses' => 'ServiceController@update',
        'as' => 'service.update'
	]);

	Route::get('/service/delete/{id}', [
        'uses' => 'ServiceController@destroy',
        'as' => 'service.delete'
	]);


    Route::get('/service/restore/{id}', [
        'uses' => 'ServiceController@restore',
        'as' => 'service.restore'
    ]);

	Route::get('/service/trashed', [
        'uses' => 'ServiceController@trashed',
        'as' => 'service.trashed'
    ]);

    Route::get('/service/kill/{id}', [
        'uses' => 'ServiceController@kill',
        'as' => 'service.kill'
	]);
	

	
	// end service
	
	Route::get('subscription_plan', 'SubscriptionPlanController@subscription_plan_list');	
	Route::get('subscription_plan/add_plan', 'SubscriptionPlanController@addSubscriptionPlan'); 
	Route::get('subscription_plan/edit_plan/{id}', 'SubscriptionPlanController@editSubscriptionPlan');	
	Route::post('subscription_plan/add_edit_plan', 'SubscriptionPlanController@addnew');	
	Route::get('subscription_plan/delete/{id}', 'SubscriptionPlanController@delete');

	Route::get('transactions', 'TransactionsController@transactions_list');
	Route::get('transactions/export', 'TransactionsController@transactions_export');
	Route::get('transactions/user_invoice/{id}', 'TransactionsController@user_invoice');

	Route::get('about_page', 'PagesController@about_page');
	Route::post('about_page', 'PagesController@update_about_page');
	Route::get('terms_page', 'PagesController@terms_page');
	Route::post('terms_page', 'PagesController@update_terms_page');
	Route::get('privacy_policy_page', 'PagesController@privacy_policy_page');
	Route::post('privacy_policy_page', 'PagesController@update_privacy_policy_page');
	Route::get('faq_page', 'PagesController@faq_page');
	Route::post('faq_page', 'PagesController@update_faq_page');

});


Route::get('/', 'IndexController@index');

Route::get('page/{slug}', 'PagesController@get_page');
Route::get('details/{slug}/{id}', 'PagesController@category_details')->name('category.details');
 
Route::get('contact-us', 'IndexController@contact_us_page');
Route::post('contact-us', 'IndexController@contact_us_sendemail');


Route::get('send/otp', 'IndexController@send_otp');
Route::get('check/otp', 'IndexController@check_otp');

//imran
//Route::get('legal-service', 'IndexController@legal_service');
//Route::get('property-services', 'IndexController@property_service');
 
Route::get('service/{slug}', [
	'uses' => 'IndexController@scategory',
	'as' => 'scategory.single'
]);

Route::get('services/{slug}', [
    'uses' => 'IndexController@singleService',
    'as' => 'service.single'
]);

Route::post('subscribe', 'IndexController@subscribe');

Route::post('request_submit', 'IndexController@request_submit');

/*
Route::get('agent/register', [
    'uses' => 'AgentsController@AgentRegister',
    'as' => 'agent.register'
]);*/

Route::get('agents', 'AgentsController@index');

//Route::post('agenthire', 'AgentsController@agenthire');

Route::post('user/details/agenthire', [
    'uses' => 'AgentsController@agenthire',
    'as' => 'agenthire'
]);

Route::get('user/details/{id}', 'AgentsController@agent_details');

Route::get('properties', 'PropertiesController@index');

Route::get('featured', 'PropertiesController@featuredproperties');
Route::get('sale', 'PropertiesController@saleproperties');
Route::get('rent', 'PropertiesController@rentproperties');
Route::get('properties/{slug}/{id}', 'PropertiesController@single_properties');

Route::get('map/{id}', 'PropertiesController@map_property_urlset');

Route::get('testimonials', 'IndexController@testimonialslist');


Route::get('inquiries', 'UserController@inquirieslist');  
Route::get('inquiries/delete/{id}', 'UserController@delete');




Route::get('type/{slug}', 'PropertiesController@propertiesbytype');

Route::get('property-form-{slug}', 'PropertiesController@propertyby');

Route::post('agentscontact', 'PropertiesController@agentscontact');

Route::post('searchproperties', 'PropertiesController@searchproperties');




/////////////////////////////////////// UPDATE ROUTE START ////////////////////////////////////////////////
Route::get('search/location/{location}', 'PropertiesController@search_location')->name('search.location');
Route::get('search/proeprty_type/{proeprty_type}', 'PropertiesController@search_proeprty_type')->name('search.proeprty_type');
Route::get('search/bedrooms/{bedrooms}', 'PropertiesController@search_bedrooms')->name('search.bedrooms');
Route::get('search/max_size_max_size/{min_size}/{max_size}', 'PropertiesController@search_max_size_max_size')->name('search.max_size_max_size');
Route::get('search/min_price_max_price/{min_price}/{max_price}', 'PropertiesController@search_min_price_max_price')->name('search.min_price_max_price');

// two
Route::get('search/location_proeprty_type/{location}/{proeprty_type}', 'PropertiesController@search_location_proeprty_type')->name('search.location_proeprty_type');
Route::get('search/location_bedrooms/{location}/{bedrooms}', 'PropertiesController@search_location_bedrooms')->name('search.location_bedrooms');
Route::get('search/location_min_size_max_size/{location}/{min_size}/{max_size}', 'PropertiesController@search_location_min_size_max_size')->name('search.location_min_size_max_size');
Route::get('search/search_location_min_price_max_price/{location}/{min_price}/{max_price}', 'PropertiesController@search_location_min_price_max_price')->name('search.location_min_price_max_price');
Route::get('search/search_proeprty_type_min_size_max_size/{proeprty_type}/{min_size}/{max_size}', 'PropertiesController@search_proeprty_type_min_size_max_size')->name('search.proeprty_type_min_size_max_size');
Route::get('search/search_proeprty_type_min_price_max_price/{proeprty_type}/{min_price}/{max_price}', 'PropertiesController@search_proeprty_type_min_price_max_price')->name('search.proeprty_type_min_price_max_price');
Route::get('search/search_bedrooms_min_price_max_price/{bedrooms}/{min_price}/{max_price}', 'PropertiesController@search_bedrooms_min_price_max_price')->name('search.bedrooms_min_price_max_price');
Route::get('search/search_bedrooms_min_size_max_size/{bedrooms}/{min_size}/{max_size}', 'PropertiesController@search_bedrooms_min_size_max_size')->name('search.bedrooms_min_size_max_size');

Route::get('search/search_min_size_max_size/{min_size}/{max_size}', 'PropertiesController@search_min_size_max_size')->name('search.min_size_max_size');

Route::get('search/search_min_size_max_size_min_price_max_price/{min_size}/{max_size}/{min_price}/{max_price}', 'PropertiesController@search_min_size_max_size_min_price_max_price')->name('search.min_size_max_size_min_price_max_price');
Route::get('search/search_location_proeprty_type_bedrooms/{location}/{proeprty_type}/{bedrooms}', 'PropertiesController@search_location_proeprty_type_bedrooms')->name('search.location_proeprty_type_bedrooms');
Route::get('search/search_location_bedrooms_min_size_max_size/{location}/{bedrooms}/{min_size}/{max_size}', 'PropertiesController@search_location_bedrooms_min_size_max_size')->name('search.location_bedrooms_min_size_max_size');
Route::get('search/search_location_proeprty_type_min_size_max_size/{location}/{proeprty_type}/{min_size}/{max_size}', 'PropertiesController@search_location_proeprty_type_min_size_max_size')->name('search.location_proeprty_type_min_size_max_size');
Route::get('search/search_location_proeprty_type_min_price_max_price/{location}/{proeprty_type}/{min_price}/{max_price}', 'PropertiesController@search_location_proeprty_type_min_price_max_price')->name('search.location_proeprty_type_min_price_max_price');
Route::get('search/search_proeprty_type_bedrooms_min_size_max_size/{proeprty_type}/{bedrooms}/{min_size}/{max_size}', 'PropertiesController@search_proeprty_type_bedrooms_min_size_max_size')->name('search.proeprty_type_bedrooms_min_size_max_size');
Route::get('search/search_proeprty_type_bedrooms_min_price_max_price/{proeprty_type}/{bedrooms}/{min_price}/{max_price}', 'PropertiesController@search_proeprty_type_bedrooms_min_price_max_price')->name('search.proeprty_type_bedrooms_min_price_max_price');
Route::get('search/location_min_size_min_max_size_price_max_price/{location}/{min_size}/{max_size}/{min_price}/{max_price}', 'PropertiesController@search_location_min_size_min_max_size_price_max_price')->name('search.location_min_size_min_max_size_price_max_price');
Route::get('search/proeprty_type_size_min_max_size_price_max_price/{proeprty_type}/{min_size}/{max_size}/{min_price}/{max_price}', 'PropertiesController@search_proeprty_type_size_min_max_size_price_max_price')->name('search.proeprty_type_size_min_max_size_price_max_price');
Route::get('search/search_location_proeprty_type_size_min_max_size_price_max_price/{location}/{proeprty_type}/{min_size}/{max_size}/{min_price}/{max_price}', 'PropertiesController@search_location_proeprty_type_size_min_max_size_price_max_price')->name('search.location_proeprty_type_size_min_max_size_price_max_price');

Route::get('search/search_all_search/{location}/{proeprty_type}/{bedrooms}/{min_size}/{max_size}/{min_price}/{max_price}', 'PropertiesController@search_all_search')->name('search.all_search');

Route::get('add/position','IndexController@add_position');
Route::get('add/department','IndexController@add_department');
/////////////////////////////////////// UPDATE ROUTE END////////////////////////////////////////////////

//interest property
//Route::post('agentinterest', 'PropertiesController@agentinterest');

Route::post('properties/agentinterestform', [
    'uses' => 'PropertiesController@agentinterest',
    'as' => 'agentinterest'
]);
 

Route::get('login', [ 'as' => 'login', 'uses' => 'IndexController@login']);
Route::post('login', 'IndexController@postLogin');

Route::get('register', 'IndexController@register');
 
Route::post('register', 'IndexController@sellerRegister');

Route::get('register/agent', 'IndexController@registerAgent');

Route::post('postAgentRegister', 'IndexController@postRegister');
Route::get('agent/success/{name}', 'IndexController@agent_success');
Route::get('logout', 'IndexController@logout');

Route::get('dashboard', 'UserController@dashboard');
Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@profile_update');
Route::get('change_pass', 'UserController@change_pass');
Route::post('update_password', 'UserController@updatePassword');

Route::get('my_properties', 'PropertiesController@my_properties');

//agent interest properties
Route::get('interest_properties', 'PropertiesController@interest_properties');

Route::get('submit-property', 'PropertiesController@add_property_form');
Route::post('submit-property', 'PropertiesController@addnew');
Route::get('update-property/{id}', 'PropertiesController@editproperty');
Route::get('delete/{id}', 'PropertiesController@delete');
Route::get('gallery_image_delete/{id}', 'PropertiesController@gallery_image_delete');

Route::get('invoice', 'TransactionController@transaction_list');
Route::get('user_invoice/{id}', 'TransactionController@user_invoice');

Route::get('plan/{id}', 'UserController@plan_list');
Route::post('plan_send', 'UserController@plan_send');
Route::get('plan_summary', 'UserController@plan_summary');
Route::post('payment_send', 'UserController@payment_send');


//Route::get('paypal_payment', 'PaypalController@payWithPaypal');
Route::post('paypal', array('as' => 'addmoney.paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'payment.status','uses' => 'PaypalController@getPaymentStatus',));

Route::get('stripe', 'StripeController@payWithStripe');
Route::post('stripe', 'StripeController@postPaymentWithStripe');
//Route::post('stripe/charge', 'StripeController@paymentWithStripe');
 
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

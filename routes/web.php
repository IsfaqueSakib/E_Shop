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

//frontend Routes----------------------------------------------------------------------------------------------------
Route::get('/', 'HomeController@index');
Route::post('/home_search', 'HomeController@home_search');
Route::get('/user_profile/{customer_id}', 'HomeController@user_profile');
Route::get('/edit_profile', 'HomeController@edit_profile');
Route::post('/save_profile', 'HomeController@save_profile');
Route::get('/change_password', 'HomeController@change_password');
Route::post('/save_password', 'HomeController@save_password');
Route::get('/filter_by_price', 'HomeController@filter_by_price');
Route::get('/filter_by_discount', 'HomeController@filter_by_discount');


//Show Product by Category Routes --------------------------------------------------------------------------------------
Route::get('/product_by_category/{category_id}','HomeController@show_product_by_category');
Route::get('/view_product/{product_id}','HomeController@view_product_by_id');

//Add to Cart Routes ---------------------------------------------------------------------------------------------------
Route::post('/add_to_cart','CartController@add_to_cart');
Route::get('/show_cart','CartController@show_cart');
Route::get('/delete_from_cart/{rowId}','CartController@delete_from_cart');
Route::post('/update_cart','CartController@update_cart');


//Checkout Routes ---------------------------------------------------------------------------------------------------------
Route::get('/login_check','CheckoutController@login_check');
Route::post('/customer_registration','CheckoutController@customer_registration');
Route::get('/customer_logout', 'CheckoutController@customer_logout');
Route::post('/customer_login', 'CheckoutController@customer_login');
Route::get('/checkout','CheckoutController@checkout');
Route::post('/save_shipping_details','CheckoutController@save_shipping_details');
Route::get('/payment','CheckoutController@payment');
Route::post('/order_place','CheckoutController@order_place');
Route::get('/manage_order','CheckoutController@manage_order');
Route::get('/view_order/{order_id}','CheckoutController@view_order');
Route::get('/order_success/{order_id}','CheckoutController@order_success');
Route::get('/order_pending/{order_id}','CheckoutController@order_pending');
Route::get('/delete_order/{order_id}','CheckoutController@delete_order');
Route::get('/set_charges','CheckoutController@set_charges');
Route::post('/save_charges','CheckoutController@save_charges');

//Auth::routes();



//Backend Routes-------------------------------------------------------------------------------------------------------
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'SuperAdminController@index');
Route::get('/logout', 'SuperAdminController@logout');
Route::post('/admin-dashboard', 'AdminController@dashboard');


//category RouteS----------------------------------------------------------------------------------------------------
Route::get('/addCategory','CategoryController@index');
Route::get('/allCategory','CategoryController@all_category');
Route::post('/save_category','CategoryController@save_category');
Route::get('/inactiveCategory/{category_id}','CategoryController@inactive_category');
Route::get('/activeCategory/{category_id}','CategoryController@active_category');
Route::get('/editCategory/{category_id}','CategoryController@edit_category');
Route::post('/update_category/{category_id}','CategoryController@update_category');
Route::get('/deleteCategory/{category_id}','CategoryController@delete_category');
Route::post('/admin_allCategory_search', 'CategoryController@admin_allCategory_search');


//products Routes ---------------------------------------------------------------------------------------------------
Route::get('/addProduct','ProductController@index');
Route::post('/save_product','ProductController@save_product');
Route::get('/allProduct','ProductController@all_product');
Route::get('/inactiveProduct/{product_id}','ProductController@inactive_product');
Route::get('/activeProduct/{product_id}','ProductController@active_product');
Route::get('/editProduct/{product_id}','ProductController@edit_product');
Route::post('/update_product/{product_id}','ProductController@update_product');
Route::get('/deleteProduct/{product_id}','ProductController@delete_product');
Route::post('/admin_allProduct_search', 'ProductController@admin_allProduct_search');
Route::get('/filter_by_category/{category_id}', 'ProductController@filter_by_category');

//Slider Routes ---------------------------------------------------------------------------------------------------
Route::get('/addSlider','SliderController@index');
Route::post('/save_slider','SliderController@save_slider');
Route::get('/allSlider','SliderController@all_slider');
Route::get('/activeSlider/{slider_id}','SliderController@active_slider');
Route::get('/inactiveSlider/{slider_id}','SliderController@inactive_slider');
Route::get('/deleteSlider/{slider_id}','SliderController@delete_slider');

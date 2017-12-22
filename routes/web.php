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

/*...............Home Controller Code Here.............*/

Route::get('/','HomeController@index');
Route::get('/product-details/{id}', 'HomeController@product_details');
Route::get('/all-products', 'HomeController@all_products');
Route::get('/contact', 'HomeController@contact');
Route::get('/category-product/{id}', 'HomeController@category_product');
Route::get('/nested-category-product/{id}', 'HomeController@nested_category_product');
Route::get('/manufacturer-product/{id}', 'HomeController@manufacturer_product');
Route::post('/search-product', 'HomeController@search_product');
Route::get('/new-collection', 'HomeController@new_collection');
Route::get('/tshirt-collection', 'HomeController@tshirt_collection');
Route::get('/mobile-collection', 'HomeController@mobile_collection');
Route::get('/panjabi-collection', 'HomeController@panjabi_collection');
Route::get('/manufacturers', 'HomeController@manufacturers');
Route::get('/wishlist', 'HomeController@wishlist');
Route::get('/order-list', 'HomeController@order_list');
Route::get('/men-collection', 'HomeController@man_products');
Route::get('/women-collection', 'HomeController@woman_products');
Route::post('/save-message','HomeController@save_message');




/*...............Admin Controller Code Here.............*/

Route::get('/admin', 'AdminController@index');
Route::post('/admin-login', 'AdminController@admin_login_check');
Route::get('/dashboard', 'DashboardController@index');


/*...............Dashboard Controller Code Here.............*/

Route::get('/logout', 'DashboardController@logout');

Route::get('/add-category', 'DashboardController@add_category');
Route::post('/save-category', 'DashboardController@save_category');
Route::get('/manage-category', 'DashboardController@manage_category');
Route::get('/unpublish-category/{id}', 'DashboardController@unpublish_category');
Route::get('/publish-category/{id}', 'DashboardController@publish_category');
Route::get('/delete-category/{id}', 'DashboardController@delete_category');
Route::get('/edit-category/{id}', 'DashboardController@edit_category');
Route::post('/update-category', 'DashboardController@update_category');

Route::get('/add-sub-category', 'DashboardController@add_sub_category');
Route::post('/save-sub-category', 'DashboardController@save_sub_category');
Route::get('/manage-sub-category', 'DashboardController@manage_sub_category');
Route::get('/unpublish-sub-category/{id}', 'DashboardController@unpublish_sub_category');
Route::get('/publish-sub-category/{id}', 'DashboardController@publish_sub_category');
Route::get('/delete-sub-category/{id}', 'DashboardController@delete_sub_category');
Route::get('/edit-sub-category/{id}', 'DashboardController@edit_sub_category');
Route::post('/update-sub-category', 'DashboardController@update_sub_category');

Route::get('/add-nested-category', 'DashboardController@add_nested_category');
Route::post('/save-nested-category', 'DashboardController@save_nested_category');
Route::get('/manage-nested-category', 'DashboardController@manage_nested_category');
Route::get('/unpublish-nested-category/{id}', 'DashboardController@unpublish_nested_category');
Route::get('/publish-nested-category/{id}', 'DashboardController@publish_nested_category');
Route::get('/delete-nested-category/{id}', 'DashboardController@delete_nested_category');
Route::get('/edit-nested-category/{id}', 'DashboardController@edit_nested_category');
Route::post('/update-nested-category', 'DashboardController@update_nested_category');

Route::get('/add-manufacturer', 'DashboardController@add_manufacturer');
Route::post('/save-manufacturer', 'DashboardController@save_manufacturer');
Route::get('/manage-manufacturer', 'DashboardController@manage_manufacturer');
Route::get('/unpublish-manufacturer/{id}', 'DashboardController@unpublish_manufacturer');
Route::get('/publish-manufacturer/{id}', 'DashboardController@publish_manufacturer');
Route::get('/delete-manufacturer/{id}', 'DashboardController@delete_manufacturer');
Route::get('/edit-manufacturer/{id}', 'DashboardController@edit_manufacturer');
Route::post('/update-manufacturer', 'DashboardController@update_manufacturer');

Route::get('/add-product', 'DashboardController@add_product');
Route::post('/save-product', 'DashboardController@save_product');
Route::get('/manage-product','DashboardController@manage_product');
Route::get('/unfeature-product/{id}','DashboardController@unfeature_product');
Route::get('/feature-product/{id}','DashboardController@feature_product');
Route::get('/edit-product/{id}','DashboardController@edit_product');
Route::post('/update-product', 'DashboardController@update_product');
Route::get('/delete-product/{id}','DashboardController@delete_product');



/*...............Dashboard Controller End Here.............*/


/*...............Cart Controller Code Start Here.............*/

Route::post('/add-to-cart', 'CartController@add_to_cart');
Route::get('/view-cart', 'CartController@view_cart');
Route::post('/update-cart', 'CartController@update_cart');
Route::get('/delete-cart/{id}', 'CartController@delete_cart');
Route::get('/delete-wishlist/{id}', 'CartController@delete_wishlist');


/*...............Cart Controller Code End Here.............*/


/*...............Checkout Controller Code Start Here.............*/

Route::get('/checkout', 'CheckoutController@customer_checkout');
Route::post('/save-customer', 'CheckoutController@save_customer');
Route::get('/billing', 'CheckoutController@billing');
Route::post('/save-billing', 'CheckoutController@save_billing');
Route::get('/payment', 'CheckoutController@payment');
Route::post('/place-order', 'CheckoutController@place_order');
Route::get('/success-order', 'CheckoutController@success_order');
Route::post('/customer-login-check', 'CheckoutController@customer_login_check');
Route::get('/customer-logout', 'CheckoutController@customer_logout');





/*...............Checkout Controller Code End Here.............*/



<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
// First Route method – Root URL will match this method
Route::get('/', 'Controller@index');
////////////////////////////////////////////////////////////////////////////
Route::post('/check', 'loginController@login');

Route::get('/refresh', 'Controller@refresh')->middleware('revalidate');
////////////////////////////////////////////////////////////////////////////
Route::get('/homepage', 'Controller@homepage')->middleware('revalidate');

Route::post('/buy', 'productController@buyItem');

Route::post('/remove', 'productController@removeItem');

Route::post('/sell', 'productController@sellItem');

Route::get('/homepage/thank', 'Controller@thank')->middleware('revalidate');
////////////////////////////////////////////////////////////////////////////
Route::post('/update', 'updateUserController@update');

Route::get('/homepage/profile', 'Controller@profile')->middleware('revalidate');
///////////////////////////////////////////////////////////////////////////
Route::post('/password', 'updateUserController@change');

Route::get('/homepage/change', 'Controller@changePassword')->middleware('revalidate');

Route::get('/homepage/getExpiredMember', 'updateUserController@getExpiredMember');

Route::post('/homepage/searchMember', 'updateUserController@getMember');

Route::get('/homepage/memberships', 'Controller@member')->middleware('revalidate');

Route::get('homepage/expiredMember', 'Controller@expiredMember')->middleware('revalidate');
///////////////////////////////////////////////////////////////////////////
Route::post('/homepage/search', 'productController@search');

Route::get('/homepage/getFood', 'productController@food');

Route::get('/homepage/getGadget', 'productController@gadget');

Route::get('/homepage/getDrink', 'productController@drink');

Route::get('/homepage/getBeauty', 'productController@beauty');

Route::get('/homepage/getExpired', 'productController@expired');

Route::get('/homepage/stockout', 'productController@stockout');

Route::get('/homepage/product', 'Controller@product')->middleware('revalidate');
///////////////////////////////////////////////////////////////////////////
Route::get('/homepage/logout', 'loginController@logout');
///////////////////////////////////////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////
///////////////////////////////////Admin///////////////////////////////////
///////////////////////////////////////////////////////////////////////////
Route::get('/admin', 'AdminController@index');

Route::post('/admin/check', 'AdminLoginController@login');

Route::get('/admin/logout', 'AdminLoginController@logout');
///////////////////////////////////////////////////////////////////////////
Route::get('/admin/getAllProducts', 'AdminProductController@getProducts');

Route::get('/admin/getAllUsers', 'AdminUserController@getAllUsers');

Route::get('/admin/getAllReports', 'AdminController@getAllReports');

Route::get('/admin/getAllIncomes', 'AdminController@getAllIncomes');

Route::get('/admin/homepage', 'AdminController@toHome')->middleware('revalidate');

Route::get('/admin/product', 'AdminController@toProduct')->middleware('revalidate');
///////////////////////////////////////////////////////////////////////////
Route::get('/admin/getClerks', 'AdminUserController@getClerks');

Route::get('/admin/clerks', 'AdminController@toClerk')->middleware('revalidate');

Route::post('/admin/promote', 'AdminUserController@promote');

Route::post('/admin/changeStatus','AdminUserController@changeStatus');
///////////////////////////////////////////////////////////////////////////
Route::get('/admin/getMemberships', 'AdminUserController@getMemberships');

Route::get('/admin/memberships', 'AdminController@toMember')->middleware('revalidate');

Route::post('/admin/MemExpend', 'AdminUserController@expendMember');

Route::post('/admin/MemDelete', 'AdminUserController@deleteMember');
//////////////////////////////////////////////////////////////////////////////
Route::get('/admin/getSuppliers', 'AdminUserController@getSuppliers');

Route::get('/admin/suppliers', 'AdminController@toSupplier')->middleware('revalidate');

Route::post('/admin/activateSupplier', 'AdminUserController@acitvateSupplier');
////////////////////////////////////////////////////////////////////////////////////////
Route::get('/admin/getTopUser', 'AdminUserController@getTopUser');

Route::get('/admin/TopUser', 'AdminController@toTopUser')->middleware('revalidate');
///////////////////////////////////////////////////////////////////////////////////////////
Route::get('/admin/registration', 'AdminController@toRegistration')->middleware('revalidate');

Route::post('/admin/registerProduct', 'AdminProductController@registerProduct');

Route::post('/admin/registerEmployee', 'AdminUserController@registerEmployee');

Route::post('/admin/registerMember', 'AdminUserController@registerMember');

Route::post('/admin/registerSupplier', 'AdminUserController@registerSupplier');

Route::get('/admin/expiredMember', 'AdminController@toExpiredMember')->middleware('revalidate');
////////////////////////////////////////////////////////////////////////////////////////////////////
Route::post('/admin/supplyProduct', 'AdminProductController@supplyProduct');

Route::post('/admin/removeProduct', 'AdminProductController@removeProduct');

Route::get('/admin/datamining', 'AdminController@getMostProduct')->middleware('revalidate');;
//////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/admin/info', 'Controller@profile')->middleware('revalidate');
//////////////////////////////////////////////////////////////////////////////////////////////
//Route::post('/send/receipt', 'MailController@sendReceipt');

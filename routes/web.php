<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

 
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
  
Route::get('/employees', [App\Http\Controllers\AdminController::class, 'users'])->name('users')->middleware('roles:1,2');
Route::get('/settings', [App\Http\Controllers\AdminController::class, 'settings'])->name('settings')->middleware('roles:1');
Route::get('/management', [App\Http\Controllers\AdminController::class, 'management'])->name('management')->middleware('roles:1');





Route::get('/employee/{id}', [App\Http\Controllers\AdminController::class, 'profile'])->name('profile')->middleware('roles:1,2');
Route::post('/update_user', [App\Http\Controllers\AdminController::class, 'update_user'])->name('update_user')->middleware('roles:1,2');
Route::post('/delete_user', [App\Http\Controllers\AdminController::class, 'delete_user'])->name('delete_user')->middleware('roles:1');






Route::get('/msg/{user_id}', function($user_id){
    $user = \App\Models\User::where('id', $user_id)->first();
  
    $data = [
        'title' => 'New Request',
        'message' => 'New Request from salas Agent',
        'type' => 2,
        'user_id' => $user->id
    ];
    Notification::send($user, new \App\Notifications\RequestNotification($data));
    event(new \App\Events\NewRequest('hello world',$data));

    return 'New Request sent';
 });
 
 
Auth::routes(); 
Auth::routes(['register' => false]);



Route::get('sub_cats{id}', [App\Http\Controllers\HomeController::class, 'sub_cats'])->name('sub_cats');




Route::get('/dash', [App\Http\Controllers\AdminController::class, 'dash'])->name('dash')->middleware('roles:1,2');

Route::get('/deleteuserlog/{id}', [App\Http\Controllers\AdminController::class, 'deleteuserlog'])->name('deleteuserlog')->middleware('roles:1,2');


///////////////////
Route::get('/', [App\Http\Controllers\HomeController::class, 'products'])->name('products');
Route::get('s__products{id}', [App\Http\Controllers\HomeController::class, 's__products'])->name('s__products');
Route::post('load_products', [App\Http\Controllers\HomeController::class, 'load_products'])->name('load_products');


Route::get('myprofile{id}', [App\Http\Controllers\AdminController::class, 'myprofile'])->name('myprofile')->middleware('isme:4');
Route::post('updateprofile{id}', [App\Http\Controllers\AdminController::class, 'updateprofile'])->name('updateprofile')->middleware('isme:4');





// Route::get('/employee/{id}', [App\Http\Controllers\AdminController::class, 'profile'])->name('profile')->middleware('roles:1,2');


















Route::get('crop-image-upload',[App\Http\Controllers\AdminController::class, 'imgcrop'] )->middleware('roles:1,2');
Route::post('crop-image-upload',[App\Http\Controllers\AdminController::class, 'uploadCropImage'] )->middleware('roles:1,2');
Route::post('crop-image-upload_port',[App\Http\Controllers\AdminController::class, 'uploadCropImage_port'] )->middleware('roles:1,2');
Route::post('crop-image-upload_team',[App\Http\Controllers\AdminController::class, 'uploadCropImage_team'] )->middleware('roles:1,2');






















Route::post('/slide1', [App\Http\Controllers\AdminController::class, 'slide1'])->name('slide1')->middleware('roles:1');
Route::post('/slide2', [App\Http\Controllers\AdminController::class, 'slide2'])->name('slide2')->middleware('roles:1');
Route::post('/slide3', [App\Http\Controllers\AdminController::class, 'slide3'])->name('slide3')->middleware('roles:1');




////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/hme', [App\Http\Controllers\AdminController::class, 'hme'])->name('hme')->middleware('roles:1');
Route::get('/addhme', [App\Http\Controllers\AdminController::class, 'addhme'])->name('addhme')->middleware('roles:1');
Route::post('/deletehme', [App\Http\Controllers\AdminController::class, 'deletehme'])->name('deletehme')->middleware('roles:1');
Route::post('/inserthme', [App\Http\Controllers\AdminController::class, 'inserthme'])->name('inserthme')->middleware('roles:1');
Route::post('/edithme', [App\Http\Controllers\AdminController::class, 'edithme'])->name('edithme')->middleware('roles:1');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/footer', [App\Http\Controllers\AdminController::class, 'footer'])->name('footer')->middleware('roles:1');
Route::post('/editftr', [App\Http\Controllers\AdminController::class, 'editftr'])->name('editftr')->middleware('roles:1');



Route::get('/showproduct{id}', [App\Http\Controllers\HomeController::class, 'showproduct'])->name('showproduct');
Route::get('/eco', [App\Http\Controllers\AdminController::class, 'eco'])->name('eco')->middleware('roles:1,2');
Route::get('/mcats', [App\Http\Controllers\AdminController::class, 'mcats'])->name('mcats')->middleware('roles:1,2');
Route::get('/scats', [App\Http\Controllers\AdminController::class, 'scats'])->name('scats')->middleware('roles:1,2');
Route::get('/m_products', [App\Http\Controllers\AdminController::class, 'm_products'])->name('m_products')->middleware('roles:1,2');

Route::get('/panars', [App\Http\Controllers\AdminController::class, 'panars'])->name('panars')->middleware('roles:1,2');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/addmcat', [App\Http\Controllers\AdminController::class, 'addmcat'])->name('addmcat')->middleware('roles:1');
Route::post('/deletemcat', [App\Http\Controllers\AdminController::class, 'deletemcat'])->name('deletemcat')->middleware('roles:1');
Route::post('/insertmcat', [App\Http\Controllers\AdminController::class, 'insertmcat'])->name('insertmcat')->middleware('roles:1');
Route::post('/editmcat', [App\Http\Controllers\AdminController::class, 'editmcat'])->name('editmcat')->middleware('roles:1');
Route::post('crop-image-upload_mcat',[App\Http\Controllers\AdminController::class, 'uploadCropImage_mcat'] )->middleware('roles:1,2');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/addscat', [App\Http\Controllers\AdminController::class, 'addscat'])->name('addscat')->middleware('roles:1');
Route::post('/deletescat', [App\Http\Controllers\AdminController::class, 'deletescat'])->name('deletescat')->middleware('roles:1');
Route::post('/insertscat', [App\Http\Controllers\AdminController::class, 'insertscat'])->name('insertscat')->middleware('roles:1');
Route::post('/editscat', [App\Http\Controllers\AdminController::class, 'editscat'])->name('editscat')->middleware('roles:1');
Route::post('crop-image-upload_scat',[App\Http\Controllers\AdminController::class, 'uploadCropImage_scat'] )->middleware('roles:1,2');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/addproduct', [App\Http\Controllers\AdminController::class, 'addproduct'])->name('addproduct')->middleware('roles:1');
Route::post('/deleteproduct', [App\Http\Controllers\AdminController::class, 'deleteproduct'])->name('deleteproduct')->middleware('roles:1');
Route::post('/insertproduct', [App\Http\Controllers\AdminController::class, 'insertproduct'])->name('insertproduct')->middleware('roles:1');
Route::post('/editproduct', [App\Http\Controllers\AdminController::class, 'editproduct'])->name('editproduct')->middleware('roles:1');
Route::post('crop-image-upload_product',[App\Http\Controllers\AdminController::class, 'uploadCropImage_product'] )->middleware('roles:1,2');






Route::get('/service', [App\Http\Controllers\AdminController::class, 'service'])->name('service')->middleware('roles:1');
Route::post('/addservice', [App\Http\Controllers\AdminController::class, 'addservice'])->name('addservice')->middleware('roles:1');
Route::post('/addservice_', [App\Http\Controllers\AdminController::class, 'addservice_'])->name('addservice_')->middleware('roles:1');
Route::post('/deleteservice', [App\Http\Controllers\AdminController::class, 'deleteservice'])->name('deleteservice')->middleware('roles:1');
Route::post('/insertservice', [App\Http\Controllers\AdminController::class, 'insertservice'])->name('insertservice')->middleware('roles:1');
Route::post('/editservices', [App\Http\Controllers\AdminController::class, 'editservices'])->name('editservices')->middleware('roles:1');
Route::post('/editservice', [App\Http\Controllers\AdminController::class, 'editservice'])->name('editservice')->middleware('roles:1');
Route::post('/editservice_', [App\Http\Controllers\AdminController::class, 'editservice_'])->name('editservice_')->middleware('roles:1');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

Route::get('/prd', [App\Http\Controllers\AdminController::class, 'prd'])->name('prd')->middleware('roles:1');
Route::post('/addprd', [App\Http\Controllers\AdminController::class, 'addprd'])->name('addprd')->middleware('roles:1');
Route::post('/deleteprd', [App\Http\Controllers\AdminController::class, 'deleteprd'])->name('deleteprd')->middleware('roles:1');
Route::post('/insertprd', [App\Http\Controllers\AdminController::class, 'insertprd'])->name('insertprd')->middleware('roles:1');
Route::post('/editprds', [App\Http\Controllers\AdminController::class, 'editprds'])->name('editprds')->middleware('roles:1');
Route::post('/editprd', [App\Http\Controllers\AdminController::class, 'editprd'])->name('editprd')->middleware('roles:1');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/portfolio', [App\Http\Controllers\AdminController::class, 'portfolio'])->name('portfolio')->middleware('roles:1');
Route::post('/addportfolio', [App\Http\Controllers\AdminController::class, 'addportfolio'])->name('addportfolio')->middleware('roles:1');
Route::post('/editportfolio', [App\Http\Controllers\AdminController::class, 'editportfolio'])->name('editportfolio')->middleware('roles:1');
Route::post('/deleteportfolio', [App\Http\Controllers\AdminController::class, 'deleteportfolio'])->name('deleteportfolio')->middleware('roles:1');


Route::post('/deleteview', [App\Http\Controllers\AdminController::class, 'deleteview'])->name('deleteview')->middleware('roles:1');
Route::post('/insertview', [App\Http\Controllers\AdminController::class, 'insertview'])->name('insertview')->middleware('roles:1');
Route::post('/editview', [App\Http\Controllers\AdminController::class, 'editview'])->name('editview')->middleware('roles:1');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/team', [App\Http\Controllers\AdminController::class, 'team'])->name('team')->middleware('roles:1');
Route::get('/addteam', [App\Http\Controllers\AdminController::class, 'addteam'])->name('addteam')->middleware('roles:1');
Route::post('/deleteteam', [App\Http\Controllers\AdminController::class, 'deleteteam'])->name('deleteteam')->middleware('roles:1');
Route::post('/insertteam', [App\Http\Controllers\AdminController::class, 'insertteam'])->name('insertteam')->middleware('roles:1');
Route::post('/editteam', [App\Http\Controllers\AdminController::class, 'editteam'])->name('editteam')->middleware('roles:1');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/contactus', [App\Http\Controllers\AdminController::class, 'contactus'])->name('contactus')->middleware('roles:1');
Route::get('/addgateway', [App\Http\Controllers\AdminController::class, 'addgateway'])->name('addgateway')->middleware('roles:1');
Route::post('/deletegateway', [App\Http\Controllers\AdminController::class, 'deletegateway'])->name('deletegateway')->middleware('roles:1');
Route::post('/insertgateway', [App\Http\Controllers\AdminController::class, 'insertgateway'])->name('insertgateway')->middleware('roles:1');
Route::post('/editcontactus', [App\Http\Controllers\AdminController::class, 'editcontactus'])->name('editcontactus')->middleware('roles:1');

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/about', [App\Http\Controllers\AdminController::class, 'about'])->name('about')->middleware('roles:1');
Route::get('/carusel', [App\Http\Controllers\AdminController::class, 'carusel'])->name('carusel')->middleware('roles:1');
Route::get('/addabout', [App\Http\Controllers\AdminController::class, 'addabout'])->name('addabout')->middleware('roles:1');
Route::post('/deleteabout', [App\Http\Controllers\AdminController::class, 'deleteabout'])->name('deleteabout')->middleware('roles:1');
Route::post('/insertabout', [App\Http\Controllers\AdminController::class, 'insertabout'])->name('insertabout')->middleware('roles:1');

Route::post('/editabout_l', [App\Http\Controllers\AdminController::class, 'editabout_l'])->name('editabout_l')->middleware('roles:1');
Route::post('/editabout_r', [App\Http\Controllers\AdminController::class, 'editabout_r'])->name('editabout_r')->middleware('roles:1');

Route::post('/editabout_bottom', [App\Http\Controllers\AdminController::class, 'editabout_bottom'])->name('editabout_bottom')->middleware('roles:1');
Route::post('/editabout_bottom_questions', [App\Http\Controllers\AdminController::class, 'editabout_bottom_questions'])->name('editabout_bottom_questions')->middleware('roles:1');

Route::get('lang/{locale}',[App\Http\Controllers\HomeController::class, 'lang'])->name('lang'); 


Route::post('/disable_enable', [App\Http\Controllers\AdminController::class, 'disable_enable'])->name('disable_enable')->middleware('roles:1,2');

Route::get('client/ip', [App\Http\Controllers\HomeController::class, 'getIp']);


//////////////////////////////////////////////////////////////////////////////////////////

Route::get('cart', [App\Http\Controllers\CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [App\Http\Controllers\CartController::class, 'clearAllCart'])->name('cart.clear');
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

//Client and Admin Routes
Route::get('/client-manual', 'MemberController@manualClientPanel');
Route::get('/client-universal', 'MemberController@universalClientPanel');
Route::get('/client-dashboard', 'MemberController@dashboardClientPanel');
Route::get('/client-withdraw', 'MemberController@withdrawForm')->name('withdrawform');
Route::post('/client-withdraw/transaction', 'MemberController@withdrawTransaction');
Route::get('/admin-manual', 'MemberController@manualAdminPanel');
Route::get('/admin-universal', 'MemberController@universalAdminPanel');
Route::get('/member/add', 'MemberController@addmember')->name('addmember');
Route::post('/member/create','MemberController@store');
Route::get('/member/add-head', 'MemberController@addhead')->name('addhead');
Route::post('/member/create-head','MemberController@storehead');

//Account Routes
Route::get('/login', function(){
    if(session()->has('data')){
        
        if( session('data')['role'] == 'admin' ){
            return redirect('/admin-manual');
        }else {
            return redirect('/client-manual');
        }
    }
    return view('login');
});

Route::get('/', function(){
    if(session()->has('data')){
        if( session('data')['role'] == 'admin' ){
            return redirect('/admin-manual?page=1&batch=1');
        }else {
            return redirect('/client-dashboard');
        }
    }else {
        return redirect('/login');
    }
});
Route::post('/login', 'MemberController@login')->name('login');
Route::get('/logout', 'MemberController@logout');
Route::get('/change-password', 'MemberController@editPassword')->name('changePassword');
Route::put('/update-password', 'MemberController@updatePassword');
Route::get('/profile', 'MemberController@profile')->name('profile');
Route::get('/update-profile', 'MemberController@edit');
Route::put('/member/update', 'MemberController@update');

//Serial Number Routes
Route::get('/add-refcode', 'SerialNumberController@addCode')->name('addcode');
Route::post('/create-refcode', 'SerialNumberController@storeCode');
Route::get('/use-refcode/{member}', 'SerialNumberController@useCode');
Route::get('/use-refcode', function(){
    return redirect('/use-refcode/member');

});
Route::get('/check-refcode/{member}', 'SerialNumberController@checkCode');
Route::get('/view-refcode', 'SerialNumberController@showCode');

//For test only
Route::get('/test', 'MemberController@test');





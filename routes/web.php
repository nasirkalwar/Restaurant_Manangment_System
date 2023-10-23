<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});
*/
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'redirect']);
Route::post('/reservation',[HomeController::class,'reservation']);
Route::get('/my_reservation',[HomeController::class,'my_reservation']);
Route::get('/cancel_reservation/{id}',[HomeController::class,'cancel_reservation']);
Route::get('/cart',[HomeController::class,'cart']);
Route::post('/add_cart/{id}',[HomeController::class,'add_cart']);
Route::get('/remove_cart/{id}',[HomeController::class,'remove_cart']);
Route::post('/confirm_order',[HomeController::class,'confirm_order']);
Route::get('/book_reservation',[HomeController::class,'book_reservation']);
Route::get('/all_show_chefs',[HomeController::class,'all_show_chefs']);
Route::get('/about',[HomeController::class,'about']);
Route::get('/all_meal_menu',[HomeController::class,'all_meal_menu']);


Route::get('/users',[AdminController::class,'users']);
Route::get('/deleteuser/{id}',[AdminController::class,'deleteuser']);
Route::get('/add_food',[AdminController::class,'add_food']);
Route::post('/food',[AdminController::class,'food']);
Route::get('/add_chef',[AdminController::class,'add_chef']);
Route::post('/chef',[AdminController::class,'chef']);
Route::get('/show_food',[AdminController::class,'show_food']);
Route::get('/show_chefs',[AdminController::class,'show_chef']);
Route::get('/show_reservation',[AdminController::class,'show_reservation']);
Route::get('/delete_reservation/{id}',[AdminController::class,'delete_reservation']);
Route::get('/delete_chef/{id}',[AdminController::class,'delete_chef']);
Route::get('/edit_chef/{id}',[AdminController::class,'edit_chef']);
Route::post('/update_chef/{id}',[AdminController::class,'update_chef']);
Route::get('/send_mail/{id}',[AdminController::class,'send_mail']);
Route::get('/reject_reservation/{id}',[AdminController::class,'reject_reservation']);
Route::get('/accept_reservation/{id}',[AdminController::class,'accept_reservation']);
Route::get('/show_orders',[AdminController::class,'show_orders']);
Route::get('/delete_order/{id}',[AdminController::class,'delete_order']);
Route::get('/reject_order/{id}',[AdminController::class,'reject_order']);
Route::get('/accept_order/{id}',[AdminController::class,'accept_order']);
Route::get('/meal',[AdminController::class,'meal']);
Route::post('/add_meal',[AdminController::class,'add_meal']);
Route::get('/search_user',[AdminController::class,'search_user']);
Route::get('/search_food',[AdminController::class,'search_food']);
Route::get('/search_chef',[AdminController::class,'search_chef']);
Route::get('/search_reservation',[AdminController::class,'search_reservation']);
Route::get('/search_order',[AdminController::class,'search_order']);
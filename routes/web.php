<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Models\Order_product;

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

Route::get('/', [MainController::class, 'Catalog_Page']) -> name('catalog');
Route::get('/make_order', [MainController::class, 'Make_Order_Page']) -> name('basket');
Route::get('/orders', [MainController::class, 'Orders_Page']) -> name('orders');

Route::post('/basket/add', [BasketController::class, 'Add_To_Basket']) -> name('add_to_basket');

Route::post('/basket/delete', [BasketController::class, 'Delete_From_Basket']) -> name('delete_from_basket');

Route::post('/order/add', [OrderController::class, 'Add_Order']) -> name('add_order');

Route::post('/order/delete', [OrderController::class, 'Delete_Order']) -> name('delete_order');

Route::post('/auth/in', [AuthController::class, 'Log_In']);

Route::post('/auth/out', [AuthController::class, 'Log_Out']) -> name('log_out');

Route::get('/test', function(){
    $records = Order_product::with(['order', 'product'])->get();
    return $records;
});

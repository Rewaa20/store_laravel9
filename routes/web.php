<?php
use App\Http\Controllers\ProdController;
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

Route::resource('product', ProdController::class);
Route::get('/', [ ProdController::class , 'index' ]);

Route::get('/login',function(){
    return view('login');
})->name('login');
Route::post('valid', [ProdController::class , 'valid_login']);

Route::get('/register',function(){
    return view('register');
});

Route::get('logout', [ProdController::class , 'logout']);
Route::post('validAdd', [ProdController::class , 'validAdd']);

Route::get('/cpanel',function(){
    return view('cpanel');
});

Route::get('/add',function(){
    return view('addProd');
});
Route::get('shop', [ProdController::class , 'shop']);
Route::get('cart/{id}', [ProdController::class , 'cart']);
Route::get('showCart', [ProdController::class , 'showCart']);
Route::get('delProd/{id}', [ProdController::class , 'delProd']);
Route::get('delCart/{id}', [ProdController::class , 'delCart']);
Route::get('done', [ProdController::class , 'done']);
Route::get('fav', [ProdController::class , 'fav']);
Route::get('fav/{id}', [ProdController::class , 'addFav']); 
Route::get('favDel/{id}', [ProdController::class , 'favDel']); 
Route::get('jewlary', [ProdController::class , 'jewlary']); 
Route::get('women', [ProdController::class , 'women']); 
Route::get('men', [ProdController::class , 'men']); 
Route::get('parfan', [ProdController::class , 'parfan']); 
Route::get('bag', [ProdController::class , 'bag']); 
Route::get('care', [ProdController::class , 'care']); 
Route::get('makeup', [ProdController::class , 'makeup']); 
Route::get('devs', [ProdController::class , 'devs']); 



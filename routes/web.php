<?php

use App\Models\Produit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
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

/*Route::get('/dashboard', function () {
    return view('dashboard');
});*/

Route::get('/dashboard',[HomeController::class, 'dash']);

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/form', function () {
    return view('form-elements');
});

/*Route::get('/addOrder', function () {
    return view('addOrder');
});*/

Route::get('/welcome', function () {
    return view('welcome');
});

/*Route::get('/cafeDetails', function () {
    return view('cafeDetails');
});*/

Route::get('/tables-cafe', function () {
    return view('tables-cafe');
});

/*Route::get('/shop', function () {
    return view('WebSite/shop');
});*/
/*Route::get('/shop',[ProduitController::class, 'getProductUser']);*/
Route::get('/shop/{table}/{idCafe}',[ProduitController::class, 'getProductUser']);

Route::get('/product/{numTable}/{id}/{idCafe}',[ProduitController::class, 'infoProduct']);

/*Route::get('/editableShop', function () {
    return view('EditableWebSite/shop');
});*/

Route::get('/addProduct', function () {
    return view('addProduct');
});


Route::get('/tables-cafe',[CafeController::class, 'getCafe']);

Route::get('/tables-client',[ClientController::class, 'getClient']);

Route::get('/suppAdmin/{id}',[AdminController::class, 'deleteAdmin']);

Route::get('/suppClient/{id}',[ClientController::class, 'deleteClient']);

Route::get('/suppCafe/{id}',[CafeController::class, 'deleteCafe']);

//Route::get('/modifier/{id}',[AdminController::class, 'modifierAdmin']);

Route::post('/add-admin',[AdminController::class, 'ajoutAdmin']);

Route::post('/verifAdmin',[AdminController::class, 'verif']);

Route::post('/addC',[CafeController::class, 'ajoutCafe']);

Route::get('/modifier-cafe/{id}',[CafeController::class, 'getCafeId']);

Route::post('/modifierCafe/{id}',[CafeController::class, 'updateCafe']);

Route::post('/addClient',[ClientController::class, 'ajoutClient']);

Route::get('/modifier-client/{id}',[ClientController::class, 'getClientId']);

Route::post('/modifierClient/{id}',[ClientController::class, 'updateClient']);


Route::post('/addP',[ProduitController::class, 'ajoutProduit']);

Route::get('/tables-product',[ProduitController::class, 'getProduct']);

Route::get('/suppProduct/{id}',[ProduitController::class, 'deleteProduct']);

Route::get('/modifier-product/{id}',[ProduitController::class, 'getProductId']);

Route::post('/modifierProduct/{id}',[ProduitController::class, 'updateProduct']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'dash']);


Route::get('/addOrder',[OrderController::class, 'addOrder']);

Route::post('/addO',[OrderController::class, 'addO']);

Route::get('/deleteOrder/{id}',[OrderController::class, 'deleteO']);

Route::get('/payment/{id}',[HomeController::class, 'pay']);

Route::get('/viewDetails/{id}',[HomeController::class, 'viewD']);

Route::post('/buy/{numTable}/{id}',[OrderController::class, 'buyNow']);

Route::post('/addToCard/{numTable}/{id}/{idCafe}',[OrderController::class, 'AddTC']);

Route::get('/deleteProductCart/{id}/{quantity}/{numTable}/{idCafe}',[OrderController::class, 'DeleteTC']);

Route::get('/Checkout/{numTable}',[OrderController::class, 'CheckoutNow']);

Route::get('/l', function () {
    return view('login');
});

Route::get('/addCafe', function () {
    return view('addCafe');
});

Route::get('/addNewCafe', function () {
    return view('addNewCafe');
});


// POS
/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/payment', function () {
    return view('pos/payment');
});

// routes/web.php
Route::get('/pos', [PaymentController::class, 'showPOSPage']);

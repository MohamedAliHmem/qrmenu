<?php

use App\Models\Produit;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CafeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QrCodeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FactureController;
use App\Http\Controllers\ChangeOfferController;
use App\Mail\OrderShipped;
use Illuminate\Support\Facades\Mail;
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



Route::get('/dashboard',[HomeController::class, 'dash']);

Route::get('/', function () {
    return view('welcome_pages.first_page');
});

Route::get('/form', function () {
    return view('form-elements');
});

Route::get('/tables-cafe', function () {
    return view('tables-cafe');
});

Route::get('/shop/{table}/{idCafe}',[ProduitController::class, 'getProductUser']);

Route::get('/product/{numTable}/{id}/{idCafe}',[ProduitController::class, 'infoProduct']);

/*Route::get('/addProduct', function () {
    return view('addProduct');
});*/
Route::get('/addProduct',[ProduitController::class, 'addProductView']);

Route::get('/tables-cafe',[CafeController::class, 'getCafe']);

Route::get('/tables-client',[ClientController::class, 'getClient']);

Route::get('/suppAdmin/{id}',[AdminController::class, 'deleteAdmin']);

Route::get('/suppClient/{id}',[ClientController::class, 'deleteClient']);

Route::get('/suppCafe/{id}',[CafeController::class, 'deleteCafe']);

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

Route::get('/suppProductImage/{id}',[ProduitController::class, 'deleteProductImage']);

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

//Route::get('/Checkout/{numTable}',[OrderController::class, 'CheckoutNow']);
Route::post('/Checkout/{numTable}',[OrderController::class, 'CheckoutNow']);

Route::get('/l', function () {
    return view('login');
});

Route::get('/addCafe', function () {
    return view('addCafe');
});

Route::get('/addNewCafe', function () {
    return view('addNewCafe');
});

//qr code

Route::get('/qr_code_input', function () {
    return view('qr_code/qr_code_input');
});

Route::post('/generateQrCodes',[QrCodeController::class, 'generateQrCodes']);

//Category

/*Route::get('/addCategory', function () {
    return view('categories.addCategory');
});*/

Route::get('/addCategory',[CategoryController::class, 'index']);

Route::post('/add-category',[CategoryController::class, 'store']);

Route::get('/modifyCategory/{id}',[CategoryController::class, 'getCategoryId']);

Route::post('/updateCategory/{id}',[CategoryController::class, 'updateCategory']);

Route::get('/deleteCategory/{id}',[CategoryController::class, 'deleteCategory']);

//payment_sub

Route::get('/payment_sub', function () {
    return view('payment.payment_sub');
});

Route::post('/subscribe',[PaymentController::class, 'subscribe']);

Route::get('/payment_details', function () {
    return view('payment.payment_details_page');
});

//factures

Route::get('/factures',[FactureController::class, 'infoFacture']);

Route::get('/telechargerFacture',[FactureController::class, 'telechargerFacture']);

//change offer

Route::get('/change-offer',[ChangeOfferController::class, 'ChangeOfferView']);

Route::post('/change-plan',[ChangeOfferController::class, 'changeOffer']);

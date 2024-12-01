<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;

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
// Route::get('/', function () {
//     return view('auth.login');
// });
//==============  ADMIN DASHBOARD ==================
Route::get('/admin', function () {
    return view('admin.index');
})->name('adminindex');

Route::get('/admin/record', function () {
    return view('admin.record');
});

Route::get('/admin/contact',[AdminController::class, 'contactlist']);

Route::get('/admin/userlist', [AdminController::class, 'userlist'])->name('admin.userlist');
Route::delete('/admin/user/{id}', [AdminController::class, 'destroy'])->name('admin.user.destroy');
Route::get('/admin/user/{id}/edit', [AdminController::class, 'edit'])->name('admin.user.edit');
Route::put('/admin/user/{id}', [AdminController::class, 'update'])->name('admin.user.update');


Route::get('/admin/products', [AdminController::class, 'manageProducts'])->name('admin.manageProducts');
Route::patch('/admin/products/{id}/approve', [AdminController::class, 'approveProduct'])->name('admin.products.approve');
Route::delete('/admin/products/{id}', [AdminController::class, 'deleteProduct'])->name('admin.deleteProduct');


Route::get('/admin/tests', [AdminController::class, 'manageTests'])->name('admin.manageTests');
Route::delete('/admin/tests/{id}', [AdminController::class, 'deleteTest'])->name('admin.deleteTest');
// ===================website====================
Route::get('/', function () {
    return view('website.index');
})->name('indexpage');

Route::get('/about', function () {
    return view('website.about');
});

Route::get('/service', function () {
    return view('website.service');
});

Route::get('/contact',[AdminController::class, 'indexcontact']);
Route::post('/contact',[AdminController::class, 'storecontact']);
Route::get('/Delete/Contact/{id}',[AdminController::class, 'DeleteContact']);

//============ User Dashboard route =================


Route::get('/userdashboard',[TestController::class, 'userdashboard'])->name('userindex');

Route::get('/Delete/Test/{id}',[TestController::class, 'DeleteTest']);
Route::get('/Edit/Test/{id}', [TestController::class, 'EditTest']);
Route::post('/Update/Test/{id}', [TestController::class, 'UpdateTest']);
Route::get('/test',[TestController::class, 'index'])->name('test.index');

Route::get('/insert/test',[TestController::class, 'indextest']);
Route::post('/insert/test',[TestController::class, 'storetest']);

// Route::get('/test/edit', function () {
//     return view('Userdashboard.Test.edit');
// });
Route::get('/products/{productId}', function ($productId) {
    $product = Product::where('product_id', $productId)->first();
    return response()->json($product);
});
    // Product 
Route::get('/insert/product',[ProductController::class, 'indexproduct']);
Route::post('/insert/product',[ProductController::class, 'storeproduct']);
Route::get('/List/product',[ProductController::class, 'listproduct'])->name('product.index');

Route::get('/Delete/product/{id}',[ProductController::class, 'DeleteProduct']);
Route::get('/Edit/Product/{id}', [ProductController::class, 'EditProduct']);
Route::post('/Update/Product/{id}', [ProductController::class, 'updateProduct'])->name('product.update');


Route::get('/product/category',[ProductController::class, 'indexcategory'])->name('pcategory.index');
Route::post('/product/category',[ProductController::class, 'storecategory']);

Route::get('/product/Type',[ProductController::class, 'indexptype'])->name('pType.index');
Route::post('/product/Type',[ProductController::class, 'storeptype']);

Route::get('Delete/ProductType/{id}',[ProductController::class, 'DeleteProductType']);
Route::get('Delete/ProductCategory/{id}',[ProductController::class, 'DeleteProductCategory']);
Route::get('Edit/ProductCategory/{id}', [ProductController::class, 'EditProductCategory']);
Route::post('Update/ProductCategory/{id}', [ProductController::class, 'UpdateProductCategory']);

Route::get('Edit/ProductType/{id}', [ProductController::class, 'EditProductType']);
Route::post('Update/ProductType/{id}', [ProductController::class, 'UpdateProductType']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $role = Auth::user()->role;
        if($role == 'admin'){
        return redirect()->route('adminindex');
        }else if($role == 'user'){
        return redirect()->route('userindex');
    }
    })->name('dashboard');
});

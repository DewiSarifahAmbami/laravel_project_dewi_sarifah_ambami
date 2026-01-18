<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route; 

// User - Hanya bisa diakses setelah login
// Route::middleware(['auth'])->group(function () {
//     Route::get('/', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
 
// Route::get('/', function () {
//     $products = Product::latest()->take(8)->get();
//     return view('user.home', compact('products'));
// })->name('home');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified', 'admin'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//     Route::resource('/category', CategoryController::class);
//     Route::resource('/products', ProductController::class);
//     // KERANJANG PESANAN
//     Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
//     Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
//     Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
//     Route::delete('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');
//     // CHECKOUT
//     Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
//     Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
// });

// Route::middleware('auth')->group(function () {
//     Route::resource('category', CategoryController::class);
//     Route::resource('products', ProductController::class);
// });

// Route::resource('/category', CategoryController::class);
// Route::resource('/products', ProductController::class);

// Route::get('/', function () {
//     $products = Product::latest()->take(8)->get();
//     return view('home', compact('products'));
// })->name('home');

// Route::get('/admin', function () {
//     return view('home');
// })->name('home');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout.get');

// // In your web.php file, make sure the registration route is accessible to guests
// Route::get('/register', [RegisteredUserController::class, 'create'])
//     ->middleware('guest')
//     ->name('register');

// Route::post('/register', [RegisteredUserController::class, 'store']);

// Apply the 'admin' middleware only to routes that require admin access
// Route::middleware(['auth', 'admin'])->group(function () {
//     // Admin-only routes here
//     Route::get('/dashboard', function () {
//         return view('home');
//     })->name('home');
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('/', function () {
    $products = Product::latest()->take(8)->get();
    return view('home', compact('products'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/category', CategoryController::class);
    Route::resource('/products', ProductController::class);
    // KERANJANG PESANAN
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [
        CartController::class,
        'remove'
    ])->name('cart.remove');
    // CHECKOUT
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::get('/checkout/sukses', [CheckoutController::class, 'sukses'])->name('checkout.sukses');
    Route::put(
        '/checkout/{order}/bukti-pembayaran',
        [CheckoutController::class, 'updatePaymentProof']
    )->name('checkout.updatePaymentProof');
    // ORDERS
    Route::get('/orders/history', [OrderController::class, 'history'])->name('orders.history');
});


require __DIR__ . '/auth.php';

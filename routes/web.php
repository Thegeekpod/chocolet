<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    $categories = \App\Models\Category::where('is_visible_on_home', true)->get();
    $products = \App\Models\Product::where('is_visible_on_home', true)->get();
    return view('frontend.index', compact('categories', 'products'));
});



Route::get('/about', function () {
    return view('frontend.about');
});

Route::get('/products', function () {
    $products = \App\Models\Product::all();
    return view('frontend.products', compact('products'));
});

Route::get('/gallery', function () {
    return view('frontend.gallery');
});

Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/product/{slug}', function ($slug) {
    $product = \App\Models\Product::where('slug', $slug)->firstOrFail();
    $relatedProducts = \App\Models\Product::where('category_id', $product->category_id)
        ->where('id', '!=', $product->id)
        ->limit(3)
        ->get();
    return view('frontend.product-single', compact('product', 'relatedProducts'));
});


// Admin Auth Routes
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Admin Routes
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', function () {
        $totalCategories   = \App\Models\Category::count();
        $totalProducts     = \App\Models\Product::count();
        $totalInquiries    = \App\Models\ContactInquiry::count();
        $unreadInquiries   = \App\Models\ContactInquiry::where('is_read', false)->count();
        return view('admin.dashboard', compact(
            'totalCategories',
            'totalProducts',
            'totalInquiries',
            'unreadInquiries'
        ));
    });
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('products', \App\Http\Controllers\Admin\ProductController::class);
    Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'edit'])->name('settings.edit');
    Route::post('settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
    Route::resource('contacts', \App\Http\Controllers\Admin\ContactInquiryController::class)->only(['index', 'show', 'destroy']);
});

<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Pos\DesController;
use App\Http\Controllers\Pos\UnitController;
use App\Http\Controllers\Web\homecontroller;
use App\Http\Controllers\Demo\DemoController;
use App\Http\Controllers\Pos\EventController;
use App\Http\Controllers\Pos\StockController;
use App\Http\Controllers\Pos\BannerController;
use App\Http\Controllers\Pos\DefaultController;
use App\Http\Controllers\Pos\InvoiceController;
use App\Http\Controllers\Pos\ProductController;
use App\Http\Controllers\Pos\CategoryController;
use App\Http\Controllers\Pos\CustomerController;
use App\Http\Controllers\Pos\PurchaseController;
use App\Http\Controllers\Pos\SupplierController;




Route::get('/admin', function () {
    return view('welcome');
});

Route::controller(homecontroller::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(DemoController::class)->group(function () {
    Route::get('/about', 'Index')
        ->name('about.page')
        ->middleware('check');
    Route::get('/contact', 'ContactMethod')->name('cotact.page');
});

Route::middleware('auth')->group(function () {
    //Banner All Route
    Route::controller(EventController::class)->group(function () {
        Route::get('/event/all', 'EventAll')->name('event.all');
        Route::get('/event/edit/{id}', 'EventEdit')->name('event.edit');
        Route::post('/event/update', 'EventUpdate')->name('event.update');
    });
    //Description All Route
    Route::controller(DesController::class)->group(function () {
        Route::get('/des/all', 'DesAll')->name('des.all');
        Route::get('/des/add', 'DesAdd')->name('des.add');
        Route::post('/des/store', 'DesStore')->name('des.store');
        Route::get('/des/edit/{id}', 'DesEdit')->name('des.edit');
        Route::post('/des/update', 'DesUpdate')->name('des.update');
        Route::get('/des/delete/{id}', 'DesDelete')->name('des.delete');
    });
    //Banner All Route
    Route::controller(BannerController::class)->group(function () {
        Route::get('/banner/all', 'BannerAll')->name('banner.all');
        Route::get('/banner/add', 'BannerAdd')->name('banner.add');
        Route::post('/banner/store', 'BannerStore')->name('banner.store');
        Route::get('/banner/edit/{id}', 'BannerEdit')->name('banner.edit');
        Route::post('/banner/update', 'BannerUpdate')->name('banner.update');
        Route::get('/banner/delete/{id}', 'BannerDelete')->name('banner.delete');
    });
    // Admin All Route
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/logout', 'destroy')->name('admin.logout');
        Route::get('/admin/profile', 'Profile')->name('admin.profile');
        Route::get('/edit/profile', 'EditProfile')->name('edit.profile');
        Route::post('/store/profile', 'StoreProfile')->name('store.profile');
        Route::get('/change/password', 'ChangePassword')->name('change.password');
        Route::post('/update/password', 'UpdatePassword')->name('update.password');
    });

    // Admin All Route
    Route::controller(SupplierController::class)->group(function () {
        Route::get('/supplier/all', 'SupplierAll')->name('supplier.all');
        Route::get('/supplier/add', 'SupplierAdd')->name('supplier.add');
        Route::post('/supplier/store', 'SupplierStore')->name('supplier.store');
        Route::get('/supplier/edit/{id}', 'SupplierEdit')->name('supplier.edit');
        Route::post('/supplier/update', 'SupplierUpdate')->name('supplier.update');
        Route::get('/supplier/delete/{id}', 'SupplierDelete')->name('supplier.delete');
    });

    // Customer All Route
    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer/all', 'CustomerAll')->name('customer.all');
        Route::get('/customer/add', 'CustomerAdd')->name('customer.add');
        Route::post('/customer/store', 'CustomerStore')->name('customer.store');
        Route::get('/customer/edit/{id}', 'CustomerEdit')->name('customer.edit');
        Route::post('/customer/update', 'CustomerUpdate')->name('customer.update');
        Route::get('/customer/delete/{id}', 'CustomerDelete')->name('customer.delete');
    });

    // Unit All Route
    Route::controller(UnitController::class)->group(function () {
        Route::get('/unit/all', 'UnitAll')->name('unit.all');
        Route::get('/unit/add', 'UnitAdd')->name('unit.add');
        Route::post('/unit/store', 'UnitStore')->name('unit.store');
        Route::get('/unit/edit/{id}', 'UnitEdit')->name('unit.edit');
        Route::post('/unit/update', 'UnitUpdate')->name('unit.update');
        Route::get('/unit/delete/{id}', 'UnitDelete')->name('unit.delete');
    });

    // Category All Route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/category/all', 'CategoryAll')->name('category.all');
        Route::get('/category/add', 'CategoryAdd')->name('category.add');
        Route::post('/category/store', 'CategoryStore')->name('category.store');
        Route::get('/category/edit/{id}', 'CategoryEdit')->name('category.edit');
        Route::post('/category/update', 'CategoryUpdate')->name('category.update');
        Route::get('/category/delete/{id}', 'CategoryDelete')->name('category.delete');
    });

    // Product All Route
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product/all', 'ProductAll')->name('product.all');
        Route::get('/product/add', 'ProductAdd')->name('product.add');
        Route::post('/product/store', 'ProductStore')->name('product.store');
        Route::get('/product/edit/{id}', 'ProductEdit')->name('product.edit');
        Route::post('/product/update', 'ProductUpdate')->name('product.update');
        Route::get('/product/delete/{id}', 'ProductDelete')->name('product.delete');
    });

    // Purchase All Route
    Route::controller(PurchaseController::class)->group(function () {
        Route::get('/purchase/all', 'PurchaseAll')->name('purchase.all');
        Route::get('/purchase/add', 'PurchaseAdd')->name('purchase.add');
        Route::post('/purchase/store', 'PurchaseStore')->name('purchase.store');
        Route::get('/purchase/delete/{id}', 'PurchaseDelete')->name('purchase.delete');
        Route::get('/purchase/pending', 'PurchasePending')->name('purchase.pending');
        Route::get('/purchase/approve/{id}', 'PurchaseApprove')->name('purchase.approve');
    });

    // Invoice All Route
    Route::controller(InvoiceController::class)->group(function () {
        Route::get('/invoice/all', 'InvoiceAll')->name('invoice.all');
        Route::get('/invoice/add', 'invoiceAdd')->name('invoice.add');
        Route::post('/invoice/store', 'InvoiceStore')->name('invoice.store');
        Route::get('/invoice/pending/list', 'PendingList')->name('invoice.pending.list');
        Route::get('/invoice/delete/{id}', 'InvoiceDelete')->name('invoice.delete');
        Route::get('/invoice/approve/{id}', 'InvoiceApprove')->name('invoice.approve');
        Route::post('/approval/store/{id}', 'ApprovalStore')->name('approval.store');
        Route::get('/print/invoice/list', 'PrintInvoiceList')->name('print.invoice.list');
        Route::get('/print/invoice/{id}', 'PrintInvoice')->name('print.invoice');
        Route::get('/daily/invoice/report', 'DailyInvoiceReport')->name('daily.invoice.report');
        Route::get('/daily/invoice/pdf', 'DailyInvoicePdf')->name('daily.invoice.pdf');
    });

    Route::controller(StockController::class)->group(function () {
        Route::get('/stock/report', 'StockReport')->name('stock.report');
        Route::get('/stock/report/pdf', 'StockReportPdf')->name('stock.report.pdf');

        Route::get('/stock/supplier/wise', 'StockSupplierWise')->name('stock.supplier.wise');
        Route::get('/supplier/wise/pdf', 'SupplierWisePdf')->name('supplier.wise.pdf');
        Route::get('/product/wise/pdf', 'ProductWisePdf')->name('product.wise.pdf');
    });
});

// Default All Route
Route::controller(DefaultController::class)->group(function () {
    Route::get('/get-category', 'GetCategory')->name('get-category');
    Route::get('/get-product', 'GetProduct')->name('get-product');
    Route::get('/check-product', 'GetStock')->name('check-product-stock');
});
Route::get('/dashboard', function () {
    return view('admin.index');
})
    ->middleware(['auth'])
    ->name('dashboard');

require __DIR__ . '/auth.php';

// Route::get('/contact', function () {
//     return view('contact');
// });

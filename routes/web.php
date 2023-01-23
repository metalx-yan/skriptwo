<?php

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
Route::get('/report/barang', 'ReportController@report')->name('report.barang');
Route::post('/reportzz', 'ReportController@reportzz')->name('reportzz');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:administrator']], function() {

    Route::get('/', function () {
        $data_he = [0,222];
        return view('admin.index', compact('data_he'));
    });

    Route::resource('users', 'UserController');
    Route::resource('stocks', 'StockController');
    Route::resource('reports', 'ReportController');
    Route::resource('suppliers', 'SupplierController');

    
});


Route::group(['prefix' => 'ppic', 'middleware' => ['auth', 'role:ppic']], function() {

    Route::get('/', function () {
        return view('ppic.index');
    });
    Route::resource('stocks', 'StockController', [
        'names' => [
            'index' => 'index.stock.ppic',
            'store' => 'store.stock.ppic',
            'create' => 'create.stock.ppic',
            'destroy' => 'destroy.stock.ppic',
            'update' => 'update.stock.ppic',
            'show' => 'show.stock.ppic',
            'edit' => 'edit.stock.ppic',
            // etc...
        ]
    ]);
    // Route::resource('stocks', 'StockController');
 
});

Route::group(['prefix' => 'purchasing', 'middleware' => ['auth', 'role:purchasing']], function() {

    Route::get('/', function () {
        return view('purchasing.index');
    });
    Route::resource('stocks', 'StockController', [
        'names' => [
            'index' => 'index.stock',
            'store' => 'store.stock',
            'create' => 'create.stock',
            'destroy' => 'destroy.stock',
            'update' => 'update.stock',
            'show' => 'show.stock',
            'edit' => 'edit.stock',
            // etc...
        ]
    ]);
    Route::resource('reports', 'ReportController', [
        'names' => [
            'index' => 'index.report',
            'store' => 'store.report',
            'create' => 'create.report',
            'destroy' => 'destroy.report',
            'update' => 'update.report',
            'show' => 'show.report',
            'edit' => 'edit.report',
            // etc...
        ]
    ]);
    // Route::resource('reports', 'ReportController');
    // Route::get('/report/barang', 'ReportController@report')->name('report.barang');
    // Route::get('/report/barang', 'ReportController@report')->name('report.barang');
    // Route::post('/reportzz', 'ReportController@reportzz')->name('reportzz');
    Route::resource('suppliers', 'SupplierController', [
        'names' => [
            'index' => 'index.purchasing',
            'store' => 'store.purchasing',
            'create' => 'create.purchasing',
            'destroy' => 'destroy.purchasing',
            'update' => 'update.purchasing',
            'show' => 'show.purchasing',
            'edit' => 'edit.purchasing',
            // etc...
        ]
    ]);
});


Route::group(['prefix' => 'pimpinan', 'middleware' => ['auth', 'role:pimpinan']], function() {

    Route::get('/', function () {
        return view('pimpinan.index');
    });
    // Route::resource('reports', 'ReportController');
    Route::resource('reports', 'ReportController', [
        'names' => [
            'index' => 'index.report.pimpinan',
            'store' => 'store.report.pimpinan',
            'create' => 'create.report.pimpinan',
            'destroy' => 'destroy.report.pimpinan',
            'update' => 'update.report.pimpinan',
            'show' => 'show.report.pimpinan',
            'edit' => 'edit.report.pimpinan',
            // etc...
        ]
    ]);
    // Route::get('/report/barang', 'ReportController@report')->name('report.barang');
    // Route::post('/reportzz', 'ReportController@reportzz')->name('reportzz');
   
});
Route::get('/', function () {

    return view('welcome');
});

Route::get('/design', function () {

    return view('design');
});

Route::get('/furniture', function () {

    return view('furniture');
});

Route::get('/finishing', function () {

    return view('finishing');
});

Route::get('/video', function () {

    return view('video');
});

Route::get('/product', function () {

    return view('product');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




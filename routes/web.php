<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.beranda');
});

Route::get('/about', function () {
    return view('pages.about', [
        'nama'  => 'Belva Mischah Callula Gultom',
        'kelas' => 'D4SM-48-02',
        'nim'   => '707082400061',
    ]);
});

Route::view('/contact', 'pages.contact');

// untuk menampilkan data dari database
Route::get('/product', [ProductController::class, 'index']);
// menampilkan halaman form insert data (wajib di atas /product/{id})
Route::get('/product/addProduct', [ProductController::class, 'addProduct']);
// memasukkan data dari form ke dalam database
Route::post('/product', [ProductController::class, 'store']);
// menampilkan detail data produk berdasarkan id
Route::get('/product/{id}', [ProductController::class, 'show']);
// menampilkan form untuk merubah data
Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
// menyimpan data yang sudah dirubah
Route::put('/product/{id}', [ProductController::class, 'update']);
// menghapus data berdasarkan id
Route::delete('/product/{id}', [ProductController::class, 'destroy']);

// resource controller untuk kategori produk
Route::resource('/category', CategoryController::class);

// Latihan pemanasan (opsional)
Route::get('/latihan', function () {
    $matakuliah = ['Pemrograman Web', 'Basis Data', 'UI/UX'];
    return view('pages.latihan', ['matakuliah' => $matakuliah]);
});

// Soal 1 Modul 7
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
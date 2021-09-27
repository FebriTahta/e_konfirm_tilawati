<?php
use App\Http\Controllers\KonfirmasiCont;
use App\Http\Controllers\DiklatCont;
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

Route::get('/', function () {
    // return view('welcome');
    return redirect('/');
});

//peserta
Route::get('/',[KonfirmasiCont::class, 'index'])->name('index.e_confirm');
Route::get('/data-peserta',[KonfirmasiCont::class,'data_peserta_diklat_menunggu_konfirmasi'])->name('data_peserta');
Route::post('/konfirmasi-data-peserta-acc',[KonfirmasiCont::class,'acc'])->name('acc');


//diklat
Route::get('/seluruh-diklat',[DiklatCont::class, 'index'])->name('seluruh.diklat');
Route::get('/data-diklat',[DiklatCont::class, 'data_diklat'])->name('data_diklat');



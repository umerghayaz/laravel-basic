<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',

    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        // $users=User::all();
        $users = DB::table('users')->get();

        return view('dashboard',compact('users'));
    })->name('dashboard');
});
Route::get('/category/all',[CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add',[CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/category/edit/{id}',[CategoryController::class, 'Edit']);
Route::post('/category/update/{id}',[CategoryController::class, 'Update']);
Route::get('softdelete/category/{id}',[CategoryController::class, 'SoftDelete']);
Route::get('category/restore/{id}',[CategoryController::class, 'Restore']);
Route::get('category/fdelete/{id}',[CategoryController::class, 'Fdelete']);
////brand
Route::get('/brand/all',[BrandController::class, 'AllBrand'])->name('all.brand');


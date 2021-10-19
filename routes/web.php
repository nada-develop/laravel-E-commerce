<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\DB;
use App\Models\User;



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
    return view('welcome');
});
Route::get('/home', function () {
    echo "this is Home page";
});
// Route::get('/about', [AboutController::class, 'index'])->middleware('check');
Route::get('/about', [AboutController::class, 'index'])->name('About.index');
Route::get('/contact', [ContactController::class, 'index'])->name('Contact.index');
Route::get('/category/all', [CategoryController::class, 'allcat' ])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'addCat' ])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'editCat'])->name('edit.cat');
Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('update.category');
Route::get('/category/delete/{id}', [CategoryController::class, 'delete'])->name('delete.cat');
Route::get('/category/restore/{id}', [CategoryController::class, 'restore'])->name('restore.cat');
Route::get('/category/forceDelete/{id}', [CategoryController::class, 'forceDelete'])->name('forceDelete.cat');
//route for brand
Route::get('/brand/all', [BrandController::class, 'allBrand'])->name('all.brand');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//orm method to read data from db
   $users = User::all();
   //QB method to read data from db
//    $users = DB::table('users')->get();
    return view('dashboard', compact('users'));
})->name('dashboard');

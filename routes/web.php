<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\PagesController as AdminPagesController;
use App\Http\Controllers\Admin\StaticPagesController as AdminStaticPagesController;

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

Route::group(["prefix" => "admin", "as" => "admin."], function () {
    Route::get("/", [AdminCategoriesController::class, "index"]);
    Route::resource("categories", AdminCategoriesController::class);
    Route::resource("pages", AdminPagesController::class);
    Route::resource("static-pages", AdminStaticPagesController::class);
});

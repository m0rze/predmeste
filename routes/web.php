<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\PagesController as AdminPagesController;

use App\Http\Controllers\Website\IndexController as WebsiteIndexController;
use App\Http\Controllers\Website\PageController as WebsitePageController;
use App\Http\Controllers\Website\CategoriesController as WebsiteCategoriesController;

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
    Route::get('pages/create/{type}', [AdminPagesController::class, "create"])->name("pages.create");
    Route::get('pages/static-pages/', [AdminPagesController::class, "staticIndex"])->name("static-pages.index");
    Route::get('pages/pages/', [AdminPagesController::class, "index"])->name("pages.index");
    Route::resource("pages", AdminPagesController::class, ['except' => ['create', 'index']]);
});

Route::get("/", [WebsiteIndexController::class, "index"])->name("index");
Route::get("/{page}", [WebsitePageController::class, "showStatic"])->name("page.show.static");
Route::get("/{slug}", [WebsiteCategoriesController::class, "show"])->name("category.show");

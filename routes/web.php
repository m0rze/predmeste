<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ValidateAuth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\CategoriesController as AdminCategoriesController;
use App\Http\Controllers\Admin\PagesController as AdminPagesController;
use App\Http\Controllers\Admin\WidgetsController as AdminWidgetsController;

use App\Http\Controllers\Website\IndexController as WebsiteIndexController;
use App\Http\Controllers\Website\PageController as WebsitePageController;
use App\Http\Controllers\Website\CategoriesController as WebsiteCategoriesController;
use App\Http\Controllers\Website\WidgetsController as WebsiteWidgetsController;

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

Route::get("/admin/login", [LoginController::class, "show"])->name("login");
Route::post("/admin/login", [LoginController::class, "login"])->name("gologin");

Route::middleware([ValidateAuth::class])->group(function () {
    Route::group(["prefix" => "admin", "as" => "admin."], function () {
        Route::get("/", [AdminCategoriesController::class, "index"]);
        Route::resource("categories", AdminCategoriesController::class);
        Route::get('pages/create/{type}', [AdminPagesController::class, "create"])->name("pages.create");
        Route::get('pages/static-pages/', [AdminPagesController::class, "staticIndex"])->name("static-pages.index");
        Route::get('pages/pages/', [AdminPagesController::class, "index"])->name("pages.index");
        Route::resource("pages", AdminPagesController::class, ['except' => ['create', 'index']]);
        Route::resource("widgets", AdminWidgetsController::class);
    });
});

Route::get("/", [WebsiteIndexController::class, "index"])->name("index");
Route::get("/static/{page}", [WebsitePageController::class, "showStatic"])->name("page.show.static");
Route::get("/widgets", [WebsiteWidgetsController::class, "show"])->name("page.show.widgets");
Route::get("/{cat}/{page}", [WebsitePageController::class, "showCategorized"])->name("page.show.categorized");
Route::get("/{slug}", [WebsiteCategoriesController::class, "show"])->name("category.show");

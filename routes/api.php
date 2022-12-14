<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\ApiCategoryController;
use App\Http\Controllers\Api\Admin\ApiPagesController;
use App\Http\Middleware\ApiVerifyCustom;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});



Route::middleware([ApiVerifyCustom::class])->group(function () {
    Route::group(["prefix" => "admin", "as" => "admin."], function () {
        Route::post("/category/add", [ApiCategoryController::class, "addNew"]);
        Route::delete("/category/delete/{id}", [ApiCategoryController::class, "delete"]);

        Route::post("/pages/upload-file", [ApiPagesController::class, "uploadFile"]);
        Route::delete("/pages/delete/{id}", [ApiPagesController::class, "delete"]);

    });
});

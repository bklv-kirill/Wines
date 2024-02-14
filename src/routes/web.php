<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\{
    AuthController,
    LoginController,
    LogOutController,
    RegisterController,
    StoreController as UserStoreController,
};
use App\Http\Controllers\Wines\{
    IndexController as WinesIndexController,
    TypeIndexController as WinesTypeIndexController,
    ShowController as WinesShowController,
    CreateController as WinesCreateController,
    StoreController as WinesStoreController,
    DeleteController as WinesDeleteController,
};
use App\Http\Controllers\Favorites\{
    IndexController as FavoritesIndexController,
    StoreController as FavoritesStoreController,
    DeleteController as FavoritesDeleteController,
};

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

Route::view("/", "main");

Route::prefix("wines")->group(function () {
    Route::name("wines.")->group(function () {
        Route::get("/", WinesIndexController::class)->name("index");
        Route::get("/create", WinesCreateController::class)->name("create");
        Route::post("/create", WinesStoreController::class)->name("store");

        Route::get("/{type}", WinesTypeIndexController::class)->name("typeIndex");
        Route::get("/{type}/{wine}", WinesShowController::class)->name("show");
        Route::delete("/{type}/{wine}", WinesDeleteController::class)->name("delete");
    });
});

Route::middleware("auth")->group(function () {
    Route::name("user.")->group(function () {
        Route::get("/logout", LogOutController::class)->name("logout");
    });

    Route::name("favorites.")->group(function () {
        Route::get("/favorites", FavoritesIndexController::class)->name("index");
        Route::redirect("/favorites/{wine}", "/favorites");

        Route::post("/favorites/{wine}", FavoritesStoreController::class)->name("store");
        Route::delete("/favorites/{wine}", FavoritesDeleteController::class)->name("delete");
    });
});

Route::middleware("guest")->group(function () {
    Route::name("user.")->group(function () {
        Route::get("/login", LoginController::class)->name("login");
        Route::post("/login", AuthController::class)->name("auth");

        Route::post("/register", UserStoreController::class)->name("store");
        Route::get("/register", RegisterController::class)->name("register");
    });
});

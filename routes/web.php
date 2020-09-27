<?php

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::redirect("/", "home");
Route::get("/home", "HomeController@index")->name("home");
Route::get("/contact", "PagesController@contact");
Route::get("/author", "PagesController@author");
Route::get("/activity", "PagesController@activity");
Route::get("/home/category/{categoryId}", "HomeController@category")->where(["categoryId"=> "\d+"]);
Route::get("/page/{offset}/cat/{categId}", "ProductsController@getProducts")->where(["offset"=> "\d+"]);
Route::get("/home/category/page/{offset}/cat/{categId}", "ProductsController@getProducts")->where(["offset"=> "\d+"]);
Route::get("/filterProd/{priceSort}/{price}/{categoryId}/{searched?}", "ProductsController@filterProd");
Route::get("/home/category/{categoryId}/page/{offset}", "ProductsController@getProductsCategory")->where(["offset"=> "\d+"]);
Route::get("/home/category/filterProd/{priceSort}/{price}/{categoryId}/{searched?}", "ProductsController@filterProd");
Route::post("/registration", "UserController@registration");
Route::post("/login", "UserController@login");
Route::get("/logout", "UserController@logout")->middleware(["isLoggedIn"]);
Route::get("/admin", "PagesController@admin")->middleware(["AdminMiddleware"])->name('admin');
Route::get("/addToWishlist", "ProductsController@addToWishlist")->middleware(["isUserLogged"]);
Route::get("/home/category/addToWishlist", "ProductsController@addToWishlist")->middleware(["isUserLogged"]);
Route::get("/wishlist", "ProductsController@getWishlist")->middleware(["isUserLogged"]);
Route::get("/home/category/wishlist", "ProductsController@getWishlist")->middleware(["isLoggedIn"]);
Route::get("/deleteWishlist", "ProductsController@deleteWishlist")->middleware(["isLoggedIn"]);
Route::get("/changeQuantity", "ProductsController@changeQuantity")->middleware(["isLoggedIn"]);
Route::get("/admin/page/{offset}", "admin\ProductsController@getProductsAdmin")->where(["offset"=> "\d+"]);
Route::get("/admin/getProducts", "admin\ProductsController@getProductsAdmin");
Route::get("/admin/search", "admin\ProductsController@getProductsSearch");
Route::get("/admin/getPagination", "admin\ProductsController@getPagination");
Route::get("/getProd", "admin\ProductsController@getProd");
Route::post("/updateProd", "admin\ProductsController@updateProd")->middleware(["AdminMiddleware"]);
Route::post("/insertProd", "admin\ProductsController@insertProd")->middleware(["AdminMiddleware"]);
Route::get("/deleteProd", "admin\ProductsController@deleteProd");
Route::get("/findUser/{id}", "admin\UserController@findUser")->where(["id"=> "\d+"]);
Route::post("/updateUser", "admin\UserController@updateUser");
Route::get("/deleteUser/{id}", "admin\UserController@deleteUser");
Route::get("/getUsers", "admin\UserController@getUsers");
Route::post("/authorText", "admin\PageSectionController@modAuthorText");
Route::post("/insertCategory", "admin\CategoriesController@insertCategory");
Route::get("/getCategories", "admin\CategoriesController@getCategories");
Route::get("/deleteCategory/{id}", "admin\CategoriesController@deleteCategory");
Route::post("/renameCategory", "admin\CategoriesController@renameCategory");
Route::post("/sendMessage", "UserController@sendMessage");
Route::get("/messageRead/{id}", "admin\UserController@messageRead");
Route::get("/updateSoc", "admin\SocialsController@updateSoc");
Route::get("/deleteSoc/{id}", "admin\SocialsController@deleteSoc");
Route::get("/getSocials", "admin\SocialsController@getSocials");
Route::get("/insertSoc", "admin\SocialsController@insertSoc");
Route::get("/sortActivity", "admin\ActivityController@sortActivity");
Route::get("/newActivity", "admin\ActivityController@newActivities");

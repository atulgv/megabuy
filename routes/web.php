<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BuyerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RazorPaymentController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;



//login controller
Route::get('/login', [LoginController::class, 'showLoginPage']);
Route::get('/register', [LoginController::class, 'showRegisterPage']);
Route::get('/registerUser', [LoginController::class, 'showRegisterUserPage']);
Route::post('/authenticate', [LoginController::class, 'authenticateUser']);
Route::post('/createuser', [LoginController::class, 'createNewUser']);
Route::put('/createnewuser', [LoginController::class, 'makeNewUser']);

//session controller
Route::get('/showsessions', [SessionController::class, 'showAllSessions']);
Route::get('/destroysession', [SessionController::class, 'destroySession']);

//admin controller
Route::get('/showadmindata', [AdminController::class, 'showAdminData']);
Route::get('/showbuyerdata', [AdminController::class, 'showBuyerData']);
Route::get('/showsellerdata', [AdminController::class, 'showSellerData']);
Route::get('/showitemdata', [AdminController::class, 'showItemData']);
Route::get('/showcategorydata', [AdminController::class, 'showCategoryData']);
Route::get('/showsubcategorydata', [AdminController::class, 'showSubCategoryData']);
Route::get('/showitemcategorydata', [AdminController::class, 'showItemCategoryData']);
Route::get('/itemcategorydata/{itemcategoryid}', [AdminController::class, 'itemCategoryData']);
Route::get('/showcreatenewuserpage', [AdminController::class, 'showCreateNewUserPage']);
Route::get('/showcreatecategorypage', [AdminController::class, 'showCreateCategoryPage']);
Route::post('/createnewcategory', [AdminController::class, 'createNewCategory']);
Route::get('/showcreatesubcategorypage', [AdminController::class, 'showCreateSubCategoryPage']);
Route::post('createnewsubcategory', [AdminController::class, 'CreateNewSubCategory']);
Route::get('/showcreateitemcategorypage', [AdminController::class, 'showCreateItemCategoryPage']);
Route::post('/createnewitemcategory', [AdminController::class, 'createNewItemCategory']);
Route::get('/showcreateicategorypage/{icategoryname}', [AdminController::class, 'showCreateICategoryPage']);
Route::post('/createnewicategory/{icategoryname}', [AdminController::class, 'createNewICategory']);
Route::get('/showmegadealdata', [AdminController::class, 'showMegadealData']);
Route::get('/showmovetomegadealpage/{allitem_id}', [AdminController::class, 'showMoveToMegadealPage']);
Route::post('/movetomegadeal/{allitem_id}', [AdminController::class, 'moveToMegadeal']);
Route::get('/removefrommegadeal/{allitem_id}', [AdminController::class, 'removeFromMegadeal']);
Route::get('/showeditcategorypage/{cat_id}', [AdminController::class, 'showEditCategoryPage']);
Route::post('/updatecategory', [AdminController::class, 'updateCategory']);
Route::get('/showeditsubcategorypage/{subcat_id}', [AdminController::class, 'showEditSubCategoryPage']);
Route::post('/updatesubcategory', [AdminController::class, 'updateSubCategory']);
Route::get('/deletecategory/{cat_id}', [AdminController::class, 'deleteCategory']);
Route::get('/deletesubcategory/{subcat_id}', [AdminController::class, 'deleteSubCategory']);
Route::get('/searchadmins', [AdminController::class, 'searchAdmins']);
Route::get('/searchbuyers', [AdminController::class, 'searchBuyers']);
Route::get('/searchsellers', [AdminController::class, 'searchSellers']);
Route::get('/searchcategories', [AdminController::class, 'searchCategories']);
Route::get('/searchsubcategories', [AdminController::class, 'searchSubCategories']);
Route::get('/searchallitems', [AdminController::class, 'searchAllItems']);
Route::get('/searchitemcategories', [AdminController::class, 'searchItemCategories']);

//buyer controller
Route::get('/showwishlistpage', [BuyerController::class, 'showWishlistPage']);
Route::post('/addtowishlist/{allitemid}', [BuyerController::class, 'addToWishlist']);
Route::get('/showcartpage', [BuyerController::class, 'showCartPage']);
Route::post('/addtocart', [BuyerController::class, 'addToCart']);
Route::get('/categorysearch/{subcat_name}/{itemcategory}/{id}', [BuyerController::class, 'categorySearch']);

//seller controller
Route::get('/showselleritemdata', [SellerController::class, 'showSellerItemData']);
Route::get('/showfullview/{item_id}', [SellerController::class, 'showFullView']);
Route::get('/showsellnewitempage', [SellerController::class, 'showSellNewItemPage']);
Route::post('/choosesubcategory', [SellerController::class, 'chooseSubCategory']);
Route::post('/registeritem', [SellerController::class, 'registerItem']);
Route::get('/showidata/{subcategory}', [SellerController::class, 'showIData']);

//razorpay controller
Route::post('/payment', [RazorPaymentController::class, 'store']);

// home controller
Route::get('/search', [HomeController::class, 'showSearchPage']);
Route::get('/', [HomeController::class, 'showHomePage']);
Route::get('/{cat_id}', [HomeController::class, 'showCategoryPage']);
Route::get('/{cat_id}/{subcat_id}', [HomeController::class, 'showSubCategoryPage']);
Route::get('/{cat_id}/{subcat_id}/{item_id}', [HomeController::class, 'showItemPage']);
Route::get('/{cat_id}/{subcat_id}/{itemcategory}/{icategory}', [HomeController::class, 'iCategory']);


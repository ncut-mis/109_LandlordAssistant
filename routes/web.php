<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\FurnishController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RenterController;
use App\Http\Controllers\RepairController;
use App\Http\Controllers\RepairReplyController;
use App\Http\Controllers\SignatoryController;
use App\Http\Controllers\SystemPostController;
use App\Http\Controllers\UserProfileController;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

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
// 3-7-1 訪客/會員瀏覽平台首頁
Route::get('/', [HomeController::class, 'index'])->name('home.index');

//關於我們
Route::get('about',[HomeController::class,'about'])->name('home.about');

//幫助
Route::get('help',[HomeController::class,'help'])->name('home.help');

// 3-7-2 訪客/會員查詢出租房屋(地區)
Route::get('houses/search', [HouseController::class, 'search'])->name('houses.search');

// 3-7-3 訪客/會員篩選租屋條件
Route::get('houses/advance_search/create', [HouseController::class, 'advance_search_create'])->name('houses.advance_search.create');
Route::get('houses/advance_search', [HouseController::class, 'advance_search'])->name('houses.advance_search');

// 3-7-4 訪客/會員查看租屋資訊
Route::get('houses/{house}', [HomeController::class, 'show'])->name('houses.show');

//// 3-7-6 訪客登入(預設應該已經有)
//Route::get('login', [AuthenticatedSessionController::class, 'create']);
//Route::post('login', [AuthenticatedSessionController::class, 'store']) ->name('users.data'); //預設名稱可能不同

//會員查看個人資料
Route::get('users/{user}',[UserProfileController::class,'index'])->name('users.index');
// 3-8-1 會員(房東/租客)修改會員資料及轉帳資訊
Route::get('users/{user}/edit', [UserProfileController::class, 'edit'])->name('users.edit');
Route::patch('users/{user}', [UserProfileController::class, 'update'])->name('users.update');

//// 3-8-2 會員(房東/租客)新增轉帳資訊
//Route::get('users/{user}/payment/create', [PaymentController::class, 'create'])->name('users.payment.create');
//Route::post('users/{user}/payment', [PaymentController::class, 'store'])->name('users.payment.store');
//
//// 3-8-3 會員(房東/租客)修改轉帳資訊
//Route::get('users/{user}/payment/edit', [PaymentController::class, 'edit'])->name('users.payment.edit');
//Route::patch('users/{user}/payment', [PaymentController::class, 'update'])->name('users.payment.update');

// 3-8-4 會員(房東/租客)顯示租客頁面
Route::get('users/renters/{renter}', [RenterController::class, 'index'])->name('renters.home.index');

// 3-8-5 會員(房東/租客)顯示房東管理頁面
Route::get('users/owners/{owner}', [OwnerController::class, 'index'])->name('owners.home.index');

// 3-8-6 會員登出(預設應該已經有)
Route::delete('logout', [AuthenticatedSessionController::class, 'destroy']);

//查看房東首頁
//Route::get('owners',[HomeController::class,'owners_index'])->name('owners.houses.index');
// 3-9-1 會員(房東)新增地點
Route::post('owners/locations', [LocationController::class, 'store'])->name('owners.locations.store');

// 3-9-2 會員(房東)修改地點
Route::get('owners/locations/{location}/edit', [LocationController::class, 'edit'])->name('owners.locations.edit');
Route::patch('owners/locations/{location}', [LocationController::class, 'update'])->name('owners.locations.update');

// 3-9-3 會員(房東)刪除地點
Route::delete('owners/locations/{location}', [LocationController::class, 'destroy'])->name('owners.locations.destroy');

//會員(房東)進入某地點下查看房屋
Route::get('users/owners/{owner}/locations/{location}/houses', [HouseController::class, 'show'])->name('owners.locations.houses.show');

// 3-9-4 會員(房東)新增房屋
Route::get('owners/locations/{location}/houses/create', [HouseController::class, 'create'])->name('owners.locations.houses.create');
Route::post('owners/locations/{location}/houses', [HouseController::class, 'store'])->name('owners.locations.houses.store');

// 3-9-5 會員(房東)修改房屋
Route::get('owners/locations/{location}/houses/{house}/edit', [HouseController::class, 'edit'])->name('owners.locations.houses.edit');
Route::patch('owners/locations/{location}/houses/{house}', [HouseController::class, 'update'])->name('owners.locations.houses.update');

// 3-9-6 會員(房東)刪除房屋
Route::delete('owners/locations/{location}/houses/{house}', [HouseController::class, 'destroy'])->name('owners.locations.houses.destroy');

//會員(房東)查看租客
Route::get('owners/houses/{house}/rts', [SignatoryController::class, 'index'])->name('owners.houses.rts.index');

//會員(房東)新增租客   租客加入房屋
Route::get('owners/houses/{house}/rts/create', [SignatoryController::class, 'create'])->name('owners.houses.rts.create');
Route::post('owners/houses/rts', [SignatoryController::class, 'store'])->name('owners.houses.rts.store');

////會員(房東)修改租客
//Route::get('owners/houses/{house}/rts/{rt}/edit', [SignatoryController::class, 'edit'])->name('owners.houses.rts.edit');
//Route::patch('owners/houses/{house}/rts/{rt}', [SignatoryController::class, 'update'])->name('owners.houses.rts.update');

//會員(房東)刪除租客
Route::delete('owners/houses/rts/{rt}', [SignatoryController::class, 'destroy'])->name('owners.houses.rts.destroy');

// 3-9-7 會員(房東)查看公告
Route::get('owners/locations/{location}/posts', [PostController::class, 'owners_index'])->name('owners.locations.posts.index');

// 3-9-8 會員(房東)新增公告
Route::get('owners/locations/{location}/posts/create', [PostController::class, 'create'])->name('owners.locations.posts.create');
Route::post('owners/locations/{location}/posts', [PostController::class, 'store'])->name('owners.locations.posts.store');

// 3-9-9 會員(房東)修改公告
Route::get('owners/locations/{location}/posts/{post}/edit', [PostController::class, 'edit'])->name('owners.locations.posts.edit');
Route::patch('owners/locations/{location}/posts/{post}', [PostController::class, 'update'])->name('owners.locations.posts.update');

// 3-9-10 會員(房東)刪除公告
Route::delete('owners/locations/{location}/posts/{post}', [PostController::class, 'destroy'])->name('owners.locations.posts.destroy');

// 3-9-11 會員(房東)查看管理員
Route::get('owners/locations/{location}/managers', [AdminController::class, 'index'])->name('owners.locations.managers.index');

// 3-9-12 會員(房東)新增管理員
Route::get('owners/locations/{location}/managers/create', [AdminController::class, 'create'])->name('owners.locations.managers.create');
Route::post('owners/locations/{location}/managers', [AdminController::class, 'store'])->name('owners.locations.managers.store');

// 3-9-13會員(房東)刪除管理員
Route::delete('owners/locations/{location}/managers/{manager}', [AdminController::class, 'destroy'])->name('owners.locations.managers.destroy');

// 3-9-14 會員(房東)刊登房屋(excel顏色不一樣)
Route::get('owners/houses/publish/{publish}/edit', [HouseController::class, 'publish_edit'])->name('owner.publish.edit');
Route::patch('owners/houses/publish/{publish}', [HouseController::class, 'publish_update'])->name('owner.publish.update');

// 3-9-15 會員(房東)取消刊登房屋(excel顏色不一樣)
Route::delete('owners/houses/publish/{publish}', [HouseController::class, 'unpublish_update'])->name('owner.publish.destroy');

// 3-9-16 會員(房東)篩選某個狀態所有房屋資訊
Route::get('houses/by_status/{status}', [HouseController::class, 'by_status'])->name('houses.by_status');

// 3-9-17 會員(房東)查看單一房屋資訊
Route::get('owners/houses/{house}', [OwnerController::class, 'show'])->name('owners.houses.show');

// 3-9-18 會員(房東)新增合約書
Route::get('owners/houses/{house}/contracts/create', [ContractController::class, 'create'])->name('houses.contracts.create');
Route::post('owners/houses/{house}/contracts', [ContractController::class, 'store'])->name('houses.contracts.store');

// 3-9-19 會員(房東)刪除合約書
Route::delete('owners/houses/contracts/{contract}', [ContractController::class, 'destroy'])->name('houses.contracts.destroy');

// 3-9-20 會員(房東)查看合約書
Route::get('owners/houses/contracts/{contract}', [ContractController::class, 'owners_show'])->name('houses.contracts.show');

//--------------------------------
// 3-9- 會員(房東)查看費用資訊
Route::get('owners/houses/{house}/expenses', [ExpenseController::class, 'owners_index'])->name('houses.expenses.index');

// 3-9-25 會員(房東)新增費用資訊
Route::get('owners/houses/{house}/expenses/create', [ExpenseController::class, 'owners_create'])->name('houses.expenses.create');
Route::post('owners/houses/{house}/expenses', [ExpenseController::class, 'owners_store'])->name('houses.expenses.store');

// 3-9-26 會員(房東)修改費用資訊
Route::get('owners/houses/expenses/{expense}/edit', [ExpenseController::class, 'edit'])->name('houses.expenses.edit');
Route::patch('owners/houses/expenses/{expense}', [ExpenseController::class, 'update'])->name('houses.expenses.update');

// 3-9-27 會員(房東)刪除費用資訊
Route::delete('owners/houses/expenses/{expense}', [ExpenseController::class, 'destroy'])->name('houses.expenses.destroy');
//--------------------------------

// 3-9-28會員(房東)查看報修訊息
Route::get('owners/houses/{house}/repairs', [RepairController::class, 'owners_index'])->name('houses.repairs.index');

// 3-9-29會員(房東)查看詳細報修訊息
Route::get('owners/houses/repairs/{repair}', [RepairController::class, 'show'])->name('houses.repairs.show');

// 3-9-30 會員(房東)更新報修狀態
Route::patch('owners/houses/repairs/{repair}', [RepairController::class, 'update_status'])->name('houses.repairs.update');

//會員(租客)查看首頁
Route::get('renters/houses',[RenterController::class,'index'])->name('renters.houses.index');
//會員(租客)查看單一房屋
Route::get('renters/houses/{house}',[RenterController::class,'show'])->name('renters.houses.show');
// 3-10-1 會員(租客)查看公告
Route::get('renters/houses/{house}/posts', [PostController::class, 'index'])->name('renters.houses.posts.index');
//3-10-2 會員(租客)查看單一公告
Route::get('renters/houses/{house}/posts/{post}', [PostController::class, 'show'])->name('renters.houses.posts.show');
//Route::get('renters/houses/{location_id}/posts', [PostController::class, 'index'])->name('renters.houses.posts.index');

// 3-10-3 會員(租客)查看合約
Route::get('renters/houses/contracts/{contract}', [ContractController::class, 'show'])->name('renters.houses.contracts.show');

// 3-10-4 會員(租客)查看費用資訊
Route::get('renters/houses/costs', [ExpenseController::class, 'index'])->name('renters.houses.costs.index');

// 3-10-5 會員(租客)進行繳費
Route::get('costs/create', [ExpenseController::class, 'create'])->name('costs.create');
Route::post('costs', [ExpenseController::class, 'store'])->name('costs.store');

// 3-10-6 會員(租客)查看報修訊息
Route::get('renters/houses/repairs', [RepairController::class, 'index'])->name('renters.houses.repairs.index');

// 3-10-7 會員(租客)新增報修訊息
Route::get('renters/houses/repairs/create', [RepairController::class, 'create'])->name('renters.houses.repairs.create');
Route::get('renters/houses/{house}/repairs/create',[RepairController::class,'create_in_house'])->name('renters.houses.repairs.in.house.create');
Route::post('renters/houses/repairs', [RepairController::class, 'store'])->name('renters.houses.repairs.store');

// 3-10-8 會員(租客)修改報修訊息
Route::get('renters/houses/repairs/{repair}/edit', [RepairController::class, 'edit'])->name('renters.houses.repairs.edit');
Route::patch('renters/houses/repairs/{repair}', [RepairController::class, 'update'])->name('renters.houses.repairs.update');

// 3-10-9 會員(租客)刪除報修訊息
Route::delete('renters/houses/repairs/{repair}', [RepairController::class, 'destroy'])->name('renters.houses.repairs.destroy');
// 系統查看公告
Route::get('ad/posts', [SystemPostController::class, 'index'])->name('ad.posts.index');

// 系統新增公告
Route::get('ad/posts/create', [SystemPostController::class, 'create'])->name('ad.posts.create');
Route::post('ad/posts', [SystemPostController::class, 'store'])->name('ad.posts.store');

// 系統修改公告
Route::get('ad/posts/{post}/edit', [SystemPostController::class, 'edit'])->name('ad.posts.edit');
Route::patch('ad/posts/{post}', [SystemPostController::class, 'update'])->name('ad.posts.update');

// 系統刪除公告
Route::delete('ad/posts/{post}', [SystemPostController::class, 'destroy'])->name('ad.posts.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


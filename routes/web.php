<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\ContractDetailController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CostController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\ManagerListController;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\PackController;
use App\Http\Controllers\PaymentController;
use \App\Http\Controllers\PhoneController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RenterController;
use App\Http\Controllers\RepairController;
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
Route::get('houses/{house}', [HouseController::class, 'show'])->name('houses.show');

// 3-7-6 訪客登入(預設應該已經有)
Route::get('login', [AuthenticatedSessionController::class, 'create']);
Route::post('login', [AuthenticatedSessionController::class, 'store']) ->name('users.data'); //預設名稱可能不同

//會員查看個人資料
//Route::get('user',[Userpr])
// 3-8-1 會員(房東/租客)修改會員資料
Route::get('users/{user}/edit', [UserProfileController::class, 'edit'])->name('users.edit');
Route::patch('users/{user}', [ProfileInformationController::class, 'update'])->name('users.update');

// 3-8-2 會員(房東/租客)新增轉帳資訊
Route::get('users/{user}/payment/create', [UserPaymentController::class, 'create'])->name('users.payment.create');
Route::post('users/{user}/payment', [UserPaymentController::class, 'store'])->name('users.payment.store');

// 3-8-3 會員(房東/租客)修改轉帳資訊
Route::get('users/{user}/payment/{payment}/edit', [UserPaymentController::class, 'edit'])->name('users.payment.edit');
Route::patch('users/{user}/payment/{payment}', [UserPaymentController::class, 'update'])->name('users.payment.update');

// 3-8-4 會員(房東/租客)顯示租客頁面
Route::get('users/renters/{renter}', [RenterController::class, 'index'])->name('renters.home.index');

// 3-8-5 會員(房東/租客)顯示房東管理頁面
Route::get('users/owners/{owner}', [OwnerController::class, 'index'])->name('owners.home.index');

// 3-8-6 會員登出(預設應該已經有)
Route::delete('logout', [AuthenticatedSessionController::class, 'destroy']);


// 3-9-1 會員(房東)新增地點
Route::post('owners/locations', [LocationController::class, 'store'])->name('owners.locations.store');

// 3-9-2 會員(房東)修改地點
Route::get('owners/locations/{location}/edit', [LocationController::class, 'edit'])->name('owners.locations.edit');
Route::patch('owners/locations/{location}', [LocationController::class, 'update'])->name('owners.locations.update');

// 3-9-3 會員(房東)刪除地點
Route::delete('owners/locations/{location}', [LocationController::class, 'destroy'])->name('owners.locations.destroy');

// 3-9-4 會員(房東)新增房屋
Route::get('owners/locations/{location}/houses/create', [LocationHouseController::class, 'create'])->name('owners.locations.houses.create');
Route::post('owners/locations/{location}/houses', [LocationHouseController::class, 'store'])->name('owners.locations.houses.store');

// 3-9-5 會員(房東)修改房屋
Route::get('owners/locations/{location}/houses/{house}/edit', [LocationHouseController::class, 'edit'])->name('owners.locations.houses.edit');
Route::patch('owners/locations/{location}/houses/{house}', [LocationHouseController::class, 'update'])->name('owners.locations.houses.update');

// 3-9-6 會員(房東)刪除房屋
Route::delete('owners/locations/{location}/houses/{house}', [LocationHouseController::class, 'destroy'])->name('owners.locations.houses.destroy');

// 3-9-7 會員(房東)查看公告
Route::get('owners/locations/{location}/posts', [LocationPostController::class, 'index'])->name('owners.locations.posts.index');

// 3-9-8 會員(房東)新增公告
Route::get('owners/locations/{location}/posts/create', [LocationPostController::class, 'create'])->name('owners.locations.posts.create');
Route::post('owners/locations/{location}/posts', [LocationPostController::class, 'store'])->name('owners.locations.posts.store');

// 3-9-9 會員(房東)修改公告
Route::get('owners/locations/{location}/posts/{post}/edit', [LocationPostController::class, 'edit'])->name('owners.locations.posts.edit');
Route::patch('owners/locations/{location}/posts/{post}', [LocationPostController::class, 'update'])->name('owners.locations.posts.update');

// 3-9-10 會員(房東)刪除公告
Route::delete('owners/locations/{location}/posts/{post}', [LocationPostController::class, 'destroy'])->name('owners.locations.posts.destroy');

// 3-9-11 會員(房東)查看管理員
Route::get('owners/locations/{location}/managers', [LocationManagerController::class, 'index'])->name('owners.locations.managers.index');

// 3-9-12 會員(房東)新增管理員
Route::get('owners/locations/{location}/managers/create', [LocationManagerController::class, 'create'])->name('owners.locations.managers.create');
Route::post('owners/locations/{location}/managers', [LocationManagerController::class, 'store'])->name('owners.locations.managers.store');

// 3-9-13會員(房東)刪除管理員
Route::delete('owners/locations/{location}/managers/{manager}', [LocationManagerController::class, 'destroy'])->name('owners.locations.managers.destroy');

// 3-9-14 會員(房東)刊登房屋(excel顏色不一樣)
Route::get('owners/houses/publish/{publish}/edit', [HousePublishController::class, 'publish_edit'])->name('owner.publish.edit');
Route::patch('owners/houses/publish/{publish}', [HousePublishController::class, 'publish_update'])->name('owner.publish.update');

// 3-9-15 會員(房東)取消刊登房屋(excel顏色不一樣)
Route::delete('owners/houses/publish/{publish}', [HousePublishController::class, 'unpublish_destroy'])->name('owner.publish.destroy');

// 3-9-16 會員(房東)篩選某個狀態所有房屋資訊
Route::get('houses/by_status/{status}', [HouseStatusController::class, 'by_status'])->name('houses.by_status');

// 3-9-17 會員(房東)查看單一房屋資訊
Route::get('owners/houses/{house}', [OwnerHouseController::class, 'show'])->name('owners.houses.show');

// 3-9-18 會員(房東)新增合約書
Route::get('owners/houses/{house}/contracts/create', [HouseContractController::class, 'create'])->name('houses.contracts.create');
Route::post('owners/houses/{house}/contracts', [HouseContractController::class, 'store'])->name('houses.contracts.store');

// 3-9-19 會員(房東)刪除合約書
Route::delete('owners/houses/contracts/{contract}', [HouseContractController::class, 'destroy'])->name('houses.contracts.destroy');

// 3-9-20 會員(房東)查看合約書
Route::get('owners/houses/contracts/{contract}', [HouseContractController::class, 'show'])->name('houses.contracts.show');

// 3-9-21 會員(房東)檢視信件代收
Route::get('owners/houses/{house}/packs', [HousePackController::class, 'index'])->name('houses.packs.index');

// 3-9-22 會員(房東)新增信件代收
Route::get('owners/houses/{house}/packs/create', [HousePackController::class, 'create'])->name('houses.packs.create');
Route::post('owners/houses/{house}/packs', [HousePackController::class, 'store'])->name('houses.packs.store');

// 3-9-23 會員(房東)編輯信件代收
Route::get('owners/houses/packs/{pack}/edit', [HousePackController::class, 'edit'])->name('houses.packs.edit');
Route::patch('owners/houses/packs/{pack}', [HousePackController::class, 'update'])->name('houses.packs.update');

// 3-9-24 會員(房東)刪除信件代收
Route::delete('owners/houses/packs/{pack}', [HousePackController::class, 'destroy'])->name('houses.packs.destroy');

// 3-9-25 會員(房東)新增費用資訊
Route::get('owners/houses/{house}/costs/create', [HouseCostController::class, 'create'])->name('houses.costs.create');
Route::post('owners/houses/{house}/costs', [HouseCostController::class, 'store'])->name('houses.costs.store');

// 3-9-26 會員(房東)修改費用資訊
Route::get('owners/houses/costs/{cost}/edit', [HouseCostController::class, 'edit'])->name('houses.costs.edit');
Route::patch('owners/houses/costs/{cost}', [HouseCostController::class, 'update'])->name('houses.costs.update');

// 3-9-27 會員(房東)刪除費用資訊
Route::delete('owners/houses/costs/{cost}', [HouseCostController::class, 'destroy'])->name('houses.costs.destroy');

// 3-9-28會員(房東)查看報修訊息
Route::get('owners/houses/{house}/repairs', [HouseRepairController::class, 'index'])->name('houses.repairs.index');

// 3-9-29會員(房東)查看詳細報修訊息
Route::get('owners/houses/repairs/{repair}', [HouseRepairController::class, 'show'])->name('houses.repairs.show');

// 3-9-30 會員(房東)更新報修狀態
Route::patch('owners/houses/repairs/{repair}', [HouseRepairController::class, 'update'])->name('houses.repairs.update');


// 3-10-1 會員(租客)查看公告
Route::get('renters/houses/posts', [HousePostController::class, 'index'])->name('renters.houses.posts.index');

// 3-10-2 會員(租客)查看信件
Route::get('renters/houses/packs', [HousePackController::class, 'index'])->name('renters.houses.packs.index');

// 3-10-3 會員(租客)查看合約
Route::get('renters/houses/contracts/{contract}', [HouseContractController::class, 'show'])->name('renters.houses.contracts.show');

// 3-10-4 會員(租客)查看費用資訊
Route::get('renters/houses/costs', [HouseCostController::class, 'index'])->name('renters.houses.costs.index');

// 3-10-5 會員(租客)進行繳費
Route::get('costs/create', [CostController::class, 'create'])->name('costs.create');
Route::post('costs', [CostController::class, 'store'])->name('costs.store');

// 3-10-6 會員(租客)查看報修訊息
Route::get('renters/houses/repairs', [HouseRepairController::class, 'index'])->name('renters.houses.repairs.index');

// 3-10-7 會員(租客)新增報修訊息
Route::get('renters/houses/repairs/create', [HouseRepairController::class, 'create'])->name('renters.houses.repairs.create');
Route::post('renters/houses/repairs', [HouseRepairController::class, 'store'])->name('renters.houses.repairs.store');

// 3-10-8 會員(租客)修改報修訊息
Route::get('renters/houses/repairs/{repair}/edit', [HouseRepairController::class, 'edit'])->name('renters.houses.repairs.edit');
Route::patch('renters/houses/repairs/{repair}', [HouseRepairController::class, 'update'])->name('renters.houses.repairs.update');

// 3-10-9 會員(租客)刪除報修訊息
Route::delete('renters/houses/repairs/{repair}', [HouseRepairController::class, 'destroy'])->name('renters.houses.repairs.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

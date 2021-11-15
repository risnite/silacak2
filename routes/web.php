<?php

use App\Http\Controllers\Admin\BidangController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\GedungController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\KendaraanController;
use App\Http\Controllers\Admin\LuasTanahController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\PinjamTanahController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SubUnitController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\UpbController;
use App\Http\Controllers\Admin\UserController;
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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes(['register' => false]);
Route::prefix('admin')->group(function () {

    Route::group(['middleware' => 'auth'], function(){

        //dashboard
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        //  tanah
        Route::resource('/tanah', LuasTanahController::class,['except' => ['show'] ,'as' => 'admin']);
        // Pinjam  tanah
        Route::resource('/pinjam-tanah', PinjamTanahController::class,['except' => ['show'] ,'as' => 'admin']);

        Route::resource('/gedung', GedungController::class,['except' => ['show'] ,'as' => 'admin']);
    //    Kendaraan
        Route::resource('/kendaraan', KendaraanController::class,['except' => ['show'] ,'as' => 'admin']);

        //permissions
        Route::resource('/permission', PermissionController::class, ['except' => ['show',  'delete'] ,'as' => 'admin']);
        //roles
        Route::resource('/role', RoleController::class, ['except' => ['show'] ,'as' => 'admin']);

        //users
        Route::resource('/user', UserController::class, ['except' => ['show'] ,'as' => 'admin']);
        //users
        Route::resource('/history', HistoryController::class, ['except' => ['show'] ,'as' => 'admin']);
        // Setting akun
        Route::get('/setting-akun', [UserController::class,'Setting'])->name('setting-akun');
        Route::PUT('/update-akun/{id}', [UserController::class,'UpdateAkun'])->name('update-akun');

        Route::resource('/bidang', BidangController::class, ['except' => ['show'] ,'as' => 'admin']);
        Route::resource('/units', UnitController::class, ['except' => ['show'] ,'as' => 'admin']);
        Route::resource('/subunit', SubUnitController::class, ['except' => ['show'] ,'as' => 'admin']);
        Route::resource('/upb', UpbController::class, ['except' => ['show'] ,'as' => 'admin']);

    });

});

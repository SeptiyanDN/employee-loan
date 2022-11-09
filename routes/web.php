<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PembelianDetailController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\Permissions\AssignController;
use App\Http\Controllers\Permissions\PermissionController;
use App\Http\Controllers\Permissions\RoleController;
use App\Http\Controllers\Permissions\UserController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TelegramController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Telegram\Bot\Api;

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

Route::get('/telegram',[TelegramController::class,'callback'])->name('telegram.connect');

Auth::routes(['verify' => true]);

Route::prefix('auth')->group(function(){
    Route::get('/login',[LoginController::class,'login'])->middleware('guest')->name('login');
    Route::post('/login/prosses',[LoginController::class,'authentication'])->name('authentication');
    Route::get('/logout',[RegisterController::class,'logout'])->name('logout')->middleware('auth');
    Route::get('/register',[RegisterController::class, 'register'])->name('register');
    Route::post('/registration',[RegisterController::class, 'registration'])->name('registration');
    Route::get('/kelurahan/json', [RegisterController::class,'kelurahanJson'])->name('json.kelurahan');
    Route::get('/onboardWizard',[RegisterController::class,'onboardWizard']);
    Route::post('/onboardWizard',[RegisterController::class,'finishOnboardWirzard'])->name('onboardWizard');

    Route::get('forget-password',[ForgotPasswordController::class,'showForgetPasswordForm']);
    Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forgot.password');
    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password/', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password');
});

Route::middleware(['has.role','auth'])->group(function(){

    Route::get('/',[HomeController::class,'index']);
    Route::get('/onboardWizard',[RegisterController::class,'onboardWizard']);

    Route::prefix('pembelian')->group(function(){
        // Route::get('/',[PembelianController::class,'index'])->name('pembelian.index');
        Route::get('/json', [PembelianController::class, 'data'])->name('pembelian.data');
        Route::get('/{id}/create', [PembelianController::class, 'create'])->name('pembelian.create');
        Route::resource('/',PembelianController::class)
        ->except('create');

    });
    Route::get('/pembelian_detail/{id}/data', [PembelianDetailController::class, 'data'])->name('pembelian_detail.data');
    Route::get('/pembelian_detail/loadform/{diskon}/{total}', [PembelianDetailController::class, 'loadForm'])->name('pembelian_detail.load_form');
    Route::resource('/pembelian_detail', PembelianDetailController::class)
    ->except('create', 'show', 'edit');

    Route::prefix('kelola-kas')->group(function(){
        Route::prefix('pemasukan')->group(function(){
            Route::get('/',[PemasukanController::class,'index'])->name('pemasukan.index');
            Route::get('/create',[PemasukanController::class,'create'])->name('pemasukan.create');
            Route::get('/json',[PemasukanController::class,'data'])->name('pemasukan.data');
            Route::post('/',[PemasukanController::class,'store'])->name('pemasukan.store');
            Route::get('/{id}',[PemasukanController::class,'show'])->name('pemasukan.show');
            Route::put('/{pemasukan}',[PemasukanController::class,'update'])->name('pemasukan.update');
            Route::delete('/{id}',[PemasukanController::class,'destroy'])->name('pemasukan.destroy');
            Route::post('/delete-selected', [PemasukanController::class, 'deleteSelected'])->name('pemasukan.delete_selected');
            Route::get('/detail/{pemasukan}',[PemasukanController::class,'detailPemasukan'])->name('pemasukan.detail');
        });

        Route::prefix('pengeluaran')->group(function(){
            Route::get('/',[PengeluaranController::class,'index'])->name('pengeluaran.index');
            Route::get('/create',[PengeluaranController::class,'create'])->name('pengeluaran.create');
            Route::get('/json',[PengeluaranController::class,'data'])->name('pengeluaran.data');
            Route::post('/',[PengeluaranController::class,'store'])->name('pengeluaran.store');
            Route::get('/{id}',[PengeluaranController::class,'show'])->name('pengeluaran.show');
            Route::get('/detail/{pengeluaran}',[PengeluaranController::class,'detailPengeluaran'])->name('pengeluaran.detail');
            Route::put('/{pengeluaran}',[PengeluaranController::class,'update'])->name('pengeluaran.update');
            Route::delete('/{id}',[PengeluaranController::class,'destroy'])->name('pengeluaran.destroy');
            Route::post('/delete-selected', [PengeluaranController::class, 'deleteSelected'])->name('pengeluaran.delete_selected');
        });
    });
    Route::prefix('products')->group(function(){
        Route::prefix('kategori')->group(function(){
            Route::get('/',[kategoriController::class,'index']);
            Route::post('/',[kategoriController::class,'store'])->name('tambah.kategori');
        });
        Route::prefix('merek')->group(function(){
            Route::get('/',[MerekController::class,'index']);
            Route::post('/',[MerekController::class,'store'])->name('tambah.merek');
        });
        Route::get('/',[ProdukController::class,'index'])->name('index.produk');
        Route::get('/json',[ProdukController::class,'data'])->name('produk.data');

        Route::get('/tambah',[ProdukController::class,'create']);
        Route::post('/tambah',[ProdukController::class,'store'])->name('tambah.produk');
        Route::delete('/{id}',[ProdukController::class,'remove'])->name('remove.produk');
        Route::get('/{produk}/edit',[ProdukController::class,'edit'])->name('edit.produk');
        Route::put('/{produk}/edit',[ProdukController::class,'update']);
        Route::delete('/{produk}',[ProdukController::class,'remove'])->name('remove.produk');
        Route::post('/delete-selected', [ProdukController::class, 'deleteSelected'])->name('produk.delete_selected');
    });

    Route::prefix('users')->group(function(){
        Route::get('/create',[UserController::class,'createUsers']);
        Route::post('/create',[UserController::class,'tambahUser'])->name('users.create');
        Route::get('/management',[UserController::class,'index'])->name('users.management');
        Route::get('/settings',[UserController::class,'profileSetting'])->name('profile');
    });

    Route::prefix('outlet')->group(function(){
        Route::get('/tambah-outlet',[TenantController::class,'tambahOutlet']);
        Route::get('/',[TenantController::class,'index'])->name('outlet');
        Route::get('/json',[TenantController::class,'json'])->name('json');
        Route::post('/',[TenantController::class,'store'])->name('create-outlet');
        Route::get('/{id}',[OutletController::class,'show'])->name('update-outlet');
        Route::put('/{id}',[OutletController::class,'update']);
        Route::delete('/{id}',[OutletController::class,'destroy'])->name('remove-outlet');
        Route::get('/change/{tenantID}',[TenantController::class, 'changeTenant'])->name('tenants.change');
    });

    Route::prefix('suppliers')->group(function(){
        Route::get('/',[SupplierController::class,'index'])->name('index.supplier');
        Route::get('/tambah',[SupplierController::class,'create']);
        Route::post('/tambah',[SupplierController::class,'store'])->name('tambah.supplier');
    });

    Route::prefix('role-and-permission')->namespace('Permissions')->group(function(){
        Route::prefix('assignable')->group(function(){
            Route::get('/',[AssignController::class,'create'])->name('assign.create');
            Route::post('/',[AssignController::class,'store']);
            Route::get('/{role}/edit',[AssignController::class,'edit'])->name('assign.edit');
            Route::put('/{role}/edit',[AssignController::class,'update']);
        });
        Route::prefix('assign')->group(function(){
            Route::get('/user',[UserController::class,'create'])->name('assign.user.create');
            Route::post('/user',[UserController::class,'store']);
            Route::get('/{user}/edit',[UserController::class,'edit'])->name('assign.user.edit');
            Route::put('/{user}/edit',[UserController::class,'update']);
        });

        Route::prefix('roles')->group(function(){
            Route::get('/',[RoleController::class,'index'])->name('roles.index');
            Route::post('/create',[RoleController::class,'create'])->name('roles.create');
            Route::get('/{role}/edit',[RoleController::class,'edit'])->name('roles.edit');
            Route::put('/{role}/edit',[RoleController::class,'update']);
            Route::delete('/{id}',[RoleController::class,'destroy'])->name('roles.remove');
        });

        Route::prefix('permissions')->group(function(){
            Route::get('/',[PermissionController::class,'index'])->name('permissions.index');
            Route::post('/create',[PermissionController::class,'create'])->name('permissions.create');
            Route::get('/{permission}/edit',[PermissionController::class,'edit'])->name('permissions.edit');
            Route::put('/{permission}/edit',[PermissionController::class,'update']);
            Route::delete('/{id}',[PermissionController::class,'destroy'])->name('permissions.remove');
        });

    });

});


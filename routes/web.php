<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\LoanApplicationsController;
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
use App\Http\Controllers\ReportsController;
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
    Route::get('/loan',[HomeController::class,'dashboardUsers']);

    Route::get('/onboardWizard',[RegisterController::class,'onboardWizard']);
    Route::prefix('reports-loans')->group(function(){
        Route::get('/overdue/json',[ReportsController::class,'jsonOverdue'])->name('json.overdue');
        Route::get('/overdue',[ReportsController::class,'overdue'])->name('reports.overdue');
        Route::get('/complete/json',[ReportsController::class,'jsonComplete'])->name('json.complete');
        Route::get('/complete',[ReportsController::class,'complete'])->name('reports.complete');
        Route::get('/outstanding/json',[ReportsController::class,'jsonOutstanding'])->name('json.outstanding');
        Route::get('/outstanding',[ReportsController::class,'outstanding'])->name('reports.outstanding');
    });
    Route::prefix('loan-applications')->group(function(){
        Route::get('/',[LoanApplicationsController::class,'index'])->name('loans.index');
        Route::get('/json',[LoanApplicationsController::class,'json'])->name('loans.json');
        Route::get('/create',[LoanApplicationsController::class,'create'])->name('loans.create');
        Route::get('/{loanApplications}/edit',[LoanApplicationsController::class,'edit'])->name('loans.edit');
        Route::put('/{loanApplications}/edit',[LoanApplicationsController::class,'update'])->name('loans.update');

        Route::get('/{loanApplications}/show',[LoanApplicationsController::class,'show'])->name('loans.show');
        Route::get('/{loanApplications}/analyst/approval',[LoanApplicationsController::class,'approveAnalyst'])->name('loans.approveAnalyst');
        Route::put('/{loanApplications}/analyst/approval',[LoanApplicationsController::class,'approveAnalystService'])->name('loans.approveAnalystService');
        Route::get('/{loanApplications}/ceo/approval',[LoanApplicationsController::class,'approveCeo'])->name('loans.approveCeo');
        Route::put('/{loanApplications}/ceo/approval',[LoanApplicationsController::class,'approveCeoService'])->name('loans.approveCeoService');
        Route::get('/{loanApplications}/sending/money',[LoanApplicationsController::class,'sendingMoney'])->name('loans.sendingMoney');
        Route::put('/{loanApplications}/sending/money',[LoanApplicationsController::class,'sendingMoneyService'])->name('loans.sendingMoneyService');
        Route::post('/create',[LoanApplicationsController::class,'store']);
    Route::prefix('analyst')->group(function(){
        Route::get('/prosses',[LoanApplicationsController::class,'analystProses'])->name('analyst.proses');
    });
    Route::prefix('ceo')->group(function(){
        Route::get('/prosses',[LoanApplicationsController::class,'ceoProses'])->name('ceo.proses');
    });
    });
    Route::prefix('employee')->middleware(['can:user_management_access'])->group(function(){
        Route::get('/create',[EmployeeController::class,'createEmployee']);
        Route::post('/create',[EmployeeController::class,'store'])->middleware(['can:user_create'])->name('users.create');
        Route::get('/{employee}/detail',[EmployeeController::class,'show'])->name('employee.detail');
        Route::get('/{employee}/edit',[EmployeeController::class,'edit'])->name('employee.edit');
        Route::put('/{employee}/edit',[EmployeeController::class,'update']);
        Route::get('/management',[EmployeeController::class,'index'])->name('users.management');
        Route::get('/settings',[UserController::class,'profileSetting'])->name('profile');
        Route::delete('/{employee}/remove',[EmployeeController::class,'destroy'])->name('employee.remove');
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


<?php

use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\CollaboratorsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\FunctionsController;
use App\Http\Controllers\LocateWorkController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponsibleController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {

    Route::get('/', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard.index'); 

 

    Route::prefix('dashboard')->middleware('auth')->name('dashboard.')->group(function () {
  

        //Certificate Area
        Route::prefix('certificate')->name('certificate.')->group(function () {
            Route::get('/', [CertificateController::class, 'list'])->name('list');
            Route::get('/add-or-update/{id?}', [CertificateController::class, 'addorupdate'])->name('addOrUpdate');
            Route::get('/delete/{id}', [CertificateController::class, 'delete'])->name('delete');
            Route::post('/save', [CertificateController::class, 'save'])->name('save');
        });

        //User Area
        Route::prefix('client')->name('client.')->group(function () {
            Route::get('/', [ClientsController::class, 'clientList'])->name('index');
            Route::get('/addOrUpdate/{id?}', [ClientsController::class, 'clientAdd'])->name('addOrUpdate');
            Route::get('/delete/{id}', [ClientsController::class, 'clientDelete'])->name('delete');
            Route::post('/store', [ClientsController::class, 'clientStore']);
        });

        Route::prefix('locate_work')->name('locate_work.')->group(function () {
            Route::get('/', [LocateWorkController::class, 'work_places_List'])->name('index');
            Route::get('/addOrUpdate/{id?}', [LocateWorkController::class, 'work_places_Add'])->name('addOrUpdate');
            Route::get('/delete/{id}', [LocateWorkController::class, 'work_places_Delete'])->name('delete');
            Route::post('/store', [LocateWorkController::class, 'work_places_Store']);
        });
        Route::prefix('responsible')->name('responsible.')->group(function () {
            Route::get('/', [ResponsibleController::class, 'responsible_List'])->name('index');
            Route::get('/addOrUpdate/{id?}', [ResponsibleController::class, 'responsible_Add'])->name('addOrUpdate');
            Route::get('/delete/{id}', [ResponsibleController::class, 'responsible_Delete'])->name('delete');
            Route::post('/store', [ResponsibleController::class, 'responsible_Store']);
        });
        Route::prefix('functions')->name('functions.')->group(function () {
            Route::get('/', [FunctionsController::class, 'functionsList'])->name('index');
            Route::get('/addOrUpdate/{id?}', [FunctionsController::class, 'functionsAdd'])->name('addOrUpdate');
            Route::get('/delete/{id}', [FunctionsController::class, 'functionsDelete'])->name('delete');
            Route::post('/store', [FunctionsController::class, 'functionsStore']);
        });

        //User Area
        Route::prefix('collaborators')->name('collaborators.')->group(function () {
            Route::get('/', [CollaboratorsController::class, 'collaboratorsList'])->name('index');
            Route::get('/addOrUpdate/{id?}', [CollaboratorsController::class, 'collaboratorsAdd'])->name('addOrUpdate');
            Route::get('/delete/{id}', [CollaboratorsController::class, 'collaboratorsDelete'])->name('delete');
            Route::post('/store', [CollaboratorsController::class, 'collaboratorsStore']);
        });

        //User Area
        Route::prefix('equipment')->name('equipment.')->group(function () {
            Route::get('/', [EquipmentController::class, 'equipmentList'])->name('index');
            Route::get('/addOrUpdate/{id?}', [EquipmentController::class, 'equipmentAdd'])->name('addOrUpdate');
            Route::get('/delete/{id}', [EquipmentController::class, 'equipmentDelete'])->name('delete');
            Route::post('/store', [EquipmentController::class, 'equipmentStore']);
        });

        Route::prefix('schedule')->name('schedule.')->group(function () {
            Route::get('/', [ScheduleController::class, 'scheduleList'])->name('index');
            Route::get('/addOrUpdate/{id?}', [ScheduleController::class, 'scheduleAdd'])->name('addOrUpdate');
            Route::get('/listSchedule', [ScheduleController::class, 'scheduleListAll'])->name('listSchedule');
            Route::post('/load', [ScheduleController::class, 'scheduleData']);
            Route::post('/load_select', [ScheduleController::class, 'load_select']);
            Route::get('/load', [ScheduleController::class, 'scheduleData'])->name('load');
            Route::get('/checkDate', [ScheduleController::class, 'checkDate'])->name('checkDate');
            Route::get('/delete/{id}', [ScheduleController::class, 'scheduleDelete'])->name('delete');
            Route::post('/store', [ScheduleController::class, 'scheduleStore']);
            Route::post('/schedule', [DashboardController::class, 'schedule'])->name('scheduleDashboard');
        });
        
        //Document Area
        Route::prefix('document')->name('document.')->group(function () {
            Route::get('/', [DocumentController::class, 'documentList'])->name('index');
            Route::get('/addOrUpdate/{id?}', [DocumentController::class, 'documentAdd'])->name('addOrUpdate');
            Route::get('/delete/{id}', [DocumentController::class, 'documentDelete'])->name('delete');
            Route::post('/store', [DocumentController::class, 'documentStore']);
 
            Route::get('/category', [DocumentController::class, 'categoryList'])->name('category');
            Route::get('/category/add-or-update/{id?}', [DocumentController::class, 'addOrUpdateCategory'])->name('addOrUpdateCategory'); 
            Route::post('/category/store', [DocumentController::class, 'categoryStore']);
            Route::get('/category/delete/{id?}', [DocumentController::class, 'chatCategoriesDelete'])->name('deleteCategory');
        });
    });

    //Settings
    Route::prefix('admin')->middleware('admin')->name('admin.')->group(function () {

        Route::prefix('settings')->name('settings.')->group(function () {
            Route::get('/general', [SettingsController::class, 'general'])->name('general');
            Route::post('/general-save', [SettingsController::class, 'generalSave']);

        });

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UsersController::class, 'index'])->name('index');
            Route::get('/addOrUpdate/{id?}', [UsersController::class, 'addorupdate'])->name('addOrUpdate');
            Route::get('/delete/{id}', [UsersController::class, 'delete'])->name('delete');
            Route::post('/store', [UsersController::class, 'store'])->name('store');

        });
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/mark-as-read', [App\Http\Controllers\ScheduleController::class, 'markAsRead'])->name('mark-as-read');

Route::get('/offline', function () { return view('vendor/silviolleite/laravelpwa/offline'); });

// Clear log file
Route::get('/clear-log', function () {
    $logFile = storage_path('logs/laravel.log');

    if (file_exists($logFile)) {
        unlink($logFile);
    }

    return response()->json(['success' => true]);
});

// cache clear
Route::get('/cache-clear', function () {
    try {
        Artisan::call('optimize:clear');
        return response()->json(['success' => true]);
    } catch (\Throwable $th) {
        return response()->json(['success' => false]);
    }
})->name('cache.clear');


require __DIR__ . '/auth.php';

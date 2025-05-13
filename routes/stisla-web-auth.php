<?php

use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\BackupDatabaseController;
use App\Http\Controllers\CrudExampleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroupMenuController;
use App\Http\Controllers\IzinPerusahaanController;
use App\Http\Controllers\MenuManagementController;
use App\Http\Controllers\MessagerController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionGroupController;
use App\Http\Controllers\PricingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RequestLogController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TestingController;
use App\Http\Controllers\UserManagementController;
use App\Http\Middleware\FileManagerPermission;
use Illuminate\Support\Facades\Route;

# DASHBOARD
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::post('dashboard', [DashboardController::class, 'post']);

# SETTINGS
# HALAMAN DEPAN
Route::get('settings/home', [SettingController::class, 'homeSetting'])->name('settings.home');
Route::get('izin-perusahaan/ajax', [IzinPerusahaanController::class, 'ajax'])->name('izin-perusahaan.ajax-yajra');
Route::resource('izin-perusahaan', IzinPerusahaanController::class);
Route::get('pricings/ajax', [PricingController::class, 'ajax'])->name('pricings.ajax-yajra');
Route::resource('pricings', PricingController::class);
Route::get('partners/ajax', [PartnerController::class, 'ajax'])->name('partners.ajax-yajra');
Route::resource('partners', PartnerController::class);
Route::get('messagers/ajax', [MessagerController::class, 'ajax'])->name('messagers.ajax-yajra');
Route::resource('messagers', MessagerController::class);

Route::get('settings/all', [SettingController::class, 'allSetting'])->name('settings.all');
Route::get('settings/{type?}', [SettingController::class, 'index'])->name('settings.index');
Route::put('settings', [SettingController::class, 'update'])->name('settings.update');


# PROFILE
Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
Route::put('profile', [ProfileController::class, 'update']);
Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
Route::put('profile/email', [ProfileController::class, 'updateEmail'])->name('profile.update-email');

# EXAMPLE STISLA
Route::view('datatable', 'stisla.examples.datatable.index')->name('datatable.index');
Route::view('form', 'stisla.examples.form.index')->name('form.index');
Route::view('chart-js', 'stisla.examples.chart-js.index')->name('chart-js.index');
Route::view('pricing', 'stisla.examples.pricing.index')->name('pricing.index');
Route::view('invoice', 'stisla.examples.invoice.index')->name('invoice.index');

# USER MANAGEMENT
Route::prefix('user-management')->as('user-management.')->group(function () {
    Route::get('users/force-login/{user}', [UserManagementController::class, 'forceLogin'])->name('users.force-login');
    Route::get('users/pdf', [UserManagementController::class, 'pdf'])->name('users.pdf');
    Route::get('users/csv', [UserManagementController::class, 'csv'])->name('users.csv');
    Route::get('users/excel', [UserManagementController::class, 'excel'])->name('users.excel');
    Route::get('users/json', [UserManagementController::class, 'json'])->name('users.json');
    Route::get('users/import-excel-example', [UserManagementController::class, 'importExcelExample'])->name('users.import-excel-example');
    Route::post('users/import-excel', [UserManagementController::class, 'importExcel'])->name('users.import-excel');
    Route::resource('users', UserManagementController::class);

    # ROLES
    Route::get('roles/pdf', [RoleController::class, 'pdf'])->name('roles.pdf');
    Route::get('roles/csv', [RoleController::class, 'csv'])->name('roles.csv');
    Route::get('roles/excel', [RoleController::class, 'excel'])->name('roles.excel');
    Route::get('roles/json', [RoleController::class, 'json'])->name('roles.json');
    Route::get('roles/import-excel-example', [RoleController::class, 'importExcelExample'])->name('roles.import-excel-example');
    Route::post('roles/import-excel', [RoleController::class, 'importExcel'])->name('roles.import-excel');
    Route::resource('roles', RoleController::class);

    # PERMISSIONS
    Route::get('permissions/pdf', [PermissionController::class, 'pdf'])->name('permissions.pdf');
    Route::get('permissions/csv', [PermissionController::class, 'csv'])->name('permissions.csv');
    Route::get('permissions/excel', [PermissionController::class, 'excel'])->name('permissions.excel');
    Route::get('permissions/json', [PermissionController::class, 'json'])->name('permissions.json');
    Route::get('permissions/import-excel-example', [PermissionController::class, 'importExcelExample'])->name('permissions.import-excel-example');
    Route::post('permissions/import-excel', [PermissionController::class, 'importExcel'])->name('permissions.import-excel');
    Route::resource('permissions', PermissionController::class);

    # GROUP PERMISSIONS
    Route::get('permission-groups/pdf', [PermissionGroupController::class, 'pdf'])->name('permission-groups.pdf');
    Route::get('permission-groups/csv', [PermissionGroupController::class, 'csv'])->name('permission-groups.csv');
    Route::get('permission-groups/excel', [PermissionGroupController::class, 'excel'])->name('permission-groups.excel');
    Route::get('permission-groups/json', [PermissionGroupController::class, 'json'])->name('permission-groups.json');
    Route::get('permission-groups/import-excel-example', [PermissionGroupController::class, 'importExcelExample'])->name('permission-groups.import-excel-example');
    Route::post('permission-groups/import-excel', [PermissionGroupController::class, 'importExcel'])->name('permission-groups.import-excel');
    Route::get('permission-groups/import-excel-example', [PermissionGroupController::class, 'importExcelExample'])->name('permission-groups.import-excel-example');
    Route::post('permission-groups/import-excel', [PermissionGroupController::class, 'importExcel'])->name('permission-groups.import-excel');
    Route::resource('permission-groups', PermissionGroupController::class);
});

# ACTIVITY LOGS
Route::get('activity-logs', [ActivityLogController::class, 'index'])->name('activity-logs.index');
Route::get('activity-logs/print', [ActivityLogController::class, 'exportPrint'])->name('activity-logs.print');
Route::get('activity-logs/pdf', [ActivityLogController::class, 'pdf'])->name('activity-logs.pdf');
Route::get('activity-logs/csv', [ActivityLogController::class, 'csv'])->name('activity-logs.csv');
Route::get('activity-logs/json', [ActivityLogController::class, 'json'])->name('activity-logs.json');
Route::get('activity-logs/excel', [ActivityLogController::class, 'excel'])->name('activity-logs.excel');

# REQUEST LOGS
Route::get('request-logs', [RequestLogController::class, 'index'])->name('request-logs.index');
Route::get('request-logs/print', [RequestLogController::class, 'exportPrint'])->name('request-logs.print');
Route::get('request-logs/pdf', [RequestLogController::class, 'pdf'])->name('request-logs.pdf');
Route::get('request-logs/csv', [RequestLogController::class, 'csv'])->name('request-logs.csv');
Route::get('request-logs/json', [RequestLogController::class, 'json'])->name('request-logs.json');
Route::get('request-logs/excel', [RequestLogController::class, 'excel'])->name('request-logs.excel');

# NOTIFICATIONS
Route::get('notifications/read-all', [NotificationController::class, 'readAll'])->name('notifications.read-all');
Route::get('notifications/read/{notification}', [NotificationController::class, 'read'])->name('notifications.read');
Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');

# BACKUP DATABASE
Route::resource('backup-databases', BackupDatabaseController::class);

# FILE MANAGER
Route::group(['prefix' => 'file-managers', 'middleware' => [FileManagerPermission::class]], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

# LOG VIEWER
Route::get('logs-viewer', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('logs.index')->middleware('can:Laravel Log Viewer');

# MANAJEMEN MENU
Route::get('menu-managements/pdf', [MenuManagementController::class, 'pdf'])->name('menu-managements.pdf');
Route::get('menu-managements/csv', [MenuManagementController::class, 'csv'])->name('menu-managements.csv');
Route::get('menu-managements/excel', [MenuManagementController::class, 'excel'])->name('menu-managements.excel');
Route::get('menu-managements/json', [MenuManagementController::class, 'json'])->name('menu-managements.json');
Route::get('menu-managements/import-excel-example', [MenuManagementController::class, 'importExcelExample'])->name('menu-managements.import-excel-example');
Route::post('menu-managements/import-excel', [MenuManagementController::class, 'importExcel'])->name('menu-managements.import-excel');
Route::get('menu-managements/import-excel-example', [MenuManagementController::class, 'importExcelExample'])->name('menu-managements.import-excel-example');
Route::post('menu-managements/import-excel', [MenuManagementController::class, 'importExcel'])->name('menu-managements.import-excel');
Route::resource('menu-managements', MenuManagementController::class);

Route::resource('group-menus', GroupMenuController::class);

# CONTOH CRUD
Route::get('yajra-crud-examples/ajax', [CrudExampleController::class, 'yajraAjax'])->name('crud-examples.ajax-yajra');
Route::get('yajra-ajax-crud-examples', [CrudExampleController::class, 'index'])->name('crud-examples.index-ajax-yajra');

// serverside
Route::get('crud-examples/pdf', [CrudExampleController::class, 'exportPdf'])->name('crud-examples.pdf');
Route::get('crud-examples/csv', [CrudExampleController::class, 'exportCsv'])->name('crud-examples.csv');
Route::get('crud-examples/excel', [CrudExampleController::class, 'exportExcel'])->name('crud-examples.excel');
Route::get('crud-examples/json', [CrudExampleController::class, 'exportJson'])->name('crud-examples.json');

Route::get('crud-examples/import-excel-example', [CrudExampleController::class, 'importExcelExample'])->name('crud-examples.import-excel-example');
Route::post('crud-examples/import-excel', [CrudExampleController::class, 'importExcel'])->name('crud-examples.import-excel');
Route::resource('crud-examples', CrudExampleController::class);

Route::get('testing/datatable', [TestingController::class, 'datatable']);
Route::get('testing/send-email', [TestingController::class, 'sendEmail']);
Route::get('testing/modal', [TestingController::class, 'modal']);
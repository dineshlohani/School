<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;

use App\Http\Controllers\SchoolTypeController;
use App\Http\Controllers\SchoolDetailsController;
use App\Http\Controllers\TeachersPersonalDetailController;
use App\Http\Controllers\TeachersEducationDetailController;
use App\Http\Controllers\TeachersWorkDetailsController;
use App\Http\Controllers\PalikaProfileController;
use App\Http\Controllers\CasteController;
use App\Http\Controllers\ReligionController;
use App\Http\Controllers\LicenseLevelController;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('authcheck', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
  Route::get('/',[DashboardController::class,'index'])->name('dashboard');
  //Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
  /*------------------------------------------------------------
    roles
  ------------------------------------------------------------------*/
  Route::get('roles', [RoleController::class, 'index']);
  Route::get('add-role', [RoleController::class, 'create'])->name('add-role');
  Route::post('save-roles', [RoleController::class, 'store'])->name('save-roles');
  Route::get('edit-role', [RoleController::class, 'edit'])->name('edit-role');
  Route::post('update-role/{id}', [RoleController::class, 'update'])->name('update-role');

  //permission controller
  Route::get('modules', [PermissionController::class,'index'])->name('modules');
  Route::get('add-modules', [PermissionController::class,'create'])->name('add-modules');
  Route::post('save-modules', [PermissionController::class,'store'])->name('save-modules');
  Route::get('edit-modules', [PermissionController::class,'edit'])->name('edit-modules');
  Route::post('update-modules/{id}', [PermissionController::class,'update'])->name('update-modules');
  Route::get('show-modules/{id}', [PermissionController::class,'show'])->name('show-modules');
  Route::post('assign-userpermission/{id}', [PermissionController::class,'createPermission'])->name('assign-userpermission');
  Route::get('revoke-permission/{userid}/{permission}', [PermissionController::class,'revokeUserPermission'])->name('revoke-permission');

 /*------------------------------------------------------------
    users 
  ---------------------------------------------------------*/
  Route::resource('users', UserController::class);
  Route::get('create',[UserController::class,'create']);
  Route::post('save-user',[UserController::class, 'store'])->name('save-user');
  Route::get('edit-user/{id}',[UserController::class,'edit'])->name('edit-user');
  Route::post('/update-user/{id}', [UserController::class,'update'])->name('update-user');

  /*--------------------------------------------------------------
  // school management setting
  ----------------------------------------------------------------*/
  Route::get('school-type', [SchoolTypeController::class,'index'])->name('school-type');
  Route::get('school-type-add', [SchoolTypeController::class,'create'])->name('school-type-add');
  Route::post('save-school-type', [SchoolTypeController::class,'store'])->name('save-school-type');
  Route::get('school-type-edit', [SchoolTypeController::class,'edit'])->name('school-type-edit');
  Route::post('update-school-type/{id}',[SchoolTypeController::class,'update'])->name('update-school-type');
  // Route::get('school-type', [SchoolTypeController::class,'index'])->name('school-type');

  /*--------------------------------------------------------------
  // school details
  ----------------------------------------------------------------*/
  Route::get('school-details', [SchoolDetailsController::class,'index'])->name('school-details');
  Route::get('school-details-add', [SchoolDetailsController::class,'create'])->name('school-tdetails-add');
  Route::post('school-details-save', [SchoolDetailsController::class,'store'])->name('school-details-save');
  Route::get('school-details-edit', [SchoolDetailsController::class,'edit'])->name('school-details-edit');
  Route::post('school-details-update/{id}', [SchoolDetailsController::class,'update'])->name('school-details-update');
  Route::get('school-details-delete/{id}', [SchoolDetailsController::class,'destroy'])->name('school-details-delete');

  /*--------------------------------------------------------------
  // teachers personal info collection
  ----------------------------------------------------------------*/
  Route::get('teachers-personal-detail', [TeachersPersonalDetailController::class,'create'])->name('teachers-personal-detail');
  Route::get('teachers-personal-list', [TeachersPersonalDetailController::class,'index'])->name('teachers-personal-list');
  Route::get('teachers-personal-data-add', [TeachersPersonalDetailController::class,'create'])->name('teachers-personal-data-add');
  Route::post('teachers-personal-data-save', [TeachersPersonalDetailController::class,'store'])->name('teachers-personal-data-save');
  Route::get('teachers-personal-detail-edit/{id}', [TeachersPersonalDetailController::class,'edit'])->name('teachers-personal-detail-edit');
  Route::post('teachers-personal-detail-update/{id}', [TeachersPersonalDetailController::class,'update'])->name('teachers-personal-detail-update');
  Route::get('teachers-personal-detail-delete/{id}', [TeachersPersonalDetailController::class,'destroy'])->name('teachers-personal-detail-delete');
  Route::get('teachers-profile-detail/{id}', [TeachersPersonalDetailController::class,'show'])->name('teachers-profile-detail');
  Route::get('teachers-details-export/', [TeachersPersonalDetailController::class,'export'])->name('teachers-details-export');//export
  Route::post('teacher-search', [TeachersPersonalDetailController::class,'search'])->name('teacher-search');
  Route::get('convert-date', [TeachersPersonalDetailController::class,'convertBSTOAD'])->name('convert-date');

   /*--------------------------------------------------------------
  // teachers education info collection
  ----------------------------------------------------------------*/
  Route::get('teachers-education-detail-list/{id}', [TeachersEducationDetailController::class,'index'])->name('teachers-education-detail-list');
  Route::get('teachers-education-create/{id}', [TeachersEducationDetailController::class,'create'])->name('teachers-education-create');
  Route::post('teachers-education-detail-save', [TeachersEducationDetailController::class,'store'])->name('teachers-education-detail-save');
  //Route::get('teachers-education-detail-list', [TeachersEducationDetailController::class,'show'])->name('teachers-education-detail-list');
  Route::get('teachers-education-detail-edit/{id}', [TeachersEducationDetailController::class,'edit'])->name('teachers-education-detail-edit');
  Route::post('teachers-education-detail-update/{id}', [TeachersEducationDetailController::class,'update'])->name('teachers-education-detail-update');
  Route::get('teachers-education-detail-delete/{id}', [TeachersEducationDetailController::class,'destroy'])->name('teachers-education-detail-delete');
  /*--------------------------------------------------------------
  // teachers work and training details
  ----------------------------------------------------------------*/
  Route::get('teachers-work-detail/{id}', [TeachersWorkDetailsController::class,'index'])->name('teachers-work-detail');
  Route::get('teachers-work-detail-create/{id}', [TeachersWorkDetailsController::class,'create'])->name('teachers-work-detail-create');
  Route::post('teachers-work-detail-save', [TeachersWorkDetailsController::class,'store'])->name('teachers-work-detail-save');
  Route::get('teachers-work-detail-list/{id}', [TeachersWorkDetailsController::class,'show'])->name('teachers-work-detail-list');
  Route::get('teachers-work-detail-edit/{id}', [TeachersWorkDetailsController::class,'edit'])->name('teachers-work-detail-edit');
  Route::post('teachers-work-detail-update/{id}', [TeachersWorkDetailsController::class,'update'])->name('teachers-work-detail-update');
  Route::get('teachers-work-detail-delete/{id}', [TeachersWorkDetailsController::class,'destroy'])->name('teachers-work-detail-delete');

  Route::get('system-config',[PalikaProfileController::class, 'index'])->name('system-config');
  Route::post('update-config',[PalikaProfileController::class, 'update'])->name('update-config');

  /*--------------------------------------------------------------
    Caste Controller
  ----------------------------------------------------------------*/
  Route::get('caste', [CasteController::class,'index'])->name('caste');
  Route::get('add-caste', [CasteController::class,'create'])->name('add-caste');
  Route::post('save-caste', [CasteController::class,'store'])->name('save-caste');
  Route::get('edit-caste', [CasteController::class,'edit'])->name('edit-caste');
  Route::post('update-caste/{id}', [CasteController::class,'update'])->name('update-caste');
  Route::get('delete-caste/{id}', [CasteController::class,'destroy'])->name('delete-caste');

  /*--------------------------------------------------------------
   Religion
  ----------------------------------------------------------------*/
  Route::get('religion', [ReligionController::class,'index'])->name('religion');
  Route::get('add-religion', [ReligionController::class,'create'])->name('add-religion');
  Route::post('save-religion', [ReligionController::class,'store'])->name('save-religion');
  Route::get('edit-religion', [ReligionController::class,'edit'])->name('edit-religion');
  Route::post('update-religion/{id}', [ReligionController::class,'update'])->name('update-religion');
  Route::get('delete-religion/{id}', [ReligionController::class,'destroy'])->name('delete-religion');

  /*--------------------------------------------------------------
   License
  ----------------------------------------------------------------*/
  Route::get('licenselevel', [LicenseLevelController::class,'index'])->name('licenselevel');
  Route::get('add-licenselevel', [LicenseLevelController::class,'create'])->name('add-licenselevel');
  Route::post('save-licenselevel', [LicenseLevelController::class,'store'])->name('save-licenselevel');
  Route::get('edit-licenselevel', [LicenseLevelController::class,'edit'])->name('edit-licenselevel');
  Route::post('update-licenselevel/{id}', [LicenseLevelController::class,'update'])->name('update-licenselevel');
  Route::get('delete-licenselevel/{id}', [LicenseLevelController::class,'destroy'])->name('delete-licenselevel');

/*-------------------------------------------------------------------
Print Pages  
---------------------------------------------------------------------*/
  Route::get('import-teacher-details', [TeachersPersonalDetailController::class,'importDetails'])->name('import-teacher-details');
  Route::post('save-import-details', [TeachersPersonalDetailController::class,'saveImportDetails'])->name('save-import-details');
  Route::get('teacherpd-prints', [TeachersPersonalDetailController::class,'printDetails'])->name('teacherpd-prints');

  Route::get('teacherpd-ajax-prints/{schoolID}/{statusID}/{name}/{licenceNo}', [TeachersPersonalDetailController::class,'printajaxDetails'])->name('teacherpd-ajax-prints');

  Route::get('teacherpd-export/{schoolID}/{statusID}/{name}/{licenceNo}', [TeachersPersonalDetailController::class,'exportBySearch'])->name('teacherpd-export');


});
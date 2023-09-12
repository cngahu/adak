<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\EmployeeController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\DesignationsController;
use App\Http\Middleware;
use App\Http\Controllers\Backend\GenderController;
use App\Http\Controllers\Backend\ConstituencyController;
use App\Http\Controllers\Backend\CountyController;
use App\Http\Controllers\Backend\NationalityController;
use App\Http\Controllers\Backend\EthnicityController;
use App\Http\Controllers\Recruitment\AccountController;
use App\Http\Controllers\Recruitment\EducationController;
use App\Http\Controllers\Recruitment\ProffessionalQualificationsController;
use App\Http\Controllers\Recruitment\ProffessionalMembershipsController;
use App\Http\Controllers\Recruitment\ExperienceController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('applicant/dashboard', function () {
    return view('applicant.index');
})->middleware(['auth', 'verified'])->name('applicant.dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
Route::get('/logout', [AdminController::class, 'AdminLogoutPage'])->name('admin.logout.page');

//Admin Routes
Route::middleware(['auth'])->group(function (){
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/change/password', [AdminController::class, 'ChangePassword'])->name('change.password');
    Route::post('/update/password', [AdminController::class, 'UpdatePassword'])->name('update.password');

});


//Employee Routes
Route::controller(EmployeeController::class)->group(function(){

    Route::get('/all/employee','AllEmployee')->name('all.employee');
    Route::get('/add/employee','AddEmployee')->name('add.employee');
    Route::post('/store/employee','StoreEmployee')->name('employee.store');
    Route::get('/edit/employee/{id}','EditEmployee')->name('edit.employee');
    Route::post('/update/employee','UpdateEmployee')->name('employee.update');
    Route::get('/delete/employee/{id}','DeleteEmployee')->name('delete.employee');
});

//Customer Routes
Route::controller(CustomerController::class)->group(function(){

    Route::get('/all/customer','AllCustomer')->name('all.customer');
    Route::get('/add/customer','AddCustomer')->name('add.customer');
    Route::post('/store/customer','StoreCustomer')->name('customer.store');
    Route::get('/edit/customer/{id}','EditCustomer')->name('edit.customer');
    Route::post('/update/customer','UpdateCustomer')->name('customer.update');
    Route::get('/delete/customer/{id}','DeleteCustomer')->name('delete.customer');
});


Route::middleware(['auth','verified','role:admin'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard',  'AdminDashboard')->name('dashboard');


    });

    Route::controller(DesignationsController::class)->group(function () {
        Route::get('/all/designation', 'AllDesignation')->name('all.designation');
        Route::get('/add/designation', 'AddDesignation')->name('add.designation');
        Route::post('/store/designation', 'StoreDesignation')->name('designation.store');
        Route::get('/edit/designation/{id}', 'EditDesignation')->name('edit.designation');
        Route::post('/update/designation', 'UpdateDesignation')->name('designation.update');
        Route::get('/delete/designation/{id}', 'DeleteDesignation')->name('delete.designation');
    });

    Route::controller(GenderController::class)->group(function () {
        Route::get('/all/gender', 'AllGender')->name('all.gender');
        Route::get('/add/gender', 'AddGender')->name('add.gender');
        Route::post('/store/gender', 'StoreGender')->name('gender.store');
        Route::get('/edit/gender/{id}', 'EditGender')->name('edit.gender');
        Route::post('/update/gender', 'UpdateGender')->name('gender.update');
        Route::get('/delete/gender/{id}', 'DeleteGender')->name('delete.gender');
    });

    Route::controller(ConstituencyController::class)->group(function () {
        Route::get('/all/constituency', 'AllConstituency')->name('all.constituency');
        Route::get('/add/constituency', 'AddConstituency')->name('add.constituency');
        Route::post('/store/constituency', 'StoreConstituency')->name('constituency.store');
        Route::get('/edit/constituency/{id}', 'EditConstituency')->name('edit.constituency');
        Route::post('/update/constituency', 'UpdateConstituency')->name('constituency.update');
        Route::get('/delete/constituency/{id}', 'DeleteConstituency')->name('delete.constituency');
    });

    Route::controller(CountyController::class)->group(function () {
        Route::get('/all/county', 'AllCounty')->name('all.county');
        Route::get('/add/county', 'AddCounty')->name('add.county');
        Route::post('/store/county', 'StoreCounty')->name('county.store');
        Route::get('/edit/county/{id}', 'EditCounty')->name('edit.county');
        Route::post('/update/county', 'UpdateCounty')->name('county.update');
        Route::get('/delete/county/{id}', 'DeleteCounty')->name('delete.county');
    });

    Route::controller(NationalityController::class)->group(function () {
        Route::get('/all/nation', 'AllNation')->name('all.nation');
        Route::get('/add/nation', 'AddNation')->name('add.nation');
        Route::post('/store/nation', 'StoreNation')->name('nation.store');
        Route::get('/edit/nation/{id}', 'EditNation')->name('edit.nation');
        Route::post('/update/nation', 'UpdateNation')->name('nation.update');
        Route::get('/delete/nation/{id}', 'DeleteNation')->name('delete.nation');
    });
});


Route::middleware(['auth','verified','role:applicant'])->group(function () {

    Route::controller(AdminController::class)->group(function () {
        Route::get('applicant/dashboard',  'ApplicantDashboard')->name('applicant.dashboard');


    });
    Route::controller(AccountController::class)->group(function () {
        Route::get('applicant/register',  'Register')->name('applicant.register');
        Route::get('applicant/profile/{id}',  'Profile')->name('applicant.profile');
        Route::post('applicant/profile/update',  'ProfileUpdate')->name('profile.update');
        Route::post('applicant/profile/store',  'RegisterUpdate')->name('applicant.store');


    });

    Route::controller(EducationController::class)->group(function () {
        Route::get('applicant/education',  'EducationProfile')->name('applicant.alleducation');
        Route::post('education/store',  'EducationStore')->name('education.store');
        Route::get('education/edit/{id}' , 'EducationEdit')->name('education.edit');
        Route::post('education/update' , 'EducationUpdate')->name('education.update');
        Route::get('education/delete{id}' , 'EducationDelete')->name('education.delete');

    });

    Route::controller(ProffessionalQualificationsController::class)->group(function () {
        Route::get('applicant/proffessionalqual',  'ProffessionalQualProfile')->name('applicant.proffessionalqual');
        Route::post('proffessionalqual/store',  'ProffessionalQualStore')->name('proffessionalqual.store');
        Route::get('proffessionalqual/edit/{id}' , 'ProffessionalQualEdit')->name('proffessionalqual.edit');
        Route::post('proffessionalqual/update' , 'ProffessionalQualUpdate')->name('proffessionalqual.update');
        Route::get('proffessionalqual/delete{id}' , 'ProffessionalQualDelete')->name('proffessionalqual.delete');

    });

    Route::controller(ProffessionalMembershipsController::class)->group(function () {
        Route::get('applicant/proffmembership',  'ProffessionalMembershipProfile')->name('applicant.proffmembership');
        Route::post('proffmembership/store',  'ProffessionalMembershipStore')->name('proffmembership.store');
        Route::get('proffmembership/edit/{id}' , 'ProffessionalMembershipEdit')->name('proffmembership.edit');
        Route::post('proffmembership/update' , 'ProffessionalMembershipUpdate')->name('proffmembership.update');
        Route::get('proffmembership/delete{id}' , 'ProffessionalMembershipDelete')->name('proffmembership.delete');

    });

    Route::controller(ExperienceController::class)->group(function () {
        Route::get('applicant/experience',  'ExperienceProfile')->name('applicant.experience');
        Route::post('experience/store',  'ExperienceStore')->name('experience.store');
        Route::get('experience/edit/{id}' , 'ExperienceEdit')->name('experience.edit');
        Route::post('experience/update' , 'ExperienceUpdate')->name('experience.update');
        Route::get('experience/delete{id}' , 'ExperienceDelete')->name('experience.delete');

    });
});

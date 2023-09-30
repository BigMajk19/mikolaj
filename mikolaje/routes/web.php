<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Backend\VisitsController;
use App\Http\Controllers\Backend\CandidatesController;
use App\Http\Controllers\Backend\VisitCountController;
use App\Http\Controllers\Backend\VisitsTypeController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Client\ClientDashboardController;
use App\Http\Controllers\Partner\PartnerDashboardController;
use App\Http\Controllers\Employee\EmployeeDashboardController;


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
    return view('auth.login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//For Admin Dashboard Middleware Group
Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {
    Route::get('dashboard' , [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('logout' , [AdminDashboardController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('profile' , [AdminDashboardController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('profile/store' , [AdminDashboardController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('change/password' , [AdminDashboardController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('update/password' , [AdminDashboardController::class, 'AdminUpdatePassword'])->name('admin.update.password');
    Route::get('inbox' , [InboxController::class, 'ShowAdminInbox'])->name('inbox');
});//End AdminDashboard Group


//Admin Group Middleware
Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {

    //For Visits Controller
    Route::controller(VisitsTypeController::class)->group(function () {
        Route::get('all/typevisits', 'AllType')->name('all.typevisits');
        Route::get('add/type', 'AddType')->name('add.type');
        Route::post('store/type', 'StoreType')->name('store.type');
        Route::get('edit/type/{id}', 'EditType')->name('edit.type_visits');
        Route::post('update/type', 'UpdateType')->name('update.type');
        Route::get('delete/type/{id}', 'DeleteType')->name('delete.type_visits');

    });

    //For Showing Visits
    Route::controller(VisitsController::class)->group(function () {
        Route::get('show/visits/all', 'ShowAllVisits')->name('show.all.visits');
        Route::get('add/visit', 'AddVisit')->name('add.visit');
        Route::post('store/visit', 'StoreVisit')->name('store.visit');
        Route::get('edit/visit/{id}', 'EditVisit')->name('edit.visit');
        Route::post('update/visit', 'UpdateVisit')->name('update.visit');
        Route::get('delete/visit/{id}', 'DeleteVisit')->name('delete.visit');
        // Show New Visits
        Route::get('show/visits/new', 'ShowVisitsNew')->name('show.visits.new');
        Route::get('show/visits/not_paid', 'ShowVisitsNotPaid')->name('show.visits.not_paid');
        Route::get('show/visits/not_sign_to', 'ShowVisitsNotSignTo')->name('show.visits.not_sign_to');
        Route::get('show/visits/reserve_list', 'ShowVisitsReserveList')->name('show.visits.reserve_list');
        Route::get('show/visits/canceled', 'ShowVisitsCanceled')->name('show.visits.canceled');
        //Show Visits Paid
        Route::get('show/visits/paid_and_sign_to', 'ShowVisitsPaidAndSignTo')->name('show.visits.paid_and_sign_to');

        // Options for New Visits (Confirm, Cancel, SignTo, ConfirmPayment)
        Route::get('confirm/visit/{id}', 'ConfirmNewVisit')->name('confirm.new.visit');
        Route::get('cancel/visit/{id}', 'CancelNewVisit')->name('cancel.new.visit');
        Route::get('paid/visit/{id}', 'PaidNewVisit')->name('paid.new.visit');
        Route::get('signto/visit/{id}', 'SignToNewVisit')->name('signto.visit');
        Route::post('update/visit/sign/partner/', 'SignPartnerToNewVisit')->name('update.visit.sign.partner');
        Route::get('change/status/new/visit/{id}', 'ChangeStatusNewVisit')->name('change.status.new.visit');

        // Option for Realized Visits
        Route::get('show/visits/realized', 'ShowVisitsRealized')->name('show.visits.realized');

    });

    //For Couting Visits
    Route::controller(VisitCountController::class)->group(function () {
        Route::get('visits/count/all', 'CountAllVisits')->name('visits.count.all');

    });

    //For Showing Candidates
    Route::controller(CandidatesController::class)->group(function () {
        Route::get('show/candidates/all', 'ShowAllCandidates')->name('show.all.candidates');
        Route::get('add/candidate', 'AddCandidate')->name('add.candidate');
        Route::post('store/candidate', 'StoreNewCandidate')->name('store.candidate');
        Route::get('edit/candidate/{id}', 'EditNewCandidate')->name('edit.candidate');
        Route::post('update/candidate', 'UpdateNewCandidate')->name('update.candidate');
        Route::get('delete/candidate/{id}', 'DeleteCandidate')->name('delete.candidate');

        // Show Candidates for Santa
        Route::get('show/candidates/new/santa', 'ShowCandidatesNewSanta')->name('show.all.candidates.santa');


        // Show Candidates for Elf
        Route::get('show/candidates/new/elf', 'ShowCandidatesNewElf')->name('show.all.candidates.elf');

        // Show Candidates for Snowflake
        Route::get('show/candidates/new/snowflake', 'ShowCandidatesNewSnowflake')->name('show.all.candidates.snowflake');


    });


}); //End Admin Middleware Group


//For Partner Middleware Group
Route::prefix('partner')->middleware(['auth','role:partner'])->group(function () {
    Route::get('dashboard' , [PartnerDashboardController::class, 'index'])->name('partner.dashboard');
    Route::get('logout' , [PartnerDashboardController::class, 'PartnerLogout'])->name('partner.logout');
});

//For Employee Middleware Group
Route::prefix('employee')->middleware(['auth','role:employee'])->group(function () {
    Route::get('dashboard' , [EmployeeDashboardController::class, 'index'])->name('employee.dashboard');
    Route::get('logout' , [EmployeeDashboardController::class, 'EmployeeLogout'])->name('employee.logout');
});

//For Client Middleware Group
Route::prefix('client')->middleware(['auth','role:client'])->group(function () {
    Route::get('dashboard' , [ClientDashboardController::class, 'index'])->name('client.dashboard');
    Route::get('logout' , [ClientDashboardController::class, 'ClientLogout'])->name('client.logout');
});




require __DIR__.'/auth.php';

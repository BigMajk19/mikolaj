<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DisplayFieldsInForm;
use App\Http\Controllers\Backend\VisitsController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\CandidatesController;
use App\Http\Controllers\Backend\VisitsTypeController;
use App\Http\Controllers\User\UserDashboardController;
use App\Http\Controllers\Backend\WorkingAreaController;
use App\Http\Controllers\Admin\AdminDashboardController;
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
    Route::get('/dashboard' , [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('logout' , [AdminDashboardController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('profile' , [AdminDashboardController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('profile/store' , [AdminDashboardController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('change/password' , [AdminDashboardController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('update/password' , [AdminDashboardController::class, 'AdminUpdatePassword'])->name('admin.update.password');
    Route::get('inbox' , [InboxController::class, 'ShowAdminInbox'])->name('inbox');
});//End AdminDashboard Group

//For Displaying Fields in New Visits Form
Route::middleware(['auth','role:admin'])->group(function () {
    Route::controller(DisplayFieldsInForm::class)->group(function () {

       //For New Visits Service
        Route::get('get/type/name/visit/{typeNameId}', 'GetTypeNameVisit')->name('get.type.name.visit');
        Route::get('get/data/visitname/{visitNameId}', 'GetDataVisit')->name('get.data.visit');
        Route::get('get/voivodeship/name/forvisits/{voivodeshipNameId}', 'GetVoivodeshipNameForVisits')->name('get.voivodeship.name.forvisits');

        // For New Area Service
        Route::get('get/voivodeship/name/{voivodeshipNameId}', 'GetVoivodeshipName')->name('get.voivodeship.name');
        Route::get('get/city/name/{cityNameId}', 'GetCityName')->name('get.city.name');
        Route::get('get/district/name/{districtNameId}', 'GetDistrictData')->name('get.district.name');
    });
});

//Admin Group Middleware
Route::prefix('admin')->middleware(['auth','role:admin'])->group(function () {

    //For Visits Controller
    Route::controller(VisitsTypeController::class)->group(function () {

        //For Type Visits
        Route::get('all/typevisits', 'AllType')->name('all.typevisits');
        Route::get('add/type', 'AddType')->name('add.type');
        Route::post('store/type', 'StoreType')->name('store.type');
        Route::get('edit/type/{id}', 'EditType')->name('edit.type_visits');
        Route::post('update/type', 'UpdateType')->name('update.type');
        Route::get('delete/type/{id}', 'DeleteType')->name('delete.type_visits');

        //For Name Visits
        Route::get('add/name', 'AddNameVisit')->name('add.name.visit');
        Route::post('store/name', 'StoreNameVisit')->name('store.name.visit');
        Route::get('edit/name/{id}', 'EditNameVisit')->name('edit.name.visit');
        Route::post('update/name', 'UpdateNameVisit')->name('update.name.visit');
        Route::get('delete/name/{id}', 'DeleteNameVisit')->name('delete.name.visit');


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


    //For Showing Candidates
    Route::controller(CandidatesController::class)->group(function () {
      Route::get('candidates/show/all', 'ShowAllCandidates')->name('show.all.candidates');
      Route::get('candidate/add', 'AddCandidate')->name('add.candidate');
      Route::post('candidate/store', 'StoreNewCandidate')->name('store.candidate');
      Route::get('candidate/edit/{id}', 'EditNewCandidate')->name('edit.candidate');
      Route::post('candidate/update', 'UpdateNewCandidate')->name('update.candidate');
      Route::get('candidate/delete/{id}', 'DeleteCandidate')->name('delete.candidate');

      // Show Candidates for Santa
      Route::get('show/candidates/new/santa', 'ShowCandidatesNewSanta')->name('show.all.candidates.santa');


      // Show Candidates for Elf
      Route::get('show/candidates/new/elf', 'ShowCandidatesNewElf')->name('show.all.candidates.elf');

      // Show Candidates for Snowflake
      Route::get('show/candidates/new/snowflake', 'ShowCandidatesNewSnowflake')->name('show.all.candidates.snowflake');

      // For Sign Candidates To Partner
      Route::get('candidate/sign/{id}', 'SignCandidate')->name('sign.candidate');
      Route::post('candidate/update/sign', 'SignCandidateToPartner')->name('update.sign.candidate');

    });

    //For Showing Partners
    Route::controller(PartnerController::class)->group(function () {
      Route::get('show/partners/active', 'ShowActivePartners')->name('show.partners.active');
      Route::get('show/partners/notactive', 'ShowNotActivePartners')->name('show.partners.notactive');
      Route::get('add/candidate', 'AddNewPartner')->name('add.partner');
      Route::post('store/partner', 'StoreNewPartner')->name('store.partner');
      Route::get('edit/partner/{id}', 'EditPartner')->name('edit.partner');
      Route::post('update/partner', 'UpdatePartner')->name('update.partner');
      Route::get('delete/partner/{id}', 'DeletePartner')->name('delete.partner');
      Route::get('confirm/partner/{id}', 'ConfirmNewPartner')->name('confirm.new.partner');

    });

    //For Working Area
    Route::controller(WorkingAreaController::class)->group(function () {

        //ShowingArea
        Route::get('show/working/area', 'ShowWorkingArea')->name('show.working.area');

        // Options for Area Voivodeship
        Route::get('add/voivodeship', 'AddVoivodeship')->name('add.voivodeship');
        Route::post('store/voivodeship', 'StoreAreaVoivodeship')->name('store.voivodeship');
        Route::get('edit/voivodeship/{id}', 'EditAreaVoivodeship')->name('edit.voivodeship');
        Route::post('update/voivodeship', 'UpdateAreaVoivodeship')->name('update.voivodeship');
        Route::get('delete/voivodeship/{id}', 'DeleteAreaVoivodeship')->name('delete.voivodeship');
        //For Area City
        Route::get('add/city', 'AddCity')->name('add.city');
        Route::post('store/city', 'StoreAreaCity')->name('store.city');
        Route::get('edit/city/{id}', 'EditAreaCity')->name('edit.city');
        Route::post('update/city', 'UpdateAreaCity')->name('update.city');
        Route::get('delete/city/{id}', 'DeleteAreaCity')->name('delete.city');

        //For Area City District
        Route::get('add/district', 'AddDistrict')->name('add.district');
        Route::post('store/district', 'StoreAreaDistrict')->name('store.district');
        Route::get('edit/district/{id}', 'EditAreaDistrict')->name('edit.district');
        Route::post('update/district', 'UpdateAreaDistrict')->name('update.district');
        Route::get('delete/district/{id}', 'DeleteAreaDistrict')->name('delete.district');

    // For Import & Export
        Route::get('/import/voivodeship', 'ImportVoivodeship')->name('import.voivodeship');
        Route::get('/export/voivodeship', 'ExportVoivodeship')->name('export.voivodeship');
        Route::post('/export/voivodeship/file', 'ImportVoivodeshipFile')->name('import.voivodeship.file');
        Route::get('/import/city', 'ImportCity')->name('import.city');
        Route::get('/export/city', 'ExportCity')->name('export.city');
        Route::post('/import/city/file', 'ImportCityFile')->name('import.city.file');
        Route::get('/import/district', 'ImportDistrict')->name('import.district');
        Route::get('/export/district', 'ExportDistrict')->name('export.district');
        Route::post('/import/district/file', 'ImportDistrictFile')->name('import.district.file');
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
Route::prefix('user')->middleware(['auth','role:user'])->group(function () {
    Route::get('dashboard' , [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('logout' , [UserDashboardController::class, 'UserLogout'])->name('user.logout');
});




require __DIR__.'/auth.php';

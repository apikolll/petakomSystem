<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProposalController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
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


// Route::get('/test', function(){
//     return "HELLO";
// });

Route::get('/', [HomeController::class, 'homepage']);

// Route::get('showreport', [ReportController::class, 'showReport']);

Auth::routes();

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::controller(CalenderController::class)->group(function(){
    Route::get('calendar-event', 'index');
    Route::post('calendar-crud-ajax', 'ajax');
});


//----------------------------- ACTIVITY MODULE ----------------------------//
Route::controller(ActivityController::class)->group(function () {
    
    //Group of view for role student and lecturer
    Route::group(['middleware' => ['auth', 'user:student,lecturer']], function () {
        Route::get('/showactivity_login', 'showActivity')->name('activity.login');
        Route::get('/createactivity', 'createActivity')->name('activity.create');
        Route::get('/editactivity/{id}', 'editActivity')->name('activity.edit');
        Route::get('/proposeactivity/{id}', 'proposeActivity')->name('propose.activity');
        Route::post('storeactivity', 'store')->name('store.activity');
        Route::post('/updateactivity/{id}', 'update')->name('update.activity');
        // Route::post('/deleteactivity/{id}', 'destroy')->name('destroy.activity');
        
    });

    //Group of view for role commiittee
    Route::group(['middleware' => ['auth', 'user:committee']], function () {
        Route::get('/petakompage', 'activityProposed')->name('petakom.page');
        Route::get('/approveActivity/{id}', 'approveActivity')->name('propose.approve');
        Route::get('/rejectActivity/{id}', 'rejectActivity')->name('propose.reject');
    });

    // can be view by all role
    Route::get('/showactivity/{id}', 'show')->name('activity.show');
    Route::get('/showactivityproposed', 'showProposedActivity')->name('proposed.activity');   
});




//----------------------------- BULLETIN MODULE ----------------------------//
Route::controller(BulletinController::class)->group(function () {

    //----------------------------- USER EXCEPT PETAKOM ----------------------------//
    //get page bulletin for users
    Route::get('/bulletinUserPage', 'indexUser');

    //show bulletin news in full details
    Route::get('/bulletin/{id}/show', 'showNewsUser');

    //search news by title or author name
    Route::get('/searchNewsUser', 'searchNewsUser');

    //---------------------------------- PETAKOM -----------------------------------//
    Route::prefix('committee')->middleware(['auth', 'user:committee'])->group(function () {
        //get page bulletin for petakom committee
        Route::get('/bulletin', 'indexPetakom');

        //create new news
        Route::get('/create', function () {
            return view('buletin.addNews');
        });

        //insert new news
        Route::post('/bulletin/store', 'storeNews');

        //search news by title or author name
        Route::get('/searchNewsPetakom', 'searchNewsPetakom');

        //show bulletin news in full details
        Route::get('/bulletin/{id}/show', 'showNews');

        //edit news form
        Route::get('/bulletin/{id}/edit', 'editNews');

        //update news
        Route::post('/bulletin/{id}/update', 'updateNews');

        //delete news
        Route::get('/bulletin/{id}/delete', 'deleteNews');
    });
});

//----------------------------- PROPOSAL MODULE ----------------------------//
Route::controller(ProposalController::class)->group(function () {
    //For student, lecturer and petakom committee
    Route::group(['middleware' => ['auth', 'user:student,lecturer,committee']], function () {
        Route::get('/showproposal_view', 'showProposal')->name('proposal.view');
        Route::get('/createproposal', 'createProposal')->name('proposal.create');
        Route::get('/editproposal/{id}', 'editProposal')->name('proposal.edit');
        Route::post('/storeproposal', 'store')->name('store.proposal');
        Route::post('/updateproposal/{id}', 'update')->name('update.proposal');
        Route::post('/deleteproposal/{id}', 'destroy')->name('destroy.proposal');
        Route::get('/showproposal/{id}', 'show')->name('proposal.show');
        Route::get('/proposaldelete/{id}', 'showDelete')->name('proposal.delete');
    });
    //For HOSD
     Route::group(['middleware' => ['auth', 'user:headofdevelopment']], function () {
        Route::get('/ProposalHOSDpage', 'ProposalProposedHOSD')->name('ProposalHOSD.page');
        Route::get('/approveHOSDProposal/{id}', 'approveProposalHOSD')->name('ProposalHOSD.approve');
        Route::get('/rejectHOSDProposal/{id}', 'rejectProposalHOSD')->name('ProposalHOSD.reject');
    });
    //For Coordinator
    Route::group(['middleware' => ['auth', 'user:coordinator']], function () {
        Route::get('/ProposalCoordinatorpage', 'ProposalProposedCoordinator')->name('ProposalCoordinator.page');
        Route::get('/approveCoordinatorReport/{id}', 'rejectProposalCoordinator')->name('ProposalCoordinator.approve');
        Route::get('/rejectCoordinatorReport/{id}', 'rejectProposalCoordinator')->name('ProposalCoordinator.reject');
    });
    //For Dean
    Route::group(['middleware' => ['auth', 'user:dean']], function () {
        Route::get('/ProposalDeanpage', 'ProposalProposedDean')->name('ProposalDean.page');
        Route::get('/confirmDeanReport/{id}', 'confirmPropsoalDean')->name('ProposalDean.confirm');
        Route::get('/denyDeanProposal/{id}', 'denyProposalDean')->name('ProposalDean.deny');
    });
});

//----------------------------- REPORT MODULE ----------------------------//
Route::controller(ReportController::class)->group(function () {
    
    //Group of view for role student and lecturer, committee
    Route::group(['middleware' => ['auth', 'student']], function () {
        Route::get('/showreport_view', 'showReport')->name('report.view');
        Route::get('/createreport', 'createReport')->name('report.create');
        Route::get('/edireport/{id}', 'editReport')->name('report.edit');
        Route::post('/storereport', 'store')->name('store.report');
        Route::post('/updatereport/{id}', 'update')->name('update.report');
        Route::post('/deletereport/{id}', 'destroy')->name('destroy.report');
        Route::get('/showreport/{id}', 'show')->name('report.show');
        Route::get('/reportdelete/{id}', 'showDelete')->name('report.delete');
    });
    //Group of view for role head of development
    Route::group(['middleware' => ['auth', 'user:headofdevelopment']], function () {
        Route::get('/ReportHOSDpage', 'ReportProposedHOSD')->name('ReportHOSD.page');
        Route::get('/approveHOSDReport/{id}', 'approveReportHOSD')->name('ReportHOSD.approve');
        Route::get('/rejectHOSDReport/{id}', 'rejectReportHOSD')->name('ReportHOSD.reject');     
    });
    
    //Group of view for role coordinator
    Route::group(['middleware' => ['auth', 'user:coordinator']], function () {
        Route::get('/ReportCoordinatorpage', 'ReportProposedCoordinator')->name('ReportCoordinator.page');
        Route::get('/approveCoordinatorReport/{id}', 'approveReportCoordinator')->name('ReportCoordinator.approve');
        Route::get('/rejectCoordinatorReport/{id}', 'rejectReportCoordinator')->name('ReportCoordinator.reject');     
    });

    //Group of view for role dean
    Route::group(['middleware' => ['auth', 'user:dean']], function () {
        Route::get('/ReportDeanpage', 'ReportProposedDean')->name('ReportDean.page');
        Route::get('/confirmDeanReport/{id}', 'confirmReportDean')->name('ReportDean.confirm');
        Route::get('/denyDeanReport/{id}', 'denyReportDean')->name('ReportDean.deny');     
    });
});





<?php

use App\Http\Controllers\ActivityController;

use App\Http\Controllers\ElectionController;
use App\Http\Controllers\UserController;

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

Route::get('/testpage', function(){
    return view('welcome');
});

// Route::get('/test', function(){
//     return "HELLO";
// });

// Route::get('/', [HomeController::class, 'homepage']);

// Route::get('/', function(){
//     return view('activity.propose_activity');
// });

Auth::routes();


Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

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
        Route::post('/deleteactivity/{id}', 'destroy')->name('destroy.activity');
        
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
            Route::post('storeproposal', 'store')->name('store.proposal');
            Route::post('/updateproposal/{id}', 'update')->name('update.proposal');
            Route::post('/deleteproposal/{id}', 'destroy')->name('destroy.proposal');
        });
        //For HOSD
        Route::group(['middleware' => ['auth', 'user:headofdevelopment']], function () {
            Route::get('/ProposalHOSDpage', 'activityProposed')->name('ProposalHOSD.page');
            Route::get('/HOSDapproveProposal/{id}', 'HOSDapproveProposal')->name('ProposalHOSD.approve');
            Route::get('/HOSDdeclineProposal/{id}', 'HOSDrejectProposal')->name('ProposalHOSD.reject');
        });
        //For Coordinator
        Route::group(['middleware' => ['auth', 'user:coordinator']], function () {
            Route::get('/ProposalCoordinatorpage', 'activityProposed')->name('ProposalCoordinator.page');
            Route::get('/CoordinatorapproveProposal/{id}', 'CoordinatorapproveProposal')->name('ProposalCoordinator.approve');
            Route::get('/CoordinatordeclineProposal/{id}', 'CoordinatorrejectProposal')->name('ProposalCoordinator.reject');
        });
        //For Dean
        Route::group(['middleware' => ['auth', 'user:dean']], function () {
            Route::get('/ProposalDeanpage', 'activityProposed')->name('ProposalDean.page');
            Route::get('/DeanconfirmProposal/{id}', 'DeanconfirmProposal')->name('ProposalDean.confirm');
            Route::get('/DeandenyProposal/{id}', 'DeandenyProposal')->name('ProposalDean.deny');
        });
});


Route::controller(ActivityController::class)->group(function(){ 
    Route::get('/activity', 'index')->name('activity.page');
    Route::get('/showactivity', 'show')->name('activity.show');
    Route::get('/showactivity_login', 'showActivity')->name('activity.login');
    Route::get('/createactivity', 'createActivity')->name('activity.create');
    Route::get('/editactivity', 'editActivity')->name('activity.edit');
});

Route::controller(UserController::class)->group(function(){ 
    Route::get('/myProfile', 'index')->name('myProfile.page');
    Route::get('/userList', 'userList')->name('userList.page');
    Route::get('/registerUser', 'registerUser')->name('registerUser');
    Route::post('/addUser', 'addUser')->name('addUser');
    Route::delete('/deleteUser/{id}', 'deleteUser')->name('deleteUser');
});

Route::controller(App\Http\Controllers\ElectionController::class)->group(function(){
    Route::get('/studList', 'vote')->name('election.student.studList');
    Route::get('/register', 'register')->name('election.student.register');
    Route::get('/registration', 'registration')->name('election.student.registration');
    Route::get('/updateReg', 'updateReg')->name('election.student.updateReg');
    Route::get('/comList', 'comList')->name('election.committee.comList');
    Route::get('/comInfo', 'comInfo')->name('election.committee.comInfo');
    Route::get('/hosdList', 'hosdList')->name('election.hosd.hosdList');
    Route::get('/hosdInfo', 'hosdInfo')->name('election.hosd.hosdInfo');

    Route::post('/store', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::get('/update', 'update')->name('update');
    Route::get('/approval/{id}', 'approval')->name('approval');
});

//----------------------------- REPORT MODULE ----------------------------//
Route::controller(ReportController::class)->group(function () {
    
    //Group of view for role student and lecturer, committee
    Route::group(['middleware' => ['auth', 'user:student,lecturer, committee']], function () {
        Route::get('/showreport_view', 'showReport')->name('report.view');
        Route::get('/createreport', 'createReport')->name('report.create');
        Route::get('/edireport/{id}', 'editReport')->name('report.edit');
        Route::post('storereport', 'store')->name('store.report');
        Route::post('/updatereport/{id}', 'update')->name('update.report');
        Route::post('/deletereport/{id}', 'destroy')->name('destroy.report');
    });
    //Group of view for role head of development
    Route::group(['middleware' => ['auth', 'user:headofdevelopment']], function () {
        Route::get('/HOSDpage', 'ReportProposedHOSD')->name('HOSD.page');
        Route::get('/approveHOSDReport/{id}', 'approveReportHOSD')->name('ReportHOSD.approve');
        Route::get('/rejectHOSDReport/{id}', 'rejectReportHOSD')->name('ReportHOSD.reject');     
    });
    
    //Group of view for role coordinator
    Route::group(['middleware' => ['auth', 'user:coordinator']], function () {
        Route::get('/Coordinatorpage', 'ReportProposedCoordinator')->name('Coordinator.page');
        Route::get('/approveCoordinatorReport/{id}', 'approveReportCoordinator')->name('ReportCoordinator.approve');
        Route::get('/rejectCoordinatorReport/{id}', 'rejectReportCoordinator')->name('ReportCoordinator.reject');     
    });

    //Group of view for role dean
    Route::group(['middleware' => ['auth', 'user:dean']], function () {
        Route::get('/Deanpage', 'ReportProposedDean')->name('Dean.page');
        Route::get('/confirmDeanReport/{id}', 'confirmReportDean')->name('ReportDean.confirm');
        Route::get('/denyDeanReport/{id}', 'denyReportDean')->name('ReportDean.deny');     
    });
});






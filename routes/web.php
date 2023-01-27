<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ElectionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BulletinController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CalenderController;
use App\Http\Controllers\HomeController;
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


Route::controller(CalenderController::class)->group(function(){
    Route::get('/calendar-event', 'index');
    Route::post('/calendar-crud-ajax', 'ajax');
});

Route::get('/', [HomeController::class, 'homepage']);

// Route::get('showreport', [ReportController::class, 'showReport']);

Auth::routes();

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index']);

// Route::middleware(['auth','user:Student,Lecturer, Committee, HOSD, Dean, Coordinator'])->group(function(){
//     Route::controller(CalenderController::class)->group(function(){
//         Route::get('calendar-event', 'index');
//         Route::post('calendar-crud-ajax', 'ajax');
//     });
// });




//----------------------------- ACTIVITY MODULE ----------------------------//
Route::controller(ActivityController::class)->group(function () {
    //Group of view for role student and lecturer
    Route::group(['middleware' => ['auth', 'user:Student, Lecturer, Committee']], function () { //lecturer
        Route::get('/showactivity_login', 'showActivity')->name('activity.login');
        Route::get('/createactivity', 'createActivity')->name('activity.create');
        Route::get('/editactivity/{id}', 'editActivity')->name('activity.edit');
        Route::get('/proposeactivity/{id}', 'proposeActivity')->name('propose.activity');
        Route::post('storeactivity', 'store')->name('store.activity');
        Route::post('/updateactivity/{id}', 'update')->name('update.activity');
        Route::post('/deleteactivity/{id}', 'destroy')->name('destroy.activity');
        
    });

    // Coordinator
    Route::group(['middleware' => ['auth', 'user:Coordinator']], function () {
        Route::get('/coorpage', 'activityProposed')->name('coor.page');
        Route::get('/coorApproval/{id}', 'coorApproval')->name('coor.approve');
        Route::get('/coorReject/{id}', 'coorReject')->name('coor.reject');
    });

    // HOSD
    Route::group(['middleware' => ['auth', 'user:HOSD']], function () {
        Route::get('/hosdpage', 'activityProposed')->name('hosd.page');
        Route::get('/hosdApproval/{id}', 'hosdApproval')->name('hosd.approve');
        Route::get('/hosdReject/{id}', 'hosdReject')->name('hosd.reject');
    });

    // Dean
    Route::group(['middleware' => ['auth', 'user:Dean']], function () {
        Route::get('/deanpage', 'activityProposed')->name('dean.page');
        Route::get('/deanApproval/{id}', 'deanApproval')->name('dean.approve');
        Route::get('/deanReject/{id}', 'deanReject')->name('dean.reject');
    });
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
    Route::prefix('committee')->middleware(['auth', 'user:Committee'])->group(function () {
        //get page bulletin for petakom committee
        Route::get('/bulletin', 'indexPetakom')->name('committee.indexpetakom');

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
// Route::controller(ProposalController::class)->group(function () {
//     //For student
//     Route::group(['middleware' => ['auth', 'user:Student, Lecturer, Committee']], function () {
//         Route::get('/showproposal_view', 'showProposal')->name('proposal.view');
//         Route::get('/createproposal', 'createProposal')->name('proposal.create');
//         Route::get('/editproposal/{id}', 'editProposal')->name('proposal.edit');
//         Route::post('/storeproposal', 'store')->name('store.proposal');
//         Route::post('/updateproposal/{id}', 'update')->name('update.proposal');
//         Route::post('/deleteproposal/{id}', 'destroy')->name('destroy.proposal');
//         Route::get('/showproposal/{id}', 'show')->name('proposal.show');
//         Route::get('/proposaldelete/{id}', 'showDelete')->name('proposal.delete');
//     });
//     //For HOSD
//      Route::group(['middleware' => ['auth', 'user:HOSD']], function () {
//         Route::get('/ProposalHOSDpage', 'ProposalProposedHOSD')->name('ProposalHOSD.page');
//         Route::get('/approveHOSDProposal/{id}', 'approveProposalHOSD')->name('ProposalHOSD.approve');
//         Route::get('/rejectHOSDProposal/{id}', 'rejectProposalHOSD')->name('ProposalHOSD.reject');
//     });
//     //For Coordinator
//     Route::group(['middleware' => ['auth', 'user:Coordinator']], function () {
//         Route::get('/ProposalCoordinatorpage', 'ProposalProposedCoordinator')->name('ProposalCoordinator.page');
//         Route::get('/approveCoordinatorReport/{id}', 'rejectProposalCoordinator')->name('ProposalCoordinator.approve');
//         Route::get('/rejectCoordinatorReport/{id}', 'rejectProposalCoordinator')->name('ProposalCoordinator.reject');
//     });
//     //For Dean
//     Route::group(['middleware' => ['auth', 'user:Dean']], function () {
//         Route::get('/ProposalDeanpage', 'ProposalProposedDean')->name('ProposalDean.page');
//         Route::get('/confirmDeanReport/{id}', 'confirmPropsoalDean')->name('ProposalDean.confirm');
//         Route::get('/denyDeanProposal/{id}', 'denyProposalDean')->name('ProposalDean.deny');
//     });
// });


Route::controller(UserController::class)->group(function(){ 
    Route::get('/myProfile', 'index')->name('myProfile.page');
    Route::get('/userList', 'userList')->name('userList.page');
    Route::get('/registerUser', 'registerUser')->name('registerUser');
    Route::post('/addUser', 'addUser')->name('addUser');
    Route::delete('/deleteUser/{id}', 'deleteUser')->name('deleteUser');
    Route::get('/editUser/{id}', 'editUser')->name('editUser');
    Route::post('/updateUser/{id}', 'updateUser')->name('updateUser');
    Route::post('/updateAvatar', 'updateAvatar')->name('updateAvatar');
    Route::post('/updateProfile/{id}', 'updateProfile')->name('updateProfile');
    Route::post('/updatePassword', 'updatePassword')->name('updatePassword');
});


Route::controller(ElectionController::class)->group(function(){
    Route::get('/studList', 'vote')->name('election.studList');
    Route::get('/register', 'register')->name('election.register');
    Route::get('/registration', 'registration')->name('election.registration');
    Route::get('/updateReg/{id}', 'updateReg')->name('election.updateReg');
    Route::get('/comList', 'comList')->name('election.comList');
    Route::get('/comInfo', 'comInfo')->name('election.comInfo');
    Route::get('/coorList', 'coorList')->name('election.coorList');
    Route::get('/coorInfo/{id}', 'coorList')->name('election.coorInfo');
    Route::get('/hosdList', 'hosdList')->name('election.hosdList');
    Route::get('/hosdInfo', 'hosdInfo')->name('election.hosdInfo');

    Route::post('/store', 'store')->name('store');
    Route::get('/show', 'show')->name('show');
    Route::post('/update/{id}', 'update')->name('update');
    Route::get('/approval/{id}', 'approval')->name('approval');
    Route::get('/reject/{id}', 'reject')->name('reject');
});

// Route::get('/get', function(){
//     return view('election.register');
// });

//----------------------------- REPORT MODULE ----------------------------//
Route::controller(ReportController::class)->group(function () {
    //For Student
    Route::middleware(['auth', 'user:Student, Lecturer, Committee'])->group(function () {
        Route::get('/showreport_view', [ReportController::class, 'showReport'])->name('report.view');
        Route::get('/createreport', [ReportController::class, 'createReport'])->name('report.create');
        Route::get('/editreport/{id}', [ReportController::class, 'editReport'])->name('report.edit');
        Route::post('/storereport', [ReportController::class, 'store'])->name('store.report');
        Route::post('/updatereport/{id}', [ReportController::class, 'update'])->name('update.report');
        Route::post('/deletereport/{id}', [ReportController::class, 'destroy'])->name('destroy.report');
        Route::get('/reportdelete/{id}', [ReportController::class, 'showDelete'])->name('report.delete');
        Route::get('/reportdetail/{id}', 'show')->name('report.show');
        Route::get('/proposereport/{id}', 'proposeReport')->name('propose.report');
    });

    //Group of view for role head of development
    Route::group(['middleware' => ['auth', 'user:HOSD']], function () {
        Route::get('/ReportHOSDpage', 'ReportProposedHOSD')->name('ReportHOSD.page');
        Route::get('/approveHOSDReport/{id}', 'approveReportHOSD')->name('ReportHOSD.approve');
        Route::get('/rejectHOSDReport/{id}', 'rejectReportHOSD')->name('ReportHOSD.reject');     
    });
    
    //Group of view for role coordinator
    Route::group(['middleware' => ['auth', 'user:Coordinator']], function () {
        Route::get('/ReportCoordinatorpage', 'ReportProposedCoordinator')->name('ReportCoordinator.page');
        Route::get('/approveCoordinatorReport/{id}', 'approveReportCoordinator')->name('ReportCoordinator.approve');
        Route::get('/rejectCoordinatorReport/{id}', 'rejectReportCoordinator')->name('ReportCoordinator.reject');     
    });

    //Group of view for role dean
    Route::group(['middleware' => ['auth', 'user:Dean']], function () {
        Route::get('/ReportDeanpage', 'ReportProposedDean')->name('ReportDean.page');
        Route::get('/confirmDeanReport/{id}', 'confirmReportDean')->name('ReportDean.confirm');
        Route::get('/denyDeanReport/{id}', 'denyReportDean')->name('ReportDean.deny');     
    });
});






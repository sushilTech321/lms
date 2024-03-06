<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AvailableleaveController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpemailpassController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\EmpdashController;
use App\Http\Controllers\LeavereqController;
use App\Http\Controllers\LeaveHistoryController;
use App\Http\Controllers\AdminApproveController;
use App\Http\Controllers\ManageLeave\TakeActionController;
use App\Http\Controllers\ManageLeave\ApprovedContoller;
use App\Http\Controllers\ManageLeave\ApproveViewController;
use App\Http\Controllers\ManageLeave\RejectedLeaveController;
use App\Http\Controllers\ManageLeave\RejectViewController;
use App\Http\Controllers\AdminLeaveHistoryController;
use App\Http\Controllers\AdminViewHistoryController;
use App\Http\Controllers\EmployeeEditController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\LeaveTypeEditController;
use App\Http\Controllers\ChangePassword\EmpChangePasswdController;
use App\Http\Controllers\AdminPasswordChangeController;




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

// authentication route i.e. login
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth','admin']], function () {
    // Routes that require authentication
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    // register employee
    Route::get('/regemp', function () {
        return view('admin.register_emp');
    });
    // add leave
    Route::get('/addleave', function () {
        return view('admin.addleave');
    });
    
    // leave type 
    Route::get('leavetype',[LeaveController::class,'leavetype']);
    Route:: post('leavestore',[LeaveController::class,'leavestore']);

    // leave type delete section
    Route::delete('leavetypedel/{leave_id}',[LeaveTypeController::class,'leaveDel']);
    Route::get('leavetype_edit/{leave_id}',[LeaveTypeEditController::class,'leavetypeEdit']);    //leave type edit section
    Route::put('leavetype_edits/{leave_id}',[LeaveTypeEditController::class,'editUpdate']);     //leave type update section
    
    // employee section
    Route::get('register',[UserController::class,'index']);
    Route::post('store',[UserController::class,'store']);
    Route::delete('register/{id}',[UserController::class,'delete']);

    // employee edit section
    Route::get('emp_edit/{id}',[EmployeeEditController::class,'empGet']);
    Route::put('emp_edits/{id}',[EmployeeEditController::class,'empEdits']);
    
    // dashboard section 
    Route::get('/dashboard',[DashboardController::class,'countData']);  // count section

    //emp email and passwd
    Route::get('/empemail',[EmpemailpassController::class,'empemail']);
    Route::post('/empemailpass',[EmpemailpassController::class,'empemailpass']);

    // admin approval pending section
    Route::get('/admin_approve',[AdminApproveController::class,'approve']);
    Route::delete('/admin_approve/{id}',[AdminApproveController::class,'delReqst']);

    // approve or reject (take action route)
    Route::get('/takeaction/{id}',[TakeActionController::class,'takeAction']);
    Route::put('/takeactions/{id}',[TakeActionController::class,'statusUpdate']);

    // approved leave (sidebar section)
    Route::get('/approved_leave',[ApprovedContoller::class,'approvedLeave']);
    Route::delete('/approved_leave/{id}',[ApprovedContoller::class,'apvleaveDelete']);
    Route::get('/approve_view/{id}',[ApproveViewController::class,'view']);  // view section -> approved_leave
    
    // Decline section ->manage leave
    Route::get('/rejected_leave',[RejectedLeaveController::class,'reject']);
    Route::delete('/rejected_leave/{id}',[RejectedLeaveController::class,'declineDelete']);   //delete section->decline leave
    Route::get('/reject_view/{id}',[RejectViewController::class,'rejectView']);  // view section -> decline_leave
    
    // Leave history
    Route::get('/Adminleave_history',[AdminLeaveHistoryController::class,'history']);
    Route::delete('/Adminleave_history/{id}',[AdminLeaveHistoryController::class,'historyDelete']);
    Route::get('/view_history/{id}',[AdminViewHistoryController::class,'viewHistory']); //view section -> Leave history

    // admin password change 
    Route::get('admin_password',[AdminPasswordChangeController::class,'adminPasswd']);
    Route::put('/admin_update_passwords',[AdminPasswordChangeController::class,'adminChangePasswd']);
    
});

    // employe dashboard leave types and balance 
        Route::get('/home',[EmpdashController::class,'empdash']);

    //leave req form route
        Route::get('/leaveform',[LeavereqController::class,'reqshow']);
        Route:: post('/reqinsert',[LeavereqController::class,'reqData']);

    // leave history route
        Route::get('/leave_history',[LeaveHistoryController::class,'index']);

    // emp change password
        Route::get('/change_passwords',[EmpChangePasswdController::class,'changePasswd']);
        Route::put('/update_passwords',[EmpChangePasswdController::class,'updatePasswd']);

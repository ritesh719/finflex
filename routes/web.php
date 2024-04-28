<?php

use App\Http\Controllers\ExportClientDataController;
use App\Http\Livewire\Admin\AdminAddFundsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminManageBranch;
use App\Http\Livewire\Admin\AdminManageBranchManagerComponent;
use App\Http\Livewire\Admin\AdminManageCenter;
use App\Http\Livewire\Admin\AdminManageCenterManagerComponent;
use App\Http\Livewire\BranchManager\BranchManagerDailyCashPositionReportComponent;
use App\Http\Livewire\BranchManager\BranchManagerDashboardComponent;
use App\Http\Livewire\BranchManager\BranchManagerDatewiseCashPositionReportComponent;
use App\Http\Livewire\BranchManager\BranchManagerExpenseComponent;
use App\Http\Livewire\BranchManager\BranchManagerExpenseReportComponent;
use App\Http\Livewire\BranchManager\BranchManagerListAllClientsComponent;
use App\Http\Livewire\BranchManager\BranchManagerLoanActivityReport;
use App\Http\Livewire\BranchManager\BranchManagerMonthlyBalanceSheetComponent;
use App\Http\Livewire\BranchManager\BranchManagerOutstandingComponent;
use App\Http\Livewire\BranchManager\CDSReportComponent;
use App\Http\Livewire\CenterManager\CenterManagerAddClientComponent;
use App\Http\Livewire\CenterManager\CenterManagerClosingComponent;
use App\Http\Livewire\CenterManager\CenterManagerDashboardComponent;
use App\Http\Livewire\CenterManager\CenterManagerDatewiseCollectionComponent;
use App\Http\Livewire\CenterManager\CenterManagerExportClientInfoComponent;
use App\Http\Livewire\CenterManager\CenterManagerListAllCientsComponent;
use App\Http\Livewire\CenterManager\CenterManagerListAllFdComponent;
use App\Http\Livewire\CenterManager\CenterManagerListAllLoansComponent;
use App\Http\Livewire\CenterManager\CenterManagerNewFdComponent;
use App\Http\Livewire\CenterManager\CenterManagerNewLoanComponent;
use App\Http\Livewire\CenterManager\CenterManagerOutstandingsComponent;
use App\Http\Livewire\CenterManager\CenterManagerViewClientInfoComponent;
use App\Http\Livewire\CenterManager\CenterManagerViewLoanDetailsComponent;
use App\Http\Livewire\CenterManager\CenterManagerViewTodayCollectionComponent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    // return what you want
});
Route::get('/clear-config', function() {
    $exitCode = Artisan::call('config:clear');
    // return what you want
});
Route::get('/', function () {
    return redirect('login');
});

Route::get('/create-account', function () {
    User::create([
        'name' => 'CenterManager',
        'email' => 'cm@finflex.co.in',
        'password' => bcrypt('cmfinflex@2003'),
        'role' => 'CM'
    ]);
})->name('createaccount');


Route::group(['middleware' => ['auth:sanctum', 'verified', 'accessrole']], function () {

    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/center-manager', AdminManageCenterManagerComponent::class)->name('admin.manageCenterManager');
    Route::get('/admin/branch-manager', AdminManageBranchManagerComponent::class)->name('admin.manageBranchManager');
    Route::get('/admin/center', AdminManageCenter::class)->name('admin.manageCenter');
    Route::get('/admin/branch', AdminManageBranch::class)->name('admin.manageBranch');
    Route::get('/admin/add-funds', AdminAddFundsComponent::class)->name('admin.addfunds');

    Route::get('center-manager/dashboard', CenterManagerDashboardComponent::class)->name('centermanager.dashboard');
    Route::get('center-manager/add-client', CenterManagerAddClientComponent::class)->name('centermanager.addclient');
    Route::get('center-manager/list-client', CenterManagerListAllCientsComponent::class)->name('centermanager.listclient');
    Route::get('center-manager/view-client/{id}', CenterManagerViewClientInfoComponent::class)->name('centermanager.viewclient');
    Route::get('center-manager/export-client-data/{id}', [ExportClientDataController::class, 'index'])->name('centermanager.exportclientdata');
    Route::get('center-manager/new-loan', CenterManagerNewLoanComponent::class)->name('centermanager.newloan');
    Route::get('center-manager/new-fd', CenterManagerNewFdComponent::class)->name('centermanager.newfd');
    Route::get('center-manager/list-loans', CenterManagerListAllLoansComponent::class)->name('centermanager.listloans');
    Route::get('center-manager/list-fds', CenterManagerListAllFdComponent::class)->name('centermanager.listfds');
    Route::get('center-manager/loan/{id}', CenterManagerViewLoanDetailsComponent::class)->name('centermanager.loandetails');
    Route::get('center-manager/collection/today', CenterManagerViewTodayCollectionComponent::class)->name('centermanager.todaycollection');
    Route::get('center-manager/collection/by-date', CenterManagerDatewiseCollectionComponent::class)->name('centermanager.datewisecollection');
    Route::get('center-manager/closing', CenterManagerClosingComponent::class)->name('centermanager.closing');
    Route::get('center-manager/outstandings', CenterManagerOutstandingsComponent::class)->name('centermanager.oustandings');

    Route::get('branch-manager/dashboard', BranchManagerDashboardComponent::class)->name('branchmanager.dashboard');
    Route::get('branch-manager/list-clients', BranchManagerListAllClientsComponent::class)->name('branchmanager.listclients');
    Route::get('branch-manager/daily-cash-position-report', BranchManagerDailyCashPositionReportComponent::class)->name('branchmanager.dailycashpositionreport');
    Route::get('branch-manager/datewise-cash-position-report', BranchManagerDatewiseCashPositionReportComponent::class)->name('branchmanager.datewisecashpositionreport');
    Route::get('branch-manager/monthly-balance-sheet', BranchManagerMonthlyBalanceSheetComponent::class)->name('branchmanager.monthlybalancesheet');
    Route::get('branch-manager/outstanding', BranchManagerOutstandingComponent::class)->name('branchmanager.outstanding');
    Route::get('branch-manager/expense', BranchManagerExpenseComponent::class)->name('branchmanager.expense');
    Route::get('branch-manager/loan-activity-report', BranchManagerLoanActivityReport::class)->name('branchmanager.loanactivityreport');
    Route::get('branch-manager/expense-report', BranchManagerExpenseReportComponent::class)->name('branchmanager.expensereport');
    Route::get('branch-manager/cds-report', CDSReportComponent::class)->name('branchmanager.cdsreport');
    Route::get('branch-manager/cds-pdf', [ExportClientDataController::class, 'cdsPdf'])->name('branchmanager.cdspdf');

    Route::get('/dashboard', function () {
        if (Auth::user()->role == 'ADM') {
            return redirect(route('admin.dashboard'));
        } elseif (Auth::user()->role == 'CM') {
            return redirect(route('centermanager.dashboard'));
        } elseif (Auth::user()->role == 'BM') {
            return redirect(route('branchmanager.dashboard'));
        }
    })->name('dashboard');
});

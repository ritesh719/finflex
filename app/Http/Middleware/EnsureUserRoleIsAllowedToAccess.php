<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

class EnsureUserRoleIsAllowedToAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $userRole = auth()->user()->role;
            $currentRouteName = Route::currentRouteName();

            if (in_array($currentRouteName, $this->userAccessRole()[$userRole])) {
                return $next($request);
            } else {
                abort(403, 'Unauthorized Access');
            }
        } catch (\Throwable $th) {
            abort(403, 'Unauthorized Access');
        }
    }

    /**
     * @return void
     */

    private function userAccessRole()
    {
        return [
            'ADM' => [
                'dashboard',
                'admin.dashboard',
                'admin.manageCenterManager',
                'admin.manageBranchManager',
                'admin.manageCenter',
                'admin.manageBranch',
                'admin.addfunds',
            ],
            'BM' => [
                'dashboard',
                'centermanager.viewclient',
                'branchmanager.dashboard',
                'branchmanager.listclients',
                'branchmanager.dailycashpositionreport',
                'branchmanager.datewisecashpositionreport',
                'branchmanager.monthlybalancesheet',
                'branchmanager.outstanding',
                'branchmanager.loanactivityreport',
                'branchmanager.expense',
                'branchmanager.expensereport',
                'branchmanager.cdsreport',
                'branchmanager.cdspdf'
            ],
            'CM' => [
                'dashboard',
                'centermanager.dashboard',
                'centermanager.addclient',
                'centermanager.listclient',
                'centermanager.viewclient',
                'centermanager.exportclientdata',
                'centermanager.newloan',
                'centermanager.newfd',
                'centermanager.listloans',
                'centermanager.listfds',
                'centermanager.loandetails',
                'centermanager.todaycollection',
                'centermanager.datewisecollection',
                'centermanager.closing',
                'centermanager.oustandings',
            ]
        ];
    }
}

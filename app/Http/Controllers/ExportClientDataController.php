<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use App\Models\CenterManagers;
use App\Models\Centers;
use App\Models\Client;
use PDF;
use Illuminate\Http\Request;

class ExportClientDataController extends Controller
{
    public function index($id)
    {
        $client = Client::find($id);
        $c_m = CenterManagers::find($client->center_manager_id);
        $center = Centers::find($c_m->centers_id);
        $branch = Branches::find($center->branch_id);


        $pdf = PDF::loadView('clientDetailsPdf', ['client' => $client, 'center' => $center, 'branch' => $branch])->setPaper('a4', 'potrait');

        return $pdf->download($client->name . '.pdf');

        // return view('clientDetailsPdf', ['client' => $client, 'center' => $center, 'branch' => $branch]);
    }

    public function cdsPdf()
    {
        $pdf = PDF::loadview('livewire.branch-manager.c-d-s-report-component')->setPaper('a4', 'landscape');

        return $pdf->download('cds.pdf');
    }
}

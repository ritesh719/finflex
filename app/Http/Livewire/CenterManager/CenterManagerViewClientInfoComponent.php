<?php

namespace App\Http\Livewire\CenterManager;

use App\Models\Branches;
use App\Models\CenterManagers;
use App\Models\Centers;
use App\Models\Client;
use App\Models\User;
use Livewire\Component;

class CenterManagerViewClientInfoComponent extends Component
{
    public $client_id;

    public function mount($id)
    {
        $this->client_id = $id;
    }

    public function render()
    {
        $client = Client::find($this->client_id);
        $center = Centers::find($client->center_id);
        $branch = Branches::find($center->branch_id);
        return view('livewire.center-manager.center-manager-view-client-info-component', ['client' => $client, 'center' => $center, 'branch' => $branch])->layout('layouts.cm.base');
    }
}

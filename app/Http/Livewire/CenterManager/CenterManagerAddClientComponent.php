<?php

namespace App\Http\Livewire\CenterManager;

use App\Models\CenterManagers;
use App\Models\Client;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;

class CenterManagerAddClientComponent extends Component
{

    use WithFileUploads;

    public $name;
    public $photo_scan;
    public $adhaar_scan;
    public $pan_scan;
    public $adhaar_number;
    public $dob; //age
    public $gender;
    public $marital_status;
    public $pan_number;
    public $fathers_name;
    public $mothers_name;
    public $husband_name;
    public $c_address;
    public $c_city;
    public $c_pincode;
    public $c_residence_type;
    public $mobile;
    public $contact;
    public $annual_income;
    public $occupation;

    public $husbands_age;
    public $husbands_father_name;
    public $born_village;
    public $category;
    public $clients_education;
    public $husbands_education;
    public $husbands_occupation;
    public $born_district;
    public $brothers_name;
    public $no_of_cows;
    public $no_of_buffaloes;
    public $no_of_goats;
    public $no_of_others;
    public $area_of_land;

    public $f1_name;
    public $f1_marital_status;
    public $f1_occupation;
    public $f1_age;
    public $f1_education;

    public $f2_name;
    public $f2_marital_status;
    public $f2_occupation;
    public $f2_age;
    public $f2_education;

    public $f3_name;
    public $f3_marital_status;
    public $f3_occupation;
    public $f3_age;
    public $f3_education;

    public $f4_name;
    public $f4_marital_status;
    public $f4_occupation;
    public $f4_age;
    public $f4_education;

    public $f5_name;
    public $f5_marital_status;
    public $f5_occupation;
    public $f5_age;
    public $f5_education;

    public $f6_name;
    public $f6_marital_status;
    public $f6_occupation;
    public $f6_age;
    public $f6_education;

public function gen_next_id()
{
    $prev_ids = Client::select('id')->get();
        $id_arr = [];
        $i = 0;
        foreach($prev_ids as $pv)
        {
            $sub_id = substr($pv->id, 3);
            $id_arr[$i++] = $sub_id;
        }
        
        $c_m = User::find(Auth::user()->id);

        $center = $c_m->centerManager->centers;
        $branch_id = $c_m->centerManager->centers->branch->id;

        $prefix = $branch_id . $center->center_id;
        if(count($id_arr)){
            $max_id = $prefix.'000'.max($id_arr)+1;
        }else{
            $max_id = $prefix.'00001';
        }
        
        return (int)$max_id;
}


    public function addNewClient()
    {
        $c_m = User::find(Auth::user()->id);

        $center = $c_m->centerManager->centers;
        $branch_id = $c_m->centerManager->centers->branch->id;

        $id = $this->gen_next_id();

        $client = new Client();

        $client->id = $id;
        $client->center_id = $center->id;
        $client->name = $this->name;

        if ($this->photo_scan) {
            $imageName = Carbon::now()->timestamp . 'photo.' . $this->photo_scan->extension();
            $p = $this->photo_scan->storeAs('clients', $imageName);
            $client->photo_scan = $imageName;
        }

        if ($this->adhaar_scan) {
            $imageName = Carbon::now()->timestamp . 'adhaar.' . $this->adhaar_scan->extension();
            $this->adhaar_scan->storeAs('clients', $imageName);
            $client->adhaar_scan = $imageName;
        }

        if ($this->pan_scan) {
            $imageName = Carbon::now()->timestamp . 'pan.' . $this->pan_scan->extension();
            $this->pan_scan->storeAs('clients', $imageName);
            $client->pan_scan = $imageName;
        }

        if ($this->adhaar_number) {
            $client->adhaar_number = $this->adhaar_number;
        }
        $client->dob = $this->dob;
        $client->gender = 'female';
        $client->marital_status = $this->marital_status;
        if ($this->pan_number) {
            $client->pan_number = $this->pan_number;
        }
        $client->fathers_name = $this->fathers_name;
        $client->mothers_name = $this->mothers_name;
        if ($this->husband_name) {
            $client->husband_name = $this->husband_name;
        }
        $client->c_address = $this->c_address;
        $client->c_city = $this->c_city;
        $client->c_pincode = $this->c_pincode;
        $client->c_residence_type = $this->c_residence_type;


        $client->mobile = $this->mobile;
        if ($this->contact) {
            $client->contact = $this->contact;
        }
        if ($this->annual_income) {
            $client->annual_income = $this->annual_income;
        }
        $client->occupation = $this->occupation;
        $client->husbands_occupation = $this->husbands_occupation;

        if ($this->husbands_age) {
            $client->husbands_age = $this->husbands_age;
        }
        if ($this->husbands_father_name) {
            $client->husbands_father_name = $this->husbands_father_name;
        }
        if ($this->born_village) {
            $client->born_village = $this->born_village;
        }
        if ($this->category) {
            $client->category = $this->category;
        }
        if ($this->clients_education) {
            $client->clients_education = $this->clients_education;
        }
        if ($this->husbands_education) {
            $client->husbands_education = $this->husbands_education;
        }
        if ($this->born_district) {
            $client->born_district = $this->born_district;
        }
        if ($this->brothers_name) {
            $client->brothers_name = $this->brothers_name;
        }
        if ($this->no_of_cows) {
            $client->no_of_cows = $this->no_of_cows;
        }
        if ($this->no_of_buffaloes) {
            $client->no_of_buffaloes = $this->no_of_buffaloes;
        }
        if ($this->no_of_goats) {
            $client->no_of_goats = $this->no_of_goats;
        }
        if ($this->no_of_others) {
            $client->no_of_others = $this->no_of_others;
        }
        if ($this->area_of_land) {
            $client->area_of_land = $this->area_of_land;
        }

        if ($this->f1_name) {
            $client->f1_name = $this->f1_name;
        }
        if ($this->f1_marital_status) {
            $client->f1_marital_status = $this->f1_marital_status;
        }
        if ($this->f1_age) {
            $client->f1_age = $this->f1_age;
        }
        if ($this->f1_education) {
            $client->f1_education = $this->f1_education;
        }
        if ($this->f1_occupation) {
            $client->f1_occupation = $this->f1_occupation;
        }

        if ($this->f2_name) {
            $client->f2_name = $this->f2_name;
        }
        if ($this->f2_marital_status) {
            $client->f2_marital_status = $this->f2_marital_status;
        }
        if ($this->f2_age) {
            $client->f2_age = $this->f2_age;
        }
        if ($this->f2_education) {
            $client->f2_education = $this->f2_education;
        }
        if ($this->f2_occupation) {
            $client->f2_occupation = $this->f2_occupation;
        }

        if ($this->f3_name) {
            $client->f3_name = $this->f3_name;
        }
        if ($this->f3_marital_status) {
            $client->f3_marital_status = $this->f3_marital_status;
        }
        if ($this->f3_age) {
            $client->f3_age = $this->f3_age;
        }
        if ($this->f3_education) {
            $client->f3_education = $this->f3_education;
        }
        if ($this->f3_occupation) {
            $client->f3_occupation = $this->f3_occupation;
        }

        if ($this->f4_name) {
            $client->f4_name = $this->f4_name;
        }
        if ($this->f4_marital_status) {
            $client->f4_marital_status = $this->f4_marital_status;
        }
        if ($this->f4_age) {
            $client->f4_age = $this->f4_age;
        }
        if ($this->f4_education) {
            $client->f4_education = $this->f4_education;
        }
        if ($this->f4_occupation) {
            $client->f4_occupation = $this->f4_occupation;
        }

        if ($this->f5_name) {
            $client->f5_name = $this->f5_name;
        }
        if ($this->f5_marital_status) {
            $client->f5_marital_status = $this->f5_marital_status;
        }
        if ($this->f5_age) {
            $client->f5_age = $this->f5_age;
        }
        if ($this->f5_education) {
            $client->f5_education = $this->f5_education;
        }
        if ($this->f5_occupation) {
            $client->f5_occupation = $this->f5_occupation;
        }

        if ($this->f6_name) {
            $client->f6_name = $this->f6_name;
        }
        if ($this->f6_marital_status) {
            $client->f6_marital_status = $this->f6_marital_status;
        }
        if ($this->f6_age) {
            $client->f6_age = $this->f6_age;
        }
        if ($this->f6_education) {
            $client->f6_education = $this->f6_education;
        }
        if ($this->f6_occupation) {
            $client->f6_occupation = $this->f6_occupation;
        }

        $client->save();

        session()->flash('client_add_successfully', 'Client Added Successfully');

        return redirect(route('centermanager.addclient'));
    }

    public function render()
    {
        return view('livewire.center-manager.center-manager-add-client-component')->layout('layouts.cm.base');
    }
}

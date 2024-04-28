<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">{{ $client->name }}</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/center-manager/dashboard">Dashboard</a></li>
        </ol>
    </div>

    <div class="row row-cards row-deck">
        <div class="col-lg-12 col-xl-12 col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <b>Client Details</b>
                    <a onclick="printDiv('printableArea')" class="btn btn-dark btn-sm text-light">Print</a>
                </div>
                <div class="card-body" id="printableArea">
                    <style>
                        td {
                            /* padding: 3px 5px !important;
                            font-size: 1em; */
                        }

                    </style>
                    <table class="table table-bordered">
                        <tr>
                            <td colspan="8" class="text-bold text-center">
                                <h3> <b>Finflex Micro Finance Corporation</b></h3>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Date: </b>
                            </td>
                            <td colspan="2">
                                {{ $client->created_at }}
                            </td>
                            <td colspan="2">
                                <b>Mobile: </b>
                            </td>
                            <td colspan="2">
                                {{ $client->mobile }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Branch:</b>
                            </td>
                            <td colspan="2">
                                {{ $branch->name }}
                            </td>
                            <td colspan="2">
                                <b>Center</b>
                            </td>
                            <td colspan="2">
                                {{ $center->name }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8" class="bg-dark text-light">
                                <b>Personal details: </b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Name: </b>
                            </td>
                            <td colspan="3">
                                {{ $client->name }}
                            </td>
                            
                            <td>
                                <b>Age: </b>
                            </td>
                            <td>
                                {{ $client->dob }}
                            </td>
                            <td colspan="2" rowspan="2" class="text-center">
                                <img src="{{ asset('assets/images/clients') }}/{{ $client->photo_scan }}"
                                    style="height: 100px; width: 100px;" alt="">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Marital Status: </b>
                            </td>
                            <td colspan="4">
                                {{ $client->marital_status }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Husband name: </b>
                            </td>
                            <td>
                                {{ $client->husband_name }}
                            </td>
                            <td>
                                <b>Age: </b>
                            </td>
                            <td>
                                {{ $client->husbands_age }}
                            </td>
                            <td>
                                <b>S/O</b>
                            </td>
                            <td colspan="2">
                                {{ $client->husbands_father_name }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Birth Place: </b>
                            </td>
                            <td colspan="3">
                                {{ $client->born_village }}
                            </td>
                            <td colspan="3">
                                {{ $client->born_district }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Fathers name:</b>
                            </td>
                            <td colspan="2">
                                {{ $client->fathers_name }}
                            </td>
                            <td>
                                <b>Mother's name: </b>
                            </td>
                            <td>
                                {{ $client->mothers_name }}
                            </td>
                            <td>
                                <b>brother's name: </b>
                            </td>
                            <td>
                                {{ $client->brothers_name }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Address: </b>
                            </td>
                            <td colspan="2">
                                {{ $client->c_address }}
                            </td>
                            <td>
                                {{ $client->c_city }}
                            </td>
                            <td>
                                {{ $client->c_pincode }}
                            </td>
                            <td>
                                <b>Adhaar: </b>
                            </td>
                            <td colspan="2">
                                {{ $client->adhaar_number }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"> <b>Category: </b></td>
                            <td colspan="6">
                                {{ $client->category }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Residence type: </b>
                            </td>
                            <td colspan="6">
                                {{ $client->c_residence_type }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Education: </b>
                            </td>
                            <td colspan="2">
                                {{ $client->clients_education }}
                            </td>
                            <td colspan="2">
                                <b>
                                    Occupation:
                                </b>
                            </td>
                            <td colspan="2">
                                {{ $client->occupation }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Husband's Education: </b>
                            </td>
                            <td colspan="2">
                                {{ $client->husbands_education }}
                            </td>
                            <td colspan="2">
                                <b>
                                    Husband's Occupation:
                                </b>
                            </td>
                            <td colspan="2">
                                {{ $client->husbands_occupation }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Cows</b>
                            </td>
                            <td>
                                {{ $client->no_of_cows }}
                            </td>
                            <td>
                                <b>Buffaloes</b>
                            </td>
                            <td>
                                {{ $client->no_of_buffaloes }}
                            </td>
                            <td>
                                <b>Goats</b>
                            </td>
                            <td>
                                {{ $client->no_of_goats }}
                            </td>
                            <td>
                                <b>Others</b>
                            </td>
                            <td>
                                {{ $client->no_of_others }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <b>Land acquisition</b>
                            </td>
                            <td colspan="6">
                                {{ $client->area_of_land }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="8"></td>
                        </tr>
                        <tr class="bg-dark text-light">
                            <td colspan="8"><b>Details of children</b></td>
                        </tr>

                        <tr>
                            <td>
                                <b>S.no.</b>
                            </td>
                            <td colspan="2">
                                <b>Name</b>
                            </td>
                            <td>
                                <b>Age</b>
                            </td>
                            <td>
                                <b>Marital Status</b>
                            </td>
                            <td>
                                <b>Education</b>
                            </td>
                            <td colspan="2">
                                <b>Occupation</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>1.</b>
                            </td>
                            <td colspan="2">
                                {{ $client->f1_name }}
                            </td>
                            <td>
                                {{ $client->f1_age }}
                            </td>
                            <td>
                                {{ $client->f1_marital_status }}
                            </td>
                            <td>
                                {{ $client->f1_education }}
                            </td>
                            <td colspan="2">
                                {{ $client->f1_occupation }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>2.</b>
                            </td>
                            <td colspan="2">
                                {{ $client->f2_name }}
                            </td>
                            <td>
                                {{ $client->f2_age }}
                            </td>
                            <td>
                                {{ $client->f2_marital_status }}
                            </td>
                            <td>
                                {{ $client->f2_education }}
                            </td>
                            <td colspan="2">
                                {{ $client->f2_occupation }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>3.</b>
                            </td>
                            <td colspan="2">
                                {{ $client->f3_name }}
                            </td>
                            <td>
                                {{ $client->f3_age }}
                            </td>
                            <td>
                                {{ $client->f3_marital_status }}
                            </td>
                            <td>
                                {{ $client->f3_education }}
                            </td>
                            <td colspan="2">
                                {{ $client->f3_occupation }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>4.</b>
                            </td>
                            <td colspan="2">
                                {{ $client->f4_name }}
                            </td>
                            <td>
                                {{ $client->f4_age }}
                            </td>
                            <td>
                                {{ $client->f4_marital_status }}
                            </td>
                            <td>
                                {{ $client->f4_education }}
                            </td>
                            <td colspan="2">
                                {{ $client->f4_occupation }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>5.</b>
                            </td>
                            <td colspan="2">
                                {{ $client->f5_name }}
                            </td>
                            <td>
                                {{ $client->f5_age }}
                            </td>
                            <td>
                                {{ $client->f5_marital_status }}
                            </td>
                            <td>
                                {{ $client->f5_education }}
                            </td>
                            <td colspan="2">
                                {{ $client->f5_occupation }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>6.</b>
                            </td>
                            <td colspan="2">
                                {{ $client->f6_name }}
                            </td>
                            <td>
                                {{ $client->f6_age }}
                            </td>
                            <td>
                                {{ $client->f6_marital_status }}
                            </td>
                            <td>
                                {{ $client->f6_education }}
                            </td>
                            <td colspan="2">
                                {{ $client->f6_occupation }}
                            </td>
                        </tr>
                        
                        <tr class="bg-dark text-light">
                            <td colspan="5">
                                <b>Documents</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Adhaar</b>
                            </td>
                            <td>
                                <b>Photo</b>
                            </td>
                            <td>
                                <b>Pan</b>
                            </td>
                            <td>
                                <b>Husband Image</b>
                            </td>
                            <td>
                                <b>Husband Adhaar</b>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <img src="{{ asset('assets/images/clients') }}/{{ $client->adhaar_scan }}"
                                    style="height: 100px; width: 100px;" alt="">
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/clients') }}/{{ $client->photo_scan }}"
                                    style="height: 100px; width: 100px;" alt="">
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/clients') }}/{{ $client->pan_scan }}"
                                    style="height: 100px; width: 100px;" alt="">
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/clients') }}/{{ $client->husband_image }}"
                                    style="height: 100px; width: 100px;" alt="">
                            </td>
                            <td>
                                <img src="{{ asset('assets/images/clients') }}/{{ $client->husband_adhaar }}"
                                    style="height: 100px; width: 100px;" alt="">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>



</div>

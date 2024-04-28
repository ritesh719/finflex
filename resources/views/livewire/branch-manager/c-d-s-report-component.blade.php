<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">CDS Report - Branch</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/branch-manager/dashboard">Dashboard</a></li>
        </ol>
    </div>

    <style>
        .pagebreak {
            page-break-before: always !important;
        }

    </style>

    <div class="row" id="printable">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row w-100">
                        <div class="col-6">Closing Data</div>
                        <div class="col-6 text-right">
                            {{-- <a href="{{ route('branchmanager.cdspdf') }}" class="btn btn-info btn-sm">Print</a> --}}
                            <a onclick="printDiv('printable')" class="btn btn-info btn-sm">Print</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <style>
                        th {
                            font-size: 0.8em !important;
                            vertical-align: top;
                            line-height: normal;
                        }

                        td {
                            font-size: 0.8em !important;
                            vertical-align: top;
                            line-height: normal;
                        }

                    </style>
                    <table class="table table-bordered">
                        <tr>
                            <thead>
                                <th>Center ID / Name</th>
                                <th>Principal Collected</th>
                                <th>Interest Collected</th>
                                <th>Processing fees</th>
                                <th>Insurance Amount</th>
                                <th>Passbook</th>
                                <th>FD Collected</th>
                                <th>FD Withdrawl</th>
                                <th>Loan Disbursed</th>
                                <th>Total Collected</th>
                                <th>Total Disbursed</th>
                            </thead>
                        </tr>

                        @foreach ($center_wise_data as $c_w_d)
                            @if ($c_w_d['closing_status'])
                                <tr>
                                    <td>
                                        {{ $c_w_d['center_id'] }} / {{ $c_w_d['center_name'] }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_principal'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_interest'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_processing_fees'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_insurance'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_passbook'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_fd_deposit'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_fd_withdrawl'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['loan_disbursed'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_collected'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_disbursed'], 2) }}
                                    </td>
                                </tr>
                            @else
                                <tr>
                                    <td>
                                        {{ $c_w_d['center_id'] }} / {{ $c_w_d['center_name'] }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_principal'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_interest'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_processing_fees'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_insurance'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_passbook'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_fd_deposit'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_fd_withdrawl'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['loan_disbursed'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_collected'], 2) }}
                                    </td>
                                    <td>
                                        {{ number_format($c_w_d['total_disbursed'], 2) }}
                                    </td>
                                </tr>
                            @endif

                            @php
                                $overall_total_principal += $c_w_d['total_principal'];
                                $overall_total_interest += $c_w_d['total_interest'];
                                $overall_total_processing_fees += $c_w_d['total_processing_fees'];
                                $overall_total_insurance += $c_w_d['total_insurance'];
                                $overall_total_passbook += $c_w_d['total_passbook'];
                                $overall_total_fd_deposit += $c_w_d['total_fd_deposit'];
                                $overall_total_fd_withdrawl += $c_w_d['total_fd_withdrawl'];
                                $overall_loan_disbursed += $c_w_d['loan_disbursed'];
                                $overall_total_collected += $c_w_d['total_collected'];
                                $overall_total_disbursed += $c_w_d['total_disbursed'];
                            @endphp
                        @endforeach


                        <tr>
                            <td></td>
                            <td><b>
                                    {{ number_format($overall_total_principal, 2) }}
                                </b></td>
                            <td><b>
                                    {{ number_format($overall_total_interest, 2) }}
                                </b></td>
                            <td><b>
                                    {{ number_format($overall_total_processing_fees, 2) }}
                                </b></td>
                            <td><b>
                                    {{ number_format($overall_total_insurance, 2) }}
                                </b></td>
                            <td><b>
                                    {{ number_format($overall_total_passbook, 2) }}
                                </b></td>
                            <td><b>
                                    {{ number_format($overall_total_fd_deposit, 2) }}
                                </b></td>
                            <td><b>
                                    {{ number_format($overall_total_fd_withdrawl, 2) }}
                                </b></td>
                            <td><b>
                                    {{ number_format($overall_loan_disbursed, 2) }}
                                </b></td>
                            <td><b>
                                    {{ number_format($overall_total_collected, 2) }}
                                </b></td>
                            <td><b>
                                    {{ number_format($overall_total_disbursed, 2) }}
                                </b></td>
                        </tr>
                    </table>
                </div>
                <div class="card-footer">
                    <table class="table ">
                        <tr class="bg-dark text-light">
                            <td><b>Total Cash Inflow: </b></td>
                            <td><b>{{ number_format($income, 2) }}</b></td>
                            <td><b>Total Cash Outflow</b></td>
                            <td><b>{{ number_format($expense, 2) }}</b></td>
                        </tr>
                    </table>


                </div>
            </div>
        </div>
        <div class="pagebreak"> </div>

        @foreach ($cds_data as $c_d)
            @if (count($c_d['due_data']))
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                Collection Sheet
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tr>
                                    <td colspan="9">
                                        <h5>{{ $c_d['center_id'] }} / {{ $c_d['center_name'] }}</h5>
                                    </td>
                                </tr>

                                <tr>
                                    <th>S.No.</th>
                                    <th>A/C No.</th>
                                    <th>Name</th>
                                    <th>Husband</th>
                                    <th>Mobile</th>
                                    <th>Amount</th>
                                    <th>Installment No.</th>
                                    <th>Due Date</th>
                                    <th>Sign</th>
                                    <th>Remaining</th>
                                </tr>
                                @php
                                    $due_DATA = [];
                                    foreach ($c_d['due_data'] as $d_d){
                                        $temp_DATA = [
                                            "id"=>$d_d->loan->client->id,
                                            "name"=>$d_d->loan->client->name,
                                            "husband_name"=>$d_d->loan->client->husband_name,
                                            "mobile"=>$d_d->loan->client->mobile,
                                            "total_amount"=>$d_d->total_amount,
                                            "emi_number"=>$d_d->emi_number,
                                            "due_on_date"=>date('d-M-Y', strtotime($d_d->due_on_date)),
                                            "total_amount_d"=>$d_d->loan->due_amount - $d_d->total_amount,
                                        ];
                                        
                                        array_push($due_DATA, $temp_DATA);
                                    }
                                    
                                    $cid = array_column($due_DATA, 'id');

                                    array_multisort($cid, SORT_DESC, $due_DATA);
                                    $CTR = 0;
                                    $FLG = 0;
                                @endphp

                                @foreach ($due_DATA as $d_d)
                                    @php
                                        if($d_d['id'] == $FLG){
                                            
                                        }else{
                                            $FLG = $d_d['id'];
                                            $CTR++;
                                        }
                                    @endphp
                                    <tr>
                                        <td>
                                            {{$CTR}}
                                        </td>
                                        <td>
                                            {{ $d_d['id'] }}
                                        </td>
                                        <td>
                                            {{ $d_d['name'] }}
                                        </td>
                                        <td>
                                            {{ $d_d['husband_name'] }}
                                        </td>
                                        <td>
                                            {{ $d_d['mobile'] }}
                                        </td>
                                        <td>
                                            {{ $d_d['total_amount'] }}
                                        </td>
                                        <td>
                                            {{ $d_d['emi_number'] }}
                                        </td>
                                        <td>
                                            {{ $d_d['due_on_date'] }}
                                        </td>
                                        <td style="width: 15%;">

                                        </td>
                                        <td>
                                            {{ $d_d['total_amount_d'] }}
                                        </td>
                                    </tr>
                                @endforeach


                                @foreach ($c_d['partial_due_data'] as $p_d)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>
                                            {{ $p_d->loan->id }}
                                        </td>
                                        <td>
                                            {{ $p_d->loan->client->name }}
                                        </td>
                                        <td>
                                            {{ $p_d->loan->client->husband_name }}
                                        </td>
                                        <td>
                                            {{ $p_d->loan->client->mobile }}
                                        </td>
                                        <td>
                                            {{ $p_d->total_amount }}
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td style="width: 15%;">

                                        </td>
                                    </tr>
                                @endforeach
                                
                                <tr>
                                    <td colspan="5">Total: </td>
                                    <td>{{number_format($c_d['total_due'], 2)}}</td>
                                    <td colspan="4"></td>
                                </tr>

                            </table>

                        </div>
                    </div>
                </div>

                <div class="pagebreak"> </div>
            @endif

        @endforeach
    </div>
</div>

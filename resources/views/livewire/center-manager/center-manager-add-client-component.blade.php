<div class=" content-area">
    <div class="page-header">
        <h4 class="page-title">Center Manager</h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/center-manager/dashboard">Clients</a></li>
            <li class="breadcrumb-item active" aria-current="page">Add new</li>
        </ol>
    </div>
    @if (Session::has('client_add_successfully'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('client_add_successfully') }}
        </div>
    @endif



    <div class="row row-deck">
        <div class="col-lg-12">
            <form class="card" wire:submit.prevent="addNewClient">
                <div class="card-header">
                    <b style="font-size: 1.5em;">Add new client form</b>
                    <!--<a wire:click.prevent="test" class="btn btn-primary">Test</a> -->
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-secondary">
                                    <b>Personal Details</b>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-12">
                                            <input wire:model="photo_scan" type="file" class="dropify1"
                                                data-height="180">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <input wire:model="adhaar_scan" type="file" class="dropify2"
                                                data-height="180">
                                        </div>
                                        <div class="col-lg-4 col-sm-12">
                                            <input wire:model="pan_scan" type="file" class="dropify3"
                                                data-height="180">
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Mobile</label>
                                                <input required wire:model="mobile" type="text" class="form-control"
                                                    placeholder="Enter mobile number...">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Contact</label>
                                                <input wire:model="contact" type="text" class="form-control"
                                                    placeholder="Enter contact numer...">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <input required wire:model="name" type="text" class="form-control"
                                                    placeholder="Enter name...">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Age</label>
                                                <input required wire:model="dob" type="text" class="form-control"
                                                    placeholder="Enter age...">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Marital Status</label>
                                                <select required wire:model="marital_status" class="custom-select">
                                                    <option value="">Marital Status</option>
                                                    <option value="single">Single</option>
                                                    <option value="married">Married</option>
                                                    <option value="widow">Widow</option>
                                                    <option value="divorced">Divorsed</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Adhaar</label>
                                                <input wire:model="adhaar_number" type="text" class="form-control "
                                                    placeholder="Enter adhaar number..." minlength="16" maxlength="16">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Husband's Name</label>
                                                <input wire:model="husband_name" type="text" class="form-control "
                                                    placeholder="Enter husband name...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label class="form-label">Husband's age</label>
                                                <input wire:model="husbands_age" type="text" class="form-control "
                                                    placeholder="Enter husband's age...">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">S/o</label>
                                                <input wire:model="husbands_father_name" type="text"
                                                    class="form-control " placeholder="Enter s/o">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Born Village</label>
                                                <input wire:model="born_village" type="text" class="form-control "
                                                    placeholder="Enter born village">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label class="form-label">Born District</label>
                                                <input wire:model="born_district" type="text" class="form-control "
                                                    placeholder="Enter born district">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Father's Name</label>
                                                <input required wire:model="fathers_name" type="text"
                                                    class="form-control " placeholder="Enter father name...">
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Mother's Name</label>
                                                <input required wire:model="mothers_name" type="text"
                                                    class="form-control " placeholder="Enter mother name...">
                                            </div>
                                        </div>

                                        <div class="col-4">
                                            <div class="form-group">
                                                <label class="form-label">Brother's Name</label>
                                                <input wire:model="brothers_name" type="text" class="form-control "
                                                    placeholder="Enter brothers name...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                <input required wire:model="c_address" type="text" class="form-control"
                                    placeholder="Enter address">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">City</label>
                                <input required wire:model="c_city" type="text" class="form-control"
                                    placeholder="Enter City">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <label class="form-label">Pincode</label>
                                <input required wire:model="c_pincode" type="text" class="form-control"
                                    placeholder="Enter Pincode">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">Category</label>
                                <select required wire:model="category" class="custom-select">
                                    <option value="">Category</option>
                                    <option value="Gen">Gen</option>
                                    <option value="OBC">OBC</option>
                                    <option value="SC">SC</option>
                                    <option value="ST">ST</option>
                                    <option value="Others">Others</option>

                                </select>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">Residence type</label>
                                <select required wire:model="c_residence_type" class="custom-select">
                                    <option value="">Residence type</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>

                                </select>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">Education</label>
                                <input wire:model="clients_education" type="text" class="form-control"
                                    placeholder="Enter education...">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">Occupation</label>
                                <input required wire:model="occupation" type="text" class="form-control"
                                    placeholder="Enter occupation...">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">Husband's Education</label>
                                <input wire:model="husbands_education" type="text" class="form-control"
                                    placeholder="Enter husband's education...">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label">Husband's Occupation</label>
                                <input required wire:model="husbands_occupation" type="text" class="form-control"
                                    placeholder="Enter husband's occupation...">
                            </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label">Cow(s)</label>
                                <input wire:model="no_of_cows" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label">Buffalo(s)</label>
                                <input wire:model="no_of_buffaloes" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label">Goat(s)</label>
                                <input wire:model="no_of_goats" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="form-group">
                                <label class="form-label">Others</label>
                                <input wire:model="no_of_others" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label">Area of land acquisition</label>
                                <input wire:model="area_of_land" type="text" class="form-control"
                                    placeholder="Area of land acquisition">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-warning">
                                    <b>Children details</b>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label class="form-label">1.</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input wire:model="f1_name" type="text" class="form-control"
                                                    placeholder="Enter name...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f1_age" type="text" class="form-control"
                                                    placeholder="Enter age...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <div class="form-group">

                                                    <select wire:model="f1_marital_status" class="custom-select">
                                                        <option value="">Marital Status</option>
                                                        <option value="single">Single</option>
                                                        <option value="married">Married</option>
                                                        <option value="widow">Widow</option>
                                                        <option value="divorced">Divorsed</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f1_education" type="text" class="form-control"
                                                    placeholder="Enter education...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f1_occupation" type="text" class="form-control"
                                                    placeholder="Enter occupation...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label class="form-label">2.</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input wire:model="f2_name" type="text" class="form-control"
                                                    placeholder="Enter name...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f2_age" type="text" class="form-control"
                                                    placeholder="Enter age...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <div class="form-group">

                                                    <select wire:model="f2_marital_status" class="custom-select">
                                                        <option value="">Marital Status</option>
                                                        <option value="single">Single</option>
                                                        <option value="married">Married</option>
                                                        <option value="widow">Widow</option>
                                                        <option value="divorced">Divorsed</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f2_education" type="text" class="form-control"
                                                    placeholder="Enter education...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f2_occupation" type="text" class="form-control"
                                                    placeholder="Enter occupation...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label class="form-label">3.</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input wire:model="f3_name" type="text" class="form-control"
                                                    placeholder="Enter name...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f3_age" type="text" class="form-control"
                                                    placeholder="Enter age...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <div class="form-group">

                                                    <select wire:model="f3_marital_status" class="custom-select">
                                                        <option value="">Marital Status</option>
                                                        <option value="single">Single</option>
                                                        <option value="married">Married</option>
                                                        <option value="widow">Widow</option>
                                                        <option value="divorced">Divorsed</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f3_education" type="text" class="form-control"
                                                    placeholder="Enter education...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f3_occupation" type="text" class="form-control"
                                                    placeholder="Enter occupation...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label class="form-label">4.</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input wire:model="f4_name" type="text" class="form-control"
                                                    placeholder="Enter name...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f4_age" type="text" class="form-control"
                                                    placeholder="Enter age...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <div class="form-group">

                                                    <select wire:model="f4_marital_status" class="custom-select">
                                                        <option value="">Marital Status</option>
                                                        <option value="single">Single</option>
                                                        <option value="married">Married</option>
                                                        <option value="widow">Widow</option>
                                                        <option value="divorced">Divorsed</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f4_education" type="text" class="form-control"
                                                    placeholder="Enter education...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f4_occupation" type="text" class="form-control"
                                                    placeholder="Enter occupation...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label class="form-label">5.</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input wire:model="f5_name" type="text" class="form-control"
                                                    placeholder="Enter name...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f5_age" type="text" class="form-control"
                                                    placeholder="Enter age...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <div class="form-group">

                                                    <select wire:model="f5_marital_status" class="custom-select">
                                                        <option value="">Marital Status</option>
                                                        <option value="single">Single</option>
                                                        <option value="married">Married</option>
                                                        <option value="widow">Widow</option>
                                                        <option value="divorced">Divorsed</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f5_education" type="text" class="form-control"
                                                    placeholder="Enter education...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f5_occupation" type="text" class="form-control"
                                                    placeholder="Enter occupation...">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-1">
                                            <div class="form-group">
                                                <label class="form-label">6.</label>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input wire:model="f6_name" type="text" class="form-control"
                                                    placeholder="Enter name...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f6_age" type="text" class="form-control"
                                                    placeholder="Enter age...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <div class="form-group">

                                                    <select wire:model="f6_marital_status" class="custom-select">
                                                        <option value="">Marital Status</option>
                                                        <option value="single">Single</option>
                                                        <option value="married">Married</option>
                                                        <option value="widow">Widow</option>
                                                        <option value="divorced">Divorsed</option>

                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f6_education" type="text" class="form-control"
                                                    placeholder="Enter education...">
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <input wire:model="f6_occupation" type="text" class="form-control"
                                                    placeholder="Enter occupation...">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-left">
                    <button type="submit" value="submit" name="submit" class="btn btn-primary btn-lg">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
    <script type="text/javascript">
        $('.dropify1').dropify({
            messages: {
                'default': 'Upload client image',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (20M max).'
            }
        });
        $('.dropify2').dropify({
            messages: {
                'default': 'Upload adhaar image',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (20M max).'
            }
        });
        $('.dropify3').dropify({
            messages: {
                'default': 'Upload pan card image',
                'remove': 'Remove',
                'error': 'Ooops, something wrong appended.'
            },
            error: {
                'fileSize': 'The file size is too big (20M max).'
            }
        });
    </script>
@endpush

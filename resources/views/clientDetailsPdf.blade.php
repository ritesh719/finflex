<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Dashboard Css -->

</head>

<style>
    @include('style');

</style>

<style>
    td {
        padding: 3px 5px !important;
        font-size: 1em;
    }

    td img {
        vertical-align: top;
    }

</style>

<body>
    <table class="table table-bordered">
        <tr>
            <td colspan="8" class="text-bold text-center">
                <h3> <b>Finflex</b></h3>
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
            <td colspan="2">
                <b>Name: </b>
            </td>
            <td colspan="2">
                {{ $client->name }}
            </td>
            <td>
                <b>Age: </b>
            </td>
            <td>
                {{ $client->dob }}
            </td>
            <td colspan="2" rowspan="2" class="text-center">
                <img src="http://localhost/GMF/public/assets/images/clients/{{ $client->photo_scan }}"
                    style="height: 100px; width: 100px;" alt="">
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <b>Marital Status: </b>
            </td>
            <td colspan="3">
                {{ $client->marital_status }}
            </td>
        </tr>
        <tr>
            <td colspan="3">
                <b>Husband's name: </b>
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
            <td>
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
                <b>Father's name:</b>
            </td>
            <td>
                {{ $client->fathers_name }}
            </td>
            <td colspan="2">
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
            <td colspan="2">
                <b>Address: </b>
            </td>
            <td colspan="2">
                {{ $client->c_address }}
            </td>
            <td colspan="2">
                {{ $client->c_city }}
            </td>
            <td colspan="2">
                {{ $client->c_pincode }}
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
            <td colspan="3">
                <b>Husband's Education: </b>
            </td>
            <td>
                {{ $client->husbands_education }}
            </td>
            <td colspan="3">
                <b>
                    Husband's Occupation:
                </b>
            </td>
            <td>
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
            <td colspan="4">
                <b>Land acquisition</b>
            </td>
            <td colspan="4">
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
    </table>
</body>

</html>

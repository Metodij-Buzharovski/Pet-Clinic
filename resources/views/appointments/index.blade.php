@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Appointments</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <div class="float-left"><h5 class="card-title">All appointments</h5></div>
            <div class="float-right"><a href="/appointments/create" class="btn btn-primary">Make an Appointment</a></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="w-20">Pet ID</th>
                                <th class="w-20">Pet Name</th>
                                <th class="w-20">Reason for visit</th>
                                <th class="w-20">Doctor</th>
                                <th class="w-20">Appointment Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($appointments)==0)
                                <tr>
                                    <td colspan="5" class="text-center">No appointments found!</td>
                                </tr>
                            @endif
                            @foreach($appointments as $appointment)
                                <tr>
                                    <td>{{$appointment->pet_id}}</td>
                                    <td>{{$appointment->pet->name}}</td>
                                    <td>{{$appointment->visit_reason}}</td>
                                    <td>{{$appointment->doctor->name}}</td>
                                    <td>{{$appointment->date}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

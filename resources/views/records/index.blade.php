@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/pets">Animals</a></li>
        <li class="breadcrumb-item active">Medical Records</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <div class="float-left"><h5 class="card-title">Records List</h5></div>
            <div class="float-right"><a href="/records/{{$pet_id}}/create" class="btn btn-primary">Create new</a></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="w-20">Record ID</th>
                                <th class="w-20">Diagnosis</th>
                                <th class="w-20">Treatment</th>
                                <th class="w-20">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($records)==0)
                                <tr>
                                    <td colspan="5" class="text-center">No records found!</td>
                                </tr>
                            @endif
                            @foreach($records as $record)
                                <tr>
                                    <td>{{$record->id}}</td>
                                    <td>{{$record->diagnosis}}</td>
                                    <td>{{$record->treatment}}</td>
                                    <td>{{$record->date}}</td>
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

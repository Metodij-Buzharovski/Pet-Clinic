@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Animals</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <div class="float-left"><h5 class="card-title">List of animals</h5></div>
            <div class="float-right"><a href="/pets/add" class="btn btn-primary">Create new</a></div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="w-20">Animals Name</th>
                                <th class="w-20">Breed</th>
                                <th class="w-20">Age</th>
                                <th class="w-20">Weight</th>
                                <th class="w-20">Medical History</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($pets)==0)
                                <tr>
                                    <td colspan="5" class="text-center">No animals found!</td>
                                </tr>
                            @endif
                            @foreach($pets as $pet)
                                <tr>
                                    <td>{{$pet->name}}</td>
                                    <td>{{$pet->breed}}</td>
                                    <td>{{$pet->age}}</td>
                                    <td>{{$pet->weight}}</td>
                                    <td><div class="h-100 d-flex align-items-center justify-content-center"><a href="/records/{{$pet->id}}" class="btn btn-primary">View Records</a></div></td>
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

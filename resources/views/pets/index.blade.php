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
            @can('clientAndAdminOnly',auth()->user())
            <div class="float-right"><a href="/pets/add" class="btn btn-primary">Create new</a></div>
                @endcan
        </div>

        <br>
        @can('medicalPersonelOnly', auth()->user())
        <form action="/pets">
        <div class="input-group col-md-4">
            <input class="form-control py-2" type="search" placeholder="search" id="example-search-input" name="search">
            <span class="input-group-append">
        <button class="btn btn-outline-secondary" type="submit">
            <i class="fa fa-search"></i>
        </button>
      </span>
        </div>
        </form>
        @endcan

        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="w-20">Animal's Name</th>
                                @can('medicalPersonelOnly',auth()->user())
                                <th class="w-20">Animal's Owner</th>
                                @endcan
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
                                    @can('medicalPersonelOnly',auth()->user())
                                    <td>{{$pet->user->name}}</td>
                                    @endcan
                                    <td>{{$pet->breed}}</td>
                                    <td>{{$pet->age}}</td>
                                    <td>{{$pet->weight}}</td>
                                    <td><div class="h-100 d-flex align-items-center justify-content-center"><a href="/records/{{$pet->id}}" class="btn btn-primary">View Records</a></div></td>
                                    @can('clientAndAdminOnly',auth()->user())
                                    <td>
                                        <div  class="h-100 d-flex align-items-center justify-content-center">
                                                <a href="/pets/{{$pet->id}}/edit" class="btn btn-success">Edit</a>
                                        <form class="inline" method="POST" action="/pets/{{$pet->id}}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                        </div>
                                    </td>
                                    @endcan
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

@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item active">Medical Personnel</li>
    </ol>

    <div class="card mb-3">
        <div class="card-header">
            <div class="float-left"><h5 class="card-title">List of staff members</h5></div>
            <div class="float-right"><a href="/staff/add" class="btn btn-primary">Add staff member</a></div>
        </div>

        @can('medicalPersonelOnly', auth()->user())
            <form action="/staff">
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
                                <th class="w-20">Name</th>
                                <th class="w-20">Role</th>
                                <th class="w-20">Email</th>
                                <th class="w-20">Hashed Password</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($staff)==0)
                                <tr>
                                    <td colspan="5" class="text-center">No users found!</td>
                                </tr>
                            @endif
                            @foreach($staff as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->password}}</td>
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

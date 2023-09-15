@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/users">Clients</a></li>
        <li class="breadcrumb-item active">New Client</li>
    </ol>

    <div class="row">
        <div class="col-md-6 col-12">
            <form method="post" action="/users/store">
                @csrf

                <div class="form-group">
                    <label for="id_first_name">Name:</label>

                    <input type="text" name="name" class="form-control" maxlength="30" id="id_first_name" value="{{old('name')}}"/>
                    @error('name')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="id_email">Email address:</label>

                    <input type="text" name="email" class="form-control" maxlength="254" id="id_email" value="{{old('email')}}"/>
                    @error('email')
                    <p style="color: red">{{$message}}</p>
                    @enderror


                </div>

                <div class="form-group">
                    <label for="id_password1">Password:</label>

                    <input type="password" name="password" class="form-control" id="id_password1" value="{{old('password')}}"/>
                    @error('password')
                    <p style="color: red">{{$message}}</p>
                    @enderror


                </div>
                <button type="submit" name="action" value="save" class="btn btn-primary">Save</button>
                <a href="/users" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection

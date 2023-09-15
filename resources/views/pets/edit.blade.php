@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/pets">Animals</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>

        <div class="row">
            <div class="col-md-6 col-12">
                <form method="post" action="/pets/{{$pet->id}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="pet_name">Pet name:</label>

                        <input type="text" name="name" class="form-control" maxlength="30" id="pet_name" value="{{$pet->name}}"/>
                        @error('name')
                        <p style="color: red">{{$message}}</p>
                        @enderror


                    </div>

                    <div class="form-group">
                        <label for="pet_breed">Breed:</label>

                        <input type="text" name="breed" class="form-control" maxlength="30" id="pet_breed" value="{{$pet->breed}}"/>
                        @error('breed')
                        <p style="color: red">{{$message}}</p>
                        @enderror


                    </div>

                    <div class="form-group">
                        <label for="pet_age">Age:</label>

                        <input type="number" name="age" class="form-control" id="pet_age" value="{{$pet->age}}"/>
                        @error('age')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="pet_weight">Weight:</label>

                        <input type="number" name="weight" class="form-control" id="pet_weight" value="{{$pet->weight}}"/>
                        @error('weight')
                        <p style="color: red">{{$message}}</p>
                        @enderror

                    </div>



                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/pets" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection

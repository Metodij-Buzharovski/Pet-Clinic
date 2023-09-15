@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item"><a href="/appointments">Appointments</a></li>
            <li class="breadcrumb-item active">New appointment</li>
        </ol>

        <div class="row">
            <div class="col-md-6 col-12">
                <form method="post" action="/appointments/store">
                    @csrf
                    <div class="form-group">
                        <label class="control-label">Pet ID:</label>
                        <select name="pet_id" class="form-control" id="id_pet_id" value="{{old('pet_id')}}">
                            @foreach($pets as $pet)
                                <option value="{{$pet->id}}">{{$pet->id}} {{$pet->name}}</option>
                            @endforeach
                        </select>
                        @error('pet_id')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="app-visit_reason">Visit Reason:</label>

                        <input type="text" name="visit_reason" class="form-control" maxlength="30" id="app-visit_reason" value="{{old('app-visit_reason')}}"/>
                        @error('visit_reason')
                        <p style="color: red">{{$message}}</p>
                        @enderror


                    </div>

                    @if(auth()->user()->role=='doctor')
                        <input type="hidden" name="doctor_id" value="{{auth()->id()}}">
                    @else
                        <div class="form-group">
                            <label class="control-label">Doctor:</label>
                            <select name="doctor_id" class="form-control" id="id_doctor_id" value="{{old('doctor_id')}}">
                                @foreach($doctors as $doctor)
                                    <option value="{{$doctor->id}}">{{$doctor->id}} {{$doctor->name}}</option>
                                @endforeach
                            </select>
                            @error('$doctor')
                            <p style="color: red">{{$message}}</p>
                            @enderror
                        </div>
                    @endif



                    <div class="form-group">
                        <label for="app_date">Date:</label>

                        <input type="date" name="date" class="form-control" id="app_date" value="{{old('date')}}"/>
                        @error('date')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="/appointments" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection

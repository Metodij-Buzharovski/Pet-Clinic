@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
        <li class="breadcrumb-item"><a href="/pets">Animals</a></li>
        <li class="breadcrumb-item"><a href="/records/{{$pet_id}}">Medical Records</a></li>
        <li class="breadcrumb-item active">New Record</li>
    </ol>

    <div class="row">
        <div class="col-md-6 col-12">
            <form method="post" action="/records/{{$pet_id}}/store">
                @csrf

                <div class="form-group">
                    <label for="id_diagnosis">Diagnosis:</label>

                    <textarea name="diagnosis" class="form-control" id="id_diagnosis" value="{{old('diagnosis')}}"/></textarea>
                    @error('diagnosis')
                    <p style="color: red">{{$message}}</p>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="id_treatment">Treatment:</label>

                    <textarea name="treatment" class="form-control" id="id_treatment" value="{{old('treatment')}}"/></textarea>
                    @error('treatment')
                    <p style="color: red">{{$message}}</p>
                    @enderror


                </div>


                <button type="submit" name="action" value="save" class="btn btn-primary">Save</button>
                <a href="/staff" class="btn btn-secondary">Back</a>
            </form>
        </div>
    </div>
</div>
@endsection

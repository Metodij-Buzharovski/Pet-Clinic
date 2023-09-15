@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    @auth()
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
    </ol>
    @endauth
    <!-- Icon Cards-->
    @auth
    <div class="row">
        @can('medicalPersonelOnly', auth()->user())
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-user"></i>
                    </div>
                    <div class="mr-5">{{$userCount}} registered customers</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/users">
                    <span class="float-left">View customers</span>
                    <span class="float-right"><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-paw"></i>
                    </div>
                    <div class="mr-5">{{$petCount}} registered animals</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/pets">
                    <span class="float-left">View animals</span>
                    <span class="float-right"><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>
            @endcan

            @can('clientOnly', auth()->user())
                <div class="col-xl-3 col-sm-6 mb-3">
                    <div class="card text-white bg-warning o-hidden h-100">
                        <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fa fa-fw fa-paw"></i>
                            </div>
                            <div class="mr-5">{{count(auth()->user()->pets()->get())}} registered animals</div>
                        </div>
                        <a class="card-footer text-white clearfix small z-1" href="/pets">
                            <span class="float-left">View animals</span>
                            <span class="float-right"><i class="fa fa-angle-right"></i></span>
                        </a>
                    </div>
                </div>
            @endcan







        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">Appointments</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/appointments">
                    <span class="float-left">View appointments</span>
                    <span class="float-right"><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>
    </div>
    @else
        <div class="container" style="margin-top: 10%">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Welcome to Pet Clinic</div>

                        <div class="card-body">
                            <p>Pet Clinic is a laravel project that helps you manage your veterinary clinic. You can register your pets, book appointments, view medical records, and more.</p>
                            <p>If you are a new user, please click the button below to create an account. If you already have an account, please log in using the link at the top right corner of the page.</p>
                            <a href="/register" class="btn btn-primary">Create an account</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endauth
</div>
@endsection

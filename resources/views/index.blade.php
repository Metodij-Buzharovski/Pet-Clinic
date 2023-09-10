@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/">Home</a></li>
    </ol>

    <!-- Icon Cards-->
    <div class="row">
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
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">Reports</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/report/">
                    <span class="float-left">View reports</span>
                    <span class="float-right"><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection

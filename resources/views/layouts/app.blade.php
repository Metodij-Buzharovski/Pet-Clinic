<!DOCTYPE html>
<head>

    <title>Pet Clinic</title>

    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('js/jquery/jquery-ui.css') }}" rel="stylesheet"/>
    <link href="{{ asset('toastr/toastr.css') }}" rel="stylesheet"/>
    <script src="{{ asset('toastr/toastr_messages.js') }}"></script>
    <link href="{{ asset('css/multiselect.css') }}" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="/">Pet Clinic</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>


    <div class="collapse navbar-collapse" id="navbarResponsive">

        <!-- Sidebar menu -->
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Home">
                <a class="nav-link" href="/">
                    <i class="fa fa-fw fa-home"></i>
                    <span class="nav-link-text">Home</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Animals">
                <a class="nav-link" href="/pets">
                    <i class="fa fa-fw fa-paw"></i>
                    <span class="nav-link-text">Animals</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Clients">
                <a class="nav-link" href="/users">
                    <i class="fa fa-fw fa-user"></i>
                    <span class="nav-link-text">Clients</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Reports">
                <a class="nav-link" href="/report/">
                    <i class="fa fa-fw fa-list"></i>
                    <span class="nav-link-text">Reports</span>
                </a>
            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
                <a class="nav-link" href="/staff">
                    <i class="fa fa-fw fa-user-md"></i>
                    <span class="nav-link-text">Medical Personnel</span>
                </a>
            </li>

        </ul>

        <!-- Top menu -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="/register/"><i class="fa fa-fw fa-sign-in"></i>Register</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/logout/"><i class="fa fa-fw fa-sign-out"></i>Logout</a>
            </li>
        </ul>

    </div>
</nav>

<!-- Page Content -->
<div class="content-wrapper">

    @yield('content')


    <!-- Footer -->
    <br>
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center">
                <small>&copy; Copyright 2023 Pet Clinic</small>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fa fa-angle-up"></i>
    </a>
</div>


<script src="{{ asset('js/jquery/jquery.js') }}"></script>
<script src="{{ asset('js/jquery/jquery-ui.js') }}"></script>
<script src="{{ asset('js/datepicker.js') }}"></script>
<script src="{{ asset('toastr/toastr.js') }}"></script>
<script src="{{ asset('js/multiselect/multiselect.js') }}"></script>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin.min.js') }}"></script>
</body>
</html>

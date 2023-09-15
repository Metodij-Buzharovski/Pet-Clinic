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
</nav>

<!-- Page Content -->
<div class="content-wrapper">

    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">New user</li>
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

                    <div class="form-group">
                        <label for="id_password2">Password confirmation:</label>

                        <input type="password" name="password_confirmation" class="form-control" id="id_password2" value="{{old('password_confirmation')}}"/>
                        @error('password_confirmation')
                        <p style="color: red">{{$message}}</p>
                        @enderror


                        <small class="form-text text-muted">
                            Enter the same password as before, for verification.
                        </small>

                    </div>


                    <button type="submit" name="action" value="save" class="btn btn-primary">Save</button>
                    <a href="/" class="btn btn-secondary">Back</a><br>
                    <p style="margin-top: 1%">Already have an account? <a href="/login">Log in</a></p>
                </form>
            </div>
        </div>
    </div>

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

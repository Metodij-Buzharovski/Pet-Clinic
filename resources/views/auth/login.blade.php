<!DOCTYPE html>
<html lang="en">
<head>
    <title>MedVet</title>

    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">



</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Sign in</div>
        <div class="card-body">
            <form method="post" action="/authenticate"/>
            @csrf
                <div class="form-group">
                    <div class="form-group">
                        <label for="id_email">Email:</label>
                        <input type="text" name="email" class="form-control" id="id_email" value="{{old('email')}}"/>
                        @error('email')
                        <p style="color: red">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="id_password">Password:</label>

                        <input type="password" name="password" class="form-control" id="id_password"/>
                    </div>

                    <a href="/register">Don't have an account? Sign up here</a>
                </div>
                <button class="btn btn-primary" type="submit" id="signin" name="action" value="signin">Enter</button>
            </form>
        </div>
    </div>
</div>


<script src="{{ asset('js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('js/jquery-easing/jquery.easing.min.js') }}"></script>
</body>
</html>

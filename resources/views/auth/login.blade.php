

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MedVet</title>

    <!-- Bootstrap Core CSS -->
    <link href="/static/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/static/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/static/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



</head>

<body class="bg-dark">

<div class="container">
    <div class="card card-login mx-auto mt-5">
        <div class="card-header">Sign in</div>
        <div class="card-body">
            <form method="post" novalidate><input type='hidden' name='csrfmiddlewaretoken' value='mmfH7o12yRyk0m4OUDdeS7odr6iO2K195D2bJF02hUftDgL9xHjnGD13WFECgcqg' />
                <div class="form-group">





                    <div class="form-group">
                        <label for="id_username">Username:</label>

                        <input type="text" name="username" autofocus maxlength="254" class="form-control" required id="id_username" />



                    </div>

                    <div class="form-group">
                        <label for="id_password">Password:</label>

                        <input type="password" name="password" class="form-control" required id="id_password" />



                    </div>

                    <a href="/reset/">Forgot your password?</a>
                </div>
                <button class="btn btn-primary" type="submit" id="signin" name="action" value="signin">Enter</button>
            </form>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="/static/js/jquery/jquery.min.js"></script>
<script src="/static/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/static/js/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sign in</title>

    <!-- Bootstrap Core CSS -->
    <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="public/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="public/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        @if(!empty($fail))
                        <div class="alert alert-danger">
                            <p>{!!$fail!!}</p>
                        </div>
                        @endif
                        <form role="form" method="POST" action="{!!url('login')!!}" name="frmLogin">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Username" name="username" autofocus value="{!! old('username') !!}">
                                    <ul>
                                        @foreach ($errors->get('username') as $error)
                                            <li class="alert-danger" style="background: white">{{ $error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                    <ul>
                                        @foreach ($errors->get('password') as $error)
                                            <li class="alert-danger" style="background: white">{{ $error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block" type="submit" onclick="return validateLogin()">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="public/vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="public/vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="public/dist/js/sb-admin-2.js"></script>

    <script src="public/js/demo.js"></script>

</body>

</html>

<script type="text/javascript">
    function validateLogin () {
        var x = document.forms["frmLogin"]["username"].value;
		 if (x == null || x == "") {
			 alert("Tên đăng nhập không để trống");
			 return false;
		 }
		 var x = document.forms["frmLogin"]["password"].value;
		 if (x == null || x == "") {
			 alert("Mật khẩu không để trống");
			 return false;
		 }
		 return true;
    }
</script>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Tien Bakery Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('../public/admin_frontend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('../public/admin_frontend/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <script type="text/javascript">
        function check(){
            var pass = document.getElementById("exampleInputPassword").value;
            var repass = document.getElementById("exampleRepeatPassword").value;
            if(!repass.match(pass)){
                document.getElementById("repeat").innerHTML="Repeat password wrong. Please enter repeat password the same password";
                return false;
            }
            return true;
        }
    </script>
    <style type="text/css">
        #repeat{
            color: red;
        }
    </style>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="{{url('admin_register')}}" method="POST" enctype="multipart/form-data" onsubmit="return check()">
                                {{csrf_field()}}
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" required name ="name"
                                            placeholder="User Name">  
                                </div>
                                <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName" required name ="fname"
                                            placeholder="Your Full Name">  
                                </div>
                                <div class="form-group">
                                    <input type="email" required class="form-control form-control-user" id="exampleInputEmail" name="email"
                                        placeholder="Email Address">
                                </div>
                                <div class="form-group">
                                    <input type="number" required class="form-control form-control-user" id="exampleInputEmail" name="phone"
                                        placeholder="Your Phone Number">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" required class="form-control form-control-user"
                                            id="exampleInputPassword" name="pass" placeholder="Password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" required class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password">
                                    </div>
                                    <span id="repeat"></span>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="reset" class="btn btn-primary"value="Reset">
                                        <input type="submit" class="btn btn-success" value="Register">
                                    </div>
                                </div>
                                <hr>
                                <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a> -->
                            </form>
                            
                            <div class="text-center">
                                <a class="small" href="admin">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('../public/admin_frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('../public/admin_frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('../public/admin_frontend/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('../public/admin_frontend/js/sb-admin-2.min.js')}}"></script>
</body>

</html>
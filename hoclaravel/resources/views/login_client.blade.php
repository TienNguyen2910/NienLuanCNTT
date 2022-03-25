<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Client</title>
    <link rel="stylesheet" type="text/css" href="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/fontawesome-free-5.15.4/css/all.min.css')}}">
</head>
<body>
    <div class="container">
        <div class="form-register">
            <div class="header-register">
                <h4>Đăng nhập</h4>
                <a href="{{asset('/register-client')}}" class="login">Đăng ký</a>
            </div>
            <form action="{{asset('login')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="content-register">
                    <div class="row">
                        <div class="col-md">
                            <input type="text" class="form-control" required placeholder="Nhập tên đăng nhập vào" name="username">
                        </div>
                    </div>    
                    <div class="row">
                        <div class="col-md">
                            <input type="password" class="form-control" required placeholder="Nhập mật khẩu vào" name="pass">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-secondary">Làm lại</button>
                            <button type="submit" class="btn btn-primary">Đăng nhập</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="footer-register">
                <div class="line">
                    <div class="line-left"></div>
                    <span class="or">HOẶC</span>
                    <div class="line-right"></div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-8"><a href="" class="btn btn-primary"><i class="fab fa-facebook"></i> Facebook</a></div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/js/jquery-3.5.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/js/bootstrap.min.js')}}"></script>
</body>
</html>
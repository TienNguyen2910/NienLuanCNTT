<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Client</title>
    <link rel="stylesheet" type="text/css"
        href="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/css/style.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/fontawesome-free-5.15.4/css/all.min.css')}}">
</head>

<body>
    <div class="container">
        <div class="form-register">
            <div class="header-register">
                <h4>Đăng ký</h4>
                <a href="{{asset('/login-client')}}" class="login">Đăng nhập</a>
            </div>
            <form action="{{asset('register-client')}}" name="f1" method="POST" enctype="multipart/form-data"
                onsubmit="return check()">
                {{csrf_field()}}
                <div class="content-register">
                    <div class="row">
                        <div class="col-md">
                            <input type="text" class="form-control" id="username" onchange="check_username(this.value)"
                                require placeholder="Tên đăng nhập" name="username">
                        </div>
                        <span id="notify" style="color:red;"></span>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <input type="text" class="form-control" required placeholder="Họ tên của bạn"
                                name="fullname">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <input type="email" class="form-control" required
                                placeholder="Email của bạn                @gmail.com" name="email">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <input type="number" class="form-control" required placeholder="Số điện thoại của bạn"
                                name="phone">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            <input type="password" class="form-control" required placeholder="Mật khẩu" id="pass"
                                name="pass">
                        </div>
                        <div class="col-md">
                            <input type="password" class="form-control" required placeholder="Xác nhận lại mật khẩu"
                                id="repass" name="repass">
                        </div>
                        <span id="alert-re"></span>
                    </div>
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <button type="reset" class="btn btn-secondary">Làm lại</button>
                            <button type="submit" class="btn btn-primary">Đăng ký</button>
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
                    <div class="col-md-8"><a href="{{asset('login-facebook')}}" class="btn btn-primary"><i class="fab fa-facebook"></i>
                            Facebook</a></div>
                </div>
            </div>
        </div>
    </div>
    <script>
    var list_users=[];
    </script>
    <?php 
        $users=DB::table('khachhang')->select('username_kh')->get();
        $i=0;
        foreach($users as $key =>$val) { 
    ?>
    <script>
    list_users[{{$i}}] = "{{$val-> username_kh}}";
    </script>
    <?php 
        $i++;    
    }
    ?>
    <script>
    function check() {
        var p = document.f1.pass.value;
        var rep = document.f1.repass.value;
        var temp = true;
        if (p != rep) {
            document.getElementById("alert-re").innerHTML =
                "Mật khẩu không tương thích mật khẩu trên, Vui lòng nhập lại mật khẩu!!!";
            temp = false;
        }
        return temp;
    }

    function check_username(str) {
        // console.log(typeof(str));
        // console.log(list_users.length);
        for (const i = 0; i < list_users.length; i++) {
            if (str === list_users[i]) {
                document.getElementById("notify").innerHTML = "tên đăng nhập tồn tại, vui lòng bạn chọn tên khác";
                break;
            }
            else{
                document.getElementById("notify").innerHTML = "";
            }
        }


    }
    </script>
    <script src="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/js/jquery-3.5.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/js/popper.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/js/bootstrap.min.js')}}">
    </script>
</body>

</html>
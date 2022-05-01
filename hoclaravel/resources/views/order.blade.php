<!DOCTYPE html>
<html>

<head>
    <title>Tien Bakery Đặt Hàng </title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css"
        href="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/css/style.css')}}">
    <link rel="stylesheet" type="text/css"
        href="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/fontawesome-free-5.15.4/css/all.min.css')}}">
</head>

<body>
    <div class="container-fluid header">
        <div class="row row1">
            <div class="col-sm">
                <ul id="nav">
                    <div class="dropdown">
                        <a class="btn btn-danger dropdown-toggle" id="dropdownMenu"
                            data-bs-toggle="dropdown">{{Session::get('client')}}</a>
                        <ul class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenu">
                            <li><a class="dropdown-item" href="{{asset('purchase-history')}}"><i
                                        class="fas fa-file-medical-alt"></i> Lịch sử mua hàng</a></li>
                            <li><a class="dropdown-item" href="{{asset('logout-client')}}"><i
                                        class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
                        </ul>
                    </div>
                </ul>
            </div>
        </div>
        <div class="row row2" style="background-color:white; ">
            <div class="col-sm">
                <a href="{{asset('/')}}" style="background-color:white; color:#d0011b;;" class="btn btn-danger"
                    id="title"><i class="fas fa-igloo"></i>Tien Bakery
                    <span class="small">| Thanh toán</span>
                </a>
            </div>
        </div>
    </div>
    <div class="container wrapper">
        <div class="content">
            <!-- DEMO HTML -->
            <div class="container">
                <div class="row">
                    <div class="col-md-4 order-md-2 mb-4">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Thông tin giỏ hàng</span>
                        </h4>
                        <ul class="list-group mb-3 order">
                            <?php $tong=0;  
                                $id_kh=Session::get('id_client');
                            ?>
                            @if(is_array($idsp))
                            @foreach($idsp as $key => $val)
                            <?php 
                                
                                $result=DB::table('giohang')->join('sanpham','giohang.id_sp','=','sanpham.id_sp')
                                ->select('ten_sp','dongia_sp','soluong')->where(['giohang.id_sp'=>$val, 'id_kh' => $id_kh])->get();
                                foreach($result as $key => $res){
                                $tt = $res->dongia_sp * $res->soluong;
                            ?>
                               <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div class="name-item">
                                    <h6 class="my-0">{{$res->ten_sp}}</h6>
                                    <small class="text-muted">{{number_format($res->dongia_sp)}} đ x
                                        {{$res->soluong}}</small>
                                </div>
                                <span class="text-muted">{{number_format($tt)}}đ</span>
                            </li>
                            <input type="hidden" name="idsp[]" value="{{$val}}" form="formcheckout">
                            <?php 
                                $tong += $tt;
                                } 
                            ?>
                            @endforeach
                            @else 
                            <?php 
                                $result = DB::table('sanpham')->select('ten_sp','dongia_sp')->where('id_sp',$idsp)->get();
                            ?>
                            @foreach($result as $key => $res)
                            <?php 
                                $tt = $res->dongia_sp * $sl;
                                $tong += $tt; 
                            ?>
                            <li class="list-group-item d-flex justify-content-between lh-condensed">
                                <div class="name-item">
                                    <h6 class="my-0">{{$res->ten_sp}}</h6>
                                    <small class="text-muted">{{number_format($res->dongia_sp)}} đ x
                                        {{$sl}}</small>
                                </div>
                                <span class="text-muted">{{number_format($tt)}}đ</span>
                            </li>
                            <input type="hidden" name="idsp[]" value="{{$idsp}}" form="formcheckout">
                            @endforeach
                            @endif
                            <?php 
                                //$result = DB::table('sanpham')
                            ?>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tổng tiền hàng </span>
                                <span class="text-muted">{{number_format($tong)}}đ</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Phí vận chuyển </span>
                                <span class="text-muted">30,000đ</span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <span>Tổng thành tiền</span>
                                <strong>{{number_format($tong + 30000)}}đ</strong>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-8 order-md-1">
                        <h4 class="mb-3">Thông tin giao hàng</h4>
                        <form action="{{asset('/checkout')}}" method="POST" class="needs-validation" id="formcheckout"
                            novalidate>
                            {{csrf_field()}}
                            <?php
                                $customer = DB::table('khachhang')->where('khachhang.id_kh',$id_kh)->get();
                                // $cus = $customer ->fetch_assoc();
                                foreach($customer as $key => $cus){
                            ?>
                            <div class="row">
                                <div class="col-md mb-3">
                                    <label for="lastName">Họ tên</label>
                                    <input type="text" class="form-control" id="lastName" name="fullname"
                                        value="{{$cus->ht_kh}}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{$cus->email_kh}}" required>
                            </div>

                            <div class="mb-3">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="305c Nguyễn Văn Linh" required>
                                <div class="invalid-feedback">
                                    Vui lòng nhập địa chỉ vào
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="phone">Số điện thoại</label>
                                <input type="number" class="form-control" id="phone" required name="phone"
                                    value="{{$cus->sdt_kh}}">
                            </div>
                            <div class="row">
                                <h4 class="mb-3">Hình thức thanh toán</h4>
                                <div class="d-block my-3">
                                    <div class="custom-control custom-radio">
                                        <input id="credit" name="paymentMethod" type="radio" value="0"
                                            class="custom-control-input" checked required>
                                        <label class="custom-control-label" for="credit">Tiền mặt khi nhận hàng</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input id="debit" name="paymentMethod" type="radio" value="1"
                                            class="custom-control-input" required>
                                        <label class="custom-control-label" for="debit">VNPay</label>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                }
                            ?>
                            <hr class="mb-4">
                            <input type="hidden" name="total" value="{{$tong+30000}}">
                            <button type="submit" class="btn btn-primary btn-lg btn-block"
                                style="margin-bottom: 20px">Đặt hàng</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End Demo HTML -->
        </div>
    </div>
    <script src="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/js/jquery-3.5.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/js/popper.min.js')}}">
    </script>
    <script type="text/javascript" src="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/js/bootstrap.min.js')}}">
    </script>
</body>

</html>
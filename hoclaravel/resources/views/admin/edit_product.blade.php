<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add product</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('../public/admin_frontend/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{asset('../public/admin_frontend/css/sb-admin-2.min.css')}}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                	<div class="col-lg-5 d-none d-lg-block"><img src="{{asset('../public/admin_frontend/img/add_product.jpg')}}"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Thêm sản phẩm!</h1>
                            </div>
                            @foreach($edit as $key =>$val)
                            <form class="user" action="{{asset('edit-product/'.$val->id_sp)}}" method="POST" enctype="multipart/form-data">
                               {{csrf_field()}}
                                <?php 
                                    $message=Session::get('message');
                                    if($message){
                                        echo "<span style='color:red;'>".$message."</span>";
                                        Session::put('message',null);
                                    }
                                ?>
                                <div class="form-group row">
               						<div class="col-sm-6"><label for='tensp'>Tên sản phẩm</label></div>
                                    <div class="col-sm-6"><input type="text" id="tensp" required name ="name_product"
                                          value="{{$val->ten_sp}}"></div>
                               </div>
                               <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for='gia'>Giá sản phẩm</label>
                                    </div>
                                    <div class="col-sm-6">
                                       <input type="text" id="gia" required name="price" value="{{$val->dongia_sp}}"> (VNĐ)
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="sl">Số lượng</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" required name="amount" id="sl" value="{{$val->soluong_sp}}"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="mt">Mô tả sản phẩm</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <textarea name="description" id="" cols="30" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="hinh">Ảnh sản phẩm</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" required name="image">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="hinh">Ảnh mô tả</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="file" multiple required name="image_des[]">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="th">Thương hiệu</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <select id="th" name="brand">
                                            @foreach($list_brand as $key => $list)
                                            <option value="{{$list->id_th}}">{{$list->ten_th}}</option>
                                            @endforeach
                                         </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="reset" class="btn btn-primary"value="Làm lại">
                                        <input type="submit" class="btn btn-success" value="Cập nhật">
                                    </div>
                                </div>
                                <hr>
                            </form>
                            @endforeach
                            <div class="text-center">
                                <a class="small" href="dashboard">Back to homepage!</a>
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
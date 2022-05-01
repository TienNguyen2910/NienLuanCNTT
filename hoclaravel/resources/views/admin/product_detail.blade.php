<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add product detail</title>

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
                                <h1 class="h4 text-gray-900 mb-4">Thêm mô tả sản phẩm!</h1>
                            </div>
                            @foreach($item as $key =>$val)
                            <form class="user" action="{{asset('product-detail/'.$val->id_sp)}}" method="POST" enctype="multipart/form-data">
                              {{csrf_field()}}
                                <div class="form-group row">
               						<div class="col-sm-6"><label for='tpsp'>Thành phần sản phẩm</label></div>
                                    <div class="col-sm-6"><input type="text" id="tpsp" required name="ingredient_product"
                                          ></div>
                               </div>
                               <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for='klg'>Khổi lượng sản phẩm</label>
                                    </div>
                                    <div class="col-sm-6">
                                       <input type="text" id="klg" required name="mass"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="hdsd">Hướng dẫn sử dụng</label>
                                    </div>
                                    <div class="col-sm-6">
                                    <textarea name="manual" id="hdsd" cols="25" rows="2"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <label for="hsd">Hạn sử dụng</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" required name="expiration" id="hsd"> 
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">

                                    </div>
                                    <div class="col-sm-6">
                                        <input type="reset" class="btn btn-primary"value="Làm lại">
                                        <input type="submit" class="btn btn-success" value="Thêm">
                                    </div>
                                </div>
                                <hr>
                            </form>
                            @endforeach
                            <div class="text-center">
                                <a class="small" href="{{asset('/dashboard')}}">Back to homepage!</a>
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
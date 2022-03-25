<!DOCTYPE html>
<html>
<head>
	<title>Tien Bakery </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/css/bootstrap.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/css/style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/fontawesome-free-5.15.4/css/all.min.css')}}">
	<!-- Link CDN Bootstrap -->
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script> -->

</head>
<body>
	<div class="container-fluid header">
		<div class="row row1">
			<div class="col-sm">
				<ul id="nav">
					@if(!session()->has('client'))
					<li><a href="" class="btn btn-danger">Thông báo</a></li>
					<li><a href="" class="btn btn-danger">Hỗ trợ</a></li>
					<li><a href="{{asset('/register-client')}}" class="btn btn-danger">Đăng Ký</a></li>
					<li><a href="{{asset('/login-client')}}" class="btn btn-danger">Đăng Nhập</a></li>
					@else
					<div class="dropdown">
						<a class="btn btn-danger dropdown-toggle" id="dropdownMenu" data-bs-toggle="dropdown">{{Session::get('client')}}</a>
						<ul class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenu">
							<li><a class="dropdown-item" href="{{asset('logout-client')}}"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
						</ul>
					</div>
					@endif
				</ul>
			</div>
		</div>
		<div class="row row2">
			<div class="col-sm-4">
				<a href="{{asset('/')}}" class="btn btn-danger" id="title"><i class="fas fa-igloo"></i>Tien Bakery</a>
			</div>
			<div class="col-sm-6 search-cart">
				<form action="{{asset('search-product')}}" method="POST" enctype="multipart/form-data">
					{{csrf_field()}}
					<div class="form">
						<i class="fa fa-search"></i>
						<input type="search" class="form-control form-input" name="name_pro" placeholder=" Tìm kiếm sản phẩm ở đây">
						<button type="submit" class="btn btn-danger">Search</button>
					</div>
				</form>
			</div>
			<div class="col-sm-2 search-cart">
				<a href="{{asset('list-items')}}" class="btn btn-danger btn-cart"><i class="fas fa-cart-arrow-down icon"></i>
					<?php 
						if(session()->has('client')){
							$id_kh=Session::get('id_client');
							$count = DB::table('giohang')->where('id_kh',$id_kh)->count();
							echo "<span>".$count."</span>";
						}
					?>
				</a>
			</div>
		</div>
	</div>
	<div class="container wrapper">
		<div class="content">
			@yield('content')
		</div>
	</div>
	<script src="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/js/jquery-3.5.0.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/js/popper.min.js')}}"></script>
	<script type="text/javascript" src="{{asset('../public/bootstrap/bootstrap-5.1.1-dist/js/bootstrap.min.js')}}"></script>
</body>
</html>

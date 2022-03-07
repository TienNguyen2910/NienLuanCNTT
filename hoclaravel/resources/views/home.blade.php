<!DOCTYPE html>
<html>
<head>
	<title>Tien Bakery </title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../public/bootstrap/bootstrap-5.1.1-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../public/bootstrap/bootstrap-5.1.1-dist/css/style.css">
	<link rel="stylesheet" type="text/css" href="../public/bootstrap/bootstrap-5.1.1-dist/fontawesome-free-5.15.4/css/all.min.css">
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
					<li><a href="" class="btn btn-danger">Thông báo</a></li>
					<li><a href="" class="btn btn-danger">Hỗ trợ</a></li>
					<li><a href="" class="btn btn-danger">Đăng Ký</a></li>
					<li><a href="" class="btn btn-danger">Đăng Nhập</a></li>
				</ul>
			</div>
		</div>
		<div class="row row2">
			<div class="col-sm-4 ">
				<a href="index.php" class="btn btn-danger" id="title"><i class="fas fa-igloo"></i>Tien Bakery</a>
			</div>
			<div class="col-sm-6 search-cart">
				<div class="form">
					<i class="fa fa-search"></i>
					<input type="search" class="form-control form-input" placeholder=" Tìm kiếm sản phẩm ở đây">
				</div>
			</div>
			<div class="col-sm-2 search-cart">
				<a href="" class="btn btn-danger btn-cart"><i class="fas fa-cart-arrow-down icon"></i></a>
			</div>
		</div>
	</div>
	<div class="container wrapper">
		<div class="content">
			<div class="row">
				<div class="col-md-2">
					<div id="sidebar">
						<div id="title-sidebar">
							<i class="fas fa-list"></i> <h5>Danh mục</h5>
						</div>
						<ul class="content-sidebar">
							<li><a href="">Oreo</a></li>
							<li><a href="">LU</a></li>
						</ul>
					</div>
				</div>
				<div class="col-md-10">
					<div class="home-filter">
						<span class="home-filter_label">Sắp xếp theo</span>
						<a class="home-filter_btn btn btn-light" href="">Phổ biến</a>
						<a class="home-filter_btn btn btn-light" href="">Mới nhất</a>
						<a class="home-filter_btn btn btn-light" href="">Bán chạy</a>
						<div class="dropdown">
							<button class="btn btn-light dropdown-toggle" id="dropdownMenu" data-bs-toggle="dropdown">Giá</button>
							<ul class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenu">
								<li><a class="dropdown-item" href="#">Giá: từ thấp đến cao</a></li>
								<li><a class="dropdown-item" href="#">Giá: từ cao đến thấp</a></li>
							</ul>
						</div>
						<div class="pagination">
							<span class="page_num">
								<span class="page_cur">1</span>/3
							</span>
							<div class="page_control">
								<a class="btn" href=""> < </a>
								<a class="btn" href=""> > </a>
							</div>
						</div>
					</div>
					<div class="home-product">
						<div class="row">
							<div class="col-md-2">
								<div class="home-product-item">
									<div class="item-img" style="background-image: url('')"></div>
									<h5 class="item-name"></h5>
									<div class="item_origin">
										<span class="item_origin-name"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script src="../public/bootstrap/bootstrap-5.1.1-dist/js/jquery-3.5.0.min.js"></script>
	<script type="text/javascript" src="../public/bootstrap/bootstrap-5.1.1-dist/js/popper.min.js"></script>
	<script type="text/javascript" src="../public/bootstrap/bootstrap-5.1.1-dist/js/bootstrap.min.js"></script>
</body>
</html>

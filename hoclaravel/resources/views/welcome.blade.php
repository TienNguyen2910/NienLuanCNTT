@extends('home')
@section('content')
<div class="row">
	<div class="col-md-2">
		<div id="sidebar">
			<div id="title-sidebar">
				<i class="fas fa-list"></i> <h5>Danh mục</h5>
			</div>
			@foreach($list_brands as $key => $lbd)
			<ul class="content-sidebar">
				@if($lbd->trangthai_th>0)
				<li><a href="">{{$lbd->ten_th}}</a></li>
				@endif
			</ul>
			@endforeach
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
					<li><a class="dropdown-item" href="sort-low-to-high">Giá: từ thấp đến cao</a></li>
					<li><a class="dropdown-item" href="sort-high-to-low">Giá: từ cao đến thấp</a></li>
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
				@foreach($products as $key => $pro)
				<div class="col-md-2-4 col-sm-3">
					<a class="home-product-item" href="{{asset('client-product-detail/'.$pro->id_sp)}}">
						<div class="item-img" style="background-image:url({{asset('/admin_frontend/img/'.$pro->hinhanh_sp)}})"></div>
						<h5 class="item-name">{{$pro->ten_sp}}</h5>
						<div class="item-price">
							<span class="item-price-old">{{number_format($pro->dongiagoc_sp)}}đ</span>
							<span class="item-price-current">{{number_format($pro->dongia_sp)}}đ</span>
						</div>
						<div class="item_origin">
							<span class="item_origin-name">TP Hồ Chí Minh</span>
						</div>
						<div class="item_sale-off">
							<?php $ptgiam= 100- (($pro->dongia_sp*100)/$pro->dongiagoc_sp)?>
							<span class="item-sale-off-percent">{{round($ptgiam,0)}}%</span>
							<span class="item-sale-off-label">GIẢM</span>
						</div>
					</a>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection
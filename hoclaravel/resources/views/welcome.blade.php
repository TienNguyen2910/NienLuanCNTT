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
				<li><a href="{{asset('search-product-brands/'.$lbd->id_th)}}">{{$lbd->ten_th}}</a></li>
				@endif
			</ul>
			@endforeach
		</div>
	</div>
	<div class="col-md-10">
		<div class="home-filter">
			<span class="home-filter_label">Sắp xếp theo</span>
			<a class="home-filter_btn btn btn-light" href="{{asset('/')}}">Phổ biến</a>
			<a class="home-filter_btn btn btn-light" href="{{asset('new-product')}}">Mới nhất</a>
			<a class="home-filter_btn btn btn-light" href="{{asset('best-sell')}}">Bán chạy</a>
			<div class="dropdown">
				<button class="btn btn-light dropdown-toggle" id="dropdownMenu" data-bs-toggle="dropdown">Giá</button>
				<ul class="dropdown-menu dropdown-content" aria-labelledby="dropdownMenu">
					<li><a class="dropdown-item" href="{{asset('sort-low-to-high')}}">Giá: từ thấp đến cao</a></li>
					<li><a class="dropdown-item" href="{{asset('sort-high-to-low')}}">Giá: từ cao đến thấp</a></li>
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
			@yield('row_product')
		</div>
	</div>
</div>
@endsection
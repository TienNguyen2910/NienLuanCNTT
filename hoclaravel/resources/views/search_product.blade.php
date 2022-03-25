@extends('home')
@section('content')
<div class="row">
    @foreach($product as $key => $pro)
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
@endsection
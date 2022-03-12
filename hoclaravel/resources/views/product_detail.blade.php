@extends('home')
@section('content')
<div class="container" style="background-color:white">
<div class="row" style="margin-top:30px;">
	@foreach($product as $key => $pro)
	<div class="col-sm-6" style="text-align:center">
		<img src="{{asset('/admin_frontend/img/'.$pro->hinhanh_sp)}}" alt="Hình ảnh sản phẩm"> 
	</div>
	<div class="col-sm-6">
        <h4 class="title-product-detail">{{$pro->ten_sp}}</h4>
		<div class="item-price" style="line-height: 3;">
			<span class="item-price-old">{{number_format($pro->dongiagoc_sp)}}đ</span>
			<span class="item-price-current">{{number_format($pro->dongia_sp)}}đ</span>
		</div>
		<ul style="list-style-type:none;padding-left:0rem;"> <b>Mô tả sản phẩm</b>
			<li><b>Thành phần sản phẩm:</b> {{$pro->thanhphan_mt}}</li>
			<li><b>Khối lượng sản phẩm:</b> {{$pro->khoiluong_mt}}</li>
			<li><b>Hướng dẫn sử dụng:</b> {{$pro->hdsd_mt}}</li>
			<li><b>Hạn sử dụng: </b>{{$pro->hansd_mt}}</li>
		</ul>
	</div>
	@endforeach
</div>
<div class="row" style="padding-bottom:10px; margin-bottom:20px;">
    @foreach($image as $key =>$img)
    <div class="col-md-2">
		<img src="{{asset('admin_frontend/img/'.$img->duongdan)}}" alt="Hình ảnh mô tả" class="img-thumbnail">
	</div>
    @endforeach
</div>
</div>
@endsection
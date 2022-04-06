@extends('welcome')
@section('row_product')
<div class="row">
    @foreach($products as $key => $pro)
    <div class="col-md-2-4 col-sm-3">
        <a class="home-product-item" href="{{asset('client-product-detail/'.$pro->id_sp)}}">
            <div class="item-img" style="background-image:url({{asset('/admin_frontend/img/'.$pro->hinhanh_sp)}})">
            </div>
            <h5 class="item-name">{{$pro->ten_sp}}</h5>
            <div class="item-price">
                <span class="item-price-old">{{number_format($pro->dongiagoc_sp)}}đ</span>
                <span class="item-price-current">{{number_format($pro->dongia_sp)}}đ</span>
            </div>
            <?php 
				$result=DB::table('ctdonhang')->join('sanpham','ctdonhang.id_sp','=','sanpham.id_sp')
					->select('ctdonhang.id_sp',DB::raw('SUM(soluong_ct) as tongsl'))
					->where('ctdonhang.id_sp',$pro->id_sp)
					->groupBy('ctdonhang.id_sp')->get();
			?>
            <div class="item_origin">
                @foreach($result as $key => $value)
                    <span class="number-sell">Đã bán {{$value->tongsl}} </span>
                @endforeach
                @if(empty($result))
                    <span class="number-sell">Đã bán 0 </span>
                @endif
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
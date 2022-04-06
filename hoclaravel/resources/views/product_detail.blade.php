@extends('home')
@section('content')
<div class="container mt-5" style="background-color:white">
    <div class="row row-1">
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
            <div class="btn-product">
                <p class="btn-label">Số lượng</p>
                <button onclick="changeQuatity(-1)" name="minus" class=" btn btn-sub"> <i class="fas fa-minus"></i>
                </button>
                <form action="{{asset('add-quatity/'.$pro->id_sp)}}" id="form1" method="POST" class="form-quantity">
                    {{csrf_field()}}
                    <input type="number" min="1" name="qty" class="quantity" value="1">
                </form>
                <button onclick="changeQuatity(1)" name="plus" class=" btn btn-plus"><i
                        class="fas fa-plus"></i></button>
                <?php 
					$result=DB::table('ctdonhang')->join('sanpham','ctdonhang.id_sp','=','sanpham.id_sp')
					->select('ctdonhang.id_sp',DB::raw('SUM(soluong_ct) as tongsl'))
					->where('ctdonhang.id_sp',$pro->id_sp)
					->groupBy('ctdonhang.id_sp')->get();
				?>
                @foreach($result as $key =>$value)
					<span>{{$pro->soluong_sp - $value->tongsl}} sản phẩm có sẵn</span>
                @endforeach
                
            </div>
        </div>
        @endforeach
    </div>
    <div class="row row-2">
        @foreach($image as $key =>$img)
        <div class="col-md-2">
            <img src="{{asset('admin_frontend/img/'.$img->duongdan)}}" alt="Hình ảnh mô tả" class="img-thumbnail">
        </div>
        @endforeach
        <div class="col-md-6">
            <?php $message= Session::get('message'); 
				$mess = Session::get('mess'); 
			?>
            @if($message)
            <div class="toast" id="toastNotice">
                <div class="toast-header">
                    <strong class="me-auto">Thông báo</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{$message}}
                    <?php Session::put('message',null); ?>
                </div>
            </div>
            @elseif(!empty($mess))
            <div class="toast" id="toastNotice">
                <div class="toast-header">
                    <strong class="me-auto">Thông báo</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    {{$mess}}
                    <?php Session::put('mess',null); ?>
                </div>
            </div>
            @endif
            <div class="link-cart-product">
                <button id="toastbtn" onclick="myalert()" type="submit" form="form1" class="btn btn-info"><i
                        class="fas fa-cart-plus"></i> Thêm vào giỏ hàng</button>
                <a href="" class="btn btn-danger">Mua hàng</a>
            </div>
        </div>
    </div>
</div>

<script>
function changeQuatity(temp) {
    var index = document.getElementsByClassName("quantity")[0].value; //kiểu string
    console.log(index);
    var i = parseInt(index); //chuyển index sang kiểu int
    i = i + temp;
    console.log(i);
    if (i < 1) {
        i = 1;
    }
    index = i.toString();
    console.log(index);
    document.getElementsByClassName("quantity")[0].setAttribute("value", index);
}

function myalert() {
    var myAlert = document.getElementById("toastNotice");
    var bsAlert = new bootstrap.Toast(myAlert);
    bsAlert.show(4000);
}
</script>
@endsection
@extends('home')
@section('content')
<h4 style="text-align:center; margin:17px 0 17px 0">Giỏ hàng của bạn {{Session::get('client')}}</h4>
<script>    var ST=[]; </script>
<table class="table">
	<thead class="table-dark">
		<tr>
			<th colspan="2">STT</th>
			<th colspan="2">Sản phẩm</th>
			<th>Đơn giá</th>
			<th>Số lượng</th>
			<th>Số tiền</th>
			<th>Thao tác</th>
		</tr>
	</thead>
	<tbody>
		<?php $count = 0 ?>
        <form action="{{asset('order-item')}}" id="formorder" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
            @foreach($item_cart as $key => $item)
                <?php $count++ ;
                    $sotien = $item->dongia_sp * $item->soluong;
                ?>
                <script>
                    ST[{{$count}}] = {{$sotien}};
                </script>
                <tr>
                    <td><input type="checkbox" onclick="diplcontent({{$count}})" form="formorder" class="action" name="idsp[]" value="{{$item->id_sp}}"></td>
                    <td>{{$count}}</td>
                    <td class="col-img"><img src="{{asset('/admin_frontend/img/'.$item->hinhanh_sp)}}" alt="hình ảnh sản phẩm"></td>
                    <td>{{$item->ten_sp}}</td>
                    <td>{{number_format($item->dongia_sp)}} đ</td>
                    <td>
                        <div class="btn-product">
                            <button type="submit" form="form{{$count}}" name="minus" class=" btn btn-sub" > <i class="fas fa-minus"></i> </button>
                            <form action="{{asset('minus-quantity/'.$item->id_gh)}}" id="form{{$count}}" method="POST" class="form-quantity">
                            {{csrf_field()}}
                                <input type="number" min="1" name="qty" class="quantity" value="{{$item->soluong}}">
                            </form>
                            <button type="submit" form="form{{$count}}" formaction="{{asset('plus-quantity/'.$item->id_gh)}}" name="plus" class=" btn btn-plus"><i class="fas fa-plus"></i></button>
                        </div>
                    </td>
                    <td style="color:red;" class="price">{{number_format($sotien)}} đ</td>
                    <td>
                        <a href="{{asset('delete-cart/'.$item->id_gh)}}" class="btn"><i class='far fa-trash-alt'></i> Xoá</a>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" style="text-align:center;font-size:18px;">Tổng tiền</td>
                <td colspan="2"></td>
                <td colspan="2" style="color:red; font-size:18px;" id="total">0 đ</td>
            </tr>
            <tr>
                <td colspan="8" style="text-align:center"><button type="submit" form="formorder" class="btn btn-danger">Mua hàng</button></td>
            </tr>
        </form>
	</tbody>
</table>
<script>
var stien=0;
    function diplcontent(dem){
        //console.log(dem);
        const numberFormat = new Intl.NumberFormat('vi-VN', {
                                                style: 'currency',
                                                currency: 'VND',
                                            });

        var c = document.getElementsByClassName("action")[dem-1];
        if(c.checked  === true){
            stien += ST[dem];
            document.getElementById("total").innerHTML= numberFormat.format(stien);
        }
        else {
            stien -= ST[dem];
            document.getElementById("total").innerHTML=numberFormat.format(stien);
        } 
    }
</script>
@endsection
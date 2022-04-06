@extends('home')
@section('content')
<div class="row">
    <h4 style="text-align:center">Thông tin đơn hàng</h4>
</div>
<div class="row">
    <div class="col-md">
        <table class="table ">
            <thead>
                <tr>
                    <th style="width:155px;">Mã đơn hàng</th>
                    <th>Ngày đặt</th>
                    <th>Địa chỉ giao</th>
                    <th style="width:155px;">Trạng thái</th>
                    <th style="width:155px;">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0; ?>
                @foreach($id_dh as $key => $id)
                <tr>
                    <td>{{$id->id_dh}}</td>
                    <td>{{$id->ngaydat_dh}}</td>
                    <td>{{$id->noigiao_dh}}</td>
                    <?php 
                        switch ($id->trangthai_dh) {
                            case '-1':
                                echo"<td style='color:red;'> Đơn đã hủy</td>
                                     <td></td>";
                                break;
                            case '0':
                                echo"<td style='color:#006400;'> Đơn mới tạo</td>";
                                echo "<td><a class='btn' onclick='detail_order({$i})'><i class='fas fa-eye'></i></a>";
                    ?>                
                                    <a class='btn btn-info' onclick="return confirm('Bạn có muốn mã đơn {{$id->id_dh}} này không ?')" href='{{asset('delete-order/'.$id->id_dh)}}'>Huỷ</a>
                                </td>
                    <?php        break;	
                            case '1':
                                echo"<td style='color: #FF8C00'> Đang được xử lý</td>";
                                echo "<td><a class='btn' onclick='detail_order({$i})' ><i class='fas fa-eye'></i></a>";
                    ?>
                                    <a class='btn btn-info' onclick="return confirm('Bạn có muốn mã đơn {{$id->id_dh}} này không ?')" href='{{asset('delete-order/'.$id->id_dh)}}'>Huỷ</a>
                                </td>
                    <?php            break;
                            case '2':
                                echo"<td style='color: #2715bd'> Đơn đã giao</td>";
                                echo"<td><a class='btn' onclick='detail_order({$i})' ><i class='fas fa-eye'></i></a>";
                    ?>
                                    <a class='btn btn-danger'  href="{{asset('confirm-order/'.$id->id_dh)}}">Đã nhận</a>
                                </td>
                    <?php            break;
                            case '3':
                                echo"<td style='color:#FF1493;'>Đã nhận hàng</td>";
                                echo"<td><a class='btn' onclick='detail_order({$i})'><i class='fas fa-eye'></i></a></td>";
                            break;
                        }
                    ?>
                </tr>
                <!-- seen order detail Modal -->
                <div class="modal" tabindex="-1">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Chi tiết đơn hàng</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <?php 
                                    $id_ct = DB::table('ctdonhang')->join('sanpham','sanpham.id_sp','=','ctdonhang.id_sp')
                                    ->select('ten_sp','hinhanh_sp','dongia','soluong_ct')->where('id_dh',$id->id_dh)->get();
                                    $tongtien=0;
                                ?>
                                @foreach($id_ct as $key => $val)
                                <div class="product-order">
                                    <img src="{{asset('/admin_frontend/img/'.$val->hinhanh_sp)}}" class="img-product"
                                        alt="">
                                    <span class="my-0">{{$val->ten_sp}}</span>
                                    <span class="text-muted">{{number_format($val->dongia)}} đ</span>
                                    <span class="quantity">x {{$val->soluong_ct}}</span>
                                </div>
                                <?php $tongtien += $val->dongia * $val->soluong_ct; ?>
                                @endforeach
                            </div>
                            <div class="modal-footer">
                                <p>Tổng tiền:</p>
                                <span class="total">{{number_format($tongtien)}} đ</span>
                            </div>
                        </div>
                    </div>
                </div><!-- end sen order detail -->
                <?php $i++; ?>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
    function detail_order(dem) {
        //console.log(dem);
        var myModal = document.getElementsByClassName("modal")[dem];
        myModal.style="display:block";
        document.getElementsByClassName("btn-close")[dem].onclick=function(){
            myModal.style="display:none;";
        };
    }
</script>
@endsection
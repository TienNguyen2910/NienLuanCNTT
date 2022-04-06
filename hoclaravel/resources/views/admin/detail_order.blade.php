@extends('admin.admin_index')
@section('admin_content')
<div class="card shadow mb-4">
    @foreach($order as $key => $value)
    <div class="card-header py-3">
        <h4 class="m-0 font-weight-bold text-primary">Đơn hàng</h4>
        <span> Mã đơn #{{$value->id_dh}}</span>
        @if($value->trangthai_dh < 2) <p style="color:#ff0047; margin-bottom: 0rem;">Chưa giao</p>
            @else
            <p style="color:#ff0047; margin-bottom: 0rem;">Đã giao hàng</p>
            @endif
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div class="row">
                <div class="col-md-8">
                    <h5 class="title">Chi tiết đơn hàng</h5>
                    <?php
                        $ctd = DB::table('ctdonhang')->join('sanpham','sanpham.id_sp','=','ctdonhang.id_sp')
                        ->select('id_dh','ten_sp','hinhanh_sp','dongia','soluong_ct')->where('id_dh',$value->id_dh)->get();
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i=1; $tong=0; ?>
                            @foreach($ctd as $key => $ct)
                            <tr>
                                <td>{{$i}}</td>
                                <td><img src="{{asset('admin_frontend/img/'.$ct->hinhanh_sp)}}" width='45%'
                                        alt="hinh anh san pham"></td>
                                <td>{{$ct->ten_sp}}</td>
                                <td>{{$ct->soluong_ct}}</td>
                                <td>{{number_format($ct->dongia)}}đ</td>
                            </tr>
                            <?php $i++; $tong +=$ct->soluong_ct * $ct->dongia; ?>
                            @endforeach
                            <tr>
                                <td colspan="4" style="text-align:center;">Tổng tiền hàng</td>
                                <td>{{number_format($tong)}}đ</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align:center;">Phí vận chuyển </td>
                                <td>{{number_format(30000)}}đ</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="text-align:center; color:black;">Tổng thành tiền</td>
                                <td style="color: black">{{number_format($value->tongtien_dh)}}đ</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-4">
                    <h5 class="title">Khách hàng</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><span>Họ tên người đặt</span><br>
                            {{$value->ht_kh}}</li>
                        <li class="list-group-item"><span>Ngày đặt hàng</span><br>
                            {{$value->ngaydat_dh}}</li>
                        <li class="list-group-item"><span>Số điện thoại</span><br>
                            {{$value->sdt_kh}}</li>
                        <li class="list-group-item"><span>Địa chỉ giao</span><br>
                            {{$value->noigiao_dh}}</li>
                        <li class="list-group-item"><span>Hình thức thanh toán</span><br>
                            @if($value->noigiao_dh!=0)
                            Tiền mặt
                            @else Thanh toán online
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <a href="{{asset('manage-order')}}" class="btn btn-link">
                        < Back</a>
                </div>
                <div class="col-md-8">
                    @if($value->trangthai_dh <3)
                    <div class="form-browser">
                        <form action="{{asset('inspect-order/'.$value->id_dh)}}" method="POST">
                            {{csrf_field()}}
                            <label for="tt">Trạng thái đơn hàng</label>
                            <select name="tt" id="tt">
                                <option value="1">Đang được xử lý</option>
                                <option value="2">Đơn đã giao</option>
                            </select>
                            <button type="submit" class="btn btn-success">Duyệt</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
@extends('admin.admin_index')
@section('admin_content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Quản lý đơn hàng</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Mã hàng</th>
                        <th>Họ tên khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết đơn</th>
                        <th>Hủy đơn</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Mã hàng</th>
                        <th>Họ tên khách hàng</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Chi tiết đơn</th>
                        <th>Hủy đơn</th>
                        <th>Hành động</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($list_orders as $key => $order)
                    <tr>
                        <td>{{$order->id_dh}}</td>
                        <td>{{$order->ht_kh}}</td>
                        <td>{{$order->ngaydat_dh}}</td>
                        <?php
                            switch ($order->trangthai_dh) {
                                case '0':
                                    echo"<td style='color:#006400;'> Đơn mới tạo</td>";
                                    break;  
                                case '1':
                                    echo"<td style='color: #FF8C00'> Đang được xử lý</td>";
                                    break;
                                case '2':
                                    echo"<td style='color: #2715bd'> Đơn đang giao</td>";
                                    break;
                                case '3':
                                    echo"<td style='color:#FF1493;'>Khách đã nhận hàng</td>";
                                    break;
                                default :
                                    echo "<td style='color:red;'>Đã hủy</td>";
                                    break;
                            }
                         ?>
                        </td>
                        @if($order->huy_dh !=0)<td></td>
                        <td style="color: OrangeRed;font-weight:bold">Yêu cầu hủy đơn</td>
                        @else
                        <td style="text-align:center"><a href="{{asset('detail-order/'.$order->id_dh)}}" class="btn btn-link"><i
                                    class="fas fa-eye"></i></a></td>
                        <td></td>
                        @endif
                        <td style="text-align:center"><a href="{{asset('cancel-order/'.$order->id_dh)}}"
                                class="btn btn-danger" style="font-size: 15px;"><i class="fas fa-trash-alt"></i>
                                Delete</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
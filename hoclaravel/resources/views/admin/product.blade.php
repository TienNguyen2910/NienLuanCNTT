@extends('admin.admin_index')
 @section('admin_content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Sản phẩm</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="{{asset('add-product')}}" class="btn btn-primary btn-add">Thêm sản phẩm </a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Đơn giá gốc</th>
                        <th>Đơn giá đã giảm</th>
                        <th>Số lượng tồn</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th id="col-img">Hình ảnh</th>
                        <th>Đơn giá gốc</th>
                        <th>Đơn giá đã giảm</th>
                        <th>Số lượng tồn</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php $count=1; ?>
                   @foreach($list_product as $key => $cate_pro)
                    <tr>
                            <td><?php echo $count; ?></td>
                            <td><a href="{{asset('product-detail/'.$cate_pro->id_sp)}}" class="description">{{$cate_pro->ten_sp}}</a></td>
                            <td class="img"><img src="../public/admin_frontend/img/{{$cate_pro->hinhanh_sp}}" alt="hình ảnh sản phẩm" class="ad-image_product"></td>
                            <td>{{number_format($cate_pro->dongiagoc_sp)}} đ</td>
                            <td>{{number_format($cate_pro->dongia_sp)}} đ</td>
                            <td>{{$cate_pro->soluong_sp}}</td>
                            <td class="discreption_pro">{{$cate_pro->mota_sp}}</td>
                            <td>
                                <a href="{{asset('/edit-product/'.$cate_pro->id_sp)}}" id='nut_edit'><i class='fas fa-pencil-alt'></i>Edit</a>
                                <a onclick="return confirm('Bạn có muốn xóa sản phẩm này không!!')" href="{{asset('/delete-product/'.$cate_pro->id_sp)}}" id='nut_del'><i class='fas fa-minus-circle'></i>Delete</a>
                            </td>
                    </tr>
                        <?php  $count++; ?>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
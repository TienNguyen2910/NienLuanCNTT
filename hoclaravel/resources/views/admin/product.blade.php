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
                        <th>Đơn giá</th>
                        <th>Số lượng tồn</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Hình ảnh</th>
                        <th>Đơn giá</th>
                        <th>Số lượng tồn</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php  $count=1; ?>
                   @foreach($list_product as $key => $cate_pro)
                    <tr>
                            <td><?php echo $count; ?></td>
                            <td>{{$cate_pro->ten_sp}}</td>
                            <td><img src="{{$cate_pro->hinhanh_sp}}" alt="hình ảnh sản phẩm" class="ad-image_product"></td>
                            <td>{{$cate_pro->dongia_sp}}</td>
                            <td>{{$cate_pro->soluong_sp}}</td>
                            <td>{{$cate_pro->mota_sp}}</td>
                            <td><a href="{{asset('/edit-brand/'.$cate_pro->id_th)}}" id='nut_edit'><i class='fas fa-pencil-alt'></i>Edit</a>
                            <a onclick="return confirm('Bạn có muốn xóa thương hiệu này không!!')" href="{{asset('/delete-brand/'.$cate_pro->id_th)}}" id='nut_del'><i class='fas fa-minus-circle'></i>Delete</a></td>
                    </tr>
                        <?php  $count++; ?>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@extends('admin.admin_index')
 @section('admin_content')
 <!-- DataTales Example -->
 <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Danh mục sản phẩm</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="{{asset('add-brand-product')}}" class="btn btn-primary btn-add">Thêm danh mục sản phẩm </a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục sản phẩm</th>
                        <th>Hiện thị/ Ẩn</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>STT</th>
                        <th>Tên danh mục sản phẩm</th>
                        <th>Hiện thị/ Ẩn</th>
                        <th>Hành động</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php  $count=1; ?>
                   @foreach($list_brand as $key => $cate_pro)
                    <tr>
                            <td><?php echo $count; ?></td>
                            <td>{{$cate_pro->ten_th}}</td>
                            <td>
                                <?php 
                                    $status=$cate_pro->trangthai_th;
                                    switch ($status) {
                                        case '1':
                                            echo "Hiện thị";
                                            break;
                                        case '0':
                                             echo "Ẩn";
                                            break;
                                    }
                                ?>
                            </td>
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
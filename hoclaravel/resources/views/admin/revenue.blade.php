@extends('admin.admin_index')
@section('admin_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thống kê doanh thu bán hàng</h6>
    </div>
    <div class="card-body">
        <form action="" autocomplete="off">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <p>Từ ngày: <input type="date" id="datepicker" class="form-control"></p>
                    <input type="button" id="btn-dashboard-filter" class="btn btn-info btn-sm" style="color:black" value="Lọc kết quả">
                </div>
                <div class="col-md-3">
                    <p>Đến ngày: <input type="date" class="form-control"></p>
                </div>
                <div class="col-md-3">
                    <p>Lọc theo:
                        <select name="" class="form-control">
                            <option>-- chọn ---</option>
                            <option value="7ngaytruoc">7 ngày trước</option>
                            <option value="thangtruoc">Tháng trước</option>
                            <option value="thangnay">Tháng này</option>
                            <option value="1nam"> 1 năm</option>
                        </select>
                    </p>
                </div>
                <div class="col-md-3"></div>
            </div>
        </form>
    </div>
</div>
@endsection
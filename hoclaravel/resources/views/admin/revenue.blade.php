@extends('admin.admin_index')
@section('admin_content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Thống kê doanh thu bán hàng</h6>
    </div>
    <div class="card-body">
        <form autocomplete="off">
            @csrf
            <div class="row">
                <!-- <div class="col-md-3">
                    <p>Từ ngày: <input type="date" name="from_date" id="datepicker" class="form-control"></p>
                </div>
                <div class="col-md-3">
                    <p>Đến ngày: <input type="date" name="to_date" id="datepicker2" class="form-control"></p>
                </div> -->
                <div class="col-md-3">
                    <p>Lọc theo:
                        <select name="choose" id="choose" class="form-control">
                            <option>-- chọn ---</option>
                            <option value="thang">Tháng</option>
                            <option value="1nam"> 1 năm</option>
                        </select>
                    </p>
                    <input type="button" id="btn-dashboard-filter" class="btn btn-info btn-sm" style="color:black"
                        value="Lọc kết quả">
                </div>
                <div class="col-md-3"></div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div id="idchart" style="height: 250px;"></div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
$(document).ready(function() {
    var chart = new Morris.Bar({
        element: 'idchart',
        parseTime: false,
        hideHover: 'auto',
        // resize:true,
        // width:17,
        xkey: 'period',
        ykeys: ['order'],
        labels: ['doanh thu']

    });

    function setMorris(data) {
        chart.setData(data);
    }
    $("#btn-dashboard-filter").click(function() {
        var _token = $('input[name="_token"]').val();
        var option= $("#choose").val();
        //alert(option);
        $.ajax({
            url: "{{url('/filter-by-date')}}",
            type: "GET",
            catch: false,
            dataType: "JSON",
            data: {
                option: option,
                _token: _token
            },
            success: function(result) {
                setMorris(result);
            }
        });
    });
});
</script>
@endsection
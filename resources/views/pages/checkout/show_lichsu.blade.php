@extends('welcome')
@section('content')
<div class="table-agile-info">
    <div class="panel panel-default">
        <div style="
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
        padding: 10px 0;">

            <a href="{{URL::to('/show-lichsu')}}" class="btn" ui-toggle-class="" style="padding: 0;">
                <button style="background-color: #d3ff88;border-radius: 10px; width: 120px;height:40px;">
                    Tất cả đơn hàng
                </button>
            </a>
            <a href="{{URL::to('/loc-order-xuly-cus')}}" class="btn" ui-toggle-class="" style="padding: 0;">
                <button style="background-color: #88ff98;border-radius: 10px; width: 110px;height:40px">
                    Đang chờ xử lý
                </button>
            </a>
            <a href="{{URL::to('/loc-order-dagoi-cus')}}" class="btn" ui-toggle-class="" style="padding: 0;">
                <button style="background-color: rgb(143, 247, 212);border-radius: 10px; width: auto;height:40px">
                    Đã gói
                </button>
            </a>
            <a href="{{URL::to('/loc-order-danggiao-cus')}}" class="btn" ui-toggle-class="" style="padding: 0;">
                <button style="background-color: rgb(155, 249, 184);border-radius: 10px;width: auto;height:40px">
                    Đang giao
                </button>
            </a>
            <a href="{{URL::to('/loc-order-hoanthanh-cus')}}" class="btn" ui-toggle-class="" style="padding: 0;">
                <button style="background-color: rgb(252, 168, 252);border-radius: 10px;width: auto;height:40px">
                    Hoàn thành
                </button>
            </a>
            <a href="{{URL::to('/loc-order-huy-cus')}}" class="btn" ui-toggle-class="" style="padding: 0;">
                <button style="background-color: rgb(251, 103, 170);border-radius: 10px;width: auto;height:40px">
                    Đã hủy
                </button>
            </a>
        </div>
        <div class="panel-heading" style="text-align: center;font-size: 23px;font-weight: bold; color: #ff8b00;">
            Lịch sử mua hàng của bạn
        </div>
        <div class="table-responsive">
            <table class="table table-striped b-t b-light">
                <thead>
                    <tr>
                        {{-- <th>Tên người đặt</th> --}}
                        <th>Ngày đặt</th>
                        <th>Tổng tiền</th>
                        <th>Giảm giá</th>
                        <th>Thanh toán</th>
                        <th>TT Thanh toán</th>
                        <th>Trạng thái</th>
                        <th>Xem chi tiết</th>
                        <th>Hủy đơn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($history as $his)
                    <tr>
                        <td>
                            <?php
                            $thoigian = $his->order_date_time;
                            echo date('H:m:s d/m/Y', strtotime($thoigian));
                            ?>
                        </td>
                        <td>{{number_format($his->order_total).' '.' VND'}}</td>
                        <td>{{number_format($his->giam_gia).' '.' VND'}}</td>
                        <td>{{number_format($his->so_tien_phai_tra).' '.' VND'}}</td>
                        <td>{{$his->payment_status }}</td>
                        <td>{{$his->order_status }}</td>
                        <td>
                            {{-- <a href="{{URL::to('/show-chitiet-lichsu/'.$his->order_id)}}" class="active styling-edit" ui-toggle-class="">
                            <i class="fa fa-caret-square-o-right" aria-hidden="true" style="font-size: 20px; margin-left: 60px;"></i>
                            </a> --}}
                            <a href="{{URL::to('/show-chitiet-lichsu/'.$his->order_id)}}" class="btn" ui-toggle-class="">
                                <button style="background-color: rgb(248, 255, 166);border-radius: 10px;width: 90px;">
                                    Xem chi tiết
                                </button>
                            </a>
                        </td>
                        @if($his->order_status != 'Đã hoàn thành')
                        @if($his->order_status != 'Đã hủy')
                        <td>
                            <a href="{{URL::to('/update-order-huy/'.$his->order_id)}}" class="btn" ui-toggle-class="">
                                <button style="background-color: rgb(252, 168, 252);border-radius: 10px;width: 70px;">
                                    Hủy đơn
                                </button>
                            </a>
                        </td>
                        @endif
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <footer class="panel-footer">
            <div class="row">

                <div class="col-sm-12 text-center">
                    <div class="card-footer clear-fix">
                        {!! $history ->links() !!}
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
{{-- <script>
    function update_gh(){
        location.reload();
    }
</script> --}}
@endsection
@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div>

        <a href="{{URL::to('/manage-order')}}" class="btn" ui-toggle-class="">
            <button style="background-color: #d3ff88;border-radius: 10px; width: 120px;height:40px;">
                Tất cả đơn hàng
            </button>
        </a>
        <a href="{{URL::to('/loc-order-xuly')}}" class="btn" ui-toggle-class="">
            <button style="background-color: #88ff98;border-radius: 10px; width: 120px;height:40px">
                Đang chờ xử lý
            </button>
        </a>
        <a href="{{URL::to('/loc-order-dagoi')}}" class="btn" ui-toggle-class="">
            <button style="background-color: rgb(143, 247, 212);border-radius: 10px; width: 120px;height:40px">
                Đã gói
            </button>
        </a>
        <a href="{{URL::to('/loc-order-danggiao')}}" class="btn" ui-toggle-class="">
            <button style="background-color: rgb(155, 249, 184);border-radius: 10px;width: 120px;height:40px">
                Đang giao
            </button>
        </a>
        <a href="{{URL::to('/loc-order-hoanthanh')}}" class="btn" ui-toggle-class="">
            <button style="background-color: rgb(252, 168, 252);border-radius: 10px;width: 120px;height:40px">
                Hoàn thành
            </button>
        </a>
        <a href="{{URL::to('/loc-order-huy')}}" class="btn" ui-toggle-class="">
            <button style="background-color: rgb(251, 103, 170);border-radius: 10px;width: 120px;height:40px">
                Đã hủy
            </button>
        </a>
    </div>
    <div class="panel-heading">
      Liệt kê đơn hàng
    </div>
    <div class="row w3-res-tb">
        <div class="col-sm-3">
          <form action="{{URL::to('/tim-kiem-order')}}" method="POST">
              {{ csrf_field() }}
              <div class="input-group" style="display: flex;">
              <input type="text" name="keywords_submit" class="input-sm form-control" placeholder="Nhập Mã Đơn"/>
              <input type="submit" name="search_items" style="color:#000;margin-top: 0"class="btn btn-primary btn-sm" value="Tìm kiếm"/>
              </div>
          </form>
        </div>
      </div>
    <div class="table-responsive">
    <?php
	use Illuminate\Support\Facades\Session;
    $message = Session::get('message');
    if($message){
        echo '<span class="text-alert">',$message.'</span>';
        Session::put('message',null);
    }
    ?>
      <table class="table table-striped b-t b-light">
        <style>
            .table.active.btn button{
                background-color: aquamarine;
                font-size: 25px;
            }
        </style>
        <thead>
          <tr>
            <th>Mã đơn</th>
            <th>Tên</th>
            <th>Ngày đặt</th>
            <th>Tổng tiền</th>
            {{-- <th>Giảm giá</th> --}}
            <th>Số tiền phải trả</th>
            <th>Thanh toán</th>
            <th>Tình trạng</th>
            <th style="width: 100px;">Cập nhật trạng thái</th>
            <th>Xem c.tiết</th>
            <th>In đơn</th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_order as $key => $order)

          <tr>
            <td>#{{$order->order_id }}</td>
            <td>{{$order->customer_name }}</td>
            <td>
            <?php
               $thoigian = $order->order_date_time;
               echo date('H:m:s d/m/Y', strtotime($thoigian));
            ?>
            </td>
            <td style="width: 135px;">{{number_format($order->order_total).' '.' VND'}} <p style="color: red">- {{number_format($order->giam_gia).' '.' VND'}}</p></td>
            {{-- <td></td> --}}
            <td>{{number_format($order->so_tien_phai_tra).' '.' VND'}}</td>
            <td>{{$order->payment_status }}</td>
            <td>{{$order->order_status }}</td>
            <td style="width: 175px;">
                {{-- <div class="row" >
                    <div  style="">
                        <form action="">
                            @csrf
                            <select name="sorts" id="sorts" class="form-control">
                                <option value="">--Chọn TT--</option>
                                <option value="{{ url('/update-order-xuly/'.$order->order_id)}}">Đang chờ xử lý</option>
                                <option value="{{ url('/update-order-dagoi/'.$order->order_id)}}">Đã gói</option>
                                <option value="{{ url('/update-order-danggiao/'.$order->order_id)}}">Đang giao</option>
                                <option value="{{ url('/update-order-hoanthanh/'.$order->order_id)}}">Hoàn thành</option>
                                <option value="{{ url('/update-order-huy-admin/'.$order->order_id)}}">Hủy</option>
                            </select>
                        </form>
                    </div>
                </div>
                <script type="text/javascript">
                    $(document).ready(function(){
                       $('#sorts').on('change',function(){
                           var url = $(this).val();
                           if(url){
                               window.location = url;
                           }
                           return false;
                       });
                    });
                </script> --}}

                <a href="{{URL::to('/update-order-xuly/'.$order->order_id)}}" class="btn1" ui-toggle-class="">
                    <button style="background-color: rgb(136, 255, 152);border-radius: 10px; width: 60px; margin: 5px">
                        C.xử lý
                    </button>
                </a>
                <a href="{{URL::to('/update-order-dagoi/'.$order->order_id)}}" class="btn1" ui-toggle-class="">
                    <button style="background-color: rgb(143, 247, 212);border-radius: 10px; width: 60px;margin: 5px">
                        Đã gói
                    </button>
                </a>
                <a href="{{URL::to('/update-order-danggiao/'.$order->order_id)}}" class="btn1" ui-toggle-class="">
                    <button style="background-color: rgb(155, 249, 184);border-radius: 10px;width: 60px;margin: 5px">
                        Đ.giao
                    </button>
                </a>
                <a href="{{URL::to('/update-order-hoanthanh/'.$order->order_id)}}" class="btn1" ui-toggle-class="">
                    <button style="background-color: rgb(252, 168, 252);border-radius: 10px;width: 60px;margin: 5px">
                        H.thành
                    </button>
                </a>
                <a href="{{URL::to('/update-order-huy-admin/'.$order->order_id)}}" class="btn1" ui-toggle-class="">
                    <button style="background-color: rgb(251, 113, 251);border-radius: 10px;width: 60px;margin: 5px">
                        Hủy
                    </button>
                </a>
            </td>
            <td>
                {{-- <a href="{{('/view-order/'.$order->order_id)}}" class="active styling-edit" ui-toggle-class="">
                    <i class="fa fa-cart-arrow-down" aria-hidden="true"></i>
                </a> --}}
                <a href="{{('/view-order/'.$order->order_id)}}" class="btn1" ui-toggle-class="">
                    <button style="background-color: rgb(243, 149, 216);border-radius: 10px;width: 70px;">
                        Chi tiết
                    </button>
                </a>
            </td>
            {{-- @if($order->order_status=='Đang chờ xử lý') --}}
            <td>
                <a href="/in-hoadon/{{ $order->order_id }}" class="btn1" ui-toggle-class="" target="_blank">
                    <button style="background-color: rgb(252, 168, 252);border-radius: 10px;width: 70px;">
                        In đơn
                    </button>
                </a>
            </td>
            {{-- @endif --}}
          </tr>
          @endforeach
        </tbody>
      </table>

    </div>
    <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-12 text-center">
            <div class="card-footer clear-fix">
                {!! $all_order->links() !!}
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

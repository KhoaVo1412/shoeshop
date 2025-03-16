@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê chi tiết sản phẩm
    </div>
    <div class="row w3-res-tb">
        <div class="col-sm-3">
          <form action="{{URL::to('/tim-kiem-chitiet-sp')}}" method="POST">
              {{ csrf_field() }}
              <div class="input-group" style="display: flex;">
              <input type="text" name="keywords_submit" class="input-sm form-control"/>
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
        <thead>
          <tr>
            <th>Tên sản  phẩm</th>
            <th>Size</th>
            <th>Màu</th>
            <th>Số lượng</th>
            <th></th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_product_details as $key => $pro_details)
          <tr>
            <td>{{ $pro_details->product_name }}</td>
            <td>{{ $pro_details->size_name }}</td>
            <td>{{ $pro_details->color_name }}</td>

            <td>{{ $pro_details->quantity }}</td>

            <td>
              <a href="{{URL::to('/edit-product-details/'.$pro_details->product_details_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
                <a onclick="return confirm('Bạn chắc chắn muốn xóa không?')" href="{{URL::to('/delete-product-details/'.$pro_details->product_details_id)}}" class="active styling-edit" ui-toggle-class="">
                  <i class="fa fa-times text-danger text"></i></a>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
        <div class="row">
            <div class="col-sm-4 text-center">
                <div class="card-footer clear-fix">
                    {!! $all_product_details->links() !!}
                </div>
            </div>
        </div>

    </footer>
  </div>
</div>
@endsection

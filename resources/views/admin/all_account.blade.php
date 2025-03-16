@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê tài khoản khách hàng
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-3">
        <form action="{{URL::to('/tim-kiem-user')}}" method="POST">
            {{ csrf_field() }}
            <div class="input-group" style="display: flex;">
            <input type="text" name="keywords_submit" class="input-sm form-control" placeholder="Nhập user">
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
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Mật khẩu</th>
            <th>Số điện thoại</th>
            <th>Khóa tài khoản</th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_account as $key => $acc)
          <tr>
            <td>{{ $acc->customer_name }}</td>
            <td>{{ $acc->customer_email }}</td>
            <td>{{ $acc->customer_password }}</td>
            <td>{{ $acc->customer_phone }}</td>
            <td><span class="text-ellipsis">
                <?php
                if($acc->customer_status==0){
                ?>
                    <a href="{{URL::to('/unactive-account/'.$acc->customer_id)}}"> <span class="fa-thumb-styling fa fa-thumbs-down"></span> </a>
                    <?php
                }else{
                    ?>
                    <a href="{{URL::to('/active-account/'.$acc->customer_id)}}"> <span class="fa-thumb-styling fa fa-thumbs-up"></span>  </a>
                    <?php
                    }
                ?>
            </span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

            <div class="col-sm-12 text-center">
                <div class="card-footer clear-fix">
                    {!! $all_account->links() !!}
                </div>
            </div>

      </div>
    </footer>
  </div>
</div>
@endsection

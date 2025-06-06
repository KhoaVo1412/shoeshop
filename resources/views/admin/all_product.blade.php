@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
    </div>
    <div class="row w3-res-tb">
      {{-- <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>
      </div>
      <div class="col-sm-4">
      </div> --}}
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
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
            <th>Tên sản phẩm</th>
            <th>Giá</th>
            <th>Ảnh</th>
            {{-- <th>Size</th>
            <th>Màu</th> --}}
            <th>Mô tả</th>
            <th>content</th>
            <th>Danh mục</th>
            <th>Thương hiệu</th>
            <th>Hiển thị</th>

            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
            @foreach($all_product as $key => $pro)
          <tr>
            {{-- <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td> --}}
            <td>{{ $pro->product_name }}</td>
            <td>{{ $pro->product_price }}</td>
            <td>
                <img src="uploads/product/{{ $pro->product_image }}" height="100" width="100" >

            </td>
            {{-- <td>{{ $pro->size_name }}</td>
            <td>{{ $pro->color_name }}</td> --}}
            <td>{{ $pro->product_desc }}</td>
            <td>{{ $pro->product_content }}</td>
            <td>{{ $pro->category_name }}</td>
            <td>{{ $pro->brand_name }}</td>
            <td><span class="text-ellipsis">
                <?php
                if($pro->product_status==0){
                ?>
                    <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"> <span class="fa-thumb-styling fa fa-thumbs-down"></span> </a>
                    <?php
                }else{
                    ?>
                    <a href="{{URL::to('/active-product/'.$pro->product_id)}}"> <span class="fa-thumb-styling fa fa-thumbs-up"></span>  </a>
                    <?php
                    }
                ?>
            </span></td>

            <td>
              <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i>
                <a onclick="return confirm('Bạn chắc chắn muốn xóa không?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
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
                  {!! $all_product->links() !!}
              </div>
          </div>
        </div>
      </footer>
  </div>
</div>
@endsection

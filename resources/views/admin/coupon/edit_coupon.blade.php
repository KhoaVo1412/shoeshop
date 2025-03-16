@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa mã giảm giá
                        </header>
                        <div class="panel-body">
                        <?php
                        use Illuminate\Support\Facades\Session;
                        $message = Session::get('message');
                        if($message){
                            echo '<span class="text-alert">',$message.'</span>';
                            Session::put('message',null);
                        }
                        ?>

                        @foreach($edit_cou as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/update-coupon/'.$edit_value->coupon_id)}}"method="post">
                                    {{csrf_field()}}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                    <input type="text" value="{{$edit_value->coupon_name}}" name="coupon_name"class="form-control" id="
                                    exampleInputEmail1" placeholder="Tên mã giảm giá">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mã giảm giá</label>
                                    <input type="text" value="{{$edit_value->coupon_code}}" name="coupon_code" class="form-control" placeholder="Mã giảm giá">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="number" value="{{$edit_value->coupon_qty}}" name="coupon_qty"class="form-control" id="
                                    exampleInputEmail1" placeholder="Số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hình thức giảm giá</label>
                                        <select name="coupon_condition" value="{{$edit_value->coupon_condition}}" class="form-control input-sm m-bot15">
                                            <option value="0">--Chọn--</option>
                                            <option value="1">Phần trăm</option>
                                            <option value="2">Tiền </option>
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nhập số % hoặc tiền</label>

                                    <input type="number" name="coupon_number" value="{{$edit_value->coupon_number}}" class="form-control" id="
                                    exampleInputEmail1" placeholder="Nhập số % hoặc tiền">
                                </div>
                                <button type="submit" name="add_coupon"class="btn btn-info">Cập nhật mã giảm giá</button>
                            </form>
                            </div>
                            @endforeach
                        </div>
                    </section>

            </div>
@endsection

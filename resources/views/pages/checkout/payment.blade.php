@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="container" style="width: 112%;">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li class="active">Thanh toán giỏ hàng</li>
            </ol>
        </div>
        <div class="review-payment">
            <p style="font-size: 25px">Xem lại giỏ hàng:</p>
        </div>
        <div class="table-responsive cart_info" >
            <?php
            $content = Cart::content();
            ?>
            <table class="table table-condensed" style="width: 1000px">
                <thead>
                    <tr class="cart_menu">
                        <td class="image">Hình ảnh</td>
                        <td class="description">Mô tả</td>
                        <td class="size">Size</td>
                        <td class="color">Màu</td>
                        <td class="price">Giá</td>
                        <td class="quantity" style="width: 90px">Số lượng</td>
                        <td class="total">Tổng tiền</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($content as $v_content)
                            <tr>
                                <td class="cart_product">
                                    <a href=""><img src="{{URL::to('uploads/product/'.$v_content->options->image)}}" width="80" alt=""></a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="">{{$v_content->name}}</a></h4>

                                </td>
                                <td class="cart_size">
                                    <p>{{$v_content->options->sizes}}</p>
                                 </td>
                                 <td class="cart_color">
                                     <p>{{$v_content->options->colors}}</p>
                                  </td>
                                <td class="cart_price">
                                    <p>{{number_format($v_content->price).''.'VND'}}</p>
                                </td>
                                {{-- <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
                                            {{@csrf_field()}}
                                            <input class="cart_quantity_input" type="text" name="cart_quantity" value="{{$v_content->qty}}" style="width: 30%">
                                            <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="form control">
                                            <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default btn-sm">
                                        </form>
                                    </div>
                                </td> --}}
                                <td>
                                    <p>{{$v_content->qty}}</p>
                                </td>
                                <td class="cart_total">
                                    <p class="cart_total_price">

                                        <?php
                                            $subtotal = $v_content->price *  $v_content->qty;
                                            echo number_format($subtotal).' '.'VND';
                                        ?>
                                    </p>
                                </td>
                                {{-- <td class="cart_delete">
                                    <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                                </td> --}}
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <h4 style="margin: 10px">Chọn hình thức thanh toán:</h4>
        {{-- <form action="{{URL::to('/order-place')}}" method="POST">
            {{ csrf_field() }}
            <div class="payment-options">
                <span>
                    <label><input name="payment_option" value="1" type="checkbox"> Thanh toán ATM</label>
                </span>
                <span>
                    <label><input name="payment_option" value="2" type="checkbox"> Thanh toán khi nhận hàng</label>
                </span>
                <input type="submit" value="Đặt hàng" name="send_order_place" class="btn btn-primary btn-sm">
        </div>
        </form> --}}
        <div style="display: flex">
            <form action="{{URL::to('/vnpay-payment') }}" method="POST">
                {{ csrf_field() }}
                <input type="hidden" name="vnpay" value="1">
                <button type="submit" name="redirect"  style="width: 150px;" class="btn btn-primary btn-sm"><p style="font-size: 15px">Thanh toán VNPay</p></button>
                <input type="hidden" value="{{$lg}}" name="giam_gia">
                <input type="hidden" value="{{$ltt}}" name="tien_phai_tra">
            </form>
            <form action="{{URL::to('/tienmat-payment') }}" method="POST">
                {{ csrf_field() }}
                <button type="submit" name="tienmat" value="2" style="width: 150px; margin-left: 10px" class="btn btn-primary btn-sm"><p style="font-size: 15px">Thanh toán tiền mặt</p></button>
                <input type="hidden" value="{{$lg}}" name="giam_gia">
                <input type="hidden" value="{{$ltt}}" name="tien_phai_tra">
            </form>
        </div>

    </div>
</section> <!--/#cart_items-->
@endsection

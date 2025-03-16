<h2>Hi {{$name}}</h2>
    <p>
        <b> Bạn đã đặt hàng thành công tại cửa hàng của chúng tôi</b>
    </p>

    <h4>Thông tin đơn hàng của bạn</h4>
    <h4>Mã đơn hàng: {{$order}}</h4>
    <h4>Tên người nhận: {{ $ship_name }}</h4>
    <h4>Địa chỉ: {{ $ship_address }}</h4>
    <h4>SDT: {{ $ship_phone }}</h4>
    <h4>Email: {{ $ship_email }}</h4>
    <h4>Ghi chú: {{ $ship_note }}</h4>
    <h4>Ngày đơn hàng: {{ $order_date }}</h4>
    <h4>Tổng tiền: {{number_format($order_tong).' '.' VND'}}</h4>
    <h4>Giảm giá: {{ number_format($order_giam).' '.' VND' }}</h4>
    <h4>Tiền thanh toán: {{ number_format($order_tra).' '.' VND'}}/{{ $order_pay }}</h4>
    <h4>Chi tiết sản phẩm</h4>
    <table border="1" cellspacing="0" cellpadding="10" width="400">
        <thead>
            <tr>
                <th>STT</th>
                <th style="width: 500px">Tên SP</th>
                <th>Size</th>
                <th>Màu</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>

    <?php $n = 1; ?>
    @foreach($items as $item)
        <tr>
            <td>{{$n}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->options->sizes}}</td>
            <td>{{$item->options->colors}}</td>
            <td>{{number_format($item->price).' '.' VND'}}</td>
            <td>{{$item->qty}}</td>
            <td>{{number_format($item->price*$item->qty).' '.' VND'}}</td>
        </tr>
        <?php $n++; ?>
    @endforeach
    </tbody>
</table>

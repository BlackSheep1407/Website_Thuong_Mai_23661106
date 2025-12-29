@extends('template.layout')

@section('content')
<div class="container py-4">
    <h2>Chi tiết đơn hàng #{{ $order->id }}</h2>
    <div class="mb-3">
        <strong>Người đặt:</strong> {{ $order->user_id ?? 'Khách' }}<br>
        <strong>Tổng tiền:</strong> {{ number_format($order->total,0,',','.') }} VNĐ<br>
        <strong>Trạng thái:</strong> {{ $order->status }}<br>
        <strong>Ngày:</strong> {{ $order->created_at }}
    </div>

    <h4>Sản phẩm</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
            </tr>
        </thead>
        <tbody>
            @foreach($order->items as $it)
                <tr>
                    <td>{{ $it->product_name }}</td>
                    <td>{{ number_format($it->price,0,',','.') }} VNĐ</td>
                    <td>{{ $it->qty }}</td>
                    <td>{{ number_format($it->subtotal,0,',','.') }} VNĐ</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p class="mt-3">
        <a href="{{ url('admin/don-hang') }}" class="btn btn-secondary">Quay lại</a>
    </p>
</div>
@endsection

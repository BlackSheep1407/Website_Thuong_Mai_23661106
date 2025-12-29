@extends('template.layout')

@section('content')
<div class="container py-4">
    <h2>Danh sách đơn hàng</h2>
    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>#</th>
                <th>Người đặt (user_id)</th>
                <th>Tổng</th>
                <th>Trạng thái</th>
                <th>Ngày</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @forelse($orders as $o)
                <tr>
                    <td>{{ $o->id }}</td>
                    <td>{{ $o->user_id ?? 'Khách' }}</td>
                    <td>{{ number_format($o->total,0,',','.') }} VNĐ</td>
                    <td>{{ $o->status }}</td>
                    <td>{{ $o->created_at }}</td>
                    <td><a href="{{ url('admin/don-hang/'.$o->id) }}" class="btn btn-sm btn-primary">Xem</a></td>
                </tr>
            @empty
                <tr><td colspan="6">Chưa có đơn hàng.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

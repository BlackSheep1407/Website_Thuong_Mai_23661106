<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phiếu hóa đơn #{{ $order->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .invoice-header {
            border-bottom: 3px solid #007bff;
            padding-bottom: 20px;
            margin-bottom: 30px;
        }
        .invoice-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #007bff;
        }
        .invoice-info {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
        }
        .total-amount {
            font-size: 1.5rem;
            font-weight: bold;
            color: #dc3545;
        }
        @media print {
            .no-print { display: none; }
            body { background: white; }
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <!-- Header -->
        <div class="invoice-header text-center">
            <h1 class="invoice-title">PHIẾU HÓA ĐƠN</h1>
            <p class="mb-0">Cửa hàng trái cây tươi ngon</p>
        </div>

        <!-- Invoice Info -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="invoice-info">
                    <h5>Thông tin hóa đơn</h5>
                    <p><strong>Mã hóa đơn:</strong> #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}</p>
                    <p><strong>Ngày hóa đơn:</strong> {{ $order->created_at->format('d/m/Y') }}</p>
                    <p><strong>Giờ hóa đơn:</strong> {{ $order->created_at->format('H:i:s') }}</p>
                    <p><strong>Trạng thái:</strong>
                        <span class="badge
                            @if($order->status == 'pending') bg-warning
                            @elseif($order->status == 'completed') bg-success
                            @else bg-danger
                            @endif">
                            @if($order->status == 'pending') Chờ xử lý
                            @elseif($order->status == 'completed') Hoàn thành
                            @else Đã hủy
                            @endif
                        </span>
                    </p>
                </div>
            </div>

            <div class="col-md-6">
                <div class="invoice-info">
                    <h5>Thông tin khách hàng</h5>
                    @php
                        $shipping = json_decode($order->shipping_address, true);
                    @endphp
                    @if($shipping)
                        <p><strong>Họ và tên:</strong> {{ $shipping['name'] ?? '' }}</p>
                        <p><strong>Email:</strong> {{ $shipping['email'] ?? 'N/A' }}</p>
                        <p><strong>Số điện thoại:</strong> {{ $shipping['phone'] ?? 'N/A' }}</p>
                        <p><strong>Địa chỉ giao hàng:</strong> {{ $shipping['address'] ?? '' }}</p>
                    @else
                        <p><strong>Khách hàng:</strong> {{ $order->customer_name }}</p>
                        <p>Không có thông tin giao hàng chi tiết</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Products Table -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Chi tiết sản phẩm</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">STT</th>
                                <th>Tên sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-end">Đơn giá</th>
                                <th class="text-end">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->items as $index => $item)
                                <tr>
                                    <td class="text-center">{{ $index + 1 }}</td>
                                    <td>{{ $item->product_name }}</td>
                                    <td class="text-center">{{ $item->qty }}</td>
                                    <td class="text-end">{{ number_format($item->price) }} VNĐ</td>
                                    <td class="text-end">{{ number_format($item->subtotal) }} VNĐ</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="table-dark">
                                <th colspan="4" class="text-end">TỔNG CỘNG:</th>
                                <th class="text-end total-amount">{{ number_format($order->total) }} VNĐ</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="border p-3">
                    <h6>Người nhận hàng</h6>
                    <p class="mb-0">Ký tên: ___________________________</p>
                    <p class="mb-0 small text-muted">Ngày nhận: ___/___/______</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="border p-3">
                    <h6>Người giao hàng</h6>
                    <p class="mb-0">Ký tên: ___________________________</p>
                    <p class="mb-0 small text-muted">Ngày giao: ___/___/______</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-4 no-print">
            <button onclick="window.print()" class="btn btn-primary me-2">
                <i class="bi bi-printer me-2"></i>In hóa đơn
            </button>
            <a href="{{ route('user.orders') }}" class="btn btn-secondary me-2">
                <i class="bi bi-arrow-left me-2"></i>Quay lại danh sách
            </a>
            <a href="{{ route('home') }}" class="btn btn-success">
                <i class="bi bi-cart-plus me-2"></i>Tiếp tục mua sắm
            </a>
        </div>

        <div class="text-center mt-3 small text-muted no-print">
            <p>Cảm ơn quý khách đã tin tưởng và mua hàng tại cửa hàng chúng tôi!</p>
            <p>Liên hệ: 0123.456.789 | Email: info@traicayfresh.com</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

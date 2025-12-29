<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử đơn hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .orders-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 20px 20px;
        }
        .order-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            margin-bottom: 1.5rem;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .order-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        }
        .order-header {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 1rem;
            border-radius: 15px 15px 0 0;
        }
        .status-badge {
            font-size: 0.85rem;
            padding: 0.5rem 1rem;
            border-radius: 20px;
        }
        .btn-view-details {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 25px;
            padding: 0.5rem 1.5rem;
            transition: all 0.3s;
        }
        .btn-view-details:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
        }
        .empty-state {
            text-align: center;
            padding: 3rem;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border-radius: 20px;
            margin: 2rem 0;
        }
        .empty-state i {
            font-size: 4rem;
            margin-bottom: 1rem;
            opacity: 0.8;
        }
    </style>
</head>
<body>
    <div class="orders-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="mb-0"><i class="fas fa-shopping-bag me-3"></i>Lịch sử đơn hàng</h1>
                    <p class="mb-0 mt-2">Theo dõi và quản lý các đơn hàng của bạn</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @if($orders->count() > 0)
            <div class="row">
                @foreach($orders as $order)
                    <div class="col-12">
                        <div class="card order-card">
                            <div class="card-header order-header">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5 class="mb-0">
                                        <i class="fas fa-receipt me-2"></i>
                                        Đơn hàng #{{ str_pad($order->id, 6, '0', STR_PAD_LEFT) }}
                                    </h5>
                                    <small class="text-white-50">
                                        <i class="fas fa-calendar-alt me-1"></i>
                                        {{ $order->created_at->format('d/m/Y H:i') }}
                                    </small>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="fas fa-dollar-sign text-success me-2"></i>
                                            <span class="h5 text-success mb-0">{{ number_format($order->total) }} VNĐ</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <i class="fas fa-info-circle text-info me-2"></i>
                                            <span class="badge status-badge
                                                @if($order->status == 'pending') bg-warning text-dark
                                                @elseif($order->status == 'completed') bg-success
                                                @else bg-danger
                                                @endif">
                                                <i class="fas
                                                    @if($order->status == 'pending') fa-clock
                                                    @elseif($order->status == 'completed') fa-check-circle
                                                    @else fa-times-circle
                                                    @endif me-1"></i>
                                                @if($order->status == 'pending') Chờ xử lý
                                                @elseif($order->status == 'completed') Hoàn thành
                                                @else Đã hủy
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 text-end">
                                        <a href="{{ route('user.order.show', $order->id) }}" class="btn btn-view-details text-white">
                                            <i class="fas fa-eye me-2"></i>Xem chi tiết
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <i class="fas fa-shopping-cart"></i>
                <h3>Bạn chưa có đơn hàng nào</h3>
                <p class="mb-4">Hãy khám phá các sản phẩm tuyệt vời của chúng tôi!</p>
                <a href="{{ route('home') }}" class="btn btn-light btn-lg">
                    <i class="fas fa-shopping-bag me-2"></i>Bắt đầu mua sắm
                </a>
            </div>
        @endif

        <div class="row mt-4">
            <div class="col-12 text-center">
                <a href="{{ route('home') }}" class="btn btn-outline-secondary me-2">
                    <i class="fas fa-home me-2"></i>Quay về trang chủ
                </a>
                <a href="/profile" class="btn btn-outline-primary">
                    <i class="fas fa-user me-2"></i>Quay về profile
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cảm ơn - Đặt hàng thành công</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <h1 class="mb-3">Cảm ơn bạn đã đặt hàng!</h1>
                @if(!empty($order_id))
                    <p class="lead">Mã đơn hàng của bạn: <strong class="text-primary">{{ $order_id }}</strong></p>
                @else
                    <p class="lead">Đơn hàng đã được ghi nhận.</p>
                @endif

                <p class="mt-4">
                    <a href="{{ route('home') }}" class="btn btn-primary">Quay về trang chủ</a>
                    <a href="{{ route('user.orders') }}" class="btn btn-outline-secondary">Xem đơn hàng</a>
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

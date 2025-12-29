<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @php
        // Check user session and profile completeness
        $user = session('user');
        $userId = null;
        $userInfo = null;
        $hasCompleteProfile = false;

        if (is_array($user)) {
            if (isset($user['user_id'])) {
                $userId = $user['user_id'];
            } elseif (isset($user['id'])) {
                $userId = $user['id'];
            } elseif (isset($user[0]) && is_array($user[0])) {
                $userId = $user[0]['user_id'] ?? $user[0]['id'] ?? null;
            }
        }

        if ($userId) {
            $userInfo = \App\Models\Users::find($userId);
            if ($userInfo && !empty($userInfo->user_fullname) && !empty($userInfo->user_address)) {
                $hasCompleteProfile = true;
            }
        }
    @endphp

    <div class="container mt-5">
        <h2>Thanh toán</h2>

        @if(empty($cart))
            <p>Giỏ hàng trống!</p>
            <a href="{{ route('home') }}" class="btn btn-primary">Tiếp tục mua sắm</a>
        @else
            <h4>Đơn hàng của bạn</h4>
            <ul class="list-group mb-3">
                @foreach($cart as $item)
                    <li class="list-group-item d-flex justify-content-between">
                        <span>{{ $item['name'] }}</span>
                        <span>{{ $item['qty'] }} x {{ number_format($item['price']) }} VNĐ = {{ number_format($item['qty'] * $item['price']) }} VNĐ</span>
                    </li>
                @endforeach
            </ul>
            <h4 class="text-end">Tổng: {{ number_format($total) }} VNĐ</h4>

            <form action="{{ route('checkout.process') }}" method="POST" class="mt-4">
                @csrf
                <h4>Thông tin khách hàng</h4>

                @if($hasCompleteProfile)
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle me-2"></i>
                        Thông tin của bạn sẽ được sử dụng từ hồ sơ cá nhân. Bạn có thể chỉnh sửa nếu cần.
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label">Họ tên</label>
                    <input type="text" name="name" class="form-control"
                           value="{{ $hasCompleteProfile ? $userInfo->user_fullname : '' }}"
                           {{ !$hasCompleteProfile ? 'required' : '' }}>
                    @if($hasCompleteProfile)
                        <small class="text-muted">Thông tin từ hồ sơ cá nhân</small>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Email (tùy chọn)</label>
                    <input type="email" name="email" class="form-control"
                           value="{{ $hasCompleteProfile ? $userInfo->user_email : '' }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Số điện thoại (tùy chọn)</label>
                    <input type="text" name="phone" class="form-control"
                           value="{{ $hasCompleteProfile ? $userInfo->user_phone : '' }}">
                </div>
                <div class="mb-3">
                    <label class="form-label">Địa chỉ</label>
                    <textarea name="address" class="form-control" rows="3"
                              {{ !$hasCompleteProfile ? 'required' : '' }}>{{ $hasCompleteProfile ? $userInfo->user_address : '' }}</textarea>
                    @if($hasCompleteProfile)
                        <small class="text-muted">Thông tin từ hồ sơ cá nhân</small>
                    @endif
                </div>
                <button type="submit" class="btn btn-success">Đặt hàng</button>
                <a href="{{ route('home') }}" class="btn btn-secondary ms-2">Quay lại</a>
            </form>
        @endif
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

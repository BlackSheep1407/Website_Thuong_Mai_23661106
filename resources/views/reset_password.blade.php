@include('template/header')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-success text-white">
                    <h3 class="card-title mb-0"><i class="bi bi-shield-check me-2"></i>Đặt lại mật khẩu</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Nhập mật khẩu mới cho tài khoản của bạn.</p>

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">
                        <input type="hidden" name="email" value="{{ $email }}">

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope me-1"></i>Email
                            </label>
                            <input type="email" class="form-control" id="email" name="email"
                                   value="{{ old('email', $email) }}" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                <i class="bi bi-key me-1"></i>Mật khẩu mới
                            </label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                   id="password" name="password" required minlength="6"
                                   placeholder="Nhập mật khẩu mới (tối thiểu 6 ký tự)">
                            @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">
                                <i class="bi bi-key-fill me-1"></i>Xác nhận mật khẩu
                            </label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                                   id="password_confirmation" name="password_confirmation" required minlength="6"
                                   placeholder="Nhập lại mật khẩu mới">
                            @error('password_confirmation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg">
                                <i class="bi bi-check-circle me-2"></i>Đặt lại mật khẩu
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ url('/quen-mat-khau') }}" class="text-decoration-none me-3">
                        <i class="bi bi-arrow-left me-1"></i>Gửi lại email
                    </a>
                    <a href="{{ url('/dang-nhap') }}" class="text-decoration-none me-3">
                        <i class="bi bi-box-arrow-in-right me-1"></i>Đăng nhập
                    </a>
                    <a href="{{ url('/dang-ky') }}" class="text-decoration-none">
                        <i class="bi bi-person-plus me-1"></i>Đăng ký
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Password confirmation validation
document.getElementById('password_confirmation').addEventListener('input', function() {
    const password = document.getElementById('password').value;
    const confirmPassword = this.value;

    if (password !== confirmPassword) {
        this.setCustomValidity('Mật khẩu xác nhận không khớp');
    } else {
        this.setCustomValidity('');
    }
});

document.getElementById('password').addEventListener('input', function() {
    const confirmPassword = document.getElementById('password_confirmation');
    if (confirmPassword.value && this.value !== confirmPassword.value) {
        confirmPassword.setCustomValidity('Mật khẩu xác nhận không khớp');
    } else {
        confirmPassword.setCustomValidity('');
    }
});
</script>

@include('template/footer')

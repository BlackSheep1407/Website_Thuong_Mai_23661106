@include('template/header')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title mb-0"><i class="bi bi-key-fill me-2"></i>Quên mật khẩu</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">Nhập email của bạn để nhận hướng dẫn đặt lại mật khẩu.</p>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope me-1"></i>Email của bạn
                            </label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}" required
                                   placeholder="Nhập email đã đăng ký">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-send me-2"></i>Gửi hướng dẫn đặt lại mật khẩu
                            </button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ url('/dang-nhap') }}" class="text-decoration-none me-3">
                        <i class="bi bi-arrow-left me-1"></i>Quay lại đăng nhập
                    </a>
                    <a href="{{ url('/dang-ky') }}" class="text-decoration-none">
                        <i class="bi bi-person-plus me-1"></i>Đăng ký tài khoản
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@include('template/footer')

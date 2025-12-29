@include('template/header')

<div class="login-wrapper d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="login-card p-4 shadow-lg rounded-4" style="width:100%; max-width:520px;">
        <div class="text-center mb-4">
            <h1 class="h3">Tạo tài khoản mới</h1>
            <p class="text-muted small">Vui lòng điền thông tin để tạo tài khoản</p>
        </div>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/xu-ly-dang-ky') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Tên đăng nhập</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mật khẩu</label>
                <div class="password-input-wrapper">
                    <input type="password" name="pswd" class="form-control" required>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Họ tên</label>
                <input type="text" name="fullname" class="form-control" value="{{ old('fullname') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Số điện thoại</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Địa chỉ</label>
                <input type="text" name="address" class="form-control" value="{{ old('address') }}" required>
            </div>

            <button type="submit" class="btn btn-dark w-100">Đăng ký</button>

            <div class="text-center mt-3">
                <a href="{{ url('/dang-nhap') }}">Đã có tài khoản? Đăng nhập</a>
                <span class="mx-2">|</span>
                <a href="{{ url('/quen-mat-khau') }}">Quên mật khẩu?</a>
            </div>
        </form>
    </div>
</div>

@include('template/footer')

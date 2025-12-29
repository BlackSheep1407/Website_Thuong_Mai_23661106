@include('template/header')

<div class="login-wrapper d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="login-card p-4 shadow-lg rounded-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Đăng nhập tài khoản</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ url('/xu-ly-dang-nhap') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Tài khoản</label>
                <input type="text" class="form-control" id="username" placeholder="Nhập tài khoản" name="username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <div class="password-input-wrapper">
                    <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="pswd" required><span class="toggle-password" id="togglePassword"> <i class="bi bi-eye-slash-fill"></i> </span>
                </div>
            </div>

            <button type="submit" class="btn btn-dark w-100 mt-2">Đăng nhập</button>
            <div class="text-center mt-3">
                <a href="{{ url('/dang-ky') }}">Đăng ký</a>
                <span class="mx-2">|</span>
                <a href="{{ url('/quen-mat-khau') }}">Quên mật khẩu?</a>
            </div>
        </form>
    </div>
</div>
<script src="{{ asset('admin/js/custom_login.js') }}"></script>
@include('template/footer')

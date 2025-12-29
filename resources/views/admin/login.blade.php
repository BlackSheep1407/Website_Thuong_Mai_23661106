{{-- @include('admin/template/header')
   <div class="row">
      <h2>Đăng nhập</h2>
      <form action="/admin/xu-ly-dang-nhap" method="post">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <div class="mb-3 mt-3">
            <label for="username">Tài khoản:</label>
            <input type="text" class="form-control" id="username" placeholder="Nhập tài khoản" name="username">
         </div>
         <div class="mb-3">
            <label for="pwd">Mật khẩu:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="pswd">
         </div>

         <button type="submit" class="btn btn-primary">Đăng nhập</button>
      </form>
   </div>
@include('admin/template/footer') --}}
<head>


</head>
@include('admin/template/header')

<div class="login-wrapper d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="login-card p-4 shadow-lg rounded-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Đăng nhập Admin</h2>

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <form action="{{ url('/admin/xu-ly-dang-nhap') }}" method="post">
            @csrf <div class="mb-3">
                <label for="username" class="form-label">Tài khoản</label>
                <input type="text" class="form-control" id="username" placeholder="Nhập tài khoản" name="username" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <div class="password-input-wrapper">
                    <input type="password" class="form-control" id="password" placeholder="Nhập mật khẩu" name="pswd" required>
                    <span class="toggle-password" id="togglePassword">
                        <i class="bi bi-eye-slash-fill"></i>
                    </span>
                </div>
            </div>

            <button type="submit" class="btn btn-dark w-100 mt-2">Đăng nhập</button>
        </form>
    </div>
</div>

<script src="{{ asset('admin/js/custom_login.js') }}"></script>

@include('admin/template/footer')

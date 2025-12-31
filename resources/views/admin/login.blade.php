@php
// Check if admin is already logged in
$user = session('user');
if ($user && isset($user['user_role']) && $user['user_role'] == 1) {
    header('Location: /admin/dashboard');
    exit;
}
@endphp

<style>
.admin-login-wrapper {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
}

.admin-login-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    border: none;
    max-width: 450px;
    width: 100%;
    overflow: hidden;
}

.admin-login-header {
    background: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
    color: white;
    padding: 2rem;
    text-align: center;
    position: relative;
}

.admin-login-header::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="50" cy="10" r="0.5" fill="rgba(255,255,255,0.1)"/><circle cx="10" cy="50" r="0.5" fill="rgba(255,255,255,0.1)"/><circle cx="90" cy="50" r="0.5" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.1;
}

.admin-login-header h2 {
    margin: 0;
    font-weight: 300;
    position: relative;
    z-index: 1;
}

.admin-login-header .admin-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
    opacity: 0.9;
}

.admin-login-body {
    padding: 2.5rem;
}

.admin-form-group {
    margin-bottom: 1.5rem;
}

.admin-form-group label {
    font-weight: 600;
    color: #2c3e50;
    margin-bottom: 0.5rem;
    display: block;
}

.admin-form-control {
    border: 2px solid #e9ecef;
    border-radius: 8px;
    padding: 0.75rem 1rem;
    font-size: 1rem;
    transition: all 0.3s ease;
    background: #f8f9fa;
}

.admin-form-control:focus {
    border-color: #667eea;
    box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    background: white;
    outline: none;
}

.admin-password-wrapper {
    position: relative;
}

.admin-password-toggle {
    position: absolute;
    right: 1rem;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #6c757d;
    cursor: pointer;
    padding: 0.25rem;
    transition: color 0.3s ease;
}

.admin-password-toggle:hover {
    color: #667eea;
}

.admin-btn-login {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    border: none;
    border-radius: 8px;
    padding: 1rem 2rem;
    font-size: 1.1rem;
    font-weight: 600;
    color: white;
    width: 100%;
    transition: all 0.3s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.admin-btn-login:hover {
    background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
    transform: translateY(-2px);
    box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
}

.admin-btn-login:active {
    transform: translateY(0);
}

.admin-alert {
    border-radius: 8px;
    border: none;
    font-weight: 500;
}

.admin-back-link {
    text-align: center;
    margin-top: 1.5rem;
    padding-top: 1.5rem;
    border-top: 1px solid #e9ecef;
}

.admin-back-link a {
    color: #667eea;
    text-decoration: none;
    font-weight: 500;
    transition: color 0.3s ease;
}

.admin-back-link a:hover {
    color: #5a67d8;
    text-decoration: underline;
}
</style>

<div class="admin-login-wrapper">
    <div class="admin-login-card">
        <div class="admin-login-header">
            <div class="admin-icon">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <h2>Đăng nhập Admin</h2>
            <p class="mb-0 opacity-75">Quản trị hệ thống 2Tfresh</p>
        </div>

        <div class="admin-login-body">
            @if(session('error'))
                <div class="alert alert-danger admin-alert" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ url('/admin/xu-ly-dang-nhap') }}" method="post" id="adminLoginForm">
                @csrf

                <div class="admin-form-group">
                    <label for="username">
                        <i class="bi bi-person-fill me-2"></i>Tài khoản quản trị
                    </label>
                    <input type="text" class="admin-form-control" id="username" name="username"
                           placeholder="Nhập tên đăng nhập admin" required autofocus>
                </div>

                <div class="admin-form-group">
                    <label for="password">
                        <i class="bi bi-key-fill me-2"></i>Mật khẩu
                    </label>
                    <div class="admin-password-wrapper">
                        <input type="password" class="admin-form-control" id="password" name="pswd"
                               placeholder="Nhập mật khẩu" required>
                        <button type="button" class="admin-password-toggle" id="togglePassword">
                            <i class="bi bi-eye-slash-fill"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="admin-btn-login">
                    <i class="bi bi-box-arrow-in-right me-2"></i>
                    Đăng nhập hệ thống
                </button>
            </form>
        </div>
    </div>
</div>

<script>
// Password toggle functionality
document.getElementById('togglePassword').addEventListener('click', function() {
    const passwordInput = document.getElementById('password');
    const icon = this.querySelector('i');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        icon.classList.remove('bi-eye-slash-fill');
        icon.classList.add('bi-eye-fill');
    } else {
        passwordInput.type = 'password';
        icon.classList.remove('bi-eye-fill');
        icon.classList.add('bi-eye-slash-fill');
    }
});

// Form validation enhancement
document.getElementById('adminLoginForm').addEventListener('submit', function(e) {
    const submitBtn = this.querySelector('.admin-btn-login');
    const originalText = submitBtn.innerHTML;

    submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Đang xử lý...';
    submitBtn.disabled = true;

    // Re-enable after 3 seconds (in case of error)
    setTimeout(() => {
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;
    }, 3000);
});
</script>

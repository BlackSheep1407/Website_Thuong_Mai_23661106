document.addEventListener('DOMContentLoaded', function() {
    // Lấy các phần tử bằng ID
    const togglePassword = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');

    if (togglePassword && passwordInput) {
        togglePassword.addEventListener('click', function () {
            // Chuyển đổi thuộc tính type
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            
            // Thay đổi icon
            const icon = this.querySelector('i');
            icon.classList.toggle('bi-eye-slash-fill'); // Icon ẩn
            icon.classList.toggle('bi-eye-fill');       // Icon hiện
        });
    }
});
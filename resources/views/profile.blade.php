@include('template/header')

<style>
    .profile-section {
        margin-top: 120px; /* Tránh che bởi nav bar */
        padding: 40px 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 70vh;
    }
    .profile-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border: none;
        overflow: hidden;
    }
    .profile-header {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        color: white;
        padding: 30px;
        text-align: center;
    }
    .profile-avatar {
        width: 80px;
        height: 80px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        margin-bottom: 15px;
    }
    .avatar-image {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid white;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #f8f9fa;
    }
    .info-item:last-child {
        border-bottom: none;
    }
    .info-label {
        font-weight: 600;
        color: #495057;
    }
    .info-value {
        color: #6c757d;
    }
    .logout-btn {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        border: none;
        padding: 12px 30px;
        border-radius: 25px;
        color: white;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .logout-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(220,53,69,0.3);
        color: white;
    }
</style>

@php
    $userSession = session('user');
    $userId = null;
    if (is_array($userSession)) {
        if (isset($userSession['id'])) {
            $userId = $userSession['id'];
        } elseif (isset($userSession[0]) && is_array($userSession[0])) {
            $userId = $userSession[0]['id'] ?? null;
        }
    }
    $userInfo = $userId ? \App\Models\Users::find($userId) : null;
@endphp

<div class="profile-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="profile-card">
                    <div class="profile-header">
                        <div class="profile-avatar position-relative">
                            @if($userInfo && $userInfo->avatar)
                                <img src="{{ asset($userInfo->avatar) }}" alt="Avatar" class="avatar-image">
                            @else
                                <i class="bi bi-person-circle"></i>
                            @endif
                            <button type="button" class="btn btn-sm btn-light position-absolute bottom-0 end-0 rounded-circle p-1" onclick="document.getElementById('avatarInput').click()">
                                <i class="bi bi-camera-fill"></i>
                            </button>
                        </div>
                        <h3 class="mb-1">Hồ sơ cá nhân</h3>
                        <p class="mb-0 opacity-75">Quản lý thông tin tài khoản của bạn</p>
                    </div>

                    <div class="card-body p-4">
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

                        @if($userInfo)
                            <form id="profileForm" method="POST" action="{{ url('/profile/update') }}">
                                @csrf
                                <div class="info-item">
                                    <span class="info-label">Tên đăng nhập:</span>
                                    <span class="info-value">{{ $userInfo->user_username }}</span>
                                </div>

                                <div class="info-item">
                                    <span class="info-label">Họ và tên:</span>
                                    <input type="text" name="fullname" class="form-control info-edit" value="{{ $userInfo->user_fullname }}" required>
                                </div>

                                <div class="info-item">
                                    <span class="info-label">Email:</span>
                                    <input type="email" name="email" class="form-control info-edit" value="{{ $userInfo->user_email ?? '' }}">
                                </div>

                                <div class="info-item">
                                    <span class="info-label">Số điện thoại:</span>
                                    <input type="text" name="phone" class="form-control info-edit" value="{{ $userInfo->user_phone ?? '' }}">
                                </div>

                                <div class="info-item">
                                    <span class="info-label">Địa chỉ:</span>
                                    <input type="text" name="address" class="form-control info-edit" value="{{ $userInfo->user_address }}" required>
                                </div>

                                <div class="info-item">
                                    <span class="info-label">Vai trò:</span>
                                    <span class="info-value">
                                        @if($userInfo->user_role == 1)
                                            <span class="badge bg-primary">Quản trị viên</span>
                                        @else
                                            <span class="badge bg-success">Khách hàng</span>
                                        @endif
                                    </span>
                                </div>

                                <div class="info-item">
                                    <span class="info-label">Ngày tham gia:</span>
                                    <span class="info-value">{{ $userInfo->created_at ? $userInfo->created_at->format('d/m/Y') : 'N/A' }}</span>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-success me-2">
                                        <i class="bi bi-check-circle me-2"></i>Lưu thay đổi
                                    </button>
                                    <button type="button" class="btn btn-secondary" onclick="resetForm()">
                                        <i class="bi bi-arrow-counterclockwise me-2"></i>Đặt lại
                                    </button>
                                </div>
                            </form>

                        @else
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle"></i>
                                Không thể tải thông tin tài khoản. Vui lòng đăng nhập lại.
                            </div>
                        @endif

                        <!-- Hidden file input for avatar upload -->
                        <input type="file" id="avatarInput" name="avatar" accept="image/*" style="display: none;">

                        <div class="text-center mt-4">
                            <a href="{{ route('user.orders') }}" class="btn btn-primary me-2">
                                <i class="bi bi-receipt me-2"></i>Lịch sử đơn hàng
                            </a>
                            <a href="{{ url('/thoat') }}" class="btn logout-btn">
                                <i class="bi bi-box-arrow-right me-2"></i>Đăng xuất
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Pass user info to JavaScript
@if($userInfo)
window.originalUserData = {
    fullname: '{{ addslashes($userInfo->user_fullname) }}',
    email: '{{ addslashes($userInfo->user_email ?? '') }}',
    phone: '{{ addslashes($userInfo->user_phone ?? '') }}',
    address: '{{ addslashes($userInfo->user_address) }}'
};
@endif

// Avatar upload functionality
document.getElementById('avatarInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        // Validate file type
        if (!file.type.startsWith('image/')) {
            alert('Vui lòng chọn file hình ảnh!');
            return;
        }

        // Validate file size (max 5MB)
        if (file.size > 5 * 1024 * 1024) {
            alert('File quá lớn! Vui lòng chọn file dưới 5MB.');
            return;
        }

        // Show loading
        const avatarImg = document.querySelector('.avatar-image');
        if (avatarImg) {
            avatarImg.style.opacity = '0.5';
        }

        // Upload file
        const formData = new FormData();
        formData.append('avatar', file);
        formData.append('_token', '{{ csrf_token() }}');

        fetch('{{ url("/profile/avatar") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update avatar display
                const avatarContainer = document.querySelector('.profile-avatar');
                let img = avatarContainer.querySelector('.avatar-image');
                if (!img) {
                    img = document.createElement('img');
                    img.className = 'avatar-image';
                    img.alt = 'Avatar';
                    avatarContainer.innerHTML = '';
                    avatarContainer.appendChild(img);
                }
                img.src = data.avatar_url + '?t=' + Date.now(); // Cache busting
                img.style.opacity = '1';

                // Show success message
                showAlert('success', 'Ảnh đại diện đã được cập nhật thành công!');
            } else {
                throw new Error(data.message || 'Có lỗi xảy ra khi tải ảnh lên');
            }
        })
        .catch(error => {
            console.error('Avatar upload error:', error);
            if (avatarImg) {
                avatarImg.style.opacity = '1';
            }
            showAlert('error', error.message || 'Có lỗi xảy ra khi tải ảnh lên');
        });
    }
});

function showAlert(type, message) {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type === 'success' ? 'success' : 'danger'} alert-dismissible fade show`;
    alertDiv.innerHTML = `
        <i class="bi bi-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

    const cardBody = document.querySelector('.card-body');
    cardBody.insertBefore(alertDiv, cardBody.firstChild);

    // Auto remove after 5 seconds
    setTimeout(() => {
        if (alertDiv.parentNode) {
            alertDiv.remove();
        }
    }, 5000);
}

function resetForm() {
    // Reset form to original values using JavaScript data
    if (window.originalUserData) {
        document.querySelector('input[name="fullname"]').value = window.originalUserData.fullname;
        document.querySelector('input[name="email"]').value = window.originalUserData.email;
        document.querySelector('input[name="phone"]').value = window.originalUserData.phone;
        document.querySelector('input[name="address"]').value = window.originalUserData.address;
        alert('Đã đặt lại thông tin gốc!');
    } else {
        alert('Không thể đặt lại thông tin. Vui lòng tải lại trang!');
    }
}
</script>

@include('template/footer')

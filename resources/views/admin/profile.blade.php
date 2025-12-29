@extends('admin/template/header')

@section('content')
<style>
    .admin-profile-section {
        margin-top: 120px;
        padding: 40px 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 70vh;
    }
    .admin-profile-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border: none;
        overflow: hidden;
    }
    .admin-profile-header {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        color: white;
        padding: 30px;
        text-align: center;
    }
    .admin-avatar {
        width: 100px;
        height: 100px;
        background: rgba(255,255,255,0.2);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        margin-bottom: 15px;
    }
    .admin-avatar-image {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        object-fit: cover;
        border: 4px solid white;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    }
    .admin-info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 15px 0;
        border-bottom: 1px solid #f8f9fa;
    }
    .admin-info-item:last-child {
        border-bottom: none;
    }
    .admin-info-label {
        font-weight: 600;
        color: #495057;
    }
    .admin-info-value {
        color: #6c757d;
        text-align: right;
    }
    .admin-badge {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
        color: white;
        padding: 0.375rem 0.75rem;
        border-radius: 20px;
        font-size: 0.875rem;
        font-weight: 500;
    }
</style>

@php
    $userSession = session('user');
    $userId = $userSession['id'] ?? null;
    $adminInfo = $userId ? \App\Models\Users::find($userId) : null;
@endphp

<div class="admin-profile-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="admin-profile-card">
                    <div class="admin-profile-header">
                        <div class="admin-avatar position-relative">
                            @if($adminInfo && $adminInfo->avatar && file_exists(public_path($adminInfo->avatar)))
                                <img src="{{ asset($adminInfo->avatar) }}" alt="Admin Avatar" class="admin-avatar-image">
                            @else
                                <img src="{{ asset('avatars/default-avatar.png') }}" alt="Default Admin Avatar" class="admin-avatar-image">
                            @endif
                            <button type="button" class="btn btn-sm btn-light position-absolute bottom-0 end-0 rounded-circle p-1" onclick="document.getElementById('adminAvatarInput').click()">
                                <i class="bi bi-camera-fill"></i>
                            </button>
                        </div>
                        <h3 class="mb-1">Thông tin quản trị viên</h3>
                        <p class="mb-0 opacity-75">Quản lý thông tin tài khoản admin</p>
                    </div>

                    <div class="card-body p-4">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        @if($adminInfo)
                            <form id="adminProfileForm" method="POST" action="{{ url('/admin/profile/update') }}">
                                @csrf
                                <div class="admin-info-item">
                                    <span class="admin-info-label">ID quản trị viên:</span>
                                    <span class="admin-info-value">{{ $adminInfo->user_id }}</span>
                                </div>

                                <div class="admin-info-item">
                                    <span class="admin-info-label">Tên đăng nhập:</span>
                                    <span class="admin-info-value">{{ $adminInfo->user_username }}</span>
                                </div>

                                <div class="admin-info-item">
                                    <label class="admin-info-label">Họ và tên:</label>
                                    <input type="text" name="fullname" class="form-control admin-edit-input" value="{{ $adminInfo->user_fullname }}" required>
                                </div>

                                <div class="admin-info-item">
                                    <label class="admin-info-label">Email:</label>
                                    <input type="email" name="email" class="form-control admin-edit-input" value="{{ $adminInfo->user_email ?? '' }}">
                                </div>

                                <div class="admin-info-item">
                                    <label class="admin-info-label">Số điện thoại:</label>
                                    <input type="text" name="phone" class="form-control admin-edit-input" value="{{ $adminInfo->user_phone ?? '' }}">
                                </div>

                                <div class="admin-info-item">
                                    <label class="admin-info-label">Địa chỉ:</label>
                                    <input type="text" name="address" class="form-control admin-edit-input" value="{{ $adminInfo->user_address ?? '' }}" required>
                                </div>

                                <div class="admin-info-item">
                                    <span class="admin-info-label">Vai trò:</span>
                                    <span class="admin-info-value">
                                        <span class="admin-badge">
                                            <i class="bi bi-shield-check me-1"></i>Quản trị viên
                                        </span>
                                    </span>
                                </div>

                                <div class="admin-info-item">
                                    <span class="admin-info-label">Ngày tham gia:</span>
                                    <span class="admin-info-value">{{ $adminInfo->created_at ? $adminInfo->created_at->format('d/m/Y H:i') : 'N/A' }}</span>
                                </div>

                                <div class="admin-info-item">
                                    <span class="admin-info-label">Cập nhật lần cuối:</span>
                                    <span class="admin-info-value">{{ $adminInfo->updated_at ? $adminInfo->updated_at->format('d/m/Y H:i') : 'N/A' }}</span>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="submit" class="btn btn-success me-2">
                                        <i class="bi bi-check-circle me-2"></i>Lưu thay đổi
                                    </button>
                                    <button type="button" class="btn btn-secondary" onclick="resetAdminForm()">
                                        <i class="bi bi-arrow-counterclockwise me-2"></i>Đặt lại
                                    </button>
                                </div>
                            </form>

                            <div class="text-center mt-4">
                                <a href="{{ url('admin/danh-sach-nguoi-dung') }}" class="btn btn-primary me-2">
                                    <i class="bi bi-people me-2"></i>Quản lý người dùng
                                </a>
                                <a href="{{ url('admin/danh-sach-san-pham') }}" class="btn btn-success me-2">
                                    <i class="bi bi-basket me-2"></i>Quản lý sản phẩm
                                </a>
                                <a href="{{ url('admin/thoat') }}" class="btn btn-danger">
                                    <i class="bi bi-box-arrow-right me-2"></i>Đăng xuất
                                </a>
                            </div>
                        @else
                            <div class="alert alert-warning">
                                <i class="bi bi-exclamation-triangle"></i>
                                Không thể tải thông tin tài khoản admin.
                            </div>
                        @endif

                        <!-- Hidden file input for admin avatar upload -->
                        <input type="file" id="adminAvatarInput" name="avatar" accept="image/*" style="display: none;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Admin avatar upload functionality
document.getElementById('adminAvatarInput').addEventListener('change', function(e) {
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
        const avatarImg = document.querySelector('.admin-avatar-image');
        if (avatarImg) {
            avatarImg.style.opacity = '0.5';
        }

        // Upload file
        const formData = new FormData();
        formData.append('avatar', file);
        formData.append('_token', '{{ csrf_token() }}');

        fetch('{{ url("/admin/avatar") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Update avatar display
                const avatarContainer = document.querySelector('.admin-avatar');
                let img = avatarContainer.querySelector('.admin-avatar-image');
                if (!img) {
                    img = document.createElement('img');
                    img.className = 'admin-avatar-image';
                    img.alt = 'Admin Avatar';
                    avatarContainer.innerHTML = '';
                    avatarContainer.appendChild(img);
                }
                img.src = data.avatar_url + '?t=' + Date.now(); // Cache busting
                img.style.opacity = '1';

                // Show success message
                showAlert('success', 'Ảnh đại diện admin đã được cập nhật thành công!');
            } else {
                throw new Error(data.message || 'Có lỗi xảy ra khi tải ảnh lên');
            }
        })
        .catch(error => {
            console.error('Admin avatar upload error:', error);
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
    if (cardBody) {
        cardBody.insertBefore(alertDiv, cardBody.firstChild);

        // Auto remove after 5 seconds
        setTimeout(() => {
            if (alertDiv.parentNode) {
                alertDiv.remove();
            }
        }, 5000);
    }
}

function resetAdminForm() {
    // Reset form to original values using PHP data
    @if($adminInfo)
    document.querySelector('input[name="fullname"]').value = '{{ addslashes($adminInfo->user_fullname) }}';
    document.querySelector('input[name="email"]').value = '{{ addslashes($adminInfo->user_email ?? '') }}';
    document.querySelector('input[name="phone"]').value = '{{ addslashes($adminInfo->user_phone ?? '') }}';
    document.querySelector('input[name="address"]').value = '{{ addslashes($adminInfo->user_address) }}';
    @endif
    alert('Đã đặt lại thông tin gốc!');
}
</script>

@endsection

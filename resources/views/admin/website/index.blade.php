@include('admin/template/header')

<style>
    .website-container {
        margin-top: 120px;
        min-height: 70vh;
    }
    .content-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border: none;
        margin-bottom: 30px;
        overflow: hidden;
    }
    .content-header {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        color: white;
        padding: 20px;
        margin: 0;
    }
    .logo-preview {
        max-width: 150px;
        max-height: 150px;
        border: 2px solid #dee2e6;
        border-radius: 10px;
        padding: 10px;
        background: white;
        margin: 0 auto;
        display: block;
    }

    .preview-title {
        text-align: center;
        margin-bottom: 1rem;
        font-weight: 600;
        color: #495057;
    }

    /* Force nav-tabs to have dark text and proper active state */
    .nav-tabs .nav-link {
        color: #495057 !important;
        background-color: #f8f9fa !important;
        border-color: #dee2e6 #dee2e6 #dee2e6 !important;
    }

    .nav-tabs .nav-link:hover {
        color: #495057 !important;
        background-color: #e9ecef !important;
        border-color: #adb5bd #dee2e6 #dee2e6 !important;
    }

    .nav-tabs .nav-link.active {
        color: #495057 !important;
        background-color: #fff !important;
        border-color: #dee2e6 #dee2e6 #fff !important;
        font-weight: 600 !important;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1) !important;
    }

    .nav-tabs .nav-link.active:hover {
        color: #495057 !important;
        background-color: #fff !important;
        border-color: #dee2e6 #dee2e6 #fff !important;
    }

    /* Remove text-dark class override if Bootstrap is interfering */
    .nav-tabs .nav-link.text-dark {
        color: #495057 !important;
    }
    .slider-item {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        margin-bottom: 20px;
        overflow: hidden;
    }
    .slider-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }
    .slider-info {
        padding: 15px;
    }
    .form-section {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 20px;
    }
</style>

<div class="website-container">
    <div class="container-fluid">

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Tab Navigation -->
        <ul class="nav nav-tabs" id="websiteTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active text-dark" id="logo-tab" data-bs-toggle="tab" data-bs-target="#logo" type="button" role="tab" aria-controls="logo" aria-selected="true">
                    <i class="bi bi-image me-2"></i>Logo
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="favicon-tab" data-bs-toggle="tab" data-bs-target="#favicon" type="button" role="tab" aria-controls="favicon" aria-selected="false">
                    <i class="bi bi-browser-chrome me-2"></i>Favicon
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="slider-tab" data-bs-toggle="tab" data-bs-target="#slider" type="button" role="tab" aria-controls="slider" aria-selected="false">
                    <i class="bi bi-images me-2"></i>Slider Banner
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link text-dark" id="settings-tab" data-bs-toggle="tab" data-bs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">
                    <i class="bi bi-gear me-2"></i>Cài đặt chung
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content" id="websiteTabContent">

            <!-- Logo Tab -->
            <div class="tab-pane fade show active" id="logo" role="tabpanel" aria-labelledby="logo-tab">
                <div class="content-card">
                    <h3 class="content-header">
                        <i class="bi bi-image me-2"></i>Quản Lý Logo
                    </h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="preview-title">Logo Hiện Tại</h5>
                                @if($logo && $logo->setting_value)
                                    <img src="{{ asset($logo->setting_value) }}" alt="Current Logo" class="logo-preview img-fluid">
                                @else
                                    <div class="logo-preview text-center text-muted">
                                        <i class="bi bi-image fs-1"></i>
                                        <p class="mb-0">Chưa có logo</p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <form action="{{ route('admin.website.updateLogo') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Chọn Logo Mới</label>
                                        <input type="file" class="form-control" id="logo" name="logo" accept="image/*" required>
                                        <div class="form-text">Định dạng: JPEG, PNG, GIF, SVG. Kích thước tối đa: 2MB</div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-upload me-2"></i>Cập Nhật Logo
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Favicon Tab -->
            <div class="tab-pane fade" id="favicon" role="tabpanel" aria-labelledby="favicon-tab">
                <div class="content-card">
                    <h3 class="content-header">
                        <i class="bi bi-browser-chrome me-2"></i>Quản Lý Favicon
                    </h3>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <h5 class="preview-title">Favicon Hiện Tại</h5>
                                @php
                                    $favicon = \App\Models\WebsiteSetting::where('setting_key', 'favicon')->first();
                                @endphp
                                @if($favicon && $favicon->setting_value)
                                    <img src="{{ asset($favicon->setting_value) }}" alt="Current Favicon" class="logo-preview img-fluid">
                                @else
                                    <div class="logo-preview text-center text-muted">
                                        <i class="bi bi-browser-chrome fs-1"></i>
                                        <p class="mb-0">Chưa có favicon</p>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8">
                                <form action="{{ route('admin.website.updateFavicon') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="favicon" class="form-label">Chọn Favicon Mới</label>
                                        <input type="file" class="form-control" id="favicon" name="favicon" accept="image/*" required>
                                        <div class="form-text">Định dạng: ICO, PNG, JPG, GIF. Kích thước tối đa: 1MB</div>
                                    </div>
                                    <button type="submit" class="btn btn-success">
                                        <i class="bi bi-upload me-2"></i>Cập Nhật Favicon
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slider Tab -->
            <div class="tab-pane fade" id="slider" role="tabpanel" aria-labelledby="slider-tab">
                <div class="content-card">
                    <h3 class="content-header">
                        <i class="bi bi-images me-2"></i>Quản Lý Slider Banner
                    </h3>
                    <div class="card-body">
                        <!-- Add New Slider Form -->
                        <div class="form-section">
                            <h5><i class="bi bi-plus-circle me-2"></i>Thêm Slider Mới</h5>
                            <form action="{{ route('admin.website.createSlider') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="title" class="form-label">Tiêu Đề</label>
                                            <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề slider (tùy chọn)">
                                        </div>
                                        <div class="mb-3">
                                            <label for="description" class="form-label">Mô Tả</label>
                                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Mô tả slider (tùy chọn)"></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="link" class="form-label">Liên Kết</label>
                                            <input type="url" class="form-control" id="link" name="link" placeholder="https://example.com (tùy chọn)">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Hình Ảnh</label>
                                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                                            <div class="form-text">Định dạng: JPEG, PNG, GIF. Kích thước tối đa: 2MB</div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="sort_order" class="form-label">Thứ Tự Hiển Thị</label>
                                            <input type="number" class="form-control" id="sort_order" name="sort_order" value="0" min="0">
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
                                                <label class="form-check-label" for="is_active">
                                                    Hiển Thị Slider
                                                </label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">
                                            <i class="bi bi-plus-circle me-2"></i>Thêm Slider
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Existing Sliders -->
                        <h5><i class="bi bi-list me-2"></i>Danh Sách Slider</h5>
                        @if($sliders->count() > 0)
                            <div class="row">
                                @foreach($sliders as $slider)
                                    <div class="col-md-6 mb-4">
                                        <div class="slider-item">
                                            <img src="{{ asset($slider->image_path) }}" alt="{{ $slider->title }}" class="slider-image">
                                            <div class="slider-info">
                                                <h6>{{ $slider->title ?: 'Không có tiêu đề' }}</h6>
                                                <p class="text-muted mb-2">{{ Str::limit($slider->description, 100) }}</p>
                                                @if($slider->link)
                                                    <p class="mb-2"><small><i class="bi bi-link-45deg me-1"></i><a href="{{ $slider->link }}" target="_blank">{{ $slider->link }}</a></small></p>
                                                @endif
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <small class="text-muted">
                                                        Thứ tự: {{ $slider->sort_order }}
                                                        @if($slider->is_active)
                                                            <span class="badge bg-success ms-2">Đang hiển thị</span>
                                                        @else
                                                            <span class="badge bg-secondary ms-2">Ẩn</span>
                                                        @endif
                                                    </small>
                                                    <div>
                                                        <button class="btn btn-sm btn-warning me-2" onclick="editSlider({{ $slider->id }})"
                                                                title="Chỉnh sửa slider" data-bs-toggle="tooltip">
                                                            <i class="bi bi-pencil-square"></i> Sửa
                                                        </button>
                                                        <button class="btn btn-sm btn-danger" onclick="deleteSlider({{ $slider->id }}, '{{ $slider->title }}')"
                                                                title="Xóa slider" data-bs-toggle="tooltip">
                                                            <i class="bi bi-trash"></i> Xóa
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-5">
                                <i class="bi bi-images fs-1 text-muted mb-3"></i>
                                <h5 class="text-muted">Chưa có slider nào</h5>
                                <p class="text-muted">Thêm slider mới để làm phong phú trang web của bạn</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Settings Tab -->
            <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                <div class="content-card">
                    <h3 class="content-header">
                        <i class="bi bi-gear me-2"></i>Cài Đặt Chung
                    </h3>
                    <div class="card-body">
                        <div class="alert alert-info">
                            <i class="bi bi-info-circle me-2"></i>
                            Tính năng cài đặt chung sẽ được phát triển trong phiên bản tương lai.
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- Edit Slider Modal -->
<div class="modal fade" id="editSliderModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chỉnh Sửa Slider</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="editSliderForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_title" class="form-label">Tiêu Đề</label>
                                <input type="text" class="form-control" id="edit_title" name="title">
                            </div>
                            <div class="mb-3">
                                <label for="edit_description" class="form-label">Mô Tả</label>
                                <textarea class="form-control" id="edit_description" name="description" rows="3"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="edit_link" class="form-label">Liên Kết</label>
                                <input type="url" class="form-control" id="edit_link" name="link">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="edit_image" class="form-label">Hình Ảnh Mới (tùy chọn)</label>
                                <input type="file" class="form-control" id="edit_image" name="image" accept="image/*">
                                <div class="form-text">Để trống nếu không muốn thay đổi hình ảnh</div>
                            </div>
                            <div class="mb-3">
                                <label for="edit_sort_order" class="form-label">Thứ Tự Hiển Thị</label>
                                <input type="number" class="form-control" id="edit_sort_order" name="sort_order" min="0">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="edit_is_active" name="is_active" value="1">
                                    <label class="form-check-label" for="edit_is_active">
                                        Hiển Thị Slider
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
// Auto active tab based on session
document.addEventListener('DOMContentLoaded', function() {
    // Check for active_tab in session (passed from controller)
    @if(session('active_tab'))
        const activeTab = '{{ session('active_tab') }}';
        const tabButton = document.querySelector(`#${activeTab}-tab`);
        const tabContent = document.querySelector(`#${activeTab}`);

        if (tabButton && tabContent) {
            // Remove active class from all tabs
            document.querySelectorAll('.nav-link').forEach(link => {
                link.classList.remove('active');
            });
            document.querySelectorAll('.tab-pane').forEach(pane => {
                pane.classList.remove('show', 'active');
            });

            // Add active class to target tab
            tabButton.classList.add('active');
            tabContent.classList.add('show', 'active');
        }
    @endif
});

// Loading state for forms
document.addEventListener('DOMContentLoaded', function() {
    // Handle logo form
    const logoForm = document.querySelector('form[action*="cap-nhat-logo"]');
    if (logoForm) {
        logoForm.addEventListener('submit', function() {
            const button = this.querySelector('button[type="submit"]');
            const spinner = button.querySelector('.spinner-border');
            const icon = button.querySelector('i');
            const text = button.querySelector('strong');

            // Show loading state
            spinner.classList.remove('d-none');
            icon.style.opacity = '0.5';
            text.style.opacity = '0.5';
            button.disabled = true;

            // Force white text color
            button.style.color = 'white !important';
            if (text) text.style.color = 'white !important';
            if (icon) icon.style.color = 'white !important';
        });
    }

    // Handle favicon form
    const faviconForm = document.querySelector('form[action*="cap-nhat-favicon"]');
    if (faviconForm) {
        faviconForm.addEventListener('submit', function() {
            const button = this.querySelector('button[type="submit"]');
            const spinner = button.querySelector('.spinner-border');
            const icon = button.querySelector('i');
            const text = button.querySelector('strong');

            // Show loading state
            spinner.classList.remove('d-none');
            icon.style.opacity = '0.5';
            text.style.opacity = '0.5';
            button.disabled = true;

            // Force white text color
            button.style.color = 'white !important';
            if (text) text.style.color = 'white !important';
            if (icon) icon.style.color = 'white !important';
        });
    }

    // Force white text on all submit buttons when disabled
    const observer = new MutationObserver(function(mutations) {
        mutations.forEach(function(mutation) {
            if (mutation.type === 'attributes' && mutation.attributeName === 'disabled') {
                const target = mutation.target;
                if (target.tagName === 'BUTTON' && target.type === 'submit' && target.disabled) {
                    target.style.color = 'white';
                    const text = target.querySelector('strong');
                    const icon = target.querySelector('i');
                    if (text) text.style.color = 'white';
                    if (icon) icon.style.color = 'white';
                }
            }
        });
    });

    // Observe all submit buttons
    document.querySelectorAll('button[type="submit"]').forEach(button => {
        observer.observe(button, { attributes: true, attributeFilter: ['disabled'] });
    });
});

function editSlider(id) {
    // Fetch slider data and populate modal
    fetch(`/admin/thong-tin-slider/${id}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                const slider = data.slider;
                document.getElementById('edit_title').value = slider.title || '';
                document.getElementById('edit_description').value = slider.description || '';
                document.getElementById('edit_link').value = slider.link || '';
                document.getElementById('edit_sort_order').value = slider.sort_order || 0;
                document.getElementById('edit_is_active').checked = slider.is_active;

                // Update form action
                document.getElementById('editSliderForm').action = `/admin/cap-nhat-slider/${id}`;

                new bootstrap.Modal(document.getElementById('editSliderModal')).show();
            } else {
                alert('Không thể tải thông tin slider');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Có lỗi xảy ra khi tải thông tin slider');
        });
}

function deleteSlider(id, title) {
    const sliderName = title || 'slider này';
    if (confirm(`Bạn có chắc chắn muốn xóa ${sliderName}?`)) {
        window.location.href = `/admin/xoa-slider/${id}`;
    }
}
</script>

@include('admin/template/footer')

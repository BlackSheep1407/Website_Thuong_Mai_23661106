@include('admin/template/header')

<style>
    .dashboard-section {
        margin-top: 0;
        padding: 0 0 20px 0;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        min-height: 70vh;
    }
    .dashboard-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        border: none;
        margin-bottom: 30px;
        overflow: hidden;
    }
    .dashboard-header {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        color: white;
        padding: 20px;
        margin: 0;
    }
    .stat-card {
        background: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        border-left: 4px solid #007bff;
    }
    .stat-icon {
        font-size: 2rem;
        color: #007bff;
        margin-bottom: 10px;
    }
    .stat-number {
        font-size: 2rem;
        font-weight: bold;
        color: #495057;
    }
    .stat-label {
        color: #6c757d;
        font-size: 0.9rem;
    }
    .chart-container {
        position: relative;
        height: 400px;
        width: 100%;
    }
    .notification-item {
        padding: 15px;
        border-bottom: 1px solid #f8f9fa;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .notification-item:hover {
        background-color: #f8f9fa;
    }
    .notification-item.unread {
        background-color: #e3f2fd;
        border-left: 4px solid #2196f3;
    }
    .notification-time {
        font-size: 0.8rem;
        color: #6c757d;
    }
    .notification-actions {
        margin-top: 10px;
    }
    .notification-actions button {
        margin-right: 5px;
        padding: 5px 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 0.8rem;
    }
    .btn-reply {
        background-color: #28a745;
        color: white;
    }
    .btn-delete {
        background-color: #dc3545;
        color: white;
    }
</style>

<div class="dashboard-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-4 mt-0">Bảng Điều Khiển Admin</h1>

                @if(session('welcome'))
                    <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i>
                        <strong>{{ session('welcome') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                    <div class="stat-number">{{ \App\Models\Users::count() }}</div>
                    <div class="stat-label">Tổng người dùng</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-cart-fill"></i>
                    </div>
                    <div class="stat-number">{{ \App\Models\Order::count() }}</div>
                    <div class="stat-label">Tổng đơn hàng</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-cash-stack"></i>
                    </div>
                    <div class="stat-number">{{ number_format(\App\Models\Order::sum('total'), 0, ',', '.') }}đ</div>
                    <div class="stat-label">Tổng doanh thu</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="bi bi-box-seam-fill"></i>
                    </div>
                    <div class="stat-number">{{ \App\Models\ProductModel::count() }}</div>
                    <div class="stat-label">Tổng sản phẩm</div>
                </div>
            </div>
        </div>

        <!-- Revenue Chart -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="dashboard-card">
                    <h3 class="dashboard-header">Biểu Đồ Doanh Thu Theo Tháng</h3>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="revenueChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Notifications Panel -->
        <div class="row">
            <div class="col-12">
                <div class="dashboard-card">
                    <h3 class="dashboard-header">
                        <i class="bi bi-bell-fill me-2"></i>Thông Báo Liên Hệ
                        <span class="badge bg-danger ms-2" id="unreadCount">0</span>
                    </h3>
                    <div class="card-body">
                        <div id="notificationsList">
                            <!-- Notifications will be loaded here -->
                        </div>
                        @if(count($notifications ?? []) == 0)
                            <div class="text-center text-muted py-4">
                                <i class="bi bi-bell-slash-fill fs-1"></i>
                                <p class="mt-2">Chưa có thông báo nào</p>
                            </div>
                        @else
                            @foreach($notifications ?? [] as $notification)
                                <div class="notification-item {{ $notification->is_read ? '' : 'unread' }}"
                                     data-id="{{ $notification->id }}">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <strong>{{ $notification->name }}</strong>
                                            <span class="notification-time ms-2">{{ $notification->created_at->diffForHumans() }}</span>
                                        </div>
                                        <small class="text-muted">{{ $notification->email }}</small>
                                    </div>
                                    <div class="mt-2">
                                        <p class="mb-2">{{ Str::limit($notification->message, 100) }}</p>
                                        @if(strlen($notification->message) > 100)
                                            <a href="#" class="text-primary" onclick="toggleMessage(this)">Xem thêm</a>
                                        @endif
                                    </div>
                                    <div class="notification-actions">
                                        <button class="btn-reply" onclick="replyToNotification('{{ $notification->email }}', '{{ $notification->name }}')">
                                            <i class="bi bi-reply-fill me-1"></i>Trả lời
                                        </button>
                                        <button class="btn-delete" onclick="deleteNotification({{ $notification->id }}, 'dashboard')">
                                            <i class="bi bi-trash-fill me-1"></i>Xóa
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reply Modal -->
<div class="modal fade" id="replyModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Trả lời: <span id="replyToName"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form id="replyForm">
                <div class="modal-body">
                    <input type="hidden" id="replyToEmail" name="email">
                    <div class="mb-3">
                        <label for="replySubject" class="form-label">Tiêu đề</label>
                        <input type="text" class="form-control" id="replySubject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="replyMessage" class="form-label">Nội dung trả lời</label>
                        <textarea class="form-control" id="replyMessage" name="message" rows="5" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary">Gửi trả lời</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Revenue Chart
    const ctx = document.getElementById('revenueChart').getContext('2d');
    const revenueChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: [
                    @php
                        $monthlyRevenue = [];
                        for($month = 1; $month <= 12; $month++) {
                            $revenue = \App\Models\Order::whereYear('created_at', date('Y'))
                                                      ->whereMonth('created_at', $month)
                                                      ->sum('total');
                            $monthlyRevenue[] = $revenue;
                        }
                        echo implode(',', $monthlyRevenue);
                    @endphp
                ],
                borderColor: '#4CAF50',
                backgroundColor: 'rgba(76, 175, 80, 0.1)',
                borderWidth: 3,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            }).format(context.raw);
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return new Intl.NumberFormat('vi-VN', {
                                style: 'currency',
                                currency: 'VND'
                            }).format(value);
                        }
                    }
                }
            }
        }
    });

    // Update unread count
    updateUnreadCount();
});

function updateUnreadCount() {
    const unreadCount = document.querySelectorAll('.notification-item.unread').length;
    document.getElementById('unreadCount').textContent = unreadCount;
}

function toggleMessage(element) {
    const notificationItem = element.closest('.notification-item');
    const messageElement = notificationItem.querySelector('p');

    if (element.textContent === 'Xem thêm') {
        // Show full message (you would need to store the full message somewhere)
        element.textContent = 'Thu gọn';
    } else {
        // Show truncated message
        element.textContent = 'Xem thêm';
    }
}

function replyToNotification(email, name) {
    document.getElementById('replyToEmail').value = email;
    document.getElementById('replyToName').textContent = name;
    document.getElementById('replySubject').value = 'Re: Thông tin liên hệ từ 2Tfresh Market';

    new bootstrap.Modal(document.getElementById('replyModal')).show();
}

function deleteNotification(id, context = 'dashboard') {
    if (confirm('Bạn có chắc chắn muốn xóa thông báo này?')) {
        // Make AJAX call to delete the notification
        fetch(`{{ url('admin/notifications') }}/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Remove the notification from DOM
                const notificationItem = document.querySelector(`[data-id="${id}"]`);
                if (notificationItem) {
                    notificationItem.remove();
                }
                // Update the badge count in dashboard
                updateUnreadCount();
                // Update the badge count in header navigation
                updateHeaderBadge();
                // Show success message
                alert('Thông báo đã được xóa thành công!');
            } else {
                alert('Có lỗi xảy ra khi xóa thông báo!');
            }
        })
        .catch(error => {
            console.error('Error deleting notification:', error);
            alert('Có lỗi xảy ra khi xóa thông báo!');
        });
    }
}

function updateHeaderBadge() {
    const unreadCount = document.querySelectorAll('.notification-item.unread').length;
    const headerBadge = document.getElementById('notificationBadge');
    if (headerBadge) {
        if (unreadCount > 0) {
            headerBadge.textContent = unreadCount > 99 ? '99+' : unreadCount;
            headerBadge.style.display = 'inline-block';
        } else {
            headerBadge.style.display = 'none';
        }
    }
}

// Handle reply form submission
document.getElementById('replyForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const email = formData.get('email');
    const subject = formData.get('subject');
    const message = formData.get('message');

    // Here you would make an AJAX call to send the reply email
    alert('Tính năng gửi email trả lời đang được phát triển. Email sẽ được gửi tới: ' + email);

    // Close modal
    bootstrap.Modal.getInstance(document.getElementById('replyModal')).hide();
});
</script>

@include('admin/template/footer')

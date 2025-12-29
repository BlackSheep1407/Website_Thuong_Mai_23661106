<!DOCTYPE html>
<html lang="en">
<head>
  <title>2TFresh - admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  {{-- import css file --}
  {{-- đường dẫn trên sẽ tự động dẫn tới public trong laravel -> admin/css/styles.css --}}
  <link rel="stylesheet" href="{{ asset('/admin/css/styles.css') }}"> 
     {{-- icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
     @import url('https://fonts.googleapis.com/css2?family=Dongle&family=Marmelad&display=swap');
  .fakeimg {
    height: 200px;
    background: #aaa;
    {{-- Font chữ import --}}
  }

  /* Notification dropdown styles */
  .notification-item {
    padding: 10px 15px;
    border-bottom: 1px solid #f0f0f0;
    cursor: pointer;
    transition: background-color 0.2s;
  }
  .notification-item:hover {
    background-color: #f8f9fa;
  }
  .notification-item.unread {
    background-color: #e3f2fd;
    border-left: 3px solid #2196f3;
  }
  .notification-time {
    font-size: 0.8rem;
    color: #6c757d;
  }

  /* Position notification bell on the far right */
  .navbar-nav {
    flex-direction: row;
    width: 100%;
  }
  .navbar-nav .nav-item:not(:last-child) {
    margin-right: 15px;
  }
  .navbar-nav .nav-item:last-child {
    margin-left: auto;
    margin-right: 0;
  }
  .notification-bell-container {
    position: relative;
  }
  </style>

  <script>
    // Notification functionality
    document.addEventListener('DOMContentLoaded', function() {
      loadNotifications();
      updateNotificationBadge();
    });

    function toggleNotifications() {
      const dropdown = document.getElementById('notificationDropdown');
      dropdown.style.display = dropdown.style.display === 'block' ? 'none' : 'block';
    }

    function loadNotifications() {
      fetch('{{ url("admin/dashboard") }}', {
        method: 'GET',
        headers: {
          'X-Requested-With': 'XMLHttpRequest',
          'Accept': 'application/json',
        }
      })
      .then(response => response.text())
      .then(html => {
        // Extract notifications from the dashboard page
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');
        const notifications = doc.querySelectorAll('.notification-item');

        const notificationList = document.getElementById('notificationList');
        notificationList.innerHTML = '';

        if (notifications.length === 0) {
          notificationList.innerHTML = '<div class="text-center text-muted py-3">Không có thông báo mới</div>';
          return;
        }

        notifications.forEach((notification, index) => {
          if (index < 5) { // Show only first 5 notifications in dropdown
            // Clone and fix any timestamp issues
            const clonedNotification = notification.cloneNode(true);
            // Ensure timestamps are properly handled
            notificationList.appendChild(clonedNotification);
          }
        });
      })
      .catch(error => {
        console.error('Error loading notifications:', error);
      });
    }

    function updateNotificationBadge() {
      const unreadCount = document.querySelectorAll('.notification-item.unread').length;
      const badge = document.getElementById('notificationBadge');

      if (unreadCount > 0) {
        badge.textContent = unreadCount > 99 ? '99+' : unreadCount;
        badge.style.display = 'inline-block';
      } else {
        badge.style.display = 'none';
      }
    }

    // Close dropdown when clicking outside
    document.addEventListener('click', function(e) {
      const dropdown = document.getElementById('notificationDropdown');
      const bell = document.getElementById('notificationBell');

      if (!bell.contains(e.target) && !dropdown.contains(e.target)) {
        dropdown.style.display = 'none';
      }
    });

    function deleteNotification(id) {
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
            // Update the badge count
            updateNotificationBadge();
            // Reload notifications to get updated count
            loadNotifications();
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
  </script>
</head>
<body>
  {{-- style="background-image: url('/admin/img/admin_banner.jpg'); height:220px; background-size:cover;" --}}
<div class="header_admin_banner p-5 text-black text-center"  >
  <h1>2TFresh</h1>
  <p>Admin</p> 
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      {{-- <li class="nav-item">
        <a class="nav-link active" href="">Trang chủ</a>
      </li> --}}
      <li class="nav-item">
    <a class="nav-link {{ request()->is('admin') ? 'active' : '' }}" 
       href="{{ url('home') }}">
       <i class="bi bi-house-door-fill me-1"></i> Trang chủ
    </a>
</li>
      {{-- <li class="nav-item">
        <a class="nav-link" href="/admin/danh-sach-nguoi-dung">Người dùng</a>
      </li> --}}
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/danh-sach-nguoi-dung*') ? 'active' : '' }}" 
          href="{{ url('admin/danh-sach-nguoi-dung') }}">
        <i class="bi bi-people-fill me-1"></i> Người dùng</a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/danh-sach-san-pham*') ? 'active' : '' }}" 
          href="{{ url('admin/danh-sach-san-pham') }}">
        <i class="bi bi-basket-fill me-1"></i> Sản phẩm</a>
      </li>

      {{-- <li class="nav-item">
        <a class="nav-link" href="/admin/danh-sach-danh-muc">Danh mục</a>
      </li> --}}
      {{-- Danh mục (THÊM PHÂN CÁCH) --}}
      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
          href="{{ url('admin/dashboard') }}">
        <i class="bi bi-house-door-fill me-1"></i> Dashboard</a>
      </li>

      <li class="nav-item">
        <a class="nav-link {{ request()->is('admin/profile') ? 'active' : '' }}"
          href="{{ url('admin/profile') }}">
        <i class="bi bi-person-fill me-1"></i> Profile</a>
      </li>

      <li class="nav-item nav-separator-right">
                {{-- Dùng * để bắt các trang con như thêm/sửa danh mục --}}
                <a class="nav-link {{ request()->is('admin/danh-sach-danh-muc*') ? 'active' : '' }}"
                   href="{{ url('admin/danh-sach-danh-muc') }}">
                   <i class="bi bi-tags-fill me-1"></i> Danh mục
                </a>
            </li>
      <?php
          if(session()->has('user'))
          {
            $user=session()->get('user');
            $username = is_array($user) ? ($user['username'] ?? 'Admin') : 'Admin';
            echo'<li class="nav-item"><a class="nav-link" id="nav-state" href="#">'.$username.'</a></li>';
          }
       ?>
      <li class="nav-item position-relative">
        <a class="nav-link" href="#" onclick="toggleNotifications()" id="notificationBell">
          <i class="bi bi-bell-fill me-1"></i>
          Thông báo
          <span class="badge bg-danger position-absolute top-0 start-100 translate-middle" id="notificationBadge" style="display: none;">0</span>
        </a>
        <div class="dropdown-menu position-absolute" id="notificationDropdown" style="display: none; right: 0; left: auto; min-width: 300px; max-height: 400px; overflow-y: auto;">
          <div class="dropdown-header p-2 bg-light">
            <h6 class="m-0">Thông báo liên hệ</h6>
          </div>
          <div id="notificationList">
            <!-- Notifications will be loaded here -->
          </div>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item text-center" href="{{ url('admin/dashboard') }}">
            <i class="bi bi-arrow-right-circle me-1"></i>Xem tất cả
          </a>
        </div>
      </li>

      <li class="nav-item">
        <?php
          if (!session()->has('user')) {
            echo'<a class="nav-link" href="/admin/dang-nhap"><i class="bi bi-box-arrow-in-right me-1"></i>Đăng nhập</a>';
          }
          else {
            echo'<a class="nav-link" href="/admin/thoat"><i class="bi bi-box-arrow-right me-1"></i>Thoát</a>';
          }
         ?>

      </li>
    </ul>
  </div>
</nav>
<div class="container mt-5">
@yield('content')

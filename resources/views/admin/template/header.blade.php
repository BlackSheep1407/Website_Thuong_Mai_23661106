<!DOCTYPE html>
<html lang="en">
<head>
  <title>2TFresh - admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicon -->
  @php
      $favicon = \App\Models\WebsiteSetting::where('setting_key', 'favicon')->first();
  @endphp
  <link rel="icon" type="image/x-icon" href="{{ $favicon ? asset('storage/' . $favicon->setting_value) . '?v=' . time() : asset('main_home/img/logo/favicon.ico') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ $favicon ? asset('storage/' . $favicon->setting_value) . '?v=' . time() : asset('main_home/img/logo/favicon.ico') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  {{-- import css file --}
  {{-- đường dẫn trên sẽ tự động dẫn tới public trong laravel -> admin/css/styles.css --}}
  <link rel="stylesheet" href="{{ asset('/admin/css/styles.css') }}"> 
     {{-- icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
     @import url('https://fonts.googleapis.com/css2?family=Dongle&family=Marmelad&display=swap');

     /* Layout: Header on top right + Sidebar on left */
     body {
       margin: 0;
       font-family: Arial, sans-serif;
       background-color: #f8f9fa;
       padding-left: 280px;
       transition: padding-left 0.3s ease;
     }

     body.sidebar-collapsed {
       padding-left: 70px;
     }

     .admin-layout {
       display: flex;
       min-height: 100vh;
     }

     /* Sidebar - Left side - Fixed position */
     .sidebar {
       width: 280px;
       background-color: #343a40; /* Dark gray like before */
       color: white;
       position: fixed;
       left: 0;
       top: 0;
       height: 100vh;
       display: flex;
       flex-direction: column;
       box-shadow: 2px 0 10px rgba(0,0,0,0.1);
       transition: width 0.3s ease;
       z-index: 1000;
       overflow-y: auto;
       overflow-x: hidden;
     }

     .sidebar.collapsed {
       width: 70px;
     }

     .sidebar.collapsed .sidebar-profile {
       padding: 15px 10px;
     }

     .sidebar.collapsed .sidebar-avatar {
       width: 40px;
       height: 40px;
       margin: 0 auto 10px;
     }

     .sidebar.collapsed .sidebar-profile h5,
     .sidebar.collapsed .sidebar-profile p {
       display: none;
     }

     .sidebar.collapsed .sidebar-menu a .nav-text {
       display: none;
     }

     .sidebar.collapsed .sidebar-menu a {
       justify-content: center;
       padding: 15px 10px;
     }

     .sidebar.collapsed .sidebar-menu i {
       margin-right: 0;
     }

    .sidebar-footer {
       border-top: 1px solid #495057;
       margin-top: auto;
     }



    .sidebar.collapsed .sidebar-footer .sidebar-menu a {
       justify-content: flex-start;
       padding: 12px 15px;
     }

    .sidebar.collapsed .sidebar-footer .sidebar-menu i {
       margin-right: 10px;
     }

     /* Ensure footer items are always clickable and visible */
     .sidebar-footer .sidebar-menu a {
       min-height: 50px !important;
       display: flex !important;
       align-items: center;
       justify-content: flex-start;
       background-color: rgba(255,255,255,0.1) !important;
       border-radius: 4px;
       margin: 5px 10px;
       transition: background-color 0.3s ease;
     }

     .sidebar-footer .sidebar-menu a:hover {
       background-color: rgba(255,255,255,0.2) !important;
     }

    .sidebar.collapsed .sidebar-footer .sidebar-menu a {
       justify-content: center !important;
       margin: 5px;
       padding: 10px;
     }

    .sidebar.collapsed .sidebar-footer .sidebar-menu i {
       margin-right: 0;
     }

     /* Make sure icons are always visible */
     .sidebar-footer .sidebar-menu i {
       font-size: 1.2rem;
       color: #fff;
     }

     .notification-dropdown {
       position: fixed !important;
       top: auto !important;
       bottom: 50px !important;
       left: 290px !important;
       right: auto !important;
       width: 300px !important;
     }

     .sidebar.collapsed .notification-dropdown {
       left: 80px !important;
     }

     .sidebar-profile {
       padding: 30px 20px;
       text-align: center;
       border-bottom: 1px solid #495057;
       background: rgba(255,255,255,0.05);
     }

     .sidebar-avatar {
       width: 80px;
       height: 80px;
       border-radius: 50%;
       margin: 0 auto 15px;
       border: 3px solid #fff;
       box-shadow: 0 4px 8px rgba(0,0,0,0.2);
       object-fit: cover;
     }

     .sidebar-profile h5 {
       margin: 0 0 5px 0;
       font-size: 1.1rem;
       font-weight: 600;
       color: #fff;
     }

     .sidebar-profile p {
       margin: 0;
       font-size: 0.9rem;
       opacity: 0.8;
       color: #adb5bd;
     }

     .sidebar-menu {
       list-style: none;
       padding: 0;
       margin: 0;
       flex: 1;
     }

     .sidebar-menu li {
       border-bottom: 1px solid #495057;
     }

     .sidebar-menu a {
       display: flex;
       align-items: center;
       padding: 15px 25px;
       color: #adb5bd;
       text-decoration: none;
       transition: all 0.3s ease;
       font-weight: 500;
     }

     .sidebar-menu a:hover {
       background-color: #495057;
       color: #fff;
     }

     .sidebar-menu a.active {
       background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
       color: #fff;
       border-left: 4px solid #fff;
       box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
       font-weight: 600;
       position: relative;
     }

     .sidebar-menu a.active::before {
       content: '';
       position: absolute;
       left: 0;
       top: 0;
       bottom: 0;
       width: 4px;
       background: linear-gradient(to bottom, #fff, #e9ecef);
       border-radius: 0 2px 2px 0;
     }

     .sidebar-menu i {
       margin-right: 15px;
       width: 20px;
       text-align: center;
       font-size: 1.1rem;
     }

     /* Right Content Area - Header + Content stacked */
     .right-content {
       width: 100%;
       min-height: 100vh;
     }

     /* Header Banner - Top right area */
     .header_admin_banner {
       background-image: url('/admin/img/admin_banner.jpg');
       background-size: cover;
       background-position: center;
       height: 220px;
       display: flex;
       align-items: center;
       justify-content: center;
       color: white;
       text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
       position: relative;
       width: 100%;
     }

     .header_admin_banner .header-content {
       display: flex;
       align-items: center;
       width: 100%;
       max-width: 1200px;
       position: relative;
     }

     .header-title-container {
       flex: 1;
       text-align: center;
     }

     .toggle-sidebar {
       position: absolute;
       left: 0;
       z-index: 10;
     }

     .header_admin_banner h1 {
       font-size: 3rem;
       margin: 0;
       font-weight: bold;
     }

     .header_admin_banner p {
       font-size: 1.5rem;
       margin: 0;
       opacity: 0.9;
     }

     /* Content area - middle section */
     .content-area {
       background-color: #f8f9fa;
       padding: 20px 0 0 0; /* Add some space from header */
       margin: 0;
       margin-top: 0 !important;
     }

     /* Remove all Bootstrap spacing for admin content */
     .content-area .container {
       padding-left: 0;
       padding-right: 0;
       max-width: 100%;
     }

     .content-area .container-fluid {
       padding-left: 0;
       padding-right: 0;
     }

     .content-area .row {
       margin-left: 0;
       margin-right: 0;
     }

     .content-area .col,
     .content-area .col-12 {
       padding-left: 15px;
       padding-right: 15px;
     }



     /* Notification dropdown */
     .notification-dropdown {
       background: white !important;
       border: 1px solid #dee2e6 !important;
       border-radius: 0.375rem !important;
       box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
       color: #333 !important;
     }

     .notification-dropdown .dropdown-header {
       background: #f8f9fa !important;
       border-bottom: 1px solid #dee2e6 !important;
       color: #495057 !important;
     }

     .notification-dropdown .dropdown-item {
       color: #495057 !important;
       text-decoration: none;
     }

     .notification-dropdown .dropdown-item:hover {
       background-color: #f8f9fa !important;
       color: #007bff !important;
     }

     .notification-item {
       padding: 12px 15px;
       border-bottom: 1px solid #e9ecef;
       cursor: pointer;
       transition: background-color 0.2s;
       color: #333 !important;
     }

     .notification-item:hover {
       background-color: #f8f9fa !important;
     }

     .notification-item.unread {
       background-color: #e3f2fd !important;
       border-left: 3px solid #2196f3 !important;
       color: #1976d2 !important;
     }

     .notification-item strong {
       color: #495057 !important;
     }

     .notification-item .text-muted {
       color: #6c757d !important;
     }

     .notification-time {
       font-size: 0.8rem;
       color: #6c757d !important;
     }

     .notification-actions button {
       color: white !important;
       border: none;
       padding: 6px 12px;
       border-radius: 4px;
       cursor: pointer;
       font-size: 0.85rem;
       margin-right: 5px;
       transition: opacity 0.3s ease;
     }

     .notification-actions button:hover {
       opacity: 0.8 !important;
     }

     .btn-reply {
       background-color: #28a745 !important;
     }

     .btn-delete {
       background-color: #dc3545 !important;
     }

     /* Responsive */
     @media (max-width: 992px) {
       .sidebar {
         transform: translateX(-100%);
         transition: transform 0.3s ease;
       }

       .sidebar.show {
         transform: translateX(0);
       }

       .main-content {
         margin-left: 0;
       }

       .toggle-sidebar {
         display: block !important;
       }

       .overlay {
         display: none;
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         background-color: rgba(0,0,0,0.5);
         z-index: 999;
       }

       .overlay.show {
         display: block;
       }
     }

     @media (max-width: 576px) {
       .header_admin_banner h1 {
         font-size: 2rem;
       }

       .header_admin_banner p {
         font-size: 1.2rem;
       }

       .sidebar {
         width: 250px;
       }

       .main-content {
         margin-left: 0;
       }

       .content-area {
         padding: 15px;
       }
     }

     .toggle-sidebar {
       display: block !important;
       background: linear-gradient(135deg, #007bff 0%, #0056b3 100%) !important;
       border: none !important;
       color: #ffffff !important;
       font-size: 1.1rem;
       font-weight: 600;
       cursor: pointer;
       padding: 12px 16px;
       border-radius: 50px;
       transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
       margin-right: 20px;
       box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
       position: relative;
       overflow: hidden;
     }

     .toggle-sidebar::before {
       content: '';
       position: absolute;
       top: 0;
       left: -100%;
       width: 100%;
       height: 100%;
       background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
       transition: left 0.5s;
     }

     .toggle-sidebar:hover::before {
       left: 100%;
     }

     .toggle-sidebar:hover {
       background: linear-gradient(135deg, #0056b3 0%, #004085 100%) !important;
       transform: translateY(-2px) scale(1.05);
       box-shadow: 0 8px 20px rgba(0, 123, 255, 0.4);
     }

     .toggle-sidebar:active {
       transform: translateY(0) scale(0.98);
       box-shadow: 0 2px 8px rgba(0, 123, 255, 0.3);
     }

     .toggle-sidebar i {
       transition: transform 0.3s ease;
     }

     .toggle-sidebar:hover i {
       transform: scale(1.1);
     }

     @media (max-width: 992px) {
       .toggle-sidebar {
         display: block !important;
       }
     }
  </style>

  <script>
    // Sidebar toggle functionality
    function toggleSidebar() {
      const sidebar = document.querySelector('.sidebar');
      const body = document.body;
      const overlay = document.querySelector('.overlay');

      if (window.innerWidth <= 768) {
        // Mobile behavior
        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');
      } else {
        // Desktop behavior
        sidebar.classList.toggle('collapsed');
        body.classList.toggle('sidebar-collapsed');
      }
    }

    // Notification functionality
    document.addEventListener('DOMContentLoaded', function() {
      loadNotifications();
      updateNotificationBadge();

      // Set active menu item
      setActiveMenuItem();

      // Mobile overlay click
      const overlay = document.querySelector('.overlay');
      if (overlay) {
        overlay.addEventListener('click', function() {
          document.querySelector('.sidebar').classList.remove('show');
          this.classList.remove('show');
        });
      }
    });

    function setActiveMenuItem() {
      const currentPath = window.location.pathname;
      const menuItems = document.querySelectorAll('.sidebar-menu a');

      menuItems.forEach(item => {
        item.classList.remove('active');
        const href = item.getAttribute('href');
        if (href && (currentPath === href || currentPath.startsWith(href.replace('*', '')))) {
          item.classList.add('active');
        }
      });
    }

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
          notificationList.innerHTML = '<div class="text-center text-muted py-3" style="color: #6c757d !important;">Không có thông báo mới</div>';
          return;
        }

        notifications.forEach((notification, index) => {
          if (index < 5) { // Show only first 5 notifications in dropdown
            // Clone and ensure proper styling
            const clonedNotification = notification.cloneNode(true);

            // Ensure the cloned notification has proper classes and styles
            clonedNotification.style.color = '#333';
            clonedNotification.style.borderBottom = '1px solid #e9ecef';

            // Style the strong elements
            const strongElements = clonedNotification.querySelectorAll('strong');
            strongElements.forEach(strong => {
              strong.style.color = '#495057';
            });

            // Style the muted text
            const mutedElements = clonedNotification.querySelectorAll('.text-muted');
            mutedElements.forEach(muted => {
              muted.style.color = '#6c757d';
            });

            // Style the time elements
            const timeElements = clonedNotification.querySelectorAll('.notification-time');
            timeElements.forEach(time => {
              time.style.color = '#6c757d';
            });

            notificationList.appendChild(clonedNotification);
          }
        });
      })
      .catch(error => {
        console.error('Error loading notifications:', error);
        // Fallback: show empty state
        const notificationList = document.getElementById('notificationList');
        notificationList.innerHTML = '<div class="text-center text-muted py-3" style="color: #6c757d !important;">Không thể tải thông báo</div>';
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
  {{-- Combined Layout: Fixed Sidebar + Right Content Area --}}
  <!-- Sidebar with Admin Info - Fixed position -->
  <div class="sidebar">
    @php
      $user = session('user');
      $adminName = 'Admin';
      $adminAvatar = '/avatars/admin_avatar_1_1766929198.jpg'; // Default avatar

      if ($user && is_array($user)) {
        $adminName = $user['username'] ?? $user['user_fullname'] ?? 'Admin';
        if (isset($user['avatar']) && $user['avatar']) {
          $adminAvatar = $user['avatar'];
        } elseif (isset($user['id'])) {
          // Try to get avatar from database
          $adminUser = \App\Models\Users::find($user['id']);
          if ($adminUser && $adminUser->avatar) {
            $adminAvatar = $adminUser->avatar;
          }
        }
      }
    @endphp

    <div class="sidebar-profile">
      <img src="{{ asset($adminAvatar) }}" alt="Admin Avatar" class="sidebar-avatar" onerror="this.src='/avatars/admin_avatar_1_1766929198.jpg'">
      <h5>Xin chào {{ $adminName }}</h5>
      <p>Administrator</p>
    </div>

    <ul class="sidebar-menu">
      <li>
        <a href="{{ url('home') }}">
          <i class="bi bi-house-door-fill"></i>
          <span class="nav-text">Trang chủ</span>
        </a>
      </li>
      <li>
        <a href="{{ url('admin/dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
          <i class="bi bi-speedometer2"></i>
          <span class="nav-text">Dashboard</span>
        </a>
      </li>
      <li>
        <a href="{{ url('admin/danh-sach-nguoi-dung') }}" class="{{ request()->is('admin/danh-sach-nguoi-dung*') ? 'active' : '' }}">
          <i class="bi bi-people-fill"></i>
          <span class="nav-text">Người dùng</span>
        </a>
      </li>
      <li>
        <a href="{{ url('admin/danh-sach-san-pham') }}" class="{{ request()->is('admin/danh-sach-san-pham*') ? 'active' : '' }}">
          <i class="bi bi-basket-fill"></i>
          <span class="nav-text">Sản phẩm</span>
        </a>
      </li>
      <li>
        <a href="{{ url('admin/danh-sach-danh-muc') }}" class="{{ request()->is('admin/danh-sach-danh-muc*') ? 'active' : '' }}">
          <i class="bi bi-tags-fill"></i>
          <span class="nav-text">Danh mục</span>
        </a>
      </li>
      <li>
        <a href="{{ url('admin/quan-ly-website') }}" class="{{ request()->is('admin/quan-ly-website*') ? 'active' : '' }}">
          <i class="bi bi-gear-fill"></i>
          <span class="nav-text">Quản lý website</span>
        </a>
      </li>
      <li>
        <a href="{{ url('admin/profile') }}" class="{{ request()->is('admin/profile') ? 'active' : '' }}">
          <i class="bi bi-person-fill"></i>
          <span class="nav-text">Profile</span>
        </a>
      </li>
    </ul>

    <!-- Bottom section with notifications and logout -->
    <div class="sidebar-footer">
      <ul class="sidebar-menu">
        <li>
          <a href="#" onclick="toggleNotifications()" id="notificationBell">
            <i class="bi bi-bell-fill"></i>
            <span class="nav-text">Thông báo</span>
            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle" id="notificationBadge" style="display: none;">0</span>
          </a>
          <div class="notification-dropdown position-absolute" id="notificationDropdown" style="display: none; right: 10px; left: auto; min-width: 300px; max-height: 400px; overflow-y: auto; background: white; border: 1px solid #dee2e6; border-radius: 0.375rem; box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15); z-index: 1001;">
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
        <li>
          <a href="/admin/thoat">
            <i class="bi bi-box-arrow-right"></i>
            <span class="nav-text">Thoát</span>
          </a>
        </li>
      </ul>
    </div>
  </div>

  {{-- Right side content: Header + Content stacked vertically --}}
  <div class="right-content">
    {{-- Header/Banner on top --}}
    <div class="header_admin_banner">
      <div class="header-content">
        <button class="toggle-sidebar" onclick="toggleSidebar()">
          <i class="bi bi-list"></i>
        </button>
        <div class="header-title-container">
          <h1>2TFresh</h1>
          <p>Admin</p>
        </div>
      </div>
    </div>

    {{-- Content area below header --}}
    <div class="content-area">
  </div>

  <!-- Mobile Overlay -->
  <div class="overlay"></div>

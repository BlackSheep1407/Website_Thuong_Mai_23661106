{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head> --}}


<head>
  {{-- Bảo mật bằng phương thức csrf cho POST --}}
      <!-- CSRF Token cho AJAX -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>2Tfresh Market- Web bán trái cây tươi</title>
  <!-- Favicon -->
  <link rel="icon" type="image/x-icon" href="{{ asset('main_home/img/logo/favicon.ico') }}">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('main_home/img/logo/favicon.ico') }}">
  <!-- CSS chung cho trang web -->
  <link rel="stylesheet" href="{{ asset('main_home/css/style.css') }}">
  <!-- css Khôi phục tài khoản -->
  <link rel="stylesheet" href="{{ asset('main_home/css/recoveryAuth.css') }}">
  <link rel="stylesheet" href="{{ asset('main_home/css/cart.css') }}">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  {{-- Bootstrap Icon --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    {{-- Appline.js để hiển  thị popup modal giỏ hàng (tiện ích laravel) --}}
  <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
  <!-- link font chu -->
  <style>
    /* import đặt trên mọi rules css */
    @import url('https://fonts.googleapis.com/css2?family=Dongle&family=Marmelad&display=swap');
  </style>
</head>

  <!-- Header -->
  <header>
    <div class="logo">
      <a href="{{ route('home') }}#top" onclick="scrollToTop()">
        <img src="{{ asset('main_home/img/logo/logo.png') }}" alt="Logo">
      </a>
    </div>
    <nav>
      <ul>
        <li><a href="{{ route('home') }}">Trang Chủ</a></li>
        <li><a href="{{ route('home') }}">Sản Phẩm</a>
          <ul class="submenu">
            @php
                $categoryMappings = [
                    'Trái cây tươi' => 1,
                    'Trái cây cắt sẵn' => 2,
                    'Gói quà tặng trái cây' => 3,
                    'Nước ép trái cây' => 4,
                ];
            @endphp
            @foreach($categoryMappings as $name => $id)
                <li><a href="{{ url('/') }}#category-{{ $id }}" onclick="scrollToSection('category-{{ $id }}')">{{ $name }}</a></li>
            @endforeach
          </ul>
        </li>
        <li><a href="{{ route('about') }}">Giới Thiệu</a></li>
        <li><a href="{{ route('contact') }}">Liên Hệ</a></li>
      </ul>
      <div class="inner-tk">
        <span></span>
        <input type="text" id="searchInput" placeholder="tìm kiếm sản phẩm...">
        <button type="button" id="searchBtn" class="btn btn-success btn-sm ms-1">
          <i class="fas fa-search"></i>
        </button>
      </div>

      

      {{-- Nút GIỎ HÀNG CẦN THÊM DÒNG x-data="{ cartOpen: false }" ĐỂ MỞ POPUP GIỎ HÀNG --}}
      <div class="header-actions">

        <!-- Giỏ hàng (Alpine.js.) -->
        {{-- <button @click="cartOpen = true" 
    class="cart-btn flex items-center gap-2 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
    Giỏ hàng (<span x-text="{{ count(session('cart', [])) }}"></span>)
    <i class="bi bi-basket-fill text-lg"></i>
</button> --}}
@php
  $user = session('user');
  // hỗ trợ cả hai dạng session: ['id'=>..] hoặc [[..]]
  if (is_array($user) && isset($user[0]) && is_array($user[0])) {
    $userId = $user[0]['id'] ?? null;
  } elseif (is_array($user)) {
    $userId = $user['id'] ?? null;
  } else {
    $userId = null;
  }
  $cartKey = $userId ? 'cart_user_' . $userId : 'cart_guest';
  $cart = session($cartKey, []);
  $cartCount = is_array($cart) ? count($cart) : 0;
@endphp

<button title="Giỏ hàng" type="button"
    class="cart-btn flex items-center gap-2 px-2 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
    data-bs-toggle="modal" data-bs-target="#cartModal">
    <i class="bi bi-basket-fill"></i>
    Giỏ hàng (<span id="cartBadge">{{ $cartCount }}</span>)
</button>

{{-- gio hang js --}}
{{-- <button  title="Giỏ hàng" type="button" 
        class="cart-btn flex items-center gap-2 px-2 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition"
        data-bs-toggle="modal" data-bs-target="#cartModal">
    <i class="bi bi-basket-fill"></i>
    Giỏ hàng (<span id="cartBadge">0</span>)
</button> --}}

{{-- CHUYỂN MODAL SANG DƯỚI HEADER TRONG home.blade.php --}}

    </div>

      <!-- Đăng nhập và Đăng ký -->
        @if(session()->has('user'))
            @php
                $u = session('user');
                $displayName = '';
                $isAdmin = false;
                if (is_array($u) && isset($u[0]) && is_array($u[0])) {
                    $displayName = $u[0]['username'] ?? '';
                    $isAdmin = ($u[0]['user_role'] ?? 0) == 1;
                } elseif (is_array($u)) {
                    $displayName = $u['username'] ?? '';
                    $isAdmin = ($u['user_role'] ?? 0) == 1;
                }
            @endphp
          <a class="auth-btn nav-link" href="/profile">
            <i class="bi bi-person-circle me-1"></i>{{ $displayName }}
          </a>
          @if($isAdmin)
            <a class="auth-btn nav-link btn-admin-back" href="/admin/danh-sach-nguoi-dung" title="Quay lại trang quản trị">
              <i class="bi bi-arrow-left-circle"></i> Admin
            </a>
          @endif
          <a class="auth-btn nav-link" href="/thoat">
            <i class="bi bi-box-arrow-right me-1"></i>Đăng xuất
          </a>
        @else
          <a class="auth-btn nav-link" href="/dang-nhap">Đăng nhập</a>
          <a class="auth-btn nav-link" href="/dang-ky">Đăng ký</a>
          <a class="auth-btn nav-link" href="/quen-mat-khau">Khôi phục tài khoản</a>
        @endif
        {{-- <button class="auth-btn" id="registerBtn">Đăng ký</button>
      </div>
        <!-- Khôi phục tài khoản  -->
        <button class="auth-btn" id="recoveryBtn">Khôi phục tài khoản</button> --}}
        
    </nav>
  </header>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Scroll functionality -->
  <script>
    function scrollToTop() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    }

    function scrollToSection(sectionId) {
      // Prevent default link behavior and handle scrolling manually
      event.preventDefault();

      const element = document.getElementById(sectionId);
      if (element) {
        // Calculate offset to account for fixed header
        const headerOffset = 120; // Adjust based on header height
        const elementPosition = element.offsetTop;
        const offsetPosition = elementPosition - headerOffset;

        window.scrollTo({
          top: offsetPosition,
          behavior: 'smooth'
        });
      }
    }
  </script>

  <!-- Search functionality with autocomplete -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const searchInput = document.getElementById('searchInput');
      const searchBtn = document.getElementById('searchBtn');

      // Create autocomplete dropdown
      const autocompleteContainer = document.createElement('div');
      autocompleteContainer.id = 'autocomplete-dropdown';
      autocompleteContainer.style.cssText = `
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 1px solid #ddd;
        border-top: none;
        border-radius: 0 0 4px 4px;
        max-height: 200px;
        overflow-y: auto;
        z-index: 1000;
        display: none;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      `;

      // Style for autocomplete items
      const itemStyle = `
        padding: 8px 12px;
        cursor: pointer;
        border-bottom: 1px solid #f0f0f0;
        color: #333;
      `;

      const hoverStyle = `
        background-color: #4CAF50;
        color: white;
      `;

      const innerTk = searchInput.parentElement;
      innerTk.style.position = 'relative';
      innerTk.appendChild(autocompleteContainer);

      let currentFocus = -1;
      let suggestions = [];

      function performSearch(query = null) {
        const searchQuery = query || searchInput.value.trim();
        if (searchQuery.length > 0) {
          // Redirect to home page with search query
          window.location.href = '{{ route("home") }}?search=' + encodeURIComponent(searchQuery);
        }
      }

      function showSuggestions(suggestionList) {
        autocompleteContainer.innerHTML = '';
        if (suggestionList.length === 0) {
          autocompleteContainer.style.display = 'none';
          return;
        }

        suggestionList.forEach((suggestion, index) => {
          const item = document.createElement('div');
          item.textContent = suggestion;
          item.style.cssText = itemStyle;

          item.addEventListener('mouseenter', function() {
            this.style.cssText = itemStyle + hoverStyle;
          });

          item.addEventListener('mouseleave', function() {
            this.style.cssText = itemStyle;
          });

          item.addEventListener('click', function() {
            searchInput.value = suggestion;
            autocompleteContainer.style.display = 'none';
            performSearch(suggestion);
          });

          autocompleteContainer.appendChild(item);
        });

        autocompleteContainer.style.display = 'block';
      }

      function fetchSuggestions(query) {
        if (query.length < 2) {
          autocompleteContainer.style.display = 'none';
          return;
        }

        fetch('{{ route("search.suggestions") }}?q=' + encodeURIComponent(query))
          .then(response => response.json())
          .then(data => {
            suggestions = data;
            showSuggestions(data);
          })
          .catch(error => {
            console.error('Error fetching suggestions:', error);
            autocompleteContainer.style.display = 'none';
          });
      }

      function showPopularProducts() {
        // Fetch popular products from database
        fetch('{{ route("popular.products") }}')
          .then(response => response.json())
          .then(data => {
            if (data.length > 0) {
              showSuggestions(data);
            } else {
              // Fallback if no products in database
              showSuggestions(['Tìm kiếm sản phẩm...']);
            }
          })
          .catch(error => {
            console.error('Error fetching popular products:', error);
            // Fallback suggestions
            showSuggestions(['Tìm kiếm sản phẩm...']);
          });
      }

      // Show popular products when clicking on search input (focus event)
      searchInput.addEventListener('focus', function() {
        const query = this.value.trim();
        if (query.length === 0) {
          // Show popular products when input is empty and focused
          showPopularProducts();
        }
      });

      // Debounce function for search input
      let debounceTimer;
      searchInput.addEventListener('input', function() {
        clearTimeout(debounceTimer);
        const query = this.value.trim();
        currentFocus = -1;

        if (query.length >= 2) {
          debounceTimer = setTimeout(() => {
            fetchSuggestions(query);
          }, 300);
        } else if (query.length === 0) {
          // Show popular products when input is cleared
          showPopularProducts();
        } else {
          autocompleteContainer.style.display = 'none';
        }
      });

      // Keyboard navigation
      searchInput.addEventListener('keydown', function(e) {
        const items = autocompleteContainer.querySelectorAll('div');

        if (e.key === 'ArrowDown') {
          e.preventDefault();
          currentFocus++;
          if (currentFocus >= items.length) currentFocus = 0;
          updateFocus(items);
        } else if (e.key === 'ArrowUp') {
          e.preventDefault();
          currentFocus--;
          if (currentFocus < 0) currentFocus = items.length - 1;
          updateFocus(items);
        } else if (e.key === 'Enter') {
          e.preventDefault();
          if (currentFocus >= 0 && currentFocus < items.length) {
            items[currentFocus].click();
          } else {
            performSearch();
          }
        } else if (e.key === 'Escape') {
          autocompleteContainer.style.display = 'none';
          currentFocus = -1;
        }
      });

      function updateFocus(items) {
        items.forEach((item, index) => {
          if (index === currentFocus) {
            item.style.cssText = itemStyle + hoverStyle;
          } else {
            item.style.cssText = itemStyle;
          }
        });
      }

      // Hide suggestions when clicking outside
      document.addEventListener('click', function(e) {
        if (!innerTk.contains(e.target)) {
          autocompleteContainer.style.display = 'none';
          currentFocus = -1;
        }
      });

      // Search on button click
      searchBtn.addEventListener('click', function() {
        performSearch();
      });

      // Search on Enter key press (without selection)
      searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' && currentFocus === -1) {
          performSearch();
        }
      });
    });
  </script>


  {{-- <!-- Modal Đăng nhập -->
  <div class="modal" id="loginModal">
    <div class="modal-content">
      <span class="close" id="closeLogin">&times;</span>
      <h2>Đăng nhập</h2>
      <form id="loginForm">
        <input type="text" placeholder="Tên đăng nhập" required><br>
        <input type="password" placeholder="Mật khẩu" required><br>
        <button type="submit">Đăng nhập</button>
  </form>
    </div>
  </div> --}}

  {{-- <!-- Modal Đăng ký -->
  <div class="modal" id="registerModal">
    <div class="modal-content">
      <span class="close" id="closeRegister">&times;</span>
      <h2>Đăng ký</h2>
      <form id="registerForm">
        <input type="text" placeholder="Tên đăng nhập" required><br>
        <input type="email" placeholder="Email" required><br>
        <input type="password" placeholder="Mật khẩu" required><br>
        <input type="password" placeholder="Nhập lại mật khẩu" required><br>
        <button type="submit">Đăng ký</button>
      </form>
    </div>
  </div>
  <!-- Modal Khôi phục tài khoản -->
  <div class="modal" id="recoverModal">
    <div class="modal-content">
      <span class="close" id="closeRecover">&times;</span>
      <h2>Khôi phục tài khoản</h2>
      <form id="recoverForm">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Gửi mã xác thực</button>
      </form>
    </div>
  </div> --}}
  <!-- Các section khác (home, products, etc.) -->
    
   
   <!-- Bootstrap JS and dependencies -->
   {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> --}}
   
{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap 5 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  .fakeimg {
    height: 200px;
    background: #aaa;
  }
  </style>
</head> --}}



<head>
  {{-- Bảo mật bằng phương thức csrf cho POST --}}
      <!-- CSRF Token cho AJAX -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>2Tfresh Market- Web bán trái cây tươi</title>
  <!-- CSS chung cho trang web -->
  <link rel="stylesheet" href="{{ asset('main_home/css/style.css') }}">
  <!-- Bootstrap JS and dependencies -->
  {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

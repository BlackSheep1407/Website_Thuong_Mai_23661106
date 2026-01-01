{{-- Dòng 1 đã được sửa: Dùng dấu chấm (hoặc gạch chéo) thay vì dấu gạch ngược và bỏ dấu chấm phẩy --}}
@include('template.header')

{{-- Model giỏ hàng --}}
<body>

{{-- Login Modal for Checkout --}}
@if(session('show_login_modal'))
<div class="modal fade show" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="false" style="display: block;">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="loginModalLabel">
                    <i class="fas fa-user-circle me-2"></i>Yêu cầu đăng nhập
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close" onclick="closeLoginModal()"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-info">
                    <i class="fas fa-info-circle me-2"></i>
                    {{ session('login_message', 'Vui lòng đăng nhập để tiếp tục thanh toán') }}
                </div>

                <form id="loginForm" method="POST" action="/xu-ly-dang-nhap">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mật khẩu</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-sign-in-alt me-2"></i>Đăng nhập
                        </button>
                        <button type="button" class="btn btn-secondary" onclick="closeLoginModal()">
                            <i class="fas fa-times me-2"></i>Hủy bỏ
                        </button>
                    </div>
                </form>

                <hr>
                <div class="text-center">
                    <p class="mb-2">Chưa có tài khoản?</p>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm">
                        <i class="fas fa-user-plus me-1"></i>Đăng ký ngay
                    </a>
                    <br>
                    <a href="{{ route('password.forgot') }}" class="text-decoration-none mt-2 d-inline-block">
                        <small>Quên mật khẩu?</small>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-backdrop fade show" onclick="closeLoginModal()"></div>

<script>
function closeLoginModal() {
    document.getElementById('loginModal').style.display = 'none';
    document.querySelector('.modal-backdrop').style.display = 'none';
    // Clear the session variable by redirecting to home without the modal
    window.location.href = '{{ route("home") }}';
}
</script>

<style>
.modal-backdrop {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 1040;
}
</style>
@endif




    <section id="home" class="hero">
        <div class="hero-content">
            <h2>Chào mừng đến với 2Tfresh Market</h2>
            <p>Gian hàng trái cây trực tuyến tươi và tốt cho sức khỏe !!</p>
            <div class="inner-slide">
                @php
                    $sliders = \App\Models\Slider::where('is_active', true)->orderBy('sort_order')->get();
                @endphp
                @forelse($sliders as $slider)
                    <a href="{{ $slider->link ?: '#' }}" class="slide">
                        <img src="{{ asset($slider->image_path) }}" alt="{{ $slider->title ?: 'Banner' }}">
                    </a>
                @empty
                    <!-- Fallback sliders if none in database -->
                    <a href="#" class="slide">
                        <img src="{{ asset('main_home/img/bannerqc/Bannerqc.jpg') }}" alt="Banner 1">
                    </a>
                    <a href="#" class="slide">
                        <img src="{{ asset('main_home/img/bannerqc/bannerqc2.webp') }}" alt="Banner 2">
                    </a>
                    <a href="#" class="slide">
                        <img src="{{ asset('main_home/img/bannerqc/Banner qc3.webp') }}" alt="Banner 3">
                    </a>
                    <a href="#" class="slide">
                        <img src="{{ asset('main_home/img/bannerqc/bannerqc4.webp') }}" alt="Banner 4">
                    </a>
                    <a href="#" class="slide">
                        <img src="{{ asset('main_home/img/bannerqc/bannerqc5.webp') }}" alt="Banner 5">
                    </a>
                @endforelse
            </div>
        </div>
    </section>

    {{-- SEARCH RESULTS SECTION --}}
    @if(isset($searchResults) && $searchQuery)
    <section id="search-results" class="product-list">
        <h2 class="tieudesanpham" style="color: #4CAF50;">
            <i class="fas fa-search me-2"></i>
            Kết quả tìm kiếm cho: "{{ $searchQuery }}"
        </h2>

        @if($searchResults->count() > 0)
            <div class="products-container">
                @foreach($searchResults as $product)
                    <div class="product-item">
                        <img class="product-img"
                            src="{{ asset($product->product_img) }}"
                            alt="{{ $product->product_name }}">
                        <h3 class="product-name">{{ $product->product_name }}</h3>

                        <div class="product-btn">
                            <p class="price">{{ number_format($product->product_price, 0, ',', '.') }} VNĐ</p>
                            <button
                                type="button"
                                class="buy-btn btn-add-to-cart"
                                data-product-id="{{ $product->product_id }}"
                                data-product-quantity="1"
                            >
                                Thêm vào giỏ hàng
                            </button>
                        </div>

                        <div class="detail-link-container">
                            <a href="{{ route('product.show', ['id' => $product->product_id]) }}" class="detail-link">
                                Xem Chi Tiết
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <i class="fas fa-search fa-3x text-muted mb-3"></i>
                <h4 class="text-muted">Không tìm thấy sản phẩm nào phù hợp với từ khóa "{{ $searchQuery }}"</h4>
                <p class="text-muted">Hãy thử tìm kiếm với từ khóa khác hoặc duyệt các danh mục sản phẩm bên dưới.</p>
                <a href="{{ route('home') }}" class="btn btn-success mt-3">
                    <i class="fas fa-home me-2"></i>Xem tất cả sản phẩm
                </a>
            </div>
        @endif
    </section>
    @endif

    <section id="products" class="product-list">

        {{-- VÒNG LẶP NGOẠI: Duyệt qua danh sách các Danh mục (Category) --}}
        @foreach ($categories as $category)
           
            {{-- TIÊU ĐỀ DANH MỤC: Hiển thị tên danh mục --}}
            <h2 id="category-{{ $category->category_id }}" class="tieudesanpham">{{ $category->category_name }}</h2>

            {{-- CONTAINER CHỨA SẢN PHẨM --}}
            <div class="products-container">
               
                {{-- VÒNG LẶP NỘI: Duyệt qua các Sản phẩm (Product) thuộc Danh mục hiện tại --}}
                @forelse ($category->products as $product)
                   
                    <div class="product-item">
                       
                        {{-- ẢNH VÀ TÊN SẢN PHẨM --}}
                        <img class="product-img" 
                            src="{{ asset($product->product_img) }}" 
                            alt="{{ $product->product_name }}">
                        <h3 class="product-name">{{ $product->product_name }}</h3>
                       
                        {{-- NÚT GIÁ VÀ THÊM VÀO GIỎ --}}
                        <div class="product-btn">
                            {{-- Định dạng giá tiền --}}
                            <p class="price">{{ number_format($product->product_price, 0, ',', '.') }} VNĐ</p>
                           
                            {{-- Nút Thêm vào giỏ hàng --}}
                            {{-- <button 
                                class="buy-btn btn-add-to-cart" 
                                data-product-id="{{ $product->product_id }}" 
                                data-product-quantity="1"
                                data-url="{{ route('cart.add', $product->product_id) }}">
                                Thêm vào giỏ hàng
                            </button> --}}
                            <button 
                                type="button"
                                class="buy-btn btn-add-to-cart"
                                data-product-id="{{ $product->product_id }}"
                                data-product-quantity="1"
                            >
                                Thêm vào giỏ hàng
                            </button>



                        </div>

                        {{-- NÚT XEM CHI TIẾT --}}
                        <div class="detail-link-container">
                            <a href="{{ route('product.show', ['id' => $product->product_id]) }}" class="detail-link btn btn-outline-success btn-sm">
                                <i class="fas fa-eye me-1"></i>Xem Chi Tiết
                            </a>
                        </div>
                    </div>
                   
                @empty
                    <p>Danh mục **{{ $category->category_name }}** hiện chưa có sản phẩm.</p>
                @endforelse
            </div> 
            {{-- KẾT THÚC products-container --}}
        @endforeach
    </section>

    <section id="contact" class="contact">
        <h2>Liên hệ</h2>
        <main>
            <h2>Thông Tin Liên Hệ</h2>
            <br>
            <div class="icon">
                <img class="icon_contact" src="{{ asset('main_home/IMG/icon/email_icon.webp') }}" alt="">
                <p>Email: <a href="mailto: 23661113@kthcm.edu.vn "> 23661113@kthcm.edu.vn</a> <br>
                    Email: <a href="mailto: 23661106@kthcm.edu.vn "> 23661106@kthcm.edu.vn </a>
                </p>
            </div>
            <div class="icon">
                <img class="icon_contact" src="{{ asset('main_home/IMG/icon/facebook_icon.webp') }}">
                <p>Facebook: <a href="https://www.facebook.com/">https://www.facebook.com/</a> </p>
            </div>
            <div class="icon">
                <img class="icon_contact" src="{{ asset('main_home/IMG/icon/instagram_icon.webp') }}">
                <p>Instagram: <a href="https://www.instagram.com/">https://www.instagram.com/</a></p>
            </div>

            <div class="icon">
                <img class="icon_contact" src="{{ asset('main_home/IMG/icon/zalo_icon.webp') }}">
                <p>Zalo <a href="tel:+84789475138">0789475138</a> <br>
                    Zalo <a href="tel:+84949642295">094 964 2295</a>
                </p>
            </div>

            <div class="icon">
                <img class="icon_contact" src="{{ asset('main_home/IMG/icon/phonecall_icon.webp') }}">
                <p>Số điện thoại liên hệ: <a href="tel:+84789475138">078 947 5138</a> <br>
                    Số điện thoại liên hệ: <a href="tel:+84949642295">094 964 2295</a>
                </p>
            </div>

            <div class="icon">
                <img class="icon_contact" src="{{ asset('main_home/IMG/icon/Location_icon.webp') }}">
                <p>Địa chỉ của chúng tôi: <a
                    href="https://www.google.com/maps?q=504/106,+Kinh+Dương+Vương,+Bình+Trị+Đông+B,+Bình+Tân,+TP.HCM"
                    target="_blank">33 Đ. Vĩnh Viễn, Phường 02, Quận 10, Hồ Chí Minh, Việt Nam</a></p>
            </div>
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.605252164119!2d106.67075587369577!3d10.764875359409466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee10bef3c07%3A0xfd59127e8c2a3e0!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEtpbmggdOG6vyBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmg!5e0!3m2!1svi!2s!4v1733668330161!5m2!1svi!2s"
                width="400" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>

        </main>
    </section>
    








    {{-- <script src="{{ asset('main_home/js/recoveryAuth.js') }}"></script>
    <script src="{{ asset('main_home/js/script.js') }}"></script> --}}
   {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script> --}}
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
   



{{-- Dòng cuối đã được sửa: Dùng dấu gạch chéo hoặc dấu chấm --}}
@include('template.footer')

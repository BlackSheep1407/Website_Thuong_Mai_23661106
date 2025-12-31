<!-- Footer -->
<footer class="bg-dark text-light py-5 mt-5">
    <div class="container">
        <div class="row">
            <!-- Company Info -->
            <div class="col-lg-4 col-md-6 mb-4">
                <h5 class="text-success mb-3">
                    <i class="fas fa-leaf me-2"></i>2Tfresh Market
                </h5>
                <p class="mb-3">Nơi mang đến những trái cây tươi ngon nhất đến mọi nhà. Chúng tôi cam kết cung cấp sản phẩm chất lượng cao với nguồn gốc rõ ràng.</p>
                <div class="d-flex">
                    <a href="#" class="text-light me-3 fs-4" title="Facebook">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-light me-3 fs-4" title="Instagram">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-light me-3 fs-4" title="Twitter">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-light fs-4" title="YouTube">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links -->
            <div class="col-lg-2 col-md-6 mb-4">
                <h6 class="text-uppercase fw-bold mb-3">Liên kết nhanh</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <a href="{{ route('home') }}" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-success"></i>Trang chủ
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('home') }}" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-success"></i>Sản phẩm
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('about') }}" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-success"></i>Giới thiệu
                        </a>
                    </li>
                    <li class="mb-2">
                        <a href="{{ route('contact') }}" class="text-light text-decoration-none">
                            <i class="fas fa-chevron-right me-2 text-success"></i>Liên hệ
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Customer Service -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="text-uppercase fw-bold mb-3">Hỗ trợ khách hàng</h6>
                <ul class="list-unstyled">
                    <li class="mb-2">
                        <i class="fas fa-question-circle me-2 text-success"></i>Câu hỏi thường gặp
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-truck me-2 text-success"></i>Chính sách giao hàng
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-undo me-2 text-success"></i>Chính sách đổi trả
                    </li>
                    <li class="mb-2">
                        <i class="fas fa-shield-alt me-2 text-success"></i>Bảo mật thông tin
                    </li>
                </ul>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-3 col-md-6 mb-4">
                <h6 class="text-uppercase fw-bold mb-3">Thông tin liên hệ</h6>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-phone me-3 text-success"></i>
                    <span>0949642295</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-envelope me-3 text-success"></i>
                    <span>tainguyen14072005@gmail.com</span>
                </div>
                <div class="d-flex align-items-start mb-2">
                    <i class="fas fa-map-marker-alt me-3 text-success mt-1"></i>
                    <span>33 Vĩnh Viễn, Phường Vườn Lài<br>TP.HCM, Việt Nam</span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <i class="fas fa-clock me-3 text-success"></i>
                    <span>8:00 - 18:00 (Thứ 2 - Chủ nhật)</span>
                </div>
            </div>
        </div>

        <hr class="my-4">

        <!-- Bottom Footer -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="mb-0">&copy; 2025 2Tfresh Market. Tất cả quyền được bảo lưu.</p>
            </div>
            <div class="col-md-6 text-md-end">
                <p class="mb-0">Thiết kế bởi <span class="text-success fw-bold">Nguyễn Thái Tài</span></p>
            </div>
        </div>
    </div>
</footer>

<!-- Font Awesome for social icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<!-- Load cart.js on all pages for cart functionality -->
<script src="{{ asset('main_home/js/cart.js') }}"></script>

<style>
footer a:hover {
    color: #4CAF50 !important;
    transition: color 0.3s;
}

footer .fab:hover {
    transform: scale(1.2);
    transition: transform 0.3s;
}

footer hr {
    border-color: #495057;
}
</style>

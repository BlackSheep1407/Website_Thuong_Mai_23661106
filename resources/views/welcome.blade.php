<!DOCTYPE html>
<html lang="vi">
@include('template.header')

<body>
    <!-- Hero Section -->
    <section class="welcome-hero">
        <div class="hero-overlay">
            <div class="container">
                <div class="row align-items-center min-vh-100">
                    <div class="col-lg-6 text-white">
                        <h1 class="display-4 fw-bold mb-4">
                            Chào mừng đến với <span class="text-success">2Tfresh Market</span>
                        </h1>
                        <p class="lead mb-4 fs-5">
                            Nơi mang đến những trái cây tươi ngon nhất đến mọi nhà.
                            Chúng tôi cam kết cung cấp sản phẩm chất lượng cao với nguồn gốc rõ ràng.
                        </p>
                        <div class="d-flex gap-3 flex-wrap">
                            <a href="{{ route('home') }}" class="btn btn-success btn-lg px-4 py-3">
                                <i class="fas fa-shopping-cart me-2"></i>
                                Khám phá sản phẩm
                            </a>
                            <a href="{{ route('about') }}" class="btn btn-outline-light btn-lg px-4 py-3">
                                <i class="fas fa-info-circle me-2"></i>
                                Tìm hiểu thêm
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center">
                        <div class="hero-image-container">
                            <img src="{{ asset('main_home/img/Bưởi da xanh 2.webp') }}"
                                 alt="Trái cây tươi ngon"
                                 class="img-fluid rounded shadow-lg hero-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-12">
                    <h2 class="display-5 fw-bold text-success mb-3">Tại sao chọn 2Tfresh Market?</h2>
                    <p class="lead text-muted">Chúng tôi mang đến trải nghiệm mua sắm trái cây tốt nhất</p>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card h-100 text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-leaf text-success fs-1"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Trái cây tươi ngon</h4>
                        <p class="text-muted">Sản phẩm được chọn lọc kỹ càng, đảm bảo tươi ngon và chất lượng cao.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card h-100 text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-truck text-success fs-1"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Giao hàng tận nơi</h4>
                        <p class="text-muted">Dịch vụ giao hàng nhanh chóng và an toàn đến tận tay khách hàng.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-card h-100 text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="fas fa-shield-alt text-success fs-1"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Nguồn gốc rõ ràng</h4>
                        <p class="text-muted">Tất cả sản phẩm đều có nguồn gốc xuất xứ rõ ràng và được kiểm định.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h3 class="fw-bold mb-3">Sẵn sàng khám phá bộ sưu tập trái cây của chúng tôi?</h3>
                    <p class="lead mb-4">Hàng ngàn sản phẩm trái cây tươi ngon đang chờ đợi bạn!</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="{{ route('home') }}" class="btn btn-success btn-lg px-5 py-3">
                        <i class="fas fa-arrow-right me-2"></i>
                        Bắt đầu mua sắm
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .welcome-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: relative;
            min-height: 100vh;
        }

        .hero-overlay {
            background: linear-gradient(45deg, rgba(0,0,0,0.7), rgba(0,0,0,0.3));
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }

        .hero-overlay .container {
            position: relative;
            z-index: 2;
        }

        .hero-image-container {
            position: relative;
            animation: float 3s ease-in-out infinite;
        }

        .hero-image {
            max-width: 80%;
            height: auto;
            border: 5px solid rgba(255,255,255,0.2);
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }

        .features {
            background-color: #f8f9fa;
        }

        .feature-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }

        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #4CAF50, #45a049);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.3);
        }

        .cta-section {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
        }

        .btn-success {
            background: linear-gradient(45deg, #4CAF50, #45a049);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-success:hover {
            background: linear-gradient(45deg, #45a049, #4CAF50);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(76, 175, 80, 0.4);
        }

        .btn-outline-light:hover {
            background-color: rgba(255,255,255,0.1);
            border-color: white;
        }

        @media (max-width: 768px) {
            .welcome-hero .row {
                text-align: center;
            }

            .hero-image {
                max-width: 100%;
                margin-top: 2rem;
            }

            .d-flex.gap-3 {
                justify-content: center;
            }
        }
    </style>
</body>

@include('template.footer')
</html>

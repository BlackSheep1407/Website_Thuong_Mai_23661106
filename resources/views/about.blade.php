<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu - 2Tfresh Market</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .about-hero {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 50%, #388E3C 100%);
            color: white;
            padding: 4rem 0;
            text-align: center;
        }
        .about-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .about-section {
            padding: 4rem 0;
        }
        .about-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 2.5rem;
            margin-bottom: 2rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .about-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .about-icon {
            font-size: 3rem;
            color: #4CAF50;
            margin-bottom: 1.5rem;
        }
        .about-title {
            color: #333;
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }
        .feature-list {
            list-style: none;
            padding: 0;
        }
        .feature-list li {
            padding: 0.5rem 0;
            border-bottom: 1px solid #f0f0f0;
        }
        .feature-list li:before {
            content: "✓";
            color: #4CAF50;
            font-weight: bold;
            margin-right: 0.5rem;
        }
        .team-section {
            background: linear-gradient(135deg, #2E7D32 0%, #388E3C 50%, #1B5E20 100%);
            color: white;
            padding: 4rem 0;
        }
        .team-member {
            text-align: center;
            margin-bottom: 2rem;
        }
        .team-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2.5rem;
            color: #2E7D32;
        }
        .contact-section {
            background: #f8f9fa;
            padding: 4rem 0;
        }
        .contact-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
    </style>
</head>
<body>
    @include('template/header')

    <!-- Hero Section -->
    <section class="about-hero">
        <div class="container">
            <h1><i class="fas fa-leaf me-3"></i>Về 2Tfresh Market</h1>
            <p class="lead">Nơi mang đến những trái cây tươi ngon nhất đến mọi nhà</p>
        </div>
    </section>

    <!-- About Sections -->
    <section class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-card">
                        <div class="about-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h3 class="about-title">Giới thiệu cá nhân</h3>
                        <p>Xin chào! Tôi là <strong>Nguyễn Thái Tài</strong>, người sáng lập cửa hàng bán trái cây tươi trực tuyến 2Tfresh Market.</p>
                        <p>Với niềm đam mê mang lại những sản phẩm chất lượng và tươi ngon nhất đến tay khách hàng, tôi hy vọng trang web này sẽ giúp bạn dễ dàng lựa chọn và mua sắm các loại trái cây yêu thích.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-card">
                        <div class="about-icon">
                            <i class="fas fa-lightbulb"></i>
                        </div>
                        <h3 class="about-title">Lý do chọn đề tài</h3>
                        <p>Trái cây là nguồn dinh dưỡng thiết yếu cho sức khỏe con người. Với xu hướng mua sắm trực tuyến ngày càng phổ biến, chúng tôi quyết định phát triển một trang web bán trái cây để mang đến sự tiện lợi cho khách hàng, đồng thời giúp tăng cường thói quen ăn uống lành mạnh.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="about-card">
                        <div class="about-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h3 class="about-title">Chức năng của trang web</h3>
                        <ul class="feature-list">
                            <li>Hiển thị danh mục các loại trái cây theo mùa, xuất xứ, giá cả</li>
                            <li>Hỗ trợ đặt hàng trực tuyến và thanh toán linh hoạt</li>
                            <li>Thông tin chi tiết về lợi ích sức khỏe của từng loại trái cây</li>
                            <li>Gửi thông báo về các chương trình khuyến mãi hoặc ưu đãi</li>
                            <li>Hệ thống quản lý đơn hàng và theo dõi giao hàng</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-card">
                        <div class="about-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3 class="about-title">Ưu điểm và tương lai</h3>
                        <p><strong>Ưu điểm hiện tại:</strong></p>
                        <ul class="feature-list">
                            <li>Cung cấp trái cây tươi ngon, rõ nguồn gốc</li>
                            <li>Giao diện dễ sử dụng, thân thiện với người dùng</li>
                            <li>Hỗ trợ đặt hàng nhanh chóng, tiết kiệm thời gian</li>
                            <li>Đội ngũ chăm sóc khách hàng tận tình</li>
                        </ul>
                        <p><strong>Khả năng cải thiện trong tương lai:</strong></p>
                        <ul class="feature-list">
                            <li>Mở rộng thêm các loại sản phẩm liên quan</li>
                            <li>Tích hợp hệ thống giao hàng nhanh trong vòng 2 giờ</li>
                            <li>Cải thiện trải nghiệm người dùng qua ứng dụng di động</li>
                            <li>Đa dạng hóa phương thức thanh toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Section -->
    <section class="team-section">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center mb-5">
                    <h2 class="display-4 font-weight-bold">Người sáng lập</h2>
                    <p class="lead">Người tạo nên 2Tfresh Market</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="team-member">
                        <div class="team-avatar">
                            @php
                                $admin = \App\Models\Users::where('user_role', 1)->first();
                            @endphp
                            @if($admin && $admin->avatar)
                                <img src="{{ asset($admin->avatar) }}" alt="Admin Avatar" style="width: 100%; height: 100%; border-radius: 50%; object-fit: cover;">
                            @else
                                <i class="fas fa-user"></i>
                            @endif
                        </div>
                        <h4>{{ $admin ? $admin->user_fullname : 'Nguyễn Thái Tài' }}</h4>
                        <p>Sáng lập & Phát triển</p>
                        @if($admin)
                            @if($admin->user_email)
                                <p><i class="fas fa-envelope me-2"></i>{{ $admin->user_email }}</p>
                            @endif
                            @if($admin->user_phone)
                                <p><i class="fas fa-phone me-2"></i>{{ $admin->user_phone }}</p>
                            @endif
                            @if($admin->user_address)
                                <p><i class="fas fa-map-marker-alt me-2"></i>{{ $admin->user_address }}</p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="contact-card text-center">
                        <i class="fas fa-envelope fa-3x text-primary mb-3"></i>
                        <h3>Liên hệ với chúng tôi</h3>
                        <p>Chúng tôi luôn sẵn sàng lắng nghe ý kiến đóng góp và hỗ trợ bạn!</p>
                        <div class="row mt-4">
                            <div class="col-md-4">
                                <i class="fas fa-phone fa-2x text-success mb-2"></i>
                                <p><strong>Hotline:</strong><br>0949642295</p>
                            </div>
                            <div class="col-md-4">
                                <i class="fas fa-envelope fa-2x text-info mb-2"></i>
                                <p><strong>Email:</strong><br>tainguyen14072005@gmail.com</p>
                            </div>
                            <div class="col-md-4">
                                <i class="fas fa-map-marker-alt fa-2x text-danger mb-2"></i>
                                <p><strong>Địa chỉ:</strong><br>33 Vĩnh Viễn, Phường Vườn Lài, TP.HCM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Map Section -->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="text-center mb-4">
                        <h3 style="color: #4CAF50;"><i class="fas fa-map-marked-alt me-2"></i>Tìm chúng tôi tại đây</h3>
                        <p class="text-muted">Ghé thăm cửa hàng của chúng tôi</p>
                    </div>
                    <div class="map-container mx-auto" style="max-width: 800px;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6339!2d106.6635!3d10.7599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f8b7a2b1b5b%3A0x6b7b7b7b7b7b7b7b!2s33%20V%C4%A9nh%20Vi%E1%BB%85n%2C%20Ph%C6%B0%E1%BB%9Dng%20V%C6%B0%E1%BB%9Dn%20L%C3%A0i%2C%20Th%E1%BB%A7%20%C4%90%E1%BB%A9c%2C%20H%E1%BB%93%20Ch%C3%AD%20Minh%2C%20Vietnam!5e0!3m2!1sen!2s!4v1690000000000!5m2!1sen!2s"
                            width="100%"
                            height="400"
                            style="border:0; border-radius: 15px;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('template/footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

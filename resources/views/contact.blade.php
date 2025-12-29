<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ - 2Tfresh Market</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .contact-hero {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 50%, #388E3C 100%);
            color: white;
            padding: 4rem 0;
            text-align: center;
        }
        .contact-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .contact-section {
            padding: 4rem 0;
        }
        .contact-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 3rem;
            margin-bottom: 2rem;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }
        .contact-icon {
            font-size: 3rem;
            color: #4CAF50;
            margin-bottom: 1.5rem;
        }
        .contact-info {
            background: #f8f9fa;
            padding: 2rem;
            border-radius: 15px;
            margin-bottom: 2rem;
        }
        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        .info-item i {
            font-size: 1.5rem;
            color: #4CAF50;
            margin-right: 1rem;
            width: 30px;
        }
        .info-item h5 {
            margin-bottom: 0.5rem;
            color: #333;
        }
        .info-item p {
            margin-bottom: 0;
            color: #666;
        }
        .contact-form {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }
        .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
        }
        .btn-send {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            border: none;
            border-radius: 25px;
            padding: 0.75rem 2rem;
            color: white;
            font-weight: 600;
            transition: all 0.3s;
        }
        .btn-send:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(76, 175, 80, 0.4);
            color: white;
        }
        .map-container {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    @include('template/header')

    <!-- Hero Section -->
    <section class="contact-hero">
        <div class="container">
            <h1><i class="fas fa-envelope me-3"></i>Liên hệ với chúng tôi</h1>
            <p class="lead">Chúng tôi luôn sẵn sàng lắng nghe và hỗ trợ bạn</p>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <!-- Contact Information -->
                <div class="col-lg-5">
                    <div class="contact-info">
                        <h3 class="mb-4 text-center" style="color: #4CAF50;"><i class="fas fa-info-circle me-2"></i>Thông tin liên hệ</h3>

                        <div class="info-item mb-4 p-3 bg-light rounded">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-phone fa-2x me-3 text-success"></i>
                                <div>
                                    <h5 class="mb-1 text-success">Hotline</h5>
                                    <h6 class="mb-0 text-dark">0949642295</h6>
                                </div>
                            </div>
                        </div>

                        <div class="info-item mb-4 p-3 bg-light rounded">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-envelope fa-2x me-3 text-primary"></i>
                                <div>
                                    <h5 class="mb-1 text-primary">Email</h5>
                                    <h6 class="mb-0 text-dark">tainguyen14072005@gmail.com</h6>
                                </div>
                            </div>
                        </div>

                        <div class="info-item mb-4 p-3 bg-light rounded">
                            <div class="d-flex align-items-start mb-2">
                                <i class="fas fa-map-marker-alt fa-2x me-3 text-danger mt-1"></i>
                                <div>
                                    <h5 class="mb-1 text-danger">Địa chỉ</h5>
                                    <h6 class="mb-1 text-dark">33 Vĩnh Viễn</h6>
                                    <p class="mb-0 text-muted">Phường Vườn Lài, TP.HCM</p>
                                </div>
                            </div>
                        </div>

                        <div class="info-item mb-4 p-3 bg-light rounded">
                            <div class="d-flex align-items-center mb-2">
                                <i class="fas fa-clock fa-2x me-3 text-warning"></i>
                                <div>
                                    <h5 class="mb-1 text-warning">Giờ làm việc</h5>
                                    <h6 class="mb-1 text-dark">Thứ 2 - Chủ nhật</h6>
                                    <p class="mb-0 text-muted">8:00 - 18:00 | Không nghỉ trưa</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Map -->
                    <div class="map-container">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6339!2d106.6635!3d10.7599!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f8b7a2b1b5b%3A0x6b7b7b7b7b7b7b7b!2s33%20V%C4%A9nh%20Vi%E1%BB%85n%2C%20Ph%C6%B0%E1%BB%9Dng%20V%C6%B0%E1%BB%9Dn%20L%C3%A0i%2C%20Th%E1%BB%A7%20%C4%90%E1%BB%A9c%2C%20H%E1%BB%93%20Ch%C3%AD%20Minh%2C%20Vietnam!5e0!3m2!1sen!2s!4v1690000000000!5m2!1sen!2s"
                            width="100%"
                            height="300"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-7">
                    <div class="contact-form">
                        <h3 class="mb-4 text-center" style="color: #4CAF50;"><i class="fas fa-paper-plane me-2"></i>Gửi tin nhắn</h3>

                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="name" class="form-label">Họ tên *</label>
                                    <input type="text" class="form-control" id="name" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Số điện thoại</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Chủ đề *</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Nội dung *</label>
                                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-send">
                                    <i class="fas fa-paper-plane me-2"></i>Gửi tin nhắn
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('template/footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

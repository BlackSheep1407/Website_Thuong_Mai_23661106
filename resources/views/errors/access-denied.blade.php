<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Truy cập bị từ chối</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .access-denied-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .access-denied-card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            padding: 3rem;
            text-align: center;
            max-width: 500px;
            width: 100%;
        }
        .access-denied-icon {
            font-size: 5rem;
            color: #dc3545;
            margin-bottom: 2rem;
        }
        .access-denied-title {
            color: #333;
            margin-bottom: 1rem;
            font-weight: 600;
        }
        .access-denied-message {
            color: #666;
            margin-bottom: 2rem;
            line-height: 1.6;
        }
        .btn-back {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 25px;
            padding: 0.75rem 2rem;
            color: white;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s;
        }
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
            color: white;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="access-denied-container">
        <div class="access-denied-card">
            <div class="access-denied-icon">
                <i class="fas fa-shield-alt"></i>
            </div>
            <h1 class="access-denied-title">Truy cập bị từ chối</h1>
            <p class="access-denied-message">
                Bạn không có quyền truy cập vào trang này. Chỉ quản trị viên mới có thể truy cập các chức năng này.
            </p>
            <a href="{{ route('home') }}" class="btn-back">
                <i class="fas fa-home me-2"></i>Quay về trang chủ
            </a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

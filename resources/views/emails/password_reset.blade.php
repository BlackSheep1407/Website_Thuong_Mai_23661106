<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu - 2Tfresh Market</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .header {
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
        }
        .content {
            padding: 30px 20px;
        }
        .greeting {
            font-size: 18px;
            margin-bottom: 20px;
            color: #333;
        }
        .message {
            margin-bottom: 30px;
            line-height: 1.8;
        }
        .button {
            display: inline-block;
            background: linear-gradient(135deg, #4CAF50 0%, #45a049 100%);
            color: white;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 25px;
            font-weight: bold;
            text-align: center;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(76, 175, 80, 0.3);
        }
        .button:hover {
            background: linear-gradient(135deg, #45a049 0%, #4CAF50 100%);
        }
        .warning {
            background-color: #fff3cd;
            border: 1px solid #ffeaa7;
            border-radius: 4px;
            padding: 15px;
            margin: 20px 0;
            color: #856404;
        }
        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
        .footer p {
            margin: 5px 0;
        }
        .link {
            color: #4CAF50;
            word-break: break-all;
        }
        @media (max-width: 600px) {
            .container {
                margin: 10px;
            }
            .header {
                padding: 20px 15px;
            }
            .content {
                padding: 20px 15px;
            }
            .button {
                padding: 12px 25px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🔐 Đặt lại mật khẩu</h1>
            <p>2Tfresh Market</p>
        </div>

        <div class="content">
            <div class="greeting">
                Xin chào <strong>{{ $user->user_fullname }}</strong>,
            </div>

            <div class="message">
                <p>Bạn đã yêu cầu đặt lại mật khẩu cho tài khoản của mình tại <strong>2Tfresh Market</strong>.</p>

                <p>Để đặt lại mật khẩu, vui lòng nhấp vào nút bên dưới:</p>

                <div style="text-align: center;">
                    <a href="{{ $resetUrl }}" class="button">
                        🔓 Đặt lại mật khẩu
                    </a>
                </div>

                <p>Nếu nút trên không hoạt động, bạn có thể sao chép và dán liên kết sau vào trình duyệt:</p>
                <p class="link">{{ $resetUrl }}</p>
            </div>

            <div class="warning">
                <strong>Lưu ý quan trọng:</strong>
                <ul style="margin: 10px 0; padding-left: 20px;">
                    <li>Liên kết này sẽ hết hạn sau 1 giờ</li>
                    <li>Nếu bạn không yêu cầu đặt lại mật khẩu, vui lòng bỏ qua email này</li>
                    <li>Vì lý do bảo mật, không chia sẻ liên kết này với任何人</li>
                </ul>
            </div>

            <p>Nếu bạn gặp bất kỳ vấn đề nào, vui lòng liên hệ với chúng tôi qua email: <strong>support@2tfresh.com</strong></p>

            <p>Trân trọng,<br>
            <strong>Đội ngũ 2Tfresh Market</strong></p>
        </div>

        <div class="footer">
            <p><strong>2Tfresh Market</strong> - Nơi mang đến những trái cây tươi ngon nhất</p>
            <p>Email: support@2tfresh.com | Website: {{ url('/') }}</p>
            <p>&copy; {{ date('Y') }} 2Tfresh Market. Tất cả quyền được bảo lưu.</p>
        </div>
    </div>
</body>
</html>

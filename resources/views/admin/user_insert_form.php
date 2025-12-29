<!-- <!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
  border: 1px solid black;
}
</style>
</head>
<body>
<h2>form</h2>
<form action="/admin/them-nguoi" enctype="multipart/form-data" method="post">
  <label for="username">Tài khoản:</label><br>
  <input type="text" id="username" name="username" required><br>
   <label for="pass">Mật khẩu:</label><br>
  <input type="password" id="pass" name="pass" required><br>
  <label for="fullname">Họ tên:</label><br>
  <input type="text" id="fullname" name="fullname" required><br>
   <label for="address">Địa chỉ:</label><br>
  <input type="text" id="address" name="address" required><br><br>
  <input type="submit" value="Submit">
</form>

</body>
</html>
 -->

 <!DOCTYPE html>
<html>
<head>
    <title>Form Thêm Người Dùng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> <h2 class="mb-4">Thêm Người Dùng Mới</h2>
            
            <form action="/admin/them-nguoi" enctype="multipart/form-data" method="post">
                
                <div class="mb-3"> <label for="username" class="form-label">Tài khoản:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                
                <div class="mb-3">
                    <label for="pass" class="form-label">Mật khẩu:</label>
                    <input type="password" class="form-control" id="pass" name="pass" required>
                </div>
                
                <div class="mb-3">
                    <label for="fullname" class="form-label">Họ tên:</label>
                    <input type="text" class="form-control" id="fullname" name="fullname" required>
                </div>
                
                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                
                <div>
                    <input type="submit" class="btn btn-primary" value="Thêm">
                    
                    <a href="javascript:history.back()" class="btn btn-secondary ms-2">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

 
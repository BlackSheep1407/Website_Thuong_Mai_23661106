<!DOCTYPE html>
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
</head>
<body>
<div class="p-5 bg-primary text-white text-center">
  <h1>My First Bootstrap 5 Page</h1>
  <p>Resize this responsive page to see the effect!</p> 
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/danh-sach-nguoi-dung">Người dùng</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/danh-sach-san-pham">Sản phẩm</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/admin/danh-sach-don-hang">Đơn hàng</a>
      </li>
      <?php
          if(session()->has('user'))
          {
            $user=session()->get('user');
            echo '<li class="nav-item"><a class="nav-link" href="#">'.$user[0]['username'].'</a></li>';
          }
      ?>
      <li class="nav-item">
        <?php
          if(!session()->has('user'))
            echo'<a class="nav-link" href="/admin/dang-nhap">Đăng nhập</a>';
          else{
            echo '<a class="nav-link" href="/admin/thoat">Thoát</a>';
          }
        ?>
      </li>
    </ul>
  </div>
</nav>
<div class="container mt-5">
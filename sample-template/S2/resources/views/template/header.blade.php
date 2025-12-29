<!DOCTYPE html>
<html lang="en">
<head>
  <title>Trang chủ</title>
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
<div class="p-5 bg-success text-white text-center">
  <h1>Trang chủ</h1>
  <p>Uy tín tận tâm giá rẻ!</p> 
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link active" href="/">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/danh-sach-san-pham">Sản phẩm</a>
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
            echo'<a class="nav-link" href="/dang-nhap">Đăng nhập</a>';
          else{
            echo '<a class="nav-link" href="/thoat">Thoát</a>';
          }
        ?>
      </li>
      <li class="nav-item">
        <?php 
          if (!session()->has('cart.products')) {
            echo '<a class="nav-link" href="#" align="right">0 sản phẩm</a>';
          }else{
            echo '<a class="nav-link" href="gio-hang" align="right">'.count(Session()->get('cart.products')).' sản phẩm</a>';
          }
        ?>
      </li>
    </ul>
  </div>
</nav>
<div class="container mt-5">

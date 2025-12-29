@include('template/header')
   <div class="row">
      <h2>Đăng nhập</h2>
      <form action="/xu-ly-dang-nhap" method="post">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <div class="mb-3 mt-3">
            <label for="username">Tài khoản:</label>
            <input type="text" class="form-control" id="username" placeholder="Nhập tài khoản" name="username">
         </div>
         <div class="mb-3">
            <label for="pwd">Mật khẩu:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Nhập mật khẩu" name="pswd">
         </div>

         <button type="submit" class="btn btn-primary">Đăng nhập</button>
      </form>
   </div>
@include('template/footer')

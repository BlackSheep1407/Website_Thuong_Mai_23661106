{{-- @include('\admin\template\header');

<h2>Thay đổi tài khoản người dùng</h2>

<form action="/admin/xu-ly-cap-nhat-nguoi-dung" method="post">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    @foreach ($users as $user)
  <label for="fname">Tên tài khoản:</label><br>
  <input type="text" id="fname" name="username" value="{{ $user->user_username}}" required><br>

  <label for="fpassword">Mật khẩu:</label><br>
  <input type="text" id="fpassword" name="password" value="{{ $user->user_password}}" required><br>

  <label for="fullname">Họ tên:</label><br>
  <input type="text" id="fullname" name="fullname" value="{{ $user->user_fullname}}" required><br><br>

  <label for="laddress">Địa chỉ:</label><br>
  <input type="text" id="laddress" name="address" value="{{ $user->user_address}}" required><br><br>
  
  <input type="hidden" id="fid" name="id" value="{{ $user->user_id}}" required><br>
  @endforeach
  <input type="submit" value="Cập nhật">
</form> 


@include('\admin\template\footer'); --}}

@include('\admin\template\header')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <h2 class="mb-4 text-center">Thay đổi tài khoản người dùng</h2>

            <form action="/admin/xu-ly-cap-nhat-nguoi-dung" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                
                @foreach ($users as $user)
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fname" class="form-label">Tên tài khoản:</label>
                            <input type="text" class="form-control" id="fname" name="username" value="{{ $user->user_username}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fpassword" class="form-label">Mật khẩu:</label>
                            <input type="password" class="form-control" id="fpassword" name="password" placeholder="Để trống nếu không đổi" value="">
                            <small class="text-muted">Để trống nếu không muốn thay đổi mật khẩu</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Họ tên:</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" value="{{ $user->user_fullname}}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->user_email ?? ''}}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->user_phone ?? ''}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="role" class="form-label">Vai trò:</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="0" {{ $user->user_role == 0 ? 'selected' : '' }}>Khách hàng</option>
                                <option value="1" {{ $user->user_role == 1 ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="laddress" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" id="laddress" name="address" value="{{ $user->user_address}}" required>
                </div>

                <input type="hidden" name="id" value="{{ $user->user_id}}">
                @endforeach

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="javascript:history.back()" class="btn btn-secondary ms-2">Quay lại</a>
                </div>
            </form>

        </div>
    </div>
</div>

@include('\admin\template\footer')

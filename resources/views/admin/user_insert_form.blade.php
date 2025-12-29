@include('\admin\template\header')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <h2 class="mb-4 text-center">Thêm người dùng mới</h2>

            <form action="/admin/xu-ly-them-nguoi-dung" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fname" class="form-label">Tên tài khoản:</label>
                            <input type="text" class="form-control" id="fname" name="username" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fpassword" class="form-label">Mật khẩu:</label>
                            <input type="password" class="form-control" id="fpassword" name="password" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Họ tên:</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="phone" class="form-label">Số điện thoại:</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="role" class="form-label">Vai trò:</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="0">Khách hàng</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="laddress" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control" id="laddress" name="address" required>
                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Thêm người dùng</button>
                    <a href="javascript:history.back()" class="btn btn-secondary ms-2">Quay lại</a>
                </div>
            </form>

        </div>
    </div>
</div>

@include('\admin\template\footer')

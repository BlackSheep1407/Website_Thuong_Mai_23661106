{{-- @include('admin/template/header')
   <div class="row">
      <table class="table table-striped">
         <caption>Danh sách người dùng</caption>
         <tr><td colspan="3"></td><td  colspan="2"><a href="them-nguoi-dung">Thêm người dùng</a></td></tr>
         <tr>
            <td>Tài khoản</td>
            <td>Họ tên</td>
            <td>Địa chỉ</td>
            <td></td>
            <td></td>
         </tr>
         @foreach ($users as $user)
         <tr>
            <td>{{ $user->user_username}}</td>
            <td>{{ $user->user_fullname}}</td>
            <td>{{ $user->user_address}}</td>
            <td><a href="thong-tin-nguoi-dung/{{ $user->user_id}}"><img src="{{ asset('admin/img/edit.png') }}" width='40'></a></td>
            <td><a href="xoa-nguoi-dung/{{ $user->user_id}}"><img src="{{ asset('admin/img/delete.png') }}" width='40'></a></td>
         </tr>
         @endforeach
      </table>
   </div>
@include('admin/template/footer') --}}

@include('admin/template/header')

<div class="row">
    <div class="col-12">
        <h2 class="text-center mb-4">Quản Lý Người Dùng</h2>
    </div>

    <div class="col-12 mb-3 text-end">
        {{-- Nút Thêm Người dùng (Dùng Bootstrap Button) --}}
        <a href="them-nguoi-dung" class="btn btn-primary">
            <i class="bi bi-person-plus-fill me-1"></i> Thêm người dùng
        </a>
    </div>

    <div class="col-12">
        {{-- Bảng với class Bootstrap hiện đại hơn --}}
        <table class="table table-striped table-hover table-bordered shadow-sm">
            
            {{-- Tiêu đề bảng --}}
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Tài khoản</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th class="text-center">Vai trò</th>
                    <th class="text-center">Ngày tạo</th>
                    <th class="text-center">Cập nhật</th>
                    <th class="text-center">Hành động</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->user_username }}</td>
                    <td>{{ $user->user_fullname }}</td>
                    <td>{{ $user->user_email ?? 'Chưa cập nhật' }}</td>
                    <td>{{ $user->user_phone ?? 'Chưa cập nhật' }}</td>
                    <td>{{ $user->user_address }}</td>

                    {{-- Vai trò --}}
                    <td class="text-center">
                        @if($user->user_role == 1)
                            <span class="badge bg-danger">
                                <i class="bi bi-shield-check me-1"></i>Admin
                            </span>
                        @else
                            <span class="badge bg-success">
                                <i class="bi bi-person me-1"></i>Khách hàng
                            </span>
                        @endif
                        <br>
                        <div class="btn-group mt-1" role="group">
                            @if($user->user_role != 1)
                                <a href="{{ url('admin/set-role/' . $user->user_id . '/1') }}"
                                   class="btn btn-sm btn-outline-danger"
                                   title="Thăng cấp lên Admin"
                                   onclick="return confirm('Bạn có chắc chắn muốn thăng cấp {{ $user->user_fullname }} lên Admin không?')">
                                    <i class="bi bi-arrow-up-circle"></i>
                                </a>
                            @else
                                <a href="{{ url('admin/set-role/' . $user->user_id . '/0') }}"
                                   class="btn btn-sm btn-outline-warning"
                                   title="Hạ cấp xuống Khách hàng"
                                   onclick="return confirm('Bạn có chắc chắn muốn hạ cấp {{ $user->user_fullname }} xuống Khách hàng không?')">
                                    <i class="bi bi-arrow-down-circle"></i>
                                </a>
                            @endif
                        </div>
                    </td>

                    {{-- Ngày tạo --}}
                    <td class="text-center">
                        {{ $user->created_at ? $user->created_at->format('d/m/Y') : 'N/A' }}
                    </td>

                    {{-- Cập nhật --}}
                    <td class="text-center">
                        {{ $user->updated_at ? $user->updated_at->format('d/m/Y') : 'N/A' }}
                    </td>

                    {{-- Hành động --}}
                    <td class="text-center">
                        <div class="btn-group" role="group">
                            <a href="thong-tin-nguoi-dung/{{ $user->user_id}}" class="btn btn-sm btn-outline-primary" title="Chỉnh sửa">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="xoa-nguoi-dung/{{ $user->user_id}}" class="btn btn-sm btn-outline-danger" title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa người dùng {{ $user->user_fullname }} không?')">
                                <i class="bi bi-trash-fill"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin/template/footer')

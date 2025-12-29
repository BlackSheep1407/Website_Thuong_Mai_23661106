{{-- @include('admin/template/header')
   <div class="row">
      <table class="table table-striped">
         <tr class="table-primary"><td colspan='6'>Danh sách danh mục</td></tr>
         <tr><td colspan="3"></td><td  colspan="2"><a href="them-danh-muc">Thêm danh mục</a></td></tr>
         <tr>
            <td>ID</td>
            <td>Tên</td>
            <td></td>
            <td></td>
         </tr>
         @foreach ($categories as $category)
         <tr>
            <td>{{ $category->category_id}}</td>
            <td>{{ $category->category_name}}</td>
            <td><a href="thong-tin-danh-muc/{{ $category->category_id}}"><img src="{{ asset('admin/img/edit.png') }}" width='40'></a></td>
            <td><a href="xoa-danh-muc/{{ $category->category_id}}"><img src="{{ asset('admin/img/delete.png') }}" width='40'></a></td>
         </tr>
         @endforeach
      </table>
   </div>
@include('admin/template/footer') --}}

@include('admin/template/header')

<div class="row">
    <div class="col-12">
        <h2 class="text-center my-4">Quản Lý Danh Mục</h2>
    </div>

    <div class="col-12 mb-3 text-end">
        {{-- Nút Thêm Danh mục (Dùng Bootstrap Button) --}}
        <a href="them-danh-muc" class="btn btn-success">
            <i class="bi bi-folder-plus me-1"></i> Thêm danh mục
        </a>
    </div>

    <div class="col-12">
        {{-- Bảng với class Bootstrap hiện đại hơn --}}
        <table class="table table-striped table-hover table-bordered shadow-sm">
            
            {{-- Tiêu đề bảng --}}
            <thead class="table-dark">
                <tr>
                    <th style="width: 100px;">ID</th>
                    <th>Tên Danh mục</th>
                    <th class="text-center" colspan="2" style="width: 160px;">Hành động</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->category_id}}</td>
                    <td>{{ $category->category_name}}</td>
                    
                    {{-- Nút Sửa (Dùng Icon) --}}
                    <td class="text-center">
                        <a href="thong-tin-danh-muc/{{ $category->category_id}}" class="btn btn-sm btn-outline-primary" title="Chỉnh sửa">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    
                    {{-- Nút Xóa (Dùng Icon) --}}
                    <td class="text-center">
                        <a href="xoa-danh-muc/{{ $category->category_id}}" class="btn btn-sm btn-outline-danger" title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục {{ $category->category_name }} không?')">
                            <i class="bi bi-trash-fill"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@include('admin/template/footer')
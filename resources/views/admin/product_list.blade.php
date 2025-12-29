{{-- @include('admin/template/header')
   <div class="row">
      <table class="table table-striped">
         <tr class="table-primary"><td colspan='6'>Danh sách sản phẩm</td></tr>
         <tr><td colspan="3"></td><td  colspan="2"><a href="them-san-pham">Thêm sản phẩm</a></td></tr>
         <tr>
            <td>Tên</td>
            <td>Giá</td>
            <td>Ảnh</td>
            <td>Danh mục</td>
            <td></td>
            <td></td>
         </tr>
         @foreach ($products as $product)
         <tr>
            <td>{{ $product->product_name}}</td>
            <td>{{ number_format($product->product_price,0)}}</td>
            <td><img src="{{ asset($product->product_img) }}" width='100'></td>
            <td>{{ $product->category_name}}</td>
            <td><a href="thong-tin-san-pham/{{ $product->product_id}}"><img src="{{ asset('admin/img/edit.png') }}" width='40'></a></td>
            <td><a href="xoa-san-pham/{{ $product->product_id}}"><img src="{{ asset('admin/img/delete.png') }}" width='40'></a></td>
         </tr>
         @endforeach
      </table>
   </div>
@include('admin/template/footer') --}}

@include('admin/template/header')

<div class="row">
    <div class="col-12">
        <h2 class="text-center my-4">Danh Sách Sản Phẩm</h2>
    </div>

    <div class="col-12 mb-3 text-end">
        {{-- Nút Thêm Sản phẩm (Dùng Bootstrap Button) --}}
        <a href="them-san-pham" class="btn btn-success">
            <i class="bi bi-plus-circle-fill me-1"></i> Thêm sản phẩm
        </a>
    </div>

    <div class="col-12">
        <table class="table table-striped table-hover table-bordered shadow-sm">
            
            <thead class="table-dark">
                <tr>
                    <th>Tên Sản phẩm</th>
                    <th>Giá</th>
                    <th class="text-center">Ảnh</th>
                    <th>Danh mục</th>
                    <th class="text-center" colspan="2">Hành động</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->product_name}}</td>
                    <td>{{ number_format($product->product_price, 0, ',', '.') }} VNĐ</td>
                    <td class="text-center">
                        {{-- Sử dụng class Bootstrap để giới hạn kích thước ảnh và làm tròn --}}
                        <img src="{{ asset($product->product_img) }}" class="img-fluid rounded" style="max-width: 80px; max-height: 80px; object-fit: cover;">
                    </td>
                    <td>{{ $product->category_name}}</td>
                    
                    {{-- Nút Sửa (Dùng Icon) --}}
                    <td class="text-center">
                        <a href="thong-tin-san-pham/{{ $product->product_id}}" class="btn btn-sm btn-outline-primary" title="Chỉnh sửa">
                            <i class="bi bi-pencil-square"></i>
                        </a>
                    </td>
                    
                    {{-- Nút Xóa (Dùng Icon) --}}
                    <td class="text-center">
                        <a href="xoa-san-pham/{{ $product->product_id}}" class="btn btn-sm btn-outline-danger" title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">
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
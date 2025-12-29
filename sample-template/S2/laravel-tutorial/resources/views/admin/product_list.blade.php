@include('admin/template/header')
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
@include('admin/template/footer')

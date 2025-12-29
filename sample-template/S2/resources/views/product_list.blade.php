@include('template/header')
   <div class="row">
      <h1>Danh sách sản phẩm</h1>
         <?php $dem=0;?>
         @foreach ($products as $product)
         <?php if($dem%3==0) echo"<div class='row'>";$dem++;?>
         <div class="col">
            {{ $product->product_name}}<br>
            <a href="thong-tin-san-pham/{{ $product->product_id}}"><img src="{{ asset($product->product_img) }}" width='100'></a></br>
            {{ number_format($product->product_price,0)}}<br>
            <a href="them-gio-hang/{{ $product->product_id}}"><button type="button" class="btn btn-primary">Mua ngay</button></a>
        </div>
            <?php if($dem%3==0) echo"</div>";?>
         @endforeach
         <?php if($dem%3!=0) echo"</div>";?>
   </div>
@include('template/footer')

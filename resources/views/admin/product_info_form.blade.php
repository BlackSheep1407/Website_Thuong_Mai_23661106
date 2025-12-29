{{-- <!DOCTYPE html>
<html>
<body>

<h2>Cập nhật sản phẩm</h2>

<form action="/admin/xu-ly-cap-nhat-san-pham" method="post" enctype="multipart/form-data">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    @foreach ($products as $product)
  <label for="fname">Tên:</label><br>
  <input type="text" id="fname" name="name" value="{{ $product->product_name}}" required><br>
   <label for="fprice">Giá:</label><br>
  <input type="number" id="fprice" name="price" value="{{ $product->product_price}}" required><br>
  <label for="lcategory">Danh mục:</label><br>
  <select id="lcategory" name="category">
    @foreach ($categories as $category)
      <option value="{{$category->category_id}}"<?php if($category->category_id==$product->product_category) echo"selected";?>>{{$category->category_name}}</option>
    @endforeach
  </select><br>
  <label for="limg">Ảnh:</label><br>
  <input type="file" id="limg" name="img" value=""><br><br>
  <input type="hidden" id="limg_old" name="img_old" value="{{ $product->product_img}}" required>
  <label for="ldescription">Mô tả:</label><br>
  <textarea id="ldescription" name="description" cols='100' rows='8'>
    {{ $product->product_description}}</textarea><br><br>
  <input type="hidden" id="fid" name="id" value="{{ $product->product_id}}" required><br>
  @endforeach
  <input type="submit" value="Cập nhật">
</form> 


</body>
</html> --}}

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cập nhật sản phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <h2 class="mb-4">Cập nhật sản phẩm</h2>

            <form action="/admin/xu-ly-cap-nhat-san-pham" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                
                @foreach ($products as $product)
                <div class="mb-3">
                    <label for="fname" class="form-label">Tên:</label>
                    <input type="text" class="form-control" id="fname" name="name" value="{{ $product->product_name}}" required>
                </div>

                <div class="mb-3">
                    <label for="fprice" class="form-label">Giá:</label>
                    <input type="number" class="form-control" id="fprice" name="price" value="{{ $product->product_price}}" required>
                </div>

                <div class="mb-3">
                    <label for="lcategory" class="form-label">Danh mục:</label>
                    <select class="form-select" id="lcategory" name="category">
                        @foreach ($categories as $category)
                        <option value="{{$category->category_id}}" <?php if($category->category_id==$product->product_category) echo"selected";?>>
                            {{$category->category_name}}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="limg" class="form-label">Ảnh mới (nếu muốn đổi):</label>
                    <input type="file" class="form-control" id="limg" name="img">
                    <input type="hidden" name="img_old" value="{{ $product->product_img}}">
                    
                    <small class="text-muted">Ảnh hiện tại: {{ $product->product_img}}</small>
                </div>

                <div class="mb-3">
                    <label for="ldescription" class="form-label">Mô tả:</label>
                    <textarea class="form-control" id="ldescription" name="description" rows="8">{{ $product->product_description}}</textarea>
                </div>

                <input type="hidden" name="id" value="{{ $product->product_id}}">
                @endforeach

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="javascript:history.back()" class="btn btn-secondary ms-2">Quay lại</a>
                </div>
            </form>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
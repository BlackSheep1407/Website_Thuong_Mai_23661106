{{-- <!DOCTYPE html>
<html>
<body>

<h2>Cập nhật sản phẩm</h2>

<form action="/admin/xu-ly-cap-nhat-san-pham" method="post" enctype="multipart/form-data">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
    @foreach ($categories as $category)
  <label for="fname">Tên:</label><br>
  <input type="text" id="fname" name="name" value="{{ $category->category_name}}" required><br>
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
    <title>Cập nhật danh mục</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            
            <h2 class="mb-4">Cập nhật danh mục</h2>

            <form action="/admin/xu-ly-cap-nhat-danh-muc" method="post">
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                
                @foreach ($categories as $category)
                
                <div class="mb-3">
                    <label for="fname" class="form-label">Tên danh mục:</label>
                    <input type="text" class="form-control" id="fname" name="name" value="{{ $category->category_name}}" required>
                </div>

                <input type="hidden" name="id" value="{{ $category->category_id}}">
                
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
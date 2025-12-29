{{-- <!DOCTYPE html>
<html>
<body>

<h2>Thêm sản phẩm</h2>

<form action="/admin/xu-ly-them-san-pham" method="post" enctype="multipart/form-data">
    <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
  <label for="fname">Tên:</label><br>
  <input type="text" id="fname" name="name" value="" required><br>
  <label for="fprice">Giá:</label><br>
  <input type="number" id="fprice" name="price" value="" required><br>
  <label for="fimg">Ảnh:</label><br>
  <input type="file" id="fimg" name="img" value="" required><br>
  <label for="lcategory">Danh mục:</label><br>
  <select id="lcategory" name="category">
    @foreach ($categories as $category)
      <option value="{{$category->category_id}}">{{$category->category_name}}</option>
    @endforeach
  </select><br>
  <label for="ldescription">Chi tiết:</label><br>
  <textarea id="ldescription" name="description" value="" cols="50"rows="10"></textarea><br><br>
  <input type="submit" value="Thêm">
</form> 


</body>
</html> --}}

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Sản Phẩm</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8"> <h2 class="mb-4">Thêm sản phẩm</h2>

            <form action="/admin/xu-ly-them-san-pham" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                
                <div class="mb-3">
                    <label for="fname" class="form-label">Tên:</label>
                    <input type="text" class="form-control" id="fname" name="name" required>
                </div>
                
                <div class="mb-3">
                    <label for="fprice" class="form-label">Giá:</label>
                    <input type="number" class="form-control" id="fprice" name="price" required>
                </div>
                
                <div class="mb-3">
                    <label for="fimg" class="form-label">Ảnh:</label>
                    <input type="file" class="form-control" id="fimg" name="img" required>
                </div>
                
                <div class="mb-3">
                    <label for="lcategory" class="form-label">Danh mục:</label>
                    <select class="form-select" id="lcategory" name="category">
                        @foreach ($categories as $category)
                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="mb-3">
                    <label for="ldescription" class="form-label">Chi tiết:</label>
                    <textarea class="form-control" id="ldescription" name="description" cols="50" rows="10"></textarea>
                </div>

                <div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                    
                    <a href="javascript:history.back()" class="btn btn-secondary ms-2">Quay lại</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
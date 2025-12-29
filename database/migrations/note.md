php artisan make:migration create_fruits_table --create=fruits


php artisan make:seeder FruitSeeder


-- 1.1. Xóa TẤT CẢ sản phẩm điện thoại cũ
DELETE FROM `product`;

-- 1.2. Xóa TẤT CẢ danh mục cũ (Apple, Samsung)
DELETE FROM `category`;

-- 1.3. Đặt lại chỉ số TỰ ĐỘNG TĂNG (AUTO_INCREMENT) về 1
ALTER TABLE `product` AUTO_INCREMENT = 1;
ALTER TABLE `category` AUTO_INCREMENT = 1;




-- 2.1. Chèn danh mục trái cây
INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Trái cây nội địa'),
(2, 'Trái cây nhập khẩu');






-- 2.2. Chèn sản phẩm trái cây (đảm bảo ảnh đã được đặt đúng thư mục trong Laravel)
INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_img`, `product_description`, `product_category`) VALUES
(1, 'Bưởi da xanh', 50000, 'img/buoi-da-xanh.jpg', 'Bưởi da xanh Bến Tre, múi hồng, vị ngọt thanh.', 1),
(2, 'Cam vàng Úc', 95000, 'img/cam-vang-uc.jpg', 'Cam vàng Úc nhập khẩu, mọng nước, nhiều vitamin C.', 2),
(3, 'Cherry đỏ Úc', 120000, 'img/cherry-do-uc.jpg', 'Cherry đỏ Úc tươi ngon, giòn, ngọt đậm.', 2),
(4, 'Chôm chôm giống Thái', 45000, 'img/chom-chom-thai.jpg', 'Chôm chôm giống Thái, thịt dày, hạt nhỏ.', 1),
(5, 'Dưa hấu không hạt', 30000, 'img/dua-hau-khong-hat.jpg', 'Dưa hấu không hạt, ruột đỏ, ngọt mát.', 1);

----------------------------------------------------------------


1️⃣ Bảng orders – lưu thông tin đơn hàng
CREATE TABLE `orders` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `phone` VARCHAR(50) NOT NULL,
  `address` TEXT NOT NULL,
  `total` DECIMAL(10,2) NOT NULL,
  `status` ENUM('pending','completed','cancelled') DEFAULT 'pending',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

2️⃣ Bảng order_items – lưu chi tiết sản phẩm trong đơn
CREATE TABLE `order_items` (
  `id` INT AUTO_INCREMENT PRIMARY KEY,
  `order_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `product_name` VARCHAR(255) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  `qty` INT NOT NULL,
  `subtotal` DECIMAL(10,2) NOT NULL,
  FOREIGN KEY (`order_id`) REFERENCES `orders`(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

3️⃣ Lưu ý:

Khi người dùng submit form checkout, bạn sẽ:

Tạo 1 bản ghi trong orders (thông tin khách hàng + tổng tiền)

Lấy order_id vừa tạo → lưu tất cả sản phẩm vào order_items

Xóa session giỏ hàng

Sau này bạn có thể dễ dàng tạo admin panel xem tất cả đơn hàng, trạng thái, tổng tiền,...





-------------------------------------------
1. Trang checkout đẹp
2. Thêm đăng nhập và lưu giỏ theo user
3. Gợi ý sản phẩm tương tự trong modal
4. Popup xác nhận xóa sản phẩm
 
--------------------------------------------
**Khi user nhấn “Thanh toán”:**

Lấy dữ liệu cart từ session.

Tạo record trong orders.

Duyệt cart tạo record trong order_items.

Xóa session cart sau khi lưu xong.
---------------------------------------------
Controller = xử lý dữ liệu / session / database

JS = xử lý hiển thị, cập nhật modal, toast, nút header, tổng tiền

Ưu điểm: khi click +/- hay xóa, bạn không phải reload trang, UI cập nhật real-time.

--------------------------------------------------------
php artisan make:migration create_carts_table
php artisan make:migration create_cart_items_table
php artisan migrate

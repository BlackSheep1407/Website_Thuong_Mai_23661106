function loadding(){
    document.querySelector("#header").innerHTML=` 
   
    <div class="logo">
      <img src="../img/logo/logo.png" alt="Logo">
    </div>
    <nav>
      <ul>
        <li><a href="INDEX.HTML">Trang Chủ</a></li>
        <li><a href="INDEX.HTML">Sản Phẩm</a>
          <ul class="submenu">
            <li><a href="INDEX.HTML">Trái cây tươi</a></li>
            <li><a href="INDEX.HTML">Trái cây cắt sẵn</a></li>
            <li><a href="INDEX.HTML">Gói quà tặng trái cây </a></li>
            <li><a href="INDEX.HTML">Nước ép trái cây</a></li>
          </ul>
        </li>
        <li><a href="./ABOUT.HTML">Giới Thiệu</a></li>
        <li><a href="#contact">Liên Hệ</a></li>
      </ul>
      <div class="inner-tk">
        <span></span>
        <input type="text" placeholder="tìm kiếm...">
      </div>
      <div class="header-actions">
            <!-- Giỏ hàng -->
        <button class="cart-btn" id="cartBtn">Giỏ hàng

          <!-- Icon giỏ hàng -->
          <i class="bi bi-basket-fill"></i>
          <!-- Link để lấy icon giỏ hàng -->
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-basket2-fill"
            viewBox="0 0 16 16">
            <path
              d="M5.929 1.757a.5.5 0 1 0-.858-.514L2.217 6H.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h.623l1.844 6.456A.75.75 0 0 0 3.69 15h8.622a.75.75 0 0 0 .722-.544L14.877 8h.623a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1.717L10.93 1.243a.5.5 0 1 0-.858.514L12.617 6H3.383zM4 10a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm3 0a1 1 0 0 1 2 0v2a1 1 0 1 1-2 0zm4-1a1 1 0 0 1 1 1v2a1 1 0 1 1-2 0v-2a1 1 0 0 1 1-1" />
          </svg>
          <button id="cartBtn">
            <!-- <img src="cart-icon.png" alt="Cart"> -->
            
            <span id="cartCount" class="cart-count">0</span> <!-- Hiển thị số lượng sản phẩm trong giỏ -->
          </button>

        </button>


        <!-- Modal Giỏ hàng -->
        <div class="modal" id="cartModal">
          <div class="modal-content">
            <span class="close" id="closeCart">&times;</span>
            <h2>Giỏ hàng</h2>
            <div class="cart-items">
              <!-- Các sản phẩm trong giỏ hàng sẽ được hiển thị ở đây -->
            </div>
            <div class="total-price">
              <!-- Tổng tiền sẽ được hiển thị ở đây -->
            </div>
            <button id="checkoutBtn">Thanh toán  
              <!-- icon đồng tiền -->
              <i class="bi bi-database-fill"></i>
              <!-- link để lấy icon đồng tiền -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-fill"
        viewBox="0 0 16 16">
        <path
          d="M3.904 1.777C4.978 1.289 6.427 1 8 1s3.022.289 4.096.777C13.125 2.245 14 2.993 14 4s-.875 1.755-1.904 2.223C11.022 6.711 9.573 7 8 7s-3.022-.289-4.096-.777C2.875 5.755 2 5.007 2 4s.875-1.755 1.904-2.223" />
        <path
          d="M2 6.161V7c0 1.007.875 1.755 1.904 2.223C4.978 9.71 6.427 10 8 10s3.022-.289 4.096-.777C13.125 8.755 14 8.007 14 7v-.839c-.457.432-1.004.751-1.49.972C11.278 7.693 9.682 8 8 8s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972" />
        <path
          d="M2 9.161V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13s3.022-.289 4.096-.777C13.125 11.755 14 11.007 14 10v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972" />
        <path
          d="M2 12.161V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16s3.022-.289 4.096-.777C13.125 14.755 14 14.007 14 13v-.839c-.457.432-1.004.751-1.49.972-1.232.56-2.828.867-4.51.867s-3.278-.307-4.51-.867c-.486-.22-1.033-.54-1.49-.972" />
      </svg>
            </button>
          </div>
        </div>


        <!-- Đăng nhập và Đăng ký -->
        <button class="auth-btn" id="loginBtn">Đăng nhập</button>
        <button class="auth-btn" id="registerBtn">Đăng ký</button>
      </div>
       <!-- Khôi phục tài khoản  -->
        <button class="auth-btn" id="recoverryBtn">Khôi phục tài khoản</button>
        <script src="../js/recoveryAuth.js"></script>
    </nav>
    

    <!-- Modal Giỏ hàng -->
  <div class="modal" id="cartModal">
    <div class="modal-content">
      <span class="close" id="closeCart">&times;</span>
      <h2>Giỏ hàng</h2>
      <p>Chưa có sản phẩm nào trong giỏ hàng.</p>
    </div>
  </div>


  <!-- Modal Đăng nhập -->
  <div class="modal" id="loginModal">
    <div class="modal-content">
      <span class="close" id="closeLogin">&times;</span>
      <h2>Đăng nhập</h2>
      <form id="loginForm">
        <input type="text" placeholder="Tên đăng nhập" required><br>
        <input type="password" placeholder="Mật khẩu" required><br>
        <button type="submit">Đăng nhập</button>
  </form>
    </div>
  </div>

  <!-- Modal Đăng ký -->
  <div class="modal" id="registerModal">
    <div class="modal-content">
      <span class="close" id="closeRegister">&times;</span>
      <h2>Đăng ký</h2>
      <form id="registerForm">
        <input type="text" placeholder="Tên đăng nhập" required><br>
        <input type="email" placeholder="Email" required><br>
        <input type="password" placeholder="Mật khẩu" required><br>
        <input type="password" placeholder="Nhập lại mật khẩu" required><br>
        <button type="submit">Đăng ký</button>
      </form>
    </div>
  </div>
  <!-- Modal Khôi phục tài khoản -->`;

    document.querySelector("#contact").innerHTML=` <h2>Liên hệ</h2>
    <main>
      <h2>Thông Tin Liên Hệ</h2>
      <br>
      <!-- Email -->
      <div class="icon">
          <img class="icon_contact" src="../IMG/icon/email_icon.webp" alt="">
          <p>Email: <a href="mailto: 23661113@kthcm.edu.vn "> 23661113@kthcm.edu.vn</a> <br>
             Email: <a href="mailto: 23661106@kthcm.edu.vn "> 23661106@kthcm.edu.vn </a>
         </p>
      </div>
     <!-- Facebook -->
      <div class="icon">
          <img class="icon_contact" src="../IMG/icon/facebook_icon.webp">
          <p>Facebook: <a href="https://www.facebook.com/">https://www.facebook.com/</a> </p>
      </div>
    <!-- Instagram -->
      <div class="icon">
          <img class="icon_contact" src="../IMG/icon/instagram_icon.webp">
          <p>Instagram: <a href="https://www.instagram.com/">https://www.instagram.com/</a></p>
      </div>
     
      <!-- Zalo/Viber -->
       <div class="icon">
          <img class="icon_contact" src="../IMG/icon/zalo_icon.webp">
          <p>Zalo <a href="tel:+84789475138">0789475138</a> <br>
             Zalo <a href="tel:+84949642295">094 964 2295</a>  
          </p>
       </div>
      
      <!-- Phonecall -->
       <div class="icon">
          <img class="icon_contact" src="../IMG/icon/phonecall_icon.webp">
          <p>Số điện thoại liên hệ: <a href="tel:+84789475138">078 947 5138</a> <br>
            Số điện thoại liên hệ: <a href="tel:+84949642295">094 964 2295</a>
          </p>
         
       </div>
      
         
      <!-- Location/Address -->
      <div class="icon">
          <img class="icon_contact" src="../IMG/icon/Location_icon.webp">
          <p>Địa chỉ của chúng tôi: <a href="https://www.google.com/maps?q=504/106,+Kinh+Dương+Vương,+Bình+Trị+Đông+B,+Bình+Tân,+TP.HCM" target="_blank">33 Đ. Vĩnh Viễn, Phường 02, Quận 10, Hồ Chí Minh, Việt Nam</a></p>
       </div>
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.605252164119!2d106.67075587369577!3d10.764875359409466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee10bef3c07%3A0xfd59127e8c2a3e0!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEtpbmggdOG6vyBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmg!5e0!3m2!1svi!2s!4v1733668330161!5m2!1svi!2s" width="400" height="350" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       
  </main>`
}
window.onload=loadding;
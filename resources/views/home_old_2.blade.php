@include('template\header');
<body>
  
  <!-- Section: Home -->
  <section id="home" class="hero">
    <div class="hero-content">
      <h2>Chào mừng đến với 2Tfresh Market</h2>
      <p>Gian hàng trái cây trực tuyến tươi và tốt cho sức khỏe !!</p>
      <!-- banner quang cao -->
      <div class="inner-slide">
        <a href="#" class="slide">
          <img src="{{ asset('main_home/img/bannerqc/Bannerqc.jpg') }}" alt="Banner 1">
        </a>
        <a href="#" class="slide">
          <img src="{{ asset('main_home/img/bannerqc/bannerqc2.webp') }}" alt="Banner 2">
        </a>
        <a href="#" class="slide">
          <img src="{{ asset('main_home/img/bannerqc/Banner qc3.webp') }}" alt="Banner 3">
        </a>
        <a href="#" class="slide">
          <img src="{{ asset('main_home/img/bannerqc/bannerqc4.webp') }}" alt="Banner 4">
        </a>
        <a href="#" class="slide">
          <img src="{{ asset('main_home/img/bannerqc/bannerqc5.webp') }}" alt="Banner 5">
        </a>
      </div>
    </div>
  </section>

  <!-- Section: Products -->
  <section id="products" class="product-list">
    <!-- trai cay tuoi -->
    <h2 id="traicaytuoi" class="tieudesanpham">Trái cây tươi</h2>

    <!-- product-list1 -->
    <div class="products-container">
      <!-- Cau tao cua 1 o san pham -->

      <!--
     <div class="product-item">
          <img class="product-img" src="" alt="">
          <h3  class="product-name"></h3>
          <div class="hidden-info">
              <div class="product-info">
                <div class="title-info"></div>
                <p></p>
              </div>
          </div> 
           <div class="product-btn">
             <p class="price"> </p>
             <button class="buy-btn">Thêm vào giỏ hàng</button>
           </div>
         
    </div> 
    -->


      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Bưởi da xanh.jpg') }}" alt="Bưởi da xanh">
        <h3 class="product-name">Bưởi da xanh</h3>
        <div class="product-btn">
          <p class="price">85.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

        <br>

        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>

            {{-- <p>
              Xuất Xứ: Xã Lạc An, huyện Bắc Tân Uyên, tỉnh Bình Dương <br>
              Tiêu Chuẩn Chất Lượng: Natural Farming <br>
              Bưởi da xanh là loại trái cây quen thuộc của mọi gia đình Việt Nam, thường xuyên xuất hiện trong mâm ngũ
              quả. Không chỉ có hương vị ngọt lành, bưởi còn chứa nhiều dưỡng chất cho cơ thể. Cùng tìm hiểu về địa chỉ
              mua trái cây Việt Nam ngon, chất lượng, giá tốt. Khám phá ngay!
            </p> --}}
          </div>
        </div>
      
      </div>


      <div class="product-item">
        <img src="{{ asset('main_home/img/Cam vàng Úc.jpg') }}" alt="Cam vàng Úc">
        <h3 class="product-name">Cam vàng Úc</h3>

        <div class="product-btn">
          <p class="price">95.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
        <br>

        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>Xuất Xứ: Thị trấn Moorook, Úc <br>

              Tiêu Chuẩn Chất Lượng: Nhập khẩu chính ngạch <br>

              Đặc Điểm Sản Phẩm <br>
              - Cam vàng là giống lai giữa bưởi (Citrus maxima) và quýt (Citrus reticulata). <br>
              - Sở hữu hình dáng tròn đều cùng sắc cam tươi tắn, bắt mắt. Cam vàng là sự lựa chọn rất thích hợp để mua
              làm quà hoặc trưng bày trên mâm quả của gia đình trong các dịp lễ. <br>
              - Hương vị của cam vàng không thể tươi mát hơn với độ ngọt của thịt và độ mọng tươi của tép. Do vị ngọt
              phụ thuộc tương đối vào mùa vụ, khí hậu nên sẽ có thời điểm cam có hậu xen chua, tuy nhiên vẫn không ảnh
              hưởng nhiều đến độ ngon của trái. <br>
              <br>
              Bảo Quản Và Sử Dụng <br>
              - Cam bảo quản tủ mát được 5-10 ngày. <br>
              - Để càng lâu, trái cam càng mọng nước và ngọt đậm. <br>
              - Nếu xuất hiện trái hư (ấn vào mềm, ngửi mùi chua), cần loại bỏ ngay. Tránh lây lan sang trái khác. <br>
              <br>
              Lợi Ích Của Cam Vàng <br>
              - Bảo vệ, nuôi dưỡng làn da <br>
              - Giảm stress, mệt mỏi <br>
              - Điều hoà huyết áp <br>
              - Tăng cường sức đề kháng <br>
              - Tốt cho mẹ bầu <br>
              - Bảo vệ sức khoẻ tim mạch
            </p> --}}
          </div>
        </div>
        

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Cherry đỏ Úc.jpg') }}" alt="Cherry đỏ Úc">
        <h3 class="product-name">Cherry đỏ Úc</h3>

        <div class="product-btn">
          <p class="price"> 560.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
        <br>
        
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: Victoria, Úc <br>
              Tiêu Chuẩn Chất Lượng: Nhập khẩu chính ngạch <br>
              Cherry đỏ Úc được nhiều người yêu thích nhờ hương vị thơm ngon, giòn tươi và giàu chất dinh dưỡng. Loại
              quả này thích hợp làm quà tặng, hoặc đơn giản làm món tráng miệng sau bữa ăn. Khám phá ngay địa chỉ bán
              trái cây nhập khẩu uy tín, chất lượng và cách chọn cherry Úc ngon!
            </p> --}}
          </div>
        </div>
       

      </div>

      <!-- product-list2 -->




      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Chôm chôm giống Thái.jpg') }}" alt="Chôm chôm giống Thái">
        <h3 class="product-name">Chôm chôm giống Thái</h3>

        <div class="product-btn">
          <p class="price"> 95.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

        <br>

        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: Xã Vĩnh Kim, Huyện Châu Thành, tỉnh Tiền Giang <br>
              Tiêu Chuẩn Chất Lượng: Natural Farming <br>
              Đặc Điểm Sản Phẩm <br>
              - Với những ưu điểm nổi bật: Thịt chắc, dày, tróc hạt, hạt nhỏ và dẹp. Chôm chôm Thái là loại trái cây
              không chỉ nổi tiếng ở Việt nam mà còn là sự lựa chọn của nhiều nước trên thế giới. <br>
              - Không xen chua như các giống chôm chôm bình thường khác, khi thưởng thức chôm chôm Thái, có thể cảm nhận
              độ ngọt trọn vẹn từ miếng cắn đầu tiên đến cuối cùng. <br>
              Bảo Quản Và Sử Dụng <br>
              - Chôm chôm mua về nên ăn ngay hoặc bảo quản trong ngăn mát tủ lạnh từ 3-5 ngày. <br>
              - Ăn tới đâu, rửa và cắt gọt tới đó để đảm bảo chất lượng tốt nhất của trái. <br>
              - Lọc những trái hư, tránh lây lan nấm mốc sang những trái bình thường, còn khoẻ mạnh. <br>
              Lợi Ích Của Chôm Chôm Thái <br>
              - Kiểm soát cân nặng <br>
              - Nguồn sắt dồi dào <br>
              - Tốt cho sức khoẻ mẹ bầu <br>
              - Tăng cường chuyển hoá chất béo <br>
              - Củng cố sức khoẻ xương khớp <br>
              - Giảm nguy cơ xơ vữa động mạch <br>

            </p> --}}
          </div>
        </div>
    
      </div>


      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Dưa hấu không hạt.jpg') }}" alt="">
        <h3 class="product-name">Dưa hấu không hạt</h3>

        <div class="product-btn">
          <p class="price"> 29.000 VNĐ </p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
        <br>

        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: Thu mua tại các tỉnh: Long An, Tiền Giang, Vĩnh Long, Hậu Giang <br>
              Tiêu Chuẩn Chất Lượng: Natural Farming <br>
              Đặc Điểm Sản Phẩm <br>
              - Dưa hấu là một loại trái đặc biệt thuộc lớp quả mọng, bởi lớp vỏ cứng và không có sự phân chia trong
              trái.<br>
              - Dưa hấu không hạt có lớp thịt mọng, nhiều nước, hương vị ngọt mát, tự nhiên.<br>
              - So sánh với dưa hấu có hạt, độ ngọt của dưa hấu không hạt có vị thanh hơn. Tuy nhiên, nhờ đặc tính không
              hạt đặc trưng, dễ dàng thưởng thức nên dưa hấu không hạt trở thành thực quả phù hợp cho tất cả mọi người,
              từ người già cho đến trẻ nhỏ.<br>
              Bảo Quản Và Sử Dụng<br>
              - Nên thưởng thức dưa hấu khi héo cuống (cuống chuyển khô đen) vì khi đó hương vị của dưa sẽ đậm đà
              hơn.<br>
              - Dưa xanh cuống có thể bảo quản ở nơi khô ráo, thoáng mát.
              - Dưa héo cuống nên được bảo quản trong ngăn mát tủ lạnh. Khi trái chín quá, ruột sẽ chuyển sang nẫu và có
              vị đắng.<br>
              Lợi Ích Của Dưa Hấu Không Hạt<br>
              - Trong dưa hấu hàm lượng nước (chiếm 91%) và chất xơ cao nên việc thưởng thức dưa hấu không chỉ giúp ta
              no lâu, hỗ trợ giảm cân mà còn rất tốt cho hoạt động của hệ tiêu hoá. Bên cạnh đó, với lượng đường tự
              nhiên và các khoáng chất tốt cho sức khoẻ sẽ giúp các mẹ bầu giảm chứng ợ nóng, ốm nghén và mất nước trong
              suốt thời kì mang thai.<br>
              - Hai loại vitamin A và C có trong dưa hấu, chiếm vai trò vô cùng quan trọng đối với sức khoẻ của da và
              tóc. Vitamin A giúp tái tạo và chữa lành các tế bào da tổn thương. Vitamin C thúc đẩy cơ thể tái tạo
              collagen, giữ cho da luôn mịn màng, săn chắc, đồng thời nuôi dưỡng một mái tóc chắc khoẻ, bóng mượt từ bên
              trong.<br>
              - Lycopene và vitamin C có trong dưa sẽ loại bỏ các gốc tự do gây tổn hại tế bào ra khỏi cơ thể, hỗ trợ
              ngăn ngừa bệnh viêm khớp, hen suyễn, ung thư và nhiều loại bệnh liên quan khác.
            </p> --}}
          </div>
        </div>
    
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Dừa xiêm gọt trọc.jpg') }}" alt="Dừa xiêm gọt trọc">
        <h3 class="product-name">Dừa xiêm gọt trọc</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: Xã Vĩnh Kim, huyện Châu Thành, tỉnh Tiền Giang <br>
              Tiêu Chuẩn Chất Lượng: Natural Farming <br>
              Dừa xiêm gọt trọc là một loại trái cây đặc sản của miền tây. Đây là thức uống giải khát tuyệt vời, đồng
              thời cung cấp nhiều giá trị dinh dưỡng cho sức khoẻ. Cùng tìm hiểu về địa chỉ mua trái cây Việt Nam chuẩn
              ngon, chất lượng, giá tốt. Khám phá ngay! <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 15.500 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Hồng giòn Hàn Quốc.jpg') }}" alt="Hồng giòn Hàn Quốc">
        <h3 class="product-name">Hồng giòn Hàn Quốc</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: Hàn Quốc <br>
              Tiêu Chuẩn Chất Lượng: Nhập Khẩu Chính Ngạch <br>
              Đặc Điểm Sản Phẩm <br>
              - Hồng Giòn không chỉ là một trong những loại trái cây xuất khẩu nổi tiếng mà còn là sản vật mang ý nghĩa
              rất nhiều trong đời sống văn hoá tinh thần của người dân Hàn Quốc. <br>
              - Sở hữu ngoại hình nổi bật với hình dáng tròn và bẹt trái, lớp vỏ cứng kèm tone cam trầm ấm. <br>
              - Khi thưởng thức, có thể cảm nhật rõ ràng độ ngọt đậm nguyên bản, không pha trộn vị chát nhẹ <br>
              như những giống hồng thông thường khác. Thịt quả giòn và chắc, cắn miếng nào là cảm giác "rộp rộp" miếng
              đó. <br>
              Bảo Quản Và Sử Dụng <br>
              - Hồng giòn mua về nên thưởng thức ngay, hoặc bảo quản trong ngăn mát tủ lạnh trong khoảng từ 5-7 ngày.
              <br>
              - Ăn tới đâu, rửa và cắt tới đó để đảm bảo chất lượng tốt nhất của trái. <br>
              - Lọc những trái hư ra chỗ khác để tránh lây lan nấm, mốc sang những trái khoẻ mạnh. <br>
              Lợi Ích Của Hồng Giòn Hàn Quốc <br>
              - Ngăn ngừa lão hoá <br>
              - Hỗ trợ giảm cân <br>
              - Tăng cường miễn dịch <br>
              - Tốt cho tim mạch <br>
              - Phòng chống ung thư <br>
              - Giảm hàm lượng cholesterol <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 120.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Kiwi vàng New Zealand.webp') }}" alt="Kiwi vàng New Zealand">
        <h3 class="product-name">Kiwi vàng New Zealand</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: Thành phố Mount Maunganui, New Zealand <br>
              Tiêu Chuẩn Chất Lượng: Nhập khẩu chính ngạch <br>
              Kiwi vàng nổi tiếng là loại trái cây nhập khẩu thơm ngon bậc nhất. Ăn Kiwi vàng có tốt không? Giá bao
              nhiêu? Khám phá ngay! <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 175.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Mít Thái.jpg') }}" alt="Mít Thái">
        <h3 class="product-name">Mít Thái</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: Xã Vĩnh Kim, Huyện Châu Thành, Tỉnh Tiền Giang <br>
              Tiêu Chuẩn Chất Lượng: Natural Farming <br>
              Đặc Điểm Sản Phẩm <br>
              - Mít là loài thực vật ăn quả, mọc phổ biến ở vùng Đông Nam Á và Brasil. Mít thuộc họ Dâu tằm và được cho
              là có nguồn gốc từ Ấn Độ. <br>
              - Mít Thái là giống Mít có nguồn gốc ở Thái Lan, được trồng nhiều ở vùng Nam Bộ, Việt Nam. <br>
              - Với vị trí địa lý và thổ nhưỡng khác nhau sẽ cho ra màu sắc, hương vị của múi mít cũng sẽ không giống
              nhau. Mít được trồng ở Tiền giang, khi chín thịt trái sẽ chuyển sang vàng đậm. <br>
              - Mít khi chín, thịt ráo, chắc và ngọt đậm. Sẽ ngon hơn khi được để lạnh trước khi thưởng thức. <br>
              Bảo Quản Và Sử Dụng <br>
              - Mít lột sẵn khi mua về nên ăn liền hoặc bảo quản trong ngăn mát tủ lạnh từ 4-5 ngày. <br>
              - Nên đựng mít trong hộp kín và quấn màng bọc thực phẩm hoặc hút chân không. Tránh mùi mít lang sang thức
              ăn khác trong tủ lạnh. <br>
              Lợi Ích Của Mít Thái <br>
              - Tăng cường hệ miễn dịch <br>
              - Điều hoà lượng đường trong máu <br>
              - Phòng ngừa loãng xương <br>
              - Hỗ trợ điều trị chứng tắc nghẽn mạch máu <br>
              - Tốt cho đường ruột <br>
              - Phòng ngừa quáng gà <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 55.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Mận đỏ Mỹ.jpg') }}" alt="Mận đỏ Mỹ">
        <h3 class="product-name">Mận đỏ Mỹ</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: Bang California, Mỹ <br>
              Tiêu Chuẩn Chất Lượng: Nhập khẩu chính ngạch <br>
              Đặc Điểm Sản Phẩm <br>
              - Mận đỏ Mỹ chủ yếu được trồng ở Mississipi và miền nam nước Mỹ. Loại mận này có vỏ tím đỏ đậm rất nhiều
              phấn tự nhiên phủ trên bề mặt vỏ, kích thước Mận Mỹ lớn gấp 3-4 lần trái Mận Việt Nam <br>
              - Vỏ Trái Mận Đỏ Mỹ khá mỏng và giòn, thịt rất chắc nên cho dù quả có mềm một chút thì khi cắn vào vẫn cảm
              nhận được độ giòn của nó, thịt quả Mận Mỹ giòn, ngọt, thơm và rất nhiều nước, chỉ chua nhẹ ở lớp vỏ <br>
              - Khi cắn nguyên trái sẽ cảm giác được phần thịt dày ngập kẽ răng cùng độ đậm tươi. Chất vị có độ ngọt
              vừa, hậu vị thanh dịu lôi cuốn. <br>
              Bảo Quản Và Sử Dụng <br>
              - Mận mua về nên dùng ngay hoặc bảo quản trong tủ mát từ 3-5 ngày <br>
              - Không nên rửa trước, ăn đến đâu rửa đến đó để cảm nhận được chất lượng tốt nhất của trái. <br>
              - Lựa và bỏ những trái có dấu hiệu hư, mềm nhũn hoặc nấm mốc để tránh ảnh hưởng đến chất lượng của những
              trái còn lại <br>
              Lợi Ích Của Mận Vàng <br>
              - Giàu polyphenol, chất chống oxy hoá tốt cho cơ thể <br>
              - Hỗ trợ điều hoà đường huyết <br>
              - Bảo vệ sức khoẻ xương khớp <br>
              - Ổn định hệ tiêu hoá <br>
              - Tốt cho thị lực <br>
              - Phòng chống ung thư <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 345.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Nho mẫu đơn Hàn Quốc.jpg') }}" alt="Nho mẫu đơn Hàn Quốc chùm 800GR - 1KG">
        <h3 class="product-name">Nho mẫu đơn Hàn Quốc chùm 800GR - 1KG</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: Tỉnh North Gyeongsang, Hàn Quốc <br>
              Tiêu Chuẩn Chất Lượng: Nhập khẩu chính ngạch <br>
              Đặc Điểm Sản Phẩm <br>
              - Nho Mẫu đơn là giống nho lưỡng bội, kết quả của sự lai tạo giữa giống Akitsu-21 và 'Hakunan' (V.
              vinifera) do Viện Khoa học Cây ăn quả Quốc gia (NIFTS) ở Nhật Bản tạo ra vào năm 1988. <br>
              - Nhờ sự lai tạo có chọn lọc, nho mẫu đơn mang nhiều đặc điểm nổi trội như kích thước chùm và trái lớn,
              thịt không không giòn cứng như nho Mỹ mà kết cấu thạch, mềm tan như jelly. <br>
              - Bên cạnh đó, dù đậm vị nhưng vị ngọt của nho mẫu đơn không gây cảm giác gắt cổ, khó chịu. Thay vào đó là
              sự ngọt thơm tựa sữa. Đó cũng là lý do mà nhiều nhà vườn gọi giống nho này là nho sữa hay nho xanh sữa.
              <br>
              Bảo Quản Và Sử Dụng <br>
              - Nho Mẫu Đơn mua về, nếu không sử dụng ngay nên bảo quản ngăn mát tủ lạnh trong khoảng từ 1-3 ngày. <br>
              - Không nên rửa nho mẫu đơn trước khi bảo quản. Ăn tới đâu, rửa tới đó để bảo đảm chất lượng tốt nhất của
              trái. <br>
              - Loại bỏ những trái hư, dập, mốc, để tránh lan sang những trái bình thường khác. <br>
              Lợi Ích Của Nho Mẫu Đơn <br>
              - Tăng cường thị lực <br>
              - Hỗ trợ giảm máu nhiễm mỡ <br>
              - Cải thiện hệ tiêu hoá <br>
              - Phòng chống xơ vữa động mạch <br>
              - Bảo vệ tim mạch <br>
              - Đặc tính chống viêm <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 785.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Nho xanh Mỹ.jpg') }}" alt="Nho xanh Mỹ">
        <h3 class="product-name">Nho xanh Mỹ</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: California, Mỹ <br>
              Tiêu Chuẩn Chất Lượng: Nhập khẩu chính ngạch <br>
              Đặc Điểm Sản Phẩm <br>
              - Mỹ là một quốc gia có ngày nông nghiệp Nho phát triển với số lượng và chất lượng nho bán ra đứng hàng
              đầu thế giới. <br>
              - Nho xanh không hạt Mỹ là dòng trái cây nhập khẩu, được người tiêu dùng tại Việt Nam ưa chuộng, không chỉ
              bởi ngoại hình bắt mắt, mà hương vị cũng say đắm lòng người. <br>
              - Nho xanh Autumn Crisp Pretty Lady có hình dáng tròn trái, lớp vỏ màu xanh ngọc dịu, được bao phủ bởi lớp
              phấn trắng mỏng. Đây là lớp phấn hoàn toàn tự nhiên, giúp nho tránh được sự tác động và tấn công của côn
              trùng. <br>
              - Chất vị của nho ngọt đậm, thịt giòn tươi. Vì nho không hạt nên phù hợp với mọi lứa tuổi, đều có thể dễ
              dàng thưởng thức. <br>
              - Nho xanh Mỹ được gieo trồng và canh tác theo tiêu chuẩn của Bộ Nông Nghiệp Mỹ, thu hoạc, đóng gói cẩn
              thận, đảm bảo chất lượng sản phẩm, an toàn cho sức khoẻ người dùng. <br>
              Bảo Quản Và Sử Dụng <br>
              - Nho xanh mua về nên dùng ngay hoặc bảo quản trong ngăn mát tủ lạnh từ 1-3 ngày <br>
              - Không rửa trước, ăn đến đâu rửa nho đến đó, để đảm bảo hương vị tốt nhất của trái. <br>
              - Loại bỏ những trái có dấu hiệu mềm, nhũng, dập, hư hoặc mốc để tránh ảnh tưởng đến những trái còn lại.
              <br>
              Lợi Ích Của Nho Xanh Không Hạt Mỹ <br>
              - Tăng cường thị lực <br>
              - Hỗ trợ giảm máu nhiễm mỡ <br>
              - Cải thiện hệ tiêu hoá <br>
              - Phòng chống xơ vữa động mạch <br>
              - Bảo vệ tim mạch <br>
              - Đặc tính chống viêm <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 255.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Nho đen Mỹ.jpg') }}" alt="Nho đen Mỹ">
        <h3 class="product-name">Nho đen Mỹ</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: California, Mỹ <br>
              Tiêu Chuẩn Chất Lượng: Nhập khẩu chính ngạch <br>
              Đặc Điểm Sản Phẩm <br>
              - Nho đen không hạt Mỹ được gieo trồng nhiều ở các bang California, Oregon, Washingtong, nơi có khí hậu
              khô và ấm áp. <br>
              - Nho đen có nhiều chủng loại, trong đó có Pandol Dark Star. Khi thưởng thức trái có vị ngọt đậm, xen chát
              nhẹ đăng trưng. <br>
              - Hình dáng trái thường không tròn mà hơi bầu và thuôn dài. Vỏ có màu đen thẫm, xung quanh phủ một lớp
              phấn tự nhiên bảo vệ nho khỏi tự tấn công, gây hại của côn trùng. <br>
              - Đặc trưng của nho Mỹ sẽ không mềm mọng mà thịt thường chắc và giòn. Khi cắn sẽ có cảm giác tươi mới và
              sảng khoái. <br>
              - Vì nho đen Mỹ không có hạt nên trẻ em và người già, ai ai cũng đều dễ dàng thưởng thức. <br>
              Bảo Quản Và Sử Dụng <br>
              - Nho đen mua về nên dùng ngay hoặc bảo quản trong ngăn mát tủ lạnh từ 1-3 ngày <br>
              - Không rửa trước, ăn đến đâu rửa nho đến đó, để đảm bảo hương vị tốt nhất của trái. <br>
              - Loại bỏ những trái có dấu hiệu mềm, nhũng, dập, hư hoặc mốc để tránh ảnh tưởng đến những trái còn lại.
              <br>
              Lợi Ích Của Nho Đen Mỹ <br>
              - Tăng cường thị lực <br>
              - Hỗ trợ giảm máu nhiễm mỡ <br>
              - Cải thiện hệ tiêu hoá <br>
              - Phòng chống xơ vữa động mạch <br>
              - Bảo vệ tim mạch <br>
              - Đặc tính chống viêm <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 235.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Quýt Úc.jpg') }}" alt="Quýt Úc">
        <h3 class="product-name">Quýt Úc</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: Thị trấn Gayndah, Bang Queensland, Úc <br>
              Tiêu Chuẩn Chất Lượng: Nhập Khẩu Chính Ngạch <br>
              Đặc Điểm Sản Phẩm <br>
              - Úc không chỉ là một trong những nước có nền công nghiệp phát triển với các quy trình canh tác và sản
              xuất hiện đại, mà còn là địa điểm xuất khẩu nhiều giống trái cây tươi ngon trên toàn thế giới, trong đó có
              Quýt Úc. <br>
              - Hiện nay, Quýt Úc được ươm giống và chăm sóc nhiều tại tiểu bang Queensland thuộc khu vực phía Nam nước
              Úc. Với khí hậu cận nhiệt đới nóng ấm quanh năm, rất thích hợp để tạo ra hương vị ngon nhất cho giống trái
              này. <br>
              - Kích thước vừa tay, tròn và dẹp trái. Khi thưởng thức sẽ có hương vị đậm đà, ngọt sâu, xen chua nhẹ tinh
              tế đặc trưng. <br>
              - Trái có màu cam tươi bắt mắt, 1Kg sẽ rơi vào khoảng 4 trái, rất thích hợp để làm quà biếu tặng cho bạn
              bè và người thân. <br>
              Bảo Quản Và Sử Dụng <br>
              - Quýt mua về nên ăn ngay hoặc bảo quản trong tủ mát từ 3-7 ngày. <br>
              - Nếu xuất hiện trái hư (ấn vào mềm, ngửi thấy mùi chua) nên loại bỏ ngay để tránh lây lan sang trái khác.
              <br>
              Lợi Ích Của Quýt Úc <br>
              - Giàu chất chống oxy hoá <br>
              - Hỗ trợ chức năng miễn dịch <br>
              - Chống lão hoá da <br>
              - Giảm căng thẳng, lo âu <br>
              - Thúc đẩy sức khoẻ hệ tiêu hoá <br>
              - Phòng chống sỏi thận <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 145.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Quýt đường canh.jpg') }}" alt="Quýt đường canh">
        <h3 class="product-name">Quýt đường canh</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: Mộc Châu, Sơn La <br>
              Tiêu Chuẩn Chất Lượng: VietGap <br>
              Đặc Điểm Sản Phẩm <br>
              - Mộc Châu là cao nguyên nổi tiếng Việt Nam với nhiều di tích lịch sử và sản vật quý. Chất đất trù phú Mộc
              Châu là nơi rất tốt để trồng các loại cây ôn đới khác, đặc biệt là Cam Canh <br>
              - Cam Canh có vỏ mỏng, màu vàng cam bắt mắt, có thể dễ dàng lột vỏ như quýt <br>
              - Đây là giống cam chịu lạnh, chính vì đặc tính này nên cam rất mọng nước, không hạt, có vị ngon thanh,
              không chua, mùi hương thơm đặc trưng <br>
              Bảo Quản Và Sử Dụng <br>
              - Cam bảo quản tủ mát được 5-10 ngày. <br>
              - Để càng lâu, trái cam càng mọng nước và ngọt đậm. <br>
              - Nếu xuất hiện trái hư (ấn vào mềm, ngửi mùi chua), cần loại bỏ ngay. Tránh lây lan sang trái khác. <br>
              Lợi Ích Của Cam Canh <br>
              - Giàu vitamin C <br>
              - Điều hòa huyết áp <br>
              - Tốt cho hệ tiêu hóa <br>
              - Giảm stress <br>
              - Tốt cho làn da <br>
              - Tăng cường sức đề kháng <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 125.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Sầu riêng Musang King.jpg') }}" alt="Sầu riêng Musang King">
        <h3 class="product-name">Sầu riêng Musang King</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: Thu mua tại Đông Nam Bộ và Tây Nam Bộ <br>
              Tiêu Chuẩn Chất Lượng: Natural Farming <br>
              Sầu riêng Musang King là giống sầu riêng cao cấp, được mệnh danh ngon nhất thế giới. Hiện nay, trái sầu
              riêng được trồng nhiều ở các tỉnh đồng bằng sông Cửu Long, với hương vị ngon đậm đà nên rất được ưa
              chuộng. Hãy thử ngay nào bạn ơi! <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 1.460.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Táo Envy Mỹ.jpg') }}" alt="Táo Envy Mỹ">
        <h3 class="product-name">Táo Envy Mỹ</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: Thành phố Torrance, bang California, Mỹ <br>
              Tiêu Chuẩn Chất Lượng: Nhập Khẩu Chính Ngạch <br>
              Táo Envy Mỹ là giống táo cao cấp, được nhiều người ưa chuộng vì vẻ ngoài sang trọng, đẹp mắt. Đây được coi
              là “nữ hoàng” của mọi loại táo với hương vị ngọt đậm khác biệt cùng với độ giòn và mọng nước. <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 145.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Xoài cát chu da vàng.jpg') }}" alt="Xoài cát chu da vàng">
        <h3 class="product-name">Xoài cát chu da vàng</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Xuất Xứ: Thành phố Cao Lãnh, tỉnh Đồng Tháp <br>
              Tiêu Chuẩn Chất Lượng: Natural Farming <br>
              Đặc Điểm Sản Phẩm <br>
              - Xoài Cát Chu Da Vàng được xem là đứa con mang trọn tinh hoa của vùng đất Cao Lãnh. Tương truyền rằng đây
              là thức quả tiến vua trong thời đại nhà Nguyễn lên ngôi, đó cũng là lý do mà giống xoài này còn được biết
              đến với một cái tên khác là Xoài Ngự. <br>
              - Khi chín tới, lớp vỏ xoài sẽ có màu vàng nhạt, hương vị ngọt xen chua nhẹ, kích thích vị giác. <br>
              - Khi chín già, lớp vỏ của xoài sẽ dần chuyển sang màu vàng đậm hơn, lan đều hết trái. Lớp thịt sẽ ửng
              vàng cam từ trong ruột ra, hương vị ngọt sâu, chất thịt mềm dai nhưng không mềm tan như xoài cát Hoà Lộc,
              hương thơm nhẹ dịu nhẹ đặc trưng. <br>
              Bảo Quản Và Sử Dụng <br>
              - Xoài còn xanh: Bảo quản nơi thoáng mát, khoảng 2-5 ngày sau xoài sẽ chín. Tuyệt đối không để xoài còn
              xanh vào tủ lạnh. <br>
              - Nếu đặt một trái táo, chuối chín, cam cạnh xoài xanh, xoài sẽ nhanh chín gấp hai lần. <br>
              - Khi xoài chín, da trái sẽ chuyển màu vàng, ấn vào mềm, ngửi mùi thơm thoang thoảng. Màu da càng đậm,
              thịt trái càng ngọt đậm đà và thơm. <br>
              - Nếu trên vỏ xuất hiện đốm đen (hiện tượng này là hoàn toàn tự nhiên, đối với xoài không xử lý chống
              mốc), cắt ngay phần đen, tránh để lan sang phần khác . Bôi dầu ăn hoặc nước cốt chanh lên mặt cắt, lấy
              màng thực phẩm bọc lại. <br>
              - Khi xoài chín, bảo quản trong tủ lạnh và ăn trong khoảng từ 3-4 ngày. Bọc màng thực phẩm để tránh quả bị
              ám mùi thịt, cá..., xoài sẽ bảo quản được lâu hơn. <br>
              - Khi cắt gọt xoài nên cắt xuôi từ cuống xuống. Gọt ngược thịt xoài sẽ dễ bị xơ nhiều. <br>
              Lợi Ích Của Xoài Cát Chu Da Vàng <br>
              - Tăng cường hệ thống miễn dịch <br>
              - Phòng tránh thoái hoá điểm vàng <br>
              - Ổn định huyết áp <br>
              - Giảm nồng độ cholesterol <br>
              - Bảo vệ tim mạch <br>
              - Cải thiện tiêu hoá <br>


            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 105.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item" id="soldout-product1">
        <img class="product-img" src="{{ asset('main_home/img/Vú sữa tím Lò Rèn.webp') }}" alt="Vú sữa tím Lò Rèn">
        <h3 class="product-name">Vú sữa tím Lò Rèn</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            <p>

            <div class="soldout-announ">Hiện tại đã hết hàng !!!</div>

            </p>
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 0 VNĐ</p>
          <button class="buy-btn">Tạm hết hàng</button>
        </div>

      </div>

    </div>

    <!-- Trai cay cat san -->
    <h2 id="traicaycatsan" class="tieudesanpham"> Trái cây cắt sẵn</h2>
    <div class="products-container">
      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Trái cây cắt sẵn CS01.jpg') }}" alt="Trái cây cắt sẵn CS01">
        <h3 class="product-name">Trái cây cắt sẵn CS01</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              • Kiwi Vàng Zespri <br>
              • Kiwi Xanh Zespri <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 135.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Trái cây cắt sẵn CS02.jpg') }}" alt="Trái cây cắt sẵn CS02">
        <h3 class="product-name">Trái cây cắt sẵn CS02</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              • Bưởi da xanh <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát
              <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 85.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Trái cây cắt sẵn CS03.jpg') }}" alt="Trái cây cắt sẵn CS03">
        <h3 class="product-name">Trái cây cắt sẵn CS03</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              • Ổi giống Đài Loan <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 45.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Trái cây cắt sẵn CS04.jpg') }}" alt="Trái cây cắt sẵn CS04">
        <h3 class="product-name">Trái cây cắt sẵn CS04</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              • Xoài tứ quý <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 50.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Trái cây cắt sẵn CS05.jpg') }}" alt="Trái cây cắt sẵn CS05">
        <h3 class="product-name">Trái cây cắt sẵn CS05</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              • Táo Envy size 100 <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 70.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Trái cây cắt sẵn CS07.jpg') }}" alt="">
        <h3 class="product-name">Trái cây cắt sẵn CS07</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              • Dứa <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 55.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Trái cây cắt sẵn CS10.jpg') }}" alt="Trái cây cắt sẵn CS10">
        <h3 class="product-name">Trái cây cắt sẵn CS10</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              • Thanh Long ruột tím hồng <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 55.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>

      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Trái cây cắt sẵn CS13.jpg') }}" alt="Trái cây cắt sẵn CS13">
        <h3 class="product-name">Trái cây cắt sẵn CS13</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              • Dưa lưới Amore ( 1 quả ) <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 350.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Trái cây cắt sẵn CS32.jpg') }}" alt="Trái cây cắt sẵn CS32">
        <h3 class="product-name">Trái cây cắt sẵn CS32</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Quýt Úc <br>
              Táo Envy Mỹ <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br> --}}
            </p>
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 79.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Trái cây cắt sẵn CS36.jpg') }}" alt="Trái cây cắt sẵn CS36">
        <h3 class="product-name">Trái cây cắt sẵn CS36</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              • Nho xanh không hạt Úc <br>
              • Nho đen không hạt Úc/Nam Phi <br>
              • Quýt Úc <br>
              • Táo Juliet hữu cơ Pháp <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 155.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Trái cây cắt sẵn CS37.jpg') }}" alt="Trái cây cắt sẵn CS37">
        <h3 class="product-name">Trái cây cắt sẵn CS37</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              • Dứa Queen <br>
              • Ổi giống Đài Loan <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 80.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Trái cây cắt sẵn CS40.jpg') }}" alt="Trái cây cắt sẵn CS40">
        <h3 class="product-name">Trái cây cắt sẵn CS40</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              • Quýt 2PH <br>
              • Thanh long ruột đỏ (KG) <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 100.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>
      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Trái cây cắt sẵn CS55.jpg') }}" alt="Trái cây cắt sẵn CS55">
        <h3 class="product-name">Trái cây cắt sẵn CS55</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              • Nho xanh nhập khẩu <br>
              • Hồng táo Bắc Kinh <br>
              • Nhãn bắp cải <br>
              • Quýt Úc <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>

            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 179.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

    </div>

    <!-- Goi qua tang trai cay -->
    <h2 id="goiquatangtraicay" class="tieudesanpham">Gói quà tặng trái cây</h2>
    <div class="products-container">
      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Giỏ quà trái cây G028.webp') }}" alt="Giỏ quà trái cây G028">
        <h3 class="product-name">Giỏ quà trái cây G028</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Cam vàng Úc <br>
              Hồng giòn Fuji Đà Lạt <br>
              Kiwi xanh New Zealand <br>
              Lê Hàn Quốc <br>
              Cherry đỏ Úc size 26-28 <br>
              Mận An Phước <br>
              Nho xanh Mỹ <br>
              Táo Envy New Zealand size 100 <br>
              Giỏ mây <br>
              Hoa và phụ kiện trang trí cho giỏ quà <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>
            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 795.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Giỏ quà trái cây G029.webp') }}" alt="Giỏ quà trái cây G029">
        <h3 class="product-name">Giỏ quà trái cây G029</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Dưa lưới Hoàng Kim <br>
              Quýt Úc <br>
              Cam vàng Úc <br>
              Kiwi vàng New Zealand <br>
              Lê Hàn Quốc <br>
              Mận đỏ Mỹ <br>
              Táo Envy New Zealand size 100 <br>
              Nho đen Mỹ <br>
              Nho xanh Mỹ <br>
              Mận An Phước <br>
              Giỏ mây <br>
              Hoa và phụ kiện trang trí cho giỏ quà <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>
            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 1.295.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Hộp quà Cherry đỏ.webp') }}" alt="Hộp quà Cherry đỏ">
        <h3 class="product-name">Hộp quà Cherry đỏ</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            <p>
              Cherry Đỏ <br>
              Combo túi và hộp quà <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>
            </p>
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 448.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Hộp quà trái cây HQ224.webp') }}" alt="Hộp quà trái cây HQ224">
        <h3 class="product-name">Hộp quà trái cây HQ224</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Hồng Giòn Fuji Đà Lạt <br>
              Xoài cát chu da vàng <br>
              Kiwi vàng New Zealand <br>
              Táo Envy New Zealand size 100 <br>
              Mận An Phước <br>
              Nho xanh Mỹ <br>
              Cherry đỏ Úc size 26-28 <br>
              Combo túi và hộp quà kích thước: 28(dài) x 22(rộng) x 10(cao) <br>
              Hoa và phụ kiện trang trí cho hộp quà <br>
              <br>
              <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>
            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 545.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Hộp quà trái cây HQ226.webp') }}" alt="Hộp quà trái cây HQ226">
        <h3 class="product-name">Hộp quà trái cây HQ226</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Nho xanh Mỹ <br>
              Nho đen Mỹ <br>
              Quýt Úc <br>
              Kiwi vàng New Zealand <br>
              Xoài cát chu da vàng <br>
              Lê Hàn Quốc <br>
              Táo Envy New Zealand size 100 <br>
              Hộp quà carton lạnh kích thước: 39(dài) x 28(rộng) x 13(cao) <br>
              Túi giấy đựng hộp quà Morning Fruit: 42(dài) x 30(rộng) x 29(cao) <br>
              Thiệp viết tay Morning Fruit <br>
              Hoa và phụ kiện trang trí cho hộp quà <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>
            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 995.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Hộp quà trái cây HQ227.webp') }}" alt="Hộp quà trái cây HQ227">
        <h3 class="product-name">Hộp quà trái cây HQ227</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Mận đỏ Mỹ <br>
              Táo Envy New Zealand size 100 <br>
              Xoài cát chu da vàng <br>
              Lê Hàn Quốc <br>
              Cam vàng Úc <br>
              Kiwi vàng New Zealand <br>
              Dâu Nghệ Nhân <br>
              Nho mẫu đơn Hàn Quốc / Nho mẫu đơn nội địa Trung <br>
              Hộp quà carton lạnh kích thước: 39(dài) x 28(rộng) x 13(cao) <br>
              Túi giấy đựng hộp quà Morning Fruit: 42(dài) x 30(rộng) x 29(cao) <br>
              Thiệp viết tay Morning Fruit <br>
              Hoa và đồ trang trí cho hộp quà <br>
              *Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>
            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 995.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Hộp quà Vali trái cây V003.webp') }}" alt="Hộp quà Vali trái cây V003">
        <h3 class="product-name">Hộp quà Vali trái cây V003</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Mận An Phước <br>
              Lê Hàn Quốc <br>
              Hồng giòn Fuji Đà Lạt <br>
              Mận đỏ Mỹ <br>
              Kiwi vàng New Zealand <br>
              Nho đen Mỹ <br>
              Nho xanh Mỹ <br>
              Combo túi và hộp quà vali mica <br>
              Hoa và phụ kiện trang trí cho hộp quà <br>
              Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>
            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 1.085.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Hộp quà Vali trái cây V004.webp') }}" alt="Hộp quà Vali trái cây V004">
        <h3 class="product-name">Hộp quà Vali trái cây V004</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Quýt Úc <br>
              Nho xanh Mỹ <br>
              Kiwi vàng New Zealand <br>
              Xoài cát chu da vàng <br>
              Táo Envy New Zealand size 100 <br>
              Combo túi và hộp quà vali mica <br>
              Hoa và phụ kiện trang trí cho hộp quà <br>
              Giá tiền trái cây có thể sẽ chênh lệch theo thời điểm <br>
              *Giá tiền chưa bao gồm phí VAT và phí vận chuyển <br>
              <br>
              Hướng dẫn bảo quản: Nên sử dụng ngay để đảm bảo độ tươi ngon của trái cây. Bảo quản hộp ở nơi thoáng mát.
              <br>
            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 995.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

    </div>

    <!-- nuoc ep trai cay -->
    <h2 id="nuoceptraicay" class="tieudesanpham">Nước ép trái cây</h2>
    <div class="products-container">


      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Nước ép bưởi.jpg') }}" alt="Nước ép bưởi">
        <h3 class="product-name">Nước ép bưởi</h3>
        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Nước ép của 2Tfresh Market luôn đạt bốn tiêu chí trước khi giao hàng: <br>
              1. 100% nguyên chất, không đường, không chất bảo quản <br>
              2. 100% tươi mới. Không ép sẵn, chỉ ép khi khách hàng lên đơn <br>
              3. Tuyển chọn từ những dòng trái cây tươi có chất lượng cao, đang được bán trực tiếp tại cửa hàng <br>
              4. Trọn dinh dưỡng, giữ tối đa dưỡng chất có trong trái vì sử dụng máy ép chậm hiện đại, tiên tiến <br>
            </p> --}}
          </div>
        </div>
        <div class="product-btn">
          <p class="price"> 85.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Nước ép cam sành Hiếu Liêm.jpg') }}" alt="Nước ép cam sành Hiếu Liêm">
        <h3 class="product-name">Nước ép cam sành Hiếu Liêm</h3>

        <div class="product-btn">
          <p class="price"> 65.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
        <br>

        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Nước ép của 2Tfresh Market luôn đạt bốn tiêu chí trước khi giao hàng: <br>
              1. 100% nguyên chất, không đường, không chất bảo quản <br>
              2. 100% tươi mới. Không ép sẵn, chỉ ép khi khách hàng lên đơn <br>
              3. Tuyển chọn từ những dòng trái cây tươi có chất lượng cao, đang được bán trực tiếp tại cửa hàng <br>
              4. Trọn dinh dưỡng, giữ tối đa dưỡng chất có trong trái vì sử dụng máy ép chậm hiện đại, tiên tiến <br>
            </p> --}}
          </div>
        </div>
        
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Nước ép cam sành hữu cơ Măng Đen.jpg') }}"
          alt="Nước ép cam sành hữu cơ Măng Đen">
        <h3 class="product-name">Nước ép cam sành hữu cơ Măng Đen</h3>

        <div class="product-btn">
          <p class="price"> 65.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
        <br>

        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Nước ép của 2Tfresh Market luôn đạt bốn tiêu chí trước khi giao hàng: <br>
              1. 100% nguyên chất, không đường, không chất bảo quản <br>
              2. 100% tươi mới. Không ép sẵn, chỉ ép khi khách hàng lên đơn <br>
              3. Tuyển chọn từ những dòng trái cây tươi có chất lượng cao, đang được bán trực tiếp tại cửa hàng <br>
              4. Trọn dinh dưỡng, giữ tối đa dưỡng chất có trong trái vì sử dụng máy ép chậm hiện đại, tiên tiến <br>
            </p> --}}
          </div>
        </div>
       
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Nước ép dưa hấu.jpg') }}" alt="Nước ép dưa hấu">
        <h3 class="product-name">Nước ép dưa hấu</h3>

        <div class="product-btn">
          <p class="price"> 35.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
        <br>

        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Nước ép của 2Tfresh Market luôn đạt bốn tiêu chí trước khi giao hàng: <br>
              1. 100% nguyên chất, không đường, không chất bảo quản <br>
              2. 100% tươi mới. Không ép sẵn, chỉ ép khi khách hàng lên đơn <br>
              3. Tuyển chọn từ những dòng trái cây tươi có chất lượng cao, đang được bán trực tiếp tại cửa hàng <br>
              4. Trọn dinh dưỡng, giữ tối đa dưỡng chất có trong trái vì sử dụng máy ép chậm hiện đại, tiên tiến <br>
            </p> --}}
          </div>
        </div>
       
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Nước ép dưa lưới Queen.jpg') }}" alt="Nước ép dưa lưới Queen">
        <h3 class="product-name">Nước ép dưa lưới Queen</h3>

        <div class="product-btn">
          <p class="price"> 35.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
        <br>

        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Nước ép của 2Tfresh Market luôn đạt bốn tiêu chí trước khi giao hàng: <br>
              1. 100% nguyên chất, không đường, không chất bảo quản <br>
              2. 100% tươi mới. Không ép sẵn, chỉ ép khi khách hàng lên đơn <br>
              3. Tuyển chọn từ những dòng trái cây tươi có chất lượng cao, đang được bán trực tiếp tại cửa hàng <br>
              4. Trọn dinh dưỡng, giữ tối đa dưỡng chất có trong trái vì sử dụng máy ép chậm hiện đại, tiên tiến <br>
            </p> --}}
          </div>
        </div>
        
      </div>

      <div class="product-item">
        <img class="product-img" src="{{ asset('main_home/img/Nước ép khóm.jpg') }}" alt="Nước ép khóm">
        <h3 class="product-name">Nước ép khóm</h3>

        <div class="product-btn">
          <p class="price"> 38.000 VNĐ</p>
          <button class="buy-btn">Thêm vào giỏ hàng</button>
        </div>
        <br>

        <div class="hidden-info">
          <div class="product-info">
            <div class="title-info">Mô tả sản phẩm</div>
            {{-- <p>
              Nước ép của 2Tfresh Market luôn đạt bốn tiêu chí trước khi giao hàng: <br>
              1. 100% nguyên chất, không đường, không chất bảo quản <br>
              2. 100% tươi mới. Không ép sẵn, chỉ ép khi khách hàng lên đơn <br>
              3. Tuyển chọn từ những dòng trái cây tươi có chất lượng cao, đang được bán trực tiếp tại cửa hàng <br>
              4. Trọn dinh dưỡng, giữ tối đa dưỡng chất có trong trái vì sử dụng máy ép chậm hiện đại, tiên tiến <br>
            </p> --}}
          </div>
        </div>
        
      </div>


    </div>

  </section>

  <!-- Section: About -->
  <!-- <section id="about" class="about"> -->
  <!-- </section> -->

  <!-- Section: Contact -->
  <section id="contact" class="contact">
    <h2>Liên hệ</h2>
    <main>
      <h2>Thông Tin Liên Hệ</h2>
      <br>
      <!-- Email -->
      <div class="icon">
        <img class="icon_contact" src="{{ asset('main_home/IMG/icon/email_icon.webp') }}" alt="">
        <p>Email: <a href="mailto: 23661113@kthcm.edu.vn "> 23661113@kthcm.edu.vn</a> <br>
          Email: <a href="mailto: 23661106@kthcm.edu.vn "> 23661106@kthcm.edu.vn </a>
        </p>
      </div>
      <!-- Facebook -->
      <div class="icon">
        <img class="icon_contact" src="{{ asset('main_home/IMG/icon/facebook_icon.webp') }}">
        <p>Facebook: <a href="https://www.facebook.com/">https://www.facebook.com/</a> </p>
      </div>
      <!-- Instagram -->
      <div class="icon">
        <img class="icon_contact" src="{{ asset('main_home/IMG/icon/instagram_icon.webp') }}">
        <p>Instagram: <a href="https://www.instagram.com/">https://www.instagram.com/</a></p>
      </div>

      <!-- Zalo/Viber -->
      <div class="icon">
        <img class="icon_contact" src="{{ asset('main_home/IMG/icon/zalo_icon.webp') }}">
        <p>Zalo <a href="tel:+84789475138">0789475138</a> <br>
          Zalo <a href="tel:+84949642295">094 964 2295</a>
        </p>
      </div>

      <!-- Phonecall -->
      <div class="icon">
        <img class="icon_contact" src="{{ asset('main_home/IMG/icon/phonecall_icon.webp') }}">
        <p>Số điện thoại liên hệ: <a href="tel:+84789475138">078 947 5138</a> <br>
          Số điện thoại liên hệ: <a href="tel:+84949642295">094 964 2295</a>
        </p>

      </div>


      <!-- Location/Address -->
      <div class="icon">
        <img class="icon_contact" src="{{ asset('main_home/IMG/icon/Location_icon.webp') }}">
        <p>Địa chỉ của chúng tôi: <a
            href="https://www.google.com/maps?q=504/106,+Kinh+Dương+Vương,+Bình+Trị+Đông+B,+Bình+Tân,+TP.HCM"
            target="_blank">33 Đ. Vĩnh Viễn, Phường 02, Quận 10, Hồ Chí Minh, Việt Nam</a></p>
      </div>
      <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.605252164119!2d106.67075587369577!3d10.764875359409466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee10bef3c07%3A0xfd59127e8c2a3e0!2zVHLGsOG7nW5nIENhbyDEkeG6s25nIEtpbmggdOG6vyBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmg!5e0!3m2!1svi!2s!4v1733668330161!5m2!1svi!2s"
        width="400" height="350" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>

    </main>

  </section>


  <!-- Các section khác (home, products, etc.) -->
  <script src="{{ asset('main_home/js/recoveryAuth.js') }}"></script>
  <script src="{{ asset('main_home/js/script.js') }}"></script>
  <!-- Bootstrap JS and dependencies -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

@include('template/footer')
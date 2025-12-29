@include('template/header')
   <div class="row">
      <h1>Giỏ hàng</h1>
      <form action="cap-nhat-gio-hang" method="post" enctype='multipart/form-data'>
       @csrf
         <table class="table table-striped">
         <tr>
            <td>Tên</td>
            <td>Giá</td>
            <td>Ảnh</td>
            <td>Số lượng</td>
            <td>Thành tiền</td>
            <td>Xóa</td>
         </tr>
       <?php
         if (!session()->has('cart.products')) {
            echo "<tr><td colspan='6'>Không có sản phẩm nào trong giỏ hàng</td></tr>";
        }else{
            //print_r(session()->get('cart.products'));die();
            $arr=session()->get('cart.products');
            $total=0;
         for ($i=0;$i< count($arr);$i++ ){
            $tien=$arr[$i]['item']*$arr[$i]['price'];
            $total+=$tien;
         ?>
         <tr>
            <td>{{ $arr[$i]['name']}}</td>
            <td>{{ number_format($arr[$i]['price'],0)}}</td>
            <td><img src="{{ asset($arr[$i]['img']) }}" width='100'></td>
            <td><input type="number" value="{{$arr[$i]['item']}}" name="qty[{{$arr[$i]['id']}}]" min="1" max="99"></td>
            <td>{{ number_format($tien,0)}}</td>
            <td><a href="/xoa-gio-hang/{{ $arr[$i]['id'] }}"><img src="{{ asset('img/delete.png') }}" width='30'></a></td>
         </tr>
         <?php
         }
         echo"
         <tr>
            <td colspan='3'></td><td colspan='2'><b>Thành tiền: ".number_format($total,0)."</b></td>
         </tr>";
         }
        ?>
        <tr>
            <td colspan="3" align="right"><input type="submit" value="Cập nhật" class="btn btn-primary"></td>
            <td colspan="2"><a href="thanh-toan" class="btn btn-primary">Thanh toán</a></td>
         </tr>
      </table>
      </form>
   </div>
@include('template/footer')

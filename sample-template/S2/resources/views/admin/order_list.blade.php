@include('admin/template/header')
   <div class="row">
      <table class="table table-striped">
         <tr class="table-primary"><td colspan='6'>Danh sách đơn hàng</td></tr>
         <tr >
            <td>Mã đơn hàng</td>
            <td>Ngày đặt</td>
            <td>Tên khách hàng</td>
            <td>Tổng tiền</td>
            <td>Trạng thái</td>
            <td></td>
            <td></td>
         </tr>
         @foreach ($orders as $order)
         <tr>
            <td>{{ $order->order_id}}</td>
            <td>{{ $order->order_date}}</td>
            <td>{{ $order->user_fullname }}</td>
            <td>{{ $order->total_sales }}</td>
            <td>
               <?php
                  if($order->order_status==1)
                     echo"Mới đặt hàng";
                  else if($order->order_status==2)
                     echo"Đã xác nhận";
                  elseif($order->order_status==3)
                     echo"Đang giao hàng";
                  elseif($order->order_status==4)
                     echo"Hoàn tất";
                  elseif($order->order_status==0)
                  echo"Đã hủy";
                  else
                     echo"Không hợp lệ";
               ?>
            </td>
            <td><a href="thong-tin-don-hang/{{ $order->order_id}}"><img src="{{ asset('admin/img/edit.png') }}" width='40'></a></td>
            <td><a href="xoa-don-hang/{{ $order->order_id}}"><img src="{{ asset('admin/img/delete.png') }}" width='40'></a></td>
         </tr>
         @endforeach
      </table>
   </div>
@include('admin/template/footer')

@extends('admin.admin_template')
@section('styles')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/admin/index.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
@endsection
@section('plugins')
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.0.1/dist/sweetalert2.all.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="/js/admin/order/order_index.js"></script>
@endsection
@section('content')
    <div class="table-responsive">
        <table id="orderTable" class="table table-light table-bordered" style="width:100%">
            <thead>
            <tr>
                <th></th>
                <th>Mã đơn</th>
                <th>Tên khách hàng</th>
                <th class="d-none">Email khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ</th>
                <th>Cách thanh toán</th>
                <th>Tổng tiền</th>
                <th class="d-none">Ghi chú</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
                <th class="d-none">Danh sách sản phẩm</th>
                <th class="d-none">Ngày tạo đơn</th>
                <th class="d-none">Ngày cập nhật trạng thái</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)

                <tr>
                    <td></td>
                    {{--<td style="display: none;">{{$order->id}}</td>--}}
                    <td>{{$order->code}}</td>
                    <td>{{$order->customer_name}}</td>
                    <td class="d-none">{{$order->customer_email}}</td>
                    <td>{{$order->customer_phone}}</td>
                    <td>{{$order->customer_address.', '.$order->customer_district.', '.$order->customer_city}}</td>
                    <td>{{$order->payment_method==0 ? 'Tại Nhà' : 'Tại Cửa Hàng'}}</td>
                    <td>{{preg_replace('/\B(?=(\d{3})+(?!\d))/', ',', (string)$order->price).' đ'}}</td>
                    <td class="d-none">{{$order->notes}}</td>
                    <td class="status">{!!$order->status==0 ? '<span class="badge badge-warning">Chưa Xong</span>' :
                    '<span
                    class="badge
                    badge-success">Đã Xong</span>'!!}</td>
                    <td class="d-flex">
                        <button data-id="{{$order->id}}" class="btn changeStatus">Chuyển trạng thái đơn</button>
                    </td>
                    <td class="d-none">
                        <table class="innerBorder">
                            <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Giá (tại thời điểm order)</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order->order_product as $product_order)
                                <tr>
                                    <td><a href="/san-pham/{{$product_order->product->url}}" target="_blank">{{$product_order->product->name
                                    }}</a></td>
                                    <td>{{$product_order->amounts}}</td>
                                    <td>{{preg_replace('/\B(?=(\d{3})+(?!\d))/', ',', (string)$product_order->price)}}đ
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="2" align="right">Tổng tiền:</td>
                                <td>
                                    @foreach($order->order_product as $product_order)
                                        @if (!($loop->first))
                                            +
                                        @endif
                                        {{preg_replace('/\B(?=(\d{3})+(?!\d))/', ',', (string)$product_order->price)}}đ x {{$product_order->amounts}}
                                    @endforeach
                                    = {{preg_replace('/\B(?=(\d{3})+(?!\d))/', ',', (string)$order->price).' đ'}}
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                    </td>
                    <td class="d-none">{{$order->created_at->format('H:i:s d/m/Y')}}</td>
                    <td class="d-none">{{$order->updated_at->format('H:i:s d/m/Y')}}</td>
                </tr>
            @endforeach
            </tbody>
            {{--<tfoot>--}}
            {{--<tr>--}}
            {{--<th>Name</th>--}}
            {{--<th>Position</th>--}}
            {{--<th>Office</th>--}}
            {{--<th>Age</th>--}}
            {{--<th>Start date</th>--}}
            {{--<th>Salary</th>--}}
            {{--</tr>--}}
            {{--</tfoot>--}}
        </table>
    </div>
@endsection
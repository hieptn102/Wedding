@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Phê duyệt hóa đơn</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            @php
                $payment = App\Models\Payment::where('invoice_id', $invoice->id)->first();
            @endphp
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Invoice No: #{{ $invoice->invoice_no }} - {{ date('d-m-Y', strtotime($invoice->date)) }}
                            </h4>
                            <a href="{{ route('invoice.pending.list') }}"
                                class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i
                                    class="fa fa-list"> Danh sách hóa đơn đang chờ xử lý </i></a> <br> <br>
                            <table class="table table-dark" width="100%">
                                <tbody>
                                    <tr>
                                        <td>
                                            <p> Thông tin khách hàng </p>
                                        </td>
                                        <td>
                                            <p> Tên: <strong> {{ $payment['customer']['name'] }} </strong> </p>
                                        </td>
                                        <td>
                                            <p> Số điện thoại: <strong> {{ $payment['customer']['mobile_no'] }} </strong> </p>
                                        </td>
                                        <td>
                                            <p> Email: <strong> {{ $payment['customer']['email'] }} </strong> </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td colspan="3">
                                            <p> Mô tả : <strong> {{ $invoice->description }} </strong> </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <form method="post" action="{{ route('approval.store', $invoice->id) }}">
                                @csrf
                                <table border="1" class="table table-dark" width="100%">
                                    <thead>
                                        <tr>
                                            <th class="text-center">STT</th>
                                            <th class="text-center">Danh mục</th>
                                            <th class="text-center">Tên sản phẩm</th>
                                            <th class="text-center" style="background-color: #8B008B">Tồn kho hiện tại</th>
                                            <th class="text-center">Số lượng</th>
                                            <th class="text-center">Đơn giá </th>
                                            <th class="text-center">Tổng giá</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total_sum = '0';
                                        @endphp
                                        @foreach ($invoice['invoice_details'] as $key => $details)
                                            <tr>
                                                <input type="hidden" name="category_id[]"
                                                    value="{{ $details->category_id }}">
                                                <input type="hidden" name="product_id[]"
                                                    value="{{ $details->product_id }}">
                                                <input type="hidden" name="selling_qty[{{ $details->id }}]"
                                                    value="{{ $details->selling_qty }}">
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                <td class="text-center">{{ $details['category']['name'] }}</td>
                                                <td class="text-center">{{ $details['product']['name'] }}</td>
                                                <td class="text-center" style="background-color: #8B008B">
                                                    {{ $details['product']['quantity'] }}</td>
                                                <td class="text-center">{{ $details->selling_qty }}</td>
                                                <td class="text-center">{{ $details->unit_price }}</td>
                                                <td class="text-center">{{ $details->selling_price }}</td>
                                            </tr>
                                            @php
                                                $total_sum += $details->selling_price;
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td colspan="6"> Tổng tiền </td>
                                            <td> {{ $total_sum }} </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"> Chiết khấu </td>
                                            <td> {{ $payment->discount_amount }} </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"> Tiền thanh toán </td>
                                            <td>{{ $payment->paid_amount }} </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"> Số tiền nợ</td>
                                            <td> {{ $payment->due_amount }} </td>
                                        </tr>
                                        <tr>
                                            <td colspan="6"> Thành tiền </td>
                                            <td>{{ $payment->total_amount }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-info">Phê duyệt hóa đơn</button>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection

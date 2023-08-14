@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Báo cáo hóa đơn</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);"> </a></li>
                                <li class="breadcrumb-item active">Báo cáo hóa đơn</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="invoice-title">
                                        <h3>
                                            <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo"
                                                height="24" /> WhiteShop
                                        </h3>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-6 mt-4">
                                            <address>
                                                <strong>WhiteShop Mall:</strong><br>
                                               Mễ Trì, Hà Nội<br>
                                                support@youngboycodon.com
                                            </address>
                                        </div>
                                        <div class="col-6 mt-4 text-end">
                                            <address>
                                            </address>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                            <h3 class="font-size-16"><strong>Báo cáo hóa đơn
                                                    <span class="btn btn-info"> {{ date('d-m-Y', strtotime($start_date)) }}
                                                    </span> -
                                                    <span class="btn btn-success"> {{ date('d-m-Y', strtotime($end_date)) }}
                                                    </span>
                                                </strong></h3>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                            <div class="row">
                                <div class="col-12">
                                    <div>
                                        <div class="p-2">
                                        </div>
                                        <div class="">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>STT</strong></td>
                                                            <td class="text-center"><strong>Tên khách hàng</strong></td>
                                                            <td class="text-center"><strong>Mã hóa đơn</strong>
                                                            </td>
                                                            <td class="text-center"><strong>Ngày</strong>
                                                            </td>
                                                            <td class="text-center"><strong>Mô tả</strong>
                                                            </td>
                                                            <td class="text-center"><strong>Tổng </strong>
                                                            </td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                        @php
                                                            $total_sum = '0';
                                                        @endphp
                                                        @foreach ($allData as $key => $item)
                                                            <tr>
                                                                <td class="text-center">{{ $key + 1 }}</td>
                                                                <td class="text-center">
                                                                    {{ $item['payment']['customer']['name'] }}</td>
                                                                <td class="text-center">#{{ $item->invoice_no }}</td>
                                                                <td class="text-center">
                                                                    {{ date('d-m-Y', strtotime($item->date)) }}</td>
                                                                <td class="text-center">{{ $item->description }}</td>
                                                                <td class="text-center">
                                                                    {{ $item['payment']['total_amount'] }}</td>
                                                            </tr>
                                                            @php
                                                                $total_sum += $item['payment']['total_amount'];
                                                            @endphp
                                                        @endforeach
                                                        <tr>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line"></td>
                                                            <td class="no-line text-center">
                                                                <strong>Tổng tiền</strong>
                                                            </td>
                                                            <td class="no-line text-end">
                                                                <h4 class="m-0">${{ $total_sum }}</h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="d-print-none">
                                                <div class="float-end">
                                                    <a href="javascript:window.print()"
                                                        class="btn btn-success waves-effect waves-light"><i
                                                            class="fa fa-print"></i></a>
                                                    <a href="#"
                                                        class="btn btn-primary waves-effect waves-light ms-2">Tải về</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div> <!-- container-fluid -->
    </div>
@endsection

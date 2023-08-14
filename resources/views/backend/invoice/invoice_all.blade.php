@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Danh sách hóa đơn</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('invoice.add') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle">Thêm hóa đơn</i></a> <br>  <br> 
                            <h4 class="card-title">Danh sách hóa đơn </h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Mã Hóa Đơn</th>
                                        <th>Ngày </th>
                                        <th>Mô Tả</th>
                                        <th>Tổng tiền</th>
                                </thead>
                                <tbody>
                                    @foreach ($allData as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item['payment']['customer']['name'] }} </td> 
                                            <td> {{ $item->invoice_no }} </td>
                                            <td> {{ date('d-m-Y', strtotime($item->date)) }} </td>
                                            <td> {{ $item->description }} </td>
                                            <td>  ${{ $item['payment']['total_amount'] }} </td>
                                            {{-- <td>
                                                <a href="{{ route('invoice.delete', $item->id) }}" class="btn btn-danger sm"
                                                    title="Delete Data" id="delete"> <i class="fas fa-trash-alt"></i>
                                                </a>
                                            </td> --}}
                                        </tr>   
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="align-content:">
                                {{ $allData->links(); }}
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection

@extends('admin.admin_master')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Event</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Event</h4>
                            <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Lễ Chính | Từ giờ</th>
                                        <th>Đến giờ</th>
                                        <th>Thứ, ngày</th>
                                        <th>Tháng, năm</th>
                                        <br>
                                        <th>Tiệc cưới | Từ giờ</th>
                                        <th>Đến giờ</th>
                                        <th>Thứ, ngày</th>
                                        <th>Tháng, năm</th>
                                        <br>
                                        <th>Background</th>
                                        <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($event as $key => $item)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $item->main_start_time }} </td>
                                            <td> {{ $item->main_end_time }} </td>
                                            <td> {{ $item->main_day_date }} </td>
                                            <td> {{ $item->main_month_year }} </td>
                                            <td> {{ $item->party_start_time }} </td>
                                            <td> {{ $item->party_end_time }} </td>
                                            <td> {{ $item->party_day_date }} </td>
                                            <td> {{ $item->party_month_year }} </td>
                                            <td> <img src="{{ asset($item->backgroud) }}"
                                                    style="width:60px; height:40px"> </td>
                                            <td>
                                                <a href="{{ route('event.edit',$item->id) }}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- container-fluid -->
    </div>
@endsection

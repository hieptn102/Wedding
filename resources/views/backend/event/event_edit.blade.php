@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Event Update</h4><br><br>
                            <form method="post" action="{{ route('event.update') }}" id="myForm"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $event->id }}">
                                <h5>Lễ Chính</h5>
                                <hr>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Từ giờ</label>
                                    <div class="form-group col-sm-10">
                                        <input name="main_start_time" value="{{ $event->main_start_time }}" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Đến giờ</label>
                                    <div class="form-group col-sm-10">
                                        <input name="main_end_time" value="{{ $event->main_end_time }}" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Thứ Ngày</label>
                                    <div class="form-group col-sm-10">
                                        <input name="main_day_date" value="{{ $event->main_day_date }}" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tháng Năm</label>
                                    <div class="form-group col-sm-10">
                                        <input name="main_month_year" value="{{ $event->main_month_year }}" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Mô tả</label>
                                    <div class="form-group col-sm-10">
                                        <input name="main_des" value="{{ $event->main_des }}" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <h5>Tiệc cưới</h5>
                                <hr>
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Từ giờ</label>
                                    <div class="form-group col-sm-10">
                                        <input name="party_start_time" value="{{ $event->party_start_time }}" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Đến giờ</label>
                                    <div class="form-group col-sm-10">
                                        <input name="party_end_time" value="{{ $event->party_end_time }}" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Thứ Ngày</label>
                                    <div class="form-group col-sm-10">
                                        <input name="party_day_date" value="{{ $event->party_day_date }}" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tháng Năm</label>
                                    <div class="form-group col-sm-10">
                                        <input name="party_month_year" value="{{ $event->party_month_year }}" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Mô tả</label>
                                    <div class="form-group col-sm-10">
                                        <input name="party_des" value="{{ $event->party_des }}" class="form-control"
                                            type="text">
                                    </div>
                                </div>
                                <hr>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Background</label>
                                    <div class="form-group col-sm-10">
                                        <input name="backgroud" class="form-control" type="file" id="image">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg"
                                            src="{{ asset($event->backgroud) }}" alt="Card image cap">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Cập nhật thông tin">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    main_start_time: {
                        required: true,
                    },
                    main_end_time: {
                        required: true,
                    }
                    main_day_date: {
                        required: true,
                    },
                    main_month_year: {
                        required: true,
                    }
                    main_des: {
                        required: true,
                    },
                    party_start_time: {
                        required: true,
                    },
                    party_end_time: {
                        required: true,
                    }
                    party_day_date: {
                        required: true,
                    },
                    party_month_year: {
                        required: true,
                    }
                    party_des: {
                        required: true,
                    },
                },
                messages: {
                    main_start_time: {
                        required: 'Vui lòng nhập thông tin!',
                    },
                    main_end_time: {
                        required: 'Vui lòng nhập thông tin!',
                    }
                    main_day_date: {
                        required: 'Vui lòng nhập thông tin!',
                    },
                    main_month_year: {
                        required: 'Vui lòng nhập thông tin!',
                    }
                    main_des: {
                        required: 'Vui lòng nhập thông tin!',
                    },
                    party_start_time: {
                        required: 'Vui lòng nhập thông tin!',
                    },
                    party_end_time: {
                        required: 'Vui lòng nhập thông tin!',
                    }
                    party_day_date: {
                        required: 'Vui lòng nhập thông tin!',
                    },
                    party_month_year: {
                        required: 'Vui lòng nhập thông tin!',
                    }
                    party_des: {
                        required: 'Vui lòng nhập thông tin!',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection

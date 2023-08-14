@extends('admin.admin_master')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Thêm mới mô tả </h4><br><br>
                            <form method="post" action="{{ route('des.store') }}" id="myForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Thời gian mời</label>
                                    <div class="form-group col-sm-10">
                                        <input name="time" class="form-control" type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tên tân lang</label>
                                    <div class="form-group col-sm-10">
                                        <input name="name_male" class="form-control" type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Mô tả</label>
                                    <div class="form-group col-sm-10">
                                        <input name="male_des" class="form-control" type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                    <div class="form-group col-sm-10">
                                        <input name="male_image" class="form-control" type="file" id="image">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tên tân nương</label>
                                    <div class="form-group col-sm-10">
                                        <input name="name_female" class="form-control" type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Mô tả</label>
                                    <div class="form-group col-sm-10">
                                        <input name="female_des" class="form-control" type="text">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                    <div class="form-group col-sm-10">
                                        <input name="female_image" class="form-control" type="file" id="image1">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label"> </label>
                                    <div class="col-sm-10">
                                        <img id="showImage1" class="rounded avatar-lg" src="{{ url('upload/no_image.jpg') }}"
                                            alt="Card image cap">
                                    </div>
                                </div>
                                <!-- end row -->
                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Thêm thông tin">
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
                    time: {
                        required: true,
                    },
                    name_male: {
                        required: true,
                    },
                    male_des: {
                        required: true,
                    },
                    male_image: {
                        required: true,
                    },
                    name_female: {
                        required: true,
                    },
                    female_des: {
                        required: true,
                    },
                    female_image: {
                        required: true,
                    },
                },
                messages: {
                    time: {
                        required: 'Vui lòng nhập thời gian',
                    },
                    name_male: {
                        required: 'Vui lòng nhập tên tân lang',
                    },
                    male_des: {
                        required: 'Vui lòng nhập mô tả tân lang',
                    },
                    male_image: {
                        required: 'Chọn ảnh tân lang',
                    },
                    name_female: {
                        required: 'Vui lòng nhập tên tân nương',
                    },
                    female_des: {
                        required: 'Vui lòng nhập mô tả tân nương',
                    },
                    female_image: {
                        required: 'Chọn ảnh tân nương',
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
     <script type="text/javascript">
        $(document).ready(function() {
            $('#image1').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage1').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection

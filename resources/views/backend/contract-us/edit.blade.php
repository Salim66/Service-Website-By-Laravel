@extends('admin.admin_master')

@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
            <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Contract Us Edit</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                <div class="col">
                    <form method="POST" action="{{ route('contractUs.update', $data->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                        <div class="col-12">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Address <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="address" class="form-control" value="{{ $data->address }}">
                                        </div>
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>General Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="general_email" class="form-control" value="{{ $data->general_email }}">
                                        </div>
                                        @error('general_email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Genereal Phone <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="general_phone" class="form-control" value="{{ $data->general_phone }}"> </div>
                                        @error('general_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Business Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="business_email" class="form-control" value="{{ $data->business_email }}">
                                        </div>
                                        @error('business_email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Business Phone <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="business_phone" class="form-control" value="{{ $data->business_phone }}"> </div>
                                        @error('business_phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Google Embad Map Link <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="google_map_link" class="form-control" value="{{ $data->google_map_link }}">
                                        </div>
                                        @error('google_map_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="text-xs-right">
                            <button type="submit" class="btn btn-rounded btn-info">Update</button>
                        </div>
                    </form>

                </div>
                <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
            <!-- /.box -->

    </section>
           <!-- /.content -->
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#image').change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection

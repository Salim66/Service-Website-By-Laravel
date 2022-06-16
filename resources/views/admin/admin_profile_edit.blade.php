@extends('admin.admin_master')

@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
            <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Profile Edit</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                <div class="col">
                    <form novalidate>
                        <div class="row">
                        <div class="col-12">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Name <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Email <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="email" name="email" class="form-control" value="{{ $data->email }}"> </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Image <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="profile_photo_path" class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ ($data->profile_photo_path)? URL::to('upload/admin_images/'. $data->profile_photo_path) : URL::to('upload/no_image.jpg')  }}" alt="" style="width: 100px; height: 100px;">
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
@endsection

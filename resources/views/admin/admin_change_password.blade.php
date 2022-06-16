@extends('admin.admin_master')

@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
            <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Change Password</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                <div class="col">
                    <form method="POST" action="{{ route('admin.update.password') }}">
                        @csrf
                        <div class="row">
                        <div class="col-12">

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <h5>Current Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="old_password" class="form-control" id="current_password" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>New Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="password" class="form-control" id="password" >
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <h5>Confirm Password <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" >
                                        </div>
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

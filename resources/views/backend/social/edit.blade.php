@extends('admin.admin_master')

@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
            <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">Social Link Edit</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                <div class="col">
                    <form method="POST" action="{{ route('social.update', $data->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="row">
                        <div class="col-12">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Facebook Link <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="facebook" class="form-control" value="{{ $data->facebook }}">
                                        </div>
                                        @error('facebook')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Twitter Link <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="twitter" class="form-control" value="{{ $data->twitter }}">
                                        </div>
                                        @error('twitter')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>skype Link <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="skype" class="form-control" value="{{ $data->skype }}">
                                        </div>
                                        @error('skype')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <h5>Linkedin Link <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="linkedin" class="form-control" value="{{ $data->linkedin }}">
                                        </div>
                                        @error('linkedin')
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

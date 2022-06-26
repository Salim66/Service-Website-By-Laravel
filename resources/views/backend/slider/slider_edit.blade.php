@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- Edit Slider Page  -->
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Slider</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('slider.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <input type="hidden" name="old_image" value="{{ $data->slider_img }}">

                            <div class="form-group">
                                <h5>Slider Title <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="slider_title" class="form-control" value="{{ $data->slider_title }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Slider Description <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="slider_descp" id="textarea" class="form-control" required>{{ $data->slider_descp }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Slider Image <span class="text-danger">*(1920x850)</span></h5>
                                <div class="controls">
                                    <input type="file" name="slider_img" class="form-control" id="slider_image">
                                    @error('slider_img')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    <img src="{{ URL::to($data->slider_img) }}" alt="" id="slider_image_preview" class="slider_edit_img">
                                </div>
                            </div>
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update">
                           </div>
                        </form>
                   </div>
               </div>
               <!-- /.box-body -->
             </div>
           </div>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
@endsection

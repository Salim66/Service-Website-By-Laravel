@extends('admin.admin_master')

@section('admin')
    <div class="container-full">
        <!-- Main content -->
        <section class="content">
          <div class="row">

            <!-- Edit Contact Info Page  -->
            <div class="col-12">

                <div class="box">
                   <div class="box-header with-border">
                     <h3 class="box-title">Edit GRI Certified Training Partner</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                            <form action="{{ route('certified.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <input type="hidden" name="old_image" value="{{ $data->image }}">

                                <div class="form-group">
                                    <h5>Certified Title <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="title" class="form-control" value="{{ $data->title }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Certified Description <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="description" id="editor1" class="form-control" required>{{ $data->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Certified Image <span class="text-danger">*(1170x420)</span></h5>
                                    <div class="controls">
                                        <input type="file" name="image" class="form-control" id="about_image">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div>
                                        <img src="{{ URL::to($data->image) }}" alt="" id="about_image_preview" class="about_edit_img">
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

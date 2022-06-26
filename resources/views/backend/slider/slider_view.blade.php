@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-8">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Slider List <span class="badge badge-pill badge-danger"> {{ count($sliders) }} </span> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Slider Img</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sliders as $data)
                        <tr>
                            <td>
                                <img class="brand__img-table" src="{{ URL::to($data->slider_img) }}" alt="">
                            </td>
                            <td>
                                {{ $data->slider_title }}
                            </td>
                            <td>
                                {{ $data->slider_descp }}
                            </td>
                            <td width="30%">
                                <a title="Edit Data" href="{{ route('slider.edit', $data->id) }}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                                <a title="Delete Data" href="{{ route('slider.delete', $data->id) }}" id="delete" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                  </table>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <!-- /.col -->

        <!-- Add Slider Page  -->
        <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Slider</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <h5>Slider Title<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="slider_title" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <h5>Slider Description<span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <textarea name="slider_descp" id="textarea" class="form-control" required></textarea>
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
                                    <img src="" alt="" id="slider_image_preview">
                                </div>
                            </div>
                           <div class="text-xs-right">
                               <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add New">
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

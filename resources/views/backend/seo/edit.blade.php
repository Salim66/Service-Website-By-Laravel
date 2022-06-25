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
                     <h3 class="box-title">Edit SEO</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body">
                       <div class="table-responsive">
                            <form action="{{ route('seo.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <h5>Meta Title <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="text" name="meta_title" class="form-control" value="{{ $data->meta_title }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Meta Author <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="text" name="meta_author" class="form-control" value="{{ $data->meta_author }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <h5>Meta Keyword <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <input type="text" name="meta_keyword" class="form-control" value="{{ $data->meta_keyword }}">
                                    </div>
                                </div>

                                <div class="row"> <!-- start 8th row -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Meta Description <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <textarea name="meta_description" class="form-control">{{ $data->meta_description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Google Analytics <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <textarea name="google_analytics" class="form-control">{{ $data->google_analytics }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Footer Title <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <input type="text" name="footer_title" class="form-control" value="{{ $data->footer_title }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Footer Description <span class="text-danger"></span></h5>
                                            <div class="controls">
                                                <textarea name="footer_description" class="form-control">{{ $data->footer_description }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end 8th row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Logo <span class="text-danger">*</span><small>(Size 200x90)</small></h5>
                                            <div class="controls">
                                                <input type="file" name="logo" class="form-control" id="logo_image_load">
                                                @error('logo')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <img src="{{ URL::to($data->logo) }}" class="logo_image_preview" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h5>Favicon <span class="text-danger">*</span><small>(Size 25x25)</small></h5>
                                            <div class="controls">
                                                <input type="file" name="favicon" class="form-control" id="favicon_image_load">
                                                @error('favicon')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <img src="{{ URL::to($data->favicon) }}" class="favicon_image_preview" alt="">
                                        </div>
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

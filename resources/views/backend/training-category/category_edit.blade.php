@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <!-- Edit Category Page  -->
        <div class="col-12">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Edit Training Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('training.category.update', $data->id) }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $data->id }}">

                            <div class="form-group">
                                <h5>Cateogry Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="training_category_name" class="form-control" value="{{ $data->training_category_name }}">
                                    @error('training_category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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

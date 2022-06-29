@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-8">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Training Category List <span class="badge badge-pill badge-danger"> {{ count($categories) }} </span></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $data)
                        <tr>
                            <td>{{ $data->training_category_name }}</td>
                            <td width="30%">
                                <a title="Edit Data" href="{{ route('training.category.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <a title="Delete Data" href="{{ route('training.category.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

        <!-- Add Category Page  -->
        <div class="col-4">

            <div class="box">
               <div class="box-header with-border">
                 <h3 class="box-title">Add Training Category</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('training.category.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <h5>Cateogry Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="training_category_name" class="form-control">
                                    @error('training_category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
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

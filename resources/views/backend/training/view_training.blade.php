@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Training List <span class="badge badge-pill badge-danger"> {{ count($trainines) }} </span> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Training Image</th>
                            <th>Training Title</th>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($trainines as $data)
                        <tr>
                            <td>
                                <img src="{{ URL::to($data->image) }}" class="backend_table_product-img" alt="">
                            </td>
                            <td>{{ $data->title }}</td>
                            <td>{{ $data->trainingCategory->training_category_name }} </td>
                            <td>{{ @$data->trainingSubCategory->training_subcategory_name }}</td>
                            <td>{{ @$data->date }}</td>
                            <td width="15%">
                                <a title="Edit Data" href="{{ route('training.edit', $data->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                                <a title="Delete Data" href="{{ route('training.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

      <!-- /.row -->
    </section>
    <!-- /.content -->

</div>
@endsection

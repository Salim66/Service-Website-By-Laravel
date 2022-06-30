@extends('admin.admin_master')

@section('admin')
<div class="container-full">
    <!-- Main content -->
    <section class="content">
      <div class="row">


        <div class="col-12">

         <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Customer List <span class="badge badge-pill badge-danger"> {{ count($users) }} </span> </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Company Name</th>
                            <th>Official Email</th>
                            <th>Personal Email</th>
                            <th>Number</th>
                            <th>Date of Birth</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $data)
                        <tr>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->position }} </td>
                            <td>{{ $data->company_name }}</td>
                            <td>{{ $data->official_email }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->number }}</td>
                            <td>{{ $data->date_of_birth }}</td>
                            <td width="15%">
                                <a title="Delete Data" href="{{ route('customer.delete', $data->id) }}" id="delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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

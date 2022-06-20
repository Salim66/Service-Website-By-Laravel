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
                 <h3 class="box-title">Edit SubCategory</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <div class="table-responsive">
                        <form action="{{ route('subcategory.update', $data->id) }}" method="POST">
                            @csrf

                            <input type="hidden" name="id" value="{{ $data->id }}">

                            <div class="form-group">
								<h5>Category Select <span class="text-danger">*</span></h5>
								<div class="controls">
									<select name="category_id" id="select" class="form-control">
										<option value="" selected disabled>Select Category</option>
                                        @foreach($categories as $category)
										<option value="{{ $category->id }}" {{ ($category->id === $data->category_id)? 'selected' : '' }}>{{ $category->category_name }}</option>
                                        @endforeach
									</select>
                                    @error('category_id')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
								</div>
							</div>
                            <div class="form-group">
                                <h5>SubCateogry Name <span class="text-danger">*</span></h5>
                                <div class="controls">
                                    <input type="text" name="subcategory_name" class="form-control" value="{{ $data->subcategory_name }}">
                                    @error('subcategory_name')
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

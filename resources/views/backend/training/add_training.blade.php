@extends('admin.admin_master')

@section('admin')
<div class="container-full">

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Add Training</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('training.store') }}" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-12">

                        <div class="row"> <!-- start 1st row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Category Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="training_category_id" id="select" class="form-control" required>
                                            <option value="" selected disabled>Select Category</option>
                                            @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->training_category_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('training_category_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>SubCategory Select <span class="text-danger"></span></h5>
                                    <div class="controls">
                                        <select name="training_subcategory_id" id="select" class="form-control">
                                            <option value="" selected disabled>Select SubCategory</option>

                                        </select>
                                        @error('training_subcategory_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end 1st row -->

                        <div class="row"> <!-- start 2nd row -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Training Title <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="title" class="form-control" required>
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <h5>Training Image <span class="text-danger">( Image size 770x416  )*</span></h5>
                                    <div class="controls">
                                        <input type="file" name="image" class="form-control" onchange="mainThamUrl(this)" required />
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <img src="" id="mainThmb" alt="">
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end 2nd row -->


                        <div class="row"> <!-- start 7th row -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5>Training Description <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="description" id="editor1" class="form-control" placeholder="Description" required></textarea>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end 7th row -->


                    </div>
                  </div>
                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Service" />
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
    $(document).ready(function() {

        // training sub category find
        $('select[name="training_category_id"]').on('change', function(){
            var category_id = $(this).val();
            if(category_id) {
                $.ajax({
                    url: "{{  url('/training-category/trainingsubcategory/ajax') }}/"+category_id,
                    type:"GET",
                    dataType:"json",
                    success:function(data) {
                        $('select[name="training_subsubcategory_id"]').html('');
                        var d =$('select[name="training_subcategory_id"]').empty();
                        let option_list = '';
                        option_list += '<option selected disabled> - Select - </option>';
                            $.each(data, function(key, value){
                                option_list += '<option value="'+ value.id +'">' + value.training_subcategory_name + '</option>';
                            });
                            $('select[name="training_subcategory_id"]').append(option_list);
                    },
                });
            } else {
                alert('danger');
            }
        });

  });
  </script>

<script type="text/javascript">
	function mainThamUrl(input){
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function(e){
				$('#mainThmb').attr('src',e.target.result).width(80).height(80);
			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

@endsection

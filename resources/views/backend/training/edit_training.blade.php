@extends('admin.admin_master')

@section('admin')


<div class="container-full">
    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Edit Training</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <form method="POST" action="{{ route('training.update') }}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $training->id }}">
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
                                            <option value="{{ $category->id }}" {{ ($category->id==$training->training_category_id)? 'selected' : '' }}>{{ $category->training_category_name }}</option>
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
                                    <h5>SubCategory Select <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="training_subcategory_id" id="select" class="form-control">
                                            <option value="" selected disabled>Select SubCategory</option>
                                            @foreach($subcategories as $sub)
                                            <option value="{{ $sub->id }}" {{ ($sub->id==$training->training_subcategory_id)? 'selected' : '' }}>{{ $sub->training_subcategory_name }}</option>
                                            @endforeach
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
                                        <input type="text" name="title" class="form-control" required value="{{ $training->title }}">
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
                                        <input type="file" name="image" class="form-control" onchange="mainThamUrl(this)" />
                                        <img src="{{ URL::to($training->image) }}" id="mainThmb" alt="">
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end 2nd row -->



                        <div class="row"> <!-- start 7th row -->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h5>Training Description<span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <textarea name="description" id="editor1" class="form-control" placeholder="Description">{!! htmlspecialchars_decode($training->description) !!}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end 7th row -->

                    </div>
                  </div>
                    <div class="text-xs-right">
                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Product" />
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


<script>

  $(document).ready(function(){
   $('#multiImg').on('change', function(){ //on file input change
      if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
      {
          var data = $(this)[0].files; //this file data

          $.each(data, function(index, file){ //loop though each file
              if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ //check supported file type
                  var fRead = new FileReader(); //new filereader
                  fRead.onload = (function(file){ //trigger function on successful read
                  return function(e) {
                      var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                  .height(80); //create image element
                      $('#preview_img').append(img); //append image to output element
                  };
                  })(file);
                  fRead.readAsDataURL(file); //URL representing the file's data.
              }
          });

      }else{
          alert("Your browser doesn't support File API!"); //if File API is absent
      }
   });
  });

  </script>


@endsection

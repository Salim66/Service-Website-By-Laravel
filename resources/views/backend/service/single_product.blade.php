@extends('admin.admin_master')

@section('main-content')


<div class="container-full">

    <!-- Main content -->
    <section class="content">

     <!-- Basic Forms -->
      <div class="box">
        <div class="box-header with-border">
          <h4 class="box-title">Single Product View</h4>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col">
                <table class="table table-stripe">
                    <thead class="thead-dark text-bold">
                        <tr>
                            <th width="40%"><strong>Product Information</strong></th>
                            <th><strong>Product Value</strong></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Product Name English</td>
                            <td>{{ $product->product_name_en }}</td>
                        </tr>
                        <tr>
                            <td>Product Name Arabic</td>
                            <td>{{ $product->product_name_ar }}</td>
                        </tr>
                        <tr>
                            <td>Brand</td>
                            <td>{{ $product->brand->brand_name_en }}</td>
                        </tr>
                        <tr>
                            <td>Category</td>
                            <td>{{ $product->category->category_name_en }}</td>
                        </tr>
                        <tr>
                            <td>SubCategory</td>
                            <td>{{ $product->subCategory->subcategory_name_en }}</td>
                        </tr>
                        <tr>
                            <td>Sub-SubCategory</td>
                            <td>{{ $product->subsubcategory->subsubcategory_name_en }}</td>
                        </tr>
                        <tr>
                            <td>Product Code</td>
                            <td>{{ $product->product_code }}</td>
                        </tr>
                        <tr>
                            <td>Product Quantity</td>
                            <td>{{ $product->product_qty }} pcs</td>
                        </tr>
                        <tr>
                            <td>Product Size English</td>
                            <td>{{ $product->product_size_en }}</td>
                        </tr>
                        <tr>
                            <td>Product Size Arabic</td>
                            <td>{{ $product->product_size_ar }}</td>
                        </tr>
                        <tr>
                            <td>Product Color English</td>
                            <td>{{ $product->product_color_en }}</td>
                        </tr>
                        <tr>
                            <td>Product Color Arabic</td>
                            <td>{{ $product->product_color_ar }}</td>
                        </tr>
                        <tr>
                            <td>Selling Price</td>
                            <td>{{ $product->selling_price }}</td>
                        </tr>
                        <tr>
                            <td>Discount Price</td>
                            <td>{{ $product->discount_price }}</td>
                        </tr>
                        <tr>
                            <td>Discount</td>
                            <td>{{ round((($product->selling_price-$product->discount_price)/$product->selling_price)*100) }} %</td>
                        </tr>
                        <tr>
                            <td>Short Description English</td>
                            <td>{{ $product->short_descp_en }}</td>
                        </tr>
                        <tr>
                            <td>Short Description Arabic</td>
                            <td>{{ $product->short_descp_ar }}</td>
                        </tr>
                        <tr>
                            <td>Long Description English</td>
                            <td>{!! $product->long_descp_en !!}</td>
                        </tr>
                        <tr>
                            <td>Long Description Arabic</td>
                            <td>{!! $product->long_descp_ar !!}</td>
                        </tr>
                        <tr>
                            <td>Specifictions English</td>
                            <td>{!! $product->specifications_en !!}/td>
                        </tr>
                        <tr>
                            <td>Specifictions Arabic</td>
                            <td>{!! $product->specifications_ar !!}</td>
                        </tr>
                        <tr>
                            <td>Best Selles</td>
                            <td>
                                @if($product->best_seller == 1)
                                true
                                @else
                                false
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>New Arrivals</td>
                            <td>
                                @if($product->new_arrivals == 1)
                                true
                                @else
                                false
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Product Thumbnail</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="{{ URL::to($product->product_thumbnail) }}" class="view-thumbnail">
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Product Multiple Images</td>
                            <td>
                                <div class="row">
                                    @foreach($multiple_imags as $img)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="{{ URL::to($img->photo_name) }}" class="view-thumbnail">
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

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
@endsection

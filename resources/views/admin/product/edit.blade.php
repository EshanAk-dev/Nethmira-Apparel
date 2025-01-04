@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-12">
          <h1><i class="far fa-edit"></i>&nbsp;&nbsp;Edit Product</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            @include('admin.layouts._message')
            <form action="" method="post" enctype="multipart/form-data">
              {{ csrf_field() }}
              <div class="card-body">
                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Title <span style="color: red;">*</span> </label>
                      <input type="text" class="form-control" name="title" required value="{{ old('title', 
                          $product->title) }}" placeholder="Enter product title">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>SKU <span style="color: red;">*</span> </label>
                      <input type="text" class="form-control" name="sku" required value="{{ old('sku', 
                          $product->sku) }}" placeholder="SKU">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Category <span style="color: red;">*</span> </label>
                      <select class="form-control" required id="ChangeCategory" name="category_id">
                        <option value="">Select a category</option>
                        @foreach($getCategory as $category)
                        <option {{ ($product->category_id == $category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Sub Category <span style="color: red;">*</span> </label>
                      <select class="form-control" required id="getSubCategory" name="sub_category_id">
                        <option value="">Select a sub category</option>
                        @foreach($getSubCategory as $subcategory)
                        <option {{ ($product->sub_category_id == $subcategory->id) ? 'selected' : '' }} value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Brand <span style="color: red;">*</span> </label>
                      <select class="form-control" name="brand_id">
                        <option value="">Select a brand</option>
                        @foreach($getBrand as $brand)
                        <option {{ ($product->brand_id == $brand->id) ? 'selected' : '' }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Color <span style="color: red;">*</span></label>
                      <div class="checkbox-list"> <!-- Wrap the checkboxes in a container with the class 'checkbox-list' -->
                        @foreach($getColor as $color)
                        @php
                        $checked = '';
                        @endphp
                        @foreach($product->getColor as $pcolor)
                        @if($pcolor->color_id == $color->id)
                        @php
                        $checked = 'checked';
                        @endphp
                        @endif
                        @endforeach
                        <label class="checkbox-inline" style="margin-right: 20px;"> <!-- Use 'checkbox-inline' class for inline checkboxes -->
                          <input {{ $checked }} type="checkbox" name="color_id[]" value="{{ $color->id }}"> {{ $color->name }}
                        </label>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>


                <hr>

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Price (lkr) <span style="color: red;">*</span> </label>
                      <input type="text" class="form-control" name="price" required value="{{ !empty($product->price) ? 
                        $product->price : '' }}" placeholder="Enter product price">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Old Price (lkr) <span style="color: red;">*</span> </label>
                      <input type="text" class="form-control" name="old_price" required value="{{ !empty($product->old_price) ? 
                        $product->old_price : '' }}" placeholder="Old price">
                    </div>
                  </div>

                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Size <span style="color: red;">*</span></label>
                      <div>
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th>Name</th>
                              <th>Price (lkr)</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="AppendSize">
                            @php
                            $i_s = 1;
                            @endphp
                            @foreach($product->getSize as $size)
                            <tr id="DeleteSize{{ $i_s }}">
                              <td>
                                <input type="text" value="{{ $size->name }}" name="size[{{ $i_s }}][name]" placeholder="Name" class="form-control">
                              </td>
                              <td>
                                <input type="text" value="{{ $size->price }}" name="size[{{ $i_s }}][price]" placeholder="Price" class="form-control">
                              </td>
                              <td style="width: 200px;">
                                <button type="button" id="{{ $i_s }}" class="btn btn-danger DeleteSize">Delete</button>
                              </td>
                            </tr>
                            @php
                            $i_s++;
                            @endphp
                            @endforeach
                            <tr>
                              <td>
                                <input type="text" name="size[100][name]" placeholder="Name" class="form-control">
                              </td>
                              <td>
                                <input type="text" name="size[100][price]" placeholder="Price" class="form-control">
                              </td>
                              <td style="width: 200px;">
                                <button type="button" class="btn btn-primary AddSize">Add</button>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Images <span style="color: red;">*</span> </label>
                      <input type="file" name="image[]" class="form-control" style="padding: 5px;" multiple accept="image/*">
                    </div>
                  </div>
                </div>

                @if(!empty($product->getImage->count()))
                <div class="row" id="sortable">
                  @foreach($product->getImage as $image)
                  @if(!empty($image->getProductImage()))
                  <div class="col-md-2 sortable_image" id="{{ $image->id }}" style="text-align: center;">
                    <img style="width: 100%; height:200px;" src="{{ $image->getProductImage() }}" alt="">
                    <a onclick="return confirm('Are you want to delete?');" href="{{ url('admin/product/image_delete/'.$image->id) }}" style="margin-top: 10px;" class="btn btn-danger btn-sm">
                      <i class="far fa-trash-alt"></i>
                    </a>
                  </div>
                  @endif
                  @endforeach
                </div>
                @endif

                <hr>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Short Description <span style="color: red;">*</span> </label>
                      <textarea class="form-control" name="short_description" placeholder="Short description">{{ $product->short_description }}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Description <span style="color: red;">*</span> </label>
                      <textarea name="description" class="form-control editor" placeholder="Description">{{ $product->description }}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Additional Information <span style="color: red;">*</span> </label>
                      <textarea class="form-control editor" name="additional_info" placeholder="Additional Information">{{ $product->additional_info }}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <label>Shipping & Returns <span style="color: red;">*</span> </label>
                      <textarea class="form-control editor" name="shipping_returns" placeholder="Shipping & Returns">{{ $product->shipping_returns }}</textarea>
                    </div>
                  </div>
                </div>

                <hr>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Status <span style="color: red;">*</span> </label>
                      <select class="form-control" name="status" required>
                        <option {{ ($product->status == 0) ? 'selected' : '' }} value="0">Active</option>
                        <option {{ ($product->status == 1) ? 'selected' : '' }} value="1">Inactive</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </div>
      </div>
  </section>
</div>

@endsection

@section('script')

<script src="{{ url('public/sortable/jquery-ui.js') }}"></script>

<script type="text/javascript">
  $(document).ready(function() {
    $("#sortable").sortable({
      update: function(event, ui) {
        var photo_id = new Array();
        $('.sortable_image').each(function() {
          var id = $(this).attr('id');
          photo_id.push(id);
        });
        $.ajax({
          type: "POST",
          url: "{{ url('admin/product_image_sortable') }}",
          data: {
            "photo_id": photo_id,
            "_token": "{{ csrf_token() }}"
          },
          dataType: "json",
          success: function(data) {},
          error: function(data) {

          }
        });
      }
    });
  });

  var i = 101;
  $('body').delegate('.AddSize', 'click', function() {
    var html = '<tr id="DeleteSize' + i + '">\n\
                    <td>\n\
                      <input type="text" name="size[' + i + '][name]" placeholder="Name" class="form-control">\n\
                    </td>\n\
                    <td>\n\
                      <input type="text" name="size[' + i + '][price]" placeholder="Price" class="form-control">\n\
                    </td>\n\
                     <td>\n\
                      <button type="button" id="' + i + '" class="btn btn-danger DeleteSize">Delete</button>\n\
                    </td>\n\
                  </tr>';
    i++;
    $('#AppendSize').append(html);
  });

  $('body').delegate('.DeleteSize', 'click', function() {
    var id = $(this).attr('id');
    $('#DeleteSize' + id).remove();
  });

  $('body').delegate('#ChangeCategory', 'change', function(e) {
    var id = $(this).val();

    $.ajax({
      type: "POST",
      url: "{{ url('admin/get_sub_category') }}",
      data: {
        "id": id,
        "_token": "{{ csrf_token() }}"
      },
      dataType: "json",
      success: function(data) {
        $('#getSubCategory').html(data.html)
      },
      error: function(data) {}
    });

  });
</script>
@endsection
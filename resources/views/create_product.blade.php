@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Product') }}</div>

                    <div class="card-body">
                        <form action="{{ route('store_product') }}" method="post" enctype="multipart/form-data" id="store_product">
                            @csrf

                            <div class="form-group">
                                <label for="category">Top Category Name:</label>
                                    <select name="tcategory_id" id="tcategory_id" class="category form-control">
                                        <option value=0 selected="selected" readonly="readonly">Select Top Category</option>
                                        @foreach (get_top_categories() as $top )
                                         <option value="{{ $top->id }}">{{ $top->name }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="form-group">
                                <label for="category">Main Category Name:</label>
                                    <select name="category_id" id="main_category_id" class="maincategory form-control" >
                                        <option value=0 selected="selected" readonly="readonly">Select Main Category</option>
                                    </select>
                            </div>



                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Slug</label>
                                <input type="text" name="slug" placeholder="slug" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="description" placeholder="Description" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Description2</label>
                                <input type="text" name="description2" placeholder="Description2" class="form-control">
                            </div>



                            <div class="form-group">
                                <label>Price</label>
                                <input type="number" name="price" placeholder="Price" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Stock</label>
                                <input type="number" name="stock" placeholder="Stock" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" name="quantity" placeholder="Quantity" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="types">Type:</label>
                                    <select id="type_id" name="type_id" class="form-control">
                                        @foreach (get_type() as $i=>$type)
                                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                                         @endforeach
                                    </select>

                            </div>
                            <div class="form-group">
                                <label for="height">Height:</label>
                                    <select id="category_id" name="height_id" class="form-control">
                                        @foreach (get_height() as $i=>$height)
                                     <option value="{{ $height->id }}">{{ $height->size }} inch</option>
                                     @endforeach
                                    </select>

                            </div>
                            <div class="form-group">
                                <label for="sizes">Size:</label>
                                    <select id="category_id" name="size_id" class="form-control">
                                        @foreach (get_size() as $i=>$size)
                                             <option value="{{ $size->id }}">{{ $size->name }}</option>
                                         @endforeach
                                    </select>
                            </div>

                            <button type="button" id="submit_btn" class="btn btn-primary mt-3">Submit data</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script>

   $("#tcategory_id").select2();
   $(document).on('change','#tcategory_id',function(){
    console.log($(this).val());
    const id=$(this).val();
    const route="{{ route('get_category') }}"
    if(id>0){
        $.ajax({
         url: route,
         type: "get",
         dataType: 'json',
         delay: 250,
         data: {id:id},
         success: function (data) {
             $("#main_category_id").empty();
             const pre_defiend="<option selected='selected' value=0 readonly='readonly'>Select Main Category</option>"
             $("#main_category_id").append(pre_defiend);
             if(data.main_category){
                $.each(data.main_category, function(key, value) {
                    $('#main_category_id').append('<option value="' + value.id + '">' + value.name + '</option>');
                });
             }
             $("#main_category_id").trigger('change');
         },
     });
    }
    $("#main_category_id").select2({

 });
   });
   $("#main_category_id").select2();
   $(document).on('click','#submit_btn',function(){
    var formData = new FormData(document.getElementById('store_product'));
    const route= "{{ route('store_product') }}";
    $.ajax({
            url : route,
            data : formData,
            type : 'POST',
            processData: false,
            contentType: false,
            success : function(data){
            alert(data);
            }
        });
   })
</script>

@endsection

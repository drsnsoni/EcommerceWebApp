@extends('layouts.app')

@section('content')
<div class=" mt-5 mb-5">
    <div class="row d-flex justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="row">
                    <div class="col-md-6">
                        <div class="images p-2">
                            <div class="text-center p-4"> <img id="main-image" src="https://thesleepcompany.in/cdn/shop/products/Smart_Ortho_Mattress_01_1.webp?v=1681294039" width="600" /> </div>
                            <div class="thumbnail text-center"> <img onclick="change_image(this)" src="https://thesleepcompany.in/cdn/shop/products/Smart_Ortho_Mattress_01_1.webp?v=1681294039" width="100"> <img onclick="change_image(this)" src="https://thesleepcompany.in/cdn/shop/products/Smart_Ortho.webp?v=1681450816" width="100"> </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product p-4">

                            <div class="mt-4 mb-3">
                                <h5 class="text-uppercase">{{ $product->name}}</h5>
                                <div class="price d-flex flex-row align-items-center">
                                    <div class="ml-2"> <span class="review-no"><b>Ultimate Back Pain Relief</b><br>
                                        Medium Firm Feel</span> </div>
                                </div>
                            </div>
                            <p class="about">{{ $product->description }}</p>
                            <p class="about">{{ $product->description2 }}</p>

                    <p>{{ $product->stock }} left</p>

                    <form action="{{ route('add_to_cart', $product) }}" method="post" >
                        @csrf
                        <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                        <h2 id="product_price"> {{ number_format($product->price) }}</h2>
                         <div class="sizes">
                           <h6 class="text-uppercase">Category</h6>
                            <ul class="options" >
                                @foreach (get_type() as $i=>$type)
                                <li style="display: inline"> <input type="radio" name="type" value="{{ $type->id }}" @if($product->type_id==$type->id) checked="checked" @else @if($i==0) checked="checked" @endif @endif><label for="s">{{ $type->name }}</label></li>
                                @endforeach
                            </ul>
                        </div>
                          <div class="sizes">
                            <h6 class="text-uppercase">Height</h6>
                            <ul class="options" >
                                @foreach (get_height() as $i=>$height)
                                <li style="display: inline"> <input type="radio" name="height" value="{{ $height->id }}" @if($product->height_id==$height->id) checked="checked" @else @if($i==0) checked="checked" @endif @endif><label for="s">{{ $height->size }} in</label></li>
                                @endforeach


                            </ul>
                          </div>



                             <div class="j ">
                                <h6 class="text-uppercase">Size</h6>
                                <ul class="options">
                                    <li style="display: inline"> <input type="radio" name="size2" value="S" checked><label for="s">inch</label></li>
                                    <li style="display: inline"> <input type="radio" name="size2" value="M"> <label for="m">cm</label></li>
                                    <li style="display: inline">  <input type="radio" name="size2" value="L"> <label for="L">ft </label></li>

                                </ul>                                </div>


                              <select class="form-select mt-4 options" style="margin-top: 10px" name="size" aria-label="Default select example" id="size">
                                @foreach (get_size() as $i=>$size)
                                <option value="{{ $size->id }}" @if($i==0)selected="selected" @endif>{{ $size->name }}</option>
                                @endforeach
                              </select>


                              <div class="quantity mb-4">
                                <p>Quantity</p>
                                <input class="form-control" type="number" id="quantity" name="amount" placeholder="Default input" aria-label="default input example" value="1">
                              </div>

                              <div class="cart  align-items-center"> <button class="btn btn-danger text-uppercase mr-2 px-4" type="submit">ADD TO CART</button> </div>



                    </form>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function change_image(image){
        var container = document.getElementById("main-image");
       container.src = image.src;
   }
   document.addEventListener("DOMContentLoaded", function(event) {
   });


   $(document).on('click','.options',function(){
    var type=  $("input[name='type']:checked").val();
    var size = $("#size").val();
    var height =  $("input[name='height']:checked").val();
    var route="{{ route('get_product') }}";
    $.ajaxSetup({
   headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
   }
});
    $.post(route,

  {
    type: type,
    size: size,
    height: height
  },


  function(data, status){

    if(data.product){
        $("#product_price").html(data.product.price)
        $("#product_id").val(data.product.id);
    }else{
        alert('Combination of this is Out Of Stock')
    }

  });
   })
</script>
@endsection

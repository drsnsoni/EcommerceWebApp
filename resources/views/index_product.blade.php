@extends('layouts.app')

@section('content')

<div class="container my-4">
    <h2 class="text-uppercase">{{ $category_name }}</h2>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($products as $product)
        <div class="col">
          <div class="card h-100">
            <img src="{{ $product->image }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $product->name }}</h5>
              <p class="card-text">{{ number_format($product->price) }}</p>
              {{-- <button type="button" class="btn btn-danger">Cart</button> --}}
              <form action="{{ route('show_product',[ $product->category_id]) }}" method="get">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <button type="submit" class="btn btn-outline-danger">Show detail</button>
            </form>

            </div>

          </div>
        </div>
        @endforeach

      </div>
</div>

@endsection

@extends('layouts.app')

@section('content')
<section class="h-100 h-custom mb-5" >
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100" >
        <div class="col-12">
          <div class="card card-registration card-registration-2" style="border-radius: 15px;">
            <div class="card-body p-0">
              <div class="row g-0">
                <div class="col-lg-8">
                  <div class="p-5">
                    <div class="d-flex justify-content-between align-items-center mb-5">
                      <h1 class="fw-bold mb-0 text-black">{{ __('Cart') }}</h1>
                      @if ($errors->any())
                      @foreach ($errors->all() as $error)
                          <p>{{ $error }}</p>
                      @endforeach
                  @endif

                  @php
                      $total_price = 0;
                  @endphp
                      <h6 class="mb-0 text-muted">items</h6>
                    </div>
                    @foreach ($carts as $cart)
                    <hr class="my-4">
                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <img
                          src="https://assets.mysleepwell.com/uploads/products/Spinetech-Air_1920x1440-1677753073527-1677918659608.jpg"
                          class="img-fluid rounded-3" alt="Cotton T-shirt">
                      </div>
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <h6 class="text-muted">{{ $cart->product->name }}</h6>

                      </div>
                      <div class="col-md-4 col-lg-4 col-xl-4 d-flex">
                        <form action="{{ route('update_cart', $cart) }}" method="post">
                            @method('patch')
                            @csrf
                            <div class="input-group mb-3">
                            <input type="number" class="form-control" aria-describedby="basic-addon2"
                                name="amount" value={{ $cart->amount }}>
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit">Update
                                    amount</button>
                            </div>
                        </div>
                    </form>
                      </div>

                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">

                        <h6 class="mb-0">{{ $cart->product->price }}
                           </h6>
                      </div>
                      @php
                      $total_price += $cart->product->price * $cart->amount;
                       @endphp
                      <form action="{{ route('delete_cart', $cart) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                    </div>
                    @endforeach
                    <hr class="my-4">


                  </div>
                </div>
                <div class="col-lg-4 bg-grey">
                  <div class="p-5">
                    <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-4">

                      <h5></h5>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-between mb-5">
                      <h5 class="text-uppercase">Total price</h5>
                      <h5>{{ number_format($total_price) }}</h5>
                    </div>



                      <form action="{{ route('checkout') }}" method="post">
                        @csrf
                            <button type="submit" class="btn btn-danger btn-block btn-lg"
                            @if ($carts->isEmpty())
                            disabled @endif
                            >Check Out</button>
                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

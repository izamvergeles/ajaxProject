@extends('layouts.app')


@section('content')

    <div class="custom-border-bottom py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="{{ url('/')}}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
        </div>
      </div>
    </div>


    <div class="site-section">
      <div class="container">

        <div class="row mb-5">
          <div class="col-md-9 order-1">

            <div class="row align">
              <div class="col-md-12 mb-5">
                <div class="float-md-left"><h2 class="text-black h5">Shop All</h2></div>
                <div class="d-flex">
                  <div class="btn-group mr-1 ml-md-auto">
                    <button type="button" class="btn btn-white btn-sm dropdown-toggle px-4" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                      <button class="dropdown-item" id="default">Relevance</button>
                      <button class="dropdown-item" id="nAsc">Name, A to Z</button>
                      <button class="dropdown-item" id="nDesc">Name, Z to A</button>
                      <div class="dropdown-divider"></div>
                      <button class="dropdown-item" id="pAsc">Price, low to high</button>
                      <button class="dropdown-item" id="pDesc">Price, high to low</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mb-5" id="container">

               {{-- @foreach($products as $product)
              <div class="col-lg-6 col-md-6 item-entry mb-4">
                <a href="{{ url('product/' . $product->id)}}" class="product-item md-height bg-gray d-block">
                  <img src="{{ asset('storage/images/' . $product->id . '.png') }}" alt="Image" class="img-fluid">
                </a>
                <h2 class="item-title"><a href="{{ url('product/' . $product->id)}}">{{$product->name}}</a></h2>
                <strong class="item-price">${{$product->price}}</strong>
              </div>
              @endforeach--}}
            </div>
            <div class="row">
              <ul id="pagination" class="pagination"></ul>
            </div>
            
          </div>
          

          <!--<div class="col-md-3 order-2 mb-5 mb-md-0">-->
          <!--  <div class="border p-4 rounded mb-4">-->
          <!--    <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>-->
          <!--    <ul class="list-unstyled mb-0">-->
          <!--      <li class="mb-1"><a href="#" class="d-flex"><span>Men</span> <span class="text-black ml-auto">(2,220)</span></a></li>-->
          <!--      <li class="mb-1"><a href="#" class="d-flex"><span>Women</span> <span class="text-black ml-auto">(2,550)</span></a></li>-->
          <!--      <li class="mb-1"><a href="#" class="d-flex"><span>Children</span> <span class="text-black ml-auto">(2,124)</span></a></li>-->
          <!--    </ul>-->
          <!--  </div>-->

            <!--<div class="border p-4 rounded mb-4">-->
            <!--  <div class="mb-4">-->
            <!--    <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>-->
            <!--    <div id="slider-range" class="border-primary"></div>-->
            <!--    <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />-->
            <!--  </div>-->

            <!--  <div class="mb-4">-->
            <!--    <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>-->
            <!--    <label for="s_sm" class="d-flex">-->
            <!--      <input type="checkbox" id="s_sm" class="mr-2 mt-1"> <span class="text-black">Small (2,319)</span>-->
            <!--    </label>-->
            <!--    <label for="s_md" class="d-flex">-->
            <!--      <input type="checkbox" id="s_md" class="mr-2 mt-1"> <span class="text-black">Medium (1,282)</span>-->
            <!--    </label>-->
            <!--    <label for="s_lg" class="d-flex">-->
            <!--      <input type="checkbox" id="s_lg" class="mr-2 mt-1"> <span class="text-black">Large (1,392)</span>-->
            <!--    </label>-->
            <!--  </div>-->

            <!--  <div class="mb-4">-->
            <!--    <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>-->
            <!--    <a href="#" class="d-flex color-item align-items-center" >-->
            <!--      <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (2,429)</span>-->
            <!--    </a>-->
            <!--    <a href="#" class="d-flex color-item align-items-center" >-->
            <!--      <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (2,298)</span>-->
            <!--    </a>-->
            <!--    <a href="#" class="d-flex color-item align-items-center" >-->
            <!--      <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (1,075)</span>-->
            <!--    </a>-->
            <!--    <a href="#" class="d-flex color-item align-items-center" >-->
            <!--      <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (1,075)</span>-->
            <!--    </a>-->
            <!--  </div>-->

            <!--</div>-->
          </div>
        </div>

      </div>
    </div>


    @endsection
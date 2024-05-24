
@extends('pages.layout')

@push('page-style')
    <link rel="stylesheet" href="{{ asset('css/subcategory.css') }}" type="text/css">
@endpush

@section('content')
    <!-- main section -->
    <div class="main-section">
        <!-- content-section -->
        <div class="content-section">
            @if (empty($cartitems))
            {{'no data found'}}
            @else
            @foreach ($cartitems as $item)
            <div id="product-container">
                <div class="product-image">
                    <img src="{{ asset($item['imageOne']) }}" alt="">
                </div>
                <div class="product-details">
                    <h1>{{$item['name']}}</h1>
                    <span class="hint-star star">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                        <p>{{$item['rating']}}</p>
                    </span>
                    <div class="description">
                        <div class="description-section">
                            <ul>
                                @foreach ($item as $key => $value)
                                <li>{{$key .'    '. $value}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="price-section">
                            <h2>{{$item['price']}}</h2>
                            <p><strike>{{$item['discount']}}</strike> {{'   '.$item['price'] * 100 /($item['price'] + $item['discount']) . '% off'}}</p>
                            <p>free delivery</p>
                            <p>COD available</p>
                        </div>
                    </div>

                    <div class="info">
                        <h2> Description</h2>
                        <p class="information">" Let's spread the joy , here is Christmas , the most awaited day of the year.Christmas Tree is what one need the most. Here is the correct tree which will enhance your Christmas.</p>

                        <div class="left-control">
                            <button class="btn">
                                <span class="price">{{$item['price']}}</span>
                                <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                                <span class="buy">Buy now</span>
                            </button>
                        </div>
                        <div class="right-control">
                            <button class="btn">
                                {{-- <span class="price">{{$item['price']}}</span> --}}
                                {{-- <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span> --}}
                                <span class="buy"><a href="{{url('/')}}/{{$subcategory['category']['name']}}/{{$subcategory['name']}}/{{$item['name']}}">More Details</a></span>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            @endforeach
            @endif

            <div class="container">
                @if (empty($cartitems))
                {{'no items found'}}
                @else
                <ul class="pagination">
                  <li @if ($cartitems['links'][0]['active'] == 1) {{'active'}} @endif>
                    <a href="{{$items['links'][0]['url']}}">Previous</a>
                  </li>
                  <li @if ($cartitems['links'][1]['active'] == 1) {{'active'}} @endif>
                    <a href="{{$items['links'][1]['url']}}">{{$items['links'][1]['label']}}</a>
                  </li>
                  <li @if ($cartitems['links'][2]['active'] == 1) {{'active'}} @endif>
                    <a href="{{$items['links'][2]['url']}}">Next</a>
                  </li>
                </ul>
                @endif
            </div>
        </div>
        <div class="sidebar">
            <div class="wishlist-card">
                <a href="">Remove from cart</a>
                <a href="">Add to Wishlist</a>
                <a href="">Buy Now</a>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function rangeSlide(value) {
            document.getElementById('rangeValue').innerHTML = value;
        }
    </script>

    @endsection

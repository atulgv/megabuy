@extends('pages.layout')

@push('item-style')
    <link rel="stylesheet" href="{{ asset('css/itemPage.css') }}" type="text/css">
@endpush

@section('content')

<div class="bread-crumb">
    <a href="{{url('/')}}">Home</a> /
    <a href="{{url('/')}}/{{$subcategory['category']['name']}}">{{$subcategory['category']['name']}}</a> /
    <a href="{{url('/')}}/{{$subcategory['category']['name']}}/{{$subcategory['name']}}">{{$subcategory['name']}}</a> /
    {{$singleitem[0]['name']}}
</div>
    <!-- main section -->
    <div class="main-section">
        <div class="product-section">
            <div class="product">
                <div class="product__photo">
                    <div class="photo-container">
                        <div class="photo-main">
                            <div class="controls">
                                <i class="fa-solid fa-share-nodes"></i>
                                <a href="{{url('/')}}/addtowishlist/{{$singleitem[0]['allitem']}}" id="ytb"><i class="fa-regular fa-heart"></i></a>
                            </div>
                            <img src="{{ asset('images/mobile.webp') }}" alt="">
                        </div>
                        <div class="photo-album">
                            <ul>
                                <li><img src="{{ asset('images/mobile.webp') }}" alt="green apple"></li>
                                <li><img src="{{ asset('images/mobile.webp') }}" alt="half apple"></li>
                                <li><img src="{{ asset('images/mobile.webp') }}" alt="green apple"></li>
                                <li><img src="{{ asset('images/mobile.webp') }}" alt="apple top"></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="product__info">
                    <div class="title">
                        <h1>{{strtoupper($singleitem[0]['name'])}}</h1>
                    </div>
                    <div class="item-rating">
                        <div class="rating-stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                        </div>
                        <div class="main-rating">{{'('.$singleitem[0]['rating'].')'}}</div>
                    </div>
                    <div class="item-price">
                        <div class="price-discount">&#x20b9; {{$singleitem[0]['discount'].' off'}}</div>
                        <div class="main-price">&#x20b9; {{$singleitem[0]['price']}}  &nbsp; <strike> {{$singleitem[0]['price'] + $singleitem[0]['discount']}} </strike></div>
                    </div>
                    <div class="offers-section">
                        <h4>Available Offers</h4>
                        <ul>
                            <li><a href=""><i class="fa-solid fa-tag"></i>  5% Cashback on Axis Bank Card  T&C</a></li>
                            <li><a href=""><i class="fa-solid fa-tag"></i>  7% Cashback on State Bank Card  T&C</a></li>
                            <li><a href=""><i class="fa-solid fa-tag"></i>  Free Home  Delivery</a></li>
                            <li><a href=""><i class="fa-solid fa-tag"></i>  COD Available</a></li>
                        </ul>
                    </div>
                    <div class="item-highlight">
                        <h4>Highlights</h4>
                        <ul>
                            <li><i class="fa-solid fa-arrow-right"></i>2 GB RAM</li>
                            <li><i class="fa-solid fa-arrow-right"></i>64 GB Storage</li>
                            <li><i class="fa-solid fa-arrow-right"></i>5000 mAH Battery</li>
                            <li><i class="fa-solid fa-arrow-right"></i>6 inch Screen</li>
                            <li><i class="fa-solid fa-arrow-right"></i>mediatek Processor</li>
                        </ul>
                    </div>
                    <div class="wishlist"><a href="{{url('/')}}/addtowishlist/{{$singleitem[0]['allitem']}}" class="buy--btn">ADD TO WISHLIST</a></div>
                    <div class="buy"><a href="{{url('/')}}/addtocart/{{$singleitem[0]['allitem']}}" class="buy--btn">ADD TO CART</a></div>

                </div>
            </div>
        </div>

        <div class="specs-section">
            <tab-container>
                <!-- TAB CONTROLS -->
                <input type="radio" id="tabToggle01" name="tabs" value="1" checked />
                <label for="tabToggle01" checked="checked">Specifications</label>
                <input type="radio" id="tabToggle02" name="tabs" value="2" />
                <label for="tabToggle02">Description</label>
                <tab-content class="invisible-scroll">
                    <table>

                            <tr>
                                <th>Property</th>
                                <th>Value</th>
                            </tr>


                            @foreach ($singleitem[0] as $key => $value)
                            @if ($key == 'mobile_id' || $key == 'allitem' || $key == 'quantity' || $key == 'seller' || $key == 'imageOne' || $key == 'imageTwo' || $key == 'imageThree' || $key == 'description' || $key == 'created_at' || $key == 'updated_at')
                            @continue;
                            @else
                            <tr>
                                <th>{{$key}}</th>
                                <td>{{$value}}</td>
                            </tr>
                           @endif
                           @endforeach

                    </table>
                </tab-content>
                <tab-content id="description">
                    <p>"{{$singleitem[0]['description']}}"</p>
                </tab-content>
            </tab-container>
        </div>
    </div>
    @endsection

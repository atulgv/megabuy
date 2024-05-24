
@extends('pages.layout')

@push('page-style')
    <link rel="stylesheet" href="{{ asset('css/subcategory.css') }}" type="text/css">
@endpush

@section('content')

    <div class="bread-crumb">
        <a href="{{url('/')}}">Home</a> /
        <a href="{{url('/')}}/{{$subcategory['category']['name']}}">{{$subcategory['category']['name']}}</a> /
        {{$subcategory['name']}}
    </div>

    <!-- main section -->
    <div class="main-section">
        <div class="sidebar" id="sidebar">
            <div class="category-card">
                <div class="card-heading">Price</div>
                <div class="card-content" id="price-content">
                    <div class="detail-content">
                        <ul>
                            <li>
                                <div id="price-meter">
                                    <div id="currency">
                                        <div id="currency-section">&#x20b9;</div>
                                        <span id="rangeValue">0</span>
                                    </div>
                                    <form action="{{url('/')}}/pricecategory">
                                        <Input class="range" type="range" name="pricemeter" value="0" min="0" max="100000" onChange="rangeSlide(this.value)" onmousemove="rangeSlide(this.value)"></Input>
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            @foreach ($itemcategory as $key => $value)
            <div class="category-card">
                <div class="card-heading">{{$key}}</div>
                <div class="card-content">
                    <div class="detail-content invisible-scroll">
                        <ul>
                            <li>
                                @foreach ($value as $icategory)
                                <div class="icategory">
                                    <form action="{{url('/')}}/{{$subcategory['category']['name']}}/{{$subcategory['name']}}/{{$key}}/{{$icategory->name}}">
                                        <input type="radio" name="{{$key}}" id="checkbox1" value="{{$icategory->name}}">
                                        <label for="checkbox1">{{$icategory->name}}</label>
                                    </form>
                                    <div class="numberofitems">{{$num}}</div>
                                </div>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- content-section -->
        <div class="content-section">
            <button id="filters" onclick="filters()">filters</button>
            <h2 class="number-of-data"><span>{{$num}}</span>&nbsp; {{$subcategory['name'].'s'}}</h2>
            @foreach ($items['data'] as $item)
            <div id="product-container">
                <div class="product-image">
                    <img src="{{ asset('images/ac.jpg') }}" alt="">
                    <a href="{{url('/')}}/addtowishlist/{{$item['allitem']}}" id="ytb"><i class="fa-regular fa-heart"></i></a>
                </div>
                <div class="product-details">
                    <a href="{{url('/')}}/{{$subcategory['category']['name']}}/{{$subcategory['name']}}/{{$item['name']}}"><h1>{{$item['name']}}</h1></a>
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
                            <h3>Highlights</h3>
                            <ul>
                               <li>{{$item['ram']}} GB RAM | {{$item['storage']}} GB Storage</li>
                               {{-- <li>{{$item['rearcamera']}} MP rear Camera | {{$item['frontcamera']}} MP front Camera</li> --}}
                               <li>{{$item['screen']}} inches Screen
                               <li>{{$item['battery']}} mAH Battery
                               <li>{{$item['processor']}} Processor
                            </ul>
                        </div>
                        <div class="price-section">
                            <h2>{{$item['price']}}</h2>
                            <p>{{$item['discount'].' off'}}</p>
                            <p>free delivery</p>
                            <p>COD available</p>
                        </div>
                    </div>
                    <div class="info">
                        <h2> Description</h2>
                        <p class="information">{{$item['description']}}</p>
                    </div>
                    <div class="control">
                        <button class="btn">
                            <span class="price">{{$item['price']}}</span>
                            <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                            <span class="buy">Buy now</span>
                        </button>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="container">
                <ul class="pagination">
                  <li @if ($items['links'][0]['active'] == 1) {{'active'}} @endif>
                    <a href="{{$items['links'][0]['url']}}">Previous</a>
                  </li>
                  <li @if ($items['links'][1]['active'] == 1) {{'active'}} @endif>
                    <a href="{{$items['links'][1]['url']}}">{{$items['links'][1]['label']}}</a>
                  </li>
                  <li @if ($items['links'][2]['active'] == 1) {{'active'}} @endif>
                    <a href="{{$items['links'][2]['url']}}">Next</a>
                  </li>
                </ul>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        function rangeSlide(value) {
            document.getElementById('rangeValue').innerHTML = value;
        }

        function filters(){

            var element = document.getElementById("sidebar");
            element.classList.toggle("mystyle");
        }
    </script>

    @endsection

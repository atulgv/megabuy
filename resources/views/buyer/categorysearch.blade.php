
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
        <div class="sidebar">
            @foreach ($itemcategory as $key => $value)
                <div class="category-card">
                    <div class="card-heading">{{$key}}</div>
                    <div class="card-content">
                        <div class="detail-content">
                            <div class="input">
                                @foreach ($value as $val)
                                <input type="checkbox" id="{{$val[$key.'_id']}}">
                                <label for="{{$val[$key.'_id']}}">{{$val['name']}}</label>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <!-- content-section -->
        <div class="content-section">
            <div class="content-intro">
                <h2>{{$subcategory['name']}}</h2>
                <p><a href="{{url('/')}}">Home</a> /
                    <a href="{{url('/')}}/{{$subcategory['category']['name']}}">{{$subcategory['category']['name']}}</a> /
                    {{$subcategory['name']}}
                </p>

            </div>

            <div class="items-count">
                <span id="item-counting">{{$num}}</span>
                <span id="item-name">{{$subcategory['name']}}</span>
            </div>

            @foreach ($items as $item)
            <a href="{{url('/')}}/{{$subcategory['category']['name']}}/{{$subcategory['name']}}/{{$item['name']}}">
                <div class="item-card">
                    <div class="item-image">
                        <img src="{{ asset($item['imageOne']) }}" alt="mobile">
                    </div>
                    <div class="item-detail">
                        <div class="item-name">
                            <h2>{{ $item['name'] }}</h2>
                            <div class="item-price">
                                <h2>{{ $item['price'] }}</h2>
                            </div>
                        </div>
                        <div class="item-rating">
                            <div class="rating-stars">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="rating-given">{{$item['rating']}}</div>
                        </div>
                        <div class="item-likeandbuy">
                            <a href="">
                                <div class="item-like black-border">
                                    <i class="fa-regular fa-heart"></i>
                                    Like
                                </div>
                            </a>
                            <a href="">
                                <div class="item-buy black-border">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                    Buy now
                                </div>
                            </a>
                        </div>
                        <div class="item-fulldetail">
                            @foreach($item as $key => $value)
                                @if ($key == 'name' || $key == 'price' || $key == 'rating')
                                    @continue
                                @else
                                    <div class="item-points">
                                        <i class="fa-solid fa-check"></i>
                                        <span>{{$key}} --> {{$value}}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </a>
            @endforeach

            <div class="pagination">
                <a href="" class="black-border">Prev</a>
                <a href="" class="black-border">1</a>
                <a href="" class="black-border">Next</a>
            </div>
        </div>
    </div>

    @endsection

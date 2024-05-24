@extends('pages.layout')

@push('home-style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" type="text/css">
@endpush
@section('content')

    <div class="bread-crumb">
        <a href="{{url('/')}}">Home</a> /
        <a href="{{url('/')}}/{{$subcates[0]['name']}}">{{$subcates[0]['name']}}</a>
    </div>

    <!-- categories icons -->
    <div class="categories-icons invisible-scroll">
        @foreach ($subcates[0]['subcategory'] as $subcategory)
            <a href="{{ url('/') }}/{{ $subcates[0]['name']}}/{{$subcategory['name']}}">
                <div class="icon">
                    <div class="icon-view1">
                        <a href="{{ url('/') }}/{{ $subcates[0]['name']}}/{{$subcategory['name']}}" id="ytb"><i class="{{'fa-solid fa-'.strtolower($subcategory['name'])}}"></i></a>
                    </div>
                    <div class="icon-detail">
                        {{$subcategory['name']}}
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    <!-- hero-section -->
    <div class="hero-section">
        <!-- Slideshow container -->
        <div class="slideshow-container">

            <!-- Full-width images with number and caption text -->
            <div class="mySlides">
                <a href=""><img src="{{ asset($categories[0]['imageOne']) }}" style="width:100%"></a>
            </div>

            <div class="mySlides">
                <a href=""><img src="{{ asset($categories[0]['imageTwo']) }}" style="width:100%"></a>
            </div>

            <div class="mySlides">
                <a href=""><img src="{{ asset($categories[0]['imageThree']) }}" style="width:100%"></a>
            </div>

            <!-- Next and previous buttons -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
    </div>

    <div class="megadeal-section">
        <div class="megadeal-title">
            <h2>Mega Deals</h2>
            <a href="" class="button-35" role="button">See all</a>
        </div>
        <div class="sec">
            <input type="radio" name="position" checked />
            <input type="radio" name="position" />
            <input type="radio" name="position" />
            <input type="radio" name="position" />
            <input type="radio" name="position" />
            <input type="radio" name="position" />
            <main id="carousel">

                @if (!empty($megadeals))
                @foreach ($megadeals as $key => $megadeal)
                <div class="item">
                    <img class="hero-profile-img" src="" alt="">
                    <div class="hero-description-bk"></div>
                    <div class="hero-logo">
                        <a href="{{url('/')}}/addtowishlist/{{$megadeal['allitem']}}" id="ytb"><i class="fa-regular fa-heart"></i></a>
                    </div>
                    <div class="hero-description">
                        <h3>{{$founditems[intval($key)]['name']}}</h3>
                        <p>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <span>{{$founditems[intval($key)]['rating']}}</span>
                        </p>
                    </div>
                    <div  class="hero-date">
                        <p>{{$megadeal['megadealdiscount'] + $megadeal['discount']}} &nbsp; <strike>{{$megadeal['discount']}}</strike> off</p>
                        <h3>{{$megadeal['price']}} &nbsp;<strike>{{$megadeal['price'] + $megadeal['discount'] + $megadeal['megadealdiscount']}}</strike></h3>
                    </div>
                    <div class="hero-btn">
                        <a href="{{url('/')}}/payment">Buy Now</a>
                    </div>
                </div>
                @endforeach
                @else
                {{'No items'}}
                @endif
                </div>
            </main>
        </div>
    </div>

    <!-- category-detail -->
    <div class="category-detail">
        @foreach ($subcates[0]['subcategory'] as $subcategory)
        <div class="subcategory-section">
            <div class="subcategory-info">
                <h2>{{$subcategory['name']}}</h2>
                <a href="{{url('/')}}/{{$subcategory['name']}}" class="button-35" role="button">See all</a>
            </div>
            <div class="card-container">
                @if (empty($allitems[0][ucfirst($subcategory['name'])]))
                {{'no items found'}}
                @else
                @foreach ($allitems[0][ucfirst($subcategory['name'])] as $item)
                    <div class="wrapper">
                        <div class="container">
                            <div class="top"><img src="{{ asset($item['imageOne']) }}" alt=""></div>
                            <div class="bottom">
                                <div class="left">
                                    <div class="details">
                                        <h2><a href="{{url('/')}}/{{$subcates[0]['name']}}/{{$subcategory['name']}}/{{$item['name']}}">{{$item['name']}}</a></h2>
                                        <p>{{$item['price']}} &nbsp;&nbsp; <strike>{{$item['price'] + $item['discount']}}</strike></p>
                                    </div>
                                    <div class="buy">
                                        <form action="/payment" method="POST" >
                                            @csrf
                                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                                               data-key="rzp_test_r4gQ34njPPZfCh"
                                               data-amount="{{$item['price']*100}}"
                                               data-currency="INR"
                                               data-buttontext="Buy Now"
                                               data-name="Megabuy"
                                               data-description="Rozerpay"
                                               data-image="{{$item['imageOne']}}"
                                               data-prefill.name="name"
                                               data-prefill.email="email"
                                               data-theme.color="#F37254"></script>
                                         </form>
                                        <i class="fa-brands fa-opencart"></i></div>
                                </div>
                            </div>
                            <div class="inside">
                                <div class="icon"><i class="fa-solid fa-circle-exclamation"></i></div>
                                <div class="contents">
                                    <h2>Highlights</h2>
                                    <table>
                                        @foreach ($item as $key => $value)
                                        <tr>
                                            <th>{{$key}}</th>
                                            <td>{{$value}}</td>
                                        </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
        @endforeach
    </div>
@endsection


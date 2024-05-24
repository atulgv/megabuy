@extends('pages.layout')

@push('home-style')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}" type="text/css">
@endpush

@section('content')

    <!-- categories icons -->
    <div class="categories-icons invisible-scroll">
        @foreach ($ca as $category)
            <a href="{{url('/')}}/{{$category->name}}">
                <div class="icon">
                    <div class="icon-view1">

                        <img src="{{asset($category->imageOne)}}" alt="{{$category->name}}">
                    </div>
                    <div class="icon-detail">
                        {{$category->name}}
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
                <a href=""><img src="{{ asset('images/hero.jpg') }}" style="width:100%"></a>
            </div>

            <div class="mySlides">
                <a href=""><img src="{{ asset('images/hero2.jpg') }}" style="width:100%"></a>
            </div>

            <div class="mySlides">
                <a href=""><img src="{{ asset('images/hero.jpg') }}" style="width:100%"></a>
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
                    <div class="hero-date">
                        <p>{{$megadeal['megadealdiscount'] + $megadeal['discount']}} &nbsp; <strike>{{$megadeal['discount']}}</strike> off</p>
                        <h3>{{$megadeal['price']}} &nbsp;<strike>{{$megadeal['price'] + $megadeal['discount'] + $megadeal['megadealdiscount']}}</strike></h3>
                    </div>
                    <div class="hero-btn">
                        <form action="/payment" method="POST" >
                            @csrf
                            <script src="https://checkout.razorpay.com/v1/checkout.js"
                               data-key="rzp_test_r4gQ34njPPZfCh"
                               data-amount="{{$megadeal['price']*100}}"
                               data-currency="INR"
                               data-buttontext="Buy Now"
                               data-name="Megabuy"
                               data-description="Rozerpay"
                               data-image="{{$founditems[intval($key)]['imageOne']}}"
                               data-prefill.name="name"
                               data-prefill.email="email"
                               data-theme.color="#F37254"></script>
                         </form>
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


        @foreach ($categories as $category)
            @if ($category['category_id'] % 2 == 0)
            <div class="category-section">
                <div class="card-container">
                    @foreach ($category['subcategory'] as $key => $value)
                        <div class="card-t">
                        <img class="hero-profile-img" src="{{ asset($value['imageone']) }}" alt="">
                            <div class="hero-description-bk"></div>
                            <div class="hero-logo">
                                <a href="" id="ytb"><i class="{{'fa-solid fa-'.strtolower($value['name'])}}"></i></a>
                            </div>
                            <div class="hero-description">
                                <h2>{{$value['name']}}</h2>
                                <p>Starting from just 99</p>
                            </div>
                            <div class="hero-btn">
                                <a href="{{url('/')}}/{{$category['name']}}/{{$value['name']}}">Explore</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="category-info">
                    <h2>{{$category['name']}}</h2>
                    <p>Starting just from 99</p>
                    <!-- HTML -->
                    <a href="{{url('/')}}/{{$category['name']}}" class="button-35" role="button">Explore</a>

                </div>
            </div>
            @else
            <div class="category-section">
                <div class="category-info">
                    <h2>{{$category['name']}}</h2>
                    <p>Starting just from 99</p>
                    <a href="{{url('/')}}/{{$category['name']}}" class="button-35" role="button">Explore</a>

                </div>
                <div class="card-container">
                    @foreach ($category['subcategory'] as $key => $value)
                        <div class="card-t">
                        <img class="hero-profile-img" src="{{ asset($value['imageone']) }}" alt="">
                            <div class="hero-description-bk"></div>
                            <div class="hero-logo">
                                <a href="" id="ytb"><i class="{{'fa-solid fa-'.strtolower($value['name'])}}"></i></a>
                            </div>
                            <div class="hero-description">
                                <h2>{{$value['name']}}</h2>
                                <p>Starting from just 99</p>
                            </div>
                            <div class="hero-btn">
                                <a href="{{url('/')}}/{{$category['name']}}/{{$value['name']}}">Explore</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endforeach



@endsection


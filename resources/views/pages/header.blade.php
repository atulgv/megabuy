<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> MegaBuy101 </title>
    <link rel="icon" href="{{ asset('images/megabuy.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/pages/header.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/pages/footer.css') }}" type="text/css">
    @stack('home-style')
    @stack('login-style')
    @stack('page-style')
    @stack('item-style')
    @stack('admin-style')

</head>
<body>
    <!-- header section start -->
    <header>
        <!-- navbar start -->
        <div class="navbar">
            <div class="brand-section">
                <a href="{{url('/')}}" class="col-6">
                    <div class="nav-brand black-border">
                        <img src="{{ asset('images/moon.png') }}" alt="moon">
                        <h1>M</h1>
                        <div class="megabuy">
                            <span id="mega-one">ega</span>
                            <span id="mega-two">Buy</span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="search-section">
                <div class="box">
                    <form name="search" action="{{url('/')}}/search" method="GET">
                        <input type="text" class="input" name="search" placeholder="Search MegaBuy" onmouseout="this.value = ''; this.blur();">
                    </form>
                    <i class="fas fa-search"></i>

                </div>
            </div>
            <!-- nav-address -->
            <div class="address-section">
                <a href="">
                    <div class="nav-address black-border">
                        <div class="deliver">
                            <span>Deliver to</span>
                            <i class="fa-solid fa-angle-down"></i>
                        </div>
                        <div class="address-select">
                            <i class="fa-solid fa-location-dot"></i>
                            <span>Enter Location</span>
                            <!-- hidden map -->
                            <div class="hidden-map">
                                <form action="">
                                    <h2>Choose Location</h2>
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30773301.778664753!2d61.03203957588349!3d19.69104605888175!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e0!3m2!1sen!2sin!4v1713151268095!5m2!1sen!2sin" width="600" height="480" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </form>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- login -->
            <div class="signin-section">
                @if (session()->has('username'))
                    <a href="{{url('/')}}/destroysession">
                        <div class="nav-signin black-border">
                            <i class="fa-solid fa-user"></i>
                            <span>Sign Out</span>
                        </div>
                    </a>
                @else
                    <a href="{{url('/')}}/login">
                        <div class="nav-signin black-border">
                            <i class="fa-regular fa-user"></i>
                            <span>Sign In</span>
                        </div>
                    </a>
                @endif
            </div>

            <!-- wishlist -->
            <div class="wishlist-section">
                @if (session()->has('usertype'))
                    @if (session()->get('usertype') == 'buyer')
                        <a href="{{url('/')}}/showwishlistpage">
                            <div class="nav-wishlist black-border">
                                <i class="fa-solid fa-heart"></i>
                                <span>Wishlist</span>
                            </div>
                        </a>
                    @else
                        <div class="nav-wishlist black-border">
                            <i class="fa-regular fa-heart"></i>
                            Wishlist
                        </div>
                    @endif
                @else
                    <a href="{{url('/')}}/login">
                        <div class="nav-wishlist black-border">
                            <i class="fa-regular fa-heart"></i>
                            Wishlist
                        </div>
                    </a>
                @endif
            </div>


            <!-- cart -->
            <div class="cart-section">
                @if (session()->has('usertype'))
                    @if (session()->get('usertype') == 'buyer')
                        <a href="{{url('/')}}/showcartpage">
                            <div class="nav-cart black-border">
                                <i class="fa-brands fa-opencart"></i>
                                Cart
                            </div>
                        </a>
                    @else
                        <div class="nav-cart black-border">
                            <i class="fa-brands fa-opencart"></i>
                            Cart
                        </div>
                    @endif
                @else
                    <a href="{{url('/')}}/login">
                        <div class="nav-cart black-border">
                            <i class="fa-brands fa-opencart"></i>
                            Cart
                        </div>
                    </a>
                @endif
            </div>

            <div class="more-section">
                <div class="more-option">
                    <i class="fa-solid fa-bars"></i>
                    <div class="extra-icons">
                        <div class="more-hi-section">
                            <div class="more-hi">
                                <p>Hi
                                    <span>
                                        @if (session()->has('username'))
                                            {{session()->get('username')}}
                                        @else
                                            Guest
                                        @endif
                                    </span>
                                </p>
                            </div>
                            <div class="more-admin">
                                @if (session()->has('usertype'))
                                    @if (session('usertype') == 'admin')
                                        <a href="{{url('/')}}/showsellerdata">
                                            <div class="more-admin-panel black-border">
                                                <i class="fa-solid fa-house-chimney"></i>&nbsp;
                                                Admin
                                            </div>
                                        </a>
                                    @elseif (session('usertype') == 'seller')
                                        <a href="{{url('/')}}/showselleritemdata">
                                            <div class="more-admin-panel black-border">
                                                <i class="fa-solid fa-house-chimney"></i>&nbsp;
                                                Seller
                                            </div>
                                        </a>
                                    @endif
                                @endif
                            </div>
                        </div>

                        <!-- login -->
                        <div class="signin-section">
                            @if (session()->has('username'))
                                <a href="{{url('/')}}/destroysession">
                                    <div class="nav-signin black-border">
                                        <i class="fa-solid fa-user"></i>
                                    </div>
                                </a>
                            @else
                                <a href="{{url('/')}}/login">
                                    <div class="nav-signin black-border">
                                        <i class="fa-regular fa-user"></i>
                                    </div>
                                </a>
                            @endif
                        </div>


                        <!-- wishlist -->
                        <div class="wishlist-section">
                            @if (session()->has('usertype'))
                                @if (session()->get('usertype') == 'buyer')
                                    <a href="{{url('/')}}/showwishlistpage">
                                        <div class="nav-wishlist black-border">
                                            <i class="fa-solid fa-heart"></i>
                                        </div>
                                    </a>
                                @else
                                    <div class="nav-wishlist black-border">
                                        <i class="fa-regular fa-heart"></i>
                                    </div>
                                @endif
                            @else
                                <a href="{{url('/')}}/login">
                                    <div class="nav-wishlist black-border">
                                        <i class="fa-regular fa-heart"></i>
                                    </div>
                                </a>
                            @endif
                        </div>


                        <!-- cart -->
                        <div class="cart-section">
                            @if (session()->has('usertype'))
                                @if (session()->get('usertype') == 'buyer')
                                    <a href="{{url('/')}}/showcartpage">
                                        <div class="nav-cart black-border">
                                            <i class="fa-brands fa-opencart"></i>
                                        </div>
                                    </a>
                                @else
                                    <div class="nav-cart black-border">
                                        <i class="fa-brands fa-opencart"></i>
                                    </div>
                                @endif
                            @else
                                <a href="{{url('/')}}/login">
                                    <div class="nav-cart black-border">
                                        <i class="fa-brands fa-opencart"></i>
                                    </div>
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- navbar end -->




<!-- panel start -->
<div class="panel">
    <div class="panel-categories black-border">
        <i class="fa-solid fa-bars"></i>
        All Categories
        <div class="hidden-menu">

            <nav class="sidebar-nav" id="fullviewmenu">
                <ul>
                @foreach  ($categories as $category)
                  <li>
                    <a href="{{url('/')}}/{{$category['name']}}"><span>{{$category['name']}}</span></a>
                    <ul class="nav-flyout">
                        @foreach ($category['subcategory'] as $subcat)
                      <li>
                        <a href="{{url('/')}}/{{$category['name']}}/{{$subcat['name']}}"><i class="{{'fa-solid fa-'.strtolower($subcat['name'])}}"></i>{{$subcat['name']}}</a>
                      </li>
                      @endforeach
                    </ul>
                  </li>
                  @endforeach
                </ul>
              </nav>
        </div>
    </div>

    <div class="panel-menu invisible-scroll">
        @foreach ($categories as $category)
            <a href="{{url('/')}}/{{$category['name']}}" class="black-border">
                {{$category['name']}}
                <div class="hidden-one-category">
                    <div class="category-one-list">
                        <div class="each-category">
                            <h3>{{$category['name']}}</h3>
                            <hr>
                            <ul>
                                @foreach ($category['subcategory'] as $subcat)
                                    <li>{{ $subcat['name'] }}</li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="top-brands">
                            <h3>{{$category['name']}}</h3>
                            <hr>
                            <div class="brands">
                                <img src="samsung.png" alt="">
                                <img src="samsung.png" alt="">
                                <img src="samsung.png" alt="">
                                <img src="samsung.png" alt="">
                            </div>
                        </div>
                        <div class="big-pic">
                            <img src="{{ asset($category['imageTwo']) }}" alt="">
                        </div>
                        <div class="small-pic">
                            <img src="{{ asset($category['imageThree']) }}" alt="">
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

    </div>

    <div class="hi-section">
        <p>Hi
            <span>
                @if (session()->has('username'))
                    {{session()->get('username')}}
                @else
                    Guest
                @endif
            </span>
        </p>

        @if (session()->has('usertype'))
            @if (session('usertype') == 'admin')
                <a href="{{url('/')}}/showsellerdata">
                    <div class="admin-panel black-border">
                        <i class="fa-solid fa-house-chimney"></i>&nbsp;
                        Admin
                    </div>
                </a>
            @elseif (session('usertype') == 'seller')
                <a href="{{url('/')}}/showselleritemdata">
                    <div class="admin-panel black-border">
                        <i class="fa-solid fa-house-chimney"></i>&nbsp;
                        Seller
                    </div>
                </a>
            @endif
        @endif
    </div>

    <div class="extra-panel">
        <span>All Categories</span>
        <i class="fa-solid fa-bars">
            <div class="extra-section">
                <nav class="sidebar-nav">
                    <ul>
                        @foreach  ($categories as $category)
                        <li>
                            <a href="#"> <span>{{$category['name']}}</span></a>
                            <ul class="nav-flyout">
                                @foreach ($category['subcategory'] as $subcat)
                                    <li>
                                        <a href="{{url('/')}}/{{$category['name']}}/{{$subcat['name']}}"><i class="{{'fa-solid fa-'.strtolower($subcat['name'])}}"></i>{{$subcat['name']}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
        </i>
    </div>
</div>
</header>
<!-- header section end -->










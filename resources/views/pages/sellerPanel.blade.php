
<!-- panel start -->
<div class="panel">
    <div class="panel-menu">
        <ul>
            <li class="black-border"><a href="{{url('/')}}/showselleritemdata">Items</a></li>
            @foreach ($subcategories as $subcat)
            <li class="black-border"><a href="{{url('/')}}/showidata/{{$subcat['name']}}">{{$subcat['name']}}</a></li>
            @endforeach
        </ul>
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
            @if (session()->get('usertype') == 'admin')
                <a href="{{url('/')}}/showsellerdata">
                    <div class="admin-panel black-border">
                        <i class="fa-solid fa-house-chimney"></i>&nbsp;
                        Admin
                    </div>
                </a>
            @elseif (session()->get('usertype') == 'seller')
                <a href="{{url('/')}}/showselleritemdata">
                    <div class="admin-panel black-border">
                        <i class="fa-solid fa-house-chimney"></i>&nbsp;
                        Seller
                    </div>
                </a>
            @endif
        @endif
    </div>
</div>
</header>
<!-- header section end -->


<!-- panel start -->
<div class="admin-panel">
    <div class="admin-panel-menu invisible-scroll">
        <ul>
            <a href="{{url('/')}}/showadmindata"><li class="black-border">Admins</li></a>
            <a href="{{url('/')}}/showbuyerdata"><li class="black-border">Buyers</li></a>
            <a href="{{url('/')}}/showsellerdata"><li class="black-border">Sellers</li></a>
            <a href="{{url('/')}}/showitemdata"><li class="black-border">Items</li></a>
            <a href="{{url('/')}}/showcategorydata"><li class="black-border">Categories</li></a>
            <a href="{{url('/')}}/showsubcategorydata"><li class="black-border">Sub Categories</li></a>
            <a href="{{url('/')}}/showitemcategorydata"><li class="black-border">Item Categories</li></a>
            <a href="{{url('/')}}/showmegadealdata"><li class="black-border">Megadeals</li></a>
            @foreach ($itemcategories as $itemcategory)
                <a href="{{url('/')}}/itemcategorydata/{{$itemcategory['itemcategory_id']}}">
                    <li class="black-border">{{$itemcategory['name']}}</li>
                </a>
            @endforeach
        </ul>
    </div>

    <div class="hi-section">
        <p>Hi <span>User</span></p>

        <a href="{{url('/')}}/showsellerdata">
            <div class="admin-panel black-border">
                <i class="fa-solid fa-house-chimney"></i>&nbsp;
                Admin
            </div>
        </a>
    </div>
</div>
</header>
<!-- header section end -->

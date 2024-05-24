@extends('pages.layout')

@push('home-style')
    <link rel="stylesheet" href="{{ asset('css/search.css') }}" type="text/css">
@endpush

@section('content')
    <div class="main-content">
        <div class="title-search"><h1>Search Results in categories</h1>
            @if (empty($category))
            {{'no data found'}}
            @else
            <ol class="olcards">
                @foreach ($category as $cat)
                    <li style="--cardColor:#fc374e">
                        <div class="content">
                            <div class="title"><a href="{{url('/')}}/{{$cat['name']}}">{{$cat['name']}}</a></div>
                        </div>
                    </li>
                @endforeach
            </ol>
            @endif
        </div>
        <div class="title-search"><h1>Search Results in subcategories</h1>
            @if (empty($subcategory))
            {{'no data found'}}
            @else
            <ol class="olcards">
                @foreach ($subcategory as $subcat)
                    <li style="--cardColor:#fc374e">
                        <div class="content">
                            <div class="title"><a href="{{url('/')}}/{{$subcat['category']['name']}}/{{$subcat['name']}}">{{$subcat['name']}}</a></div>
                        </div>
                    </li>
                @endforeach
            @endif
            </ol>
        </div>
        <div class="title-search"><h1>Search Results in items</h1>
            @if (empty($allitems))
            {{'no data found'}}
            @else
            <ol class="olcards">
                @foreach ($allitems as $item)
                    <li style="--cardColor:#fc374e">
                        <div class="content">
                            <div class="title"><a href="">{{$item['name']}}</a></div>
                        </div>
                    </li>
                @endforeach
            </ol>
            @endif
        </div>
    </div>
@endsection

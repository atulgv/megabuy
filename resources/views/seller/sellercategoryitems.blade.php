@extends('pages.sellerLayout')

@push('admin-style')
    <link rel="stylesheet" href="{{ asset('css/admin/sellerData.css') }}">
@endpush

@section('seller-content')
    <div class="main-section">
        <div class="category-data">
            <div class="intro">
                <h2>{{$subcategory}}</h2>
                <div class="intro-search">
                    <div class="search-section">
                        <div class="box">
                            <form name="search">
                                <input type="text" class="input" name="txt" placeholder="Search all items" onmouseout="this.value = ''; this.blur();">
                            </form>
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
                <a id="add-category-btn" href="{{url('/')}}/showsellnewitempage">Sell new item</a>
            </div>
            <hr>

            <table class="invisible-scroll">
                <thead>
                  <tr>
                    @foreach ($fields as $field)
                    <th scope="col">{{$field}}</th>
                    @endforeach
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                @if (empty($selleritems))
                    {{'no data'}}
                @else
                <tbody>
                  <tr>
                    @foreach ($fields as $field)
                    <td data-label="{{ucfirst($field)}}">{{$selleritems[0][$field]}}</td>
                    @endforeach
                    <td data-label="Action">
                        <a href="">Delete</a>
                    </td>
                  </tr>
                  @foreach (array_slice($selleritems, 1, sizeof($selleritems)) as $selleritem)
                  <tr>
                    <td scope="row" data-label="{{ucfirst($fields[1])}}">{{$selleritem[$fields[1]]}}</td>
                    @foreach (array_slice($fields, 1, sizeof($fields)) as $field)
                    <td data-label="{{ucfirst($field)}}">{{$selleritem[$field]}}</td>
                    @endforeach
                    <td data-label="Action">
                        <a href="">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                @endif
              </table>
        </div>
    </div>
@endsection

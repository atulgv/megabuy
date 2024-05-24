@extends('pages.adminLayout')

@push('admin-style')
    <link rel="stylesheet" href="{{ asset('css/admin/sellerData.css') }}">
@endpush

@section('admin-content')
    <div class="main-section">
        <div class="category-data">
            <div class="intro">
                <h2>Items</h2>
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
            </div>
            <hr>
            <table>
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Category</th>
                    <th scope="col">Sub Category</th>
                    <th scope="col">Seller</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                @if (empty($allitems))
                    {{'no data'}}
                @else
                <tbody>
                  <tr>
                    <td data-label="Id">{{$allitems[0]['allitem_id']}}</td>
                    <td data-label="Name">{{$allitems[0]['name']}}</td>
                    <td data-label="Price">{{$allitems[0]['price']}}</td>
                    <td data-label="Discount">{{$allitems[0]['discount']}}</td>
                    <td data-label="Category">{{$allitems[0]['category']}}</td>
                    <td data-label="Sub Category">{{$allitems[0]['subcategory']}}</td>
                    <td data-label="Seller">{{$allitems[0]['seller']}}</td>
                    <td data-label="Quantity">{{$allitems[0]['quantity']}}</td>
                    <td data-label="Action" id="megadeal-btn">
                        <a href="{{url('/')}}/showmovetomegadealpage/{{$allitems[0]['allitem_id']}}" id="megadeal">Move to Megadeals</a>
                        <a href="">Delete</a>
                    </td>
                  </tr>
                  @foreach (array_slice($allitems, 1, sizeof($allitems)) as $allitem)
                  <tr>
                    <td scope="row" data-label="Id">{{$allitem['allitem_id']}}</td>
                    <td data-label="Name">{{$allitem['name']}}</td>
                    <td data-label="Price">{{$allitem['price']}}</td>
                    <td data-label="Discount">{{$allitem['discount']}}</td>
                    <td data-label="Category">{{$allitem['category']}}</td>
                    <td data-label="Sub Category">{{$allitem['subcategory']}}</td>
                    <td data-label="Seller">{{$allitem['seller']}}</td>
                    <td data-label="Quantity">{{$allitem['quantity']}}</td>
                    <td data-label="Action" id="megadeal-btn">
                        <a href="{{url('/')}}/showmovetomegadealpage/{{$allitem['allitem_id']}}" id="megadeal">Move to Megadeals</a>
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

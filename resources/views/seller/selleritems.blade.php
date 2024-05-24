@extends('pages.sellerLayout')

@push('admin-style')
    <link rel="stylesheet" href="{{ asset('css/admin/sellerData.css') }}">
@endpush

@section('seller-content')
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
                <a id="add-category-btn" href="{{url('/')}}/showsellnewitempage">Sell new item</a>
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
                @if (empty($selleritems))
                    {{'no data'}}
                @else
                <tbody>
                  <tr>
                    <td data-label="Id">{{$selleritems[0]['allitem_id']}}</td>
                    <td data-label="Name">{{$selleritems[0]['name']}}</td>
                    <td data-label="Price">{{$selleritems[0]['price']}}</td>
                    <td data-label="Discount">{{$selleritems[0]['discount']}}</td>
                    <td data-label="Category">{{$selleritems[0]['category']}}</td>
                    <td data-label="Sub Category">{{$selleritems[0]['subcategory']}}</td>
                    <td data-label="Seller">{{$selleritems[0]['seller']}}</td>
                    <td data-label="Quantity">{{$selleritems[0]['quantity']}}</td>
                    <td data-label="Action">
                        <a href="">Delete</a>
                    </td>
                  </tr>
                  @foreach (array_slice($selleritems, 1, sizeof($selleritems)) as $selleritem)
                  <tr>
                    <td scope="row" data-label="Id">{{$selleritem['allitem_id']}}</td>
                    <td data-label="Name">{{$selleritem['name']}}</td>
                    <td data-label="Price">{{$selleritem['price']}}</td>
                    <td data-label="Discount">{{$selleritem['discount']}}</td>
                    <td data-label="Category">{{$selleritem['category']}}</td>
                    <td data-label="Sub Category">{{$selleritem['subcategory']}}</td>
                    <td data-label="Seller">{{$selleritem['seller']}}</td>
                    <td data-label="Quantity">{{$selleritem['quantity']}}</td>
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

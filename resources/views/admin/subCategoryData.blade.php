@extends('pages.adminLayout')
@push('admin-style')
    <link rel="stylesheet" href="{{ asset('css/admin/sellerData.css') }}">
@endpush
@section('admin-content')
    <div class="main-section">
        <div class="category-data">
            <div class="intro">
                <h2>Sub Category</h2>
                <div class="intro-search">
                    <div class="search-section">
                        <div class="box">
                            <form name="search">
                                <input type="text" class="input" name="txt" placeholder="Search subcategories" onmouseout="this.value = ''; this.blur();">
                            </form>
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
                <a id="add-category-btn" href="{{url('/')}}/showcreatesubcategorypage">Add Sub Category</a>
            </div>
            <hr>

            <table>
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category</th>
                        <th scope="col">Number Of Items</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @if (empty($subcategories))
                    {{'no data'}}
                @else
                <tbody>
                    <tr>
                        <td data-label="Id">{{$subcategories[0]['subcategory_id']}}</td>
                        <td data-label="Name">{{$subcategories[0]['name']}}</td>
                        <td data-label="Category">{{$subcategories[0]['category']['name']}}</td>
                        <td data-label="Number Of Items">{{$subcategories[0]['numberofitems']}}</td>
                        <td data-label="Action"  id="action-btn">
                            <a href="">Edit</a>
                            <a href="">Delete</a>
                        </td>
                    </tr>
                    @foreach (array_slice($subcategories, 1, sizeof($subcategories)) as $subcategory)
                    <tr>
                        <td scope="row" data-label="Id">{{$subcategory['subcategory_id']}}</td>
                        <td data-label="Name">{{$subcategory['name']}}</td>
                        <td data-label="Category">{{$subcategory['category']['name']}}</td>
                        <td data-label="Number Of Items">{{$subcategory['numberofitems']}}</td>
                        <td data-label="Action" id="action-btn">
                            <a href="">Edit</a>
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

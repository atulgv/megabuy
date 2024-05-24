@extends('pages.adminLayout')
@push('admin-style')
    <link rel="stylesheet" href="{{ asset('css/admin/sellerData.css') }}">
@endpush
@section('admin-content')
    <div class="main-section">
        <div class="category-data">
            <div class="intro">
                <h2>Category</h2>
                <div class="intro-search">
                    <div class="search-section">
                        <div class="box">
                            <form name="search">
                                <input type="text" class="input" name="txt" placeholder="Search categories" onmouseout="this.value = ''; this.blur();">
                            </form>
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
                <a id="add-category-btn" href="{{url('/')}}/showcreatecategorypage">Add Category</a>
            </div>
            <hr>
            <table>
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Number Of Sub Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                @if (!empty($cats))
                <tbody>
                    <tr>
                        <td data-label="Id">{{$cats[0]['category_id']}}</td>
                        <td data-label="Name">{{$cats[0]['name']}}</td>
                        <td data-label="Number Of Sub Category">{{$cats[0]['numberOfSubCategory']}}</td>
                        <td data-label="Action" id="action-btn">
                            <a href="">Edit</a>
                            <a href="">Delete</a>
                        </td>
                    </tr>
                    @foreach (array_slice($cats, 1, sizeof($cats)) as $category)
                    <tr>
                        <td scope="row" data-label="Id">{{$category['category_id']}}</td>
                        <td data-label="Name">{{$category['name']}}</td>
                        <td data-label="Number Of Sub Category">{{$category['numberOfSubCategory']}}</td>
                        <td data-label="Action" id="action-btn">
                            <a href="">Edit</a>
                            <a href="">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                @else
                {{'no data'}}
                @endif
              </table>
        </div>
    </div>
@endsection

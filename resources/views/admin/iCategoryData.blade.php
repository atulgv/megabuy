@extends('pages.adminLayout')
@push('admin-style')
    <link rel="stylesheet" href="{{ asset('css/admin/sellerData.css') }}">
@endpush
@section('admin-content')
    <div class="main-section">
        <div class="category-data">
            <div class="intro">
                <h2>
                    {{$itemcategory['name']}}
                </h2>
                <div class="intro-search">
                    <div class="search-section">
                        <div class="box">
                            <form name="search">
                                <input type="text" class="input" name="txt" placeholder="Search itemcategories" onmouseout="this.value = ''; this.blur();">
                            </form>
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
                <a id="add-category-btn" href="{{url('/')}}/showcreateicategorypage/{{$itemcategory['name']}}">
                    {{'Add '.$itemcategory['name']}}
                </a>
            </div>
            <hr>


            <table>
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Item Category</th>
                    <th scope="col">Sub Category</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                {{-- @if ($itemcategoryname != 'all' || $itemcategoryname != '')
                <tbody>
                  <tr>
                    <td data-label="Id">{{$itemcategories[0][strtolower($itemcategoryname).'_id']}}</td>
                    <td data-label="Name">{{$itemcategories[0]['name']}}</td>
                    <td data-label="Action" id="action-btn">
                        <a href="">Edit</a>
                        <a href="">Delete</a>
                    </td>
                  </tr>
                  @foreach (array_slice($itemcategories, 1, sizeof($itemcategories)) as $itemcategory)
                  <tr>
                    <td scope="row" data-label="Id">{{$itemcategory[strtolower($itemcategoryname).'_id']}}</td>
                    <td data-label="Name">{{$itemcategory['name']}}</td>
                    <td data-label="Action" id="action-btn">
                        <a href="">Edit</a>
                        <a href="">Delete</a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
                @else --}}
                @if (empty($icategory))
                    {{'no data'}}
                @else
                <tbody>
                    <tr>
                      <td data-label="Id">{{$icategory[0]->id}}</td>
                      <td data-label="Name">{{$icategory[0]->name}}</td>
                      <td data-label="Item Category">{{$icategory[0]->itemcategory}}</td>
                      <td data-label="Sub Category">{{$icategory[0]->subcategory}}</td>
                      <td data-label="Action" id="action-btn">
                          <a href="">Edit</a>
                          <a href="">Delete</a>
                      </td>
                    </tr>
                    @foreach (array_slice($icategory, 1, sizeof($icategory)) as $itemcategory)
                    <tr>
                      <td scope="row" data-label="Id">{{$itemcategory->id}}</td>
                      <td data-label="Name">{{$itemcategory->name}}</td>
                      <td data-label="Item Category">{{$itemcategory->itemcategory}}</td>
                      <td data-label="Sub Category">{{$itemcategory->subcategory}}</td>
                      <td data-label="Action" id="action-btn">
                          <a href="">Edit</a>
                          <a href="">Delete</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                  @endif
                {{-- @endif --}}
              </table>
        </div>
    </div>
@endsection

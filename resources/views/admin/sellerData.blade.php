@extends('pages.adminLayout')

@push('admin-style')
    <link rel="stylesheet" href="{{ asset('css/admin/sellerData.css') }}">
@endpush

@section('admin-content')
    <div class="main-section">
        <div class="category-data">
            <div class="intro">
                <h2>Sellers</h2>
                <div class="intro-search">
                    <div class="search-section">
                        <div class="box">
                            <form action="{{url('/')}}/searchsellers">
                                <input type="text" class="input" name="search" placeholder="Search sellers" onmouseout="this.value = ''; this.blur();">
                            </form>
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
                <a id="add-category-btn" href="{{url('/')}}/showcreatenewuserpage">New Seller</a>
            </div>
            <hr>
            <table>
                <thead>
                  <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Name</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Email</th>
                    <th scope="col">City</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                @if (empty($sellers))
                    {{'no data'}}
                @else
                <tbody>
                  <tr>
                    <td data-label="Id">{{$sellers[0]['seller_id']}}</td>
                    <td data-label="Name">{{$sellers[0]['name']}}</td>
                    <td data-label="Gender">{{$sellers[0]['gender']}}</td>
                    <td data-label="Email">{{$sellers[0]['email']}}</td>
                    <td data-label="City">{{$sellers[0]['city']}}</td>
                    <td data-label="Address">{{$sellers[0]['address']}}</td>
                    @if ($sellers[0]['status'] == 0)
                    <td data-label="Status" style="background-color: red;">Offline</td>
                    @else
                    <td data-label="Status" style="background-color: green;">Online</td>
                    @endif
                    <td data-label="Action" id="action-btn">
                        <a href="">Edit</a>
                        <a href="">Delete</a>
                    </td>
                  </tr>
                  @foreach (array_slice($sellers, 1, sizeof($sellers)) as $seller)
                  <tr>
                    <td scope="row" data-label="Id">{{$seller->seller_id}}</td>
                    <td data-label="Name">{{$seller->name}}</td>
                    <td data-label="Gender">{{$seller->gender}}</td>
                    <td data-label="Email">{{$seller->email}}</td>
                    <td data-label="City">{{$seller->city}}</td>
                    <td data-label="Address">{{$seller->address}}</td>
                    @if ($sellers[0]['status'] == 0)
                    <td data-label="Status" style="background-color: red;">Offline</td>
                    @else
                    <td data-label="Status" style="background-color: green;">Online</td>
                    @endif
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

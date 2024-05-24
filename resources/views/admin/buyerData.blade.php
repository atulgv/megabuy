@extends('pages.adminLayout')

@push('admin-style')
    <link rel="stylesheet" href="{{ asset('css/admin/sellerData.css') }}">
@endpush

@section('admin-content')
    <div class="main-section">
        <div class="category-data">
            <div class="intro">
                <h2>Buyers</h2>
                <div class="intro-search">
                    <div class="search-section">
                        <div class="box">
                            <form name="search">
                                <input type="text" class="input" name="txt" placeholder="Search buyers" onmouseout="this.value = ''; this.blur();">
                            </form>
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
                <a id="add-category-btn" href="{{url('/')}}/showcreatenewuserpage">New buyer</a>
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
                @if (empty($buyers))
                    {{'no data'}}
                @else
                <tbody>
                    <tr>
                        <td data-label="Id">{{$buyers[0]['buyer_id']}}</td>
                        <td data-label="Name">{{$buyers[0]['name']}}</td>
                        <td data-label="Gender">{{$buyers[0]['gender']}}</td>
                        <td data-label="Email">{{$buyers[0]['email']}}</td>
                        <td data-label="City">{{$buyers[0]['city']}}</td>
                        <td data-label="Address">{{$buyers[0]['address']}}</td>
                        @if ($buyers[0]['status'] == 0)
                            <td data-label="Status" style="background-color: red;">Offline</td>
                        @else
                            <td data-label="Status" style="background-color: green;">Online</td>
                        @endif
                        <td data-label="Action" id="action-btn">
                            <a href="">Edit</a>
                            <a href="">Delete</a>
                        </td>
                    </tr>
                  @foreach (array_slice($buyers, 1, sizeof($buyers)) as $buyer)
                    <tr>
                        <td scope="row" data-label="Id">{{$buyer->buyer_id}}</td>
                        <td data-label="Name">{{$buyer->name}}</td>
                        <td data-label="Gender">{{$buyer->gender}}</td>
                        <td data-label="Email">{{$buyer->email}}</td>
                        <td data-label="City">{{$buyer->city}}</td>
                        <td data-label="Address">{{$buyer->address}}</td>
                        @if ($buyers[0]['status'] == 0)
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

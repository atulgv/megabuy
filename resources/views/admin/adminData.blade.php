@extends('pages.adminLayout')

@push('admin-style')
    <link rel="stylesheet" href="{{ asset('css/admin/sellerData.css') }}">
@endpush

@section('admin-content')
    <div class="main-section">
        <div class="category-data">
            <div class="intro">
                <h2>Admins</h2>
                <div class="intro-search">
                    <div class="search-section">
                        <div class="box">
                            <form name="search">
                                <input type="text" class="input" name="txt" placeholder="Search admins" onmouseout="this.value = ''; this.blur();">
                            </form>
                            <i class="fas fa-search"></i>
                        </div>
                    </div>
                </div>
                <a id="add-category-btn" href="{{url('/')}}/showcreatenewuserpage">New admin</a>
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
                @if (empty($admins))
                    {{'no data'}}
                @else
                <tbody>
                    <tr>
                        <td data-label="Id">{{$admins[0]['admin_id']}}</td>
                        <td data-label="Name">{{$admins[0]['name']}}</td>
                        <td data-label="Gender">{{$admins[0]['gender']}}</td>
                        <td data-label="Email">{{$admins[0]['email']}}</td>
                        <td data-label="City">{{$admins[0]['city']}}</td>
                        <td data-label="Address">{{$admins[0]['address']}}</td>
                        @if ($admins[0]['status'] == 0)
                            <td data-label="Status" style="background-color: red;">Offline</td>
                        @else
                            <td data-label="Status" style="background-color: green;">Online</td>
                        @endif
                        <td data-label="Action" id="action-btn">
                            <a href="">Edit</a>
                            <a href="">Delete</a>
                        </td>
                    </tr>
                    @foreach (array_slice($admins, 1, sizeof($admins)) as $admin)
                    <tr>
                        <td scope="row" data-label="Id">{{$admin->admin_id}}</td>
                        <td data-label="Name">{{$admin->name}}</td>
                        <td data-label="Gender">{{$admin->gender}}</td>
                        <td data-label="Email">{{$admin->email}}</td>
                        <td data-label="City">{{$admin->city}}</td>
                        <td data-label="Address">{{$admin->address}}</td>
                        @if ($admins[0]['status'] == 0)
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

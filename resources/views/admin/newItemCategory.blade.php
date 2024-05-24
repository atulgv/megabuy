@extends('pages.adminLayout')
@push('login-style')
    <link rel="stylesheet" href="{{ asset('css/admin/createCategory.css') }}">
@endpush
@section('admin-content')
    <div class="main-section">
        <div class="signin">
            <div class="content">
                <h2>Create Item Category</h2>
                <form action="{{url('/')}}/createnewitemcategory" method="post">
                    @csrf
                    <div class="inputBox">
                        <input type="text" required placeholder="Name of item category" name="itemcategory">
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Create" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

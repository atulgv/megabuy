@extends('pages.adminLayout')
@push('login-style')
    <link rel="stylesheet" href="{{ asset('css/admin/createCategory.css') }}">
@endpush
@section('admin-content')
    <div class="main-section">
        <div class="signin">
            <div class="content">
                <h2>Create Category</h2>
                <form action="{{url('/')}}/createnewcategory" enctype="multipart/form-data" method="post">
                    @csrf
                    <div class="inputBox">
                        <input type="text" required placeholder="Name of category" name="category">
                    </div>
                    <div class="filebox">
                        <input type="file" name="imageone">
                    </div>
                    <div class="filebox">
                        <input type="file" name="imagetwo">
                    </div>
                    <div class="filebox">
                        <input type="file" name="imagethree">
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Create" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

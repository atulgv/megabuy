@extends('pages.adminLayout')
@push('login-style')
    <link rel="stylesheet" href="{{ asset('css/admin/createcategory.css') }}">
@endpush
@section('admin-content')
    <div class="main-section" id="subcategory">
        <div class="signin">
            <div class="content">
                <h2>Create Sub Category</h2>
                <form action="{{url('/')}}/createnewsubcategory" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="inputBox">
                        <input type="text" required placeholder="Name of Sub Category" name="subcategory">
                    </div>
                    <select name="category" required>
                        <option value="" disabled selected>Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category->category_id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
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
                        <input type="submit" value="Create">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

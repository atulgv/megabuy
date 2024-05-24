@extends('pages.adminLayout')
@push('login-style')
    <link rel="stylesheet" href="{{ asset('css/admin/createCategory.css') }}">
@endpush
@section('admin-content')
    <div class="main-section">
        <div class="signin">
            <div class="content">
                <h2>{{'Create '. $itemcategory}}</h2>
                <form action="{{url('/')}}/createnewicategory/{{$itemcategory}}" method="post">
                    @csrf
                    <div class="inputBox">
                        <input type="text" required placeholder="{{'Name of '.$itemcategory}}" name="name">
                    </div>
                    <select name="subcategory">
                        @foreach ($subcategories as $subcategory)

                            <option value="{{$subcategory['subcategory_id']}}">{{$subcategory['name']}}</option>

                        @endforeach
                    </select>
                    <div class="inputBox">
                        <input type="submit" value="Create" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

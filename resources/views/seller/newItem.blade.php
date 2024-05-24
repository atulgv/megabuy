@extends('pages.sellerLayout')
@push('login-style')
    <link rel="stylesheet" href="{{ asset('css/admin/createCategory.css') }}">
@endpush
@section('seller-content')
    <div class="main-section">
        <div class="signin">
            <div class="content">
                <h2>Choose subcategory</h2>
                <form action="{{url('/')}}/choosesubcategory" method="post">
                    @csrf
                    <div class="inputBox">
                        <select name="subcategory">
                            <option value="" disabled  selected>Select a subcategory</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{$subcategory['subcategory_id']}}">{{$subcategory['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Choose" name="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

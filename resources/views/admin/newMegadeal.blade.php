@extends('pages.adminLayout')
@push('login-style')
    <link rel="stylesheet" href="{{ asset('css/admin/createcategory.css') }}">
@endpush
@section('admin-content')
    <div class="main-section" id="subcategory">
        <div class="signin">
            <div class="content">
                <h2>Details for megadeal</h2>
                <form action="{{url('/')}}/movetomegadeal/{{$itemid}}" method="post">
                    @csrf
                    <div class="inputBox">
                        <input type="text" required placeholder="Total megadeal discount" name="megadealdiscount">
                    </div>
                    <div class="inputBox">
                        <input type="time" required placeholder="Deal time" name="dealtime">
                    </div>
                    <div class="inputBox">
                        <input type="submit" value="Send to Megadeals">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

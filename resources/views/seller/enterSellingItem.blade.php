@extends('pages.sellerLayout')
@push('login-style')
    <link rel="stylesheet" href="{{ asset('css/login-page.css') }}">
@endpush
@section('seller-content')
<div class="create-page-section">
    <div class="create-main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="signup">
            <form class="logsign"  action="{{url('/')}}/registeritem"  method="post" enctype="multipart/form-data">
                @csrf
                <label for="chk" aria-hidden="true">Details of item to sell</label>
                @foreach ($fields as $field)
                @if ($field == 'imageone' || $field == 'imagetwo' || $field == 'imagethree')
                <input type="file" name="{{$field}}">
                @elseif ($field == 'name' || $field == 'brand' || $field == 'model' || $field == 'processor')
                <input type="text" name="{{$field}}" placeholder="{{'Enter '.$field}}">
                @elseif ($field == 'description')
                <textarea rows="4" cols="50" name="{{$field}}" placeholder="Description"></textarea>
                @else
                <input type="number" step="0.01" name="{{$field}}" placeholder="{{'Enter '.$field}}">
                @endif
                @endforeach
                <button>Confirm Sell</button>
            </form>
        </div>
    </div>
</div>
@endsection

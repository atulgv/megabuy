@extends('pages.adminLayout')
@push('login-style')
    <link rel="stylesheet" href="{{ asset('css/admin/createCategory.css') }}">
@endpush
@section('admin-content')
    <div class="main-section">
        <form action="/payment" method="post" >
            @csrf
            <script src="https://checkout.razorpay.com/v1/checkout.js"
               data-key="rzp_test_r4gQ34njPPZfCh"
               data-amount="50001"
               data-currency="INR"
               data-buttontext="Pay 500 INR"
               data-name="Programming Solutions"
               data-description="Rozerpay"
               data-image={{ asset('images/ac.jpg') }}
               data-prefill.name="name"
               data-prefill.email="email"
               data-theme.color="#F37254"></script>
         </form>
    </div>
@endsection


@extends('pages.layout')
@push('login-style')
    <link rel="stylesheet" href="{{ asset('css/login-page.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
@endpush
@section('content')
    <div class="login-page-section">
        <div class="main">
            <input type="checkbox" id="chk" aria-hidden="true">
            <div class="signup">
                <form class="logsign"  action="{{url('/')}}/createuser"  method="post">
                    @csrf
                    <label for="chk" aria-hidden="true">Sign up</label>
                    <input type="text" name="fullname" placeholder="Fullname" required="">
                    <select name="gender" required>
                        <option value="" disabled selected>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <input type="email" name="email" placeholder="Email" required="">
                    <input type="text" name="username" placeholder="Username" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <input type="text" name="city" placeholder="City" required="">
                    <select name="usertype" required>
                        <option value="" disabled selected>Usertype</option>
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                    </select>
                    <button>Sign up</button>
                </form>
            </div>

            <div class="login">
                <form class="logsign" action="{{url('/')}}/authenticate" method="POST">
                    @csrf
                    <label for="chk" aria-hidden="true">Login</label>
                    <input type="text" name="username" placeholder="Username" required="">
                    <input type="password" name="password" placeholder="Password" required="">
                    <button>Login</button>
                </form>
            </div>
        </div>
    </div>

@endsection






@extends('pages.adminLayout')
@push('login-style')
    <link rel="stylesheet" href="{{ asset('css/login-page.css') }}">
@endpush
@section('admin-content')
<div class="new-user-section">
    <div class="main" id="new-user-form">
        <input type="checkbox" id="chk" aria-hidden="true">

            <div class="signup">
                <form class="logsign"  action="{{url('/')}}/createuser"  method="post">
                    @csrf
                    <label for="chk" aria-hidden="true">Create New User</label>
                    <input type="text" name="fullname" placeholder="Fullname" required>
                    <select name="gender" required>
                        <option value="" disabled selected>Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <input type="text" name="city" placeholder="City" required>
                    <select name="usertype" required>
                        <option value="" disabled selected>Usertype</option>
                        <option value="buyer">Buyer</option>
                        <option value="seller">Seller</option>
                        <option value="admin">Admin</option>
                    </select>
                    <button>Sign up</button>
                </form>
            </div>
    </div>
</div>
@endsection

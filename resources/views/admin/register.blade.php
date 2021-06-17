@extends('admin.layouts.app')

@section('main-section')
    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="assets/img/logo-white.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Register</h1>
                            <p class="account-subtitle">Access to our dashboard</p>

                            <!-- Form -->
                            <form action="{{route('admin.register')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Name" value="{{old('name')}}">
                                    @error('name')
                                        <div class="invalid-feedback">
                                            <strong>{{$message}}</strong>
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="email" class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Email" value="{{old('email')}}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" type="text" placeholder="Phone" value="{{old('phone_number')}}">
                                    @error('phone_number')
                                    <div class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="password" class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password">
                                    @error('password')
                                    <div class="invalid-feedback">
                                        <strong>{{$message}}</strong>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input name="password_confirmation" class="form-control" type="password" placeholder="Confirm Password">
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                                </div>
                            </form>
                            <!-- /Form -->

                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">or</span>
                            </div>

                            <!-- Social Login -->
                            <div class="social-login">
                                <span>Register with</span>
                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
                            </div>
                            <!-- /Social Login -->

                            <div class="text-center dont-have">Already have an account? <a href="{{ route('admin.login') }}">Login</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
@endsection

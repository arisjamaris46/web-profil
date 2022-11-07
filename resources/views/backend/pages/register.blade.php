@extends('backend.auth-layout')
@section('content')
 <!-- Outer Row -->
 <div class="row justify-content-center">


     <div class="card-body p-0">
         <div class="col-xl-10 col-lg-12 col-md-9">
        @if ($message = session('success'))
            <x-alert type="success" :message="$message" />
        @endif

        @if ($message = session('error'))
            <x-alert type="danger" :message="$message"/>
        @endif

        <div class="card o-hidden border-0 shadow-lg my-5">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-6 bg-primary text-center">
                        <img class="rounded-circle p-4 m-4" src="{{ asset('img/logo.jpg')}}" alt="" style="width:380px;height:200px"/>
                        <p class="fw-bolder text-white">Please, register the user account correctly</p>
                    </div>
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Welcome to the Register Account</h1>
                            </div>
                            <form class="user" method="POST" action="register">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('username') is-invalid @enderror"
                                        id="username" name="username" autofocus aria-describedby="username"
                                        placeholder="Enter Username" value="{{ old('username')}}" autocomplete="off">
                                    @error('username')
                                        <span class="text-danger mb-2">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user @error('email') is-invalid @enderror"
                                        id="email" name="email"  aria-describedby="email"
                                        placeholder="Enter Email" value="{{ old('email')}}" autocomplete="off">
                                    @error('email')
                                        <span class="text-danger mb-2">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                                        id="password" name="password" placeholder="Password">
                                    @error('password')
                                        <span class="text-danger mb-2">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg rounded-pill">Register</button>
                                </div>
                            </form>
                            <hr>
                            {{-- <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div> --}}
                            <div class="text-center">
                                If your account is already registered, please  <a  href="{{route('login')}}">login here</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection

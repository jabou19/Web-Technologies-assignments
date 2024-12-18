@extends('master')

@section('content')
    <div
        style="background-image: url('{{ asset('imgs/login.jpg') }}'); background-size: cover; position: relative"
        class="h-100">
        <div style="position: absolute;background-color: black;height: 100%;width: 100%;opacity: 50%"></div>
        <div class="card shadow-sm"
             style="width: 500px; top: 50%;left: 50%;  transform: translate(-50%, -50%);position: absolute">
            <div class="card-header">
                <h3 class="mb-0">Login</h3>
            </div>
            <div class="card-body">
                <!-- Task 3 Guest, step 5: add the HTTP method and url as instructed done -->
                <form method="post" action="{{route('doLogin')}}">
                    @csrf
                    <!-- Task 3 Guest, step 3: add login fields as instructed-->
                    <!-- Tip: you can use the same style as the registration form -->
                        {{-- email--}}

                        <div class="mb-3">
                            <label for="email" class="form-label" :value="__('Email')">Email</label>
                            <input type="text" name="email" class="form-control email" id="email" value="{{old('email')}}" >
                        </div>

                        {{-- password--}}
                        <div class="mb-3">
                            <label for="password" class="form-label" :value="__('Password')">Password</label>
                            {{--       value="{{old('password')}}"      --}}
                            <input type="password" name="password" class="form-control password" id="password" value="{{old('password')}}">
                        </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Task 3 Guest, step 4: add submit button done -->
                        <button class="login-submit" type="submit">
                            {{__('Login')}}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

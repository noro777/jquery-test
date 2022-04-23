@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <div class="alert alert-primary d-none" id="success" role="alert">
                        Ուռաաաաաաաաաաաաաա  մալադեց
                    </div>
                    <div class="alert alert-danger d-none" id="error" role="alert">
                        Մի  բան սխալա
                    </div>
{{--                    <form method="POST" action="{{ route('login') }}">--}}
{{--                        @csrf--}}

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" id="button" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(()=>{
            $('#button').click(()=>{
                data = {
                    email : $('#email').val(),
                    password : $('#password').val()
                }
                console.log(data)
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type : 'post',
                    url : 'login',
                    data,
                    error : function (xhr){
                        console.log(xhr.responseJSON.errors);
                        $('#success').addClass('d-none')
                        $('#error').removeClass('d-none')
                    },
                    success:function (){
                        $('#error').addClass('d-none')
                        $('#success').removeClass('d-none')
                    }
                })
            })
        })
    </script>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <div class="alert alert-primary d-none" id="success" role="alert">
                        Ուռաաաաաաաաաաաաաա  մալադեց
                    </div>
                    <div class="alert alert-danger d-none" id="error" role="alert">
                        Մի  բան սխալա
                    </div>
{{--                    <form method="POST" action="{{ route('register') }}">--}}
{{--                        @csrf--}}

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="button" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
{{--                    </form>--}}
                </div>
            </div>
        </div>
    </div>
</div>


    <script>
        $(document).ready(()=>{
            $('#button').click(()=>{
                data = {
                    name : $('#name').val(),
                    email : $('#email').val(),
                    password : $('#password').val(),
                    password_confirmation : $('#password-confirm').val(),
                }
                // console.log(data)
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type : 'post',
                    url : 'register',
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
@endsection
